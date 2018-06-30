<?php 
include('header1.php');
include("db.php");
include("auth.php" );
include("dbnew.php" );
?>
 <head>
	<title>User</title>
	 <style>
	 .row {
		margin-left: 2px;
	}
	 </style>
 </head>
<body>

    <div class="row-fluid">
    <div class="span12">
    <div class="container">
			<?php
			$sql = "SELECT username, password FROM new WHERE username = '" . $_SESSION['username'] . "'";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result);
			echo "Welcome, " . $row['username'];
			?>
			<a href="logout.php" class="btn btn-info btn-lg" style="float: right; position: relative; right: 16px; top: 62px;">
				<span class="glyphicon glyphicon-log-out"></span> Log out
			</a>
	<div class="row" style="margin-top:40px;overflow:hidden;">
			<ul class="nav nav-pills" style="overflow:hidden;border:2px solid blue;font-size:21px;text-transform:uppercase;font-family:roboto;background-color:black;border-top-left-radius:25px;border-top-right-radius:25px;overflow:hidden;" id="tabs">
				<li><a href="" name="tab2" style="color:white; margin-left: 352px;"><strong>Students Activity</strong></a></li>			
			</ul>
		<div id="content" style="border:1px solid blue;">
		
			<div id="tab2" >

				<div class="row col-md-12 custyle">
				
					<form name="form_update" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<div class="">
						<select name="first_name" style="position: relative; left: 368px; padding: 4px 7px; top: 6px;" required>
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
								<th style="text-align:center; width:8%;">S.No</th>
								<th style="text-align:center;width:30%">Task</th>
								<th style="text-align:center; width:18%;">Date</th>
							
                            </tr>
                            </thead>
							
                            <tbody>
							<?php
							
							if(isset($_POST['first_name']))
							{
								$count=1;
								$name = $_POST['first_name'];
								$result = $conn->prepare("SELECT id,first_name,last_name,course,duration,completed_task,date FROM task WHERE first_name = '".$name."' ORDER BY id desc LIMIT 0, 50");
								$result->execute();
								
								
		

/* add only one value from database	*/
																				
$sql = $conn->prepare("SELECT first_name,duration, course FROM task WHERE first_name = '".$name."'");
$sql->execute();
$row = $sql->fetch();
echo "<strong>"."Name : " . $row['first_name'];
echo "<br>";echo "<br>";
echo "Duration : " . $row['duration'] . " days";
echo "<br>";
echo "Course : " . $row['course']."</strong>";

/* add only one value from database	*/
   
								
								
								
								
								
								for($i=0; $row = $result->fetch(); $i++){
								
							?>
								<tr>
								<td style="text-align:center; word-break:break-all;"> <?php echo $count++; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['completed_task']; ?></td>
								<td style="text-align:center; word-break:break-all; "> <?php echo $row ['date']; ?></td>	</tr>
								
								<?php } } ?>

                            </tbody>
							
                        </table>
					</div>
				</div>		
			</div>	
		</div>
    </div>
    </div>
    </div>
	</div>
</body>
</html>


