<?php

namespace src\Controllers;

class UserController
{
    private $users;

    public function __construct(IUserRepository $users)
    {
        $this->users = $users;
    }

    public function addUser($params)
    {
        $user = new User($params['username'], $params['password']);
        $this->users->add($user);
    }

    public function getUser($params): User
    {
        return $this->users->findByUsername($params['username']);
    }
}