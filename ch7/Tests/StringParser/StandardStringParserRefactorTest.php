<?php

namespace Ch7\Tests\StringParser;

use Ch7\Src\StringParser\StandardStringParser;
use Ch7\Src\StringParser\StringParserInterface;

class StandardStringParserRefactorTest extends FillInTheBlanksStringParserTest
{
    protected function getParser(string $input): StringParserInterface
    {
        return new StandardStringParser($input);
    }

    protected function getHeaderVersionSingleDigit(): string
    {
        $version = self::EXPECTED_SINGLE_DIGIT;
        return "header\tversion={$version}\t\n";
    }

    protected function getHeaderVersionWithMinorVersion(): string
    {
        $version = self::EXPECTED_WITH_MINOR_VERSION;
        return "header\tversion={$version}\t\n";
    }

    protected function getHeaderVersionWithRevision(): string
    {
        $version = self::EXPECTED_WITH_REVISION;
        return "header\tversion={$version}\t\n";
    }
}
