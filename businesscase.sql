-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 30 juin 2021 à 12:09
-- Version du serveur : 8.0.21
-- Version de PHP : 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `businesscase`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `idAdress` int NOT NULL AUTO_INCREMENT,
  `typeAdress` varchar(50) DEFAULT NULL,
  `postAdress` varchar(50) DEFAULT NULL,
  `postAdress2` varchar(50) DEFAULT NULL,
  `cpAdress` int DEFAULT NULL,
  `countryAdress` varchar(50) DEFAULT NULL,
  `idUser` int NOT NULL,
  PRIMARY KEY (`idAdress`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `idCategory` int NOT NULL AUTO_INCREMENT,
  `nameCategory` varchar(50) DEFAULT NULL,
  `idCategoryParent` int DEFAULT NULL,
  PRIMARY KEY (`idCategory`),
  KEY `idCategoryParent` (`idCategoryParent`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`idCategory`, `nameCategory`, `idCategoryParent`) VALUES
(1, 'chien', NULL),
(2, 'chat', NULL),
(3, 'nourriture', 1),
(4, 'poisson', NULL),
(5, 'rongeur', NULL),
(6, 'reptile', NULL),
(7, 'oiseau', NULL),
(8, 'jouetSport', 1),
(9, 'bienEtre', 1),
(10, 'accessoire', 1),
(11, 'transportVoyage', 1),
(12, 'croquette', 3),
(13, 'pate', 3),
(14, 'complementAlimentaire', 3),
(15, 'snack', 3),
(16, 'balle', 8),
(17, 'peluche', 8),
(18, 'disque', 8),
(19, 'corde', 8),
(20, 'hygiene', 9),
(21, 'matelasCoussin', 9),
(22, 'litPanier', 9),
(23, 'couverture', 9),
(24, 'collier', 10),
(25, 'laisse', 10),
(26, 'harnais', 10),
(27, 'gamelle', 10),
(28, 'caisseDeTransport', 11),
(29, 'accessoireVoiture', 11),
(30, 'housseProtection', 11),
(31, 'cage', 11),
(32, 'nourriture', 2),
(33, 'jouetSport', 2),
(34, 'bienEtre', 2),
(35, 'accessoire', 2),
(36, 'transportVoyage', 2),
(37, 'croquette', 32),
(38, 'pate', 32),
(39, 'complementAlimentaire', 32),
(40, 'souris', 33),
(41, 'lasers', 33),
(42, 'peluche', 33),
(43, 'tunnel', 33),
(44, 'hygiene', 34),
(45, 'arbreChat', 34),
(46, 'hamac', 34),
(47, 'litPanier', 34),
(48, 'collier', 35),
(49, 'laisse', 35),
(50, 'grattoir', 35),
(51, 'caisseDeTransport', 36),
(52, 'couverture', 36),
(53, 'porteChat', 36),
(54, 'nourriture', 4),
(55, 'aquarium', 4),
(56, 'bienEtre', 4),
(57, 'accessoire', 4),
(58, 'transportVoyage', 4),
(59, 'eauChaude', 54),
(60, 'eauFroide', 54),
(61, 'eauSalee', 54),
(62, 'entretien', 55),
(63, 'filtreEau', 55),
(64, 'decoration', 55),
(65, 'chauffage', 55),
(66, 'antiAlgue', 56),
(67, 'soinEau', 56),
(68, 'soinPlante', 56),
(69, 'mangeoireAutomatique', 57),
(70, 'thermometre', 57),
(71, 'diffuseur', 57),
(72, 'eclairage', 57),
(73, 'bassinsDeTransport', 58),
(74, 'sacDeTransport', 58),
(75, 'nourriture', 5),
(76, 'bienEtre', 5),
(77, 'transportVoyage', 5),
(78, 'foin', 75),
(79, 'aliment', 75),
(80, 'friandise', 75),
(81, 'parapharmacie', 76),
(82, 'litière', 76),
(83, 'cageDeTransport', 77),
(84, 'accessoireAlimentaire', 77),
(85, 'accessoireDivers', 77),
(86, 'nourriture', 6),
(87, 'terrarium', 6),
(88, 'bienEtre', 6),
(89, 'accessoire', 6),
(90, 'transportVoyage', 6),
(91, 'granule', 86),
(92, 'complementAlimentaire', 86),
(93, 'decoration', 87),
(94, 'sysPluieArtificielle', 87),
(95, 'filtrePompe', 87),
(96, 'pierreChauffante', 88),
(97, 'couvertureThermique', 88),
(98, 'gamelle', 89),
(99, 'lampeAmpoule', 89),
(100, 'thermometre', 89),
(101, 'hygrometre', 89),
(102, 'terrariumDeTransport', 90),
(103, 'kitDeNettoyage', 90),
(104, 'nourriture', 7),
(105, 'jouet', 7),
(106, 'bienEtre', 7),
(107, 'accessoire', 7),
(108, 'transportVoyage', 7),
(109, 'graine', 104),
(110, 'complementAlimentaire', 104),
(111, 'snack', 104),
(112, 'neon', 105),
(113, 'miroir', 105),
(114, 'aireDeJeu', 105),
(115, 'baignoire', 106),
(116, 'balancoire', 106),
(117, 'soinDuPlumage', 106),
(118, 'cage', 107),
(119, 'voliere', 107),
(120, 'support', 107),
(121, 'cageDeTransport', 108);

-- --------------------------------------------------------

--
-- Structure de la table `datestatus`
--

DROP TABLE IF EXISTS `datestatus`;
CREATE TABLE IF NOT EXISTS `datestatus` (
  `idOrder` int NOT NULL,
  `idStatus` int NOT NULL,
  `idDateStatus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idOrder`,`idStatus`),
  KEY `idStatus` (`idStatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `imageproduct`
--

DROP TABLE IF EXISTS `imageproduct`;
CREATE TABLE IF NOT EXISTS `imageproduct` (
  `idImage` int NOT NULL AUTO_INCREMENT,
  `urlImage` varchar(50) DEFAULT NULL,
  `idProduct` int NOT NULL,
  PRIMARY KEY (`idImage`),
  KEY `idProduct` (`idProduct`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `idInvoice` int NOT NULL AUTO_INCREMENT,
  `idOrder` int NOT NULL,
  PRIMARY KEY (`idInvoice`),
  KEY `idOrder` (`idOrder`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `idOrder` int NOT NULL AUTO_INCREMENT,
  `promoOrder` int DEFAULT NULL,
  `orderDate` date DEFAULT NULL,
  `idAdress` int NOT NULL,
  `idProduct` int NOT NULL,
  `idUser` int NOT NULL,
  `idPayment` int NOT NULL,
  PRIMARY KEY (`idOrder`),
  KEY `idAdress` (`idAdress`),
  KEY `idProduct` (`idProduct`),
  KEY `idUser` (`idUser`),
  KEY `idPayment` (`idPayment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `paymentmethod`
--

DROP TABLE IF EXISTS `paymentmethod`;
CREATE TABLE IF NOT EXISTS `paymentmethod` (
  `idPayment` int NOT NULL AUTO_INCREMENT,
  `namePayment` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idPayment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `idProduct` int NOT NULL AUTO_INCREMENT,
  `nameProduct` varchar(50) DEFAULT NULL,
  `brandProduct` varchar(50) DEFAULT NULL,
  `descriptionProduct` varchar(50) DEFAULT NULL,
  `htProduct` decimal(15,2) DEFAULT NULL,
  `qtyProduct` decimal(15,2) DEFAULT NULL,
  `isActive` tinyint DEFAULT NULL,
  `idCategory` int NOT NULL,
  PRIMARY KEY (`idProduct`),
  KEY `idCategory` (`idCategory`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`idProduct`, `nameProduct`, `brandProduct`, `descriptionProduct`, `htProduct`, `qtyProduct`, `isActive`, `idCategory`) VALUES
(1, 'Croquettes Regionals Grasslands pour Chien', 'Acana', 'Regorgeant de viandes d\'animaux nourris à l\'herbe,', '25.00', '2.00', 1, 12),
(2, 'Croquettes Caniche pour Chien Adulte', 'Royal Canin', 'AIDE A BIEN VIEILLIR : Cette formule apporte une s', '18.95', '2.50', 1, 12),
(3, 'Croquettes OPTIBALANCE Small & Mini Poulet pour Ch', 'Pro Plan', 'OptiBalance™ est une combinaison de nutriments spé', '20.95', '3.00', 1, 12),
(4, 'Croquettes Energie pour Chien ', 'Croc Pro', NULL, '29.95', '15.00', 1, 12),
(5, 'Jouet Licorne Enchantée pour Chat', 'KONG', 'Le jouet KONG Enchanted Buzzy attire les chats ave', '7.50', NULL, 1, 42);

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `idStatus` int NOT NULL AUTO_INCREMENT,
  `nameStatus` varchar(50) DEFAULT NULL,
  `dateStatus` date DEFAULT NULL,
  PRIMARY KEY (`idStatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `useraccount`
--

DROP TABLE IF EXISTS `useraccount`;
CREATE TABLE IF NOT EXISTS `useraccount` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `firstnameUser` varchar(50) DEFAULT NULL,
  `lastnameUser` varchar(50) DEFAULT NULL,
  `isMaleUser` tinyint DEFAULT NULL,
  `emailUser` varchar(50) DEFAULT NULL,
  `birthUser` date DEFAULT NULL,
  `pwdUser` varchar(50) DEFAULT NULL,
  `vauncherUser` decimal(15,2) DEFAULT NULL,
  `phoneUser` varchar(50) DEFAULT NULL,
  `phoneMobileUser` varchar(50) DEFAULT NULL,
  `nbOrderUser` int DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `useraccount` (`idUser`);

--
-- Contraintes pour la table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`idCategoryParent`) REFERENCES `category` (`idCategory`);

--
-- Contraintes pour la table `datestatus`
--
ALTER TABLE `datestatus`
  ADD CONSTRAINT `datestatus_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `orders` (`idOrder`),
  ADD CONSTRAINT `datestatus_ibfk_2` FOREIGN KEY (`idStatus`) REFERENCES `status` (`idStatus`);

--
-- Contraintes pour la table `imageproduct`
--
ALTER TABLE `imageproduct`
  ADD CONSTRAINT `imageproduct_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `product` (`idProduct`);

--
-- Contraintes pour la table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `orders` (`idOrder`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`idAdress`) REFERENCES `address` (`idAdress`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `product` (`idProduct`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`idUser`) REFERENCES `useraccount` (`idUser`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`idPayment`) REFERENCES `paymentmethod` (`idPayment`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
