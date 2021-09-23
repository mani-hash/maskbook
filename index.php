<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: home.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fingerprint.css" rel="stylesheet">
    <link href="css/fix.css" rel="stylesheet">

    <title>Login</title>
</head>

<body>
    <?php
    include_once("header.php");
    ?>

    <div id="login-maindiv" class="end container-sm">
        <div class="container-fluid border border-dark rounded mt-5">

            <form class="p-3" method="POST" action="dbh/login.php">

                <div class="text-center mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                </div>

                <div class="form-floating">
                    <input onkeyup="hideInvalid()" name="email" type="email" class="form-control" id="login-email" aria-describedby="emailHelp" placeholder="name@example.com" required>
                    <label for="login-email" class="form-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                        </svg>
                        Email address
                    </label>
                </div>

                <div id="emailHelp" class="form-text mb-3">We'll never share your email with anyone else.</div>

                <?php
                if (isset($_SESSION["no_user"])) {
                    echo "<div class='alert alert-danger mt-1' id='invalid' role='alert'>
                    Invalid Login!
                    </div>";

                    session_unset();
                }
                ?>


                <div class="mb-3 input-group">
                    <div class="form-floating form-floating-group flex-grow-1">

                        <input onkeyup="hideInvalid()" name="pass" type="password" class="form-control" id="login-password" placeholder="password" required>

                        <label for="login-password" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                            </svg>
                            Password
                        </label>
                    </div>
                    <button onclick="eyeBtn(this);" class="btn btn-outline-dark" type="button">
                        <svg class='closeEye' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-slash-fill' viewBox='0 0 16 16'>
                            <path d='m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z' />
                            <path d='M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z' />
                        </svg>
                    </button>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn">
                        <div class="vij-container vij-hov signup-div">
                            <span class="text">LOGIN</span>
                        </div>

                    </button>




                    
                        <a href="signup.php" class="btn">
                            <div class="vij-container vij-hov signup-div">
                                <span class="text">SIGNUP</span>
                            </div>
                        </a>
                    

                </div>

                <?php
                if (isset($_SESSION["success"])) {
                    echo "<div class='alert alert-success mt-4' id='success' role='alert'>
                    Signup successful! Please login!
                    </div>";

                    session_unset();
                }
                ?>

            </form>



        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/login.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>

    </script>

</body>

</html>