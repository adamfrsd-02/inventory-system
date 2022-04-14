<?php

include "../../../config/koneksi.php";

$query = mysqli_query($koneksi,"DELETE FROM tb_user WHERE id_user=$_GET[id]");

if($query){
    echo '<script>
            $(document).ready(function(){
                setTimeout(function() {
                    swal({
                        title: "Good Job!",
                        text: "User Removed Successfully!",
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

?>