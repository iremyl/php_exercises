<?php require_once 'dbConnection.php'; ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Giriş</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="sirketsistem.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="color-line"></div>
    <!-- 
    <div class="button-container">
        <a href="kayit.php" class="button"><b>Kayıt Ol</b></a>
        <a href="girisyap.php" class="button"><b>Giriş Yap</b></a>
        <a href="listele.php" class="button"><b>Listele</b></a>
    </div> -->
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section"> Şirket Sistem</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="text w-100">
                                <h2>Hoşgeldiniz</h2>
                                <p>Hesabınız yoksa işlem yapmak için kaydolun.</p>
                                <a href="kayit.php" class="btn btn-white btn-outline-white">Kayıt Ol</a>
                                <p>Sistemi Kullanan Şirketler</p>
                                <a href="listele.php" class="btn btn-white btn-outline-white">Şirketleri Listele</a>
                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Giriş</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div>
                            <form action="index.php" class="signin-form" method="POST">
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Şirket ID</label>
                                    <input type="number" class="form-control" placeholder="ID" required name="id">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Şifre</label>
                                    <input type="text" class="form-control" placeholder="Şifre" required name="sifre">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3" name="giris">Giriş Yap</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Beni Hatırla
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#">Şifremi Unuttum</a>
                                    </div>
                                </div>
                            </form>
                            <?php

                            if (isset($_POST['giris'])) {

                                $uid = $_POST['id'];
                                $usifre = $_POST['sifre'];

                                $login = $db->prepare("SELECT * FROM sirket_kayit WHERE id=? AND sifre=?");
                                $login->execute(array($uid, $usifre));
                                if ($login) {
                                    echo ("<script>location.href = 'anasayfa.php?id=$uid';</script>");
                                    exit;
                                } else {

                                    echo ("<script>location.href = 'index.php';</script>");
                                    exit;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="sirketsistem.js"></script>

</body>

</html>