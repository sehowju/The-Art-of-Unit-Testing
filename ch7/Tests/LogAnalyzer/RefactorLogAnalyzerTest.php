<?php

namespace Ch7\Tests\LogAnalyzer;

use Ch7\Src\LogAnalyzer\LogAnalyzer;

class RefactorLogAnalyzerTest extends RefactorBaseTest
{
    public function test_Analyze_EmptyFile_ThrowsException()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessageRegExp("~Not Exist$~");

        $this->fakeTheLogger();
        $la = new LogAnalyzer();
        $la->analyze("myemptyfile.txt");
    }
}
