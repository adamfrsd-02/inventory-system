<?php

include "../../../config/koneksi.php";

$lego = $_POST["lego_no"];
$part = $_POST["part_no"];
$ss = $_POST["ss_code"];
$model = $_POST["model"];
$part_name = $_POST["part_name"];
$supplier = $_POST["supplier"];
$lab_date = $_POST["lab_test_date"];
$expire_date = $_POST["expired_time"];
$chemical = $_POST["psh3_chemical"];
$acc_status = $_POST["access_status"];
$type = $_POST["material_type"];

$query = mysqli_query($koneksi,"INSERT INTO tb_material VALUES ('','$type','$part_name','$part','$model','$supplier','$lego','$ss','$acc_status','$lab_date','$expire_date','$chemical')");

if($query){
    echo '<script>
    $(document).ready(function(){
        setTimeout(function() {
            swal({
                title: "Good Job!",
                text: "Success Add New Material!",
                type: "success"
            }, function() {
                window.location = "../material_list.php";
            });
        }, 1000);
    });
   </script>';
}else{
    echo $koneksi->err;
}

?>