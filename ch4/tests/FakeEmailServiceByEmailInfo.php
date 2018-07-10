<?php

namespace Ch4\Tests;

use Ch4\Src\EmailServiceByEmailInfoInterface;
use Ch4\Src\EmailInfo;

class FakeEmailServiceByEmailInfo implements EmailServiceByEmailInfoInterface
{
    public $emailInfo;

    public function sendEmail(EmailInfo $emailInfo)
    {
        $this->emailInfo = $emailInfo;
    }
}