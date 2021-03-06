<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <title>Daftar - Praker.in</title>
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
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div style="margin-top: 50px;margin-bottom: 50px;">
        <div class="card m-auto" style="width: 500px;">
            <div class="card-body">
                <div id="alert">
                    <?php if (isset($_GET['e']) and $_GET['e'] == 'kartu') : ?>
                        <div class="alert alert-danger" role="alert">
                            kartu pelajar kamu sudah terdaftar dengan akun lain.
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_GET['e']) and $_GET['e']  == 'email') : ?>
                        <div class="alert alert-danger" role="alert">
                            email sudah pernah digunakan.
                        </div>
                    <?php endif; ?>
                </div>
                <form action="aksi.php?p=register" method="POST">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" required name="nama-lengkap" class="form-control">
                        <small class="form-text text-muted">nama harus sesuai dengan yang ada di kartu keluarga</small>
                    </div>
                    <div class="form-group">
                        <label>Kartu Pelajar</label>
                        <input type="text" required name="kartu-pelajar" class="form-control">
                        <small class="form-text text-muted">isikan id yang tertera di kartu pelajarmu</small>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" required name="email" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Password</label>
                            <input type="password" required name="pass" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Asal Sekolah</label>
                        <input type="text" required name="asal-sekolah" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" required name="alamat" rows="3"></textarea>
                        <small class="form-text text-muted">alamat rumah mu yang sekarang ditinggali</small>
                    </div>
                    <div class="pt-2">
                        <a href="login.php" style="text-decoration: none;">
                            <button type="button" class="btn btn-outline-dark">Login</button>
                        </a>
                        <button type="submit" class="btn btn-primary float-right">Daftar Sekarang</button>
                    </div>
                </form>
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