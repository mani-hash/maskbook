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
    <link href="css/posts.css" rel="stylesheet">
</head>

<body>


    <?php

    include("navigation.php");

    ?>

    <div id="main-post" class="card mt-4 m-2">

        <div class="card-body">
            <form action="dbh/newpost.php?mypost" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Unmask your thoughts</label>
                    <textarea name="des" class="form-control" id="exampleFormControlTextarea1" rows="3" maxlength="1000" required></textarea>
                </div>

                <div class="mb-3 input-group">
                    <input class="btn btn-dark" id="post_image" type="file" name="post_image" accept="image/*" aria-describedby="clearFile" aria-label="Upload">
                    <button onclick="clearVal();" class="btn btn-outline-dark" id="clearFile" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z" />
                        </svg>
                    </button>
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

    $sql = $con->prepare("SELECT ID, description, post_date, username FROM masks WHERE username = ? ORDER BY post_date DESC");
    //SELECT masks.ID, masks.description, masks.post_date, users.user_name FROM masks, users
    //WHERE masks.email = users.user_email AND users.user_name = "sigma_chad"

    // $result = $con->query($sql);

    $sql->bind_param("s", $u);

    $sql->execute();

    $result = $sql->get_result();

    $num = 0;

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $msg_id = $row["ID"];
        $num += 1;


    ?>


        <div class="card mt-4 m-3 sub_posts">
            <div class="card-header">
                <?php
                echo ($row["post_date"]);
                ?>
                <form class="float-end" id="modalForm" action="dbh/deletepost.php" method="POST">
                    <!-- Button trigger modal -->

                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="<?php echo ('#alertModal' . $num); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                        </svg>

                    </button>



                    <!-- Modal -->
                    <div class="modal fade" id="<?php echo ('alertModal' . $num); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you Sure?
                                </div>
                                <div class="modal-footer">
                                    <button id="modalBtn" name="id" value="<?php echo $msg_id; ?>" type="submit" class="btn btn-danger" data-bs-dismiss="modal">Yes</button>
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>
                        <?php
                        echo ($row["description"]);
                        ?>
                    </p>
                    <footer class="blockquote-footer">Someone with the username
                        <cite title="Source Title">
                            <?php
                            echo ($row["username"]);
                            ?>
                        </cite>
                    </footer>
                </blockquote>
            </div>
            <div class="card-footer">
                <button onclick="changeHeart(this)" class="btn heart">
                    <img src="images/suit-heart.svg">
                </button>

            </div>
        </div>

    <?php
    }
    $con->close();
    ?>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <script>
        li_1 = document.getElementsByClassName("active");

        li_1[0].classList.remove("active");

        li_2 = document.getElementsByClassName("nav-link");

        li_2[1].classList.add("active");
    </script>
   
   <script src="js/themes.js"></script>    
    <script src="js/navibar-collapse.js"></script>
    <script src="js/file_img.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>