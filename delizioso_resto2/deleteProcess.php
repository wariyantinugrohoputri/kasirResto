<?php
include "connection.php";
$getIdDel = $_GET['ID_MENU'];

$query=mysqli_query($connect,"UPDATE tabel_menu SET DELETE_STATUS=1 WHERE ID_MENU=$getIdDel");

if($query){
    header("Location: dataMenu.php");
}else{
    echo " eror". $connect->error;
}

?>