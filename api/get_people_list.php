<?php

require __DIR__ . "/../database_connection.php";

$peopleList = [];
$isSuccess = false;
$peopleListLimit = $_GET["limit"] ?? 20;
$query = "
    SELECT
        person.person_id,
        person.first_name,
        person.middle_name,
        person.last_name,
        gender.name as 'gender',
        TIMESTAMPDIFF(YEAR, person.date_of_birth, NOW()) as 'age',
        person.date_of_birth,
        CONCAT_WS(',', odiongan_barangay.name, person.sub_location) as 'address',
        person.occupation,
        person.face_image_file
    FROM
        person INNER JOIN gender ON person.gender_id = gender.gender_id
        INNER JOIN odiongan_barangay ON person.odiongan_barangay_id = odiongan_barangay.odiongan_barangay_id
    LIMIT ?
";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $peopleListLimit);
$isSuccess = $stmt->execute();
if($isSuccess){
    $result = $stmt->get_result();
    $count_id = 0;
    while($row = $result->fetch_assoc()){
        array_push($peopleList, $row);
        if($count_id++ === $result->num_rows - 1)
            $last_selected_person_id = $row["person_id"];
    }
}
?>