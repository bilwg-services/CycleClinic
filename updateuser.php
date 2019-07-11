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
if (isset($_GET['id']))
    $id = $_GET['id'];
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
                <a href="user.php">
                    <div class="btn btn-danger">
                        Back To Previous Page
                    </div>
                </a>
                <?php
                if ($id == "")
                    echo "<center><p style='color: #f00;'>Connot Fatch User Id, Please Try Again.</p></center>";
                else{
                $sql = "SELECT * FROM `user` WHERE `id` = '$id' ";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo '
                        <br> <br>
                <form action="updateuser.php" method="POST">
                    <label>User Name</label>
                    <input type="text" name="name" class="form-control" placeholder="User Name Here" value="'.$row[1].'" required />
                    <br>
                    <label>User Email</label>
                    <input type="email" name="email" class="form-control" placeholder="User Email Here" value="'.$row[2].'" required />
                    <br>
                    <label>User Address</label>
                    <input type="text" name="address" class="form-control" placeholder="User Address Here" value="'.$row[3].'" required />
                    <br>
                    <label>User Phone Number</label>
                    <input type="text" name="phone" class="form-control" placeholder="User Phone Number Here" value="'.$row[4].'" required />
                    <input type="hidden" name="id" value="'.$row[0].'" required />
                    <br>
                    <input type="submit" name="submit" class="btn btn-success" value="Save Information" />
                </form>
                        ';
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

<?php
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];
    $phone = $_POST['phone'];
    echo "<script>console.log( 'Debug Objects: " . $id . "' );</script>";
	
	$sql = "UPDATE `user` SET `name`='$name',`email`='$email',`address`='$address',`phoneNumber`='$phone' WHERE `id`='$id' ";
	$result = mysqli_query($con, $sql);
	
	if($result == true)
     {
     header('Location: user.php');
     }
     else{
     header('Location: user.php');
     }

}

?>