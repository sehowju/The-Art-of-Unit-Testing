<?php

namespace Ch7\Src;

class TimeLogger
{
    public static function createMessage(string $info): string
    {
        return date('Y-m-d H:i:s') . " " . $info;
    }

    public static function createMessageByDateTime(string $info): string
    {
        $datetime = new \DateTime();
        return $datetime->format('Y-m-d H:i:s') . " " . $info;
    }
}
