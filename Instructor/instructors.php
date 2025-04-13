<?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../table_style.css">
    <title>Instructors List</title>
</head>
<body>
<?php
    if(isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {
        echo "<link rel='stylesheet' href='../navstyle.css'>";
        include("../navbar.php"); 
        
        include_once("../dbconfig.php");

        try{
        $db = new PDO($dns, $db_username, $db_password);

        $sql = "SELECT * FROM instructor;";
        $statement = $db->prepare($sql);

        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $username;

        echo "<center><h1>Instructors</h1></center>";
        echo "<table>
                <tr>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Password</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>";
                

                foreach($result as $key=>$value){
                    echo "<tr>";
                    foreach( $value as $key2=>$value2){
                        if( $key2 == "password"){
                            echo "<td><center>********</center></td>";
                        }elseif( $key2 == "username"){
                            $username = $value2;
                            echo "<td><center>$value2</center></td>";
                        }else{
                            echo "<td><center>$value2</center></td>";
                        }
                        
                    }
                    
                    echo "<td>
                        <center><a href=instructorshow.php?action='show'&username='$username' ><i class='fa fa-eye' style='color: #007bff;'></i></a>
                        <a href=instructorupdateform.php?action='update'&username='$username' ><i class='fa fa-pen status-edit'></i></a>
                        <a href=instructordelete.php?action='delete'&username=$username onclick='return confirm(\"Are you sure you want to delete this Instructor?\");'><i class='fa fa-trash-can status-delete'></i></a></center>
                    </td></tr>";
                }
                
        }catch(PDOException $e){
            echo "". $e->getMessage();
        }
    }else{
        header("location:http://localhost/ITI/accessDenied.php");
    }
?>
</body>
</html>