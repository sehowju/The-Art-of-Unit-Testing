<?php

namespace Ch8\Tests;

use PHPUnit\Framework\TestCase;
use Ch8\Src\LogAnalyzerWithInit;

class HiddenTestCall extends TestCase
{
    private $logan;

    public function test_CreateAnalyzer_GoodNameAndBadNameUsage()
    {
        $this->logan = new LogAnalyzerWithInit();
        $this->logan->initialize();

        $valid = $this->logan->isValid("abc");
        $this->assertTrue($valid);
        $this->test_CreateAnalyzer_GoodFileName_ReturnTrue();
    }

    public function test_CreateAnalyzer_GoodFileName_ReturnTrue()
    {
        $valid = $this->logan->isValid("abcdefg");
        $this->assertTrue($valid);
    }

}
