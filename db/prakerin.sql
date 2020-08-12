-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Agu 2020 pada 14.42
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prakerin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `pass` varchar(225) NOT NULL,
  `sekolah` varchar(225) NOT NULL,
  `kartu_pelajar` varchar(225) NOT NULL,
  `alamat` text NOT NULL,
  `perusahaan` int(11) DEFAULT NULL,
  `instansi` int(11) DEFAULT NULL,
  `pilih` tinyint(1) NOT NULL DEFAULT 0,
  `akses` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `nama`, `email`, `pass`, `sekolah`, `kartu_pelajar`, `alamat`, `perusahaan`, `instansi`, `pilih`, `akses`) VALUES
(2, 'Mirai Kuriyama', 'admin@praker.in', '12345', '-', '-', 'mars', NULL, NULL, 0, 1),
(4, 'Ucup', '88999@er0m.ui', '12345', 'SMK Pandeglang 7', '3242323', 'awawdaww', NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi`
--

CREATE TABLE `instansi` (
  `id` int(11) NOT NULL,
  `nama_instansi` varchar(225) NOT NULL,
  `kota_id` int(11) NOT NULL,
  `jenis` varchar(225) NOT NULL,
  `lokasi` text NOT NULL,
  `bagian` varchar(225) NOT NULL,
  `peserta` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `instansi`
--

INSERT INTO `instansi` (`id`, `nama_instansi`, `kota_id`, `jenis`, `lokasi`, `bagian`, `peserta`) VALUES
(0, 'SMK Informatika Kota Serang', 1, 'Sekolah', 'Jl. KH. Amin Jasuta No.15C, Lontarbaru, Kec. Serang, Kota Serang, Banten 42115', 'Tata Usaha', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id` int(11) NOT NULL,
  `nama_kota` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id`, `nama_kota`) VALUES
(1, 'Serang'),
(2, 'Cilegon'),
(3, 'Kabupaten Serang'),
(4, 'Pandeglang'),
(5, 'Tanggerang'),
(6, 'Rangkasbitung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(225) NOT NULL,
  `kota_id` int(11) NOT NULL,
  `lokasi` text NOT NULL,
  `bagian` varchar(225) NOT NULL,
  `peserta` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama_perusahaan`, `kota_id`, `lokasi`, `bagian`, `peserta`) VALUES
(1, 'PT Indah Kiat', 3, 'Jl. Raya Serang - Jkt, Kragilan, Kec. Kragilan, Serang, Banten 42184', 'Pengarsipan', 82),
(2, 'PT. Krakatau Industrial Estate Cilegon', 2, 'Jl. KH. Yasin Beji No.6, Kotabumi, Kec. Purwakarta, Kota Cilegon, Banten 42435', 'Komputer', 0),
(3, 'PT. Siba Surya Cab Cilegon', 2, 'Jl. Ketileng Tim., Sukmajaya, Kec. Jombang, Kota Cilegon, Banten 42416', 'Foto Copy', 522),
(4, 'PT Askrindo KC Serang', 1, 'Jl. Jendral Ahmad Yani No.50, Cipare, Kec. Serang, Kota Serang, Banten 42118', 'Marketing', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `perusahaan` (`perusahaan`),
  ADD KEY `instansi` (`instansi`);

--
-- Indeks untuk tabel `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kota_id` (`kota_id`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kota_id` (`kota_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`perusahaan`) REFERENCES `perusahaan` (`id`),
  ADD CONSTRAINT `akun_ibfk_2` FOREIGN KEY (`instansi`) REFERENCES `instansi` (`id`);

--
-- Ketidakleluasaan untuk tabel `instansi`
--
ALTER TABLE `instansi`
  ADD CONSTRAINT `instansi_ibfk_1` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`id`);

--
-- Ketidakleluasaan untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `perusahaan_ibfk_1` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
