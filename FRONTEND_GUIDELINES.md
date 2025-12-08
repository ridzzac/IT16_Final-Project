# Front-end Guidelines

# API Endpoints
Most endpoints have `$isSuccess` to indicate success of the operation. If it is `true` then it is successful, `false` if not and it means there was an error.
Few endpoints have a specified is-success variable but they have the words "is success" to indicate that.
## People List
__Path__: `/api/get_people_list.php`<br>
__Variables__:
- $peopleList[] - an indexed array for each person represented as an associative array:
```php
[
    [
        "person_id": 5,
        "first_name": "Carlos",
        "middle_name": "de Castro",
        "last_name": "Sainz",
        "gender": "Male",
        "age": 31,
        "date_of_birth": "1994-09-01",
        "address": "Canduyong",
        "occupation": "Firefighter",
        "face_image_file": "../uploads/example.png"
    ],
    [
        "person_id": 6,
        "first_name": ...
        ...
    ]
]
```

## Incidents List
__Path__: `/api/get_incident_list.php`<br>
__Variables__:
- $incidentList[] - an indexed array for each incident represented as an associative array:
```php
[
    [
        "incident_id": 5,
        "title": "Bon Bakery Fire",
        "description": "The Bon Bakery was on fire because of a faulty oven.",
        "address": "Dapawan, Building #12",
        "date_of_incident": "2025-02-15",
        "date_reported": "2025-02-15",
        "date_investigation_started": "2025-03-15",
        "date_resolved": "2025-04-15",
        "status": "Not Started"
    ],
    [
        "incident_id": 6,
        "title": ...,
        ...
    ]
]
```

## Involved People List
__Path__: `/api/get_involved_list.php`<br>
__Variables__:
- $involvedPeopleInIncident_IncidentInfo[] - an associative array containing information about the incident:
```
[
    "incident_id": 5,
    "title": "Bon Bakery Fire",
    "description": "The Bon Bakery was on fire because of a faulty oven.",
    "address": "Dapawan, Building #12",
    "date_of_incident": "2025-02-15",
    "date_reported": "2025-02-15",
    "date_investigation_started": "2025-03-15",
    "date_resolved": "2025-04-15",
    "status": "Not Started"
]
```
- $involvedPeopleInIncident_PeopleList[] - an indexed array for each individual person involved in the selected incident:
```
[
    [
        "first_name": "Carlos",
        "last_name": "Sainz",
        "gender": "Male",
        "involvement_type": "Handler",
        "address": "Canduyong",
        "age_at_incident": "25",
        "description": "He investigated the incident as a firefighter or something."
    ],
    [
         "first_name": "Max",
         "last_name": "Verstappen",
        ...
    ]
[
```

## User List
__Path__: `/api/get_user_list.php`,
__Variables__:
- $userList[] - and indexed array for each individual users.
```
[
    [
        "user_id": 7,
        "username": "Smooth Operator",
        "person_name": "Carlos Sainz",
        "created_at": "2025-11-30",
        "is_admin": "No"
    ],
    [
        "user_id": 8,
        "username": ...
        ...
    ]
]
```
