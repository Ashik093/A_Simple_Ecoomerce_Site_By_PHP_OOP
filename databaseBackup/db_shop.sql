-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2020 at 11:07 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPassword` varchar(255) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminID`, `adminName`, `adminUser`, `adminEmail`, `adminPassword`, `level`) VALUES
(1, 'Md Ashikur Rahman', 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandID` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandID`, `brandName`) VALUES
(1, 'IPHONE'),
(2, 'SAMSUNG'),
(3, 'ACER'),
(4, 'CANON');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartID` int(11) NOT NULL,
  `sID` varchar(255) NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartID`, `sID`, `productID`, `productName`, `price`, `quantity`, `image`) VALUES
(36, 'u5ntriqq1r1tstu46n7lqhm9pc', 8, 'This Lorem Ipsum is simply', 250.22, 1, 'uploads/c4e5b6627f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catID` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catID`, `catName`) VALUES
(1, 'Laptop'),
(2, 'Computer'),
(3, 'Mobile Phones'),
(4, 'Accessories'),
(5, 'Software'),
(6, 'Sports &amp; Fitness'),
(7, 'Footwear'),
(8, 'Jewellery'),
(9, 'Clothing'),
(10, 'Home Decor &amp; Kitchen'),
(11, 'Beauty &amp; Healthcare'),
(12, 'Toys, Kids &amp; Babies');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catID` int(11) NOT NULL,
  `brandID` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,3) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productID`, `productName`, `catID`, `brandID`, `body`, `price`, `image`, `type`) VALUES
(4, 'Lorem Ipsum is simply', 12, 4, '<p>Lorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simply</p>', 250.220, 'uploads/b1f09d8d9a.png', 0),
(5, 'Lorem Ipsum is simply', 10, 3, '<p>Lorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simply</p>', 505.220, 'uploads/09b409a6be.png', 0),
(8, 'This Lorem Ipsum is simply', 10, 4, '<p>This Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simplyThis Lorem Ipsum is simply</p>', 250.220, 'uploads/c4e5b6627f.jpg', 0),
(9, 'Lorem Ipsum is simply', 10, 4, '<p>Lorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simply</p>', 545.220, 'uploads/283d4073ff.jpg', 0),
(10, 'Lorem Ipsum is simply', 11, 3, '<p>Lorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simply</p>', 545.220, 'uploads/69899d3025.jpg', 1),
(11, 'Lorem Ipsum is simply', 11, 2, '<p>Lorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simply</p>', 250.220, 'uploads/3b43d6a4b8.png', 1),
(12, 'Lorem Ipsum is simply', 12, 4, '<p>Lorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simply</p>', 250.220, 'uploads/b6852515be.png', 1),
(13, 'Lorem Ipsum is simply', 2, 2, '<p>Lorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simply</p>', 505.220, 'uploads/e67d092fc6.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userID`, `name`, `city`, `zip`, `email`, `address`, `country`, `phone`, `password`) VALUES
(3, 'Md Ashikur Rahman', 'Dhaka', '1620', 'mdashikurrahman18@gmail.com', 'Narsingdi, Dhaka', 'Bangladesh', '01786598619', '25f9e794323b453885f5181f1b624d0b'),
(4, 'Mr. Karim', 'Khulna', '1000', 'karim@gmail.com', 'Khulna', 'Bangladesh', '017XXXXXXXXXX', '6ebe76c9fb411be97b3b0d48b791a7c9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandID`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
