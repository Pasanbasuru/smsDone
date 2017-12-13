-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2017 at 08:11 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `ar_acedemic`
--

CREATE TABLE `ar_acedemic` (
  `id` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `education` varchar(50) NOT NULL,
  `research` varchar(50) NOT NULL,
  `courses` varchar(30) NOT NULL,
  `awards` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ar_acedemic`
--

INSERT INTO `ar_acedemic` (`id`, `username`, `first_name`, `last_name`, `gender`, `dob`, `telephone`, `email`, `education`, `research`, `courses`, `awards`) VALUES
(123456, 'klm@example.com', 'thilakarathne', 'mohan', 'male', '1994-10-03', '0776709705', 'mohan@gamil.com', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `caa_academic`
--

CREATE TABLE `caa_academic` (
  `caa_id` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `education` varchar(50) NOT NULL,
  `research` varchar(50) NOT NULL,
  `courses` varchar(30) NOT NULL,
  `awards` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caa_academic`
--

INSERT INTO `caa_academic` (`caa_id`, `username`, `first_name`, `last_name`, `gender`, `dob`, `telephone`, `email`, `education`, `research`, `courses`, `awards`) VALUES
(123123, 'pos@example.com', 'Arafa', 'Nihar', 'Female', '1995-06-06', '0769080868', 'arafanihar101@gmail.com', 'B. Sc in Information Systems', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(45) DEFAULT NULL,
  `course_code` varchar(45) DEFAULT NULL,
  `course_year` varchar(45) DEFAULT NULL,
  `credits` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `lect_username` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `c_type` varchar(255) NOT NULL,
  `year` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_code`, `course_year`, `credits`, `description`, `lect_username`, `semester`, `c_type`, `year`) VALUES
(1, 'Software enginering', 'SCS1101', '1', '2', NULL, '33', '1', 'm', '2017'),
(2, 'database', 'SCS1102', '1', '1', NULL, 'ert@yahoo.com', '1', 'm', '2017');

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `degree_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `duration` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `start_year` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`degree_id`, `name`, `duration`, `description`, `start_year`) VALUES
(1, 'computer science(B.sc)', '3 years', NULL, '2002'),
(2, 'Information System(B.sc)', '3 years', NULL, '2002');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventdate` varchar(20) NOT NULL,
  `eventtitle` varchar(100) NOT NULL,
  `eventdes` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventdate`, `eventtitle`, `eventdes`) VALUES
('0000-00-00', 'vacation', 'Event Description'),
('12/08/2017', 'iygjuh', 'Event Description');

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `hostel_id` int(11) NOT NULL,
  `location` varchar(45) DEFAULT NULL,
  `janitor` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `last_edited`
--

