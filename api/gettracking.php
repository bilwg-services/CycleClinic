<?php
	include_once "connection.php";
	header("Content-type:application/json");
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM `tracking` WHERE `id` = '$id' ";
	$result = mysqli_query($con, $sql);
    
if(mysqli_num_rows($result)>0)
{
	while ($row = mysqli_fetch_array($result))
	{
	     array_push($addon,$row[9]);
		$temp = [
		'id'=>$row[0],
		'sid'=>$row[1],
		'did'=>$row[2],
		'latitude'=>$row[3],
		'longitude'=>$row[4]
    	];
        
        echo json_encode($temp);
	}
}
else{
		$temp = [
		'status'=> 200,
		'error'=>'No Data Found'
    		];
	        	
				echo json_encode($temp);
}

 ?>