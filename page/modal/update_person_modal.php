<div class="modal_overlay">
    <div class="modal_content">
        <h1>Update Person</h1>
        <form method="post" action="../api/.php">
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
                <option value="0">Unspecified</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
                <option value="3">Transgender</option>
                <option value="4">Other</option>
            </select>
            <br>
            <label for="input_date_of_birth">Date of Birth</label>
            <input type="date" id="input_date_of_birth" name="date_of_birth" value="<?= htmlspecialchars($person["date_of_birth"] ?? "") ?>">
            <br>
            <label for="input_barangay">Barangay</label>
            <select id="input_barangay" name="barangay" value="<?= htmlspecialchars($person["odiongan_barangay_id"] ?? "") ?>">
                <option value="1">Amatong</option>
                <option value="2">Anahao</option>
                <option value="3">Bangon</option>
                <option value="4">Batiano</option>
                <option value="5">Budiong</option>
                <option value="6">Canduyong</option>
                <option value="7">Dapawan</option>
                <option value="8">Gabawan</option>
                <option value="9">Libertad</option>
                <option value="10">Ligaya</option>
                <option value="11">Liwanag</option>
                <option value="12">Liwayway</option>
                <option value="13">Malilico</option>
                <option value="14">Mayha</option>
                <option value="15">Panique</option>
                <option value="16">Pato-o</option>
                <option value="17">Poctoy</option>
                <option value="18">Progreso Este</option>
                <option value="19">Progreso Weste</option>
                <option value="20">Rizal</option>
                <option value="21">Tabing Dagat</option>
                <option value="22">Tabobo-an</option>
                <option value="23">Tuburan</option>
            </select>
            <br>
            <label for="input_sub_location">Sitio/House No.</label>
            <input id="input_sub_location" name="sub_location" value="<?= htmlspecialchars($person["sub_location"] ?? "") ?>">
            <br>
            <label for="input_occupation">Occupation</label>
            <input id="input_occupation" name="occupation" value="<?= htmlspecialchars($person["occupation"] ?? "") ?>">
            <button type="submit">Save</button>
        </form>

        <form action="index.php">
            <input type="hidden" name="table" value="people">
            <button>Cancel</button>
        </form>
    </div>
</div>
