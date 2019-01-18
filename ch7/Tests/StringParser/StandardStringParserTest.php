<?php

namespace Ch7\Tests\StringParser;

use PHPUnit\Framework\TestCase;
use Ch7\Src\StringParser\StandardStringParser;
use Ch7\Src\StringParser\StringParserInterface;

class StandardStringParserTest extends TestCase
{
    private function getParser(string $input): StringParserInterface
    {
        return new StandardStringParser($input);
    }

    public function test_GetStringVersionFromHeader_SingleDigit_Found()
    {
        $input = "header;version=1;\n";
        $parser = $this->getParser($input);
        $versionFromHeader = $parser->getStringVersionFromHeader();
        $this->assertEquals("1", $versionFromHeader);
    }

    public function test_GetStringVersionFromHeader_WithMinorVersion_Found()
    {
        $input = "header;version=1.1;\n";
        $parser = $this->getParser($input);
        $versionFromHeader = $parser->getStringVersionFromHeader();
        $this->assertEquals("1.1", $versionFromHeader);
    }

    public function test_GetStringVersionFromHeader_WithRevision_Found()
    {
        $input = "header;version=1.1.1;\n";
        $parser = $this->getParser($input);
        $versionFromHeader = $parser->getStringVersionFromHeader();
        $this->assertEquals("1.1.1", $versionFromHeader);
    }

    public function test_HasCorrectHeader_NoSpaces_ReturnsTrue()
    {
        $input = "header;version=1.1.1;\n";
        $parser = $this->getParser($input);
        $result = $parser->HasCorrectHeader();
        $this->assertTrue($result);
    }

    public function test_HasCorrectHeader_WithSpaces_ReturnsTrue()
    {
        $input = "header;version=1.1.1 ; \n";
        $parser = $this->getParser($input);
        $result = $parser->HasCorrectHeader();
        $this->assertTrue($result);
    }

    public function test_HasCorrectHeader_MissingVersion_ReturnsFalse()
    {
        $input = "header; \n";
        $parser = $this->getParser($input);
        $result = $parser->HasCorrectHeader();
        $this->assertFalse($result);
    }
}
