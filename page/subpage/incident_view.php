<?php
require __DIR__ . "/../../api/get_involved_people_in_incident.php";
$info = &$involvedPeopleInIncident_IncidentInfo;
$list = &$involvedPeopleInIncident_PeopleList;
?>

<h1><?= htmlspecialchars($info["title"]) ?></h1>
<p><?= htmlspecialchars($info["description"]) ?></p>
<p>Address: <?= htmlspecialchars($info["address"]) ?></p>
<p>Date of Incident: <?= htmlspecialchars($info["date_of_incident"]) ?></p>
<p>Status: <?= htmlspecialchars($info["status"]) ?></p>

