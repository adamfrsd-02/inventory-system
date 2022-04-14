<?php

include "../../../config/koneksi.php";

$query = mysqli_query($koneksi,"DELETE FROM tb_material_type WHERE id_type='$_GET[id_type]'");

if($query){
    echo '<script>
    $(document).ready(function(){
        setTimeout(function() {
            swal({
                title: "Good Job!",
                text: "Material Removed!",
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