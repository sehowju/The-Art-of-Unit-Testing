<?php

namespace Ch8\Tests;

use PHPUnit\Framework\TestCase;
use Ch8\Src\Person;

class SharedStateCorruption extends TestCase
{
    private $person;

    public function __construct()
    {
        parent::__construct();
        $this->person = new Person();
    }

    public function test_CreateAnalyzer_GoodFileName_ReturnsTrue()
    {
        $this->person->addNumber("055-4556684(34)");
        $found = $this->person->FindPhoneStartingWith("055");
        $this->assertEquals("055-4556684(34)", $found);
    }

    public function test_FindPhoneStartingWith_NoNumbers_ReturnsNull()
    {
        $found = $this->person->FindPhoneStartingWith("0");
        $this->assertNull($found);
    }
}
