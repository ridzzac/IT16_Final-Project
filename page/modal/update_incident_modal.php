<?php
require __DIR__ . "/../../api/get_one_incident.php";
$barangay_id = $incident["odiongan_barangay_id"];
echo $barangay_id;
?>

<div class="modal_overlay">
    <div class="modal_content">
        <form method="post" action="../../api/update_incident.php">
            <input type="hidden" name="incident_id" value="<?= htmlspecialchars($incident_id) ?>">

            <label for="input_title">title</label>
            <input id="input_title" name="title" value="<?= htmlspecialchars($incident["title"]) ?>">
            <br>
            <label for="input_description">description</label>
            <input id="input_description" name="description" value="<?= htmlspecialchars_decode($incident["description"]) ?>">
            <br>
            <label for="input_barangay">barangay</label>
            <select id="input_barangay" name="barangay" value="<?= htmlspecialchars_decode($incident["odiongan_barangay_id"]) ?>">
                <option value="1" <?= ($barangay_id === 1) ? "selected" : "" ?>>Amatong</option>
                <option value="2" <?= ($barangay_id === 2) ? "selected" : "" ?>>Anahao</option>
                <option value="3" <?= ($barangay_id === 3) ? "selected" : "" ?>>Bangon</option>
                <option value="4" <?= ($barangay_id === 4) ? "selected" : "" ?>>Batiano</option>
                <option value="5" <?= ($barangay_id === 5) ? "selected" : "" ?>>Budiong</option>
                <option value="6" <?= ($barangay_id === 6) ? "selected" : "" ?>>Canduyong</option>
                <option value="7" <?= ($barangay_id === 7) ? "selected" : "" ?>>Dapawan</option>
                <option value="8" <?= ($barangay_id === 8) ? "selected" : "" ?>>Gabawan</option>
                <option value="9" <?= ($barangay_id === 9) ? "selected" : "" ?>>Libertad</option>
                <option value="10"<?= ($barangay_id === 10) ? "selected" : "" ?>>Ligaya</option>
                <option value="11"<?= ($barangay_id === 11) ? "selected" : "" ?>>Liwanag</option>
                <option value="12"<?= ($barangay_id === 12) ? "selected" : "" ?>>Liwayway</option>
                <option value="13"<?= ($barangay_id === 13) ? "selected" : "" ?>>Malilico</option>
                <option value="14"<?= ($barangay_id === 14) ? "selected" : "" ?>>Mayha</option>
                <option value="15"<?= ($barangay_id === 15) ? "selected" : "" ?>>Panique</option>
                <option value="16"<?= ($barangay_id === 16) ? "selected" : "" ?>>Pato-o</option>
                <option value="17"<?= ($barangay_id === 17) ? "selected" : "" ?>>Poctoy</option>
                <option value="18"<?= ($barangay_id === 18) ? "selected" : "" ?>>Progreso Este</option>
                <option value="19"<?= ($barangay_id === 19) ? "selected" : "" ?>>Progreso Weste</option>
                <option value="20"<?= ($barangay_id === 20) ? "selected" : "" ?>>Rizal</option>
                <option value="21"<?= ($barangay_id === 21) ? "selected" : "" ?>>Tabing Dagat</option>
                <option value="22"<?= ($barangay_id === 22) ? "selected" : "" ?>>Tabobo-an</option>
                <option value="23"<?= ($barangay_id === 23) ? "selected" : "" ?>>Tuburan</option>
            </select>
            <br>
            <label for="input_sub_location">sub_location</label>
            <input id="input_sub_location" name="sub_location" value="<?= htmlspecialchars_decode($incident["sub_location"]) ?>">
            <br>
            <label for="input_date_of_incident">date_of_incident</label>
            <input type="date" id="input_date_of_incident" name="date_of_incident" value="<?= htmlspecialchars_decode($incident["date_of_incident"]) ?>">
            <br>
            <label for="input_date_investigation_started">date_investigation_started</label>
            <input type="date" id="input_date_investigation_started" name="date_investigation_started" value="<?= htmlspecialchars_decode($incident["date_investigation_started"]) ?>">
            <br>
            <label for="input_date_resolved">date_resolved</label>
            <input type="date" id="input_date_resolved" name="date_resolved" value="<?= htmlspecialchars_decode($incident["date_resolved"]) ?>">
            <br>
            <label for="input_status">status</label>
            <select id="input_status" name="status" value="<?= htmlspecialchars_decode($incident["incident_status_id"]) ?>">
                <option value="0">None</option>
                <option value="1">Not Started</option>
                <option value="2">Ongoing</option>
                <option value="3">Resolved</option>
                <option value="4">Cancelled</option>
                <option value="5">On Hold</option>
            </select>
            <button>Save</button>
        </form>
        <form>
            <input type="hidden" name="display" value="incidents_table">
            <button>Cancel</button>
        </form>
    </div>
</div>