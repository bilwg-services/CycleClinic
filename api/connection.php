<?php 
ob_start();
$db = "cycleclinic";
$host = "localhost";
$user = "asgssolution";
$pass = "asgssolution";

// Create connection
$con = new mysqli($host, $user, $pass , $db);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
//echo "Connected successfully";


?>