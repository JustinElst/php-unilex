<?php

declare(strict_types=1);

namespace Remorhaz\UniLex\Example\SimpleExpr\Test\Grammar;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Remorhaz\UniLex\Example\SimpleExpr\Grammar\ConfigFile;

#[CoversClass(ConfigFile::class)]
class ConfigFileTest extends TestCase
{
    public function testGetPath_Called_ReturnsStringgEndsWithConfigFileName(): void
    {
        $actualValue = ConfigFile::getPath();
        self::assertStringEndsWith(DIRECTORY_SEPARATOR . "Config.php", $actualValue);
    }
}
