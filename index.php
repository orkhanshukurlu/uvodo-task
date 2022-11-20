<?php

spl_autoload_register(function ($class) {
    require_once "$class.php";
});

require_once 'config/route.php';

//use vendor\Libraries\Http;
//echo Http::post();