-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 17, 2020 at 01:40 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `pdf_path` text NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `rollno` int(11) NOT NULL,
  `assignment_no` int(11) NOT NULL,
  `upload_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `marks` int(11) NOT NULL,
  `checked` int(11) NOT NULL,
  `checked_by` varchar(50) NOT NULL,
  `checked_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `student_id` int(11) NOT NULL,
  `text` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_date`, `end_date`) VALUES
(1, 'Happy Independenc Day', '2021-08-15', '2021-08-16');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `path` text NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `pdf_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `static_assignments`
--

CREATE TABLE `static_assignments` (
  `id` int(11) NOT NULL,
  `assignment_no` int(11) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `deadline` date NOT NULL,
  `description` text NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_login`
--

CREATE TABLE `tbl_admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` binary(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile_no` int(11) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_login`
--

INSERT INTO `tbl_admin_login` (`id`, `username`, `password`, `email`, `name`, `mobile_no`, `department`) VALUES
(12, 'submito_admin', 0x3862366565336633353265393331346264313938333037336331326532616663, '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courses_db`
--

CREATE TABLE `tbl_courses_db` (
  `id` int(11) NOT NULL COMMENT '1',
  `course_code` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departments`
--

CREATE TABLE `tbl_departments` (
  `id` int(11) NOT NULL COMMENT '1',
  `dpt_id` int(11) NOT NULL,
  `dpt_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info`
--

CREATE TABLE `tbl_info` (
  `id` int(11) NOT NULL COMMENT '1',
  `title` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_info`
--

INSERT INTO `tbl_info` (`id`, `title`, `value`) VALUES
(1, 'college_name', 'Your Institute Name Here'),
(2, 'reset_by', 'submito_admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_db`
--

CREATE TABLE `tbl_student_db` (
  `id` int(11) NOT NULL COMMENT '1',
  `rollno` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `year` varchar(20) NOT NULL,
  `password` binary(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teachers_db`
--

CREATE TABLE `tbl_teachers_db` (
  `id` int(11) NOT NULL COMMENT '1',
  `staff_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` binary(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_no` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static_assignments`
--
ALTER TABLE `static_assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_courses_db`
--
ALTER TABLE `tbl_courses_db`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_code` (`course_code`);

--
-- Indexes for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dpt_id` (`dpt_id`);

--
-- Indexes for table `tbl_info`
--
ALTER TABLE `tbl_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student_db`
--
ALTER TABLE `tbl_student_db`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rollno` (`rollno`);

--
-- Indexes for table `tbl_teachers_db`
--
ALTER TABLE `tbl_teachers_db`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=943;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `static_assignments`
--
ALTER TABLE `static_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_courses_db`
--
ALTER TABLE `tbl_courses_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_info`
--
ALTER TABLE `tbl_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_student_db`
--
ALTER TABLE `tbl_student_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `tbl_teachers_db`
--
ALTER TABLE `tbl_teachers_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
