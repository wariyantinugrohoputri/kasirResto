<?php
session_start();
include "connection.php";

$idPelanggan = $_SESSION["idPelanggan"];

$queryTotalPembelian=mysqli_query($connect,"SELECT SUM(BAYAR_ITEM) FROM tabel_pembelian WHERE ID_PELANGGAN=$idPelanggan");
while($showTotalPembelian=mysqli_fetch_array($queryTotalPembelian)){
    $totalPembelian = $showTotalPembelian['SUM(BAYAR_ITEM)'];
    $_SESSION["totalPembelian"] = $totalPembelian;
}

$queryGetIdNota = mysqli_query($connect,"SELECT MAX(ID_NOTA) FROM tabel_nota");
    while($showIdNota = mysqli_fetch_array($queryGetIdNota)){
        $idNota = $showIdNota['MAX(ID_NOTA)'] + 1;
        $_SESSION["idNota"] = $idNota;
}


$queryInsertTblNota = mysqli_query($connect, "INSERT INTO tabel_nota(ID_NOTA,ID_PELANGGAN,TANGGAL,TOTAL_BAYAR,BAYAR_TUNAI,KEMBALIAN) VALUES ('$idNota','$idPelanggan',NULL,'$totalPembelian',NULL,NULL)");
if($queryInsertTblNota){
    header("Location: detailNotaPembelian.php");
}else{
    echo " eror". $connect->error;
}

?>