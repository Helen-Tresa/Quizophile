-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 03:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(2, 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL,
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`qid`, `ansid`, `ans`) VALUES
('62c6958ad9b43', '62c6958ada27a', ''),
('62c6958adbef8', '62c6958adc3a2', ''),
('62c6a704d322e', '62c6a704d3935', ''),
('62c6a704d5aef', '62c6a704d5f41', ''),
('62c6b02ec7b01', '62c6b02ec816b', ''),
('62c6b0ac32aac', '62c6b0ac3341b', ''),
('62cdd0f0773cd', '62cdd0f077b73', ''),
('62cdd9252021b', '62cdd925209cc', ''),
('62cdd980d4a02', '62cdd980d59b9', ''),
('62cdd9894e8cf', '62cdd9894f932', ''),
('62cdd9d65718c', '62cdd9d6577e7', 'good bad okay nice'),
('62cdd9fe38f7d', '62cdd9fe39e5a', 'good bad okay nice');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `subject`, `feedback`, `date`, `time`) VALUES
('62c67434c7990', 'helen', '19cs206@mgits.ac.in', 'networking', 'Quiz was easy', '2022-07-07', '07:50:44am'),
('62c67434c7990', 'helen', '19cs206@mgits.ac.in', 'networking', 'Quiz was easy', '2022-07-07', '07:50:44am'),
('62c6a82910d1b', 'helen', '19cs206@mgits.ac.in', 'python', 'fxysgg vbcgfh', '2022-07-07', '11:32:25am'),
('62c6af476453d', 'er', 'rohanorigami@gmail.com', 'df', 'jkkm', '2022-07-07', '03:32:47pm');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` float NOT NULL,
  `level` int(11) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`email`, `eid`, `score`, `level`, `sahi`, `wrong`, `date`) VALUES
('19cs031@mgits.ac.in', '62c6951226365', 4, 2, 2, 0, '2022-07-07 08:49:41'),
('sanjukta@gmail.com', '62c6951226365', 4, 2, 2, 0, '2022-07-07 09:06:22'),
('diya@gmail.com', '62c6951226365', 4, 2, 2, 0, '2022-07-07 09:25:26'),
('19cs206@gmail.com', '62c6a6c139d8c', -2, 2, 0, 2, '2022-07-07 09:29:01'),
('19cs206@gmail.com', '62c6b0954c5be', 1, 1, 1, 0, '2022-07-10 09:31:21'),
('19cs206@gmail.com', '62c6951226365', -2, 2, 0, 2, '2022-07-10 15:50:16'),
('19cs206@gmail.com', '62cdd0a255cfd', -1, 1, 0, 1, '2022-07-12 20:19:22'),
('admin@admin.com', '62cdd0a255cfd', -1, 1, 0, 1, '2022-07-12 19:56:59'),
('19cs206@gmail.com', '62cdd0a255cfd', -1, 1, 0, 1, '2022-07-12 20:19:22'),
('19cs206@gmail.com', '62cdd0a255cfd', -1, 1, 0, 1, '2022-07-12 20:19:22'),
('19cs206@gmail.com', '62cdd0a255cfd', -1, 1, 0, 1, '2022-07-12 20:19:22'),
('19cs206@gmail.com', '62cdd0a255cfd', -1, 1, 0, 1, '2022-07-12 20:19:22'),
('19cs206@gmail.com', '62cdd0a255cfd', -1, 1, 0, 1, '2022-07-12 20:19:22'),
('19cs206@gmail.com', '62cdd0a255cfd', -1, 1, 0, 1, '2022-07-12 20:19:22'),
('19cs206@gmail.com', '62cdd0a255cfd', -1, 1, 0, 1, '2022-07-12 20:19:22'),
('19cs206@gmail.com', '62cdd0a255cfd', -1, 1, 0, 1, '2022-07-12 20:19:22'),
('19cs206@gmail.com', '62cdd0a255cfd', -1, 1, 0, 1, '2022-07-12 20:19:22'),
('19cs206@gmail.com', '62cdd9c084e86', 1, 1, 1, 1, '2022-07-19 00:47:13'),
('19cs206@gmail.com', '62cdd9c084e86', 1, 1, 1, 1, '2022-07-19 00:47:13'),
('19cs206@gmail.com', '62cdd9c084e86', 1, 1, 1, 1, '2022-07-19 00:47:13'),
('19cs206@gmail.com', '62cdd9c084e86', 1, 1, 1, 0, '2022-07-19 00:47:13'),
('19cs206@gmail.com', '62cdd9c084e86', 1, 1, 1, 0, '2022-07-19 00:47:13'),
('19cs206@gmail.com', '62cdd9c084e86', 1, 1, 1, 0, '2022-07-19 00:47:13'),
('19cs206@gmail.com', '62cdd9c084e86', 1, 1, 1, 0, '2022-07-19 00:47:13'),
('19cs206@gmail.com', '62cdd9c084e86', 1, 1, 1, 0, '2022-07-19 00:47:13'),
('19cs206@gmail.com', '62cdd9c084e86', 1, 1, 1, 0, '2022-07-19 00:47:13'),
('diya@gmail.com', '62cdd9c084e86', 1, 1, 1, 0, '2022-07-19 00:49:07'),
('diya@gmail.com', '62cdd9c084e86', 0, 0, 0, 0, '2022-07-19 00:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('62c6958ad9b43', '32 bits', '62c6958ada272'),
('62c6958ad9b43', '128 bytes', '62c6958ada278'),
('62c6958ad9b43', '64 bits', '62c6958ada279'),
('62c6958ad9b43', '128 bits', '62c6958ada27a'),
('62c6958adbef8', 'NAT', '62c6958adc399'),
('62c6958adbef8', 'static', '62c6958adc3a0'),
('62c6958adbef8', 'Dynamic ', '62c6958adc3a1'),
('62c6958adbef8', 'PAT', '62c6958adc3a2'),
('62c6a704d322e', 'ffz', '62c6a704d3935'),
('62c6a704d322e', 'dry', '62c6a704d393b'),
('62c6a704d322e', 'gxf', '62c6a704d393c'),
('62c6a704d322e', 'fx', '62c6a704d393d'),
('62c6a704d5aef', 'dtdry', '62c6a704d5f3d'),
('62c6a704d5aef', 'xfd', '62c6a704d5f41'),
('62c6a704d5aef', 'fxdg', '62c6a704d5f42'),
('62c6a704d5aef', 'fsxy', '62c6a704d5f43'),
('62c6b02ec7b01', 'ef2', '62c6b02ec816b'),
('62c6b02ec7b01', 'erf2', '62c6b02ec816f'),
('62c6b02ec7b01', 'ewr', '62c6b02ec8170'),
('62c6b02ec7b01', 'efr', '62c6b02ec8171'),
('62c6b0ac32aac', 'yu', '62c6b0ac3341b'),
('62c6b0ac32aac', 'fhgh', '62c6b0ac33427'),
('62c6b0ac32aac', 'fhcgvj', '62c6b0ac33429'),
('62c6b0ac32aac', 'fhg', '62c6b0ac3342a');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `qns`, `choice`, `sn`, `time`) VALUES
('62c6951226365', '62c6958ad9b43', 'How long is an IPv6 address?', 4, 1, 30),
('62c6951226365', '62c6958adbef8', 'What flavor of Network Address Translation can be used to have one IP address allow many users to connect to the global Internet?', 4, 2, 30),
('62c6a6c139d8c', '62c6a704d322e', 'yturu', 4, 1, 30),
('62c6a6c139d8c', '62c6a704d5aef', 'sertryhrtu', 4, 2, 30),
('62c6b00f29a26', '62c6b02ec7b01', 'qefwgeyh', 4, 1, 20),
('62c6b0954c5be', '62c6b0ac32aac', 'tytuyiu', 4, 1, 120);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `intro` text NOT NULL,
  `tag` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `m_s` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`eid`, `title`, `sahi`, `wrong`, `total`, `time`, `intro`, `tag`, `date`, `m_s`) VALUES
('62c6951226365', 'Networking Basics', 2, 1, 2, 2, '', '', '2022-07-07 08:10:58', 0),
('62c6a6c139d8c', 'Python', 2, 1, 2, 1, '', '', '2022-07-07 09:26:25', 0),
('62c6b00f29a26', 'Qwfwgerh', 1, 1, 1, 1, '', '', '2022-07-07 10:06:07', 0),
('62c6b0954c5be', 'Rdtytliu', 1, 1, 1, 1, '', '', '2022-07-07 10:08:21', 0),
('62cdd0a255cfd', 'Java', 2, 1, 1, 2, 'null', 'java', '2022-07-12 19:50:58', 1),
('62cdd90e19ba6', 'Python', 2, 1, 1, 30, 'null', '', '2022-07-12 20:26:54', 1),
('62cdd9c084e86', 'Qdwe', 2, 1, 1, 2, 'null', '', '2022-07-12 20:29:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`email`, `score`, `time`) VALUES
('19cs206@gmail.com', -12, '2022-07-19 00:47:13'),
('sanjukta@gmail.com', 8, '2022-07-07 09:10:19'),
('19cs031@mgits.ac.in', 1, '2022-07-07 08:49:41'),
('diya@gmail.com', 5, '2022-07-19 00:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `shortans`
--

CREATE TABLE `shortans` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(11) NOT NULL,
  `sn` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `squestions`
--

CREATE TABLE `squestions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `sn` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `squestions`
--

