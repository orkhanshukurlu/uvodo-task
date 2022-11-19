<?php

namespace vendor\Libraries;

class Api
{
    public static function json(array $data, ?int $flag = JSON_PRETTY_PRINT): false|string
    {
        return json_encode($data, $flag);
    }
}