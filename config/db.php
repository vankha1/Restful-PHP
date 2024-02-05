<?php

// use PDO;

class db
{

    private $hostname;
    private $port;
    private $username;
    private $password;
    private $databaseName;
    private $conn;

    public function __construct()
    {
        $this->conn = null;
        $this->hostname = $_ENV['DB_HOST'];
        $this->port = $_ENV['DB_PORT'];
        $this->databaseName   = $_ENV['DB_DATABASE'];
        $this->username = $_ENV['DB_USERNAME'];
        $this->password = $_ENV['DB_PASSWORD'];
    }

    public function connect()
    {
        try {
            $this->conn = new \PDO(
                "mysql:host=$this->hostname;port=$this->port;charset=utf8mb4;dbname=$this->databaseName",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::ATTR_STRINGIFY_FETCHES => false,
                ]
            );
            $this->conn->exec("set names utf8");

            return $this->conn;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
}
