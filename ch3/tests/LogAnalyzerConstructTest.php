<?php

namespace Ch3\Tests;

use PHPUnit\Framework\TestCase;
use Ch3\Src\LogAnalyzerConstruct;

class LogAnalyzerConstructTest extends TestCase
{
    public function test_IsValidFileName_NameSupportedExtension_ReturnsTrue()
    {
        $myFakeManager = new FakeExtensionManager();
        $myFakeManager->willBeValid = true;

        $log = new LogAnalyzerConstruct($myFakeManager);

        $result = $log->isValidLogFileName("short.txt");
        $this->assertTrue($result);
    }
}
