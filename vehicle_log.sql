-- phpMyAdmin SQL Dump
-- version 
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2023 at 09:09 PM
-- Server version: 5.7.36-39-log
-- PHP Version: 8.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yfowleba_vehicle_log`
--

-- --------------------------------------------------------

--
-- Table structure for table `fuel`
--

CREATE TABLE `fuel` (
  `fuel_id` int(12) NOT NULL,
  `vehicle_id` int(12) NOT NULL,
  `fuel_source` varchar(100) NOT NULL,
  `fuel_gallons` int(12) NOT NULL,
  `fuel_cost` decimal(10,2) NOT NULL,
  `fuel_mileage` decimal(10,1) NOT NULL,
  `fuel_date` date NOT NULL,
  `fuel_date_modified` datetime NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fuel`
--

INSERT INTO `fuel` (`fuel_id`, `vehicle_id`, `fuel_source`, `fuel_gallons`, `fuel_cost`, `fuel_mileage`, `fuel_date`, `fuel_date_modified`, `active`) VALUES
(1, 101, 'QuickTrip', 8, '22.00', '52020.0', '2023-03-03', '2023-03-10 13:40:02', b'1'),
(2, 101, 'Spinx', 9, '30.00', '52142.0', '2023-03-08', '2023-04-24 12:46:18', b'1'),
(3, 103, 'QuickTrip', 9, '22.00', '68502.0', '2023-03-09', '2023-04-24 12:49:10', b'1'),
(4, 105, 'Spinx', 12, '29.56', '53101.0', '2023-04-11', '2023-04-24 12:48:27', b'1'),
(5, 101, 'QuickTrip', 11, '25.20', '52475.0', '2023-03-30', '2023-04-24 12:47:29', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `maintenance_id` int(12) NOT NULL,
  `maintenance_type_id` int(12) NOT NULL,
  `vehicle_id` int(12) NOT NULL,
  `maintenance_vendor` varchar(100) NOT NULL,
  `maintenance_description` varchar(255) NOT NULL,
  `maintenance_vendor_address` varchar(255) NOT NULL,
  `maintenance_cost` decimal(10,2) NOT NULL,
  `maintenance_mileage` decimal(10,1) NOT NULL,
  `maintenance_date` date NOT NULL,
  `maintenance_date_modified` datetime NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`maintenance_id`, `maintenance_type_id`, `vehicle_id`, `maintenance_vendor`, `maintenance_description`, `maintenance_vendor_address`, `maintenance_cost`, `maintenance_mileage`, `maintenance_date`, `maintenance_date_modified`, `active`) VALUES
