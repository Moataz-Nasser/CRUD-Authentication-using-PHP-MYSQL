<?php
    session_start();

    include_once("../dbconfig.php");

    $username = $_POST["username"];

    try {
        $db = new PDO($dns, $db_username, $db_password);

        $sql = "SELECT * FROM instructor WHERE username LIKE '$username'";
        $statement = $db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $needsupdate = array();

        foreach($result as $key => $value) {
            
            foreach($value as $key2 => $value2) {

                if( $value[$key2] != $_POST[$key2] ) {
                    $needsupdate[] = $key2;
                }
            }
        }  

        $sql = "UPDATE instructor SET ";

        $columns = 0;

        foreach( $needsupdate as $column ) {
            if($columns == 0){
                $sql = $sql."$column = '$_POST[$column]' ";
                $columns++;
            }else{
                $sql = $sql.", $column = '$_POST[$column]' ";
            }
        }

        $sql = $sql."WHERE username = '$username'";
        $statement = $db->prepare($sql);
        $statement->execute();
        $result = $statement->rowCount();

        header("location:http://localhost/ITI/Instructor/instructors.php");

    } catch (PDOException $e) {
        echo "". $e->getMessage();
    }