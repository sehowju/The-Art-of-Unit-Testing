<?php

namespace Ch3\Tests;

use PHPUnit\Framework\TestCase;
use Ch3\Src\LogAnalyzerFactory;
use Ch3\Src\ExtensionManagerFactory;

class LogAnalyzerFactoryTest extends TestCase
{
    public function test_IsValidFileName_NameSupportedExtension_ReturnsTrue()
    {
        $myFakeManager = new FakeExtensionManager();
        $myFakeManager->willBeValid = true;
        ExtensionManagerFactory::setManager($myFakeManager);
        $log = new LogAnalyzerFactory();
        $result = $log->isValidLogFileName("short.txt");
        $this->assertTrue($result);
    }

    public function tearDown()
    {
        ExtensionManagerFactory::setManager(null);
    }
}
