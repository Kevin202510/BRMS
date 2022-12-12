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
-- Table structure for table `customer_walkin_checkout`
--

CREATE TABLE `customer_walkin_checkout` (
  `cwc_id` int(11) NOT NULL,
  `cwc_customer_id` int(11) NOT NULL,
  `total_checkout_amount` float DEFAULT NULL,
  `checkout_payment` float NOT NULL,
  `checkout_Date` varchar(50) DEFAULT NULL,
  `checkout_rent_date` varchar(50) NOT NULL,
  `checkout_rent_return_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_walkin_checkout`
--

INSERT INTO `customer_walkin_checkout` (`cwc_id`, `cwc_customer_id`, `total_checkout_amount`, `checkout_payment`, `checkout_Date`, `checkout_rent_date`, `checkout_rent_return_date`) VALUES
(3, 42, 800, 1500, '2022-12-11', '', ''),
(4, 43, 2000, 2001, '2022-12-11', '', ''),
(8, 46, 300, 1500, '2022-12-11', '2022-12-11', '2022-12-11'),
(11, 47, 3000, 5000, '2022-12-11', '2022-12-17', '2022-12-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_walkin_checkout`
--
ALTER TABLE `customer_walkin_checkout`
  ADD PRIMARY KEY (`cwc_id`),
  ADD KEY `cw_check_id` (`cwc_customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_walkin_checkout`
--
ALTER TABLE `customer_walkin_checkout`
  MODIFY `cwc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_walkin_checkout`
--
ALTER TABLE `customer_walkin_checkout`
  ADD CONSTRAINT `cw_check_id` FOREIGN KEY (`cwc_customer_id`) REFERENCES `customer_walkin` (`cw_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
