<?php

namespace Ch7\Src\StringParser;

class StandardStringParser implements StringParserInterface
{
    private $input;

    const PATTERN = "/version=(.+)\s*[;\t]/";

    public function __construct(string $input)
    {
        $this->input = $input;
    }

    public function getStringVersionFromHeader(): string
    {
        preg_match(self::PATTERN, $this->input, $matches);
        return $matches[1];
    }

    public function hasCorrectHeader(): bool
    {
        return preg_match(self::PATTERN, $this->input) > 0 ? true : false;
    }
}
