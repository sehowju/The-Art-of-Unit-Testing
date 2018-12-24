<?php

namespace Ch8\Tests;

use PHPUnit\Framework\TestCase;
use Ch8\Src\LogAnalyzer;

class ReadabilityTest extends TestCase
{
    const COUNT_NOT_READ_LIFE = -10;

    public function test_BadlyNamedTest()
    {
        $log = new LogAnalyzer();
        $result = $log->GetLineCount("abc.txt");
        $this->assertEquals(-100, $result);
    }

    public function test_BadAssertMessage()
    {
        $log = new LogAnalyzer();
        $result = $log->GetLineCount("abc.txt");
        $this->assertEquals(self::COUNT_NOT_READ_LIFE, $result, "result was " . self::COUNT_NOT_READ_LIFE . " instead of {$result}");
    }

    public function test_BadAssertStyle()
    {
        $this->assertEquals(self::COUNT_NOT_READ_LIFE, $log->GetLineCount("abc.txt"));
    }

}