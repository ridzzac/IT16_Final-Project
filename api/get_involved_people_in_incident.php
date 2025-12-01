<?php

require __DIR__ . "/../database_connection.php";

$involvedPeopleInIncident_IncidentInfo = [];
$involvedPeopleInIncident_PeopleList = [];

if(isset($_GET["involved_people_page"]) && $_GET["involved_people_page"] === true) {
    $incident_id = $_GET["incident_id"];

    // Select Incident with the ID
    $queryForIncident = "SELECT * FROM incident WHERE incident_id = ?";
    $stmtForIncident = $conn->prepare($queryForIncident);
    $stmtForIncident->bind_param("i", $incident_id);
    if($stmtForIncident->execute()) {
        $involvedPeopleInIncident_IncidentInfo = $stmt->fetch_assoc();
    }

    // Select all people involved
    $queryForInvolvedPeople = "
        SELECT
            involvement_type.name,
            person.first_name,
            person.last_name,
            person.date_of_birth,
            gender.name,
            odiongan_barangay.name,
            person.sub_location
        FROM
            person LEFT JOIN gender ON person.gender_id = gender.gender_id 
            LEFT JOIN involvement_type ON involved_person.involvement_type_id = involvement_type.involvement_type_id
        WHERE
            involved_person.incident_id = ?
    ";
    $stmtForInvolvedPeople = $conn->prepare($queryForInvolvedPeople);
    $stmtForInvolvedPeople->bind_param("i", $incident_id);
    if($stmtForInvolvedPeople->execute()) {
        while($row = $stmtForInvolvedPeople->fetch_assoc()) {
            array_push($involvedPeopleInIncident_PeopleList, $row);
        }
    }
}

?>