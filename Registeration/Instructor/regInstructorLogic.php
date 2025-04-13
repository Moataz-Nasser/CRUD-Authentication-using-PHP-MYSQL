<?php 
    include_once("../../dbconfig.php");

    try{
    $db = new PDO($dns, $db_username, $db_password);
    
    $sql = "INSERT INTO instructor VALUES(:username, :firstname, :lastname, :password, :gender)";
    $statement = $db->prepare($sql);
    $statement->bindParam("username", $_POST["username"], PDO::PARAM_STR);
    $statement->bindParam("firstname", $_POST["first-name"], PDO::PARAM_STR);
    $statement->bindParam("lastname", $_POST["last-name"], PDO::PARAM_STR);
    $statement->bindParam("password", $_POST["password"], PDO::PARAM_STR);
    $statement->bindParam("gender", $_POST["gender"], PDO::PARAM_STR);

    $statement->execute();
    $result = $statement->rowCount(); 

    header("location:http://localhost/ITI/Registeration/Instructor/regInstructorForm.php");
    }catch(PDOException $e){
        echo "". $e->getMessage();
    }
?>