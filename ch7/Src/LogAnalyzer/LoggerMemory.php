<?php

namespace Ch7\Src\LogAnalyzer;

class LoggerMemory implements LoggerInterface
{
    public function log(string $text): void
    {
        echo date('Y-m-d H:i:s') . " " . $text;
    }
}
