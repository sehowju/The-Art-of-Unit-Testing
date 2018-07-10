<?php

namespace Ch4\Src;

class WebService implements WebServiceInterface
{
    public function logError(string $message)
    {
        echo $message;
    }
}
