-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2019 at 05:59 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ciperpus306`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(10) UNSIGNED NOT NULL,
  `kode_buku` varchar(10) NOT NULL,
  `id_judul` int(10) UNSIGNED NOT NULL,
  `is_ada` enum('y','n') NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `kode_buku`, `id_judul`, `is_ada`) VALUES
(1, 'MRPM-01', 49, 'y'),
(2, 'BWSK-01', 50, 'y'),
(3, 'BWSK-02', 50, 'y'),
(4, 'AMSN-01', 51, 'y'),
(5, 'BONE-01', 89, 'y'),
(6, 'CARR-01', 88, 'y'),
(7, 'ANNAII-01', 87, 'y'),
(8, 'ANNAI-01', 86, 'y'),
(9, 'JACKAL-01', 85, 'y'),
(10, 'GODF-01', 84, 'y'),
(11, 'ALCHE-01', 83, 'y'),
(12, 'HEMING-01', 82, 'y'),
(13, 'EDEN-01', 81, 'y'),
(14, 'PEM-01', 80, 'y'),
(15, 'KOPI-01', 79, 'y'),
(16, 'RABI-01', 78, 'y'),
(17, 'INTI-01', 77, 'y'),
(18, 'MEGABI-01', 76, 'y'),
(19, 'MANBI-01', 75, 'y'),
(20, 'CESBI-01', 74, 'y'),
(21, 'KAMBI-01', 73, 'y'),
(22, 'FUMBI-01', 72, 'y'),
(23, 'POCMAT-01', 70, 'y'),
(24, 'JENFIS-01', 69, 'y'),
(25, 'OLIMFIS-01', 68, 'y'),
(26, 'CCPF-01', 67, 'y'),
(27, 'PRAKFIS-01', 66, 'y'),
(28, 'SMARFIS-01', 65, 'y'),
(29, 'SMAT-01', 64, 'y'),
(30, 'JAWMAT-01', 63, 'y'),
(31, 'JAGMAT-01', 62, 'y'),
(32, 'CCMAT-01', 60, 'y'),
(33, 'MEGAMAT-01', 59, 'y'),
(34, 'EXC-01', 54, 'y'),
(35, 'ZEXC-01', 55, 'y'),
(36, 'POWEXC-01', 56, 'y'),
(37, 'SERUMAT-01', 57, 'y'),
(38, 'SUPMAT-01', 58, 'y'),
(39, 'SERNUX-01', 52, 'y'),
(40, 'WORD-01', 53, 'y'),
(41, 'FRACI-01', 47, 'y'),
(42, 'FRACI-02', 47, 'y'),
(43, 'MUSH-01', 90, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id_pinjam` int(10) UNSIGNED NOT NULL,
  `jumlah` int(10) UNSIGNED NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `is_dibayar` enum('y','n') NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id` int(10) UNSIGNED NOT NULL,
  `kd_gejala` varchar(3) NOT NULL,
  `nama_gejala` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id`, `kd_gejala`, `nama_gejala`) VALUES
