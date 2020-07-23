-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: mess_management
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Table structure for table `extras`
--

DROP TABLE IF EXISTS `extras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `extras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(20) DEFAULT NULL,
  `rollno` varchar(15) NOT NULL,
  `item_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rollno` (`rollno`),
  CONSTRAINT `extras_ibfk_1` FOREIGN KEY (`rollno`) REFERENCES `students` (`rollno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `extras`
--

LOCK TABLES `extras` WRITE;
/*!40000 ALTER TABLE `extras` DISABLE KEYS */;
INSERT INTO `extras` VALUES (3,'Frooty','B170173CS',10);
/*!40000 ALTER TABLE `extras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guests`
--

DROP TABLE IF EXISTS `guests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `rollno` varchar(15) NOT NULL,
  `guestrollno` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rollno` (`rollno`),
  CONSTRAINT `guests_ibfk_1` FOREIGN KEY (`rollno`) REFERENCES `students` (`rollno`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guests`
--

LOCK TABLES `guests` WRITE;
/*!40000 ALTER TABLE `guests` DISABLE KEYS */;
INSERT INTO `guests` VALUES (4,'Sidharth','B170173CS','B170117CS');
/*!40000 ALTER TABLE `guests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mess_cuts`
--

DROP TABLE IF EXISTS `mess_cuts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mess_cuts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rollno` varchar(15) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `no_of_days` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rollno` (`rollno`),
  CONSTRAINT `mess_cuts_ibfk_1` FOREIGN KEY (`rollno`) REFERENCES `students` (`rollno`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mess_cuts`
--

LOCK TABLES `mess_cuts` WRITE;
/*!40000 ALTER TABLE `mess_cuts` DISABLE KEYS */;
INSERT INTO `mess_cuts` VALUES (5,'B170173CS','2020-07-22','2020-07-24',2);
/*!40000 ALTER TABLE `mess_cuts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messes`
--

DROP TABLE IF EXISTS `messes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mess_name` varchar(20) DEFAULT NULL,
  `mess_id` varchar(10) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mess_id` (`mess_id`),
  UNIQUE KEY `mess_name` (`mess_name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messes`
--

LOCK TABLES `messes` WRITE;
/*!40000 ALTER TABLE `messes` DISABLE KEYS */;
INSERT INTO `messes` VALUES (9,'C','C','aaaaaa'),(10,'D','D','aaaaaa');
/*!40000 ALTER TABLE `messes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `phoneno` varchar(10) DEFAULT NULL,
  `mess_id` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mess_id` (`mess_id`),
  CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`mess_id`) REFERENCES `messes` (`mess_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (14,'Raju','912345678','C'),(15,'Ramu','987654321','C');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `rollno` varchar(40) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `roomno` int(11) NOT NULL,
  `mess_id` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rollno` (`rollno`),
  KEY `fk_students_1_idx` (`mess_id`),
  CONSTRAINT `fk_students_1` FOREIGN KEY (`mess_id`) REFERENCES `messes` (`mess_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (11,'Shabin Kv','shabinkv3@gmail.com','B170173CS','aaaaaa',318,'C'),(12,'Krishnapriya Santhosh','krishnakichu1907@gmail.com','B170881CS','aaaaaa',123,'D');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-23 15:36:38
