-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 04:04 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_user_id`, `cart_product_id`, `quantity`, `status`) VALUES
(59, 33, 59, 0, '0'),
(60, 33, 64, 0, '0'),
(61, 33, 63, 0, '0'),
(62, 33, 62, 2, '0'),
(63, 33, 60, 2, '0'),
(64, 28, 59, 5, '0'),
(65, 34, 59, 3, '0'),
(66, 34, 60, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `cat_name`) VALUES
(10, 'Barongs'),
(12, 'Costumes'),
(14, 'Gowns'),
(15, 'Suit'),
(16, 'accessories');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkout_id` int(11) NOT NULL,
  `checkout_cart_id` int(11) NOT NULL,
  `checkout_user_id` int(11) NOT NULL,
  `checkout_date` varchar(255) NOT NULL,
  `checkout_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_walkin`
--

CREATE TABLE `customer_walkin` (
  `cw_id` int(11) NOT NULL,
  `customer_fname` varchar(255) NOT NULL,
  `customer_lname` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_walkin`
--

INSERT INTO `customer_walkin` (`cw_id`, `customer_fname`, `customer_lname`, `customer_address`) VALUES
(1, 'kevins', 'felix', 'bago'),
(2, 'vin', 'dasdasd', 'asdasdasd'),
(3, 'kevz', 'sdasdasd', 'asdasdasd'),
(4, 'sdfdgg', 'gsfdgf', 'dgsfdgfh'),
(5, 'zdbfnd', 'zdbfn', 'dgbfndg'),
(6, 'cxvzcbxv', 'Bzcnxv', 'xvcbvncmbv');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `permission_id` int(11) NOT NULL,
  `diplay_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `image`, `name`, `price`, `variation`, `stocks`, `category_id`, `description`) VALUES
