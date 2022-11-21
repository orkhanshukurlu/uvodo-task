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

    public function index()
    {
        return Response::json([
            'success' => true,
            'data'    => $this->userRepository->getAllUsers()
        ]);
    }

    public function create()
    {
        $request = new Request();
        $user = new UserModel($request->field('name'), $request->field('email'));

        return Response::json([
            'success' => true,
            'data'    => $this->userRepository->createUser($user)
        ]);
    }
}