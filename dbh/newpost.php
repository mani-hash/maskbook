<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
}

$email = $_SESSION['user'];


$con = new mysqli("localhost", "mani", "sayanora123", "web");

$description = $con->real_escape_string($_POST["des"]);

$sql = "INSERT INTO masks(description, email) VALUES ('$description','$email')";

$result = $con->query($sql);

if ($result == TRUE) {
    header("Location: ../home.php");
} else {
    header("Location: ../home.php?failed");
}

$con->close();
?>