<?php

namespace Ch7\Tests\StringParser;

use PHPUnit\Framework\TestCase;

abstract class FillInTheBlanksStringParserTest extends TestCase
{
    const EXPECTED_SINGLE_DIGIT = "1";
    const EXPECTED_WITH_MINOR_VERSION = "1.1";
    const EXPECTED_WITH_REVISION = "1.1.1";

    abstract protected function getParser(string $input);
    abstract protected function getHeaderVersionSingleDigit() : string;
    abstract protected function getHeaderVersionWithMinorVersion() : string;
    abstract protected function getHeaderVersionWithRevision() : string;

    public function test_GetStringVersionFromHeader_SingleDigit_Found()
    {
        $input = $this->getHeaderVersionSingleDigit();
        $parser = $this->getParser($input);
        $versionFromHeader = $parser->getStringVersionFromHeader();
        $this->assertEquals(self::EXPECTED_SINGLE_DIGIT, $versionFromHeader);
    }

    public function test_GetStringVersionFromHeader_WithMinorVersion_Found()
    {
        $input = $this->getHeaderVersionWithMinorVersion();
        $parser = $this->getParser($input);
        $versionFromHeader = $parser->getStringVersionFromHeader();
        $this->assertEquals(self::EXPECTED_WITH_MINOR_VERSION, $versionFromHeader);
    }

    public function test_GetStringVersionFromHeader_WithRevision_Found()
    {
        $input = $this->getHeaderVersionWithRevision();
        $parser = $this->getParser($input);
        $versionFromHeader = $parser->getStringVersionFromHeader();
        $this->assertEquals(self::EXPECTED_WITH_REVISION, $versionFromHeader);
    }
}
