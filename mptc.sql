-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2016 at 09:17 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mptc`
--

-- --------------------------------------------------------

--
-- Table structure for table `addstock`
--

CREATE TABLE `addstock` (
  `addStockID` int(11) NOT NULL,
  `addStockDate` date NOT NULL,
  `asname` varchar(10) NOT NULL,
  `uby` varchar(10) NOT NULL,
  `udate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addstock`
--

INSERT INTO `addstock` (`addStockID`, `addStockDate`, `asname`, `uby`, `udate`) VALUES
(2, '2016-07-18', 'Sunny Sir', 'admin', '2016-07-22 04:57:08'),
(3, '2016-07-23', 'Bipul sir', 'admin', '2016-07-22 23:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `addstockitem`
--

CREATE TABLE `addstockitem` (
  `asiid` int(11) NOT NULL,
  `asID` int(11) NOT NULL,
  `asItem` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `uby` varchar(10) NOT NULL,
  `udate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addstockitem`
--

INSERT INTO `addstockitem` (`asiid`, `asID`, `asItem`, `qty`, `uby`, `udate`) VALUES
(2, 2, 4, 499, '', '2016-07-22 04:57:08'),
(3, 3, 1, 60, '', '2016-07-23 11:08:05'),
(4, 3, 2, 50, '', '2016-07-23 11:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bdate` date NOT NULL,
  `billno` varchar(11) NOT NULL,
  `total_items` int(11) NOT NULL,
  `cuid` int(11) NOT NULL,
  `bamt` float NOT NULL,
  `dueamt` float NOT NULL,
  `bstatus` smallint(6) NOT NULL,
  `cby` varchar(10) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uby` varchar(10) NOT NULL,
  `udate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bdate`, `billno`, `total_items`, `cuid`, `bamt`, `dueamt`, `bstatus`, `cby`, `cdate`, `uby`, `udate`) VALUES
('2016-07-01', 'MBBB03-140', 2, 7, 1365, 1365, 0, 'admin', '2016-07-22 11:42:07', '', '0000-00-00 00:00:00'),
('2016-07-01', 'MBBB03-141', 2, 8, 1407, 33, 2, 'admin', '2016-07-26 07:32:19', 'admin', '2016-07-25 19:32:19'),
('2016-07-02', 'MBBB03-142', 1, 9, 1470, 1470, 0, 'admin', '2016-07-22 11:42:08', '', '0000-00-00 00:00:00'),
('2016-07-03', 'MBBB03-143', 1, 10, 2677.5, 2677.5, 0, 'admin', '2016-07-22 11:42:08', '', '0000-00-00 00:00:00'),
('2016-07-03', 'MBBB03-144', 2, 11, 1365, 1365, 0, 'admin', '2016-07-22 11:42:08', '', '0000-00-00 00:00:00'),
('2016-07-04', 'MBBB03-145', 4, 12, 2677.5, 2677.5, 0, 'admin', '2016-07-22 11:42:08', '', '0000-00-00 00:00:00'),
('2016-07-04', 'MBBB03-146', 2, 13, 1732.5, 1732.5, 0, 'admin', '2016-07-26 07:17:41', 'admin', '2016-07-26 06:51:15'),
('2016-07-05', 'MBBB03-147', 1, 14, 2677.5, 2677.5, 0, 'admin', '2016-07-22 11:42:08', '', '0000-00-00 00:00:00'),
('2016-07-06', 'MBBB03-148', 1, 15, 997.5, 997.5, 0, 'admin', '2016-07-22 11:42:08', '', '0000-00-00 00:00:00'),
('2016-07-07', 'MBBB03-149', 1, 17, 1470, 0, 1, 'admin', '2016-08-10 03:38:35', 'admin', '2016-08-10 03:38:35'),
('2016-07-07', 'MBBB03-150', 1, 16, 997.5, 997.5, 0, 'admin', '2016-07-22 11:42:08', '', '0000-00-00 00:00:00'),
('2016-07-08', 'MBBB04-151', 1, 13, 1785, 1785, 0, 'admin', '2016-07-26 07:17:21', 'admin', '2016-07-26 06:51:15'),
('2016-07-08', 'MBBB04-152', 1, 18, 682.5, 682.5, 0, 'admin', '2016-07-22 11:42:08', '', '0000-00-00 00:00:00'),
('2016-07-08', 'MBBB04-153', 2, 19, 1312.5, 0, 1, 'admin', '2016-07-26 07:35:38', 'admin', '2016-07-25 19:35:38'),
('2016-07-08', 'MBBB04-154', 1, 20, 735, 735, 0, 'admin', '2016-07-22 11:42:08', '', '0000-00-00 00:00:00'),
('2016-07-09', 'MBBB04-155', 6, 21, 5670, 5670, 0, 'admin', '2016-07-22 11:42:08', '', '0000-00-00 00:00:00'),
('2016-07-09', 'MBBB04-156', 2, 22, 2625, 2625, 0, 'admin', '2016-07-25 20:43:59', '', '0000-00-00 00:00:00'),
('2016-07-10', 'MBBB04-157', 1, 23, 892.5, 892.5, 0, 'admin', '2016-07-25 20:47:09', '', '0000-00-00 00:00:00'),
('2016-07-10', 'MBBB04-158', 2, 13, 2625, 2625, 0, 'admin', '2016-07-25 20:48:27', '', '0000-00-00 00:00:00'),
('2016-07-10', 'MBBB04-159', 1, 7, 630, 630, 0, 'admin', '2016-07-25 20:49:30', '', '0000-00-00 00:00:00'),
('2016-07-11', 'MBBB04-160', 2, 24, 2205, 2205, 0, 'admin', '2016-07-25 21:08:20', '', '0000-00-00 00:00:00'),
('2016-07-12', 'MBBB04-161', 3, 25, 2919, 2919, 0, 'admin', '2016-07-25 21:11:40', '', '0000-00-00 00:00:00'),
('2016-07-12', 'MBBB04-162', 1, 26, 1785, 1785, 0, 'admin', '2016-07-25 21:19:44', '', '0000-00-00 00:00:00'),
('2016-07-13', 'MBBB04-163', 4, 27, 2719.5, 0, 1, 'admin', '2016-08-17 10:20:41', 'admin', '2016-08-16 22:20:41'),
('2016-07-13', 'MBBB04-164', 1, 28, 840, 840, 0, 'admin', '2016-07-25 21:32:46', '', '0000-00-00 00:00:00'),
('2016-07-14', 'MBBB04-165', 2, 17, 1627.5, 0.5, 2, 'admin', '2016-08-10 03:38:35', 'admin', '2016-08-10 03:38:35'),
('2016-07-15', 'MBBB04-166', 4, 29, 1333.5, 1333.5, 0, 'admin', '2016-07-25 21:37:58', '', '0000-00-00 00:00:00'),
('2016-07-16', 'MBBB04-167', 2, 30, 1071, 1071, 0, 'admin', '2016-07-25 21:40:54', '', '0000-00-00 00:00:00'),
('2016-07-16', 'MBBB04-168', 2, 31, 2415, 2415, 0, 'admin', '2016-07-25 21:43:18', '', '0000-00-00 00:00:00'),
('2016-07-18', 'MBBB04-169', 4, 32, 3202.5, 0, 1, 'admin', '2016-07-26 09:50:38', 'admin', '2016-07-25 21:50:38'),
('2016-07-19', 'MBBB04-170', 5, 33, 3937.5, 3937.5, 0, 'admin', '2016-07-25 22:07:32', '', '0000-00-00 00:00:00'),
('2016-07-20', 'MBBB04-171', 4, 10, 2383.5, 2383.5, 0, 'admin', '2016-07-25 22:09:46', '', '0000-00-00 00:00:00'),
('2016-07-20', 'MBBB04-172', 3, 34, 9100.22, 9100.22, 0, 'admin', '2016-07-25 22:35:30', '', '0000-00-00 00:00:00'),
('2016-07-20', 'MBBB04-173', 1, 18, 1260, 1260, 0, 'admin', '2016-07-25 22:36:17', '', '0000-00-00 00:00:00'),
('2016-07-22', 'MBBB04-174', 2, 7, 2520, 2520, 0, 'admin', '2016-07-25 22:38:02', '', '0000-00-00 00:00:00'),
('2016-07-23', 'MBBB04-175', 2, 14, 2835, 2835, 0, 'admin', '2016-07-25 22:39:07', '', '0000-00-00 00:00:00'),
('2016-07-25', 'MBBB04-176', 2, 8, 1365, 1365, 0, 'admin', '2016-08-07 21:50:24', '', '0000-00-00 00:00:00'),
('2016-07-25', 'MBBB04-177', 2, 27, 2257.5, 2257.5, 0, 'admin', '2016-08-17 10:20:42', 'admin', '2016-08-16 22:20:41'),
('2016-07-28', 'MBBB04-178', 1, 35, 1785, 1785, 0, 'admin', '2016-08-07 22:03:15', '', '0000-00-00 00:00:00'),
('2016-07-29', 'MBBB04-179', 1, 25, 1785, 1785, 0, 'admin', '2016-08-08 10:12:57', '', '0000-00-00 00:00:00'),
('2016-08-04', 'MBBB04-180', 1, 36, 16800, 0, 1, 'admin', '2016-08-08 10:10:38', 'admin', '2016-08-07 22:10:38'),
('2016-08-04', 'MBBB04-181', 2, 33, 1365, 1365, 0, 'admin', '2016-08-12 05:49:35', '', '0000-00-00 00:00:00'),
('2016-08-05', 'MBBB04-182', 1, 37, 1785, 1785, 0, 'admin', '2016-08-11 23:07:26', '', '0000-00-00 00:00:00'),
('2016-08-05', 'MBBB04-183', 2, 22, 1302, 1302, 0, 'admin', '2016-08-11 23:09:21', '', '0000-00-00 00:00:00'),
('2016-08-05', 'MBBB04-184', 1, 38, 840, 840, 0, 'admin', '2016-08-11 23:13:39', '', '0000-00-00 00:00:00'),
('2016-08-05', 'MBBB04-185', 1, 14, 840, 840, 0, 'admin', '2016-08-11 23:17:48', '', '0000-00-00 00:00:00'),
('2016-08-06', 'MBBB04-186', 1, 39, 4462.5, 4462.5, 0, 'admin', '2016-08-12 00:23:40', '', '0000-00-00 00:00:00'),
('2016-08-06', 'MBBB04-187', 1, 34, 1400.7, 1400.7, 0, 'admin', '2016-08-12 00:25:32', '', '0000-00-00 00:00:00'),
('2016-08-08', 'MBBB04-188', 1, 29, 892.5, 892.5, 0, 'admin', '2016-08-12 00:27:31', '', '0000-00-00 00:00:00'),
('2016-08-08', 'MBBB04-189', 1, 26, 630, 630, 0, 'admin', '2016-08-12 00:29:00', '', '0000-00-00 00:00:00'),
('2016-08-09', 'MBBB04-190', 3, 40, 2520, 2520, 0, 'admin', '2016-08-12 00:34:41', '', '0000-00-00 00:00:00'),
('2016-08-10', 'MBBB04-191', 2, 23, 1365, 1365, 0, 'admin', '2016-08-12 00:36:26', '', '0000-00-00 00:00:00'),
('2016-08-11', 'MBBB04-192', 2, 40, 2415, 2415, 0, 'admin', '2016-08-16 22:02:51', '', '0000-00-00 00:00:00'),
('2016-08-12', 'MBBB04-193', 1, 18, 1785, 1785, 0, 'admin', '2016-08-16 22:03:42', '', '0000-00-00 00:00:00'),
('2016-08-13', 'MBBB04-194', 1, 8, 997.5, 997.5, 0, 'admin', '2016-08-16 22:04:51', '', '0000-00-00 00:00:00'),
('2016-08-13', 'MBBB04-195', 1, 41, 399, 399, 0, 'admin', '2016-08-16 22:07:34', '', '0000-00-00 00:00:00'),
('2016-08-13', 'MBBB04-196', 1, 42, 399, 399, 0, 'admin', '2016-08-16 22:11:52', '', '0000-00-00 00:00:00'),
('2016-08-13', 'MBBB04-197', 1, 33, 1140.3, 1140.3, 0, 'admin', '2016-08-16 22:14:01', '', '0000-00-00 00:00:00'),
('2016-08-13', 'MBBB04-198', 1, 7, 399, 399, 0, 'admin', '2016-08-16 22:15:25', '', '0000-00-00 00:00:00'),
('2016-08-16', 'MBBB04-199', 1, 27, 1197, 1197, 0, 'admin', '2016-08-17 10:20:42', 'admin', '2016-08-16 22:20:41'),
('2016-08-16', 'MBBB04-200', 1, 28, 1197, 1197, 0, 'admin', '2016-08-16 22:17:33', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `cdes` text NOT NULL,
  `cby` varchar(50) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uby` varchar(50) NOT NULL,
  `udate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `cdes`, `cby`, `cdate`, `uby`, `udate`) VALUES
(1, 'NONE', '', 'admin', '2016-07-11 23:22:09', '', '2016-07-12 11:23:34'),
(2, 'Power Bank', '', 'admin', '2016-07-11 23:20:11', '', '2016-07-12 11:23:59'),
(3, 'Data Cable', '', 'admin', '2016-07-11 23:20:19', '', '2016-07-12 11:23:59'),
(4, 'Car Charger', '', 'admin', '2016-07-11 23:20:29', '', '2016-07-12 11:23:59'),
(5, 'Wall Mount', '', 'admin', '2016-07-11 23:20:47', '', '2016-07-12 11:23:59'),
(6, 'Phone Cover', '', 'admin', '2016-07-12 20:24:12', '', '0000-00-00 00:00:00'),
(7, 'Tempered Glass', '', 'admin', '2016-07-12 21:48:05', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE `chart` (
  `id` int(11) NOT NULL,
  `month` varchar(50) NOT NULL,
  `tsale` float NOT NULL,
  `tdue` int(11) NOT NULL,
  `treceived` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chart`
