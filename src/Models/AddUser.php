<?php 

    class AddUser{

       
        private $conn;

        public function __construct($conn)
        {
            $this->conn = $conn;
        } 

        //GET
      public function insertUser($data){
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $sql = "INSERT INTO users(name, email, phone) VALUES('$name', '$email', '$phone')";
        $stmp = $this->conn->prepare($sql);
        return $stmp->execute();
        }
    }
?>