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
  `umur` int(2) NOT NULL AUTO_INCREMENT,
  `jumlahayam` int(11) NOT NULL DEFAULT '0',
  `mortalitas` int(11) NOT NULL DEFAULT '0',
  `berat` int(11) NOT NULL DEFAULT '0',
  `pakan` decimal(10,1) NOT NULL DEFAULT '0.0',
  `ksuhu` decimal(10,0) NOT NULL DEFAULT '0',
  `kmortalitas` varchar(50) DEFAULT '',
  `deskripsi` varchar(200) DEFAULT '',
  `tgl` varchar(50) DEFAULT '0',
  PRIMARY KEY (`umur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_dectree_ayam.dset: ~2 rows (approximately)
DELETE FROM `dset`;
/*!40000 ALTER TABLE `dset` DISABLE KEYS */;
INSERT INTO `dset` (`umur`, `jumlahayam`, `mortalitas`, `berat`, `pakan`, `ksuhu`, `kmortalitas`, `deskripsi`, `tgl`) VALUES
	(1, 3000, 0, 109, 20.0, 35, 'Mortalitas Kecil', '', '11-04-2021'),
	(2, 3000, 4, 109, 20.0, 35, 'Mortalitas Kecil', '', '12-04-2021');
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
  PRIMARY KEY (`umur`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- Dumping data for table db_dectree_ayam.sop: ~37 rows (approximately)
DELETE FROM `sop`;
/*!40000 ALTER TABLE `sop` DISABLE KEYS */;
INSERT INTO `sop` (`umur`, `berat`, `pakan`, `suhu`) VALUES
	(1, 56, 0.8, 33),
	(2, 71, 1.0, 33),
	(3, 88, 1.3, 33),
	(4, 105, 1.4, 30),
	(5, 130, 1.6, 30),
	(6, 155, 1.8, 30),
	(7, 184, 2.0, 30),
	(8, 215, 2.3, 28),
	(9, 249, 2.6, 28),
	(10, 287, 2.8, 28),
	(11, 328, 3.2, 28),
	(12, 372, 3.5, 27),
	(13, 420, 3.8, 27),
	(14, 470, 4.1, 27),
	(15, 525, 4.4, 27),
	(16, 582, 4.8, 27),
	(17, 642, 5.2, 27),
	(18, 705, 5.5, 27),
	(19, 772, 5.9, 27),
	(20, 841, 6.3, 27),
	(21, 913, 6.7, 27),
	(22, 987, 7.0, 27),
	(23, 1064, 7.4, 27),
	(24, 1142, 7.7, 27),
	(25, 1224, 8.1, 27),
	(26, 1306, 8.5, 27),
	(27, 1391, 8.9, 27),
	(28, 1477, 9.2, 27),
	(29, 1564, 9.5, 26),
	(30, 1653, 9.9, 26),
	(31, 1743, 10.2, 26),
	(32, 1833, 10.5, 26),
	(33, 1925, 10.8, 26),
	(34, 2017, 11.1, 26),
	(35, 2110, 11.4, 26),
	(36, 2203, 3.0, 26),
	(37, 2296, 2.0, 26);
/*!40000 ALTER TABLE `sop` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
