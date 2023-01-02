-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: db_topline
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.20.04.3

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
-- Table structure for table `tbl_games`
--

DROP TABLE IF EXISTS `tbl_games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_games` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gambar` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `harga` int NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tutorial` text,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_games`
--

LOCK TABLES `tbl_games` WRITE;
/*!40000 ALTER TABLE `tbl_games` DISABLE KEYS */;
INSERT INTO `tbl_games` VALUES (2,'pubg.png','PUBG',11000,100000,'UC',''),(3,'freefire.png','Free Fire',11000,100000,'Diamond','Untuk menemukan ID Anda, klik pada ikon karakter. User ID tercantum di bawah nama karakter Anda. Contoh: \'5363266446\'.'),(4,'cod.png','Call of Duty',11000,100000,'CP',NULL),(5,'ml.png','Mobile Legends',11000,100000,'Diamond','Untuk mengetahui User ID Anda, silakan klik menu profile dibagian kiri atas pada menu utama game. User ID akan terlihat dibagian bawah Nama Karakter Game Anda. Silakan masukkan User ID Anda untuk menyelesaikan transaksi. Contoh : 12345678(1234).');
/*!40000 ALTER TABLE `tbl_games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pembayaran`
--

DROP TABLE IF EXISTS `tbl_pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_pembayaran` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `icon` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pembayaran`
--

LOCK TABLES `tbl_pembayaran` WRITE;
/*!40000 ALTER TABLE `tbl_pembayaran` DISABLE KEYS */;
INSERT INTO `tbl_pembayaran` VALUES (1,'bni.png','Bank BNI','123123123'),(2,'bri.png','Bank BRI','123123123'),(3,'mandiri.png','Bank Mandiri','123123123'),(4,'permata.png','Bank Permata','123123123'),(5,'gopay.png','Gopay','123123123');
/*!40000 ALTER TABLE `tbl_pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_riwayat`
--

DROP TABLE IF EXISTS `tbl_riwayat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_riwayat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `id_game` int NOT NULL,
  `game` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl_pembelian` datetime NOT NULL,
  `jumlah_uang` int NOT NULL,
  `satuan` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `terkirim` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_riwayat`
--

LOCK TABLES `tbl_riwayat` WRITE;
/*!40000 ALTER TABLE `tbl_riwayat` DISABLE KEYS */;
INSERT INTO `tbl_riwayat` VALUES (1,'reyhan',0,'Mobile Legend','2022-11-12 00:00:00',35,'Diamond',0),(2,'reyhan',2,'PUBG','2022-11-12 00:00:00',35,'UC',1),(3,'xixi',2,'PUBG','2022-12-29 03:56:34',50,'UC',0);
/*!40000 ALTER TABLE `tbl_riwayat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_topup_nominal`
--

DROP TABLE IF EXISTS `tbl_topup_nominal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_topup_nominal` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `game_id` int NOT NULL COMMENT 'Id dari game',
  `amount` int NOT NULL COMMENT 'Jumlah coin game',
  `price` mediumint NOT NULL COMMENT 'Harga dalam rupiah',
  `icon` varchar(255) DEFAULT NULL,
  `bonus` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `tbl_topup_nominal_relation_1` (`game_id`),
  CONSTRAINT `tbl_topup_nominal_relation_1` FOREIGN KEY (`game_id`) REFERENCES `tbl_games` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_topup_nominal`
--

LOCK TABLES `tbl_topup_nominal` WRITE;
/*!40000 ALTER TABLE `tbl_topup_nominal` DISABLE KEYS */;
INSERT INTO `tbl_topup_nominal` VALUES (1,5,5,10000,'diamond.png',0),(3,5,10,19000,'diamond.png',0),(4,5,20,30000,'diamond.png',0),(5,5,40,50000,'diamond.png',5);
/*!40000 ALTER TABLE `tbl_topup_nominal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `foto` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'reyhan','$2y$10$P/9Vr8iOHHEPuLptUPL7N.dZhy9ta3Gc7ljjmQRbdcta85KZcb2Vq','reyhan bin','Jakarta','1900-01-01','d7d19ff875e1aba83b54931d91ffac46.jpg'),(2,'hehe','$2y$10$tj7lPNMGboLq1tPmmPDOB..F9Vj0pcs.G7CmHY6Yz6Xq.aHW3Pka.','',NULL,NULL,NULL),(4,'xaxa','$2y$10$gi4oOVLcdzA37EpZPrMkN.uOBbVO1ewfPQ5q70aCOVa0ZbTI/Q9gO','',NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-29  4:11:57
