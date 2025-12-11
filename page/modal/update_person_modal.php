<?php
require __DIR__ . "/../../api/get_one_person.php";
$barangay = $person["odiongan_barangay_id"];
$gender = $person["gender_id"];
?>
<div class="modal_overlay">
    <div class="modal_content">
        <h1>Update Person</h1>
        <form method="post" action="../../api/update_person.php" enctype="multipart/form-data">
            <input type="hidden" name="person_id" value="<?= htmlspecialchars($person_id) ?>">

            <label for="input_first_name">First Name</label>
            <input id="input_first_name" name="first_name" value="<?= htmlspecialchars($person["first_name"] ?? "") ?>">
            <br>
            <label for="input_middle_name">Middle Name</label>
            <input id="input_middle_name" name="middle_name" value="<?= htmlspecialchars($person["middle_name"] ?? "") ?>">
            <br>
            <label for="input_last_name">Last Name</label>
            <input id="input_last_name" name="last_name" value="<?= htmlspecialchars($person["last_name"] ?? "") ?>">
            <br>
            <label for="input_gender">Gender</label>
            <select id="input_gender" name="gender" value="<?= htmlspecialchars($person["gender_id"] ?? "") ?>">
                <option value="0" <?= ($gender === 0) ? "selected" : "" ?>>Unspecified</option>
                <option value="1" <?= ($gender === 1) ? "selected" : "" ?>>Male</option>
                <option value="2" <?= ($gender === 2) ? "selected" : "" ?>>Female</option>
                <option value="3" <?= ($gender === 3) ? "selected" : "" ?>>Transgender</option>
                <option value="4" <?= ($gender === 4) ? "selected" : "" ?>>Other</option>
            </select>
            <br>
            <label for="input_date_of_birth">Date of Birth</label>
            <input type="date" id="input_date_of_birth" name="date_of_birth" value="<?= htmlspecialchars($person["date_of_birth"] ?? "") ?>">
            <br>
            <label for="input_barangay">Barangay</label>
            <select id="input_barangay" name="barangay">
                <option value="1" <?= ($barangay === 1) ? "selected" : "" ?>>Amatong</option>
                <option value="2" <?= ($barangay === 2) ? "selected" : "" ?>>Anahao</option>
                <option value="3" <?= ($barangay === 3) ? "selected" : "" ?>>Bangon</option>
                <option value="4" <?= ($barangay === 4) ? "selected" : "" ?>>Batiano</option>
                <option value="5" <?= ($barangay === 5) ? "selected" : "" ?>>Budiong</option>
                <option value="6" <?= ($barangay === 6) ? "selected" : "" ?>>Canduyong</option>
                <option value="7" <?= ($barangay === 7) ? "selected" : "" ?>>Dapawan</option>
                <option value="8" <?= ($barangay === 8) ? "selected" : "" ?>>Gabawan</option>
                <option value="9" <?= ($barangay === 9) ? "selected" : "" ?>>Libertad</option>
                <option value="10"<?= ($barangay === 10) ? "selected" : "" ?>>Ligaya</option>
                <option value="11"<?= ($barangay === 11) ? "selected" : "" ?>>Liwanag</option>
                <option value="12"<?= ($barangay === 12) ? "selected" : "" ?>>Liwayway</option>
                <option value="13"<?= ($barangay === 13) ? "selected" : "" ?>>Malilico</option>
                <option value="14"<?= ($barangay === 14) ? "selected" : "" ?>>Mayha</option>
                <option value="15"<?= ($barangay === 15) ? "selected" : "" ?>>Panique</option>
                <option value="16"<?= ($barangay === 16) ? "selected" : "" ?>>Pato-o</option>
                <option value="17"<?= ($barangay === 17) ? "selected" : "" ?>>Poctoy</option>
                <option value="18"<?= ($barangay === 18) ? "selected" : "" ?>>Progreso Este</option>
                <option value="19"<?= ($barangay === 19) ? "selected" : "" ?>>Progreso Weste</option>
                <option value="20"<?= ($barangay === 20) ? "selected" : "" ?>>Rizal</option>
                <option value="21"<?= ($barangay === 21) ? "selected" : "" ?>>Tabing Dagat</option>
                <option value="22"<?= ($barangay === 22) ? "selected" : "" ?>>Tabobo-an</option>
                <option value="23"<?= ($barangay === 23) ? "selected" : "" ?>>Tuburan</option>
            </select>
            <br>
            <label for="input_sub_location">Sitio/House No.</label>
            <input id="input_sub_location" name="sub_location" value="<?= htmlspecialchars($person["sub_location"] ?? "") ?>">
            <br>
            <label for="input_occupation">Occupation</label>
            <input id="input_occupation" name="occupation" value="<?= htmlspecialchars($person["occupation"] ?? "") ?>">
            <br>
            <label for="input_profile_image">Profile Image</label>
            <input id="input_profile_image" name="profile_image" type="file" accept="image/*" value="<?= htmlspecialchars($person["face_image_file"]) ?>">
            <br>
            <button type="submit">Save</button>
        </form>

        <form action="index.php">
            <input type="hidden" name="display" value="people_table">
            <button>Cancel</button>
        </form>
    </div>
</div>
