-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2013 at 10:21 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `y`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE IF NOT EXISTS `admin_info` (
  `admin_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(8) DEFAULT NULL,
  `admin_password` varchar(8) DEFAULT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`admin_info_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_info_id`, `admin_username`, `admin_password`, `firstname`, `lastname`) VALUES
(1, 'jennilyn', 'jennilyn', 'jennilyn', 'orion');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE IF NOT EXISTS `film` (
  `film_id` int(11) NOT NULL AUTO_INCREMENT,
  `film_title` varchar(50) DEFAULT NULL,
  `thriller` varchar(10000) DEFAULT NULL,
  `film_price` int(3) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `date_added` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`film_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=147 ;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`film_id`, `film_title`, `thriller`, `film_price`, `genre`, `stock`, `date_added`) VALUES
(143, 'mr. bean the movie(series)', 'ffgffgfgfgfgfgfgfgfgfgfgfgfg', 30, 'COMEDY', 0, 'May/26/2013 11:11:38'),
(144, 'the grude', 'fsfdfdfdfdfdfdffdfdfdfdfdf', 50, 'HORROR', 0, 'May/26/2013 11:12:33'),
(145, 'carrie', 'hhahahahahahahahahah', 45, 'ACTION', 0, 'May/26/2013 11:12:50'),
(146, 'the castle ||', 'nananannananannanaanna', 20, 'ROMANCE', 6, 'May/26/2013 11:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `cash` int(11) DEFAULT NULL,
  `total_payment` int(11) DEFAULT NULL,
  `money_change` int(11) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `cash`, `total_payment`, `money_change`) VALUES
(17, 100, 75, 25),
(18, 100, 65, 35),
(19, 100, 65, 35),
(20, 100, 50, 50),
(21, 100, 50, 50),
(22, 500, 50, 450),
(23, 50, 20, 30),
(24, 30, 20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `date_register` varchar(50) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=170 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `address`, `username`, `password`, `date_register`, `status`) VALUES
(166, 'Jennilyn', 'Orion', 'Katipunan Abuyog,Leyte', 'abcdefghijklmnopqrstuvwxyz', 'abcdefghijklmnopqrstuvwxyz', 'May/26/2013', 'OFF'),
(167, 'Marejean', 'Perpinosa', 'Balinsasayao Abuyog,Leyte', 'mj', 'mj', 'May/26/2013', 'OFF'),
(168, 'Maria', 'Magdalena', 'Ambot Abuyog,Leyte', 'ma', 'ma', 'May/26/2013', 'OFF'),
(169, 'k', 'k', 'k Abuyog,Leyte', 'k', 'k', 'May/26/2013', 'ON');

-- --------------------------------------------------------

--
-- Table structure for table `user_to_film`
--

CREATE TABLE IF NOT EXISTS `user_to_film` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `film_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_buy` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `link_to_film` (`film_id`),
  KEY `link_to_user` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `user_to_film`
--

INSERT INTO `user_to_film` (`id`, `film_id`, `user_id`, `date_buy`, `status`) VALUES
(52, 143, 166, 'May/26/2013', 'TAPOS NA PAGDILIVER'),
(53, 145, 166, 'May/26/2013', 'TAPOS NA PAGDILIVER'),
(54, 145, 166, 'May/26/2013', 'TAPOS NA PAGDILIVER'),
(55, 146, 166, 'May/26/2013', 'TAPOS NA PAGDILIVER'),
(56, 146, 167, 'May/26/2013', 'TAPOS NA PAGDILIVER'),
(57, 145, 167, 'May/26/2013', 'TAPOS NA PAGDILIVER'),
(58, 146, 168, 'May/26/2013', 'TAPOS NA PAGDILIVER'),
(59, 143, 168, 'May/26/2013', 'TAPOS NA PAGDILIVER'),
(60, 143, 169, 'May/26/2013', 'TAPOS NA PAGDILIVER'),
(61, 146, 169, 'May/26/2013', 'TAPOS NA PAGDILIVER'),
(62, 143, 169, 'May/26/2013', 'TAPOS NA PAGDILIVER'),
(63, 146, 169, 'May/26/2013', 'TAPOS NA PAGDILIVER'),
(64, 146, 169, 'May/26/2013', 'TAPOS NA PAGDILIVER'),
(65, 146, 169, 'May/26/2013', 'TAPOS NA PAGDILIVER');

-- --------------------------------------------------------

--
-- Table structure for table `user_to_payments`
--

CREATE TABLE IF NOT EXISTS `user_to_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `date_pay` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `payment_id` (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `user_to_payments`
--

INSERT INTO `user_to_payments` (`id`, `user_id`, `payment_id`, `date_pay`) VALUES
(17, 166, 17, 'May/26/2013'),
(18, 166, 18, 'May/26/2013'),
(19, 167, 19, 'May/26/2013'),
(20, 168, 20, 'May/26/2013'),
(21, 169, 21, 'May/26/2013'),
(22, 169, 22, 'May/26/2013'),
(23, 169, 23, 'May/26/2013'),
(24, 169, 24, 'May/26/2013');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_to_film`
--
ALTER TABLE `user_to_film`
  ADD CONSTRAINT `link_to_film` FOREIGN KEY (`film_id`) REFERENCES `film` (`film_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `link_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_to_payments`
--
ALTER TABLE `user_to_payments`
  ADD CONSTRAINT `user_to_payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_to_payments_ibfk_2` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`payment_id`) ON DELETE CASCADE ON UPDATE CASCADE;
