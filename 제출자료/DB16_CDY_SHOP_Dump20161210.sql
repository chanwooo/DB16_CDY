CREATE DATABASE  IF NOT EXISTS `shop` ;
USE `shop`;

--
-- Table structure for table `cart`
--
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `member_id` int(10) NOT NULL,
  `itemsize_id` int(10) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  KEY `itemsize_id` (`itemsize_id`),
  KEY `cart_ibfk_1` (`member_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`),
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`itemsize_id`) REFERENCES `size` (`itemsize_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `item`
--
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(15) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `totalSale_rate` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;


--
-- Table structure for table `member`
--
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `member_id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `member_name` varchar(15) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phoneNo` varchar(20) DEFAULT NULL,
  `mileage` int(11) DEFAULT '0',
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;


--
-- Table structure for table `orderlist`
--
DROP TABLE IF EXISTS `orderlist`;
CREATE TABLE `orderlist` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `itemsize_id` int(11) DEFAULT NULL,
  `member_id` int(10) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `order_date` varchar(10) DEFAULT NULL,
  `how_to_pay` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phoneno` varchar(20) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  `memo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `member_id` (`member_id`),
  KEY `itemsize_id` (`itemsize_id`),
  CONSTRAINT `orderlist_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`),
  CONSTRAINT `orderlist_ibfk_2` FOREIGN KEY (`itemsize_id`) REFERENCES `size` (`itemsize_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;


--
-- Table structure for table `size`
--
DROP TABLE IF EXISTS `size`;
CREATE TABLE `size` (
  `itemsize_id` int(10) NOT NULL AUTO_INCREMENT,
  `item_id` int(10) DEFAULT NULL,
  `item_size` varchar(10) DEFAULT NULL,
  `item_stock` int(15) DEFAULT NULL,
  PRIMARY KEY (`itemsize_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `size_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;


--
-- Table structure for table `vendor`
--
DROP TABLE IF EXISTS `vendor`;
CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `phone` varchar(20) DEFAULT NULL,
  `vendor_name` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `vendor_item`
--
DROP TABLE IF EXISTS `vendor_item`;
CREATE TABLE `vendor_item` (
  `vendor_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`vendoritem_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `vendor_item_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
  CONSTRAINT `vendor_item_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

