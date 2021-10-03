<?php
session_start();
if (!isset($_SESSION['user']) && trim($_POST["des"] == "")) {
    header("Location: ../index.php");
}

$user = $_SESSION['user'];

date_default_timezone_set("Asia/Colombo");

$date_posted = date("Y-m-d H:i:s");



$des_temp = preg_split('/\r\n|[\r\n]/', trim(htmlspecialchars($_POST['des'])));




$n = 0;
$temp_text = "";



while ($n < count($des_temp)) {
    
    if ($n == count($des_temp) - 1) {
        $temp_text .= $des_temp[$n];
    } else {
       
        
        $temp_text .= $des_temp[$n] . "<br>";
    }
    
    
    $n+=1;
}

$targt_dir = "../posts/" . $_SESSION["user"] . "/";
if (!file_exists($targt_dir)) {
    
    mkdir($targt_dir, 0777);
}


if ($_FILES["post_image"]["size"] > 3000000 || $_FILES["post_image"]["size"] == 0) {
    if ($_FILES["post_image"]["name"] == "") {
        $image_avail = false;
    } else {
        if (isset($_GET["home"])) {
            header("Location: ../home.php?failed");
        } else if (isset($_GET["mypost"])) {
            header("Location: ../mypost.php?failed");
        }

        die();
    }
    
} else {
    $check = getimagesize($_FILES["post_image"]["tmp_name"]);
    $image_avail = true;

    if ($check == true) {


        
        $temp = explode(".", $_FILES["post_image"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);

        $target_file = $targt_dir . $newfilename;

        while (file_exists($target_file)) {     
            $temp = explode(".", $_FILES["post_image"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $target_file = $targt_dir . $newfilename;
        }


        if (move_uploaded_file($_FILES["post_image"]["tmp_name"], $target_file)) {

            $image_val = true;
        } else {

            $image_val = false;
        }
    } else {
        $image_val = false;
    }
}




include("dbdata.php");

$con = new mysqli("$dbservername", "$dbusername", "$dbpassword", "$dbname");

if ($image_avail == false) {
    $description = $con->real_escape_string($temp_text);

    
    // $sql = "INSERT INTO masks(description, date, email) VALUES ('$description', '$date_posted', '$email')";

    $sql = $con->prepare("INSERT INTO masks(description,  post_date, username) VALUES (?, ?, ?)");

    $sql->bind_param("sss", $description, $date_posted, $user);

} else {
    if ($image_val == true) {
        $temp_desc = $con->real_escape_string($temp_text);
        $main_dir = "posts/". $_SESSION["user"] . "/" . $newfilename;
        $temp_desc .= "<br>";
        $image_div = "<div class='container-sm'><img class='img-fluid' src='$main_dir'></div><br>";
        $temp_desc .= $image_div;

        $description = $temp_desc;

       
        // $sql = "INSERT INTO masks(description, date, posts, email) VALUES ('$description', '$date_posted', '$main_dir', '$email')";

        $sql = $con->prepare("INSERT INTO masks(description,  post_date, posts, username) VALUES (?, ?, ?, ?)");

        $sql->bind_param("ssss", $description, $date_posted, $main_dir, $user);

    } else {
       
        if (isset($_GET["home"])) {
            header("Location: ../home.php?failed");
        } else if (isset($_GET["mypost"])) {
            header("Location: ../mypost.php?failed");
        }

        die();
    }
}



// $description = $con->real_escape_string($temp_text);

// echo($description);

// $sql = $con->prepare("INSERT INTO masks(description,  post_date, username) VALUES (?, ?, ?)");

// $sql->bind_param("sss", $description, $date_posted, $user);

$result = $sql->execute();

if ($result == TRUE) {
    if (isset($_GET["home"])) {
        header("Location: ../home.php");
    } else if (isset($_GET["mypost"])) {
        header("Location: ../mypost.php");
    }
} else {
    if (isset($_GET["home"])) {
        header("Location: ../home.php?failed1");
    } else if (isset($_GET["mypost"])) {
        header("Location: ../mypost.php?failed1");
    }
}

$con->close();


?>