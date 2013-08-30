-- MySQL dump 10.13  Distrib 5.5.33, for Win32 (x86)
--
-- Host: localhost    Database: ranking
-- ------------------------------------------------------
-- Server version	5.5.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `m_dtr`
--

DROP TABLE IF EXISTS `m_dtr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_dtr` (
  `id` int(11) NOT NULL,
  `nm` varchar(45) DEFAULT NULL,
  `val` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_dtr`
--

LOCK TABLES `m_dtr` WRITE;
/*!40000 ALTER TABLE `m_dtr` DISABLE KEYS */;
INSERT INTO `m_dtr` VALUES (1,'AppStore',NULL),(2,'Google Play',NULL);
/*!40000 ALTER TABLE `m_dtr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ranking`
--

DROP TABLE IF EXISTS `ranking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ranking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm` varchar(300) DEFAULT NULL,
  `val` varchar(100) DEFAULT NULL,
  `rnk` int(11) DEFAULT NULL,
  `rg` varchar(45) DEFAULT NULL,
  `ctr` varchar(2) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `yy` int(4) DEFAULT NULL,
  `mm` int(2) DEFAULT NULL,
  `dd` int(2) DEFAULT NULL,
  `dtr` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `currency` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ranking`
--

LOCK TABLES `ranking` WRITE;
/*!40000 ALTER TABLE `ranking` DISABLE KEYS */;
INSERT INTO `ranking` VALUES (1,'激Jパチスロ HIGHSCHOOL OF THE DEAD',NULL,1,NULL,NULL,'2013-08-30 02:25:38',2013,8,30,2,NULL,NULL),(2,'アスファルト8：Airborne',NULL,2,NULL,NULL,'2013-08-30 02:25:38',2013,8,30,2,NULL,NULL),(3,'Minecraft - Pocket Edition',NULL,3,NULL,NULL,'2013-08-30 02:25:38',2013,8,30,2,NULL,NULL),(4,'押忍！番長２',NULL,4,NULL,NULL,'2013-08-30 02:25:38',2013,8,30,2,NULL,NULL),(5,'SuperGNES (スーパーファミコン)',NULL,5,NULL,NULL,'2013-08-30 02:25:38',2013,8,30,2,NULL,NULL),(6,'バジリスク～甲賀忍法帖～II',NULL,6,NULL,NULL,'2013-08-30 02:25:38',2013,8,30,2,NULL,NULL),(7,'緑ドン ～キラメキ！炎のオーロラ伝説～',NULL,7,NULL,NULL,'2013-08-30 02:25:38',2013,8,30,2,NULL,NULL),(8,'アイムジャグラーＥＸ',NULL,8,NULL,NULL,'2013-08-30 02:25:38',2013,8,30,2,NULL,NULL),(9,'Blueprint3D HD',NULL,9,NULL,NULL,'2013-08-30 02:25:38',2013,8,30,2,NULL,NULL),(10,'パチスロ バイオハザード5',NULL,10,NULL,NULL,'2013-08-30 02:25:38',2013,8,30,2,NULL,NULL),(11,'アスファルト8：Airborne',NULL,1,NULL,NULL,'2013-08-30 02:27:07',2013,8,30,1,85,'JPY'),(12,'ぱちスロAKB48 実機アプリ',NULL,2,NULL,NULL,'2013-08-30 02:27:07',2013,8,30,1,1800,'JPY'),(13,'ミクフリック／02　初音ミク',NULL,3,NULL,NULL,'2013-08-30 02:27:07',2013,8,30,1,600,'JPY'),(14,'Minecraft - Pocket Edition',NULL,4,NULL,NULL,'2013-08-30 02:27:07',2013,8,30,1,600,'JPY'),(15,'激Jパチスロ HIGHSCHOOL OF THE DEAD',NULL,6,NULL,NULL,'2013-08-30 02:27:07',2013,8,30,1,1500,'JPY'),(16,'CRリング～呪いの7日間～',NULL,7,NULL,NULL,'2013-08-30 02:27:07',2013,8,30,1,1500,'JPY'),(17,'Cytus',NULL,8,NULL,NULL,'2013-08-30 02:27:07',2013,8,30,1,170,'JPY'),(18,'パチスロ北斗の拳　転生の章',NULL,9,NULL,NULL,'2013-08-30 02:27:07',2013,8,30,1,1800,'JPY'),(19,'ニキの愛されコーデ',NULL,10,NULL,NULL,'2013-08-30 02:27:07',2013,8,30,1,85,'JPY');
/*!40000 ALTER TABLE `ranking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` varchar(20) NOT NULL,
  `nm` varchar(20) DEFAULT NULL,
  `pwd` varchar(20) DEFAULT NULL,
  `ml` varchar(100) DEFAULT NULL,
  `plg` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('parkkumc','Kumcheol Park','dry3w','parkkumc@gmail.com',3);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-08-30 11:47:25
