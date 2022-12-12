-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 04:02 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brms`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_walkin`
--

CREATE TABLE `customer_walkin` (
  `cw_id` int(11) NOT NULL,
  `customer_fname` varchar(255) NOT NULL,
  `customer_lname` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_product_id` int(11) NOT NULL,
  `customer_quantity` int(11) NOT NULL,
  `checkout_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_walkin`
--

INSERT INTO `customer_walkin` (`cw_id`, `customer_fname`, `customer_lname`, `customer_address`, `customer_product_id`, `customer_quantity`, `checkout_status`) VALUES
(42, 'joana', 'mallare', 'sampaguita', 67, 1, 1),
(43, 'asdasda', 'sdasdasda', 'sdasdas', 59, 2, 1),
(44, 'asdasd', 'asdasdasd', 'asdasdasd', 74, 1, 1),
(45, 'asdasd', 'asdasda', 'asdasd', 59, 1, 1),
(46, 'adsasd', 'asdasd', 'adsasd', 74, 2, 1),
(47, 'kajo', 'manuel', 'sampaguita', 59, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_walkin`
--
ALTER TABLE `customer_walkin`
  ADD PRIMARY KEY (`cw_id`),
  ADD KEY `cw_id` (`customer_product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_walkin`
--
ALTER TABLE `customer_walkin`
  MODIFY `cw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_walkin`
--
ALTER TABLE `customer_walkin`
  ADD CONSTRAINT `cw_id` FOREIGN KEY (`customer_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
