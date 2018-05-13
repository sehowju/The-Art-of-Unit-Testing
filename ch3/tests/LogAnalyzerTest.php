<?php

namespace Ch3\Tests;

use PHPUnit\Framework\TestCase;
use Ch3\Src\LogAnalyzer;

class LogAnalyzerTest extends TestCase
{
    public function test_IsValidFileName_NameSupportedExtension_ReturnsTrue()
    {
        $myFakeManager = new FakeExtensionManager();
        $myFakeManager->willBeValid = true;

        $log = new LogAnalyzer($myFakeManager);

        $result = $log->isValidLogFileName("short.txt");
        $this->assertTrue($result);
    }

    public function test_IsValidFileName_ExtManagerThrowsException_ReturnsFalse()
    {
        $myFakeManager = new FakeExtensionManager();
        $myFakeManager->willBeValid = true;
        $myFakeManager->willThrow = new \Exception("this is fake");

        $log = new LogAnalyzer($myFakeManager);
        $result = $log->isValidLogFileName("anything.anyextension");

        $this->assertFalse($result);
    }
}
