<?php

namespace Ch2\Tests;

use PHPUnit\Framework\TestCase;
use Ch2\Src\LogAnalyzer;

class LogAnalyzerSetupTeardownTest extends TestCase
{
    private $analyzer = null;

    public static function setUpBeforeClass()
    {
        echo "setUp before class" . PHP_EOL;
    }

    public function setUp()
    {
        echo "setUp" . PHP_EOL;
        $this->analyzer = new LogAnalyzer();
    }

    public function test_IsValidFileName_GoodExtensionLowercase_ReturnTrue()
    {
        echo "test" . PHP_EOL;

        $result = $this->analyzer->isValidLogFileName("filewithbadextension.slf");

        $this->assertTrue($result);
    }

    public function test_IsValidFileName_GoodExtensionUppercase_ReturnTrue()
    {
        echo "test" . PHP_EOL;

        $result = $this->analyzer->isValidLogFileName("filewithbadextension.SLF");

        $this->assertTrue($result);
    }

    /**
     * @param       string $file
     * @param       bool $expected
     * @testWith    ["filewithbadextension.SLF", true]
     *              ["filewithbadextension.slf", true]
     *              ["filewithbadextension.foo", false]
     */
    public function test_IsValidFileName_VariousExtensions_ChecksThem(string $file, bool $expected)
    {
        echo "test" . PHP_EOL;

        $result = $this->analyzer->isValidLogFileName($file);

        $this->assertEquals($expected, $result);
    }

    public function tearDown()
    {
        // 只是為了 Demo
        // 請不要在實務上這麼寫
        echo "tearDown" . PHP_EOL;
        $this->analyzer = null;
    }

    public static function tearDownAfterClass()
    {
        echo "tearDown after class" . PHP_EOL;
    }
}