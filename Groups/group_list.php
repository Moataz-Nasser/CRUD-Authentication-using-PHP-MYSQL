<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../table_style.css">
    <link rel="stylesheet" href="../btn_style.css">
    <title>Groups</title>
</head>
<body>
<?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);
    
    if(isset($_SESSION["username"])){
    try{
    include_once("../functions.php");
    include_once("../dbconfig.php");
    include("../navbar.php");
    echo "<link rel='stylesheet' href='../navstyle.css'>";

    $result = selectAll("traininggroup");
    $groupID;

    echo "<center><h1>Groups</h1></center>";
    if($_SESSION["role"] == "admin"){
        echo "<button><a href=create_group.php>Create Group</a></button>";
    }
    echo "<table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Track name</th>
                    <th>Instructor name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>";
            
            foreach($result as $key=>$value){
                if($_SESSION["role"] == "trainee"){
                    $traineeUsername = $_SESSION["username"];
                    $traineegroups = selectColumnsWhere("traineesenrolled", "groupID", "traineeUsername LIKE '$traineeUsername'")[0]; 
                }
                $currentGroup = "";

                if($_SESSION["role"] == "trainee"){
                    foreach($value as $checkKey=>$checkValue){
                        if($checkKey == "id"){
                            $currentGroup = $checkValue;
                        }
                    }
                }

                if( ($_SESSION["role"] == "admin") ||
                    ($_SESSION["role"] == "instructor" && $value["instructorUsername"] == $_SESSION["username"]) ||
                    ($_SESSION["role"] == "trainee" && in_array($currentGroup, $traineegroups)) ){

                    echo "<tr>";
                    foreach( $value as $key2=>$value2){
                        if( $key2 == "trackID"){
                            $value2 = selectColumnsWhere("track", "name", "id = $value2")[0]["name"];
                            echo "<td><a href='#'>$value2</a></td>";

                        }else if( $key2 == "instructorUsername"){
                            $value2 = selectColumnsWhere("instructor", "firstName, lastName", "username = '$value2'")[0];
                            $firstName = $value2["firstName"];
                            $lastName = $value2["lastName"];

                            echo "<td><center>$firstName $lastName</center></td>";

                        }else{
                            if( $key2 == "id"){
                                $groupID = $value2;
                            }
                            echo "<td><center>$value2</center></td>";
                        }
                    }

                    // إضافة أزرار التعديل والحذف وعرض الطلاب
                    echo "<td class='action-buttons'>
                        <a href='group_show.php?id=$groupID'><i class='fa fa-eye' style='color: #007bff;'></i></a>
                            <a href='group_update_form.php?id=$groupID'><i class='fa fa-pen status-edit'></i></a>
                            <a href='group_delete.php?id=$groupID' onclick='return confirm(\"Are you sure you want to delete this group?\");'>
                            <i class='fa fa-trash-can status-delete'></i></a>
                          </td>";
                    echo "</tr>";
                }
            }

    echo "</tbody></table>";

    }catch(PDOException $e){
        echo "". $e->getMessage();
    }
}
?>
</body>
</html>