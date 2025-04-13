<?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);
    
    if(isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {

        echo "<link rel='stylesheet' href='../navstyle.css'>";
        include("../navbar.php");

        $username = $_GET["username"];

        include_once("../dbconfig.php");

        try {
        
            $db = new PDO($dns, $db_username, $db_password);
            $query="select * from trainee WHERE username LIKE $username;";
            $stmt=$db->prepare($query); 
    
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            
            echo "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link rel='stylesheet' href='../update_style.css'>
                <title>Update Data</title>
            </head>
            <body>
            <form action="."'trainee_update_logic.php'"."method='POST'>
                        
                        <tr>
                            <td><label for='username'>Username</label></td>
                            <td><input type='text' readonly value='".$result[0]['username']."' name='username' required></td>
                        </tr>
                        <br>
                        
                        <tr>
                            <td><label for='firstname'>First Name</label></td>
                            <td><input type='text' value='".$result[0]['firstName']."' name='firstName' required></td>
                        </tr>
                        <br>

                        <tr>
                            <td><label for='lastname'>Last Name</label></td>
                            <td><input type='text' value='".$result[0]['lastName']."' name='lastName' required></td>
                        </tr>
                        <br>

                        <tr>
                            <td><label for='password'>Password</label></td>
                            <td><input class='password' type='password' value='".$result[0]['password']."' name='password' required></td>
                        </tr>
                        <br>

                        <tr>
                            <td><label for='university'>University</label></td>
                            <td>
                                <select name='university' id='university' required>";
                                if($result[0]['university'] == "AU"){
                                    echo "<option selected value='AU'>AU</option>
                                        <option value='EELU'>EELU</option>";
                                }else if($result[0]['university'] == "EELU"){
                                    echo "<option selected value='EELU'>EELU</option>
                                        <option value='AU'>AU</option>";
                                }
                            echo "</select>
                            </td>
                        </tr>
                        <br>

                        <tr>
                            <td><label for='faculty'>Faculty</label></td>
                            <td>
                                <select name='faculty' id='faculty' required>";
                                    if($result[0]['faculty'] == "PPIS"){
                                        echo "<option selected value='PPIS'>PPIS</option>
                                            <option value='FCI'>FCI</option>";
                                    }else if($result[0]['faculty'] == "FCI"){
                                        echo "<option selected value='FCI'>FCI</option>
                                            <option value='PPIS'>PPIS</option>";
                                    }
                                echo "</select>
                            </td>
                        </tr>
                        <br>

                        <tr>
                            <td><label for='gender'>Gender</label></td>
                            <td>
                                <select name='gender' id='gender' required>";
                                    if($result[0]['gender'] == "Male"){
                                        echo "<option selected value='Male'>Male</option>
                                            <option value='Female'>Female</option>";
                                    }else if($result[0]['gender'] == "Female"){
                                        echo "<option selected value='Female'>Female</option>
                                            <option value='Male'>Male</option>";
                                    }
                                echo "</select>
                            </td>
                        </tr>
                        <br>

                        <tr>
                            <td><input type='submit' value='Update'></td>
                        </tr>
                </form>
            </table>
            </body>
            </html>";
    } catch (PDOException $e) {
        echo "". $e->getMessage();
    }
    }else{
        header("location:http://localhost/ITI/accessDenied.php");
    }
?> 