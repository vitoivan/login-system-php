<?php

require('../models/user_model.php');

if (isset($_POST['submit']))
{
    $usr = new User();
    try{
       print_r($usr->login($_POST['email'], md5($_POST['pwd'])));
    }
    catch (Exception $e) {
        echo $e->getMessage();
        die();
    }
}