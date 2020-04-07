<?php

declare(strict_types=1);

namespace Remorhaz\UniLex\Lexer;

use ReflectionException;
use Remorhaz\UniLex\AST\Translator;
use Remorhaz\UniLex\AST\Tree;
use Remorhaz\UniLex\Exception;
use Remorhaz\UniLex\RegExp\FSM\Dfa;
use Remorhaz\UniLex\RegExp\FSM\DfaBuilder;
use Remorhaz\UniLex\RegExp\FSM\Nfa;
use Remorhaz\UniLex\RegExp\FSM\NfaBuilder;
use Remorhaz\UniLex\RegExp\FSM\Range;
use Remorhaz\UniLex\RegExp\FSM\RangeSet;
use Remorhaz\UniLex\RegExp\FSM\TransitionMap;
use Remorhaz\UniLex\RegExp\ParserFactory;
use Remorhaz\UniLex\RegExp\PropertyLoader;
use Remorhaz\UniLex\Unicode\CharBufferFactory;
use Throwable;

use function array_diff;
use function array_intersect;
use function array_key_last;
use function array_keys;
use function array_merge;
use function array_pop;
use function array_unique;
use function count;
use function implode;
use function in_array;
use function var_export;

class TokenMatcherGenerator
{

    private $spec;

    private $output;

    private $dfa;

    /**
     * @var TokenSpec[]
     */
    private $tokenNfaStateMap = [];

    private $regExpMap = [];

    private $dfaRegExpTransitionMap;

    public function __construct(TokenMatcherSpec $spec)
    {
        $this->spec = $spec;
    }

    /**
     * @return string
     * @throws Exception
     * @throws ReflectionException
     */
    private function buildOutput(): string
    {
        return
            "{$this->buildFileComment()}\ndeclare(strict_types=1);\n\n" .
            "{$this->buildHeader()}\n" .
            "class {$this->spec->getTargetShortName()} extends {$this->spec->getTemplateClass()->getShortName()}\n" .
            "{\n" .
            "\n" .
            "    public function match({$this->buildMatchParameters()}): bool\n" .
            "    {\n{$this->buildMatchBody()}" .
            "    }\n" .
            "}\n";
    }

    /**
     * @return TokenMatcherInterface
     * @throws Exception
     */
    public function load(): TokenMatcherInterface
    {
        $targetClass = $this->spec->getTargetClassName();
        if (!class_exists($targetClass)) {
            try {
                $source = $this->getOutput(false);
                eval($source);
            } catch (Throwable $e) {
                throw new Exception("Invalid PHP code generated", 0, $e);
            }
            if (!class_exists($targetClass)) {
                throw new Exception("Failed to generate target class");
            }
        }

        return new $targetClass();
    }

    /**
     * @param bool $asFile
     * @return string
     * @throws Exception
     * @throws ReflectionException
     */
    public function getOutput(bool $asFile = true): string
    {
        if (!isset($this->output)) {
            $this->output = $this->buildOutput();
        }

        return $asFile ? "<?php\n\n{$this->output}" : $this->output;
    }

    private function buildFileComment(): string
    {
        $content = $this->spec->getFileComment();
        if ('' == $content) {
            return '';
        }
        $comment = "/**\n";
        $commentLineList = explode("\n", $content);
        foreach ($commentLineList as $commentLine) {
            $comment .= rtrim(" * {$commentLine}") . "\n";
        }
        $comment .= " */\n";

        return $comment;
    }

    /**
     * @return string
     * @throws ReflectionException
     */
    public function buildHeader(): string
    {
        $headerParts = [];
        $namespace = $this->spec->getTargetNamespaceName();
        if ($namespace != '') {
            $headerParts[] = $this->buildMethodPart("namespace {$namespace};", 0);
        }
        $useList = $this->buildUseList();
        if ('' != $useList) {
            $headerParts[] = $useList;
        }
        $header = $this->buildMethodPart($this->spec->getHeader(), 0);
        if ('' != $header) {
            $headerParts[] = $header;
        }

        return implode("\n", $headerParts);
    }

    /**
     * @return string
     * @throws ReflectionException
     */
    private function buildUseList(): string
    {
        $result = '';
        foreach ($this->spec->getUsedClassList() as $alias => $className) {
            $classWithAlias = is_string($alias) ? "{$className} {$alias}" : $className;
            $result .= $this->buildMethodPart("use {$classWithAlias};", 0);
        }

        return $result;
    }

