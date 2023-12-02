-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 03:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jithin`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `logintype` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `logintype`) VALUES
('21ITR009', '21ITR009', 'student'),
('21ITR010', '21ITR010', 'student'),
('21ITR032', '21ITR032', 'student'),
('21ITR033', '21ITR033', 'student'),
('21MBR001', '21MBR001', 'student'),
('Aravindh S', '12345678', 'security'),
('Jithin', '12345678', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `perpermissions_details`
--

CREATE TABLE `perpermissions_details` (
  `ID` varchar(255) NOT NULL,
  `rollnumber` varchar(255) NOT NULL,
  `prmissiontype` varchar(255) NOT NULL,
  `leavingdatetime` varchar(255) NOT NULL,
  `returndatetime` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `contacnumber` varchar(255) NOT NULL,
  `arrival_time` varchar(255) NOT NULL DEFAULT '-',
  `status` varchar(255) NOT NULL,
  `accepted by` varchar(255) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perpermissions_details`
--

INSERT INTO `perpermissions_details` (`ID`, `rollnumber`, `prmissiontype`, `leavingdatetime`, `returndatetime`, `place`, `reason`, `contacnumber`, `arrival_time`, `status`, `accepted by`) VALUES
('655ce63ada6ae', '21ITR032', 'Evening Permission', '2023-11-21T22:47', '2023-11-21T12:47', 'KEC', 'Dinner', '1234567890', '2023-11-30 10:52:29am', 'ACCEPTED', 'Jithin'),
('65685ab6f4026', '21ITR032', 'Sick Permission', '2023-11-30T15:19', '2023-12-01T15:19', 'KEC', 'Sick', '1234567890', '-', '', 'Jithin');

-- --------------------------------------------------------

--
-- Table structure for table `sick_details`
--

CREATE TABLE `sick_details` (
  `id` int(11) NOT NULL,
  `rollnumber` varchar(255) DEFAULT NULL,
  `permissiontime` datetime DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `contactnumber` varchar(15) DEFAULT NULL,
  `roomnumber` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sick_details`
--

INSERT INTO `sick_details` (`id`, `rollnumber`, `permissiontime`, `reason`, `contactnumber`, `roomnumber`) VALUES
(1, '21ITR032', '2023-12-02 12:30:00', 'Fever', '1234567890', '403');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `studentname` varchar(255) NOT NULL,
  `rollnumber` varchar(255) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `father/guardianname` varchar(255) NOT NULL,
  `father/guardiannumber` varchar(255) NOT NULL,
  `roomnumber` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`studentname`, `rollnumber`, `dateofbirth`, `stream`, `branch`, `father/guardianname`, `father/guardiannumber`, `roomnumber`, `address`) VALUES
('Ashwath K', '21ITR009', '2004-05-09', 'B-Tech', 'IT', 'Krishnamoorthy', '1234567890', '689', 'Chennimalai'),
('Avinash E', '21ITR010', '2003-10-01', 'B-Tech', 'IT', 'Elavarasu', '987654321', '202', 'Erode,…,India'),
('Gowrishankar D J', '21ITR032', '2023-11-09', 'B-Tech', 'IT', 'DJ', '1234567890', '102', 'Erode,...,India'),
('Guru Prasad B C', '21ITR033', '2003-08-13', 'B-Tech', 'IT', 'BC', '9876543321', '402', 'Tiruppur,...,India'),
('Kumar', '21MBR001', '2023-11-07', 'MBA', '', 'Kumar', '6478483990', '501', 'Erode,...,India');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `sick_details`
--
ALTER TABLE `sick_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`rollnumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sick_details`
--
ALTER TABLE `sick_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
