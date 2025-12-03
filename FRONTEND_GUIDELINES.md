# Front-end Guidelines

# API Endpoints
## People List
__Path__: `/api/get_people_list.php`<br>
__Variables__:
- $peopleListResult - a boolean that indicates if the operation is successful or a failure.
- $peopleList - an indexed array for each person represented as an associative array. Below is an example:
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
        "occupation": "Firefighter"
    ],
    [
        "person_id": 6,
        "first_name": ...
        ...
    ]
]
```

## Incidents List
__Path__: `/api/get_people_list.php`<br>
__Variables__:
- $incidentListResult - a boolean that indicates if the operation is successful or a failure.
- $incidentList - an indexed array for each incident represented as an associative array. Below is an example:
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
