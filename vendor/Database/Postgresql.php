<?php

namespace vendor\Database;

use PDO;

class Postgresql implements IDatabase
{
    private string $host     = pgsql['host'];
    private string $port     = pgsql['port'];
    private string $database = pgsql['database'];
    private string $username = pgsql['username'];
    private string $password = pgsql['password'];

    public function connect(): PDO
    {
        $conn = new PDO("pgsql:host=$this->host;port=$this->port;dbname=$this->database;user=$this->username;password=$this->password");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
}