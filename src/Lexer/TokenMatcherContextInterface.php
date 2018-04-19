<?php

namespace Remorhaz\UniLex\Lexer;

use Remorhaz\UniLex\CharBufferInterface;
use Remorhaz\UniLex\Token;

interface TokenMatcherContextInterface
{

    public function setNewToken(int $tokenType): self;

    public function setTokenAttribute(string $name, $value): self;

    public function getToken(): Token;

    public function getBuffer(): CharBufferInterface;

    public function storeCurrentSymbol(): self;

    /**
     * @return int[]
     */
    public function getStoredSymbolList(): array;

    public function getSymbolString(): string;
}
