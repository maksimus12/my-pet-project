<?php 


class GetUser{

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    } 

    public function getRecords(){
            $sql = "SELECT * FROM users ORDER BY id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
    }
}

?>