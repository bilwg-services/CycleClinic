<?php
	include_once "connection.php";
	header("Content-type:application/json");
	
	$email = $_GET['email'];


	$sql = "SELECT * FROM `worker` WHERE `email` = '$email' ";
	$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = mysqli_fetch_array($result))
	{
		$temp = [
		'id'=>$row[0],
		'name'=>$row[1],
		'email'=>$row[2],
		'phone'=>$row[3],
		'photo'=>$row[5],
		'status'=>$row[6]
		];

		echo json_encode($temp);
	}
}


	
 ?>