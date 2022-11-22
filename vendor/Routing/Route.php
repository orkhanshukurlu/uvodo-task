<?php

namespace vendor\Routing;

class Route
{
    private static array $routes = [];

    public static function get(string $uri, array $action): void
    {
        self::registerRoute($uri);
        self::checkRoute();

        if (self::checkUrl($uri, 'GET')) {
            echo self::addRoute($action);
        }
    }

    public static function post(string $uri, array $action): void
    {
        self::registerRoute($uri);
        self::checkRoute();

        if (self::checkUrl($uri, 'POST')) {
            echo self::addRoute($action);
        }
    }

    private static function callClass($class): ?object
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

    private static function callMethod($class, $method, $reflectionClass)
    {
        $reflectionMethod = new \ReflectionMethod($class, $method);
        return $reflectionMethod->invoke($reflectionClass);
    }

    private static function getHttpMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    private static function checkHttpMethod(string $method): void
    {
        if (self::getHttpMethod() == $method) {
            throw new \Exception(self::getHttpMethod() . ' method does not match this route');
        }
    }

    private static function addRoute(array $action)
    {
        $reflectionClass = self::callClass($action[0]);
        return self::callMethod($action[0], $action[1], $reflectionClass);
    }

    private static function registerRoute(string $uri): void
    {
        self::$routes[] = $uri;
    }

    private static function requestUri(): string
    {
        return preg_replace('{^/}', '', $_SERVER['REQUEST_URI'], 1);
    }

    private static function checkRoute(): void
    {
        if (! in_array(self::requestUri(), self::$routes)) {
            header('HTTP/1.0 404 Not Found');
        }
    }

    private static function checkUrl(string $uri, string $method): bool
    {
        return (self::getHttpMethod() === $method) && ($uri === self::requestUri());
    }
}