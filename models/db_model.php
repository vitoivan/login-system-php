<?php

class Database
{
    private $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    private $serverName = $this->cleardb_url['host'] | "localhost";
    private $dbUserName = $this->cleardb_url['user'] | "root";
    private $dbPWD  = $this->cleardb_url['pass'] | "";
    private $dbName = substr($this->cleardb_url["path"],1) | "test";
    
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