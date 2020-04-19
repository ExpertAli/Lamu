-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 19, 2020 at 01:50 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user`, `product`, `quantity`, `amount`, `status`, `posted`, `updated`) VALUES
(1, 1, 7, 1, 4500, 1, '2020-02-20 08:11:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `posted`) VALUES
(11, 'Grocery', '2020-03-28 16:55:53'),
(12, 'Sea Fish', '2020-03-28 17:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hashcode` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `phone` int(11) NOT NULL,
  `posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `fullname`, `email`, `password`, `hashcode`, `status`, `phone`, `posted`) VALUES
(3, 'Client Name', 'abdirahman@gmail.com', '$2y$10$7fMXMX24UO8Pp1kEWoZj6OYMUhKjwztswN4049orI5i6Q6IWuy3Hq', '$2y$10$LHqQGBFa22G8o9MXA5E8VuzogzdTtgpjiQ6hLNoYEuCAN6YzqQpAC', 1, 72365410, '2019-11-23 17:54:25'),
(4, 'Abdirahman badal', 'sultanmahamad74@gmail.com', '$2y$10$LNa6HhqHhuvJNqowGTYjLurmwkv.stYERDrumnwmpO9ru6hG3dqm6', '$2y$10$XULU/2nO6vNE5PC4Qzjgc.FFNguFhq7f8wAPY88mGFM3G19SlpBxC', 1, 708327061, '2019-12-13 22:21:42'),
(5, 'Abdirahman badal', 'abdirahman@gmail.com', '$2y$10$isGRrg9zGkk8AWcbm5oyBeAvY9hgyp6q.vgNWXozv8bOFG4zMAxFe', '$2y$10$0C1kEU7dyXjjA8RaLgxH7ugqXpcZGFlLZBMWbYVcUqO6DWjjVWda6', 1, 708327061, '2020-02-19 10:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `mpesa`
--

CREATE TABLE `mpesa` (
  `id` int(11) NOT NULL,
  `tx_type` varchar(40) NOT NULL,
  `tx_id` varchar(50) NOT NULL,
  `tx_time` varchar(40) NOT NULL,
  `tx_amount` double NOT NULL,
  `shortcode` varchar(15) NOT NULL,
  `billrefno` varchar(40) NOT NULL,
  `invoice` varchar(40) NOT NULL,
  `thirdparty` varchar(40) NOT NULL,
  `msisdn` varchar(20) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `account` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mpesa`
--

INSERT INTO `mpesa` (`id`, `tx_type`, `tx_id`, `tx_time`, `tx_amount`, `shortcode`, `billrefno`, `invoice`, `thirdparty`, `msisdn`, `fullname`, `account`) VALUES
(1, 'TEST', 'TEST', 'TEST', 4500, 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 123.5),
(2, 'TEST', 'TEST', 'TEST', 4500, 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 123.5),
(3, 'Pay Bill', 'LTA3544ZAF', '20200211154726', 0.02, '999999', 'SAMPLE ACCOUNT 101', '', '', '254000000000', 'JOHN M. DOE', 0.02),
(4, 'Pay Bill', 'LTA3544ZAF', '20200211154726', 0.02, '999999', 'SAMPLE ACCOUNT 101', '', '', '254000000000', 'JOHN M. DOE', 0.02);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `category` int(11) DEFAULT '1',
  `posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `quantity`, `category`, `posted`) VALUES
(1, 'Tomatoes', 150, 'Freshly picked organic tomatoes', 12, 11, '2020-04-08 18:34:20');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `image_name` varchar(155) DEFAULT NULL,
  `width` int(11) NOT NULL DEFAULT '200',
  `height` int(11) NOT NULL DEFAULT '300',
  `posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product`, `image_name`, `width`, `height`, `posted`) VALUES
(140, 1, 'tomatoes.jpeg', 200, 300, '2020-04-08 18:34:21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `password`, `hash`, `posted`) VALUES
(4, 'Munawar Ali', 'munawarali545@gmail.com', '$2y$10$H2ipbOhnHJtX3zEA6DdZ7OyWOW8eN3tfdfa7RiiGjDE6w0oN.CYm6', '$2y$10$1/Fv515V5HVBxwog/CDPYOhTmfchnCiPUeL7QQkJKKHZrmOdyg3Hq', '2020-03-28 17:20:30'),
(5, 'Fahim Abdallah', 'fahimabdallah@gmail.com', '$2y$10$jfYTL34vYcEAbHDG6F6CIu4xD4y3U3L/jjLTIkXNPeV9khGvu5p2q', '$2y$10$3uFJzBaGhIl5Q8MBGnKJTuDsLyAh/3ltjCvTw1l9Dpf/z8.ldQPx.', '2020-03-28 17:34:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpesa`
--
ALTER TABLE `mpesa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mpesa`
--
ALTER TABLE `mpesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
