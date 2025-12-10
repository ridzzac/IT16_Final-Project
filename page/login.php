<?php
require __DIR__ . "/../api/authenticate_user.php";

if(isUserLoggedIn())
    header("Location: index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    <a href="index.php">Dashboard</a>
    <form method="post" action="../api/authenticate_user.php">
        <label for="username_input">Username</label>
        <input id="username_input" name="username">
        <label for="password_input">Password</label>
        <input id="password_input" name="password" type="password">
        <button type="submit">Log In</button>
    </form>
</body>
</html>