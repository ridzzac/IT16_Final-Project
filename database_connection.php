<?php

// These variables are in all caps to indicate that it shouldn't be changed.
// Set to be non-const for convenience when doing string interpolation.

$PERSON = "person";
$INCIDENT = "incident";
$INVOLVED_PERSON = "involved_person";
$GENDER = "gender";
$INVOLVEMENT_TYPE = "involvement_type";
$USER = "user";

$PERSON_ID = "person_id";
$INCIDENT_ID = "incident_id";
$INVOLVEMENT_TYPE_ID = "involvement_type_id";


$conn = new mysqli("localhost", "root", "", "irms_db");

if($conn->connect_error){
    echo "Error: {$conn->connect_error}";
    die;
}

?>
