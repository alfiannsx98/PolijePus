-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2020 at 08:53 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_skripsi`
--

CREATE TABLE `jenis_skripsi` (
  `id_jns_skripsi` int(11) NOT NULL,
  `nama_jns_skripsi` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(2, 'makanan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_koleksi`
--

CREATE TABLE `kategori_koleksi` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_koleksi`
--

INSERT INTO `kategori_koleksi` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Skripsi'),
(3, 'Tugas Akhir');

-- --------------------------------------------------------

--
-- Table structure for table `koleksi`
--

CREATE TABLE `koleksi` (
  `id_koleksi` varchar(20) NOT NULL,
  `judul` varchar(64) NOT NULL,
  `nim` varchar(15) DEFAULT NULL,
  `isbn` varchar(15) DEFAULT NULL,
  `penerbit` varchar(20) DEFAULT NULL,
  `penulis` varchar(32) NOT NULL,
  `tahun_terbit` varchar(12) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `koleksi`
--

INSERT INTO `koleksi` (`id_koleksi`, `judul`, `nim`, `isbn`, `penerbit`, `penulis`, `tahun_terbit`, `nama_kategori`) VALUES
('KL1303010', '', NULL, NULL, NULL, '', '', ''),
('KL130302', 'Penggunaan WEB Apps dengan NODE JS', 'E42139029', NULL, NULL, 'Junandi Efendi', '2017', 'Skripsi'),
('KL130303', 'Pengaruh AI dalam perekmbangan bisnis', 'E94820912', NULL, NULL, 'Ruly Dwi', '2009', 'Skripsi'),
('KL130304', 'Proses dalam penerapan laravel didalam project menengah hingga b', 'E82932221', NULL, NULL, 'Prakoso Ardi', '2010', 'Skripsi'),
('KL130305', 'Buku tentang TI DASAR!', NULL, '89283208820', 'PT. Cemara Buku', 'Mona Dona', '2015', 'Buku Bacaan'),
('KL130306', 'Pembuatan SIM Manajemen', 'E83212093', NULL, NULL, 'Deni Pandawa', '2016', 'Skripsi'),
('KL130307', '', NULL, NULL, NULL, '', '', ''),
('KL130308', '', NULL, NULL, NULL, '', '', ''),
('KL130309', '', NULL, NULL, NULL, '', '', ''),
('KL1303182', 'aa', 's', 'sd', 'aaa', 'asv', 'test2', 'teste3'),
('KL1303183', 'as', 'af', 'sda', 'sad', 'test1', 'test2', 'teste4'),
('KL1303184', 'ad', 'af', 'asdsad', 'asd', 'test1', 'test2', 'teste5'),
('KL13032110', '', NULL, NULL, NULL, '', '', ''),
('KL1303212', 'Penggunaan WEB Apps dengan NODE JS', 'E42139029', NULL, NULL, 'Junandi Efendi', '2017', 'Skripsi'),
('KL1303213', 'Pengaruh AI dalam perekmbangan bisnis', 'E94820912', NULL, NULL, 'Ruly Dwi', '2009', 'Skripsi'),
('KL1303214', 'Proses dalam penerapan laravel didalam project menengah hingga b', 'E82932221', NULL, NULL, 'Prakoso Ardi', '2010', 'Skripsi'),
('KL1303215', 'Buku tentang TI DASAR!', NULL, '89283208820', 'PT. Cemara Buku', 'Mona Dona', '2015', 'Buku Bacaan'),
('KL1303216', 'Pembuatan SIM Manajemen', 'E83212093', NULL, NULL, 'Deni Pandawa', '2016', 'Skripsi'),
('KL1303217', '', NULL, NULL, NULL, '', '', ''),
('KL1303218', '', NULL, NULL, NULL, '', '', ''),
('KL1303219', '', NULL, NULL, NULL, '', '', ''),
('KL1303910', '', NULL, NULL, NULL, '', '', ''),
('KL130392', 'Penggunaan WEB Apps dengan NODE JS', 'E42139029', NULL, NULL, 'Junandi Efendi', '2017', 'Skripsi'),
('KL130393', 'Pengaruh AI dalam perekmbangan bisnis', 'E94820912', NULL, NULL, 'Ruly Dwi', '2009', 'Skripsi'),
('KL130394', 'Proses dalam penerapan laravel didalam project menengah hingga b', 'E82932221', NULL, NULL, 'Prakoso Ardi', '2010', 'Skripsi'),
('KL130395', 'Buku tentang TI DASAR!', NULL, '89283208820', 'PT. Cemara Buku', 'Mona Dona', '2015', 'Buku Bacaan'),
('KL130396', 'Pembuatan SIM Manajemen', 'E83212093', NULL, NULL, 'Deni Pandawa', '2016', 'Skripsi'),
('KL130397', '', NULL, NULL, NULL, '', '', ''),
('KL130398', '', NULL, NULL, NULL, '', '', ''),
('KL130399', '', NULL, NULL, NULL, '', '', ''),
('KL1803302', 'aa', 's', 'sd', 'aaa', 'asv', 'test2', 'teste3'),
('KL1803303', 'as', 'af', 'sda', 'sad', 'test1', 'test2', 'teste4'),
('KL1803304', 'ad', 'af', 'asdsad', 'asd', 'test1', 'test2', 'teste5'),
('KL2303332', 'aa', 's', 'sd', 'aaa', 'asv', 'test2', 'teste3'),
('KL2303333', 'as', 'af', 'sda', 'sad', 'test1', 'test2', 'teste4'),
('KL2303334', 'ad', 'af', 'asdsad', 'asd', 'test1', 'test2', 'teste5'),
('KL2803362', 'aa', 's', 'sd', 'aaa', 'asv', 'test2', 'teste3'),
('KL2803363', 'as', 'af', 'sda', 'sad', 'test1', 'test2', 'teste4'),
('KL2803364', 'ad', 'af', 'asdsad', 'asd', 'test1', 'test2', 'teste5');

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id_kjn` varchar(10) NOT NULL,
  `tgl` datetime NOT NULL,
  `nama_kjn` varchar(50) NOT NULL,
  `nim_nip` varchar(20) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `status` varchar(20) NOT NULL,
  `prodi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`id_kjn`, `tgl`, `nama_kjn`, `nim_nip`, `jk`, `status`, `prodi`) VALUES
('KJN0001', '0000-00-00 00:00:00', 'Aku', '23456', 'Perempuan', 'Mahasiswa', 'TKK'),
('KJN0002', '0000-00-00 00:00:00', 'Saya', 'E41181765', 'Perempuan', 'Mahasiswa', 'TKK'),
('KJN0003', '2020-03-27 12:33:19', 'Mustika', 'E41181630', 'Perempuan', 'Mahasiswa', 'TIF'),
('KJN0004', '2020-03-27 12:45:42', 'Saya', 'E41181765', 'Perempuan', 'Teknisi', 'on'),
('KJN0005', '2020-03-27 12:47:17', 'Aku', 'E41181630', 'Perempuan', 'Umum', 'Bukan Mahasiswa TI'),
('KJN0006', '2020-03-27 12:50:53', 'Saya', 'E41181765', 'Perempuan', 'Mahasiswa', 'MIF'),
('KJN0007', '2020-03-27 01:50:26', 'Ikhsan Munir', 'E41181754', 'Laki-Laki', 'Umum', 'Bukan Mahasiswa TI');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `judul` varchar(24) NOT NULL,
  `isi` varchar(128) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` int(24) NOT NULL,
  `slug` varchar(16) NOT NULL,
  `gambar` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `judul`, `isi`, `id_kategori`, `id_user`, `tanggal`, `slug`, `gambar`) VALUES