    /**
     * @return string
     * @throws ReflectionException
     */
    private function buildMatchParameters(): string
    {
        $paramList = [];
        foreach ($this->spec->getMatchMethod()->getParameters() as $matchParameter) {
            if ($matchParameter->hasType()) {
                $param = $matchParameter->getType()->isBuiltin()
                    ? $matchParameter->getType()->getName()
                    : $matchParameter->getClass()->getShortName();
                $param .= " ";
            } else {
                $param = "";
            }
            $param .= "\${$matchParameter->getName()}";
            $paramList[] = $param;
        }

        return implode(", ", $paramList);
    }

    /**
     * @return string
     * @throws Exception
     */
    private function buildMatchBody(): string
    {
        $result = $this->buildBeforeMatch();

        foreach ($this->spec->getModeList() as $mode) {
            if (TokenMatcherInterface::DEFAULT_MODE == $mode) {
                continue;
            }
            $result .=
                $this->buildMethodPart("if (\$context->getMode() == '{$mode}') {") .
                $this->buildFsmEntry($mode, 3) .
                $this->buildMethodPart("}");
        }
        foreach ($this->spec->getModeList() as $mode) {
            if (TokenMatcherInterface::DEFAULT_MODE == $mode) {
                $result .= $this->buildFsmEntry(TokenMatcherInterface::DEFAULT_MODE) . "\n";
            }
            $result .= $this->buildFsmMoves($mode);
        }

        $result .= $this->buildErrorState();

        return $result;
    }

    private function buildBeforeMatch(): string
    {
        $code = $this->spec->getBeforeMatch();

        return
            $this->buildMethodPart("\$context = \$this->createContext(\$buffer, \$tokenFactory);") .
            $this->buildMethodPart($code);
    }

    /**
     * @param string $mode
     * @param int    $indent
     * @return string
     * @throws Exception
     */
    private function buildFsmEntry(string $mode, int $indent = 2): string
    {
        $state = $this->getDfa($mode)->getStateMap()->getStartState();
        $result = $this->buildMethodPart("\$context->setRegExps(", $indent);
        $tokenSpecList = $this->spec->getTokenSpecList($mode);
        $lastTokenKey = array_key_last($tokenSpecList);
        foreach ($tokenSpecList as $tokenKey => $tokenSpec) {
            $regExpValue = var_export($tokenSpec->getRegExp(), true);
            $regExpArg = $tokenKey === $lastTokenKey ? $regExpValue : "{$regExpValue},";
            $result .= $this->buildMethodPart($regExpArg, $indent + 1);
        }
        $result .= $this->buildMethodPart(");");

        return
            $result .
            $this->buildMethodPart("goto {$this->buildStateLabel('state', $mode, $state)};", $indent);
    }

    private function buildStateLabel(string $prefix, string $mode, int $state): string
    {
        $contextSuffix = TokenMatcherInterface::DEFAULT_MODE == $mode
            ? ''
            : ucfirst($mode);

        return "{$prefix}{$contextSuffix}{$state}";
    }

    /**
     * @param string $mode
     * @return string
     * @throws Exception
     */
    private function buildFsmMoves(string $mode): string
    {
        $result = '';
        foreach ($this->getDfa($mode)->getStateMap()->getStateList() as $stateIn) {
            if ($this->isFinishStateWithSingleEnteringTransition($mode, $stateIn)) {
                continue;
            }
            $result .=
                $this->buildStateEntry($mode, $stateIn) .
                $this->buildStateTransitionList($mode, $stateIn) .
                $this->buildStateFinish($mode, $stateIn);
        }

        return $result;
    }

    /**
     * @param string $mode
     * @param int    $stateIn
     * @return string
     * @throws Exception
     */
    private function buildStateEntry(string $mode, int $stateIn): string
    {
        $result = '';
        $result .= $this->buildMethodPart("{$this->buildStateLabel('state', $mode, $stateIn)}:");
        $moves = $this->getDfa($mode)->getTransitionMap()->getExitList($stateIn);
        if (empty($moves)) {
            return $result;
        }
        $result .= $this->buildMethodPart("if (\$context->getBuffer()->isEnd()) {");
        $result .= $this->getDfa($mode)->getStateMap()->isFinishState($stateIn)
            ? $this->buildMethodPart("goto {$this->buildStateLabel('finish', $mode, $stateIn)};", 3)
            : $this->buildMethodPart("goto error;", 3);
        $result .=
            $this->buildMethodPart("}") .
            $this->buildMethodPart("\$char = \$context->getBuffer()->getSymbol();");

        return $result;
    }

