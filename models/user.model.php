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
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUser($username)
    {
        $query = "SELECT id,firstname,lastname,password,address,email,phone FROM person WHERE username = '$username'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC to get only the associative array 
    }
}
