<?php
include "connection.php";

$idPesanan = $_GET['ID_PESANAN'];

$queryDelPesanan = mysqli_query($connect,"DELETE FROM tabel_pembelian WHERE ID_PESANAN='$idPesanan'");
if($queryDelPesanan){
    header("Location: detailDataPembelian.php");
}else{
    echo " eror". $connect->error;
}


?>