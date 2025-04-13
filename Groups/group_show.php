<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainees in Group</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../table_style.css">
    <link rel="stylesheet" href="../btn_style.css">
</head>
<body>
<?php
    include_once("../functions.php");
    include("../navbar.php");
    echo "<link rel='stylesheet' href='../navstyle.css'>";

    if (isset($_SESSION["role"])){
        include_once("../dbconfig.php");

        $groupID = $_GET['id'];
        $username;

        try {
            $result = selectColumnsWhere("traineesenrolled","TraineeUsername", "groupID = $groupID");

            echo "<center><h1>Trainees Enrolled in Group $groupID</h1></center>";

            if($_SESSION["role"] == "admin"){
                echo "<button><a href=add_trainee_group.php?groupID='$groupID'>Add a Trainee</a></button>";
            }

        echo "<table>
                <tr>
                    <th>Trainee Username</th>
                    <th>Trainee Name</th>";
                    if($_SESSION["role"] == "admin"){
                        echo "<th>Actions</th>";
                    }
                echo "</tr>";
                

                foreach($result as $key=>$value){
                    echo "<tr>";
                    foreach( $value as $key2=>$value2){
                        echo "<td><center>$value2</center></td>";
                        $username = $value2;

                        $value2 = selectColumnsWhere("trainee", "firstName, lastName","username = '$value2'");
                        $firstName = $value2[0]["firstName"];
                        $lastName = $value2[0]["lastName"];

                        echo "<td><center>$firstName $lastName</center></td>";
                    }
                    
                    if($_SESSION["role"] == "admin"){
                        echo "<td>
                            <center><a href=../Trainee/trainee_show.php?username='$username'><i class='fa fa-eye' style='color: #007bff;'></i></a></a>
                            <a href=delete_trainee_group.php?action='delete'&username=$username&groupID=$groupID onclick='return confirm(\"Are you sure you want to remove this trainee?\");'>
                           <i class='fa fa-trash-can status-delete'></i></a></center></center>
                        </td></tr>";
                    }
                }

        } catch (PDOException $e) {
            echo "". $e->getMessage();
        }
    }else{
        header("location:http://localhost/ITI/accessDenied.php");
    }
?>
</body>
</html>
