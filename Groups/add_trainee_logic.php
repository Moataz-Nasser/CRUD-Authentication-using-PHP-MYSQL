<?php
        include_once("../dbconfig.php");

        try{
        $db = new PDO($dns, $db_username, $db_password);
        
        $sql = "INSERT INTO traineesenrolled VALUES(:groupID, :traineeUsername)";
        $statement = $db->prepare($sql);

        $statement->bindParam("groupID", $_POST["groupID"], PDO::PARAM_INT);
        $statement->bindParam("traineeUsername", $_POST["username"], PDO::PARAM_STR);
    
        $statement->execute();
        $result = $statement->rowCount();

        $groupID = intval(trim($_POST["groupID"],"'"));
        header("location:http://localhost/ITI/Groups/group_show.php?action='show'&id='$groupID'");

        }catch(PDOException $e){
            echo "". $e->getMessage();
        }