-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2021 at 11:16 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_desc` varchar(500) NOT NULL,
  `event_date` varchar(25) NOT NULL,
  `event_banner` varchar(500) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_desc`, `event_date`, `event_banner`, `created_date`) VALUES
(1, 'Nico birthday', 'birthday for Nico', '.2021-04-28T08:26.', '.Screen Shot 2021-04-23 at 8.32.24 pm.png.', '2021-04-27 05:32:46'),
(2, 'Nico House Warming Party.', '.Please bring your +1 , and your own booth\r\nLets have FUn !.', '.2021-05-06T09:00.', '.Screen Shot 2021-04-23 at 8.32.24 pm.png.', '2021-04-27 06:22:36'),
(3, 'Nico House Warming Party #2.', '.Please bring your +1 , and your own booth\r\nLets have FUn !\r\nDrinks are 2$.', '.2021-05-06T09:00.', '.Screen Shot 2021-04-23 at 8.32.24 pm.png.', '2021-04-27 06:24:16'),
(4, 'graduation at dorset.', 'Graduation ceremoney at doreset college dublin', '2021-05-07T09:29', '.Screen Shot 2021-04-23 at 8.32.24 pm.png.', '2021-04-27 07:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `int` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`int`, `user_name`, `password`, `dateTime`) VALUES
(1, 'test', 'test', '2021-04-26 19:58:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`int`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `int` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
