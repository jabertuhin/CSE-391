-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2018 at 07:20 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amar_shikha`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_info`
--

CREATE TABLE `account_info` (
  `user_id` int(11) NOT NULL,
  `username` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mail_id` varchar(20) NOT NULL,
  `job` varchar(10) NOT NULL,
  `institute` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `contribution` int(11) NOT NULL DEFAULT '0',
  `admin_check` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_info`
--

INSERT INTO `account_info` (`user_id`, `username`, `mail_id`, `job`, `institute`, `password`, `contribution`, `admin_check`) VALUES
(1, 'admin', 'admin@gmail.com', 'student', 'BRACU', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1),
(3, 'jabertuhin', 'jabertuhin@gmail.com', 'Student', 'BRACU', '601f1889667efaebb33b8c12572835da3f027f78', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `code` int(11) NOT NULL,
  `chapter_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`code`, `chapter_name`) VALUES
(1, '১ম অধ্যায়'),
(2, '২য় অধ্যায়'),
(3, '৩য় অধ্যায়'),
(4, '৪র্থ অধ্যায়'),
(5, '৫ম অধ্যায়'),
(6, '৬ষ্ঠ অধ্যায়'),
(7, '৭ম অধ্যায়'),
(8, '৮ম অধ্যায়'),
(9, '৯ম-১০ম অধ্যায়');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `code` int(11) NOT NULL,
  `class_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`code`, `class_name`) VALUES
(1, '১ম শ্রেণি'),
(2, '২য় শ্রেণি'),
(3, '৩য় শ্রেণি'),
(4, '৪র্থ শ্রেণি'),
(5, '৫ম শ্রেণি'),
(6, '৬ষ্ঠ শ্রেণি'),
(7, '৭ম শ্রেণি'),
(8, '৮ম শ্রেণি'),
(9, 'মাধ্যমিক'),
(11, 'উচ্চ-মাধ্যমিক');

-- --------------------------------------------------------

--
-- Table structure for table `common_info`
--

CREATE TABLE `common_info` (
  `code` varchar(10) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_edit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `common_info`
--

INSERT INTO `common_info` (`code`, `description`, `last_edit`) VALUES
('home', 'আমাদের পথচলা আগামীর পথে!', '2018-03-20'),
('contact', 'Mail: amarshikha@gmail.com\r\nPhone: 1122333\r\nAddress: Not Here,Not anyWhere', '2018-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `code` int(11) NOT NULL,
  `subject_name` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`code`, `subject_name`) VALUES
(1, 'আমার বাংলা বই'),
(2, 'English For Today'),
(3, 'প্রাথমিক বিজ্ঞান'),
(4, 'বাংলাদেশ ও পরিচয়'),
(5, 'ইসলাম ও নৈতিক শিক্ষা'),
(6, 'হিন্দুধর্ম ও নৈতিক শিক্ষা'),
(7, 'বৌদ্ধ্যধর্ম ও নৈতিক শিক্ষা'),
(8, 'খ্রিস্টধর্ম ও নৈতিক শিক্ষা'),
(9, 'গণিত');

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE `tutorial` (
  `id` int(11) NOT NULL,
  `class_code` int(11) DEFAULT NULL,
  `subject_code` int(11) DEFAULT NULL,
  `chapter_code` int(11) DEFAULT NULL,
  `title` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_bin,
  `writer` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `date` date DEFAULT NULL,
  `approve` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutorial`
--

INSERT INTO `tutorial` (`id`, `class_code`, `subject_code`, `chapter_code`, `title`, `content`, `writer`, `date`, `approve`) VALUES
(1, 1, 9, 1, 'যোগ', '১ + ২ = ৩\r\n১ + ২ = ৩\r\n১ + ২ = ৩\r\n১ + ২ = ৩', 'jabertuhin', '2018-03-26', 1),
(2, 1, 9, 2, 'বিয়োগ', '৩ - ২ = ১\r\n৫ - ৯ = -৪', 'jabertuhin', '2018-03-26', 1),
(3, 1, 9, 3, 'গুণ', '2*3 = 6\r\n3 * 3 = 9', 'jabertuhin', '2018-03-26', 1),
(4, 1, 9, 1, 'যোগ', '১১ + ১০ = ২১', 'admin', '2018-03-26', 1),
(5, 1, 9, 1, 'যোগ', '11 + 0 = 11', 'jabertuhin', '2018-03-26', 1),
(6, 1, 9, 2, 'বিয়োগ', '১৩ - ৬ = ৭', 'jabertuhin', '2018-03-26', 1),
(7, 1, 9, 1, 'গুণ', '৮ * ৮ = ৬৪', 'jabertuhin', '2018-03-26', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_info`
--
ALTER TABLE `account_info`
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `mail_id` (`mail_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_info`
--
ALTER TABLE `account_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