CREATE TABLE `last_edited` (
  `id` int(5) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `course_year` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `edited_user_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `last_edited`
--

INSERT INTO `last_edited` (`id`, `course_code`, `course_year`, `type`, `edited_user_name`) VALUES
(1, 'SCS1102', '2017', 'final_result', '''ert@yahoo.com'''),
(2, 'SCS1102', '2017', 'assignment_result', '''ert@yahoo.com'''),
(3, 'SCS1102', '2016', 'final_result', ''),
(4, 'SCS1102', '2016', 'assignment_result', '''ert@yahoo.com'''),
(5, 'SCS1102', '2015', 'final_result', '''ert@yahoo.com'''),
(6, 'SCS1102', '2015', 'assignment_result', '');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `id` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `education` varchar(50) NOT NULL,
  `research` varchar(50) NOT NULL,
  `courses` varchar(30) NOT NULL,
  `awards` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`id`, `username`, `first_name`, `last_name`, `gender`, `dob`, `telephone`, `email`, `education`, `research`, `courses`, `awards`) VALUES
(33, 'john01', 'John', 'Ward', 'male', '2017-10-03', '0771234567', 'a@gmail.com', 'BSc (Col),MSc (Swansea),PhD(Cardiff)', 'Multidatabase & Knowledgebases', 'SCS 2109 Database II', 'Not included yet'),
(34, 'ert@yahoo.com', 'K.P.M.K.', 'Silva', 'male', '2016-07-20', '0777873108', 'mks@ucsc.cmb.ac.lk', 'BSc', 'Computer', 'Theory', 'Not');

-- --------------------------------------------------------

--
-- Table structure for table `scholarship`
--

CREATE TABLE `scholarship` (
  `scol_id` int(11) NOT NULL,
  `type` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scholarship`
--

INSERT INTO `scholarship` (`scol_id`, `type`) VALUES
(1, 'mahapola'),
(2, 'bursary'),
(3, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `type` varchar(45) NOT NULL,
  `contact` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stu`
--

CREATE TABLE `stu` (
  `id` int(22) NOT NULL,
  `fname` varchar(22) NOT NULL,
  `lname` varchar(22) NOT NULL,
  `gender` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu`
--

INSERT INTO `stu` (`id`, `fname`, `lname`, `gender`) VALUES
(106, 'student1', 'male', 'slastname'),
(107, 'student2', 'male', 'slastname'),
(108, 'student3', 'male', 'slastname'),
(109, 'student4', 'female', 'slastname'),
(110, 'student5', 'female', 'slastname'),
(111, 'student6', 'male', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(20) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `mid_name` varchar(255) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `school` varchar(45) NOT NULL,
  `birthdate` varchar(45) NOT NULL,
  `race` varchar(45) NOT NULL,
  `religion` varchar(45) NOT NULL,
  `reg_date` varchar(45) NOT NULL,
  `out_date` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `stu_image` varchar(50) NOT NULL,
  `nic` varchar(11) NOT NULL,
  `index_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `first_name`, `mid_name`, `last_name`, `school`, `birthdate`, `race`, `religion`, `reg_date`, `out_date`, `gender`, `stu_image`, `nic`, `index_no`) VALUES
(379, 'Sharafa', 'Shohana', 'Anvir', 'Muslim Ladies College', '33772', 'Muslim', 'Islam', '2017/12/11', '', 'female', '', '926322862V', '1710379'),
(381, 'Shiromi', 'Wasana', 'Thilakarathne', 'Sujatha Vidyalaya', '34986', 'Sinhala', 'Buddhist', '2017/12/11', '', 'female', '', '952770506V', '1720381'),
(382, 'Maneesha', 'Khemani', 'Perera', 'Central College', '35604', 'Tamil', 'Hindu', '2017/12/11', '', 'female', '', '972364153V', '1710382'),
(383, 'Kumudu', 'Akalanaka', 'Senevirathne', 'Visakha Vidyalaya', '34708', 'Sinhala', 'Buddhist', '2017/12/11', '', 'female', '', '953662846V', '1710383'),
(384, 'Mohan', 'Ashwin', 'Anuradhanayake', 'Nalanda college', '34441', 'Sinhala', 'buddhist', '2017/12/11', '', 'male', '', '943568235V', '1720384'),
(385, 'Kavinda', 'dinendra', 'Niroshan', 'Ananda college', '34322', 'Tamil', 'Hindu', '2017/12/11', '', 'male', '', '936282365V', '1720385'),
(386, 'Devin', 'Awanka', 'Perera', 'Nalanda college', '34685', 'sinhala', 'buddhist', '2017/12/11', '', 'male', '', '943582149V', '1710386'),
(387, 'Hasun', 'Prageeth', 'Coorey', 'Kagallu Vidyalaya', '33364', 'sinhala', 'buddhist', '2017/12/11', '', 'female', '', '914658913V', '1710387'),
(388, 'Shehani', 'Kavindhya', 'Amarathunga', 'Visakha Vidyalaya', '33042', 'Burgher', 'christian', '2017/12/11', '', 'male', '', '906322862V', '1710388'),
(389, 'Amali', 'Pramila', 'Silva', 'Central College', '34785', 'sinhala', 'buddhist', '2017/12/11', '', 'male', '', '952658323V', '1710389'),
(390, 'Praveena', 'Awanthika', 'Weerarathne', 'Sanghamitta Balikab Vidyalaya', '35352', 'sinhala', 'buddhist', '2017/12/11', '', 'male', '', '962770502V', '1720390'),
(391, 'Wathsala', 'Oshani', 'Silva', 'Visakha Vidyalaya', '33050', 'sinhala', 'buddhist', '2017/12/11', '', 'male', '', '902364151V', '1710391'),
(392, 'Semini', 'Wasana', 'Weerakoon', 'Central College', '34706', 'sinhala', 'buddhist', '2017/12/11', '', 'male', '', '953642842V', '1710392'),
(393, 'Sujala', 'Lakshan', 'Dharmagunawardana', 'Isipathna college', '34452', 'sinhala', 'buddhist', '2017/12/11', '', 'male', '', '943568239V', '1720393'),
(394, 'Deshan', 'Prabuddha', 'Senanayake', 'Ananda college', '33232', 'sinhala', 'buddhist', '2017/12/11', '', 'male', '', '906282361V', '1720394'),
(395, 'Thamasha', 'Ruchinali', 'Weerasinghe', 'Buddhist Ladies College', '35604', 'Tamil', 'Hindu', '2016/12/11', '', 'female', '', '974532231V', '1620200'),
(397, 'Kamal', 'Shohan', 'Perera', 'Mahanama College', '34103', 'sinhala', 'buddhist', '2016/12/11', '', 'male', '', '934658915V', '1620201'),
(401, 'Pasan', 'Basuru', 'Amarathunga', 'Mahanama College', '34041', 'Sinhala', 'Buddhist', '2016/12/11', '', 'male', '', '932658321V', '1610203'),
(402, 'John ', 'Shohan', 'Liberatore', 'Ananda college', '', 'sinhala', 'Buddhist', '2016/12/11', '', 'male', '', '942358321V', '1620204'),
(403, 'Bruno', 'Houston', 'Whitesides', 'Central College', '', 'Sinhala', 'Buddhist', '2015/12/11', '', 'male', '', '964786936V', '1510099'),
(405, 'Henneman', 'Reese', 'Maynadier', 'Mahanama College', '', 'Tamil', 'Hindu', '2015/12/11', '', 'male', '', '964582136V', '1520100'),
(406, 'Schifini', 'Tohen', 'Cordova', 'Buddhist Ladies College', '', 'sinhala', 'Buddhist', '2015/12/11', '', 'female', '', '944696936V', '1520101');

-- --------------------------------------------------------

--
-- Table structure for table `student_address`
--

CREATE TABLE `student_address` (
  `s_id` varchar(20) NOT NULL,
  `number_` varchar(45) DEFAULT NULL,
  `street` varchar(45) DEFAULT NULL,
  `town` varchar(45) DEFAULT NULL,
  `p_code` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_address`
--

INSERT INTO `student_address` (`s_id`, `number_`, `street`, `town`, `p_code`) VALUES
('401', '386', 'Saliya Street', 'colombo4', '15/5694'),
('397', '764', 'De Silva Street', 'Colombo 3', '36/5466'),
('395', '123', 'Flower Street', 'Panadura', ''),
('394', '265', 'Dharmapala Street', 'colombo 3', '49/6958'),
('393', '360', 'Premadasa Street', 'Kelaniya', '16/694'),
('392', '294', 'Perera Street', 'Anuradhapura', '1843350'),
('391', '263', 'Mervin Street', 'colombo 3', '16/6697'),
('390', '995', 'Nawaloka Street', 'Galle', '1387467'),
('389', '386', 'Vihara Street', 'Anuradhapura', '15/5694'),
('388', '559', 'Dharmapala Road', 'Nugegoda', '36/6545'),
('387', '324', 'Weera Street', 'Kegalle', '36/5466'),
('386', '529', 'De Silva Street', 'colombo 3', '15/256'),
('385', '245', 'Mervin Street', 'Panadura', '49/6958'),
('384', '960', 'Premadasa Street', 'colombo 4', '16/694'),
('383', '364', 'Saliya Street', 'colombo 4', '1843350'),
('382', '293', 'Stage 2', 'Anuradhapura', '16/6697'),
('381', '995', 'Weerarathna Street', 'Mathara', '1387467'),
('380', '386', 'Saliya Street', 'colombo4', '15/5694'),
('379', '679', 'Rathnamalala Street', 'Panadura', '36/6545'),
('378', '764', 'De Silva Street', 'Colombo 3', '36/5466'),
('377', '136', 'Rajamahawihara Street', 'Nawinna', '4556');

-- --------------------------------------------------------

--
-- Table structure for table `student_contact`
--

CREATE TABLE `student_contact` (
  `contact1` varchar(45) DEFAULT NULL,
  `contact2` varchar(45) DEFAULT NULL,
  `s_id` varchar(11) NOT NULL,
  `emg_contact` varchar(45) DEFAULT NULL,
  `emg_person` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_contact`
--

INSERT INTO `student_contact` (`contact1`, `contact2`, `s_id`, `emg_contact`, `emg_person`) VALUES
('772362365', '776993652', '401', '776993652', 'father'),
('774405700', '714866549', '397', '775486549', 'father'),
('714582934', '773456753', '395', '765467834', 'mother'),
('725698569', '714586125', '394', '723695215', 'mother'),
('716614962', '725653694', '393', '715661492', 'father'),
('719569426', '725689544', '392', '782564486', 'father'),
('759863269', '712336549', '391', '723366549', 'mother'),
('769856519', '77672958', '390', '776729588', 'father'),
('772362365', '7769936529', '389', '776993652', 'father'),
('782562399', '76985695', '388', '769853695', 'father'),
('774405700', '714866549', '387', '775486549', 'father'),
('725864589', '752489625', '386', '752456898', 'father'),
('725698569', '714586125', '385', '723695215', 'mother'),
('716614962', '725653694', '384', '715661492', 'father'),
('719569426', '725689544', '383', '782564486', 'father'),
('759863267', '712336549', '382', '723366549', 'mother'),
('769856519', '776729589', '381', '776729588', 'father'),
('772362365', '776993652', '380', '776993652', 'father'),
('712562399', '769856959', '379', '769853695', 'father'),
('774405700', '714866549', '378', '775486549', 'father'),
('776932398', '788744688', '377', '729744688', 'mother');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `s_id` varchar(20) NOT NULL,
  `course_id` varchar(11) NOT NULL,
  `exam_grade` varchar(45) DEFAULT NULL,
  `assignment_grade` varchar(45) DEFAULT NULL,
  `start_date` varchar(45) DEFAULT NULL,
  `end_date` varchar(45) DEFAULT NULL,
  `attendance` varchar(45) DEFAULT NULL,
  `attempt` int(5) NOT NULL,
  `year` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`s_id`, `course_id`, `exam_grade`, `assignment_grade`, `start_date`, `end_date`, `attendance`, `attempt`, `year`) VALUES
('401', 'SCS1102', 'A', 'A', NULL, NULL, NULL, 0, '2016'),
('395', 'SCS1102', 'W', 'W', NULL, NULL, NULL, 0, '2016'),
('394', 'SCS1102', 'A-', 'A', NULL, NULL, NULL, 0, '2017'),
('393', 'SCS1102', 'W', 'W', NULL, NULL, NULL, 0, '2017'),
('392', 'SCS1102', 'D+', 'W', NULL, NULL, NULL, 0, '2017'),
('391', 'SCS1102', 'B-', 'B', NULL, NULL, NULL, 0, '2017'),
('390', 'SCS1102', 'B-', 'C', NULL, NULL, NULL, 0, '2017'),
('389', 'SCS1102', 'W', 'A-', NULL, NULL, NULL, 0, '2017'),
('388', 'SCS1102', 'W', 'B-', NULL, NULL, NULL, 0, '2017'),
('387', 'SCS1102', 'A', 'B-', NULL, NULL, NULL, 0, '2017'),
('386', 'SCS1102', 'B', 'B+', NULL, NULL, NULL, 0, '2017'),
('385', 'SCS1102', 'A-', 'B+', NULL, NULL, NULL, 0, '2017'),
('384', 'SCS1102', 'W', 'C+', NULL, NULL, NULL, 0, '2017'),
('383', 'SCS1102', 'B+', 'B', NULL, NULL, NULL, 0, '2017'),
('382', 'SCS1102', 'A-', 'A', NULL, NULL, NULL, 0, '2017'),
('381', 'SCS1102', 'A', 'W', NULL, NULL, NULL, 0, '2017'),
('380', 'SCS1102', '', NULL, NULL, NULL, NULL, 0, '2017'),
('379', 'SCS1102', 'A+', 'B', NULL, NULL, NULL, 0, '2017'),
('378', 'SCS1102', '', NULL, NULL, NULL, NULL, 0, '2017'),
('377', 'SCS1102', 'B+', NULL, NULL, NULL, NULL, 0, '2017'),
('379', 'SCS1101', 'A+', 'B', '', '', '', 0, '2017'),
('397', 'SCS1102', 'B', 'B+', NULL, NULL, NULL, 0, '2016'),
('402', 'SCS1102', 'C', 'C+', NULL, NULL, NULL, 0, '2016'),
('403', 'SCS1102', 'A-', 'A', NULL, NULL, NULL, 0, '2015'),
('405', 'SCS1102', 'W', 'W', NULL, NULL, NULL, 0, '2015'),
('406', 'SCS1102', 'B', 'B-', NULL, NULL, NULL, 0, '2015');

-- --------------------------------------------------------

--
-- Table structure for table `student_degree`
--

CREATE TABLE `student_degree` (
  `s_id` varchar(20) NOT NULL,
  `degree_id` int(11) NOT NULL,
  `start_date` varchar(45) DEFAULT NULL,
  `end_date` varchar(45) DEFAULT NULL,
  `class` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_degree`
--

INSERT INTO `student_degree` (`s_id`, `degree_id`, `start_date`, `end_date`, `class`) VALUES
('401', 1, '2017/12/11', NULL, NULL),
('395', 2, '2017/12/11', NULL, NULL),
('394', 2, '2017/12/11', NULL, NULL),
('393', 2, '2017/12/11', NULL, NULL),
('392', 1, '2017/12/11', NULL, NULL),
('391', 1, '2017/12/11', NULL, NULL),
('390', 2, '2017/12/11', NULL, NULL),
('389', 1, '2017/12/11', NULL, NULL),
('388', 1, '2017/12/11', NULL, NULL),
('387', 1, '2017/12/11', NULL, NULL),
('386', 1, '2017/12/11', NULL, NULL),
('385', 2, '2017/12/11', NULL, NULL),
('384', 2, '2017/12/11', NULL, NULL),
('383', 1, '2017/12/11', NULL, NULL),
('382', 1, '2017/12/11', NULL, NULL),
('381', 2, '2017/12/11', NULL, NULL),
('380', 1, '2017/12/11', NULL, NULL),
('379', 1, '2017/12/11', NULL, NULL),
('378', 1, '2017/12/11', NULL, NULL),
('377', 2, '2017/12/11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_family`
--

CREATE TABLE `student_family` (
  `s_id` varchar(20) NOT NULL,
  `father_name` varchar(45) DEFAULT NULL,
  `mother_name` varchar(45) DEFAULT NULL,
  `spouse` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_family`
--

INSERT INTO `student_family` (`s_id`, `father_name`, `mother_name`, `spouse`) VALUES
('401', 'Saliya', 'Nalani', 'Wife');

-- --------------------------------------------------------

--
-- Table structure for table `student_hostel`
--

CREATE TABLE `student_hostel` (
  `s_id` varchar(20) NOT NULL,
  `hostel_id` int(11) NOT NULL,
  `start_date` varchar(45) DEFAULT NULL,
  `end_date` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_scholar`
--

CREATE TABLE `student_scholar` (
  `index_no` varchar(20) NOT NULL,
  `schol_id` int(1) NOT NULL,
  `schol_other` varchar(50) NOT NULL,
  `schol_amount` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_scholar`
--

INSERT INTO `student_scholar` (`index_no`, `schol_id`, `schol_other`, `schol_amount`) VALUES
('15000371', 1, '', '5000'),
('15000372', 2, '', '3000'),
('15000373', 1, '', '6000'),
('15000374', 3, '', '4000'),
('15000375', 2, '', '1000'),
('1710379', 2, '', '2300');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `type` varchar(255) NOT NULL,
  `nic` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `first_name`, `last_name`, `type`, `nic`) VALUES
(2312414, 'basurupasan@gmail.com', '$2y$12$BKG4MSMZoJbe0Suwt90fXuWpY52/FNhxawXbXgAGVfA3HAgO1eqzW', 'Pasan', 'Basuru', 'SAR_exam', '952571966V'),
(2312415, 'hmk@gmail.com', '$2y$12$BKG4MSMZoJbe0Suwt90fXuWpY52/FNhxawXbXgAGVfA3HAgO1eqzW', 'Ann', 'Perera', 'admin', '853626372V'),
(2312416, 'cwa@gmail.com', '$2y$12$BKG4MSMZoJbe0Suwt90fXuWpY52/FNhxawXbXgAGVfA3HAgO1eqzW', 'colvin', 'silva', 'SAR_exam', '674398438V'),
(2312417, 'ert@yahoo.com', '$2y$12$BKG4MSMZoJbe0Suwt90fXuWpY52/FNhxawXbXgAGVfA3HAgO1eqzW', 'Angathan', 'nesarasa', 'lecturer', '954748273V'),
(2312419, 'klm@example.com', '$2y$12$BKG4MSMZoJbe0Suwt90fXuWpY52/FNhxawXbXgAGVfA3HAgO1eqzW', 'Kelaermn', 'John', 'ar_acedemic', '875643219V'),
(2312420, 'pos@example.com', '$2y$12$BKG4MSMZoJbe0Suwt90fXuWpY52/FNhxawXbXgAGVfA3HAgO1eqzW', 'Sahan', 'Perara', 'caa_academic', '565643219V'),
(2312421, 'caa@gmail.com', '$2y$12$BKG4MSMZoJbe0Suwt90fXuWpY52/FNhxawXbXgAGVfA3HAgO1eqzW', 'Kevin', 'Perera', 'CAA_exam', '876466736V'),
(2312422, 'oshani@gmail.com', '$2y$12$XCW/EXUxaL1Ms9JOkkZh2eV9PMwJn49uBaR7KeN.a0cwwzZsD9DGO', 'Oshani', 'Silva', 'student', '902364151V');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ar_acedemic`
--
ALTER TABLE `ar_acedemic`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `caa_academic`
--
ALTER TABLE `caa_academic`
  ADD PRIMARY KEY (`caa_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `lect_id` (`lect_username`);

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`degree_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventdate`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`hostel_id`);

--
-- Indexes for table `last_edited`
--
ALTER TABLE `last_edited`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `scholarship`
--
ALTER TABLE `scholarship`
  ADD PRIMARY KEY (`scol_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `stu`
--
ALTER TABLE `stu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fname` (`fname`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `nic` (`nic`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `student_address`
--
ALTER TABLE `student_address`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `student_contact`
--
ALTER TABLE `student_contact`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`s_id`,`course_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `student_degree`
--
ALTER TABLE `student_degree`
  ADD PRIMARY KEY (`s_id`,`degree_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `degree_id` (`degree_id`);

--
-- Indexes for table `student_family`
--
ALTER TABLE `student_family`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `student_hostel`
--
ALTER TABLE `student_hostel`
  ADD PRIMARY KEY (`s_id`,`hostel_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `hostel_id` (`hostel_id`);

--
-- Indexes for table `student_scholar`
--
ALTER TABLE `student_scholar`
  ADD PRIMARY KEY (`index_no`,`schol_id`),
  ADD KEY `s_id` (`index_no`),
  ADD KEY `scol_id` (`schol_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `last_edited`
--
ALTER TABLE `last_edited`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `scholarship`
--
ALTER TABLE `scholarship`
  MODIFY `scol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stu`
--
ALTER TABLE `stu`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=407;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2312423;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
