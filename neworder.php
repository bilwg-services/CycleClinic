<?php

include_once "api/connection.php";
include_once "layout/base.php";

if (isset($_COOKIE['login']) != 1) {
    header('Location: login.php');
} else {
    $username = $_COOKIE['name'];
    $useremail = $_COOKIE['email'];
}
$id = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Dashboard - Cycle Clinic</title>
</head>

<body>
    <?php TopBar($username, $useremail); ?>

    <div class="row">
        <div class="col-md-3 col-xs-3">
            <?php SideBar(); ?>
        </div>
        <div class="col-md-9 col-xs-9">
            <div id="contetMain">
                <a href="order.php">
                    <div class="btn btn-danger">
                        Back To Previous Page
                    </div>
                </a>
                <?php
                if ($id == "")
                    echo "<center><p style='color: #f00;'>Connot Fatch Order Id, Please Try Again.</p></center>";
                else {
                    $sql = "SELECT * FROM `service` where `id`= '$id' ";
                    $result = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $addon = array($row[9]);
                            $scratches = ($row[8] == 1) ? "Yes" : "No";
                            $insurence = ($row[11] == 1) ? "Yes" : "No";
                            $newbike = ($row[12] == 1) ? "Yes" : "No";
                            if ($row[10] == 5) {
                                $status = "<span  style='color: #0f0;'>Completed</span>";
                            } elseif ($row[10] >= 2 && $row[10] <= 4) {
                                $status = "<span  style='color: #f00;'>Pending</span>";
                            } elseif ($row[10] == 1) {
                                $status = "<span  style='color: #f00;'>Approved</span>";
                            } else {
                                $status = "<span style='color: #00f;'>New Order</span>";
                            }
                            echo "
                                <h2>Name: $row[2]</h2>
                                <a href='tel:$row[3]'>Phone : $row[3]</a>
                                <br>
                                <h4><b>Type:</b> $row[4]</h4>
                                <p><b>Service:</b> $row[5]</p>
                                <p><b>Address:</b> $row[6]</p>
                                <p><b>Date And Time: </b>$row[7]</p>
                                <p><b>Addon:</b>$addon[0]</p>
                                <p><b>Insurence:</b> $insurence</p>
                                <p><b>New Bike:</b> $newbike</p>
                                <h3>Status: $status</h3>
                                ";
                            if ($row[10] == 5) {
                                echo '
                                    <a href="updatestate.php?id=' . $row[0] . '&status=3">
                                    <div class="btn btn-danger">
                                        Change Status To Not Completed
                                    </div>
                                    </a>
                                    ';
                            } elseif ($row[10] >= 1 && $row[10] <= 4) {
                                echo '
                                    <a href="updatestate.php?id=' . $row[0] . '&status=5">
                                    <div class="btn btn-success">
                                        Change Status To Completed
                                    </div>
                                    </a>
                                    ';
                            } else {
                                echo '
                                    <a href="updatestate.php?id=' . $row[0] . '&status=1">
                                    <div class="btn btn-info">
                                        Approve This Order And Send To Drivers
                                    </div>
                                    </a>
                                    ';
                            }
                        }
                    }
                }


                ?>
            </div>
        </div>
    </div>
    <?php FootBar(); ?>
</body>

</html>