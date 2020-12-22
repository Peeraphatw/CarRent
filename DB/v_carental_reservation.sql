-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2020 at 05:23 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `v_carental`
--

-- --------------------------------------------------------

--
-- Table structure for table `v_carental_reservation`
--

CREATE TABLE `v_carental_reservation` (
  `ID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Address` varchar(45) NOT NULL,
  `Tel` varchar(10) NOT NULL,
  `Personnumber` varchar(13) NOT NULL,
  `Nickname` varchar(20) NOT NULL,
  `PathPersonnumber` varchar(100) NOT NULL,
  `PathDriver` varchar(100) NOT NULL,
  `CarSequence` varchar(45) NOT NULL,
  `Rent_Time` varchar(45) NOT NULL,
  `Return_Time` varchar(45) NOT NULL,
  `RentStatus` varchar(45) NOT NULL,
  `Biling` varchar(45) NOT NULL,
  `Actual_Return` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `v_carental_reservation`
--
ALTER TABLE `v_carental_reservation`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `v_carental_reservation`
--
ALTER TABLE `v_carental_reservation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
