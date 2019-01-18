<?php

namespace Ch7\Src\LogAnalyzer;

class LogAnalyzer
{
    public function analyze(string $fileName): void
    {
        if (strlen($fileName) < 8) {
            LoggingFacility::log("FileName too short: " . $fileName);
            return ;
        }
        if (!file_exists($fileName)) {
            throw new \Exception($fileName . " Not Exist");
        }
    }
}
