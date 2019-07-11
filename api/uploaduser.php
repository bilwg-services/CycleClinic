<?php
	include_once "connection.php";
	header("Content-type:application/json");
	
	
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	
	$sql = "INSERT INTO `user`(`id`, `name`, `email`, `address`, `phoneNumber`,`status`) VALUES ('$id','$name','$email','$address','$phone','0')";
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