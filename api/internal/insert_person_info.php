<?php

function insertPersonInfo($first_name, $middle_name, $last_name, $date_of_birth, $gender_id, $odiongan_barangay_id, $sub_location, $occupation): bool {
    $query = "
        INSERT INTO person (first_name, middle_name, last_name, date_of_birth, gender_id, odiongan_barangay_id, sub_location, occupation)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssiiss", $first_name, $middle_name, $last_name, $date_of_birth, $gender_id, $odiongan_barangay_id, $sub_location, $occupation);
    $isSuccess = $stmt->execute();
}

function insertImagePerson() {
    
}

?.