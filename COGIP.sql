-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 31, 2018 at 10:31 AM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `COGIP`
--

-- --------------------------------------------------------

--
-- Table structure for table `Company`
--

CREATE TABLE `Company` (
  `id` int(100) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `VAT_number` varchar(255) NOT NULL,
  `company_phone` varchar(255) NOT NULL,
  `company_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Company`
--

INSERT INTO `Company` (`id`, `company_name`, `company_address`, `country`, `VAT_number`, `company_phone`, `company_type`) VALUES
(5, 'devos lemmens', 'la-bas', 'dans le trou', '888', '169666666', 0),
(6, 'amora', 'rue de la mayonnaise', 'loeuf', '444719', '123456789', 1),
(8, 'uncle bens', 'rue du riz', 'bol', '456321', '0245678392', 1),
(9, 'Durex', 'rue du latex', 'vagiland', '6969696969', '024568934', 0),
(10, 'Ikea', 'rue de l\'etagere', 'mobiland', '24325476879', '23402849758346', 1),
(11, 'Belgacom', 'rue du telephone', 'simland', '13248754332', '02384675322', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Company_Type`
--

CREATE TABLE `Company_Type` (
  `id` int(100) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Company_Type`
--

INSERT INTO `Company_Type` (`id`, `type_name`) VALUES
(0, 'Supplier'),
(1, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `Customers`
--

CREATE TABLE `Customers` (
  `id` int(100) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Customers`
--

INSERT INTO `Customers` (`id`, `last_name`, `first_name`, `phone_number`, `email`) VALUES
(5, 'devoss', 'lemmens', '169666666', 'devoslemmens@gmail.com'),
(6, 'frite', 'paul', '098766532', 'paulfrite@gmail.com'),
(8, 'bens', 'uncle', '0894536712', 'bensuncle@gmail.com'),
(9, 'sifredi', 'rocco', '09753428967', 'roccosifredi'),
(10, 'eric', 'lalampe', '103821937874365', 'lalampeeric@hotmail.com'),
(11, 'card', 'sim', '1232443208584', 'cardsim@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Invoices`
--

CREATE TABLE `Invoices` (
  `invoice_number` int(100) NOT NULL,
  `id_company` int(100) NOT NULL,
  `id_customer` int(100) NOT NULL,
  `invoice_date` date NOT NULL,
  `designation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Invoices`
--

INSERT INTO `Invoices` (`invoice_number`, `id_company`, `id_customer`, `invoice_date`, `designation`) VALUES
(1, 5, 5, '2018-08-30', 'fellation'),
(2, 6, 6, '2018-08-30', 'un pot de mayonnaise'),
(3, 8, 8, '2018-08-30', '10 kg de riz'),
(4, 9, 9, '2018-08-30', 'gel plaisir'),
(5, 10, 10, '2018-08-30', 'un lit'),
(6, 11, 11, '2018-08-30', 'nokia 3310');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Company`
--
ALTER TABLE `Company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_name` (`company_name`),
  ADD KEY `fk_company_compagnyType` (`company_type`);

--
-- Indexes for table `Company_Type`
--
ALTER TABLE `Company_Type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Customers`
--
ALTER TABLE `Customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `last_name` (`last_name`);

--
-- Indexes for table `Invoices`
--
ALTER TABLE `Invoices`
  ADD PRIMARY KEY (`invoice_number`),
  ADD KEY `fk_invoices_company` (`id_company`),
  ADD KEY `fk_invoices_customer` (`id_customer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Company`
--
ALTER TABLE `Company`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Company_Type`
--
ALTER TABLE `Company_Type`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `Customers`
--
ALTER TABLE `Customers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Invoices`
--
ALTER TABLE `Invoices`
  MODIFY `invoice_number` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Company`
--
ALTER TABLE `Company`
  ADD CONSTRAINT `fk_company_compagnyType` FOREIGN KEY (`company_type`) REFERENCES `Company_Type` (`id`);

--
-- Constraints for table `Customers`
--
ALTER TABLE `Customers`
  ADD CONSTRAINT `fk_customers_company` FOREIGN KEY (`id`) REFERENCES `Company` (`id`);

--
-- Constraints for table `Invoices`
--
ALTER TABLE `Invoices`
  ADD CONSTRAINT `fk_invoices_company` FOREIGN KEY (`id_company`) REFERENCES `Company` (`id`),
  ADD CONSTRAINT `fk_invoices_customer` FOREIGN KEY (`id_customer`) REFERENCES `Customers` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
