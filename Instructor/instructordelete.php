<?php
    include_once("../functions.php");

    $username = $_GET["username"];
    var_dump($username);

    deleteWhere("instructor", "username LIKE '$username'");

    header("location:http://localhost/ITI/Instructor/instructors.php");
?>