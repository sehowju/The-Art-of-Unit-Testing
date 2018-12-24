<?php

namespace Ch5\Tests;

use PHPUnit\Framework\TestCase;
use Ch5\Src\LogAnalyzer3;
use Ch5\Src\LoggerInterface;
use Ch5\Src\WebServiceInterface;
use Ch5\Src\ErrorInfo;

class LogAnalyzer3Test extends TestCase
{
    public function test_Analyze_loggerThrows_CallsWebServiceWithSubObject()
    {
        $mockService = $this->createMock(WebServiceInterface::class);
        $stubLogger = $this->createMock(LoggerInterface::class);
        $stubLogger->method("logError")->with($this->isType("string"))->will($this->throwException(new \Exception("fake exception")));
        $expected = new ErrorInfo(1000, "fake exception");
        $mockService->expects($this->once())->method("write")->with($expected);

        $analyzer = new LogAnalyzer3($stubLogger, $mockService);
        $analyzer->minNameLength = 10;
        $analyzer->analyze("Short.txt");
    }
}
// method()->expects()->with()->will()