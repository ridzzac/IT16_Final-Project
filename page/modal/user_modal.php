<?php
// require __DIR__ . "/../../api/insert_user.php";


?>

<div class="modal_overlay">
    <div class="modal_content">
        <form method="post" action="../../api/insert_user.php">
            <label for="input_person_id">Person ID</label>
            <input id="input_person_id" type="number" name="person_id">
            <br>
            <label for="input_username">Username</label>
            <input id="input_username" name="username">
            <br>
            <label for="input_password">Password</label>
            <input id="input_password" name="password">
            <br>
            <button>User</button>
        </form>
        <form>
            <input type="hidden" name="display" value="users_table">
            <button>Cancel</button>
        </form>
    </div>
</div>