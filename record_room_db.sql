-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2025 at 07:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `record_room_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `docId` int(11) NOT NULL,
  `fileNumber` varchar(100) NOT NULL,
  `documentName` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`docId`, `fileNumber`, `documentName`, `path`) VALUES
(1, 'CSS/10/GD/03/310/ZUD/S/21/2025/1', 'Test document 01', 'files/testdoc.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `fileNumber` varchar(100) NOT NULL,
  `fileName` varchar(200) NOT NULL,
  `fileClosedOn` date NOT NULL,
  `ReceivedRROn` date NOT NULL,
  `getBackOfficeOn` date NOT NULL,
  `departmentName` varchar(100) NOT NULL,
  `officerName` varchar(100) NOT NULL,
  `ReceivedBackToRROn` date NOT NULL,
  `cellNo` int(3) NOT NULL,
  `rackNo` int(3) NOT NULL,
  `fileDistroiedOn` date NOT NULL,
  `Note` text NOT NULL,
  `fileTypeId` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`fileNumber`, `fileName`, `fileClosedOn`, `ReceivedRROn`, `getBackOfficeOn`, `departmentName`, `officerName`, `ReceivedBackToRROn`, `cellNo`, `rackNo`, `fileDistroiedOn`, `Note`, `fileTypeId`) VALUES
('CSS/10/GD/03/310/ZUD/S/21/2025/1', 'Test File name 01', '2024-11-01', '0000-00-00', '0000-00-00', '', '', '0000-00-00', 0, 0, '0000-00-00', 'This is a test file entry', 1);

-- --------------------------------------------------------

--
-- Table structure for table `file_type`
--

CREATE TABLE `file_type` (
  `fileTypeId` int(2) NOT NULL,
  `fileType` varchar(50) NOT NULL,
  `fileTypeDes` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file_type`
--

INSERT INTO `file_type` (`fileTypeId`, `fileType`, `fileTypeDes`) VALUES
(1, 'General', 'Common files'),
(2, 'Subdivision', 'Subdivision file'),
(3, 'Building Application', 'Building Application File');

-- --------------------------------------------------------

--
-- Table structure for table `sdba`
--

CREATE TABLE `sdba` (
  `fileNumber` varchar(100) NOT NULL,
  `applicantIdNo` varchar(12) NOT NULL,
  `assesmentNo` varchar(50) NOT NULL,
  `ward` varchar(100) NOT NULL,
  `street` varchar(200) NOT NULL,
  `approvedOn` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(3) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userRole` enum('Admin','Editor','Viewer') NOT NULL DEFAULT 'Viewer',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userRole`, `password`) VALUES
(1, 'Indika', 'Admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`docId`),
  ADD KEY `FKd` (`fileNumber`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`fileNumber`),
  ADD KEY `FKft` (`fileTypeId`);

--
-- Indexes for table `file_type`
--
ALTER TABLE `file_type`
  ADD PRIMARY KEY (`fileTypeId`);

--
-- Indexes for table `sdba`
--
ALTER TABLE `sdba`
  ADD PRIMARY KEY (`fileNumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `docId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `file_type`
--
ALTER TABLE `file_type`
  MODIFY `fileTypeId` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `FKd` FOREIGN KEY (`fileNumber`) REFERENCES `files` (`fileNumber`) ON UPDATE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `FKft` FOREIGN KEY (`fileTypeId`) REFERENCES `file_type` (`fileTypeId`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `sdba`
--
ALTER TABLE `sdba`
  ADD CONSTRAINT `FKsd` FOREIGN KEY (`fileNumber`) REFERENCES `files` (`fileNumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
