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

    public function index(): false|string
    {
        $data = $this->userRepository->getAllUsers();

        return Response::json([
            'success' => true,
            'data'    => $data
        ]);
    }

    public function create(): false|string
    {
        $user = new UserModel(Request::field('name'), Request::field('email'));
        $data = $this->userRepository->createUser($user);

        return Response::json([
            'success' => true,
            'data'    => $data
        ]);
    }
}