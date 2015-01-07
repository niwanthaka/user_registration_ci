-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 07, 2015 at 06:55 AM
-- Server version: 5.5.37-0ubuntu0.13.10.1
-- PHP Version: 5.5.3-1ubuntu2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `exetel`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `username_2` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `contact_name`, `contact_phone`, `address`, `email`, `date_of_birth`, `username`, `password`, `register_date`) VALUES
(1, 'www', '0', 'www', 'test@test.com', '0000-00-00', 'wwww', 'df483402b9bfeb234717a32c6e86280e', '2015-01-06 11:43:37'),
(2, 'ee', '0', 'ree', 'test@test.com', '0000-00-00', 'eeeeee', 'cd87cd5ef753a06ee79fc75dc7cfe66c', '2015-01-06 11:48:15'),
(3, 'gaya', '0', 'asdasd', 'niwanthaka@3cs.lk', '0000-00-00', 'gopi', '96e79218965eb72c92a549dd5a330112', '2015-01-06 15:21:22'),
(4, 'gayaw22', '(071) 223-3221', 'Chilaw1', 'gayajith88@yahoo.com', '1988-08-22', 'gaya', 'e10adc3949ba59abbe56e057f20f883e', '2015-01-06 17:00:08'),
(5, '0', '0', '0', '0', '0000-00-00', '0', 'd41d8cd98f00b204e9800998ecf8427e', '2015-01-06 17:59:27'),
(13, 'dfd', '(232) 424-2433', 'sdfsdf', 'anupama@3cs.asia', '2015-01-27', 'asd2', '81dc9bdb52d04dc20036dbd8313ed055', '2015-01-07 04:00:09'),
(14, 'niwa', '(071) 221-1221', 'test address', 'test@tyyy.com', '2015-01-04', 'niwa', 'b43e6eac1f1414a9b23d5b3399f7d94c', '2015-01-07 04:33:05'),
(15, 'Dumith', '(071) 112-2123', 'Kandyan', 'dsfds@dsd.csc', '2015-01-04', 'dumi', 'd93591bdf7860e1e4ee2fca799911215', '2015-01-07 05:46:37'),
(16, 'mifas', '(123) 456-7890', 'sdsds', 'mifas@mifas.co', '2015-01-14', 'mifas', 'd2e4b9bc94dcfcf6363dab36c222efdf', '2015-01-07 06:11:06');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
