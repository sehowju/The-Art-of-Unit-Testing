<?php

namespace Ch7\Tests\StringParser;

use PHPUnit\Framework\TestCase;
use Ch7\Src\StringParser\StringParserInterface;

abstract class GenericParserTest extends TestCase
{
    const EXPECTED_SINGLE_DIGIT = "1";
    const EXPECTED_WITH_MINOR_VERSION = "1.1";
    const EXPECTED_WITH_REVISION = "1.1.1";

    protected $parser;

    public function __construct($stringParser)
    {
        // method 1
        if (!in_array(StringParserInterface::class, class_implements($stringParser))) {
            throw new \LogicException('StringParserInterface Not Implement');
        }

        // method 2
        // $class = new \ReflectionClass($stringParser);
        // if (!$class->implementsInterface(StringParserInterface::class)) {
        //     throw new \LogicException('StringParserInterface Not Implement');
        // }
        parent::__construct();
        $this->parser = $stringParser;
    }

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

    protected function getParser($input): StringParserInterface
    {
        return new $this->parser($input);
    }
}
