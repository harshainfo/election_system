-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2018 at 05:30 PM
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
(1, 'Liberal Party 2', '2018-01-02', 'inactive'),
(2, 'Democratic Party 2', '2017-10-09', 'inactive');

-- --------------------------------------------------------

--
-- Stand-in structure for view `pending_voter_view`
-- (See below for the actual view)
--
CREATE TABLE `pending_voter_view` (
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
,`end_date` date
);

-- --------------------------------------------------------

--
-- Table structure for table `precinct`
--

CREATE TABLE `precinct` (
  `prec_id` int(11) NOT NULL,
  `prec_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `county` varchar(20) COLLATE utf8_bin NOT NULL,
  `city` varchar(20) COLLATE utf8_bin NOT NULL,
  `state` varchar(2) COLLATE utf8_bin NOT NULL,
  `zip_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `precinct`
--

INSERT INTO `precinct` (`prec_id`, `prec_name`, `county`, `city`, `state`, `zip_code`) VALUES
(1, 'Belgaum', 'Jaunpur', 'Waterbury', 'IA', 55574),
(2, 'Harderwijk', 'Sitapur', 'Spiere-Helkijn', 'IA', 58411),
(3, 'Secunderabad', 'Giardinello', 'Juiz de Fora', 'IA', 77604),
(4, 'Coatbridge', 'Evansville', 'Saint-Dizier', 'IA', 84342),
(5, 'Naninne', 'Worcester', 'Romano d\'Ezzelino', 'IA', 46700),
(6, 'Sundrie', 'Oyace', 'Chichester', 'IA', 84031),
(7, 'Houthalen', 'Wilmington', 'Portici', 'IA', 64115),
(8, 'Tontelange', 'Le Havre', 'Gdynia', 'IA', 19830),
(9, 'Armstrong', 'Pelluhue', 'Courbevoie', 'IA', 80992),
(10, 'San Giuliano di Pugl', 'Gölcük', 'Verdun', 'IA', 48185),
(11, 'Lakeland County', 'Bad Vilbel', 'Llanidloes', 'IL', 15226),
(12, 'Penna in Teverina', 'Burin', 'Warren', 'IL', 15811),
(13, 'Alajuelita', 'Pallavaram', 'Melville', 'IL', 75106),
(14, 'Kassel', 'Ránquil', 'Lake Cowichan', 'IL', 43075),
(15, 'Burdinne', 'Acoz', 'Tumbler Ridge', 'IL', 75028),
(16, 'Esterzili', 'Ophain-Bois-Seigneur', 'Aurangabad', 'IL', 36636),
(17, 'Enns', 'Trazegnies', 'Milestone', 'IL', 52168),
(18, 'Otegem', 'Jennersdorf', 'Bangor', 'IL', 57830),
(19, 'Quarona', 'Rhyl', 'Panchià', 'IL', 35513),
(20, 'Fort Smith', 'Challand-Saint-Victo', 'Tailles', 'IL', 49447),
(21, 'Alva', 'Torella del Sannio', 'Lusevera', 'IA', 16055),
(22, 'Weston-super-Mare', 'Lambersart', 'Okene', 'IA', 1995),
(23, 'Pictou', 'Cádiz', 'Zaltbommel', 'IA', 84672),
(24, 'Évreux', 'Merritt', 'Roccanova', 'IA', 65802),
(25, 'Judenburg', 'Colombo', 'Ottawa', 'IA', 28435),
(26, 'Lier', 'Caledon', 'Soma', 'IA', 39299),
(27, 'Bala', 'Huissen', 'Hollange', 'IA', 86781),
(28, 'Masullas', 'Workum', 'Kaaskerke', 'IA', 75804),
(29, 'Hindupur', 'Neuville', 'Chaitén', 'IA', 91357),
(30, 'Düsseldorf', 'Price', 'Shivapuri', 'IA', 58166),
(31, 'Fortune', 'Velletri', 'Konin', 'IL', 85760),
(32, 'Essex', 'Miramichi', 'Valley East', 'IL', 68451),
(33, 'Camarones', 'Nashik', 'Cimitile', 'IL', 15961),
(34, 'Allein', 'Roubaix', 'Ospedaletto Lodigian', 'IL', 11216),
(35, 'Gespeg', 'Karnal', 'Palanzano', 'IL', 67907),
(36, 'Couthuin', 'Molenbeersel', 'Zelem', 'IL', 74725),
(37, 'Termes', 'Chandler', 'Sandy', 'IL', 20698),
(38, 'Rocky Mountain House', 'Richmond', 'Rapone', 'IL', 55441),
(39, 'Santa Croce sull\'Arn', 'Carmen', 'Pagazzano', 'IL', 47125),
(40, 'Lleida', 'Caprauna', 'Purnea', 'IL', 42664),
(41, 'Portici', 'Diano Arentino', 'Bad Vöslau', 'IA', 73633),
(42, 'Putaendo', 'Máfil', 'Liverpool', 'IA', 17486),
(43, 'Acireale', 'Salon-de-Provence', 'Serralunga d\'Alba', 'IA', 40431),
(44, 'Padre Hurtado', 'Stokrooie', 'Hampstead', 'IA', 94705),
(45, 'Bredene', 'Palencia', 'Kearny', 'IA', 90481),
(46, 'Tuticorin', 'West Valley City', 'Itterbeek', 'IA', 51289),
(47, 'Logan City', 'Logan City', 'Hannut', 'IA', 11476),
(48, 'Germersheim', 'Varena', 'Cinisi', 'IA', 45653),
(49, 'Klagenfurt', 'Pichidegua', 'Kingussie', 'IA', 71495),
(50, 'Fort Good Hope', 'Laren', 'Brusson', 'IA', 97635),
(51, 'Jamshedpur', 'Manavgat', 'Lower Hutt', 'IL', 57062),
(52, 'Chimay', 'Villers-lez-Heest', 'Ramsel', 'IL', 73249),
(53, 'Tezze sul Brenta', 'Okara', 'Gretna', 'IL', 26461),
(54, 'Columbus', 'Neerrepen', 'Siquirres', 'IL', 92708),
(55, 'Elen', 'Germersheim', 'Livorno', 'IL', 88774),
(56, 'St. Andrews', 'Santa Bárbara', 'Izel', 'IL', 33219),
(57, 'Las Palmas', 'Montpellier', 'Paiguano', 'IL', 90911),
(58, 'Coronel', 'Saguenay', 'Acciano', 'IL', 8879),
(59, 'Bowden', 'Bowden', 'Saint-Quentin', 'IL', 26970),
(60, 'Kendal', 'Oyen', 'Jaunpur', 'IL', 63838),
(61, 'Solre-sur-Sambre', 'Washington', 'Ostellato', 'IA', 68284),
(62, 'Latera', 'Chalon-sur-Saône', 'Temse', 'IA', 95317),
(63, 'Grandrieu', 'Lairg', 'Sint-Niklaas', 'IA', 60912),
(64, 'Pichidegua', 'Purmerend', 'Bijapur', 'IA', 88899),
(65, 'Lewiston', 'Algeciras', 'Cawdor', 'IA', 86153),
(66, 'Ajaccio', 'Rosoux-Crenwick', 'Leers-et-Fosteau', 'IA', 47481),
(67, 'Carmen', 'Tongerlo', 'GomzŽ-Andoumont', 'IA', 68244),
(68, 'Villa Alemana', 'Norcia', 'Göteborg', 'IA', 41276),
(69, 'Bidar', 'Ávila', 'Calmar', 'IA', 44350),
(70, 'Buggenhout', 'St. Petersburg', 'Tobermory', 'IA', 80244),
(71, 'Newtonmore', 'Placanica', 'Brixton', 'IL', 52803),
(72, 'Provo', 'Dorval', 'Nizip', 'IL', 60910),
(73, 'San Costantino Calab', 'McCallum', 'Tocopilla', 'IL', 11787),
(74, 'La Valle/Wengen', 'Temuco', 'Trollhättan', 'IL', 93301),
(75, 'Herfelingen', 'Irvine', 'Helena', 'IL', 44762),
(76, 'Fairbanks', 'Lummen', 'Deerlijk', 'IL', 91191),
(77, 'Vicuña', 'Pieve di Cadore', 'Leominster', 'IL', 34969),
(78, 'Monte San Savino', 'Feilding', 'Swansea', 'IL', 3139),
(79, 'Albiano', 'Maaseik', 'Brandon', 'IL', 80889),
(80, 'Pollena Trocchia', 'Cincinnati', 'Morkhoven', 'IL', 5742),
(81, 'Wiener Neustadt', 'Los Lagos', 'Hamilton', 'IA', 95663),
(82, 'Waterbury', 'Nizip', 'Annapolis County', 'IA', 6514),
(83, 'Stene', 'Alto Hospicio', 'Filey', 'IA', 77513),
(84, 'Notre-Dame-de-la-Sal', 'Roxboro', 'Etalle', 'IA', 66151),
(85, 'Bertogne', 'Westlock', 'Hunstanton', 'IA', 73832),
(86, 'Sheffield', 'San Giorgio Albanese', 'Montefalcone nel San', 'IA', 19961),
(87, 'Guna', 'Te Awamutu', 'Seborga', 'IA', 14831),
(88, 'San Bernardo', 'Villingen-Schwennin', 'Rodengo/Rodeneck', 'IA', 34716),
(89, 'Langenhagen', 'Vreren', 'Vegreville', 'IA', 84356),
(90, 'Homburg', 'Darmstadt', 'Herne', 'IA', 12402),
(91, 'Gierle', 'Bitterfeld-Wolfen', 'Baie-Saint-Paul', 'IL', 38337),
(92, 'Cuddapah', 'Bregenz', 'Lidköping', 'IL', 96268),
(93, 'Heerhugowaard', 'Baidyabati', 'Bolzano Vicentino', 'IL', 53902),
(94, 'Oudegem', 'Cache Creek', 'Hualaihué', 'IL', 75176),
(95, 'Mobile', 'Litueche', 'Villafranca in Lunig', 'IL', 46599),
(96, 'Colli a Volturno', 'Accadia', 'Osgoode', 'IL', 46537),
(97, 'Virginal-Samme', 'Bruckneudorf', 'San Pedro de Atacama', 'IL', 40161),
(98, 'Biesme-sous-Thuin', 'Hanau', 'Rochester', 'IL', 58329),
(99, 'Tontelange', 'Marsciano', 'Taunusstein', 'IL', 3766),
(100, 'San Marcello Pistoie', 'Burns Lake', 'Cobquecura', 'IL', 17371);

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
-- Table structure for table `voter`
--

CREATE TABLE `voter` (
  `voter_id` int(12) NOT NULL,
  `proof_id` int(1) NOT NULL,
  `id_no` varchar(15) COLLATE utf8_bin NOT NULL,
  `address1` varchar(20) COLLATE utf8_bin NOT NULL,
  `address2` varchar(20) COLLATE utf8_bin NOT NULL,
  `city` varchar(15) COLLATE utf8_bin NOT NULL,
  `state` varchar(15) COLLATE utf8_bin NOT NULL,
  `zip_code` int(5) NOT NULL,
  `USER_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`voter_id`, `proof_id`, `id_no`, `address1`, `address2`, `city`, `state`, `zip_code`, `USER_id`) VALUES
(0, 1, '323232', 'sadd', 'dasd', 'adsd', 'IA', 343434, NULL),
(1, 1, '123', 'jskjldsj', 'jsljdlsj', 'jsldj', 'jhsjd', 6372637, NULL),
(2, 1, '123', 'jskjldsj', 'jsljdlsj', 'jsldj', 'jhsjd', 6372637, NULL),
(3, 1, '123', 'jskjldsj', 'jsljdlsj', 'jsldj', 'jhsjd', 6372637, NULL),
(4, 1, '123', 'jskjldsj', 'jsljdlsj', 'jsldj', 'jhsjd', 6372637, NULL),
(5, 1, '123', 'jskjldsj', 'jsljdlsj', 'jsldj', 'jhsjd', 6372637, NULL),
(6, 1, '2131231', 'DFSDFDS', 'wewede', 'ccdcw', 'IA', 33443, 1),
(7, 1, '545353', 'sadada', 'dasdad', 'sdasda', 'IA', 3434, 2);

-- --------------------------------------------------------

--
-- Table structure for table `voter_history`
--

CREATE TABLE `voter_history` (
  `voter_hist_id` int(11) NOT NULL,
  `voter_id` int(11) NOT NULL,
  `prec_id` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8_bin NOT NULL,
  `start_date` date NOT NULL,
  `granted_by` int(11) DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `ended_by` int(11) DEFAULT NULL,
  `comment` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `voter_history`
--

INSERT INTO `voter_history` (`voter_hist_id`, `voter_id`, `prec_id`, `status`, `start_date`, `granted_by`, `end_date`, `ended_by`, `comment`) VALUES
(1, 1, 95, 'Unconfirmed', '2017-10-17', 1, '2018-03-07', 1, 'Good'),
(2, 5, 35, 'Unconfirmed', '2019-01-01', 1, '2018-06-30', 1, 'Good'),
(3, 5, 58, 'Unconfirmed', '2018-09-01', 1, '2018-10-27', 1, 'Good'),
(4, 1, 58, 'Unconfirmed', '2018-06-23', 1, '2018-04-10', 1, 'Good'),
(5, 2, 87, 'Unconfirmed', '2018-04-29', 1, '2017-04-02', 1, 'Good'),
(6, 6, 4, 'Unconfirmed', '2018-07-08', 1, '2018-01-20', 1, 'Good'),
(7, 2, 16, 'Unconfirmed', '2017-04-21', 1, '2017-09-12', 1, 'Good'),
(8, 2, 15, 'Unconfirmed', '2018-01-20', 1, '2017-08-20', 1, 'Good'),
(9, 1, 29, 'Unconfirmed', '2018-07-31', 1, '2018-09-01', 1, 'Good'),
(10, 7, 88, 'Unconfirmed', '2018-02-15', 1, '2018-09-01', 1, 'Good'),
(11, 5, 94, 'Pending', '2018-02-13', 1, '2017-09-12', 1, 'ID Issue'),
(12, 4, 6, 'Pending', '2018-12-29', 1, '2017-12-29', 1, 'ID Issue'),
(13, 3, 28, 'Pending', '2017-11-10', 1, '2018-05-10', 1, 'ID Issue'),
(14, 2, 97, 'Pending', '2018-07-08', 1, '2018-05-20', 1, 'ID Issue'),
(15, 6, 38, 'Pending', '2018-03-20', 1, NULL, 1, 'ID Issue'),
(16, 6, 91, 'Pending', '2017-10-31', 1, NULL, 1, 'ID Issue'),
(17, 6, 84, 'Pending', '2017-07-14', 1, NULL, 1, 'ID Issue'),
(18, 3, 11, 'Pending', '2018-02-06', 1, '2017-05-02', 1, 'ID Issue'),
(19, 2, 65, 'Pending', '2017-08-19', 1, '2017-12-30', 1, 'ID Issue'),
(20, 7, 4, 'Pending', '2017-04-23', 1, NULL, 1, 'ID Issue'),
(21, 5, 17, 'Registered', '2018-04-05', 1, '2018-09-02', 1, 'Good'),
(22, 3, 38, 'Registered', '2017-08-14', 1, '2018-02-24', 1, 'Good'),
(23, 5, 37, 'Registered', '2018-01-10', 1, '2019-01-08', 1, 'Good'),
(24, 2, 81, 'Registered', '2017-10-03', 1, '2017-06-23', 1, 'Good'),
(25, 5, 30, 'Registered', '2018-05-26', 1, '2017-12-09', 1, 'Good'),
(26, 4, 86, 'Registered', '2017-05-17', 1, '2017-06-06', 1, 'Good'),
(27, 3, 83, 'Registered', '2018-03-06', 1, '2018-07-03', 1, 'Good'),
(28, 7, 12, 'Registered', '2017-12-04', 1, '2018-07-17', 1, 'Good'),
(29, 7, 35, 'Registered', '2017-04-06', 1, '2018-05-19', 1, 'Good'),
(30, 2, 3, 'Registered', '2018-11-14', 1, '2017-07-18', 1, 'Good'),
(31, 7, 25, 'On Hold', '2018-07-23', 1, '2017-09-12', 1, 'ID Issue'),
(32, 1, 92, 'On Hold', '2018-03-04', 1, '2017-05-20', 1, 'ID Issue'),
(33, 7, 53, 'On Hold', '2017-12-19', 1, '2017-03-20', 1, 'ID Issue'),
(34, 3, 32, 'On Hold', '2017-10-12', 1, '2017-10-25', 1, 'ID Issue'),
(35, 4, 43, 'On Hold', '2018-11-01', 1, '2017-11-12', 1, 'ID Issue'),
(36, 6, 91, 'On Hold', '2017-08-21', 1, '2018-10-05', 1, 'ID Issue'),
(37, 4, 13, 'On Hold', '2017-03-31', 1, '2017-07-19', 1, 'ID Issue'),
(38, 1, 31, 'On Hold', '2018-05-13', 1, '2017-09-28', 1, 'ID Issue'),
(39, 2, 85, 'On Hold', '2017-08-20', 1, '2018-03-03', 1, 'ID Issue'),
(40, 4, 59, 'On Hold', '2018-04-20', 1, '2019-01-12', 1, 'ID Issue'),
(41, 5, 62, 'Rejected', '2018-03-03', 1, '2017-06-10', 1, 'Good'),
(42, 7, 43, 'Rejected', '2018-09-05', 1, '2018-12-08', 1, 'Good'),
(43, 2, 62, 'Rejected', '2017-06-12', 1, '2018-08-26', 1, 'Good'),
(44, 5, 7, 'Rejected', '2018-08-27', 1, '2018-03-24', 1, 'Good'),
(45, 2, 64, 'Rejected', '2018-03-18', 1, '2018-07-12', 1, 'Good'),
(46, 7, 37, 'Rejected', '2018-03-30', 1, '2019-01-06', 1, 'Good'),
(47, 4, 25, 'Rejected', '2018-02-11', 1, '2018-06-29', 1, 'Good'),
(48, 5, 80, 'Rejected', '2017-10-03', 1, '2017-04-03', 1, 'Good'),
(49, 6, 18, 'Rejected', '2018-06-26', 1, '2017-05-07', 1, 'Good'),
(50, 2, 11, 'Rejected', '2018-04-10', 1, '2017-10-01', 1, 'Good'),
(51, 2, 81, 'Unconfirmed', '2017-07-23', 1, '2017-11-28', 1, 'ID Issue'),
(52, 2, 31, 'Unconfirmed', '2019-03-12', 1, '2017-09-19', 1, 'ID Issue'),
(53, 3, 98, 'Unconfirmed', '2018-07-13', 1, '2018-03-10', 1, 'ID Issue'),
(54, 4, 46, 'Unconfirmed', '2018-06-30', 1, '2017-11-07', 1, 'ID Issue'),
(55, 3, 24, 'Unconfirmed', '2018-07-29', 1, '2017-04-16', 1, 'ID Issue'),
(56, 1, 7, 'Unconfirmed', '2017-12-07', 1, '2018-02-03', 1, 'ID Issue'),
(57, 7, 62, 'Unconfirmed', '2018-11-26', 1, '2018-03-02', 1, 'ID Issue'),
(58, 1, 83, 'Unconfirmed', '2017-07-04', 1, '2019-03-01', 1, 'ID Issue'),
(59, 2, 65, 'Unconfirmed', '2019-03-05', 1, '2018-01-26', 1, 'ID Issue'),
(60, 7, 80, 'Unconfirmed', '2018-11-18', 1, '2018-04-21', 1, 'ID Issue'),
(61, 6, 73, 'Pending', '2017-12-19', 1, NULL, 1, 'Good'),
(62, 7, 75, 'Pending', '2018-10-29', 1, NULL, 1, 'Good'),
(63, 5, 67, 'Pending', '2018-03-04', 1, '2017-05-18', 1, 'Good'),
(64, 4, 59, 'Pending', '2017-04-03', 1, '2017-05-11', 1, 'Good'),
(65, 7, 4, 'Pending', '2017-11-27', 1, NULL, 1, 'Good'),
(66, 2, 60, 'Pending', '2017-11-11', 1, '2017-08-16', 1, 'Good'),
(67, 6, 53, 'Pending', '2017-11-10', 1, NULL, 1, 'Good'),
(68, 5, 95, 'Pending', '2019-01-06', 1, '2018-05-21', 1, 'Good'),
(69, 7, 100, 'Pending', '2018-06-22', 1, NULL, 1, 'Good'),
(70, 1, 19, 'Pending', '2018-05-30', 1, '2017-03-24', 1, 'Good'),
(71, 2, 75, 'Registered', '2018-06-25', 1, '2018-05-26', 1, 'ID Issue'),
(72, 2, 94, 'Registered', '2018-09-04', 1, '2018-10-02', 1, 'ID Issue'),
(73, 7, 76, 'Registered', '2017-11-10', 1, '2018-05-05', 1, 'ID Issue'),
(74, 2, 73, 'Registered', '2018-09-17', 1, '2017-04-07', 1, 'ID Issue'),
(75, 6, 19, 'Registered', '2018-06-07', 1, '2017-10-06', 1, 'ID Issue'),
(76, 1, 27, 'Registered', '2017-08-10', 1, '2017-03-18', 1, 'ID Issue'),
(77, 6, 66, 'Registered', '2018-01-21', 1, '2017-10-16', 1, 'ID Issue'),
(78, 3, 90, 'Registered', '2018-05-09', 1, '2019-03-09', 1, 'ID Issue'),
(79, 4, 28, 'Registered', '2018-11-21', 1, '2018-10-17', 1, 'ID Issue'),
(80, 2, 7, 'Registered', '2017-09-09', 1, '2018-12-26', 1, 'ID Issue'),
(81, 5, 91, 'On Hold', '2017-03-22', 1, '2018-10-31', 1, 'Good'),
(82, 2, 93, 'On Hold', '2018-06-21', 1, '2018-10-20', 1, 'Good'),
(83, 4, 47, 'On Hold', '2018-05-21', 1, '2018-04-04', 1, 'Good'),
(84, 3, 89, 'On Hold', '2019-01-03', 1, '2018-06-02', 1, 'Good'),
(85, 3, 61, 'On Hold', '2017-04-02', 1, '2018-12-20', 1, 'Good'),
(86, 4, 28, 'On Hold', '2017-09-24', 1, '2018-07-02', 1, 'Good'),
(87, 2, 35, 'On Hold', '2018-04-20', 1, '2018-01-20', 1, 'Good'),
(88, 2, 64, 'On Hold', '2018-11-03', 1, '2018-07-26', 1, 'Good'),
(89, 5, 60, 'On Hold', '2018-08-31', 1, '2018-06-29', 1, 'Good'),
(90, 6, 72, 'On Hold', '2018-12-22', 1, '2018-11-22', 1, 'Good'),
(91, 2, 65, 'Rejected', '2018-06-19', 1, '2017-10-25', 1, 'ID Issue'),
(92, 2, 18, 'Rejected', '2018-03-11', 1, '2018-05-23', 1, 'ID Issue'),
(93, 2, 42, 'Rejected', '2018-03-24', 1, '2018-10-06', 1, 'ID Issue'),
(94, 7, 49, 'Rejected', '2018-10-23', 1, '2018-01-15', 1, 'ID Issue'),
(95, 2, 11, 'Rejected', '2018-09-25', 1, '2018-10-25', 1, 'ID Issue'),
(96, 7, 89, 'Rejected', '2018-12-02', 1, '2017-07-10', 1, 'ID Issue'),
(97, 3, 44, 'Rejected', '2018-11-14', 1, '2017-04-14', 1, 'ID Issue'),
(98, 7, 28, 'Rejected', '2018-02-14', 1, '2018-01-26', 1, 'ID Issue'),
(99, 7, 18, 'Rejected', '2017-10-10', 1, '2017-05-02', 1, 'ID Issue'),
(100, 2, 4, 'Rejected', '2018-04-06', 1, '2018-02-04', 1, 'ID Issue'),
(101, 4, 73, 'Unconfirmed', '2018-11-05', 1, NULL, NULL, NULL),
(102, 3, 11, 'Unconfirmed', '2018-07-08', 1, NULL, NULL, NULL),
(103, 5, 62, 'Unconfirmed', '2018-04-14', 1, NULL, NULL, NULL),
(104, 2, 76, 'Unconfirmed', '2018-12-05', 1, NULL, NULL, NULL),
(105, 4, 97, 'Unconfirmed', '2018-08-05', 1, NULL, NULL, NULL),
(106, 6, 42, 'Unconfirmed', '2017-04-24', 1, NULL, NULL, NULL),
(107, 2, 27, 'Unconfirmed', '2017-12-20', 1, NULL, NULL, NULL),
(108, 7, 64, 'Unconfirmed', '2018-09-06', 1, NULL, NULL, NULL),
(109, 7, 81, 'Unconfirmed', '2019-02-16', 1, NULL, NULL, NULL),
(110, 4, 71, 'Unconfirmed', '2018-05-07', 1, NULL, NULL, NULL),
(111, 5, 50, 'Pending', '2019-01-22', 1, NULL, NULL, NULL),
(112, 4, 93, 'Pending', '2019-01-27', 1, NULL, NULL, NULL),
(113, 5, 87, 'Pending', '2019-03-12', 1, NULL, NULL, NULL),
(114, 3, 76, 'Pending', '2017-04-22', 1, NULL, NULL, NULL),
(115, 1, 29, 'Pending', '2018-04-24', 1, NULL, NULL, NULL),
(116, 6, 74, 'Pending', '2017-06-13', 1, NULL, NULL, NULL),
(117, 3, 97, 'Pending', '2018-10-18', 1, NULL, NULL, NULL),
(118, 2, 97, 'Pending', '2017-09-10', 1, NULL, NULL, NULL),
(119, 1, 37, 'Pending', '2017-07-17', 1, NULL, NULL, NULL),
(120, 7, 89, 'Pending', '2018-09-21', 1, NULL, NULL, NULL),
(121, 7, 33, 'Registered', '2018-07-18', 1, NULL, NULL, NULL),
(122, 1, 10, 'Registered', '2018-11-02', 1, NULL, NULL, NULL),
(123, 6, 28, 'Registered', '2017-03-27', 1, NULL, NULL, NULL),
(124, 7, 57, 'Registered', '2018-04-05', 1, NULL, NULL, NULL),
(125, 3, 5, 'Registered', '2019-01-09', 1, NULL, NULL, NULL),
(126, 5, 81, 'Registered', '2017-10-05', 1, NULL, NULL, NULL),
(127, 3, 57, 'Registered', '2018-10-09', 1, NULL, NULL, NULL),
(128, 1, 4, 'Registered', '2017-06-11', 1, NULL, NULL, NULL),
(129, 1, 71, 'Registered', '2017-12-28', 1, NULL, NULL, NULL),
(130, 2, 17, 'Registered', '2018-11-11', 1, NULL, NULL, NULL),
(131, 5, 87, 'On Hold', '2017-11-23', 1, NULL, NULL, NULL),
(132, 2, 42, 'On Hold', '2018-04-14', 1, NULL, NULL, NULL),
(133, 7, 94, 'On Hold', '2017-09-21', 1, NULL, NULL, NULL),
(134, 3, 21, 'On Hold', '2017-05-06', 1, NULL, NULL, NULL),
(135, 4, 94, 'On Hold', '2017-07-17', 1, NULL, NULL, NULL),
(136, 6, 99, 'On Hold', '2017-05-03', 1, NULL, NULL, NULL),
(137, 7, 31, 'On Hold', '2019-01-01', 1, NULL, NULL, NULL),
(138, 1, 85, 'On Hold', '2017-04-03', 1, NULL, NULL, NULL),
(139, 7, 41, 'On Hold', '2018-10-21', 1, NULL, NULL, NULL),
(140, 6, 13, 'On Hold', '2018-03-09', 1, NULL, NULL, NULL),
(141, 4, 46, 'Rejected', '2018-05-29', 1, NULL, NULL, NULL),
(142, 3, 36, 'Rejected', '2018-10-25', 1, NULL, NULL, NULL),
(143, 3, 48, 'Rejected', '2018-03-02', 1, NULL, NULL, NULL),
(144, 7, 50, 'Rejected', '2017-09-23', 1, NULL, NULL, NULL),
(145, 7, 90, 'Rejected', '2018-07-21', 1, NULL, NULL, NULL),
(146, 5, 16, 'Rejected', '2018-09-12', 1, NULL, NULL, NULL),
(147, 4, 13, 'Rejected', '2018-03-05', 1, NULL, NULL, NULL),
(148, 4, 36, 'Rejected', '2018-06-22', 1, NULL, NULL, NULL),
(149, 7, 11, 'Rejected', '2018-09-15', 1, NULL, NULL, NULL),
(150, 5, 53, 'Rejected', '2018-11-16', 1, NULL, NULL, NULL),
(151, 4, 100, 'Unconfirmed', '2018-01-09', 1, NULL, NULL, NULL),
(152, 2, 18, 'Unconfirmed', '2018-11-11', 1, NULL, NULL, NULL),
(153, 7, 14, 'Unconfirmed', '2017-03-27', 1, NULL, NULL, NULL),
(154, 7, 23, 'Unconfirmed', '2018-03-11', 1, NULL, NULL, NULL),
(155, 4, 39, 'Unconfirmed', '2018-08-29', 1, NULL, NULL, NULL),
(156, 3, 53, 'Unconfirmed', '2018-12-16', 1, NULL, NULL, NULL),
(157, 1, 79, 'Unconfirmed', '2018-04-10', 1, NULL, NULL, NULL),
(158, 5, 68, 'Unconfirmed', '2018-09-06', 1, NULL, NULL, NULL),
(159, 6, 29, 'Unconfirmed', '2018-02-23', 1, NULL, NULL, NULL),
(160, 7, 56, 'Unconfirmed', '2017-10-10', 1, NULL, NULL, NULL),
(161, 1, 89, 'Pending', '2018-04-29', 1, NULL, NULL, NULL),
(162, 6, 5, 'Pending', '2019-02-22', 1, NULL, NULL, NULL),
(163, 3, 90, 'Pending', '2017-08-15', 1, NULL, NULL, NULL),
(164, 5, 85, 'Pending', '2018-08-18', 1, NULL, NULL, NULL),
(165, 3, 96, 'Pending', '2018-03-16', 1, NULL, NULL, NULL),
(166, 1, 85, 'Pending', '2018-12-22', 1, NULL, NULL, NULL),
(167, 3, 4, 'Pending', '2019-02-22', 1, NULL, NULL, NULL),
(168, 6, 18, 'Pending', '2017-06-23', 1, NULL, NULL, NULL),
(169, 4, 49, 'Pending', '2017-05-19', 1, NULL, NULL, NULL),
(170, 3, 89, 'Pending', '2017-04-17', 1, NULL, NULL, NULL),
(171, 4, 35, 'Registered', '2018-11-24', 1, NULL, NULL, NULL),
(172, 2, 96, 'Registered', '2017-06-06', 1, NULL, NULL, NULL),
(173, 5, 80, 'Registered', '2018-04-04', 1, NULL, NULL, NULL),
(174, 5, 26, 'Registered', '2018-06-06', 1, NULL, NULL, NULL),
(175, 6, 3, 'Registered', '2018-09-21', 1, NULL, NULL, NULL),
(176, 4, 82, 'Registered', '2018-02-08', 1, NULL, NULL, NULL),
(177, 5, 53, 'Registered', '2018-03-05', 1, NULL, NULL, NULL),
(178, 1, 11, 'Registered', '2018-03-29', 1, NULL, NULL, NULL),
(179, 7, 57, 'Registered', '2018-06-01', 1, NULL, NULL, NULL),
(180, 7, 21, 'Registered', '2018-07-07', 1, NULL, NULL, NULL),
(181, 6, 92, 'On Hold', '2017-08-02', 1, NULL, NULL, NULL),
(182, 6, 15, 'On Hold', '2018-07-07', 1, NULL, NULL, NULL),
(183, 1, 93, 'On Hold', '2018-11-09', 1, NULL, NULL, NULL),
(184, 2, 92, 'On Hold', '2017-03-25', 1, NULL, NULL, NULL),
(185, 7, 77, 'On Hold', '2018-07-08', 1, NULL, NULL, NULL),
(186, 2, 82, 'On Hold', '2019-03-01', 1, NULL, NULL, NULL),
(187, 1, 59, 'On Hold', '2017-11-03', 1, NULL, NULL, NULL),
(188, 4, 52, 'On Hold', '2017-05-24', 1, NULL, NULL, NULL),
(189, 1, 96, 'On Hold', '2017-10-03', 1, NULL, NULL, NULL),
(190, 3, 54, 'On Hold', '2019-02-13', 1, NULL, NULL, NULL),
(191, 3, 45, 'Rejected', '2017-09-23', 1, NULL, NULL, NULL),
(192, 6, 54, 'Rejected', '2018-11-01', 1, NULL, NULL, NULL),
(193, 4, 85, 'Rejected', '2018-02-19', 1, NULL, NULL, NULL),
(194, 3, 36, 'Rejected', '2018-07-19', 1, NULL, NULL, NULL),
(195, 2, 11, 'Rejected', '2017-07-08', 1, NULL, NULL, NULL),
(196, 1, 88, 'Rejected', '2017-05-18', 1, NULL, NULL, NULL),
(197, 3, 75, 'Rejected', '2019-02-22', 1, NULL, NULL, NULL),
(198, 1, 31, 'Rejected', '2018-12-01', 1, NULL, NULL, NULL),
(199, 2, 87, 'Rejected', '2017-12-27', 1, NULL, NULL, NULL),
(200, 3, 97, 'Rejected', '2017-12-28', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure for view `pending_voter_view`
--
DROP TABLE IF EXISTS `pending_voter_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pending_voter_view`  AS  select `v`.`voter_id` AS `voter_id`,`u`.`first_name` AS `first_name`,`u`.`last_name` AS `last_name`,`v`.`proof_id` AS `proof_id`,`v`.`id_no` AS `id_no`,`v`.`address1` AS `address1`,`v`.`address2` AS `address2`,`v`.`city` AS `city`,`v`.`state` AS `state`,`v`.`zip_code` AS `zip_code`,`u`.`phone` AS `phone`,`u`.`email` AS `email`,`vh`.`status` AS `status`,`vh`.`start_date` AS `start_date`,`vh`.`end_date` AS `end_date` from ((`voter_history` `vh` join `voter` `v`) join `user` `u`) where ((`vh`.`status` = 'Pending') and isnull(`vh`.`end_date`) and (`u`.`user_id` = `v`.`USER_id`) and (`vh`.`voter_id` = `v`.`voter_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`cand_id`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `cand_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `voter_history`
--
ALTER TABLE `voter_history`
  MODIFY `voter_hist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
