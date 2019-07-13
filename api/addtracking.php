<?php
include_once "connection.php";
header("Content-type:application/json");


$sid = $_POST['sid'];
$did = $_POST['did'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];


$sql = "INSERT INTO `tracking`(`sid`, `did`, `latitude`, `longitude`) VALUES ('$sid','$did','$latitude','$longitude')";
$result = mysqli_query($con, $sql);

if ($result == true) {

	
	$sql3 = "SELECT * FROM `tracking` WHERE `sid` = '$sid' AND `did` = '$did' ";
	$result3 = mysqli_query($con, $sql3);
	if (mysqli_num_rows($result3) > 0) {
		while ($row = mysqli_fetch_array($result)) {
			$sql2 = "UPDATE `service` SET `driverId`='$did',`trackingId`='$row[0]' WHERE `id`='$sid'";
			$result2 = mysqli_query($con, $sql2);
			$temp = [
				'status' => 200,
				'error' => 'null',
				'trackingid' => $row[0]
			];
			echo json_encode($temp);
		}
	}
} else {
	$temp = [
		'status' => 500,
		'error' => 'Error Uploading'
	];

	echo json_encode($temp);
}
