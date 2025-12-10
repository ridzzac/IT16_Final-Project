<?php
require __DIR__ . "/../../api/get_incident_list.php";

if(isset($_GET["incident_modal"]) && $_GET["incident_modal"] === "true")
    require __DIR__ . "/../modal/incident_modal.php"

?>
<h1>Incidents Table</h1>
<form action="get">
    <input type="hidden" name="table" value="incidents">
    <input type="hidden" name="incident_modal" value="true">
    <button>Record Incident</button>
</form>
<table>
    <thead>
        <tr>
            <td>Incident ID</td>
            <td>Title</td>
            <td>Description</td>
            <td>Address</td>
            <td>Date Of Incident</td>
            <td>Date Reported</td>
            <td>Date Investigation Started</td>
            <td>Date Resolved</td>
            <td>Status</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($incidentsList as $incident): ?>
            <tr>
                <td><?= htmlspecialchars($incident["incident_id"]) ?></td>
                <td><?= htmlspecialchars($incident["title"]) ?></td>
                <td><?= htmlspecialchars($incident["description"]) ?></td>
                <td><?= htmlspecialchars($incident["address"]) ?></td>
                <td><?= htmlspecialchars($incident["date_of_incident"]) ?></td>
                <td><?= htmlspecialchars($incident["date_reported"]) ?></td>
                <td><?= htmlspecialchars($incident["date_investigation_started"]) ?></td>
                <td><?= htmlspecialchars($incident["date_resolved"]) ?></td>
                <td><?= htmlspecialchars($incident["status"]) ?></td>
                <td>
                    <form method="get">
                        <input type="hidden" name="table" value="incidents">
                        <input type="hidden" name="incident_id" value="<?= htmlspecialchars($incident["incident_id"]) ?>">
                        <button>View</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>