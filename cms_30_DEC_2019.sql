-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 30, 2019 at 04:26 PM
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
(14, 'UDAAN', '2019-12-18', '2019-12-19'),
(15, 'Suraj\'s Birthday', '2020-09-10', '2020-09-11');

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
(34, 'CM6103', 'Applied Mathematics', 61),
(35, 'ME6123', 'SOM', 11);

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
(1, 'college_name', 'Government Polytechnic Nashik'),
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
(19, 176106, '', 'Computer Technology', 61, 0, 'gaurav@gmail.com', '', 0x3565396431316131346164316338646437376539386566396235336664316261),
(21, 176110, '', 'Computer Technology', 61, 0, '', '', 0x6231663134363238383639313862303933343662653937626337663532333638),
(22, 1010, '', 'Mechanical', 11, 0, '', '', 0x6435386461383232383939333964386334656334663430363839633238343765),
(24, 176111, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(25, 176112, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(26, 176113, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(27, 176114, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(28, 176115, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(29, 176116, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(30, 176117, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(31, 176118, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(32, 176119, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(33, 176120, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(34, 176121, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(35, 176122, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(36, 176123, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(37, 176124, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(38, 176125, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(39, 176126, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(40, 176127, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(41, 176128, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(42, 176129, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(43, 176130, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(44, 176131, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(45, 176132, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(46, 176133, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(47, 176134, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(48, 176135, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(49, 176136, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(50, 176137, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(51, 176138, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(52, 176139, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(53, 176140, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(54, 176141, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(55, 176142, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(56, 176143, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(57, 176144, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(58, 176145, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(59, 176146, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(60, 176147, '', 'Computer Technology', 0, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(61, 176148, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(62, 176149, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(63, 176150, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(64, 176151, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(65, 176152, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(66, 176153, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(67, 176154, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(68, 176155, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(69, 176156, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(70, 176157, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(71, 176158, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(72, 176159, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(73, 176160, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(74, 176161, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(75, 176162, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(76, 176163, '', 'Computer Technology', 61, 0, '', '', 0x3733656330396333663831633032383032643830386163373461613362636638),
(77, 175102, '', 'Information Technology', 51, 0, '', '', 0x6632616333383533643961636164303932386633326434353561663033333362),
(78, 175103, '', 'Information Technology', 51, 0, '', '', 0x3563353830613361313533393938373035393930373364646132326139646137),
(79, 175104, '', 'Information Technology', 51, 0, '', '', 0x3237623161393134313736623833363765666535393130663962636535363239),
(80, 175105, '', 'Information Technology', 51, 0, '', '', 0x6434323732633037386165376134633562393031343165323537666634663665),
(81, 175106, '', 'Information Technology', 51, 0, '', '', 0x6165633165333363393734333737666439653464653861393462386263633338),
(82, 175107, '', 'Information Technology', 51, 0, '', '', 0x3762323063303562316266323163636566313039613862343230663362353264),
(83, 175108, '', 'Information Technology', 51, 0, '', '', 0x3731333338383565306265353264353730656634376630663264333063316261),
(84, 175109, '', 'Information Technology', 51, 0, '', '', 0x6164346661633638643930613532323330303761313731343538623735653963),
(85, 175110, '', 'Information Technology', 51, 0, '', '', 0x6231663134363238383639313862303933343662653937626337663532333638),
(86, 175111, '', 'Information Technology', 51, 0, '', '', 0x3536626331323062333237333737633234643135326231653064643764353838),
(87, 175112, '', 'Information Technology', 51, 0, '', '', 0x6166343361613665663366366661353163623637613535393532666164656133),
(88, 175113, '', 'Information Technology', 51, 0, '', '', 0x3834363231303032383765643030356433383137363936613266323763306435),
(89, 175114, '', 'Information Technology', 51, 0, '', '', 0x6231316531623332616138323662393734376231363561383966653539623866),
(90, 175115, '', 'Information Technology', 51, 0, '', '', 0x3037633133313763646630366563303266653162313362386334323465396337),
(91, 175116, '', 'Information Technology', 51, 0, '', '', 0x3233333661396438303962383832333865613563383831656636316261303230),
(92, 175117, '', 'Information Technology', 51, 0, '', '', 0x6464323562353861376466316164316532343766383734626661646438373163),
(93, 175118, '', 'Information Technology', 51, 0, '', '', 0x3462323432386337653235623735616637623536313932383464313761396138),
(94, 175119, '', 'Information Technology', 51, 0, '', '', 0x6436643738663131353631656531623134613633626566393566653032303333),
(95, 175120, '', 'Information Technology', 51, 0, '', '', 0x6332333734303434623162313139666131383839353861626433323361363465),
(96, 175121, '', 'Information Technology', 51, 0, '', '', 0x6361613866343231393566313161643261373432353432623565363463386431),
(97, 175122, '', 'Information Technology', 51, 0, '', '', 0x3131616138306161616365656330656337333562636233633564353864376336),
(98, 175123, '', 'Information Technology', 51, 0, '', '', 0x3238326634623831653862353639373034376132653862643733353663623265),
(99, 175124, '', 'Information Technology', 51, 0, '', '', 0x3035363265323565656266303330303637353836643637663566353562393133),
(100, 175125, '', 'Information Technology', 51, 0, '', '', 0x3533306230333831656562303334633533646266386236313136653066323662),
(101, 175126, '', 'Information Technology', 51, 0, '', '', 0x3366376533326566353637633536376636396461373730333030336265613733),
(102, 175127, '', 'Information Technology', 51, 0, '', '', 0x3239633737376164626164313966666564313765333731626262363332656131),
(103, 175128, '', 'Information Technology', 51, 0, '', '', 0x3638643833373330326130653832666137623633376434373031643738336631),
(104, 175129, '', 'Information Technology', 51, 0, '', '', 0x3264633035633265636161326639306234653230633531366533633865366563),
(105, 175130, '', 'Information Technology', 51, 0, '', '', 0x3532356362313461613931653635656435306361306138383030623961303362),
(106, 175131, '', 'Information Technology', 51, 0, '', '', 0x3566623538633536323738393432623931366430633037373037336435373235),
(107, 175132, '', 'Information Technology', 51, 0, '', '', 0x6262613463343033633965343532373435653831326661356334336538396530),
(108, 175133, '', 'Information Technology', 51, 0, '', '', 0x6439653439626330643365336337373662326262316331323330656463326231),
(109, 175134, '', 'Information Technology', 51, 0, '', '', 0x3433636366623333333232666531366165613531306162666262326537353235),
(110, 175135, '', 'Information Technology', 51, 0, '', '', 0x6535333435663432343733623230303561306339333138376636376333613530),
(111, 175136, '', 'Information Technology', 51, 0, '', '', 0x3635363464323438643866353935353830643334373466376265626162356633),
(112, 175137, '', 'Information Technology', 51, 0, '', '', 0x3439656435383262356539343539343761636661653332303337646335333061),
(113, 175138, '', 'Information Technology', 51, 0, '', '', 0x3530646438393464323764646562663339363462653032323032303466313964),
(114, 175139, '', 'Information Technology', 51, 0, '', '', 0x6335663330396664623537393465373331363366313130613533646633383635),
(115, 175140, '', 'Information Technology', 51, 0, '', '', 0x6631306230326662623561663638646165636632623931616333376336343264),
(116, 175141, '', 'Information Technology', 51, 0, '', '', 0x6362333731323031383830373961663033326430353935613832333331353065),
(117, 175142, '', 'Information Technology', 51, 0, '', '', 0x3433613337323030386439343865623861313235346636363866363134326631),
(118, 175143, '', 'Information Technology', 51, 0, '', '', 0x3532303435653634663531376138303432346232363465373434336639303338),
(119, 175144, '', 'Information Technology', 51, 0, '', '', 0x3264306564613331306431383265613562613866666436333066306461326634),
(120, 175145, '', 'Information Technology', 51, 0, '', '', 0x6264636532656262393564396630386134633565323334323334633262633666),
(121, 175146, '', 'Information Technology', 51, 0, '', '', 0x3035626564396133346531633333636332633266393836316562326637656133),
(122, 175147, '', 'Information Technology', 51, 0, '', '', 0x6463643433323335376134323663646136633363323861373835623466363137),
(123, 175148, '', 'Information Technology', 51, 0, '', '', 0x6532323034303466396230653836653061626438356539353236613139356330),
(124, 175149, '', 'Information Technology', 51, 0, '', '', 0x6364373431393739616138616462333236353261353934333538653937663434),
(125, 175150, '', 'Information Technology', 51, 0, '', '', 0x6466323839326138306235373539306264666136346235636339646133633531),
(126, 175151, '', 'Information Technology', 51, 0, '', '', 0x3964383234623333633037333335653961383063373461656666366538363435),
(127, 175152, '', 'Information Technology', 51, 0, '', '', 0x3631653363383966383937646661323466666532356266366233346339366631),
(128, 175153, '', 'Information Technology', 51, 0, '', '', 0x3030643530373839646538303833626364386535393530316332353465643437),
(129, 175154, '', 'Information Technology', 51, 0, '', '', 0x6363663933303238386265346265303034343361393035323264393364656533),
(130, 175155, '', 'Information Technology', 51, 0, '', '', 0x3562323239646136386431656262343362356537396633656534326438653863),
(131, 175156, '', 'Information Technology', 51, 0, '', '', 0x3432663737346637383239666239616138343230343136636337653736376235),
(132, 175157, '', 'Information Technology', 51, 0, '', '', 0x3966616662626637366430346637393062663532343938343064303436353135),
(133, 175158, '', 'Information Technology', 51, 0, '', '', 0x3065636137653463373263346633376438373932356439616638366266366433),
(134, 175159, '', 'Information Technology', 51, 0, '', '', 0x3966356464386466323861653137643261633566663235623436646638666162),
(135, 175160, '', 'Information Technology', 51, 0, '', '', 0x6531303538343363326430623239616131356539656339353765306132366331),
(136, 175161, '', 'Information Technology', 51, 0, '', '', 0x6334616639633130306531343934373534633835333333663831396364653333),
(137, 175162, '', 'Information Technology', 51, 0, '', '', 0x6234623630363130373564386334383164373530643064303062366337623639),
(138, 175163, '', 'Information Technology', 51, 0, '', '', 0x3232303733666532623130643835373564623066663335323637323863366531);

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
(10, 324, 'Sanap Sir', 'Computer Technology', 61, 'sanapsir@gmail.com', 0x3763653762613534373433643238616336336436396630373066363134356234, '', 0),
(13, 1, 'madhavi mam', 'Information Technology', 51, 'f1@gpnashik.org', 0x3733656330396333663831633032383032643830386163373461613362636638, '', 0),
(14, 2, 'sneha mam', 'Information Technology', 51, 'f2@gpnashik', 0x3733656330396333663831633032383032643830386163373461613362636638, '', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=37;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `tbl_teachers_db`
--
ALTER TABLE `tbl_teachers_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
