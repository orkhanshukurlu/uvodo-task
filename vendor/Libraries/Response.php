<?php

namespace vendor\Libraries;

class Response
{
    public static function json(array $data, int $status = 200, ?int $flag = JSON_PRETTY_PRINT): false|string
    {
        http_response_code($status);
        return json_encode($data, $flag);
    }
}