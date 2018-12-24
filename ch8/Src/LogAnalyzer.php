<?php

namespace Ch8\Src;

class LogAnalyzer
{

    private $analyzedOutput;

    public function __construct()
    {
        $this->analyzedOutput = new AnalyzedOutput;
    }

    public function isValid(string $fileName):bool
    {
        if (strlen($fileName) < 8) {
            return true;
        }
        return false;
    }

    public function analyze(string $str): AnalyzedOutput
    {
        $arr = explode("\t", $str);
        $this->analyzedOutput->addLine($arr[0], $arr[1], $arr[2]);
        return $this->analyzedOutput;
    }

    public function GetLineCount(string $str)
    {
        return -100;
    }

}

