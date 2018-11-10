<?php

namespace Ch2\Tests;

use PHPUnit\Framework\TestCase;
use Ch2\Src\LogAnalyzer;

class LogAnalyzerTest extends TestCase
{
    /**
     * @test
     */
    public function isValidFileName_BadExtension_ReturnFalse()
    {
        $analyzer = new LogAnalyzer();

        $result = $analyzer->isValidLogFileName("filewithbadextension.foo");

        $this->assertFalse($result);
    }

    public function test_IsValidFileName_BadExtension_ReturnFalse()
    {
        $analyzer = new LogAnalyzer();

        $result = $analyzer->isValidLogFileName("filewithbadextension.foo");

        $this->assertFalse($result);
    }

    public function test_IsValidFileName_GoodExtensionLowercase_ReturnTrue()
    {
        $analyzer = new LogAnalyzer();

        $result = $analyzer->isValidLogFileName("filewithbadextension.slf");

        $this->assertTrue($result);
    }

    public function test_IsValidFileName_GoodExtensionUppercase_ReturnTrue()
    {
        $analyzer = new LogAnalyzer();

        $result = $analyzer->isValidLogFileName("filewithbadextension.SLF");

        $this->assertTrue($result);
    }

    /**
     * @param       string $file
     * @testWith    ["filewithbadextension.SLF"]
     *              ["filewithbadextension.slf"]
     */
    public function test_IsValidFileName_ValidExtensions_ReturnTrue(string $file)
    {
        $analyzer = new LogAnalyzer();

        $result = $analyzer->isValidLogFileName($file);

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
        $analyzer = new LogAnalyzer();

        $result = $analyzer->isValidLogFileName($file);

        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider extensionProvider
     */
    public function test_IsValidFileName_VariousExtensionProvider_ChecksThem(string $file, bool $expected)
    {
        $analyzer = new LogAnalyzer();

        $result = $analyzer->isValidLogFileName($file);

        $this->assertEquals($expected, $result);
    }

    public function extensionProvider() {
        return [
            ["filewithbadextension.SLF", true],
            ["filewithbadextension.slf", true],
            ["filewithbadextension.foo", false],
        ];
    }
}