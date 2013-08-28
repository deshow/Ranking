-- MySQL dump 10.13  Distrib 5.5.21, for osx10.6 (i386)
--
-- Host: localhost    Database: ranking
-- ------------------------------------------------------
-- Server version	5.5.21-log

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ranking`
--

LOCK TABLES `ranking` WRITE;
/*!40000 ALTER TABLE `ranking` DISABLE KEYS */;
INSERT INTO `ranking` VALUES (1,'アスファルト8：Airborne - Gameloft',NULL,1,NULL,NULL,'2013-08-24 05:34:53',2013,8,24),(2,'ぱちスロAKB48 実機アプリ - Crossgate Co.,Ltd.',NULL,2,NULL,NULL,'2013-08-24 05:34:53',2013,8,24),(3,'激Jパチスロ HIGHSCHOOL OF THE DEAD - DORASU CORPORATION',NULL,3,NULL,NULL,'2013-08-24 05:34:53',2013,8,24),(4,'Minecraft - Pocket Edition - Mojang',NULL,4,NULL,NULL,'2013-08-24 05:34:53',2013,8,24),(5,'CRリング～呪いの7日間～ - FutureScope, Corp.',NULL,5,NULL,NULL,'2013-08-24 05:34:53',2013,8,24),(6,'Cytus - Rayark Inc.',NULL,6,NULL,NULL,'2013-08-24 05:34:53',2013,8,24),(7,'BLOODMASQUE - SQUARE ENIX',NULL,8,NULL,NULL,'2013-08-24 05:34:53',2013,8,24),(8,'ニキの愛されコーデ - adinnovation, Inc.',NULL,9,NULL,NULL,'2013-08-24 05:34:53',2013,8,24),(9,'緑ドン〜キラメキ！炎のオーロラ伝説〜 - ARUZE MEDIA NET CORP.',NULL,10,NULL,NULL,'2013-08-24 05:34:53',2013,8,24);
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

-- Dump completed on 2013-08-24 21:34:22
