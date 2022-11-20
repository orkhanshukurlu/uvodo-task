<?php

use src\Controllers\UserController;
use vendor\Routing\Route;

Route::get('users',         [UserController::class, 'index']);
Route::post('users/create', [UserController::class, 'create']);