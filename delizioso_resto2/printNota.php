<?php
session_start();
include "connection.php";

if(!isset($_SESSION["loginStart"])){
    header("Location: index.php");
    exit;
}

$idPelanggan    = $_SESSION['idPelanggan'];
$queryDataPembelian = mysqli_query($connect,"SELECT * FROM tabel_pelanggan JOIN tabel_nota ON tabel_pelanggan.ID_PELANGGAN = tabel_nota.ID_PELANGGAN WHERE tabel_pelanggan.ID_PELANGGAN ='$idPelanggan'");
while($showDataPembelian = mysqli_fetch_array($queryDataPembelian)){
    $totalPembelian = $showDataPembelian["TOTAL_BAYAR"];
    $idNota         = $showDataPembelian['ID_NOTA'];
    $noMeja         = $showDataPembelian['NO_MEJA'];
    $namaPelanggan  = $showDataPembelian['NAMA_PELANGGAN'];
    $tanggal        = $showDataPembelian['TANGGAL'];
    $bayarTunai     = $showDataPembelian['BAYAR_TUNAI'];
    $kembalian      = $showDataPembelian['KEMBALIAN'];
}

if(isset($_POST['sendButton'])){   
    unset($_SESSION['idPelanggan']);
    header('Location:dataPengunjung.php');
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
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper" style="background-image: linear-gradient(to bottom, #ebac77, #244d7b);">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top" style="background-color: #244d7b;box-shadow: 0 10px 99px rgba(0,0,0,0.5);">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation"></li>
                            <li class="nav-item dropdown no-arrow" role="presentation"></li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="card shadow mb-4" style="max-width: 1000px;">
                        <div class="card-body" style="padding: 0;">
                            <div class="row">
                                <div class="col" style="background-color: #244d7b;max-width: 300px;padding-top: 20px;margin-left: 11px;">
                                    <h1 style="font-size: 19px;color: rgb(228,228,228);">Rincian Pesanan</h1>
                                    <h1 style="width: 244px;color: rgb(217,161,116);">Meja :&nbsp;<span><?php echo $noMeja;?></span></h1>
                                    <p style="color: rgb(228,228,228);">Nama :&nbsp;<span><?php echo $namaPelanggan; ?></span>&nbsp;</p>
                                    <p style="color: rgb(228,228,228);margin-top: 16px;font-size: 14px;">Id Pelanggan:&nbsp;<span><?php echo $idPelanggan;?></span>&nbsp;</p>
                                    <p style="color: rgb(228,228,228);font-size: 14px;">Id Nota:&nbsp;<span><?php echo $idNota; ?></span>&nbsp;</p>
                                </div>
                                <div class="col">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th style="width: 40px;">Jumlah</th>
                                                    <th style="width: 300px;">Nama Pesanan</th>
                                                    <th style="width: 300px;">Harga</th>
                                                    <th style="width: 200px;">Total</th>
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
                                                        <h4 class="text-left text-dark mb-2" style="margin: 10px;font-size: 16px;"><?php echo $showPesananPembeli['HARGA']?></h4>
                                                    </td>
                                                    <td class="text-right">
                                                        <h4 class="text-left text-dark mb-2" style="margin: 10px;font-size: 16px;"><?php echo $showPesananPembeli['BAYAR_ITEM']?></h4>
                                                    </td>
                                                </tr>
                                                <?php 
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <form class="text-right user" method="POST">
                                        <div class="form-row text-right" style="margin-top: 20px;">
                                            <div class="col" style="max-width: 530px;">
                                                <div class="form-row">
                                                    <div class="col" style="width: 300px;">
                                                        <h1 class="text-right" style="font-size: 16px;">Total Bayar :</h1>
                                                    </div>
                                                    <div class="col">
                                                        <h1 class="text-left" style="font-size: 16px;">
                                                        <?php echo $totalPembelian; ?>
                                                        </h1>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col" style="width: 300px;">
                                                        <h1 class="text-right" style="font-size: 16px;">Bayar :</h1>
                                                    </div>
                                                    <div class="col">
                                                        <h1 class="text-left" style="font-size: 16px;">
                                                        <?php echo $bayarTunai; ?>
                                                        </h1>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col" style="width: 300px;">
                                                        <h1 class="text-right" style="font-size: 16px;">Kembalian :</h1>
                                                    </div>
                                                    <div class="col">
                                                        <h1 class="text-left" style="font-size: 16px;">
                                                        <?php echo $kembalian; ?>
                                                        </h1>
                                                    </div>
                                                </div>
                                                <div class="form-row" style="margin-top: 5px;">
                                                    <div class="col" style="padding-top: 5px;">
                                                        <h1 class="text-right" style="font-size: 16px;">Tgl : </h1>
                                                    </div>
                                                    <div class="col">
                                                        <h1 class="text-left" style="font-size: 16px; padding-top: 5px;">
                                                        <?php echo $tanggal;?>
                                                        </h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button name="sendButton" class="btn btn-primary" type="submit" style="border-radius: 1em;background-color: #ebac77;border-color: #ebac77;margin-top: 30px;margin-right: 20px;">
                                        <i class="fas fa-times-circle" style="padding: 5px;"></i></i>Kembali
                                        </button>
                                        <hr>
                                    </form>
                                    <?php if(isset($error)){include "erorField.php";}?>
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
    
    <script>
		window.print();
	</script>
</body>

</html>