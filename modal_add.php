
    <a class="btn btn-primary" href="#myModal" data-toggle="modal" style="margin-left: 363px; position: relative; top: 12px; padding: 8px 45px;">Click Here To Add</a>
	<br>
	<br>
	<br>
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<h3 id="myModalLabel" style="text-align:center;">Add Candidate</h3>
	</div>
	<div class="modal-body">
	<form method="post" action="upload.php"  enctype="multipart/form-data">
		<table class="table1">
			<tr>
				<td><label style="color:#3a87ad; font-size:18px;">FirstName</label></td>
				<td width="30"></td>
				<td><input type="text" name="first_name" placeholder="FirstName" required /></td>
			</tr>
			<tr>
				<td><label style="color:#3a87ad; font-size:18px;">LastName</label></td>
				<td width="30"></td>
				<td><input type="text" name="last_name" placeholder="LastName" required /></td>
			</tr>
			<tr>
				<td><label style="color:#3a87ad; font-size:18px;">Course</label></td>
				<td width="30"></td>
				<td><input type="text" name="course" placeholder="course" required /></td>
			</tr>
			<tr>
				<td><label style="color:#3a87ad; font-size:18px;">Duration</label></td>
				<td width="30"></td>
				<td><input type="text" name="duration" placeholder="Duration" required /></td>
			</tr>
			<tr>
				<td><label style="color:#3a87ad; font-size:18px;">Join Date</label></td>
				<td width="30"></td>
				<td><input type="date" name="date" placeholder="Date" required /></td>
			</tr>
			<tr>
				<td><label style="color:#3a87ad; font-size:18px;">Status</label></td>
				<select name="status" style="position: relative; left: 215px; padding:4px 8px; top:246px;" required>
					<option>--Select Student Status--</option>
					<option name="status">Internship</option>
					<option name="status">Training</option>	  
				</select>
			</tr>
			<tr>
				<td><label style="color:#3a87ad; font-size:18px;">Select your Image</label></td>
				<td width="30"></td>
				<td><input type="file" name="image"></td>
			</tr>
		</table>
    </div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			<button type="submit" name="Submit" class="btn btn-primary">Upload</button>
		</div>
	</form>
</div>			