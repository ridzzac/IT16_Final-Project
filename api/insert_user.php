<?php

require __DIR__ . "/../database_connection.php";

$isSuccess = false;
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $person_id = $_POST["person_id"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    if(strlen($password) < 8){
        header("Location: ../page/index.php?display=users_table&insert_user_error=short_password");
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);

    $query = "
        INSERT INTO system_user (person_id, username, password)
        VALUES (?, ?, ?)
    ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iss", $person_id, $username, $hashedPassword);
    $isSuccess = $stmt->execute();
    header("Location: ../page/index.php?display=users_table");
}
?>