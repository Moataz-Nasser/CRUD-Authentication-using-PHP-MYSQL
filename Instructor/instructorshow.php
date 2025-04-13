<?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);

    if ( (isset($_SESSION["role"]) && $_SESSION["role"] == "instructor" && $_SESSION["username"] == $_SESSION["username"])
        || ($_SESSION["role"] == "admin")) {
    
        echo "<link rel='stylesheet' href='../navstyle.css'>
        <link rel='stylesheet' href='../table_style.css'>";
        include("../navbar.php");

        $username = $_GET["username"];

        include_once("../dbconfig.php");

        try {
            $db = new PDO($dns, $db_username, $db_password);

            $sql = "SELECT * FROM instructor WHERE username LIKE $username;";
            $statement = $db->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            echo "<table>";
            foreach( $result as $key=>$value ) {

                foreach( $value as $key2=>$value2 ) {
                    if($key2 == "password") {
                        continue;
                    }else {
                        echo "<tr><td>".ucwords($key2)." </td>";
                            echo "<td>$value2</td>
                            </tr>";
                    }
                }
            }
            echo "</table>";

        } catch (PDOException $e) {
            echo "". $e->getMessage();
        }
    }else{
        header("location:http://localhost/ITI/accessDenied.php");
    }
?>