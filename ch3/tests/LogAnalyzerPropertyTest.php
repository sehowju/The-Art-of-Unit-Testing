<?php

namespace Ch3\Tests;

use PHPUnit\Framework\TestCase;
use Ch3\Src\LogAnalyzerProperty;

class LogAnalyzerPropertyTest extends TestCase
{
    public function test_IsValidFileName_NameSupportedExtension_UseProperty_ReturnsTrue()
    {
        $myFakeManager = new FakeExtensionManager();
        $myFakeManager->willBeValid = true;
        $log = new LogAnalyzerProperty();
        $log->manager = $myFakeManager;
        $result = $log->isValidLogFileName("short.txt");
        $this->assertTrue($result);
    }

    public function test_IsValidFileName_NameSupportedExtension_UseSetter_ReturnsTrue()
    {
        $myFakeManager = new FakeExtensionManager();
        $myFakeManager->willBeValid = true;
        $log = new LogAnalyzerProperty();
        $log->setManager($myFakeManager);
        $result = $log->isValidLogFileName("short.txt");
        $this->assertTrue($result);
    }

}
