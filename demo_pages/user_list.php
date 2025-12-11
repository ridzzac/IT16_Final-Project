<?php
require __DIR__ . "/../api/get_users_table.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td>User ID</td>
                <td>Username</td>
                <td>Personal Name</td>
                <td>Created At</td>
                <td>Admin</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($userList as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user["user_id"]) ?></td>
                <td><?= htmlspecialchars($user["username"]) ?></td>
                <td><?= htmlspecialchars($user["person_name"]) ?></td>
                <td><?= htmlspecialchars($user["created_at"]) ?></td>
                <td><?= htmlspecialchars($user["is_admin"]) ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>