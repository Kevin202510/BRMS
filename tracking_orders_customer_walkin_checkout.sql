-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 12:41 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

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
-- Table structure for table `tracking_orders_customer_walkin_checkout`
--

CREATE TABLE `tracking_orders_customer_walkin_checkout` (
  `tocw_id` int(11) NOT NULL,
  `tocw_checkout_id` int(11) NOT NULL,
  `tocw_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracking_orders_customer_walkin_checkout`
--

INSERT INTO `tracking_orders_customer_walkin_checkout` (`tocw_id`, `tocw_checkout_id`, `tocw_status`) VALUES
(1, 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tracking_orders_customer_walkin_checkout`
--
ALTER TABLE `tracking_orders_customer_walkin_checkout`
  ADD PRIMARY KEY (`tocw_id`),
  ADD KEY `tocw_foreign_key_checkout_cw` (`tocw_checkout_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tracking_orders_customer_walkin_checkout`
--
ALTER TABLE `tracking_orders_customer_walkin_checkout`
  MODIFY `tocw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tracking_orders_customer_walkin_checkout`
--
ALTER TABLE `tracking_orders_customer_walkin_checkout`
  ADD CONSTRAINT `tocw_foreign_key_checkout_cw` FOREIGN KEY (`tocw_checkout_id`) REFERENCES `customer_walkin_checkout` (`cwc_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
