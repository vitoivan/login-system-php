<?php

class Database
{
    public function connect () {
        $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $serverName = $cleardb_url['host'];
        $dbUserName = $cleardb_url['user'];
        $dbPWD  = $cleardb_url['pass'];
        $dbName = substr($cleardb_url["path"],1);

        $str = 'mysql:host='.$serverName.';dbname='.$dbName;
        try{
            $conn = new PDO ($str, $dbUserName, $dbPWD);
            return $conn;
        }catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}