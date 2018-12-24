<?php

namespace Ch8\Tests;

use PHPUnit\Framework\TestCase;
use Ch8\Src\LogAnalyzerWithInit;

class IsolationsAntiPatterns extends TestCase
{
    private $logan;

    public function test_CreateAnalyzer_BadFileName_ReturnFalse()
    {
        $this->logan = new LogAnalyzerWithInit();
        $this->logan->initialize();
        $valid = $this->logan->isValid("abc");
        $this->assertTrue($valid);
    }

    public function test_CreateAnalyzer_BadFileName_ReturnTrue()
    {
        $valid = $this->logan->isValid("abcdefg");
        $this->assertTrue($valid);
    }

    public function test_CreateAnalyzer_BadFileName_ReturnFalse_Depends()
    {
        $this->logan = new LogAnalyzerWithInit();
        $this->logan->initialize();
        $valid = $this->logan->isValid("abc");
        $this->assertTrue($valid);
        return $this->logan;
    }

    /**
     * @depends test_CreateAnalyzer_BadFileName_ReturnFalse_Depends
     * https://stackoverflow.com/questions/5310613/phpunit-store-properties-on-test-class
     */
    public function test_CreateAnalyzer_BadFileName_ReturnTrue_Depends($logan)
    {
        $valid = $logan->isValid("abcdefg");
        $this->assertTrue($valid);
    }

}
