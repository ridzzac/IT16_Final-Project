<?php

require __DIR__ . "/../database_connection.php";

$involvedPeopleInIncident_IncidentInfo = [];
$involvedPeopleInIncident_PeopleList = [];


$incident_id = $_GET["incident_id"];

// Select Incident with the ID
$queryForIncident = "SELECT * FROM incident WHERE incident_id = ?";
$stmtForIncident = $conn->prepare($queryForIncident);
$stmtForIncident->bind_param("i", $incident_id);
if($stmtForIncident->execute()) {
    $result = $stmtForIncident->get_result();
    $involvedPeopleInIncident_IncidentInfo = $result->fetch_assoc();
    print_r($involvedPeopleInIncident_IncidentInfo);
}

// Select all people involved
$queryForInvolvedPeople = "
    SELECT
        person.first_name AS 'first_name',
        person.last_name AS 'last_name',
        gender.name AS 'gender', 
        involvement_type.name AS 'involvement_type',
        TIMESTAMPDIFF(YEAR, person.date_of_birth, incident.date_of_incident) AS 'age_at_incident',
        CONCAT_WS(', ', odiongan_barangay.name, person.sub_location) AS 'address',
        involved_person.description AS 'description'
    FROM
        person INNER JOIN gender ON person.gender_id = gender.gender_id
        INNER JOIN involved_person ON involved_person.person_id = person.person_id
        INNER JOIN incident ON incident.incident_id = involved_person.incident_id
        INNER JOIN involvement_type ON involvement_type.involvement_type_id = involved_person.involvement_type_id
        INNER JOIN odiongan_barangay ON odiongan_barangay.odiongan_barangay_id = person.odiongan_barangay_id
    WHERE
        incident.incident_id = ?
";
$stmtForInvolvedPeople = $conn->prepare($queryForInvolvedPeople);
$stmtForInvolvedPeople->bind_param("i", $incident_id);
if($stmtForInvolvedPeople->execute()) {
    $result = $stmtForInvolvedPeople->get_result();
    while($row = $result->fetch_assoc()) {
        array_push($involvedPeopleInIncident_PeopleList, $row);
    }
}
$stmtForInvolvedPeople->close();
$stmtForIncident->close();

?>