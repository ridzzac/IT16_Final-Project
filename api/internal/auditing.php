<?php
require __DIR__ . "/../../database_connection.php";

const DB_ENTITY_TABLE_GENDER = 1;
const DB_ENTITY_TABLE_INCIDENT = 2;
const DB_ENTITY_TABLE_INCIDENT_STATUS = 3;
const DB_ENTITY_TABLE_INVOLVED_PERSON = 4;
const DB_ENTITY_TABLE_INVOLVEMENT_TYPE = 5;
const DB_ENTITY_TABLE_ODIONGAN_BARANGAY = 6;
const DB_ENTITY_TABLE_PERSON = 7;
const DB_ENTITY_TABLE_SYSTEM_USER = 8;

function insertDeletedRecordAudit(int $entity_table_id, int $record_id, array $old_value, int $user_id, string $description): bool {
    return _insertAuditRecord(entity_table_id: $entity_table_id, record_id: $record_id, action_type: "DELETE", old_value: $old_value, user_id: $user_id, description: $description);
}

function insertUpdatedRecordAudit(int $entity_table_id, int $record_id, string $field_name, $old_value, $new_value, int $user_id, string $description): bool {
    return _insertAuditRecord($entity_table_id, $record_id, "UPDATE", $field_name, $old_value, $new_value, $user_id, $description);
}

function _insertAuditRecord(int $entity_table_id, int $record_id, string $action_type, ?string $field_name = null, $old_value = null, $new_value = null, int $user_id, string $description): bool {
    global $conn;

    $query = "
        INSERT INTO `audit_log`(`entity_table_id`, `record_id`, `action_type`, `field_name`, `old_value`, `new_value`, `user_id`, `timestamp`, `description`)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);
    ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iissssis", $entity_table_id, $record_id, $action_type, $field_name, $old_value, $new_value, $user_id, $description);
    return $stmt->execute();
}
?>