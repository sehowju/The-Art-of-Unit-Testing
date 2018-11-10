<?php

namespace Ch5\Src;

interface FileNameRulesInterface
{
    public function isValidLogFileName(string $fileName):bool;
}