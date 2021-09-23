<?php
session_start();



if (!isset($_POST["email"])) {
    header("Location: ../");
}
$email = htmlspecialchars(strtolower(trim($_POST["email"])));
$password = htmlspecialchars($_POST["pass"]);

include("dbdata.php");

$con = new mysqli("$dbservername", "$dbusername", "$dbpassword", "$dbname");

$sql = $con->prepare("SELECT user_name, user_password FROM users WHERE user_email=?");

$sql->bind_param("s", $email);

$sql->execute();

$result = $sql->get_result();

$result_values = $result->fetch_array(MYSQLI_ASSOC);

if ($result->num_rows > 0) {

    $con->close();

    if (password_verify($password, $result_values["user_password"])) {
        $_SESSION['user'] = $result_values["user_name"];
        header("Location: ../home.php");
        
    } else {
        $_SESSION["no_user"] = "doesn't exist";
        header("Location: ../");
    }
    
    
    
} else {
    header("Location: ../");
    $_SESSION["no_user"] = "doesn't exist";
}

$con->close();
?>