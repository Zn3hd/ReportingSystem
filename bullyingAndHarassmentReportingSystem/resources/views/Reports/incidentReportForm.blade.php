<!DOCTYPE html>
<html>

<head>
	<style>
/* Add your custom CSS for styling here */

/* Example styles for demonstration */

body {
  background-color: #f4f4f4;
  font-family: 'Arial', sans-serif;
  color: #333;
}

.form-container {
  width: 80%;
  max-width: 800px;
  margin: 20px auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  color: #3498db;
  font-family: 'Roboto', sans-serif;

}

.form-sample {
  margin-top: 20px;
}

.form-label {
  display: block;
  font-weight: bold;
}

.form-group {
  margin-bottom: 20px;
  position: relative;
}

textarea,
input[type="text"],
input[type="datetime-local"],
input[type="file"],
select {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  margin-bottom: 15px;
  box-sizing: border-box;
  border: 1px solid #ced4da;
  border-radius: 4px;
  background-color: #fff;
  color: #495057;
}

button {
  background-color: #3498db;
  color: #fff;
  padding: 15px 20px;
  border: none;
  border-radius: 25px; /* Increased border-radius for an oval shape */
  cursor: pointer;
  font-size: 18px;
  transition: background-color 0.3s;
}


  button:hover {
  background-color: #007bb5;
}
.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    border-radius: 4px;
    padding: 10px;
    margin-top: 5px;
}

	</style>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>
    function validateForm() {
      // Get the values of the required fields
      var reportDateTime = document.getElementById("report_date_time").value;
      var incidentDateTime = document.getElementById("incident_date_time").value;
      var firstName = document.getElementById("first_name").value;
      // Add more fields as needed

      // Check if any required field is empty
      if (reportDateTime === "" || incidentDateTime === "" || firstName === "") {
        alert("Please fill in all required fields before submitting the form.");
        return false; // Prevent form submission
      }

      // If all required fields are filled, allow form submission
      return true;
    }
  </script>
</head>

