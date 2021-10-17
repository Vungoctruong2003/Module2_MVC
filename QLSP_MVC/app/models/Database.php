<?php

class Database
{
    private $dsn;
    private $username;
    private $password;

    public function __construct($username, $password)
    {

        $this->dsn = "mysql:host=localhost;dbname=QLSP_MVC";
        $this->username = $username;
        $this->password = $password;
    }

    public function connect()
    {
        try {
            $pdo = new PDO($this->dsn, $this->username, $this->password);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
        return $pdo;
    }
}