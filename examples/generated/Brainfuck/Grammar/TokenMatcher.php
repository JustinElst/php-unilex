<?php
/**
 * Brainfuck token matcher.
 *
 * Auto-generated file, please don't edit manually.
 * Run following command to update this file:
 *     vendor/bin/phing example-brainfuck-matcher
 *
 * Phing version: 2.16.1
 */

namespace Remorhaz\UniLex\Example\Brainfuck\Grammar;

use Remorhaz\UniLex\CharBufferInterface;
use Remorhaz\UniLex\TokenFactoryInterface;
use Remorhaz\UniLex\TokenMatcherTemplate;

class TokenMatcher extends TokenMatcherTemplate
{

    public function match(CharBufferInterface $buffer, TokenFactoryInterface $tokenFactory): bool
    {
        $context = $this->createContext($buffer, $tokenFactory);
        goto state1;

        state1:
        if ($context->getBuffer()->isEnd()) {
            goto error;
        }
        $char = $context->getBuffer()->getSymbol();
        if (0x3E == $char) {
            $context->getBuffer()->nextSymbol();
            $context->setNewToken(TokenType::NEXT);
            return true;
        }
        if (0x3C == $char) {
            $context->getBuffer()->nextSymbol();
            $context->setNewToken(TokenType::PREV);
            return true;
        }
        if (0x2B == $char) {
            $context->getBuffer()->nextSymbol();
            $context->setNewToken(TokenType::INC);
            return true;
        }
        if (0x2D == $char) {
            $context->getBuffer()->nextSymbol();
            $context->setNewToken(TokenType::DEC);
            return true;
        }
        if (0x2E == $char) {
            $context->getBuffer()->nextSymbol();
            $context->setNewToken(TokenType::OUTPUT);
            return true;
        }
        if (0x2C == $char) {
            $context->getBuffer()->nextSymbol();
            $context->setNewToken(TokenType::INPUT);
            return true;
        }
        if (0x5B == $char) {
            $context->getBuffer()->nextSymbol();
            $context->setNewToken(TokenType::LOOP);
            return true;
        }
        if (0x5D == $char) {
            $context->getBuffer()->nextSymbol();
            $context->setNewToken(TokenType::END_LOOP);
            return true;
        }
        goto error;

        error:
        return false;
    }
}
