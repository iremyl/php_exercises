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
    <title>Kayıt Ol</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="sirketsistem.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


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
                                <p>Hesabınız var mı?</p>
                                <a href="index.php" class="btn btn-white btn-outline-white">Giriş Yap</a>
                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Kayıt</h3>
                                </div>

                            </div>
                            <form action="kayit.php" class="signin-form" method="POST">
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Şirket ID</label>
                                    <input type="number" name="id" class="form-control" placeholder="ID" required="">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Şifre</label>
                                    <input type="text" name="sifre" class="form-control" placeholder="Şifre" required="">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Şirket Adı</label>
                                    <input type="text" name="ad" class="form-control" placeholder="Ad" required="">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Alan</label>
                                    <input type="text" name="alan" class="form-control" placeholder="Alan" required="">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3" name="kayit">Kayıt Ol</button>
                                </div>
                            </form>
                            <?php

                            if (isset($_POST['kayit'])) {

                                include 'dbConnection.php';
                                $kaydet = $db->prepare("INSERT into sirket_kayit set

                                    id=:id,
                                    sifre=:sifre,
                                    ad=:ad,
                                    alan=:alan,
                                    email=:email
                                ");

                                $insert = $kaydet->execute(array(

                                    'id' => $_POST['id'],
                                    'sifre' => $_POST['sifre'],
                                    'ad' => $_POST['ad'],
                                    'alan' => $_POST['alan'],
                                    'email' => $_POST['email']
                                ));

                                if ($insert) { //insert 1 veya 0 oluyor
                                    // echo "kayıt başarılı";
                                    echo ("<script>location.href = 'index.php';</script>");
                                    exit;
                                } else {
                                    // echo "kayıt başarısız";
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