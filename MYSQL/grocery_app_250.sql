-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 12:40 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery_app_250`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Spent` double NOT NULL,
  `Budget` double NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `Name`, `Spent`, `Budget`, `userID`) VALUES
(12, 'Diary', 42, 100, 1),
(13, 'Groceries', 31, 20, 1),
(14, 'Porage', 2.1, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `categoryID` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `receiptID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `userID`, `Name`, `categoryID`, `price`, `receiptID`) VALUES
(1, 1, 'name', 12, 17, 5),
(36, 1, 'Milk', 12, 12, 6),
(43, 1, 'Cheese', 12, 12, 8),
(44, 1, 'Cheese', 12, 12, 8),
(47, 1, 'Mayo', 12, 17, 5),
(50, 1, 'Mayo', 12, 1, 5),
(53, 1, 'Milk', 12, 1, 5),
(54, 1, 'Milk', 12, 1, 5),
(55, 1, 'Milk', 12, 1, 22),
(56, 1, 'Milk', 12, 1, 23),
(57, 1, 'name', 12, 1, 26),
(58, 1, 'name', 12, 1, 26),
(59, 1, 'name', 12, 1, 27),
(60, 1, 'name', 12, 1, 27),
(61, 1, 'sad', 14, 12, 33),
(62, 1, 'Milk', 14, 5, 34),
(63, 1, 'Milk', 14, 5, 34);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `ID` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `img_dir` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL,
  `shopID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`ID`, `shop_name`, `price`, `date`, `img_dir`, `userID`, `shopID`) VALUES
(4, 'Tesco', 12, '2021-05-22', '', 1, 1),
(5, 'Spar', 321, '2021-05-25', '', 1, 1),
(6, 'Tesco', 0, '2021-05-18', '', 1, 1),
(7, 'SuperValue', 0, '2021-04-28', '', 1, 1),
(8, 'SuperValue', 0, '2021-04-28', '', 1, 1),
(18, 'Tesco', 0, '2021-05-19', '', 1, 1),
(19, 'Tesco', 0, '2021-05-08', '', 1, 1),
(20, 'Tesco', 0, '2021-05-08', '', 1, 1),
(21, 'Tesco', 0, '2021-05-08', '', 1, 1),
(22, 'Tesco', 0, '2021-05-08', '', 1, 1),
(23, 'asdasd', 0, '2021-05-19', '', 1, 1),
(24, 'Tesco', 0, '2021-05-13', '', 1, 1),
(25, 'Tesco', 0, '2021-05-13', '', 1, 1),
(26, 'Tesco', 0, '2021-05-13', '', 1, 1),
(27, 'Tesco', 0, '2021-05-13', '', 1, 1),
(28, 'Tesco', 0, '2021-05-28', '', 1, 0),
(29, 'Tesco', 0, '2021-05-28', '', 1, 0),
(30, 'Tesco', 0, '2021-05-28', '', 1, 0),
(31, 'Tesco', 0, '2021-05-28', '', 1, 0),
(32, 'Tesco', 0, '2021-05-28', '', 1, 0),
(33, 'Tesco', 0, '2021-05-28', '', 1, 0),
(34, '', 0, '2021-05-28', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`ID`, `Name`, `Address`) VALUES
(1, 'Tesco', 'Carlow');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `name`, `address`, `disabled`) VALUES
(1, 'robert', 'binkowski', 'Robert', 'Home Address', 0),
(2, 'chris', 'staff', 'Christopher', 'Far Away', 0),
(3, 'user', 'user', 'user', 'Newbridge', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `categoryID_2` (`categoryID`),
  ADD KEY `receiptID` (`receiptID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `productID` (`userID`),
  ADD KEY `shopID` (`shopID`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`ID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`receiptID`) REFERENCES `receipt` (`ID`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `shop`
--
ALTER TABLE `shop`
  ADD CONSTRAINT `shop_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `receipt` (`shopID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
