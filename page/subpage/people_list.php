<?php
require __DIR__ . "/../../api/get_people_list.php";

if(isset($_GET["person_modal"]) && $_GET["person_modal"] === "true")
    require __DIR__ . "/../modal/person_modal.php";

if(isset($_GET["update_person_modal"]) && $_GET["update_person_modal"] === "true"){
    // require __DIR__ . "/../../api/get_one_person.php";
    require __DIR__ . "/../modal/update_person_modal.php";
}
?>

<h1>People Table</h1>
<form method="get">
    <input type="hidden" name="table" value="people">
    <input type="hidden" name="person_modal" value="true">
    <button>Insert People</button>
</form>
<table>
    <thead>
        <tr>
            <td>People ID</td>
            <td>First Name</td>
            <td>Middle Name</td>
            <td>Last Name</td>
            <td>Gender</td>
            <td>Age</td>
            <td>Date Of Birth</td>
            <td>Address</td>
            <td>Occupation</td>
            <td>Image</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($peopleList as $person): ?>
            <tr>
                <td><?= htmlspecialchars($person["person_id"]) ?></td>
                <td><?= htmlspecialchars($person["first_name"]) ?></td>
                <td><?= htmlspecialchars($person["middle_name"]) ?></td>
                <td><?= htmlspecialchars($person["last_name"]) ?></td>
                <td><?= htmlspecialchars($person["gender"]) ?></td>
                <td><?= htmlspecialchars($person["age"]) ?></td>
                <td><?= htmlspecialchars($person["date_of_birth"]) ?></td>
                <td><?= htmlspecialchars($person["address"]) ?></td>
                <td><?= htmlspecialchars($person["occupation"]) ?></td>
                <td><img src="<?= htmlspecialchars($person["face_image_file"]) ?>"></td>
            
            </tr>
        <?php endforeach ?>
    </tbody>
</table>