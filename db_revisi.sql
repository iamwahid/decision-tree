-- MySQL dump 10.13  Distrib 8.0.25, for macos11.3 (x86_64)
--
-- Host: 127.0.0.1    Database: db_dectree_ayam
-- ------------------------------------------------------
-- Server version	5.7.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT '0',
  `username` varchar(20) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(72) NOT NULL DEFAULT '0',
  `alamat` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Ahmat suwanto','iam','peserta101@hi2.in','$2y$10$vjxxIJaMcI6bLEBp/eo1guq9cTV.MAZlMmDHRN1jtNg376hUyuDw2','iam'),(2,'ayam','ayam','ayampedaging@gmail.com','$2y$10$nOurGAX/q246zQ4dcIpeGuk4PbAhwfKk4OzceMQkTPEID/IRwHKhO','magetan');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_ternak`
--

DROP TABLE IF EXISTS `data_ternak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_ternak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `umur` int(2) DEFAULT NULL,
  `kat_umur` varchar(20) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `jumlahayam` int(11) NOT NULL DEFAULT '0',
  `kat_jumlah` varchar(20) DEFAULT NULL,
  `mortalitas` int(11) NOT NULL DEFAULT '0',
  `kat_mortalitas` varchar(20) DEFAULT NULL,
  `berat` int(11) NOT NULL DEFAULT '0',
  `kat_berat` varchar(20) DEFAULT NULL,
  `pakan` decimal(10,1) NOT NULL DEFAULT '0.0',
  `kat_pakan` varchar(20) DEFAULT NULL,
  `ksuhu` decimal(10,0) NOT NULL DEFAULT '0',
  `kat_suhu` varchar(20) DEFAULT NULL,
  `kmortalitas` varchar(20) DEFAULT '',
  `pengelolaan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_ternak`
--

LOCK TABLES `data_ternak` WRITE;
/*!40000 ALTER TABLE `data_ternak` DISABLE KEYS */;
INSERT INTO `data_ternak` VALUES (11,1,'kurang',2,3100,'banyak',4,'kecil',56,'kurang',0.8,'tidak sesuai',33,'','','Baik'),(12,2,'kurang',2,3096,'banyak',5,'besar',71,'kurang',1.0,'sesuai',33,'','','Baik'),(15,3,'kurang',2,3091,'banyak',7,'besar',88,'kurang',1.3,'tidak sesuai',33,'','','Kurang'),(16,1,'kurang',1,3100,'banyak',8,'besar',46,'kurang',1.0,'tidak sesuai',33,'','besar','Kurang'),(17,2,'kurang',1,3092,'banyak',3,'kecil',71,'kurang',1.0,'sesuai',33,'','kecil','Baik'),(20,3,'kurang',1,3089,'banyak',4,'kecil',97,'kurang',1.1,'tidak sesuai',33,'kecil','','Baik'),(21,4,'kurang',1,3085,'banyak',5,'besar',122,'kurang',1.5,'tidak sesuai',30,'','besar','Kurang'),(22,5,'kurang',1,3080,'banyak',4,'kecil',148,'kurang',1.5,'tidak sesuai',30,'kecil','','Baik'),(23,6,'kurang',1,3075,'banyak',6,'besar',174,'kurang',2.0,'tidak sesuai',30,'besar','','Kurang'),(24,7,'kurang',1,3070,'banyak',4,'kecil',215,'kurang',2.1,'tidak sesuai',30,'kecil','','Baik');
/*!40000 ALTER TABLE `data_ternak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nilai_batasan`
--

DROP TABLE IF EXISTS `nilai_batasan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nilai_batasan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(20) DEFAULT NULL,
  `value` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `key` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nilai_batasan`
--

LOCK TABLES `nilai_batasan` WRITE;
/*!40000 ALTER TABLE `nilai_batasan` DISABLE KEYS */;
INSERT INTO `nilai_batasan` VALUES (1,'populasi_banyak','3000'),(2,'populasi_sedikit','2000'),(3,'batas_mortalitas','5'),(4,'berat_besar','2000'),(5,'berat_kurang','1700'),(6,'umur_lebih','37'),(7,'umur_kurang','34');
/*!40000 ALTER TABLE `nilai_batasan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prosedur_pengelolaan_ternak`
--

DROP TABLE IF EXISTS `prosedur_pengelolaan_ternak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prosedur_pengelolaan_ternak` (
  `umur` int(2) NOT NULL AUTO_INCREMENT,
  `berat` int(11) NOT NULL DEFAULT '0',
  `pakan` decimal(10,1) NOT NULL DEFAULT '0.0',
  `suhu` decimal(10,0) NOT NULL DEFAULT '0',
  `pakan_gram` decimal(10,1) NOT NULL DEFAULT '0.0',
  PRIMARY KEY (`umur`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prosedur_pengelolaan_ternak`
--

LOCK TABLES `prosedur_pengelolaan_ternak` WRITE;
/*!40000 ALTER TABLE `prosedur_pengelolaan_ternak` DISABLE KEYS */;
INSERT INTO `prosedur_pengelolaan_ternak` VALUES (1,56,0.8,33,10.0),(2,71,1.0,33,0.0),(3,88,1.3,33,0.0),(4,105,1.4,30,0.0),(5,130,1.6,30,0.0),(6,155,1.8,30,0.0),(7,184,2.0,30,0.0),(8,215,2.3,28,0.0),(9,249,2.6,28,0.0),(10,287,2.8,28,0.0),(11,328,3.2,28,0.0),(12,372,3.5,27,0.0),(13,420,3.8,27,0.0),(14,470,4.1,27,0.0),(15,525,4.4,27,0.0),(16,582,4.8,27,0.0),(17,642,5.2,27,0.0),(18,705,5.5,27,0.0),(19,772,5.9,27,0.0),(20,841,6.3,27,0.0),(21,913,6.7,27,0.0),(22,987,7.0,27,0.0),(23,1064,7.4,27,0.0),(24,1142,7.7,27,0.0),(25,1224,8.1,27,0.0),(26,1306,8.5,27,0.0),(27,1391,8.9,27,0.0),(28,1477,9.2,27,0.0),(29,1564,9.5,26,0.0),(30,1653,9.9,26,0.0),(31,1743,10.2,26,0.0),(32,1833,10.5,26,0.0),(33,1925,10.8,26,0.0),(34,2017,11.1,26,0.0),(35,2110,11.4,26,0.0),(36,2203,3.0,26,0.0),(37,2296,2.0,26,0.0);
/*!40000 ALTER TABLE `prosedur_pengelolaan_ternak` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-10 21:23:18
