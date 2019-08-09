<?php

include_once "api/connection.php";
include_once "layout/base.php";

if (isset($_COOKIE['login']) != 1) {
  header('Location: login.php');
} else {
  $username = $_COOKIE['name'];
  $useremail = $_COOKIE['email'];
}


$Tuser = 0;
$Tcategory = 0;
$Tproducts = 0;
$Tservices = 0;

$SQL1 = "SELECT COUNT(`id`) FROM `user`";
$RESULT1 = mysqli_query($con, $SQL1);
$RS1 = mysqli_fetch_array($RESULT1);
$Tuser = $RS1[0];

$SQL2 = "SELECT COUNT(`id`) FROM `category`";
$RESULT2 = mysqli_query($con, $SQL2);
$RS2 = mysqli_fetch_array($RESULT2);
$Tcategory = $RS2[0];


$SQL3 = "SELECT COUNT(`id`) FROM `addons`";
$RESULT3 = mysqli_query($con, $SQL3);
$RS3 = mysqli_fetch_array($RESULT3);
$Tproducts = $RS3[0];

$SQL4 = "SELECT COUNT(`id`) FROM `service`";
$RESULT4 = mysqli_query($con, $SQL4);
$RS4 = mysqli_fetch_array($RESULT4);
$Tservices = $RS4[0];


$SQL5 = "SELECT COUNT(`id`) FROM `worker`";
$RESULT5 = mysqli_query($con, $SQL5);
$RS5 = mysqli_fetch_array($RESULT5);
$Tworker = $RS5[0];

$SQL6 = "SELECT COUNT(`id`) FROM `service` where `status` = 1";
$RESULT6 = mysqli_query($con, $SQL6);
$RS6 = mysqli_fetch_array($RESULT6);
$Aorders = $RS6[0];

