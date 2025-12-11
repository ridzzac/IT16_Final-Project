<?php

require __DIR__ . "/../database_connection.php";

$isSuccess = false;
$incident = [];

if(isset($_GET["incident_id"]))
    $incident_id = $_GET["incident_id"];
else
    exit;
$query = "
    SELECT
        title,
        description,
        odiongan_barangay_id,
        sub_location,
        date_of_incident,
        date_reported,
        date_investigation_started,
        date_resolved,
        incident_status_id
    FROM
        incident
    WHERE
        incident_id = ?
";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $_GET["incident_id"]);
$isSuccess = $stmt->execute();
if($isSuccess){
    $result = $stmt->get_result();
    $incident = $result->fetch_assoc();
}
?>