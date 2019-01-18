<?php

namespace Ch7\Tests\StringParser;

use PHPUnit\Framework\TestCase;

abstract class TemplateStringParserTest extends TestCase
{
    abstract public function test_GetStringVersionFromHeader_SingleDigit_Found();
    abstract public function test_GetStringVersionFromHeader_WithMinorVersion_Found();
    abstract public function test_GetStringVersionFromHeader_WithRevision_Found();
    abstract public function test_HasCorrectHeader_NoSpaces_ReturnsTrue();
    abstract public function test_HasCorrectHeader_WithSpaces_ReturnsTrue();
    abstract public function test_HasCorrectHeader_MissingVersion_ReturnsFalse();
}
