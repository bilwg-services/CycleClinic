<?php
	include_once "api/connection.php";	
	$id = $_GET['id'];

    $status = $_GET['status'];
        
    if($status != "")
    {
	$sql = "UPDATE `service` SET `status`='$status' WHERE `id` = '$id' ";
	$result = mysqli_query($con, $sql);
	
	if($result == true){
        header('Location: neworder.php?id='.$id);
    }
}
 ?>