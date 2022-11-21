<?php

namespace vendor\Routing;

class Route
{
    public static function get(string $uri, array $action): void
    {
        $reflectionClass = self::callClass($action[0]);
        echo self::callMethod($action[0], $action[1], $reflectionClass);
    }

    public static function post(string $uri, array $action): void
    {
        $reflectionClass = self::callClass($action[0]);
        echo self::callMethod($action[0], $action[1], $reflectionClass);
    }

    public static function callClass($class): ?object
    {
        $reflectionClass = new \ReflectionClass($class);

        if (($constructor = $reflectionClass->getConstructor()) === null) {
            return $reflectionClass->newInstance();
        }

        if (($params = $constructor->getParameters()) === []) {
            return $reflectionClass->newInstance();
        }

        $newInstanceParams = [];

        foreach ($params as $param) {
            $newInstanceParams[] = $param->getClass() === null
                ? $param->getDefaultValue()
                : self::callClass($param->getClass()->getName());
        }

        return $reflectionClass->newInstanceArgs($newInstanceParams);
    }

    public static function callMethod($class, $method, $reflectionClass)
    {
        $reflectionMethod = new \ReflectionMethod($class, $method);
        return $reflectionMethod->invoke($reflectionClass);
    }
}