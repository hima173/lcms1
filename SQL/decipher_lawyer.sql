-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2019 at 11:12 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `decipher_lawyer`
--

-- --------------------------------------------------------

--
-- Table structure for table `decipher_lawyer_feedback_lawyer`
--

CREATE TABLE `decipher_lawyer_feedback_lawyer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `decipher_lawyer_feedback_lawyer`
--

INSERT INTO `decipher_lawyer_feedback_lawyer` (`id`, `user_id`, `name`, `email`, `subject`, `message`) VALUES
(1, 1, 'mukul', 'mukul@gmail.com', 'fghjkl', 'fghjk');

-- --------------------------------------------------------

--
-- Table structure for table `decipher_lawyer_feedback_user`
--

CREATE TABLE `decipher_lawyer_feedback_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `decipher_lawyer_feedback_user`
--

INSERT INTO `decipher_lawyer_feedback_user` (`id`, `user_id`, `name`, `email`, `subject`, `message`) VALUES
(1, 1, 'rishabh', 'rishabh@gmail.com', 'qwedrfty', 'fghjkl'),
(2, 9, 'rishabh', 'fghj', 'rfgthj', 'rfghj');

-- --------------------------------------------------------

--
-- Table structure for table `decipher_lawyer_login_admin`
--

CREATE TABLE `decipher_lawyer_login_admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `decipher_lawyer_login_admin`
--

INSERT INTO `decipher_lawyer_login_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `decipher_lawyer_login_lawyer`
--

CREATE TABLE `decipher_lawyer_login_lawyer` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` text NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `decipher_lawyer_login_lawyer`
--

INSERT INTO `decipher_lawyer_login_lawyer` (`id`, `first_name`, `last_name`, `email`, `status`, `password`) VALUES
(2, 'mukul', 'dave', 'mukuldaveproject@gmail.com', 'Approved', '123'),
(3, 'rishabh', 'joshi', 'joshirishabh7@gmail.com', 'Pending', '123');

-- --------------------------------------------------------

--
-- Table structure for table `decipher_lawyer_login_user`
--

CREATE TABLE `decipher_lawyer_login_user` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `decipher_lawyer_login_user`
--

INSERT INTO `decipher_lawyer_login_user` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'rishabh', 'joshi', 'joshirishabh7@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `decipher_lawyer_user_applied_case`
--

CREATE TABLE `decipher_lawyer_user_applied_case` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` text NOT NULL,
  `name` text NOT NULL,
  `topic` text NOT NULL,
  `type` text NOT NULL,
  `description` text NOT NULL,
  `status` text NOT NULL,
  `Final-Status` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `decipher_lawyer_user_applied_case`
--

INSERT INTO `decipher_lawyer_user_applied_case` (`id`, `user_id`, `user_email`, `name`, `topic`, `type`, `description`, `status`, `Final-Status`) VALUES
(1, 1, 'joshirishabh7@gmail.com', 'rishabh', 'fghjk', 'fghjk', 'ghjk', 'Approved', 'Pending'),
(2, 1, 'joshirishabh7@gmail.com', 'rishabh', 'ghjk', 'fghjk', 'ghjkl', 'Approved', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `decipher_lawyer_feedback_lawyer`
--
ALTER TABLE `decipher_lawyer_feedback_lawyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `decipher_lawyer_feedback_user`
--
ALTER TABLE `decipher_lawyer_feedback_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `decipher_lawyer_login_admin`
--
ALTER TABLE `decipher_lawyer_login_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `decipher_lawyer_login_lawyer`
--
ALTER TABLE `decipher_lawyer_login_lawyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `decipher_lawyer_login_user`
--
ALTER TABLE `decipher_lawyer_login_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `decipher_lawyer_user_applied_case`
--
ALTER TABLE `decipher_lawyer_user_applied_case`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `decipher_lawyer_feedback_lawyer`
--
ALTER TABLE `decipher_lawyer_feedback_lawyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `decipher_lawyer_feedback_user`
--
ALTER TABLE `decipher_lawyer_feedback_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `decipher_lawyer_login_admin`
--
ALTER TABLE `decipher_lawyer_login_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `decipher_lawyer_login_lawyer`
--
ALTER TABLE `decipher_lawyer_login_lawyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `decipher_lawyer_login_user`
--
ALTER TABLE `decipher_lawyer_login_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `decipher_lawyer_user_applied_case`
--
ALTER TABLE `decipher_lawyer_user_applied_case`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
