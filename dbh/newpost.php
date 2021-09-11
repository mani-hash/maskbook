<?php
session_start();
if (!isset($_SESSION['user']) && trim($_POST["des"] == "")) {
    header("Location: ../index.php");
}

$email = $_SESSION['user'];

date_default_timezone_set("Asia/Colombo");

$date_posted = date("Y-m-d H:i:s");

include("dbdata.php");

$con = new mysqli("$dbservername", "$dbusername", "$dbpassword", "$dbname");

$des_temp = preg_split('/\r\n|[\r\n]/', trim($_POST['des']));



$n = 0;
$temp_text = "";

while ($n <= count($des_temp)) {
    
    if ($n == count($des_temp) - 1) {
        $temp_text .= $des_temp[$n];
    } else {
        $temp_text .= $des_temp[$n] . "<br>";
    }
    
    
    $n+=1;
}



$description = $con->real_escape_string($temp_text);

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

