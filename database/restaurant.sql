-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2020 at 11:03 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `res_table`
--

CREATE TABLE `res_table` (
  `res_id` int(11) NOT NULL,
  `res_name` varchar(25) NOT NULL,
  `res_location` varchar(25) NOT NULL,
  `res_pin` int(6) NOT NULL,
  `res_rating` float NOT NULL,
  `res_opening` time NOT NULL,
  `res_closing` time NOT NULL,
  `res_image` text NOT NULL,
  `res_menu_image` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `res_table`
--

INSERT INTO `res_table` (`res_id`, `res_name`, `res_location`, `res_pin`, `res_rating`, `res_opening`, `res_closing`, `res_image`, `res_menu_image`) VALUES
(1, 'Hong Kong', 'Bathinda', 151001, 4, '09:00:00', '22:00:00', 'resources/php/restaurant_img/photo_2020-04-04_22-33-28.jpg', 'resources/php/restaurant_menu_img/IMG_20200310_115723_625.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `res_table`
--
ALTER TABLE `res_table`
  ADD PRIMARY KEY (`res_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `res_table`
--
ALTER TABLE `res_table`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
