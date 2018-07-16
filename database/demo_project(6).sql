-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2018 at 09:14 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_details`
--

CREATE TABLE `account_details` (
  `id` int(200) NOT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `bank_name` varchar(200) DEFAULT NULL,
  `branch_name` varchar(200) DEFAULT NULL,
  `account_no` int(200) DEFAULT NULL,
  `ifsc_code` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vendor_id` int(200) DEFAULT NULL,
  `is_delete` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_details`
--

INSERT INTO `account_details` (`id`, `full_name`, `bank_name`, `branch_name`, `account_no`, `ifsc_code`, `image`, `date`, `vendor_id`, `is_delete`) VALUES
(98, 'Pranav', 'sbi', 'huhrr', 2147483647, 'SBIN0007260', 'pexels-photo-248797.jpeg', '2018-06-04 15:57:04', 74, 1),
(99, 'GHG', 'RFGF', 'fghf', 2147483647, 'SBIN0007260', 'pexels-photo-248797.jpeg', '2018-06-04 16:04:49', 75, 0),
(100, 'Pranav', 'SBI', 'sadul ganj', 2147483647, 'SBIN0007260', 'images.jpg', '2018-06-05 11:56:28', 76, 0),
(101, 'Pranav', 'sbi', 'sadul ganj', 2147483647, 'SBIN0007260', 'pexels-photo-248797.jpeg', '2018-06-05 11:58:57', 77, 0),
(102, 'GHG', 'mehra', 'sadul ganj', 2147483647, 'SBIN0007260', 'pexels-photo-248797.jpeg', '2018-06-05 11:59:42', 78, 1),
(103, 'GHG', 'mehra', 'sadul ganj', 2147483647, 'SBIN0007260', 'imagesss.jpg', '2018-06-05 12:00:56', 79, 1),
(104, 'Pranav', 'sbi', 'FGFG', 12345678, 'SBIN0007260', 'index.html', '2018-06-06 17:01:36', 80, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(200) NOT NULL,
  `admin_name` varchar(200) DEFAULT NULL,
  `admin_email` varchar(200) DEFAULT NULL,
  `admin_password` varchar(200) DEFAULT NULL,
  `mobile` int(200) DEFAULT NULL,
  `pic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_password`, `mobile`, `pic`) VALUES
(1, 'admin1', 'admin@gmail.com', '122', 1234567834, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(200) NOT NULL,
  `project_name` varchar(200) DEFAULT NULL,
  `client_name` varchar(200) DEFAULT NULL,
  `payment` varchar(200) DEFAULT NULL,
  `is_delete` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `project_name`, `client_name`, `payment`, `is_delete`) VALUES
(1, 'Knwladege Portal', 'Bob', '5000', 0),
(2, 'Knwladege Portal', 'bob', '0', 1),
(3, 'Company Project', 'coretechies', '5000000', 1),
(4, 'Company Project', 'coretechies', '5000', 0),
(5, 'Company Project', 'coretechies', '50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(200) NOT NULL,
  `project_name` varchar(200) DEFAULT NULL,
  `client_name` varchar(200) DEFAULT NULL,
  `owner_name` varchar(200) DEFAULT NULL,
  `start_date` varchar(200) DEFAULT NULL,
  `end_date` varchar(200) DEFAULT NULL,
  `responsible` varchar(200) DEFAULT NULL,
  `status` int(200) DEFAULT NULL,
  `is_delete` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_name`, `client_name`, `owner_name`, `start_date`, `end_date`, `responsible`, `status`, `is_delete`) VALUES
(1, 'Knwladege Portal', 'Bob', 'prince', '2018-05-01', '2018-05-25', 'prince', 1, 1),
(2, 'Student Information System', 'perk', 'prince', '2018-05-01', '2018-05-13', 'prince', 1, 1),
(3, 'cms', 'pranav', 'prince', '2018-05-01', '2018-06-08', 'prince', 0, 1),
(4, 'cms', 'Bob', 'prince', '2018-05-01', '2018-05-03', 'prince', 0, 1),
(5, 'Student Information System', 'perk', 'prince', '2018-05-01', '2018-05-13', 'prince', 1, 1),
(6, 'Student Information System', 'perk', 'prince', '2018-05-01', '2018-05-13', 'prince', 1, 1),
(7, 'fgf', 'fgrf', 'fgf', '2018-06-01', '2018-06-02', 'defr', 0, 1),
(8, 'Company Project', 'coretechies', 'prince', '2018-06-01', '2018-06-08', 'prince', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_details`
--

CREATE TABLE `vendor_details` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` int(100) DEFAULT NULL,
  `permanent_address` varchar(100) DEFAULT NULL,
  `present_address` varchar(100) DEFAULT NULL,
  `pencard` varchar(100) DEFAULT NULL,
  `gst` varchar(100) DEFAULT NULL,
  `company_type` varchar(100) DEFAULT NULL,
  `technology` varchar(100) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_delete` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_details`
--

INSERT INTO `vendor_details` (`id`, `name`, `email`, `mobile`, `permanent_address`, `present_address`, `pencard`, `gst`, `company_type`, `technology`, `date`, `is_delete`) VALUES
(75, 'drop vendor_details', 'admin@gmail.com', 2147483647, 'hghg', 'c-56', 'ABCDE123ER', '22AAAAA0000A1Z5', 'Public Limited Company', 'ANDROID', '2018-06-04 16:04:48', 0),
(76, 'jhgjh', 'admin@gmail.com', 2147483647, 'hghg', 'hgyhg', 'ABCDE123ER', '22AAAAA0000A1Z5', 'ANDROID', 'ANDROID', '2018-06-05 11:56:28', 0),
(77, 'admin', 'admin@gmail.com', 2147483647, 'hghg', 'c-56', 'ABCDE123ER', '22AAAAA0000A1Z5', 'Private Limited Company', 'PHP', '2018-06-05 11:58:57', 0),
(78, '45645', 'admin@gmail.com', 2147483647, '5252', 'hgyhg', 'ABCDE123ER', '22AAAAA0000A1Z5', 'ANDROID', 'ANDROID', '2018-06-05 11:59:42', 1),
(79, 'prince', 'admin@gmail.com', 2147483647, 'hghg', 'c-56', 'ABCDE123ER', '22AAAAA0000A1Z5', 'Public Limited Company', 'IOS', '2018-06-05 12:00:56', 1),
(80, 'admin', 'admin@gmail.com', 0, 'hghg', 'hgyhg', 'ABCDE123ER', '22AAAAA0000A1Z5', 'Public Limited Company', 'ANDROID', '2018-06-06 17:01:36', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_details`
--
ALTER TABLE `account_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_details`
--
ALTER TABLE `vendor_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_details`
--
ALTER TABLE `account_details`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vendor_details`
--
ALTER TABLE `vendor_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
