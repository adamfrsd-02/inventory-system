<?php
session_start();

include "../../../config/koneksi.php";

$title = $_POST['title'];

$allowed_ext = array('pdf','docx','doc');
$nama = $_FILES['dokumen']['name'];
$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$ukuran = $_FILES['dokumen']['size'];
$file_tmp = $_FILES['dokumen']['tmp_name'];
$id_user = $_SESSION['id_user'];

if(in_array($ekstensi, $allowed_ext) === true){
    if($ukuran < 1044070){				
        move_uploaded_file($file_tmp, '../document/'.$nama);
        $query = "INSERT INTO tb_document VALUES ('','$id_user', '$title','$nama')";
        $sql = mysqli_query($koneksi, $query);
        if($sql){
            echo '<script>
    $(document).ready(function(){
        setTimeout(function() {
            swal({
                title: "Good Job!",
                text: "Document Added Succesfully!",
                type: "success"
            }, function() {
                window.location = "../document_list.php";
            });
        }, 1000);
    });
   </script>';
        }else{
            // var_dump($_SESSION);
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
    }else{
        echo '<script>
    $(document).ready(function(){
        setTimeout(function() {
            swal({
                title: "An Error Occurred!",
                text: "Files too big, Try Another File !",
                type: "error"
            }, function() {
                window.location = "../document_list.php";
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
                text: "Extension not Allowed !",
                type: "error"
            }, function() {
                window.location = "../document_list.php";
            });
        }, 1000);
    });
   </script>';
}


?>