<body>
	<div class="form-container">
		<form action="{{route('report.store')}}" method="post" enctype="multipart/form-data"> @csrf @method('post')
			<center>
				<h1>SNSU Guidance Office</h1></center>
        @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

			<!-- Report date and time -->
			<div class="form-group">
				<label for="report_date_time" class="form-label">Report Date and Time:</label>
				<input type="datetime-local" id="report_date_time" name="report_date_time"> 
      
      </div>
			<!-- Date and time when the incident occurred -->
			<div class="form-group">
				<label for="incident_date_time" class="form-label">Date and Time When Incident Occurred:</label>
				<input type="datetime-local" id="incident_date_time" name="incident_date_time"> </div>
			<!-- Issued by -->
			<div>
				<label>Incident Report Issued By:</label>
			</div>
			<!-- First Name input -->
			<div class="form-group">
				<label for="first_name" class="form-label">First Name:</label>
				<input type="text" id="first_name" name="first_name"> </div>
			<!-- Middle Name input -->
			<div class="form-group">
				<label for="middle_name" class="form-label">Middle Name:</label>
				<input type="text" id="middle_name" name="middle_name"> </div>
			<!-- Last Name input -->
			<div class="form-group">
				<label for="last_name" class="form-label">Last Name:</label>
				<input type="text" id="last_name" name="last_name"> </div>
			<!-- Incident Location -->
			<div class="form-group">
				<label for="incident_location" class="form-label">Incident Location (Please provide specific details):</label>
				<textarea id="incident_location" name="incident_location" rows="4"></textarea>
			</div>
			<!-- Nature of Incident -->
			<div class="form-group">
				<label for="nature_of_incident" class="form-label">Nature of Incident:</label>
				<textarea id="nature_of_incident" name="nature_of_incident" rows="4"></textarea>
			</div>
			<!-- Incident Details -->
			<div class="form-group">
				<label for="incident_details" class="form-label">Incident Details:</label>
				<textarea id="incident_details" name="incident_details" rows="4"></textarea>
			</div>
			<!-- Suspect Wanted/Charges -->
			<div class="form-group">
				<label for="suspect_charges" class="form-label">Was the suspect of the incident wanted/have or had any charges on him/her? If so, what?</label>
				<textarea id="suspect_charges" name="suspect_charges" rows="4"></textarea>
			</div>
			<!-- Arrested in Relation to the Incident -->
			<div class="form-group">
				<label for="arrested_relation" class="form-label">Has anyone been arrested so far in relation to the incident?</label>
				<textarea id="arrested_relation" name="arrested_relation" rows="4"></textarea>
			</div>
			<!-- Bullying and Harassment Checklist -->
			<!-- Add more checkboxes as needed -->
			<div class="form-group">
				<label for="txtName" class="form-label">Name of victim(s):</label>
				<input id="txtName" name="name_of_victims" type="text" class="form-input"> </div>
			<div class="form-group">
				<label class="form-label">Type of Bullying:</label>
				<input name="bullying_type[]" type="checkbox" value="Physical" id="physicalBullying">
				<label for="physicalBullying">Physical</label>
				<input name="bullying_type[]" type="checkbox" value="Relational" id="relationalBullying">
				<label for="relationalBullying">Relational</label>
				<input name="bullying_type[]" type="checkbox" value="Verbal" id="verbalBullying">
				<label for="verbalBullying">Verbal</label>
			</div>
			<div class="form-group">
				<label class="form-label">If physical, did it result in injury?</label>
				<input name="result_in_injury" type="radio" value="Yes" id="injuryYes">
				<label for="injuryYes">Yes</label>
				<input name="result_in_injury" type="radio" value="No" id="injuryNo">
				<label for="injuryNo">No</label>
			</div>
			<div class="form-group">
				<label class="form-label">If physical, was it reported to the school nurse?</label>
				<input name="reported_to_nurse" type="radio" value="Yes" id="nurseYes">
				<label for="nurseYes">Yes</label>
				<input name="reported_to_nurse" type="radio" value="No" id="nurseNo">
				<label for="nurseNo">No</label>
			</div>
			<div class="form-group">
				<label class="form-label">If physical, was it reported to the police?</label>
				<input name="reported_to_police" type="radio" value="Yes" id="policeYes">
				<label for="policeYes">Yes</label>
				<input name="reported_to_police" type="radio" value="No" id="policeNo">
				<label for="policeNo">No</label>
			</div>
			<div class="form-group"> <strong>Bullying Behaviors:</strong> Please check the type of behavior(s) associated with this incident:
				<div class="checkbox-table">
					<div class="checkbox-row">
						<input name="bully_behaviors[]" type="checkbox" value="CyberBullying" id="cyberBullying">
						<label for="cyberBullying">Cyber Bullying</label>
					</div>
					<div class="checkbox-row">
						<input name="bully_behaviors[]" type="checkbox" value="DamagedPossessions" id="damagedPossessions">
						<label for="damagedPossessions">Damaged Possessions</label>
					</div>
					<div class="checkbox-row">
						<input name="bully_behaviors[]" type="checkbox" value="DemeaningComments" id="demeaningComments">
						<label for="demeaningComments">Demeaning Comments</label>
					</div>
					<div class="checkbox-row">
						<input name="bully_behaviors[]" type="checkbox" value="Disability" id="Disability">
						<label for="Disability">Disability</label>
					</div>
					<div class="checkbox-row">
						<input name="bully_behaviors[]" type="checkbox" value="Excluded" id="Excluded">
						<label for="Exclude">Excluded</label>
					</div>
					<div class="checkbox-row">
						<input name="bully_behaviors[]" type="checkbox" value="Hit" id="Hit">
						<label for="Hit">Hit</label>
					</div>
					<div class="checkbox-row">
						<input name="bully_behaviors[]" type="checkbox" value="InappropriateTouch" id="InappropriateTouch">
						<label for="Hit">InappropriateTouch</label>
					</div>
					<div class="checkbox-row">
						<input name="bully_behaviors[]" type="checkbox" value="IntimidationExtortion" id="IntimidationExtortion">
						<label for="IntimidationExtortion">IntimidationExtortion</label>
					</div>
					<div class="checkbox-row">
						<input name="bully_behaviors[]" type="checkbox" value="Kicked" id="Kicked">
						<label for="Kicked">Kicked</label>
					</div>
					<div class="checkbox-row">
						<input name="bully_behaviors[]" type="checkbox" value="Punched" id="Punched">
						<label for="Punched">Punched</label>
					</div>
					<div class="checkbox-row">
						<input name="bully_behaviors[]" type="checkbox" value="Religious" id="Religious">
						<label for="Religious">Religious</label>
					</div>
					<div class="checkbox-row">
						<input name="bully_behaviors[]" type="checkbox" value="Threatened" id="Threatened">
						<label for="Threatened">Threatened</label>
					</div>
					<!-- Repeat the above structure for other behaviors... -->
				</div>
			</div>
			<div class="form-group">
				<label for="Description" class="form-label">Describe the incident:</label>
				<textarea name="Description" id="Description" rows="12" class="form-input"></textarea>
			</div>
			<div class="form-group">
				<label class="form-label">Physical Evidence:</label>
				<input name="physical_evidence" type="checkbox" value="Notes" id="evidenceNotes">
				<label for="evidenceNotes">Notes</label>
				<input name="physical_evidence" type="checkbox" value="Email" id="evidenceEmail">
				<label for="evidenceEmail">Email</label>
				<input name="physical_evidence" type="checkbox" value="Video_Audio" id="Video_Audio">
				<label for="Video_Audio">Video_Audio</label>
				<input name="physical_evidence" type="checkbox" value="Picture" id="evidencePicture">
				<label for="evidencePicture">Picture</label>
				<!-- More checkboxes... -->
				<input name="physical_evidence" type="checkbox" value="Other" id="evidenceOther">
				<label for="evidenceOther">Other:</label>
				<input name="physical_evidenceOtherExplain" id="evidenceOtherExplain" class="form-input"> </div>
			<!-- File Upload -->
			<div class="form-group">
				<label for="file_upload" class="form-label">Upload a Photo:</label>
				<input type="file" id="file_upload" name="file_upload"> </div>
			<!-- Certification Checkbox -->
			<!-- Submit Button -->
			<div class="form-group">
				<button type="submit">Submit</button>
			</div>
		</form>
	</div>
</body>

</html>