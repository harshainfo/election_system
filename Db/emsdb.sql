-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2018 at 06:36 AM
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
-- Table structure for table `egu_city`
--

CREATE TABLE `egu_city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `egu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `egu_congredist`
--

CREATE TABLE `egu_congredist` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `egu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `egu_county`
--

CREATE TABLE `egu_county` (
  `county_id` int(11) NOT NULL,
  `county_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `egu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `egu_main`
--

CREATE TABLE `egu_main` (
  `egu_id` int(11) NOT NULL,
  `egu_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `egu_state`
--

CREATE TABLE `egu_state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `egu_id` int(11) NOT NULL
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
  `prec_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `city` int(11) NOT NULL,
  `county` int(11) NOT NULL,
  `congre_district` int(11) NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `precinct`
--

INSERT INTO `precinct` (`prec_id`, `prec_name`, `city`, `county`, `congre_district`, `state`) VALUES
(1, 'Belgaum', 0, 0, 0, 55574),
(2, 'Harderwijk', 0, 0, 0, 58411),
(3, 'Secunderabad', 0, 0, 0, 77604),
(4, 'Coatbridge', 0, 0, 0, 84342),
(5, 'Naninne', 0, 0, 0, 46700),
(6, 'Sundrie', 0, 0, 0, 84031),
(7, 'Houthalen', 0, 0, 0, 64115),
(8, 'Tontelange', 0, 0, 0, 19830),
(9, 'Armstrong', 0, 0, 0, 80992),
(10, 'San Giuliano di Pugl', 0, 0, 0, 48185),
(11, 'Lakeland County', 0, 0, 0, 15226),
(12, 'Penna in Teverina', 0, 0, 0, 15811),
(13, 'Alajuelita', 0, 0, 0, 75106),
(14, 'Kassel', 0, 0, 0, 43075),
(15, 'Burdinne', 0, 0, 0, 75028),
(16, 'Esterzili', 0, 0, 0, 36636),
(17, 'Enns', 0, 0, 0, 52168),
(18, 'Otegem', 0, 0, 0, 57830),
(19, 'Quarona', 0, 0, 0, 35513),
(20, 'Fort Smith', 0, 0, 0, 49447),
(21, 'Alva', 0, 0, 0, 16055),
(22, 'Weston-super-Mare', 0, 0, 0, 1995),
(23, 'Pictou', 0, 0, 0, 84672),
(24, 'Évreux', 0, 0, 0, 65802),
(25, 'Judenburg', 0, 0, 0, 28435),
(26, 'Lier', 0, 0, 0, 39299),
(27, 'Bala', 0, 0, 0, 86781),
(28, 'Masullas', 0, 0, 0, 75804),
(29, 'Hindupur', 0, 0, 0, 91357),
(30, 'Düsseldorf', 0, 0, 0, 58166),
(31, 'Fortune', 0, 0, 0, 85760),
(32, 'Essex', 0, 0, 0, 68451),
(33, 'Camarones', 0, 0, 0, 15961),
(34, 'Allein', 0, 0, 0, 11216),
(35, 'Gespeg', 0, 0, 0, 67907),
(36, 'Couthuin', 0, 0, 0, 74725),
(37, 'Termes', 0, 0, 0, 20698),
(38, 'Rocky Mountain House', 0, 0, 0, 55441),
(39, 'Santa Croce sull\'Arn', 0, 0, 0, 47125),
(40, 'Lleida', 0, 0, 0, 42664),
(41, 'Portici', 0, 0, 0, 73633),
(42, 'Putaendo', 0, 0, 0, 17486),
(43, 'Acireale', 0, 0, 0, 40431),
(44, 'Padre Hurtado', 0, 0, 0, 94705),
(45, 'Bredene', 0, 0, 0, 90481),
(46, 'Tuticorin', 0, 0, 0, 51289),
(47, 'Logan City', 0, 0, 0, 11476),
(48, 'Germersheim', 0, 0, 0, 45653),
(49, 'Klagenfurt', 0, 0, 0, 71495),
(50, 'Fort Good Hope', 0, 0, 0, 97635),
(51, 'Jamshedpur', 0, 0, 0, 57062),
(52, 'Chimay', 0, 0, 0, 73249),
(53, 'Tezze sul Brenta', 0, 0, 0, 26461),
(54, 'Columbus', 0, 0, 0, 92708),
(55, 'Elen', 0, 0, 0, 88774),
(56, 'St. Andrews', 0, 0, 0, 33219),
(57, 'Las Palmas', 0, 0, 0, 90911),
(58, 'Coronel', 0, 0, 0, 8879),
(59, 'Bowden', 0, 0, 0, 26970),
(60, 'Kendal', 0, 0, 0, 63838),
(61, 'Solre-sur-Sambre', 0, 0, 0, 68284),
(62, 'Latera', 0, 0, 0, 95317),
(63, 'Grandrieu', 0, 0, 0, 60912),
(64, 'Pichidegua', 0, 0, 0, 88899),
(65, 'Lewiston', 0, 0, 0, 86153),
(66, 'Ajaccio', 0, 0, 0, 47481),
(67, 'Carmen', 0, 0, 0, 68244),
(68, 'Villa Alemana', 0, 0, 0, 41276),
(69, 'Bidar', 0, 0, 0, 44350),
(70, 'Buggenhout', 0, 0, 0, 80244),
(71, 'Newtonmore', 0, 0, 0, 52803),
(72, 'Provo', 0, 0, 0, 60910),
(73, 'San Costantino Calab', 0, 0, 0, 11787),
(74, 'La Valle/Wengen', 0, 0, 0, 93301),
(75, 'Herfelingen', 0, 0, 0, 44762),
(76, 'Fairbanks', 0, 0, 0, 91191),
(77, 'Vicuña', 0, 0, 0, 34969),
(78, 'Monte San Savino', 0, 0, 0, 3139),
(79, 'Albiano', 0, 0, 0, 80889),
(80, 'Pollena Trocchia', 0, 0, 0, 5742),
(81, 'Wiener Neustadt', 0, 0, 0, 95663),
(82, 'Waterbury', 0, 0, 0, 6514),
(83, 'Stene', 0, 0, 0, 77513),
(84, 'Notre-Dame-de-la-Sal', 0, 0, 0, 66151),
(85, 'Bertogne', 0, 0, 0, 73832),
(86, 'Sheffield', 0, 0, 0, 19961),
(87, 'Guna', 0, 0, 0, 14831),
(88, 'San Bernardo', 0, 0, 0, 34716),
(89, 'Langenhagen', 0, 0, 0, 84356),
(90, 'Homburg', 0, 0, 0, 12402),
(91, 'Gierle', 0, 0, 0, 38337),
(92, 'Cuddapah', 0, 0, 0, 96268),
(93, 'Heerhugowaard', 0, 0, 0, 53902),
(94, 'Oudegem', 0, 0, 0, 75176),
(95, 'Mobile', 0, 0, 0, 46599),
(96, 'Colli a Volturno', 0, 0, 0, 46537),
(97, 'Virginal-Samme', 0, 0, 0, 40161),
(98, 'Biesme-sous-Thuin', 0, 0, 0, 58329),
(99, 'Tontelange', 0, 0, 0, 3766),
(100, 'San Marcello Pistoie', 0, 0, 0, 17371);

