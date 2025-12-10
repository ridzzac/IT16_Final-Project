<?php

require __DIR__ . "/../database_connection.php";

$queryForPeople = "SELECT COUNT(*) AS 'count' FROM person;";
$stmtForPeople = $conn->prepare($queryForPeople);
$isPeopleCountSuccess = $stmtForPeople->execute();
$resultPeopleCount = $stmtForPeople->get_result();
$peopleCount = $resultPeopleCount->fetch_assoc()["count"];

$queryForIncidents = "SELECT COUNT(*) AS 'count' FROM incident;";
$stmtForIncidents = $conn->prepare($queryForIncidents);
$isIncidentsCountSuccess = $stmtForIncidents->execute();
$resultIncidentsCount = $stmtForIncidents->get_result();
$incidentsCount = $resultIncidentsCount->fetch_assoc()["count"];

$queryForUsers = "SELECT COUNT(*) AS 'count' FROM system_user;";
$stmtForUsers = $conn->prepare($queryForUsers);
$isUsersCountSuccess = $stmtForUsers->execute();
$resultUsersCount = $stmtForUsers->get_result();
$usersCount = $resultUsersCount->fetch_assoc()["count"];
?>