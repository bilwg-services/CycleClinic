<?php
	include_once "connection.php";
	header("Content-type:application/json");
    
    $stateid = $_GET['id'];

	$return = array();

	$sql = "SELECT * FROM `city` WHERE `stateid` = '$stateid' ";
	$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = mysqli_fetch_array($result))
	{
		$temp = [
		'id'=>$row[0],
		'name'=>$row[1],
		'stateid'=>$row[2]
    	];
        
        array_push($return,$temp);
	}
}
else{
		$temp = [
		'status'=> 200,
		'error'=>'No Data Found'
    		];
			
			array_push($return,$temp);
				
}


echo json_encode($return);
 ?>