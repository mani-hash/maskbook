<?php
session_start();

$u = $_SESSION["user"];

if (!isset($_SESSION['user'])) {
    header("Location: .");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="profiles/collapse.css" rel="stylesheet">
</head>

<body>
    

    <?php

    include("navigation.php");

    ?>
    
    <div class="card mt-4">

        <div class="card-body">
            <form action="dbh/newpost.php?mypost" method="POST">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Unmask your thoughts</label>
                    <textarea name="des" class="form-control" id="exampleFormControlTextarea1" rows="3" maxlength="1000" required></textarea>
                </div>
                <button type="submit" class="btn btn-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-mastodon" viewBox="0 0 16 16">
                        <path d="M11.19 12.195c2.016-.24 3.77-1.475 3.99-2.603.348-1.778.32-4.339.32-4.339 0-3.47-2.286-4.488-2.286-4.488C12.062.238 10.083.017 8.027 0h-.05C5.92.017 3.942.238 2.79.765c0 0-2.285 1.017-2.285 4.488l-.002.662c-.004.64-.007 1.35.011 2.091.083 3.394.626 6.74 3.78 7.57 1.454.383 2.703.463 3.709.408 1.823-.1 2.847-.647 2.847-.647l-.06-1.317s-1.303.41-2.767.36c-1.45-.05-2.98-.156-3.215-1.928a3.614 3.614 0 0 1-.033-.496s1.424.346 3.228.428c1.103.05 2.137-.064 3.188-.189zm1.613-2.47H11.13v-4.08c0-.859-.364-1.295-1.091-1.295-.804 0-1.207.517-1.207 1.541v2.233H7.168V5.89c0-1.024-.403-1.541-1.207-1.541-.727 0-1.091.436-1.091 1.296v4.079H3.197V5.522c0-.859.22-1.541.66-2.046.456-.505 1.052-.764 1.793-.764.856 0 1.504.328 1.933.983L8 4.39l.417-.695c.429-.655 1.077-.983 1.934-.983.74 0 1.336.259 1.791.764.442.505.661 1.187.661 2.046v4.203z" />
                    </svg>
                    Post
                </button>
            </form>
        </div>
    </div>
    
    <?php

    include("dbh/dbdata.php");

    $con = new mysqli("$dbservername", "$dbusername", "$dbpassword", "$dbname");

    $sql = "SELECT id, description, date, email FROM masks WHERE email = '$u' ORDER BY DATE DESC";
    $result = $con->query($sql);

    while ($row = $result->fetch_assoc()) {
        // echo ($row["description"] . "<br/>");

    ?>


        <div class="card mt-4">
            <div class="card-header">
                <?php
                echo ($row["date"]);
                ?>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>
                        <?php
                        echo ($row["description"]);
                        ?>
                    </p>
                    <footer class="blockquote-footer">Someone with the email
                        <cite title="Source Title">
                            <?php
                            echo ($row["email"]);
                            ?>
                        </cite>
                    </footer>
                </blockquote>
            </div>
        </div>

    <?php
    }
    $con->close();
    ?>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        li_1 = document.getElementsByClassName("active");

        li_1[0].classList.remove("active");

        li_2 = document.getElementsByClassName("nav-link");

        li_2[1].classList.add("active");
    </script>
    <script src="js/navibar-collapse.js"></script>
</body>

</html>