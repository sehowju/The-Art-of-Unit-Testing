<?php

namespace Ch5\Tests;

use PHPUnit\Framework\TestCase;
use Ch5\Src\LogAnalyzer;
use Ch5\Src\LoggerInterface;
use Ch5\Src\FileNameRulesInterface;

class LogAnalyzerTest extends TestCase
{
    public function test_Analyze_TooShortFileName_CallLogger()
    {
        $logger = new FakeLogger();
        $analyzer = new LogAnalyzer($logger);
        $analyzer->minNameLength = 6;
        $analyzer->analyze("a.txt");
        $this->assertContains("too short", $logger->lastError);
    }

    public function test_Analyze_TooShortFileName_CallLogger_MockObject()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->once())->method('logError')->with($this->equalTo("Filename too short: a.txt"));
        $analyzer = new LogAnalyzer($logger);
        $analyzer->minNameLength = 6;
        $analyzer->analyze("a.txt");
    }

    public function test_Analyze_TooShortFileName_CallLogger_MockAndStub()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->once())->method('logError')->with($this->equalTo("Filename too short: a.txt"));

        $rules = $this->createMock(FileNameRulesInterface::class);
        $rules->expects($this->atLeastOnce())->method('isValidLogFileName')->with($this->stringContains("txt"))->willReturn(false);

        $analyzer = new LogAnalyzer($logger, $rules);
        $analyzer->minNameLength = 6;
        // $analyzer->analyze("a.txt");

        $this->assertFalse($analyzer->analyze("a.txt"));
    }


    public function test_Returns_ByDefault_WorksForHardCodeArgument()
    {
        $fakeRules = $this->createMock(FileNameRulesInterface::class);
        $fakeRules->method('isValidLogFileName')->with($this->equalTo("strict.txt"))->willReturn(true);
        $this->assertTrue($fakeRules->isValidLogFileName("strict.txt"));
    }

    public function test_Returns_ByDefault_WorksForAnyArgument()
    {
        $fakeRules = $this->createMock(FileNameRulesInterface::class);
        $fakeRules->method('isValidLogFileName')->with($this->isType('string'))->willReturn(true);
        $this->assertTrue($fakeRules->isValidLogFileName("strict.txt"));
    }

    public function test_Returns_ArgAny_Throws()
    {
        $this->expectException(\Exception::class);
        $fakeRules = $this->createMock(FileNameRulesInterface::class);
        $fakeRules->method('isValidLogFileName')->with($this->isType('string'))->will($this->throwException(new \Exception));
        $fakeRules->isValidLogFileName("strict.txt");
    }

    public function test_Analyze_TooShortFileName_CallLogger_Prophecy()
    {
        $logger = $this->prophesize(LoggerInterface::class);
        $logger->logError("Filename too short: a.txt")->shouldBeCalled();
        $analyzer = new LogAnalyzer($logger->reveal());
        $analyzer->minNameLength = 6;
        $analyzer->analyze("a.txt");
    }

}

// method()->expects()->with()->will()