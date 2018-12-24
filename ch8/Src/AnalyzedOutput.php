<?php

namespace Ch8\Src;

class AnalyzedOutput
{
    private $output = [];
    public $lineCount = 0;

    public function addLine(string $time, string $action, string $name): void
    {
        $this->output[] = [$time, $action, $name];
        $this->lineCount++;
    }

    public function getLine(int $line): array
    {
        return $this->output[$line-1];
    }
}