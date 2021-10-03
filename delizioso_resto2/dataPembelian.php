<?php
session_start();
include "connection.php";

if(!isset($_SESSION["loginStart"])){
    header("Location: index.php");
    exit;
}


if(!isset($_SESSION["loginStart"])){
    header("Location: index.php");
    exit;
}


if (isset($_POST['btnSend'])){
    $namaPelanggan       = $_POST["namaPelanggan"];
    $noMeja              = $_POST["noMeja"];

    if($namaPelanggan == "" || $noMeja == ""){
        $error = true;
    }else{
        $queryIdPelanggan = mysqli_query($connect,"SELECT MAX(ID_PELANGGAN) FROM tabel_pelanggan");        
        while($newIdPelanggan = mysqli_fetch_array($queryIdPelanggan)){
            $idPelanggan = $newIdPelanggan['MAX(ID_PELANGGAN)'] + 1;
        }
        $queryInsertTblPelanggan = mysqli_query($connect,"INSERT INTO tabel_pelanggan (ID_PELANGGAN,ID_NOTA,NAMA_PELANGGAN,NO_MEJA) 
                                                          VALUES ('$idPelanggan',NULL,'$namaPelanggan',$noMeja)");

        if($queryInsertTblPelanggan){
            $_SESSION["idPelanggan"] = $idPelanggan;
            header('Location:detailDataPembelian.php');
        }else{
            echo " eror". $connect->error;
        }
    }                                                            
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background-image: linear-gradient(to bottom, #244d7b, #244d7b);box-shadow: 0 10px 99px rgba(0,0,0,0.5);">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"><img src="assets/img/Delizioso%20Resto.png" style="width: 140px;"></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="dataPembelian.php"><i class="fas fa-shopping-cart border rounded-circle border-secondary" style="padding: 5px;"></i><span style="margin-left: 10px;font-weight: 200;">Pembelian</span></a>
                        <a class="nav-link" href="dataPengunjung.php"><i class="fas fa-clipboard-list border rounded-circle border-secondary" style="padding: 5px;"></i><span style="margin-left: 10px;font-weight: 200;">Data Pengunjung</span></a>
                        <a class="nav-link" href="dataMenu.php"><i class="material-icons border rounded-circle border-secondary" style="padding: 5px;">restaurant_menu</i><span style="margin-left: 10px;font-weight: 200;">Data Menu</span></a>
                    </li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper" style="background-image: linear-gradient(to bottom, #ebac77, #244d7b);">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top" style="background-color: #244d7b;box-shadow: 0 10px 99px rgba(0,0,0,0.5);">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow" style="margin-right: 30px;">
                                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                        <h1 style="color: rgb(255,255,255);font-size: 16px;margin-top: 10px;margin-right: 10px;">Admin</h1><i class="material-icons" style="color: rgb(255,255,255);">people</i></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                        <a class="dropdown-item" role="presentation" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center" style="background-color: rgb(36,77,123);height: 70px;">
                            <h6 class="text-white font-weight-bold m-0">Tambah Menu</h6>
                        </div>
                        <div class="card-body" style="min-width: 10px;">
                            <div class="container" style="background-color: #ffffff;">
                                <div class="row">
                                    <div class="col">
                                        <form class="user" method="POST">
                                            <strong>Nama Pengunjung</strong>
                                            <input class="form-control form-control-user" type="text" id="namaPelanggan" aria-describedby="emailHelp" placeholder="Nama" name="namaPelanggan" style="border-radius: 2em;max-width: 400px;margin-top: 5px;margin-bottom: 20px;">
                                            <strong>No. Meja</strong>
                                            <input class="form-control form-control-user" type="number" id="noMeja" aria-describedby="emailHelp" placeholder="0" name="noMeja" style="border-radius: 2em;max-width: 400px;margin-top: 5px;">
                                                <div class="form-row">
                                                    <div class="col text-right" style="margin-top: 10px;">
                                                    <button class="btn btn-primary" type="submit" name="btnSend" style="border-radius: 1em;background-color: #ebac77;border-color: #ebac77;"><i class="fa fa-plus" style="margin-right: 9px;"></i>Nota</button></div>
                                                </div>
                                                <?php if(isset($error)){include "erorField.php";}?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © WarVi 2021</span></div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>
</html>