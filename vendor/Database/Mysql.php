<?php

namespace vendor\Database;

use PDO;

class Mysql implements IDatabase
{
    private string $host     = mysql['host'];
    private string $port     = mysql['port'];
    private string $database = mysql['database'];
    private string $username = mysql['username'];
    private string $password = mysql['password'];

    public function connect(): PDO
    {
        $conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->database;user=$this->username;password=$this->password");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
}