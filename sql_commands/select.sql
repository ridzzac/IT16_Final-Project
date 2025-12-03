-- Show People (Basic)
SELECT
	person.person_id,
    person.first_name,
    person.middle_name,
    person.last_name,
    gender.name as 'gender',
    TIMESTAMPDIFF(YEAR, person.date_of_birth, NOW()) as 'age',
    person.date_of_birth,
    CONCAT_WS(',', odiongan_barangay.name, person.sub_location) as 'address',
    person.occupation
FROM
	person INNER JOIN gender ON person.gender_id = gender.gender_id
    INNER JOIN odiongan_barangay ON person.odiongan_barangay_id = odiongan_barangay.odiongan_barangay_id;

-- Show Incidents (Basic)
SELECT
	incident.incident_id,
    incident.title,
    incident.description,
    CONCAT_WS(', ', odiongan_barangay.name, incident.sub_location) AS 'address',
    incident.date_of_incident,
    incident.date_reported,
    incident.date_investigation_started,
    incident.date_resolved,
    incident_status.name as 'status'
FROM
	incident INNER JOIN incident_status ON incident.incident_status_id = incident_status.incident_status_id
    INNER JOIN odiongan_barangay ON odiongan_barangay.odiongan_barangay_id = incident.odiongan_barangay_id;

-- Showing the incidents a selected person is involved in
SELECT
	incident.incident_id,
    incident.title,
    incident.description AS 'incident_description',
    involvement_type.name AS 'involvement_type',
    involved_person.description AS 'involvement_description',
    CONCAT_WS(', ', odiongan_barangay.name, incident.sub_location) AS 'incident_address',
    incident.date_of_incident,
    incident_status.name AS 'incident_status'
FROM
	involved_person
    INNER JOIN incident ON involved_person.incident_id = incident.incident_id
    INNER JOIN person ON involved_person.person_id = person.person_id
    INNER JOIN involvement_type ON involved_person.involvement_type_id = involvement_type.involvement_type_id
    INNER JOIN odiongan_barangay ON incident.odiongan_barangay_id = odiongan_barangay.odiongan_barangay_id
    INNER JOIN incident_status ON incident.incident_status_id = incident_status.incident_status_id
WHERE
	person.person_id = ?;

--  Showing the people involved in a selected incident
SELECT
	person.first_name,
    person.last_name,
    gender.name AS 'gender', 
    involvement_type.name AS 'involvement_type',
    TIMESTAMPDIFF(YEAR, person.date_of_birth, incident.date_of_incident) AS 'age_at_incident',
    CONCAT_WS(', ', odiongan_barangay.name, person.sub_location) AS 'address',
    involved_person.description
FROM
	person INNER JOIN gender ON person.gender_id = gender.gender_id
    INNER JOIN involved_person ON involved_person.person_id = person.person_id
    INNER JOIN incident ON incident.incident_id = involved_person.incident_id
    INNER JOIN involvement_type ON involvement_type.involvement_type_id = involved_person.involvement_type_id
    INNER JOIN odiongan_barangay ON odiongan_barangay.odiongan_barangay_id = person.odiongan_barangay_id
WHERE
	incident.incident_id = ?;

-- Showing the audit log
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
    INNER JOIN system_user ON system_user.user_id = audit_log.user_id;