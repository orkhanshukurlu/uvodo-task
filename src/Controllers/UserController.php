<?php

namespace src\Controllers;

use src\Models\UserModel;
use src\Repositories\UserRepository;
use vendor\Libraries\Request;
use vendor\Libraries\Response;

class UserController
{
    public function __construct(public UserRepository $userRepository)
    {
    }

    public static function index()
    {
        $data = (new UserRepository())->getAllUsers();
        return Response::json($data);
    }

    public static function create(Request $request)
    {
        $user = new UserModel($request->field('name'), $request->field('email'));
        return Response::json((new UserRepository())->createUser($user));
    }
}