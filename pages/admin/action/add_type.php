<?php

include "../../../config/koneksi.php";

$type = $_POST["type"];
$own = $_POST["own_type"];
$supplier = $_POST["supplier"];


$query = mysqli_query($koneksi,"INSERT INTO tb_material_type VALUES ('','$type','$own','$supplier')");

if($query){
    echo '<script>
    $(document).ready(function(){
        setTimeout(function() {
            swal({
                title: "Good Job!",
                text: "Material Type Added!",
                type: "success"
            }, function() {
                window.location = "../material_type.php";
            });
        }, 1000);
    });
   </script>';
}else{
    echo $koneksi->err;
}


?>