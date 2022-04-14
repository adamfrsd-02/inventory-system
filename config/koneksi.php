<?php

//koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_rohs";

//koneksi ke database
$koneksi = mysqli_connect($host, $user, $pass, $db);

//cek koneksi
if(mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
