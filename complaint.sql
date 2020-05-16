-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 07:42 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complaint`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `fullName` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `image` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `fullName`, `password`, `image`) VALUES
(1, 'Admin', 'Abdulaziz Ansari', '21232f297a57a5a743894a0e4a801fc3', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(55) NOT NULL,
  `description` varchar(255) NOT NULL,
  `creationDate` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `description`, `creationDate`) VALUES
(1, 'Electricity issue', 'Electricity issue ', '2020-01-05 17:48:30.623732'),
(3, 'Water issue', 'In this category, All the water related issues will be collected', '2020-01-15 05:13:59.269093'),
(4, 'Faculty Issue', 'faculty issues goes here...', '2020-01-04 04:17:59.142812');

-- --------------------------------------------------------

--
-- Table structure for table `complaintremark`
--

CREATE TABLE `complaintremark` (
  `id` int(11) NOT NULL,
  `complaintNo` int(55) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaintremark`
--

INSERT INTO `complaintremark` (`id`, `complaintNo`, `status`, `remark`, `remarkDate`) VALUES
(1, 3, 'in process', 'your complaint is being processed', '2020-01-13 06:06:21'),
(2, 3, 'in process', 'your request is in process. kindly have patience', '2020-01-14 07:21:59'),
(3, 3, 'closed', 'Done', '2020-01-14 07:26:59'),
(4, 2, 'in process', 'your complaint is being processed..', '2020-01-14 07:29:26'),
(5, 2, 'closed', 'Your complaint has been resolved', '2020-01-14 07:30:40'),
(6, 4, 'in process', 'wait...', '2020-01-14 07:31:58'),
(7, 4, 'closed', 'Request done', '2020-01-14 07:39:24'),
(8, 6, 'closed', 'Request processed successfully...', '2020-01-14 07:41:46'),
(9, 6, 'in process', 'in process', '2020-01-14 07:43:06'),
(10, 7, 'in process', 'request is in pending', '2020-01-14 07:45:56'),
(11, 5, 'in process', 'complaint is in process ', '2020-01-14 07:55:58'),
(12, 8, 'in process', 'work is being done over your complaint', '2020-01-14 15:36:32'),
(13, 8, 'closed', 'Your issue has been resolved', '2020-01-14 15:38:04'),
(14, 9, 'in process', 'in process, wait for awhile', '2020-01-15 05:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaintNo` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `complaint_title` varchar(255) NOT NULL,
  `complaint_type` varchar(255) NOT NULL,
  `complaint_detail` mediumtext NOT NULL,
  `complaint_file` varchar(255) NOT NULL,
  `rgdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(55) DEFAULT NULL,
  `lastUpdation` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complaintNo`, `user_id`, `category_id`, `department`, `complaint_title`, `complaint_type`, `complaint_detail`, `complaint_file`, `rgdDate`, `status`, `lastUpdation`) VALUES
(1, 1, 1, 'CS', 'demo title', 'Complaint', 'demo complaint description', 'N/A', '2020-01-08 18:37:59', 'in process', '2020-01-14 05:12:23'),
(2, 1, 1, 'CS', 'water issue', 'Complaint', 'we are having water issue since many days kindly solve the issue as soon as possible', 'building.jpg', '2020-01-08 18:39:28', 'closed', '2020-01-14 07:30:40'),
(3, 1, 4, 'English', 'New issue for english dprtmnt', 'Complaint', 'english deprtment isssuee', 'N/A', '2020-01-12 06:10:15', 'closed', '2020-01-14 07:26:59'),
(4, 1, 1, 'BBA', 'BBA issue', 'Complaint', 'issue in bba ', 'Microsoft-bosque-programming-language.jpg', '2020-01-12 06:13:45', 'closed', '2020-01-14 07:39:24'),
(5, 1, 1, 'Commerce', 'Exam form issue', 'General Query', 'exam form issue', 'N/A', '2020-01-13 12:38:12', 'in process', '2020-01-14 07:55:58'),
(6, 2, 4, 'BBA', 'Point Bus issue', 'Complaint', 'we are having issue with the point bus', 'Capture.PNG', '2020-01-13 17:09:00', 'in process', '2020-01-14 07:43:06'),
(7, 2, 4, 'Commerce', 'general query Title', 'General Query', 'this is the detail of the complaint', 'N/A', '2020-01-14 07:44:33', 'in process', '2020-01-14 07:45:56'),
(8, 2, 4, 'Commerce', 'No teacher since 4 days', 'Complaint', 'there is no teacher here in our commerce department', 'N/A', '2020-01-14 15:34:38', 'closed', '2020-01-14 15:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `crreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `department`, `crreationDate`, `updationDate`) VALUES
(1, 'Computer Science', '2020-01-05 17:47:27', '2020-01-14 19:00:00'),
(2, 'Commerce', '2020-01-05 17:47:27', '2020-01-06 19:00:00'),
(4, 'English', '2020-01-05 18:45:07', '2020-01-06 19:00:00'),
(5, 'BBA', '2020-01-07 08:33:18', '2020-01-06 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `profilePhoto` varchar(255) NOT NULL,
  `regDate` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updationDate` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fullName`, `email`, `password`, `department`, `profilePhoto`, `regDate`, `updationDate`) VALUES
(1, 'Ansari', 'abdulaziz@gmail.com', 'd861e207ca85f7e171d3225d4a4536cd', '', '', '2020-01-02 13:02:27.441476', '0000-00-00 00:00:00.000000'),
(2, 'Shahid Raza', 'shahid@gmail.com', 'f3224d90c778d5e456b49c75f85dd668', '', '', '2020-01-03 14:14:58.615533', '0000-00-00 00:00:00.000000'),
(3, 'Ali Raza', 'ali@gmail.com', '86318e52f5ed4801abe1d13d509443de', '', '', '2020-01-14 15:45:07.011276', '0000-00-00 00:00:00.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `complaintremark`
--
ALTER TABLE `complaintremark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaintNo`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complaintremark`
--
ALTER TABLE `complaintremark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaintNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
