<?php
require('../models/db_model.php');

class User
{
    public $username;
    public $email;
    public $pwd;

    public static function validateData()
    {
        if (empty($_POST['username'])
            || empty($_POST['email'])
            || empty($_POST['pwd'])
        )
        {
            throw new \Exception("Alguns campos estão em falta");
        }
        else
        {  
            $name = $_POST['username'];
            $email = $_POST['email'];
            $pwd = $_POST['pwd'];
            $arr = ['username'=>$name, 'email'=>$email, 'password'=>$pwd];
            return $arr;
        }
    }

    public function register($username, $email, $pwd)
    {
        User::validateData($username, $email, $pwd);
        $username = addslashes($username);
        $email = addslashes($email);
        $pwd = addslashes($pwd);
        $pwd = md5($pwd);

        $db = new Database();
        $conn = $db->connect();
        $query = 'INSERT INTO users (name, email, password) ';
        $query .= 'VALUES (:name, :email, :password)';
        
        $query = $conn->prepare($query);
        $query->bindParam(':name', $username);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $pwd);
        $query->execute();

        if ($query->rowCount() > 0)
        {
            return $query->fetch(\PDO::FETCH_ASSOC);
        }
        else {
            throw new \Exception("Não foi possível concluir o registro");
        }
    }

    public function login($email, $pwd)
    {
        if (!$email or !$pwd) {
            throw new \Exception("Alguns campos estão em falta");
        }
        $email = addslashes($email);
        $pwd = addslashes($pwd);
        
        $db = new Database();
        $conn = $db->connect();
        $query = "SELECT * FROM users WHERE ";
        $query .= "email = :email AND password = :pwd";
        $query = $conn->prepare($query);
        $query->bindParam(":email", $email);
        $query->bindParam(":pwd", $pwd);
        $query->execute();

        if ($query->rowCount() > 0)
        {
            return $query->fetch(\PDO::FETCH_ASSOC);
        }
        else {
            throw new \Exception("Usuário não encontrado!");
        }
    }
}