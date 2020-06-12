-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 08:40 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-shoppingzonedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(2) NOT NULL,
  `banner_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `banner_img`) VALUES
(1, 'a.png'),
(2, 'b.png'),
(3, 'c.png'),
(14, 'e.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(10) NOT NULL,
  `order_id` varchar(200) NOT NULL,
  `total` double NOT NULL,
  `delivery_charge` double DEFAULT NULL,
  `itemtotal` float NOT NULL,
  `delivery_address_id` int(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `txnid` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `order_id`, `total`, `delivery_charge`, `itemtotal`, `delivery_address_id`, `date`, `time`, `status`, `user_id`, `payment_method`, `txnid`) VALUES
(2, 'ORDER100', 0, 0, 0, NULL, '2020-06-12', '23:45:44', 'placed', 'USER100', 'online', 'xxxxxxx'),
(3, 'ORDER101', 1449, 50, 1399, NULL, '2020-06-12', '23:54:54', 'placed', 'USER100', 'online', 'xxxxxxx');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address`
--

CREATE TABLE `delivery_address` (
  `id` int(10) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `pin` varchar(200) NOT NULL,
  `locality` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `landmark` varchar(200) DEFAULT NULL,
  `alternate_phone` varchar(200) DEFAULT NULL,
  `type` varchar(200) NOT NULL,
  `selected` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_address`
--

INSERT INTO `delivery_address` (`id`, `user_id`, `name`, `phone`, `pin`, `locality`, `address`, `city`, `state`, `landmark`, `alternate_phone`, `type`, `selected`) VALUES
(9, 'USER0', 'Dipankar saha', '7001733750', '733133', 'patiram', 'patiram trimohini road', 'dakshin dinajpur', 'west bengal', '', '', 'home', 1),
(10, 'USER100', 'Dipankar saha', '9474138980', '733133', 'patiram', 'patiram trimohini road', 'dakshin dinajpur', 'west bengal', '', '', 'home', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_address`
--

CREATE TABLE `order_address` (
  `id` int(10) NOT NULL,
  `order_id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `pin` varchar(200) NOT NULL,
  `locality` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `landmark` varchar(200) DEFAULT NULL,
  `alternate_phone` varchar(200) DEFAULT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_address`
--

INSERT INTO `order_address` (`id`, `order_id`, `name`, `phone`, `pin`, `locality`, `address`, `city`, `state`, `landmark`, `alternate_phone`, `type`) VALUES
(2, 'ORDER100', 'Dipankar saha', '9474138980', '733133', 'patiram', 'patiram trimohini road', 'dakshin dinajpur', 'west bengal', '', '', 'home'),
(3, 'ORDER101', 'Dipankar saha', '9474138980', '733133', 'patiram', 'patiram trimohini road', 'dakshin dinajpur', 'west bengal', '', '', 'home');

-- --------------------------------------------------------

--
-- Table structure for table `order_id`
--

CREATE TABLE `order_id` (
  `id` int(10) NOT NULL,
  `order_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_id`
--

INSERT INTO `order_id` (`id`, `order_id`) VALUES
(1, '102');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) NOT NULL,
  `order_id` varchar(200) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `quantity` int(10) NOT NULL,
  `size` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `size`) VALUES
(2, 'ORDER100', 'PRODUCT102', 1, 'None'),
(3, 'ORDER101', 'PRODUCT102', 1, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `brand` varchar(200) DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL,
  `subcategory` varchar(200) DEFAULT NULL,
  `subsubcategory` varchar(200) DEFAULT NULL,
  `price` double NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `discount` double NOT NULL,
  `net_price` double DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `new_item` int(10) DEFAULT NULL,
  `popular_item` int(10) DEFAULT NULL,
  `hit_item` int(10) DEFAULT NULL,
  `sunday_offer` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_id`, `product_name`, `brand`, `category`, `subcategory`, `subsubcategory`, `price`, `quantity`, `description`, `discount`, `net_price`, `size`, `color`, `currency`, `new_item`, `popular_item`, `hit_item`, `sunday_offer`) VALUES
(1, 'PRODUCT101', 'SanDisk SDCZ50-064g-I35 64 GB Pen Drive  (Red, Black)', NULL, NULL, NULL, NULL, 1399, '1', 'dufkssdvduvsdvlbds', 7, 1199, NULL, NULL, NULL, 1, 0, 0, 0),
(2, 'PRODUCT102', 'JBL GO2 Portable Bluetooth Speaker  (Blue, Mono Channel)', NULL, NULL, NULL, NULL, 1499, '1', 'dhvjsdahdaaa', 8, 1399, NULL, NULL, NULL, 1, 0, 0, 0),
(3, 'PRODUCT103', 'Microtek TG8818C Multi Function Infrared Thermometer', NULL, NULL, NULL, NULL, 1599, '1', 'sxhhabxhCBCVHJHSCVSGDGGGGG', 9, 1499, NULL, NULL, NULL, 1, 0, 0, 0),
(4, 'PRODUCT104', 'SanDisk SDCZ50-064g-I35 64 GB Pen Drive  (Red, Black)', NULL, NULL, NULL, NULL, 1399, '1', 'sssssssssssssssssssssss', 7, 1199, NULL, NULL, NULL, 0, 1, 0, 0),
(5, 'PRODUCT105', 'JBL GO2 Portable Bluetooth Speaker  (Blue, Mono Channel)', NULL, NULL, NULL, NULL, 1499, '1', 'hhhhhhhhhhhhhhhhhhhh', 8, 1399, NULL, NULL, NULL, 0, 1, 0, 0),
(6, 'PRODUCT106', 'Microtek TG8818C Multi Function Infrared Thermometer', NULL, NULL, NULL, NULL, 1599, '1', 'hhhhhhhhhhhhhhhhhhhhhhh', 9, 1499, NULL, NULL, NULL, 0, 1, 0, 0),
(7, 'PRODUCT107', 'SanDisk SDCZ50-064g-I35 64 GB Pen Drive  (Red, Black)', NULL, NULL, NULL, NULL, 1399, '1', 'lllllllllllllllllllll', 7, 1199, NULL, NULL, NULL, 0, 0, 1, 0),
(8, 'PRODUCT108', 'JBL GO2 Portable Bluetooth Speaker  (Blue, Mono Channel)', NULL, NULL, NULL, NULL, 1499, '1', 'kkkkkkkkkkkkkkkkkkkkkkk', 8, 1399, NULL, NULL, NULL, 0, 0, 1, 0),
(9, 'PRODUCT109', 'Microtek TG8818C Multi Function Infrared Thermometer', NULL, NULL, NULL, NULL, 1599, '1', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 9, 1499, NULL, NULL, NULL, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_id`
--

CREATE TABLE `product_id` (
  `id` int(11) NOT NULL,
  `product_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_id`
--

INSERT INTO `product_id` (`id`, `product_id`) VALUES
(1, '100');

-- --------------------------------------------------------

--
-- Table structure for table `product_img`
--

CREATE TABLE `product_img` (
  `id` int(10) NOT NULL,
  `product_id` varchar(200) CHARACTER SET latin1 NOT NULL,
  `img` varchar(200) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_img`
--

INSERT INTO `product_img` (`id`, `product_id`, `img`) VALUES
(1, 'PRODUCT101', 'p_pendrive.jpeg'),
(2, 'PRODUCT102', 'p_jbl.jpeg'),
(3, 'PRODUCT103', 'p_temp.jpeg'),
(4, 'PRODUCT104', 'p_pendrive.jpeg'),
(5, 'PRODUCT105', 'p_jbl.jpeg'),
(6, 'PRODUCT106', 'p_temp.jpeg'),
(7, 'PRODUCT107', 'p_pendrive.jpeg'),
(8, 'PRODUCT108', 'p_jbl.jpeg'),
(9, 'PRODUCT109', 'p_temp.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `pincode` varchar(100) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `date_of_creation` date DEFAULT NULL,
  `time_of_creation` time DEFAULT NULL,
  `refered_by` varchar(100) DEFAULT NULL,
  `country` varchar(300) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `name`, `fname`, `lname`, `dob`, `email`, `address`, `city`, `state`, `pincode`, `phone`, `password`, `date_of_creation`, `time_of_creation`, `refered_by`, `country`, `gender`) VALUES
(1, 'USER0', 'Dipankar saha', 'Dipankar', 'saha', NULL, 'dip7501686040@gmail.com', NULL, NULL, NULL, NULL, '7001733750', 'a', '2020-06-12', '12:18:25', NULL, NULL, NULL),
(2, 'USER100', 'Dipankar saha', 'Dipankar', 'saha', NULL, 'admin@gmail.com', NULL, NULL, NULL, NULL, '9474138980', 'b', '2020-06-12', '23:39:42', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_id`
--

CREATE TABLE `user_id` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_id`
--

INSERT INTO `user_id` (`id`, `user_id`) VALUES
(2, 101);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_address`
--
ALTER TABLE `order_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_id`
--
ALTER TABLE `order_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `product_id`
--
ALTER TABLE `product_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_img`
--
ALTER TABLE `product_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_id`
--
ALTER TABLE `user_id`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `delivery_address`
--
ALTER TABLE `delivery_address`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_address`
--
ALTER TABLE `order_address`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_id`
--
ALTER TABLE `order_id`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_id`
--
ALTER TABLE `product_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_img`
--
ALTER TABLE `product_img`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_id`
--
ALTER TABLE `user_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
