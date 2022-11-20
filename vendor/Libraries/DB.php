<?php

namespace vendor\Libraries;

use PDO;

class DB
{
    private ?PDO $conn;
    private static string $table;

    public function __construct()
    {
        try {
            $this->conn = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USERNAME, PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        catch (\PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public static function table(string $table): static
    {
        self::$table = $table;
        return new static;
    }

    public function all(): false|array
    {
        $query = $this->conn->prepare('select * from ' . self::$table);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($name, $email): false|string
    {
        $query = $this->conn->prepare('insert into ' . self::$table . ' (name, email) values (:name, :email)');
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