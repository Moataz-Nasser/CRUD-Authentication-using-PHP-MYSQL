<?php
    echo "<link rel='stylesheet' href='../navstyle.css'>";
    include("../navbar.php");

    if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin"){
        echo "<form action='create_group_logic.php' method='POST'>
            <table>
                <tr>
                    <td><label>Group ID: </label></td>
                    <td><input type='number' name='groupID' required></td>
                </tr>
                <tr>
                    <td><label>Track ID: </label></td>
                    <td><input type='number' name='trackID'</td>
                </tr>
                <tr>
                    <td><label>Instructor Username: </label></td>
                    <td><input type='text' name='instructorUsername'</td>
                </tr>
                <tr>
                    <td><label>Start Date: </label></td>
                    <td><input type='date' name='startDate'</td>
                </tr>
                <tr>
                    <td><label>End Date: </label></td>
                    <td><input type='date' name='endDate'</td>
                </tr>
                <tr><td><input type=submit></td></tr>";
        echo '</table></form>';
    }else{
        header("location:http://localhost/ITI/accessDenied.php");
    }