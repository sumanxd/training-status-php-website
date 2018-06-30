<?php include('header.php');
include_once 'db.php';
include("auth.php");
if(isset($_GET['delpost'])){
	
$stmt = $conn->prepare('DELETE FROM tbl_image WHERE tbl_image_id = :tbl_image_id') ;
$stmt->execute(array(':tbl_image_id' => $_GET['delpost']));
header('Location: admin.php');
exit;
} 
 ?>
<html>
<head>
	<title>Admin</title>
	 <style>
	 a{
		 color:#de170d;
	 }
	 th{
		 color:red;
		 
	 }
	  
	 .row {
		margin-left: 2px;
		  }
	 </style>
	<script language="JavaScript" type="text/javascript">
	  function delpost(id, title)
	  {
		  if (confirm("Are you sure you want to delete '" + title + "'"))
		  {
			window.location.href = 'admin.php?delpost=' + id;
		  }
	  }
	</script>
</head>
<body>

    <div class="row-fluid">
        <div class="span12">
        <div class="container">
			<a href="logout.php" class="btn btn-info btn-lg" style="    float: right;
    position: relative;
    right: 16px;
    top: 44px;">
						  <span class="glyphicon glyphicon-log-out"></span> Log out
						</a>
		<div class="row" style="margin-top:40px;overflow:hidden;">
			<ul class="nav nav-pills" style="overflow:hidden;border:2px solid blue;font-size:21px;text-transform:uppercase;font-family:roboto;background-color:black;border-top-left-radius:25px;border-top-right-radius:25px;overflow:hidden;" id="tabs">
						
						<li><a href="#" name="tab1" style="color:white;margin-left: 124px;"><strong>All Candidates</strong></a></li>
						<li><a href="#" name="tab2" style="color:white;"><strong>Count Candidates</strong></a></li>
						<li><a href="#" name="tab3" style="color:white;"><strong>Candidates Task</strong></a></li>
						
						
						
			</ul>
		<div id="content" style="border:1px solid blue;">
		<div id="tab1" >

			<?php include('modal_add.php'); ?>
			<?php 
				//show message from add / edit page
				if(isset($_GET['action'])){ 
					echo '<h3>Post '.$_GET['action'].'.</h3>'; 
				} 
				?>
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                            
                            <thead>
                                <tr>
								<th style="text-align:center;">Id</th>
                                    <th style="text-align:center;">User Image</th>
                                    <th style="text-align:center;">FirstName</th>
                                    <th style="text-align:center;">LastName</th>
									<th style="text-align:center;">Course</th>
									<th style="text-align:center;">Duration</th>
									<th style="text-align:center;">Join Date</th>
									<th style="text-align:center;">Status</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
								$count=1;
								$result = $conn->prepare("SELECT * FROM tbl_image ORDER BY tbl_image_id ASC");
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
								$id=$row['tbl_image_id'];
							?>
								<tr>
								<td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $count++; ?></td>
								<td style="text-align:center; margin-top:10px; word-break:break-all; width:450px; line-height:100px;">
									<?php if($row['image_location'] != ""): ?>
									<img src="uploads/<?php echo $row['image_location']; ?>" width="100px" height="100px" style="border:1px solid #333333;">
									<?php else: ?>
									<img src="images/default.png" width="100px" height="100px" style="border:1px solid #333333;">
									<?php endif; ?>
								</td>
								<td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row ['first_name']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['last_name']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['course']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['duration']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['date']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['status']; ?></td>
								<td>
								<a href="editpost.php?id=<?php echo $row['tbl_image_id'];?>">Edit</a> | 
								<a href="javascript:delpost('<?php echo $row['tbl_image_id'];?>','<?php echo $row['first_name'];?>')">Delete</a>
								</td>
								</tr>
								<?php } 
								
								?>
                            </tbody>
                        </table>        
        </div>
		
		<div id="tab2" >

				<div class="row col-md-12 custyle">
				
					<form name="form_update" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					
					<div class="">
						<select name="status" style="    position: relative;
						left: 368px;
						padding: 4px 14px;
						top: 6px;" required>
					<option>--Select Status From Here--</option>
						  <option name="status">Internship</option>
						  <option name="status">Training</option>
					</select>
						</div>
					<input type="submit" class="button button2" style="margin-left: 452px;" name="submit" value="Submit"/>
					</form>

					<div  class="table-responsive">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                            
                            <thead>
                                <tr>
								<th style="text-align:center;">Id</th>
								<th style="text-align:center;">User Image</th>
                                <th style="text-align:center;">First Name</th>
								<th style="text-align:center;">Last Name</th>
								<th style="text-align:center;">Course</th>
								<th style="text-align:center;">Duration</th>
								<th style="text-align:center;">Join Date</th>

                                </tr>
                            </thead>
                            <tbody>
							<?php
							$count=1;
							if(isset($_POST['status']))
							{
								$name = $_POST['status'];
								$result = $conn->prepare("SELECT image_location,first_name,last_name,course,duration,date FROM tbl_image WHERE status = '".$name."'  LIMIT 0, 30");
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
								
							?>
								<tr>
								<td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $count++; ?></td>
								<td style="text-align:center; margin-top:10px; word-break:break-all; width:450px; line-height:100px;">
									<?php if($row['image_location'] != ""): ?>
									<img src="uploads/<?php echo $row['image_location']; ?>" width="100px" height="100px" style="border:1px solid #333333;">
									<?php else: ?>
									<img src="images/default.png" width="100px" height="100px" style="border:1px solid #333333;">
									<?php endif; ?>
								</td>
								<td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row ['first_name']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['last_name']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['course']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['duration']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['date']; ?></td>
								
								</tr>
								<?php } } ?>
                            </tbody>
                        </table>
					</div>
				</div>		
		</div>
		<div id="tab3">
		<?php include('modalnew.php'); ?>		
		</div>
	
				<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
				<script>
				  $("#content").find("[id^='tab']").hide(); // Hide all content
				  $("#tabs li:first").attr("id","current"); // Activate the first tab
				  $("#content #tab1").fadeIn(); // Show first tab's content

				  $('#tabs a').click(function(e) {
					e.preventDefault();
					if ($(this).closest("li").attr("id") == "current"){ //detection for current tab
					  return;
					} else {
					  $("#content").find("[id^='tab']").hide(); // Hide all content
					  $("#tabs li").attr("id",""); //Reset id's
					  $(this).parent().attr("id","current"); // Activate this
					  $('#' + $(this).attr('name')).fadeIn(); // Show content for the current tab
					}

					var tab = $(this).attr("name");
					localStorage.setItem("tab", tab);
				  });

				  var currTab = localStorage.getItem("tab");
				  $('a[name="' + currTab + '"]').trigger("click");
				</script>
		</div>
        </div>
        </div>
    </div>
</div>
</body>
</html>


