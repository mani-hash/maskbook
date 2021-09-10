<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: .");
}

$u = $_SESSION["user"];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Homepage</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="profiles/collapse.css" rel="stylesheet">
    
</head>

<body>


    <?php
    include("navigation.php")
    ?>

    <!-- user posts start here -->

    <div class="card mt-4">

        <div class="card-body">
            <form action="dbh/newpost.php?home" method="POST">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Unmask your thoughts</label>
                    <textarea name="des" class="form-control" id="post_area" rows="3" maxlength="1000" required></textarea>
                </div>
                <button type="submit" class="btn btn-secondary">
                    <svg class="icon icon-user-secret" width="16px" height="16px">
                        <use xlink:href="#icon-user-secret">
                            <symbol id="icon-user-secret" viewBox="0 0 27 32">
                                <path d="M10.272 27.424l1.728-8-1.728-2.272-2.272-1.152zM14.848 27.424l2.304-11.424-2.304 1.152-1.696 2.272zM17.728 9.376q-0.032-0.064-0.096-0.096-0.16-0.128-1.696-0.128-1.248 0-2.976 0.32-0.128 0.032-0.384 0.032t-0.384-0.032q-1.728-0.32-2.976-0.32-1.536 0-1.728 0.128-0.032 0.032-0.064 0.096 0.032 0.352 0.064 0.512 0.064 0.032 0.16 0.096t0.128 0.192q0.032 0.064 0.128 0.352t0.128 0.384 0.128 0.288 0.16 0.32 0.16 0.256 0.224 0.224 0.224 0.192 0.32 0.128 0.384 0.064 0.416 0.032q0.64 0 1.056-0.224t0.576-0.512 0.256-0.64 0.224-0.512 0.32-0.224h0.192q0.192 0 0.32 0.224t0.192 0.512 0.288 0.64 0.576 0.512 1.056 0.224q0.224 0 0.416-0.032t0.384-0.064 0.288-0.128 0.256-0.192 0.224-0.224 0.16-0.256 0.16-0.32 0.128-0.288 0.128-0.384 0.128-0.352q0.032-0.128 0.128-0.192t0.128-0.096q0.064-0.16 0.096-0.512zM25.152 25.088q0 2.176-1.312 3.392t-3.456 1.248h-15.616q-2.144 0-3.456-1.248t-1.312-3.392q0-1.088 0.096-2.112t0.32-2.24 0.672-2.208 1.152-1.856 1.664-1.312l-1.632-3.936h3.84q-0.384-1.152-0.384-2.272 0-0.224 0.032-0.576-3.488-0.736-3.488-1.728 0-1.024 3.776-1.76 0.288-1.12 0.896-2.4t1.28-2.016q0.576-0.672 1.344-0.672 0.544 0 1.504 0.544t1.504 0.576 1.504-0.576 1.504-0.544q0.768 0 1.344 0.672 0.64 0.736 1.248 2.016t0.928 2.4q3.744 0.736 3.744 1.76 0 0.992-3.456 1.728 0.128 1.44-0.352 2.848h3.808l-1.44 4.032q1.12 0.576 1.92 1.728t1.152 2.56 0.512 2.688 0.16 2.656z"></path>
                            </symbol>
                        </use>
                    </svg>
                    Post
                </button>
            </form>
        </div>
    </div>

    <?php

    include("dbh/dbdata.php");

    $con = new mysqli("$dbservername", "$dbusername", "$dbpassword", "$dbname");

    $sql = "SELECT id, description, date, email FROM masks ORDER BY DATE DESC";
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/navibar-collapse.js"></script>
</body>

</html>