<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/examples',
        __DIR__ . '/spec',
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
    ->withPhpSets( php84: true)
    ->withPreparedSets(
        deadCode: true,
        codingStyle: true,
        typeDeclarations: true,
        codeQuality: true
    );
