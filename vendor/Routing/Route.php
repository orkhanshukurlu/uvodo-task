<?php

namespace vendor\Routing;

class Route
{
    public static function get(string $uri, array $action): void
    {
        print_r(call_user_func_array($action, []));
    }

    public static function post(string $uri, array $action): void
    {
        print_r(call_user_func_array($action, []));
    }

    private function httpMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}