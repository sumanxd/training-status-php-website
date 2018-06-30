<?php

include('db.php');
include("function.php");

if(isset($_POST["user_id"]))
{
	$image_location = get_image_name($_POST["user_id"]);
	if($image_location != '')
	{
		unlink("uploads/" . $image_location);
	}
	$statement = $connection->prepare(
		"DELETE FROM tbl_image WHERE tbl_image_id = :tbl_image_id"
	);
	$result = $statement->execute(
		array(
			':tbl_image_id'	=>	$_POST["user_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>