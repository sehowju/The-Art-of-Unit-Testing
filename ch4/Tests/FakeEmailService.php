<?php

namespace Ch4\Tests;

use Ch4\Src\EmailServiceInterface;
use Ch4\Src\EmailInfo;

class FakeEmailService implements EmailServiceInterface
{
    public $to;
    public $subject;
    public $body;

    public function sendEmail(string $to, string $subject, string $body)
    {
        $this->to = $to;
        $this->subject = $subject;
        $this->body = $body;
    }
}