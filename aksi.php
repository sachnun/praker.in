<?php
include_once('koneksi.php');

//mencegah non-admin untuk menjalankannya
if (empty($_SESSION['login']) and $_SESSION['akses'] !== 1) {
    header("Location: login.php");
}

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
function add_kota($namaKota)
{
    global $conn;

    $sql = "INSERT INTO kota (nama_kota)
        VALUES ('{$namaKota}')";

    if ($conn->query($sql) === true) {
        header("Location: kota.php");
    } else {
        die('terjadi masalah pada sistem saat menambahkan data, coba lagi nanti ya.');
    }
}
function edit_kota($id, $namaKota)
{
    global $conn;

    $sql = "UPDATE kota SET nama_kota = '{$namaKota}', update_at = now() WHERE id = {$id}";

    if ($conn->query($sql) === true) {
        header("Location: kota.php");
    } else {
        die('terjadi masalah pada sistem saat mengubah data, coba lagi nanti ya.');
    }
}
function add_perusahaan($namaPerusahaan, $kotaId, $lokasi, $bagian)
{
    global $conn;

    $sql = "INSERT INTO perusahaan (nama_perusahaan, kota_id, lokasi, bagian)
        VALUES ('{$namaPerusahaan}', {$kotaId}, '{$lokasi}', '{$bagian}')";

    if ($conn->query($sql) === true) {
        header("Location: perusahaan.php");
    } else {
        die('terjadi masalah pada sistem saat menambahkan data, coba lagi nanti ya.');
    }
}
function edit_perusahaan($id, $namaPerusahaan, $kotaId, $lokasi, $bagian)
{
    global $conn;

    $sql = "UPDATE perusahaan SET nama_perusahaan = '{$namaPerusahaan}', kota_id = {$kotaId}, lokasi = '{$lokasi}', bagian = '{$bagian}', update_at = now() WHERE id = {$id}";

    if ($conn->query($sql) === true) {
        header("Location: perusahaan.php");
    } else {
        die('terjadi masalah pada sistem saat mengubah data, coba lagi nanti ya.');
    }
}
function add_instansi($namaInstansi, $kotaId, $jenis, $lokasi, $bagian)
{
    global $conn;

    $sql = "INSERT INTO instansi (nama_instansi, kota_id, jenis, lokasi, bagian)
        VALUES ('{$namaInstansi}', {$kotaId}, '{$jenis}', '{$lokasi}', '{$bagian}')";

    if ($conn->query($sql) === true) {
        header("Location: instansi.php");
    } else {
        die('terjadi masalah pada sistem saat menambahkan, coba lagi nanti ya.');
    }
}
function edit_instansi($id, $namaInstansi, $kotaId, $jenis, $lokasi, $bagian)
{
    global $conn;

    $sql = "UPDATE instansi SET nama_instansi = '{$namaInstansi}', kota_id = {$kotaId}, jenis = '{$jenis}', lokasi = '{$lokasi}', bagian = '{$bagian}', update_at = now() WHERE id = {$id}";

    if ($conn->query($sql) === true) {
        header("Location: instansi.php");
    } else {
        die('terjadi masalah pada sistem saat mengubah data, coba lagi nanti ya.');
    }
}
function hapus_perusahaan($id)
{
    global $conn;

    $sql = "DELETE FROM perusahaan WHERE id = {$id}";

    if ($conn->query($sql) === true) {
        header("Location: perusahaan.php");
    } else {
        die('terjadi masalah pada sistem saat menghapus data, coba lagi nanti ya.');
    }
}
function hapus_instansi($id)
{
    global $conn;

    $sql = "DELETE FROM instansi WHERE id = {$id}";

    if ($conn->query($sql) === true) {
        header("Location: instansi.php");
    } else {
        die('terjadi masalah pada sistem saat menghapus data, coba lagi nanti ya.');
    }
}
function hapus_kota($id)
{
    global $conn;

    $sql = "DELETE FROM kota WHERE id = {$id}";

    if ($conn->query($sql) === true) {
        header("Location: kota.php");
    } else {
        die('terjadi masalah pada sistem saat menghapus data, coba lagi nanti ya.');
    }
}


switch ($_GET['p']) {
    case 'login':
        login($_POST['email'], $_POST['pass']);
        break;
    case 'register':
        register($_POST['nama-lengkap'], $_POST['kartu-pelajar'], $_POST['email'], $_POST['pass'], $_POST['asal-sekolah'], $_POST['alamat']);
        break;
    case 'logout':
        logout();
        break;
    case 'add-kota':
        add_kota($_POST['nama_kota']);
        break;
    case 'edit-kota':
        edit_kota($_POST['id'], $_POST['nama_kota']);
        break;
    case 'add-perusahaan':
        add_perusahaan($_POST['nama_perusahaan'], $_POST['kota_id'], $_POST['lokasi'], $_POST['bagian']);
        break;
    case 'edit-perusahaan':
        edit_perusahaan($_POST['id'], $_POST['nama_perusahaan'], $_POST['kota_id'], $_POST['lokasi'], $_POST['bagian']);
        break;
    case 'add-instansi':
        add_instansi($_POST['nama_instansi'], $_POST['kota_id'], $_POST['jenis'], $_POST['lokasi'], $_POST['bagian']);
        break;
    case 'edit-instansi':
        edit_instansi($_POST['id'], $_POST['nama_instansi'], $_POST['kota_id'], $_POST['jenis'], $_POST['lokasi'], $_POST['bagian']);
        break;
    case 'hapus-kota':
        hapus_kota($_GET['id']);
        break;
    case 'hapus-perusahaan':
        hapus_perusahaan($_GET['id']);
        break;
    case 'hapus-instansi':
        hapus_instansi($_GET['id']);
        break;
    default:
        header('Location: index.php');
        break;
}
