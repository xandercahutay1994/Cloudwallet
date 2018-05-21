-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2018 at 04:38 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cloudwallet`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_no` int(10) NOT NULL,
  `date_registered` varchar(35) NOT NULL,
  `total_current_bal` float NOT NULL,
  `total_sent_amt` float NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`account_id`, `user_id`, `account_no`, `date_registered`, `total_current_bal`, `total_sent_amt`, `status`) VALUES
(1, 1, 1207846251, 'February 27, 2018', 9800, 2000, 'ACTIVE'),
(2, 2, 1328054830, 'February 27, 2018', 3000, 900, 'ACTIVE'),
(3, 3, 1119919860, 'February 28, 2018', 2800, 100, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notify`
--

CREATE TABLE `tbl_notify` (
  `notify_id` int(11) NOT NULL,
  `receiver_no` int(11) NOT NULL,
  `sender_no` varchar(11) NOT NULL,
  `sendDate` varchar(35) NOT NULL,
  `sendTime` time NOT NULL,
  `sendAmount` float NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notify`
--

INSERT INTO `tbl_notify` (`notify_id`, `receiver_no`, `sender_no`, `sendDate`, `sendTime`, `sendAmount`, `status`) VALUES
(1, 1328054830, '1207846251', '02/28/2018', '16:58:00', 100, 1),
(2, 1328054830, '1207846251', '02/28/2018', '16:58:00', 800, 1),
(3, 1119919860, '1207846251', '02/28/2018', '16:58:00', 500, 0),
(4, 1207846251, '1328054830', '02/28/2018', '17:01:00', 700, 1),
(5, 1207846251, '1328054830', '02/28/2018', '17:01:00', 200, 1),
(6, 1119919860, '1207846251', '03/2/2018', '23:42:00', 200, 0),
(7, 1119919860, '1207846251', '03/2/2018', '23:43:00', 200, 0),
(8, 1328054830, '1119919860', '03/03/2018', '14:58:00', 100, 1),
(9, 1328054830, '1207846251', '03/03/2018', '14:59:00', 200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `transact_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `recipient_no` varchar(11) NOT NULL,
  `transactType` varchar(15) NOT NULL,
  `transactDate` varchar(35) NOT NULL,
  `transactTime` time NOT NULL,
  `transactAmt` float NOT NULL,
  `transactBalance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`transact_id`, `account_id`, `recipient_no`, `transactType`, `transactDate`, `transactTime`, `transactAmt`, `transactBalance`) VALUES
(1, 1, '-', 'D', '02/27/2018', '22:45:00', 0, 2000),
(2, 2, '-', 'D', '02/27/2018', '22:46:00', 0, 2000),
(3, 3, '-', 'D', '02/28/2018', '15:35:00', 0, 2000),
(4, 2, '1207846251', 'D', '02/28/2018', '16:58:00', 100, 2100),
(5, 1, '1328054830', 'W', '02/28/2018', '16:58:00', 100, 1900),
(6, 2, '1207846251', 'D', '02/28/2018', '16:58:00', 800, 2900),
(7, 1, '1328054830', 'W', '02/28/2018', '16:58:00', 800, 1100),
(8, 3, '1207846251', 'D', '02/28/2018', '16:58:00', 500, 2500),
(9, 1, '1119919860', 'W', '02/28/2018', '16:58:00', 500, 600),
(10, 2, '-', 'D', '02/28/2018', '16:59:00', 400, 3300),
(11, 1, '-', 'W', '02/28/2018', '17:00:00', 200, 400),
(12, 1, '1328054830', 'D', '02/28/2018', '17:01:00', 700, 1100),
(13, 2, '1207846251', 'W', '02/28/2018', '17:01:00', 700, 2600),
(14, 1, '1328054830', 'D', '02/28/2018', '17:01:00', 200, 1300),
(15, 2, '1207846251', 'W', '02/28/2018', '17:01:00', 200, 2400),
(16, 2, '-', 'D', '02/28/2018', '17:01:00', 100, 2500),
(17, 1, '-', 'D', '02/28/2018', '17:02:00', 100, 1400),
(18, 3, '1207846251', 'D', '03/02/2018', '23:42:00', 200, 2700),
(19, 1, '1119919860', 'W', '03/02/2018', '23:42:00', 200, 1200),
(20, 3, '1207846251', 'D', '03/02/2018', '23:43:00', 200, 2900),
(21, 1, '1119919860', 'W', '03/02/2018', '23:43:00', 200, 1000),
(22, 1, '-', 'D', '03/03/2018', '12:48:00', 500, 1500),
(23, 1, '-', 'D', '03/03/2018', '13:45:00', 400, 1900),
(24, 2, '1119919860', 'D', '03/03/2018', '14:58:00', 100, 2600),
(25, 3, '1328054830', 'W', '03/03/2018', '14:58:00', 100, 2800),
(26, 2, '1207846251', 'D', '03/03/2018', '14:59:00', 200, 2800),
(27, 1, '1328054830', 'W', '03/03/2018', '14:59:00', 200, 1700),
(28, 1, '-', 'D', '03/09/2018', '20:56:00', 200, 1900),
(29, 1, '-', 'D', '03/09/2018', '20:56:00', 200, 2100),
(30, 1, '-', 'D', '03/10/2018', '01:15:00', 200, 200),
(31, 1, '-', 'D', '03/10/2018', '01:19:00', 100, 300),
(32, 1, '-', 'D', '03/10/2018', '01:20:00', 100, 400),
(33, 1, '-', 'D', '03/10/2018', '01:20:00', 100, 500),
(34, 1, '-', 'D', '03/10/2018', '01:20:00', 500, 1000),
(35, 1, '-', 'W', '03/10/2018', '01:21:00', 1000, 0),
(36, 1, '-', 'D', '03/10/2018', '01:21:00', 100, 100),
(37, 1, '-', 'W', '03/12/2018', '18:47:00', 100, 0),
(38, 1, '-', 'D', '03/12/2018', '18:48:00', 1000, 1000),
(39, 1, '-', 'D', '03/12/2018', '18:48:00', 2000, 3000),
(40, 1, '-', 'D', '03/12/2018', '18:48:00', 2000, 5000),
(41, 1, '-', 'D', '03/12/2018', '18:48:00', 2000, 7000),
(42, 1, '-', 'D', '03/12/2018', '18:48:00', 2000, 9000),
(43, 1, '-', 'D', '03/12/2018', '18:48:00', 1000, 10000),
(44, 2, '-', 'D', '03/25/2018', '12:00:00', 200, 3000),
(45, 1, '-', 'W', '04/30/2018', '22:41:00', 200, 9800);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_lastname` varchar(50) NOT NULL,
  `user_firstname` varchar(50) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_lastname`, `user_firstname`, `user_username`, `user_password`) VALUES
(1, 'Cahutay', 'Alexander Alan', 'admin', 'alexgwapo05'),
(2, 'Aliguen', 'Angelica', 'angelica', 'aliguen23'),
(3, 'Fariolen', 'Kevan', 'kevan', 'kevangwapo12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `tbl_notify`
--
ALTER TABLE `tbl_notify`
  ADD PRIMARY KEY (`notify_id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`transact_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_notify`
--
ALTER TABLE `tbl_notify`
  MODIFY `notify_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `transact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
