<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../table_style.css">
    <title>Trainees List</title>
</head>
<body>

<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if(isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {
    echo "<link rel='stylesheet' href='../navstyle.css'>";
    include("../navbar.php");

    include_once("../dbconfig.php");


    try {
        $db = new PDO($dns, $db_username, $db_password);
        $query="select * from trainee";
        $stmt=$db->prepare($query);  
        $stmt->execute();
        $result=$stmt->fetchAll();

        $username;

        echo "<center><h1>Trainees</h1></center>";
        echo '<table>
        <tr>
            <th>User Name</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Password</th>
            <th>University</th>
            <th>Faculty</th>
            <th>Gender</th>
            <th>Action</th>
    </tr>';
        foreach ($result as $trainee)
        {
            $username = $trainee[0];
            
            echo "<tr>
            <td>$trainee[0]</td>
            <td>$trainee[1]</td>
            <td>$trainee[2]</td>
            <td>$trainee[3]</td>
            <td>$trainee[4]</td>
            <td>$trainee[5]</td>
            <td>$trainee[6]</td>
            <td>
        <a href=trainee_show.php?action='show'&username='$username'><i class='fa fa-eye' style='color: #007bff;'></i></a>
        <a href=trainee_update_form.php?action='update'&username='$username'><i class='fa fa-pen status-edit'></i></a>
        <a href=trainee_delete.php?action='delete'&username=$username onclick='return confirm(\"Are you sure you want to delete this Trainee?\");'><i class='fa fa-trash-can status-delete'></i></a>
        </td>
            </tr>";
        }
        echo '</table>';
    }catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}else{
    header("location:http://localhost/ITI/accessDenied.php");
}
?>
</body>
</html>