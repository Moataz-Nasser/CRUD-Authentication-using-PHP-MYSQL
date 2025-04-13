<?php 
    include_once("../../dbconfig.php");

    try{
    $db = new PDO($dns, $db_username, $db_password);
    
    $sql = "INSERT INTO trainee VALUES(:username, :firstname, :lastname, :password, :university, :faculty, :gender)";
    $statement = $db->prepare($sql);
    $statement->bindParam("username", $_POST["username"], PDO::PARAM_STR);
    $statement->bindParam("firstname", $_POST["first-name"], PDO::PARAM_STR);
    $statement->bindParam("lastname", $_POST["last-name"], PDO::PARAM_STR);
    $statement->bindParam("password", $_POST["password"], PDO::PARAM_STR);
    $statement->bindParam("university", $_POST["university"], PDO::PARAM_STR);
    $statement->bindParam("faculty", $_POST["faculty"], PDO::PARAM_STR);
    $statement->bindParam("gender", $_POST["gender"], PDO::PARAM_STR);

    $statement->execute();
    $result = $statement->rowCount();

    $Logged = isset($_SESSION["username"]);

    if($Logged == false){
        header("location:http://localhost/ITI/Login/Login.php");
    }else if($_SESSION["role"] == "admin"){
        header("location:http://localhost/ITI/Registeration/regTraineeForm.php");
    }
    
    }catch(PDOException $e){
        echo "". $e->getMessage();
    }
?>