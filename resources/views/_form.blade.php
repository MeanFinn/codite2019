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
			<input type="text" class="form-control validate" id="school" name="school" required>
			<label for="school">School</label>
		</div>
		<div class="input-field col-sm-6 pl-0">
<!-- 			<input type="text" class="form-control validate" id="position" name="position" required> -->
			<select id="position" type="text" name ="position" class="w-10 validate" required>
				{{-- <option value="undefined">Not Specified (Ticket)</option> --}}
				<option value="dean">Dean</option>
				<option value="assocdean">Associate Dean</option>
				<option value="deptchair">Department Chair</option>
				<option value="faculty">Faculty</option>
				<option value=others>Others</option>
			</select>
			<label for="position">Position</label>
		</div>
	</div>
	<div class="w-100 center-align">
		<button class="btn-large btn w-50" type="submit">Submit</button>
	</div>
</form>