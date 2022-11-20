<?php

namespace vendor\Routing;

use vendor\Exceptions\MethodNotAllowed;

class Route
{
    public function get(string $uri, array $action): void
    {
//        if ($this->httpMethod() !== 'GEsT') {
//            throw new \Exception($this->httpMethod(), 405);
//        }

//        if (! is_file($action[0] . '.php')) {
//            throw new \Exception('sdsf');
//        }


        echo call_user_func_array([new $action[0], $action[1]], []);
    }

    private function httpMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}