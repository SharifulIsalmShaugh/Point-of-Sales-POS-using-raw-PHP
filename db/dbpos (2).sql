-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2017 at 07:02 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpos`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_phone` int(11) NOT NULL,
  `customer_address` text NOT NULL,
  `sessionid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `sessionid`) VALUES
(12, 'Shariful Islam Shaugh', '13303060@iubat.edu', 167715159, ' Narsingdi', 'i8beskmbhpd2idqnhqfadtlo40'),
(13, 'Shariful Islam', 'sisbd24@gmail.com', 1705171300, ' Uttara', 'sv6cemh97dq8ln03sgscepn8u5'),
(14, 'Anayna', 'anayna@gmail.com', 1956470121, ' Uttara', 'sv6cemh97dq8ln03sgscepn8u5'),
(15, 'Moriam Sonia', 'moriam@gmail.com', 1768965438, ' Ajompur', '2adcs54e8n66qrdbosv01mo2h6'),
(16, 'KJ Shakil', 'ksabd24@gmail.com', 1710581042, ' Mirpur-10', 'cr8e3e4adgjcc4rlctnemaa350');

-- --------------------------------------------------------

--
-- Table structure for table `main_category`
--

CREATE TABLE `main_category` (
  `id` int(11) NOT NULL,
  `maincategory_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_category`
--

INSERT INTO `main_category` (`id`, `maincategory_name`) VALUES
(5, 'Food'),
(6, 'Cloths'),
(7, 'Electrical'),
(8, 'Electronic');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `buy_price` float NOT NULL,
  `sale_price` float NOT NULL,
  `discount` int(11) NOT NULL,
  `quantity` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `subcategory_id`, `buy_price`, `sale_price`, `discount`, `quantity`) VALUES
(43, '7UP 1 Litter', 24, 29, 32, 0, 1),
(44, 'Pran 1 Litter', 25, 40, 60, 0, 8),
(45, 'Casual Black', 26, 500, 600, 0, 14),
(46, 'Energy Bulb', 27, 250, 280, 0, 5),
(47, 'Asus Zenphone 5', 28, 12000, 13000, 0, 10),
(48, 'Nokia C1', 28, 8000, 8500, 0, 20),
(49, 'Cannon 5D', 29, 75000, 80000, 0, 3),
(50, 'HP Pevilion5', 31, 45000, 50000, 0, 8),
(51, 'Table Fan ', 32, 800, 1000, 0, 13),
(52, 'Water 1 Litter', 24, 15, 20, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `sessionid` varchar(255) NOT NULL,
  `sellerid` int(11) NOT NULL,
  `sale_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`sale_id`, `product_id`, `product_price`, `product_quantity`, `sessionid`, `sellerid`, `sale_date`) VALUES
(88, 49, 80000, 2, 'mt09s29gj6nbhr9ia39bbfi9p7', 12, '22-08-2017'),
(89, 44, 60, 3, 'mt09s29gj6nbhr9ia39bbfi9p7', 12, '22-08-2017'),
(90, 44, 60, 3, 'dthitr4j827ap0d42vrdre5la5', 12, '22-08-2017'),
(91, 43, 32, 2, 'dthitr4j827ap0d42vrdre5la5', 12, '22-08-2017'),
(92, 45, 600, 2, 'ptvee6icchbf8t4a6q254fhk33', 12, '22-08-2017'),
(93, 46, 280, 3, 'ptvee6icchbf8t4a6q254fhk33', 12, '22-08-2017'),
(96, 43, 32, 1, 'k103aac8nov920qs8pjardlj17', 12, '22-08-2017'),
(97, 43, 32, 2, '3tbflr7tkubdjmc6io15t3n8s3', 12, '22-08-2017'),
(98, 43, 32, 1, '0g38d43o4a3nlqg19nkfgrg286', 12, '22-08-2017'),
(99, 0, 0, 0, '3o5ttf9hmdqe5gq5hocrit83n5', 12, '22-08-2017'),
(102, 43, 32, 1, '3o5ttf9hmdqe5gq5hocrit83n5', 12, '22-08-2017'),
(103, 44, 60, 1, '3o5ttf9hmdqe5gq5hocrit83n5', 12, '22-08-2017'),
(104, 0, 0, 0, 'mu3ijtp6sm8c9v7pq3thnv7294', 12, '22-08-2017'),
(105, 43, 32, 1, '4dep1b2k7cp3b7ibr84diifik4', 15, '23-08-2017'),
(106, 51, 1000, 2, '4dep1b2k7cp3b7ibr84diifik4', 15, '23-08-2017'),
(108, 43, 32, 3, 'klcni44gtling2ci6hcr9d9mj2', 15, '23-08-2017'),
(109, 44, 60, 2, 'klcni44gtling2ci6hcr9d9mj2', 15, '23-08-2017');

