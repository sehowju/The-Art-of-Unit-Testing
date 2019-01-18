<?php

namespace Ch7\Src\LogAnalyzer;

class LoggingFacility
{
    public static $logger;

    public static function log(string $text): void
    {
        if (is_null(self::$logger)) {
            self::$logger = new LoggerFile();
        }
        self::$logger::log($text);
    }
}
