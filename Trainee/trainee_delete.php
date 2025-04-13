<?php
    include_once("../functions.php");

    $username = $_GET["username"];

    deleteWhere("trainee", "username LIKE '$username'");

    header("location:http://localhost/ITI/Trainee/trainee_list.php");
?>