<?php

namespace Ch8\Tests;

use PHPUnit\Framework\TestCase;
use Ch8\Src\LogAnalyzerWithInit;

class LogAnalyzerWithInitWithInitFactoryTest extends TestCase
{
    public function test_IsValid_LengthBiggerThan8_IsFalse()
    {
        $logan = $this->getNewAnalyzer();
        $valid = $logan->isValid("123456789");

        $this->assertFalse($valid);
    }

    public function test_IsValid_LengthSmallerThan8_IsTrue()
    {
        $logan = $this->getNewAnalyzer();
        $valid = $logan->isValid("1234567");

        $this->assertTrue($valid);
    }

    private function getNewAnalyzer(): LogAnalyzerWithInit
    {
        $analyzer = new LogAnalyzerWithInit();
        $analyzer->initialize();
        return $analyzer;
    }

}