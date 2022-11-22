<?php

namespace vendor\Database;

interface IDatabase
{
    public function connect(): \PDO;
}