(1, 1, 101, 'Jiffy Lube', 'Change of oil and oil filter', '416 Pelham Rd.', '30.00', '52030.0', '2023-03-08', '2023-04-22 17:04:04', b'1'),
(2, 2, 101, 'Goodyear', 'Change 2 tires', '114 Milestone Way', '250.00', '52172.0', '2023-03-09', '2023-04-24 12:51:39', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_type`
--

CREATE TABLE `maintenance_type` (
  `maintenance_type_id` int(12) NOT NULL,
  `maintenance_type` varchar(255) NOT NULL,
  `date_modified` datetime NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintenance_type`
--

INSERT INTO `maintenance_type` (`maintenance_type_id`, `maintenance_type`, `date_modified`, `active`) VALUES
(1, 'Oil Change', '2023-03-04 19:03:41', b'1'),
(2, 'Tire Change', '2023-03-04 19:11:47', b'1'),
(3, 'Tire Rotation', '2023-04-20 16:33:39', b'1'),
(6, 'Brake Pad Replacement', '2023-03-05 17:39:32', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(12) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `login_id` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `user_role` varchar(26) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_last_login` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `login_id`, `user_password`, `email`, `user_role`, `date_created`, `date_last_login`, `date_modified`, `active`) VALUES
(1, 'First', 'Test', 'firsttest', '$2y$10$UsYiHyqiRV2jfjKxdPBOaOBJc.tg9IviL3EH6ibAXKcS2vns9UjxK', 'test@email.com', 'Admin', '2023-03-03 19:48:24', '2023-03-03 19:48:24', '2023-04-21 15:15:55', b'1'),
(3, 'Second', 'Test', 'secondtest', '$2y$10$yu0ZfjowXo/9wlsd4h1JgO9pOcsI1ShIMRlJTPD/3/adnuUVU4xwm', 'newtest@email.com', 'User', '2023-03-04 14:09:42', '2023-03-04 14:09:42', '2023-04-21 13:56:56', b'1'),
(4, 'Third', 'Test', 'thirdtest', '$2y$10$IF1bPa2pL/X8JSMjqVzcjOjZFidOOrozqw79U2MwCkTPalJ.y05.e', 'test@email.com', 'User', '2023-03-11 19:01:57', '2023-03-11 19:01:57', '2023-04-21 13:56:42', b'1'),
(5, 'basic', 'user', 'user', '$2y$10$uB2KRhRrmBqAFj5jblSf7u8etSjzZHw3F5dNaezE86Nuw6wkOHLAq', 'email@email.com', 'User', '2023-04-19 13:53:13', '2023-04-24 17:02:34', '2023-04-19 17:22:14', b'1'),
(6, 'CPT', '283', 'cpt283', '$2y$10$9DAxWiTe2rsRX.5v/Rawte12A0.m8g6dv29HYtWbFlv2MmTXisZkC', 'admin@email.com', 'Admin', '2023-04-19 14:34:59', '2023-04-24 17:02:23', '2023-04-19 17:14:19', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` int(12) NOT NULL,
  `vehicle_type` varchar(100) NOT NULL,
  `vehicle_make` varchar(100) NOT NULL,
  `vehicle_model` varchar(100) NOT NULL,
  `vehicle_year` int(4) NOT NULL,
  `vehicle_year_purchased` int(4) NOT NULL,
  `vehicle_color` varchar(50) NOT NULL,
  `vehicle_VIN` varchar(30) NOT NULL,
  `vehicle_license_tag` varchar(100) NOT NULL,
  `vehicle_license_state` varchar(50) NOT NULL,
  `vehicle_purchase_price` decimal(10,2) NOT NULL,
  `vehicle_purchase_mileage` decimal(10,1) NOT NULL,
  `date_edited` datetime DEFAULT NULL,
  `active` bit(1) DEFAULT b'1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `vehicle_type`, `vehicle_make`, `vehicle_model`, `vehicle_year`, `vehicle_year_purchased`, `vehicle_color`, `vehicle_VIN`, `vehicle_license_tag`, `vehicle_license_state`, `vehicle_purchase_price`, `vehicle_purchase_mileage`, `date_edited`, `active`) VALUES
(101, 'Compact', 'Toyota', 'Yaris iA', 2017, 2018, 'Blue', '3MYDLBYV7HY1675320', 'KTY345', 'South Carolina', '16998.00', '51802.0', '2023-04-24 14:47:53', b'1'),
(102, 'Crossover', 'Hyundai', 'Kona SE', 2019, 2021, 'Red', 'KM8K1CAA0KU439186', 'FPW365', 'Georgia', '17998.00', '70206.0', '2023-03-04 19:02:51', b'1'),
(103, 'Truck', 'Ford', 'F150 XL', 2013, 2018, 'White', '1FTEX1CM5DFB61508', 'DXW721', 'Florida', '21998.00', '68327.0', '2023-02-25 13:07:52', b'1'),
(104, 'Van', 'Toyota', 'Sienna LE', 2014, 2021, 'Red', '5TDKK3DC6ES473692', 'KTW973', 'Tennessee', '17998.00', '108519.0', '2023-02-16 18:26:10', b'1'),
(105, 'Van', 'Chrysler', 'Pacifica Touring', 2017, 2022, 'Silver', '2C4RC1DG9HR821616', 'DQR223', 'Florida', '22998.00', '52987.0', '2023-02-16 13:32:09', b'1'),
(106, 'Truck', 'GMC', 'Sierra 3500 Denali', 2018, 2022, 'Red', '1GT42YEY2JF226272', 'GHT574', 'Virginia', '64998.00', '42357.0', '2023-02-25 13:04:45', b'1'),
(109, 'Crossover', 'Volvo', 'XC90 T6 Momentum', 2016, 2021, 'Silver', 'YV4A22PK1G1085625', 'FRA174', 'South Carolina', '29998.00', '60205.0', '2023-03-04 14:15:33', b'1'),
(110, 'Truck', 'Beaumobile', 'Pickup', 1966, 1966, 'Pink', '0123456789', 'GTC-123', 'South Carolina', '47000.00', '14.0', '2023-03-05 13:34:50', b'0'),
(112, 'Sedan', 'Volvo', 'XC90 T6 Momentum', 2023, 2023, 'Silver', 'YV4A22PK1G1085625', 'FRA174', 'Alabama', '29998.00', '60205.0', '2023-04-21 14:06:37', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`fuel_id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`maintenance_id`);

--
-- Indexes for table `maintenance_type`
--
ALTER TABLE `maintenance_type`
  ADD PRIMARY KEY (`maintenance_type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fuel`
--
ALTER TABLE `fuel`
  MODIFY `fuel_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `maintenance_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `maintenance_type`
--
ALTER TABLE `maintenance_type`
  MODIFY `maintenance_type_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
