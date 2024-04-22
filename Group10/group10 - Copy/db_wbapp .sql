-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2024 at 02:48 PM
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
-- Database: `db_wbapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `name`, `date`) VALUES
(2, 'jhanna', '2024-03-01'),
(4, 'erica', '2024-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `totalVolunteer` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `date`, `time`, `totalVolunteer`) VALUES
(1, 'coastal care party', '2024-03-06', '12:33:00', 0),
(2, 'mangrove planting', '2024-03-08', '16:38:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(8) UNSIGNED NOT NULL,
  `user_lastname` varchar(180) NOT NULL DEFAULT '',
  `user_firstname` varchar(180) NOT NULL DEFAULT '',
  `user_email` varchar(180) NOT NULL DEFAULT '',
  `user_password` varchar(180) NOT NULL DEFAULT '',
  `user_date_added` date NOT NULL DEFAULT '1000-01-01',
  `user_time_added` time NOT NULL DEFAULT '00:00:00',
  `user_date_updated` date NOT NULL DEFAULT '1000-01-01',
  `user_time_updated` time NOT NULL DEFAULT '00:00:00',
  `user_status` int(1) NOT NULL DEFAULT 0,
  `user_token` varchar(255) NOT NULL DEFAULT '',
  `user_access` varchar(255) NOT NULL DEFAULT '',
  `user_address` varchar(255) NOT NULL DEFAULT '',
  `user_birthdate` date NOT NULL DEFAULT '1000-01-01',
  `user_nickname` varchar(180) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_lastname`, `user_firstname`, `user_email`, `user_password`, `user_date_added`, `user_time_added`, `user_date_updated`, `user_time_updated`, `user_status`, `user_token`, `user_access`, `user_address`, `user_birthdate`, `user_nickname`) VALUES
(10000024, 'Tornea', 'Joannah', 'joannah@gmail.com', '123', '2024-03-06', '19:44:38', '1000-01-01', '00:00:00', 1, '', 'Admin', '', '1000-01-01', 'koikoi'),
(10000023, 'Tornea', 'Joannah', 'joannah@gmail.com', '123', '2024-02-27', '23:56:20', '1000-01-01', '00:00:00', 1, '', 'Admin', '', '1000-01-01', 'koikoi'),
(10000022, 'Tornea', 'Joannah', 'ric@gmail.com', '123', '2024-02-27', '20:46:25', '1000-01-01', '00:00:00', 1, '', 'Admin', '', '1000-01-01', 'Ric'),
(10000020, 'Tornea', 'Joannah', 'joannah@gmail.com', '123', '2024-02-21', '09:16:08', '1000-01-01', '00:00:00', 1, '', 'Staff', '', '1000-01-01', 'koikoi'),
(10000021, 'Tornea', 'Joannah', 'joannah@gmail.com', '123', '2024-02-21', '09:44:29', '1000-01-01', '00:00:00', 1, '', 'Staff', '', '1000-01-01', 'koikoi');

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `age` int(100) NOT NULL,
  `email` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`id`, `name`, `age`, `email`, `address`) VALUES
(15, 'jhanna', 20, 'ric@gmail.com', 'bacolod'),
(16, 'Nicolette', 99, 'joannah@gmail.com', 'bacolod'),
(17, 'erica', 19, 'ric@gmail.com', 'Cadiz'),
(18, 'erica', 99, 'len@gmail.com', 'Cadiz'),
(19, 'Nicolette', 20, 'joannah@gmail.com', 'bacolod');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000025;

--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
