<?php
require('../models/user_model.php');
session_start();

if (isset($_POST['submit']))
{
    $usr = new User();
    try{
       $isLogged = $usr->login($_POST['email'], md5($_POST['pwd']));
       if ($isLogged === true && isset($_SESSION['user_id']))
        {
            header('location: ../index.php');
        }
        else {
            header('location: ../login.php');
       }
    }
    catch (Exception $e) {
        echo $e->getMessage();
        die();
    }
}