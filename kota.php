<?php include_once('koneksi.php') ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <title>Kota - Praker.in</title>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="#kota">Kota</a>
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
            <h1 class="display-4"><b>#Kota</b> Pilihanku</h1>
            <p class="lead">pilih kota yang dekat dengan tempat tinggalmu ya</p>
        </div>
    </div>

    <div class="container" id="kota">
        <?php if (isset($_SESSION['login']) and $_SESSION['pilih'] == 1) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Kamu udah milih tempat prakerin pilihanmu loh, cek di <a href="pilihanku.php" class="alert-link">Pilihanku</a>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['login']) and $_SESSION['akses'] == 1) : ?>
            <!-- Admin -->
            <a href="add/kota.php">
                <button type="button" class="btn btn-primary my-3">+ Tambah Kota</button>
            </a>
        <?php endif; ?>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kota</th>
                    <th scope="col">Perusahaan</th>
                    <th scope="col">Instansi</th>
                    <th scope="col">Peserta</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $x = 1;
                foreach ($conn->query('SELECT * FROM kota ORDER BY nama_kota') as $data) : ?>
                    <tr>
                        <th scope="row"><?= $x++ ?></th>
                        <td><?= $data['nama_kota'] ?></td>
                        <td>
                            <?= $jml_perusahaan = $conn->query("SELECT id FROM perusahaan WHERE kota_id = {$data['id']}")->num_rows ?> tempat
                        </td>
                        <td>
                            <?= $jml_instansi = $conn->query("SELECT id FROM instansi WHERE kota_id = {$data['id']}")->num_rows ?> tempat
                        </td>
                        <td class="text-cnter">
                            -
                        </td>
                        <td>
                            <?php if (empty($_SESSION['login']) or $_SESSION['akses'] != 1) : ?>
                                <div>
                                    <a href="perusahaan.php?k=<?= $data['id'] ?>" style="text-decoration: none;">
                                        <button type="button" class="btn btn-outline-dark">Pilih Perusahaan</button>
                                    </a>
                                    <a href="instansi.php?k=<?= $data['id'] ?>">
                                        <button type="button" class="btn btn-outline-dark">Pilih Instansi</button>
                                    </a>
                                </div>
                            <?php elseif (isset($_SESSION['login']) and $_SESSION['akses'] == 1) : ?>
                                <!-- Admin -->
                                <div style="min-width: 150px;">
                                    <a href="edit/kota.php?id=<?= $data['id'] ?>" style="text-decoration: none;">
                                        <button type="button" class="btn btn-primary">Edit</button>
                                    </a>
                                    <?php if ($jml_perusahaan < 1 and $jml_instansi < 1) : ?>
                                        <a href="aksi.php?p=hapus-kota&id=<?= $data['id'] ?>" onclick="return confirm('Kamu yakin ingin menghapus <?= $data['nama_kota'] ?> ?')">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>
                                    <?php else : ?>
                                        <button type="button" disabled class="btn btn-danger" title="Tidak bisa dihapus">Hapus</button>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.jsbootstrap.min.js"></script>
</body>

</html>