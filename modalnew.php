<?php
include_once 'db.php';
?>

	<div>
		<form name="form_update" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

			<div class="">
				<select name="first_name" style="    position: relative; left: 368px; padding: 4px 8px; top: 6px;" required>
				  <option>--Select Student From Here--</option>
				  <option name="first_name">Ajiz</option>
				  <option name="first_name">Aqib</option>	  
				  <option name="first_name">Vishnu</option>
				  <option name="first_name">Zubair</option>
				  <option name="first_name">Asutosh</option>
				  <option name="first_name">Harshita</option>
				</select>
			</div>
			<input type="submit" class="button button2" style="margin-left: 452px;" name="submit" value="Submit"/>
			
		</form>	
					<div  class="table-responsive">

						<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                            
							<thead>
								<tr>
								<th style="text-align:center;">User Image</th>
								<th style="text-align:center;">First Name</th>
								<th style="text-align:center;">Last Name</th>
								<th style="text-align:center;">Course</th>
								<th style="text-align:center;">Duration</th>
								<th style="text-align:center;">Action</th>

								</tr>
							</thead>
                            <tbody>
								<?php
								if(isset($_POST['first_name']))
								{
									$name = $_POST['first_name'];
									$result = $conn->prepare("SELECT image_location,first_name,last_name,course,duration,date FROM tbl_image WHERE first_name = '".$name."'  LIMIT 0, 30");
									$result->execute();
									
									for($i=0; $row = $result->fetch(); $i++){
									$id=$row['first_name'];
								?>
								
					
								
								<tr>
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
									<td>
									<a href="addtask.php?id=<?php echo $row['first_name'];?>">Add Task</a>
									</td>
									
								</tr>
								<?php } } ?>
                            </tbody>
                        </table>						
					</div>
	</div>







	