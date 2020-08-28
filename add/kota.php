<?php include_once('../koneksi.php') ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">

    <title>Tambah Kota - Praker.in</title>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <img src="../img/logo-p.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                Praker.in
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <span class="navbar-text">
                        Hi,
                        <?php if ($_SESSION['akses'] == 1) : ?>
                            <span class="badge badge-secondary">Admin</span>
                        <?php endif; ?>
                        <?= $_SESSION['nama'] ?>.
                    </span>
                    <li class="nav-item">
                        <a class="nav-link" href="aksi.php?p=logout">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container pt-4">
        <div class="row">
            <div class="col-8">
                <h1 class="mb-4">Tambahkan Kota</h1>
                <form action="../aksi.php?p=add-kota" method="POST" onsubmit="return confirm('Sudah yakin ingin menambahkan data ini?')">
                    <div class="form-group">
                        <label>Nama Kota</label>
                        <input type="text" name="nama_kota" required class="form-control" placeholder="contoh, Kota Serang">
                        <!-- <small class="form-text text-muted"></small> -->
                    </div>
                    <a href="../kota.php" style="text-decoration: none;">
                        <button type="button" class="btn btn-dark">Batalkan</button>
                    </a>
                    <div class="float-right">
                        <input type="reset" value="Reset" class="btn btn-danger">
                        <input type="submit" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="col-4">col-4</div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>