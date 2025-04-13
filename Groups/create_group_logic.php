<?php
        echo "<link rel='stylesheet' href='../navstyle.css'>";

        try{
        include_once("../dbconfig.php");
        $db = new PDO($dns, $db_username, $db_password);
        
        $sql = "INSERT INTO traininggroup VALUES(:id, :trackID, :instructorUsername, :startDate, :endDate)";
        $statement = $db->prepare($sql);

        $statement->bindParam("id", $_POST["groupID"], PDO::PARAM_INT);
        $statement->bindParam("trackID", $_POST["trackID"], PDO::PARAM_INT);
        $statement->bindParam("instructorUsername", $_POST["instructorUsername"], PDO::PARAM_STR);
        $statement->bindParam("startDate", $_POST["startDate"], PDO::PARAM_STR);
        $statement->bindParam("endDate", $_POST["endDate"], PDO::PARAM_STR);
    
        $statement->execute();
        $result = $statement->rowCount(); 

        header("location:http://localhost/ITI/Groups/group_list.php");

        }catch(PDOException $e){
            echo "". $e->getMessage();
        }