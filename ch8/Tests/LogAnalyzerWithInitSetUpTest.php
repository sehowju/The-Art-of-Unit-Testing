<?php

namespace Ch8\Tests;

use PHPUnit\Framework\TestCase;
use Ch8\Src\LogAnalyzerWithInit;

class LogAnalyzerWithInitSetUpTest extends TestCase
{

    private $logan;

    public function setUp()
    {
        $this->logan = new LogAnalyzerWithInit();
        $this->logan->initialize();
    }

    public function test_IsValid_LengthBiggerThan8_IsFalse()
    {
        $valid = $this->logan->isValid("123456789");

        $this->assertFalse($valid);
    }

    public function test_IsValid_LengthSmallerThan8_IsTrue()
    {
        $valid = $this->logan->isValid("1234567");

        $this->assertTrue($valid);
    }

}