<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Homepage</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>


    <?php
    $username = "34242._sddd";
    $pass_username = false;

    if (preg_match("/^[a-zA-Z0-9_]*$/", $username) == true && preg_match("/^[0-9]/", $username) != true
    && preg_match("/^[_]/", $username) != true && preg_match("/^[.]/", $username) != true) {
    
        $pass_username = true;
        echo "yes";
    } else {
        $pass_username = false;
        echo "no";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>