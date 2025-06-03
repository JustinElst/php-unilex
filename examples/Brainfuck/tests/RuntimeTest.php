<?php

declare(strict_types=1);

namespace Remorhaz\UniLex\Example\Brainfuck\Test;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Remorhaz\UniLex\Example\Brainfuck\Command\OutputCommand;
use Remorhaz\UniLex\Example\Brainfuck\Exception as BrainfuckException;
use Remorhaz\UniLex\Example\Brainfuck\Runtime;

 #[CoversClass(Runtime::class)]
 #[CoversClass(OutputCommand::class)]
class RuntimeTest extends TestCase
{
    /**
     * @throws BrainfuckException
     */
    #[DataProvider('providerNonPositiveMemory')]
    public function testConstruct_NonPositiveMemory_ThrowsException(int $memory): void
    {
        $this->expectException(BrainfuckException::class);
        $this->expectExceptionMessage('Memory amount must be positive');
        new Runtime($memory);
    }

    /**
     * @return iterable<string, array{int}>
     */
    public static function providerNonPositiveMemory(): iterable
    {
        return [
            'Zero memory' => [0],
            'Negative memory' => [-1],
        ];
    }

    /**
     * @throws BrainfuckException
     */
    public function testGetOutput_NoOutputCommandsExecuted_ReturnsEmptyString(): void
    {
        $actualValue = (new Runtime())->getOutput();
        self::assertSame('', $actualValue);
    }

    /**
     * @throws BrainfuckException
     */
    public function testGetOutput_OutputCommandExecuted_ReturnsMatchingString(): void
    {
        $runtime = new Runtime();
        $command = new OutputCommand($runtime);
        $runtime->addCommand($command);
        $command->exec();
        $actualValue = $runtime->getOutput();
        self::assertSame("\0", $actualValue);
    }
}
