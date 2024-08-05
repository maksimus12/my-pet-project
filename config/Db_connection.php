<?php 


    class Db_connection{

        private $host = 'localhost';
        private $db = 'users';
        private $name = 'Max';
        private $pass = '1234';
        
        private static $pdo;

        public function __construct()
        {
          $pdo = new PDO("mysql:host=$this->host;dbname=$this->db", $this->name, $this->pass);
          if(!$pdo){
            echo "Connection error";
          }else{
            $this->pdo = $pdo;
          }
          
        }

        public static function getPDO(){
          return self::$pdo;
        }
   
    }


?>