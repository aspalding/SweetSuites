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
CREATE DATABASE `sp361_project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sp361_project`;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `room_ID` int(3) NOT NULL DEFAULT '',
  `room_name` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `non/smoking` tinyint(1) UNSIGNED NOT NULL,
  `pet` tinyint(1) UNSIGNED NOT NULL,
  `vacancy` tinyint(1) UNSIGNED NOT NULL,
  `meal` varchar(25) DEFAULT NULL,
  `rating` char(5) DEFAULT NULL,
  `price` char(5) DEFAULT NULL,
  `guest name` longtext,
  PRIMARY KEY (`room_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_ID`, `room_name`, `type`, `non/smoking`, `pet`, `vacancy`, `meal`, `rating`, `price`, `guest name`) VALUES
(900, 'Candy Castle', 'Penthouse', 1, 1, 0, 'All Inclusive + Bar', '*****', '$$$$$', 'testGuest'),
(800, 'Gingerbread Plum Trees', 'Centennial Suite', 0, 0, 0, 'All Inclusive', '*****', '$$$$', 'testGuest'),
(700, 'Gumdrop Mountains', 'Centennial Suite', 1, 1, 0, 'All Inclusive', '*****', '$$$$', 'testGuest'),
(600, 'Licorice Castle', 'Executive Suite', 0, 0, 0, 'Breakfast and Lunch or Dinner', '****', '$$$$', 'testGuest'),
(500, 'Lollipop Woods', 'Executive Suite', 1, 1, 0, 'Breakfast and lunch or dinner', '****', '$$$$', 'testGuest'),
(400, 'Molasses Swamp', 'Deluxe Room 1 King/2 full', 0, 0, 0, 'Breakfast', '***', '$$$', 'testGuest'),
(300, 'Peanut Brittle House', 'Deluxe Room 1 King/2 full', 1, 1, 0, 'Breakfast', '***', '$$$', 'testGuest'),
(200, 'Peppermint Forest', 'Standard Room 1 King/2 full', 0, 0, 0, 'none', '***', '$$', 'testGuest');
(100, 'Ice Cream Sea', 'Standard Room 1 King/2 full', 1, 1, 0, 'none', '***', '$$', 'testGuest');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(128) DEFAULT NULL,
  `type` enum('underclass','upperclass','alumni','faculty') DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pass` varchar(32) DEFAULT NULL,
  `courses` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `type`, `id`, `pass`, `courses`) VALUES
('test', 'faculty', 1, '098f6bcd4621d373cade4e832627b4f6', NULL),
('testStudent', 'underclass', 3, '098f6bcd4621d373cade4e832627b4f6', NULL);
