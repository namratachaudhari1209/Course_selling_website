-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2019 at 12:32 PM
-- Server version: 5.4.1
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `furniture`
--

-- --------------------------------------------------------

--
-- Table structure for table `conformation`
--

CREATE TABLE IF NOT EXISTS `conformation` (
  `conid` text NOT NULL,
  `cdate` date NOT NULL,
  `buyerid` text NOT NULL,
  `totalamt` int(11) NOT NULL,
  `deltype` text NOT NULL,
  `deliname` text NOT NULL,
  `deliaddrs` text NOT NULL,
  `delcity` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conformation`
--


-- --------------------------------------------------------

--
-- Table structure for table `delivary`
--

CREATE TABLE IF NOT EXISTS `delivary` (
  `dno` int(11) NOT NULL,
  `ddate` date NOT NULL,
  `cartno` double NOT NULL,
  `amt` int(11) NOT NULL,
  `tranname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivary`
--


-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `userid` text NOT NULL,
  `remark` text NOT NULL,
  `feedbackdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--


-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `prodid` text NOT NULL,
  `prodesc` text NOT NULL,
  `classification` text NOT NULL,
  `price` text NOT NULL,
  `mattype` text NOT NULL,
  `size` text NOT NULL,
  `ptype` text NOT NULL,
  `discription` text NOT NULL,
  `image` text NOT NULL,
  `availability` text NOT NULL,
  `lastdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodid`, `prodesc`, `classification`, `price`, `mattype`, `size`, `ptype`, `discription`, `image`, `availability`, `lastdate`) VALUES
('9', '9', '9', '9', '9', '9', '9', '9', 'bed16.jpg', '9', '2000-10-10'),
('1', '91', '91', '91', '91', '91', '1', '1', 'chair19.jpg', 'y', '2000-10-10'),
('1', '2', '3', '4', '5', '6', '7', '8', 'bed25.jpg', 'y', '2001-12-20'),
('1', '2', '3', '4', '5', '6', '7', '8', 'sofa15.jpg', 'y', '2004-10-20'),
('1', '1', '1', '1', '1', '1', '1', '1', 'bed16.jpg', 'y', '2010-10-20'),
('1', '2', '2', '2', '2', '2', '14', '5', 'bed16.jpg', 'y', '2010-10-20'),
('1', '1', '1', '1', '1', '1', '1', '11', 'sofa14.jpg', 'y', '2010-10-20'),
('1', '1', '1', '1', '1', '44', '1', '1', 'table39.jpg', 'y', '2010-10-20'),
('1', '1', '1', '1', '1', '1', '1', '1', 'table40.jpg', 'y', '2010-10-20'),
('1', '2', '1', '1', '1', '1', '1', '1', 'dining13.jpg', 'y', '2010-10-20'),
('1', '1', '1', '1', '1', '1', '1', '1', 'chair33.jpg', 'y', '2010-10-20'),
('1', '1', '1', '1', '1', '1', '14', '11', 'sofa36.jpg', 'y', '2010-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `shopcart`
--

CREATE TABLE IF NOT EXISTS `shopcart` (
  `cartno` double NOT NULL,
  `srno` int(11) NOT NULL,
  `buyerid` text NOT NULL,
  `prodid` text NOT NULL,
  `price` int(11) NOT NULL,
  `confirmdate` date NOT NULL,
  `qty` int(11) NOT NULL,
  `amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopcart`
--

INSERT INTO `shopcart` (`cartno`, `srno`, `buyerid`, `prodid`, `price`, `confirmdate`, `qty`, `amt`) VALUES
(1, 1, '', '1', 91, '2019-02-11', 1, 0),
(2, 1, '', '9', 9, '2019-02-12', 1, 0),
(2, 2, '', '1', 91, '2019-02-12', 1, 0),
(3, 1, '', '9', 9, '2019-02-12', 1, 0),
(3, 2, '', '1', 91, '2019-02-12', 1, 0),
(3, 3, '', '1', 91, '2019-02-12', 1, 0),
(3, 4, '', '1', 91, '2019-02-12', 1, 0),
(3, 5, '', '1', 4, '2019-02-12', 1, 0),
(3, 6, '', '9', 9, '2019-02-12', 1, 9),
(4, 1, '', '1', 4, '2019-02-21', 1, 4),
(4, 2, '', '1', 1, '2019-02-21', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` text NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `email_id` text NOT NULL,
  `password` text NOT NULL,
  `mobno` text NOT NULL,
  `designation` text NOT NULL,
  `usertype` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `name`, `address`, `city`, `email_id`, `password`, `mobno`, `designation`, `usertype`) VALUES
('1', '1', '1', '1', '1', '1', '1', '1', '1');
