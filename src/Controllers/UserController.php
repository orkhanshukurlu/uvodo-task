<?php

namespace src\Controllers;

use src\Models\UserModel;
use src\Repositories\UserRepository;
use vendor\Libraries\Request;

class UserController
{
    public function __construct(public UserRepository $userRepository)
    {
    }

    public function index()
    {
        return $this->userRepository->getAllUsers();
    }

    public function create(Request $request)
    {
        $user = new UserModel($request->field('name'), $request->field('email'));
        return $this->userRepository->createUser($user);
    }
}