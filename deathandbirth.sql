-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220616.7a6bd9eb57
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2022 at 11:54 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deathandbirth`
--

-- --------------------------------------------------------

--
-- Table structure for table `birth`
--

CREATE TABLE `birth` (
  `id` int(11) NOT NULL,
  `nameofhospital` varchar(255) NOT NULL,
  `nameofmother` varchar(255) NOT NULL,
  `nameoffather` varchar(255) NOT NULL,
  `nameofbaby` varchar(255) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contactofparents` varchar(255) NOT NULL,
  `addressofparents` varchar(255) NOT NULL,
  `placeofbirth` varchar(255) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `birth`
--

INSERT INTO `birth` (`id`, `nameofhospital`, `nameofmother`, `nameoffather`, `nameofbaby`, `dateofbirth`, `gender`, `contactofparents`, `addressofparents`, `placeofbirth`, `createdat`) VALUES
(1, 'War Memorial', 'Amina', 'Baba', 'Asana', '1998-09-09', 'Female', '+233542095569', 'Plot10A BLK 3', 'Europe', '2022-10-07 10:41:17'),
(2, 'Komfo Anokye', 'ABiba', 'Musah', 'Hafsa', '1998-09-09', 'Femala', '89945797', 'Ujdj', 'kumasi', '2022-10-07 10:45:40'),
(3, 'War Memorial', 'mama', 'fada', 'babygirl', '1998-09-09', 'Female', '3456789', 'Sepe Boukrom', 'Europe', '2022-10-07 15:39:39');

-- --------------------------------------------------------

--
-- Table structure for table `death`
--

CREATE TABLE `death` (
  `id` int(11) NOT NULL,
  `nameofhospital` varchar(255) NOT NULL,
  `nameofinformant` varchar(255) NOT NULL,
  `nameofdeased` varchar(255) NOT NULL,
  `dateofdeath` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contactofinformant` varchar(255) NOT NULL,
  `placeofdeath` varchar(255) NOT NULL,
  `ageofdeseased` int(11) NOT NULL,
  `causeofdeath` varchar(255) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `death`
--

INSERT INTO `death` (`id`, `nameofhospital`, `nameofinformant`, `nameofdeased`, `dateofdeath`, `gender`, `contactofinformant`, `placeofdeath`, `ageofdeseased`, `causeofdeath`, `createdat`) VALUES
(1, 'War Memorial', 'Kwaku Budu', 'Abanga Kofi', '1998-09-09', 'Male', '900348', 'Sekrem', 56, 'illness', '2022-10-07 10:01:35'),
(2, 'War Memorial', 'Kuffour', 'kwame Nkrumah', '2000-09-09', 'Male', '456454', 'Sekrem3', 45, 'illness', '2022-10-07 15:38:15');

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE `institutions` (
  `id` int(11) NOT NULL,
  `instname` varchar(255) NOT NULL,
  `instaddress` varchar(255) NOT NULL,
  `contactaddress` varchar(255) NOT NULL,
  `typeofinstitution` varchar(255) NOT NULL,
  `officerfullname` varchar(255) NOT NULL,
  `officeremail` varchar(255) NOT NULL,
  `officeraddress` varchar(255) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`id`, `instname`, `instaddress`, `contactaddress`, `typeofinstitution`, `officerfullname`, `officeremail`, `officeraddress`, `createdat`) VALUES
(1, 'Navrongo research', 'mohammedaminibrahim10@gmail.com', 'Plot10A BLK 3', 'Research', 'Mohammed Amin Ibrahim', 'mohammedaminibrahim10@gmail.com', 'Plot10A BLK 3', '2022-10-08 18:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `population`
--

CREATE TABLE `population` (
  `id` int(11) NOT NULL,
  `population` int(11) NOT NULL,
  `area` varchar(255) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `population`
--

INSERT INTO `population` (`id`, `population`, `area`, `createdat`) VALUES
(1, 5000, 'Navrongo', '2022-10-09 18:52:53'),
(2, 700, 'Navrongo', '2022-10-09 18:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `joinedat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `joinedat`) VALUES
(1, 'Mansah Musah', 'mansahmusah@gmail.com', '$2y$10$U2MKZkqLGlbrcRpqadB4Fu6bJGRuUGA9mhkF/TYZagjnesGfyAEuC', '2022-10-03 01:11:49'),
(2, 'Mohammed Amin Ibrahim', 'mohammedaminibrahim10@gmail.com', '$2y$10$zahmT86O9H/GE.Tqsr9E1uSF3Udri98haG3KiiTBO7x05Jp4/H8ai', '2022-10-03 01:37:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birth`
--
ALTER TABLE `birth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `death`
--
ALTER TABLE `death`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `population`
--
ALTER TABLE `population`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `birth`
--
ALTER TABLE `birth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `death`
--
ALTER TABLE `death`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `population`
--
ALTER TABLE `population`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



