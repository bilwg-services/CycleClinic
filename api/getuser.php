<?php
	include_once "connection.php";
	header("Content-type:application/json");
	
	$id = $_GET['id'];


	$sql = "SELECT * FROM `user` WHERE `id` = '$id' ";
	$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = mysqli_fetch_array($result))
	{
		$temp = [
		'id'=>$row[0],
		'name'=>$row[1],
		'email'=>$row[2],
		'address'=>$row[3],
		'phoneNumber'=>$row[4]
		];

		echo json_encode($temp);
	}
}


	
 ?>