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
-- Table structure for table `v_admin`
--

CREATE TABLE `v_admin` (
  `ID` int(2) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `v_admin`
--

INSERT INTO `v_admin` (`ID`, `Username`, `Password`) VALUES
(1, 'Admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `v_carental_carmanager`
--

CREATE TABLE `v_carental_carmanager` (
  `ID` int(10) NOT NULL,
  `CarSequence` varchar(45) NOT NULL,
  `Brand` varchar(45) NOT NULL,
  `Model` varchar(45) NOT NULL,
  `Year` int(4) NOT NULL,
  `Seat` int(2) NOT NULL,
  `Price` varchar(10) NOT NULL,
  `Path` varchar(100) NOT NULL,
  `Carstatus` varchar(45) NOT NULL,
  `Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `v_carental_carmanager`
--

INSERT INTO `v_carental_carmanager` (`ID`, `CarSequence`, `Brand`, `Model`, `Year`, `Seat`, `Price`, `Path`, `Carstatus`, `Type`) VALUES
(28, 'CA_5f60d3684e2b4', 'Toyota', 'Rocco', 2020, 4, '1900', 'CA_5f60d3684e2b4.png', 'Available', 'Truck'),
(29, 'CA_5f60d378c04f8', 'Toyota', 'Rocco', 2020, 4, '1900', 'CA_5f60d378c04f8.png', 'Available', 'Truck'),
(30, 'CA_5f60d387791c2', 'Toyota', 'Rocco', 2020, 4, '2000', 'CA_5f60d387791c2.jpg', 'Available', 'Truck'),
(31, 'CA_5f60d395640d7', 'Toyota', 'Rocco', 2020, 4, '1900', 'CA_5f60d395640d7.jpg', 'Available', 'Truck'),
(32, 'CA_5f60d3a46ec8c', 'Toyota', 'Fotuner', 2020, 4, '2000', 'CA_5f60d3a46ec8c.jpg', 'Available', 'SUV'),
(33, 'CA_5f60d3b5cf4b2', 'Toyota', 'Fotuner', 2020, 6, '2000', 'CA_5f60d3b5cf4b2.jpg', 'Available', 'SUV'),
(34, 'CA_5f60d4225680d', 'Benz', 'AMG', 2020, 2, '2000', 'CA_5f60d4225680d.png', 'On Rent', 'SmallCar'),
(35, 'CA_5f60d43f99373', 'BMW', 'AMG', 2020, 2, '2000', 'CA_5f60d43f99373.png', 'Available', 'SmallCar'),
(36, 'CA_5f60d45097ef5', 'Toyota', 'Camry', 2020, 4, '1900', 'CA_5f60d45097ef5.png', 'Available', 'SmallCar'),
(37, 'CA_5f60d45cc5466', 'Honda', 'Civic', 2020, 4, '2000', 'CA_5f60d45cc5466.png', 'Available', 'SmallCar'),
(38, 'CA_5f60d49655efc', 'Toyota', 'Alphard', 2020, 6, '2000', 'CA_5f60d49655efc.png', 'Available', 'Van');

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
-- Indexes for table `v_admin`
--
ALTER TABLE `v_admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `v_carental_carmanager`
--
ALTER TABLE `v_carental_carmanager`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `v_carental_reservation`
--
ALTER TABLE `v_carental_reservation`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `v_admin`
--
ALTER TABLE `v_admin`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `v_carental_carmanager`
--
ALTER TABLE `v_carental_carmanager`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `v_carental_reservation`
--
ALTER TABLE `v_carental_reservation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
