<?php require_once 'dbConnection.php'; ?>
<?php echo $json; ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Grafik</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="./chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="sirketsistem.js"></script>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>

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
                                    <h3 class="mb-4">Ürün Miktarları Grafiği</h3>
                                    <div class="col-md-4">
                                        <div class="card mt-4 mb-4">
                                            <div class="card-header">Bar Chart</div>
                                            <div class="card-body">
                                                <div class="chart-container pie-chart">
                                                    <canvas id="myChart"></canvas>
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

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        //ajax
        const xmlhttp = new XMLHttpRequest();
        const url = 'http://localhost/php_exercises/value_data.json';

        xmlhttp.open('GET', url, true);
        xmlhttp.send();

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const datapoints = JSON.parse(this.responseText);
                //console.log(datapoints);
                const labelsid = datapoints.map(function(index) {
                    return index.urun_id;
                });
                const miktar = datapoints.map(function(index) {
                    return index.miktar;
                });

                // setup 
                const data = {
                    labels: labelsid,
                    datasets: [{
                        label: 'Üretim',
                        data: miktar,
                        backgroundColor: [
                            'rgba(255, 26, 104, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(0, 0, 0, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 26, 104, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(0, 0, 0, 1)'
                        ],
                        borderWidth: 1
                    }]
                };

                // config 
                const config = {
                    type: 'bar',
                    data,
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                };

                // render init block
                const myChart = new Chart(
                    document.getElementById('myChart'),
                    config
                );


            }
        }
    </script>
</body>

</html>