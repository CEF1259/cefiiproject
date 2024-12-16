-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 16, 2024 at 06:12 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `recipetable`
--

INSERT INTO `recipetable` (`recetteId`, `recetteTitle`, `Ingredients`, `recetteImage`, `recetteMethode`, `recetteFalc`) VALUES
(1, 'Les Crêpes', '2 verres de farine, 3 cuillères sucres, 3 cuillères huile, 1 verre d\'eau, 1 touche de sel, 1 sachet de sucre vanillé, 2 œufs', 'images/crepe.jpg', 'Mélange la farine, le sel, le sucre vanillé et le sucre.\r\nAjoute les 2 œufs et mélange avec le fouet.\r\nAjoute le lait, l\'eau et l\'huile en mélangeant avec le fouet.\r\nVerse une louche de pate dans la crêpière et retourne la crêpe pour cuire l\'autre cote', NULL),
(2, 'Les gâteaux aux poires', '5 cuillères de farine, 4 cuillères de sucre, 1 œuf, 2 cuillères huile, 1 touche de sel, 1 sachet sucre vanillé, 2 poires, 5 cuillères du lait, 1 sachet de levure', 'images/gateaupoire.jpg', 'Mélange la farine, le sel, le sucre vanillé, la levure, et le sucre.\r\nAjoute l&#039;oeuf, le lait et l&#039;huile. Mélange avec le fouet.\r\nEpluche et coupe les poires.\r\nVerse la pâte et les poires dans le moule et fais cuire 30 mins à four moyen', 'images/cakerecipeFalc.jpg'),
(3, 'Ongiri', 'rice', 'images/onigiri.jpg', 'ball', 'images/onigiri2.png'),
(4, 'bnlank', 'sadasdas', 'images/cakerecipeFalc.jpg', 'adsada', 'images/');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
