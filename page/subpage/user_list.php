<?php

require __DIR__ . "/../../api/get_user_list.php";

// Edit Username Modal
if(isset($_GET["user_username_modal"]) && $_GET["user_username_modal"] === "true")
    require __DIR__ . "/../modal/user_username_modal.php";
?>

<h1>Users Table</h1>
<table>
    <thead>
        <tr>
            <td>User ID</td>
            <td>Username</td>
            <td>Personal Name</td>
            <td>Creation Date</td>
            <td>Is Admin</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($userList as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user["user_id"]) ?></td>
                <td>
                    <?= htmlspecialchars($user["username"]) ?>
                        <form method="get" action="index.php">
                            <input type="hidden" name="table" value="user">
                            <input type="hidden" name="user_username_modal" value="true">
                            <input type="hidden" name="current_username" value="<?= htmlspecialchars($user['username']) ?>">
                            <input type="hidden" name="current_user_id" value="<?= htmlspecialchars($user['user_id']) ?>">
                            <button class="edit_username">
                                <img src="../../assets/pencil-svgrepo-com.svg" width="10" height="10">
                            </button>
                        </form>
                </td>
                <td><?= htmlspecialchars($user["person_name"]) ?></td>
                <td><?= htmlspecialchars($user["created_at"]) ?></td>
                <td><?= htmlspecialchars($user["is_admin"]) ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>