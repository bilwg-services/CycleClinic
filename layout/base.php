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
            <i class='fa fa-tachometer'></i>
            <span id='name'>Dashboard</span>
        </div>
        <div id='element'>
            <i class='fa fa-user'></i>
            <span id='name'>Users</span>
        </div>
        <div id='element'>
            <i class='fa fa-shopping-cart'></i>
            <span id='name'>Orders</span>
        </div>
        <div id='element'>
            <i class='fa fa-phone'></i>
            <span id='name'>Contact Us</span>
        </div>
        <div id='element'>
            <i class='fa fa-bell'></i>
            <span id='name'>Notification</span>
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

