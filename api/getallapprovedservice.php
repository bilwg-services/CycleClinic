<?php
	include_once "connection.php";
	header("Content-type:application/json");
	

	$return = array();
	$addon = array();
	$sql = "SELECT * FROM `service` WHERE `status` = '1' ";
	$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = mysqli_fetch_array($result))
	{
	    array_push($addon,$row[9]);
		$temp = [
		'id'=>$row[0],
		'uid'=>$row[1],
		'name'=>$row[2],
		'phone'=>$row[3],
		'type'=>$row[4],
		'service'=>$row[5],
		'address'=>$row[6],
		'date'=>$row[7],
		'scratches'=>$row[8],
		'addons'=>$addon,
		'status'=>$row[10],
		'intresedlnsurence'=>$row[11],
		'intresedNewBike'=>$row[12]
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