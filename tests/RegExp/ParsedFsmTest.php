<?php

namespace Remorhaz\UniLex\Test\RegExp;

use PHPUnit\Framework\TestCase;
use Remorhaz\UniLex\AST\Tree;
use Remorhaz\UniLex\RegExp\FSM\StateMap;
use Remorhaz\UniLex\RegExp\ParserFactory;
use Remorhaz\UniLex\Unicode\CharBufferFactory;

/**
 * @covers \Remorhaz\UniLex\RegExp\FSM\StateMapBuilder
 * @covers \Remorhaz\UniLex\RegExp\FSM\StateMap::buildFromTree
 */
class ParsedFsmTest extends TestCase
{

    /**
     * @dataProvider providerRegExpStateMaps
     * @param string $text
     * @param array $expectedRangeTransitionList
     * @param array $expectedEpsilonTransitionList
     * @throws \Remorhaz\UniLex\Exception
     */
    public function testStateMapBuilder_ValidAST_BuildsMatchingStateMap(
        string $text,
        array $expectedRangeTransitionList,
        array $expectedEpsilonTransitionList
    ): void {
        $buffer = CharBufferFactory::createFromUtf8String($text);
        $tree = new Tree;
        ParserFactory::createFromBuffer($tree, $buffer)->run();
        $stateMap = StateMap::buildFromTree($tree);
        self::assertEquals($expectedRangeTransitionList, $stateMap->getCharTransitionList());
        self::assertEquals($expectedEpsilonTransitionList, $stateMap->getEpsilonTransitionList());
    }

    public function providerRegExpStateMaps(): array
    {
        $data = [];

        $rangeTransitionList = [];
        $epsilonTransitionList = [];
        $epsilonTransitionList[1][2] = true;
        $data["Empty string"] = ['', $rangeTransitionList, $epsilonTransitionList];

        $rangeTransitionList = [];
        $rangeTransitionList[1][2] = [[0x61, 0x61]];
        $epsilonTransitionList = [];
        $data["Single symbol"] = ['a', $rangeTransitionList, $epsilonTransitionList];

        $rangeTransitionList = [];
        $rangeTransitionList[1][2] = [[0x00, 0x10FFFF]];
        $epsilonTransitionList = [];
        $data["Single dot"] = ['.', $rangeTransitionList, $epsilonTransitionList];

        $rangeTransitionList = [];
        $rangeTransitionList[3][4] = [[0x61, 0x61]];
        $rangeTransitionList[5][6] = [[0x62, 0x62]];
        $epsilonTransitionList = [];
        $epsilonTransitionList[1][3] = true;
        $epsilonTransitionList[4][2] = true;
        $epsilonTransitionList[1][5] = true;
        $epsilonTransitionList[6][2] = true;
        $data["Alternative of two symbols"] = ['a|b', $rangeTransitionList, $epsilonTransitionList];

        $rangeTransitionList = [];
        $rangeTransitionList[3][4] = [[0x61, 0x61]];
        $epsilonTransitionList = [];
        $epsilonTransitionList[1][3] = true;
        $epsilonTransitionList[4][2] = true;
        $epsilonTransitionList[1][5] = true;
        $epsilonTransitionList[5][6] = true;
        $epsilonTransitionList[6][2] = true;
        $data["Alternative of symbol and empty string"] = ['a|', $rangeTransitionList, $epsilonTransitionList];

        $rangeTransitionList = [];
        $rangeTransitionList[5][6] = [[0x61, 0x61]];
        $epsilonTransitionList = [];
        $epsilonTransitionList[1][3] = true;
        $epsilonTransitionList[3][4] = true;
        $epsilonTransitionList[4][2] = true;
        $epsilonTransitionList[1][5] = true;
        $epsilonTransitionList[6][2] = true;
        $epsilonTransitionList[1][7] = true;
        $epsilonTransitionList[7][8] = true;
        $epsilonTransitionList[8][2] = true;
        $data["Alternative of symbol and two empty strings"] = ['|a|', $rangeTransitionList, $epsilonTransitionList];

        return $data;
    }
}