    /**
     * @param string $mode
     * @param int    $stateIn
     * @return string
     * @throws Exception
     */
    private function buildStateTransitionList(string $mode, int $stateIn): string
    {
        $result = '';
        foreach ($this->getDfa($mode)->getTransitionMap()->getExitList($stateIn) as $stateOut => $symbolList) {
            foreach ($symbolList as $symbol) {
                $rangeSet = $this->getDfa($mode)->getSymbolTable()->getRangeSet($symbol);
                $result .=
                    $this->buildMethodPart("if ({$this->buildRangeSetCondition($rangeSet)}) {") .
                    $this->buildOnTransition() .
                    $this->buildMethodPart("\$context->getBuffer()->nextSymbol();", 3);
                $result .= $this->isFinishStateWithSingleEnteringTransition($mode, $stateOut)
                    ? $this->buildToken($mode, $stateOut, 3)
                    : $this->buildStateTransition($mode, $stateIn, $stateOut, $symbol, 3);
                $result .= $this->buildMethodPart("}");
            }
        }

        return $result;
    }

    /**
     * @param string $mode
     * @param int    $stateIn
     * @param int    $stateOut
     * @param int    $symbol
     * @param int    $indent
     * @return string
     * @throws Exception
     */
    private function buildStateTransition(
        string $mode,
        int $stateIn,
        int $stateOut,
        int $symbol,
        int $indent = 3
    ): string {
        $transitionMap = $this->getRegExpTransitionMap();
        $result = '';
        if ($transitionMap->transitionExists($stateIn, $stateOut)) {
            $transitionValue = $transitionMap->getTransition($stateIn, $stateOut);
            foreach ($transitionValue as $transitionSymbol => $regExps) {
                if ($transitionSymbol == $symbol) {
                    if (empty($regExps)) {
                        throw new Exception("No target regular expressions");
                    }
                    $regExpValues = [];
                    foreach ($regExps as $regExp) {
                        $regExpValues[] = var_export($regExp, true);
                    }
                    if (count($regExps) == 1) {
                        $regExpArgs = array_pop($regExpValues);
                        $result .= $this->buildMethodPart("\$context->allowRegExps({$regExpArgs});", $indent);
                        break;
                    }
                    $lastValueKey = array_key_last($regExpValues);
                    $result .= $this->buildMethodPart("\$context->allowRegExps(", $indent);
                    foreach ($regExpValues as $valueKey => $regExpValue) {
                        $result .= $this->buildMethodPart(
                            $lastValueKey === $valueKey ? $regExpValue : "{$regExpValue},",
                            $indent + 1
                        );
                    }
                    $result .= $this->buildMethodPart(");", $indent);
                }
            }
        }

        return
            $result .
            $this->buildMethodPart("goto {$this->buildStateLabel('state', $mode, $stateOut)};", $indent);
    }

    /**
     * @param string $mode
     * @param int    $stateOut
     * @return bool
     * @throws Exception
     */
    private function isFinishStateWithSingleEnteringTransition(string $mode, int $stateOut): bool
    {
        if (!$this->getDfa($mode)->getStateMap()->isFinishState($stateOut)) {
            return false;
        }
        $enters = $this->getDfa($mode)->getTransitionMap()->getEnterList($stateOut);
        $exits = $this->getDfa($mode)->getTransitionMap()->getExitList($stateOut);
        if (!(count($enters) == 1 && count($exits) == 0)) {
            return false;
        }
        $symbolList = array_pop($enters);

        return count($symbolList) == 1;
    }

    private function buildHex(int $char): string
    {
        $hexChar = strtoupper(dechex($char));
        if (strlen($hexChar) % 2 != 0) {
            $hexChar = "0{$hexChar}";
        }

        return "0x{$hexChar}";
    }

    private function buildRangeCondition(Range $range): array
    {
        $startChar = $this->buildHex($range->getStart());
        if ($range->getStart() == $range->getFinish()) {
            return ["{$startChar} == \$char"];
        }
        $finishChar = $this->buildHex($range->getFinish());
        if ($range->getStart() + 1 == $range->getFinish()) {
            return [
                "{$startChar} == \$char",
                "{$finishChar} == \$char",
            ];
        }

        return ["{$startChar} <= \$char && \$char <= {$finishChar}"];
    }

    private function buildRangeSetCondition(RangeSet $rangeSet): string
    {
        $conditionList = [];
        foreach ($rangeSet->getRanges() as $range) {
            $conditionList = array_merge($conditionList, $this->buildRangeCondition($range));
        }
        $result = implode(" || ", $conditionList);
        if (strlen($result) + 15 <= 120 || count($conditionList) == 1) {
            return ltrim($result);
        }
        $result = $this->buildMethodPart(implode(" ||\n", $conditionList), 1);

        return "\n    " . ltrim($result);
    }

