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
                <th>Person ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Date Of Birth</th>
                <th>Address</th>
                <th>Occupation</th>    
            </tr>
        </thead>
        <tbody>
            <?php 
                require __DIR__."/../api/get_people_list.php";
                foreach ($peopleList as $person): 
            ?>
                <tr>
                    <td><?= htmlspecialchars($person["person_id"]) ?> </td>
                    <td><?= htmlspecialchars($person["first_name"]) ?> </td>
                    <td><?= htmlspecialchars($person["middle_name"]) ?> </td>
                    <td><?= htmlspecialchars($person["last_name"]) ?> </td>
                    <td><?= htmlspecialchars($person["gender"]) ?> </td>
                    <td><?= htmlspecialchars($person["age"]) ?> </td>
                    <td><?= htmlspecialchars($person["date_of_birth"]) ?> </td>
                    <td><?= htmlspecialchars($person["address"]) ?> </td>
                    <td><?= htmlspecialchars($person["occupation"]) ?> </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>