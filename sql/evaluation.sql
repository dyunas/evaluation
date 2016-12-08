-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2016 at 03:09 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `evaluation`
--
CREATE DATABASE IF NOT EXISTS `evaluation` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `evaluation`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `uname` varchar(32) NOT NULL,
  `pword` char(32) NOT NULL,
  `user_type` tinyint(2) NOT NULL,
  `photo` char(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `date_created` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `last_seen` int(11) NOT NULL,
  `last_mod` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `uname`, `pword`, `user_type`, `photo`, `fname`, `mname`, `lname`, `date_created`, `is_active`, `last_seen`, `last_mod`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '3416a75f4cea9109507cacd8e2f2aefc.jpg', 'Sweetie', '', 'Dela Cruz', 1449075554, 0, 1457766522, 1456115440);

-- --------------------------------------------------------

--
-- Table structure for table `col_student_tbl`
--

CREATE TABLE IF NOT EXISTS `col_student_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `last_seen` int(11) NOT NULL,
  `photo` char(50) NOT NULL,
  `pword` char(32) NOT NULL,
  `stud_id` char(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `course` char(10) NOT NULL,
  `yr_lvl` varchar(15) NOT NULL,
  `section` char(30) NOT NULL,
  `date_created` int(11) NOT NULL,
  `last_mod` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `col_student_tbl`
--

INSERT INTO `col_student_tbl` (`id`, `user_type`, `is_active`, `last_seen`, `photo`, `pword`, `stud_id`, `fname`, `mname`, `lname`, `course`, `yr_lvl`, `section`, `date_created`, `last_mod`) VALUES
(1, 15, 0, 1457671880, 'f7177163c833dff4b38fc8d2872f1ec6.jpg', '5f4dcc3b5aa765d61d8327deb882cf99', '11-1141-11', 'Jonathan', 'Almodiel', 'Quebral', 'ACT', '2nd year', '1-22', 1449399501, 0),
(2, 15, 0, 1457671443, '', '5f4dcc3b5aa765d61d8327deb882cf99', '15-1501-44', 'Jun', '', 'Sabayton', 'BSIT', '4th year', '4-41', 1453411586, 0),
(3, 15, 0, 1457671524, '', '8d53f06c37248ba47128d1b304dc8704', '11-1573-11', 'Jade', 'Magpily', 'Limjuco', 'BSIT', '4th year', '1-42', 1453452585, 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_tbl`
--

CREATE TABLE IF NOT EXISTS `course_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(100) NOT NULL,
  `course_code` char(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `course_tbl`
--

INSERT INTO `course_tbl` (`id`, `course`, `course_code`) VALUES
(1, 'Associate in Computer Technology', 'ACT'),
(2, 'Associate in Computer Secretarial', 'ACS'),
(4, 'Bachelor of Science in Office Administration', 'BSOA'),
(5, 'Bachelor of Science in Information Technology', 'BSIT');

-- --------------------------------------------------------

--
-- Table structure for table `department_tbl`
--

CREATE TABLE IF NOT EXISTS `department_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dprtmnt_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `department_tbl`
--

INSERT INTO `department_tbl` (`id`, `dprtmnt_name`) VALUES
(1, 'Executive Department'),
(2, 'Academic Department'),
(3, 'Maintenance Department'),
(4, 'College Department'),
(5, 'High School Department'),
(6, 'Elementary Department'),
(7, 'IT Department'),
(8, 'General Education Department');

-- --------------------------------------------------------

--
-- Table structure for table `elem_student_tbl`
--

