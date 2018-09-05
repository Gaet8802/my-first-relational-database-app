-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 05 sep. 2018 à 15:50
-- Version du serveur :  10.1.34-MariaDB
-- Version de PHP :  7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cogip`
--

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE `company` (
  `id` int(100) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `VAT_number` varchar(255) NOT NULL,
  `company_phone` varchar(255) NOT NULL,
  `company_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`id`, `company_name`, `company_address`, `country`, `VAT_number`, `company_phone`, `company_type`) VALUES
(5, 'moyen petite company', 'la-bas', 'dans le trou', '888', '169666666', 0),
(6, 'amora', 'rue de la mayonnaise', 'loeuf', '444719', 'testetstestetsetsetstetsetsettse', 1),
(8, 'Une société de riz', 'rue du riz', 'bol', '456321', '0245678392', 1),
(9, 'Durex', 'rue du latex', 'vagiland', '6969696969', '024568934', 0),
(10, 'Ikea', 'rue de l\'etagere', 'mobiland', '24325476879', '23402849758346', 1),
(11, 'Belgacom', 'rue du telephone', 'simland', '13248754332', '02384675322', 1),
(18, 'tamere', 'rue de tamere', 'a tamere', '44533554', '00025545', 0),
(22, 'sdlkmghsmqldhkg', 'sqmdlkgjsqdlmjkg', 'qsdmlgsqmldkgh', '35575737375', '357357357357', 0);

-- --------------------------------------------------------

--
-- Structure de la table `company_type`
--

CREATE TABLE `company_type` (
  `id` int(100) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `company_type`
--

INSERT INTO `company_type` (`id`, `type_name`) VALUES
(0, 'Supplier'),
(1, 'Customer');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `Customer_number` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`Customer_number`, `company`, `last_name`, `first_name`, `phone_number`, `email`) VALUES
(1, 'Une société de riz', 'aaaaaaaaaaa', 'bbbbbbbbbbbbbbbbb', '888888888888888888888', 'machin@gmail.org'),
(2, 'amora', 'mexicanos', 'Antoine', '0486627990', 'mexicanos@gmail.com'),
(3, 'Une société de riz', 'bens', 'uncle', '0894536712', 'bensuncle@gmail.com'),
(17, 'amora', 'machin', 'truc', '3434', 'truc@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_number` int(100) NOT NULL,
  `id_company` int(100) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `invoice_date` date NOT NULL,
  `designation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `invoices`
--

INSERT INTO `invoices` (`invoice_number`, `id_company`, `customer_name`, `invoice_date`, `designation`) VALUES
(20, 10, 'machin', '2018-09-15', 'lololololololololololol'),
(26, 9, 'mexicanos', '2018-09-14', 'salut ');

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `pwd` varchar(250) NOT NULL,
  `typeUser` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id_login`, `user`, `pwd`, `typeUser`) VALUES
(1, 'muriel', 'f2ff241eac83db641cadb1c8af3b0d8ca9fa7160', 'moderateur'),
(2, 'jc', '9770d1c99cd356280d7bb78b97bdbe4bf25ff1da', 'superadmin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_name` (`company_name`),
  ADD KEY `fk_company_compagnyType` (`company_type`);

--
-- Index pour la table `company_type`
--
ALTER TABLE `company_type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Customer_number`),
  ADD KEY `last_name` (`last_name`),
  ADD KEY `fk_customers_company` (`company`);

--
-- Index pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_number`),
  ADD KEY `customer_name` (`customer_name`),
  ADD KEY `fk_invoices_company` (`id_company`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `company_type`
--
ALTER TABLE `company_type`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `Customer_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_number` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `fk_company_compagnyType` FOREIGN KEY (`company_type`) REFERENCES `company_type` (`id`);

--
-- Contraintes pour la table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `fk_customers_company` FOREIGN KEY (`company`) REFERENCES `company` (`company_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `fk_invoices_company` FOREIGN KEY (`id_company`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_invoices_customer_name` FOREIGN KEY (`customer_name`) REFERENCES `customers` (`last_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