-- --------------------------------------------------------

--
-- Table structure for table `race`
--

CREATE TABLE `race` (
  `race_id` int(11) NOT NULL,
  `race_title` varchar(30) COLLATE utf8_bin NOT NULL,
  `race_type` varchar(30) COLLATE utf8_bin NOT NULL,
  `elec_id` int(11) NOT NULL,
  `egu_id` int(11) DEFAULT NULL
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
  `phone` int(10) NOT NULL,
  `email` varchar(20) COLLATE utf8_bin NOT NULL,
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
(5, 'harsha', 'harsha', 'harsha', 'pitawela', 33232, 'harshainfo@gmail.com', 'voter');

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
(116, 6, 'Pending', '2017-06-13', 1, '2018-03-18', 1, NULL, 1),
(120, 7, 'Pending', '2018-09-21', 1, '2018-03-18', 1, NULL, 2),
(201, 6, 'Rejected', '2018-03-18', 1, '2018-03-20', 1, 'fvfevfvvrv', 1),
(202, 7, 'Rejected', '2018-03-18', 1, '2018-03-20', 1, ' FDF F D DF D D', 2),
(203, 6, 'Registered', '2018-03-20', 1, '2018-03-20', 1, NULL, 1),
(204, 6, 'Registered', '2018-03-20', 1, '2018-03-20', 1, NULL, 1),
(205, 7, 'Registered', '2018-03-20', 1, '2018-03-20', 1, NULL, 2),
(206, 6, 'Rejected', '2018-03-20', 1, '2018-03-20', 1, 'asdasdad', 1),
(207, 6, 'Registered', '2018-03-20', 1, '2018-03-20', 1, NULL, 1),
(208, 6, 'Rejected', '2018-03-20', 1, '2018-03-20', 1, 'ccccccccccccc', 1),
(209, 7, 'Rejected', '2018-03-20', 1, '2018-03-20', 1, 'fffffffffffffffffffff', 2),
(210, 6, 'On Hold', '2018-03-20', 1, NULL, NULL, '22222222222222', 1),
(211, 7, 'Registered', '2018-03-20', 1, '2018-03-20', 1, NULL, 2),
(212, 7, 'Rejected', '2018-03-20', 1, '2018-03-20', 1, 'ID expired', 2),
(213, 7, 'On Hold', '2018-03-20', 1, NULL, NULL, 'Please present a valid ID personally.', 2);

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
,`phone` int(10)
,`email` varchar(20)
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
-- Indexes for table `precinct`
--
ALTER TABLE `precinct`
  ADD PRIMARY KEY (`prec_id`);

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
