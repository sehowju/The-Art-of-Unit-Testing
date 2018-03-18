<?php

namespace Ch2\Tests;

use PHPUnit\Framework\TestCase;
use Ch2\Src\LogAnalyzer;

class LogAnalyzerExceptionTest extends TestCase
{
    private $analyzer;

    public function test_IsValidFileName_EmptyFileName_ThrowsException_UseMethod()
    {
        $this->analyzer = $this->makeAnalyzer();

        // Put expectException before SUT method
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage("filename has to be provided");
        // $this->expectExceptionMessageRegExp("^filename has to be provided$");
        $this->analyzer->isValidLogFileName("");
    }

    /**
     * @expectedException                   \InvalidArgumentException
     * @expectedExceptionCode               0
     * @expectedExceptionMessage            filename has to be provided
     * @expectedExceptionMessageRegExp      ^filename has to be provided$
     */
    public function test_IsValidFileName_EmptyFileName_ThrowsException_UseAnnotation()
    {
        $this->analyzer = $this->makeAnalyzer();
        $this->analyzer->isValidLogFileName("");
    }

    public function test_IsValidFileName_EmptyFileName_Throws()
    {
        $this->analyzer = $this->makeAnalyzer();
        try {
            $this->analyzer->isValidLogFileName("");
        } catch (\Exception $e) {
            $this->assertInstanceOf(\InvalidArgumentException::class, $e);
            $this->assertEquals("filename has to be provided", $e->getMessage());
            $this->assertEquals(0, $e->getCode());
        }
    }

    /**
     * @doesNotPerformAssertions
     */
    public function test_IsValidFileName_ValidFile_Throws()
    {
    }

    public function test_IsValidFileName_ValidFile_InComplete()
    {
        $this->markTestIncomplete();
    }

    public function test_IsValidFileName_ValidFile_Skipped()
    {
        $this->markTestSkipped();
    }

    public function test_IsValidFileName_EmptyFileName_ThrowsFluent()
    {
        $this->analyzer = $this->makeAnalyzer();
        try {
            $this->analyzer->isValidLogFileName("");
        } catch (\Exception $e) {
            $this->assertThat(
                $e, $this->logicalOr(
                    $this->isInstanceOf(\InvalidArgumentException::class),
                    $this->isInstanceOf(LengthException::class)
                )
            );
        }
    }

    /**
     * @group fast
     */
    public function test_IsValidFileName_GoodExtensionUppercase_ReturnTrue()
    {
        $analyzer = new LogAnalyzer();

        $result = $analyzer->isValidLogFileName("filewithbadextension.SLF");

        $this->assertTrue($result);
    }

    private function makeAnalyzer(): LogAnalyzer
    {
        return new LogAnalyzer();
    }
}
