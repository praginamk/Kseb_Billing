-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2024 at 05:41 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kseb`
--

-- --------------------------------------------------------

--
-- Table structure for table `purposes`
--

CREATE TABLE `purposes` (
  `id` int(11) NOT NULL,
  `purpose_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `purposes`
--

INSERT INTO `purposes` (`id`, `purpose_name`) VALUES
(1, 'Domestic');

-- --------------------------------------------------------

--
-- Table structure for table `tariffs`
--

CREATE TABLE `tariffs` (
  `id` int(11) NOT NULL,
  `tariff_name` varchar(50) DEFAULT NULL,
  `purpose` varchar(50) DEFAULT NULL,
  `billing_cycle` varchar(20) DEFAULT NULL,
  `phase` varchar(20) DEFAULT NULL,
  `range_start` int(11) DEFAULT NULL,
  `range_end` int(11) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tariffs`
--

INSERT INTO `tariffs` (`id`, `tariff_name`, `purpose`, `billing_cycle`, `phase`, `range_start`, `range_end`, `rate`) VALUES
(1, 'LT-1A', 'Domestic', '2 months', 'Single', 0, 50, '3.50'),
(2, 'LT-1A', 'Domestic', '2 months', 'Single', 51, 100, '4.20'),
(3, 'LT-1A', 'Domestic', '2 months', 'Single', 101, 150, '5.20'),
(4, 'LT-1A', 'Domestic', '2 months', 'Single', 151, 200, '5.80'),
(5, 'LT-1A', 'Domestic', '2 months', 'Single', 201, 250, '6.50'),
(6, 'LT-1A', 'Domestic', '2 months', 'Single', 0, 300, '5.95'),
(7, 'LT-1A', 'Domestic', '2 months', 'Single', 301, 350, '6.30'),
(8, 'LT-1A', 'Domestic', '2 months', 'Single', 351, 400, '6.45'),
(9, 'LT-1A', 'Domestic', '2 months', 'Single', 401, 500, '6.65'),
(10, 'LT-1A', 'Domestic', '2 months', 'Single', 501, NULL, '6.90');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purposes`
--
ALTER TABLE `purposes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tariffs`
--
ALTER TABLE `tariffs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purposes`
--
ALTER TABLE `purposes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tariffs`
--
ALTER TABLE `tariffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
