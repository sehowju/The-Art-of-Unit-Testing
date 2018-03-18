<?php

namespace Ch2\Tests;

use PHPUnit\Framework\TestCase;
use Ch2\Src\LogAnalyzer;

class LogAnalyzerPropertyTest extends TestCase
{
    public function test_IsValidFileName_ByDefault_ReturnFalse()
    {
        $analyzer = $this->makeAnalyzer();

        $this->assertFalse($analyzer->wasLastFileNameValid);
    }

    public function test_IsValidFileName_WhenCalled_ChangesWasLastFileNameValid()
    {
        $analyzer = $this->makeAnalyzer();

        $analyzer->isValidLogFileName("badname.foo");

        $this->assertFalse($analyzer->wasLastFileNameValid);
    }

    /**
     * @param       string $file
     * @param       bool $expected
     * @testWith    ["badfile.foo", false]
     *              ["goodfile.slf", true]
     */
    public function test_IsValidFileName_WhenCalled_ChangesWasLastFileNameValid_UseParameters(string $fileName, bool $expected)
    {
        $analyzer = $this->makeAnalyzer();

        $analyzer->isValidLogFileName($fileName);

        $this->assertEquals($expected, $analyzer->wasLastFileNameValid);
    }

    private function makeAnalyzer(): LogAnalyzer
    {
        return new LogAnalyzer();
    }
}