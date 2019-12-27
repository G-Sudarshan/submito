-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 27, 2019 at 04:31 PM
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
(35, 'assets/a/176101_CM6218_1_1.pdf', 'CM6218', 176101, 1, '2019-12-16 03:39:42', 19, 1, '7', '2019-12-18 01:48:41', 13, ''),
(36, 'assets/a/176101_CM6218_2_1.pdf', 'CM6218', 176101, 2, '2019-12-17 09:33:37', 0, 0, '', '0000-00-00 00:00:00', 13, '');

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
(13, 'The new event', '2019-12-16', '2019-12-17'),
(14, 'UDAAN', '2019-12-18', '2019-12-19');

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

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `path`, `course_code`, `teacher_name`, `teacher_id`, `title`) VALUES
(4, 'assets/notes/submito_paper.pdf', 'CM6218', 'Mali Sir', 7, 'Paper on Submito');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `pdf_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `title`, `pdf_path`) VALUES
(13, 'Linux cheat sheet', 'uploads/Linux-Cheat-Sheet-Sponsored-By-Loggly.pdf');

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
(18, 1, 'CM6218', 'abc', 'Mali Sir', '2019-12-28', 'dsds', 1),
(19, 2, 'CM6218', 'hi', 'Mali Sir', '2019-12-28', 'dhflhsld', 1);

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
(8, 'submito_admin', 0x3862366565336633353265393331346264313938333037336331326532616663, '', '', 0, ''),
(9, 'admin', 0x6339336363643738623230373635323833343632313662336232663730316536, '11starktony@gmail.com', 'Admin', 2147483647, 'Computer Technology');

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

--
-- Dumping data for table `tbl_courses_db`
--

INSERT INTO `tbl_courses_db` (`id`, `course_code`, `name`, `department_id`) VALUES
(23, 'CM6218', 'Programming in C', 61),
(24, 'CM6237', 'Object Oriented Programming', 61),
(26, 'IF5118', 'Programming in C', 51),
(27, 'CM6230', 'Java Programming', 61),
(28, 'CM6243', 'Microprocessor', 61),
(29, 'CM6235', 'Data Structure Using \'C\'', 61),
(30, 'CM6220', 'professional practices', 61),
(31, 'CM6240', 'Scripting Technology', 61),
(32, 'CM6250', 'Software Engineering', 61),
(33, 'CM6239', 'Web Page Designing', 61),
(34, 'CM6103', 'Applied Mathematics', 61);

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
(12, 11, 'Mechanical'),
(13, 21, 'Civil'),
(14, 51, 'Information Technology'),
(15, 61, 'Computer Technology'),
(16, 144, 'tech');

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
(1, 'college_name', 'a'),
(2, 'reset_by', '7');

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
(13, 176101, 'Suraj Ahire', 'Computer Technology', 61, 7056649996, '11sudarshang@gmail.com', 'Third Year', 0x3961323666653766323030643437396437643137356636626163653035366263),
(14, 176103, '', 'Computer Technology', 61, 0, '', '', 0x3563353830613361313533393938373035393930373364646132326139646137),
(18, 175101, '', 'Information Technology', 51, 0, '', '', 0x3635343937306664616563346463393263666132326533333766333062656233),
(19, 176106, '', 'Computer Technology', 61, 0, 'gaurav@gmail.com', '', 0x6165633165333363393734333737666439653464653861393462386263633338),
(21, 176110, '', 'Computer Technology', 61, 0, '', '', 0x6231663134363238383639313862303933343662653937626337663532333638),
(22, 1010, '', 'Mechanical', 11, 0, '', '', 0x6435386461383232383939333964386334656334663430363839633238343765);

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
(7, 1, 'Mali Sir', 'Computer Technology', 61, 'malisir@gpnashik.org', 0x6630643336656530343363313165333134373563356262383464623531646433, '11starktony@gmail.com', 0),
(8, 2, 'Khedkar Sir', 'Computer Technology', 61, 'khedkarsir@gpnashik.org', 0x3263306632316562313862653362306561376134626666623535343331376166, '', 0),
(9, 15222, 'aaaaaa', 'tech', 144, 'awaw', 0x3162626438383634363038323730313565356436303565643434323532323531, '', 0),
(10, 324, 'Sanap Sir', 'Computer Technology', 61, 'sanapsir@gmail.com', 0x3763653762613534373433643238616336336436396630373066363134356234, '', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `static_assignments`
--
ALTER TABLE `static_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_courses_db`
--
ALTER TABLE `tbl_courses_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_info`
--
ALTER TABLE `tbl_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_student_db`
--
ALTER TABLE `tbl_student_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_teachers_db`
--
ALTER TABLE `tbl_teachers_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
