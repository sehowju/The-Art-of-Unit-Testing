<?php

namespace Ch3\Tests;

use PHPUnit\Framework\TestCase;
use Ch3\Src\LogAnalyzerUsingOverrideMethod;
use Ch3\Src\ExtensionManagerFactory;

class LogAnalyzerUsingOverrideMethodTest extends TestCase
{
    public function test_IsValidFileName_NameSupportedExtension_ReturnsTrue()
    {
        $log = new TestableLogAnalyzer();
        $log->isSupported = true;

        $result = $log->isValidLogFileName("short.txt");

        $this->assertTrue($result);
    }
}

class TestableLogAnalyzer extends LogAnalyzerUsingOverrideMethod
{
    public $isSupported;

    protected function isValid($fileName): bool
    {
        return $this->isSupported;
    }
}
