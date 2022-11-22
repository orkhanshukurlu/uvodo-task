<?php

namespace vendor\Database;

use PDO;

class DB
{
    private ?PDO $conn;
    private static string $table;
    private Mysql|Postgresql $driver;

    public function __construct()
    {
        try {
            $this->driver = match (connection) {
                'mysql' => new Mysql,
                'pgsql' => new Postgresql,
                default => throw new \Exception('Database connection does not match')
            };

            $this->conn = $this->driver->connect();
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