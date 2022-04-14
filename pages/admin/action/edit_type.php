<?php

//update material type
include "../../../config/koneksi.php";

//get data post
$id = $_POST["id_material_type"];
$type = $_POST["type"];
$own = $_POST["own_type"];
$supplier = $_POST["supplier"];

//query update
$query = mysqli_query($koneksi,"UPDATE tb_material_type SET material_type='$type', own_type='$own', supplier_name='$supplier' WHERE id_type='$id'");

if($query){
    echo '<script>
    $(document).ready(function(){
        setTimeout(function() {
            swal({
                title: "Good Job!",
                text: "Edited Successfully!",
                type: "success"
            }, function() {
                window.location = "../material_type.php";
            });
        }, 1000);
    });
   </script>';
}else{
    echo $koneksi->error;
}

?>