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
-- Table structure for table `invoice_comments`
--

CREATE TABLE `invoice_comments` (
  `id` int(10) NOT NULL,
  `invoice_id` varchar(250) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `posted_by` varchar(250) NOT NULL,
  `comment_attachment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_comments`
--

INSERT INTO `invoice_comments` (`id`, `invoice_id`, `comment`, `date`, `posted_by`, `comment_attachment`) VALUES
(1, 'lm1khfxulc7l2ka3o', 'First comment', '2020-11-13 07:48:18', 'fincrm', 'Estimate_(1).pdf'),
(2, 'lm1khfxulc7l2ka3o', 'Second comment', '2020-11-13 07:48:48', 'sunilportal', ''),
(3, 'lm1khfxulc7l2ka3o', 'Accepted', '2020-11-13 07:56:55', 'sunilportal', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice_comments`
--
ALTER TABLE `invoice_comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice_comments`
--
ALTER TABLE `invoice_comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
