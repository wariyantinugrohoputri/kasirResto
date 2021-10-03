<?php
include "connection.php";
$getIdDel = $_GET['ID_PELANGGAN'];

$queryDelTblNota = mysqli_query($connect,"DELETE FROM tabel_pelanggan WHERE ID_PELANGGAN='$getIdDel'");
if($queryDelTblNota){
    header("Location:dataPengunjung.php");
}else{
    echo " eror". $connect->error;
}
?>