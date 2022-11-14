-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Nov 2022 pada 13.32
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_luxury`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_client`
--

CREATE TABLE `tb_client` (
  `id` int(11) NOT NULL,
  `logo_client` varchar(50) NOT NULL,
  `nama_client` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_client`
--

INSERT INTO `tb_client` (`id`, `logo_client`, `nama_client`) VALUES
(19, 'BNN.png', 'BNN'),
(21, 'Garuda.png', 'Garuda'),
(22, 'Polda.png', 'Polda'),
(23, 'Indihome.png', 'Indihome'),
(24, 'Toyota.png', 'Toyota'),
(25, 'BRI.png', 'BRI'),
(26, 'Unmul.png', 'Unmul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenisevent`
--

CREATE TABLE `tb_jenisevent` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenisevent`
--

INSERT INTO `tb_jenisevent` (`id`, `gambar`, `kategori`, `deskripsi`, `harga`) VALUES
(10, 'Wedding Party.jpg', 'Wedding Party', 'Wedding Party ini di dukung dengan anggota tim yang kreatif, bersemangat dan berpengalaman. tim kami dengan senang hati selalu membantu anda untuk menghilangkan stress dalam memilih tema pernikahan, tempat terbaik, atau lebih jauh untuk akhirnya memastikan acara yang akan selalu diingat untuk satu moment terindah anda', 25000000),
(11, 'Music Event.jpg', 'Music Event', 'Music Event yang kami jalankan mendapat dukungan besar dari para klien yang telah bekerja sama dengan tim kami. dipastikan seluruh acara akan berjalan dengan meyenangkan dan kami selalu siap dalam segala situasi yang mungkin terjadi', 35000000),
(12, 'Seminar.jpg', 'Seminar', 'Penyelenggara seminar atau workshop membutuhkan kerja tim yang sangat baik demi kelancaran seluruh acara. Tim kami selalu memberikan yang terbaik kepada semua acara serupa yang kami dapatkan, seluruh acara nya pun berjalan lancar sesuai dengan keinginan customer kami', 5000000),
(13, 'Family Gathering.jpg', 'Family Gathering', 'Family Gathering merupakan acara penting untuk menyatukan sebuah keluarga dimana keluarga merupakan segala nya dalam kehidupan. karenanya kami menyediakan pelayanan yang dipastikan akan sepenuhnya mengikuti keinginan customer. ', 1500000),
(14, 'Company Gathering.jpg', 'Company Gathering', 'Company Gathering yang kami sediakan bisa saja diadakan dalam bentuk formal maupun informal atau santai. Karna company gathering bukan saya mencakup meeting pembahasan perusahaan, bisaja gathering yang dimaksud adalah kegiatan bersenang-senang bersama demi mempererat kerja sama antar pekerja. Luxuruy group percaya diri dalam mewujudkan hal tersebut', 3000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `note` text NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id`, `nama_pemesan`, `kategori`, `harga`, `alamat`, `tanggal`, `no_telp`, `note`, `no_rekening`, `bukti_pembayaran`, `status`) VALUES
(8, 'herlan dahsa', 'Wedding Party', '25000000', 'Jl. Hasanudin, Surabaya Jawa Timur', '2022-12-12', '081255193522', 'Acara yang saya pikirkan sekarang itu pesta outdoor dengan tema warna putih yang dikelilingi dengan banyak material kayu', '-', '-', 'Belum Dibayar'),
(9, 'samuel hendra', 'Birthday Party', '2500000', 'Jl. Sempaja, Samarinda Kalimantan TImur', '2023-03-22', '08137822044', 'Acara untuk anak saya yang sangat menyukai harry potter. jadi saya harap tema nya bisa menyesuaikan', '-', '-', 'Belum Dibayar'),
(10, 'samuel hendra', 'Company Gathering', '3000000', 'Kantor BCA, Samarinda Kalimantan Timur', '2022-12-13', '08137822044', 'Kumpul rekan kantor cabang dengan kantor lain jadi butuh acara yang bisa mengakraban dua pihak kantor yang terlibat', '2209217765', 'Bukti Pembayaran.samuel hendra.(id-pemesanan=10).jpg', 'Sudah Dibayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `akun_dibuat` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`, `akun_dibuat`, `alamat`, `email`, `no_telp`, `role`) VALUES
(1, 'dinda', '$2y$10$V.t3hAANaFxWDudtu0dqYuO.U4J.yHqPA/1lmJAqoDB6v9ovms7nW', 'Dinda Nur Afifah', 'Friday, 11-11-22 02:06:47', '-', '-', '0', 'admin'),
(2, 'jerry', '$2y$10$BEWCAXDJ98s3BwE1JEyum.zGfDlcr3WGMEfTJDo1M./udyArKHmQ6', 'Jerry Fitriansyah', 'Friday, 11-11-22 02:07:27', '-', '-', '0', 'admin'),
(3, 'muchlis', '$2y$10$SwqgQDBSr87ii1yoSKHbzefWevZjy1Y/mb0K4DxzFNGrAeVHy6Ooe', 'Muhammad Muchlis Abimanyu', 'Friday, 11-11-22 02:07:57', '-', '-', '0', 'admin'),
(4, 'admin', '$2y$10$WexKPP.FzIEQYc8.GQPAj.ssPamxffyLMMFDpfBf.tpU3se1O.v5C', 'Admin', 'Friday, 11-11-22 02:08:12', '-', '-', '0', 'admin'),
(25, 'customer', '$2y$10$mRrLmVnz7nlpuAmmPWzq2ejUA9OWpS292WH0rXQ28/PW1yqTUFPDW', 'Customer', 'Monday, 14-11-22 08:02:17', 'Jl. Berdua', 'customer@gmail.com', '081234567890', 'customer'),
(29, 'ariels01', '$2y$10$2KwKDm8rAa7WQU9r5G7C0OqTacChNLstcPui3QKLiE3Wfl931Qb.S', 'ariel setia', 'Monday, 14-11-22 08:18:38', 'Jl. Purwokerto, Balikpapan Kalimantan Timur', 'arielset01@gmail.com', '0812445367234', 'customer'),
(30, 'samuell', '$2y$10$gAzdyp9IYk2tjGaCnHLUSen0PvdsOEOzn0MQA.u0b14qheZrpuW7i', 'samuel hendra', 'Monday, 14-11-22 09:42:46', 'Jl. Sempaja, Samarinda Kalimantan TImur', 'samuell@gmail.com', '08137822044', 'customer'),
(31, 'herlandha', '$2y$10$jPBh1bfpiOJialv..RXecuP.wexIaWIC4PIarFNqy27TYH0TFfyh.', 'herlan dahsa', 'Monday, 14-11-22 10:51:12', 'Jl. Hasanudin, Surabaya Jawa Timur', 'herlandha@gmail.com', '081255193522', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_client`
--
ALTER TABLE `tb_client`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_jenisevent`
--
ALTER TABLE `tb_jenisevent`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_client`
--
ALTER TABLE `tb_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tb_jenisevent`
--
ALTER TABLE `tb_jenisevent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
