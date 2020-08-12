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
function register($nama, $kartu, $email, $pass, $sekolah, $alamat)
{
    global $conn;

    if ($conn->query("SELECT id FROM akun WHERE email = '{$email}'")->num_rows > 0) {
        header('Location: register.php?e=email');
    } else if ($conn->query("SELECT id FROM akun WHERE kartu_pelajar = '{$kartu}'")->num_rows > 0) {
        header('Location: register.php?e=kartu');
    } else {
        $sql = "INSERT INTO akun (nama, email, pass, sekolah, kartu_pelajar, alamat)
        VALUES ('{$nama}', '{$email}', '{$pass}', '{$sekolah}', '{$kartu}', '{$alamat}')";

        if ($conn->query($sql) === true) {
            login($email, $pass);
        } else {
            die('terjadi masalah pada sistem saat mendaftar, coba lagi nanti ya.');
        }
    }
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
    case 'register':
        $nama = $_POST['nama-lengkap'];
        $kartu = $_POST['kartu-pelajar'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $sekolah = $_POST['asal-sekolah'];
        $alamat = $_POST['alamat'];
        register($nama, $kartu, $email, $pass, $sekolah, $alamat);
        break;
    case 'logout':
        logout();
        break;
    default:
        header('Location: index.php');
        break;
}
