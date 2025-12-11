<?php

require __DIR__ . "/../database_connection.php";

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
    $isSuccess = $stmt->execute();
    header("Location: test.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input name="person_id" value="7">
        <input name="first_name" value="Ridz Isaac">
        <input name="middle_name" value="Coloma">
        <input name="last_name" value="Soriano">
        <input name="gender" value="1">
        <input name="date_of_birth" value="2003-08-17">
        <input name="barangay" value="1">
        <input name="sub_location" value="Sitio Sikat-Araw">
        <input name="occupation" value="Student">
        <button>Submit</button>
    </form>
</body>
</html>