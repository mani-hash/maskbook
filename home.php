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
</head>

<body>


    <nav class="navbar navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-mastodon" viewBox="0 0 16 16">
                    <path d="M11.19 12.195c2.016-.24 3.77-1.475 3.99-2.603.348-1.778.32-4.339.32-4.339 0-3.47-2.286-4.488-2.286-4.488C12.062.238 10.083.017 8.027 0h-.05C5.92.017 3.942.238 2.79.765c0 0-2.285 1.017-2.285 4.488l-.002.662c-.004.64-.007 1.35.011 2.091.083 3.394.626 6.74 3.78 7.57 1.454.383 2.703.463 3.709.408 1.823-.1 2.847-.647 2.847-.647l-.06-1.317s-1.303.41-2.767.36c-1.45-.05-2.98-.156-3.215-1.928a3.614 3.614 0 0 1-.033-.496s1.424.346 3.228.428c1.103.05 2.137-.064 3.188-.189zm1.613-2.47H11.13v-4.08c0-.859-.364-1.295-1.091-1.295-.804 0-1.207.517-1.207 1.541v2.233H7.168V5.89c0-1.024-.403-1.541-1.207-1.541-.727 0-1.091.436-1.091 1.296v4.079H3.197V5.522c0-.859.22-1.541.66-2.046.456-.505 1.052-.764 1.793-.764.856 0 1.504.328 1.933.983L8 4.39l.417-.695c.429-.655 1.077-.983 1.934-.983.74 0 1.336.259 1.791.764.442.505.661 1.187.661 2.046v4.203z" />
                </svg>
            </a>
            <div class="d-flex">
                <span class="px-3 h5 text-white-50 navbar-text">

                    <?php
                    echo ("Hi, " . $u)
                    ?>

                </span>

                <a class="pe-3" href="dbh/logout.php">
                    <div class=" bg-danger rounded rounded-3 p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" class="bi bi-power" viewBox="0 0 16 16">
                            <path d="M7.5 1v7h1V1h-1z" />
                            <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
                        </svg>
                    </div>
                </a>

            </div>
        </div>
    </nav>

    <!-- user posts start here -->

    <div class="card mt-4">

        <div class="card-body">
            <form action="dbh/newpost.php" method="POST">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Unmask your thoughts</label>
                    <textarea name="des" class="form-control" id="exampleFormControlTextarea1" rows="3" maxlength="1000" required></textarea>
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
</body>

</html>