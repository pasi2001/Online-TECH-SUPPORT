-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 18, 2023 at 10:08 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

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

DROP TABLE IF EXISTS `admin_info`;
CREATE TABLE IF NOT EXISTS `admin_info` (
  `first_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `id` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_general_ci NOT NULL,
  `district` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `email_address` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_notification` enum('N','Y') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'N',
  `user_name` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(40) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`first_name`, `last_name`, `id`, `gender`, `district`, `email_address`, `email_notification`, `user_name`, `password`) VALUES
('ucsc', 'ucsc', '00001', '', 'Colombo', 'info@ucsc.cmb.ac.lk', 'N', 'ucsc', 'd32934b31349d77e70957e057b1bcd28'),
('test2', 'test2', '00002', 'Male', 'Colombo', 'test2@test.com', 'N', 'test2', 'ad0234829205b9033196ba818f7a872b');

-- --------------------------------------------------------

--
-- Table structure for table `facility_info`
--

DROP TABLE IF EXISTS `facility_info`;
CREATE TABLE IF NOT EXISTS `facility_info` (
  `facility_no` int NOT NULL,
  `facility_name` varchar(50) NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `facility_info`
--

INSERT INTO `facility_info` (`facility_no`, `facility_name`, `id`, `description`, `price`) VALUES
(1, 'Tech Support', 1, 'Tech Support Reps Troubleshoot Customer Tech Problems. They Resolve Issues Related To Computers, Phones, Tablets, Modems, Internet, Networks, Software, And The Like.', 49),
(6, 'Gadget Support', 6, 'A Gadget Is A Small Machine Or Device Which Does Something Useful. You Sometimes Refer To Something As A Gadget You Are Suggesting That It Is Complicated.', 89),
(2, 'Brand Support', 2, 'Feeling Stuck Due To Outdated/Corrupted Applications Or Drivers? Resolve Annoying Brand Computer/Laptop Technical Issues Within No Time.', 59),
(3, 'Security', 3, 'Isn\'t It Terrible When You Found Your PC Runs As Slow As Molasses? If Your Computer Has Bad Performances, Then You Have Landed On The Right Place.', 79),
(4, 'Windows Services', 4, 'Microsoft Windows Services, Formerly Known As NT Services, Enable You To Create Long-Running Executable Applications That Run In Their Own Windows Sessions.', 69),
(3, 'Computer Services', 5, 'Computer Services Means The Product Of The Use Of A Computer, The Information Stored In The Computer, Or The Personnel Supporting The Computer.', 59);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `id` varchar(45) NOT NULL,
  `district` varchar(45) NOT NULL,
  `email_address` varchar(45) NOT NULL,
  `email_notification` enum('N','Y') NOT NULL DEFAULT 'N',
  `user_name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  PRIMARY KEY (`user_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`first_name`, `last_name`, `id`, `district`, `email_address`, `email_notification`, `user_name`, `password`, `gender`) VALUES
('ucsc', 'cmb', '01', 'Colombo', 'info@ucsc.cmb.ac.lk', 'N', 'ucsc', 'd32934b31349d77e70957e057b1bcd28', ''),
('Mohamed', 'Shafraz', '00000003', 'Colombo', '2021is087@stu.ucsc.cmb.ac.lk', 'Y', 'shafraz', 'd1efb0978892bb06592e052188297152', 'Male'),
('teste', 'test', '0005', 'Colombo', 'test@gmail.com', 'N', 'test', '098f6bcd4621d373cade4e832627b4f6', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
