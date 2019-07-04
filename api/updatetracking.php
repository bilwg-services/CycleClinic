<?php
	include_once "connection.php";
	header("Content-type:application/json");
	
	
	$id = $_POST['id'];

	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];

	
	$sql = "UPDATE `tracking` SET `latitude`='$latitude',`longitude`='$longitude' WHERE `id` = '$id' ";
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