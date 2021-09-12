<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Signup</title>
</head>

<body>
    <?php
    include_once("header.php");
    ?>
    <div id="signup-maindiv" class="container-sm">
        <div class="container-fluid mt-5 border border-dark border-2 rounded mb-5">
            <div class="my-2">
                <a href="home.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="black" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                </a>
            </div>
            <form onsubmit="return verifyPasswords()" class="p-2" action="dbh/newuser.php" method="POST">
                <div class="text-center mb-3 mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <input name="email" onkeyup="hideFailed()" type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="name@example.com" required>
                        <label for="InputEmail1" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                            </svg>
                            Email address
                        </label>
                    </div>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>

                <?php

                if (isset($_SESSION["failed"])) {
                    echo ("<div class='alert alert-danger mt-2' id='failed' role='alert'>
                    User already exists
                    </div>");

                    session_unset();   //unsets failed div
                }

                echo ("<div class='alert alert-danger mt-2' id='error' role='alert' style='display:none'>
                Passwords Do Not Match!
                </div>");

                ?>

                <div class="mb-3 form-floating">
                    <input onkeyup="hideError(); hideFailed();" name="password" type="password" class="form-control" id="pass1" minlength="6" placeholder="Password" required>
                    <label for="pass1" class="form-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                        </svg>
                        Password
                    </label>
                </div>
                <div class="mb-3 form-floating">
                    <input onkeyup="hideError(); hideFailed();" name="password2" type="password" class="form-control" id="pass2" placeholder="Confirm Password" required>
                    <label for="pass2" class="form-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                        </svg>
                        Confirm Password
                    </label>
                </div>

                <div class="d-grid gap-2 col-4 mx-auto mb-2">
                    <button type="submit" class="btn btn-dark mt-2 mb-3">Signup</button>
                </div>






            </form>

        </div>
    </div>


    <script src="js/signup.js">

    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>