(1, 'G01', 'Material hitam pekat'),
(2, 'G02', 'Material berdebu tebal'),
(3, 'G03', 'Material berdebu tipis'),
(4, 'G04', 'Suhu terlalu panas'),
(5, 'G05', 'Level chemical tidak standar'),
(6, 'G06', 'Material kasar');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_ng`
--

CREATE TABLE `jenis_ng` (
  `id` int(10) UNSIGNED NOT NULL,
  `kd_NG` varchar(4) NOT NULL,
  `jenis_NG` varchar(20) NOT NULL,
  `definisi` varchar(255) NOT NULL,
  `solusi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_ng`
--

INSERT INTO `jenis_ng` (`id`, `kd_NG`, `jenis_NG`, `definisi`, `solusi`) VALUES
(1, 'S01', 'Retak', 'material memiliki retakan dikarenakan kualitas bonde masih keras dan kasar', 'tambah waktu bonde.'),
(2, 'S02', 'Dies pecah', 'dies pecah dikarenakan material lebih keras dibandingkan dengan dies.', 'periksa level chemical bonde dan cek kehalusan debu.'),
(3, 'S03', 'Cacat', 'terdapat bagian yang tidak OK dikarenakan material tidak terbonde sempurna.', 'bonde ulang sehingga material OK.'),
(4, 'S04', 'Makikomi', 'makikomi atau retak pada bagian dalam diameter dikarenakan bonde yang tidak merata.', 'pisahkan material yang sudah dipress agar bagian yang memiliki lubang ikut terbonde.'),
(5, 'S05', 'Misrun', 'misrun dikarenakan material yang sudah terbonde terjatuh ke air sehingga debu bonde hilang.', 'bonde ulang material yang terjatuh.');

-- --------------------------------------------------------

--
-- Table structure for table `judul`
--

CREATE TABLE `judul` (
  `id_judul` int(10) UNSIGNED NOT NULL,
  `isbn` varchar(15) NOT NULL DEFAULT '0',
  `judul_buku` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `cover` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `judul`
--

INSERT INTO `judul` (`id_judul`, `isbn`, `judul_buku`, `penulis`, `penerbit`, `cover`) VALUES
(47, '9789791758666', 'Membangun Web Berbasis PHP dengan Framework Codeigniter', 'Awan Pribadi Basuki', 'Lokomedia', '20160704064527.jpg'),
(49, '9791758603', 'Membongkar Rahasia Para Master PHP', 'Lukmanul Hakim', 'Lokomedia', '20160704064456.jpg'),
(50, '9789791758673', 'Bikin Website Super Keren dengan PHP dan JQquery', 'Lukmanul Hakim', 'Lokomedia', '20160704064424.jpg'),
(51, '9792905626', 'Ayo Memblok Situs Negatif', 'Onno W Purbo', 'Andi Publisher', '20160704064347.jpg'),
(52, '9789792902969', 'Workshop Onno: Panduan Mudah Merakit Menginstall Server Linux', 'Onno W Purbo', 'Andi Publisher', '20160704064247.jpg'),
(53, '9786020260006', 'Word 2013 Panduan Karya Tulis Ilmiah', 'Kristian Agung Prasetyo', 'Elex Media Komputindo', '20160704064224.jpg'),
(54, '9786020261430', 'Step by Step Excel 2013 Tanpa Guru', 'Arista Prasetyo Adi', 'Elex Media Komputindo', '20160704064205.jpg'),
(55, '9792947205', 'From Zero to Advance Macro Excel 2013', 'Wahana Komputer', 'Andi Publisher', '20160704064145.jpg'),
(56, '9786020261799', '125+ PowerTips untuk Excel 2007, 2010 & 2013', 'Christopher Lee', 'Elex Media Komputindo', '20160704064122.jpg'),
(57, '9789793833057', 'Belajar Seru Matematika SMP Kelas XII, VIII, IX', 'Adi Prasetia, S.Si', 'Pustaka Edukasia', '20160704064106.jpg'),
(58, '9786023080212', 'Rumus Super Matematika SMP/MTs Kelas 7, 8, 9 Resep Manjur Lulus Ujian', 'Tim Dian Cipta', 'Prima Ufuk', '20160704064005.jpg'),
(59, '9786021609712', 'Fresh Update Mega Bank Soal Matematika SMP Kelas 1, 2, 3', 'Tim Guru Eduka', 'CMedia', '20160704063941.jpg'),
(60, '9797752402', 'Cara Cepat & Mudah Taklukkan Matematika SMP', 'M. Alvianto S.Si', 'Indonesia Tera', '20160704063920.jpg'),
(62, '9789792942163', 'Jago Matematika SMP Kelas 7, 8, 9', 'TMBooks', 'Andi Publisher', '20160704063717.jpg'),
(63, '9789790830950', 'Jawara (Jadi Siswa Juara) Matematika Kelas 7, 8, 9 SMP', 'Purie Anggita, S.Si', 'Tangga Pustaka', '20160704063645.jpg'),
(64, '9789790830936', 'Smartdiary: Matematika SMP Kelas 7, 8, 9', 'Wijaya Kurnia Santoso', 'Tangga Pustaka', '20160704063623.jpg'),
(65, '9789797752392', 'Mini Smart Book Fisika SMP Kelas VII, VIII & IX', 'Hendri Hartanto', 'Indonesia Tera', '20160704063553.jpg'),
(66, '9786021137208', 'Buku Praktikum Fisika SMP/Mts Kelas 7, 8, 9', 'Diyono Harun', 'Laskar Aksara', '20160704063530.jpg'),
(67, '9789792942718', 'Cara Cespleng Pintar Fisika SMP Kelas 7, 8, 9', 'Agus Kamaludin', 'Andi Publisher', '20160704063501.jpg'),
(68, '9786021380222', 'Sukses Olimpiade Fisika SMP', 'Rini Khamilatul Ula, S.Pd., M.Si.', 'Dunia Cerdas', '20160704063432.jpg'),
(69, '9786022515142', 'Super Jenius Fisika SMP Kelas VII, VIII, IX', 'Sienta Sasika Novel', 'Grasindo', '20160704063402.jpg'),
(70, '9786021609088', 'Pocket Book: Matematika & Fisika SMP Kelas 1, 2 & 3', 'Tim Math Sains Eduka', 'CMedia', '20160704063339.jpg'),
(72, '9786021609729', 'Fresh Update Mega Bank Soal Bahasa Indonesia SMP Kelas 1, 2 & 3', 'Tim Guru Eduka', 'CMedia', '20160704063217.jpg'),
(73, '9786023040100', 'Kamus Detail Bahasa Indonesia Untuk SMP/MTs Kelas 1, 2 dan 3', 'Siti Nur\'aisyah, A.md', 'Kunci Aksara', '20160704063141.jpg'),
(74, '9789792942637', 'Cara Cespleng Pintar Bahasa Indonesia SMP Kelas 7, 8, 9', 'Agus Kamaludin, Niken Umiyati', 'Andi Publisher', '20160704063112.jpg'),
(75, '9786022416159', 'Mandiri Bahasa Indonesia untuk SMP/MTs VII', 'Tim Bahasa', 'Erlangga', '20160704063025.jpg'),
(76, '9786028596657', 'Mega Bank Soal Bahasa Indonesia SMP Kelas 1, 2 & 3', 'Tim Guru Eduka', 'CMedia', '20160704062854.jpg'),
(77, '9789797751685', 'Intisari Lengkap Bahasa Indonesia Untuk SD, SMP, SMA dan Umum', 'Moh. Kusnadi Wasrie', 'Indonesia Tera', '20160704062829.jpg'),
(78, '9789797751272', 'Rangkuman Bahasa Indonesia Lengkap untuk SD, SMP dan SMA', 'Acep Yonny', 'Indonesia Tera', '20160704062749.jpg'),
(79, '9786028811613', 'Filosofi Kopi: A Cofee Table Book', 'Dewi Dee Lestari', 'Bentang Pustaka', '20160704062723.jpg'),
(80, '9789793062921', 'Sang Pemimpi', 'Andrea Hirata', 'Bentang Pustaka', '20160704062700.jpg'),
(81, '9789791227025', 'Edensor', 'Andrea Hirata', 'Bentang Pustaka', '20160704062614.jpg'),
(82, '9789791684354', 'The Oldman and The Sea', 'Ernest Hemingway', 'Narasi', '20160704062427.jpg'),
(83, '9789792298406', 'The Alchemist', 'Paulo Coelho', 'Gramedia Pustaka Utama', '20160704062357.jpg'),
(84, '9789792286342', 'The Godfather', 'Mario Puzo', 'Gramedia Pustaka Utama', '20160704062328.jpg'),
(85, '9789790243569', 'The Day of The Jackal', 'Frederick Forsyth', 'Serambi', '20160704062306.jpg'),
(86, '9789799100603', 'Anna Karenina I', 'Leo Tolstoi', 'Kepustakaan Populer Gramedia', '20160704062236.jpg'),
(87, '9789799100665', 'Anna Karenina II', 'Leo Tolstoi', 'Kepustakaan Populer Gramedia', '20160704062207.jpg'),
(88, '9789792299519', 'Carrie', 'Stephen King', 'Gramedia Pustaka Utama', '20160704062040.jpg'),
(89, '9789796864379', 'Bag Of Bones', 'Stephen King', 'Gramedia Pustaka Utama', '20160704061649.jpg'),
(90, '9789792288131', 'Musashi', 'Eiji Yoshikawa', 'Gramedia Pustaka Utama', '20160704061536.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(10) UNSIGNED NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `id_siswa` int(10) UNSIGNED NOT NULL,
  `id_buku` int(10) UNSIGNED NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `is_kembali` enum('y','n') NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `relasi`
--

CREATE TABLE `relasi` (
  `id` int(11) NOT NULL,
  `kd_gejala` varchar(4) NOT NULL,
  `kd_NG` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relasi`
