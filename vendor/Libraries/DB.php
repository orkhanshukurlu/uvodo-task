<?php

namespace vendor\Libraries;

use PDO;

class DB
{
    private ?PDO $conn;

    public function __construct()
    {
        $servername = 'localhost';
        $username   = 'root';
        $password   = '';
        $database   = 'uvodo';

        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        catch (\PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function all(): false|array
    {
        $query = $this->conn->prepare('select * from users');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($name, $email): false|string
    {
        $query = $this->conn->prepare('insert into users (name, email) values (:name, :email)');
        $query->bindParam(':name', $name);
        $query->bindParam(':email',$email);
        $query->execute();
        return $this->conn->lastInsertId();
    }

    public function __destruct()
    {
        $this->conn = null;
    }
}