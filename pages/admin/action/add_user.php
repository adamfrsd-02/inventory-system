<?php

include "../../../config/koneksi.php";

$fullname = $_POST['fullname'];
$role = $_POST['role'];
$department = $_POST['department'];

$username = preg_replace('/\s+/', '', strtolower($fullname));

$insert_profile = mysqli_query($koneksi, "INSERT INTO tb_user_profile VALUES ('','$fullname','$department','')");

if($insert_profile){
    $id_profile = $koneksi->insert_id;
    // echo $id_profile;
    $insert_user = mysqli_query($koneksi, "INSERT INTO tb_user VALUES ('',$id_profile,'$username','123456','$role')");

    if($insert_user){
        echo '<script>
            $(document).ready(function(){
                setTimeout(function() {
                    swal({
                        title: "Good Job!",
                        text: "User Added Successfully!",
                        type: "success"
                    }, function() {
                        window.location = "../user_list.php";
                    });
                }, 1000);
            });
        </script>';
    }else{
        echo '<script>
    $(document).ready(function(){
        setTimeout(function() {
            swal({
                title: "An Error Occurred!",
                text: "'.$koneksi->error.'",
                type: "error"
            }, function() {
                window.location = "../user_list.php";
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
                title: "An Error Occurred!",
                text: "'.$koneksi->error.'",
                type: "error"
            }, function() {
                window.location = "../user_list.php";
            });
        }, 1000);
    });
   </script>';
}




?>