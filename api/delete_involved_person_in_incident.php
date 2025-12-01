<?php

require __DIR__ . "/../database_connection.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $person_id = $_POST[$PERSON_ID];
    $forVariadic = [];
    $incident_id = $_POST[$INCIDENT_ID];
    array_push($forVariadic, $incident_id);
    $involvement_type_id = $_POST[$INVOLVEMENT_TYPE_ID] ?? null;
    $query = "
        DELETE FROM $INVOLVED_PERSON WHERE $PERSON_ID = ? AND $INCIDENT_ID = ?
    ";
    $types = "ii";
    if($involvement_type_id === null){
        $query .= " AND $INVOLVEMENT_TYPE_ID = ?";
        $types .= "i";
        array_push($forVariadic, $involvement_type_id);
    }
    $forVariadic = toArrayOfRef($forVariadic);
    $stmt = $conn->prepare($query);
    $stmt->bind_param($types, $person_id, ... $forVariadic);
    $deleteInvolvedPersonInIncident = $stmt->execute();
}
?>
