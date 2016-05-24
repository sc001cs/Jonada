-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2016 at 11:17 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jonada`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam_answer`
--

CREATE TABLE `exam_answer` (
  `id_asnwer` int(10) UNSIGNED NOT NULL,
  `answer1` varchar(200) NOT NULL,
  `answer2` varchar(200) NOT NULL,
  `answer3` varchar(200) NOT NULL,
  `answer4` varchar(200) NOT NULL,
  `answer5` varchar(200) NOT NULL,
  `answer6` varchar(200) NOT NULL,
  `answer7` varchar(200) NOT NULL,
  `answer8` varchar(200) NOT NULL,
  `answer9` varchar(200) NOT NULL,
  `answer10` varchar(200) NOT NULL,
  `name_lecture` varchar(250) NOT NULL,
  `id_lecture` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `dt_update` date NOT NULL,
  `theResult` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_answer`
--

INSERT INTO `exam_answer` (`id_asnwer`, `answer1`, `answer2`, `answer3`, `answer4`, `answer5`, `answer6`, `answer7`, `answer8`, `answer9`, `answer10`, `name_lecture`, `id_lecture`, `id_student`, `dt_update`, `theResult`) VALUES
(1, 'C', '', '', '', '', '', '', '', '', '', 'Java programming', 4, 7, '2016-05-21', '0'),
(2, 'C', 'C', 'C', 'C', 'D', 'B', 'B', 'A', '', '', 'PHP programming', 1, 7, '2016-05-21', '12.5'),
(3, 'A', '', '', '', '', '', '', '', '', '', 'Java programming', 4, 8, '2016-05-21', '100'),
(4, 'C', '', '', '', '', '', '', '', '', '', 'Not Active', 6, 7, '2016-05-23', '0');

-- --------------------------------------------------------

--
-- Table structure for table `exam_question`
--

CREATE TABLE `exam_question` (
  `id_question` int(11) NOT NULL,
  `orders` int(11) DEFAULT NULL,
  `question` text,
  `answer1` varchar(200) DEFAULT NULL,
  `answer2` varchar(200) DEFAULT NULL,
  `answer3` varchar(200) DEFAULT NULL,
  `answer4` varchar(200) DEFAULT NULL,
  `finalanswer` varchar(200) DEFAULT NULL,
  `visibility` varchar(5) NOT NULL,
  `id_lecture` int(11) DEFAULT NULL,
  `typemandatory` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_question`
--

INSERT INTO `exam_question` (`id_question`, `orders`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `finalanswer`, `visibility`, `id_lecture`, `typemandatory`) VALUES
(1, 1, '            What does PHP stand for?            ', 'Private Home Page', 'PHP: Hypertext Preprocessor', 'Personal Hypertext Processor', 'Personal Hide Processor', 'B', '1', 1, NULL),
(2, 2, '          In PHP, the die() and exit() functions do the exact same thing.          ', 'i dont understand the question', 'true', 'false', 'none', 'B', '1', 1, NULL),
(3, 3, '           Which one of these variables has an illegal name?           ', '$myVar ', '$my-Var ', '$my_Var ', '$m', 'B', '1', 1, NULL),
(4, 4, '            All variables in PHP start with which symbol?            ', 'quote', 'dollar', 'euro', 'None', 'B', '1', 1, NULL),
(5, 5, '            What is the correct way to end a PHP statement?            ', 'end statement', 'new', 'semicomma', 'quote', 'A', '1', 1, NULL),
(6, 6, '            The PHP syntax is most similar to:            ', 'VBScript', 'Perl and C', 'JavaScript', 'Java', 'B', '1', 1, NULL),
(7, 7, '            How do you get information from a form that is submitted using the "get" method?            ', 'Request.QueryString;', 'Request.Form;', '$_GET[];', 'None', 'C', '1', 1, NULL),
(8, 8, '           When using the POST method, variables are displayed in the URL:           ', 'i dont know', 'true', 'false', 'none', 'B', '1', 1, NULL),
(9, 9, '                        ', '', '', '', '', 'A', '0', 1, NULL),
(10, 10, '                        ', '', '', '', '', 'A', '0', 1, NULL),
(11, 1, 'Test text some test', 'Test text some test', 'Test text some test', 'Test text some test', 'Test text some test', 'A', '1', 2, NULL),
(12, 2, 'Test text some test', 'Test text some test', 'Test text some test', 'Test text some test', 'Test text some test', 'C', '1', 2, NULL),
(13, 3, '', '', '', '', '', 'A', '0', 2, NULL),
(14, 4, '', '', '', '', '', 'A', '0', 2, NULL),
(15, 5, '', '', '', '', '', 'A', '0', 2, NULL),
(16, 6, '', '', '', '', '', 'A', '0', 2, NULL),
(17, 7, '', '', '', '', '', 'A', '0', 2, NULL),
(18, 8, '', '', '', '', '', 'A', '0', 2, NULL),
(19, 9, '', '', '', '', '', 'A', '0', 2, NULL),
(20, 10, '', '', '', '', '', 'A', '0', 2, NULL),
(21, 1, 'Test', 'Test', 'Test', 'Test', 'Test', 'A', '1', 3, NULL),
(22, 2, 'TestTest', 'Test', 'Test', 'Test', 'Test', 'C', '1', 3, NULL),
(23, 3, '', '', '', '', '', 'A', '0', 3, NULL),
(24, 4, '', '', '', '', '', 'A', '0', 3, NULL),
(25, 5, '', '', '', '', '', 'A', '0', 3, NULL),
(26, 6, '', '', '', '', '', 'A', '0', 3, NULL),
(27, 7, '', '', '', '', '', 'A', '0', 3, NULL),
(28, 8, '', '', '', '', '', 'A', '0', 3, NULL),
(29, 9, '', '', '', '', '', 'A', '0', 3, NULL),
(30, 10, '', '', '', '', '', 'A', '0', 3, NULL),
(31, 1, ' What is a class in Java ?  ', 'A template', 'A simple file', 'A word document', 'Other', 'A', '1', 4, NULL),
(32, 2, '                          ', '', '', '', '', 'A', '0', 4, NULL),
(33, 3, '                          ', '', '', '', '', 'A', '0', 4, NULL),
(34, 4, '                          ', '', '', '', '', 'A', '0', 4, NULL),
(35, 5, '                          ', '', '', '', '', 'A', '0', 4, NULL),
(36, 6, '                          ', '', '', '', '', 'A', '0', 4, NULL),
(37, 7, '                          ', '', '', '', '', 'A', '0', 4, NULL),
(38, 8, '                          ', '', '', '', '', 'A', '0', 4, NULL),
(39, 9, '                          ', '', '', '', '', 'A', '0', 4, NULL),
(40, 10, '                          ', '', '', '', '', 'A', '0', 4, NULL),
(41, 1, ' test ', 'test', 'test', 'test', 'test', 'A', '1', 5, NULL),
(42, 2, ' test ', 'test', 'test', 'test', 'test', 'A', '1', 5, NULL),
(43, 3, '  ', '', '', '', '', 'A', '0', 5, NULL),
(44, 4, '  ', '', '', '', '', 'A', '0', 5, NULL),
(45, 5, '  ', '', '', '', '', 'A', '0', 5, NULL),
(46, 6, '  ', '', '', '', '', 'A', '0', 5, NULL),
(47, 7, '  ', '', '', '', '', 'A', '0', 5, NULL),
(48, 8, '  ', '', '', '', '', 'A', '0', 5, NULL),
(49, 9, '  ', '', '', '', '', 'A', '0', 5, NULL),
(50, 10, '  ', '', '', '', '', 'A', '0', 5, NULL),
(51, 1, '      ', '', '', '', '', 'A', '1', 6, NULL),
(52, 2, '      ', '', '', '', '', 'A', '0', 6, NULL),
(53, 3, '      ', '', '', '', '', 'A', '0', 6, NULL),
(54, 4, '      ', '', '', '', '', 'A', '0', 6, NULL),
(55, 5, '      ', '', '', '', '', 'A', '0', 6, NULL),
(56, 6, '      ', '', '', '', '', 'A', '0', 6, NULL),
(57, 7, '      ', '', '', '', '', 'A', '0', 6, NULL),
(58, 8, '      ', '', '', '', '', 'A', '0', 6, NULL),
(59, 9, '      ', '', '', '', '', 'A', '0', 6, NULL),
(60, 10, '      ', '', '', '', '', 'A', '0', 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `id_lecture` int(11) NOT NULL,
  `coursetitle` varchar(100) DEFAULT NULL,
  `school` varchar(250) DEFAULT NULL,
  `programs` varchar(100) DEFAULT NULL,
  `academicYear` varchar(50) DEFAULT NULL,
  `type` varchar(200) NOT NULL,
  `term` varchar(200) NOT NULL,
  `dean` varchar(200) NOT NULL,
  `lecturer` varchar(200) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `fullname` varchar(200) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `department` varchar(250) NOT NULL,
  `classroom` varchar(250) NOT NULL,
  `id_lecturer` int(11) DEFAULT NULL,
  `activation` varchar(200) NOT NULL DEFAULT 'Not Active',
  `codeactivation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`id_lecture`, `coursetitle`, `school`, `programs`, `academicYear`, `type`, `term`, `dean`, `lecturer`, `email`, `fullname`, `deleted`, `department`, `classroom`, `id_lecturer`, `activation`, `codeactivation`) VALUES
(1, 'PHP programming', 'ENGINEERING', 'GRATUATE', 'III Year', 'Elective', 'SPRING', 'Besnik Musi', 'Agim', 'agmim@cit.edu.al', 'Agim', 0, 'Software Engineering', 'ITCLASS2', 6, 'Active', '356a192'),
(2, 'Test course to delete', 'ECONOMY', 'UNDER', 'III Year', 'Required', 'SPRING', 'Test', 'Test to Delete', 'test@test.com', 'Test to Delete', 1, 'Software Engineering', 'ITCLASS', 6, '', ''),
(3, 'Test', 'ECONOMY', 'UNDER', 'II Year', 'Required', 'SPRING', 'Testes', 'Test', 'tt@tt.com', 'Test', 1, 'Industrial Engineering', 'ITCLASS2', 6, '', ''),
(4, 'Java programming', 'ENGINEERING', 'UNDER', 'II Year', 'Elective', 'SPRING', 'Astrit Petriti', 'Agimi', 'agim@cit.edu.al', 'Agimi', 0, 'Software Engineering', 'LABCLASS2', 6, 'Not Active', '1b64538'),
(5, 'Tester', 'ECONOMY', 'GRATUATE', 'I Year', 'Required', 'FALL', 'test', 'test', 'testy@testy.com', 'test', 1, 'Software Engineering', 'ITCLASS2', 6, 'Not Active', 'testy@testy.com'),
(6, 'Not Active', 'ECONOMY', 'GRATUATE', 'II Year', 'Elective', 'FALL', 'Not Active', 'Not Active', 'dsa@gmail.com', 'Not Active', 0, 'Industrial Engineering', 'ITCLASS', 6, 'Active', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `student_exam`
--

CREATE TABLE `student_exam` (
  `id_increment` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `id_lecture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_exam`
--

INSERT INTO `student_exam` (`id_increment`, `username`, `id_lecture`) VALUES
(22, 'beni', 4),
(23, 'albana', 4),
(24, 'beni', 1),
(25, 'albana', 1),
(26, 'beni', 5),
(27, 'beni', 6);

-- --------------------------------------------------------

--
-- Table structure for table `student_lecturer`
--

CREATE TABLE `student_lecturer` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `fullname` varchar(40) DEFAULT NULL,
  `studentcode` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `islecturer` int(11) DEFAULT NULL,
  `id_lecture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_lecturer`
--

INSERT INTO `student_lecturer` (`id`, `username`, `password`, `fullname`, `studentcode`, `email`, `islecturer`, `id_lecture`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', NULL, 'admin@cit.edu.al', 2, 0),
(5, 'emanuela', 'a4db8201e1deb1db820fbf8858b3cdf21c3371d5', 'Emanuela Gjata', '', 'emanuela@cit.edu.al', 1, 0),
(6, 'agim', '078a71d68e45f6b616c7c5a54e5cbf81e46fb628', 'Agim Hoxha', NULL, 'agim@cit.edu.al', 1, 0),
(7, 'beni', 'c2fc4d58a9bf671c6db2734da8f62b375bc61ab8', 'Beni Trimi', 'BENI', 'beni@cit.edu.al2', 0, 6),
(8, 'albana', 'f4464d02e8e6a418baf0a81b0f76f9adbb27187d', 'Albana Tola', 'ALBANA', 'albana@cit.edu.al', 0, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam_answer`
--
ALTER TABLE `exam_answer`
  ADD PRIMARY KEY (`id_asnwer`);

--
-- Indexes for table `exam_question`
--
ALTER TABLE `exam_question`
  ADD PRIMARY KEY (`id_question`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`id_lecture`);

--
-- Indexes for table `student_exam`
--
ALTER TABLE `student_exam`
  ADD PRIMARY KEY (`id_increment`);

--
-- Indexes for table `student_lecturer`
--
ALTER TABLE `student_lecturer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `studentcode` (`studentcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam_answer`
--
ALTER TABLE `exam_answer`
  MODIFY `id_asnwer` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `exam_question`
--
ALTER TABLE `exam_question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `id_lecture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `student_exam`
--
ALTER TABLE `student_exam`
  MODIFY `id_increment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `student_lecturer`
--
ALTER TABLE `student_lecturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


create table ip_range(
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  classroomname VARCHAR(200),
  ip1 VARCHAR(200),
  ip2 VARCHAR(200)
);

CREATE UNIQUE INDEX ip_range_classroomname_uindex ON jonada.ip_range (classroomname);