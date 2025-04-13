<?php
    include_once("../functions.php");

    $groupID = trim($_GET["groupID"],"'");
    $username = $_GET["username"];
    // var_dump($groupID);

    deleteWhere("traineesenrolled", "groupID LIKE '$groupID' AND traineeUsername LIKE '$username'");
    
    header("location:http://localhost/ITI/Groups/group_show.php?action='show'&id='$groupID'");
?>