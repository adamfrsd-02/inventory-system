<?php

include "../../../config/koneksi.php";

$query = mysqli_query($koneksi,"DELETE FROM tb_material WHERE id_material='$_GET[id_material]'");

if($query){
    echo '<script>
    $(document).ready(function(){
        setTimeout(function() {
            swal({
                title: "Good Job!",
                text: "Material Removed!",
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