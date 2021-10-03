<?php

require('../models/user_model.php');

if (isset($_POST['submit']))
{
    $usr = new User();
    try{
        $usr->register($_POST['username'], $_POST['email'], $_POST['pwd']);
        header('location: ../login.php');
    }
    catch (Exception $e) {
        echo $e->getMessage();
        die();
    }
}
else {
    header('location: ../register.php');
}