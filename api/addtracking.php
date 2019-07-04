<?php
	include_once "connection.php";
	header("Content-type:application/json");
	
	
	$sid = $_POST['sid'];
	$did = $_POST['did'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];

	
	$sql = "INSERT INTO `tracking`(`sid`, `did`, `latitude`, `longitude`) VALUES ('$sid','$did','$latitude','$longitude')";
	$result = mysqli_query($con, $sql);
	
	if($result == true)
     {
         $temp = [
		'status'=> 200,
		'error'=>'null'
    	];
	        	
				echo json_encode($temp);
	 }
	else
	{
		  $temp = [
		'status'=> 500,
		'error'=>'Error Uploading'
    	];
			
			echo json_encode($temp);
	}
 ?>