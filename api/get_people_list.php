<?php

require __DIR__ . "/../database_connection.php";
require __DIR__ . "/../util.php";

$personPage = [];
if(isset($_GET["person_page"]) && $_GET["person_page"] === true) {
    $start_id = $_GET["start_id"] ?? 0;
    $limit = $_GET["limit"] ?? 20;
    $query = "SELECT * FROM person WHERE person_id >= ? LIMIT ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $start_id, $limit);
    $selectPersonResult = $stmt->execute();
    if($selectPersonResult){
        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()){
            array_push($personPage, $row);
        }
    }
}

?>