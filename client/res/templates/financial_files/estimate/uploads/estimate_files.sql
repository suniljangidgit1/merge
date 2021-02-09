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
-- Table structure for table `estimate_files`
--

CREATE TABLE `estimate_files` (
  `estimate_id` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `filepath` varchar(500) DEFAULT NULL,
  `original_filename` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estimate_files`
--

INSERT INTO `estimate_files` (`estimate_id`, `id`, `filepath`, `original_filename`) VALUES
('nsdwdbneigb9tl4su', 1, 'uploads/fincrm.crm.com/financial_files/estimates/fincrm/nsdwdbneigb9tl4su/account.sql', 'account.sql'),
('nsdwdbneigb9tl4su', 2, 'uploads/fincrm.crm.com/financial_files/estimates/fincrm/nsdwdbneigb9tl4su/billing_entity.sql', 'billing_entity.sql'),
('nsdwdbneigb9tl4su', 3, 'uploads/fincrm.crm.com/financial_files/estimates/fincrm/nsdwdbneigb9tl4su/invoice_items.sql', 'invoice_items.sql'),
('g3m2nzobgo9nd08p2', 4, 'uploads/fincrm.crm.com/financial_files/estimates/fincrm/g3m2nzobgo9nd08p2/financial_invoice_calculations.js', 'financial_invoice_calculations.js'),
('g3m2nzobgo9nd08p2', 5, 'uploads/fincrm.crm.com/financial_files/estimates/fincrm/g3m2nzobgo9nd08p2/header.tpl', 'header.tpl'),
('k5sv6rq4i2rqm8byx', 9, 'uploads/fincrm.crm.com/financial_files/estimates/fincrm/k5sv6rq4i2rqm8byx/Estimate_(1).pdf', 'Estimate_(1).pdf'),
('k5sv6rq4i2rqm8byx', 8, 'uploads/fincrm.crm.com/financial_files/estimates/fincrm/k5sv6rq4i2rqm8byx/Estimate.pdf', 'Estimate.pdf'),
('k5sv6rq4i2rqm8byx', 10, 'uploads/fincrm.crm.com/financial_files/estimates/fincrm/k5sv6rq4i2rqm8byx/View_Invoice.php', 'View_Invoice.php'),
('k5sv6rq4i2rqm8byx', 11, 'uploads/fincrm.crm.com/financial_files/estimates/fincrm/k5sv6rq4i2rqm8byx/header.tpl', 'header.tpl'),
('k5sv6rq4i2rqm8byx', 12, 'uploads/fincrm.crm.com/financial_files/estimates/fincrm/k5sv6rq4i2rqm8byx/pdf.php', 'pdf.php'),
('d2oeag4rx8xz1pn53', 13, 'uploads/fincrm.crm.com/financial_files/estimates/fincrm/d2oeag4rx8xz1pn53/Estimate.pdf', 'Estimate.pdf'),
('fwbybox9uu6675f1p', 15, 'uploads/fincrm.crm.com/financial_files/estimates/fincrm/fwbybox9uu6675f1p/Estimate.pdf', 'Estimate.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estimate_files`
--
ALTER TABLE `estimate_files`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estimate_files`
--
ALTER TABLE `estimate_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
