<?php
if(!isset($_GET["incident_id"]) || empty($_GET["incident_id"]) || !is_int($_GET["incident_id"])){
    $_GET["incident_id"] = 5;
}
require __DIR__."/../api/get_involved_people_in_incident.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="incident_id_form">
        <input name="incident_id" placeholder="Incident ID" value="5">
        <button type="submit">Submit</button>
    </form>
    <?php
        print_r($involvedPeopleInIncident_IncidentInfo);
        foreach($involvedPeopleInIncident_IncidentInfo as $value):
    ?>
    <?php endforeach ?>
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Involvement Type</th>
                <th>Age At Incident</th>
                <th>Address</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php 

                foreach ($involvedPeopleInIncident_PeopleList as $involvedPerson): 
            ?>
                <tr>
                    <td><?= htmlspecialchars($involvedPerson["first_name"]) ?> </td>
                    <td><?= htmlspecialchars($involvedPerson["last_name"]) ?> </td>
                    <td><?= htmlspecialchars($involvedPerson["gender"]) ?> </td>
                    <td><?= htmlspecialchars($involvedPerson["involvement_type"]) ?> </td>
                    <td><?= htmlspecialchars($involvedPerson["age_at_incident"]) ?> </td>
                    <td><?= htmlspecialchars($involvedPerson["address"]) ?> </td>
                    <td><?= htmlspecialchars($involvedPerson["description"]) ?> </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <script>
        document.getElementById("incident_id_form").addEventListener("submit", e => {
            e.preventDefault();
            $incident_id = new FormData(event.target).get("incident_id");

            
        });
    </script>
</body>
</html>