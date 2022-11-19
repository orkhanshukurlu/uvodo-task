<?php

namespace Contracts;

interface UserRepositoryInterface
{
    public function get();

    public function create(array $data);
}