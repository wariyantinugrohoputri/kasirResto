<?php
session_start();
include "connection.php";

if(!isset($_SESSION["loginStart"])){
    header("Location: index.php");
    exit;
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>DELIZIOSO</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <!--start nav samping-->
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background-image: linear-gradient(to bottom, #244d7b, #244d7b);box-shadow: 0 10px 99px rgba(0,0,0,0.5);">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"><img src="assets/img/Delizioso%20Resto.png" style="width: 140px;"></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="dataPembelian.php"><i class="fas fa-shopping-cart border rounded-circle border-secondary" style="padding: 5px;"></i><span style="margin-left: 10px;font-weight: 200;">Pembelian</span></a>
                        <a class="nav-link active" href="dataPengunjung.php"><i class="fas fa-clipboard-list border rounded-circle border-secondary" style="padding: 5px;"></i><span style="margin-left: 10px;font-weight: 200;">Data Pengunjung</span></a>
                        <a class="nav-link active" href="dataMenu.php"><i class="material-icons border rounded-circle border-secondary" style="padding: 5px;">restaurant_menu</i><span style="margin-left: 10px;font-weight: 200;">Data Menu</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <!--end nav samping-->
        <!--start nav atas-->
        <div class="d-flex flex-column" id="content-wrapper" style="background-image: linear-gradient(to bottom, #ebac77, #244d7b);">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top" style="background-color: #244d7b;box-shadow: 0 10px 99px rgba(0,0,0,0.5);">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation"></li>
                            <li class="nav-item dropdown no-arrow" role="presentation"></li>
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
                <!--end nav atas-->
                <div class="container-fluid">
                    <div class="card shadow mb-4" style="max-width: 1000px;">
                        <div class="card-header d-flex justify-content-between align-items-center" style="background-color: rgb(36,77,123);height: 70px;">
                            <h6 class="text-white font-weight-bold m-0">Data Menu</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--start looping-->
                                        <?php
                                        $getData = mysqli_query($connect,"SELECT * FROM tabel_menu WHERE DELETE_STATUS = 0");
                                        while($show = mysqli_fetch_array($getData)){  
                                        ?>
                                        <tr>
                                            <td>
                                                <h4 class="text-left text-dark mb-2" style="margin: 10px;">
                                                <?php echo $show['NAMA_MENU'];?></h4>
                                                <h1 class="text-left" style="color: rgb(217,161,116);font-size: 30px;font-weight: 700;margin: 10px;">
                                                <?php echo $show['HARGA'];?></h1>
                                            </td>
                                            <td class="text-right">
                                                <h4 class="text-right text-dark mb-2" style="margin: 10px;">
                                                <?php echo $show['JENIS'];?></h4>
                                                <!--button-->
                                               <a <?php echo "href='editMenu.php?ID_MENU=$show[ID_MENU]'"; ?> > <i class="fa fa-edit border rounded" style="padding: 5px;background-color: #0ce015;color: rgb(255,255,255);padding-left: 8px;margin: 10px;"></i></a>
                                               <a <?php echo "href='deleteProcess.php?ID_MENU=$show[ID_MENU]'"; ?> class="fa fa-trash-o border rounded" style="padding: 5px;background-color: #ff0000;color: rgb(255,255,255);padding-right: 8px;padding-left: 8px;margin: 10px;"></a>
                                            </td>
                                        </tr>
                                        <?php 
                                        } 
                                        ?>
                                        <!--end looping-->
                                    </tbody>
                                </table>
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
        </div><a href="tambahMenu.php" class="d-inline scroll-to-top" style="width: 170px;background-color: rgb(222,166,119);color: rgb(255,255,255);border-radius: 1em;"><i class="fa fa-plus"></i><span style="padding-left: 10px;">Tambah Menu</span></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
