-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2024 at 11:05 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pass`) VALUES
(1, 'admin', '1234'),
(2, 'dharshan', '1234'),
(3, 'jeeva', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `donor_register`
--

CREATE TABLE `donor_register` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `age` varchar(50) DEFAULT NULL,
  `bgroup` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `mno` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor_register`
--

INSERT INTO `donor_register` (`id`, `name`, `fname`, `address`, `city`, `age`, `bgroup`, `email`, `mno`) VALUES
(3, 'ragavi', 'punniyaraja', 'kandy', 'SRILANKA', '14', 'A-', 'smartjeeva2.14@gmail.com', 815718395),
(4, 'KRISH', 'SANMUHAM', 'NUWARALIYA', 'SRILANKA', '25', 'AB+', 'KRISH@GMAIL.COM', 815718395),
(5, 'KRISH', 'SANMUHAM', '', 'SRILANKA', '25', 'B-', 'KRISH@GMAIL.COM', 815718395),
(8, '', '', '', '', '', 'A+', '', 0),
(9, '', '', '', '', '', 'A+', '', 0),
(10, 'dharshan', 'maheshwaran', 'eyrie frotoft ramboda', 'kandy', '23', 'O+', 'fathimailma7@gmail.com', 770076716);

-- --------------------------------------------------------

--
-- Table structure for table `exchange_blood`
--

CREATE TABLE `exchange_blood` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `age` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `mno` varchar(50) DEFAULT NULL,
  `bgroup` varchar(50) DEFAULT NULL,
  `exgroup` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exchange_blood`
--

INSERT INTO `exchange_blood` (`id`, `name`, `fname`, `address`, `city`, `age`, `email`, `mno`, `bgroup`, `exgroup`) VALUES
(2, 'j', 'j', 'j', 'j', 'j', 'j', 'j', 'A+', 'A+'),
(3, 'abisheak', 'punniyaraja', 'kandy', '13', '12', 'abi@gmail.com', '0815718385', 'A+', 'AB+'),
(4, 'jeeva', 'maheshwaran', 'asa', 'kandy', '23', 'fathimailma7@gmail.com', '0770076716', 'B-', 'A-');

-- --------------------------------------------------------

--
-- Table structure for table `out_stock_blood`
--

CREATE TABLE `out_stock_blood` (
  `id` int(11) NOT NULL,
  `bname` varchar(50) DEFAULT NULL,
  `bgroup` varchar(50) DEFAULT NULL,
  `mno` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `out_stock_blood`
--

INSERT INTO `out_stock_blood` (`id`, `bname`, `bgroup`, `mno`) VALUES
(1, 'JEEVA PRAKASH', 'A+', '2147483647'),
(2, 'JEEVA PRAKASH', 'A+', '2147483647'),
(3, 'JEEVA PRAKASH', 'A+', '2147483647'),
(4, '', 'A+', '0'),
(5, 'abisheak', 'A+', '815718385');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor_register`
--
ALTER TABLE `donor_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exchange_blood`
--
ALTER TABLE `exchange_blood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `out_stock_blood`
--
ALTER TABLE `out_stock_blood`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donor_register`
--
ALTER TABLE `donor_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `exchange_blood`
--
ALTER TABLE `exchange_blood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `out_stock_blood`
--
ALTER TABLE `out_stock_blood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
