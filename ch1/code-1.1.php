<?php

class SimpleParser
{
    // case1: input "" 0
    // case2: input "1" return 1
    // case3: input "1a" return 1
    // case4: input "1,2" throw exception
    public function parseAndSum(string $numbers): int
    {
        if (strlen($numbers) === 0) {
            return 0;
        }
        if (!strpos($numbers, ",")) {
            return intval($numbers);
        } else { // for readable
            throw new Exception("I can only handle 0 or 1 numbers for now!");
        }
    }
}

