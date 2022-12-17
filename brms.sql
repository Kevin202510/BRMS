-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 03:50 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_user_id` int(11) NOT NULL,
  `cart_product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `cat_name`) VALUES
(12, 'Costumes'),
(14, 'Gowns'),
(15, 'Suit'),
(16, 'accessories'),
(20, 'Barong');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkout_id` int(11) NOT NULL,
  `checkout_cart_id` int(11) NOT NULL,
  `checkout_amount` float NOT NULL,
  `checkout_payments` float DEFAULT NULL,
  `checkout_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `checkout_rent_date` varchar(50) NOT NULL,
  `checkout_rent_return_date` varchar(50) NOT NULL,
  `delivery_description` longtext DEFAULT NULL,
  `transaction_mode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_walkin`
--

INSERT INTO `customer_walkin` (`cw_id`, `customer_fname`, `customer_lname`, `customer_address`, `customer_product_id`, `customer_quantity`, `checkout_status`) VALUES
(52, 'John', 'Javier', 'Concepcion', 99, 2, 1),
(53, 'Kerby', 'Badillo', 'gulod', 98, 2, 1),
(54, 'Jomari', 'Mallari', 'Sampaguita', 97, 2, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `permission_id` int(11) NOT NULL,
  `diplay_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permission_id`, `diplay_name`) VALUES
(1, 'Administrator'),
(2, 'Customer'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `variation` varchar(255) NOT NULL,
  `stocks` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `image`, `name`, `price`, `variation`, `stocks`, `category_id`, `description`) VALUES
(97, 'cos3.jpg', 'Costume Indiana Red with SIlver', 650, 'Medium', 1, 12, 'Costume Indiana Red with SIlver'),
(98, 'cos5.jpg', 'Costume Darna ', 500, 'Small', 4, 12, 'Costume Darna '),
(99, 'cos1.jpg', 'Blue and Green Costume', 400, 'Large', 1, 12, 'Blue and Green Costume');

-- --------------------------------------------------------

--
-- Table structure for table `rents`
--

CREATE TABLE `rents` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `sales_total` int(11) NOT NULL,
  `sales_date` int(11) NOT NULL,
  `sales_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tracking_orders`
--

CREATE TABLE `tracking_orders` (
  `tracking_orders_id` int(11) NOT NULL,
  `to_checkout_id` int(11) NOT NULL,
  `to_status` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tracking_orders_customer_walkin_checkout`
--

CREATE TABLE `tracking_orders_customer_walkin_checkout` (
  `tocw_id` int(11) NOT NULL,
  `tocw_checkout_id` int(11) NOT NULL,
  `tocw_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_permission_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_num` varchar(11) NOT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_permission_id`, `fname`, `lname`, `address`, `contact_num`, `verification_code`, `email`, `email_verified_at`, `password`) VALUES
(27, 1, 'Gil', 'Bulacan', 'Concepcion', '09261364720', '298995', 'gilscreation@gmail.com', '2022-12-12 05:10:47', 'admin'),
(51, 2, 'Kerby', 'Bandillo', 'Purok Sagingan Nazareth General Tinio NE', '09261364720', '298995', 'kerbyjohn18@gmail.com', '2022-12-12 05:13:08', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_user_id` (`cart_user_id`),
  ADD KEY `cart_product_id` (`cart_product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkout_id`),
  ADD KEY `co_cart_id` (`checkout_cart_id`),
  ADD KEY `checkout_cart_id` (`checkout_cart_id`);

--
-- Indexes for table `customer_walkin`
--
ALTER TABLE `customer_walkin`
  ADD PRIMARY KEY (`cw_id`),
  ADD KEY `cw_id` (`customer_product_id`);

--
-- Indexes for table `customer_walkin_checkout`
--
ALTER TABLE `customer_walkin_checkout`
  ADD PRIMARY KEY (`cwc_id`),
  ADD KEY `cw_check_id` (`cwc_customer_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_category_id` (`category_id`);

--
-- Indexes for table `rents`
--
ALTER TABLE `rents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rent_customer_id` (`customer_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `tracking_orders`
--
ALTER TABLE `tracking_orders`
  ADD PRIMARY KEY (`tracking_orders_id`),
  ADD KEY `to_checkout_id` (`to_checkout_id`);

--
-- Indexes for table `tracking_orders_customer_walkin_checkout`
--
ALTER TABLE `tracking_orders_customer_walkin_checkout`
  ADD PRIMARY KEY (`tocw_id`),
  ADD KEY `tocw_foreign_key_checkout_cw` (`tocw_checkout_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `users_permission_id` (`user_permission_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `customer_walkin`
--
ALTER TABLE `customer_walkin`
  MODIFY `cw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `customer_walkin_checkout`
--
ALTER TABLE `customer_walkin_checkout`
  MODIFY `cwc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `rents`
--
ALTER TABLE `rents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tracking_orders`
--
ALTER TABLE `tracking_orders`
  MODIFY `tracking_orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tracking_orders_customer_walkin_checkout`
--
ALTER TABLE `tracking_orders_customer_walkin_checkout`
  MODIFY `tocw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_product_id` FOREIGN KEY (`cart_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_user_id` FOREIGN KEY (`cart_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `co_cart_id` FOREIGN KEY (`checkout_cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_walkin`
--
ALTER TABLE `customer_walkin`
  ADD CONSTRAINT `cw_id` FOREIGN KEY (`customer_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_walkin_checkout`
--
ALTER TABLE `customer_walkin_checkout`
  ADD CONSTRAINT `custo_id_walk` FOREIGN KEY (`cwc_customer_id`) REFERENCES `customer_walkin` (`cw_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rents`
--
ALTER TABLE `rents`
  ADD CONSTRAINT `rent_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer_walkin` (`cw_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tracking_orders`
--
ALTER TABLE `tracking_orders`
  ADD CONSTRAINT `to_checkout_id` FOREIGN KEY (`to_checkout_id`) REFERENCES `checkout` (`checkout_cart_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tracking_orders_customer_walkin_checkout`
--
ALTER TABLE `tracking_orders_customer_walkin_checkout`
  ADD CONSTRAINT `foreign_key_tracking_orders_customer_walkin_checkout` FOREIGN KEY (`tocw_checkout_id`) REFERENCES `customer_walkin_checkout` (`cwc_customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_permission_id` FOREIGN KEY (`user_permission_id`) REFERENCES `permissions` (`permission_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
