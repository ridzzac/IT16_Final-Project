<?php
require __DIR__ . "/../../database_connection.php";
const UPLOADS_DIR = "../../uploads/";
function uploadProfileImage(mysqli &$conn, string &$tmpName, string &$name, int $person_id): bool {
    $fileDestination = _setFileDestination($name);
    $isUploadSuccessful = move_uploaded_file($tmpName, __DIR__ . "/" . $fileDestination);

    $query = "
        UPDATE person SET face_image_file = ? WHERE person_id = ?
    ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $fileDestination, $person_id);
    return $stmt->execute();
}

function deleteProfileImage(mysqli &$conn, int $person_id): bool {
    $query = "
        SELECT face_image_file FROM person WHERE person_id = ?
    ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $person_id);
    if($stmt->execute() === false)
        return false;

    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $oldFileDestination = $result->fetch_assoc()["face_image_file"];
        error_log("OLD $oldFileDestination");
        unlink(__DIR__ . "/" . $oldFileDestination);
    }
    return true;
}
function _setFileDestination(string $name): string {
    $fileExtension = pathinfo($name, PATHINFO_EXTENSION);
    return UPLOADS_DIR . uniqid('', true) . '.' . $fileExtension;
}

?>