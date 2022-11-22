<?php

namespace vendor\Libraries;

class Request
{
    public static function field(string $name)
    {
        return $_REQUEST[$name] ?? null;
    }
}