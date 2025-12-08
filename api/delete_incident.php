<?php

require __DIR__ . "/../database_connection.php";
require __DIR__ . "/internal/auditing.php";

$isSuccess = false;
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $isDeleteSuccess = false;
    $isAuditSuccess = false;

    $entity_table_id = DB_ENTITY_TABLE_INCIDENT;
    $old_value = $_POST["old_value"];
    $user_id = $_POST["user_id"];
    $description = $_POST["description"];

    $incident_id = $_POST["incident_id"];
    
    $query = "
        DELETE FROM incident WHERE incident_id = ?
    "; 
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $incident_id);
    $isDeleteSuccess = $stmt->execute();

}
?>