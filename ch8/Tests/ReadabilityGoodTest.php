<?php

namespace Ch8\Tests;

use PHPUnit\Framework\TestCase;
use Ch8\Src\LogAnalyzer;

class ReadabilityTest extends TestCase
{
    const COUNT_NOT_READ_LIFE = -10;

    public function test_GoodlyNamedTest()
    {
        $log = new LogAnalyzer();
        $result = $log->GetLineCount("abc.txt");
        $this->assertEquals(self::COUNT_NOT_READ_LIFE, $result);
    }

    public function test_GoodAssertMessage()
    {
        $log = new LogAnalyzer();
        $result = $log->GetLineCount("abc.txt");
        $this->assertEquals(self::COUNT_NOT_READ_LIFE, $result, "Calling GetLineCount() for non-existing file should have returned a " . self::COUNT_NOT_READ_LIFE);
    }

    public function test_GoodAssertStyle()
    {
        $result = $log->GetLineCount("abc.txt");
        $this->assertEquals(self::COUNT_NOT_READ_LIFE, $result);
    }

}