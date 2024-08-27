<?php

class Db_connection
{
    private $host = 'localhost';
    private $db = 'users';
    private $name = 'Max';
    private $pass = '1234';
    private static $pdo;

    public function __construct()
    {
        try {
            $pdo = new PDO("mysql:host=$this->host;dbname=$this->db", $this->name, $this->pass);
        } catch (PDOException $e) {
            echo "Error: Can't connect to MySQL server." . PHP_EOL;
            die();
        }

        self::$pdo = $pdo;
    }

    public static function getPDO()
    {
        if (!self::$pdo) {
            new self();
        }

        return self::$pdo;
    }
}
