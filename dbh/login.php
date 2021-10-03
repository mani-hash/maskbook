<?php
session_start();



if (!isset($_POST["email"])) {  //checks whether email exists
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

$result_values = $result->fetch_array(MYSQLI_ASSOC);  //fetch username and password from database

if ($result->num_rows > 0) {  //check if user exists

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