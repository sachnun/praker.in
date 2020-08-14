<?php include_once('../koneksi.php') ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Edit Perusahaan - Praker.in</title>
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

    <?php $data = $conn->query("SELECT * FROM perusahaan WHERE id = {$_GET['id']}")->fetch_assoc(); ?>
    <div class="container pt-4 mb-5">
        <div class="row">
            <div class="col-8">
                <h1 class="mb-4">Edit Perusahaan</h1>
                <?php if ($conn->query("SELECT id FROM akun WHERE perusahaan = {$data['id']} AND pilih = 1")->num_rows > 0) : ?>
                    <div class="alert alert-warning" role="alert">
                        Sudah terdapat peserta yang bergabung, harap berhati-hati dalam mengubahnya.
                    </div>
                <?php endif; ?>
                <form action="../aksi.php?p=edit-perusahaan" method="POST" onsubmit="return confirm('Sudah yakin ingin menambahkan data ini?')">
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan" required class="form-control" value="<?= $data['nama_perusahaan'] ?>">
                        <!-- <small class="form-text text-muted"></small> -->
                    </div>
                    <div class="form-group">
                        <label>Kota</label>
                        <select class="form-control" required name="kota_id">
                            <?php
                            foreach ($conn->query("SELECT * FROM kota") as $kota) :
                                if ($kota['id'] == $data['kota_id']) : ?>
                                    <option value="<?= $kota['id'] ?>" selected><?= $kota['nama_kota'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $kota['id'] ?>"><?= $kota['nama_kota'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <textarea class="form-control" name="lokasi" required name="alamat" rows="3"><?= $data['lokasi'] ?></textarea>
                        <small class=" form-text text-muted">lokasi lengkap perusahaan tempat untuk prakerin</small>
                    </div>
                    <div class="form-group">
                        <label>Bagian</label>
                        <input type="text" name="bagian" required class="form-control" value="<?= $data['bagian'] ?>">
                        <!-- <small class="form-text text-muted"></small> -->
                    </div>
                    <div>
                        <a href="../perusahaan.php" style="text-decoration: none;">
                            <button type="button" class="btn btn-dark">Batalkan</button>
                        </a>
                        <div class="float-right">
                            <input type="reset" disabled value="Reset" class="btn btn-danger">
                            <input type="submit" value="Simpan" class="btn btn-primary">
                        </div>
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
    <script src="../js/bootstrap.min.jsbootstrap.min.js"></script>
</body>

</html>