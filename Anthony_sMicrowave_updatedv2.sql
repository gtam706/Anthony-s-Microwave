-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2021 at 02:46 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Anthony'sMicrowave`
--

-- --------------------------------------------------------

--
-- Table structure for table `count`
--

CREATE TABLE `count` (
  `item_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `count`
--

INSERT INTO `count` (`item_count`) VALUES
(12);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `name` text NOT NULL,
  `description` text NOT NULL,
  `seller` int(11) NOT NULL,
  `image` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`name`, `description`, `seller`, `image`, `price`, `item_id`) VALUES
('Microwave', 'Used microwave in good condition. Has an output of 900 watts. Comes with a timer and clock feature.', 1, 'microwave.jpg', '50', 1),
('Frying pan', 'Used non stick frying pan. 5\" radius.', 4, 'frying pan.jpg', '15', 2),
('Lamp', 'Desk lamp. Never used.', 4, 'lamp.jpg', '25', 3),
('Mattress topper', 'Used mattress topper. Full size. Good condition', 3, 'mattress topper.jpg', '8', 4),
('Mini fridge', 'Used mini fridge. 3.3 cubic feet. Good condition, may need to be cleaned.', 6, 'mini fridge.jpg', '100', 5),
('Monitor', '12 inch monitor', 9, 'monitor.png', '85', 6),
('Software Development Design and Coding', 'Used Software Development Design and Coding textbook. Good condition, some writing on pages.', 7, 'software development.jpg', '20', 7),
('Thomas Calculus', 'New Thomas Calculus textbook. ', 23, 'thomas calculus.jpg', '40', 8),
('TV', '14 inch LED TV', 16, 'tv.jpeg', '175', 9),
('Vacuum', 'Used vacuum. Still working', 19, 'vacuum 1.jpg', '30', 10),
('Vacuum', 'Used vacuum. Still working', 12, 'vacuum 2.jpg', '25', 11);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewer` int(11) NOT NULL,
  `reviewee` int(11) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewer`, `reviewee`, `review`) VALUES
(2, 23, 'Received microwave in good condition. Trade went smoothly. Would buy from seller again. '),
(4, 19, 'Received textbook in good condition. Trade went smoothly. Would buy from seller again. '),
(6, 15, 'Fridge did not match pictures. Fridge was filthy and did not work. Would never buy from seller again.'),
(8, 19, '4/5'),
(34, 19, 'Seller was very friendly and cooperative. The entire process went very smoothly.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` text COLLATE utf8_bin NOT NULL,
  `image` text COLLATE utf8_bin NOT NULL,
  `password` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `image`, `password`) VALUES
(1, 'Anthony Micro', 'external-contentduckduckgocom.jpg', 'gR63YJXjU7dWn2R'),
(6, 'steve jobs', 'sliced-apple-5.jpg', 'iloveapple');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
