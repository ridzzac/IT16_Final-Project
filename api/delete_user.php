<?php

require __DIR__ . "/../database_connection.php";

$isSuccess = false;
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $user_id = $_POST["user_id"];
    $query = "
        DELETE FROM system_user WHERE user_id = ?
    ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $isSuccess = $stmt->execute();
}
?>
