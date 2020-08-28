<?php include_once('koneksi.php') ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <title>Praker.in</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo-p.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                Praker.in
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kota.php">Kota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="perusahaan.php">Perusahaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="instansi.php">Instansi</a>
                    </li>
                    <?php if (isset($_SESSION['login']) and $_SESSION['akses'] != 1 and $_SESSION['pilih'] == true) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="pilihanku.php">Pilihanku</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php include('navbar-user.php') ?>
                </ul>
            </div>
        </div>
    </nav>

    <style>
        .mirai-jumbotron {
            background-image: url('img/kuriyama.png');
            background-position: right;
            background-size: 500px auto;
            background-repeat: no-repeat;
            /* filter: grayscale(100%); */
        }
    </style>
    <div class="jumbotron jumbotron-fluid mirai-jumbotron">
        <div class="container">
            <h1 class="display-4">#DiPrakerinAja</h1>
            <p class="lead">Layanan untuk para pencari tempat prakerin yang sering ditolak</p>
        </div>
    </div>

    <div class="container text-center">
        <div class="row">
            <div class="col-sm">
                <h3>Pilih Kota? bisa!</h3>
                <img src="img/logo-kota.jpg" class="img-fluid" style="height: 160px;">
                <p>kota yang dekat tempat tinggalmu</p>
                <a href="kota.php">
                    <button type="button" class="btn btn-dark">Lihat yuk</button>
                </a>
            </div>
            <div class="col-sm">
                <h3>Pilih Perusahaan? bisa!</h3>
                <img src="img/logo-perusahaan.jpg" class="img-fluid" style="height: 160px;">
                <p>perusahaan yang sesuai jurusanmu</p>
                <a href="perusahaan.php">
                    <button type="button" class="btn btn-dark">Lihat yuk</button>
                </a>
            </div>
            <div class="col-sm">
                <h3>Pilih Instansi? bisa!</h3>
                <img src="img/logo-instansi.jpg" class="img-fluid" style="height: 160px;">
                <p>universitas atau sekolah idamanmu</p>
                <a href="instansi.php">
                    <button type="button" class="btn btn-dark">Lihat yuk</button>
                </a>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>