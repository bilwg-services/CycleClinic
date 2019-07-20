<?php
include_once "connection.php";
header("Content-type:application/json");

$response = new Response;
$sql = "SELECT * FROM `addons`";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $addons = array();
    while ($row = mysqli_fetch_array($result)) {
        $addon = [
            'id' => (int) $row[0],
            'name' => $row[1],
            'image' => $row[2],
            'price' => (int) $row[3]
        ];
        array_push($addons, $addon);
    }
    $response->status = 200;
    $response->error = null;
    $response->result = $addons;
}
http_response_code($response->status);
echo json_encode($response);

class Response
{
    var $status = 500;
    var $error = "internal server error.";
    var $result = null;
}
