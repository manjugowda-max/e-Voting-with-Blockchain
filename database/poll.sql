-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2017 at 06:34 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poll`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbadministrators`
--

CREATE TABLE `tbadministrators` (
  `admin_id` int(5) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbadministrators`
--

INSERT INTO `tbadministrators` (`admin_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Md. Rezwanul', 'Haque', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Mahmudul', 'Hasan', 'sreejon07@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `tbcandidates`
--

CREATE TABLE `tbcandidates` (
  `candidate_id` int(5) NOT NULL,
  `candidate_name` varchar(45) NOT NULL,
  `candidate_position` varchar(45) NOT NULL,
  `candidate_cvotes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbcandidates`
--

INSERT INTO `tbcandidates` (`candidate_id`, `candidate_name`, `candidate_position`, `candidate_cvotes`) VALUES
(1, 'Mamun', 'Chairman', 3),
(2, 'Emran', 'Chairman', 0),
(3, 'Sabuj', 'Vice-Chairman', 2),
(4, 'Sajedul', 'Vice-Chairman', 1),
(5, 'Sreejon', 'Chairman', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbmembers`
--

CREATE TABLE `tbmembers` (
  `member_id` int(5) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `voter_id` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbmembers`
--

INSERT INTO `tbmembers` (`member_id`, `first_name`, `last_name`, `email`, `voter_id`, `password`) VALUES
(1, 'Mahmudul', 'Hasan', 'sreejon07@gmail.com', '01670115309', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbpositions`
--

CREATE TABLE `tbpositions` (
  `position_id` int(5) NOT NULL,
  `position_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpositions`
--

INSERT INTO `tbpositions` (`position_id`, `position_name`) VALUES
(1, 'Chairman'),
(2, 'Vice-Chairman'),
(3, 'Secretary'),
(4, 'Vice-Secretary');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbadministrators`
--
ALTER TABLE `tbadministrators`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbcandidates`
--
ALTER TABLE `tbcandidates`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `tbmembers`
--
ALTER TABLE `tbmembers`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tbpositions`
--
ALTER TABLE `tbpositions`
  ADD PRIMARY KEY (`position_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbadministrators`
--
ALTER TABLE `tbadministrators`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbcandidates`
--
ALTER TABLE `tbcandidates`
  MODIFY `candidate_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbmembers`
--
ALTER TABLE `tbmembers`
  MODIFY `member_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbpositions`
--
ALTER TABLE `tbpositions`
  MODIFY `position_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
