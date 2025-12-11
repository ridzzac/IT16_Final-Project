<?php
require __DIR__ . "/../database_connection.php";
const UPLOADS_DIR = "../uploads/";

$isSuccess = false;
if($_SERVER["REQUEST_METHOD"] === "POST") {
    if($_FILES["uploadedFile"]["error"] != UPLOAD_ERR_OK) {
        exit;
    }
    $person_id = $_POST["person_id"];
    $fileExtension = pathinfo($_FILES["uploadedFile"]["name"], PATHINFO_EXTENSION);
    $fileDestination = UPLOADS_DIR . uniqid('', true) . '.' . $fileExtension;
    $isUploadSuccess = move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $fileDestination);
    error_log("isUploadSuccess: $isUploadSuccess");
    if(!$isUploadSuccess)
        exit;

    $query = "
        UPDATE person SET face_image_file = ? WHERE person_id = ?
    ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $fileDestination, $person_id);
    $isSuccess = $stmt->execute();
    error_log("isSuccess: $isSuccess");
}

?>