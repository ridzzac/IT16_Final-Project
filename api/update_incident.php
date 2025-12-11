<?php
require __DIR__ . "/../database_connection.php";

$isSuccess = false;
if($_SERVER["REQUEST_METHOD"] === "POST") {
    $incident_id = $_POST["incident_id"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $odiongan_barangay_id = $_POST["barangay"];
    $sub_location = $_POST["sub_location"];
    $date_of_incident = $_POST["date_of_incident"];
    $date_investigation_started = $_POST["date_investigation_started"];
    $date_resolved = $_POST["date_resolved"];
    $status_id = $_POST["status"];

    $query = "
        UPDATE
            incident
        SET
            title = ?,
            description = ?,
            odiongan_barangay_id = ?,
            sub_location = ?,
            date_of_incident = ?,
            date_investigation_started = ?,
            date_resolved = ?,
            incident_status_id = ?
        WHERE
            incident_id = ?
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssissssii", $title, $description, $odiongan_barangay_id, $sub_location, $date_of_incident, $date_investigation_started, $date_resolved, $status_id, $incident_id);
    $isSuccess = $stmt->execute();
    header("Location: ../page/index.php?display=incidents_table");
}
?>