<?php

//deleting posts code 

if (!isset($_POST["id"])) {   //checks whether id exists
    header("Location: ../mypost.php");
    die();
}

$id = $_POST["id"];

include("dbdata.php");

$con = new mysqli("$dbservername", "$dbusername", "$dbpassword", "$dbname");

$sql = $con->prepare("DELETE FROM masks WHERE ID=?"); //row delete sql statement

$sql2 = $con->prepare("SELECT posts FROM masks WHERE ID=?");  //post location sql statement

$sql->bind_param("i", $id);  

$sql2->bind_param("i", $id);

$sql2->execute();

$post_result = $sql2->get_result();

$dirP = $post_result->fetch_array(MYSQLI_ASSOC);

$post_dir = "../" . $dirP["posts"];

if ($dirP["posts"] != "") {
    
    unlink($post_dir);

} 

$result = $sql->execute();  //deletes the specific row from table
 
if ($result == TRUE) {
    header("Location: ../mypost.php");
} else {
    header("Location: ../mypost.php?failed");
}

$con->close();


?>