<?php

spl_autoload_register(function ($class) {
    require_once "index.php";
});

use vendor\Libraries\Http;

echo Http::post();