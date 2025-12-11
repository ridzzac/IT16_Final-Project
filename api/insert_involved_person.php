<?php

require __DIR__ . "/../database_connection.php";

$isSuccess = false;
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $incident_id = $_POST["incident_id"];
    $person_id = $_POST["person_id"];
    $involvement_type_id = $_POST["involvement_type_id"] ?? 0;
    $description = $_POST["description"] ?? null;

    $query = "
        INSERT INTO involved_person (incident_id, person_id, involvement_type_id, description)
        VALUES (?, ?, ?, ?)
    ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iiis", $incident_id, $person_id, $involvement_type_id, $description);
    $isSuccess = $stmt->execute();
    header("Location: ../page/index.php?display=incident_view&incident_id=$incident_id");
}
?>