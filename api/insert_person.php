<?php

require __DIR__ . "/../database_connection.php";

$isSuccess = false;
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $first_name = $_POST["first_name"];
    $middle_name = $_POST["middle_name"];
    $last_name = $_POST["last_name"];
    $date_of_birth = $_POST["date_of_birth"];
    $gender_id = $_POST["gender_id"] ?? 0;
    $odiongan_barangay_id = $_POST["odiongan_barangay_id"] ?? 0;
    $sub_location = $_POST["sub_location"];

    $query = "
        INSERT INTO person (first_name, middle_name, last_name, date_of_birth, gender_id, odiongan_barangay_id, sub_location)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssiis", $first_name, $middle_name, $last_name, $date_of_birth, $gender_id, $odiongan_barangay_id, $sub_location);
    $isSuccess = $stmt->execute();
}
?>