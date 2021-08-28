<?php
session_start();



if (!isset($_POST["email"])) {
    header("Location: ../");
}
$e = $_POST["email"];
$p = $_POST["pass"];

$con = new mysqli("localhost", "mani", "sayanora123", "web");

$sql = "SELECT * FROM users WHERE email='$e' AND password='$p'";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    $con->close();
    $_SESSION['user'] = $e;
    header("Location: ../home.php");
    sleep(5);
} else {
    header("Location: ../index.php?invalid");
}

$con->close();
?>