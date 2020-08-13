<?php include_once('../koneksi.php') ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Edit Kota - Praker.in</title>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <img src="https://www.princetoncarbon.com/wp-content/uploads/2017/05/Logo-P.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
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

    <?php $jumlah = $conn->query("SELECT * FROM perusahaan WHERE kota_id = {$_GET['id']}")->num_rows + $conn->query("SELECT * FROM instansi WHERE kota_id = {$_GET['id']}")->num_rows; ?>
    <?php $data = $conn->query("SELECT * FROM kota WHERE id = {$_GET['id']}")->fetch_assoc(); ?>
    <div class="container pt-4">
        <div class="row">
            <div class="col-8">
                <h1 class="mb-4">Edit Kota</h1>
                <?php if ($jumlah > 0) : ?>
                    <div class="alert alert-warning" role="alert">
                        Sudah terdapat <b><?= $jumlah ?></b> lokasi yang terletak dikota ini, mengubahnya dapat mempengaruhi.
                    </div>
                <?php endif; ?>
                <form action="">
                    <div class="form-group">
                        <label>Nama Kota</label>
                        <input type="text" class="form-control" value="<?= $data['nama_kota'] ?>">
                        <!-- <small class="form-text text-muted"></small> -->
                    </div>
                    <a href="../kota.php" style="text-decoration: none;">
                        <button type="button" class="btn btn-dark">Batalkan</button>
                    </a>
                    <div class="float-right">
                        <input type="reset" disabled value="Reset" class="btn btn-danger">
                        <input type="submit" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="col-4">col-4</div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="../js/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.jsbootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>