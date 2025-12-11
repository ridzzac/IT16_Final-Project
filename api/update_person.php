<?php

require __DIR__ . "/../database_connection.php";
require __DIR__ . "/internal/handle_profile_image.php";

$isSuccess = false;
if($_SERVER["REQUEST_METHOD"] === "POST"){    
    $person_id = $_POST["person_id"];
    $first_name = $_POST["first_name"];
    $middle_name = $_POST["middle_name"];
    $last_name = $_POST["last_name"];
    $date_of_birth = $_POST["date_of_birth"];
    $gender_id = $_POST["gender"] ?? 0;
    $odiongan_barangay_id = $_POST["barangay"] ?? 0;
    $sub_location = $_POST["sub_location"];
    $occupation = $_POST["occupation"];

    $query = "
        UPDATE
            person
        SET first_name = ?, middle_name = ?, last_name = ?, date_of_birth = ?,
            gender_id = ?, odiongan_barangay_id = ?, sub_location = ?, occupation = ?
        WHERE person_id = ?
    ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssiissi", $first_name, $middle_name, $last_name, $date_of_birth, $gender_id, $odiongan_barangay_id, $sub_location, $occupation, $person_id);
    $isUpdateSuccess = $stmt->execute();

    if($_FILES["profile_image"]["error"] != UPLOAD_ERR_OK) {
        header("Location: ../page/index.php?display=people_table"); 
        exit;
    }
    deleteProfileImage($conn, $person_id);
    $isSuccess = $isUpdateSuccess && uploadProfileImage($conn, $_FILES["profile_image"]["tmp_name"], $_FILES["profile_image"]["name"], $person_id);
        
    header("Location: ../page/index.php?display=people_table"); 
}
?>