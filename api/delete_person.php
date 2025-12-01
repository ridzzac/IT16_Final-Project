<?php

require __DIR__ . "/../database_connection.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $person_id = $_POST["person_id"];
    $query = "
        DELETE FROM person WHERE person_id = ?
    ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $person_id);
    $deletePersonResult = $stmt->execute();
}
?>
