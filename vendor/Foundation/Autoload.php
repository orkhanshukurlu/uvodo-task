<?php

class Autoload
{
    private static string $configPattern = 'config/*.php';

    public static function loader(): void
    {
        self::loadClass();
        self::loadConfig();
    }

    private static function loadConfig(): void
    {
        foreach (glob(self::$configPattern) as $file) {
            require_once __DIR__ . '/../../' . $file;
        }
    }

    private static function loadClass(): void
    {
        spl_autoload_register(function ($class) {
            require_once "$class.php";
        });
    }
}