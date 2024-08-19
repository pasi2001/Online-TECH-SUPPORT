-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 10:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tss`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `id` varchar(20) DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `district` varchar(40) NOT NULL,
  `email_address` varchar(40) DEFAULT NULL,
  `email_notification` enum('N','Y') NOT NULL DEFAULT 'N',
  `user_name` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `id` varchar(45) NOT NULL,
  `district` varchar(45) NOT NULL,
  `email_address` varchar(45) NOT NULL,
  `email_notification` enum('N','Y') NOT NULL DEFAULT 'N',
  `user_name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `gender` enum('Male','Female') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`first_name`, `last_name`, `id`, `district`, `email_address`, `email_notification`, `user_name`, `password`, `gender`) VALUES
('ucsc', 'cmb', '01', 'Colombo', 'info@ucsc.cmb.ac.lk', 'N', 'ucsc', 'd32934b31349d77e70957e057b1bcd28', ''),
('Mohamed', 'Shafraz', '00000003', 'Colombo', '2021is087@stu.ucsc.cmb.ac.lk', 'Y', 'shafraz', 'd1efb0978892bb06592e052188297152', 'Male'),
('teste', 'test', '0005', 'Colombo', 'test@gmail.com', 'N', 'test', '098f6bcd4621d373cade4e832627b4f6', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