(59, 'bar10.jpg', 'Filipiniana Handmade Pinilian Yellow Jumpsuit', 1000, 'small', 10, 10, 'Filipiniana Handmade Pinilian Yellow Jumpsuit'),
(60, 'bar11.jpg', 'Filipiniana Handmade Pinilian Dress ', 1100, 'small', 10, 10, 'Filipiniana Handmade Pinilian Dress '),
(61, 'bar12.jpg', 'Filipiniana Handmade Pinilian Dress', 900, 'medium', 9, 10, 'Filipiniana Handmade Pinilian Dress'),
(62, 'bar14.jpg', 'Filipiniana Handmade Pinilian Bolero ', 650, 'small', 8, 10, 'Filipiniana Handmade Pinilian Bolero '),
(63, 'hg.jpg', 'Filipiniana Handmade Pinilian ', 1150, 'Medium', 9, 10, 'Filipiniana Handmade Pinilian '),
(64, 'yhgy.jpg', 'Filipiniana Yellow Handmade Pinilian', 1000, 'Medium', 10, 10, 'Filipiniana Yellow Handmade Pinilian'),
(65, 'barong1.jpg', 'Filipiniana Handmade Pinilian Inabel Bolero', 500, 'Medium', 10, 10, 'Filipiniana Handmade Pinilian Inabel Bolero'),
(66, 'barong2.jpg', 'Filipiniana Pink  Handmade Pinilian Bolero', 850, 'Small', 10, 10, 'Filipiniana Pink  Handmade Pinilian Bolero'),
(67, 'baw.jpg', 'Filipiniana Handmade Pinilian Bolero', 800, 'Small', 9, 10, 'Filipiniana Handmade Pinilian Bolero'),
(68, 'barong4.jpg', 'Jusi Green Barong Tagalog ', 450, 'Medium', 10, 10, 'Jusi Green Barong Tagalog '),
(69, 'barong5.jpg', 'Cocoon Blue Barong Tagalog ', 500, 'Medium', 7, 10, 'Cocoon Blue Barong Tagalog '),
(70, 'barong6.jpg', 'Cocoon Blue Barong Tagalog ', 500, 'Medium', 5, 10, 'Cocoon Blue Barong Tagalog '),
(72, 'acc1.jpg', ' Bridal Hair Accessories Rhinestone', 200, 'Small', 7, 16, ' Bridal Hair Accessories Rhinestone'),
(73, 'acc2.jpg', 'Princess Crowns and Hair Accessories', 200, 'Medium', 10, 16, 'Princess Crowns and Hair Accessories'),
(74, 'acc3.jpg', 'JAGETRADE Crown Prom Jewelry ', 150, 'Medium', 10, 16, 'JAGETRADE Crown Prom Jewelry '),
(75, 'acc4.jpg', 'Gold Tiaras and Crowns for Women Rhinestone', 200, 'Small', 6, 16, 'Gold Tiaras and Crowns for Women Rhinestone'),
(76, 'acc5.jpg', 'Crown for Party Prom Headband Pageant Crown', 200, 'Medium', 9, 16, 'Crown for Party Prom Headband Pageant Crown'),
(77, 'acc6.jpg', 'Rose Rhinestone Crown Princess', 200, 'Medium', 10, 16, 'Rose Rhinestone Crown Princess'),
(78, 'suit1.jpg', 'Mens Suit Slim Fit Wedding Dinner Tuxedo Suits for Men ', 500, 'Large', 10, 15, 'Mens Suit Slim Fit Wedding Dinner Tuxedo Suits for Men '),
(79, 'suit2.jpg', 'Mens Suit  Pinstripe Tailored Fit', 550, 'Medium', 7, 15, 'Mens Suit  Pinstripe Tailored Fit'),
(80, 'suit3.jpg', 'Mens Tweed Wool Check Suit Vintage Tailored Fit', 600, 'Small', 8, 15, 'Mens Tweed Wool Check Suit Vintage Tailored Fit'),
(81, 'suit4.jpg', 'Mens Camel Suit Herringbone Wool Vintage Retro Fit', 500, 'Medium', 7, 15, 'Mens Camel Suit Herringbone Wool Vintage Retro Fit'),
(82, 'suit5.jpg', 'Mens Wool Suit Tweed Burgundy Black Tailored Fit Classic', 600, 'Small', 10, 15, 'Mens Wool Suit Tweed Burgundy Black Tailored Fit Classic'),
(84, 'suit6.jpg', 'Mens Suit Tan Check Classic  Peaky Tweed Vintage', 500, 'Large', 8, 15, 'Mens Suit Tan Check Classic  Peaky Tweed Vintage'),
(85, 'g1.jpg', 'Women Off The Shoulder Glitter Sequin Ball Gown', 1500, 'Medium', 8, 14, 'Women Off The Shoulder Glitter Sequin Ball Gown'),
(86, 'gytu.jpg', 'Dreamy Deals On Stunning Ice Blue Wedding Dress', 1100, 'Small', 10, 14, 'Dreamy Deals On Stunning Ice Blue Wedding Dress'),
(88, 'gow2.jpg', 'Cocktail Dress PInk', 700, 'Medium', 7, 14, 'Cocktail Dress PInk'),
(89, 'gow1.jpg', 'Red Gown Flower', 1000, 'Medium', 5, 14, 'Red Gown Flower'),
(90, 'oipop.jpg', ' Maroon Off Shoulder Bridesmaid Dress Long, Simple Tulle Dress', 1000, 'Small', 4, 14, ' Maroon Off Shoulder Bridesmaid Dress Long, Simple Tulle Dress'),
(91, 'opop.jpg', 'Sexy Off-the-shoulder Wedding Dress Pink ', 1500, 'Small', 7, 14, 'Sexy Off-the-shoulder Wedding Dress Pink '),
(92, 'red.jpg', 'Red Ball Gowns  Evening Dresses', 2000, 'Large', 8, 14, 'Red Ball Gowns  Evening Dresses'),
(93, 'uyu.jpg', 'Wine Red Toast Wedding Dress Dinner Annual Meeting Gown', 1400, 'Large', 5, 14, 'Wine Red Toast Wedding Dress Dinner Annual Meeting Gown'),
(94, 'jhjkh.jpg', 'Prom Dress Long  Dresses Off Shoulder Tulle Formal Evening Gowns Ball Gown', 2000, 'Small', 4, 14, 'Prom Dress Long  Dresses Off Shoulder Tulle Formal Evening Gowns Ball Gown'),
(95, 'cc1.jpg', 'Peruvian Alpaca Costume', 700, 'Medium', 5, 12, 'Peruvian Alpaca Costume'),
(96, 'cc2.jpg', 'Hanbok Korean Costume', 500, 'Small', 6, 12, 'Hanbok Korean Costume'),
(97, 'cos3.jpg', 'Costume Indiana Red with SIlver', 650, 'Medium', 7, 12, 'Costume Indiana Red with SIlver'),
(98, 'cos5.jpg', 'Costume Darna ', 500, 'Small', 5, 12, 'Costume Darna '),
(99, 'cos1.jpg', 'Blue and Green Costume', 400, 'Large', 4, 12, 'Blue and Green Costume'),
(101, 'cos2.jpg', 'SIlver Costume Girl', 500, 'Large', 4, 12, 'SIlver Costume Girl');

