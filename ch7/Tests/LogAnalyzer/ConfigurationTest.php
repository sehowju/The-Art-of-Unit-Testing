<?php

namespace Ch7\Tests\LogAnalyzer;

use PHPUnit\Framework\TestCase;
use Ch7\Src\LogAnalyzer\LoggingFacility;
use Ch7\Src\LogAnalyzer\ConfigurationManager;
use Ch7\Src\LogAnalyzer\LoggerMemory;

class ConfigurationTest extends TestCase
{
    protected function setUp()
    {
        LoggingFacility::$logger = new LoggerMemory();
    }

    public function test_Analyze_EmptyFile_ThrowsException()
    {
        $this->expectOutputRegex("~checking~");
        $this->expectException(\Exception::class);
        $this->expectExceptionMessageRegExp("~Not Exist$~");
        $cm = new ConfigurationManager();
        $configured = $cm->isConfigured("something");
    }

    protected function tearDown()
    {
        LoggingFacility::$logger = null;
    }
}
