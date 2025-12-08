<?php
require __DIR__ . "/../database_connection.php";

$isSuccess = false;
if($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_POST["user_id"];
    if($user_id === null)
        die;

    $username = $_POST["username"];
    
    $query = "
        UPDATE `system_user` SET `username` = ?
        WHERE `user_id` = ?;
    ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $username, $user_id);
    $isSuccess = $stmt->execute();
}

?>