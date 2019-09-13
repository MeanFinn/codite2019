<form method="POST" autocomplete="off">
	{{ csrf_field() }}
	<div class="row">
		<div class="input-field col-sm-5 pl-0">
			<input type="text" class="form-control validate" id="last_name" name="last_name" required>
			<label for="last_name">Last Name</label>
		</div>
		<div class="input-field col-sm-5 pl-0">
			<input type="text" class="form-control validate" id="first_name" name="first_name" required>
			<label for="first_name">First Name</label>
		</div>
		<div class="input-field col-sm-2 pl-0">
			<input type="text" class="form-control" id="middle_initial" name="middle_initial">
			<label for="midde_initial">M.I.</label>
		</div>
	</div>
	<div class="row">
		<div class="input-field col-sm-6 pl-0">
			<input type="text" class="form-control validate" id="School" name="School" required>
			<label for="School">School</label>
		</div>
		<div class="input-field col-sm-6 pl-0">
			<input type="text" class="form-control validate" id="Position" name="Position" required>
<!-- 			<select id="college" type="text" name ="college" class="w-10 validate" required>
				{{-- <option value="undefined">Not Specified (Ticket)</option> --}}
				<option value="law">College of Law</option>
				<option value="ccss">College of Computer Studies and Systems</option>
				<option value="dent">College of Dentistry</option>
				<option value="cas">College of Arts and Sciences</option>
				<option value="cba">College of Business Administration</option>
				<option value="eng">College of Engineering</option>
				<option value="educ">College of Education</option>
				<option value="cfad">College of Fine Arts, Architecture and Design</option>
			</select> -->
			<label for="Position">Position</label>
		</div>
	</div>
	<div class="w-100 center-align">
		<button class="btn-large btn w-50" type="submit">Submit</button>
	</div>
</form>