<?php

namespace Ch3\Tests;

use PHPUnit\Framework\TestCase;
use Ch3\Src\LogAnalyzerException;

class LogAnalyzerExceptionTest extends TestCase
{
    public function test_IsValidFileName_ExtManagerThrowsException_ReturnsFalse()
    {
        $myFakeManager = new FakeExtensionManager();
        $myFakeManager->willBeValid = true;
        $myFakeManager->willThrow = new \Exception("this is fake");

        $log = new LogAnalyzerException($myFakeManager);
        $result = $log->isValidLogFileName("anything.anyextension");

        $this->assertFalse($result);
    }
}
