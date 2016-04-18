-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2016 at 09:41 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bloodbank`
--
CREATE DATABASE IF NOT EXISTS `bloodbank` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bloodbank`;

-- --------------------------------------------------------

--
-- Table structure for table `ab_negative`
--

CREATE TABLE IF NOT EXISTS `ab_negative` (
`serial` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(120) NOT NULL,
  `city` varchar(45) NOT NULL,
  `pincode` char(6) NOT NULL,
  `email` varchar(45) NOT NULL,
  `gender` varchar(6) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `dob` varchar(10) NOT NULL,
  `age` int(10) unsigned NOT NULL,
  `phone` char(13) NOT NULL,
  `valid` int(1) NOT NULL DEFAULT '0',
  `code` int(8) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ab_negative`
--

INSERT INTO `ab_negative` (`serial`, `name`, `address`, `city`, `pincode`, `email`, `gender`, `dob`, `age`, `phone`, `valid`, `code`) VALUES
(1, 'YASH', 'National Institute of Technology Calicut, Main Block Road, Kattangal, Kerala 673601, India KL Kerala', 'C', '333323', 'ymograi@gmail.com', 'Male', '2015-05-01', 0, '+919896544543', 1, 1839037106),
(2, 'DNOWIENDFIO', 'NIT Internal Ways, Kattangal, Kerala 673601, India KL Kerala', 'CALICUT', '896542', 'xaqx@gmail.com', 'Male', '17/01/1993', 0, '+918654723111', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ab_positive`
--

CREATE TABLE IF NOT EXISTS `ab_positive` (
`serial` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(120) NOT NULL,
  `city` varchar(45) NOT NULL,
  `pincode` char(6) NOT NULL,
  `email` varchar(45) NOT NULL,
  `gender` varchar(6) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `dob` varchar(10) NOT NULL,
  `age` int(10) unsigned NOT NULL,
  `phone` char(13) NOT NULL,
  `valid` int(1) NOT NULL DEFAULT '0',
  `code` int(8) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('abinb', '44b82b6363680bb1e6996cd34b6dbb53c4cd6af6'),
('anu123', '7c222fb2927d828af22f592134e8932480637c0d'),
('preeti', '5a4e00f9bbc46b6add57a23c5b7636bcdcb12721'),
('test1', '7c222fb2927d828af22f592134e8932480637c0d'),
('test2', '7c222fb2927d828af22f592134e8932480637c0d');

-- --------------------------------------------------------

--
-- Table structure for table `a_negative`
--

CREATE TABLE IF NOT EXISTS `a_negative` (
`serial` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(120) NOT NULL,
  `city` varchar(45) NOT NULL,
  `pincode` char(6) NOT NULL,
  `email` varchar(45) NOT NULL,
  `gender` varchar(6) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `dob` varchar(10) NOT NULL,
  `age` int(10) unsigned NOT NULL,
  `phone` char(13) NOT NULL,
  `valid` int(1) NOT NULL DEFAULT '0',
  `code` int(8) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `a_positive`
--

CREATE TABLE IF NOT EXISTS `a_positive` (
`serial` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(120) NOT NULL,
  `city` varchar(45) NOT NULL,
  `pincode` char(6) NOT NULL,
  `email` varchar(45) NOT NULL,
  `gender` varchar(6) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `dob` varchar(10) NOT NULL,
  `age` int(10) unsigned NOT NULL,
  `phone` char(13) NOT NULL,
  `valid` int(1) NOT NULL DEFAULT '0',
  `code` int(8) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_positive`
--

INSERT INTO `a_positive` (`serial`, `name`, `address`, `city`, `pincode`, `email`, `gender`, `dob`, `age`, `phone`, `valid`, `code`) VALUES
(9, 'PAWAN', 'jaunpur up', 'JAUNPUR', '223135', 'singh1993pawan@gmail.com', 'Male', '1992-12-05', 0, '+919995741276', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bg_names`
--

CREATE TABLE IF NOT EXISTS `bg_names` (
  `code` varchar(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bg_names`
--

INSERT INTO `bg_names` (`code`, `name`) VALUES
('ab_negative', 'AB -ve'),
('ab_positive', 'AB +ve'),
('a_negative', 'A -ve'),
('a_positive', 'A +ve'),
('b_negative', 'B -ve'),
('b_positive', 'B +ve'),
('o_negative', 'O -ve'),
('o_positive', 'O +ve');

-- --------------------------------------------------------

--
-- Table structure for table `b_negative`
--

CREATE TABLE IF NOT EXISTS `b_negative` (
`serial` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(120) NOT NULL,
  `city` varchar(45) NOT NULL,
  `pincode` char(6) NOT NULL,
  `email` varchar(45) NOT NULL,
  `gender` varchar(6) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `dob` varchar(10) NOT NULL,
  `age` int(10) unsigned NOT NULL,
  `phone` char(13) NOT NULL,
  `valid` int(1) NOT NULL DEFAULT '0',
  `code` int(8) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `b_positive`
--

CREATE TABLE IF NOT EXISTS `b_positive` (
`serial` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(120) NOT NULL,
  `city` varchar(45) NOT NULL,
  `pincode` char(6) NOT NULL,
  `email` varchar(45) NOT NULL,
  `gender` varchar(6) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `dob` varchar(10) NOT NULL,
  `age` int(10) unsigned NOT NULL,
  `phone` char(13) NOT NULL,
  `valid` int(1) NOT NULL DEFAULT '0',
  `code` int(8) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `b_positive`
--

INSERT INTO `b_positive` (`serial`, `name`, `address`, `city`, `pincode`, `email`, `gender`, `dob`, `age`, `phone`, `valid`, `code`) VALUES
(1, 'ARVIND KUMAR MAURYA', 'SASARAM,ROHTAS ,BIHAR', 'SASARAM', '821115', 'mauryaarvind37@gmail.com', 'Male', '1994-11-16', 0, '+919895124990', 1, NULL),
(2, 'PRAVESH SINGH', 'Palakutty NIT Road, Kattangal, Kerala 673601, India KL Kerala', 'CALICUT', '673601', 'singh.pravesh24@gmail.com', 'Male', '1993-03-05', 0, '+919026622664', 1, NULL),
(3, 'RAPHEL', 'Deoghar', 'DEOGHAR', '814149', 'raphel0009@gmail.com', 'Male', '1992-11-04', 0, '+917034317093', 1, NULL),
(5, 'YASH MOGRAI', 'National Institute of Technology Calicut, Main Block Road, Kattangal, Kerala 673601, India KL Kerala', 'CALICUT', '673601', 'xyz@gmail.com', 'Male', '2015-05-01', 0, '+919999999999', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `o_negative`
--

CREATE TABLE IF NOT EXISTS `o_negative` (
`serial` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(120) NOT NULL,
  `city` varchar(45) NOT NULL,
  `pincode` char(6) NOT NULL,
  `email` varchar(45) NOT NULL,
  `gender` varchar(6) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `dob` varchar(10) NOT NULL,
  `age` int(10) unsigned NOT NULL,
  `phone` char(13) NOT NULL,
  `valid` int(1) NOT NULL DEFAULT '0',
  `code` int(8) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `o_negative`
--

INSERT INTO `o_negative` (`serial`, `name`, `address`, `city`, `pincode`, `email`, `gender`, `dob`, `age`, `phone`, `valid`, `code`) VALUES
(1, 'YASH MOGRAI', 'asasas', 'CALICUT', '896542', 'ymograi@gmail.com', 'Male', '20-04-1992', 0, '+918654723111', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `o_positive`
--

CREATE TABLE IF NOT EXISTS `o_positive` (
`serial` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(120) NOT NULL,
  `city` varchar(45) NOT NULL,
  `pincode` char(6) NOT NULL,
  `email` varchar(45) NOT NULL,
  `gender` varchar(6) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `dob` varchar(10) NOT NULL,
  `age` int(10) unsigned NOT NULL,
  `phone` char(13) NOT NULL,
  `valid` int(1) NOT NULL DEFAULT '0',
  `code` int(8) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `o_positive`
--

INSERT INTO `o_positive` (`serial`, `name`, `address`, `city`, `pincode`, `email`, `gender`, `dob`, `age`, `phone`, `valid`, `code`) VALUES
(1, 'LOVELY', 'jfkfwn', 'CALICUT', '673601', 'love@gmail.com', 'Female', '1992-05-08', 0, '+918981276289', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ab_negative`
--
ALTER TABLE `ab_negative`
 ADD PRIMARY KEY (`serial`), ADD UNIQUE KEY `serial_UNIQUE` (`serial`);

--
-- Indexes for table `ab_positive`
--
ALTER TABLE `ab_positive`
 ADD PRIMARY KEY (`serial`), ADD UNIQUE KEY `serial_UNIQUE` (`serial`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `a_negative`
--
ALTER TABLE `a_negative`
 ADD PRIMARY KEY (`serial`), ADD UNIQUE KEY `serial_UNIQUE` (`serial`);

--
-- Indexes for table `a_positive`
--
ALTER TABLE `a_positive`
 ADD PRIMARY KEY (`serial`), ADD UNIQUE KEY `serial_UNIQUE` (`serial`);

--
-- Indexes for table `bg_names`
--
ALTER TABLE `bg_names`
 ADD PRIMARY KEY (`code`);

--
-- Indexes for table `b_negative`
--
ALTER TABLE `b_negative`
 ADD PRIMARY KEY (`serial`), ADD UNIQUE KEY `serial_UNIQUE` (`serial`);

--
-- Indexes for table `b_positive`
--
ALTER TABLE `b_positive`
 ADD PRIMARY KEY (`serial`), ADD UNIQUE KEY `serial_UNIQUE` (`serial`);

--
-- Indexes for table `o_negative`
--
ALTER TABLE `o_negative`
 ADD PRIMARY KEY (`serial`), ADD UNIQUE KEY `serial_UNIQUE` (`serial`);

--
-- Indexes for table `o_positive`
--
ALTER TABLE `o_positive`
 ADD PRIMARY KEY (`serial`), ADD UNIQUE KEY `serial_UNIQUE` (`serial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ab_negative`
--
ALTER TABLE `ab_negative`
MODIFY `serial` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ab_positive`
--
ALTER TABLE `ab_positive`
MODIFY `serial` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `a_negative`
--
ALTER TABLE `a_negative`
MODIFY `serial` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `a_positive`
--
ALTER TABLE `a_positive`
MODIFY `serial` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `b_negative`
--
ALTER TABLE `b_negative`
MODIFY `serial` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `b_positive`
--
ALTER TABLE `b_positive`
MODIFY `serial` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `o_negative`
--
ALTER TABLE `o_negative`
MODIFY `serial` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `o_positive`
--
ALTER TABLE `o_positive`
MODIFY `serial` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
