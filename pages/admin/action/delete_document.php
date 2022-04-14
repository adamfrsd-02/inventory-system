<?php

include "../../../config/koneksi.php";

$id_document = $_GET['id'];


$query = mysqli_query($koneksi, "DELETE FROM tb_document WHERE id_document='$id_document'");

if($query){
    echo '<script>
    $(document).ready(function(){
        setTimeout(function() {
            swal({
                title: "Good Job!",
                text: "Document Removed Succesfully!",
                type: "success"
            }, function() {
                window.location = "../document_list.php";
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
                text: "Failed !",
                type: "error"
            }, function() {
                window.location = "../document_list.php";
            });
        }, 1000);
    });
   </script>';
}


?>