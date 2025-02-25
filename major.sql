-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 12:07 PM
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
-- Database: `major`
--

-- --------------------------------------------------------

--
-- Table structure for table `chreceive`
--

CREATE TABLE `chreceive` (
  `sno` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `filesize` int(200) NOT NULL,
  `filetype` varchar(100) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` varchar(200) NOT NULL,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `fileID` varchar(50) NOT NULL,
  `priority` enum('High','Medium','Low') DEFAULT 'Low',
  `status` enum('Pending','Accepted','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chsend`
--

CREATE TABLE `chsend` (
  `sno` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `filesize` int(200) NOT NULL,
  `filetype` varchar(100) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` varchar(200) NOT NULL,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `fileID` varchar(50) NOT NULL,
  `seen_status` tinyint(1) DEFAULT 0,
  `priority` enum('High','Medium','Low') DEFAULT 'Low',
  `status` enum('Pending','Accepted','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `csitreceive`
--

CREATE TABLE `csitreceive` (
  `sno` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `filesize` int(200) NOT NULL,
  `filetype` varchar(100) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` varchar(200) NOT NULL,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `fileID` varchar(50) NOT NULL,
  `priority` enum('High','Medium','Low') DEFAULT 'Low',
  `status` enum('Pending','Accepted','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `csitreceive`
--

INSERT INTO `csitreceive` (`sno`, `filename`, `filesize`, `filetype`, `upload_date`, `description`, `from`, `to`, `fileID`, `priority`, `status`) VALUES
(40, 'ML project file final.pdf', 699307, 'application/pdf', '2024-12-15 22:23:49', 'ec to csit', 'EC', 'CSIT', '123', 'Low', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `csitsend`
--

CREATE TABLE `csitsend` (
  `sno` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `filesize` int(200) NOT NULL,
  `filetype` varchar(100) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` varchar(200) NOT NULL,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `fileID` varchar(50) NOT NULL,
  `seen_status` tinyint(1) DEFAULT 0,
  `priority` enum('High','Medium','Low') DEFAULT 'Low',
  `status` enum('Pending','Accepted','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `csitsend`
--

INSERT INTO `csitsend` (`sno`, `filename`, `filesize`, `filetype`, `upload_date`, `description`, `from`, `to`, `fileID`, `seen_status`, `priority`, `status`) VALUES
(33, 'ML project file final.pdf', 699307, 'application/pdf', '2024-12-15 22:16:48', 'test 1', 'CSIT', 'ME', '12', 1, 'High', 'Accepted'),
(34, 'ML project file final.pdf', 699307, 'application/pdf', '2024-12-16 03:36:34', 'test 5', 'CSIT', 'EC', '123', 0, 'Medium', 'Accepted'),
(35, 'ML project file final.pdf', 699307, 'application/pdf', '2024-12-16 03:43:08', 'test 5', 'CSIT', 'EC', '123', 0, 'Medium', 'Accepted'),
(36, 'ML project file final.pdf', 699307, 'application/pdf', '2024-12-16 03:45:50', 'test 5', 'CSIT', 'EC', '123', 0, 'Medium', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `ecreceive`
--

CREATE TABLE `ecreceive` (
  `sno` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `filesize` int(200) NOT NULL,
  `filetype` varchar(100) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` varchar(200) NOT NULL,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `fileID` varchar(50) NOT NULL,
  `priority` enum('High','Medium','Low') DEFAULT 'Low',
  `status` enum('Pending','Accepted','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ecreceive`
--

INSERT INTO `ecreceive` (`sno`, `filename`, `filesize`, `filetype`, `upload_date`, `description`, `from`, `to`, `fileID`, `priority`, `status`) VALUES
(23, 'ML project file final.pdf', 699307, 'application/pdf', '2024-12-15 22:22:04', 'test 2 ME to EC duplicate file ', 'ME', 'EC', '12', 'Medium', 'Rejected'),
(24, 'ML project file final.pdf', 699307, 'application/pdf', '2024-12-16 03:36:34', 'test 5', 'CSIT', 'EC', '123', 'Medium', 'Accepted'),
(25, 'ML project file final.pdf', 699307, 'application/pdf', '2024-12-16 03:43:08', 'test 5', 'CSIT', 'EC', '123', 'Medium', 'Accepted'),
(26, 'ML project file final.pdf', 699307, 'application/pdf', '2024-12-16 03:45:50', 'test 5', 'CSIT', 'EC', '123', 'Medium', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `ecsend`
--

CREATE TABLE `ecsend` (
  `sno` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `filesize` int(200) NOT NULL,
  `filetype` varchar(100) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` varchar(200) NOT NULL,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `fileID` varchar(50) NOT NULL,
  `seen_status` tinyint(1) DEFAULT 0,
  `priority` enum('High','Medium','Low') DEFAULT 'Low',
  `status` enum('Pending','Accepted','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ecsend`
--

INSERT INTO `ecsend` (`sno`, `filename`, `filesize`, `filetype`, `upload_date`, `description`, `from`, `to`, `fileID`, `seen_status`, `priority`, `status`) VALUES
(3, 'ML project file final.pdf', 699307, 'application/pdf', '2024-12-15 22:23:49', 'ec to csit', 'EC', 'CSIT', '123', 1, 'Low', 'Accepted'),
(4, 'ML project file final.pdf', 699307, 'application/pdf', '2024-12-15 22:25:35', 'test 3 duplicate', 'EC', 'EI', '123', 1, 'Medium', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `eereceive`
--

CREATE TABLE `eereceive` (
  `sno` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `filesize` int(200) NOT NULL,
  `filetype` varchar(100) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` varchar(200) NOT NULL,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `fileID` varchar(50) NOT NULL,
  `priority` enum('High','Medium','Low') DEFAULT 'Low',
  `status` enum('Pending','Accepted','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eesend`
--

CREATE TABLE `eesend` (
  `sno` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `filesize` int(200) NOT NULL,
  `filetype` varchar(100) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` varchar(200) NOT NULL,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `fileID` varchar(50) NOT NULL,
  `seen_status` tinyint(1) DEFAULT 0,
  `priority` enum('High','Medium','Low') DEFAULT 'Low',
  `status` enum('Pending','Accepted','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eireceive`
--

CREATE TABLE `eireceive` (
  `sno` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `filesize` int(200) NOT NULL,
  `filetype` varchar(100) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` varchar(200) NOT NULL,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `fileID` varchar(50) NOT NULL,
  `priority` enum('High','Medium','Low') DEFAULT 'Low',
  `status` enum('Pending','Accepted','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eireceive`
--

INSERT INTO `eireceive` (`sno`, `filename`, `filesize`, `filetype`, `upload_date`, `description`, `from`, `to`, `fileID`, `priority`, `status`) VALUES
(4, 'ML project file final.pdf', 699307, 'application/pdf', '2024-12-15 22:25:35', 'test 3 duplicate', 'EC', 'EI', '123', 'Medium', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `eisend`
--

CREATE TABLE `eisend` (
  `sno` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `filesize` int(200) NOT NULL,
  `filetype` varchar(100) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` varchar(200) NOT NULL,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `fileID` varchar(50) NOT NULL,
  `seen_status` tinyint(1) DEFAULT 0,
  `priority` enum('High','Medium','Low') DEFAULT 'Low',
  `status` enum('Pending','Accepted','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mereceive`
--

CREATE TABLE `mereceive` (
  `sno` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `filesize` int(200) NOT NULL,
  `filetype` varchar(100) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` varchar(200) NOT NULL,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `fileID` varchar(50) NOT NULL,
  `priority` enum('High','Medium','Low') DEFAULT 'Low',
  `status` enum('Pending','Accepted','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mereceive`
--

INSERT INTO `mereceive` (`sno`, `filename`, `filesize`, `filetype`, `upload_date`, `description`, `from`, `to`, `fileID`, `priority`, `status`) VALUES
(5, 'ML project file final.pdf', 699307, 'application/pdf', '2024-12-15 22:16:48', 'test 1', 'CSIT', 'ME', '12', 'High', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `mesend`
--

CREATE TABLE `mesend` (
  `sno` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `filesize` int(200) NOT NULL,
  `filetype` varchar(100) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` varchar(200) NOT NULL,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `fileID` varchar(50) NOT NULL,
  `seen_status` tinyint(1) DEFAULT 0,
  `priority` enum('High','Medium','Low') DEFAULT 'Low',
  `status` enum('Pending','Accepted','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mesend`
--

INSERT INTO `mesend` (`sno`, `filename`, `filesize`, `filetype`, `upload_date`, `description`, `from`, `to`, `fileID`, `seen_status`, `priority`, `status`) VALUES
(10, 'ML project file final.pdf', 699307, 'application/pdf', '2024-12-15 22:22:04', 'test 2 ME to EC duplicate file ', 'ME', 'EC', '12', 1, 'Medium', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `name`, `password`) VALUES
(1, 'CSIT', 'CSIT1234'),
(2, 'EC', 'EC1234'),
(3, 'EI', 'EI1234'),
(4, 'EE', 'ME1234'),
(5, 'CH', 'CH1234'),
(6, 'ME', 'ME1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chreceive`
--
ALTER TABLE `chreceive`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `chsend`
--
ALTER TABLE `chsend`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `csitreceive`
--
ALTER TABLE `csitreceive`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `csitsend`
--
ALTER TABLE `csitsend`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `ecreceive`
--
ALTER TABLE `ecreceive`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `ecsend`
--
ALTER TABLE `ecsend`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `eereceive`
--
ALTER TABLE `eereceive`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `eesend`
--
ALTER TABLE `eesend`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `eireceive`
--
ALTER TABLE `eireceive`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `eisend`
--
ALTER TABLE `eisend`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `mereceive`
--
ALTER TABLE `mereceive`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `mesend`
--
ALTER TABLE `mesend`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chreceive`
--
ALTER TABLE `chreceive`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chsend`
--
ALTER TABLE `chsend`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `csitreceive`
--
ALTER TABLE `csitreceive`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `csitsend`
--
ALTER TABLE `csitsend`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `ecreceive`
--
ALTER TABLE `ecreceive`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `ecsend`
--
ALTER TABLE `ecsend`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `eereceive`
--
ALTER TABLE `eereceive`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `eesend`
--
ALTER TABLE `eesend`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eireceive`
--
ALTER TABLE `eireceive`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `eisend`
--
ALTER TABLE `eisend`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mereceive`
--
ALTER TABLE `mereceive`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mesend`
--
ALTER TABLE `mesend`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
