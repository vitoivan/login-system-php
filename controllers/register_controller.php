<?php

require('../models/user_model.php');
session_start();

if (isset($_POST['submit']))
{
    $usr = new User();
    try{
        $usr->register($_POST['username'], $_POST['email'], $_POST['pwd']);
        unset($_SESSION['register-error']);
        header('location: ../login.php');
    }
    catch (Exception $e) {
        $_SESSION['register-error'] = $e->getMessage();
        header('location: ../register.php');
    }
}
else {
    header('location: ../register.php');
}