(1, 'as', 'ok', 2, 1, 1583770290, 'sLD5ONN3qF0=', '4hVHDzO.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `skripsi`
--

CREATE TABLE `skripsi` (
  `nim` varchar(11) NOT NULL,
  `judul` varchar(32) NOT NULL,
  `abstrak` varchar(500) NOT NULL,
  `keywords` varchar(32) NOT NULL,
  `id_jns` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tgs_akhir`
--

CREATE TABLE `tgs_akhir` (
  `nim` varchar(11) NOT NULL,
  `judul` varchar(32) NOT NULL,
  `abstrak` varchar(500) NOT NULL,
  `keywords` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Alfian Rochmatul Irman', 'alfianrochmatul77@gmail.com', 'IMG-20190926-WA0037.jpg', '$2y$10$xKVgXFPVVyjeEYdM1hfUGO3K1vU8WYvk9r6XCKx9nX24GZXli4UB.', 1, 1, 1583394165),
(2, 'didin', 'didin02@gmail.com', 'default.jpg', '$2y$10$512YbT.iM3cnQoriwNXTKuueRC4ClTrjP7Gn40OkNW6i2lkT8k7PC', 1, 1, 1583483413),
(3, 'fahrulirsyadf', 'fahrulirsyad@gmail.com', 'default.jpg', '$2y$10$KlObss8cTAFWGlPzXNGhreUoLUympmJRRS4DTRmg6o7.ymKmfdABm', 1, 1, 1583748176);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(4, 1, 3),
(8, 1, 6),
(9, 2, 2),
(10, 2, 3),
(11, 2, 5),
(12, 2, 6),
(13, 1, 5),
(14, 1, 2),
(15, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'User'),
(3, 'Menu'),
(5, 'koleksi');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(2, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(3, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(4, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(5, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(6, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Ganti Password', 'user/edit_password', 'fas fa-fw fa-key', 1),
(11, 5, 'Koleksi', 'koleksi', 'fas fa-fw fa-book', 1),
(12, 5, 'Kategori Koleksi', 'koleksi/kategori_koleksi', 'fas fa-fw fa-th-list', 1),
(13, 6, 'Arsip', 'arsip', 'fas fa-fw fa-folder-open', 1),
(14, 6, 'Jenis Arsip', 'arsip/jenis', 'fas fa-fw fa-list', 1),
(15, 3, 'Daftar Kunjungan', 'kunjungan', 'fas fa-fw fa-folder-open', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `email` varchar(128) NOT NULL,
  `token` int(50) NOT NULL,
  `date_created` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`email`, `token`, `date_created`) VALUES
('didin02@gmail.com', 0, 1583483413),
('fahrulirsyad@gmail.com', 0, 1583748176),
('fahrulirsyad@gmail.com', 0, 1583756790),
('didin02@gmail.com', 0, 1583483413),
('alfianrochmatul77@gmail.com', 1, 1584254459),
('alfianrochmatul77@gmail.com', 0, 1584254853),
('alfianrochmatul77@gmail.com', 0, 1584254953),
('alfianrochmatul77@gmail.com', 0, 1584255184),
('alfianrochmatul77@gmail.com', 0, 1584255226),
('alfianrochmatul77@gmail.com', 0, 1584255247),
('alfianrochmatul77@gmail.com', 9, 1584255442),
('alfianrochmatul77@gmail.com', 0, 1584942665);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_skripsi`
--
ALTER TABLE `jenis_skripsi`
  ADD PRIMARY KEY (`id_jns_skripsi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_koleksi`
--
ALTER TABLE `kategori_koleksi`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `koleksi`
--
ALTER TABLE `koleksi`
  ADD PRIMARY KEY (`id_koleksi`);

--
-- Indexes for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id_kjn`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tgs_akhir`
--
ALTER TABLE `tgs_akhir`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_skripsi`
--
ALTER TABLE `jenis_skripsi`
  MODIFY `id_jns_skripsi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_koleksi`
--
ALTER TABLE `kategori_koleksi`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
