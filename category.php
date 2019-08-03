<?php

include_once "api/connection.php";
include_once "layout/base.php";

if(isset($_COOKIE['login']) != 1)
{
    header('Location: login.php');
}
else
{
    $username = $_COOKIE['name'];
    $useremail = $_COOKIE['email'];
}

$get_pagenation = 0;
if (isset($_GET['page']))
    $get_pagenation = $_GET['page'];

if ($get_pagenation < 0) {
    header('Location: ?page=0');
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

    <title>Category - Cycle Clinic</title>
</head>
<body>
    <?php TopBar($username , $useremail); ?>

    <div class="row">
        <div class="col-md-3 col-xs-3">
            <?php SideBar(); ?>
        </div>
        <div class="col-md-9 col-xs-9">
        <div id="contetMain">
                <div id="pagination">
                    <?php
                    $back = $get_pagenation - 1;
                    $next = $get_pagenation + 1;
                    ?>
                    <center>
                        <span>
                            <a href="<?php echo "?page=$back" ?>">
                                <div class='btn btn-success'>Back</div>
                            </a>
                        </span>
                        <span>
                            <a href="?page=0">
                                <div class='btn btn-success'>1-19</div>
                            </a>
                        </span>
                        <span>
                            <a href="?page=1">
                                <div class='btn btn-success'>20-39</div>
                            </a>
                        </span>
                        <span>
                            <a href="?page=2">
                                <div class='btn btn-success'>40-59</div>
                            </a>
                        </span>
                        <span>
                            <a href="?page=3">
                                <div class='btn btn-success'>60-79</div>
                            </a>
                        </span>
                        <span>
                            <a href="?page=4">
                                <div class='btn btn-success'>80-99</div>
                            </a>
                        </span>
                        <span>
                            <a href="?page=5">
                                <div class='btn btn-success'>100</div>
                            </a>
                        </span>
                        <span>
                            <a href="<?php echo "?page=$next" ?>">
                                <div class='btn btn-success'>Next</div>
                            </a>
                        </span>
                    </center>
                </div>
                <br>
                <center><a href="addcategory.php"  class="btn btn-warning">Add Category</a></center>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id:</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $page_start = $get_pagenation * 20;
                        $page_end = ($get_pagenation * 20) + 19;

                        $sql = "SELECT * FROM `category` LIMIT $page_start,$page_end ";
                        $result = mysqli_query($con, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo "
                                <tr>
                                <td>$row[0]</td>
                                <td>$row[1]</td>
                                <td><img src='$row[2]' width='120px'></td>
                                
                                <td><a href='editproduct.php?id=$row[0]' class='btn btn-info'>Edit</td> 
                                </tr>
                                ";
                            }
                        } else {
                            echo "<tr>
                            <td colspan='4'><center>No Category Found </center></td>
                            </tr>";
                        }
                        ?>

                    </tbody>
                </table>



            </div>
        </div>
    </div>
    <?php FootBar(); ?>
</body>
</html>