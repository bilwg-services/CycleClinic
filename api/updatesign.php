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
	

	 $temp = [
		'status'=> 200,
		'error'=>'null',
		'url'=>$location
    	];
	        	
	echo json_encode($temp);
	
 ?>