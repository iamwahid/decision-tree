-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 08:33 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbn`
--

-- --------------------------------------------------------

--
-- Table structure for table `dset`
--

CREATE TABLE `dset` (
  `id` int(20) NOT NULL,
  `umur` int(20) DEFAULT NULL,
  `kat_umur` varchar(50) DEFAULT NULL,
  `user_id` int(20) DEFAULT NULL,
  `jumlahayam` int(50) NOT NULL DEFAULT '0',
  `kat_jumlah` varchar(50) DEFAULT NULL,
  `mortalitas` int(11) NOT NULL DEFAULT '0',
  `kat_mortalitas` varchar(50) DEFAULT NULL,
  `berat` int(11) NOT NULL DEFAULT '0',
  `kat_berat` varchar(50) DEFAULT NULL,
  `pakan` decimal(10,1) NOT NULL DEFAULT '0.0',
  `kat_pakan` varchar(50) DEFAULT NULL,
  `ksuhu` decimal(10,0) NOT NULL DEFAULT '0',
  `kat_suhu` varchar(50) DEFAULT NULL,
  `kmortalitas` varchar(50) DEFAULT '',
  `deskripsi` varchar(200) DEFAULT '',
  `tgl` varchar(50) DEFAULT '0',
  `pengelolaan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dset`
--

INSERT INTO `dset` (`id`, `umur`, `kat_umur`, `user_id`, `jumlahayam`, `kat_jumlah`, `mortalitas`, `kat_mortalitas`, `berat`, `kat_berat`, `pakan`, `kat_pakan`, `ksuhu`, `kat_suhu`, `kmortalitas`, `deskripsi`, `tgl`, `pengelolaan`) VALUES
(3, 1, 'kurang', 1, 3000, 'besar', 0, 'kecil', 2000, 'sedang', '15.0', 'tidak sesuai', '35', '', '', '', '11-04-2021', 'kurang'),
(11, 1, 'kurang', 2, 3100, 'banyak', 4, 'kecil', 56, 'kurang', '0.8', 'tidak sesuai', '33', '', '', '', '0', 'Baik'),
(12, 2, 'kurang', 2, 3096, 'banyak', 5, 'besar', 71, 'kurang', '1.0', 'sesuai', '33', '', '', '', '0', 'Baik'),
(15, 3, 'kurang', 2, 3091, 'banyak', 7, 'besar', 88, 'kurang', '1.3', 'tidak sesuai', '33', '', '', '', '0', 'Kurang');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `key` varchar(200) DEFAULT NULL,
  `value` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `key`, `value`) VALUES
(1, 'populasi_banyak', '3000'),
(2, 'populasi_sedikit', '2000'),
(3, 'batas_mortalitas', '5'),
(4, 'berat_besar', '2000'),
(5, 'berat_kurang', '1700'),
(6, 'umur_lebih', '37'),
(7, 'umur_kurang', '34');

-- --------------------------------------------------------

--
-- Table structure for table `sop`
--

CREATE TABLE `sop` (
  `umur` int(11) NOT NULL,
  `berat` int(11) NOT NULL DEFAULT '0',
  `pakan` decimal(10,1) NOT NULL DEFAULT '0.0',
  `suhu` decimal(10,0) NOT NULL DEFAULT '0',
  `pakan_gram` decimal(10,1) NOT NULL DEFAULT '0.0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sop`
--

INSERT INTO `sop` (`umur`, `berat`, `pakan`, `suhu`, `pakan_gram`) VALUES
(1, 56, '0.8', '33', '10.0'),
(2, 71, '1.0', '33', '0.0'),
(3, 88, '1.3', '33', '0.0'),
(4, 105, '1.4', '30', '0.0'),
(5, 130, '1.6', '30', '0.0'),
(6, 155, '1.8', '30', '0.0'),
(7, 184, '2.0', '30', '0.0'),
(8, 215, '2.3', '28', '0.0'),
(9, 249, '2.6', '28', '0.0'),
(10, 287, '2.8', '28', '0.0'),
(11, 328, '3.2', '28', '0.0'),
(12, 372, '3.5', '27', '0.0'),
(13, 420, '3.8', '27', '0.0'),
(14, 470, '4.1', '27', '0.0'),
(15, 525, '4.4', '27', '0.0'),
(16, 582, '4.8', '27', '0.0'),
(17, 642, '5.2', '27', '0.0'),
(18, 705, '5.5', '27', '0.0'),
(19, 772, '5.9', '27', '0.0'),
(20, 841, '6.3', '27', '0.0'),
(21, 913, '6.7', '27', '0.0'),
(22, 987, '7.0', '27', '0.0'),
(23, 1064, '7.4', '27', '0.0'),
(24, 1142, '7.7', '27', '0.0'),
(25, 1224, '8.1', '27', '0.0'),
(26, 1306, '8.5', '27', '0.0'),
(27, 1391, '8.9', '27', '0.0'),
(28, 1477, '9.2', '27', '0.0'),
(29, 1564, '9.5', '26', '0.0'),
(30, 1653, '9.9', '26', '0.0'),
(31, 1743, '10.2', '26', '0.0'),
(32, 1833, '10.5', '26', '0.0'),
(33, 1925, '10.8', '26', '0.0'),
(34, 2017, '11.1', '26', '0.0'),
(35, 2110, '11.4', '26', '0.0'),
(36, 2203, '3.0', '26', '0.0'),
(37, 2296, '2.0', '26', '0.0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `nama` varchar(200) DEFAULT '0',
  `username` varchar(200) NOT NULL DEFAULT '0',
  `email` varchar(200) NOT NULL DEFAULT '0',
  `password` varchar(200) NOT NULL DEFAULT '0',
  `alamat` varchar(200) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`, `alamat`) VALUES
(1, 'Ahmat suwanto', 'iam', 'peserta101@hi2.in', '$2y$10$vjxxIJaMcI6bLEBp/eo1guq9cTV.MAZlMmDHRN1jtNg376hUyuDw2', 'iam'),
(2, 'ayam', 'ayam', 'ayampedaging@gmail.com', '$2y$10$nOurGAX/q246zQ4dcIpeGuk4PbAhwfKk4OzceMQkTPEID/IRwHKhO', 'magetan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dset`
--
ALTER TABLE `dset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key` (`key`(191));

--
-- Indexes for table `sop`
--
ALTER TABLE `sop`
  ADD PRIMARY KEY (`umur`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dset`
--
ALTER TABLE `dset`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sop`
--
ALTER TABLE `sop`
  MODIFY `umur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
