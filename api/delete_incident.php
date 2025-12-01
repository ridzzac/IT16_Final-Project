<?php

require __DIR__ . "/../database_connection.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $incident_id = $_POST["incident_id"];
    $query = "
        DELETE FROM incident WHERE incident_id = ?
    ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $incident_id);
    $deletePersonResult = $stmt->execute();
}
?>