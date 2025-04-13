<?php
     session_start();

     $helper = array_keys($_SESSION);
     foreach ($helper as $key){
         unset($_SESSION[$key]);
     }
    

    if(!isset($_SESSION["username"])){
        header("location:http://localhost/ITI/Login/login.php");
    }else{
        echo "You are not logged in";
    }
?>