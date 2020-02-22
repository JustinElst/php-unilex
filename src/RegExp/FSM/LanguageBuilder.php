<?php

namespace Remorhaz\UniLex\RegExp\FSM;

use Remorhaz\UniLex\Exception as UniLexException;

class LanguageBuilder
{

    private $symbolTable;

    private $transitionMap;

    public function __construct(SymbolTable $symbolTable, TransitionMap $transitionMap)
    {
        $this->symbolTable = $symbolTable;
        $this->transitionMap = $transitionMap;
    }

    public static function forNfa(Nfa $nfa): self
    {
        return new self($nfa->getSymbolTable(), $nfa->getSymbolTransitionMap());
    }

    /**
     * @param int   $stateIn
     * @param int   $stateOut
     * @param Range ...$ranges
     * @throws UniLexException
     */
    public function addTransition(int $stateIn, int $stateOut, Range ...$ranges): void
    {
        $rangeSetCalc = new RangeSetCalc();
        $newRangeSet = new RangeSet(...$ranges);
        $symbolList = [];
        $shouldAddNewSymbol = true;
        foreach ($this->symbolTable->getRangeSetList() as $symbolId => $oldRangeSet) {
            if ($rangeSetCalc->equals($oldRangeSet, $newRangeSet)) {
                $symbolList[] = $symbolId;
                $shouldAddNewSymbol = false;
                break;
            }
            $rangeSetDiff = $rangeSetCalc->xor($oldRangeSet, $newRangeSet);
            $onlyInOldRangeSet = $rangeSetCalc->and($oldRangeSet, $rangeSetDiff);
            if ($onlyInOldRangeSet->isEmpty()) {
                $symbolList[] = $symbolId;
                $newRangeSet = $rangeSetDiff;
                continue;
            }
            if ($rangeSetCalc->equals($onlyInOldRangeSet, $oldRangeSet)) {
                continue;
            }
            $splitSymbolId = $this
                ->symbolTable
                ->replaceSymbol($symbolId, $onlyInOldRangeSet)
                ->addSymbol($and = $rangeSetCalc->and($oldRangeSet, $newRangeSet));
            $this->splitSymbolInTransitions($symbolId, $splitSymbolId);
            $symbolList[] = $splitSymbolId;
            $newRangeSet = $rangeSetCalc->and($newRangeSet, $rangeSetDiff);
        }
        if ($shouldAddNewSymbol && !$newRangeSet->isEmpty()) {
            $newSymbolId = $this->symbolTable->addSymbol($newRangeSet);
            $symbolList[] = $newSymbolId;
        }
        $this->transitionMap->addTransition($stateIn, $stateOut, $symbolList);
    }

    private function splitSymbolInTransitions(int $symbolId, int $symbolToAdd): void
    {
        $addSymbol = function (array $symbolList) use ($symbolId, $symbolToAdd) {
            if (in_array($symbolId, $symbolList)) {
                $symbolList[] = $symbolToAdd;
            }

            return $symbolList;
        };
        $this->transitionMap->replaceEachTransition($addSymbol);
    }
}
