<?php
session_start();
include "connection.php";

if(isset($_POST['register'])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    if($username =="" || $password ==""){
        $error = true;
    }else{
        $result = mysqli_query($connect, "SELECT * FROM tabel_admin WHERE USERNAME = '$username' AND PASSWORD = '$password'");
        if(mysqli_num_rows($result) === 1){
            $_SESSION["loginStart"] = 1;
            header("Location: dataPembelian.php");
        }
        $error = true;
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>restoran ff</title>
    <link rel="stylesheet" href="assets1/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets1/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets1/css/styles.css">
</head>

<body style="background-image: linear-gradient(to bottom, #ebac77, #244d7b);">
    <div class="container" style="background-color: rgba(146,29,29,0);margin-top: 170px;margin-bottom: 150px;">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5" style="border-radius: 2em;box-shadow: 0 10px 99px rgba(0,0,0,0.5);">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="color: rgb(255,255,255);background-size: cover;background-repeat: no-repeat;background-image: url(&quot;assets1/img/photo-1568901346375-23c9450c58cd.jpg&quot;);border-radius: 2em 0 0 2em;">
                                    <div class="text-center"></div>
                                    <div class="text-center p-5">
                                        <div class="text-center">
                                            <h4 class="text-dark mb-4"><img src="assets1/img/Welcome%20to%20Delizioso%20Resto.png" style="height: 90px;"></h4>
                                        </div>
                                    </div>
                                    <div class="text-center"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="text-center p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Admin</h4>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group text-center"><i class="material-icons border rounded-circle" style="padding: 10px;background-color: #244d7b;color: rgb(255,255,255);">person</i></div>
                                        <div class="form-group text-center"><input class="form-control form-control-user" type="text" id="username" aria-describedby="emailHelp" placeholder="Username" name="username" style="border-radius: 2em;"></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="password" id="password" placeholder="Password" name="password" style="border-radius: 2em;"></div>
                                        <button class="btn btn-primary" type="submit" style="text-color:white;  border-radius: 2em;background-color: #ebac77;border-color: #ebac77;" href="dataMenu.php" name="register">Login</button>
                                        <hr>
                                    </form>
                                    <!--alert-->
                                    <?php if(isset($error)):?>
                                    <div class="text-center"><a class="small" style="color: rgb(255,0,0);">Username atau Password Salah</a></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets1/js/jquery.min.js"></script>
    <script src="assets1/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets1/js/theme.js"></script>
</body>

</html>