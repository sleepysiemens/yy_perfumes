<?php

namespace App\Services\Content;

class FlagService
{
    private static array $flags;

    public static function get(string $flag)
    {
        self::$flags = config('flags.flags');
        return self::$flags[$flag] ?? self::$flags['en'];
    }
}
