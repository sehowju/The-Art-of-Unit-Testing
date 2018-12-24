<?php

namespace Ch8\Tests;

use PHPUnit\Framework\TestCase;
use Ch8\Src\LogAnalyzer;

class LogAnalyzerTest extends TestCase
{
    public function test_IsValid_LengthBiggerThan8_IsFalse()
    {
        $logan = new LogAnalyzer();
        $valid = $logan->isValid("123456789");

        $this->assertFalse($valid);
    }

    public function test_IsValid_LengthSmallerThan8_IsTrue()
    {
        $logan = new LogAnalyzer();
        $valid = $logan->isValid("1234567");

        $this->assertTrue($valid);
    }
}