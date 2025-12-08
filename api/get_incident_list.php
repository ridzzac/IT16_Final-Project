<?php

require __DIR__ . "/../database_connection.php";

$isSuccess = false;
$incidentsList = [];
$limit = $_GET["limit"] ?? 20;
$query = "
    SELECT
        incident.incident_id,
        incident.title,
        incident.description,
        CONCAT_WS(', ', odiongan_barangay.name, incident.sub_location) AS 'address',
        incident.date_of_incident,
        incident.date_reported,
        incident.date_investigation_started,
        incident.date_resolved,
        incident_status.name as 'status'
    FROM
        incident INNER JOIN incident_status ON incident.incident_status_id = incident_status.incident_status_id
        INNER JOIN odiongan_barangay ON odiongan_barangay.odiongan_barangay_id = incident.odiongan_barangay_id
    LIMIT ?
";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $limit);
$isSuccess = $stmt->execute();
if($isSuccess){
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
        array_push($incidentsList, $row);
    }
}
/* 
if(isset($_GET["incident_page"]) && $_GET["incident_page"] === true) {
    $start_id = $_GET["start_id"] ?? 0;
    $limit = $_GET["limit"] ?? 20;
    $query = "SELECT * FROM incident WHERE incident_id >= ? LIMIT ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $start_id, $limit);
    $selectPersonResult = $stmt->execute();
    if($selectPersonResult){
        $result = $stmt->get_result();
        while($row = $result->fetch_assoc(MYSQLI_ASSOC)){
            array_push($incidentPage, $row);
        }
    }
    $stmt->close();
} */

?>