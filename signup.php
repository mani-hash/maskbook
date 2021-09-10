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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <title>Signup</title>
</head>

<body>
    <?php
    include_once("header.php");
    ?>

    <div class="container-md w-50 mt-5">
        <form onsubmit="return verifyPasswords()" action="dbh/newuser.php" method="POST">
            <div class="text-center mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
            </div>
            <div class="mb-3">
                <label for="InputEmail1" class="form-label">Email address</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                        </svg>
                    </span>
                    <input name="email" onkeyup="hideFailed()" type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="pass1" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                        </svg>
                    </span>
                    <input onkeyup="hideError()" name="password" type="password" class="form-control" id="pass1" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="pass2" class="form-label">Confirm Password</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                        </svg>
                    </span>
                    <input onkeyup="hideError()" name="password2" type="password" class="form-control" id="pass2" required>
                </div>
            </div>
            <div class="d-grid gap-2 col-4 mx-auto">
                <button type="submit" class="btn btn-dark btn-md">Sign up</button>
            </div>
            <?php
            if (isset($_SESSION["failed"])) {
                echo("<div class='alert alert-danger mt-2' id='failed' role='alert'>
                User already exists
                </div>");

                // unset($_SESSION["failed"]);
                session_unset();

                
            } else {
                echo("<div class='alert alert-danger mt-2' id='error' role='alert' style='visibility:hidden'>
                Passwords Do Not Match!
                </div>");
            }

            
            ?>
            



        </form>

    </div>


    <script>
        function verifyPasswords() {
            var p1 = document.getElementById("pass1").value;
            var p2 = document.getElementById("pass2").value;

            if (p1 == p2) {
                return true;
            } else {
                document.getElementById("error").style.visibility = "visible";
                return false;
            }
        }

        function hideError() {
            document.getElementById("error").style.visibility = "hidden";
            hideFailed();
        }

        function hideFailed() {
            document.getElementById("failed").style.visibility = "hidden";
        }
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>