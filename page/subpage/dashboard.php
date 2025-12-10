<?php
require __DIR__ . "/../../api/get_statistics.php"
?>
<h1>Dashboard</h1>
<div id="people_count">
    <p>People</p>
    <p id="count"> <?= htmlspecialchars($peopleCount) ?> </p>
</div>

<div id="incidents_count">
    <p>Incidents</p>
    <p id="count"> <?= htmlspecialchars($incidentsCount) ?> </p>
</div>

<?php if(isUserLoggedIn()): ?>
<div id="users_count">
    <p>Users</p>
    <p id="count"> <?= htmlspecialchars($usersCount) ?> </p>
</div>
<?php endif ?>