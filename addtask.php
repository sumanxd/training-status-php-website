<?php include('header.php');
include('dbnew.php');
include_once 'db.php';
 ?>
<head>
	 <script>
			tinymce.init({
				  selector: "textarea",
				  plugins: [
					  "advlist autolink lists link image charmap print preview anchor",
					  "searchreplace visualblocks code fullscreen",
					  "insertdatetime media table contextmenu paste"
				  ],
				  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
			});
	  </script>
</head>
<body>
<?php
	//if form has been submitted process it
	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		//very basic validation
		

		if($first_name ==''){
			$error[] = 'Please enter the first name.';
		}

		if($last_name ==''){
			$error[] = 'Please enter the last name.';
		}

		if($course ==''){
			$error[] = 'Please enter the course.';
		}
		if($duration ==''){
			$error[] = 'Please enter the duration.';
		}
		if($completed_task ==''){
			$error[] = 'Please enter the task.';
		}
		if($date ==''){
			$error[] = 'Please enter date';
		}
				
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$course=$_POST['course'];
		$duration=$_POST['duration'];
		$completed_task=$_POST['completed_task'];
		$date=$_POST['date'];

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO task (first_name, last_name, course, duration, completed_task, date)
		VALUES ('$first_name', '$last_name', '$course','$duration','$completed_task', '$date')";

		$conn->exec($sql);
		echo "<script>alert('Successfully Added!!!'); window.location='admin.php'</script>";		

		}

		?> 
	
		<?php
		//check for any errors
		if(isset($error)){
			foreach($error as $error){
				echo $error.'<br />';
			}
		}
			try {

				$stmt = $conn->prepare('SELECT image_location, first_name, last_name, course, duration FROM tbl_image WHERE first_name = :first_name') ;
				$stmt->execute(array(':first_name' => $_GET['id']));
				$row = $stmt->fetch(); 

			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		?>	
 

	<form method="post" action=""  enctype="multipart/form-data">
		<table class="table1">
			<tr>
				<td><label style="color:#3a87ad; font-size:18px;">FirstName</label></td>
				<td width="30"></td>
				<td><input type="text" name="first_name" value='<?php echo $row['first_name'];?>' readonly required /></td>
			</tr>
			<tr>
				<td><label style="color:#3a87ad; font-size:18px;">LastName</label></td>
				<td width="30"></td>
				<td><input type="text" name="last_name" value='<?php echo $row['last_name'];?>' readonly required /></td>
			</tr>
			<tr>
				<td><label style="color:#3a87ad; font-size:18px;">Course</label></td>
				<td width="30"></td>
				<td><input type="text" name="course" value='<?php echo $row['course'];?>' readonly required /></td>
			</tr>
			<tr>
				<td><label style="color:#3a87ad; font-size:18px;">Duration</label></td>
				<td width="30"></td>
				<td><input type="text" name="duration" value='<?php echo $row['duration'];?>' readonly required /></td>
			</tr>
			<tr>
				<td><label style="color:#3a87ad; font-size:18px;">Task</label></td>
				<td width="30"></td>
				<td><input type="text" name="completed_task" required /></td>
			</tr>
			<tr>
				<td><label style="color:#3a87ad; font-size:18px;">Date</label></td>
				<td width="30"></td>
				<td><input type="date" name="date" required /></td>
			</tr>	
		</table>
		<button type="submit" name="submit" class="btn btn-primary" style="margin-left: 626px;">Upload</button>
	</form>
</body>		