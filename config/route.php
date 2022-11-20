<?php

use src\Controllers\UserController;
use vendor\Routing\Route;

$router = new Route;

$router->get('users', [UserController::class, 'index']);