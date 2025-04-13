<?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);
        
    // include_once("../navbar.php");
    // echo "<link rel='stylesheet' href='../navStyle.css'>";

    if (!isset($_SESSION["username"])){

    }else{
        $username = $_SESSION["username"];

        if($_SESSION["role"] == "trainee"){
            header("location:../Trainee/trainee_show.php?username='$username'");
        }else if($_SESSION["role"] == "instructor"){
            header("location:../Instructor/instructorshow.php?username='$username'");
        }else if($_SESSION["role"] == "admin"){
            header("location:../Admin/admin_profile.php?username='$username'");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="Login_Style.css"> -->
     <link rel="stylesheet" href="Login_style.css">
</head>
<body>
<div class="container" id="container">
        <div class="form-container sign-in">
            <form id="loginForm" action="login_logic.php" method="post">
                <center><h1>Login</h1></center>
                <table>
                    <tr>
                        <td><label for="username">Username</label></td>
                        <td><input type="text" class="style" id="username" name="username" placeholder="Enter your username" required></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password</label></td>
                        <td><input type="password" class="style" id="password" name="password" placeholder="Enter your password" required></td>
                    </tr>
                    <tr>
                        <td><label for="role">Role</label></td>
                        <td>
                            <select class="style" name="check" id="role" required>
                                <option value="trainee">Trainee</option>
                                <option value="instructor">Instructor</option>
                                <option value="admin">Admin</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Login"></td>
                    </tr>
                </table>
            </form>

            <table>
                    <tr>
                        <td colspan="2"><a href="../Registeration/Trainee/regTraineeForm.php"><button>Register</button></a></td>
                    </tr>
            </table>
        </div>
    </div>

</body>
</html>
