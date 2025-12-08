# Front-end Guidelines

# API Endpoints
Except for [Involved People List endpoints](#Insert Involved Person) endpoint, all endpoints operations have `$isSuccess` boolean to indicate success of the operation. If it is `true` then it is successful, `false` if not and it means there was an error.
## Create Operations (Insert)
### Insert Person
Inserts a person to the database.<br>
__Path__: `/api/insert_person.php`<br>
__Post Body Required Keys__: `first_name`, `middle_name`, `last_name`, `date_of_birth`<br>
__Post Body Optional Keys__: `gender_id`, `odiongan_barangay_id`, `sub_location`

### Insert Incident
Inserts an incident to the database.<br>
__Path__: `/api/insert_incident.php`<br>
__Post Body Required Keys__: `title`, `odiongan_barangay_id`, `date_of_incident`, `date_investigation_started`<br>
__Post Body Optional Keys__: `description`, `sub_location`, `date_resolved`

### Insert Involved Person
Associates people to incidents.<br>
__Post Body Required Keys__: `incident_id`, `person_id`, `involvement_type`<br>
__Post Body Optional Keys__: `description`

### Create User Account
Creates a new user account. The user should have an existing record of their personal information in the database.<br>
__Post Body Required Keys__: `person_id`, `username`, `password`

## Read Operations (Select)
### People List
__Path__: `/api/get_people_list.php`<br>
__Variables__:
- `$peopleList[]` - an indexed array for each person represented as an associative array:
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

### Incidents List
__Path__: `/api/get_incident_list.php`<br>
__Variables__:
- `$incidentList[]` - an indexed array for each incident represented as an associative array:
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

### Involved People List
__Path__: `/api/get_involved_list.php`<br>
__Variables__:
- `$isIncidentInfoSuccess` - a boolean datatype that determines if the retrieval of the incident's information is successful.
- `$involvedPeopleInIncident_IncidentInfo[]` - an associative array containing information about the incident:
```php
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
- `$isInvolvedPeopleSuccess` - a boolean value that determines if the retrieval of the list of the people involved is successful.
- `$involvedPeopleInIncident_PeopleList[]` - an indexed array for each individual person involved in the selected incident:
```php
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

### User List
__Path__: `/api/get_user_list.php`,
__Variables__:
- `$userList[]` - and indexed array for each individual users.
```php
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

## Update Operations
### Update Username
Updates a user's username.<br>
__Path__: `/api/update_user_username.php`<br>
__Post Body Required Keys__: `user_id`, `username`

### Upload Person's Face
Uploads a person's face into the database.<br>
__Path__: `/api/upload_person_face.php`<br>
__Post Body Required Keys__: `uploadedFile`, `person_id`

## Delete Operations
### Delete User
Deletes a user from the dataabase.<br>
__Path__: `/api/delete_user.php`<br>
__Post Body Required Keys__: `user_id`
