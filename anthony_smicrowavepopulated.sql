-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 07:30 PM
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
-- Database: `anthony'smicrowave`
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
('Microwave', 'Used microwave in good condition. Has an output of 900 watts. Comes with a timer and clock feature.', 1, 'microwave.jpg', '50', 0),
('Frying pan', 'Used non stick frying pan. 5\" radius.', 4, 'frying pan.jpg', '15', 1),
('Lamp', 'Desk lamp. Never used.', 4, 'lamp.jpg', '25', 2),
('Mattress topper', 'Used mattress topper. Full size. Good condition', 3, 'mattress topper.jpg', '8', 3),
('Mini fridge', 'Used mini fridge. 3.3 cubic feet. Good condition, may need to be cleaned.', 6, 'mini fridge.jpg', '100', 4),
('Monitor', '12 inch monitor', 9, 'monitor.png', '85', 5),
('Software Development Design and Coding', 'Used Software Development Design and Coding textbook. Good condition, some writing on pages.', 7, 'software development.jpg', '20', 6),
('Thomas Calculus', 'New Thomas Calculus textbook. ', 23, 'thomas calculus.jpg', '40', 7),
('TV', '14 inch LED TV', 16, 'tv.jpeg', '175', 8),
('Vacuum', 'Used vacuum. Still working', 19, 'vacuum 1.jpg', '30', 9),
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
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`) VALUES
(1, 'James Smith'),
(2, 'Mary Johnson'),
(3, 'Robert Williams'),
(4, 'Jen Brown'),
(14, 'John Brown'),
(5, 'David Garcia'),
(6, 'Sarah Miller'),
(7, 'Joe Wilson'),
(8, 'Daniel Park'),
(9, 'Ken Lee'),
(10, 'Matthew Moore'),
(11, 'Emily Thompson'),
(12, 'Amy Harris'),
(13, 'Emma Walker');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
