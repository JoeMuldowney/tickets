-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 06:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `lookupcategory`
--

CREATE TABLE `lookupcategory` (
  `Id` int(25) NOT NULL,
  `Category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lookupcategory`
--

INSERT INTO `lookupcategory` (`Id`, `Category`) VALUES
(1, 'Computer'),
(2, 'Refer'),
(3, 'Sound'),
(4, 'Login');

-- --------------------------------------------------------

--
-- Table structure for table `lookuplocation`
--

CREATE TABLE `lookuplocation` (
  `Id` int(11) NOT NULL,
  `Location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lookuplocation`
--

INSERT INTO `lookuplocation` (`Id`, `Location`) VALUES
(0, 'Office'),
(1, 'Offsite');

-- --------------------------------------------------------

--
-- Table structure for table `lookuppriority`
--

CREATE TABLE `lookuppriority` (
  `Id` int(11) NOT NULL,
  `Priority` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lookuppriority`
--

INSERT INTO `lookuppriority` (`Id`, `Priority`) VALUES
(1, 'Low'),
(2, 'Med'),
(3, 'High');

-- --------------------------------------------------------

--
-- Table structure for table `lookupstatus`
--

CREATE TABLE `lookupstatus` (
  `Id` int(11) NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lookupstatus`
--

INSERT INTO `lookupstatus` (`Id`, `Status`) VALUES
(1, 'Open'),
(2, 'Closed');

-- --------------------------------------------------------

--
-- Table structure for table `ticketinfo`
--

CREATE TABLE `ticketinfo` (
  `Id` int(11) NOT NULL,
  `Location` text NOT NULL,
  `Priority` text NOT NULL,
  `Status` text NOT NULL,
  `Description` text NOT NULL,
  `DateOpen` date NOT NULL,
  `DateUpdate` date DEFAULT NULL,
  `DateClose` date DEFAULT NULL,
  `CloseDesc` text DEFAULT NULL,
  `UserOpen` text NOT NULL,
  `UserUpdate` text DEFAULT NULL,
  `Category` text NOT NULL,
  `Image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticketinfo`
--

INSERT INTO `ticketinfo` (`Id`, `Location`, `Priority`, `Status`, `Description`, `DateOpen`, `DateUpdate`, `DateClose`, `CloseDesc`, `UserOpen`, `UserUpdate`, `Category`, `Image`) VALUES
(1, 'Office', 'High', 'Open', 'Reset my password', '2023-10-27', '2023-11-20', NULL, 'reset', 'muldowneyj', 'muldowneyj', '', ''),
(2, 'offsite', 'Med', 'Open', 'test user', '2023-10-27', '2023-11-20', NULL, 'update', 'testuser', 'muldowneyj', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lookuplocation`
--
ALTER TABLE `lookuplocation`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lookuppriority`
--
ALTER TABLE `lookuppriority`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lookupstatus`
--
ALTER TABLE `lookupstatus`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ticketinfo`
--
ALTER TABLE `ticketinfo`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ticketinfo`
--
ALTER TABLE `ticketinfo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
