<?php
    $groupID = intval(trim($_POST["id"],"'"));

    include_once("../dbconfig.php");

    try {
        $db = new PDO($dns, $db_username, $db_password);
         $query="select * from traininggroup WHERE id LIKE '$groupID';";
         $stmt=$db->prepare($query); 
 
         $stmt->execute();
         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

         $needsupdate = array();

        foreach($result as $key => $value) {
            
            foreach($value as $key2 => $value2) {

                if( $value[$key2] != $_POST[$key2] ) {
                    $needsupdate[] = $key2;
                }
            }
        }  

        $sql = "UPDATE traininggroup SET ";

        $columns = 0;

        foreach( $needsupdate as $column ) {
            if($columns == 0){
                $sql = $sql."$column = '$_POST[$column]' ";
                $columns++;
            }else{
                $sql = $sql.", $column = '$_POST[$column]' ";
            }
        }

        $sql = $sql."WHERE id = '$groupID'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->rowCount();

        header("location:http://localhost/iti/Groups/group_list.php");

    } catch (PDOException $e) {
        echo "". $e->getMessage();
    }