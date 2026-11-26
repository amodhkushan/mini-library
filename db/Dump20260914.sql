-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: minilibrary
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bookname` varchar(45) NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `author` varchar(45) NOT NULL,
  `coverimg` mediumblob NOT NULL,
  `bookprice` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `bookquantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `isbn_UNIQUE` (`isbn`),
  KEY `isbn` (`isbn`)
) ENGINE=InnoDB AUTO_INCREMENT=1116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (1111,'Test book','1234567891234',1,'Amodh','',0,'This is test text for check the home UI of mini library website.',1),(1112,'Test book 1','2345678912345',2,'Amodh','',0,'This is test text for check the home UI of mini library website.',1),(1113,'Test book 2','3456789123456',3,'Kushan','',0,'This is test text for check the home UI of mini library website.',1),(1114,'Test book 3','4567891234567',4,'Kushan','',0,'This is test text for check the home UI of mini library website.',1),(1115,'Test book 4','5678912345678',5,'Dewmini','',0,'This is test text for check the home UI of mini library website.',1);
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookcategory`
--

DROP TABLE IF EXISTS `bookcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookcategory` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookcategory`
--

LOCK TABLES `bookcategory` WRITE;
/*!40000 ALTER TABLE `bookcategory` DISABLE KEYS */;
INSERT INTO `bookcategory` VALUES (1,'Fiction'),(2,'Science'),(3,'History'),(4,'Biography'),(5,'Travel');
/*!40000 ALTER TABLE `bookcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookcopies`
--

DROP TABLE IF EXISTS `bookcopies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookcopies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(13) NOT NULL,
  `copyid` int(11) NOT NULL,
  `availability` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `isbn` (`isbn`),
  CONSTRAINT `isbn` FOREIGN KEY (`isbn`) REFERENCES `book` (`isbn`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookcopies`
--

LOCK TABLES `bookcopies` WRITE;
/*!40000 ALTER TABLE `bookcopies` DISABLE KEYS */;
INSERT INTO `bookcopies` VALUES (11,'1234567891234',111111,'Available'),(12,'2345678912345',111112,'Available'),(13,'3456789123456',111113,'Available'),(14,'4567891234567',111114,'Available'),(15,'5678912345678',111115,'Available');
/*!40000 ALTER TABLE `bookcopies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `borrowdetails`
--

DROP TABLE IF EXISTS `borrowdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `borrowdetails` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nic` varchar(12) NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `duedate` date NOT NULL,
  `returndate` date NOT NULL,
  `fineamount` varchar(45) NOT NULL,
  `paymentstatus` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_nic` (`nic`),
  KEY `idx_isbn` (`isbn`),
  KEY `isbn` (`isbn`),
  KEY `nic` (`nic`),
  CONSTRAINT `borrow_b_isbn` FOREIGN KEY (`isbn`) REFERENCES `book` (`isbn`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `nic` FOREIGN KEY (`nic`) REFERENCES `user` (`nic`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `borrowdetails`
--

LOCK TABLES `borrowdetails` WRITE;
/*!40000 ALTER TABLE `borrowdetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `borrowdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fines`
--

DROP TABLE IF EXISTS `fines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fines` (
  `id` int(11) NOT NULL,
  `dailyrate` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fines`
--

LOCK TABLES `fines` WRITE;
/*!40000 ALTER TABLE `fines` DISABLE KEYS */;
/*!40000 ALTER TABLE `fines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `roleid` int(1) NOT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`roleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Admin'),(2,'Librarian'),(3,'Member'),(4,'Guest');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(12) NOT NULL,
  `name` varchar(45) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `email` varchar(45) NOT NULL,
  `roleid` int(1) NOT NULL,
  `profilepic` mediumblob DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nic_UNIQUE` (`nic`),
  KEY `roleid` (`roleid`),
  CONSTRAINT `roleid` FOREIGN KEY (`roleid`) REFERENCES `role` (`roleid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'amodhkushan','Amodh@123','Amodh Kushan','200504234144','amodhkushan@gmail.com',2,NULL),(2,'dewmini','Dewmini@123','Jayodya Dewmini','200513433433','jayodyadewmini@gmail.com',2,NULL),(3,'nethmisasindi','Nethmi@123','Nethmi Sasindi','200643431804','nethmisasindi4@gmail.com',4,NULL),(4,'maneeshamadushanka','Maneesha@123','Maneesha Madhushanka','200624444465','maneeshamadushanka9@gmail.com',4,NULL),(5,'tharushanawod','Tharusha@123','Tharusha Nawod','200805454544','tharushanawod2006@gmail.com',4,NULL),(6,'sachinishehara','Sachini@123','Sachini Shehara','200645458710','sachinishehara2006@gmail.com',4,NULL),(7,'chaminduishara','Chamindu@123','Chamindu Ishara','200609082320','chaminduishara55@gmail.com',4,NULL),(8,'danukanuwan','Danuka@123','Danuka Nuwan','200633545458','danukanuwanpc@gmail.com',4,NULL),(9,'yasithhasanka','Yasith@123','Yasith Hasanka','200611546891','yasithjayaneththi9@gmail.com',4,NULL),(10,'methusharashminda','Methusha@123','Methusha Rashminda','200636557882','methurash85@gmail.com',4,NULL),(11,'kiranasankalpa','Kirana@123','Kirana Sankalpa','200513344590','kiranasankalpa@gmail.com',4,NULL),(12,'dasulaninduwara','Dasula@123','Dasula Ninduwara','200523125098','dasulaniduwara@gmail.com',4,NULL),(13,'nadirnoori','Nadir@123','Nadir Noori','200845623434','nadirnoori2008@gmail.com',4,NULL);
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

-- Dump completed on 2026-09-14 13:28:51
