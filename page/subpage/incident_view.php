<?php
require __DIR__ . "/../../api/get_involved_people_in_incident.php";
$info = &$involvedPeopleInIncident_IncidentInfo;
$list = &$involvedPeopleInIncident_PeopleList;

if(isset($_GET["associate_person_modal"]) && $_GET["associate_person_modal"] === "true")
    require __DIR__ . "/../modal/associate_person_modal.php";
?>

<h1><?= htmlspecialchars($info["title"]) ?></h1>
<p><?= htmlspecialchars($info["description"]) ?></p>
<p>Address: <?= htmlspecialchars($info["address"]) ?></p>
<p>Date of Incident: <?= htmlspecialchars($info["date_of_incident"]) ?></p>
<p>Status: <?= htmlspecialchars($info["status"]) ?></p>

<h2>People Involved</h2>
<?php if(isUserLoggedIn()): ?>
<form method="get">
    <input type="hidden" name="display" value="incident_view">
    <input type="hidden" name="incident_id" value="<?= htmlspecialchars($incident_id) ?>">
    <input type="hidden" name="associate_person_modal" value="true">
    <button>Associate Person</button>
</form>
<?php endif ?>
<div class="table_container">
    <table>
        <thead>
            <tr>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Gender</td>
                <td>Involvement Type</td>
                <td>Age At Incident</td>
                <td>Address</td>
                <td>Description</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($list as $person): ?>
            <tr>
                <td><?= htmlspecialchars($person["first_name"]) ?> </td>
                <td><?= htmlspecialchars($person["last_name"]) ?> </td>
                <td><?= htmlspecialchars($person["gender"]) ?> </td>
                <td><?= htmlspecialchars($person["involvement_type"]) ?> </td>
                <td><?= htmlspecialchars($person["age_at_incident"]) ?> </td>
                <td><?= htmlspecialchars($person["address"]) ?> </td>
                <td><?= htmlspecialchars($person["description"]) ?> </td>
                <td><img src="<?= htmlspecialchars($person["face_image_file"]) ?>" width="100" height="100"></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>