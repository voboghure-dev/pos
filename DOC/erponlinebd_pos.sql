-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2011 at 01:39 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `erponlinebd_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `code` varchar(50) NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `company_id`, `user_id`, `parent_id`, `name`, `code`, `edate`) VALUES
(1, 17, 15, 0, 'Soap', '1001', '2011-05-25'),
(2, 17, 15, 0, 'Oil', '1002', '2011-05-25'),
(3, 17, 15, 0, 'evan', '1234560', '2011-06-01'),
(4, 17, 15, 0, 'check', '12321', '2011-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` text NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=18 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company`, `edate`) VALUES
(1, 'InnovativeBD', '2010-04-15'),
(17, 'Fusion', '2010-05-02'),
(16, 'Fusion', '2010-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `notes` text NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `company_id`, `user_id`, `title`, `first_name`, `last_name`, `address1`, `address2`, `city`, `zip`, `country`, `phone`, `email`, `notes`, `edate`) VALUES
(1, 17, 15, 'Mr.', 'Moinuddin', 'Didar', '705', 'Sohidbagh', 'Dhaka', '1217', 'Bangladesh', '01677336699', 'didar@innovativebd.biz', 'This is a test edited', '2011-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `purchase_price` double NOT NULL,
  `sale_price` double NOT NULL,
  `re_order` int(11) NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=9 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `company_id`, `user_id`, `category_id`, `code`, `name`, `description`, `purchase_price`, `sale_price`, `re_order`, `edate`) VALUES
(1, 17, 15, 1, '111', 'Lux', 'Lux 100gm Soap', 10, 12, 10, '2011-05-26'),
(2, 17, 15, 2, '110', 'Rup Chada 1 Lt.', 'Soyabin Oil 1Lt.', 100, 108, 15, '2011-05-29'),
(3, 17, 15, 3, '654321', 'special cigarate', 'ldkjfakldsj', 10, 12, 50, '2011-06-01'),
(4, 17, 15, 1, '543', 'just a check', 'hi this is check', 34, 54, 50, '2011-06-08'),
(5, 17, 15, 1, '9789', 'another check', 'dasklfjal', 34, 54, 30, '2011-06-08'),
(6, 17, 15, 1, '9789', 'another check', 'dasklfjal', 34, 54, 30, '2011-06-08'),
(7, 17, 15, 1, '987', 'right now', 'hadsfklj', 54, 45, 333, '2011-06-08'),
(8, 17, 15, 2, '4531', 'adsfa', 'dsafadsf', 98, 67, 43, '2011-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `receive_items`
--

CREATE TABLE IF NOT EXISTS `receive_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_code` varchar(50) NOT NULL,
  `quantity` double NOT NULL,
  `unit_price` double NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `receive_items`
--

INSERT INTO `receive_items` (`id`, `company_id`, `user_id`, `supplier_id`, `category_id`, `item_id`, `item_code`, `quantity`, `unit_price`, `edate`) VALUES
(1, 17, 15, 1, 1, 1, '111', 100, 10, '2011-06-04'),
(2, 17, 15, 2, 1, 2, '110', 200, 100, '2011-06-04'),
(3, 17, 15, 2, 1, 3, '654321', 300, 10, '2011-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `return_details`
--

CREATE TABLE IF NOT EXISTS `return_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `unit_price` double NOT NULL,
  `total_price` double NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `return_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `return_master`
--

CREATE TABLE IF NOT EXISTS `return_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `return_master`
--


-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE IF NOT EXISTS `sales_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_code` varchar(50) NOT NULL,
  `quantity` double NOT NULL,
  `unit_price` double NOT NULL,
  `total_price` double NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`id`, `company_id`, `user_id`, `sales_id`, `item_id`, `item_code`, `quantity`, `unit_price`, `total_price`, `edate`) VALUES
(1, 17, 15, 1, 2, '110', 20, 108, 2160, '2011-06-04'),
(2, 17, 15, 1, 3, '654321', 50, 12, 600, '2011-06-04'),
(3, 17, 15, 1, 1, '111', 40, 12, 480, '2011-06-05'),
(4, 17, 15, 2, 1, '111', 100, 12, 1200, '2011-06-08'),
(5, 17, 15, 3, 1, '111', 50, 12, 600, '2011-06-08'),
(6, 17, 15, 4, 2, '110', 100, 108, 10800, '2011-06-08'),
(7, 17, 15, 5, 1, '111', 50, 12, 600, '2011-06-08'),
(8, 17, 15, 6, 1, '111', 100, 12, 1200, '2011-06-08'),
(9, 17, 15, 6, 7, '987', 54, 45, 2430, '2011-06-08'),
(10, 17, 15, 7, 4, '543', 100, 54, 5400, '2011-06-11'),
(11, 17, 15, 8, 3, '654321', 65, 12, 780, '2011-06-16'),
(12, 17, 15, 8, 6, '9789', 2, 54, 108, '2011-06-16'),
(13, 17, 15, 9, 1, '111', 32, 12, 384, '2011-06-16'),
(15, 17, 15, 11, 6, '9789', 34, 54, 1836, '2011-06-17'),
(16, 17, 15, 12, 1, '111', 55, 12, 660, '2011-06-17'),
(17, 17, 15, 13, 1, '111', 15, 12, 180, '2011-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `sales_master`
--

CREATE TABLE IF NOT EXISTS `sales_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `sales_master`
--

INSERT INTO `sales_master` (`id`, `company_id`, `user_id`, `customer_id`, `edate`) VALUES
(1, 17, 15, 1, '2011-06-04'),
(2, 17, 15, 0, '2011-06-08'),
(3, 17, 15, 0, '2011-06-08'),
(4, 17, 15, 0, '2011-06-08'),
(5, 17, 15, 0, '2011-06-08'),
(6, 17, 15, 0, '2011-06-08'),
(7, 17, 15, 0, '2011-06-11'),
(8, 17, 15, 1, '2011-06-16'),
(9, 17, 15, 0, '2011-06-16'),
(10, 17, 15, 0, '2011-06-16'),
(11, 17, 15, 1, '2011-06-17'),
(12, 17, 15, 0, '2011-06-17'),
(13, 17, 15, 1, '2011-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `company_id`, `user_id`, `first_name`, `last_name`, `email`, `edate`) VALUES
(1, 17, 15, 'Tapan', 'Kumer Das', 'tapan29bd@gmail.com', '2011-05-25'),
(2, 17, 15, 'evan', 'ahamad', 'evan_ahamad@hotmail.com', '2011-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `type` varchar(8) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `code` varchar(32) NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `company_id`, `user_id`, `email`, `password`, `full_name`, `type`, `status`, `code`, `edate`) VALUES
(22, 17, 15, 'demo@erponlinebd.com', 'cbdbe4936ce8be63', 'Demo', 'admin', 'active', '', '2011-09-20'),
(15, 17, 15, 'tapan29bd@gmail.com', 'd033e22ae348aeb5', 'Tapan', 'admin', 'active', '', '2010-05-03'),
(21, 17, 15, 'moinuddindider@gmail.com', 'd033e22ae348aeb5', 'Moinuddin Dider', 'admin', 'active', '', '2011-06-17');
