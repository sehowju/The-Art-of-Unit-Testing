<?php

namespace Ch7\Src\StringParser;

interface StringParserInterface
{
    public function getStringVersionFromHeader(): string;

    public function hasCorrectHeader(): bool;
}