    /**
     * @param string $mode
     * @param int    $stateIn
     * @return string
     * @throws Exception
     */
    private function buildStateFinish(string $mode, int $stateIn): string
    {
        if (!$this->getDfa($mode)->getStateMap()->isFinishState($stateIn)) {
            return $this->buildMethodPart("goto error;\n");
        }
        $result = '';
        if (!empty($this->getDfa($mode)->getTransitionMap()->getExitList($stateIn))) {
            $result .= $this->buildMethodPart("{$this->buildStateLabel('finish', $mode, $stateIn)}:");
        }
        $result .= "{$this->buildToken($mode, $stateIn)}\n";

        return $result;
    }

    /**
     * @param string $mode
     * @param int    $stateIn
     * @param int    $indent
     * @return string
     * @throws Exception
     */
    private function buildToken(string $mode, int $stateIn, int $indent = 2): string
    {
        $result = $this->buildMethodPart("switch (\$context->getRegExp()) {");
        foreach ($this->regExpMap as $regExp => [$allowedStateIds, $forbiddenStateIds]) {
            if (!in_array($stateIn, $allowedStateIds)) {
                continue;
            }
            $tokenSpec = $this->spec->getTokenSpec($mode, (string) $regExp);
            $regExpArg = var_export($tokenSpec->getRegExp(), true);
            $result .=
                $this->buildMethodPart("case {$regExpArg}:", $indent + 1) .
                $this->buildSingleToken($tokenSpec, $indent + 2);
        }

        if ('' === $result) {
            throw new Exception("No tokens found for state {$stateIn}");
        }

        return
            $result .
            $this->buildMethodPart("default:", $indent + 1) .
            $this->buildMethodPart("goto error;", $indent + 2) .
            $this->buildMethodPart("}", $indent);
    }

    private function buildSingleToken(TokenSpec $tokenSpec, int $indent): string
    {
        return
            $this->buildMethodPart($tokenSpec->getCode(), $indent) .
            $this->buildOnToken($indent) . "\n" .
            $this->buildMethodPart("return true;\n", $indent);
    }

    private function buildErrorState(): string
    {
        $code = $this->spec->getOnError();

        return
            $this->buildMethodPart("error:") .
            $this->buildMethodPart('' == $code ? "return false;" : $code);
    }

    private function buildMethodPart(string $code, int $indent = 2): string
    {
        if ('' == $code) {
            return '';
        }
        $result = '';
        $codeLineList = explode("\n", $code);
        foreach ($codeLineList as $codeLine) {
            $line = '';
            for ($i = 0; $i < $indent; $i++) {
                $line .= "    ";
            }
            $result .= rtrim($line . $codeLine) . "\n";
        }

        return $result;
    }

    private function buildOnTransition(): string
    {
        return $this->buildMethodPart($this->spec->getOnTransition(), 3);
    }

    private function buildOnToken(int $indent = 2): string
    {
        return $this->buildMethodPart($this->spec->getOnToken(), $indent);
    }

    /**
     * @param string $context
     * @return Dfa
     * @throws Exception
     */
    private function getDfa(string $context): Dfa
    {
        if (!isset($this->dfa[$context])) {
            $this->dfa[$context] = $this->buildDfa($context);
        }

        return $this->dfa[$context];
    }

