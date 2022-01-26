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
    <title>Ana Sayfa</title>
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
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="text w-100">
                                <h2>Hoşgeldiniz.</h2>
                                <p>Lütfen bir işlem seçiniz.</p>
                                <a href="duzenle.php?id=<?php echo $uid ?>"><button class="btn btn-white btn-outline-white">Şirket Profili Düzenle</button></a>
                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">İşlemler</h3>
                                </div>
                            </div>
                            <form action="index.php" class="signin-form">

                                <div class="form-group">
                                    <a href="urungir.php?id=<?php echo $uid ?>" type="button" class="form-control btn btn-primary submit px-3">Ürün Ekle</a>
                                </div>
                                <div class="form-group">
                                    <a href="urunlistele.php?id=<?php echo $uid ?>" type="button" class="form-control btn btn-primary submit px-3">Ürünleri Listele</a>
                                </div>
                                <div class="form-group">
                                    <a href="chart.php?id=<?php echo $uid ?>" type="button" class="form-control btn btn-primary submit px-3">Grafikler</a>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once('dbConnection.php');
        $sirket_bilgi_sor = $db->prepare("SELECT urun_id, miktar from urunler where sirket_id=$uid");
        $sirket_bilgi_sor->execute();

        $urunler = array();

        while ($sirket_bilgi_cek = $sirket_bilgi_sor->fetch(PDO::FETCH_ASSOC)) {

            $urunler[] = $sirket_bilgi_cek;
        }

        $fp = fopen('value_data.json', 'w');
        fwrite($fp, json_encode($urunler));
        fclose($fp);

        ?>
    </section>
    <script src="" async defer></script>
</body>

</html>