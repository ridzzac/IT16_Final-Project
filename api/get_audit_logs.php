<?php
require __DIR__ . "/../database_connection.php";

$isSuccess = false;
$limit = $_GET["limit"] ?? 20;
$auditLogs = [];

$query = "
    SELECT
    	audit_log.audit_log_id,
        entity_table.entity_table_id,
        audit_log.record_id,
        audit_log.action_type,
        audit_log.field_name,
        audit_log.old_value,
        audit_log.new_value,
        system_user.username,
        audit_log.timestamp,
        audit_log.description
    FROM
    	audit_log
        INNER JOIN entity_table ON audit_log.entity_table_id = entity_table.entity_table_id
        INNER JOIN system_user ON system_user.user_id = audit_log.user_id
    LIMIT ?
";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $limit);
$isSuccess = $stmt->execute();
if($isSuccess) {
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
        array_push($auditLogs, $row);
    }
}
?>