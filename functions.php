<?php
    function selectAll($table){
        include("dbconfig.php");
        try{
            $db = new PDO($dns, $db_username, $db_password);

            $sql = "SELECT * FROM $table;";
            $statement = $db->prepare($sql);

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "". $e->getMessage();
        }

        return $result;
    }

    function selectAllWhere($table, $condition){
        include("dbconfig.php");

        try{
        $db = new PDO($dns, $db_username, $db_password);

        $sql = "SELECT * FROM $table WHERE $condition;";
        $statement = $db->prepare($sql);

        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "". $e->getMessage();
        }

        return $result;
    }

    function selectWhere($table, $condition){
        include("dbconfig.php");

        try{
            $db = new PDO($dns, $db_username, $db_password);

        $sql = "SELECT * FROM $table WHERE $condition;";
        $statement = $db->prepare($sql);

        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "". $e->getMessage();
        }

        return $result;
    }
    function selectColumnsWhere($table,$columns, $condition){
        include("dbconfig.php");

        try{
        $db = new PDO($dns, $db_username, $db_password);

        $sql = "SELECT $columns FROM $table WHERE $condition;";
        $statement = $db->prepare($sql);

        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "". $e->getMessage();
        }

        return $result;
    }

    function deleteWhere($table, $condition){
        include("dbconfig.php");

        try{
        $db = new PDO($dns, $db_username, $db_password);

        $sql = "DELETE FROM $table WHERE $condition;";
        $statement = $db->prepare($sql);

        $statement->execute();

        }catch(PDOException $e){
            echo "". $e->getMessage();
        }
    }