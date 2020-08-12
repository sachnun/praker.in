<?php include_once('koneksi.php') ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Perusahaan - Praker.in</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="https://www.princetoncarbon.com/wp-content/uploads/2017/05/Logo-P.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
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
                        <a class="nav-link" href="kota.php">Kota</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#perusahaan">Perusahaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="instansi.php">Instansi</a>
                    </li>
                    <?php if (isset($_SESSION['login']) and $_SESSION['akses'] != 1 and $_SESSION['pilih'] = true) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="pilihanku.php">Pilihanku</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if (empty($_SESSION['login'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">
                                Login
                            </a>
                        </li>
                        <span class="navbar-text">
                            atau
                        </span>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">
                                Daftar
                            </a>
                        </li>
                    <?php else : ?>
                        <span class="navbar-text">
                            Hi, <?= $_SESSION['nama'] ?>.
                        </span>
                        <li class="nav-item">
                            <a class="nav-link" href="aksi.php?p=logout">
                                Logout
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <style>
        .mirai-jumbotron {
            background-image: url('https://images6.alphacoders.com/726/thumb-1920-726320.png');
            background-position: right;
            background-size: 500px auto;
            background-repeat: no-repeat;
            /* filter: grayscale(100%); */
        }
    </style>
    <div class="jumbotron jumbotron-fluid mirai-jumbotron">
        <div class="container">
            <h1 class="display-4"><b>#Perusahaan</b> Pilihanku</h1>
            <p class="lead">pilih perusahaan yang sesuai dengan jurusanmu ya</p>
        </div>
    </div>

    <style>
        a {
            text-decoration: none
        }
    </style>
    <div class="container">
        <?php if (empty($_SESSION['login'])) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Kamu perlu <a href="login.php" class="alert-link">Login</a> atau <a href="register.php" class="alert-link">Daftar</a> untuk bisa memilihnya.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['login']) and $_SESSION['akses'] = 1) : ?>
            <!-- Admin -->
            <button type="button" class="btn btn-primary my-3">+ Tambah Kota</button>
        <?php endif; ?>
        <table class="table table-borderless table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Perusahaan</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Bagian</th>
                    <th scope="col">Peserta</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['k'])) {
                    $sql = "SELECT * FROM perusahaan WHERE kota_id = {$_GET['k']}";
                } else {
                    $sql = "SELECT * FROM perusahaan";
                }

                $x = 1;
                foreach ($conn->query($sql) as $data) : ?>
                    <tr>
                        <th scope="row"><?= $x++ ?></th>
                        <td><?= $data['nama_perusahaan'] ?></td>
                        <td>
                            <p><?= $data['lokasi'] ?></p>
                            <a target="_blank" href="https://www.google.com/maps/search/<?= $data['nama_perusahaan'] ?>">
                                <button type="button" class="btn btn-outline-dark btn-sm">Lihat Map</button>
                            </a>

                        </td>
                        <td><?= $data['bagian'] ?></td>
                        <td><?= $data['peserta'] ?> orang</td>
                        <td>
                            <?php if (isset($_SESSION['login']) and $_SESSION['akses'] != 1 and $_SESSION['pilih'] = false) : ?>
                                <div>
                                    <button type="button" class="btn btn-success">Gabung yuk</button>
                                </div>
                            <?php elseif (isset($_SESSION['login']) and $_SESSION['akses'] = 1) : ?>
                                <!-- Admin -->
                                <div style="min-width: 150px;">
                                    <button type="button" class="btn btn-primary">Edit</button>
                                    <button type="button" class="btn btn-danger">Hapus</button>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>