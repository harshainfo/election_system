-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2018 at 06:18 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `cand_id` int(11) NOT NULL,
  `cand_fname` varchar(20) COLLATE utf8_bin NOT NULL,
  `cand_lname` varchar(20) COLLATE utf8_bin NOT NULL,
  `cand_dob` date NOT NULL,
  `gender` varchar(10) COLLATE utf8_bin NOT NULL,
  `civil_status` varchar(10) COLLATE utf8_bin NOT NULL,
  `cand_add1` varchar(20) COLLATE utf8_bin NOT NULL,
  `cand_add2` varchar(20) COLLATE utf8_bin NOT NULL,
  `cand_city` varchar(20) COLLATE utf8_bin NOT NULL,
  `cand_state` varchar(2) COLLATE utf8_bin NOT NULL,
  `cand_zipcode` int(11) NOT NULL,
  `cand_phone` int(11) NOT NULL,
  `cand_email` varchar(25) COLLATE utf8_bin NOT NULL,
  `curr_party` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_race`
--

CREATE TABLE `candidate_race` (
  `cand_id` int(11) NOT NULL,
  `race_id` int(11) NOT NULL,
  `position` varchar(25) COLLATE utf8_bin NOT NULL,
  `party_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `egu`
--

CREATE TABLE `egu` (
  `egu_id` int(11) NOT NULL,
  `egu_name` varchar(35) COLLATE utf8_bin NOT NULL,
  `egu_type` varchar(11) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE `election` (
  `elec_id` int(10) NOT NULL,
  `elec_date` date NOT NULL,
  `elec_title` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `election_race`
--

CREATE TABLE `election_race` (
  `elec_id` int(11) NOT NULL,
  `race_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `election_voter_log`
--

CREATE TABLE `election_voter_log` (
  `elec_id` int(11) NOT NULL,
  `voter_hist_id` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8_bin NOT NULL,
  `date_time` datetime NOT NULL,
  `granted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `party_id` int(11) NOT NULL,
  `party_name` varchar(30) COLLATE utf8_bin NOT NULL,
  `date_created` date NOT NULL,
  `status` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`party_id`, `party_name`, `date_created`, `status`) VALUES
(1, 'Liberal Party', '2018-01-02', 'inactive'),
(2, 'Democratic Party 2', '2017-10-09', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `reset_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reset_key` varchar(25) COLLATE utf8_bin NOT NULL,
  `time_created` datetime NOT NULL,
  `time_reset` datetime DEFAULT NULL,
  `time_expiry` datetime NOT NULL,
  `result` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`reset_id`, `user_id`, `reset_key`, `time_created`, `time_reset`, `time_expiry`, `result`) VALUES
(1, 5, 'AK874RZJOPYZY0LDLPRC', '2018-04-22 20:11:22', '0000-00-00 00:00:00', '2018-04-22 20:11:22', ''),
(2, 5, 'AKLDB357BBAZP5HOVDKV', '2018-04-22 20:11:43', '0000-00-00 00:00:00', '2018-04-23 20:11:43', ''),
(3, 5, 'I4PZRP91OVT12948M19M', '2018-04-22 20:20:40', '0000-00-00 00:00:00', '2018-04-23 20:20:40', ''),
(4, 5, '0OBS0L3PE8VGRCBWHPPM', '2018-04-23 12:17:39', '0000-00-00 00:00:00', '2018-04-24 12:17:39', ''),
(5, 5, 'SP3V713LA8E5AVFJ850Y', '2018-04-23 12:46:14', '0000-00-00 00:00:00', '2018-04-24 12:46:14', ''),
(6, 5, 'WOJ7W5XYSBUVFFFWU58P', '2018-04-23 12:46:53', '0000-00-00 00:00:00', '2018-04-24 12:46:53', ''),
(7, 5, '3U378JGTSH9JXK9Z6RUO', '2018-04-23 12:47:56', '0000-00-00 00:00:00', '2018-04-24 12:47:56', ''),
(8, 5, '02O74RIIYHQJ6VB8XZLK', '2018-04-23 13:10:45', '0000-00-00 00:00:00', '2018-04-24 13:10:45', ''),
(9, 5, 'SZODB4DE231ZD2MO6WZ4', '2018-04-23 13:19:57', '0000-00-00 00:00:00', '2018-04-24 13:19:57', ''),
(10, 5, 'U0MW24SZRRYYOTUCI8BG', '2018-04-23 13:26:19', '0000-00-00 00:00:00', '2018-04-24 13:26:19', ''),
(11, 5, 'PF71TW04ZZKY59KGFKCM', '2018-04-23 13:46:53', NULL, '2018-04-24 13:46:53', ''),
(12, 5, 'K8BYLLEPZ4ITLRBG52F3', '2018-04-23 14:01:02', NULL, '2018-04-24 14:01:02', ''),
(13, 5, 'LEOSL4AQ5XQJCT70BCDB', '2018-04-23 14:07:35', NULL, '2018-04-24 14:07:35', ''),
(14, 5, 'CF8AHW44ARGCH4I56APF', '2018-04-23 14:15:25', NULL, '2018-04-24 14:15:25', ''),
(15, 5, 'PR9IS9719SMZCRYVHZE9', '2018-04-23 14:16:15', NULL, '2018-04-24 14:16:15', ''),
(16, 5, '80EQ6CPG7V0JXJFLT9F4', '2018-04-23 14:18:34', NULL, '2018-04-24 14:18:34', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `pending_voter_view`
-- (See below for the actual view)
--
CREATE TABLE `pending_voter_view` (
);

-- --------------------------------------------------------

--
-- Table structure for table `precinct`
--

CREATE TABLE `precinct` (
  `prec_id` int(11) NOT NULL,
  `prec_name` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `precinct`
--

INSERT INTO `precinct` (`prec_id`, `prec_name`) VALUES
(1, 'Iowa City 1');

-- --------------------------------------------------------

--
-- Table structure for table `precinct_egu`
--

CREATE TABLE `precinct_egu` (
  `prec_id` int(11) NOT NULL,
  `egu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `race`
--

CREATE TABLE `race` (
  `race_id` int(11) NOT NULL,
  `race_title` varchar(30) COLLATE utf8_bin NOT NULL,
  `race_type` varchar(30) COLLATE utf8_bin NOT NULL,
  `elec_id` int(11) NOT NULL,
  `egu_id` int(11) DEFAULT NULL,
  `instruction` varchar(150) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Stand-in structure for view `registered_voter_view`
-- (See below for the actual view)
--
CREATE TABLE `registered_voter_view` (
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(20) COLLATE utf8_bin NOT NULL,
  `first_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `phone` bigint(10) NOT NULL,
  `email` varchar(30) COLLATE utf8_bin NOT NULL,
  `role` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `first_name`, `last_name`, `phone`, `email`, `role`) VALUES
(1, 'harsha', 'harsha', 'harsha', 'pitawela', 33232, 'harshainfo@gmail.com', 'admin'),
(2, 'harsha', 'harsha', 'harsha', 'pitawela', 33232, 'harshainfo@gmail.com', 'voter'),
(3, 'harsha', 'harsha', 'harsha', 'pitawela', 33232, 'harshainfo@gmail.com', 'voter'),
(4, 'harsha', 'harsha', 'harsha', 'pitawela', 33232, 'harshainfo@gmail.com', 'voter'),
(5, 'harsha', 'root', 'harsha', 'pitawela', 33232, 'harshainfo@gmail.com', 'voter'),
(6, 'root', 'root', 'Harsha', 'Pitawela', 2147483647, 'hpitawela@uiowa.edu', 'admin'),
(7, 'root', 'root', 'Harsha', 'Pitawela', 2147483647, 'hpitawela@uiowa.edu', 'admin'),
(8, 'root', 'root', 'Harsha', 'Ekanayake', 3195199309, 'harsha-pitawela@uiowa.edu', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `cand_id` int(11) NOT NULL,
  `race_id` int(11) NOT NULL,
  `voter_hist_id` int(11) NOT NULL,
  `preference` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

CREATE TABLE `voter` (
  `voter_id` int(12) NOT NULL,
  `USER_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`voter_id`, `USER_id`) VALUES
(6, 3),
(7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `voter_history`
--

CREATE TABLE `voter_history` (
  `voter_hist_id` int(11) NOT NULL,
  `voter_id` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8_bin NOT NULL,
  `start_date` date NOT NULL,
  `granted_by` int(11) DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `ended_by` int(11) DEFAULT NULL,
  `comment` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `vot_loc_hist_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `voter_history`
--

INSERT INTO `voter_history` (`voter_hist_id`, `voter_id`, `status`, `start_date`, `granted_by`, `end_date`, `ended_by`, `comment`, `vot_loc_hist_id`) VALUES
(203, 6, 'Registered', '2018-03-20', 1, NULL, NULL, NULL, 1),
(211, 7, 'Registered', '2018-03-20', 1, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `voter_view`
-- (See below for the actual view)
--
CREATE TABLE `voter_view` (
`voter_id` int(12)
,`first_name` varchar(20)
,`last_name` varchar(20)
,`proof_id` int(1)
,`id_no` varchar(15)
,`address1` varchar(20)
,`address2` varchar(20)
,`city` varchar(15)
,`state` varchar(15)
,`zip_code` int(5)
,`phone` bigint(10)
,`email` varchar(30)
,`status` varchar(20)
,`start_date` date
,`granted_by` int(11)
,`end_date` date
,`ended_by` int(11)
,`prec_id` int(1)
,`comment` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `vot_loc_history`
--

CREATE TABLE `vot_loc_history` (
  `vot_loc_hist_id` int(10) NOT NULL,
  `address1` varchar(20) COLLATE utf8_bin NOT NULL,
  `address2` varchar(20) COLLATE utf8_bin NOT NULL,
  `city` varchar(15) COLLATE utf8_bin NOT NULL,
  `state` varchar(15) COLLATE utf8_bin NOT NULL,
  `zip_code` int(5) NOT NULL,
  `proof_id` int(1) NOT NULL,
  `id_no` varchar(15) COLLATE utf8_bin NOT NULL,
  `prec_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `vot_loc_history`
--

INSERT INTO `vot_loc_history` (`vot_loc_hist_id`, `address1`, `address2`, `city`, `state`, `zip_code`, `proof_id`, `id_no`, `prec_id`) VALUES
(1, '647, Emerald Street', 'Apt C 19', 'Iowa CIty', 'IA', 52246, 1, 'DDS2323232', 1),
(2, '535, Emerald Street', 'Apt A 12', 'Iowa City', 'IA', 52246, 1, 'DS679607697', 1);

-- --------------------------------------------------------

--
-- Structure for view `pending_voter_view`
--
DROP TABLE IF EXISTS `pending_voter_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pending_voter_view`  AS  select `v`.`voter_id` AS `voter_id`,`u`.`first_name` AS `first_name`,`u`.`last_name` AS `last_name`,`v`.`proof_id` AS `proof_id`,`v`.`id_no` AS `id_no`,`v`.`address1` AS `address1`,`v`.`address2` AS `address2`,`v`.`city` AS `city`,`v`.`state` AS `state`,`v`.`zip_code` AS `zip_code`,`u`.`phone` AS `phone`,`u`.`email` AS `email`,`vh`.`status` AS `status`,`vh`.`start_date` AS `start_date`,`vh`.`end_date` AS `end_date` from ((`voter_history` `vh` join `voter` `v`) join `user` `u`) where ((`vh`.`status` = 'Pending') and isnull(`vh`.`end_date`) and (`u`.`user_id` = `v`.`USER_id`) and (`vh`.`voter_id` = `v`.`voter_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `registered_voter_view`
--
DROP TABLE IF EXISTS `registered_voter_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `registered_voter_view`  AS  select `v`.`voter_id` AS `voter_id`,`u`.`first_name` AS `first_name`,`u`.`last_name` AS `last_name`,`v`.`proof_id` AS `proof_id`,`v`.`id_no` AS `id_no`,`v`.`address1` AS `address1`,`v`.`address2` AS `address2`,`v`.`city` AS `city`,`v`.`state` AS `state`,`v`.`zip_code` AS `zip_code`,`u`.`phone` AS `phone`,`u`.`email` AS `email`,`vh`.`status` AS `status`,`vh`.`start_date` AS `start_date`,`vh`.`end_date` AS `end_date` from ((`voter_history` `vh` join `voter` `v`) join `user` `u`) where ((`vh`.`status` = 'Registered') and isnull(`vh`.`end_date`) and (`u`.`user_id` = `v`.`USER_id`) and (`vh`.`voter_id` = `v`.`voter_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `voter_view`
--
DROP TABLE IF EXISTS `voter_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `voter_view`  AS  select `v`.`voter_id` AS `voter_id`,`u`.`first_name` AS `first_name`,`u`.`last_name` AS `last_name`,`vlh`.`proof_id` AS `proof_id`,`vlh`.`id_no` AS `id_no`,`vlh`.`address1` AS `address1`,`vlh`.`address2` AS `address2`,`vlh`.`city` AS `city`,`vlh`.`state` AS `state`,`vlh`.`zip_code` AS `zip_code`,`u`.`phone` AS `phone`,`u`.`email` AS `email`,`vh`.`status` AS `status`,`vh`.`start_date` AS `start_date`,`vh`.`granted_by` AS `granted_by`,`vh`.`end_date` AS `end_date`,`vh`.`ended_by` AS `ended_by`,`vlh`.`prec_id` AS `prec_id`,`vh`.`comment` AS `comment` from (((`vot_loc_history` `vlh` join `voter_history` `vh`) join `voter` `v`) join `user` `u`) where (isnull(`vh`.`end_date`) and (`u`.`user_id` = `v`.`USER_id`) and (`vh`.`voter_id` = `v`.`voter_id`) and (`vh`.`vot_loc_hist_id` = `vlh`.`vot_loc_hist_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`cand_id`);

--
-- Indexes for table `candidate_race`
--
ALTER TABLE `candidate_race`
  ADD PRIMARY KEY (`cand_id`,`race_id`);

--
-- Indexes for table `election`
--
ALTER TABLE `election`
  ADD PRIMARY KEY (`elec_id`);

--
-- Indexes for table `election_race`
--
ALTER TABLE `election_race`
  ADD PRIMARY KEY (`elec_id`,`race_id`);

--
-- Indexes for table `election_voter_log`
--
ALTER TABLE `election_voter_log`
  ADD PRIMARY KEY (`elec_id`,`voter_hist_id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`party_id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`reset_id`);

--
-- Indexes for table `precinct`
--
ALTER TABLE `precinct`
  ADD PRIMARY KEY (`prec_id`);

--
-- Indexes for table `precinct_egu`
--
ALTER TABLE `precinct_egu`
  ADD PRIMARY KEY (`prec_id`,`egu_id`);

--
-- Indexes for table `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`race_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`cand_id`,`race_id`,`voter_hist_id`,`preference`);

--
-- Indexes for table `voter`
--
ALTER TABLE `voter`
  ADD PRIMARY KEY (`voter_id`);

--
-- Indexes for table `voter_history`
--
ALTER TABLE `voter_history`
  ADD PRIMARY KEY (`voter_hist_id`);

--
-- Indexes for table `vot_loc_history`
--
ALTER TABLE `vot_loc_history`
  ADD PRIMARY KEY (`vot_loc_hist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `cand_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `election`
--
ALTER TABLE `election`
  MODIFY `elec_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `party_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `reset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `precinct`
--
ALTER TABLE `precinct`
  MODIFY `prec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `race`
--
ALTER TABLE `race`
  MODIFY `race_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `voter_history`
--
ALTER TABLE `voter_history`
  MODIFY `voter_hist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `vot_loc_history`
--
ALTER TABLE `vot_loc_history`
  MODIFY `vot_loc_hist_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
