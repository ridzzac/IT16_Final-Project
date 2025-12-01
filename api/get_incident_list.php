<?php

require __DIR__ . "/../database_connection.php";
require __DIR__ . "/../util.php";

$incidentPage = [];

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
}
?>