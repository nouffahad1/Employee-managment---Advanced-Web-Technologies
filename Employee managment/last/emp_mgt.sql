-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 06, 2022 at 10:37 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emp_mgt`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `emp_number` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_number`, `first_name`, `last_name`, `job_title`, `password`) VALUES
(1, '987', 'hessa', 'khaled', 'programmer', '$2y$10$/LMFGyjp7l17hMvLS.8FFeNk5QzplL5SrRcXfyTlb/S54u7SOxqNC'),
(2, '654', 'alaa', 'mohammed', 'hr', '$2y$10$NvWLlQ.nT61tRR9z8EhewOv5t0CdVvWbF4HP3aIZ/.kK9i7K1EGSK'),
(3, '432', 'maryom', 'azzam', 'devolper', '$2y$10$Xzme2h9Cyfi8KBJbM0CgyuEQ495pQNGRFZ9iFG0uLYSpA4A6w0m.6'),
(4, '000', 'munira', 'saad', 'human recoursers', '$2y$10$KTFVgrnTgKamusheZ.VnqeVAtg1hEGypz2PrhV4lsNBteAiEuO5aq');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `first_name`, `last_name`, `username`, `password`) VALUES
(1, 'noura', 'name', 'mgr', '$2y$10$4WdKgLpoUUXwulBFBIciHOKPPMpVcRGXWhxN1C4NAvSUgD.48dl36');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(100) NOT NULL,
  `service_id` int(11) NOT NULL,
  `request_description` text NOT NULL,
  `attachment1` text,
  `file_type1` varchar(100) DEFAULT NULL,
  `attachment2` text,
  `file_type2` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `emp_id`, `service_id`, `request_description`, `attachment1`, `file_type1`, `attachment2`, `file_type2`, `status`) VALUES
(1, '987', 1, 'i want to promote', 'Attachments/-Domain Analysis Example.pdf', 'application/pdf', 'Attachments/-img1.JPG', 'image/jpeg', 2),
(2, '654', 2, 'please allow me', 'Attachments/-img2.JPG', 'image/jpeg', 'Attachments/-[Clarification]Sprint-0_Template.pdf', 'application/pdf', 3),
(3, '654', 3, 'i want to leave', 'Attachments/-lin_reg1.png', 'image/png', 'Attachments/-[Example]Domain analysis (Event Management System).pdf', 'application/pdf', 1),
(4, '432', 3, 'i want to leave now', 'Attachments/-img3.JPG', 'image/jpeg', 'Attachments/-Domain Analysis Example.pdf', 'application/pdf', 2),
(5, '000', 4, 'i want to Resignation', 'Attachments/-img3.JPG', 'image/jpeg', 'Attachments/-img2.JPG', 'image/jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`) VALUES
(1, 'Promotion'),
(2, 'Allowance'),
(3, 'Leave'),
(4, 'Resignation'),
(5, 'Health Insurance');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
