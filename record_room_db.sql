-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2025 at 05:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `summary` ()   BEGIN
SELECT t.fileType, COUNT(*) FROM files f INNER JOIN file_type t on f.fileTypeId = t.fileTypeId WHERE 1 group by t.fileType;
END$$

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
('BA001/2018', 'P K ABERATHNA', '2018-12-31', '2023-05-30', '0000-00-00', '', '', '0000-00-00', 25, 2, '0000-00-00', '', 3),
('BA002/2015', 'M F M RISHAM', '2015-07-30', '2020-09-30', '0000-00-00', '', '', '0000-00-00', 25, 2, '0000-00-00', '', 3),
('BA002/2018', 'MAHINDASIRI RANAWEERA', '2018-06-08', '2023-05-30', '2025-01-10', 'Engineering', 'jayalath', '0000-00-00', 25, 2, '0000-00-00', '', 3),
('BA003/2015', 'T T BOGODAGE', '2016-05-30', '2021-09-30', '0000-00-00', '', '', '0000-00-00', 25, 2, '0000-00-00', '', 3),
('BA004/2015', 'M P O DE SILVA', '2015-09-27', '2020-09-30', '0000-00-00', '', '', '0000-00-00', 25, 2, '0000-00-00', '', 3),
('BA005/2015', 'W D THAMINDA SAMAN KUMARA', '2015-08-20', '2020-09-30', '0000-00-00', '', '', '0000-00-00', 25, 2, '0000-00-00', '', 3),
('BA005/2018', 'PRATHAPA SAYAKKARAGE DINESH CHAMARA', '2018-04-19', '2023-05-30', '0000-00-00', '', '', '0000-00-00', 25, 2, '0000-00-00', '', 3),
('BA006/2015', 'L R KUMARA ABENAYAKA', '2015-08-01', '2020-09-30', '0000-00-00', '', '', '0000-00-00', 26, 2, '0000-00-00', '', 3),
('BA006/2018', 'A G LESLI', '2018-08-30', '2023-09-30', '0000-00-00', '', '', '0000-00-00', 26, 2, '0000-00-00', '', 3),
('BA007/2015', 'DUMINDA KULATHUNGA', '2015-06-18', '2020-12-20', '0000-00-00', '', '', '0000-00-00', 26, 2, '0000-00-00', '', 3),
('BA007/2018', 'K DEWARAJA', '2018-05-30', '2023-06-30', '0000-00-00', '', '', '0000-00-00', 26, 2, '0000-00-00', '', 3),
('BA008/2018', 'N L NADISHA DILHANI', '2018-06-27', '2023-09-30', '0000-00-00', '', '', '0000-00-00', 26, 2, '0000-00-00', '', 3),
('BA009/2015', 'INDI PUJITHA GUNAWARDANA', '2016-01-20', '2021-04-30', '0000-00-00', '', '', '0000-00-00', 26, 2, '0000-00-00', '', 3),
('BA010/2015', 'V M T P SIRIWARDANA', '2016-05-30', '2021-06-30', '0000-00-00', '', '', '0000-00-00', 26, 2, '0000-00-00', '', 3),
('BA010/2018', 'C T AMARASINHA', '2018-11-30', '2023-12-20', '0000-00-00', '', '', '0000-00-00', 26, 2, '0000-00-00', '', 3),
('BA021/2011', 'YASANTHA GAMEGE', '2011-06-16', '2021-09-30', '0000-00-00', '', '', '0000-00-00', 26, 2, '0000-00-00', '', 3),
('BA035/2012', 'I H GAYAN VINEETHA', '2012-11-22', '2023-11-30', '0000-00-00', '', '', '0000-00-00', 25, 2, '0000-00-00', '', 3),
('BA154/2010', 'M G CHANDRANGANI', '2010-07-19', '2023-05-30', '0000-00-00', '', '', '0000-00-00', 26, 2, '0000-00-00', '', 3),
('CSS/10/GD/03/310/ZUD/S/21/2025/1', 'Test File name 01', '2024-11-01', '0000-00-00', '0000-00-00', '', '', '0000-00-00', 26, 2, '0000-00-00', 'This is a test file entry', 1),
('P122', 'D. Jayalath', '0000-00-00', '2025-05-04', '0000-00-00', '', '', '0000-00-00', 10, 1, '0000-00-00', '', 5),
('P152', 'G. Mangalika', '0000-00-00', '2025-05-04', '0000-00-00', '', '', '0000-00-00', 11, 1, '0000-00-00', '', 5),
('P222', 'R.S. Ranjith', '0000-00-00', '2025-05-04', '0000-00-00', '', '', '0000-00-00', 10, 1, '0000-00-00', '', 5),
('P242', 'A.M. Munasinghe', '0000-00-00', '2025-04-08', '0000-00-00', '', '', '0000-00-00', 10, 1, '0000-00-00', '', 5),
('P253', 'W. Senarath', '0000-00-00', '2025-05-04', '0000-00-00', '', '', '0000-00-00', 11, 1, '0000-00-00', '', 5),
('P285', 'W.G.A. Malani', '0000-00-00', '2025-04-08', '0000-00-00', '', '', '0000-00-00', 10, 1, '0000-00-00', '', 5),
('P303', 'S. Rathnapala', '0000-00-00', '2025-06-04', '0000-00-00', '', '', '0000-00-00', 10, 1, '0000-00-00', '', 5),
('P322', 'G. Sarath', '0000-00-00', '2025-05-04', '0000-00-00', '', '', '0000-00-00', 10, 1, '0000-00-00', '', 5),
('P324', 'R.W. Wimalawathi', '0000-00-00', '2025-04-08', '0000-00-00', '', '', '0000-00-00', 10, 1, '0000-00-00', '', 5),
('P378', 'E. Ranji', '0000-00-00', '2025-05-04', '0000-00-00', '', '', '0000-00-00', 10, 1, '0000-00-00', '', 5),
('P389', 'M. Mathupala', '0000-00-00', '2025-06-10', '0000-00-00', '', '', '0000-00-00', 11, 1, '0000-00-00', '', 5),
('P412', 'B. Pathirana', '0000-00-00', '2025-05-04', '0000-00-00', '', '', '0000-00-00', 11, 1, '0000-00-00', '', 5),
('P422', 'V.K. Gunasena', '0000-00-00', '2025-05-04', '0000-00-00', '', '', '0000-00-00', 11, 1, '0000-00-00', '', 5),
('P442', 'R.T. Narada', '0000-00-00', '2025-05-04', '0000-00-00', '', '', '0000-00-00', 11, 1, '0000-00-00', '', 5),
('P452', 'L.M. Masakorala', '0000-00-00', '2025-05-04', '0000-00-00', '', '', '0000-00-00', 10, 1, '0000-00-00', '', 5),
('P512', 'W.A.G. Upul', '0000-00-00', '2025-07-04', '0000-00-00', '', '', '0000-00-00', 11, 1, '0000-00-00', '', 5),
('P522', 'H. Amali', '0000-00-00', '2025-05-04', '0000-00-00', '', '', '0000-00-00', 10, 1, '0000-00-00', '', 5),
('P562', 'G. Ramani', '0000-00-00', '2025-05-04', '0000-00-00', '', '', '0000-00-00', 10, 1, '0000-00-00', '', 5),
('P722', 'L. Lasantha', '0000-00-00', '2025-05-04', '0000-00-00', '', '', '0000-00-00', 11, 1, '0000-00-00', '', 5),
('P848', 'M.G. Godagama', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '0000-00-00', 10, 1, '0000-00-00', 'Note', 5),
('SD019/2010', 'S P P G KASUN DARSHANA', '2010-08-22', '2023-09-30', '2025-03-10', 'Engineering', 'S.K. Jagoda', '0000-00-00', 20, 2, '0000-00-00', '', 2),
('SD022/2010', 'R A N P KUMARA', '2010-05-15', '2020-06-30', '2025-02-05', 'Engineering', 'A.K. Gunasena', '0000-00-00', 20, 2, '0000-00-00', '', 2),
('SD028/2010', 'A.K. Wanigasekara', '2010-08-25', '0000-00-00', '2025-05-25', 'Engineering', 'A.K. Gunasena', '0000-00-00', 20, 2, '0000-00-00', '', 2),
('V2010-01-1-50', 'Vouchers of 2010-January-1-50', '2010-04-25', '2025-04-25', '0000-00-00', '', '', '0000-00-00', 15, 1, '0000-00-00', '', 4),
('V2010-01-51-100', 'Vouchers of 2010-January-51-100', '2010-04-25', '2025-04-25', '0000-00-00', '', '', '0000-00-00', 15, 1, '0000-00-00', '', 4),
('V2010-02-1-50', 'Vouchers of 2010-February-1-50', '2010-04-25', '2025-04-25', '0000-00-00', '', '', '0000-00-00', 15, 1, '0000-00-00', '', 4),
('V2010-02-51-100', 'Vouchers of 2010-February-51-100', '2010-04-25', '2025-04-25', '0000-00-00', '', '', '0000-00-00', 15, 1, '0000-00-00', '', 4),
('V2010-03-1-50', 'Vouchers of 2010-March-1-50', '2010-04-25', '2025-04-25', '0000-00-00', '', '', '0000-00-00', 15, 1, '0000-00-00', '', 4),
('V2010-03-101-150', 'Vouchers of 2010-March-101-150', '2010-05-10', '2025-05-10', '0000-00-00', '', '', '0000-00-00', 16, 1, '0000-00-00', '', 4),
('V2010-03-51-100', 'Vouchers of 2010-March-51-100', '2010-04-25', '2025-04-25', '0000-00-00', '', '', '0000-00-00', 16, 1, '0000-00-00', '', 4),
('V2016-06-51-100', 'Vouchers of 2016-June-51-100', '2016-05-10', '2025-05-10', '2025-04-21', 'Account', 'M.A. Saman', '0000-00-00', 16, 1, '0000-00-00', '', 4),
('V2025-03-1-50', 'Vouchers of 2025-March-1-50', '2025-04-25', '2025-04-25', '0000-00-00', '', '', '0000-00-00', 16, 1, '0000-00-00', '', 4),
('V2025-03-51-100', 'Vouchers of 2025-March-51-100', '2025-04-25', '2025-04-25', '0000-00-00', '', '', '0000-00-00', 16, 1, '0000-00-00', '', 4);

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
(4, 'Voucher', 'Voucher bundle'),
(5, 'Personal File', 'Personal File');

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
('BA002/2018', '850136330V', '85/2B', 'South West', 'New lane', '2018-09-11'),
('BA004/2015', '853236480V', '26/3', 'South', 'New lane', '2015-04-25'),
('BA005/2018', '810136280V', '68/3', 'South', 'New lane', '2018-06-22'),
('SD019/2010', '1991584528V', '85/2', 'South West', 'New lane', '2010-08-10'),
('SD028/2010', '710155330V', '85/2A', 'South West', 'New lane', '2010-09-11');

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
(2, 'Asanga', 'Editor', 'Awd@25009'),
(3, 'Thulankana', 'Editor', ''),
(4, 'Janaka', 'Editor', '');

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
  MODIFY `userId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

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