CREATE TABLE IF NOT EXISTS `elem_student_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `last_seen` int(11) NOT NULL,
  `photo` char(50) NOT NULL,
  `pword` char(32) NOT NULL,
  `stud_id` char(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `yr_lvl` varchar(15) NOT NULL,
  `section` varchar(30) NOT NULL,
  `date_created` int(11) NOT NULL,
  `last_mod` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `elem_student_tbl`
--

INSERT INTO `elem_student_tbl` (`id`, `user_type`, `is_active`, `last_seen`, `photo`, `pword`, `stud_id`, `fname`, `mname`, `lname`, `yr_lvl`, `section`, `date_created`, `last_mod`) VALUES
(1, 20, 1, 0, '', '8d53f06c37248ba47128d1b304dc8704', '2015-E001', 'Junior', '', 'Dela Cruz', 'Grade 1', 'Section 1', 1457758150, 1457763554);

-- --------------------------------------------------------

--
-- Table structure for table `employee_tbl`
--

CREATE TABLE IF NOT EXISTS `employee_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `last_seen` int(11) NOT NULL,
  `photo` char(50) NOT NULL,
  `pword` char(32) NOT NULL,
  `emp_id` char(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `position` varchar(150) NOT NULL,
  `department` varchar(100) NOT NULL,
  `date_created` int(11) NOT NULL,
  `last_mod` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `employee_tbl`
--

INSERT INTO `employee_tbl` (`id`, `user_type`, `is_active`, `last_seen`, `photo`, `pword`, `emp_id`, `fname`, `mname`, `lname`, `position`, `department`, `date_created`, `last_mod`) VALUES
(1, 2, 0, 1456654567, '', '8d53f06c37248ba47128d1b304dc8704', '1981-001', 'Maximo', '', 'Abesamis', '2', 'Executive Department', 1453972124, 0),
(2, 3, 0, 0, '', '8d53f06c37248ba47128d1b304dc8704', '1981-002', 'Nelson', '', 'Abesamis', '3', 'Executive Department', 1453972191, 0),
(3, 5, 0, 1456508164, '', '8d53f06c37248ba47128d1b304dc8704', '2010-001', 'Jobert', '', 'Bravo', '5', 'Academic Department', 1453972227, 0),
(4, 7, 0, 0, '', '8d53f06c37248ba47128d1b304dc8704', '2010-002', 'Gliceria', '', 'Manglapus', '7', 'College Department', 1453972312, 0),
(5, 8, 0, 1456669473, '', '8d53f06c37248ba47128d1b304dc8704', '2010-003', 'Jayson', '', 'Guiterrez', '8', 'High School Department', 1453972384, 0),
(6, 17, 0, 0, '', '8d53f06c37248ba47128d1b304dc8704', '2010-004', 'Patricia', '', 'Descallar', '17', 'IT Department', 1453972453, 0),
(7, 12, 0, 1456669431, '', '8d53f06c37248ba47128d1b304dc8704', '2013-001', 'Ray', 'Rosal', 'Centeno', '12', 'IT Department', 1453972473, 0),
(9, 11, 0, 0, '', '8d53f06c37248ba47128d1b304dc8704', '2013-002', 'High School', '', 'Teacher', '11', 'High School Department', 1454135892, 0),
(10, 12, 0, 0, '', '8d53f06c37248ba47128d1b304dc8704', '2015-001', 'Robbie Carlo', '', 'Jacinto', '12', 'IT Department', 1454136505, 0),
(11, 19, 0, 0, '', '8d53f06c37248ba47128d1b304dc8704', '2010-006', 'Kung', '', 'Sinokaman', '19', 'Academic Department', 1454136663, 0),
(12, 6, 0, 0, '', '8d53f06c37248ba47128d1b304dc8704', '2010-007', 'Vice', '', 'Operations', '6', 'Executive Department', 1454136825, 0),
(13, 18, 0, 0, '', '8d53f06c37248ba47128d1b304dc8704', '2013-005', 'Janitor', '', 'Ahko', '18', 'Maintenance Department', 1456208721, 0),
(14, 13, 0, 0, '', '8d53f06c37248ba47128d1b304dc8704', '2009-001', 'School', 'Teacher', 'High', '13', 'High School Department', 1457639234, 0),
(15, 14, 0, 0, '', '8d53f06c37248ba47128d1b304dc8704', '2009-010', 'Teacher', 'Ako', 'Elementary', '14', 'Elementary Department', 1457762492, 0);

-- --------------------------------------------------------

--
-- Table structure for table `emp_consolidated_poll_tbl`
--

CREATE TABLE IF NOT EXISTS `emp_consolidated_poll_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evltn_dte` int(11) NOT NULL,
  `emp_id` char(11) NOT NULL,
  `question_id` int(2) NOT NULL,
  `exlnt` int(11) NOT NULL,
  `vry_good` int(11) NOT NULL,
  `good` int(11) NOT NULL,
  `stsfctry` int(11) NOT NULL,
  `fair` int(11) NOT NULL,
  `poor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emp_individual_poll_tbl`
--

CREATE TABLE IF NOT EXISTS `emp_individual_poll_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evltn_dte` int(11) NOT NULL,
  `evltr_id` char(11) NOT NULL,
  `emp_id` char(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emp_questions`
--

CREATE TABLE IF NOT EXISTS `emp_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(160) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `emp_questions`
--

INSERT INTO `emp_questions` (`id`, `question`) VALUES
(1, 'Sample Question NO. 1'),
(2, 'Sample Question NO. 2'),
(3, 'Sample Question NO. 3'),
(4, 'Sample Question NO. 4'),
(5, 'Sample Question NO. 5'),
(6, 'Sample Question NO. 6'),
(7, 'Sample Question NO. 7'),
(8, 'Sample Question NO. 8'),
(9, 'Sample Question NO. 9'),
(10, 'Sample Question NO. 10');

-- --------------------------------------------------------

--
-- Table structure for table `emp_question_poll_tbl`
--

CREATE TABLE IF NOT EXISTS `emp_question_poll_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evltn_dte` int(11) NOT NULL,
  `evltr_id` char(11) NOT NULL,
  `emp_id` char(11) NOT NULL,
  `qstn_id` int(11) NOT NULL,
  `rating` int(2) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `eval_session`
--

CREATE TABLE IF NOT EXISTS `eval_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_active` tinyint(1) NOT NULL,
  `date` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `eval_session`
--

INSERT INTO `eval_session` (`id`, `is_active`, `date`, `status`) VALUES
(1, 1, 1454087854, 'started'),
(2, 0, 1454089052, 'ended'),
(3, 1, 1454089145, 'started'),
(4, 0, 1454089460, 'ended'),
(5, 1, 1454136895, 'started'),
(6, 0, 1454136983, 'ended'),
(7, 1, 1457661154, 'started'),
(8, 0, 1457766425, 'ended');

-- --------------------------------------------------------

--
-- Table structure for table `exec_consolidated_poll_tbl`
--

CREATE TABLE IF NOT EXISTS `exec_consolidated_poll_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evltn_dte` int(11) NOT NULL,
  `emp_id` char(11) NOT NULL,
  `question_id` int(2) NOT NULL,
  `exlnt` int(11) NOT NULL,
  `vry_good` int(11) NOT NULL,
  `good` int(11) NOT NULL,
  `stsfctry` int(11) NOT NULL,
  `fair` int(11) NOT NULL,
  `poor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exec_individual_poll_tbl`
--

CREATE TABLE IF NOT EXISTS `exec_individual_poll_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evltn_dte` int(11) NOT NULL,
  `evltr_id` char(11) NOT NULL,
  `emp_id` char(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `exec_individual_poll_tbl`
--

INSERT INTO `exec_individual_poll_tbl` (`id`, `evltn_dte`, `evltr_id`, `emp_id`) VALUES
(1, 1456661760, '1981-001', '1981-002');

-- --------------------------------------------------------

--
-- Table structure for table `exec_questions`
--

CREATE TABLE IF NOT EXISTS `exec_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(160) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `exec_questions`
--

INSERT INTO `exec_questions` (`id`, `question`) VALUES
(1, 'Sample Question NO. 1'),
(2, 'Sample Question NO. 2'),
(3, 'Sample Question NO. 3'),
(4, 'Sample Question NO. 4'),
(5, 'Sample Question NO. 5'),
(6, 'Sample Question NO. 6'),
(7, 'Sample Question NO. 7'),
(8, 'Sample Question NO. 8'),
(9, 'Sample Question NO. 9'),
(10, 'Sample Question NO. 10');

-- --------------------------------------------------------

--
-- Table structure for table `exec_question_poll_tbl`
--

CREATE TABLE IF NOT EXISTS `exec_question_poll_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evltn_dte` int(11) NOT NULL,
  `evltr_id` char(11) NOT NULL,
  `emp_id` char(11) NOT NULL,
  `qstn_id` int(11) NOT NULL,
  `rating` int(2) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `exec_question_poll_tbl`
--

INSERT INTO `exec_question_poll_tbl` (`id`, `evltn_dte`, `evltr_id`, `emp_id`, `qstn_id`, `rating`, `remarks`) VALUES
(1, 1456661760, '1981-001', '1981-002', 1, 6, ''),
(2, 1456661760, '1981-001', '1981-002', 2, 6, ''),
(3, 1456661760, '1981-001', '1981-002', 3, 6, ''),
(4, 1456661760, '1981-001', '1981-002', 4, 6, ''),
(5, 1456661760, '1981-001', '1981-002', 5, 6, ''),
(6, 1456661760, '1981-001', '1981-002', 6, 6, ''),
(7, 1456661760, '1981-001', '1981-002', 7, 6, ''),
(8, 1456661760, '1981-001', '1981-002', 8, 6, ''),
(9, 1456661760, '1981-001', '1981-002', 9, 6, ''),
(10, 1456661760, '1981-001', '1981-002', 10, 6, '');

-- --------------------------------------------------------

--
-- Table structure for table `exec_tag_validator`
--

CREATE TABLE IF NOT EXISTS `exec_tag_validator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evltn_dte` int(11) NOT NULL,
  `evltr_id` char(11) NOT NULL,
  `evltee_id` char(11) NOT NULL,
  `position_id` int(3) NOT NULL,
  `is_valid` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `exec_tag_validator`
--

INSERT INTO `exec_tag_validator` (`id`, `evltn_dte`, `evltr_id`, `evltee_id`, `position_id`, `is_valid`) VALUES
(1, 1456575360, '2010-001', '2010-002', 7, 1),
(2, 1456575360, '2010-001', '2010-003', 8, 1),
(3, 1456661760, '1981-001', '1981-002', 3, 0),
(4, 1456661760, '1981-001', '2010-001', 5, 1),
(5, 1456661760, '1981-001', '2010-007', 6, 1),
(6, 1456661760, '1981-001', '2010-002', 7, 1),
(7, 1456661760, '1981-001', '2010-003', 8, 1),
(8, 1456834560, '1981-001', '1981-002', 3, 1),
(9, 1456834560, '1981-001', '2010-001', 5, 1),
(10, 1456834560, '1981-001', '2010-007', 6, 1),
(11, 1456834560, '1981-001', '2010-002', 7, 1),
(12, 1456834560, '1981-001', '2010-003', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hr_tracking`
--

CREATE TABLE IF NOT EXISTS `hr_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `date` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `hr_tracking`
--

INSERT INTO `hr_tracking` (`id`, `user_id`, `name`, `position`, `date`, `status`) VALUES
(1, '11-1141-11', 'Quebral, Jonathan Almodiel', 'College Student', 1454087854, 0),
(2, '15-1501-44', 'Sabayton, Jun ', 'College Student', 1454087854, 0),
(3, '11-1573-11', 'Limjuco, Jade Magpily', 'College Student', 1454087854, 0),
(4, '2015-H001', 'Lambert, Joel ', 'High School Student', 1454087854, 0),
(5, '2010-002', 'Manglapus, Gliceria ', 'College Dean', 1454087854, 0),
(6, '2010-003', 'Guiterrez, Jayson ', 'Principal', 1454087854, 0),
(7, '2013-001', 'Centeno, Ray Rosal', 'College Instructor', 1454087854, 0),
(8, '2015-001', 'Jacinto, Robbie Carlo ', 'College Instructor', 1454087854, 0),
(9, '2010-004', 'Descallar, Patricia ', 'Department Head', 1454087854, 0),
(10, '11-1141-11', 'Quebral, Jonathan Almodiel', 'College Student', 1454089145, 1),
(11, '15-1501-44', 'Sabayton, Jun ', 'College Student', 1454089145, 0),
(12, '11-1573-11', 'Limjuco, Jade Magpily', 'College Student', 1454089145, 0),
(13, '2015-H001', 'Lambert, Joel ', 'High School Student', 1454089145, 0),
(14, '2010-002', 'Manglapus, Gliceria ', 'College Dean', 1454089145, 0),
(15, '2010-003', 'Guiterrez, Jayson ', 'Principal', 1454089145, 0),
(16, '2013-001', 'Centeno, Ray Rosal', 'College Instructor', 1454089145, 0),
(17, '2015-001', 'Jacinto, Robbie Carlo ', 'College Instructor', 1454089145, 0),
(18, '2010-004', 'Descallar, Patricia ', 'Department Head', 1454089145, 0),
(19, '11-1141-11', 'Quebral, Jonathan Almodiel', 'College Student', 1454136895, 1),
(20, '15-1501-44', 'Sabayton, Jun ', 'College Student', 1454136895, 0),
(21, '11-1573-11', 'Limjuco, Jade Magpily', 'College Student', 1454136895, 0),
(22, '2015-H001', 'Lambert, Joel ', 'High School Student', 1454136895, 0),
(23, '2010-002', 'Manglapus, Gliceria ', 'College Dean', 1454136895, 0),
(24, '2010-003', 'Guiterrez, Jayson ', 'Principal', 1454136895, 0),
(25, '2013-002', 'Teacher, High School ', 'High School Registrar', 1454136895, 0),
(26, '2013-001', 'Centeno, Ray Rosal', 'College Instructor', 1454136895, 0),
(27, '2015-001', 'Jacinto, Robbie Carlo ', 'College Instructor', 1454136895, 0),
(28, '2010-004', 'Descallar, Patricia ', 'Department Head', 1454136895, 0),
(29, '2010-006', 'Sinokaman, Kung ', 'VP for Student Affairs', 1454136895, 0),
(30, '11-1141-11', 'Quebral, Jonathan Almodiel', 'College Student', 1457661154, 1),
(31, '15-1501-44', 'Sabayton, Jun ', 'College Student', 1457661154, 1),
(32, '11-1573-11', 'Limjuco, Jade Magpily', 'College Student', 1457661154, 1),
(33, '2015-H001', 'Lambert, Joel ', 'High School Student', 1457661154, 0),
(34, '2010-002', 'Manglapus, Gliceria ', 'College Dean', 1457661154, 0),
(35, '2010-003', 'Guiterrez, Jayson ', 'Principal', 1457661154, 0),
(36, '2013-002', 'Teacher, High School ', 'High School Registrar', 1457661154, 0),
(37, '2013-001', 'Centeno, Ray Rosal', 'College Instructor', 1457661154, 0),
(38, '2015-001', 'Jacinto, Robbie Carlo ', 'College Instructor', 1457661154, 0),
(39, '2009-001', 'High, School Teacher', 'High School Teacher', 1457661154, 0),
(40, '2010-004', 'Descallar, Patricia ', 'Department Head', 1457661154, 0),
(41, '2013-005', 'Ahko, Janitor ', 'Janitor', 1457661154, 0),
(42, '2010-006', 'Sinokaman, Kung ', 'VP for Student Affairs', 1457661154, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hs_student_tbl`
--

CREATE TABLE IF NOT EXISTS `hs_student_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `last_seen` int(11) NOT NULL,
  `photo` char(50) NOT NULL,
  `pword` char(32) NOT NULL,
  `stud_id` char(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `yr_lvl` varchar(15) NOT NULL,
  `section` varchar(30) NOT NULL,
  `date_created` int(11) NOT NULL,
  `last_mod` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hs_student_tbl`
--

INSERT INTO `hs_student_tbl` (`id`, `user_type`, `is_active`, `last_seen`, `photo`, `pword`, `stud_id`, `fname`, `mname`, `lname`, `yr_lvl`, `section`, `date_created`, `last_mod`) VALUES
(1, 16, 0, 1453483893, 'd9d4f495e875a2e075a1a4a6e1b9770f.jpg', '5f4dcc3b5aa765d61d8327deb882cf99', '2015-H001', 'Joel', '', 'Lambert', 'Grade 7', 'Section 1', 1449393280, 0);

-- --------------------------------------------------------

--
-- Table structure for table `org_chart`
--

CREATE TABLE IF NOT EXISTS `org_chart` (
  `parent_node` int(50) NOT NULL,
  `child_node` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org_chart`
--

INSERT INTO `org_chart` (`parent_node`, `child_node`) VALUES
(1, 2),
(2, 11),
(2, 3),
(3, 4),
(4, 6),
(2, 12),
(6, 7),
(6, 10),
(3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `other_supervision_tbl`
--

CREATE TABLE IF NOT EXISTS `other_supervision_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evltr_id` char(11) NOT NULL,
  `assignee_id` char(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `other_supervision_tbl`
--

INSERT INTO `other_supervision_tbl` (`id`, `evltr_id`, `assignee_id`) VALUES
(1, '2013-001', '2015-001'),
(2, '2010-004', '2013-001'),
(3, '2010-004', '2015-001'),
(4, '2010-001', '2010-002'),
(5, '2010-001', '2010-003'),
(7, '2010-002', '2015-001'),
(8, '2010-002', '2010-004'),
(9, '1981-001', '1981-002'),
(10, '1981-001', '2010-001'),
(11, '1981-001', '2010-007'),
(12, '1981-001', '2010-002'),
(13, '1981-001', '2010-003');

-- --------------------------------------------------------

--
-- Table structure for table `positions_tbl`
--

CREATE TABLE IF NOT EXISTS `positions_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(100) NOT NULL,
  `user_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `positions_tbl`
--

INSERT INTO `positions_tbl` (`id`, `position_name`, `user_type`) VALUES
(1, 'President', 2),
(2, 'Executive Vice President', 3),
(3, 'VP for Finance and Administration', 4),
(4, 'VP for Academic Affairs', 5),
(5, 'VP for Operations', 6),
(6, 'College Dean', 7),
(7, 'Principal', 8),
(8, 'Head Registrar', 9),
(9, 'College Registrar', 10),
(10, 'High School Registrar', 11),
(11, 'College Instructor', 12),
(12, 'High School Teacher', 13),
(13, 'Elementary Teacher', 14),
(14, 'College Student', 15),
(15, 'High School Student', 16),
(16, 'Department Head', 17),
(17, 'Janitor', 18),
(18, 'VP for Student Affairs', 19),
(19, 'Elementary Student', 20);

-- --------------------------------------------------------

--
-- Table structure for table `student_subj_tbl`
--

CREATE TABLE IF NOT EXISTS `student_subj_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` char(11) NOT NULL,
  `stud_id` char(13) NOT NULL,
  `subject` char(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `student_subj_tbl`
--

INSERT INTO `student_subj_tbl` (`id`, `emp_id`, `stud_id`, `subject`) VALUES
(1, '2009-001', '2015-H001', 'EN12Lit'),
(2, '2013-001', '11-1141-11', 'ITE430'),
(3, '2013-001', '11-1141-11', 'ITE326'),
(4, '2010-002', '11-1141-11', 'SSC404'),
(5, '2015-001', '11-1141-11', 'CP101'),
(6, '2010-002', '15-1501-44', 'SSC404'),
(7, '2010-002', '11-1573-11', 'SSC404'),
(8, '2009-010', '2015-E001', 'EN1');

-- --------------------------------------------------------

--
-- Table structure for table `stud_col_consolidated_poll_tbl`
--

CREATE TABLE IF NOT EXISTS `stud_col_consolidated_poll_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evltn_dte` int(11) NOT NULL,
  `emp_id` char(11) NOT NULL,
  `question_id` int(2) NOT NULL,
  `exlnt` int(11) NOT NULL,
  `vry_good` int(11) NOT NULL,
  `good` int(11) NOT NULL,
  `stsfctry` int(11) NOT NULL,
  `fair` int(11) NOT NULL,
  `poor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `stud_col_consolidated_poll_tbl`
--

INSERT INTO `stud_col_consolidated_poll_tbl` (`id`, `evltn_dte`, `emp_id`, `question_id`, `exlnt`, `vry_good`, `good`, `stsfctry`, `fair`, `poor`) VALUES
(1, 1457661154, '2010-002', 1, 3, 0, 0, 0, 0, 0),
(2, 1457661154, '2010-002', 2, 2, 1, 0, 0, 0, 0),
(3, 1457661154, '2010-002', 3, 2, 1, 0, 0, 0, 0),
(4, 1457661154, '2010-002', 4, 3, 0, 0, 0, 0, 0),
(5, 1457661154, '2010-002', 5, 3, 0, 0, 0, 0, 0),
(6, 1457661154, '2010-002', 6, 2, 1, 0, 0, 0, 0),
(7, 1457661154, '2010-002', 7, 2, 1, 0, 0, 0, 0),
(8, 1457661154, '2010-002', 8, 2, 1, 0, 0, 0, 0),
(9, 1457661154, '2010-002', 9, 3, 0, 0, 0, 0, 0),
(10, 1457661154, '2010-002', 10, 3, 0, 0, 0, 0, 0),
(11, 1457661154, '2013-001', 1, 2, 0, 0, 0, 0, 0),
(12, 1457661154, '2013-001', 2, 2, 0, 0, 0, 0, 0),
(13, 1457661154, '2013-001', 3, 2, 0, 0, 0, 0, 0),
(14, 1457661154, '2013-001', 4, 2, 0, 0, 0, 0, 0),
(15, 1457661154, '2013-001', 5, 2, 0, 0, 0, 0, 0),
(16, 1457661154, '2013-001', 6, 2, 0, 0, 0, 0, 0),
(17, 1457661154, '2013-001', 7, 2, 0, 0, 0, 0, 0),
(18, 1457661154, '2013-001', 8, 2, 0, 0, 0, 0, 0),
(19, 1457661154, '2013-001', 9, 2, 0, 0, 0, 0, 0),
(20, 1457661154, '2013-001', 10, 2, 0, 0, 0, 0, 0),
(21, 1457661154, '2015-001', 1, 1, 0, 0, 0, 0, 0),
(22, 1457661154, '2015-001', 2, 1, 0, 0, 0, 0, 0),
(23, 1457661154, '2015-001', 3, 1, 0, 0, 0, 0, 0),
(24, 1457661154, '2015-001', 4, 1, 0, 0, 0, 0, 0),
(25, 1457661154, '2015-001', 5, 1, 0, 0, 0, 0, 0),
(26, 1457661154, '2015-001', 6, 1, 0, 0, 0, 0, 0),
(27, 1457661154, '2015-001', 7, 1, 0, 0, 0, 0, 0),
(28, 1457661154, '2015-001', 8, 1, 0, 0, 0, 0, 0),
(29, 1457661154, '2015-001', 9, 1, 0, 0, 0, 0, 0),
(30, 1457661154, '2015-001', 10, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stud_elem_consolidated_poll_tbl`
--

CREATE TABLE IF NOT EXISTS `stud_elem_consolidated_poll_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evltn_dte` int(11) NOT NULL,
  `emp_id` char(11) NOT NULL,
  `question_id` int(2) NOT NULL,
  `exlnt` int(11) NOT NULL,
  `vry_good` int(11) NOT NULL,
  `good` int(11) NOT NULL,
  `stsfctry` int(11) NOT NULL,
  `fair` int(11) NOT NULL,
  `poor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `stud_elem_consolidated_poll_tbl`
--

INSERT INTO `stud_elem_consolidated_poll_tbl` (`id`, `evltn_dte`, `emp_id`, `question_id`, `exlnt`, `vry_good`, `good`, `stsfctry`, `fair`, `poor`) VALUES
(1, 1457661154, '2009-010', 1, 1, 0, 0, 0, 0, 0),
(2, 1457661154, '2009-010', 2, 1, 0, 0, 0, 0, 0),
(3, 1457661154, '2009-010', 3, 1, 0, 0, 0, 0, 0),
(4, 1457661154, '2009-010', 4, 1, 0, 0, 0, 0, 0),
(5, 1457661154, '2009-010', 5, 1, 0, 0, 0, 0, 0),
(6, 1457661154, '2009-010', 6, 1, 0, 0, 0, 0, 0),
(7, 1457661154, '2009-010', 7, 1, 0, 0, 0, 0, 0),
(8, 1457661154, '2009-010', 8, 1, 0, 0, 0, 0, 0),
(9, 1457661154, '2009-010', 9, 1, 0, 0, 0, 0, 0),
(10, 1457661154, '2009-010', 10, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stud_hs_consolidated_poll_tbl`
--

CREATE TABLE IF NOT EXISTS `stud_hs_consolidated_poll_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evltn_dte` int(11) NOT NULL,
  `emp_id` char(11) NOT NULL,
  `question_id` int(2) NOT NULL,
  `exlnt` int(11) NOT NULL,
  `vry_good` int(11) NOT NULL,
  `good` int(11) NOT NULL,
  `stsfctry` int(11) NOT NULL,
  `fair` int(11) NOT NULL,
  `poor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stud_individual_poll_tbl`
--

CREATE TABLE IF NOT EXISTS `stud_individual_poll_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evltn_dte` int(11) NOT NULL,
  `evltr_id` char(11) NOT NULL,
  `emp_id` char(11) NOT NULL,
  `subject` char(20) NOT NULL,
  `user_type` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `stud_individual_poll_tbl`
--

INSERT INTO `stud_individual_poll_tbl` (`id`, `evltn_dte`, `evltr_id`, `emp_id`, `subject`, `user_type`) VALUES
(1, 1457661154, '15-1501-44', '2010-002', 'SSC404', 15),
(2, 1457661154, '11-1573-11', '2010-002', 'SSC404', 15),
(3, 1457661154, '11-1141-11', '2010-002', 'SSC404', 15),
(4, 1457661154, '11-1141-11', '2013-001', 'ITE430', 15),
(5, 1457661154, '11-1141-11', '2013-001', 'ITE326', 15),
(6, 1457661154, '11-1141-11', '2015-001', 'CP101', 15),
(7, 1457661154, '2015-E001', '2009-010', 'EN1', 15);

-- --------------------------------------------------------

--
-- Table structure for table `stud_questions`
--

CREATE TABLE IF NOT EXISTS `stud_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(160) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `stud_questions`
--

INSERT INTO `stud_questions` (`id`, `question`) VALUES
(1, 'Sample Question NO. 1'),
(2, 'Sample Question NO. 2'),
(3, 'Sample Question NO. 3'),
(4, 'Sample Question NO. 4'),
(5, 'Sample Question NO. 5'),
(6, 'Sample Question NO. 6'),
(7, 'Sample Question NO. 7'),
(8, 'Sample Question NO. 8'),
(9, 'Sample Question NO. 9'),
(10, 'Sample Question NO. 10');

-- --------------------------------------------------------

--
-- Table structure for table `stud_question_poll_tbl`
--

CREATE TABLE IF NOT EXISTS `stud_question_poll_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evltn_dte` int(11) NOT NULL,
  `evltr_id` char(11) NOT NULL,
  `emp_id` char(11) NOT NULL,
  `subject` char(20) NOT NULL,
  `qstn_id` int(11) NOT NULL,
  `rating` int(2) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `stud_question_poll_tbl`
--

INSERT INTO `stud_question_poll_tbl` (`id`, `evltn_dte`, `evltr_id`, `emp_id`, `subject`, `qstn_id`, `rating`, `remarks`) VALUES
(1, 1457661154, '15-1501-44', '2010-002', 'SSC404', 1, 6, ''),
(2, 1457661154, '15-1501-44', '2010-002', 'SSC404', 2, 6, ''),
(3, 1457661154, '15-1501-44', '2010-002', 'SSC404', 3, 6, ''),
(4, 1457661154, '15-1501-44', '2010-002', 'SSC404', 4, 6, ''),
(5, 1457661154, '15-1501-44', '2010-002', 'SSC404', 5, 6, ''),
(6, 1457661154, '15-1501-44', '2010-002', 'SSC404', 6, 6, ''),
(7, 1457661154, '15-1501-44', '2010-002', 'SSC404', 7, 6, ''),
(8, 1457661154, '15-1501-44', '2010-002', 'SSC404', 8, 6, ''),
(9, 1457661154, '15-1501-44', '2010-002', 'SSC404', 9, 6, ''),
(10, 1457661154, '15-1501-44', '2010-002', 'SSC404', 10, 6, ''),
(11, 1457661154, '11-1573-11', '2010-002', 'SSC404', 1, 6, ''),
(12, 1457661154, '11-1573-11', '2010-002', 'SSC404', 2, 5, ''),
(13, 1457661154, '11-1573-11', '2010-002', 'SSC404', 3, 5, ''),
(14, 1457661154, '11-1573-11', '2010-002', 'SSC404', 4, 6, ''),
(15, 1457661154, '11-1573-11', '2010-002', 'SSC404', 5, 6, ''),
(16, 1457661154, '11-1573-11', '2010-002', 'SSC404', 6, 5, ''),
(17, 1457661154, '11-1573-11', '2010-002', 'SSC404', 7, 5, ''),
(18, 1457661154, '11-1573-11', '2010-002', 'SSC404', 8, 5, ''),
(19, 1457661154, '11-1573-11', '2010-002', 'SSC404', 9, 6, ''),
(20, 1457661154, '11-1573-11', '2010-002', 'SSC404', 10, 6, ''),
(21, 1457661154, '11-1141-11', '2010-002', 'SSC404', 1, 6, ''),
(22, 1457661154, '11-1141-11', '2010-002', 'SSC404', 2, 6, ''),
(23, 1457661154, '11-1141-11', '2010-002', 'SSC404', 3, 6, ''),
(24, 1457661154, '11-1141-11', '2010-002', 'SSC404', 4, 6, ''),
(25, 1457661154, '11-1141-11', '2010-002', 'SSC404', 5, 6, ''),
(26, 1457661154, '11-1141-11', '2010-002', 'SSC404', 6, 6, ''),
(27, 1457661154, '11-1141-11', '2010-002', 'SSC404', 7, 6, ''),
(28, 1457661154, '11-1141-11', '2010-002', 'SSC404', 8, 6, ''),
(29, 1457661154, '11-1141-11', '2010-002', 'SSC404', 9, 6, ''),
(30, 1457661154, '11-1141-11', '2010-002', 'SSC404', 10, 6, ''),
(31, 1457661154, '11-1141-11', '2013-001', 'ITE430', 1, 6, ''),
(32, 1457661154, '11-1141-11', '2013-001', 'ITE430', 2, 6, ''),
(33, 1457661154, '11-1141-11', '2013-001', 'ITE430', 3, 6, ''),
(34, 1457661154, '11-1141-11', '2013-001', 'ITE430', 4, 6, ''),
(35, 1457661154, '11-1141-11', '2013-001', 'ITE430', 5, 6, ''),
(36, 1457661154, '11-1141-11', '2013-001', 'ITE430', 6, 6, ''),
(37, 1457661154, '11-1141-11', '2013-001', 'ITE430', 7, 6, ''),
(38, 1457661154, '11-1141-11', '2013-001', 'ITE430', 8, 6, ''),
(39, 1457661154, '11-1141-11', '2013-001', 'ITE430', 9, 6, ''),
(40, 1457661154, '11-1141-11', '2013-001', 'ITE430', 10, 6, ''),
(41, 1457661154, '11-1141-11', '2013-001', 'ITE326', 1, 6, ''),
(42, 1457661154, '11-1141-11', '2013-001', 'ITE326', 2, 6, ''),
(43, 1457661154, '11-1141-11', '2013-001', 'ITE326', 3, 6, ''),
(44, 1457661154, '11-1141-11', '2013-001', 'ITE326', 4, 6, ''),
(45, 1457661154, '11-1141-11', '2013-001', 'ITE326', 5, 6, ''),
(46, 1457661154, '11-1141-11', '2013-001', 'ITE326', 6, 6, ''),
(47, 1457661154, '11-1141-11', '2013-001', 'ITE326', 7, 6, ''),
(48, 1457661154, '11-1141-11', '2013-001', 'ITE326', 8, 6, ''),
(49, 1457661154, '11-1141-11', '2013-001', 'ITE326', 9, 6, ''),
(50, 1457661154, '11-1141-11', '2013-001', 'ITE326', 10, 6, ''),
(51, 1457661154, '11-1141-11', '2015-001', 'CP101', 1, 6, ''),
(52, 1457661154, '11-1141-11', '2015-001', 'CP101', 2, 6, ''),
(53, 1457661154, '11-1141-11', '2015-001', 'CP101', 3, 6, ''),
(54, 1457661154, '11-1141-11', '2015-001', 'CP101', 4, 6, ''),
(55, 1457661154, '11-1141-11', '2015-001', 'CP101', 5, 6, ''),
(56, 1457661154, '11-1141-11', '2015-001', 'CP101', 6, 6, ''),
(57, 1457661154, '11-1141-11', '2015-001', 'CP101', 7, 6, ''),
(58, 1457661154, '11-1141-11', '2015-001', 'CP101', 8, 6, ''),
(59, 1457661154, '11-1141-11', '2015-001', 'CP101', 9, 6, ''),
(60, 1457661154, '11-1141-11', '2015-001', 'CP101', 10, 6, ''),
(61, 1457661154, '2015-E001', '2009-010', 'EN1', 1, 6, ''),
(62, 1457661154, '2015-E001', '2009-010', 'EN1', 2, 6, ''),
(63, 1457661154, '2015-E001', '2009-010', 'EN1', 3, 6, ''),
(64, 1457661154, '2015-E001', '2009-010', 'EN1', 4, 6, ''),
(65, 1457661154, '2015-E001', '2009-010', 'EN1', 5, 6, ''),
(66, 1457661154, '2015-E001', '2009-010', 'EN1', 6, 6, ''),
(67, 1457661154, '2015-E001', '2009-010', 'EN1', 7, 6, ''),
(68, 1457661154, '2015-E001', '2009-010', 'EN1', 8, 6, ''),
(69, 1457661154, '2015-E001', '2009-010', 'EN1', 9, 6, ''),
(70, 1457661154, '2015-E001', '2009-010', 'EN1', 10, 6, '');

-- --------------------------------------------------------

--
-- Table structure for table `subjects_tbl`
--

CREATE TABLE IF NOT EXISTS `subjects_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subj_name` varchar(100) NOT NULL,
  `subj_code` char(10) NOT NULL,
  `for_level` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `subjects_tbl`
--

INSERT INTO `subjects_tbl` (`id`, `subj_name`, `subj_code`, `for_level`) VALUES
(1, 'Quantitative Methods', 'MTH304', 'College'),
(2, 'Probabilty and Statistics', 'MTH203', 'College'),
(3, 'Fundamentals of Business Processes Outsourcing 101', 'ITE433', 'College'),
(4, 'Capstone Project 2', 'ITE430', 'College'),
(5, 'IT Elective 2', 'ITE326', 'College'),
(6, 'Economics w/ Land Reforms & Taxation', 'SSC404', 'College'),
(7, 'Life and Works of Rizal', 'SSC405', 'College'),
(8, 'Philippine Literature', 'HUM302', 'College'),
(9, 'English Literature 12', 'EN12Lit', 'Sr. High'),
(10, 'Programming', 'CP101', 'College'),
(11, 'English 1', 'EN1', 'Elem');

-- --------------------------------------------------------

--
-- Table structure for table `tag_validator`
--

CREATE TABLE IF NOT EXISTS `tag_validator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evltn_dte` int(11) NOT NULL,
  `evltr_id` char(11) NOT NULL,
  `evltee_id` char(11) NOT NULL,
  `subject` char(20) NOT NULL,
  `is_valid` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tag_validator`
--

INSERT INTO `tag_validator` (`id`, `evltn_dte`, `evltr_id`, `evltee_id`, `subject`, `is_valid`) VALUES
(1, 1457661154, '11-1141-11', '2013-001', 'ITE430', 0),
(2, 1457661154, '11-1141-11', '2013-001', 'ITE326', 0),
(3, 1457661154, '11-1141-11', '2010-002', 'SSC404', 0),
(4, 1457661154, '11-1141-11', '2015-001', 'CP101', 0),
(5, 1457661154, '15-1501-44', '2010-002', 'SSC404', 0),
(6, 1457661154, '11-1573-11', '2010-002', 'SSC404', 0),
(7, 1457661154, '2015-E001', '2009-010', 'EN1', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