INSERT INTO `squestions` (`eid`, `qid`, `qns`, `sn`, `time`) VALUES
('62cdd0a255cfd', '62cdd0f0773cd', 'write 4 features', 1, 30),
('62cdd90e19ba6', '62cdd9252021b', 'gewtgerh', 1, 30),
('62cdd90e19ba6', '62cdd980d4a02', 'gewtgerh', 1, 30),
('62cdd90e19ba6', '62cdd9894e8cf', '', 1, 0),
('62cdd9c084e86', '62cdd9d65718c', 'adfer', 1, 30),
('62cdd9c084e86', '62cdd9fe38f7d', 'adfer', 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `college` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `gender`, `college`, `email`, `mob`, `password`) VALUES
('Sanj', 'F', 'mits', '19cs031@mgits.ac.in', 9653138884, 'fcea920f7412b5da7be0cf42b8c93759'),
('Helen', 'F', 'mits', '19cs206@gmail.com', 1234567890, 'e10adc3949ba59abbe56e057f20f883e'),
('Diya', 'F', 'mits', 'diya@gmail.com', 1234567890, '72f53e9f40a60fbd90ca3f0462d976e2'),
('Sanjukta', 'F', 'mits', 'sanjukta@gmail.com', 1234567878, '250453373e7699fd1e3f1150ff97668c'),
('User', 'M', 'cimt', 'user@user.com', 11, 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `user_answer`
--

CREATE TABLE `user_answer` (
  `id` int(11) NOT NULL,
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `correctans` text NOT NULL,
  `ans` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_answer`
--

INSERT INTO `user_answer` (`id`, `eid`, `qid`, `correctans`, `ans`, `email`) VALUES
(1, '62c6951226365', '62c6958ad9b43', '62c6958ada27a', '62c6958ada27a', ''),
(2, '62c6951226365', '62c6958ad9b43', '62c6958ada27a', '62c6958ada27a', ''),
(3, '62c6951226365', '62c6958adbef8', '62c6958adc3a2', '62c6958adc3a2', ''),
(14, '62c6951226365', '62c6958ad9b43', '62c6958ada27a', '62c6958ada272', '19cs206@gmail.com'),
(15, '62c6951226365', '62c6958adbef8', '62c6958adc3a2', '62c6958adc3a1', '19cs206@gmail.com'),
(16, '62cdd0a255cfd', '62cdd0f0773cd', 'null', 'good okay but', '19cs206@gmail.com'),
(17, '62cdd0a255cfd', '', 'null', 'good okay but', 'admin@admin.com'),
(18, '62cdd0a255cfd', '62cdd0f0773cd', '62cdd0f077b73', '', '19cs206@gmail.com'),
(19, '62cdd0a255cfd', '62cdd0f0773cd', 'null', 'good okay but', '19cs206@gmail.com'),
(20, '62cdd0a255cfd', '62cdd0f0773cd', 'null', 'good okay but', '19cs206@gmail.com'),
(21, '62cdd0a255cfd', '62cdd0f0773cd', 'null', 'good okay but', '19cs206@gmail.com'),
(22, '62cdd0a255cfd', '62cdd0f0773cd', 'null', 'good okay but', '19cs206@gmail.com'),
(23, '62cdd0a255cfd', '62cdd0f0773cd', 'null', 'good okay but', '19cs206@gmail.com'),
(24, '62cdd0a255cfd', '62cdd0f0773cd', 'null', 'good okay but', '19cs206@gmail.com'),
(25, '62cdd0a255cfd', '62cdd0f0773cd', 'null', 'good okay but', '19cs206@gmail.com'),
(26, '62cdd0a255cfd', '62cdd0f0773cd', 'null', 'good okay but', '19cs206@gmail.com'),
(27, '62cdd9c084e86', '62cdd9d65718c', 'null', 'good okay but', '19cs206@gmail.com'),
(28, '62cdd9c084e86', '62cdd9d65718c', 'null', 'good okay but', '19cs206@gmail.com'),
(29, '62cdd9c084e86', '62cdd9d65718c', 'null', 'good okay but', '19cs206@gmail.com'),
(30, '62cdd9c084e86', '62cdd9d65718c', 'null', 'good okay but', '19cs206@gmail.com'),
(31, '62cdd9c084e86', '62cdd9d65718c', 'null', 'good okay but', '19cs206@gmail.com'),
(32, '62cdd9c084e86', '62cdd9d65718c', 'null', 'good okay but', '19cs206@gmail.com'),
(33, '62cdd9c084e86', '62cdd9d65718c', 'null', 'good okay but', '19cs206@gmail.com'),
(34, '62cdd9c084e86', '62cdd9d65718c', 'null', 'good okay but', '19cs206@gmail.com'),
(35, '62cdd9c084e86', '62cdd9d65718c', 'null', 'good okay but', '19cs206@gmail.com'),
(36, '62cdd9c084e86', '62cdd9d65718c', 'null', 'good okay but', 'diya@gmail.com'),
(37, '62cdd9c084e86', '62cdd9d65718c', 'null', 'good okay but', 'diya@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `user_answer`
--
ALTER TABLE `user_answer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_answer`
--
ALTER TABLE `user_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
