<?php

namespace Ch8\Src;

class Person
{
    public $number;

    public function addNumber(string $number):void
    {
        $this->number = $number;
    }

    public function FindPhoneStartingWith(string $str)
    {
        if (strpos($this->number, $str) === 0) {
            return $this->number;
        }
        return null;
    }
}