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
$id = $_POST["id_material"];

// $query = mysqli_query($koneksi,"UPDATE tb_material VALUES ('','$type','$part_name','$part','$model','$supplier','$lego','$ss','$acc_status','$lab_date','$expire_date','$chemical')");

//update tb_material
$query = mysqli_query($koneksi,"UPDATE tb_material SET lego_design_no='$lego', part_number='$part', ss_code='$ss', model_name='$model', part_name='$part_name', supplier='$supplier', lab_test_date='$lab_date', expired_time='$expire_date', psh3_chemical='$chemical', accesibility_status='$acc_status', id_material_type='$type' WHERE id_material='$id'");



if($query){
    echo '<script>
    $(document).ready(function(){
        setTimeout(function() {
            swal({
                title: "Good Job!",
                text: "Material Updated!",
                type: "success"
            }, function() {
                window.location = "../material_list.php";
            });
        }, 1000);
    });
   </script>';
}else{
    echo $koneksi->error;
}

?>