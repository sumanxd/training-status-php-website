<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>User</title>
	<link rel="stylesheet" href="css/style.css" />
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<style>
			@import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
			.login-block{
				background: #DE6262;  /* fallback for old browsers */
			background: -webkit-linear-gradient(to bottom, #FFB88C, #DE6262);  /* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to bottom, #FFB88C, #DE6262); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
			float:left;
			width:100%;
			padding : 50px 0;
			}
			.banner-sec{background:url(https://static.pexels.com/photos/33972/pexels-photo.jpg)  no-repeat left bottom; background-size:cover; min-height:500px; border-radius: 0 10px 10px 0; padding:0;}
			.container{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
			.carousel-inner{border-radius:0 10px 10px 0;}
			.carousel-caption{text-align:left; left:5%;}
			.login-sec{padding: 50px 30px; position:relative;}
			.login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
			.login-sec .copy-text i{color:#FEB58A;}
			.login-sec .copy-text a{color:#E36262;}
			.login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #DE6262;}
			.login-sec h2:after{content:" "; width:100px; height:5px; background:#FEB58A; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
			.btn-login{background: #DE6262; color:#fff; font-weight:600;}
			.banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
			.banner-text h2{color:#fff; font-weight:600;}
			.banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
			.banner-text p{color:#fff;}
		</style>
</head>
<body>
	<?php
	require('dbnew.php');
	session_start();
	// If form submitted, insert values into the database.
	if (isset($_POST['username'])){
			// removes backslashes
		$username = stripslashes($_REQUEST['username']);
			//escapes special characters in a string
		$username = mysqli_real_escape_string($con,$username);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		//Checking is user existing in the database or not
			$query = "SELECT * FROM `new` WHERE username='$username' and password='".($password)."'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
			if($rows==1){
			$_SESSION['username'] = $username;
				// Redirect user to index.php
			header("Location: user.php");
			 }else{
		echo "<script type='text/javascript'> alert('Username or password is incorrect');</script>";
	echo "<script>location.href='registration.php'</script>";
		}
		}else{
	?>

	<section class="login-block">
			<div class="container">
		<div class="row">
			<div class="col-md-4 login-sec">
				<h2 class="text-center">Login as a User</h2>
				<form name="registration" action="" method="post">
					<div class="form-group">
					<label for="exampleInputEmail1" class="text-uppercase">Username</label>
					<input type="text" class="form-control" placeholder="Username" name="username" required>			
					</div>
					<div class="form-group">
					<label for="exampleInputPassword1" class="text-uppercase">Password</label>
					<input type="password" class="form-control" placeholder="password" name="password" required>
					</div>
					<div class="form-check">			
					<button type="submit" class="btn btn-login float-right" type="submit" name="submit" value="Register">Submit</button>
					<p>Admin? <a href='index.php'>Login Now</a></p>
					</div>		  
				</form>

			</div>
			<div class="col-md-8 banner-sec">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							
						</ol>
					<div class="carousel-inner" role="listbox">
						<div class="carousel-item active">
						<img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
						<div class="carousel-caption d-none d-md-block">
							<div class="banner-text">
								<h2>Welcome to our site</h2>
								<p>Welcome to our Login & Registration panel.</p>
							</div>	
						</div>
						</div>
					</div>	   					
				</div>
			</div>
		</div>
	</section>

	<?php } ?>
</body>
</html>