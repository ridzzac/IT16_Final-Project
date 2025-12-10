<?php
session_start();

unset($_SESSION["logged_in"]);
unset($_SESSION["username"]);

session_destroy();

header("Location: ../page/login.php")
?>