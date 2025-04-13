<?php
    include_once("../functions.php");

    $groupID = $_GET["id"];
    var_dump($groupID);

    deleteWhere("traininggroup", "id LIKE '$groupID'");

    header("location:http://localhost/ITI/Groups/group_list.php");
?>