<?php

namespace Ch4\Src;

interface EmailServiceByEmailInfoInterface
{
    public function sendEmail(EmailInfo $emailInfo);
}

