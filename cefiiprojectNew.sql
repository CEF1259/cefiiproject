-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 05, 2024 at 01:09 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cefiiproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `mjcgallery`
--

DROP TABLE IF EXISTS `mjcgallery`;
CREATE TABLE IF NOT EXISTS `mjcgallery` (
  `idgallery` int NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`idgallery`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mjcgallery`
--

INSERT INTO `mjcgallery` (`idgallery`, `image`) VALUES
(2, 'images/enfantsGallery/artchildcooking.jpg'),
(3, 'images/enfantsGallery/artchildcooking.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mjcrecetteingredients`
--

DROP TABLE IF EXISTS `mjcrecetteingredients`;
CREATE TABLE IF NOT EXISTS `mjcrecetteingredients` (
  `Ing_Id` int NOT NULL AUTO_INCREMENT,
  `Ing_Nom` varchar(50) NOT NULL,
  `Ing_Image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Ing_Id`),
  UNIQUE KEY `Ing_Nom` (`Ing_Nom`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mjcrecetteingredients`
--

INSERT INTO `mjcrecetteingredients` (`Ing_Id`, `Ing_Nom`, `Ing_Image`) VALUES
(1, 'sucre', NULL),
(2, 'oeuf', NULL),
(3, 'farine', NULL),
(4, 'eau', NULL),
(5, 'sel', ''),
(6, 'huile', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mjcrecettemeasure`
--

DROP TABLE IF EXISTS `mjcrecettemeasure`;
CREATE TABLE IF NOT EXISTS `mjcrecettemeasure` (
  `measure_Id` int NOT NULL AUTO_INCREMENT,
  `measure_unite` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`measure_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mjcrecettemeasure`
--

INSERT INTO `mjcrecettemeasure` (`measure_Id`, `measure_unite`) VALUES
(1, 'ML'),
(2, 'L'),
(3, 'cuillère '),
(4, 'verre'),
(5, 'sachet'),
(6, 'touche');

-- --------------------------------------------------------

--
-- Table structure for table `mjcrecettetitre`
--

DROP TABLE IF EXISTS `mjcrecettetitre`;
CREATE TABLE IF NOT EXISTS `mjcrecettetitre` (
  `recetteId` int NOT NULL AUTO_INCREMENT,
  `recetteTitle` varchar(255) NOT NULL,
  `recetteImage` varchar(255) DEFAULT NULL,
  `recetteMethode` varchar(500) NOT NULL,
  PRIMARY KEY (`recetteId`),
  UNIQUE KEY `recetteTitle` (`recetteTitle`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mjcrecettetitre`
--

INSERT INTO `mjcrecettetitre` (`recetteId`, `recetteTitle`, `recetteImage`, `recetteMethode`) VALUES
(1, 'Les Crêpes', 'images/crepe.jpg', '1. Mélange la farine, le sel, le sucre vanillé et le sucre\r\n2. Ajoute les 2 œufs et mélange avec le fouet\r\n3. Ajoute le lait, l\'eau et l\'huile en mélangeant avec le fouet.\r\n4. Verse une louche de pate dans la crêpière et retourne la crêpe pour cuire l\'autre cote.'),
(2, 'onigiri', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `recetteingredient`
--

DROP TABLE IF EXISTS `recetteingredient`;
CREATE TABLE IF NOT EXISTS `recetteingredient` (
  `recetteId` int NOT NULL,
  `Ing_Id` int NOT NULL,
  `Quant` int NOT NULL,
  `measure_Id` int DEFAULT NULL,
  KEY `recetteId` (`recetteId`),
  KEY `Ing_Id` (`Ing_Id`),
  KEY `measure_Id` (`measure_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `recetteingredient`
--

INSERT INTO `recetteingredient` (`recetteId`, `Ing_Id`, `Quant`, `measure_Id`) VALUES
(1, 1, 3, 3),
(1, 3, 2, 4),
(1, 2, 2, NULL),
(1, 6, 3, 3),
(1, 6, 3, 3),
(1, 4, 1, 4),
(1, 5, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `recipetable`
--

DROP TABLE IF EXISTS `recipetable`;
CREATE TABLE IF NOT EXISTS `recipetable` (
  `recetteId` int NOT NULL AUTO_INCREMENT,
  `recetteTitle` varchar(255) NOT NULL,
  `Ingredients` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `recetteImage` varchar(255) DEFAULT NULL,
  `recetteMethode` varchar(500) NOT NULL,
  `recetteFalc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`recetteId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `recipetable`
--

INSERT INTO `recipetable` (`recetteId`, `recetteTitle`, `Ingredients`, `recetteImage`, `recetteMethode`, `recetteFalc`) VALUES
(1, 'Les Crêpes', '2 verres de farine, 3 cuillères sucres, 3 cuillères huile, 1 verre d\'eau, 1 touche de sel, 1 sachet de sucre vanillé, 2 œufs', 'images/crepe.jpg', 'Mélange la farine, le sel, le sucre vanillé et le sucre.\r\nAjoute les 2 œufs et mélange avec le fouet.\r\nAjoute le lait, l\'eau et l\'huile en mélangeant avec le fouet.\r\nVerse une louche de pate dans la crêpière et retourne la crêpe pour cuire l\'autre cote', NULL),
(2, 'Les gâteaux aux poires', '5 cuillères de farine, 4 cuillères de sucre, 1 œuf, 2 cuillères huile, 1 touche de sel, 1 sachet sucre vanillé, 2 poires, 5 cuillères du lait, 1 sachet de levure', 'images/gateaupoire.jpg', 'Mélange la farine, le sel, le sucre vanillé, la levure, et le sucre.\r\nAjoute l\'oeuf, le lait et l\'huile. Mélange avec le fouet.\r\nEpluche et coupe les poires.\r\nVerse la pâte et les poires dans le moule et fais cuire 30 mins à four moyen', NULL),
(8, 'Ongiri', 'rice', 'images/onigiri.jpg', 'ball', 'images/onigiri2.png');

-- --------------------------------------------------------

--
-- Table structure for table `userstable`
--

DROP TABLE IF EXISTS `userstable`;
CREATE TABLE IF NOT EXISTS `userstable` (
  `id` int NOT NULL AUTO_INCREMENT,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userstable`
--

INSERT INTO `userstable` (`id`, `UserName`, `Password`) VALUES
(1, 'Username', 'Password');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recetteingredient`
--
ALTER TABLE `recetteingredient`
  ADD CONSTRAINT `fk_mjcrecetteingredient` FOREIGN KEY (`Ing_Id`) REFERENCES `mjcrecetteingredients` (`Ing_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mjcrecettemeasure` FOREIGN KEY (`measure_Id`) REFERENCES `mjcrecettemeasure` (`measure_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_recettetitre` FOREIGN KEY (`recetteId`) REFERENCES `mjcrecettetitre` (`recetteId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
