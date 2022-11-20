<?php

namespace src\Repositories;

use src\Contracts\IUserRepository;
use src\Models\UserModel;
use vendor\Libraries\DB;

class UserRepository implements IUserRepository
{
    public function __construct(private DB $db)
    {}

    public function createUser(UserModel $user): string|false
    {
        return $this->db->insert($user->getName(), $user->getEmail());
    }

    public function getAllUsers(): array|false
    {
        return $this->db->all();
    }
}