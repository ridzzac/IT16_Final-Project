<?php

require __DIR__ . "/../database_connection.php";

$isSuccess = false;
$person = [];
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["person_id"])){
    $query = "
        SELECT
            first_name,
            middle_name,
            last_name,
            gender_id,
            date_of_birth,
            odiongan_barangay_id,
            sub_location,
            occupation,
            face_image_file
        FROM
            person
        WHERE
            person_id = ?
    ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $_POST["person_id"]);
    $isSuccess = $stmt->execute();
    if($isSuccess){
        $result = $stmt->get_result();
        $person = $result->fetch_assoc();
    }
    header("Location: ../page/index.php?table=people");
}

?>