<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {
    echo "<link rel='stylesheet' href='../navstyle.css'>";
    include("../navbar.php");

    $groupID = $_GET["id"];
    include_once("../dbconfig.php");

    try {
        $db = new PDO($dns, $db_username, $db_password);
        $query = "SELECT * FROM traininggroup WHERE id = :groupID";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':groupID', $groupID);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($result)) {
            echo "<p>No group found with this ID.</p>";
            exit;
        }

        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Update Data</title>
            <link rel='stylesheet' href='../update_style.css'>
        </head>
        <body>
            <h1>Update Group Data</h1>
            <form action='group_update_logic.php' method='POST'>
                <label for='id'>Group ID</label>
                <input type='number' readonly value='".$result[0]['id']."' name='id' required>

                <label for='trackID'>Track ID</label>
                <input type='number' value='".$result[0]['trackID']."' name='trackID' required>

                <label for='instructorUsername'>Instructor Username</label>
                <input type='text' value='".$result[0]['instructorUsername']."' name='instructorUsername' required>

                <label for='startDate'>Start Date</label>
                <input type='date' value='".$result[0]['startDate']."' name='startDate' required>

                <label for='endDate'>End Date</label>
                <input type='date' value='".$result[0]['endDate']."' name='endDate' required>

                <input type='submit' value='Update'>
            </form>
        </body>
        </html>";
    } catch (PDOException $e) {
        echo "" . $e->getMessage();
    }
} else {
    header("location:http://localhost/ITI/accessDenied.php");
}
?>
