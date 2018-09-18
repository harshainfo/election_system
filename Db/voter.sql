-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2018 at 04:10 AM
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
-- Table structure for table `voter`
--

CREATE TABLE `voter` (
  `voter_id` int(12) NOT NULL,
  `username` varchar(15) COLLATE utf8_bin NOT NULL,
  `first_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(12) COLLATE utf8_bin NOT NULL,
  `proof_id` int(1) NOT NULL,
  `id_no` varchar(15) COLLATE utf8_bin NOT NULL,
  `address1` varchar(20) COLLATE utf8_bin NOT NULL,
  `address2` varchar(20) COLLATE utf8_bin NOT NULL,
  `city` varchar(15) COLLATE utf8_bin NOT NULL,
  `state` varchar(15) COLLATE utf8_bin NOT NULL,
  `zip_code` int(5) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(30) COLLATE utf8_bin NOT NULL,
  `status` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`voter_id`, `username`, `first_name`, `last_name`, `password`, `proof_id`, `id_no`, `address1`, `address2`, `city`, `state`, `zip_code`, `phone`, `email`, `status`) VALUES
(1, 'v1', 'abc', 'def', '123', 1, '123', 'jskjldsj', 'jsljdlsj', 'jsldj', 'jhsjd', 6372637, 32963972, 'gag@shd.com', 'registered'),
(2, 'v1', 'def', 'def', '123', 1, '123', 'jskjldsj', 'jsljdlsj', 'jsldj', 'jhsjd', 6372637, 32963972, 'gag@shd.com', 'pending'),
(3, 'v1', 'def', 'def', '123', 1, '123', 'jskjldsj', 'jsljdlsj', 'jsldj', 'jhsjd', 6372637, 32963972, 'gag@shd.com', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `voter`
--
ALTER TABLE `voter`
  ADD PRIMARY KEY (`voter_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
