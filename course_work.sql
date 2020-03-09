-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2019 at 12:27 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13
CREATE DATABASE IF NOT EXISTS `course_work` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `course_work`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `acc_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `other_name` varchar(50) DEFAULT NULL,
  `account_number` varchar(50) NOT NULL,
  `balance` varchar(100) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `first_name`, `last_name`, `other_name`, `account_number`, `balance`, `account_name`, `email`, `admin_username`, `date_created`) VALUES
(1, 'Paul ', 'Kunda', '', 'PE48517RBS', '210900', 'Paul Kunda', 'paul@gmail.com', 'admin', '2019-05-23'),
(2, 'Joseph', 'Kunda', 'Zulu', 'PE87370RBS', '1700', 'Zulu Kunda', 'a@b.c', 'admin', '2019-05-25'),
(3, 'Evans', 'Chongo', 'Chomba', 'PE59687RBS', '6000', 'Evans C. Chongo', 'evans@banking.com', 'admin', '2019-05-28'),
(4, 'Mwamba', 'Changala', '', 'PE31848RBS', '9450', 'Mwamba  Changala', 'mwamba@banking.com', 'admin', '2019-05-30'),
(5, 'Joseph', 'Mwanza', '', 'PE30733RBS', '4450', 'Joseph Mwanza', 'joseph@banking.com', 'admin', '2019-05-30'),
(6, 'Kasolo', 'Mwabwe', '', 'PE76361RBS', '40', 'Kasolo Mwabwe', 'kasolo@banking.com', 'admin', '2019-05-20'),
(7, 'Raphael ', 'Chola', '', 'PE68129RBS', '3100', 'Rapheal Chola', 'rapheal@banking.com', 'admin', '2019-05-21'),
(8, 'Silas ', 'Phiri', '', 'PE43240RBS', '3000', 'Silas Phiri', 'silas@banking.com', 'admin', '2019-06-03'),
(9, 'Sitali', 'Nasilele', '', 'PE36591RBS', '4500', 'Sitali Nasilele', 'sitali@bankinig.com', 'admin', '2019-06-03'),
(10, 'Macmillian', 'Simfukwe', '', 'PE27783RBS', '1600', 'Macmillian SImfukwe', 'simfukwe@banking.com', 'admin', '2019-06-04'),
(11, 'Gomez', 'Isaac', '', 'PE42690RBS', '999800000', 'Gomez Isaacs', 'gome@banking.com', 'admin', '2019-06-05'),
(12, 'Willmoti', 'Banda', '', 'PE95913RBS', '4400', 'Willmoti Banda', 'willmoti@banking.com', 'admin', '2019-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `full_name`, `password`) VALUES
(1, 'admin', 'admin root', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `password_changed` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `email`, `password`, `password_changed`) VALUES
(1, 'paul@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(5, 'a@b.c', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(6, 'mwamba@banking.com', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(7, 'evans@banking.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(8, 'joseph@banking.com', '202cb962ac59075b964b07152d234b70', 1),
(9, 'kasolo@banking.com', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(10, 'rapheal@banking.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(11, 'silas@banking.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(12, 'sitali@bankinig.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(13, 'simfukwe@banking.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(14, 'gome@banking.com', '6eea9b7ef19179a06954edd0f6c05ceb', 0),
(15, 'willmoti@banking.com', '81dc9bdb52d04dc20036dbd8313ed055', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cooperate`
--

CREATE TABLE `cooperate` (
  `copId` int(11) NOT NULL,
  `account_name` varchar(40) NOT NULL,
  `cop_account_num` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL,
  `adminusername` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cooperate`
--

INSERT INTO `cooperate` (`copId`, `account_name`, `cop_account_num`, `balance`, `adminusername`) VALUES
(1, 'ZESCO', 'ZESCO', '3180', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `trans_id` int(11) NOT NULL,
  `transaction_amount` varchar(100) NOT NULL,
  `sender_acc_no` varchar(100) NOT NULL,
  `receiver_acc_no` varchar(100) NOT NULL,
  `trans_date` date NOT NULL,
  `remark` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `transaction_amount`, `sender_acc_no`, `receiver_acc_no`, `trans_date`, `remark`) VALUES
(1, '500', 'PE87370RBS', 'PE48517RBS', '2019-05-28', 'transacion of funds to PE48517RBS'),
(2, '500', 'PE87370RBS', 'PE48517RBS', '2019-05-28', 'transacion of funds to PE48517RBS'),
(3, '200', 'PE87370RBS', 'PE48517RBS', '2019-05-30', 'transacion of funds to PE48517RBS'),
(4, '3600', 'PE87370RBS', 'PE48517RBS', '2019-05-30', 'transacion of funds to PE48517RBS'),
(5, '450', 'PE30733RBS', 'PE31848RBS', '2019-05-30', 'transacion of funds to PE31848RBS'),
(6, '100', 'PE31848RBS', 'PE48517RBS', '2019-06-03', 'transacion of funds to PE48517RBS'),
(7, '100', 'PE76361RBS', 'PE68129RBS', '2019-05-25', 'transacion of funds to PE68129RBS'),
(8, '500', 'PE76361RBS', 'PE87370RBS', '2019-05-26', 'transacion of funds to PE87370RBS'),
(9, '200', 'PE27783RBS', 'PE31848RBS', '2019-06-04', 'transacion of funds to PE31848RBS'),
(10, '4500', 'PE76361RBS', 'PE31848RBS', '2019-06-05', 'transacion of funds to PE31848RBS'),
(11, '200000', 'PE42690RBS', 'PE48517RBS', '2019-06-05', 'transacion of funds to PE48517RBS');

-- --------------------------------------------------------

--
-- Table structure for table `utility_transactions`
--

CREATE TABLE `utility_transactions` (
  `trans_id` int(11) NOT NULL,
  `transaction_amount` varchar(100) NOT NULL,
  `client_acc_no` varchar(100) NOT NULL,
  `utility_acc_no` varchar(100) NOT NULL,
  `trans_date` date NOT NULL,
  `remark` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utility_transactions`
--

INSERT INTO `utility_transactions` (`trans_id`, `transaction_amount`, `client_acc_no`, `utility_acc_no`, `trans_date`, `remark`) VALUES
(1, '100', 'PE30733RBS', 'ZESCO', '2019-05-30', 'buying of Zesco units'),
(2, '100', 'PE31848RBS', 'ZESCO', '2019-05-30', 'buying of Zesco units'),
(3, '500', 'PE31848RBS', 'ZESCO', '2019-06-03', 'buying of Zesco units'),
(4, '100', 'PE76361RBS', 'ZESCO', '2019-05-28', 'buying of Zesco units'),
(5, '750', 'PE76361RBS', 'ZESCO', '2019-05-26', 'buying of Zesco units'),
(6, '200', 'PE27783RBS', 'ZESCO', '2019-06-04', 'buying of Zesco units'),
(7, '10', 'PE76361RBS', 'ZESCO', '2019-06-05', 'buying of Zesco units'),
(8, '100', 'PE95913RBS', 'ZESCO', '2019-08-27', 'buying of Zesco units');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cooperate`
--
ALTER TABLE `cooperate`
  ADD PRIMARY KEY (`copId`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `utility_transactions`
--
ALTER TABLE `utility_transactions`
  ADD PRIMARY KEY (`trans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `cooperate`
--
ALTER TABLE `cooperate`
  MODIFY `copId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `utility_transactions`
--
ALTER TABLE `utility_transactions`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;