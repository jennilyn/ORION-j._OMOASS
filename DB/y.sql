-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2013 at 10:31 AM
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
  `film_price` int(3) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `date_added` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`film_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=127 ;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`film_id`, `film_title`, `film_price`, `genre`, `stock`, `date_added`) VALUES
(120, 'ASWANG 2', 40, 'HORROR', 2, 'May/24/2013 08:33:33'),
(121, 'a', 20, 'HORROR', 8, 'May/24/2013 08:34:16'),
(122, 'b', 30, 'HORROR', 7, 'May/24/2013 08:34:34'),
(123, 'love forgive', 40, 'ROMANCE', 18, 'May/24/2013 08:34:49'),
(124, 'ayeah', 20, 'ROMANCE', 1, 'May/24/2013 08:35:12'),
(125, 'qwerty', 15, 'COMEDY', 2, 'May/24/2013 08:35:36'),
(126, 'yuyuyu', 13, 'ACTION', 0, 'May/24/2013 08:36:09');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=121 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `cash`, `total_payment`, `money_change`) VALUES
(112, 100, 90, 10),
(113, 100, 33, 67),
(114, 200, 88, 112),
(115, 100, 40, 60),
(116, 100, 40, 60),
(117, 50, 40, 10),
(118, 50, 40, 10),
(119, 100, 70, 30),
(120, 100, 75, 25);

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
  `status` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=139 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `address`, `username`, `password`, `status`) VALUES
(136, 'Jennilyn', 'Orion', 'Katipunan Abuyog,Leyte', 'jennilyn', 'orion', 'OFF'),
(137, 'Marejean', 'Perpinosa', 'Balinsasayao Abuyog,Leyte', 'jean', 'mark', 'OFF'),
(138, 'h', 'h', 'h Abuyog,Leyte', 'h', 'h', 'ON');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=275 ;

--
-- Dumping data for table `user_to_film`
--

INSERT INTO `user_to_film` (`id`, `film_id`, `user_id`, `date_buy`, `status`) VALUES
(264, 120, 136, 'May/24/2013', 'TAPOS NA PAGDILIVER'),
(265, 122, 136, 'May/24/2013', 'TAPOS NA PAGDILIVER'),
(266, 125, 137, 'May/24/2013', 'TAPOS NA PAGDILIVER'),
(267, 124, 137, 'May/24/2013', 'TAPOS NA PAGDILIVER'),
(268, 120, 137, 'May/24/2013', 'TAPOS NA PAGDILIVER'),
(269, 120, 138, 'May/24/2013', 'HINDI PA NA DIDELIVER'),
(270, 121, 138, 'May/24/2013', 'HINDI PA NA DIDELIVER'),
(271, 123, 138, 'May/24/2013', 'HINDI PA NA DIDELIVER'),
(272, 122, 138, 'May/24/2013', 'HINDI PA NA DIDELIVER'),
(273, 125, 138, 'May/24/2013', 'HINDI PA NA DIDELIVER'),
(274, 124, 138, 'May/24/2013', 'HINDI PA NA DIDELIVER');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `user_to_payments`
--

INSERT INTO `user_to_payments` (`id`, `user_id`, `payment_id`, `date_pay`) VALUES
(58, 136, 119, 'May/24/2013'),
(59, 137, 120, 'May/24/2013');

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
