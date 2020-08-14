-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Agu 2020 pada 16.19
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
(4, 'Ucup', '88999@er0m.ui', '12345', 'SMK Pandeglang 7', '3242323', 'awawdaww', 1, NULL, 1, 0),
(5, 'Jidan', 'jidan@waifu.id', '12345', 'SMK Informatika Kota Serang', '973912032', 'Tj. Harapan, Kabupaten Paser, Kalimantan Timur\r\n', NULL, NULL, 0, 0);

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
  `disable` tinyint(1) DEFAULT 0,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `instansi`
--

INSERT INTO `instansi` (`id`, `nama_instansi`, `kota_id`, `jenis`, `lokasi`, `bagian`, `disable`, `create_at`, `update_at`) VALUES
(2, 'SMA PGRI 1 Kota Serang', 7, 'Sekolah', 'Jl. KH Abdul Fatah Hasan No.17 B, Cipare, Kec. Serang, Kota Serang, Banten 42117, Indonesia', 'Tata Usaha', 0, '2020-08-14 21:15:23', '2020-08-14 21:15:23'),
(3, 'SMA Negeri 3 Kota Serang', 7, 'Sekolah', 'Jl. Raya Taktakan No.KM 0.5, Panggungjati, Kec. Taktakan, Kota Serang, Banten 42162, Indonesia', 'Tata Usaha', 0, '2020-08-14 21:15:45', '2020-08-14 21:15:45'),
(4, 'SMA Negeri 5 Kota Serang', 7, 'Sekolah', 'Jl. Ayip Usman No.26, Kaligandu, Kec. Serang, Kota Serang, Banten 42116, Indonesia', 'Tata Usaha', 0, '2020-08-14 21:16:10', '2020-08-14 21:16:10'),
(5, 'SMK Informatika Kota Serang', 7, 'Sekolah', '-', 'Kewirausahaan', 0, '2020-08-14 21:16:44', '2020-08-14 21:16:44'),
(6, 'SMA PGRI 2 Kota Serang', 7, 'Sekolah', 'Jl. KH Abdul Fatah Hasan No.17b, Cipare, Kec. Serang, Kota Serang, Banten 42117, Indonesia', 'Tata Usaha', 0, '2020-08-14 21:17:04', '2020-08-14 21:17:04'),
(7, 'SMA Negeri 1 Ciruas', 3, 'Sekolah', 'Jl. Raya Jkt No.KM.9,5, Citerep, Kec. Ciruas, Serang, Banten 42182, Indonesia', 'Tata Usaha', 0, '2020-08-14 21:17:36', '2020-08-14 21:17:36'),
(8, 'SMA Negeri 1 Kibin', 3, 'Sekolah', 'Jl. Raya Serang Jakarta KM. 20, Mundu, Kibin, Tambak, Kec. Kibin, Serang, Banten 42185, Indonesia', 'Tata Usaha', 0, '2020-08-14 21:17:55', '2020-08-14 21:17:55'),
(9, 'SMA Negeri 1 Bojonegara', 3, 'Sekolah', 'Jl. Kh. A. Bakri, Bojonegara, Cilegon, Kota Cilegon, Banten 42455, Indonesia', 'Tata Usaha', 0, '2020-08-14 21:18:17', '2020-08-14 21:18:17'),
(10, 'SMA Negeri 1 Rangkasbitung', 6, 'Sekolah', 'Jl. Rt Hardiwinangun No.24, Muara Ciujung Tim., Kec. Rangkasbitung, Kabupaten Lebak, Banten 42314, Indonesia', 'Tata Usaha', 0, '2020-08-14 21:18:54', '2020-08-14 21:18:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id` int(11) NOT NULL,
  `nama_kota` varchar(225) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id`, `nama_kota`, `create_at`, `update_at`) VALUES
(2, 'Cilegon', '2020-08-14 20:10:24', '2020-08-14 20:10:24'),
(3, 'Kabupaten Serang', '2020-08-14 20:10:24', '2020-08-14 20:10:24'),
(4, 'Pandeglang', '2020-08-14 20:10:24', '2020-08-14 20:10:24'),
(5, 'Tanggerang', '2020-08-14 20:10:24', '2020-08-14 20:10:24'),
(6, 'Rangkasbitung', '2020-08-14 20:10:24', '2020-08-14 20:10:24'),
(7, 'Serang', '2020-08-14 20:48:26', '2020-08-14 20:48:26');

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
  `disable` tinyint(1) NOT NULL DEFAULT 0,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama_perusahaan`, `kota_id`, `lokasi`, `bagian`, `disable`, `create_at`, `update_at`) VALUES
(1, 'PT Indah Kiat Pulp', 3, 'Jl. Raya Serang - Jkt, Kragilan, Kec. Kragilan, Serang, Banten 42184', 'Pengarsipan', 0, '2020-08-14 18:30:30', '2020-08-14 20:02:16'),
(3, 'PT. Siba Surya Cab Cilegon', 2, 'Jl. Ketileng Tim., Sukmajaya, Kec. Jombang, Kota Cilegon, Banten 42416', 'Foto Copy', 1, '2020-08-14 18:30:30', '2020-08-14 18:30:30'),
(6, 'PT. Taspen (Persero) Cabang Serang', 7, 'Jl. KH Abdul Fatah Hasan No.80, Cipare, Kec. Serang, Kota Serang, Banten 42117, Indonesia', 'IT Komputer', 0, '2020-08-14 21:11:19', '2020-08-14 21:11:19'),
(7, 'PT. Sinar Sosro', 7, 'Jl. K.H. Abdul Hadi No.94, Cipare, Kec. Serang, Kota Serang, Banten 42117, Indonesia', 'IT Komputer', 0, '2020-08-14 21:12:37', '2020-08-14 21:12:37'),
(8, 'PT. Sinar Sosro', 7, 'Jl. K.H. Abdul Hadi No.94, Cipare, Kec. Serang, Kota Serang, Banten 42117, Indonesia', 'Marketing', 0, '2020-08-14 21:13:03', '2020-08-14 21:13:03'),
(9, 'PT. Banten Indah Bersama', 2, 'Komplek Pertokoan Serang Trade Center Blok S No. 08, Jalan Raya Serang - Cilegon, Legok, Drangong, Kec. Taktakan, Kota Serang, Banten 42162, Indonesia', 'Kasir', 0, '2020-08-14 21:14:05', '2020-08-14 21:14:05');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_ibfk_2` FOREIGN KEY (`instansi`) REFERENCES `instansi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `akun_ibfk_3` FOREIGN KEY (`perusahaan`) REFERENCES `perusahaan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
