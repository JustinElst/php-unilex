<?php

/** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types=1);

namespace Remorhaz\UniLex\Tool\RegExp\Properties;

use Remorhaz\UniLex\RegExp\FSM\Range;
use Remorhaz\UniLex\RegExp\FSM\RangeSet;

/** phpcs:disable Generic.Files.LineLength.TooLong */
return RangeSet::loadUnsafe(new Range(0xe01, 0xe3a), new Range(0xe40, 0xe5b));
