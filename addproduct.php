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
                <a href="product.php">
                    <div class="btn btn-danger">
                        Back To Previous Page
                    </div>
                </a>
                <br>
                <br>
                <form action="addproduct.php" method="POST" enctype="multipart/form-data">
                    <label>Product Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Product Name" required />
                    <br>
                    <label>Product Cost</label>
                    <input type="number" name="price" class="form-control" placeholder="Product Cost" required />
                    <br>
                    <label>Product Image</label>
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
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    $file_name = $_FILES["image"]["name"];
    $file_tmp = $_FILES["image"]["tmp_name"];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);

    $filename = basename($file_name, $ext);
    $newFileName = $filename . time() . "." . $ext;
    move_uploaded_file($file_tmp = $_FILES["image"]["tmp_name"], "addons/" . $newFileName);

    $location = $base_url . '/addons/' . $newFileName;

    $sql = "INSERT INTO `addons`(`name`, `image`, `price`) VALUES ('$name','$location','$price')";
    $result = mysqli_query($con, $sql);
    
    if ($result == true) {
        header('Location: product.php');
    } else {
        header('Location: product.php');
    }
    
}

?>