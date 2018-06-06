<?php

namespace Ch3\Tests;

use PHPUnit\Framework\TestCase;
use Ch3\Src\LogAnalyzerUsingFactoryMethod;
use Ch3\Src\ExtensionManagerFactory;
use Ch3\Src\ExtensionManagerInterface;

class LogAnalyzerUsingFactoryMethodTest extends TestCase
{
    public function test_IsValidFileName_NameSupportedExtension_ReturnsTrue()
    {
        $myFakeManager = new FakeExtensionManager();
        $myFakeManager->willBeValid = true;

        $log = new TestableLogAnalyzerUsingFactoryMethod($myFakeManager);
        $result = $log->isValidLogFileName("short.txt");
        $this->assertTrue($result);
    }
}

class TestableLogAnalyzerUsingFactoryMethod extends LogAnalyzerUsingFactoryMethod
{
    private $manager;

    public function __construct(ExtensionManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    protected function getManager(): ExtensionManagerInterface
    {
        return $this->manager;
    }
}
