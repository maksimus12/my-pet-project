<?php

class User
{
    private $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function insertUser($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $sql = "INSERT INTO users(name, email, phone) VALUES('$name', '$email', '$phone')";
        $stmp = $this->conn->prepare($sql);

        return $stmp->execute();
    }

    public function getRecords(){
        $sql = "SELECT * FROM users ORDER BY id";
        $stmt = $this->conn->query($sql);
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }
}
