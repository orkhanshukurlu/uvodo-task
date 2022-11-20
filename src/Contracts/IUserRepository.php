<?php

namespace src\Contracts;

use src\Models\UserModel;

interface IUserRepository
{
    public function createUser(UserModel $user): string|false;

    public function getAllUsers(): array|false;
}