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
    <title>Ürün Listele</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    $uid = $_GET['id'];
    ?>
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

                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Ürün Listele</h3>
                                </div>

                            </div>
                            <form action="index.php" class="signin-form" method="POST">
                                <table style="width: 220%" border="2">
                                    <tr>
                                        <th>sıra</th>
                                        <th>ürün id</th>
                                        <th>ürün adı</th>
                                        <th>ürün tipi</th>
                                        <th>miktar</th>

                                    </tr>
                                    <?php
                                    $sirket_bilgi_sor = $db->prepare("SELECT * from urunler where sirket_id=$uid");
                                    $sirket_bilgi_sor->execute();

                                    $say = 0;

                                    while ($sirket_bilgi_cek = $sirket_bilgi_sor->fetch(PDO::FETCH_ASSOC)) {
                                        $say++;
                                    ?>
                                        <tr>
                                            <td><?php echo $say ?></td>
                                            <td><?php echo $sirket_bilgi_cek['urun_id'] ?></td>
                                            <td><?php echo $sirket_bilgi_cek['urun_adi'] ?></td>
                                            <td><?php echo $sirket_bilgi_cek['urun_tipi'] ?></td>
                                            <td><?php echo $sirket_bilgi_cek['miktar'] ?></td>


                                        </tr>

                                    <?php }

                                    ?>
                                    <div class="form-group">
                                        <a href="index.php"><button type="button" class="btn btn-primary" style="padding: 6px;">Geri</button></a>
                                    </div>
                            </form>
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