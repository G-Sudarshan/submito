-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2019 at 02:56 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.1.29

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
  `rollno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `assignment_no` int(11) NOT NULL,
  `upload_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `marks` int(11) NOT NULL,
  `checked` int(11) NOT NULL,
  `checked_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `pdf_path`, `rollno`, `name`, `subject`, `assignment_no`, `upload_datetime`, `marks`, `checked`, `checked_by`) VALUES
(1, 'http://localhost/cms/uploads/Student_Dashboard.pdf', 176101, 'Suraj Ahire', 'Object Oriented Programming', 2, '2019-08-19 16:03:02', 0, 0, ''),
(2, 'http://localhost/cms/uploads/Admin_Panel.pdf', 176101, 'Suraj Ahire', 'Computer Network', 1, '2019-08-20 04:54:12', 0, 0, ''),
(3, 'http://localhost/cms/uploads/localhost___127_0_0_1___cms___assignments___phpMyAdmin_4_8_5.pdf', 176101, 'Suraj Ahire', 'Object Oriented Programming', 4, '2019-08-20 04:59:03', 0, 0, ''),
(4, 'http://localhost/cms/uploads/atlassian-git-cheatsheet.pdf', 176101, 'Suraj Ahire', 'dbms', 1, '2019-08-20 11:45:26', 0, 0, '');

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
(3, 'The new event', '2019-08-15', '2019-08-15'),
(4, 'Submission', '2019-09-20', '2019-09-28'),
(5, 'Teachers Day', '2019-09-05', '2019-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pdf_path` text NOT NULL,
  `created_at` point NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `title`, `pdf_path`, `created_at`) VALUES
(1, 'first notification', 'http://localhost/cms/uploads/paymenthistoryredirecturl_PRAFULLA.pdf', ''),
(2, 'Second notofication', 'http://localhost/cms/uploads/hi.pdf', ''),
(3, 'CI library', 'http://localhost/cms/uploads/File_Uploading_Class_—_CodeIgniter_3_1_10_documentation.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_login`
--

CREATE TABLE `tbl_admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_login`
--

INSERT INTO `tbl_admin_login` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin1234', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courses_db`
--

CREATE TABLE `tbl_courses_db` (
  `serial_no` int(11) NOT NULL COMMENT '1',
  `course_code` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_courses_db`
--

INSERT INTO `tbl_courses_db` (`serial_no`, `course_code`, `name`) VALUES
(1, '6301', 'Physics'),
(6, '6302', 'Basic Mathematics'),
(7, '6234', 'C programming'),
(8, '6432', 'Object Oriented Programming'),
(9, '7888', 'SOM'),
(10, '7687', 'Engineering Mathematics'),
(11, '6405', 'Applied Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departments`
--

CREATE TABLE `tbl_departments` (
  `serial_no` int(11) NOT NULL COMMENT '1',
  `dpt_id` int(11) NOT NULL,
  `dpt_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_departments`
--

INSERT INTO `tbl_departments` (`serial_no`, `dpt_id`, `dpt_name`) VALUES
(1, 11, 'Mechanical'),
(3, 21, 'civil'),
(4, 31, 'Electrical'),
(5, 41, 'Electronics and telecomminications '),
(6, 51, 'Information Technology'),
(7, 61, 'Computer Department'),
(8, 71, 'Plastic Engineering'),
(9, 81, 'DDGM'),
(10, 17, 'Plastic Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info`
--

CREATE TABLE `tbl_info` (
  `info_id` int(11) NOT NULL COMMENT '1',
  `title` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_info`
--

INSERT INTO `tbl_info` (`info_id`, `title`, `value`) VALUES
(1, 'college_name', 'Goverenment Polytechnic Nashik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_db`
--

CREATE TABLE `tbl_student_db` (
  `id` int(11) NOT NULL COMMENT '1',
  `rollno` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL,
  `rcc1` int(11) NOT NULL,
  `rcc2` int(11) NOT NULL,
  `rcc3` int(11) NOT NULL,
  `rcc4` int(11) NOT NULL,
  `rcc5` int(11) NOT NULL,
  `rcc6` int(11) NOT NULL,
  `rcc7` int(11) NOT NULL,
  `rcc8` int(11) NOT NULL,
  `rcc9` int(11) NOT NULL,
  `rcc10` int(11) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student_db`
--

INSERT INTO `tbl_student_db` (`id`, `rollno`, `name`, `department`, `department_id`, `rcc1`, `rcc2`, `rcc3`, `rcc4`, `rcc5`, `rcc6`, `rcc7`, `rcc8`, `rcc9`, `rcc10`, `mobile_no`, `password`) VALUES
(1, 176101, 'Suraj Ahire', 'Computer Technology', 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8530416269, 'suraj1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teachers_db`
--

CREATE TABLE `tbl_teachers_db` (
  `id` int(11) NOT NULL COMMENT '1',
  `staff_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teachers_db`
--

INSERT INTO `tbl_teachers_db` (`id`, `staff_id`, `name`, `department`, `department_id`, `username`, `password`) VALUES
(1, 1, 'Patil sir', 'Mechanical', 11, 'patilsir', 'patilsir1234'),
(2, 2, 'sanap sir', 'Mechanical', 11, '', ''),
(3, 1, 'Bhalerao Sir', 'Electrical', 31, '', ''),
(4, 3, 'Sinare Sir', 'Mechanical', 11, '', '');

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
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_courses_db`
--
ALTER TABLE `tbl_courses_db`
  ADD PRIMARY KEY (`serial_no`),
  ADD UNIQUE KEY `course_code` (`course_code`);

--
-- Indexes for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  ADD PRIMARY KEY (`serial_no`),
  ADD UNIQUE KEY `dpt_id` (`dpt_id`);

--
-- Indexes for table `tbl_info`
--
ALTER TABLE `tbl_info`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `tbl_student_db`
--
ALTER TABLE `tbl_student_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_teachers_db`
--
ALTER TABLE `tbl_teachers_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_courses_db`
--
ALTER TABLE `tbl_courses_db`
  MODIFY `serial_no` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  MODIFY `serial_no` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_info`
--
ALTER TABLE `tbl_info`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_student_db`
--
ALTER TABLE `tbl_student_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_teachers_db`
--
ALTER TABLE `tbl_teachers_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
