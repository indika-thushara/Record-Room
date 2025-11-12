-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2025 at 05:32 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `filescount` ()   BEGIN
SELECT COUNT(*) AS filescount FROM files;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `filesGetBackOff` ()   BEGIN
SELECT * FROM files WHERE getBackOfficeOn > 0000-00-00 AND ReceivedBackToRROn = 0000-00-00;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `filestobedistroid` ()   BEGIN
SELECT * FROM files WHERE timestampdiff(year,fileClosedOn,curdate()) > 12 AND fileDistroiedOn = '0000-00-00';
end$$

DELIMITER ;

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
  `fileClosedOn` date DEFAULT NULL,
  `ReceivedRROn` date DEFAULT NULL,
  `getBackOfficeOn` date DEFAULT NULL,
  `departmentName` varchar(100) NOT NULL,
  `officerName` varchar(100) NOT NULL,
  `ReceivedBackToRROn` date DEFAULT NULL,
  `cellNo` int(3) NOT NULL,
  `rackNo` int(3) NOT NULL,
  `fileDistroiedOn` date DEFAULT NULL,
  `Note` text NOT NULL,
  `fileTypeId` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`fileNumber`, `fileName`, `fileClosedOn`, `ReceivedRROn`, `getBackOfficeOn`, `departmentName`, `officerName`, `ReceivedBackToRROn`, `cellNo`, `rackNo`, `fileDistroiedOn`, `Note`, `fileTypeId`) VALUES
('BA/65/2022', 'G.K. Samantha Godagama', '2022-06-10', '2022-07-04', '2022-09-22', 'Engineer', 'jayalath', '2022-09-28', 5, 3, '0000-00-00', 'test note', 3),
('CSS/10/GD/03/310/ZUD/S/21/2025/1', 'Test File name 01', '2024-11-01', '2024-12-02', '2025-09-01', 'sec', 'jayalath', '0000-00-00', 5, 2, '0000-00-00', 'This is a test file entry edited 2', 1),
('SD/81/2022', 'W.K.A. Guruge', '2023-04-10', '0000-00-00', '0000-00-00', '', '', '0000-00-00', 5, 2, '0000-00-00', '', 2),
('v/2000', 'Vouchers of Year 2000', '2000-12-31', '2001-01-10', '0000-00-00', '', '', '0000-00-00', 2, 5, '0000-00-00', '2000 වර්ෂයේ ගෙවීම් වව්චර', 5),
('v/2001', 'Vouchers of Year 2001', '2001-12-31', '2002-01-25', '2003-05-10', 'Accountant', 'Gamage', '0000-00-00', 0, 0, '2020-10-12', '', 5);

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
(3, 'Building Application', 'Building Application File'),
(4, 'Personal File', 'Employee Personal File'),
(5, 'Voucher File', 'Bundle of voucher');

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

--
-- Dumping data for table `sdba`
--

INSERT INTO `sdba` (`fileNumber`, `applicantIdNo`, `assesmentNo`, `ward`, `street`, `approvedOn`) VALUES
('BA/65/2022', '198685472122', '45/2', 'Ward02', 'New Lane', '2022-07-10'),
('SD/81/2022', '198525648536', '222/A', 'Ward01', 'New Street', '2022-03-10');

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
(1, 'Indika', 'Admin', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(2, 'Amal', 'Viewer', '4fc82b26aecb47d2868c4efbe3581732a3e7cbcc6c2efb32062c08170a05eeb8'),
(3, 'Kamal', 'Editor', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b'),
(5, 'Shani', 'Viewer', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855');

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
  MODIFY `fileTypeId` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `FKsd` FOREIGN KEY (`fileNumber`) REFERENCES `files` (`fileNumber`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
