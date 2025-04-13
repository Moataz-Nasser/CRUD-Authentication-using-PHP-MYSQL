<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration form</title>
    <link rel="stylesheet" href="../Registeration_style.css">
</head>
<body>
    <?php
        session_start();
        error_reporting(E_ALL ^ E_NOTICE);
        

        if(isset($_SESSION["role"]) && $_SESSION["role"] == "admin"){
            
        }else{
            header("location:http://localhost/ITI/accessDenied.php");
        }
    ?>
    <div class="container" id="container">
    <div class="form-container sign-up">
    <table>
        <form action="regInstructorLogic.php" method="post">
            
                <tr>
                    <td><label for="username">Username</label></td>
                    <td><input type="text" name="username" required></td>
                </tr>
                
                <tr>
                    <td><label for="first-name">First Name</label></td>
                    <td><input type="text" name="first-name" required></td>
                </tr>
                
                <tr>
                    <td><label for="last-name">Last Name</label></td>
                    <td><input type="text" name="last-name" required></td>
                </tr>
                
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" name="password" required></td>
                </tr>
                                
                <tr>
                    <td><label for="gender">Gender</label></td>
                        <td>
                            <select name="gender" id="gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </td>
                </tr>

                <tr>
                    <td colspan="2"><input type="submit" value="Register"></td>
                </tr>
        </form>
    </table>
    </div>
    </div>
</body>
</html>