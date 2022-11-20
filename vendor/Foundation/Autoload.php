<?php

namespace vendor\Foundation;

class Autoload
{
    private string $configPattern = 'config/*.php';

    public function __construct()
    {
        $this->loadConfig();
        $this->loadClass();
    }

    private function loadConfig(): void
    {
        foreach (glob($this->configPattern) as $file) {
            require_once __DIR__ . '/../' . $file;
        }
    }

    private function loadClass(): void
    {
        spl_autoload_register(function ($class) {
            require_once "$class.php";
        });
    }
}