-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 08, 2020 at 05:16 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hire_truck_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_info`
--

CREATE TABLE `account_info` (
  `Ac_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `balance` float NOT NULL,
  `S_id` int(10) NOT NULL,
  `T_id` int(10) NOT NULL,
  `atm_no` decimal(20,0) NOT NULL,
  `expiry` varchar(10) NOT NULL,
  `cvv` int(10) NOT NULL,
  `extra` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_info`
--

INSERT INTO `account_info` (`Ac_id`, `name`, `balance`, `S_id`, `T_id`, `atm_no`, `expiry`, `cvv`, `extra`) VALUES
(4, 'mediator', 44500, 0, 0, '5196439812348898', '9', 231, '0'),
(5, 'akshat', 44500, 2, 0, '5196234467843212', '08/20', 512, '0'),
(6, 'LogImp', 44500, 0, 16, '5196784434567812', '08/21', 735, '0');

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

CREATE TABLE `ad` (
  `AD_id` int(10) NOT NULL,
  `S_id` int(10) NOT NULL,
  `Source_ad` varchar(50) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `luggage` varchar(50) NOT NULL,
  `type_luggage` varchar(50) NOT NULL,
  `weight` decimal(20,0) NOT NULL,
  `price` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `order_date` date NOT NULL,
  `vehicle_type` varchar(200) NOT NULL,
  `add_requirement` varchar(200) NOT NULL,
  `ad_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad`
--

INSERT INTO `ad` (`AD_id`, `S_id`, `Source_ad`, `destination`, `luggage`, `type_luggage`, `weight`, `price`, `status`, `order_date`, `vehicle_type`, `add_requirement`, `ad_date`) VALUES
(16, 7, 'Udupi', 'Mangalore', 'Hard', 'Heavy Items', '20', 10000, 0, '2020-02-07', '4-Wheel,Close', 'test', '2020-02-29'),
(17, 7, 'Manipal', 'Kumta', 'Soft', 'House Hold', '2', 1000, 1, '2020-02-06', '4-Wheel', 'erwr', '2020-02-07'),
(18, 7, 'Items', 'Mangalore', 'Soft', 'Glass', '24', 5000, 1, '2333-03-12', '4-Wheel,Open', 't', '2020-02-07'),
(19, 7, 'Bangalore', 'Mangalore', 'Hard', 'Furniture', '12', 11998, 1, '2020-02-14', '4-Wheel', 'Rope', '2020-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Adm_id` int(10) NOT NULL,
  `Adm_mail` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `P_status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Adm_id`, `Adm_mail`, `password`, `P_status`) VALUES
