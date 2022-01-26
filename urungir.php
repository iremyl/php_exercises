<?php require_once 'dbConnection.php'; ?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ürün Gir</title>
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
    <?php
    // $sirket_bilgi_sor = $db->prepare("SELECT * from urunler where sirket_id=:idd");
    // $sirket_bilgi_sor->execute(array(
    //     'idd' => $_GET['sirket_id']
    // ));
    // $sirket_bilgi_cek = $sirket_bilgi_sor->fetch(PDO::FETCH_ASSOC);
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
                                <p>Aradığınız burada olabilir.</p>
                                <a href="urunlistele.php?id=<?php echo $uid ?>" class="btn btn-white btn-outline-white">Ürün Listele</a>
                                <a href="grafikgoruntule.php?id=<?php echo $uid ?>" class="btn btn-white btn-outline-white">Grafikler</a>
                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Ürün Bilgileri</h3>
                                </div>

                            </div>
                            <form action="urungir.php" class="signin-form" method="POST">
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Şirket ID</label>
                                    <input type="number" name="sirket_id" class="form-control" placeholder="Şirket ID" required="" value="<?php echo $uid ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Ürün ID</label>
                                    <input type="number" name="urun_id" class="form-control" placeholder="Ürün ID" required="">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Ürün Adı</label>
                                    <input type="text" name="urun_adi" class="form-control" placeholder="Ürün Adı" required="">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Ürün Tipi</label>
                                    <input type="text" name="urun_tipi" class="form-control" placeholder="Ürün Tipi" required="">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Miktar</label>
                                    <input type="text" name="miktar" class="form-control" placeholder="Miktar" required="">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3" name="ekle">Ürünü Ekle</button>
                                </div>
                            </form>
                            <?php

                            if (isset($_POST['ekle'])) {

                                $uid = $_POST['sirket_id'];

                                $kaydet = $db->prepare("INSERT into urunler set

                                sirket_id=:sirket_id,
                                urun_id=:urun_id,
                                urun_adi=:urun_adi,
                                urun_tipi=:urun_tipi,
                                miktar=:miktar
                            ");

                                $insert = $kaydet->execute(array(

                                    'sirket_id' => $_POST['sirket_id'],
                                    'urun_id' => $_POST['urun_id'],
                                    'urun_adi' => $_POST['urun_adi'],
                                    'urun_tipi' => $_POST['urun_tipi'],
                                    'miktar' => $_POST['miktar']
                                ));

                                if ($insert) { //insert 1 veya 0 oluyor
                                    // echo "kayıt başarılı";
                                    echo ("<script>location.href = 'anasayfa.php?id=$uid';</script>");
                                    exit;
                                } else {
                                    echo "kayıt başarısız";

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