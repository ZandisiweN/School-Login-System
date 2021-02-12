-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2021 at 07:53 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_login_system_2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `personal_information`
--

CREATE TABLE `personal_information` (
  `id` int(10) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Middle_Name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `Postal_Code` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Home_Address` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `english` int(5) DEFAULT NULL,
  `polish` int(5) DEFAULT NULL,
  `biology` int(5) DEFAULT NULL,
  `art` int(5) DEFAULT NULL,
  `history` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal_information`
--

INSERT INTO `personal_information` (`id`, `user_type`, `First_Name`, `Last_Name`, `Middle_Name`, `email`, `Postal_Code`, `password`, `Home_Address`, `username`, `english`, `polish`, `biology`, `art`, `history`) VALUES
(35, 'admin', 'Fortune', 'Zviregei', 'Mfundisi', 'fortunechainz@gmail.com', '85-070', '4a7d1ed414474e4033ac29ccb8653d9b', 'Marszałka Focha 50', 'Zapeture', 90, 67, 55, 78, 98),
(36, 'user', 'Tshukela', 'Ncube', 'Food', 'food@mail.com', '85-070', '4a7d1ed414474e4033ac29ccb8653d9b', '10900K', 'Signup', 45, 78, 87, 88, 90),
(37, 'user', 'Zandisiwe', 'Ndhlovu', 'Mazet', 'mazet@mail.com', '85-070', '4a7d1ed414474e4033ac29ccb8653d9b', 'Marszałka Focha 50', 'Zandi', 97, 95, 99, 89, 92),
(38, 'user', 'Wesley', 'Mabhasa', 'Michael', 'michaelWes@gmail.com', '85-043', '4a7d1ed414474e4033ac29ccb8653d9b', '3 Filarecka', 'Michael123', 32, 56, 76, 57, 65);

-- --------------------------------------------------------

--
-- Table structure for table `something`
--

CREATE TABLE `something` (
  `subject` varchar(100) NOT NULL,
  `code` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email_Address` (`email`);

--
-- Indexes for table `something`
--
ALTER TABLE `something`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personal_information`
--
ALTER TABLE `personal_information`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `something`
--
ALTER TABLE `something`
  MODIFY `code` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
