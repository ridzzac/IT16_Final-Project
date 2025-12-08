<?php
require __DIR__ . "/../database_connection.php";

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(!isset($_POST["username"]) || !isset($_POST["password"])){
        $_SESSION["login_error"] = "Enter username and password!";
        header("Location: ../public/login.php");
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
            $_SESSION["username"] = $user_info["username"];
            $_SESSION["logged_in"] = true;
            $isLoginSuccess = true;
        }
    }
    if($isLoginSuccess) {
        header("Location: ../public/dashboard.php");
        exit;
    }
    else{
        $_SESSION["login_error"] = "Invalid username or password.";
        header("Location: ../public/login.php");
        exit;
    }
}
?>