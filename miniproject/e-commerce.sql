-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 08:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `mid` int(11) NOT NULL,
  `from_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `files` varchar(100) DEFAULT NULL,
  `message_date` date DEFAULT NULL,
  `viewed` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`mid`, `from_id`, `to_id`, `subject`, `message`, `files`, `message_date`, `viewed`) VALUES
(5, 6, 5, 'Text case', 'Testing message', 'img/apple.jpg', '2028-12-22', 0),
(6, 5, 6, 'Text case', 'hello subbarao', 'img/', '2005-01-23', 0),
(7, 5, 6, 'Text case', 'hello subbarao', 'img/', '2005-01-23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `pname` varchar(30) DEFAULT NULL,
  `image1` varchar(30) DEFAULT NULL,
  `image2` varchar(30) DEFAULT NULL,
  `image3` varchar(30) DEFAULT NULL,
  `pricetype` varchar(10) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `added_on_date` date DEFAULT NULL,
  `producttype` int(30) DEFAULT NULL,
  `is_verified` int(11) DEFAULT 0,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `image1`, `image2`, `image3`, `pricetype`, `price`, `added_by`, `added_on_date`, `producttype`, `is_verified`, `is_deleted`) VALUES
(1, 'Apple', 'img/apple1.jpg', 'img/apple1.jpg', 'img/apple1.jpg', 'single', 30, 5, '2022-12-22', 2, 0, 0),
(4, 'Carrot', 'img/carrot.jpg', 'img/carrot.jpg', 'img/carrot.jpg', 'kilo', 50, 5, '2005-01-23', 1, 0, 0),
(5, 'Chicken', 'img/boneless.jpg', 'img/c3.jpg', 'img/boneless.jpg', 'kilo', 150, 5, '2005-01-23', 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `ptid` int(11) NOT NULL,
  `ptname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`ptid`, `ptname`) VALUES
(1, 'Vegetables'),
(2, 'Fruits'),
(3, 'Meat'),
(4, 'Seafood');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `rid` int(11) NOT NULL,
  `reviewed_by` int(11) DEFAULT NULL,
  `review` varchar(450) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `date_of_review` date DEFAULT NULL,
  `is_deleted` int(11) DEFAULT 0,
  `product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`rid`, `reviewed_by`, `review`, `rating`, `date_of_review`, `is_deleted`, `product`) VALUES
(4, 5, 'good product', 4, '2023-01-05', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `rid` int(11) NOT NULL,
  `rname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`rid`, `rname`) VALUES
(1, 'Admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `uname` varchar(50) DEFAULT NULL,
  `mobile` double DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `passkey` varchar(18) DEFAULT NULL,
  `rid` int(11) DEFAULT 2,
  `is_deleted` int(11) DEFAULT 0,
  `is_verified` int(11) DEFAULT 0,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `pincode` int(6) DEFAULT NULL,
  `image` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `mobile`, `email`, `address`, `passkey`, `rid`, `is_deleted`, `is_verified`, `city`, `state`, `pincode`, `image`) VALUES
(5, 'Bhargav Rushi', 9441584672, 'bhargavrushi007@gmail.com', 'Surya chandra enclave, D block , flat no 103', 'Bhargav@19', 1, 0, 0, 'Peddagantyada', 'Andhra Pradesh', 530044, 'img/Bhargav.jpeg'),
(6, 'Subba Rao', 8989898989, 'subbu@gmail.com', '', 'Subbu@123', 2, 0, 0, 'Guntur', 'Andhra Pradesh', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `from_id` (`from_id`),
  ADD KEY `to_id` (`to_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `fk1` (`added_by`),
  ADD KEY `fk2` (`producttype`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`ptid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `reviewed_by` (`reviewed_by`),
  ADD KEY `fk3` (`product`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `rid` (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`from_id`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`to_id`) REFERENCES `users` (`uid`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`added_by`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `fk2` FOREIGN KEY (`producttype`) REFERENCES `producttype` (`ptid`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`product`) REFERENCES `product` (`pid`),
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`reviewed_by`) REFERENCES `users` (`uid`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `role` (`rid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
