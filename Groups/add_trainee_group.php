<?php
    echo "<link rel='stylesheet' href='../navstyle.css'>
        <link rel='stylesheet' href='../update_style.css'>";
    include("../navbar.php");

    if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin"){

        $groupID =  intval(trim($_GET["groupID"],"'"));

        echo "<form action='add_trainee_logic.php' method='POST'>
            <table><center>
                <tr>
                    <td><label>Group ID: </label></td>
                    <td><input type='text' value='$groupID' name='groupID' required></td>
                </tr>
                <tr>
                    <td><label>Trainee Username: </label></td>
                    <td><input type='text' name='username'</td>
                </tr>
                <tr><td colspan='2'><input type=submit></td></tr>";
        echo '</table></form>';
    }else{
        header("location:http://localhost/ITI/accessDenied.php");
    }