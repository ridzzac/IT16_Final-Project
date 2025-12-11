<div class="modal_overlay">
    <div class="modal_content">
        <form method="post" action="../../api/insert_involved_person.php">
            <input type="hidden" name="incident_id" value="<?= htmlspecialchars($incident_id) ?>">
            <label for="input_person_id">Person ID</label>
            <input type="number" id="input_incident_id" name="person_id">
            <br>
            <label for="input_involvement_type_id">Involvement Type</label>
            <select id="input_incident_id" name="involvement_type_id">
                <option value="0">Participant</option>
                <option value="1">Reporter</option>
                <option value="2">Affected</option>
                <option value="3">Responsible</option>
                <option value="4">Witness</option>
                <option value="5">Handler</option>                
            </select>
            <br>
            <label for="input_description">Description</label>
            <input type="text" id="input_incident_id" name="description">
            <button>Submit</button>
        </form>
        <form>
            <input type="hidden" name="display" value="incident_view">
            <input type="hidden" name="incident_id" value="<?= htmlspecialchars($incident_id) ?>">
            <button>Cancel</button>
        </form>
    </div>
</div>