<?php

include_once "api/connection.php";
include_once "layout/base.php";

if (isset($_COOKIE['login']) != 1) {
    header('Location: login.php');
} else {
    $username = $_COOKIE['name'];
    $useremail = $_COOKIE['email'];
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
                <a href="worker.php">
                    <div class="btn btn-danger">
                        Back To Previous Page
                    </div>
                </a>
                <br>
                <br>
                <form action="addworker.php" method="POST" enctype="multipart/form-data">
                    <label>Worker Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Worker Name" required />
                    <br>
                    <label>Worker Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Worker Email" required />
                    <br>
                    <label>Worker Password</label>
                    <input type="password" name="pass" class="form-control" placeholder="Worker Password" required />
                    <br>
                    <label>Worker Phone</label>
                    <input type="number" name="phone" class="form-control" placeholder="Worker Phone Number" required />
                    <br>
                    <label>Worker City</label>
                    <input type="text" name="city" class="form-control" placeholder="Worker City" required />
                    <br>
                    <label>Worker Image</label>
                    <input type="file" name="image" class="form-control" placeholder="Product Image" accept="image/*" required />
                    <br>


                    <input type="submit" name="submit" class="btn btn-success" value="Add Product" />

                </form>

            </div>
        </div>
    </div>
    <?php FootBar(); ?>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];

    $file_name = $_FILES["image"]["name"];
    $file_tmp = $_FILES["image"]["tmp_name"];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);

    $filename = basename($file_name, $ext);
    $newFileName = $filename . time() . "." . $ext;
    move_uploaded_file($file_tmp = $_FILES["image"]["tmp_name"], "worker/" . $newFileName);

    $location = $base_url . '/worker/' . $newFileName;

    $sql = "INSERT INTO `worker`(`name`, `email`, `phone`, `password`, `photo`, `status`, `city`)
     VALUES ('$name','$email','$phone','$pass','$location','1','$city')";
    $result = mysqli_query($con, $sql);
    
    if ($result == true) {
       header('Location: worker.php');
    } else {
       header('Location: worker.php');
    }
    
}

?>