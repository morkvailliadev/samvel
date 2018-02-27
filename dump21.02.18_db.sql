-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: samvel
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

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
-- Table structure for table `date1date2`
--

DROP TABLE IF EXISTS `date1date2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `date1date2` (
  `pk_date1date2` int(11) NOT NULL AUTO_INCREMENT,
  `varh` varchar(40) DEFAULT NULL,
  `varf` varchar(50) DEFAULT NULL,
  `varl` varchar(50) DEFAULT NULL,
  `dateb` date DEFAULT NULL,
  `int1_in` tinyint(1) DEFAULT NULL,
  `dates_in` datetime DEFAULT NULL,
  `datea_in` datetime DEFAULT NULL,
  `datev_in` datetime DEFAULT NULL,
  `datek_in` datetime DEFAULT NULL,
  `dateg_in` datetime DEFAULT NULL,
  `int2_in` int(11) DEFAULT NULL,
  `int3_in` int(3) DEFAULT NULL,
  `vard_in` varchar(22) DEFAULT NULL,
  `vark_in` varchar(50) DEFAULT NULL,
  `int1_out` tinyint(1) DEFAULT NULL,
  `dates_out` datetime DEFAULT NULL,
  `datea_out` datetime DEFAULT NULL,
  `datev_out` datetime DEFAULT NULL,
  `datek_out` datetime DEFAULT NULL,
  `dateg_out` datetime DEFAULT NULL,
  `int2_out` int(11) DEFAULT NULL,
  `int3_out` int(3) DEFAULT NULL,
  `vard_out` varchar(22) DEFAULT NULL,
  `vark_out` varchar(50) DEFAULT NULL,
  `oshibka` tinyint(1) DEFAULT NULL,
  `ins_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_date1date2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `date1date2`
--

LOCK TABLES `date1date2` WRITE;
/*!40000 ALTER TABLE `date1date2` DISABLE KEYS */;
/*!40000 ALTER TABLE `date1date2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordered_act_kpp`
--

DROP TABLE IF EXISTS `ordered_act_kpp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordered_act_kpp` (
  `Pk_ordered_act_kpp` int(11) NOT NULL AUTO_INCREMENT,
  `varh` varchar(40) DEFAULT NULL,
  `varf` varchar(50) DEFAULT NULL,
  `varl` varchar(50) DEFAULT NULL,
  `Dateb` date DEFAULT NULL,
  `dates` datetime DEFAULT NULL,
  `datea` datetime DEFAULT NULL,
  `datek` datetime DEFAULT NULL,
  `datev` datetime DEFAULT NULL,
  `int1` tinyint(1) DEFAULT NULL,
  `int2` int(11) DEFAULT NULL,
  `vark` varchar(20) DEFAULT NULL,
  `vard` varchar(22) DEFAULT NULL,
  `int3` int(3) DEFAULT NULL,
  PRIMARY KEY (`Pk_ordered_act_kpp`),
  KEY `ordered_act_kpp_dates_index` (`dates`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordered_act_kpp`
--

LOCK TABLES `ordered_act_kpp` WRITE;
/*!40000 ALTER TABLE `ordered_act_kpp` DISABLE KEYS */;
INSERT INTO `ordered_act_kpp` VALUES (1,'12','21312','21313','2018-02-28',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `ordered_act_kpp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `varhvard`
--

DROP TABLE IF EXISTS `varhvard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `varhvard` (
  `pk_varhvard` int(10) NOT NULL AUTO_INCREMENT,
  `varh` varchar(40) DEFAULT NULL,
  `vard` varchar(22) DEFAULT NULL,
  `int2` int(11) DEFAULT NULL,
  `int3` int(3) DEFAULT NULL,
  `ins_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_varhvard`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `varhvard`
--

LOCK TABLES `varhvard` WRITE;
/*!40000 ALTER TABLE `varhvard` DISABLE KEYS */;
/*!40000 ALTER TABLE `varhvard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `varvar1`
--

DROP TABLE IF EXISTS `varvar1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `varvar1` (
  `pk_varvar1` int(10) NOT NULL AUTO_INCREMENT,
  `varh` varchar(40) DEFAULT NULL,
  `varf` varchar(50) DEFAULT NULL,
  `varl` varchar(50) DEFAULT NULL,
  `dateb` date DEFAULT NULL,
  `int1` tinyint(1) DEFAULT NULL,
  `dates` datetime DEFAULT NULL,
  `datea` datetime DEFAULT NULL,
  `datev` datetime DEFAULT NULL,
  `datek` datetime DEFAULT NULL,
  `dateg` datetime DEFAULT NULL,
  `int2` int(11) DEFAULT NULL,
  `int3` int(3) DEFAULT NULL,
  `vard` varchar(22) DEFAULT NULL,
  `vark` varchar(50) DEFAULT NULL,
  `ins_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `varhCount` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_varvar1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `varvar1`
--

LOCK TABLES `varvar1` WRITE;
/*!40000 ALTER TABLE `varvar1` DISABLE KEYS */;
/*!40000 ALTER TABLE `varvar1` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-27 11:29:07
