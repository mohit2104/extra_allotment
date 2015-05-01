-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 01, 2015 at 09:25 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mess`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `reset`()
    MODIFIES SQL DATA
    DETERMINISTIC
update student set extra = 0$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `extra`
--

CREATE TABLE IF NOT EXISTS `extra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(20) NOT NULL,
  `start_book` varchar(20) NOT NULL,
  `end_book` varchar(20) NOT NULL,
  `money` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `extra`
--

INSERT INTO `extra` (`id`, `item`, `start_book`, `end_book`, `money`) VALUES
(1, 'panner butter masala', '02:00:00', '05:00:00', 50);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` int(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `role`) VALUES
(1, 106112059, 'goyal', 'user'),
(2, 106112019, 'bipul', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `mess_details`
--

CREATE TABLE IF NOT EXISTS `mess_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caterer` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `floor` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mess_details`
--

INSERT INTO `mess_details` (`id`, `caterer`, `location`, `floor`) VALUES
(1, 'Neelkaes', 'Mega Mess 2', '1st floor'),
(2, 'sakti', 'Mega Mess 1', 'Ground Floor');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` int(20) NOT NULL,
  `mess_id` int(11) NOT NULL,
  `extra` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `code` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `username`, `mess_id`, `extra`, `balance`, `name`, `code`) VALUES
(1, 106112059, 1, 0, 850, 'Mohit Kumar Goyal', 859616),
(2, 106112019, 2, 1, 150, 'Bipul Kumar Singh', 976626);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
