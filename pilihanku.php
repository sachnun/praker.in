<?php include_once('koneksi.php') ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <title>Pilihanku - Praker.in</title>
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
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kota">Kota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="perusahaan.php">Perusahaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="instansi.php">Instansi</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Pilihanku</a>
                    </li>
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
            <h1 class="display-4">Pilihanku di <b>#Praker.in</b></h1>
            <p class="lead">sudah sesuai dengan pilihanmu? kalau begitu, selamat prakerin ya</p>
        </div>
    </div>

    <?php $data = $conn->query("SELECT * FROM akun WHERE id = {$_SESSION['id']}")->fetch_assoc(); ?>
    <div class="container" id="kota">
        <?php if ($_SESSION['pilih'] == 2) : ?>
            <div class="alert alert-info" role="alert">
                Yey, udah jadi nih, jangan lupa di <b>print</b> ya, lalu tunjukan saat kamu sudah di lokasi perusahaan/instansi tersebut.
            </div>
            <hr>
        <?php endif; ?>
        <div class="row" id="section-to-print">
            <div class="col-3">
                <img src="img/profile/default.jpg" class="img-fluid"><br>
                <?php if ($_SESSION['pilih'] != 2) : ?>
                    <small>*maaf, foto profile belum tersedia.</small>
                <?php endif; ?>
            </div>
            <div class="col">
                <div class="pb-4">
                    <b>Nama</b><br>
                    <span style="font-size: 20px;"><?= $data['nama'] ?></span>
                </div>
                <div class="row pb-4">
                    <div class="col">
                        <b>Sekolah</b><br>
                        <span style="font-size: 20px;"><?= $data['sekolah'] ?></span>
                    </div>
                    <div class="col">
                        <b>Kartu Pelajar</b><br>
                        <span style="font-size: 20px;"><?= $data['kartu_pelajar'] ?></span>
                    </div>
                </div>
                <div class="pb-4">
                    <b>Alamat Tinggal</b><br>
                    <span style="font-size: 20px;"><?= $data['alamat'] ?></span>
                </div>
                <?php
                if ($data['perusahaan'] != null) {
                    $sql = "SELECT * FROM perusahaan WHERE id = {$data['perusahaan']}";
                } else {
                    $sql = "SELECT * FROM instansi WHERE id = {$data['instansi']}";
                }
                $data_pilihan = $conn->query($sql)->fetch_assoc();
                ?>
                <div class="row pb-4">
                    <div class="col">
                        <?php if ($data['perusahaan'] != null) : ?>
                            <b>Perusahaan</b><br>
                            <span style="font-size: 20px;"><?= $data_pilihan['nama_perusahaan'] ?></span>
                        <?php else : ?>
                            <b>Instansi</b><br>
                            <span style="font-size: 20px;"><?= $data_pilihan['nama_instansi'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="col">
                        <b>Bagian</b><br>
                        <span style="font-size: 20px;"><?= $data_pilihan['bagian'] ?></span>
                    </div>
                </div>
                <div class="pb-4">
                    <b>Lokasi</b><br>
                    <span style="font-size: 20px;"><?= $data_pilihan['lokasi'] ?></span>
                </div>
                <div class="pb-2">
                    <b>Nomor Peserta</b><br>
                    <span style="font-size: 20px;color: blue;"><b><?= $data['no_peserta'] ?></b></span>
                </div>
            </div>
        </div>
        <hr>
        <div>
            <?php if ($_SESSION['pilih'] == 2) : ?>
                <style>
                    @media print {
                        body * {
                            visibility: hidden;
                        }

                        #section-to-print,
                        #section-to-print * {
                            visibility: visible;
                        }

                        #section-to-print {
                            position: absolute;
                            left: 0;
                            top: 0;
                        }
                    }
                </style>
                <div class="float-right mb-4">
                    <button type="button" class="btn btn-info" onclick="print();" style="min-width: 80px;">Print</button>
                </div>
            <?php elseif ($_SESSION['pilih'] == 1) : ?>
                <div class="float-right">
                    <a href="aksi.php?p=submit-pilihanku" style="text-decoration: none;" onclick="return confirm('Apakah kamu sudah sangat yakin ini pilihanmu dan dipastikan juga data profile kamu sudah benar?')">
                        <button type="button" class="btn btn-primary">Submit</button>
                    </a>
                    <a href="aksi.php?p=batalkan-pilihanku" onclick="return confirm('Kamu yakin ingin membalkan pilihanmu sekarang ini?')">
                        <button type="button" class="btn btn-secondary">Batalkan</button>
                    </a>
                </div>
                <div class="mb-4">
                    <a href="#" onclick="return alert('maaf ya, kamu belum bisa ubah data untuk saat ini~')">
                        <button type="button" class="btn btn-warning text-white">Ubah data</button>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>