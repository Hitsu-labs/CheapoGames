-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2017 at 01:58 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 5.6.30-5+deb.sury.org~xenial+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `V_Games`
--

-- --------------------------------------------------------

--
-- Table structure for table `Games`
--

CREATE TABLE `Games` (
  `GameID` int(255) NOT NULL,
  `Title` varchar(254) NOT NULL,
  `Summary` text NOT NULL,
  `Game_URL` text NOT NULL,
  `Picture_URL` text NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Games`
--
ALTER TABLE `Games`
  ADD PRIMARY KEY (`GameID`,`Title`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Games`
--
ALTER TABLE `Games`
  MODIFY `GameID` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
