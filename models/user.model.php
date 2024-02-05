<?php
class User
{
    private $conn;

    public function __construct()
    {
        $db = new db();
        $this->conn = $db->connect();
    }

    public function getAllUser()
    {
        $query = "SELECT * FROM person";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
