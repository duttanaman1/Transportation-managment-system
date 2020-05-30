-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2020 at 04:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship3_tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_id`, `username`, `password`) VALUES
(1, 'admin1', 'admin1'),
(2, 'admin2', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookid` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `trans_name` varchar(50) NOT NULL,
  `trans_fare` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `paid_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookid`, `cust_id`, `cust_name`, `trans_id`, `trans_name`, `trans_fare`, `date`, `paid_status`) VALUES
(1, 0, 'cust1', 1, 'car1', 100, '2020-05-02T13:00', NULL),
(2, 2, 'cust1', 1, 'car1', 100, '2020-05-04T13:00', NULL),
(3, 2, 'cust1', 1, 'car1', 100, '2020-05-19T15:01', NULL),
(4, 1, 'cust2', 1, 'train1', 500, '2020-05-18T01:00', NULL),
(5, 1, 'cust2', 3, 'bus3', 50, '2020-05-26T13:00', NULL),
(8, 1, 'cust2', 1, 'flight1', 2000, '2020-01-01T01:00', NULL),
(9, 1, 'cust2', 1, 'car1', 100, '2020-05-26T01:00', NULL),
(10, 18, 'cust12', 1, 'ship1', 10000, '2020-05-19T01:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `busid` int(11) NOT NULL,
  `busname` varchar(50) NOT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `cust_name` varchar(50) DEFAULT NULL,
  `fare` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `drivername` varchar(50) NOT NULL,
  `drivernumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`busid`, `busname`, `cust_id`, `cust_name`, `fare`, `type`, `drivername`, `drivernumber`) VALUES
(1, 'bus1', NULL, NULL, 200, 'volvo', 'driver1', '9092325907'),
(2, 'bus2', NULL, NULL, 200, 'regularAC', 'driver2', '9092325907'),
(3, 'bus3', NULL, NULL, 50, 'regularNONAC', 'driver3', '9092325907');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `carid` int(50) NOT NULL,
  `carname` varchar(50) NOT NULL,
  `cust_id` int(50) DEFAULT NULL,
  `cust_name` varchar(50) DEFAULT NULL,
  `fare` int(50) NOT NULL,
  `seattype` varchar(50) NOT NULL,
  `drivername` varchar(50) NOT NULL,
  `drivernumber` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`carid`, `carname`, `cust_id`, `cust_name`, `fare`, `seattype`, `drivername`, `drivernumber`) VALUES
(1, 'car1', NULL, NULL, 100, '4', 'driver1', 2147483647),
(2, 'car2', NULL, NULL, 200, '8', 'driver2', 2147483647),
(3, 'car3', NULL, NULL, 200, '8', 'driver3', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(50) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `transport_type` varchar(50) DEFAULT NULL,
  `img_src` varchar(500) DEFAULT NULL,
  `identity` varchar(50) DEFAULT NULL,
  `fare` int(50) DEFAULT NULL,
  `paid_status` varchar(50) DEFAULT NULL,
  `extra field` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `password`, `transport_type`, `img_src`, `identity`, `fare`, `paid_status`, `extra field`) VALUES
(1, 'cust2', 'cust2', NULL, 'http://localhost/internship_project3_TMS/img/561974.jpg', 'cust2', 2820, NULL, NULL),
(2, 'cust1', 'cust1', NULL, 'http://localhost/internship_project3_TMS/img/img/500_F_234282438_T7casdzkuXEALCORHS33jOLVQM5spW68.jpg', 'cust1', 600, NULL, NULL),
(8, 'cust5', 'emp1', NULL, 'http://localhost/internship_project3_TMS/img/img/498399.jpg', 'cust5', NULL, NULL, NULL),
(14, 'cust11', 'emp1', NULL, 'http://localhost/internship_project3_TMS/img/img/499091.jpg', 'cust11', NULL, NULL, NULL),
(16, 'Naman Dutta', 'null', NULL, 'http://localhost/internship_project3_TMS/img/', '12333', NULL, NULL, NULL),
(17, 'cust11', 'cust11', NULL, 'http://localhost/internship_project3_TMS/img/img/498699.jpg', 'cust11', NULL, NULL, NULL),
(18, 'cust12', 'emp1', NULL, 'http://localhost/internship_project3_TMS/img/img/498754.jpg', 'cust12', 10060, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empid` int(50) NOT NULL,
  `empname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `empname`, `password`) VALUES
(1, 'emp1', 'emp1'),
(3, 'emp2', 'emp2');

-- --------------------------------------------------------

--
-- Table structure for table `emp_cust`
--

CREATE TABLE `emp_cust` (
  `empid` int(50) NOT NULL,
  `empname` varchar(50) NOT NULL,
  `custname` varchar(50) NOT NULL,
  `transport` varchar(50) NOT NULL,
  `img_src` varchar(50) NOT NULL,
  `identity` varchar(50) NOT NULL,
  `fare` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flightid` int(11) NOT NULL,
  `flightname` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `fare` int(11) NOT NULL,
  `agentname` varchar(50) NOT NULL,
  `agentnumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flightid`, `flightname`, `type`, `fare`, `agentname`, `agentnumber`) VALUES
(1, 'flight1', 'regular', 2000, 'agent1', 2147483647),
(2, 'flight2', 'private', 250000, 'agent2', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceid` int(11) NOT NULL,
  `bookid` int(50) NOT NULL,
  `service1` varchar(50) NOT NULL,
  `service2` varchar(50) NOT NULL,
  `service3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceid`, `bookid`, `service1`, `service2`, `service3`) VALUES
(10, 4, '10', '20', '0'),
(11, 5, '0', '0', '30'),
(12, 8, '0', '20', '30'),
(13, 0, '0', '20', '30'),
(14, 8, '10', '0', '0'),
(15, 10, '0', '20', '30'),
(16, 10, '10', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `ship`
--

CREATE TABLE `ship` (
  `shipid` int(11) NOT NULL,
  `shipname` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `fare` int(11) NOT NULL,
  `agentname` varchar(50) NOT NULL,
  `agentnumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ship`
--

INSERT INTO `ship` (`shipid`, `shipname`, `type`, `fare`, `agentname`, `agentnumber`) VALUES
(1, 'ship1', 'Cruiser', 10000, 'agent1', 2147483647),
(2, 'ship2', 'regular', 2000, 'agent2', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `trainid` int(50) NOT NULL,
  `trainname` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `fare` int(50) NOT NULL,
  `agentname` varchar(50) NOT NULL,
  `agentnumber` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`trainid`, `trainname`, `type`, `fare`, `agentname`, `agentnumber`) VALUES
(1, 'train1', 'premium', 500, 'agent1', 2147483647),
(2, 'train2', 'special', 500, 'agent2', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`busid`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`carid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `emp_cust`
--
ALTER TABLE `emp_cust`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flightid`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceid`);

--
-- Indexes for table `ship`
--
ALTER TABLE `ship`
  ADD PRIMARY KEY (`shipid`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`trainid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `admin_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `busid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `carid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emp_cust`
--
ALTER TABLE `emp_cust`
  MODIFY `empid` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `flightid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ship`
--
ALTER TABLE `ship`
  MODIFY `shipid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `trainid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
