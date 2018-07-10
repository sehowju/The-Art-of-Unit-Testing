<?php

namespace Ch4\Tests;

use PHPUnit\Framework\TestCase;
use Ch4\Src\LogAnalyzer2;

class LogAnalyzer2Test extends TestCase
{
    public function test_Analyze_WebServiceThrows_SendsEmail()
    {
        $stubService = new FakeWebServiceException();
        $stubService->toThrow = new \Exception("fake exception");
        $mockEmail = new FakeEmailService();

        $log = new LogAnalyzer2($stubService, $mockEmail);
        $tooShortFileName = "abc.txt";
        $log->analyze($tooShortFileName);

        // $this->assert($mockService, $mockService->message);

        $this->assertContains("someone@somewhere.com", $mockEmail->to);
        $this->assertContains("can't log", $mockEmail->subject);
        $this->assertContains("fake exception", $mockEmail->body);
    }
}