<?php
session_start();
include "connection.php";

if(!isset($_SESSION["loginStart"])){
    header("Location: index.php");
    exit;
}

if (isset($_POST['tambahMenu'])){
    $namaMenu  = $_POST["namaMenu"];
    $jenisMenu = $_POST["jenisMenu"];
    $hargaMenu = $_POST["hargaMenu"];

    $query = mysqli_query($connect,"INSERT INTO tabel_menu (NAMA_MENU,JENIS,HARGA,DELETE_STATUS) VALUES ('$namaMenu','$jenisMenu','$hargaMenu',0)");
    if($query){
        header("Location: dataMenu.php");
    }else{
        echo " eror". $connect->error;
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
                    <li class="nav-item" role="presentation"><a class="nav-link" href="dataMenu.php"><i class="fas fa-arrow-left border rounded-circle border-secondary" style="padding: 5px;"></i><span style="margin-left: 10px;font-weight: 200;">Kembali</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper" style="background-image: linear-gradient(to bottom, #ebac77, #244d7b);">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top" style="background-color: #244d7b;box-shadow: 0 10px 99px rgba(0,0,0,0.5);">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation"></li>
                            <li class="nav-item dropdown no-arrow" role="presentation"></li>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow" style="margin-right: 30px;">
                                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                        <h1 style="color: rgb(255,255,255);font-size: 16px;margin-top: 10px;margin-right: 10px;">Admin</h1><i class="material-icons" style="color: rgb(255,255,255);">people</i></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
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
                                            <strong>Nama</strong>
                                            <input class="form-control form-control-user" type="text" id="namaMenu" aria-describedby="emailHelp" placeholder="Nama Menu" name="namaMenu" style="border-radius: 2em;max-width: 400px;margin-top: 5px;margin-bottom: 20px;">
                                            <strong>Jenis</strong>
                                            <select name="jenisMenu" class="form-control" style="max-width: 400px">
                                                    <option value="makanan">Makanan</option>
                                                    <option value="minuman">Minuman</option>
                                                </select>
                                                <strong>Harga</strong>
                                                <input class="form-control form-control-user" type="text" id="hargaMenu" aria-describedby="emailHelp" placeholder="0" name="hargaMenu" style="border-radius: 2em;max-width: 400px;margin-top: 5px;">
                                                <div class="form-row">
                                                    <div class="col text-right" style="margin-top: 10px;">
                                                    <button name="tambahMenu" class="btn btn-primary" type="submit" style="border-radius: 1em;background-color: #ebac77;border-color: #ebac77;">
                                                        <i class="fa fa-save" style="margin-right: 9px;"></i>Simpan
                                                    </button>
                                                </div>
                                    </div>
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