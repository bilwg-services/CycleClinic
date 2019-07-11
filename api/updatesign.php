<?php
	include_once "connection.php";
	header("Content-type:application/json");
	
	
	$id = $_POST['sid'];

    $date = date("Y-m-d");

    $file_name = $_FILES["sign"]["name"];
    $file_tmp = $_FILES["sign"]["tmp_name"];

    $ext = pathinfo($file_name,PATHINFO_EXTENSION);

	
    $newFileName = "cycleclinic-$date".time();

    move_uploaded_file($file_tmp,"photo/".$newFileName.'.'.$ext);
    
    $filenameToStore=$newFileName.".".$ext;
    $location = $base_url.'/api/photo/'.$filenameToStore;
        
    if($status != "")
    {
	$sql = "UPDATE `service` SET `sign`='$location' WHERE `id` = '$id' ";
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