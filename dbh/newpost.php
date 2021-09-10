<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
}

$email = $_SESSION['user'];

date_default_timezone_set("Asia/Colombo");

$date_posted = date("Y-m-d H:i:s");

include("dbdata.php");

$con = new mysqli("$dbservername", "$dbusername", "$dbpassword", "$dbname");

$description = $con->real_escape_string($_POST["des"]);

$sql = "INSERT INTO masks(description, email, date) VALUES ('$description','$email', '$date_posted')";

$result = $con->query($sql);

if ($result == TRUE) {
    if (isset($_GET["home"])) {
        header("Location: ../home.php");
    } else if (isset($_GET["mypost"])) {
        header("Location: ../mypost.php");
    }
    
} else {
    if (isset($_GET["home"])) {
        header("Location: ../home.php?failed");
    } else if (isset($_GET["mypost"])) {
        header("Location: ../mypost.php?failed");
    }
}

$con->close();

?>