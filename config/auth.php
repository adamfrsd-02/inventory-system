<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<?php
include "koneksi.php";
//login proses
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cek_user = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
    if(mysqli_num_rows($cek_user)>0){
        $row = mysqli_fetch_assoc($cek_user);
        $sess = mysqli_query($koneksi, "SELECT * FROM tb_user_profile WHERE id_user_profile='$row[id_user_profile]'");
        $data = mysqli_fetch_assoc($sess);

        if($row && $data){
            //create session
            session_start();
            $_SESSION['id_user_profile'] = $data['id_user_profile'];
            $_SESSION['fullname'] = $data['fullname'];
            $_SESSION['phone_number'] = $data['phone_number'];
            $_SESSION['department'] = $data['department'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['user_type'] = $row['user_type'];
            $_SESSION['id_user'] = $row['id_user'];


            if($row['user_type']=="Admin"){
                header("location:../pages/admin/dashboard.php");
                // echo $id_profile;
            }else if($row['user_type']=="User"){
                header("location:../pages/user/dashboard.php");
            }
        }else{
            echo '<script>
    $(document).ready(function(){
        setTimeout(function() {
            swal({
                title: "Authentication Error!",
                text: "Wrong Username / Password, Try Again !",
                type: "error"
            }, function() {
                window.location = "../index.html";
            });
        }, 1000);
    });
   </script>';
        }
    }else{
        echo '<script>
    $(document).ready(function(){
        setTimeout(function() {
            swal({
                title: "Authentication Error!",
                text: "Wrong Username / Password, Try Again !",
                type: "error"
            }, function() {
                window.location = "../index.html";
            });
        }, 1000);
    });
   </script>';
    }
}


?>