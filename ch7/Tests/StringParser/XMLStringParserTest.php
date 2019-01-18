<?php

namespace Ch7\Tests\StringParser;

use Ch7\Src\StringParser\XMLStringParser;
use Ch7\Src\StringParser\StringParserInterface;

class XMLStringParserTest extends TemplateStringParserTest
{

    protected function getParser(string $input): StringParserInterface
    {
        return new XMLStringParser($input);
    }

    public function test_GetStringVersionFromHeader_SingleDigit_Found()
    {
        $parser = $this->getParser("<Header>1</Header>");
        $versionFromHeader = $parser->getStringVersionFromHeader();
        $this->assertEquals("1", $versionFromHeader);
    }

    public function test_GetStringVersionFromHeader_WithMinorVersion_Found()
    {
        $parser = $this->getParser("<Header>1.1</Header>");
        $versionFromHeader = $parser->getStringVersionFromHeader();
        $this->assertEquals("1.1", $versionFromHeader);
    }

    public function test_GetStringVersionFromHeader_WithRevision_Found()
    {
        $parser = $this->getParser("<Header>1.1.1</Header>");
        $versionFromHeader = $parser->getStringVersionFromHeader();
        $this->assertEquals("1.1.1", $versionFromHeader);
    }

    public function test_HasCorrectHeader_NoSpaces_ReturnsTrue()
    {
        $input = "<Header>1</Header>";
        $parser = $this->getParser($input);
        $result = $parser->HasCorrectHeader();
        $this->assertTrue($result);
    }

    public function test_HasCorrectHeader_WithSpaces_ReturnsTrue()
    {
        $input = "<Header>1 </Header>";
        $parser = $this->getParser($input);
        $result = $parser->HasCorrectHeader();
        $this->assertTrue($result);
    }

    public function test_HasCorrectHeader_MissingVersion_ReturnsFalse()
    {
        $input = "<Header></Header>";
        $parser = $this->getParser($input);
        $result = $parser->HasCorrectHeader();
        $this->assertFalse($result);
    }
}
