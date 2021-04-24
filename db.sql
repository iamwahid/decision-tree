-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.1.36-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table db_dectree_ayam.dset
DROP TABLE IF EXISTS `dset`;
CREATE TABLE IF NOT EXISTS `dset` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
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
  `pengelolaan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_dectree_ayam.dset: ~1 rows (approximately)
DELETE FROM `dset`;
/*!40000 ALTER TABLE `dset` DISABLE KEYS */;
INSERT INTO `dset` (`id`, `umur`, `kat_umur`, `user_id`, `jumlahayam`, `kat_jumlah`, `mortalitas`, `kat_mortalitas`, `berat`, `kat_berat`, `pakan`, `kat_pakan`, `ksuhu`, `kat_suhu`, `kmortalitas`, `deskripsi`, `tgl`, `pengelolaan`) VALUES
	(3, 1, 'kurang', 1, 3000, 'besar', 0, 'kecil', 2000, 'sedang', 15.0, 'tidak sesuai', 35, '', '', '', '11-04-2021', 'kurang');
/*!40000 ALTER TABLE `dset` ENABLE KEYS */;

-- Dumping structure for table db_dectree_ayam.setting
DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(200) DEFAULT NULL,
  `value` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `key` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_dectree_ayam.setting: ~6 rows (approximately)
DELETE FROM `setting`;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` (`id`, `key`, `value`) VALUES
	(1, 'kapasitas_maksimal', '4000'),
	(2, 'umur_awal', '1'),
	(3, 'umur_panen', '35'),
	(4, 'umur_panen_maksimal', '37'),
	(5, 'berat_panen', '3000'),
	(6, 'batas_mortalitas', '5');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;

-- Dumping structure for table db_dectree_ayam.sop
DROP TABLE IF EXISTS `sop`;
CREATE TABLE IF NOT EXISTS `sop` (
  `umur` int(11) NOT NULL AUTO_INCREMENT,
  `berat` int(11) NOT NULL DEFAULT '0',
  `pakan` decimal(10,1) NOT NULL DEFAULT '0.0',
  `suhu` decimal(10,0) NOT NULL DEFAULT '0',
  `pakan_gram` decimal(10,1) NOT NULL DEFAULT '0.0',
  PRIMARY KEY (`umur`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- Dumping data for table db_dectree_ayam.sop: ~37 rows (approximately)
DELETE FROM `sop`;
/*!40000 ALTER TABLE `sop` DISABLE KEYS */;
INSERT INTO `sop` (`umur`, `berat`, `pakan`, `suhu`, `pakan_gram`) VALUES
	(1, 56, 0.8, 33, 10.0),
	(2, 71, 1.0, 33, 0.0),
	(3, 88, 1.3, 33, 0.0),
	(4, 105, 1.4, 30, 0.0),
	(5, 130, 1.6, 30, 0.0),
	(6, 155, 1.8, 30, 0.0),
	(7, 184, 2.0, 30, 0.0),
	(8, 215, 2.3, 28, 0.0),
	(9, 249, 2.6, 28, 0.0),
	(10, 287, 2.8, 28, 0.0),
	(11, 328, 3.2, 28, 0.0),
	(12, 372, 3.5, 27, 0.0),
	(13, 420, 3.8, 27, 0.0),
	(14, 470, 4.1, 27, 0.0),
	(15, 525, 4.4, 27, 0.0),
	(16, 582, 4.8, 27, 0.0),
	(17, 642, 5.2, 27, 0.0),
	(18, 705, 5.5, 27, 0.0),
	(19, 772, 5.9, 27, 0.0),
	(20, 841, 6.3, 27, 0.0),
	(21, 913, 6.7, 27, 0.0),
	(22, 987, 7.0, 27, 0.0),
	(23, 1064, 7.4, 27, 0.0),
	(24, 1142, 7.7, 27, 0.0),
	(25, 1224, 8.1, 27, 0.0),
	(26, 1306, 8.5, 27, 0.0),
	(27, 1391, 8.9, 27, 0.0),
	(28, 1477, 9.2, 27, 0.0),
	(29, 1564, 9.5, 26, 0.0),
	(30, 1653, 9.9, 26, 0.0),
	(31, 1743, 10.2, 26, 0.0),
	(32, 1833, 10.5, 26, 0.0),
	(33, 1925, 10.8, 26, 0.0),
	(34, 2017, 11.1, 26, 0.0),
	(35, 2110, 11.4, 26, 0.0),
	(36, 2203, 3.0, 26, 0.0),
	(37, 2296, 2.0, 26, 0.0);
/*!40000 ALTER TABLE `sop` ENABLE KEYS */;

-- Dumping structure for table db_dectree_ayam.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT '0',
  `username` varchar(200) NOT NULL DEFAULT '0',
  `email` varchar(200) NOT NULL DEFAULT '0',
  `password` varchar(200) NOT NULL DEFAULT '0',
  `alamat` varchar(200) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_dectree_ayam.user: ~0 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`, `alamat`) VALUES
	(1, 'Ahmat suwanto', 'iam', 'peserta101@hi2.in', '$2y$10$vjxxIJaMcI6bLEBp/eo1guq9cTV.MAZlMmDHRN1jtNg376hUyuDw2', 'iam');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
