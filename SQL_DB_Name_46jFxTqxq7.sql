-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 06, 2022 at 02:31 PM
-- Server version: 8.0.13-4
-- PHP Version: 7.2.24-0ubuntu0.18.04.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `46jFxTqxq7`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `aid` int(10) UNSIGNED NOT NULL,
  `aname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `aemail` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `apassword` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `anumber` int(10) NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`aid`, `aname`, `aemail`, `apassword`, `anumber`, `description`) VALUES
(1, 'Mahindra', 'mahindra@mahindra.com', '8777777', 12345678, 'We are distributor of cars.'),
(2, 'Mercedes', 'mercedes@benz', '1234567', 12345678, 'We are global distributor.'),
(3, 'Tesla', 'tesla@com', '12345', 12345612, 'Best company.'),
(4, 'tata', 'tata@com', '1233', 12341234, 'tata tata tata.'),
(5, 'Maruti Suzuki', 'official@maruti.com', '2323232', 98789878, 'Automobile Industry from decades.'),
(6, 'Hyundai', 'official@hyundai', '12345123', 11111111, 'Hyundai Hyundai'),
(7, 'Ford', 'official@ford', '2323232', 90909090, 'Long Lasting ahead');

-- --------------------------------------------------------

--
-- Table structure for table `bookedcars`
--

CREATE TABLE `bookedcars` (
  `vid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `dayss` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookedcars`
--

INSERT INTO `bookedcars` (`vid`, `cid`, `aid`, `startdate`, `dayss`) VALUES
(2, 1, 2, '2022-09-05', 3),
(8, 8, 2, '2022-09-08', 4);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(10) UNSIGNED NOT NULL,
  `cname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cemail` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cpassword` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `cname`, `cemail`, `cpassword`, `phonenumber`) VALUES
(1, 'Gagan', 'gagan@gmail.com', 'gagan', 1234567890),
(2, 'Ayush', 'aysuh@gmail.com', 'aysuh@gmail.com', 1212343456),
(7, 'siri', 'siri@gmail.com', '1', 12),
(8, 'Ram', 'ram@gmail.com', '23234545', 978456123);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vid` int(11) NOT NULL,
  `vmodel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `vnumber` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `seatingcapacity` tinyint(4) NOT NULL,
  `rentperday` smallint(6) NOT NULL,
  `imagelink` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `aid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vid`, `vmodel`, `vnumber`, `seatingcapacity`, `rentperday`, `imagelink`, `aid`) VALUES
(1, 'i10', 'RJ06-87-9013', 4, 1000, 'assets/images/offer-1-720x480.jpg', 1),
(2, 'Scorpio', 'MH09-23-9234', 7, 2000, 'assets/images/offer-2-720x480.jpg', 2),
(3, 'ThunderBoltz', 'CH90-33-3333', 5, 4500, 'assets/images/offer-4-720x480.jpg', 4),
(4, 'Innova', 'US01-01-0001', 8, 1800, 'assets/images/offer-6-720x480.jpg', 3),
(5, 'Baleno', 'RG09-87-0000', 5, 2100, 'assets/images/offer-3-720x480.jpg', 1),
(6, 'Ertiga', 'RJ23-59-1122', 8, 2500, 'assets/images/product-6-720x480.jpg', 4),
(7, 'Tiago', 'AB03-10-2323', 4, 1000, 'assets/images/product-5-720x480.jpg', 4),
(8, 'Jaguar', 'US11-11-0000', 2, 6000, 'assets/images/product-4-720x480.jpg', 2),
(9, 'SUVs', 'RR00-11-1010', 4, 5500, 'assets/images/offer-5-720x480.jpg', 2),
(10, 'EcoSport', 'GJ01-01-2222', 6, 2200, 'assets/images/product-1-720x480.jpg', 7),
(11, 'Survival', 'FG09-45-6667', 8, 3000, 'assets/images/product-3-720x480.jpg', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `aemail` (`aemail`);

--
-- Indexes for table `bookedcars`
--
ALTER TABLE `bookedcars`
  ADD PRIMARY KEY (`vid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `cemail` (`cemail`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vid`),
  ADD UNIQUE KEY `vnumber` (`vnumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agency`
--
ALTER TABLE `agency`
  MODIFY `aid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
