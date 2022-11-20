<?php

namespace vendor\Routing;

class Route
{
    public static function get(string $uri, array $action): void
    {

//        print_r(class_uses(self::class));
//        if ($this->httpMethod() !== 'GEsT') {
//            throw new \Exception($this->httpMethod(), 405);
//        }

//        if (! is_file($action[0] . '.php')) {
//            throw new \Exception('sdsf');
//        }

//        if (method_exists())






        print_r(call_user_func_array([new $action[0], $action[1]], []));
    }

    public function __call(string $name, array $arguments)
    {
        echo $name;
        // TODO: Implement __call() method.
    }

    public static function __callStatic(string $name, array $arguments)
    {
        echo $name;
        // TODO: Implement __callStatic() method.
    }

    public static function post(string $uri, array $action)
    {

    }

    private function httpMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}