-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2015 at 11:28 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_data`
--

CREATE TABLE IF NOT EXISTS `chat_data` (
`id` int(10) NOT NULL,
  `sender` varchar(256) DEFAULT NULL,
  `receiver` varchar(256) DEFAULT NULL,
  `msg` varchar(1000) DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  `fr_chat_id` int(10) DEFAULT NULL,
  `created_at` varchar(256) DEFAULT NULL,
  `updated_at` varchar(256) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=418 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_data`
--
ALTER TABLE `chat_data`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_data`
--
ALTER TABLE `chat_data`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=418;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