-- --------------------------------------------------------

--
-- Table structure for table `rents`
--

CREATE TABLE `rents` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rents`
--

INSERT INTO `rents` (`id`, `customer_id`) VALUES
(23, 6);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `sales_total` int(11) NOT NULL,
  `sales_date` int(11) NOT NULL,
  `sales_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tracking_orders`
--

CREATE TABLE `tracking_orders` (
  `tracking_orders_id` int(11) NOT NULL,
  `to_checkout_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `to_date_back` varchar(255) NOT NULL,
  `to_time_back` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_permission_id`, `fname`, `lname`, `address`, `contact_num`, `email`, `username`, `password`) VALUES
(27, 1, 'Gil', 'Bulacan', 'Concepcion', '09261364720', 'gilscreation@gmail.com', 'hi', 'admin'),
(28, 2, 'john', 'javier', 'concepcion', '09261364720', 'jp145572@gmail.com', 'paulo28', 'customer'),
(29, 2, 'Gymbert', 'Busalpa', 'Concepcion', '09876543211', 'gymbert@gmail.com', 'gym', 'customer'),
(30, 2, 'hhhh', 'Busalpa', 'Concepcion', '098765432', 'gadiazatrisha@gmail.com', 'dg', '123456'),
(31, 2, 'ewrsdtrft', 'adfxgc', 'zszdfxfghg', '0976521', 'zyrusg27@gmail.com', 'triciiii', 'hhhhhh'),
(33, 2, 'trish', 'gg', 'sajcbkc', '09261364720', 'trishgg@gmail.com', 'trishgg', '12345'),
(34, 2, 'tricia', 'gadiaza', 'DGSHFDGJ', '09261364720', 'tricia@gmail.com', 'triciagadiaza', '12345');

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
  ADD KEY `co_user_id` (`checkout_user_id`),
  ADD KEY `co_cart_id` (`checkout_cart_id`);

--
-- Indexes for table `customer_walkin`
--
ALTER TABLE `customer_walkin`
  ADD PRIMARY KEY (`cw_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `users_permission_id` (`user_permission_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_walkin`
--
ALTER TABLE `customer_walkin`
  MODIFY `cw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `rents`
--
ALTER TABLE `rents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tracking_orders`
--
ALTER TABLE `tracking_orders`
  MODIFY `tracking_orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  ADD CONSTRAINT `co_cart_id` FOREIGN KEY (`checkout_cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `co_user_id` FOREIGN KEY (`checkout_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `to_checkout_id` FOREIGN KEY (`to_checkout_id`) REFERENCES `checkout` (`checkout_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_permission_id` FOREIGN KEY (`user_permission_id`) REFERENCES `permissions` (`permission_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
