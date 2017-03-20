-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2017 at 03:06 PM
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
-- Table structure for table `Account`
--

CREATE TABLE `Account` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `ID` int(255) NOT NULL,
  `Email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `Wishlist`
--

CREATE TABLE `Wishlist` (
  `AccountID` int(255) NOT NULL,
  `GameID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Account`
--
ALTER TABLE `Account`
  ADD PRIMARY KEY (`ID`,`Username`);

--
-- Indexes for table `Games`
--
ALTER TABLE `Games`
  ADD PRIMARY KEY (`GameID`,`Title`);

--
-- Indexes for table `Wishlist`
--
ALTER TABLE `Wishlist`
  ADD KEY `AccountID` (`AccountID`),
  ADD KEY `GameID` (`GameID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Account`
--
ALTER TABLE `Account`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Games`
--
ALTER TABLE `Games`
  MODIFY `GameID` int(255) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Wishlist`
--
ALTER TABLE `Wishlist`
  ADD CONSTRAINT `Wishlist_ibfk_1` FOREIGN KEY (`AccountID`) REFERENCES `Account` (`ID`),
  ADD CONSTRAINT `Wishlist_ibfk_2` FOREIGN KEY (`GameID`) REFERENCES `Games` (`GameID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;