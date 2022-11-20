<?php

namespace src\Repositories;

use src\Contracts\IUserRepository;
use src\Models\UserModel;
use vendor\Libraries\DB;

class UserRepository implements IUserRepository
{
    private DB $db;

    public function __construct()
    {
        $this->db = DB::table('users');
    }

    public function createUser(UserModel $user): string|false
    {
        return $this->db->insert($user->getName(), $user->getEmail());
    }

    public function getAllUsers(): array|false
    {
        return $this->db->all();
    }
}