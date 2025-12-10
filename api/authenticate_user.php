<?php
require __DIR__ . "/../database_connection.php";

session_start();

const SESSION_LOGIN_ERROR = "login_error";
const SESSION_LOGGED_IN = "logged_in";
const SESSION_USERNAME = "username";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(!isset($_POST["username"]) || !isset($_POST["password"])){
        $_SESSION[SESSION_LOGIN_ERROR] = "Enter username and password!";
        header("Location: ../page/login.php");
        exit;
    }
    $isLoginSuccess = false;
    $input_username = $_POST["username"];
    $input_password = $_POST["password"];
    $stmt = $conn->prepare("SELECT username, `password` FROM system_user WHERE username = ?");
    $stmt->bind_param("s", $input_username);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 1){
        $user_info = $result->fetch_assoc();
        $hashed_password = $user_info["password"];
        if(password_verify($input_password, $hashed_password)){
            $_SESSION[SESSION_USERNAME] = $user_info["username"];
            $_SESSION[SESSION_LOGGED_IN] = true;
            $isLoginSuccess = true;
        }
    }
    if($isLoginSuccess) {
        header("Location: ../page/index.php");
        exit;
    }
    else{
        $_SESSION[SESSION_LOGIN_ERROR] = "Invalid username or password.";
        header("Location: ../page/login.php");
        exit;
    }
}

function isUserLoggedIn(): bool {
    return isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true;
}


?>