-- --------------------------------------------------------

--
-- Table structure for table `sale_product`
--

CREATE TABLE `sale_product` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `voucher_number` varchar(255) NOT NULL,
  `sale_date` varchar(20) NOT NULL,
  `total_amount` float NOT NULL,
  `sellerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_product`
--

INSERT INTO `sale_product` (`id`, `customer_id`, `voucher_number`, `sale_date`, `total_amount`, `sellerid`) VALUES
(201, 16, 'mt09s29gj6nbhr9ia39bbfi9p7', '22-08-2017', 160180, 12),
(202, 15, 'dthitr4j827ap0d42vrdre5la5', '22-08-2017', 244, 12),
(203, 14, 'ptvee6icchbf8t4a6q254fhk33', '22-08-2017', 2040, 12),
(204, 13, '3o5ttf9hmdqe5gq5hocrit83n5', '22-08-2017', 92, 12),
(205, 16, '4dep1b2k7cp3b7ibr84diifik4', '23-08-2017', 2032, 15),
(206, 12, 'klcni44gtling2ci6hcr9d9mj2', '23-08-2017', 216, 15);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `category_id` varchar(50) NOT NULL,
  `subcategory_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `subcategory_name`) VALUES
(24, '5', 'Drinks'),
(25, '5', 'Milk'),
(26, '6', 'Shoe'),
(27, '7', 'Light'),
(28, '8', 'Mobile'),
(29, '8', 'Camara'),
(31, '8', 'Laptop'),
(32, '7', 'Fan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `profile_image` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `education` varchar(20) NOT NULL,
  `result` varchar(10) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `nid` int(11) NOT NULL,
  `address` text NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `profile_image`, `sex`, `phone`, `email`, `password`, `education`, `result`, `dob`, `nid`, `address`, `type`) VALUES
(12, 'KJ Shakil', 'profile/12919765_1263944140411985_8532246616958821317_n.jpg', 'Male', 1610581042, 'ksabd24@gmail.com', '123', 'Bsc', '4', '01/01/1995', 1234326, '                                                                                                                                Uttara                                                                                                                              ', 0),
(14, 'Shariful Islam Shugh', 'profile/profile.jpg', 'male', 1705171300, 'sisbd24@gmail.com', '123', 'Bsc', '3.04', '01/03/1995', 1234567890, 'Uttara', 1),
(15, 'Sonia Akter', 'profile/16864154_1842086299374091_9199586677556990612_n.jpg', 'Female', 1921474836, 'sonia@gmail.com', '123', 'Bsc', '3.80', '07/10/1996', 2147483647, '                                Uttara                               ', 0),
(16, 'Kamrul Hassan', 'profile/11096615_595325787271294_3631069399686987425_n.jpg', 'Male', 157968901, 'kamrul@gmail.com', '123', 'Hsc', '4.00', '08/14/1996', 80979605, 'Uttara', 0),
(17, 'Ashik', 'profile/11096615_595325787271294_3631069399686987425_n.jpg', 'Male', 2147483647, 'gga@gmail.com', '123', 'Hsa', '4.00', '08/06/2003', 78979298, 'Uttara', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `main_category`
--
ALTER TABLE `main_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `sale_product`
--
ALTER TABLE `sale_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nid` (`nid`),
  ADD UNIQUE KEY `nid_2` (`nid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `main_category`
--
ALTER TABLE `main_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `sale_product`
--
ALTER TABLE `sale_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