--

INSERT INTO `chart` (`id`, `month`, `tsale`, `tdue`, `treceived`) VALUES
(1, 'January', 0, 0, 0),
(2, 'February', 0, 0, 0),
(3, 'March', 0, 0, 0),
(4, 'April', 0, 0, 0),
(5, 'May', 0, 0, 0),
(6, 'June', 0, 0, 0),
(7, 'July', 85141.2, 83360, 8606),
(8, 'August', 44131.5, 27333, 19897),
(9, 'September', 0, 0, 0),
(10, 'October', 0, 0, 0),
(11, 'November', 0, 0, 0),
(12, 'December', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(1, 'RED'),
(2, 'WHITE'),
(3, 'GOLDEN'),
(4, 'ROSE GOLD'),
(5, 'BLACK'),
(6, 'BLUE'),
(7, 'PINK'),
(8, 'SILVER'),
(9, 'NONE');

-- --------------------------------------------------------

--
-- Table structure for table `current_stock`
--

CREATE TABLE `current_stock` (
  `stockID` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `uby` varchar(10) NOT NULL,
  `udate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `current_stock`
--

INSERT INTO `current_stock` (`stockID`, `pid`, `qty`, `uby`, `udate`) VALUES
(1, 1, 77, '', '2016-07-23 11:08:05'),
(2, 2, 97, '', '2016-07-23 11:08:06'),
(3, 3, 339, '', '2016-07-22 04:54:26'),
(4, 4, 527, '', '2016-07-22 04:57:08'),
(5, 6, 24, '', '2016-07-22 04:54:26'),
(6, 5, 5, '', '2016-07-22 04:54:26'),
(7, 8, 45, '', '2016-07-22 04:55:12'),
(8, 11, 13, '', '2016-07-13 10:23:39'),
(9, 12, 6, '', '2016-07-13 10:23:39'),
(10, 13, 5, '', '2016-07-13 10:23:39'),
(11, 14, 6, '', '2016-07-13 10:23:39'),
(12, 9, 10, '', '2016-07-22 04:54:26'),
(13, 10, 56, '', '2016-07-22 04:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cuid` int(11) NOT NULL,
  `cuname` varchar(50) NOT NULL,
  `cutin` bigint(11) NOT NULL,
  `cucontact` bigint(11) NOT NULL,
  `acucontact` bigint(11) NOT NULL,
  `cuemail` varchar(50) NOT NULL,
  `cuaddress` text NOT NULL,
  `credit` float NOT NULL,
  `cby` varchar(50) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uby` varchar(50) NOT NULL,
  `udate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cuid`, `cuname`, `cutin`, `cucontact`, `acucontact`, `cuemail`, `cuaddress`, `credit`, `cby`, `cdate`, `uby`, `udate`) VALUES
(7, 'Mobile Accesseries Zone', 0, 9873658496, 0, '', 'G-17, Vikas Surya Shopping Complex, Manglam Palace, M2k, sec- 3, Rohini, Delhi-110085', 4914, 'admin', '2016-08-17 10:15:25', 'admin', '2016-08-16 22:15:25'),
(8, 'Ganpati Enterprises', 7947110632, 9990888250, 0, 'ganpatie94@gmail.com', 'G-54, Mangalam palace, Aggarwal city plaza, sec- 3, Rohini, Delhi- 110085', 2395.5, 'admin', '2016-08-17 10:04:51', 'admin', '2016-08-16 22:04:51'),
(9, 'Phone Zone', 7260412191, 45668685, 0, 'support@phonezone.com', 'krishna plaza- 2, shop no. G3, Plot no. 3, sector- 12, Dwarka, New Delhi- 110075', 1470, 'admin', '2016-07-13 06:30:53', '', '0000-00-00 00:00:00'),
(10, 'The Phone Store Plus', 0, 9899092299, 0, '', 'G-3/2, Bhannot Trade Centre, Block- A2, CC, Near Jwala Heri Market, Paschim Vihar, Delhi- 110063', 5061, 'admin', '2016-07-26 10:09:47', 'admin', '2016-07-25 22:09:46'),
(11, 'The Mobile Zone (Paschim vihar)', 7726949900, 9910915777, 47020097, '', 'G-20, Ansal Utility Commercial complex, Opp. Jwala heri Market, Paschim Vihar, Delhi - 110063', 1365, 'admin', '2016-08-10 06:22:37', 'admin', '2016-08-10 06:22:37'),
(12, 'The Mobile Hub', 0, 0, 0, '', 'S-1, Smart Complex, DC chowk, sec-9, Rohini, Delhi- 110085', 2677.5, 'admin', '2016-07-13 06:30:53', '', '0000-00-00 00:00:00'),
(13, 'Plaza Telecom', 0, 9278127456, 0, '', 'Shop No. 1, B-1, Raj Park, Babbar Market, Near Bank of Baroda, Shani Bazar Chowk, Sultan Puri Road, Nangloi, Delhi 110086', 6142.5, 'admin', '2016-07-26 08:48:27', 'admin', '2016-07-25 20:48:27'),
(14, 'Time Lifestyle Pvt. Ltd. (Green Park)', 7510219945, 0, 0, '', 'S-8, Green Park, Main Market, Delhi- 110016', 6352.5, 'admin', '2016-08-12 11:17:48', 'admin', '2016-08-11 23:17:48'),
(15, 'Garg Electronics', 0, 0, 0, '', '8/4, yousuf sarai, Mandir Lane, Delhi- 110016', 997.5, 'admin', '2016-07-13 06:30:53', '', '0000-00-00 00:00:00'),
(16, 'Accute Accessories', 0, 0, 0, '', 'G-14, Vikas surya plaza mall, M2k, sec-3, Rohini, Delhi- 110085', 997.5, 'admin', '2016-07-13 06:30:53', 'admin', '2016-07-13 06:23:15'),
(17, 'The Phone Store', 7180458116, 0, 0, '', 'Plot no. 16, Sec- 9, DC Chowk, Rohini, Delhi-85', 0.5, 'admin', '2016-08-10 03:38:35', 'admin', '2016-08-10 03:38:35'),
(18, 'Choudhary Telecom', 0, 9250267272, 0, '', 'B-1, Raj Park, Babbar Market, Near Bank of Baroda, Sultan Puri, Delhi 110086', 7227.5, 'admin', '2016-08-17 10:03:43', 'admin', '2016-08-16 22:03:42'),
(19, 'AA Enterprises', 0, 0, 0, '', 'G-50, Vikas Surya Shopping Complex, Rohini Sec-3\r\nDelhi 110085', 0, 'admin', '2016-07-26 12:12:50', 'admin', '2016-07-26 00:03:56'),
(20, 'Arihant Telecom', 0, 0, 0, '', 'E-2/4, Sector-16, Rohini, Delhi 110089', 735, 'admin', '2016-07-22 05:57:51', 'admin', '2016-07-22 05:57:50'),
(21, 'Mobile Repairs Zone', 0, 0, 0, '', 'Shop No- 5, Vardhman Prachi Plaza, Sec-8, Rohini, Delhi 110085', 5670, 'admin', '2016-07-22 06:14:10', 'admin', '2016-07-22 06:14:10'),
(22, 'B.V.R Communication', 0, 0, 0, '', 'WZ-189, Main road, Opp. Pilar no. 55, Palam Colony, New Delhi- 110045', 3927, 'admin', '2016-08-12 11:09:21', 'admin', '2016-08-11 23:09:21'),
(23, 'Friends Communication', 0, 0, 0, '', 'Shop no. 3, G3 Vikas Plaza Complex, Sec- 8, New Delhi-110085', 2257.5, 'admin', '2016-08-12 12:36:26', 'admin', '2016-08-12 00:36:26'),
(24, 'Teerat telecom', 7550469019, 9873987355, 0, '', 'Shop No. 97, Block- B, Pocket- II, sec- 17, Rohini, Delhi - 110089', 2205, 'admin', '2016-07-26 09:08:20', 'admin', '2016-07-25 21:08:20'),
(25, 'R.R Communication', 0, 0, 0, '', 'Shop No. 49/56, Vikas Surya Mall, Mangalam Palace, Sec- 3, Rohini, Delhi', 4704, 'admin', '2016-08-08 10:06:13', 'admin', '2016-08-07 22:06:12'),
(26, 'Mobiles and You', 0, 0, 0, '', 'Pearl Best Heights, I G-9, N.S.P, New Delhi', 2415, 'admin', '2016-08-12 12:29:01', 'admin', '2016-08-12 00:29:00'),
(27, 'The Mobile Zone (Vashisht Park)', 7316993533, 9999900775, 0, 'themobilezone@hotmail.com', 'WZ-61A/3B, Vashisht Park, Sagar Pur Road, Delhi - 110046', 3455, 'admin', '2016-08-17 10:20:42', 'admin', '2016-08-16 22:20:41'),
(28, 'Khanna Communication', 0, 98111116605, 0, '', 'RZ-51-A, Shop no. 3, Main Pankha Road, Opp. Sagarpur Bus stand, Vashisht Park, New Delhi - 110046', 2037, 'admin', '2016-08-17 10:17:33', 'admin', '2016-08-16 22:17:33'),
(29, 'Mr. Mobile', 0, 0, 0, '', 'Vikas Puri, New Delhi', 2226, 'admin', '2016-08-12 12:27:31', 'admin', '2016-08-12 00:27:31'),
(30, 'Cell City Care', 0, 0, 0, '', 'Sec- 16, Rohini, Delhi', 1071, 'admin', '2016-07-26 09:40:54', 'admin', '2016-07-25 21:40:54'),
(31, 'Mobile Solution', 0, 0, 0, '', 'B- 80, Main Madipur Road, J.J colony, New Delhi - 110063', 2415, 'admin', '2016-07-26 09:43:18', 'admin', '2016-07-25 21:43:18'),
(32, 'Vijay Communication', 0, 0, 0, '', 'Shop No. 13, Vikas Puri, New Delhi- 110018', 2.5, 'admin', '2016-07-26 09:50:38', 'admin', '2016-07-25 21:50:38'),
(33, 'New Style Telecom', 0, 0, 0, '', 'E-18/253, sec-3, Rohini, New Delhi - 110085', 6442.8, 'admin', '2016-08-17 10:14:01', 'admin', '2016-08-16 22:14:01'),
(34, 'Smart Accessories Hub', 786974657, 0, 0, '', 'G-40, Agarwal plaza, Mangalam, Rohini sec-3, Delhi- 110085', 10500.9, 'admin', '2016-08-12 12:25:32', 'admin', '2016-08-12 00:25:32'),
(35, 'Mobile Plant', 0, 9899925001, 0, '', 'E-26, Mangal Bazaar Road, Milap Nagar, Uttam Nagar, New Delhi 110059', 1785, 'admin', '2016-08-08 10:03:15', 'admin', '2016-08-07 22:03:15'),
(36, 'Mohit Aggarwal', 7107129039, 0, 0, '', '643, kanungo appartment, IP Ext. 71, Delhi - 110092', 0, 'admin', '2016-08-08 10:10:38', 'admin', '2016-08-07 22:10:38'),
(37, 'C Communication', 7330444502, 0, 0, '', 'Ansal Majestic Tower, Shop No. 5, Ground Floor\r\nVikaspuri, Delhi - 110018 ', 1785, 'admin', '2016-08-12 11:07:27', 'admin', '2016-08-11 23:07:26'),
(38, 'Time Lifestyle Pvt. Ltd ', 7510219045, 0, 0, '', 'S-8, Green Park, Main Market, Delhi- 110016', 840, 'admin', '2016-08-12 11:13:39', 'admin', '2016-08-11 23:13:39'),
(39, 'New Gen ', 7680465310, 0, 0, '', '5,6,7-E, kamla nagar, Geeta Bhawan Mandir, \r\nDelhi - 110007', 4462.5, 'admin', '2016-08-12 12:23:41', 'admin', '2016-08-12 00:23:40'),
(40, 'New Berco Electronics', 0, 0, 0, '', 'Shop No. A-1, Rajrani Market, Main Najafgarh Road, Uttam Nagar, New Delhi - 110059', 4935, 'admin', '2016-08-17 10:02:52', 'admin', '2016-08-16 22:02:51'),
(41, 'Ganpati Enterprises (M2K)', 7947110632, 9990888250, 0, '', 'G-54, Mangalam palace, Aggarwal city plaza, sec- 3, Rohini, Delhi- 110085', 399, 'admin', '2016-08-17 10:07:35', 'admin', '2016-08-16 22:07:34'),
(42, 'I Zone', 7276979393, 9999881594, 1145133533, '', 'Shop No. G-59A, Aggarwal City Plaza, Mangalam Palace, Sector-3, Opp. McDonald''s, Near M2k Market, Rohini, Delhi- 110085', 399, 'admin', '2016-08-17 10:11:52', 'admin', '2016-08-16 22:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `issueitems`
--

CREATE TABLE `issueitems` (
  `id` int(11) NOT NULL,
  `stockIssueID` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issueitems`
--

INSERT INTO `issueitems` (`id`, `stockIssueID`, `item`, `qty`) VALUES
(3, 3, 1, 6),
(4, 3, 9, 2),
(5, 4, 1, 1),
(6, 5, 2, 1),
(7, 6, 1, 2),
(8, 6, 2, 2),
(9, 6, 6, 5),
(10, 6, 5, 5),
(11, 6, 8, 2),
(12, 6, 9, 5),
(13, 6, 10, 2),
(14, 7, 2, 7),
(15, 7, 8, 1),
(16, 8, 1, 4),
(17, 8, 3, 20),
(18, 8, 4, 30),
(19, 8, 6, 10),
(20, 8, 5, 5),
(21, 8, 8, 10),
(22, 8, 9, 10),
(23, 9, 2, 1),
(24, 9, 8, 1),
(25, 10, 1, 2),
(26, 10, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `billno` varchar(11) NOT NULL,
  `items` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `irate` int(11) NOT NULL,
  `bprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `billno`, `items`, `qty`, `irate`, `bprice`) VALUES
(38, 'MBBB03-140', 4, 5, 140, 140),
(39, 'MBBB03-140', 3, 5, 120, 120),
(40, 'MBBB03-141', 4, 5, 140, 140),
(41, 'MBBB03-141', 5, 4, 160, 160),
(42, 'MBBB03-142', 4, 10, 140, 140),
(43, 'MBBB03-143', 1, 3, 850, 850),
(44, 'MBBB03-144', 4, 5, 140, 140),
(45, 'MBBB03-144', 3, 5, 120, 120),
(46, 'MBBB03-145', 4, 5, 140, 140),
(47, 'MBBB03-145', 3, 5, 120, 120),
(48, 'MBBB03-145', 1, 1, 850, 850),
(49, 'MBBB03-145', 2, 1, 400, 400),
(50, 'MBBB03-146', 1, 1, 850, 850),
(51, 'MBBB03-146', 2, 2, 400, 400),
(52, 'MBBB03-147', 1, 3, 850, 850),
(53, 'MBBB03-148', 6, 5, 190, 190),
(54, 'MBBB03-150', 6, 5, 190, 190),
(59, 'MBBB03-149', 4, 10, 140, 140),
(60, 'MBBB04-151', 1, 2, 850, 850),
(61, 'MBBB04-152', 4, 5, 130, 140),
(62, 'MBBB04-153', 1, 1, 850, 850),
(63, 'MBBB04-153', 2, 1, 400, 400),
(64, 'MBBB04-154', 4, 5, 140, 140),
(65, 'MBBB04-155', 5, 10, 160, 160),
(66, 'MBBB04-155', 9, 5, 190, 190),
(67, 'MBBB04-155', 10, 5, 140, 140),
(68, 'MBBB04-155', 4, 5, 140, 140),
(69, 'MBBB04-155', 3, 5, 120, 120),
(70, 'MBBB04-155', 1, 1, 850, 850),
(71, 'MBBB04-156', 4, 10, 135, 140),
(72, 'MBBB04-156', 3, 10, 115, 120),
(73, 'MBBB04-157', 1, 1, 850, 850),
(74, 'MBBB04-158', 1, 2, 850, 850),
(75, 'MBBB04-158', 2, 2, 400, 400),
(76, 'MBBB04-159', 3, 5, 120, 120),
(77, 'MBBB04-160', 1, 2, 850, 850),
(78, 'MBBB04-160', 2, 1, 400, 400),
(79, 'MBBB04-161', 1, 2, 850, 850),
(80, 'MBBB04-161', 4, 5, 140, 140),
(81, 'MBBB04-161', 9, 2, 190, 190),
(82, 'MBBB04-162', 1, 2, 850, 850),
(83, 'MBBB04-163', 1, 1, 850, 850),
(84, 'MBBB04-163', 2, 1, 400, 400),
(85, 'MBBB04-163', 5, 4, 160, 160),
(86, 'MBBB04-163', 4, 5, 140, 140),
(87, 'MBBB04-164', 6, 5, 160, 160),
(88, 'MBBB04-165', 6, 5, 160, 160),
(89, 'MBBB04-165', 8, 5, 150, 150),
(90, 'MBBB04-166', 4, 1, 140, 140),
(91, 'MBBB04-166', 3, 1, 120, 120),
(92, 'MBBB04-166', 6, 1, 160, 160),
(93, 'MBBB04-166', 1, 1, 850, 850),
(94, 'MBBB04-167', 6, 4, 160, 160),
(95, 'MBBB04-167', 9, 2, 190, 190),
(96, 'MBBB04-168', 1, 2, 850, 850),
(97, 'MBBB04-168', 3, 5, 120, 120),
(98, 'MBBB04-169', 9, 5, 190, 190),
(99, 'MBBB04-169', 6, 5, 160, 160),
(100, 'MBBB04-169', 4, 5, 140, 140),
(101, 'MBBB04-169', 3, 5, 120, 120),
(102, 'MBBB04-170', 9, 5, 190, 190),
(103, 'MBBB04-170', 10, 5, 140, 140),
(104, 'MBBB04-170', 6, 5, 160, 160),
(105, 'MBBB04-170', 4, 5, 140, 140),
(106, 'MBBB04-170', 3, 5, 120, 120),
(107, 'MBBB04-171', 9, 5, 190, 190),
(108, 'MBBB04-171', 8, 2, 150, 150),
(109, 'MBBB04-171', 3, 5, 120, 120),
(110, 'MBBB04-171', 10, 3, 140, 140),
(111, 'MBBB04-172', 1, 6, 810, 850),
(112, 'MBBB04-172', 3, 20, 114, 120),
(113, 'MBBB04-172', 6, 10, 152, 160),
(114, 'MBBB04-173', 3, 10, 120, 120),
(115, 'MBBB04-174', 1, 2, 850, 850),
(116, 'MBBB04-174', 4, 5, 140, 140),
(117, 'MBBB04-175', 6, 5, 160, 160),
(118, 'MBBB04-175', 9, 10, 190, 190),
(119, 'MBBB04-176', 4, 5, 140, 140),
(120, 'MBBB04-176', 3, 5, 120, 120),
(121, 'MBBB04-177', 1, 2, 850, 850),
(122, 'MBBB04-177', 8, 3, 150, 150),
(123, 'MBBB04-178', 1, 2, 850, 850),
(124, 'MBBB04-179', 1, 2, 850, 850),
(125, 'MBBB04-180', 1, 20, 800, 850),
(126, 'MBBB04-181', 4, 5, 140, 140),
(127, 'MBBB04-181', 3, 5, 120, 120),
(128, 'MBBB04-182', 1, 2, 850, 850),
(129, 'MBBB04-183', 4, 5, 134, 140),
(130, 'MBBB04-183', 3, 5, 115, 120),
(131, 'MBBB04-184', 2, 2, 400, 400),
(132, 'MBBB04-185', 5, 5, 160, 160),
(133, 'MBBB04-186', 1, 5, 850, 850),
(134, 'MBBB04-187', 4, 10, 133, 140),
(135, 'MBBB04-188', 1, 1, 850, 850),
(136, 'MBBB04-189', 3, 5, 120, 120),
(137, 'MBBB04-190', 2, 2, 400, 400),
(138, 'MBBB04-190', 3, 5, 120, 120),
(139, 'MBBB04-190', 14, 4, 250, 250),
(140, 'MBBB04-191', 4, 5, 140, 140),
(141, 'MBBB04-191', 3, 5, 120, 120),
(142, 'MBBB04-192', 1, 2, 850, 850),
(143, 'MBBB04-192', 3, 5, 120, 120),
(144, 'MBBB04-193', 1, 2, 850, 850),
(145, 'MBBB04-194', 5, 5, 190, 160),
(146, 'MBBB04-195', 6, 2, 190, 160),
(147, 'MBBB04-196', 5, 2, 190, 160),
(148, 'MBBB04-197', 5, 6, 181, 160),
(149, 'MBBB04-198', 5, 2, 190, 160),
(150, 'MBBB04-199', 5, 6, 190, 160),
(151, 'MBBB04-200', 5, 6, 190, 160);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pyid` int(11) NOT NULL,
  `date` date NOT NULL,
  `cuid` int(11) NOT NULL,
  `billno` int(11) NOT NULL,
  `pytype` int(11) NOT NULL,
  `amt` float NOT NULL,
  `cby` varchar(50) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uby` varchar(50) NOT NULL,
  `udate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pyid`, `date`, `cuid`, `billno`, `pytype`, `amt`, `cby`, `cdate`, `uby`, `udate`) VALUES
(4, '2016-07-09', 8, 0, 4, 1374, 'admin', '2016-07-25 19:32:19', '', '0000-00-00 00:00:00'),
(5, '2016-07-09', 19, 0, 5, 1313, 'admin', '2016-07-25 19:35:38', '', '0000-00-00 00:00:00'),
(6, '2016-07-22', 32, 0, 6, 3200, 'admin', '2016-07-25 21:50:38', '', '0000-00-00 00:00:00'),
(7, '2016-08-04', 36, 0, 7, 16800, 'admin', '2016-08-07 22:10:38', '', '0000-00-00 00:00:00'),
(8, '2016-08-07', 17, 0, 8, 3097, 'admin', '2016-08-10 03:38:35', '', '0000-00-00 00:00:00'),
(9, '2016-07-30', 27, 0, 9, 2719, 'admin', '2016-08-16 22:20:41', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `paytype`
--

CREATE TABLE `paytype` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `refnum` varchar(50) NOT NULL,
  `cby` varchar(50) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uby` varchar(50) NOT NULL,
  `udate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paytype`
--

INSERT INTO `paytype` (`id`, `date`, `type`, `bank`, `refnum`, `cby`, `cdate`, `uby`, `udate`) VALUES
(4, '2016-07-15', 'Cheque', '', '012082', 'admin', '2016-07-25 19:32:19', '', '0000-00-00 00:00:00'),
(5, '0000-00-00', 'Cheque', '', '990195', 'admin', '2016-07-25 19:35:38', '', '0000-00-00 00:00:00'),
(6, '2016-07-26', 'Cheque', 'IDBI Bank', '236474', 'admin', '2016-07-26 09:55:20', '', '0000-00-00 00:00:00'),
(7, '0000-00-00', 'NEFT', '', '', 'admin', '2016-08-07 22:10:38', '', '0000-00-00 00:00:00'),
(8, '2016-08-07', 'Cheque', 'HDFC Bank', '001690', 'admin', '2016-08-10 03:38:35', '', '0000-00-00 00:00:00'),
(9, '2016-08-01', 'Cheque', '', '', 'admin', '2016-08-16 22:20:41', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `cid` int(11) NOT NULL,
  `pcode` varchar(50) NOT NULL,
  `pcolor` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `ptax` int(11) NOT NULL,
  `cby` varchar(50) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uby` varchar(50) NOT NULL,
  `udate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `cid`, `pcode`, `pcolor`, `price`, `ptax`, `cby`, `cdate`, `uby`, `udate`) VALUES
(1, 'Power Bank 11000 mAh', 2, '', 2, 850, 5, 'admin', '2016-07-11 23:26:20', 'admin', '2016-08-10 06:28:37'),
(2, 'Power Bank 2500 mAh', 2, '', 2, 400, 5, 'admin', '2016-07-11 23:26:43', '', '2016-07-12 11:32:01'),
(3, 'Micro USB Data Cable', 3, '', 9, 120, 5, 'admin', '2016-07-11 23:27:49', '', '2016-07-12 11:32:01'),
(4, 'iOS USB Data Cable', 3, '', 9, 140, 5, 'admin', '2016-07-11 23:28:29', '', '2016-07-12 11:32:01'),
(5, 'Car Charger (Golden)', 4, '', 3, 160, 5, 'admin', '2016-07-11 23:30:00', 'admin', '2016-07-12 20:05:00'),
(6, 'Car Charger (Silver)', 4, '', 8, 160, 5, 'admin', '2016-07-12 20:05:49', '', '2016-07-13 08:08:53'),
(8, 'Car Charger (White)', 4, '', 2, 150, 5, 'admin', '2016-07-12 20:06:57', 'admin', '2016-07-21 22:31:53'),
(9, 'Wall Mount Dock (Big)', 5, '', 2, 190, 5, 'admin', '2016-07-11 23:30:45', '', '2016-07-13 08:08:53'),
(10, 'Wall Mount Dock (Small)', 5, '', 9, 140, 5, 'admin', '2016-07-11 23:31:01', '', '2016-07-13 08:08:53'),
(12, 'iPacky (Golden)', 6, '', 3, 250, 5, 'admin', '2016-07-12 21:46:35', '', '2016-07-13 09:46:35'),
(13, 'iPacky (Rose Gold)', 6, '', 4, 250, 5, 'admin', '2016-07-12 21:46:59', 'admin', '2016-08-10 06:29:13'),
(14, 'iPacky (Black)', 6, '', 5, 250, 5, 'admin', '2016-07-12 21:47:23', '', '2016-07-13 09:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `sid` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `scontact` bigint(20) NOT NULL,
  `sdetails` text NOT NULL,
  `cby` varchar(50) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uby` varchar(50) NOT NULL,
  `udate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`sid`, `sname`, `scontact`, `sdetails`, `cby`, `cdate`, `uby`, `udate`) VALUES
(1, 'Gautam', 7210842620, '', 'admin', '2016-07-13 05:37:37', 'admin', '2016-07-13 05:37:37'),
(2, 'Flipkart', 0, 'Online Seller', 'admin', '2016-07-22 04:46:13', '', '0000-00-00 00:00:00'),
(3, 'E-Bazar', 0, 'Online Seller', 'admin', '2016-08-02 00:02:15', '', '0000-00-00 00:00:00'),
(4, 'Shop Clues', 0, '', 'admin', '2016-08-02 00:02:31', '', '0000-00-00 00:00:00'),
(5, 'Amazon', 0, '', 'admin', '2016-08-02 00:02:38', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `stockissuetoseller`
--

CREATE TABLE `stockissuetoseller` (
  `stockIssueID` int(11) NOT NULL,
  `date` date NOT NULL,
  `sid` int(11) NOT NULL,
  `cby` varchar(50) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockissuetoseller`
--

INSERT INTO `stockissuetoseller` (`stockIssueID`, `date`, `sid`, `cby`, `cdate`) VALUES
(3, '2016-07-13', 1, 'admin', '2016-07-22 04:47:21'),
(4, '2016-07-14', 2, 'admin', '2016-07-22 04:48:19'),
(5, '2016-07-15', 2, 'admin', '2016-07-22 04:48:57'),
(6, '2016-07-15', 1, 'admin', '2016-07-22 04:50:56'),
(7, '2016-07-18', 2, 'admin', '2016-07-22 04:52:14'),
(8, '2016-07-18', 1, 'admin', '2016-07-22 04:54:25'),
(9, '2016-07-19', 2, 'admin', '2016-07-22 04:55:12'),
(10, '2016-07-22', 2, 'admin', '2016-07-22 04:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `umail` varchar(50) NOT NULL,
  `upass` varchar(50) NOT NULL,
  `ustatus` tinyint(4) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `udate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `umail`, `upass`, `ustatus`, `cdate`, `udate`) VALUES
(9, 'admin', 'admin@admin.com', '123', 1, '2016-07-13 05:30:33', '2016-07-13 05:30:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addstock`
--
ALTER TABLE `addstock`
  ADD PRIMARY KEY (`addStockID`);

--
-- Indexes for table `addstockitem`
--
ALTER TABLE `addstockitem`
  ADD PRIMARY KEY (`asiid`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`billno`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `cname` (`cname`);

--
-- Indexes for table `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `current_stock`
--
ALTER TABLE `current_stock`
  ADD PRIMARY KEY (`stockID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cuid`);

--
-- Indexes for table `issueitems`
--
ALTER TABLE `issueitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pyid`);

--
-- Indexes for table `paytype`
--
ALTER TABLE `paytype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `stockissuetoseller`
--
ALTER TABLE `stockissuetoseller`
  ADD PRIMARY KEY (`stockIssueID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `umail` (`umail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addstock`
--
ALTER TABLE `addstock`
  MODIFY `addStockID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `addstockitem`
--
ALTER TABLE `addstockitem`
  MODIFY `asiid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `chart`
--
ALTER TABLE `chart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `current_stock`
--
ALTER TABLE `current_stock`
  MODIFY `stockID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `issueitems`
--
ALTER TABLE `issueitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `paytype`
--
ALTER TABLE `paytype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `stockissuetoseller`
--
ALTER TABLE `stockissuetoseller`
  MODIFY `stockIssueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