(1, 'admin', '1234', 1),
(2, 'police@guj.co.in', 'policeguj', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ad_ref`
--

CREATE TABLE `ad_ref` (
  `Ad_id` int(11) NOT NULL,
  `destiantion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `B_id` int(10) NOT NULL,
  `Ad_id` int(11) NOT NULL,
  `B_status` tinyint(1) NOT NULL DEFAULT 0,
  `bid_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`B_id`, `Ad_id`, `B_status`, `bid_price`) VALUES
(39, 16, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bid_items`
--

CREATE TABLE `bid_items` (
  `bidId` int(11) NOT NULL,
  `adId` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `bid_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bid_items`
--

INSERT INTO `bid_items` (`bidId`, `adId`, `status`, `userId`, `bid_price`) VALUES
(5, 16, 0, 18, 12),
(6, 16, 1, 19, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `bid_ref`
--

CREATE TABLE `bid_ref` (
  `B_id` int(11) NOT NULL,
  `T_id` int(11) NOT NULL,
  `T-org_name` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `date` date NOT NULL,
  `Bid_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c_feedback`
--

CREATE TABLE `c_feedback` (
  `f_id` int(10) NOT NULL,
  `F_mail` varchar(50) NOT NULL,
  `F_msg` varchar(200) NOT NULL,
  `F_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deal`
--

CREATE TABLE `deal` (
  `D_id` int(10) NOT NULL,
  `Ad_id` int(11) NOT NULL,
  `S_id` int(11) NOT NULL,
  `T_id` int(11) NOT NULL,
  `B_id` int(11) NOT NULL,
  `conform_date` date NOT NULL,
  `price` int(10) NOT NULL,
  `d_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `deal`
--
DELIMITER $$
CREATE TRIGGER `update_deal` AFTER UPDATE ON `deal` FOR EACH ROW BEGIN
    INSERT INTO trigger_deal SET D_id = NEW.D_id,
			Ad_id= NEW.Ad_id,
			S_id= NEW.S_id,
			T_id= NEW.T_id,
			B_id= NEW.B_id,
			conform_date= NEW.conform_date,
			price= NEW.price,
			D_status= NEW.d_status,
			update_date=NOW();

    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `deal_dtails`
--

CREATE TABLE `deal_dtails` (
  `Dd_id` int(10) NOT NULL,
  `Ad_id` int(10) NOT NULL,
  `S_id` int(10) NOT NULL,
  `D_id` int(10) NOT NULL,
  `R_name` varchar(200) NOT NULL DEFAULT '',
  `R_number` bigint(10) NOT NULL,
  `R_mail` varchar(200) NOT NULL,
  `T_id` int(10) NOT NULL,
  `PASSCODE` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'active'),
(2, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `status_payment`
--

CREATE TABLE `status_payment` (
  `Sp_id` int(10) NOT NULL,
  `D_id` int(10) NOT NULL,
  `S_id` int(10) NOT NULL,
  `T_id` int(10) NOT NULL,
  `Ad_id` int(10) NOT NULL,
  `amount` float NOT NULL,
  `R_response` int(10) NOT NULL,
  `date` date NOT NULL,
  `Ac_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `st_feedback`
--

CREATE TABLE `st_feedback` (
  `U_id` int(10) NOT NULL,
  `msg` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `Status_id` int(10) NOT NULL,
  `D_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_s`
--

CREATE TABLE `user_s` (
  `S_id` int(10) NOT NULL,
  `S_fname` varchar(50) NOT NULL,
  `S_lname` varchar(50) NOT NULL,
  `S_mail` varchar(50) NOT NULL,
  `S_mnumber` bigint(30) NOT NULL,
  `S_address` varchar(200) NOT NULL,
  `S_password` varchar(200) NOT NULL,
  `S_security_question` varchar(50) NOT NULL,
  `S_security_answer` varchar(200) NOT NULL,
  `S_status` tinyint(1) NOT NULL DEFAULT 2,
  `S_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_s`
--

INSERT INTO `user_s` (`S_id`, `S_fname`, `S_lname`, `S_mail`, `S_mnumber`, `S_address`, `S_password`, `S_security_question`, `S_security_answer`, `S_status`, `S_active`) VALUES
(1, 'Parmar', 'Viral', 'parmarviral93@gmail.com', 1, 'Talaja, Bhavanagar', 'd163e820', '', '', 2, 0),
(2, 'Akshat', 'Soni', 'akshatsoni64@gmial.com', 5, 'Ahemedabad', '12345', 'What is your favourite food?', 'Vadapav', 2, 0),
(3, 'viral', 'Parmar', 'ply4game@gmail.com', 2147483647, 'talaja ', '7eb1b2dc', 'What is your first Mobile modal?', 'J7', 2, 0),
(7, 'Jabeed', 'Ahmed', 'shipper@test.com', 9886746058, 'Near Vijaya Bank', '1234', 'What is your favourite place?', 'Idli', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_t`
--

CREATE TABLE `user_t` (
  `T_id` int(10) NOT NULL,
  `T_org_name` varchar(50) NOT NULL,
  `T_owner_name` varchar(50) NOT NULL,
  `T_mail` varchar(100) NOT NULL,
  `T_address` varchar(200) NOT NULL,
  `Type_of_vehicle` varchar(100) NOT NULL,
  `T_number` bigint(20) NOT NULL,
  `T_anumber` bigint(20) NOT NULL,
  `T_no_vehicle` int(10) NOT NULL,
  `T_service` varchar(200) NOT NULL,
  `T_password` varchar(200) NOT NULL,
  `T_security_question` varchar(50) NOT NULL,
  `T_security_answer` varchar(200) NOT NULL,
  `T_status` tinyint(1) NOT NULL DEFAULT 2,
  `T_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_t`
--

INSERT INTO `user_t` (`T_id`, `T_org_name`, `T_owner_name`, `T_mail`, `T_address`, `Type_of_vehicle`, `T_number`, `T_anumber`, `T_no_vehicle`, `T_service`, `T_password`, `T_security_question`, `T_security_answer`, `T_status`, `T_active`) VALUES
(16, 'LogImp', 'Prince Shah', 'sp@gmail.com', 'Bhuj', 'Open Truck', 2, 40212101, 1201245, 'Bhavanagar', '74a318d5', '', '', 2, 0),
(17, 'sakti trucks', 'dinesh makwana', 'Sp26n12@gmail.com', 'dhorka', '6-wheel,8-wheel', 7096942284, 799042, 12, 'mumbai,ahmedabad,surat', '12345678', '', '', 2, 0),
(18, 'Carrier', 'Carrier', 'carrier@test.com', 'test', 'Truck', 8736273278, 8736273278, 4, 'test', '1234', 'What is your favourite food?', 'ildi', 2, 0),
(19, 'Udupi Carrier', 'Madesha', 'madesha@carrier.com', 'Near Vijaya Bank', 'Truck', 9886746058, 9886746058, 12, 'Loading', '1234', 'What is your favourite food?', 'Idli', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_info`
--
ALTER TABLE `account_info`
  ADD PRIMARY KEY (`Ac_id`),
  ADD KEY `T_id` (`T_id`),
  ADD KEY `S_id` (`S_id`);

--
-- Indexes for table `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`AD_id`),
  ADD UNIQUE KEY `adid` (`AD_id`) USING BTREE,
  ADD KEY `S_id` (`S_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Adm_id`);

--
-- Indexes for table `ad_ref`
--
ALTER TABLE `ad_ref`
  ADD KEY `Ad_id` (`Ad_id`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`B_id`),
  ADD KEY `bid_ibfk_1` (`Ad_id`);

--
-- Indexes for table `bid_items`
--
ALTER TABLE `bid_items`
  ADD PRIMARY KEY (`bidId`);

--
-- Indexes for table `bid_ref`
--
ALTER TABLE `bid_ref`
  ADD PRIMARY KEY (`Bid_id`),
  ADD UNIQUE KEY `T_id_2` (`T_id`),
  ADD KEY `B_id` (`B_id`),
  ADD KEY `T_id` (`T_id`);

--
-- Indexes for table `c_feedback`
--
ALTER TABLE `c_feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `deal`
--
ALTER TABLE `deal`
  ADD PRIMARY KEY (`D_id`),
  ADD KEY `Ad_id` (`Ad_id`),
  ADD KEY `S_id` (`S_id`),
  ADD KEY `T_id` (`T_id`),
  ADD KEY `B_id` (`B_id`);

--
-- Indexes for table `deal_dtails`
--
ALTER TABLE `deal_dtails`
  ADD PRIMARY KEY (`Dd_id`),
  ADD KEY `Ad_id` (`Ad_id`),
  ADD KEY `S_id` (`S_id`),
  ADD KEY `T_id` (`T_id`),
  ADD KEY `D_id` (`D_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_payment`
--
ALTER TABLE `status_payment`
  ADD PRIMARY KEY (`Sp_id`),
  ADD KEY `Ad_id` (`Ad_id`),
  ADD KEY `D_id` (`D_id`),
  ADD KEY `S_id` (`S_id`),
  ADD KEY `T_id` (`T_id`),
  ADD KEY `Ac_id` (`Ac_id`);

--
-- Indexes for table `user_s`
--
ALTER TABLE `user_s`
  ADD PRIMARY KEY (`S_id`);

--
-- Indexes for table `user_t`
--
ALTER TABLE `user_t`
  ADD PRIMARY KEY (`T_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_info`
--
ALTER TABLE `account_info`
  MODIFY `Ac_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ad`
--
ALTER TABLE `ad`
  MODIFY `AD_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Adm_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `B_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `bid_items`
--
ALTER TABLE `bid_items`
  MODIFY `bidId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bid_ref`
--
ALTER TABLE `bid_ref`
  MODIFY `Bid_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `c_feedback`
--
ALTER TABLE `c_feedback`
  MODIFY `f_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deal`
--
ALTER TABLE `deal`
  MODIFY `D_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deal_dtails`
--
ALTER TABLE `deal_dtails`
  MODIFY `Dd_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_payment`
--
ALTER TABLE `status_payment`
  MODIFY `Sp_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_s`
--
ALTER TABLE `user_s`
  MODIFY `S_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_t`
--
ALTER TABLE `user_t`
  MODIFY `T_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ad`
--
ALTER TABLE `ad`
  ADD CONSTRAINT `ad_ibfk_1` FOREIGN KEY (`S_id`) REFERENCES `user_s` (`S_id`);

--
-- Constraints for table `ad_ref`
--
ALTER TABLE `ad_ref`
  ADD CONSTRAINT `ad_ref_ibfk_1` FOREIGN KEY (`Ad_id`) REFERENCES `ad` (`AD_id`);

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`Ad_id`) REFERENCES `ad` (`AD_id`);

--
-- Constraints for table `bid_ref`
--
ALTER TABLE `bid_ref`
  ADD CONSTRAINT `bid_ref_ibfk_1` FOREIGN KEY (`B_id`) REFERENCES `bid` (`B_id`),
  ADD CONSTRAINT `bid_ref_ibfk_2` FOREIGN KEY (`T_id`) REFERENCES `user_t` (`T_id`),
  ADD CONSTRAINT `bid_ref_ibfk_3` FOREIGN KEY (`B_id`) REFERENCES `bid` (`B_id`);

--
-- Constraints for table `deal`
--
ALTER TABLE `deal`
  ADD CONSTRAINT `deal_ibfk_1` FOREIGN KEY (`Ad_id`) REFERENCES `ad` (`AD_id`),
  ADD CONSTRAINT `deal_ibfk_2` FOREIGN KEY (`B_id`) REFERENCES `bid` (`B_id`),
  ADD CONSTRAINT `deal_ibfk_3` FOREIGN KEY (`S_id`) REFERENCES `user_s` (`S_id`),
  ADD CONSTRAINT `deal_ibfk_4` FOREIGN KEY (`T_id`) REFERENCES `user_t` (`T_id`);

--
-- Constraints for table `deal_dtails`
--
ALTER TABLE `deal_dtails`
  ADD CONSTRAINT `deal_dtails_ibfk_1` FOREIGN KEY (`Ad_id`) REFERENCES `ad` (`AD_id`),
  ADD CONSTRAINT `deal_dtails_ibfk_2` FOREIGN KEY (`S_id`) REFERENCES `user_s` (`S_id`),
  ADD CONSTRAINT `deal_dtails_ibfk_3` FOREIGN KEY (`T_id`) REFERENCES `user_t` (`T_id`),
  ADD CONSTRAINT `deal_dtails_ibfk_4` FOREIGN KEY (`D_id`) REFERENCES `deal` (`D_id`);

--
-- Constraints for table `status_payment`
--
ALTER TABLE `status_payment`
  ADD CONSTRAINT `status_payment_ibfk_1` FOREIGN KEY (`Ad_id`) REFERENCES `ad` (`AD_id`),
  ADD CONSTRAINT `status_payment_ibfk_2` FOREIGN KEY (`D_id`) REFERENCES `deal` (`D_id`),
  ADD CONSTRAINT `status_payment_ibfk_3` FOREIGN KEY (`S_id`) REFERENCES `user_s` (`S_id`),
  ADD CONSTRAINT `status_payment_ibfk_4` FOREIGN KEY (`T_id`) REFERENCES `user_t` (`T_id`),
  ADD CONSTRAINT `status_payment_ibfk_5` FOREIGN KEY (`Ac_id`) REFERENCES `account_info` (`Ac_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
