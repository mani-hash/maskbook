<?php
session_start();

if (!isset($_POST["email"])) {
    header("Location: ../signup.php");
}

$email = htmlspecialchars(strtolower($_POST["email"]));
$username = htmlspecialchars(trim(strtolower($_POST["username"])));
$password = htmlspecialchars(trim($_POST["password"]));
$confirm_password = htmlspecialchars(trim($_POST["password2"]));

$pass_email = false;
$pass_username = false;
$pass_password = false;

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $pass_email = true;
} else {
    $pass_email = false;
}

if (
    preg_match("/^[a-zA-Z0-9._]*$/", $username) == true && preg_match("/^[0-9]/", $username) != true
) {

    $pass_username = true;
} else {
    $pass_username = false;
}

if ($password == "") {
    $pass_password = false;
} else {
    if ($password == $confirm_password) {
        $pass_password = true;
    } else {
        $pass_password = false;
    }
}


include("dbdata.php");


if ($pass_email == true && $pass_username == true && $pass_password == true) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $con = new mysqli("$dbservername", "$dbusername", "$dbpassword", "$dbname");

    $sql = $con->prepare("INSERT INTO users(user_email, user_name, user_password) VALUES (?, ?, ?)");

    $sql->bind_param("sss", $email, $username, $hashed_password);

    $result = $sql->execute();

    if ($result == TRUE) {
        header("Location: ../");
        $_SESSION["success"] = "user created";
    } else {
        $_SESSION["failed"] = "acc_creation_failed";
        header("Location: ../signup.php");
    }

    $con->close();
    
} else {
    $_SESSION["wrong_pass"] = "failed";
    header("Location: ../signup.php");
}

?>
