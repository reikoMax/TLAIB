-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2013 at 11:03 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `abala_TLAIB`
--

-- --------------------------------------------------------

--
-- Table structure for table `fave_places`
--

CREATE TABLE IF NOT EXISTS `fave_places` (
  `users_id` int(11) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `public` varchar(50) NOT NULL,
  `places_id` int(11) NOT NULL,
  KEY `users_id` (`users_id`),
  KEY `places_id` (`places_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fave_places`
--

INSERT INTO `fave_places` (`users_id`, `rating`, `public`, `places_id`) VALUES
(3, '4', 'no', 1),
(1, '5', 'yes', 3),
(1, '4', 'yes', 5),
(2, '4', 'no', 5),
(3, '5', 'yes', 5),
(3, '2', 'yes', 0),
(2, '5', 'yes', 5),
(2, '3', 'yes', 4),
(4, '3', 'yes', 6),
(4, '4', 'yes', 5),
(1, '5', 'no', 6),
(1, '', '', 25),
(1, '', '', 26),
(1, '', '', 27),
(1, '', '', 28),
(1, '', '', 31),
(3, '', '', 32),
(1, '', '', 35),
(1, '', '', 36),
(1, '', '', 37),
(4, '', '', 38),
(1, '', '', 39),
(4, '', '', 40),
(1, '', '', 41),
(21, '', '', 42);

-- --------------------------------------------------------

--
-- Table structure for table `places_TLAIB`
--

CREATE TABLE IF NOT EXISTS `places_TLAIB` (
  `places_id` int(12) NOT NULL AUTO_INCREMENT,
  `places_name` varchar(50) NOT NULL,
  `places_location` varchar(50) NOT NULL,
  `places_description` text NOT NULL,
  `places_classification` varchar(50) NOT NULL,
  PRIMARY KEY (`places_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `places_TLAIB`
--

INSERT INTO `places_TLAIB` (`places_id`, `places_name`, `places_location`, `places_description`, `places_classification`) VALUES
(5, 'hotel alejandro ', 'tacloban City', 'hfggggtyryt', 'hotel'),
(6, 'ddfg', 'gtfry', 'ryetusfghert', 'beach'),
(34, 'graye ', 'kyhsfyiuo', 'HGTYytg', 'huge'),
(36, 'ghrfyu', 'tyut', 'uytty', 'beach'),
(37, 'kill', 'people', 'jhgyst', 'hotel'),
(38, 'mey', 'hello`', 'to you', 'club'),
(39, 'ok ', 'adi', 'k', 'hotel'),
(41, 'hgusyt', 'yiutg', 'gijuy', 'club'),
(42, ',h.kjhk', 'kjhl', 'jklkj', 'hgigh');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `user_lastname` varchar(50) DEFAULT NULL,
  `user_address` varchar(50) DEFAULT NULL,
  `user_contact_info` int(12) DEFAULT NULL,
  `user_email_address` varchar(50) DEFAULT NULL,
  `user_username` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_lastname`, `user_address`, `user_contact_info`, `user_email_address`, `user_username`, `user_password`, `date`) VALUES
(1, 'Cherilyn', 'Abala', 'Brgy.Camvertudes Alang-Alang,Leyte', 910926789, 'aztyigsiege@gmail.com', 'anime6url_max', 'admin', '0000-00-00 00:00:00'),
(4, 'Siege', 'Capulet', 'Neo Verona', 8765765, 'neo_verona@yahoo.com', 'Siege_capulet', 'capulet', '0000-00-00 00:00:00'),
(17, 'jghiut', 'ytiytg', 'fhjhgpi', 6555679, 'lo;iy8oi@kyhiu', 'kill', 'kill', '2013-05-06 16:08:27'),
(18, 'uyiuyt', 'uyiu', 'yiiiuyh', 666685, 'jhltyhgf', 'joy', 'joy', '2013-05-07 08:52:36'),
(19, 'tripq', 'ko ', 'la', 575, 'kon@nadarait', 'may', 'may', '2013-05-07 14:12:44'),
(20, 'Reiko', 'Heike', 'brgy.dreamland', 275587, 'aztigsiege_1596@yahoo.com', 'reik', 'reik', '2013-05-08 11:11:08'),
(21, 'de', 'de', 'de', 5677, 'sdsdf', 're', 're', '2013-05-08 16:26:32');
