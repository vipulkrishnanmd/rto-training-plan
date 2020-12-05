-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2020 at 07:04 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timetable`
--

-- --------------------------------------------------------

--
-- Table structure for table `campuses`
--
CREATE DATABASE `timetable`;

USE `timetable`;

CREATE TABLE `campuses` (
  `id` int(11) NOT NULL,
  `campus_name` varchar(500) NOT NULL,
  `campus_address` varchar(1000) NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campuses`
--

INSERT INTO `campuses` (`id`, `campus_name`, `campus_address`, `enabled`) VALUES
(1, 'Dandenong', 'Dandenong address', 1),
(2, 'Sunshine', 'Sunshine address', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(500) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `wp` int(11) NOT NULL,
  `sup_hours` int(11) NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_code`, `wp`, `sup_hours`, `enabled`) VALUES
(1, 'First course', 'FC', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_unit_map`
--

CREATE TABLE `course_unit_map` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_unit_map`
--

INSERT INTO `course_unit_map` (`id`, `course_id`, `unit_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_rows`
--

CREATE TABLE `table_rows` (
  `id` int(11) NOT NULL,
  `timetable_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `order_number` int(11) NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_rows`
--

INSERT INTO `table_rows` (`id`, `timetable_id`, `unit_id`, `order_number`, `enabled`) VALUES
(41, 1, 1, 7, 0),
(42, 1, 4, 7, 0),
(43, 1, 3, 7, 0),
(44, 1, 1, 7, 0),
(45, 1, 1, 6, 0),
(46, 1, 2, 7, 0),
(47, 1, 3, 6, 0),
(48, 1, 3, 6, 0),
(49, 1, 3, 7, 0),
(50, 1, 1, 7, 0),
(51, 1, 2, 7, 0),
(52, 1, 4, 7, 0),
(53, 1, 4, 7, 0),
(54, 1, 1, 7, 1),
(55, 1, 1, 10, 0),
(56, 1, 4, 10, 0),
(57, 11, 1, 1, 1),
(58, 12, 1, 1, 1),
(59, 1, 2, 8, 1),
(60, 1, 3, 9, 1),
(61, 13, 2, 1, 1),
(62, 13, 2, 4, 0),
(63, 13, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `training_plans`
--

CREATE TABLE `training_plans` (
  `id` int(11) NOT NULL,
  `tp_name` varchar(500) NOT NULL,
  `course_id` int(11) NOT NULL,
  `campus_id` varchar(500) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `time` varchar(500) NOT NULL,
  `strength` int(11) NOT NULL,
  `training_method` varchar(100) NOT NULL,
  `days` varchar(100) NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training_plans`
--

INSERT INTO `training_plans` (`id`, `tp_name`, `course_id`, `campus_id`, `start_date`, `end_date`, `time`, `strength`, `training_method`, `days`, `enabled`) VALUES
(1, 'Something', 1, '1', '2019-04-16', '2019-04-24', 'asd', 14, 'Online', '12', 1),
(2, 'New training plan', 1, '1', '2019-04-19', '2019-04-30', '2 am to 3 pm', 1, 'On campus', '12', 1),
(3, 'Third', 1, '2', '2019-04-22', '2019-04-27', '2 am to 3 pm', 1, 'On campus', '12', 1),
(4, 'Third', 1, '2', '2019-04-22', '2019-04-27', '2 am to 3 pm', 1, 'On campus', '12', 1),
(5, 'Third', 1, '2', '2019-04-22', '2019-04-27', '2 am to 3 pm', 1, 'On campus', '12', 1),
(6, 'Diploma of ECEC', 1, '1', '2019-04-29', '2019-04-30', '2 am to 3 pm', 1, 'Online', '12', 1),
(7, 'Diploma of ECEC', 1, '1', '2019-04-29', '2019-04-30', '2 am to 3 pm', 1, 'Online', '234', 1),
(8, 'Diploma of ECEC', 1, '1', '2019-04-29', '2019-04-30', '2 am to 3 pm', 1, 'Online', '234', 1),
(9, 'Final test', 1, '1', '2019-04-28', '2019-04-30', '2 am to 3 pm', 1, 'Online', '135', 1),
(10, 'Vipul Krishnan Muralee Dharan', 1, '1', '2019-04-02', '2019-04-30', 'sda', 1, 'Online', '12', 1),
(11, 'final test 2', 1, '1', '2019-04-01', '2019-04-30', '2 am to 3 pm', 6, 'On campus', '24', 1),
(12, 'final test 2', 1, '1', '2019-04-01', '2019-04-30', '2 am to 3 pm', 6, 'On campus', '24', 1),
(13, 'something final', 1, '1', '2019-04-16', '2019-04-30', '2 am to 3 pm', 1, 'Online', '23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `unit_code` varchar(50) NOT NULL,
  `unit_name` varchar(500) NOT NULL,
  `nominal_hours` int(11) NOT NULL,
  `core` tinyint(4) NOT NULL,
  `assessment_methods` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_code`, `unit_name`, `nominal_hours`, `core`, `assessment_methods`) VALUES
(1, 'something', 'Somename', 3, 1, 'Something'),
(2, 'Something2', 'somename2', 6, 0, 'something2'),
(3, 'something3', 'Somename3', 3, 1, 'Something3'),
(4, 'Something4', 'somename4', 36, 0, 'something4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campuses`
--
ALTER TABLE `campuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_unit_map`
--
ALTER TABLE `course_unit_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_rows`
--
ALTER TABLE `table_rows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_plans`
--
ALTER TABLE `training_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campuses`
--
ALTER TABLE `campuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `course_unit_map`
--
ALTER TABLE `course_unit_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `table_rows`
--
ALTER TABLE `table_rows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `training_plans`
--
ALTER TABLE `training_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER USER `root` IDENTIFIED WITH mysql_native_password BY 'abc';