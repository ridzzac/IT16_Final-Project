<?php
require __DIR__ . "/../database_connection.php";

$isSuccess = false;
$limit = $_GET["limit"] ?? 20;
$userList = [];

$query = "
    SELECT
        system_user.user_id,
        system_user.username,
        CONCAT(person.first_name, ' ', person.last_name) AS 'person_name',
        system_user.created_at,
        CASE WHEN system_user.is_admin = 1 THEN 'Yes' ELSE 'No' END AS 'is_admin'
    FROM
        system_user INNER JOIN person ON system_user.person_id = person.person_id
    LIMIT ?
";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $limit);
$isSuccess = $stmt->execute();
if($isSuccess) {
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()) {
        array_push($userList, $row);
    }
}
?>