-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 07, 2022 at 07:04 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dairy`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `r_f_no` varchar(50) NOT NULL,
  `r_kg` float NOT NULL,
  `r_dt` timestamp NOT NULL DEFAULT current_timestamp(),
  `r_deliverer` varchar(50) DEFAULT NULL,
  `rate` float NOT NULL COMMENT 'sh per kg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `r_f_no`, `r_kg`, `r_dt`, `r_deliverer`, `rate`) VALUES
(2, '49', 66, '2022-03-07 16:33:46', '', 15),
(4, '456785', 5, '2022-02-27 18:08:24', 'tty', 10),
(5, '66', 7, '2022-03-07 16:25:24', 'jane', 10),
(33, '78', 12, '2022-02-28 17:55:39', '', 10);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `e_name` varchar(50) NOT NULL,
  `e_mail` varchar(50) DEFAULT NULL,
  `e_pass` varchar(50) NOT NULL,
  `e_role` varchar(50) DEFAULT NULL,
  `e_payroll_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `e_name`, `e_mail`, `e_pass`, `e_role`, `e_payroll_no`) VALUES
(3, 'ken', 'ken@gmail.com', 'd6172cee82aa0cd1e610aacab528f240', 'Supervisor', ''),
(10, 'vincent vinny', 'vinnnyuser@gmail.com', '52fee26031644aacd7c23ade329939f0', 'Manager', '7777'),
(11, 'name', 'name@gmail.com', '5f25b6a0b984f370afd14aebc3140226', 'Supervisor', '1234564567');

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `f_no` varchar(50) NOT NULL,
  `f_id` text NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `f_locallity` varchar(50) DEFAULT NULL,
  `f_ac` varchar(50) DEFAULT NULL,
  `last_paid` date DEFAULT NULL,
  `f_phone` varchar(20) DEFAULT NULL,
  `f_photo` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`f_no`, `f_id`, `f_name`, `f_locallity`, `f_ac`, `last_paid`, `f_phone`, `f_photo`) VALUES
('452345', '09876543', 'bart', 'fg', '23', '2022-02-02', '0987363633', NULL),
('456785', '4456754457', 'DANIEL', 'KE', '4213', '2013-05-26', '2467', ''),
('49', '4456754', 'Michael Muasya musyimi', 'mungoni centre', '9890485', '2013-04-30', '2023586', ''),
('66', '670065', 'Jaames', 'kk', '6790875', '2013-04-30', '0987654', ''),
('675', '44567543', 'Michael Muasya musyimi', 'mungoni centre', '6790875', '2013-04-30', '2023586', NULL),
('777', '7897389', 'Eva Nkatha', 'Njaina', '2345678', '2013-05-25', '900', NULL),
('777777777', '0000000000', 'kigogo', 'jjjjjjjjjj', '11111111111111111', '2022-02-14', '999999999', NULL),
('78', '2345678', 'ombaki', 'thika', '1234567890', NULL, '123456789', NULL),
('8', '99', 'joy kanampiu', 'kibumbu', '879273', '2013-04-30', '09278', ''),
('8458458', '445', 'ggg', 'eer', '23', '2022-03-06', '344', NULL),
('86', '34257', 'Timothy ndegwa', 'mungoni centre', '7178110987', '2013-05-26', '67895', NULL),
('88888888888888888888', '246890', 'Henry Muthee', 'Kibumbu', '3456423', '2013-04-30', '0987654', NULL),
('900', '454', 'Leonard Mabo', '12', '346743', '2013-04-30', '22', ''),
('9001', '22908070', 'Martin Ireri', 'Njaina', '459141241', '2022-03-06', '+254722339900', NULL),
('901', '451', 'Jane Kobi', 'Thika', '34624', '2013-04-30', '78342', ''),
('9876543', '09876543', 'bart', 'kiambu', '2345678998765432', '2022-03-06', '0987654323456', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `p_to` varchar(50) NOT NULL,
  `p_date` date NOT NULL,
  `p_ac` bigint(20) NOT NULL,
  `p_method` varchar(30) NOT NULL,
  `p_transaction_code` int(11) NOT NULL COMMENT 'Bank or Mpesa confirmation or receipt no',
  `p_transacted_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings_rates`
--

CREATE TABLE `settings_rates` (
  `id` int(11) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `rate` float NOT NULL COMMENT 'sh per kg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings_rates`
--

INSERT INTO `settings_rates` (`id`, `from`, `to`, `rate`) VALUES
(4, '2013-01-01', '2013-01-31', 20),
(5, '2013-03-01', '2013-03-31', 6),
(7, '2022-03-07', '2022-03-08', 15),
(8, '2022-03-07', '2022-02-28', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r_f_no` (`r_f_no`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `e_name` (`e_name`),
  ADD UNIQUE KEY `e_payroll_no_2` (`e_payroll_no`),
  ADD KEY `e_payroll_no` (`e_payroll_no`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`f_no`),
  ADD KEY `f_no` (`f_no`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_to` (`p_to`),
  ADD KEY `p_transacted_by` (`p_transacted_by`);

--
-- Indexes for table `settings_rates`
--
ALTER TABLE `settings_rates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `settings_rates`
--
ALTER TABLE `settings_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`r_f_no`) REFERENCES `farmers` (`f_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`p_transacted_by`) REFERENCES `employees` (`e_payroll_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`p_to`) REFERENCES `farmers` (`f_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
