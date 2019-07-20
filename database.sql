-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2019 at 02:52 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cycleclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` int(11) NOT NULL,
  `name` varchar(1100) NOT NULL,
  `image` varchar(1100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(1100) NOT NULL,
  `email` varchar(1100) NOT NULL,
  `password` varchar(1100) NOT NULL,
  `type` varchar(1100) NOT NULL,
  `addon` varchar(1100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `type`, `addon`, `status`) VALUES
(1, 'Admin 1', 'temp@admin.com', 'Admin', 'SuperAdmin', '[]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `uid` varchar(1100) NOT NULL,
  `name` varchar(1100) NOT NULL,
  `phone` varchar(1100) NOT NULL,
  `type` varchar(1100) NOT NULL,
  `service` varchar(1100) NOT NULL,
  `address` mediumtext NOT NULL,
  `date` varchar(1100) NOT NULL,
  `scratches` tinyint(1) NOT NULL,
  `addons` mediumtext NOT NULL,
  `status` int(11) NOT NULL,
  `intresedlnsurence` tinyint(1) NOT NULL,
  `intresedNewBike` tinyint(1) NOT NULL,
  `sign` varchar(1100) DEFAULT NULL,
  `driverId` varchar(1100) DEFAULT NULL,
  `trackingId` varchar(1100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `uid`, `name`, `phone`, `type`, `service`, `address`, `date`, `scratches`, `addons`, `status`, `intresedlnsurence`, `intresedNewBike`, `sign`, `driverId`, `trackingId`) VALUES
(6, 'jdqrI9zmG7MQHxLOJ93wAbb1mZy2', 'New customer', '+919328486441', 'Geared', 'Safety', 'B7 bhadralok bunglow\nborbhatha road\nankleshwar', 'Wed Jul 03 21:10:14 GMT+05:30 2019', 0, '[0, 2]', 3, 0, 0, NULL, NULL, NULL),
(2, 'vNHRsKL7wpacjHoVXh2PXkqc2hF2', 'kartik', '+919328486441', 'Geared', 'Safety', 'b7 bhadralok bungalow\nborbhatha road\nAnkleshwar', 'Tue Jun 25 00:15:38 GMT+05:30 2019', 0, '[4, 2]', 5, 0, 1, NULL, NULL, NULL),
(3, 'vNHRsKL7wpacjHoVXh2PXkqc2hF2', 'Margi patel', '+911234567890', 'Geared', 'Safety', 'somewhere\non\nearth', 'Tue Jun 25 03:25:37 GMT+05:30 2019', 0, '[]', 1, 0, 0, NULL, NULL, NULL),
(7, 'cHYS6637zgQk1Muudlp8M1sRSKR2', 'police report', '9888499375', 'Geared', 'Safety', 'njkklooooo\nljhuiiiiiiioooh\nbbll', 'Mon Jul 01 20:25:57 GMT+05:30 2019', 0, '[3, 2, 1]', 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `did` varchar(1100) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`id`, `sid`, `did`, `latitude`, `longitude`) VALUES
(1, 0, '', 0, 0),
(2, 0, '', 0, 0),
(3, 0, '', 0, 0),
(4, 0, '', 0, 0),
(5, 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(1000) NOT NULL,
  `name` varchar(1100) NOT NULL,
  `email` varchar(1100) NOT NULL,
  `address` varchar(1100) NOT NULL,
  `phoneNumber` varchar(1100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `address`, `phoneNumber`, `status`) VALUES
('vNHRsKL7wpacjHoVXh2PXkqc2hF2', 'Kartik Patel', 'spidy0471@gmail.com', 'b7 bhadralok bungalow borbhatha road Ankleshwar', '+916352122123', 1),
('jndchd', 'div', 'greatdivyanhsu59@gmailc.om', 'bhimra', '9410335478', 0),
('adnjnjds', 'hello', 'someone@gmsil.com', 'helloAddress', '9410337845', 0),
('adnjnsfsfjds', ' Hii', 'someone@gmsil.com', 'helloAddress', '9410337845', 0),
('12cdwwf32', 'Kartik Patel', 'patelkartik1910@gmail.com', 'b7 bhadralok bunglow\nBorbhatha road\nAnkleshwar', '', 0),
('as', 'hello', 'someone@gmsil.com', 'helloAddress', '9410337845', 0),
('asgs', 'hello', 'someone@gmsil.com', 'helloAddress', '9410337845', 0),
('12cdwwf31', 'Kartik Patel', 'patelkartik1910@gmail.com', 'b7 bhadralok bunglow\nBorbhatha road\nAnkleshwar', '', 0),
('12cdwwf34', 'Kartik Patel', 'patelkartik1910@gmail.com', 'b7 bhadralok bunglow\nBorbhatha road\nAnkleshwar', '+916352122123', 0),
('jdqrI9zmG7MQHxLOJ93wAbb1mZy2', 'Kartik Patel', 'patelkartik1910@gmail.com', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
