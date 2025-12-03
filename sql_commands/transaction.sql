-- Adding new person
INSERT INTO `person` (`first_name`, `middle_name`, `last_name`, `date_of_birth`, `gender_id`, `odiongan_barangay_id`, `sub_location`, `occupation`)
VALUES (?, ?, ?, ?, ?, ?, ?, ?);

-- Creating new user account
INSERT INTO `system_user` (`person_id`, `username`, `password`, `created_at`, `is_admin`)
VALUES (?, ?, ?, ?, ?);

-- Adding new incident
INSERT INTO `incident` (`title`, `description`, `odiongan_barangay_id`, `sub_location`, `date_of_incident`, `date_investigation_started`, `incident_status_id`)
VALUES (?, ?, ?, ?, ?, ?, ?);

-- Associating/Involving people in an incident
INSERT INTO `involved_person` (`incident_id`, `person_id`, `involvement_type_id`, `description`)
VALUES (?, ?, ?, ?);

-- Adding an `update` record in the audit_log where a record from an entity table has been updated
INSERT INTO `audit_log` (`table_id`, `record_id`, `action_type`, `field_name`, `old_value`, `new_value`, `user_id`, `timestamp`, `description`)
VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);

-- Adding a `delete` record in the audit_log where a record from an entity table has been deleted
INSERT INTO `audit_log` (`audit_log_id`, `record_id`, `action_type`, `user_id`, `timestamp`, `description`)
VALUES(?, ?, ?, ?, ?, ?);

-- Updating a person. Needs to add an update record in the audit_log
UPDATE `person` SET `first_name` = ?, `middle_name` = ?, `last_name` = ? , `date_of_birth` = ? , `gender_id` = ? , `odiongan_barangay_id` = ? , `sub_location` = ? , `occupation` = ?
WHERE `person`.`person_id` = ?;

-- Updating an incident. Needs to add an update record in the audit_log
UPDATE `incident` SET `title` = ?, `description` = ?, `odiongan_barangay_id` = ?, `sub_location` = ?, `date_of_incident` = ?, `date_investigation_started` = ?, `incident_status_id` = ?
WHERE `incident`.`incident_id` = ?;

-- Updating an associated person in an incident. Needs to add an update record in the audit_log
UPDATE `involved_person` SET `incident_id` = ?, `person_id` = ?, `involvement_type_id` = ?, `description` = ?
WHERE `involved_person`.`involved_person_id` = ?;

-- Updating a user. Needs to add an update record in the audit_log
UPDATE `system_user` SET `person_id` = ?, `username` = ?, `password` = ?, `created_at` = ?, `is_admin` = ?
WHERE `system_user` SET `user_id` = ?;

-- Deleting a user. Needs to add a delete record in the audit_log.
DELETE FROM `system_user` WHERE `user_id` = ?;

-- Disassociating a person from an incident /
-- Removing one of involvement types from the person involved in an incident
DELETE FROM `involved_person` WHERE `involved_person_id` = ?;