--

INSERT INTO `relasi` (`id`, `kd_gejala`, `kd_NG`) VALUES
(1, 'G01', 'S01'),
(2, 'G03', 'S01'),
(3, 'G01', 'S02'),
(4, 'G02', 'S02'),
(5, 'G04', 'S02'),
(6, 'G06', 'S03'),
(7, 'G03', 'S04'),
(8, 'G03', 'S05'),
(9, 'G04', 'S05'),
(10, 'G05', 'S05'),
(11, 'G06', 'S05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('operator','admin') NOT NULL DEFAULT 'operator',
  `is_blokir` enum('y','n') NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level`, `is_blokir`) VALUES
(1, 'administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'n'),
(2, 'awan pribadi', 'awan', 'e19cb7c038c2159012047e8b276bb6a2', 'operator', 'n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD UNIQUE KEY `uq_kode_buku` (`kode_buku`),
  ADD KEY `fk_buku_judul` (`id_judul`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_ng`
--
ALTER TABLE `jenis_ng`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_nisn` (`kd_NG`);

--
-- Indexes for table `judul`
--
ALTER TABLE `judul`
  ADD PRIMARY KEY (`id_judul`),
  ADD UNIQUE KEY `uq_isbn` (`isbn`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `fk_peminjaman_siswa` (`id_siswa`),
  ADD KEY `fk_peminjaman_buku` (`id_buku`);

--
-- Indexes for table `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `uq_username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis_ng`
--
ALTER TABLE `jenis_ng`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `judul`
--
ALTER TABLE `judul`
  MODIFY `id_judul` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fk_buku_judul` FOREIGN KEY (`id_judul`) REFERENCES `judul` (`id_judul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `denda`
--
ALTER TABLE `denda`
  ADD CONSTRAINT `fk_denda_peminjaman` FOREIGN KEY (`id_pinjam`) REFERENCES `peminjaman` (`id_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
