<?php

class Database
{
    private $serverName = "localhost";
    private $dbUserName = "root";
    private $dbPWD  = "";
    private $dbName = "test";
    
    public function connect () {
        $str = 'mysql:host='.$this->serverName.';dbname='.$this->dbName;
        try{
            $conn = new PDO ($str, $this->dbUserName, $this->dbPWD);
            return $conn;
        }catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}