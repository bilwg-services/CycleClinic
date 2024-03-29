<?php

echo "<link rel='stylesheet' type='text/css' media='screen' href='css/base.css'>";

function TopBar($username = "" , $useremail = "")
{
    echo "
    <div  id='TopBar'>
        <div class='row'>
            <div class='col-md-4'>
                <span id='title'>Dashboard Cycle Clinic </span>
            </div>
            <div class='col-md-2 btn ' id='right'>
                <span >$useremail</span>
                &nbsp;&nbsp;&nbsp;
                <a href='logout.php' style='font-size: 22px;'><i class='fa fa-sign-out' aria-hidden='true'></i></a>
             </div> 
        </div>
        
        
    </div>
    ";
}

function SideBar()
{
    echo "
   <div id='SideBar'>
    <hr>
        <div id='element'>
            <a href='index.php'>
                <i class='fa fa-tachometer'></i>
                <span id='name'>Dashboard</span>
            </a>
        </div>
        <div id='element'>
            <a href='user.php'>
                <i class='fa fa-user'></i>
                <span id='name'>Users</span>
            </a>
        </div>
        <div id='element'>
            <a href='order.php'>
                <i class='fa fa-shopping-cart'></i>
                <span id='name'>Orders</span>
            </a>
        </div>
        <div id='element'>
            <a href='worker.php'>
                <i class='fa fa-user-circle-o'></i>
                <span id='name'>Workers</span>
            </a>
        </div>
        <div id='element'>
            <a href='product.php'>
            <i class='fa fa-product-hunt'></i>
                <span id='name'>Products</span>
            </a>
        </div>
        <div id='element'>
            <a href='category.php'>
            <i class='fa fa-th-large'></i>
                <span id='name'>Categories</span>
            </a>
        </div>
        <div id='element'>
            <a href='notification.php'>
                <i class='fa fa-bell'></i>
                <span id='name'>Notification</span>
            </a>
        </div>
        
    </div>
    ";
}

function FootBar()
{
    $year = date('Y');
    echo '
    <div id="FootBar">
        <span>&copy; '.$year.' All Rights Reserved </span>
    </div>
    ';
}
?>

