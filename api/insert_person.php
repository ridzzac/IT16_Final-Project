<?php

require __DIR__ . "/../database_connection.php";
require __DIR__ . "/internal/handle_profile_image.php";

$isSuccess = false;
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $first_name = $_POST["first_name"];
    $middle_name = $_POST["middle_name"];
    $last_name = $_POST["last_name"];
    $date_of_birth = $_POST["date_of_birth"];
    $gender_id = $_POST["gender_id"] ?? 0;
    $odiongan_barangay_id = $_POST["odiongan_barangay_id"] ?? 0;
    $sub_location = $_POST["sub_location"];
    $occupation = $_POST["occupation"];

    $query = "
        INSERT INTO person (first_name, middle_name, last_name, date_of_birth, gender_id, odiongan_barangay_id, sub_location, occupation)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssiiss", $first_name, $middle_name, $last_name, $date_of_birth, $gender_id, $odiongan_barangay_id, $sub_location, $occupation);
    $isInsertSuccess = $stmt->execute();

    error_log(print_r($_FILES, true));
    if($_FILES["profile_image"]["error"] != UPLOAD_ERR_OK) {
        header("Location: ../page/index.php?display=people_table"); 
        exit;
    }

    $isSuccess = $isInsertSuccess && uploadProfileImage($conn, $_FILES["profile_image"]["tmp_name"], $_FILES["profile_image"]["name"], $conn->insert_id);
    header("Location: ../page/index.php?display=people_table"); 
}
?>