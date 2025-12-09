<?php

require __DIR__ . "/../database_connection.php";

$isSuccess = false;
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $user_id = $_POST["user_id"];

    // Gets the file path of the image and deletes it
    $queryForImage = "SELECT face_file_image FROM user WHERE user_id = ?";
    $stmtForImage = $conn->prepare($query);
    if($stmtForImage->execute()){
        $result = $stmtForImage->get_result();
        $row = $result()->fetch_assoc();
        $file_path = realpath($row["face_image_file"]);
        if(file_exists($file_path)){
            unlink($file_path);
        }
            
    }

    // Delete User Row
    $query = "
        DELETE FROM system_user WHERE user_id = ?
    ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $isSuccess = $stmt->execute();
}
?>

