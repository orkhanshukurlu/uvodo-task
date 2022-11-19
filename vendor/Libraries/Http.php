<?php

namespace vendor\Libraries;

class Http
{
    public static function get()
    {
        return $_SERVER['REQUEST_METHOD'];
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        http_response_code(200);
        return json_encode($_GET, JSON_PRETTY_PRINT);
    }

    public static function post(): false|string
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        http_response_code(200);
        return json_encode($_SERVER, JSON_PRETTY_PRINT);
        return $_SERVER;
        return json_decode(file_get_contents('php://input'), true);

        $entityBody = stream_get_contents(STDIN);
        return json_encode($entityBody, JSON_PRETTY_PRINT);
        return $_SERVER['REQUEST_METHOD'];
        parse_str(file_get_contents('php://input'), $a);
        return json_encode($a, JSON_PRETTY_PRINT);
    }
}