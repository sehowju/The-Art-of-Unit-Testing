<?php

namespace Ch4\Tests;

use PHPUnit\Framework\TestCase;
use Ch4\Src\LogAnalyzerEmailInfo;
use Ch4\Src\EmailInfo;

class LogAnalyzerEmailInfoTest extends TestCase
{
    public function test_Analyze_WebServiceThrows_SendsEmail()
    {
        $stubService = new FakeWebService();
        $stubService->toThrow = new \Exception("fake exception");
        $mockEmail = new FakeEmailServiceByEmailInfo();

        $log = new LogAnalyzerEmailInfo($stubService, $mockEmail);
        $tooShortFileName = "abc.txt";
        $log->analyze($tooShortFileName);

        $expectedEmail = new EmailInfo();
        $expectedEmail->to = "someone@somewhere.com";
        $expectedEmail->subject = "can't log";
        $expectedEmail->body = "fake exception";
        $this->assertEquals($expectedEmail, $mockEmail->emailInfo);
    }
}