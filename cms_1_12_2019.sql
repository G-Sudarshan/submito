-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 01, 2019 at 10:02 AM
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
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `pdf_path`, `course_code`, `rollno`, `assignment_no`, `upload_datetime`, `marks`, `checked`, `checked_by`, `checked_on`, `student_id`, `text`) VALUES
(2, '', 'CM6238', 176101, 1, '2019-11-24 06:53:30', 18, 1, '2', '2019-12-01 02:04:33', 1, 'printf(Hello Worlds)'),
(10, '', 'CM6234', 176101, 3, '2019-11-25 15:25:11', 18, 1, '2', '2019-12-01 02:09:19', 1, 'dfgdfgfdg dfgdfgdfg'),
(13, '', 'CM6238', 176103, 1, '2019-11-26 10:43:14', 0, 0, '', '0000-00-00 00:00:00', 2, 'this is first assignment of C'),
(14, '', 'CM6238', 176103, 2, '2019-11-26 10:45:31', 0, 0, '', '0000-00-00 00:00:00', 2, 'This is second assignment of operator overloading jgd_/\\_\r\n'),
(15, '', 'CM6234', 176103, 3, '2019-11-26 11:40:48', 20, 1, '2', '2019-12-01 02:09:12', 2, 'class Sudarshan{\r\nvoid print()\r\n{\r\nSystem.out.println(\" asdfghjkl \");\r\n}\r\npublic static void main(String [ ]args){\r\n\r\nSudarshan s1=new Sudarshan();\r\ns1.print();\r\n}\r\n}'),
(16, '', 'CM6238', 176101, 3, '2019-11-27 09:47:20', 15, 1, '1', '2019-12-01 02:35:07', 1, '\\alpha = \\sqrt{ \\pi^2 }'),
(19, '', 'CM6238', 176103, 3, '2019-11-27 12:40:55', 0, 0, '', '0000-00-00 00:00:00', 2, 'lkjlkjl'),
(20, '', 'CM6235', 176103, 1, '2019-11-27 12:41:26', 0, 0, '', '0000-00-00 00:00:00', 2, 'dsfsdfsd'),
(29, 'assets/a/176103_CM6234_1_1.pdf', 'CM6234', 176103, 1, '2019-11-29 10:10:07', 0, 0, '', '0000-00-00 00:00:00', 2, ''),
(30, 'assets/a/176103_CM6234_2_1.pdf', 'CM6234', 176103, 2, '2019-11-30 06:53:00', 20, 1, '2', '2019-12-01 01:18:18', 2, ''),
(31, 'assets/a/176101_CM6234_1_.pdf', 'CM6234', 176101, 1, '2019-11-30 06:57:27', 20, 1, '2', '2019-12-01 01:06:55', 1, ''),
(32, 'assets/a/176101_CM6234_2_1.pdf', 'CM6234', 176101, 2, '2019-11-30 06:57:34', 20, 1, '1', '2019-12-01 01:05:09', 1, ''),
(33, 'assets/a/176106_CM6234_1_.pdf', 'CM6234', 176106, 1, '2019-11-30 11:25:09', 0, 0, '', '0000-00-00 00:00:00', 3, ''),
(34, '', 'CM6238', 176101, 2, '2019-12-01 07:05:49', 0, 0, '', '0000-00-00 00:00:00', 1, 'gfdfgdfgd fgdfgdfgd');

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
(5, 'Teachers Day', '2019-09-05', '2019-09-06'),
(6, 'holidays', '2019-11-15', '2019-12-15'),
(7, 'project complete week', '2019-11-25', '2019-11-30'),
(8, 'hi', '2019-11-19', '2019-11-20'),
(9, 'Prafull\'s Birthday', '2020-05-31', '2020-06-01'),
(10, 'sarvesh\' Birthday', '2020-05-06', '2020-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `pdf_path` text NOT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `title`, `pdf_path`, `created_at`) VALUES
(1, 'first notification', 'http://localhost/cms/uploads/paymenthistoryredirecturl_PRAFULLA.pdf', ''),
(2, 'Second notofication', 'http://localhost/cms/uploads/hi.pdf', ''),
(3, 'CI library', 'http://localhost/cms/uploads/File_Uploading_Class_—_CodeIgniter_3_1_10_documentation.pdf', ''),
(4, 'asdf', 'http://localhost/cms/uploads/atlassian-git-cheatsheet1.pdf', ''),
(5, 'abc', 'http://localhost/cms/uploads/sample.pdf', NULL);

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

--
-- Dumping data for table `static_assignments`
--

INSERT INTO `static_assignments` (`id`, `assignment_no`, `course_code`, `name`, `created_by`, `deadline`, `description`, `type`) VALUES
(1, 1, 'CM6238', 'Write a program for Hello world in C', 'Mali Sir', '2019-11-29', 'this is description of assigment ', 2),
(3, 2, 'CM6236', 'hi', 'Mali Sir', '2019-11-28', 'FGNZGTHJN', 1),
(4, 3, 'CM6236', 'ZDGNTZTN', 'Mali Sir', '2019-11-30', 'ZTNHGNJZR', 1),
(5, 1, 'CM6243', 'RGWRGGWR', 'Mali Sir', '2019-11-29', 'WRGWRGWR', 2),
(6, 2, 'CM6243', 'qerq3r', 'Mali Sir', '2019-11-17', '3r3', 1),
(8, 2, 'CM6234', 'draw 8086', 'Sanap Sir', '2019-11-26', 'defAEFWefWEFAERG', 1),
(9, 1, 'CM6235', 'stack', 'Sanap Sir', '2019-11-25', 'erhgaethbe', 2),
(10, 2, 'CM6235', 'queue', 'Sanap Sir', '2019-11-28', 'dgbfeahgrtgh', 1),
(11, 3, 'CM6234', 'registers', 'Sanap Sir', '3533-05-31', '.lmd.mf.,sdmf.', 2),
(12, 2, 'CM6238', 'write program for operator overloading in cpp', 'Mali Sir', '2019-11-27', 'mflkjmsl.mf.lsdmflmlsfm;lsdm ', 2),
(13, 3, 'CM6238', 'abc', 'Mali Sir', '0000-00-00', '1/πr2', 2),
(15, 1, 'CM6234', 'Study architecture of 8085', 'Mali Sir', '2019-12-21', 'fsfsdf sdfsdfsdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_login`
--

CREATE TABLE `tbl_admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` binary(32) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_login`
--

INSERT INTO `tbl_admin_login` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 0x6339336363643738623230373635323833343632313662336232663730316536, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courses_db`
--

CREATE TABLE `tbl_courses_db` (
  `id` int(11) NOT NULL COMMENT '1',
  `course_code` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_courses_db`
--

INSERT INTO `tbl_courses_db` (`id`, `course_code`, `name`) VALUES
(12, 'CM6237', 'Programming in C'),
(13, 'CM6234', 'Microprocessor'),
(14, 'CM6235', 'Data Structure Using \'C\''),
(15, 'CM6236', 'Database Management Systems'),
(16, 'CM6238', 'Object Oriented Programming'),
(17, 'CM6239', 'PC Architecture and Maintenance'),
(18, 'CM6241', 'Web Page Designing'),
(19, 'CM6242', 'Operating Systems'),
(21, 'CM6243', 'Computer Network');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departments`
--

CREATE TABLE `tbl_departments` (
  `id` int(11) NOT NULL COMMENT '1',
  `dpt_id` int(11) NOT NULL,
  `dpt_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_departments`
--

INSERT INTO `tbl_departments` (`id`, `dpt_id`, `dpt_name`) VALUES
(1, 11, 'Mechanical'),
(3, 21, 'civil'),
(4, 31, 'Electrical'),
(5, 41, 'Electronics and telecomminications '),
(6, 51, 'Information Technology'),
(7, 61, 'Computer Technology'),
(8, 71, 'Plastic Engineering'),
(9, 81, 'DDGM'),
(10, 17, 'Plastic Engineering');

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
(1, 'college_name', 'Government Polytechnic Nashik');

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

--
-- Dumping data for table `tbl_student_db`
--

INSERT INTO `tbl_student_db` (`id`, `rollno`, `name`, `department`, `department_id`, `mobile_no`, `email`, `year`, `password`) VALUES
(1, 176101, 'Suraj Ahire', 'Computer Technology', 61, 7845961232, 'surajahire@gmail.com', 'Third Year', 0x3961323666653766323030643437396437643137356636626163653035366263),
(2, 176103, 'Saurabh Bhalerao', 'Computer Technology', 61, 3213654654, 'saurabh@gmail.com', 'Third Year', 0x3563353830613361313533393938373035393930373364646132326139646137),
(3, 176106, '', 'Computer Technology', 61, 0, '', '', 0x6165633165333363393734333737666439653464653861393462386263633338);

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
-- Dumping data for table `tbl_teachers_db`
--

INSERT INTO `tbl_teachers_db` (`id`, `staff_id`, `name`, `department`, `department_id`, `username`, `password`, `email`, `mobile_no`) VALUES
(1, 1, 'Mali Sir', 'Computer Technology', 61, 'malisir@gpnashik.org', 0x6630643336656530343363313165333134373563356262383464623531646433, 'malisir@gmail.com', 45783161144),
(2, 10, 'Sanap Sir', 'Computer Technology', 61, 'sanapsir@gpnashik.org', 0x3763653762613534373433643238616336336436396630373066363134356234, 'sanapsir@gmail.com', 135434311),
(3, 20, 'Khedkar Sir', 'Computer Technology', 61, 'khedkarsir@gpnashik.org', 0x3263306632316562313862653362306561376134626666623535343331376166, '', 0),
(4, 5, 'abcd', 'Computer Technology', 61, 'abcd@gpnashik.org', 0x6531396435636435616630333738646130356636336638393163373436376166, '', 0),
(5, 234216, 'zxcv', 'Computer Technology', 61, 'qwer@gpnashik.org123457', 0x3564393363656237306532626635646161383465633364306364326337333161, '', 0),
(6, 10, 'zxcv', 'Mechanical', 11, 'a@g.com', 0x6531396435636435616630333738646130356636336638393163373436376166, '', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `static_assignments`
--
ALTER TABLE `static_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_courses_db`
--
ALTER TABLE `tbl_courses_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_info`
--
ALTER TABLE `tbl_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_student_db`
--
ALTER TABLE `tbl_student_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_teachers_db`
--
ALTER TABLE `tbl_teachers_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
