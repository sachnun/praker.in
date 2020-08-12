<?php
include_once('koneksi.php');
function login($email, $password)
{
    global $conn;

    if ($conn->query("SELECT id FROM akun WHERE email = '{$email}' AND pass = '{$password}'")->num_rows > 0) {
        $data = $conn->query("SELECT * FROM akun WHERE email = '{$email}'")->fetch_assoc();
        // berhasil login
        $_SESSION['login'] = true;
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['pilih'] = $data['pilih'];
        $_SESSION['akses'] = $data['akses'];
        // die(var_dump($_SESSION));
        header('Location: index.php');
    } else {
        header('Location: login.php?e=salah');
    }
}
function register()
{
}
function logout()
{
    session_destroy();
    header('Location: index.php');
}


switch ($_GET['p']) {
    case 'login':
        login($_POST['email'], $_POST['pass']);
        break;
    case 'logout':
        logout();
        break;
    default:
        header('Location: index.php');
        break;
}
