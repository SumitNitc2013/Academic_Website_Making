-- MySQL dump 10.13  Distrib 5.5.49, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: CollegeDB
-- ------------------------------------------------------
-- Server version	5.5.49-0ubuntu0.14.04.1

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
-- Table structure for table `CoursesTaken`
--

DROP TABLE IF EXISTS `CoursesTaken`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CoursesTaken` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `Email` varchar(50) NOT NULL,
  `Subject` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CoursesTaken`
--

LOCK TABLES `CoursesTaken` WRITE;
/*!40000 ALTER TABLE `CoursesTaken` DISABLE KEYS */;
INSERT INTO `CoursesTaken` VALUES (12,'sony57@gmail.com','DAA'),(13,'sony57@gmail.com','TOC'),(14,'sony57@gmail.com','jha');
/*!40000 ALTER TABLE `CoursesTaken` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SignUpLogin`
--

DROP TABLE IF EXISTS `SignUpLogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SignUpLogin` (
  `First_Name` text NOT NULL,
  `Last_Name` text NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Password` text NOT NULL,
  `Gender` text NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SignUpLogin`
--

LOCK TABLES `SignUpLogin` WRITE;
/*!40000 ALTER TABLE `SignUpLogin` DISABLE KEYS */;
INSERT INTO `SignUpLogin` VALUES ('Rahul','khairwar','rahul23@gmail.com','rahul12345','male'),('sonny','josehf','sony57@gmail.com','sony56789','male'),('SUMIT','JHA','sumitjha1089@gmail.com','sumitnitc','male');
/*!40000 ALTER TABLE `SignUpLogin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TeacherCourse`
--

DROP TABLE IF EXISTS `TeacherCourse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TeacherCourse` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `TeacherName` text NOT NULL,
  `Subject` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TeacherCourse`
--

LOCK TABLES `TeacherCourse` WRITE;
/*!40000 ALTER TABLE `TeacherCourse` DISABLE KEYS */;
INSERT INTO `TeacherCourse` VALUES (3,'JHA','DAA'),(4,'sumit','TOC');
/*!40000 ALTER TABLE `TeacherCourse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TrainingAndPlacement`
--

DROP TABLE IF EXISTS `TrainingAndPlacement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TrainingAndPlacement` (
  `Year` int(4) NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Company` text NOT NULL,
  `CTC` float(5,2) NOT NULL,
  `CGPA` float(4,2) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TrainingAndPlacement`
--

LOCK TABLES `TrainingAndPlacement` WRITE;
/*!40000 ALTER TABLE `TrainingAndPlacement` DISABLE KEYS */;
INSERT INTO `TrainingAndPlacement` VALUES (2015,'sonny','sony57@gmail.com','GoldMan sachs',15.00,7.70);
/*!40000 ALTER TABLE `TrainingAndPlacement` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-26 15:21:53
