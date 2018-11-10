<?php

namespace Ch4\Src;

interface EmailServiceInterface
{
    public function sendEmail(string $to, string $subject, string $body);
}
