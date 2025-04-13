<?php
    session_start();

    include_once("../dbconfig.php");

    try{
    $db = new PDO($dns, $db_username, $db_password);

    $formposition = $_POST['check'] ?? '';

    $table;

    if ($formposition == 'instructor'){
        $table = "instructor";
    }else if ($formposition == 'admin'){
        $table = "admin";}
    else if ($formposition == 'trainee'){
        $table = "trainee";
    }

    $username = $_POST['username'];

    $sql = "select * from $table where username like '$username'";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    if( $_POST['password']==$result[0]['password'] ){
        $_SESSION["role"] = $formposition;
        $_SESSION["username"] = $username;
        $_SESSION["userdata"] = $result[0];

        if($_SESSION["role"] == "instructor"){
            header("location:../Instructor/instructorshow.php?username='$username'");

        }else if($_SESSION["role"] == "admin"){
            header("location:../Admin/admin_profile.php?username='$username'");

        }else if($_SESSION["role"] == "trainee"){
            header("location:../Trainee/trainee_show.php?username='$username'");
        }

    }else{
        header("location:http://localhost/ITI/Login/login.php");
    }

    }catch(PDOException $e){
        echo "". $e->getMessage();
    }