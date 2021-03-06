<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <title>Login - Praker.in</title>
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

    <div style="margin-top: 100px;">
        <div class="card m-auto" style="width: 400px;">
            <div class="card-body">
                <?php if (isset($_GET['e']) == 'salah') : ?>
                    <div id="alert">
                        <div class="alert alert-danger" role="alert">
                            email atau password salah.
                        </div>
                    </div>
                <?php endif; ?>
                <form action="aksi.php?p=login" method="POST">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" required name="email" class="form-control">
                        <small class="form-text text-muted">pastikan alamat email sudah terdaftar</small>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" required name="pass" class="form-control">
                    </div>
                    <div class="pt-2">
                        <a href="register.php" style="text-decoration: none;">
                            <button type="button" class="btn btn-outline-dark">Buat Akun</button>
                        </a>
                        <button type="submit" class="btn btn-primary float-right">Login</button>
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