<?php
	include_once "connection.php";
	header("Content-type:application/json");
	
	$uid = $_GET['uid'];

	$return = array();
	$addon = array();
	$sql = "SELECT * FROM `service` WHERE `uid` = '$uid' ";
	$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = mysqli_fetch_array($result))
	{

	    $addonid = substr($row[9],1);
		$addonid = strrev($addonid);
		$addonid = substr($addonid,1);
		$addonid = strrev($addonid);
		//echo $addonid;
		$item =   explode(",", $addonid);
		foreach ($item as $value) {
			
		$sql2 = "SELECT * FROM `addons` where `id` = '$value'";
		$result2 = mysqli_query($con, $sql2);
			$row2 = mysqli_fetch_array($result2);
				
			if($row2[0]!= 0)
			{
        	$addo = [
            	'id' => (int) $row2[0],
            	'name' => $row2[1],
            	'image' => $row2[2],
            	'price' => (int) $row2[3]
        		];
			
			array_push($addon,$addo);
			}
			
		}

		$temp = [
			'id' => $row[0],
			'uid' => $row[1],
			'name' => $row[2],
			'phone' => $row[3],
			'type' => $row[4],
			'service' => $row[5],
			'address' => $row[6],
			'date' => $row[7],
			'scratches' => $row[8],
			'addons' => $addon,
			'status' => $row[10],
			'intresedlnsurence' => $row[11],
			'intresedNewBike' => $row[12],
			'sign' => $row[13],
			'driverid' => $row[14],
			'trackingid' => $row[15],
			'paymentMode' => $row[16],
			'city' => $row[17]
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
