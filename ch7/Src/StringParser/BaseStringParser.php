<?php

namespace Ch7\Src\StringParser;

abstract class BaseStringParser implements StringParserInterface
{
    public $stringToParse;

    abstract public function getStringVersionFromHeader(): string;

    abstract public function hasCorrectHeader(): bool;
}
