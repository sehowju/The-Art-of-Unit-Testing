<?php

namespace Ch4\Tests;

use PHPUnit\Framework\TestCase;
use Ch4\Src\LogAnalyzer;

class LogAnalyzerTest extends TestCase
{
    public function test_Analyze_TooShortFileName_CallsWebService()
    {
        $mockService = new FakeWebService();

        $log = new LogAnalyzer($mockService);
        $tooShortFileName = "abc.txt";
        $log->analyze($tooShortFileName);

        $this->assertContains("Filename too short: abc.txt", $mockService->message);
    }
}
