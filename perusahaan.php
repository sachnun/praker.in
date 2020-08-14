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

    <div class="container">
        <?php if (empty($_SESSION['login'])) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Kamu perlu <a href="login.php" class="alert-link">Login</a> atau <a href="register.php" class="alert-link">Daftar</a> untuk bisa memilihnya.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
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
            <a href="add/perusahaan.php">
                <button type="button" class="btn btn-primary my-3">+ Tambah Perusahaan</button>
            </a>
        <?php endif; ?>
        <table class="table table-borderless table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Perusahaan</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Bagian</th>
                    <th scope="col">Peserta</th>
                    <?php if (isset($_SESSION['login']) and $_SESSION['pilih'] == false) : ?>
                        <th scope="col" style="min-width: 200px;"></th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['k'])) {
                    $sql = "SELECT * FROM perusahaan WHERE kota_id = {$_GET['k']} ORDER BY nama_perusahaan";
                } else {
                    $sql = "SELECT * FROM perusahaan ORDER BY nama_perusahaan";
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
                        <td><?= $peserta = $conn->query("SELECT id FROM akun WHERE perusahaan = {$data['id']} AND pilih = 1")->num_rows ?></td>
                        <td>
                            <?php if (isset($_SESSION['login']) and $_SESSION['akses'] != 1 and $_SESSION['pilih'] == false) : ?>
                                <div>
                                    <a href="#" style="text-decoration: none;" onclick="return alert('maaf nih, masih belum bisa bergabung dulu ya~')">
                                        <button type="button" class="btn btn-success">Gabung yuk</button>
                                    </a>
                                </div>
                            <?php elseif (isset($_SESSION['login']) and $_SESSION['akses'] == 1) : ?>
                                <!-- Admin -->
                                <div style="min-width: 150px;">
                                    <a href="edit/perusahaan.php?id=<?= $data['id'] ?>" style="text-decoration: none;">
                                        <button type="button" class="btn btn-primary">Edit</button>
                                    </a>
                                    <?php if ($peserta < 1) : ?>
                                        <button type="button" class="btn btn-danger">Hapus</button>
                                    <?php else : ?>
                                        <button type="button" disabled class="btn btn-danger" title="Tidak dapat dihapus">Hapus</button>
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