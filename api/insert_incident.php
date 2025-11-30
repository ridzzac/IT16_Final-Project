<?php

require __DIR__ . "/../database_connection.php";
require __DIR__ . "/../constants.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $title = $_POST["title"];
    $description = $_POST["description"] ?? null;
    $odiongan_barangay_id = $_POST["odiongan_barangay_id"] ?? 0;
    $sub_location = $_POST["sub_location"] ?? null;
    $date_of_incident = $_POST["date_of_incident"];
    $date_investigation_started = $_POST["date_investigation_started"] ?? null;
    $date_resolved = $_POST["date_resolved"] ?? null;

    $query = "
        INSERT INTO incident (title, description, odiongan_barangay_id, sub_location, date_of_incident, date_investigation_started, date_resolved)
        VALUES(?, ?, ?, ?, ?, ?, ?)
    ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssissss", $title, $description, $odiongan_barangay_id, $sub_location, $date_of_incident, $date_investigation_started, $date_resolved);
    $insertIncidentResult = $stmt->execute();
}
?>