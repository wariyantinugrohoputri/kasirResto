<?php
    $connect = mysqli_connect('localhost', 'root', '', 'dbCafe');

    if ($connect->connect_error){
        die("koneksi gagal");
    }else{
    //echo "koneksi berhasil";
    } 
?>