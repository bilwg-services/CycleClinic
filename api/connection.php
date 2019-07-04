<?php 
ob_start();
$db = "cycleweb_cycle";
$host = "localhost";
$user = "cycleweb_user";
$pass = "UU7W](-0U,HT";

// Create connection
$con = new mysqli($host, $user, $pass , $db);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
//echo "Connected successfully";


?>