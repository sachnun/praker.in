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
<?php endif; ?>