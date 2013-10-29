-- MySQL dump 10.13  Distrib 5.5.31, for debian-linux-gnu (armv7l)
--
-- Host: localhost    Database: sweet_suites
-- ------------------------------------------------------
-- Server version	5.5.31-0+wheezy1

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
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `h_room_ID` int(3) NOT NULL,
  `h_user_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`h_room_ID`,`h_user_ID`),
  KEY `history_h_user_ID` (`h_user_ID`),
  CONSTRAINT `history_h_room_ID` FOREIGN KEY (`h_room_ID`) REFERENCES `rooms` (`room_ID`) ON DELETE CASCADE,
  CONSTRAINT `history_h_user_ID` FOREIGN KEY (`h_user_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (500,2),(700,2),(800,2);
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms` (
  `room_ID` int(3) NOT NULL,
  `room_name` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `non/smoking` tinyint(1) unsigned NOT NULL,
  `pet` tinyint(1) unsigned NOT NULL,
  `vacancy` tinyint(1) unsigned NOT NULL,
  `meal` varchar(100) DEFAULT NULL,
  `rating` char(5) DEFAULT NULL,
  `price` char(5) DEFAULT NULL,
  PRIMARY KEY (`room_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (100,'Ice Cream Sea','Standard Room 1 King/2 full',1,1,4,'none','***','$$'),(200,'Peppermint Forest','Standard Room 1 King/2 full',0,0,4,'none','***','$$'),(300,'Peanut Brittle House','Deluxe Room 1 King/2 full',1,1,4,'Breakfast','***','$$$'),(400,'Molasses Swamp','Deluxe Room 1 King/2 full',0,0,5,'Breakfast','***','$$$'),(500,'Lollipop Woods','Executive Suite',1,1,4,'Breakfast and lunch or dinner','****','$$$$'),(600,'Licorice Castle','Executive Suite',0,0,5,'Breakfast and Lunch or Dinner','****','$$$$'),(700,'Gumdrop Mountains','Centennial Suite',1,1,4,'All Inclusive','*****','$$$$'),(800,'Gingerbread Plum Trees','Centennial Suite',0,0,4,'All Inclusive','*****','$$$$');
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `name` varchar(128) DEFAULT NULL,
  `type` enum('admin','user') DEFAULT NULL,
  `user_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pass` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('test','user',2,'5f4dcc3b5aa765d61d8327deb882cf99'),('Admin','admin',3,'5f4dcc3b5aa765d61d8327deb882cf99');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-10-29 19:32:59
