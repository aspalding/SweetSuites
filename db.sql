-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 21, 2013 at 01:32 AM
-- Server version: 5.1.69
-- PHP Version: 5.3.2-1ubuntu4.19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spProject`
--

-- DROP DATABASE `sp361_project`;
CREATE DATABASE `sp361_project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sp361_project`;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `room_ID` int(3) NOT NULL,
  `room_name` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `non/smoking` tinyint(1) UNSIGNED NOT NULL,
  `pet` tinyint(1) UNSIGNED NOT NULL,
  `vacancy` tinyint(1) UNSIGNED NOT NULL,
  `meal` varchar(100) DEFAULT NULL,
  `rating` char(5) DEFAULT NULL,
  `price` char(5) DEFAULT NULL,
  PRIMARY KEY (`room_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_ID`, `room_name`, `type`, `non/smoking`, `pet`, `vacancy`, `meal`, `rating`, `price`) VALUES
(900, 'Candy Castle', 'Penthouse', 1, 1, 0, 'All Inclusive + Bar', '*****', '$$$$$'),
(800, 'Gingerbread Plum Trees', 'Centennial Suite', 0, 0, 0, 'All Inclusive', '*****', '$$$$'),
(700, 'Gumdrop Mountains', 'Centennial Suite', 1, 1, 0, 'All Inclusive', '*****', '$$$$'),
(600, 'Licorice Castle', 'Executive Suite', 0, 0, 0, 'Breakfast and Lunch or Dinner', '****', '$$$$'),
(500, 'Lollipop Woods', 'Executive Suite', 1, 1, 0, 'Breakfast and lunch or dinner', '****', '$$$$'),
(400, 'Molasses Swamp', 'Deluxe Room 1 King/2 full', 0, 0, 0, 'Breakfast', '***', '$$$'),
(300, 'Peanut Brittle House', 'Deluxe Room 1 King/2 full', 1, 1, 0, 'Breakfast', '***', '$$$'),
(200, 'Peppermint Forest', 'Standard Room 1 King/2 full', 0, 0, 0, 'none', '***', '$$'),
(100, 'Ice Cream Sea', 'Standard Room 1 King/2 full', 1, 1, 0, 'none', '***', '$$');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(128) DEFAULT NULL,
  `type` enum('admin','user') DEFAULT NULL,
  `user_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pass` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=InnoDB   DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `type`, `user_ID`, `pass`) VALUES
('Abi Normal', 'admin', 1, '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history`(
`h_room_ID` int(3) NOT NULL,
`h_user_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
PRIMARY KEY (`h_room_ID`, `h_user_ID`),
CONSTRAINT history_h_room_ID 
FOREIGN KEY (`h_room_ID`) REFERENCES rooms (`room_ID`) ON DELETE CASCADE,
CONSTRAINT history_h_user_ID 
FOREIGN KEY (`h_user_ID`) REFERENCES users (`user_ID`) ON DELETE CASCADE
)
ENGINE=INNODB;

INSERT INTO `history` (`h_room_ID`, `h_user_ID`) VALUES
(900, 1);
INSERT INTO `history` (`h_room_ID`, `h_user_ID`) VALUES
(700, 1);

DELETE FROM rooms where room_ID = 900;
DELETE FROM users where user_ID = 1;


SELECT rooms.room_ID, users.name
FROM rooms, users, history 
WHERE (users.user_ID = history.h_user_ID and rooms.room_ID = history.h_room_ID and users.user_ID = 1)





