<?php
	include_once "connection.php";
	header("Content-type:application/json");
	
	
	$id = $_POST['sid'];

    $status = $_POST['status'];
        
    if($status != "")
    {
	$sql = "UPDATE `service` SET `status`='$status' WHERE `id` = '$id' ";
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
		'error'=>'Error Updating Status'
    	];
			
			echo json_encode($temp);
    }
}
 ?>