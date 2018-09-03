-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 03, 2018 at 03:46 PM
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
(11, 'Belgacom', 'rue du telephone', 'simland', '13248754332', '02384675322', 1),
(17, 'Becode', 'Gare centrale', 'Belgium', '21435445', '1434354509976', 1);

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
  `Customer_number` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Customers`
--

INSERT INTO `Customers` (`Customer_number`, `company`, `last_name`, `first_name`, `phone_number`, `email`) VALUES
(1, 'amora', 'Jean', 'Lou', '3545357', 'machin@gmail.com'),
(2, 'amora', 'mexicanos', 'Antoine', '0486627990', 'mexicanos@gmail.com'),
(3, 'uncle bens', 'bens', 'uncle', '0894536712', 'bensuncle@gmail.com'),
(4, 'Durex', 'sifredi', 'rocco', '09753428967', 'roccosifredi'),
(5, 'Ikea', 'eric', 'lalampe', '103821937874365', 'lalampeeric@hotmail.com'),
(6, 'Belgacom', 'card', 'sim', '1232443208584', 'cardsim@hotmail.com'),
(15, 'Becode', 'Marlair', 'Bertrand', '124325667', 'bertrand@becode.org');

-- --------------------------------------------------------

--
-- Table structure for table `Invoices`
--

CREATE TABLE `Invoices` (
  `invoice_number` int(100) NOT NULL,
  `id_company` int(100) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `invoice_date` date NOT NULL,
  `designation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Invoices`
--

INSERT INTO `Invoices` (`invoice_number`, `id_company`, `customer_name`, `invoice_date`, `designation`) VALUES
(19, 17, 'Marlair', '2018-09-02', 'peut un porte'),
(20, 6, 'mexicanos', '2018-09-01', 'Sel');

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
  ADD PRIMARY KEY (`Customer_number`),
  ADD KEY `last_name` (`last_name`),
  ADD KEY `fk_customers_company` (`company`);

--
-- Indexes for table `Invoices`
--
ALTER TABLE `Invoices`
  ADD PRIMARY KEY (`invoice_number`),
  ADD KEY `customer_name` (`customer_name`),
  ADD KEY `fk_invoices_company` (`id_company`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Company`
--
ALTER TABLE `Company`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `Company_Type`
--
ALTER TABLE `Company_Type`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Customers`
--
ALTER TABLE `Customers`
  MODIFY `Customer_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Invoices`
--
ALTER TABLE `Invoices`
  MODIFY `invoice_number` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  ADD CONSTRAINT `fk_customers_company` FOREIGN KEY (`company`) REFERENCES `Company` (`company_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Invoices`
--
ALTER TABLE `Invoices`
  ADD CONSTRAINT `fk_invoices_company` FOREIGN KEY (`id_company`) REFERENCES `Company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_invoices_customer_name` FOREIGN KEY (`customer_name`) REFERENCES `Customers` (`last_name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
