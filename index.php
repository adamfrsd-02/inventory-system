<?php

include "config/koneksi.php";

session_start();
error_reporting(0);

if($_SESSION['fullname']){
    if($_SESSION['user_type'] == 'Admin'){
        echo '<script>
            $(document).ready(function(){
                setTimeout(function() {
                    swal({
                        title: "You still logged in!",
                        text: "You will directed to dashboard !",
                        type: "success"
                    }, function() {
                        window.location = "pages/admin/dashboard.php";
                    });
                }, 1000);
            });
        </script>';
    }elseif($_SESSION['user_type'] == 'User'){
        echo '<script>
            $(document).ready(function(){
                setTimeout(function() {
                    swal({
                        title: "You still logged in!",
                        text: "You will directed to dashboard !",
                        type: "success"
                    }, function() {
                        window.location = "pages/user/dashboard.php";
                    });
                }, 1000);
            });
        </script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RoHS Management System</title>
    <!-- CDN CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- CDN JS -->
    <script src=" https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</head>

<body class="bg-primary">
    <!-- Login Card -->
    <div class="wrapper col-md-12 fadeInDown">
        <div id="formContent" class="pt-3">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <p class="title-header">LOGIN</p>
            </div>

            <!-- notif -->
            <div class="notif px-4 pb-4">
                <div class="py-2" style="background-color: rgba(16, 255, 16, 0.267);">
                    <p class="text-success my-auto">
                        Login using your credentials !
                    </p>
                </div>
            </div>

            <!-- Login Form -->
            <form method="POST" action="config/auth.php">
                <input type="text" id="login" class="fadeIn second" name="username" placeholder="Enter User ID">
                <input type="password" style="background-color: #f6f6f6;
                border: none;
                color: #0d0d0d;
                padding: 15px 32px;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 5px;
                width: 85%;
                border: 2px solid #f6f6f6;
                -webkit-transition: all 0.5s ease-in-out;
                -moz-transition: all 0.5s ease-in-out;
                -ms-transition: all 0.5s ease-in-out;
                -o-transition: all 0.5s ease-in-out;
                transition: all 0.5s ease-in-out;
                -webkit-border-radius: 5px 5px 5px 5px;
                border-radius: 5px 5px 5px 5px;
                border-radius: 15px;" id="password" class="fadeIn third" name="password" placeholder="Password">
                <input type="submit" name="submit" class="fadeIn fourth" style="width: 85%;" value="Login">
            </form>
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>

        </div>
    </div>
</body>

</html>