$SQL7 = "SELECT COUNT(`id`) FROM `service` where `status` = '5' ";
$RESULT7 = mysqli_query($con, $SQL7);
$RS7 = mysqli_fetch_array($RESULT7);
$Corders = $RS7[0];

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
        Admin Panel - My Cycle Clinic
    </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body  onload="startTime()" class="">
  <div class="wrapper ">
    <!-- Sidebar -->
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
         -->
      <div class="logo">
        <a href="index.php" class="simple-text logo-normal">
        <img src="img/logo.png" height="70" /> My Cycle Clinic
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item  active">
            <a class="nav-link" href="./index.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./order.php">
              <i class="material-icons">edit</i>
              <p>Order</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./user.php">
              <i class="material-icons">content_paste</i>
              <p>Users List</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./worker.php">
              <i class="material-icons">library_books</i>
              <p>Pickup Person List</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./product.php">
              <i class="material-icons">build</i>
              <p>Products</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./notification.php">
              <i class="material-icons">notifications</i>
              <p>Notifications</p>
            </a>
          </li>


          <li class="nav-item ">
            <a class="nav-link" href="logout.php">
              <i class="material-icons">power_settings_new</i>
              <p>Log out</p>
            </a>
          </li>



        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">

            <ul class="navbar-nav">
             
              <li class="nav-item dropdown">
              <?php echo date("l jS \of F Y ");  ?><span id="txt"></span>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>

                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <span style="padding: 20px;"> No Nortification </span>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item"><?php echo $useremail; ?></a>
                  <div class="dropdown-divider"></div>

                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">people</i>
                  </div>
                  <p class="card-category">Total Users</p>
                  <h3 class="card-title">
                    <?php echo $Tuser; ?>
                    <small>Acct</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="#pablo">Get More Users...</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">attach_money</i>
                  </div>
                  <p class="card-category">Total Categories</p>
                  <h3 class="card-title"><?php echo $Tcategory; ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Lifetime
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">chat</i>
                  </div>
                  <p class="card-category">Total Products</p>
                  <h3 class="card-title">
                    <?php echo $Tproducts; ?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> Lifetime Contact
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">build</i>
                  </div>
                  <p class="card-category">Total Services</p>
                  <h3 class="card-title">
                    <?php echo $Tservices; ?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-success">
                  <div class="ct-chart">
                    <center>
                      <a href="job.php">
                        <button class="btn btn-lg" style="background: #fff; color: #000;">
                          <?php echo $Tworker; ?> Pickup Person
                        </button>
                      </a>
                    </center>
                  </div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Total Pickup Persons</h4>

                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> updated Just Now
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-warning">
                  <div class="ct-chart">
                    <center>
                      <a href="order.php">
                        <button class="btn btn-lg" style="background: #fff; color: #000;">
                          <?php echo $Aorders; ?> Peding Orders
                        </button>
                      </a>
                    </center>
                  </div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Active Orders</h4>

                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> Updated Just Now
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-danger">
                  <div class="ct-chart">
                    <center>
                      <a href="order.php">
                        <button class="btn btn-lg" style="background: #fff; color: #000;">
                          <?php echo $Corders; ?> Completed Orders
                        </button>
                      </a>
                    </center>
                  </div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Completed Tasks</h4>

                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> Last Updated < 1 Day </div> </div> </div> </div> </div> <div class="row">
                      <div class="col-lg-6 col-md-12">
                        <div class="card">
                          <div class="card-header card-header-tabs card-header-primary">
                            <h4 class="card-title">Orders</h4>
                            <p class="card-category">Pending Orders</p>
                          </div>
                          <div class="card-body table-responsive">
                            <table class="table table-hover">
                              <thead class="text-warning">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Service Name</th>
                                <th>Email Id</th>

                                <th>Details</th>
                              </thead>
                              <tbody>
                                <?php
                                $mySql = "SELECT * FROM `service` where `status` = 1 Limit 0,10";
                                $result = mysqli_query($con, $mySql);
                                $i = 0;
                                if (mysqli_num_rows($result) > 0) {
                                  while ($row = mysqli_fetch_array($result)) {
                                    $i++;
                                    // ToDo: Add Link Of Detail Page
                                    echo "
                            <tr>
                              <td>$i</td>
                              <td>$row[2]</td>
                              <td>$row[6]</td>
                              <td>$row[4]</td>
                              
                              <td><a href='orderdetail.php?id=$row[0]' style='color: #0f0;'>Detail</a></td>
                            </tr>
                            ";
                                  }
                                } else {
                                  echo "
                          <tr>
                          <td colspan='5'><center>No Pending Projects</center></td>
                          </tr>
                          ";
                                }
                                ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-12">
                        <div class="card">
                          <div class="card-header card-header-warning">
                            <h4 class="card-title">Pickup Person Stats</h4>
                            <p class="card-category">All Pickup Person Data</p>
                          </div>
                          <div class="card-body table-responsive">
                            <table class="table table-hover">
                              <thead class="text-warning">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>City</th>
                              </thead>
                              <tbody>
                                <?php
                                $mySql = "SELECT * FROM `worker` ";
                                $result = mysqli_query($con, $mySql);
                                if (mysqli_num_rows($result) > 0) {
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo "
                            <tr>
                              <td>$row[0]</td>
                              <td>$row[1]</td>
                              <td>$row[2]</td>
                              <td>$row[3]</td>
                              <td>$row[7]</td>
                            </tr>
                            ";
                                  }
                                }
                                ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <footer class="footer">
                <div class="container-fluid">
                  <nav class="float-left">
                    <ul>


                    </ul>
                  </nav>
                  <div class="copyright float-right">
                    &copy;
                    <script>
                      document.write(new Date().getFullYear())
                    </script> All Rights Reserved
                  </div>
                </div>
              </footer>
            </div>
          </div>
          <div class="fixed-plugin">
            <div class="dropdown show-dropdown">
              <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
              </a>
              <ul class="dropdown-menu">
                <li class="header-title"> Sidebar Filters</li>
                <li class="adjustments-line">
                  <a href="javascript:void(0)" class="switch-trigger active-color">
                    <div class="badge-colors ml-auto mr-auto">
                      <span class="badge filter badge-purple" data-color="purple"></span>
                      <span class="badge filter badge-azure" data-color="azure"></span>
                      <span class="badge filter badge-green" data-color="green"></span>
                      <span class="badge filter badge-warning" data-color="orange"></span>
                      <span class="badge filter badge-danger" data-color="danger"></span>
                      <span class="badge filter badge-rose active" data-color="rose"></span>
                    </div>
                    <div class="clearfix"></div>
                  </a>
                </li>
                <li class="header-title">Images</li>
                <li class="active">
                  <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="assets/img/sidebar-1.jpg" alt="">
                  </a>
                </li>
                <li>
                  <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="assets/img/sidebar-2.jpg" alt="">
                  </a>
                </li>
                <li>
                  <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="assets/img/sidebar-3.jpg" alt="">
                  </a>
                </li>
                <li>
                  <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="assets/img/sidebar-4.jpg" alt="">
                  </a>
                </li>



              </ul>
            </div>
          </div>
          <!--   Core JS Files   -->
          <script src="assets/js/core/jquery.min.js"></script>
          <script src="assets/js/core/popper.min.js"></script>
          <script src="assets/js/core/bootstrap-material-design.min.js"></script>
          <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
          <!-- Plugin for the momentJs  -->
          <script src="assets/js/plugins/moment.min.js"></script>
          <!--  Plugin for Sweet Alert -->
          <script src="assets/js/plugins/sweetalert2.js"></script>
          <!-- Forms Validations Plugin -->
          <script src="assets/js/plugins/jquery.validate.min.js"></script>
          <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
          <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
          <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
          <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
          <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
          <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
          <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
          <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
          <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
          <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
          <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
          <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
          <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
          <script src="assets/js/plugins/fullcalendar.min.js"></script>
          <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
          <script src="assets/js/plugins/jquery-jvectormap.js"></script>
          <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
          <script src="assets/js/plugins/nouislider.min.js"></script>
          <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
          <!-- Library for adding dinamically elements -->
          <script src="assets/js/plugins/arrive.min.js"></script>
          <!--  Google Maps Plugin    -->
          <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
          <!-- Chartist JS -->
          <script src="assets/js/plugins/chartist.min.js"></script>
          <!--  Notifications Plugin    -->
          <script src="assets/js/plugins/bootstrap-notify.js"></script>
          <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
          <script src="assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
          <!-- Material Dashboard DEMO methods, don't include it in your project! -->
          <script src="assets/demo/demo.js"></script>
          <script>
            $(document).ready(function() {
              $().ready(function() {
                $sidebar = $('.sidebar');

                $sidebar_img_container = $sidebar.find('.sidebar-background');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');

                window_width = $(window).width();

                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                  if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                    $('.fixed-plugin .dropdown').addClass('open');
                  }

                }

                $('.fixed-plugin a').click(function(event) {
                  // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                  if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                      event.stopPropagation();
                    } else if (window.event) {
                      window.event.cancelBubble = true;
                    }
                  }
                });

                $('.fixed-plugin .active-color span').click(function() {
                  $full_page_background = $('.full-page-background');

                  $(this).siblings().removeClass('active');
                  $(this).addClass('active');

                  var new_color = $(this).data('color');

                  if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                  }

                  if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                  }

                  if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                  }
                });

                $('.fixed-plugin .background-color .badge').click(function() {
                  $(this).siblings().removeClass('active');
                  $(this).addClass('active');

                  var new_color = $(this).data('background-color');

                  if ($sidebar.length != 0) {
                    $sidebar.attr('data-background-color', new_color);
                  }
                });

                $('.fixed-plugin .img-holder').click(function() {
                  $full_page_background = $('.full-page-background');

                  $(this).parent('li').siblings().removeClass('active');
                  $(this).parent('li').addClass('active');


                  var new_image = $(this).find("img").attr('src');

                  if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function() {
                      $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                      $sidebar_img_container.fadeIn('fast');
                    });
                  }

                  if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $full_page_background.fadeOut('fast', function() {
                      $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                      $full_page_background.fadeIn('fast');
                    });
                  }

                  if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                  }

                  if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                  }
                });

                $('.switch-sidebar-image input').change(function() {
                  $full_page_background = $('.full-page-background');

                  $input = $(this);

                  if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                      $sidebar_img_container.fadeIn('fast');
                      $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                      $full_page_background.fadeIn('fast');
                      $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                  } else {
                    if ($sidebar_img_container.length != 0) {
                      $sidebar.removeAttr('data-image');
                      $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                      $full_page.removeAttr('data-image', '#');
                      $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                  }
                });

                $('.switch-sidebar-mini input').change(function() {
                  $body = $('body');

                  $input = $(this);

                  if (md.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    md.misc.sidebar_mini_active = false;

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                  } else {

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                    setTimeout(function() {
                      $('body').addClass('sidebar-mini');

                      md.misc.sidebar_mini_active = true;
                    }, 300);
                  }

                  // we simulate the window Resize so the charts will get updated in realtime.
                  var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                  }, 180);

                  // we stop the simulation of Window Resize after the animations are completed
                  setTimeout(function() {
                    clearInterval(simulateWindowResize);
                  }, 1000);

                });
              });
            });
          </script>
          <script>
            $(document).ready(function() {
              // Javascript method's body can be found in assets/js/demos.js
              md.initDashboardPageCharts();

            });
          </script>

          <script type="text/javascript">
            function logout() {
              window.location.href = "logout.php";
            }
          </script>
            <script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>
</body>

</html>