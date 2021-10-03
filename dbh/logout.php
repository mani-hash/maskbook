<?php
session_start();
session_destroy();   //destroy session and go back to index page

header("Location: ../");

?>