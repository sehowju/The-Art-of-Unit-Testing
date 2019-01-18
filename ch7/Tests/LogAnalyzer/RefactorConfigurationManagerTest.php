<?php

namespace Ch7\Tests\LogAnalyzer;

use Ch7\Src\LogAnalyzer\ConfigurationManager;

class RefactorConfigurationTest extends RefactorBaseTest
{
    public function test_Analyze_EmptyFile_ThrowsException()
    {
        $this->expectOutputRegex("~checking~");
        $this->expectException(\Exception::class);
        $this->expectExceptionMessageRegExp("~Not Exist$~");

        $this->fakeTheLogger();
        $cm = new ConfigurationManager();
        $configured = $cm->isConfigured("something");
    }
}
