<?php

namespace Ch7\Tests\LogAnalyzer;

use PHPUnit\Framework\TestCase;
use Ch7\Src\LogAnalyzer\LogAnalyzer;
use Ch7\Src\LogAnalyzer\LoggingFacility;
use Ch7\Src\LogAnalyzer\LoggerMemory;

class LogAnalyzerTest extends TestCase
{

    protected function setUp()
    {
        LoggingFacility::$logger = new LoggerMemory();
    }

    public function test_Analyze_EmptyFile_ThrowsException()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessageRegExp("~Not Exist$~");
        $la = new LogAnalyzer();
        $la->analyze("myemptyfile.txt");
    }

    public function test_Analyze_ShortFileName_WriteLog()
    {
        $this->expectOutputRegex("~FileName too short~");
        $la = new LogAnalyzer();
        $la->analyze("a.txt");
    }

    protected function tearDown()
    {
        LoggingFacility::$logger = null;
    }
}
