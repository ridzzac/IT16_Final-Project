<div class="modal_overlay">
    <div class="modal_content">
        <h1>Edit Username</h1>
        <form method="post" action="../../api/update_user_username.php">
            <label for="input_username">New Username</label>
            <input id="input_username" name="username" value="<?= htmlspecialchars($_GET["current_username"]) ?>">
            <input type="hidden" name="user_id" value="<?= htmlspecialchars($_GET["current_user_id"]) ?>>">
            <button>Save</button>
        </form>
        <form method="get">
            <input type="hidden" name="table" value="user">
            <button>Cancel</button>
        </form>
    </div>
</div>