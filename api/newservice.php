<?php
	include_once "connection.php";
	header("Content-type:application/json");
	
	$uid = $_POST['uid'];
	$name = $_POST['name'];
    $phone = $_POST['phone'];
    $type = $_POST['type'];
    $service = $_POST['service'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $scratches = $_POST['scratches'];
    $addons = $_POST['addons'];
    $status = $_POST['status'];
    $intresedInsurence = $_POST['intresedInsurence'];
    $intresedNewBike = $_POST['intresedNewBike'];
    
	
	$sql = "INSERT INTO `service`(`uid`, `name`, `phone`, `type`, `service`, `address`, `date`, `scratches`, `addons`, `status`, `intresedlnsurence`, `intresedNewBike`,`sign`) 
    VALUES ('$uid','$name','$phone','$type','$service','$address','$date','$scratches','$addons','$status','$intresedInsurence','$intresedNewBike','')";
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