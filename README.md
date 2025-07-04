# UniLex

[![Latest Stable Version](https://poser.pugx.org/remorhaz/php-unilex/version)](https://packagist.org/packages/remorhaz/php-unilex)
[![Build](https://github.com/remorhaz/php-unilex/actions/workflows/build.yml/badge.svg)](https://github.com/remorhaz/php-unilex/actions/workflows/build.yml)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/remorhaz/php-unilex/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/remorhaz/php-unilex/?branch=master)
[![codecov](https://codecov.io/gh/remorhaz/php-unilex/branch/master/graph/badge.svg)](https://codecov.io/gh/remorhaz/php-unilex)
[![Mutation testing badge](https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fremorhaz%2Fphp-unilex%2Fmaster)](https://dashboard.stryker-mutator.io/reports/github.com/remorhaz/php-unilex/master)
[![Total Downloads](https://poser.pugx.org/remorhaz/php-unilex/downloads)](https://packagist.org/packages/remorhaz/php-unilex)
[![License](https://poser.pugx.org/remorhaz/php-unilex/license)](https://packagist.org/packages/remorhaz/php-unilex)

UniLex is lexical analyzer generator (similar to `lex` and `flex`) with Unicode support.
It's written in PHP and generates code in PHP.

```
[WIP] Work in progress
```
## Requirements
* PHP ^8.2

***
## License
UniLex library is licensed under MIT license.

## Installation
Installation is as simple as any other [composer](https://getcomposer.org/) library's one:
```
composer require remorhaz/php-unilex
```

## Usage
### Quick start in example
Let's imagine we want to write a simple calculator and we need a lexer (lexical analyzer) that provides a stream of IDs, numbers and operators.
Create a new Composer project and execute following command from project directory:
```
composer require --dev remorhaz/php-unilex
```
Next step is creating a lexer specification in `LexerSpec.php` file. We use `@lexToken` tag in comments to specify regular expression for a token:
```php
<?php
/**
 * @var \Remorhaz\UniLex\Lexer\TokenMatcherContextInterface $context
 * @lexTargetClass TokenMatcher
 * @lexHeader
 */

const TOKEN_ID = 1;
const TOKEN_OPERATOR = 2;
const TOKEN_NUMBER = 3;

/** @lexToken /[a-zA-Z][0-9a-zA-Z]*()/ */
$context->setNewToken(TOKEN_ID);

/** @lexToken /[+\-*\/]/ */
$context->setNewToken(TOKEN_OPERATOR);

/** @lexToken /[0-9]+/ */
$context->setNewToken(TOKEN_NUMBER);
```
Next step is building a token matcher from specification:
```
vendor/bin/unilex LexerSpec.php > TokenMatcher.php
```
Now we have a compiled token matcher in `TokenMatcher.php` file. Let's use it and read all tokens from the buffer:
```php
<?php

use Remorhaz\UniLex\Lexer\TokenFactory;
use Remorhaz\UniLex\Lexer\TokenReader;
use Remorhaz\UniLex\Unicode\CharBufferFactory;

require_once "vendor/autoload.php";
require_once "TokenMatcher.php";

$buffer = CharBufferFactory::createFromString("x+2*3");
$tokenReader = new TokenReader($buffer, new TokenMatcher, new TokenFactory(0xFF));

do {
    $token = $tokenReader->read();
    echo "Token ID: {$token->getType()}\n";
} while (!$token->isEoi());
```
On execution this script outputs:
```
Token ID: 1
Token ID: 2
Token ID: 3
Token ID: 2
Token ID: 3
Token ID: 255
```
Let's go a bit further and make it possible to retrieve text presentation of every token from input buffer. We need to modify a lexer specification to attach the result to each non-EOI token as an attribute:
```php
<?php
/**
 * @var \Remorhaz\UniLex\Lexer\TokenMatcherContextInterface $context
 * @lexTargetClass TokenMatcher
 * @lexHeader
 */

const TOKEN_ID = 1;
const TOKEN_OPERATOR = 2;
const TOKEN_NUMBER = 3;

/** @lexToken /[a-zA-Z][0-9a-zA-Z]*()/ */
$context
    ->setNewToken(TOKEN_ID)
    ->setTokenAttribute('text', $context->getSymbolString());

/** @lexToken /[+\-*\/]/ */
$context
    ->setNewToken(TOKEN_OPERATOR)
    ->setTokenAttribute('text', $context->getSymbolString());

/** @lexToken /[0-9]+/ */
$context
    ->setNewToken(TOKEN_NUMBER)
    ->setTokenAttribute('text', $context->getSymbolString());
```
After rebuilding token matcher with CLI utility we need to modify output cycle of our example program to make it print text with token IDs:
```php
do {
    $token = $tokenReader->read();
    echo
        "Token ID: {$token->getType()}",
        $token->isEoi() ? "\n" : " / '{$token->getAttribute('text')}'\n";
} while (!$token->isEoi());
```
And now program prints:
```
Token ID: 1 / 'x'
Token ID: 2 / '+'
Token ID: 3 / '2'
Token ID: 2 / '*'
Token ID: 3 / '3'
Token ID: 255
```

### CLI
You can use command-line utility to build token matcher from specification:
```
vendor/bin/unilex path/to/spec/LexerSpec.php path/to/target/TokenMatcher.php --desc="My example matcher."
```

## Specification
Specification is a PHP file that is split in parts by DocBlock comments with special tags. There is a special variable `$context` that contains context object with `\Remorhaz\UniLex\Lexer\TokenMatcherContextInterface` interface. Current implementation also uses `int` variable `$char` that contains current symbol (TODO: should be moved into context object).
### @lexHeader
This block can contain `namespace` and `use` statements that will be used during matcher generation.
### @lexBeforeMatch
This block is executed before the beginning of matching procedure and can be used to initialize some additional variables.
### @lexOnTransition
This block is executed on each symbol matched by token's regular expression.
### @lexToken /regexp/
This block is executed on matching given regular expression from the input buffer. Most commonly it just setups new token in context object.
### @lexMode 'mode_name'
This tag tells parser that matching `@lexToken` expression matches only if current lexical mode is `mode_name`. Lexical mode can be switched with `$context->setMode('mode_name')` method. Using lexical modes allows to have several "sub-grammars" in one specification (i. e. some tokens can be recognized only in comments or strings).
### @lexOnError
This block is executed if matcher fails to match any of token's regular expressions. By default it just returns `false`.
