-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2018 at 06:16 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upload_image`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `course` varchar(200) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `completed_task` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `first_name`, `last_name`, `course`, `duration`, `completed_task`, `date`) VALUES
(54, 'Ajiz', 'kkn', '.net', '45', '.net', '2018-04-26'),
(55, 'Aqib', 'llk', 'Java', '45', 'Absent', '2018-04-26'),
(57, 'Vishnu', 'lll', 'UI', '45', 'bootstrap completed', '2018-04-26'),
(58, 'Piyush', 'jjj', 'UI', '45', 'system task', '2018-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE `tbl_image` (
  `tbl_image_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `course` varchar(200) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(200) NOT NULL,
  `image_location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`tbl_image_id`, `first_name`, `last_name`, `course`, `duration`, `date`, `status`, `image_location`) VALUES
(5, 'Ajiz', 'kkn', '.net', '45', '2018-04-26', 'Internship', 'Hydrangeas.jpg'),
(6, 'Aqib', 'llk', 'Java', '45', '2018-04-26', 'Internship', 'Penguins.jpg'),
(11, 'Vishnu', 'lll', 'UI', '45', '2018-04-26', 'Internship', 'Desert.jpg'),
(12, 'Piyush', 'jjj', 'UI', '45', '2018-04-26', 'Internship', 'Jellyfish.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD PRIMARY KEY (`tbl_image_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbl_image`
--
ALTER TABLE `tbl_image`
  MODIFY `tbl_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
