-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2023 at 10:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

CREATE TABLE `app` (
  `dname` varchar(255) NOT NULL,
  `fee` varchar(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app`
--

INSERT INTO `app` (`dname`, `fee`, `pname`, `time`, `date`, `id`, `pid`) VALUES
('Dr.Priya kaur', '500/-', 'Preeti', '01:11:00', '2023-08-21', 1, 1),
('Dr. Rajan Desai', '500/-', 'Karan', '12:15:00', '2023-08-23', 2, 2),
('Dr.Manish', '500/-', 'Aman', '02:16:00', '2023-08-21', 3, 3),
('Dr.Deepa', '500/-', 'harshit jain', '02:17:00', '2023-08-23', 4, 12),
('Dr.Manish Kumar', '500/-', 'harbans', '14:19:00', '2023-08-24', 5, 13);

-- --------------------------------------------------------

--
-- Table structure for table `doctor1`
--

CREATE TABLE `doctor1` (
  `did` int(11) NOT NULL,
  `dname` varchar(255) NOT NULL,
  `dfeild` varchar(255) NOT NULL,
  `demail` varchar(255) NOT NULL,
  `dfee` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor1`
--

INSERT INTO `doctor1` (`did`, `dname`, `dfeild`, `demail`, `dfee`) VALUES
(1, 'Dr.Priya kaur', 'Psychiatrist ', 'priya@gmail.com', '500/-'),
(2, 'Dr. Rajan Desai', 'Dermatologist', 'rajan@gmail.com', '500/-'),
(3, 'Dr.Manish', 'Dentist', 'manish@gmail.com', '500/-'),
(4, 'Dr.Anjali', 'Gynecologist', 'anjli@gmail.com', '500/-'),
(5, 'Dr.Deepa', 'Pediatrician', 'deepa@gmail.com', '500/-'),
(7, 'Dr.Manish Kumar', 'Dentist', 'manish@gmail.com', '500/-'),
(9, 'Dr.Nimit ', 'Gynecologist', 'nimit@gmail.com', '500/-');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pid` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `age` varchar(11) NOT NULL,
  `height` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `pname`, `age`, `height`, `weight`, `gender`, `email`) VALUES
(1, 'Preeti', '50 ', '5 feet 6 inch', '55', 'Female', 'preeti@yopmail.com'),
(2, 'Karan', '28', '6 feet', '78', 'Male', 'karan@yopmail.com'),
(3, 'Aman', '34', '5 feet 4 inch', '56', 'Male', 'aman@yopmail.com'),
(4, 'Harman', '20', '5 feet ', '60', 'Male', 'harman@yopmail.com'),
(5, 'Anjali', '15', '4 feet', '23', 'Female', 'anjali@yopmail.com'),
(6, 'Daman ', '33', '6 feet', '76', 'Male', 'daman@yopmail.com'),
(10, 'Rispreet', '21', '5 feet 2 inch', '60', 'Female', 'risprett@yopmail.com'),
(12, 'harshit jain', '19', '5 feet ', '60', 'Male', 'hj252214@gmail.com'),
(13, 'harbans', '20', '5 feet', '55', 'Female', 'harbanskaurvasir@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `email`, `password`, `cpassword`, `usertype`) VALUES
(1, 'harbans', 'info.harbanskaur@gmail.com', 'admin', 'admin', 'admin'),
(4, 'mukesh', 'harbanskaurvasir@gmail.com', '123', '123', 'doctor'),
(5, 'harleen', 'harbanskaur1602@gmail.com', '234', '234', 'patient');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `oauth_uid` varchar(255) DEFAULT NULL,
  `oauth_provider` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor1`
--
ALTER TABLE `doctor1`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app`
--
ALTER TABLE `app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor1`
--
ALTER TABLE `doctor1`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
