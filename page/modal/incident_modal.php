<div class="modal_overlay">
    <div class="modal_content">
        <h1>Insert Incident</h1>
        <form method="post" action="../../api/insert_incident.php">
            <label for="input_title">title</label>
            <input id="input_title" name="title">
            <br>
            <label for="input_description">description</label>
            <input id="input_description" name="description">
            <br>
            <label for="input_barangay">barangay</label>
            <select id="input_barangay" name="barangay">
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
            <label for="input_sub_location">sub_location</label>
            <input id="input_sub_location" name="sub_location">
            <br>
            <label for="input_date_of_incident">date_of_incident</label>
            <input type="date" id="input_date_of_incident" name="date_of_incident">
            <br>
            <label for="input_date_investigation_started">date_investigation_started</label>
            <input type="date" id="input_date_investigation_started" name="date_investigation_started">
            <br>
            <label for="input_date_resolved">date_resolved</label>
            <input type="date" id="input_date_resolved" name="date_resolved">
            <br>
            <label for="input_status">status</label>
            <select id="input_status" name="status">
                <option value="0">None</option>
                <option value="1">Not Started</option>
                <option value="2">Ongoing</option>
                <option value="3">Resolved</option>
                <option value="4">Cancelled</option>
                <option value="5">On Hold</option>
            </select>
            <button>Submit</button>            
        </form>
        <form action="index.php">
            <input type="hidden" name="table" value="incidents">
            <button>Cancel</button>
        </form>
    </div>
</div>