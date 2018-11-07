-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2017 at 05:24 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_app_online_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `email`, `password`) VALUES
(1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `date`) VALUES
(1, '2017-09-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `list_table`
--

CREATE TABLE `list_table` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price_curr` varchar(10) NOT NULL,
  `price` int(20) NOT NULL,
  `description` text NOT NULL,
  `sub_type` varchar(20) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_table`
--

INSERT INTO `list_table` (`id`, `name`, `price_curr`, `price`, `description`, `sub_type`, `image`) VALUES
(1, 'Mobile A5', '$', 8007001, 'Best Mobile.', 'Mobile', 'assets/img/dummyimg.png'),
(2, 'Mobile A6', '$', 9000000, 'Best Mobile.', 'Mobile', 'assets/img/dummyimg.png'),
(3, 'Mobile A7', '$', 10000000, 'Best Mobile.', 'Mobile', 'assets/img/dummyimg.png'),
(4, 'Mobile S4', '$', 8000000, 'Best Mobile.', 'Mobile', 'assets/img/dummyimg.png'),
(5, 'Mobile S5', '$', 9000000, 'Best Mobile.', 'Mobile', 'assets/img/dummyimg.png'),
(6, 'Mobile S6', '$', 10000000, 'Best Mobile.', 'Mobile', 'assets/img/dummyimg.png'),
(7, 'Mobile S7', '$', 11000000, 'Best Mobile.', 'Mobile', 'assets/img/dummyimg.png'),
(8, 'Computer A1', '$', 5000000, 'Best computer.', 'Computers', 'assets/img/dummyimg.png'),
(9, 'Computer A2', '$', 5000000, 'Best computer.', 'Computers', 'assets/img/dummyimg.png'),
(10, 'Computer A3', '$', 5000000, 'Best computer.', 'Computers', 'assets/img/dummyimg.png'),
(11, 'Computer A4', '$', 5000000, 'Best computer.', 'Computers', 'assets/img/dummyimg.png'),
(12, 'Computer A5', '$', 5000000, 'Best computer.', 'Computers', 'assets/img/dummyimg.png'),
(13, 'Computer A6', '$', 5000000, 'Best computer.', 'Computers', 'assets/img/dummyimg.png'),
(14, 'USB', '$', 5000000, 'Best USB.', 'Accesories', 'assets/img/dummyimg.png'),
(15, 'Keyboard', '$', 5000000, 'Best Keyboard.', 'Accesories', 'assets/img/dummyimg.png'),
(16, 'Mouse', '$', 5000000, 'Best Mouse.', 'Accesories', 'assets/img/dummyimg.png'),
(17, 'Speaker', '$', 5000000, 'Best Modem.', 'Accesories', 'assets/img/dummyimg.png'),
(18, 'T-Shirt', '$', 5000000, 'Best Shirt.', 'Men\'s Clothing', 'assets/img/dummyimg.png'),
(19, 'Jacket', '$', 5000000, 'Best Shirt.', 'Men\'s Clothing', 'assets/img/dummyimg.png'),
(20, 'Hat', '$', 5000000, 'Best Shirt.', 'Men\'s Clothing', 'assets/img/dummyimg.png'),
(21, 'T-Shirt', '$', 5000001, 'Best Shirt.', 'Women\'s Clothing', 'assets/img/dummyimg.png'),
(22, 'Jacket', '$', 5000000, 'Best Shirt.', 'Women\'s Clothing', 'assets/img/dummyimg.png'),
(23, 'Hat', '$', 5000000, 'Best Shirt.', 'Women\'s Clothing', 'assets/img/dummyimg.png');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `chart` text NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`id`, `user_id`, `chart`, `order_date`) VALUES
(6, 1, ' \n  [\n    {\n      \"product_id\":1,\n      \"total\":10\n    },\n    {\n      \"product_id\":2,\n      \"total\":10\n    }\n  ]\n', '2017-06-24 09:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `product_type_table`
--

CREATE TABLE `product_type_table` (
  `id` int(11) NOT NULL,
  `prod_type` varchar(20) NOT NULL,
  `prod_sub_type` varchar(20) NOT NULL,
  `total_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_type_table`
--

INSERT INTO `product_type_table` (`id`, `prod_type`, `prod_sub_type`, `total_item`) VALUES
(1, 'Electronics', 'Mobile', 7),
(2, 'Electronics', 'Computers', 6),
(4, 'Electronics', 'Accesories', 4),
(5, 'Clothing & Wear', 'Men\'s Clothing', 3),
(6, 'Clothing & Wear', 'Women\'s Clothing', 3);

-- --------------------------------------------------------

--
-- Table structure for table `promo_table`
--

CREATE TABLE `promo_table` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `img_url` text NOT NULL,
  `description` text NOT NULL,
  `promo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo_table`
--

INSERT INTO `promo_table` (`id`, `name`, `img_url`, `description`, `promo`) VALUES
(1, 'Samsung Galaxy 1', 'assets/img/dummyimg.png', 'Description 1 here', '30% off here'),
(2, 'Samsung Galaxy 2', 'assets/img/dummyimg.png', 'Description 2 here', '50% off here');

-- --------------------------------------------------------

--
-- Table structure for table `sliding_table`
--

CREATE TABLE `sliding_table` (
  `id` int(11) NOT NULL,
  `image_slider` text NOT NULL,
  `category` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `sliding_table`
--

INSERT INTO `sliding_table` (`id`, `image_slider`, `category`, `name`) VALUES
(1, 'assets/img/dummyimg.png', 'Mobile', 'Mobile A5'),
(2, 'assets/img/dummyimg.png', 'Mobile', 'Mobile A6'),
(3, 'assets/img/dummyimg.png', 'Mobile', 'Mobile A7'),
(4, 'assets/img/dummyimg.png', 'Mobile', 'Mobile S4'),
(5, 'assets/img/dummyimg.png', 'Computers', 'Computer A1'),
(6, 'assets/img/dummyimg.png', 'Computers', 'Computer A2'),
(7, 'assets/img/dummyimg.png', 'Computers', 'Computer A3'),
(8, 'assets/img/dummyimg.png', 'Computers', 'Computer A4'),
(9, 'assets/img/dummyimg.png', 'Accesories', 'USB'),
(10, 'assets/img/dummyimg.png', 'Accesories', 'Keyboard'),
(11, 'assets/img/dummyimg.png', 'Accesories', 'Mouse'),
(12, 'assets/img/dummyimg.png', 'Men\'s Clothing', 'T-Shirt'),
(13, 'assets/img/dummyimg.png', 'Men\'s Clothing', 'Jacket'),
(14, 'assets/img/dummyimg.png', 'Men\'s Clothing', 'Hat');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(72) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(15) NOT NULL,
  `chart` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `email`, `password`, `fullname`, `address`, `city`, `chart`) VALUES
(1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'admin', '[]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_table`
--
ALTER TABLE `list_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_type_table`
--
ALTER TABLE `product_type_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_table`
--
ALTER TABLE `promo_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliding_table`
--
ALTER TABLE `sliding_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `list_table`
--
ALTER TABLE `list_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product_type_table`
--
ALTER TABLE `product_type_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `promo_table`
--
ALTER TABLE `promo_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sliding_table`
--
ALTER TABLE `sliding_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
