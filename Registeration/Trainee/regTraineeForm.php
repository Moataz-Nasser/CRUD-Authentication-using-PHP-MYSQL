
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration form</title>
    <link rel="stylesheet" href="../Registeration_style.css">
</head>
<body>
<div class="container" id="container">
        <div class="form-container sign-up">
            <form action="regTraineeLogic.php" method="post">
                <center><h1>Create Account</h1></center>
                <table>
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
                        <td><label for="university">University</label></td>
                        <td>
                            <select name="university" id="university" required>
                                <option value="AU">AU</option>
                                <option value="EELU">EELU</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="faculty">Faculty</label></td>
                        <td>
                            <select name="faculty" id="faculty" required>
                                <option value="PPIS">PPIS</option>
                                <option value="FCI">FCI</option>
                            </select>
                        </td>
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
                </table>
            </form>
            <table>
                    <tr>
                        <td colspan="2"><a href="../../Login/login.php"><button>Login</button></a></td>
                    </tr>
            </table>
        </div>
    </div>
</body>
</html>