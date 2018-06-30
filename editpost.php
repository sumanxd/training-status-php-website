<?php include('header.php');
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
		if($tbl_image_id ==''){
			$error[] = 'This post is missing a valid id!.';
		}

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

		if(!isset($error)){

			try {

				//insert into database
				$stmt = $conn->prepare('UPDATE tbl_image SET first_name = :first_name, last_name = :last_name, course = :course, duration = :duration WHERE tbl_image_id = :tbl_image_id') ;
				$stmt->execute(array(
					':first_name' => $first_name,
					':last_name' => $last_name,
					':course' => $course,
					':duration' => $duration,
					':tbl_image_id' => $tbl_image_id
				));

				//redirect to index page
				header('Location: admin.php');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

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

			$stmt = $conn->prepare('SELECT tbl_image_id, first_name, last_name, course, duration FROM tbl_image WHERE tbl_image_id = :tbl_image_id') ;
			$stmt->execute(array(':tbl_image_id' => $_GET['id']));
			$row = $stmt->fetch(); 

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}

	?>	
 
 
 
 
	    <!-- Button to trigger modal -->

<!-- Modal -->


<form method="post" action=""  enctype="multipart/form-data">
<table class="table1">
<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Id</label></td>
		<td width="30"></td>
		<td><input type="text" name="tbl_image_id" value='<?php echo $row['tbl_image_id'];?>' required/></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">FirstName</label></td>
		<td width="30"></td>
		<td><input type="text" name="first_name" value='<?php echo $row['first_name'];?>' required/></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">LastName</label></td>
		<td width="30"></td>
		<td><input type="text" name="last_name" value='<?php echo $row['last_name'];?>' required/></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Course</label></td>
		<td width="30"></td>
		<td><input type="text" name="course" value='<?php echo $row['course'];?>' required /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Duration</label></td>
		<td width="30"></td>
		<td><input type="text" name="duration" value='<?php echo $row['duration'];?>' required /></td>
	</tr>
	
</table>
<button type="submit" name="submit" class="btn btn-primary" style="margin-left: 626px;">Upload</button>

</form>

</body>		