<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Incident ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Address</th>
                <th>Date Of Incident</th>
                <th>Date Reported</th>
                <th>Date Investigation Started</th>
                <th>Date Resolved</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                require __DIR__."/../api/get_incident_list.php";
                foreach ($incidentsList as $incident): 
            ?>
                <tr>
                    <td><?= htmlspecialchars($incident["incident_id"]) ?> </td>
                    <td><?= htmlspecialchars($incident["title"]) ?> </td>
                    <td><?= htmlspecialchars($incident["description"]) ?> </td>
                    <td><?= htmlspecialchars($incident["address"]) ?> </td>
                    <td><?= htmlspecialchars($incident["date_of_incident"]) ?> </td>
                    <td><?= htmlspecialchars($incident["date_reported"]) ?> </td>
                    <td><?= htmlspecialchars($incident["date_investigation_started"]) ?> </td>
                    <td><?= htmlspecialchars($incident["date_resolved"]) ?> </td>
                    <td><?= htmlspecialchars($incident["status"]) ?> </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>