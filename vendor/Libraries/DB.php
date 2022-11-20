<?php

namespace vendor\Libraries;

use PDO;

class DB
{
    public $conn;

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

    public function get()
    {
        $query = $this->conn->prepare("select id, email, name from users");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create()
    {
        $query = $this->conn->prepare("select id, email, name from users");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function __destruct()
    {
        $this->conn = null;
    }
}