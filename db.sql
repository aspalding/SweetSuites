-- MySQL dump 10.13  Distrib 5.5.31, for debian-linux-gnu (armv7l)
--
-- Host: localhost    Database: sweet_suites
-- ------------------------------------------------------
-- Server version	5.5.31-0+wheezy1

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE `history` (
  `h_trans_ID` int(10) NOT NULL AUTO_INCREMENT,
  `h_room_ID` int(3) NOT NULL,
  `h_user_ID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`h_trans_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms` (
  `room_ID` int(10) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `smoking` tinyint(1) unsigned NOT NULL,
  `pet` tinyint(1) unsigned NOT NULL,
  `vacancy` tinyint(1) unsigned NOT NULL,
  `meal` varchar(100) DEFAULT NULL,
  `rating` char(5) DEFAULT NULL,
  `price` char(5) DEFAULT NULL,
  PRIMARY KEY (`room_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
INSERT INTO `rooms` VALUES (100, 'Ice Cream Sea','Standard Room 1 King/2 full',1,1,5,'none','***','$$'),(200, 'Peppermint Forest','Standard Room 1 King/2 full',0,0,5,'none','***','$$'),(300, 'Peanut Brittle House','Deluxe Room 1 King/2 full',1,1,5,'Breakfast','***','$$$'),(400, 'Molasses Swamp','Deluxe Room 1 King/2 full',0,0,5,'Breakfast','***','$$$'),(500,'Lollipop Woods','Executive Suite',1,1,5,'Breakfast and lunch or dinner','****','$$$$'),(600, 'Licorice Castle','Executive Suite',0,0,5,'Breakfast and Lunch or Dinner','****','$$$$'),(700, 'Gumdrop Mountains','Centennial Suite',1,1,5,'All Inclusive','*****','$$$$'),(800, 'Gingerbread Plum Trees','Centennial Suite',0,0,5,'All Inclusive','*****','$$$$');
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `name` varchar(128) DEFAULT NULL,
  `type` enum('admin','user') DEFAULT NULL,
  `user_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pass` varchar(46) DEFAULT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
INSERT INTO `users` VALUES ('test','user',2,'5f4dcc3b5aa765d61d8327deb882cf99'),('admin','admin',3,md5('anincrediblysecurepasswordonlyanadminwouldknow'));
UNLOCK TABLES;