    /**
     * @param string $context
     * @return Dfa
     * @throws Exception
     */
    private function buildDfa(string $context): Dfa
    {
        $nfa = new Nfa();
        $startState = $nfa->getStateMap()->createState();
        $nfa->getStateMap()->addStartState($startState);
        $nfaRegExpMap = [];
        $this->tokenNfaStateMap[$context] = [];
        foreach ($this->spec->getTokenSpecList($context) as $tokenSpec) {
            $existingStates = $nfa->getStateMap()->getStateList();
            $regExpEntryState = $nfa->getStateMap()->createState();
            $nfa
                ->getEpsilonTransitionMap()
                ->addTransition($startState, $regExpEntryState, true);
            $this->buildRegExp($nfa, $regExpEntryState, $tokenSpec->getRegExp());
            $nfaRegExpMap[$tokenSpec->getRegExp()] = array_diff(
                $nfa->getStateMap()->getStateList(),
                $existingStates
            );
        }

        $dfa = DfaBuilder::fromNfa($nfa);
        $dfaRegExpMap = [];
        foreach (array_keys($nfaRegExpMap, null, true) as $regExp) {
            $dfaRegExpMap[$regExp] = [];
        }
        $allDfaStateIds = $dfa->getStateMap()->getStateList();
        foreach ($allDfaStateIds as $dfaStateId) {
            $nfaStateIds = $dfa->getStateMap()->getStateValue($dfaStateId);
            foreach ($nfaRegExpMap as $regExp => $nfaRegExpStateIds) {
                if (!empty(array_intersect($nfaStateIds, $nfaRegExpStateIds))) {
                    $dfaRegExpMap[(string) $regExp][] = $dfaStateId; // TODO: why the hell integer?..
                }
            }
        }
        foreach ($dfaRegExpMap as $regExp => $regExpStateIds) {
            $this->regExpMap[(string) $regExp] = [$regExpStateIds, array_diff($allDfaStateIds, $regExpStateIds)];
        }
        $nfaRegExpTransitionMap = new TransitionMap($nfa->getStateMap());
        foreach ($nfa->getSymbolTransitionMap()->getTransitionList() as $nfaSourceStateId => $nfaTransitionTargets) {
            foreach ($nfaTransitionTargets as $nfaTargetStateId => $nfaSymbolIds) {
                $regExps = [];
                foreach ($nfaRegExpMap as $regExp => $nfaRegExpIds) {
                    if (in_array($nfaSourceStateId, $nfaRegExpIds) || in_array($nfaTargetStateId, $nfaRegExpIds)) {
                        $regExps[] = (string) $regExp;
                    }
                }
                $nfaTransitionValue = [];
                foreach ($nfaSymbolIds as $nfaSymbolId) {
                    $nfaTransitionValue[$nfaSymbolId] = $regExps;
                }
                $nfaRegExpTransitionMap->addTransition($nfaSourceStateId, $nfaTargetStateId, $nfaTransitionValue);
            }
        }

        $this->dfaRegExpTransitionMap = new TransitionMap($dfa->getStateMap());
        foreach ($dfa->getTransitionMap()->getTransitionList() as $dfaSourceStateId => $dfaTransitionTargets) {
            foreach ($dfaTransitionTargets as $dfaTargetStateId => $dfaSymbolIds) {
                $matchingNfaSourceStateIds = $dfa->getStateMap()->getStateValue($dfaSourceStateId);
                $matchingNfaTargetStateIds = $dfa->getStateMap()->getStateValue($dfaTargetStateId);
                $dfaTransitionValue = [];
                foreach ($matchingNfaSourceStateIds as $nfaSourceStateId) {
                    foreach ($matchingNfaTargetStateIds as $nfaTargetStateId) {
                        if (
                            $nfa->getStateMap()->stateExists($nfaSourceStateId) && // TODO: find out invalid id
                            $nfa->getStateMap()->stateExists($nfaTargetStateId) &&
                            $nfaRegExpTransitionMap->transitionExists($nfaSourceStateId, $nfaTargetStateId)
                        ) {
                            $nfaTransitionValue = $nfaRegExpTransitionMap->getTransition(
                                $nfaSourceStateId,
                                $nfaTargetStateId
                            );
                            foreach ($dfaSymbolIds as $dfaSymbolId) {
                                if (isset($nfaTransitionValue[$dfaSymbolId])) {
                                    $dfaTransitionValue[$dfaSymbolId] = array_unique(
                                        array_merge(
                                            $dfaTransitionValue[$dfaSymbolId] ?? [],
                                            $nfaTransitionValue[$dfaSymbolId]
                                        )
                                    );
                                }
                            }
                        }
                    }
                }
                $this->dfaRegExpTransitionMap->addTransition($dfaSourceStateId, $dfaTargetStateId, $dfaTransitionValue);
            }
        }

        return $dfa;
    }

    /**
     * @return TransitionMap
     * @throws Exception
     */
    private function getRegExpTransitionMap(): TransitionMap
    {
        if (isset($this->dfaRegExpTransitionMap)) {
            return $this->dfaRegExpTransitionMap;
        }

        throw new Exception("Regular expression transition map not defined");
    }

    /**
     * @param Nfa    $nfa
     * @param int    $entryState
     * @param string $regExp
     * @throws Exception
     */
    private function buildRegExp(Nfa $nfa, int $entryState, string $regExp): void
    {
        $buffer = CharBufferFactory::createFromString($regExp);
        $tree = new Tree();
        ParserFactory::createFromBuffer($tree, $buffer)->run();
        $nfaBuilder = new NfaBuilder($nfa, PropertyLoader::create());
        $nfaBuilder->setStartState($entryState);
        (new Translator($tree, $nfaBuilder))->run();
    }
}
