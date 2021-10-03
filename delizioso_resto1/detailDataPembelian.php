<?php
session_start();
include "connection.php";

if(!isset($_SESSION["loginStart"])){
    header("Location: index.php");
    exit;
}

$idPelanggan = $_SESSION["idPelanggan"];
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
                        <a class="nav-link" href="dataPembelian.php"><i class="material-icons border rounded-circle border-secondary" style="padding: 5px;">cancel</i>
                        <span style="margin-left: 10px;font-weight: 200;">Cencel</span></a>
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
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid" style="padding-left: 50px;">
                    <div class="card shadow mb-4" style="max-width: 1000px;border-radius: 10px;">
                        <div class="card-body" style="padding: 0;">
                            <div class="row">
                                <div class="col" style="background-color: rgba(36,77,123,0);max-width: 500px;margin-left: 11px;">
                                    <div class="row">
                                        <div class="col" style="background-color: #244d7b;border-radius: 10px 0 0 0;height: 50px;">
                                            <h6 class="text-white font-weight-bold m-0" style="padding-top: 15px;">Data Menu</h6>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr></tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $getDataMenu = mysqli_query($connect,"SELECT * FROM tabel_menu WHERE DELETE_STATUS = 0");
                                                while ($showMenu = mysqli_fetch_array($getDataMenu)) {
                                                ?>
                                                <tr>
                                                    <td class="text-left">
                                                        <h4 class="text-left text-dark mb-2" style="margin: 10px;">
                                                        <?php echo $showMenu['NAMA_MENU'];?>
                                                        </h4>
                                                        <h1 class="text-left" style="color: rgb(217,161,116);font-size: 30px;font-weight: 700;margin: 10px;">
                                                        <?php echo $showMenu['HARGA']?>
                                                        </h1>
                                                    </td>
                                                    <td class="text-right">
                                                        <h4 class="text-right text-dark mb-2" style="margin: 10px;">
                                                        <?php echo $showMenu['JENIS'];?></h4>
                                                        </h4>
                                                        <a <?php echo "href='inputJumlahPembelian.php?ID_MENU=$showMenu[ID_MENU]'";?> > 
                                                            <i class="fa fa-cart-plus border rounded" style="padding: 5px;background-color: #d9a274;color: rgb(255,255,255);padding-right: 8px;padding-left: 8px;margin: 10px;"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php 
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col" style="background-color: #e4e4e4;border-radius: 0 10px 0 0;max-width: 500px;">
                                    <div class="row">
                                        <div class="col" style="background-color: #244d7b;height: 50px;border-radius: 0 10px 0 0;">
                                            <h6 class="text-white font-weight-bold m-0" style="padding-top: 15px;">Data Pembelian</h6>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                    <td class="text-left">
                                                        <h4 class="text-left text-dark mb-2" style="margin: 10px;font-size: 16px;">Jumlah</h4>
                                                    </td>
                                                    <td class="text-left">
                                                        <h4 class="text-left text-dark mb-2" style="margin: 10px;font-size: 16px;">Nama Menu</h4>
                                                    </td>
                                                    <td class="text-right">
                                                        <h4 class="text-left text-dark mb-2" style="margin: 10px;font-size: 16px;">SubTotal</h4>
                                                    </td>
                                                    <td class="text-right">
                                                        <h4 class="text-left text-dark mb-2" style="margin: 10px;font-size: 16px;">Aksi</h4>
                                                    </td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $queryPesananPembeli = mysqli_query($connect,"SELECT * FROM tabel_pembelian JOIN tabel_menu ON tabel_pembelian.ID_MENU = tabel_menu.ID_MENU WHERE ID_PELANGGAN = '$idPelanggan'");
                                                while($showPesananPembeli = mysqli_fetch_array($queryPesananPembeli)){
                                                ?>
                                                <tr>
                                                    <td class="text-left">
                                                        <h4 class="text-left text-dark mb-2" style="margin: 10px;font-size: 16px;"><?php echo $showPesananPembeli['JUMLAH']?></h4>
                                                    </td>
                                                    <td class="text-left">
                                                        <h4 class="text-left text-dark mb-2" style="margin: 10px;font-size: 16px;"><?php echo $showPesananPembeli['NAMA_MENU']?></h4>
                                                    </td>
                                                    <td class="text-right">
                                                        <h4 class="text-left text-dark mb-2" style="margin: 10px;font-size: 16px;"><?php echo $showPesananPembeli['BAYAR_ITEM']?></h4>
                                                    </td>
                                                    <td class="text-right">
                                                        <a <?php echo "href='delPesananPembeli.php?ID_PESANAN=$showPesananPembeli[ID_PESANAN]'"; ?> >
                                                            <i class="fa fa-trash-o border rounded" style="padding: 5px;background-color: #ff0000;color: rgb(255,255,255);padding-right: 8px;padding-left: 8px;margin: 10px;"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php 
                                                }
                                                ?>
                                            </tbody>
                                        </table>
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
            <a class="d-inline scroll-to-top" style="width: 100px;background-color: rgb(222,166,119);color: rgb(255,255,255);border-radius: 1em;" href="insertTabelNota.php">
                <i class="fa fa-plus"></i><span style="padding-left: 10px;">Nota</span>
            </a>
        </div>
    <script
        src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
        <script src="assets/js/theme.js"></script>
</body>

</html>