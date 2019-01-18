<?php

namespace Ch7\Src\LogAnalyzer;

class LoggerFile implements LoggerInterface
{
    public function log(string $text): void
    {
        $text = date("Y-m-d H:i:s") . " " . $text;
        file_put_contents("ch7.log", $text, FILE_APPEND);
    }
}
