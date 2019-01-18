<?php

namespace Ch7\Src\LogAnalyzer;

interface LoggerInterface
{
    public function log(string $text): void;
}
