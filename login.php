<?php

    include_once "api/connection.php";
   

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login - Cycle Clinic </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel='stylesheet' type='text/css' media='screen' href='css/login.css'>
  
</head>
<body>
    <div class="container">
             <div class="row">
                <div class="col-md-4">
                    <img src="img/logo.png" height="80" />
                </div>
                <div class="col-md-8"> 
                    <center>   
                    <h2><u>Cycle  Clinic Admin Panel</u></h2>
                    <p>Manage Your App On Easy Go</p>
                    </center>
                </div>
            </div>
        
        
        <br>
        <br>
        <form action="login.php" method="POST" >
            <p id="error"></p>
            <div class="row">
                <div class="col-md-3">
                    <label for="email">Your Email ID:</label>
                </div>
                <div class="col-md-9">    
                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email" id="email" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for="email">Your Password:</label>
                </div>
                <div class="col-md-9">    
                    <input type="password" name="pass" class="form-control" placeholder="Enter Your Password" id="pass" required>
                </div>
            </div>
            <br><br>
            <div id="btn" class="row ">
                <div class="col-md-6 col-xs-12">
                    <input type="submit"  name="submit" id="loginBtn" class="btn btn-lg " value="Secure Login" />
                </div>
            </div>


        </form>
    </div>
</body>
</html>

<?php 

if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM `admin` WHERE `email` = '$email' AND `password` = '$pass' ";
    $run = mysqli_query($con, $sql);
        if(mysqli_num_rows($run) != 0)
        {
            $row = mysqli_fetch_array($run);
                #ToDo: Login Sucessfully 


                setcookie("login", "1", time() + (86400 * 30), "/");
		        setcookie("email", $email, time() + (86400 * 30), "/");
		        setcookie("name", $row[1], time() + (86400 * 30), "/");
		        setcookie("password", $password, time() + (86400 * 30), "/");
		        header('Location: index.php');
        
        }
        else
        {
            #ToDo: Wrong Password
            echo "
            <script>
            document.getElementById('error').innerHTML = 'Invalid Email or Password';
            </script>
            ";
        }
}

?>