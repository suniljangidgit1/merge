-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2020 at 01:30 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fincrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `estimate_comments`
--

CREATE TABLE `estimate_comments` (
  `id` int(20) NOT NULL,
  `estimate_id` varchar(500) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `posted_by` varchar(50) NOT NULL,
  `comment_attachment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estimate_comments`
--

INSERT INTO `estimate_comments` (`id`, `estimate_id`, `comment`, `date`, `posted_by`, `comment_attachment`) VALUES
(1, 'nsdwdbneigb9tl4su', 'Getting good feedback', '2020-11-12 09:34:30', 'fincrm', ''),
(2, 'urxbo8hp4ywi8bfo3', 'Testing comments', '2020-11-13 06:37:41', 'sunilportal', ''),
(3, 'urxbo8hp4ywi8bfo3', 'tested successfully.', '2020-11-13 06:38:38', 'fincrm', ''),
(4, 'urxbo8hp4ywi8bfo3', 'ok', '2020-11-13 06:39:16', 'sunilportal', 'Estimate.pdf'),
(5, 'urxbo8hp4ywi8bfo3', 'For test reject', '2020-11-13 06:42:17', 'sunilportal', ''),
(6, 'k5sv6rq4i2rqm8byx', 'New acceptance comment.', '2020-11-13 07:18:07', 'sunilportal', ''),
(7, 'k5sv6rq4i2rqm8byx', 'For some test', '2020-11-17 12:21:51', 'sunilportal', ''),
(8, 'k5sv6rq4i2rqm8byx', 'Test', '2020-11-17 12:26:26', 'sunilportal', ''),
(9, 'k5sv6rq4i2rqm8byx', 'Testing purpose.', '2020-11-17 12:29:20', 'sunilportal', ''),
(10, 'k5sv6rq4i2rqm8byx', 'te', '2020-11-17 12:30:58', 'sunilportal', ''),
(11, 'k5sv6rq4i2rqm8byx', 'test', '2020-11-17 12:31:13', 'sunilportal', ''),
(12, 'k5sv6rq4i2rqm8byx', 'test', '2020-11-17 12:33:09', 'sunilportal', ''),
(13, 'k5sv6rq4i2rqm8byx', 'rers', '2020-11-17 12:33:18', 'sunilportal', ''),
(14, 'k5sv6rq4i2rqm8byx', 'test', '2020-11-18 04:00:49', 'sunilportal', ''),
(15, 'd2oeag4rx8xz1pn53', 'For testing purpose', '2020-11-18 10:30:43', 'sunilportal', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estimate_comments`
--
ALTER TABLE `estimate_comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estimate_comments`
--
ALTER TABLE `estimate_comments`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
