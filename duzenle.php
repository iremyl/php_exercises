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
    <title>Düzenle</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h4>Düzenleme</h4>
    <hr>

    <?php
    $sirket_bilgi_sor = $db->prepare("SELECT * from sirket_kayit where id=:idd");
    $sirket_bilgi_sor->execute(array(
        'idd' => $_GET['id']
    ));
    $sirket_bilgi_cek = $sirket_bilgi_sor->fetch(PDO::FETCH_ASSOC);
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

                        </div>
                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Düzenle</h3>
                                </div>

                            </div>
                            <form action="duzenle.php" class="signin-form" method="POST">
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Şirket ID</label>
                                    <input type="number" class="form-control" required="" name="id" value="<?php echo $sirket_bilgi_cek['id'] ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Şifre</label>
                                    <input type="text" class="form-control" required="" name="sifre" value="<?php echo $sirket_bilgi_cek['sifre'] ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Şirket Adı</label>
                                    <input type="text" class="form-control" required="" name="ad" value="<?php echo $sirket_bilgi_cek['ad'] ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Alan</label>
                                    <input type="text" class="form-control" required="" name="alan" value="<?php echo $sirket_bilgi_cek['alan'] ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Email</label>
                                    <input type="email" class="form-control" required="" name="email" value="<?php echo $sirket_bilgi_cek['email'] ?>">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3" name="duzenle">Düzenle</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    if (isset($_POST['duzenle'])) {

        $uid = $_POST['id'];

        $kaydet = $db->prepare("UPDATE sirket_kayit set

            id=:id,
            sifre=:sifre,
            ad=:ad,
            alan=:alan,
            email=:email
            where id = {$_POST['id']}
        ");

        $insert = $kaydet->execute(array(

            'id' => $_POST['id'],
            'sifre' => $_POST['sifre'],
            'ad' => $_POST['ad'],
            'alan' => $_POST['alan'],
            'email' => $_POST['email']
        ));

        if ($insert) { //insert 1 veya 0 oluyor
            //echo "kayıt başarılı"
            echo ("<script>location.href = 'anasayfa.php?id=$uid';</script>");
            exit;
        } else {
            //echo "kayıt başarısız"
            echo ("<script>location.href = 'anasayfa.php?durum=nox';</script>");
            exit;
        }
    }

    ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="sirketsistem.js"></script>

</body>

</html>