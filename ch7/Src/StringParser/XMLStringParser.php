<?php

namespace Ch7\Src\StringParser;

class XMLStringParser extends BaseStringParser
{

    private $input;

    public function __construct(string $input)
    {
        $this->input = $input;
    }

    public function getStringVersionFromHeader(): string
    {
        $header = new \SimpleXMLElement($this->input);
        return $header;
    }

    public function hasCorrectHeader(): bool
    {
        $header = new \SimpleXMLElement($this->input);
        if (strlen(trim($header)) === 0) {
            return false;
        }
        return true;
    }
}
