<?php

//require_once __DIR__ . '/vendor/autoload.php';

require_once 'config/route.php';

spl_autoload_register(function ($class) {
    require_once "$class.php";
});



//use vendor\Libraries\DB;

//putenv('orkhan=ddd');
//echo getenv('orkhan');
//echo __DIR__;

//$a = DB::table('users')->all();
//$b = DB::table('users')->insert('Orkhan', 'Twsfsffsd');
//print_r($b);

//use vendor\Libraries\Http;
//echo Http::post();