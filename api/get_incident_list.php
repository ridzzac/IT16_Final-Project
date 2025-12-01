<?php

require __DIR__ . "/../database_connection.php";
require __DIR__ . "/../util.php";

$start_id = $_GET["start_id"] ?? 0;
$limit = $_GET["limit"] ?? 20;
$query = "SELECT * FROM incident WHERE incident_id >= ? LIMIT ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $start_id, $limit);
$selectPersonResult = $stmt->execute();
?>
