-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 50.62.209.157:3306
-- Generation Time: Apr 13, 2018 at 10:58 AM
-- Server version: 5.5.43-37.2-log
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcpcweb`
--
CREATE DATABASE IF NOT EXISTS `tcpcweb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tcpcweb`;

-- --------------------------------------------------------

--
-- Table structure for table `camp_finder_updated`
--

CREATE TABLE `camp_finder_updated` (
  `id` mediumint(9) NOT NULL DEFAULT '0',
  `camp_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `winter` int(11) DEFAULT NULL,
  `spring` int(11) DEFAULT NULL,
  `summer` int(11) DEFAULT NULL,
  `fall` int(11) DEFAULT NULL,
  `camp_open` varchar(255) DEFAULT NULL,
  `water` varchar(255) DEFAULT NULL,
  `elevation` int(11) DEFAULT NULL,
  `toilets` varchar(255) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `tents` int(11) DEFAULT NULL,
  `fees` int(11) DEFAULT NULL,
  `num_sites` int(11) DEFAULT NULL,
  `bear_boxes` int(11) DEFAULT NULL,
  `camphost` int(11) DEFAULT NULL,
  `groups` int(11) DEFAULT NULL,
  `wheelchair` int(11) DEFAULT NULL,
  `reservations` int(11) DEFAULT NULL,
  `dump` int(11) DEFAULT NULL,
  `ramps` int(11) DEFAULT NULL,
  `hookups` int(11) DEFAULT NULL,
  `showers` int(11) DEFAULT NULL,
  `hiking` int(11) DEFAULT NULL,
  `swimming` int(11) DEFAULT NULL,
  `shoreline` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camp_finder_updated`
--

INSERT INTO `camp_finder_updated` (`id`, `camp_name`, `location`, `winter`, `spring`, `summer`, `fall`, `camp_open`, `water`, `elevation`, `toilets`, `length`, `tents`, `fees`, `num_sites`, `bear_boxes`, `camphost`, `groups`, `wheelchair`, `reservations`, `dump`, `ramps`, `hookups`, `showers`, `hiking`, `swimming`, `shoreline`) VALUES
(1, 'Ackerman', 'Lewiston Lake', 1, 1, 1, 1, 'All Year  ', '4/1-10/31  ', 2000, 'Flush      ', 40, 0, 20, 51, 0, 1, 0, 0, 1, 1, 0, 0, 0, 1, 0, 0),
(2, 'Alpine View (Singles)', 'Trinity Lake', 0, 1, 1, 0, '5/15-9/15', '5/15-9/15', 2400, 'Flush', 32, 0, 20, 52, 1, 0, 0, 1, 1, 0, 0, 0, 0, 1, 1, 0),
(3, 'Alpine View (Doubles)', 'Trinity Lake', 0, 1, 1, 0, '5/15-9/15', '5/15-9/15', 2400, 'Flush', 32, 0, 35, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 1, 1, 0),
(4, 'Big Flat', 'Trinity Lake', 1, 1, 1, 1, 'All Year', 'No Water', 5000, 'Vault', 16, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'Bridge Camp', 'Trinity Lake', 1, 1, 1, 1, 'All Year', '5/15-10/31', 2700, 'Vault', 20, 0, 10, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(6, 'Bushytail (Singles)', 'Trinity Lake', 0, 1, 1, 1, '5/15-9/30', 'TBA', 2500, 'Flush', 40, 0, 25, 9, 1, 1, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0),
(7, 'Bushytail (Doubles)', 'Trinity Lake', 0, 1, 1, 1, '5/15-9/30', 'TBA', 2500, 'Flush', 40, 0, 35, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0),
(8, 'Bushytail (Triples)', 'Trinity Lake', 0, 1, 1, 1, '5/15-9/30', 'TBA', 2500, 'Flush', 40, 0, 45, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0),
(9, 'Bushytail (Quad)', 'Trinity Lake', 0, 1, 1, 1, '5/15-9/30', 'TBA', 2500, 'Flush', 40, 0, 80, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0),
(10, 'Clark Springs', 'Trinity Lake', 0, 1, 1, 1, '4/1-10/31', '4/1-10/31', 2400, 'Flush', 25, 0, 15, 21, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 0),
(11, 'Clear Creek', 'Trinity Lake', 1, 1, 1, 1, 'All Year', 'No Water', 3400, 'Vault', 22, 0, 0, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 'Cooper Gulch', 'Lewiston Lake', 0, 1, 1, 1, '4/1-10/31', '4/1-10/31', 2000, 'Vault', 16, 0, 15, 5, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 0),
(13, 'Eagle Creek', 'Trinity Lake', 0, 1, 1, 1, '5/15-10/15', '5/15-10/15', 2800, 'Vault', 35, 0, 15, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(14, 'East Weaver', 'Trinity Lake', 1, 1, 1, 1, 'All Year', '4/1-10/31', 2500, 'Vault', 25, 0, 15, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(15, 'Fawn Group (Loop B)', 'Trinity Lake', 0, 1, 1, 1, '5/1-9/30', '5/1-9/30', 2500, 'Flush', 37, 0, 120, 60, 1, 0, 1, 0, 1, 0, 0, 0, 0, 1, 1, 0),
(16, 'Fawn Group (Loop C)', 'Trinity Lake', 0, 1, 1, 1, '5/1-9/30', '5/1-9/30', 2500, 'Flush', 37, 0, 120, 60, 1, 0, 1, 0, 1, 0, 0, 0, 0, 1, 1, 0),
(17, 'Goldfield', 'Trinity Lake', 1, 1, 1, 1, 'All Year', 'No Water', 3000, 'Vault', 16, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 'Hayward Flat (Singles)', 'Trinity Lake', 0, 1, 1, 0, '5/15-9/15', '5/15-9/15', 2400, 'Flush', 40, 0, 20, 76, 1, 1, 0, 0, 1, 0, 0, 0, 0, 1, 1, 0),
(19, 'Hayward Flat (Doubles)', 'Trinity Lake', 0, 1, 1, 0, '5/15-9/15', '5/15-9/15', 2400, 'Flush', 40, 0, 35, 6, 1, 1, 0, 0, 1, 0, 0, 0, 0, 1, 1, 0),
(20, 'Horse Flat', 'Trinity Lake', 0, 1, 1, 0, '5/15-10/31', 'No Water', 3200, 'Vault', 16, 0, 0, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 'Jackass Springs', 'Trinity Lake', 1, 1, 1, 1, 'All Year', 'No Water', 2600, 'Vault', 32, 0, 0, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 'Mary Smith', 'Lewiston Lake', 0, 1, 1, 0, '5/1-9/15', '5/1-9/15', 2000, 'Flush/Vault', 0, 1, 20, 17, 1, 1, 0, 0, 1, 0, 0, 0, 0, 1, 1, 0),
(23, 'Minersville (Singles)', 'Trinity Lake', 1, 1, 1, 1, 'All Year', '5/31-10/31', 2400, 'Flush/Vault', 36, 0, 8, 9, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 1, 0),
(24, 'Minersville (Doubles)', 'Trinity Lake', 1, 1, 1, 1, 'All Year', '5/31-10/31', 2400, 'Flush/Vault', 36, 0, 16, 5, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 1, 0),
(25, 'Preacher Meadow', 'Trinity Lake', 0, 1, 1, 1, 'TBA', 'No Water', 2900, 'Vault', 40, 0, 15, 45, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0),
(26, 'Rush Creek', 'Trinity Lake', 0, 1, 1, 1, '5/15-9/15', 'No Water', 2400, 'Vault', 20, 0, 10, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(27, 'Scott Mountain', 'Trinity Lake', 1, 1, 1, 1, 'All Year', 'No Water', 5400, 'Vault', 15, 0, 0, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(28, 'Stoney Creek ', 'Trinity Lake', 0, 1, 1, 1, 'TBA', 'no water', 2400, 'Flush', 0, 0, 100, 10, 1, 0, 1, 0, 1, 0, 0, 0, 0, 1, 1, 0),
(29, 'Stoney Point', 'Trinity Lake', 0, 1, 1, 1, 'TBA', 'no water', 2400, 'Flush', 0, 1, 20, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0),
(30, 'Tannery Gulch (Singles)', 'Trinity Lake', 0, 1, 1, 1, '5/1-9/30', '5/1-9/30', 2400, 'Flush', 40, 0, 20, 56, 1, 1, 0, 0, 1, 0, 1, 0, 0, 1, 1, 0),
(31, 'Tannery Gulch (Doubles)', 'Trinity Lake', 0, 1, 1, 1, '5/1-9/30', '5/1-9/30', 2400, 'Flush', 40, 0, 35, 5, 1, 1, 0, 0, 1, 0, 1, 0, 0, 1, 1, 0),
(32, 'Trinity River', 'Trinity Lake', 0, 1, 1, 1, '5/15-10/31', 'No Water', 3000, 'Vault', 35, 0, 10, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(33, 'Tunnel Rock', 'Lewiston Lake', 1, 1, 1, 1, 'All Year', 'No Water', 2000, 'Vault', 15, 0, 10, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(34, 'Antlers (Singles)', 'Shasta Lake', 1, 1, 1, 1, '4/2-9/15', 'Yes', 1100, 'Flush/Vault', 30, 0, 20, 41, 1, 1, 0, 1, 1, 0, 1, 0, 0, 1, 0, 0),
(35, 'Antlers (Doubles)', 'Shasta Lake', 1, 1, 1, 1, '4/2-9/15', 'Yes', 1100, 'Flush/Vault', 30, 0, 35, 18, 1, 1, 0, 1, 1, 0, 1, 0, 0, 1, 0, 0),
(36, 'Bailey Cove (Singles)', 'Shasta Lake', 1, 1, 1, 1, 'All Year', 'Yes', 1085, 'Flush', 30, 0, 20, 5, 1, 1, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0),
(37, 'Bailey Cove (Doubles)', 'Shasta Lake', 1, 1, 1, 1, 'All Year', 'Yes', 1085, 'Flush', 30, 0, 35, 2, 1, 1, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0),
(38, 'Ellery Creek', 'Shasta Lake', 0, 1, 1, 0, 'April 1-Sept 12', 'Yes', 1085, 'Vault', 30, 0, 20, 19, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1),
(39, 'Gregory Creek', 'Shasta Lake', 0, 0, 1, 1, 'July-Sept', 'Yes', 1085, 'Flush', 16, 0, 10, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0),
(40, 'Hirz Bay (Singles)', 'Shasta Lake', 1, 1, 1, 1, 'All Year', 'Yes', 1100, 'Flush', 30, 0, 20, 37, 1, 1, 0, 1, 1, 0, 1, 0, 0, 1, 1, 0),
(41, 'Hirz Bay (Doubles)', 'Shasta Lake', 1, 1, 1, 1, 'All Year', 'Yes', 1100, 'Flush', 30, 0, 35, 11, 1, 1, 0, 1, 1, 0, 1, 0, 0, 1, 1, 0),
(42, 'Lakeshore East (Singles)', 'Shasta Lake', 1, 1, 1, 1, 'All Year', 'Yes', 1100, 'Flush', 30, 0, 20, 17, 1, 1, 0, 1, 1, 0, 0, 0, 0, 1, 1, 0),
(43, 'Lakeshore East (Doubles)', 'Shasta Lake', 1, 1, 1, 1, 'All Year', 'Yes', 1100, 'Flush', 30, 0, 35, 6, 1, 1, 0, 1, 1, 0, 0, 0, 0, 1, 1, 0),
(44, 'Lakeshore East (Yurts)', 'Shasta Lake', 0, 1, 1, 0, 'All Year', 'Yes', 1100, 'Flush', 30, 0, 65, 3, 1, 1, 0, 1, 1, 0, 0, 0, 0, 1, 1, 0),
(45, 'Lower Jones Valley (Singles)', 'Shasta Lake', 1, 1, 1, 1, 'All Year', 'Yes', 1085, 'Vault', 16, 0, 20, 8, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 0),
(46, 'Lower Jones Valley (Doubles)', 'Shasta Lake', 1, 1, 1, 1, 'All Year', 'Yes', 1085, 'Vault', 16, 0, 35, 3, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 0),
(47, 'McCloud Bridge (Singles)', 'Shasta Lake', 0, 1, 1, 1, 'April 1-Oct 24', 'Yes', 1085, 'Vault', 16, 0, 20, 11, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 0),
(48, 'McCloud Bridge (Doubles)', 'Shasta Lake', 0, 1, 1, 1, 'April 1-Oct 24', 'Yes', 1085, 'Vault', 16, 0, 35, 3, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 0),
(49, 'Moore Creek', 'Shasta Lake', 1, 1, 1, 1, 'Overflow', 'Yes', 1085, 'Vault', 16, 0, 20, 12, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0),
(50, 'Nelson Point', 'Shasta Lake', 1, 1, 1, 1, 'Overflow', 'No Water', 1085, 'Vault', 16, 0, 10, 8, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0),
(51, 'Pine Point', 'Shasta Lake', 1, 1, 1, 1, 'Overflow', 'Yes', 1090, 'Vault', 24, 0, 20, 14, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0),
(52, 'Upper Jones Valley', 'Shasta Lake', 1, 1, 1, 1, 'Overflow', 'Yes', 1100, 'Vault', 16, 0, 20, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(53, 'Deadlun', 'Shasta Lake', 1, 1, 1, 1, 'All Year', 'No Water', 2750, 'Vault', 24, 0, 0, 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(54, 'Madrone', 'Shasta Lake', 1, 1, 1, 1, 'All Year', 'No Water', 1500, 'Vault', 16, 0, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(55, 'Beehive', 'Shasta Lake', 0, 1, 1, 0, 'May 15-Sept 12', 'No Water', 1067, 'Vault', 0, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1),
(56, 'Gregory Beach', 'Shasta Lake', 0, 1, 1, 0, 'May 15-Sept 12', 'No Water', 1067, 'Vault', 30, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1),
(57, 'Jones Valley Inlet', 'Shasta Lake', 0, 1, 1, 1, 'March 1-Oct 31', 'Yes', 1067, 'Vault', 30, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1),
(58, 'Lower Salt Creek', 'Shasta Lake', 0, 1, 1, 0, 'May 15-Sept 12', 'No Water', 1085, 'Vault', 0, 1, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1),
(59, 'Mariners Point', 'Shasta Lake', 0, 1, 1, 0, 'May 15-Sept 12', 'Yes', 1085, 'Vault', 16, 0, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1),
(60, 'Dekkas Rock', 'Shasta Lake', 1, 1, 1, 1, 'All Year', 'Yes', 1085, 'Vault', 16, 0, 130, 60, 1, 0, 1, 0, 1, 0, 0, 0, 0, 1, 1, 0),
(61, 'Hirz Bay #1', 'Shasta Lake', 0, 1, 1, 1, 'April 1-Sept 30', 'Yes', 1100, 'Vault', 30, 0, 130, 120, 1, 1, 1, 0, 1, 0, 1, 0, 0, 1, 1, 0),
(62, 'Hirz Bay #2', 'Shasta Lake', 0, 1, 1, 1, 'April 1-Sept 30', 'Yes', 1100, 'Vault', 30, 0, 100, 80, 1, 1, 1, 0, 1, 0, 1, 0, 0, 1, 1, 0),
(63, 'Moore Creek', 'Shasta Lake', 0, 1, 1, 0, 'May 15-Sept 10', 'Yes', 1085, 'Vault', 16, 0, 130, 90, 1, 0, 1, 0, 1, 0, 0, 0, 0, 1, 1, 0),
(64, 'Nelson Point', 'Shasta Lake', 0, 1, 1, 0, 'June 3-Sept 10', 'No Water', 1085, 'Vault', 16, 0, 100, 60, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 1, 0),
(65, 'Pine Point', 'Shasta Lake', 0, 1, 1, 0, 'June 3-Sept 10', 'Yes', 1090, 'Vault', 24, 0, 130, 100, 1, 0, 1, 0, 1, 0, 0, 0, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `campground_finder`
--

CREATE TABLE `campground_finder` (
  `id` mediumint(9) NOT NULL DEFAULT '0',
  `camp_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `winter` int(11) DEFAULT NULL,
  `spring` int(11) DEFAULT NULL,
  `summer` int(11) DEFAULT NULL,
  `fall` int(11) DEFAULT NULL,
  `camp_open` varchar(255) DEFAULT NULL,
  `water` varchar(255) DEFAULT NULL,
  `elevation` int(11) DEFAULT NULL,
  `toilets` varchar(255) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `tents` int(11) DEFAULT NULL,
  `fees` int(11) DEFAULT NULL,
  `num_sites` int(11) DEFAULT NULL,
  `bear_boxes` int(11) DEFAULT NULL,
  `camphost` int(11) DEFAULT NULL,
  `groups` int(11) DEFAULT NULL,
  `wheelchair` int(11) DEFAULT NULL,
  `reservations` int(11) DEFAULT NULL,
  `dump` int(11) DEFAULT NULL,
  `ramps` int(11) DEFAULT NULL,
  `hookups` int(11) DEFAULT NULL,
  `showers` int(11) DEFAULT NULL,
  `hiking` int(11) DEFAULT NULL,
  `swimming` int(11) DEFAULT NULL,
  `shoreline` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campground_finder`
--

INSERT INTO `campground_finder` (`id`, `camp_name`, `location`, `winter`, `spring`, `summer`, `fall`, `camp_open`, `water`, `elevation`, `toilets`, `length`, `tents`, `fees`, `num_sites`, `bear_boxes`, `camphost`, `groups`, `wheelchair`, `reservations`, `dump`, `ramps`, `hookups`, `showers`, `hiking`, `swimming`, `shoreline`) VALUES
(1, 'Ackerman', 'Lewiston Lake', 1, 1, 1, 1, 'All Year  ', '4/1-10/31  ', 2000, 'Flush      ', 40, 0, 18, 51, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 0, 0),
(2, 'Alpine View', 'Trinity Lake', 0, 1, 1, 0, '5/15-9/15', '5/15-9/15', 2400, 'Flush', 32, 0, 18, 53, 1, 0, 0, 1, 1, 0, 0, 0, 0, 1, 1, 0),
(3, 'Big Flat', 'Trinity Lake', 1, 1, 1, 1, 'All Year', 'No Water', 5000, 'Vault', 16, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'Bridge Camp', 'Trinity Lake', 1, 1, 1, 1, 'All Year', '5/15-10/31', 2700, 'Vault', 20, 0, 8, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(5, 'Bushytail', 'Trinity Lake', 0, 1, 1, 1, '5/15-9/30', '5/15-9/30', 2500, 'Flush', 40, 0, 20, 11, 1, 1, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0),
(6, 'Clark Springs', 'Trinity Lake', 0, 1, 1, 1, '4/1-10/31', '4/1-10/31', 2400, 'Flush', 25, 0, 14, 21, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 0),
(7, 'Clear Creek', 'Trinity Lake', 1, 1, 1, 1, 'All Year', 'No Water', 3400, 'Vault', 22, 0, 0, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 'Cooper Gulch', 'Lewiston Lake', 0, 1, 1, 1, '4/1-10/31', '4/1-10/31', 2000, 'Vault', 16, 0, 8, 5, 1, 1, 0, 1, 0, 0, 0, 0, 0, 1, 1, 0),
(9, 'Eagle Creek', 'Trinity Lake', 0, 1, 1, 1, '5/15-10/31', '5/15-10/31', 2800, 'Vault', 35, 0, 14, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(10, 'East Weaver', 'Trinity Lake', 1, 1, 1, 1, 'All Year', '4/1-10/31', 2500, 'Vault', 25, 0, 8, 11, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(11, 'Fawn', 'Trinity Lake', 0, 1, 1, 1, '5/1-9/30', '5/1-9/30', 2500, 'Flush', 37, 0, 120, 60, 1, 0, 1, 0, 1, 0, 0, 0, 0, 1, 1, 0),
(12, 'Goldfield', 'Trinity Lake', 1, 1, 1, 1, 'All Year', 'No Water', 3000, 'Vault', 16, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 'Hayward Flat', 'Trinity Lake', 0, 1, 1, 0, '5/15-9/15', '5/15-9/15', 2400, 'Flush', 40, 0, 18, 98, 1, 1, 0, 0, 1, 0, 0, 0, 0, 1, 1, 0),
(14, 'Horse Flat', 'Trinity Lake', 0, 1, 1, 0, '5/15-10/31', 'No Water', 3200, 'Vault', 16, 0, 0, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 'Jackass Springs', 'Trinity Lake', 1, 1, 1, 1, 'All Year', 'No Water', 2600, 'Vault', 32, 0, 0, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 'Mary Smith', 'Lewiston Lake', 0, 1, 1, 0, '5/1-9/15', '5/1-9/15', 2000, 'Flush/Vault', 0, 1, 14, 17, 1, 1, 0, 0, 1, 0, 0, 0, 0, 1, 1, 0),
(17, 'Minersville', 'Trinity Lake', 1, 1, 1, 1, 'All Year', '5/31-10/31', 2400, 'Flush/Vault', 36, 0, 12, 14, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 1, 0),
(18, 'Preacher Meadow', 'Trinity Lake', 0, 1, 1, 1, '5/15-10/15', '5/15-10/15', 2900, 'Vault', 40, 0, 14, 45, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0),
(19, 'Rush Creek', 'Trinity Lake', 0, 1, 1, 1, '5/15-9/15', 'No Water', 2400, 'Vault', 20, 0, 8, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(20, 'Scott Mountain', 'Trinity Lake', 1, 1, 1, 1, 'All Year', 'No Water', 5400, 'Vault', 15, 0, 0, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(21, 'Stoney Creek ', 'Trinity Lake', 0, 1, 1, 1, '5/1-9/30', '5/1-9/30', 2400, 'Flush', 0, 0, 100, 10, 1, 0, 1, 0, 1, 0, 0, 0, 0, 1, 1, 0),
(22, 'Stoney Point', 'Trinity Lake', 0, 1, 1, 1, '5/1-10/31', '5/1-10/31', 2400, 'Flush', 0, 1, 18, 21, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0),
(23, 'Tannery Gulch', 'Trinity Lake', 0, 1, 1, 1, '5/1-9/30', '5/1-9/30', 2400, 'Flush', 40, 0, 18, 82, 1, 1, 0, 0, 1, 0, 1, 0, 0, 1, 1, 0),
(24, 'Trinity River', 'Trinity Lake', 0, 1, 1, 1, '5/15-10/31', 'No Water', 3000, 'Vault', 35, 0, 8, 7, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(25, 'Tunnel Rock', 'Lewiston Lake', 1, 1, 1, 1, 'All Year', 'No Water', 2000, 'Vault', 15, 0, 8, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(26, 'Antlers (Singles)', 'Shasta Lake', 1, 1, 1, 1, '4/2-9/15', 'Yes', 1100, 'Flush/Vault', 30, 0, 20, 41, 1, 1, 0, 1, 1, 0, 1, 0, 0, 1, 0, 0),
(27, 'Antlers (Doubles)', 'Shasta Lake', 1, 1, 1, 1, '4/2-9/15', 'Yes', 1100, 'Flush/Vault', 30, 0, 35, 18, 1, 1, 0, 1, 1, 0, 1, 0, 0, 1, 0, 0),
(28, 'Bailey Cove (Singles)', 'Shasta Lake', 1, 1, 1, 1, 'All Year', 'Yes', 1085, 'Flush', 30, 0, 20, 5, 1, 1, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0),
(29, 'Bailey Cove (Doubles)', 'Shasta Lake', 1, 1, 1, 1, 'All Year', 'Yes', 1085, 'Flush', 30, 0, 35, 2, 1, 1, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0),
(30, 'Ellery Creek', 'Shasta Lake', 0, 1, 1, 0, 'April 1-Sept 12', 'Yes', 1085, 'Vault', 30, 0, 20, 19, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1),
(31, 'Gregory Creek', 'Shasta Lake', 0, 0, 1, 1, 'July-Sept', 'Yes', 1085, 'Flush', 16, 0, 10, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0),
(32, 'Hirz Bay (Singles)', 'Shasta Lake', 1, 1, 1, 1, 'All Year', 'Yes', 1100, 'Flush', 30, 0, 20, 37, 1, 1, 0, 1, 1, 0, 1, 0, 0, 1, 1, 0),
(33, 'Hirz Bay (Doubles)', 'Shasta Lake', 1, 1, 1, 1, 'All Year', 'Yes', 1100, 'Flush', 30, 0, 35, 11, 1, 1, 0, 1, 1, 0, 1, 0, 0, 1, 1, 0),
(34, 'Lakeshore East (Singles)', 'Shasta Lake', 1, 1, 1, 1, 'All Year', 'Yes', 1100, 'Flush', 30, 0, 20, 17, 0, 1, 0, 1, 1, 0, 0, 0, 0, 1, 1, 0),
(35, 'Lakeshore East (Doubles)', 'Shasta Lake', 1, 1, 1, 1, 'All Year', 'Yes', 1100, 'Flush', 30, 0, 35, 6, 0, 1, 0, 1, 1, 0, 0, 0, 0, 1, 1, 0),
(36, 'Lakeshore East (Yurts)', 'Shasta Lake', 0, 1, 1, 0, 'All Year', 'Yes', 1100, 'Flush', 30, 0, 65, 3, 0, 1, 0, 1, 1, 0, 0, 0, 0, 1, 1, 0),
(37, 'Lower Jones Valley (Singles)', 'Shasta Lake', 1, 1, 1, 1, 'All Year', 'Yes', 1085, 'Vault', 16, 0, 18, 8, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 0),
(38, 'Lower Jones Valley (Doubles)', 'Shasta Lake', 1, 1, 1, 1, 'All Year', 'Yes', 1085, 'Vault', 16, 0, 30, 3, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 0),
(39, 'McCloud Bridge (Singles)', 'Shasta Lake', 0, 1, 1, 1, 'April 1-Oct 24', 'Yes', 1085, 'Vault', 16, 0, 20, 11, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 0),
(40, 'McCloud Bridge (Doubles)', 'Shasta Lake', 0, 1, 1, 1, 'April 1-Oct 24', 'Yes', 1085, 'Vault', 16, 0, 35, 3, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 0),
(41, 'Moore Creek', 'Shasta Lake', 1, 1, 1, 1, 'Overflow', 'Yes', 1085, 'Vault', 16, 0, 20, 12, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0),
(42, 'Nelson Point', 'Shasta Lake', 1, 1, 1, 1, 'Overflow', 'No Water', 1085, 'Vault', 16, 0, 10, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0),
(43, 'Pine Point', 'Shasta Lake', 1, 1, 1, 1, 'Overflow', 'Yes', 1090, 'Vault', 24, 0, 20, 14, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0),
(44, 'Upper Jones Valley', 'Shasta Lake', 1, 1, 1, 1, 'Overflow', 'Yes', 1100, 'Vault', 16, 0, 18, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(45, 'Deadlun', 'Shasta Lake', 1, 1, 1, 1, 'All Year', 'No Water', 2750, 'Vault', 24, 0, 0, 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46, 'Madrone', 'Shasta Lake', 1, 1, 1, 1, 'All Year', 'No Water', 1500, 'Vault', 16, 0, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47, 'Beehive', 'Shasta Lake', 0, 1, 1, 0, 'May 15-Sept 12', 'No Water', 1067, 'Vault', 0, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1),
(48, 'Gregory Beach', 'Shasta Lake', 0, 1, 1, 0, 'May 15-Sept 12', 'No Water', 1067, 'Vault', 30, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1),
(49, 'Jones Valley Inlet', 'Shasta Lake', 0, 1, 1, 1, 'March 1-Oct 31', 'Yes', 1067, 'Vault', 30, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1),
(50, 'Lower Salt Creek', 'Shasta Lake', 0, 1, 1, 0, 'May 15-Sept 12', 'No Water', 1085, 'Vault', 0, 1, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1),
(51, 'Mariners Point', 'Shasta Lake', 0, 1, 1, 0, 'May 15-Sept 12', 'Yes', 1085, 'Vault', 16, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1),
(52, 'Dekkas Rock', 'Shasta Lake', 1, 1, 1, 1, 'All Year', 'Yes', 1085, 'Vault', 16, 0, 130, 60, 1, 0, 1, 0, 1, 0, 0, 0, 0, 1, 1, 0),
(53, 'Hirz Bay #1', 'Shasta Lake', 0, 1, 1, 1, 'April 1-Sept 30', 'Yes', 1100, 'Vault', 30, 0, 130, 120, 1, 1, 1, 0, 1, 0, 1, 0, 0, 1, 1, 0),
(54, 'Hirz Bay #2', 'Shasta Lake', 0, 1, 1, 1, 'April 1-Sept 30', 'Yes', 1100, 'Vault', 30, 0, 100, 80, 1, 1, 1, 0, 1, 0, 1, 0, 0, 1, 1, 0),
(55, 'Moore Creek', 'Shasta Lake', 0, 1, 1, 0, 'May 15-Sept 10', 'Yes', 1085, 'Vault', 16, 0, 130, 90, 1, 0, 1, 0, 1, 0, 0, 0, 0, 1, 1, 0),
(56, 'Nelson Point', 'Shasta Lake', 0, 1, 1, 0, 'June 3-Sept 10', 'No Water', 1085, 'Vault', 16, 0, 100, 60, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 1, 0),
(57, 'Pine Point', 'Shasta Lake', 0, 1, 1, 0, 'June 3-Sept 10', 'Yes', 1090, 'Vault', 24, 0, 130, 100, 1, 0, 1, 0, 1, 0, 0, 0, 0, 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `camp_finder_updated`
--
ALTER TABLE `camp_finder_updated`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`,`camp_name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

