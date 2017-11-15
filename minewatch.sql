-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 10 nov. 2017 à 18:26
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `minewatch`
--
CREATE DATABASE IF NOT EXISTS `minewatch` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `minewatch`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `Categorie_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Categorie_Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Categorie_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`Categorie_ID`, `Categorie_Name`) VALUES
(1, 'Minecraft'),
(2, 'Overwatch');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `Order_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Order_Complete` tinyint(1) NOT NULL DEFAULT '0',
  `Order_Date` datetime NOT NULL,
  `FK_User_ID` int(11) NOT NULL,
  PRIMARY KEY (`Order_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `Order_Details_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FK_Pack_ID` int(11) NOT NULL,
  `FK_Order_ID` int(11) NOT NULL,
  PRIMARY KEY (`Order_Details_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pack_skin`
--

DROP TABLE IF EXISTS `pack_skin`;
CREATE TABLE IF NOT EXISTS `pack_skin` (
  `Pack_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Pack_Name` varchar(50) NOT NULL,
  `Pack_Price` float NOT NULL DEFAULT '0',
  `Pack_Description` varchar(250) NOT NULL,
  `Pack_Skin_ID1` int(11) DEFAULT NULL,
  `Pack_Skin_ID2` int(11) DEFAULT NULL,
  `Pack_Skin_ID3` int(11) DEFAULT NULL,
  `Pack_Skin_ID4` int(11) DEFAULT NULL,
  `Pack_Skin_ID5` int(11) DEFAULT NULL,
  `Pack_Skin_ID6` int(11) DEFAULT NULL,
  `Pack_Skin_ID7` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pack_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `skin`
--

DROP TABLE IF EXISTS `skin`;
CREATE TABLE IF NOT EXISTS `skin` (
  `Skin_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Skin_Name` varchar(50) NOT NULL,
  `Skin_Description` varchar(250) NOT NULL,
  `Skin_PATH` varchar(250) NOT NULL,
  `Skin_Yes` int(11) NOT NULL,
  `Skin_No` int(11) NOT NULL,
  `FK_Categorie_ID` int(11) NOT NULL,
  PRIMARY KEY (`Skin_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `skin`
--

INSERT INTO `skin` (`Skin_ID`, `Skin_Name`, `Skin_Description`, `Skin_PATH`, `Skin_Yes`, `Skin_No`, `FK_Categorie_ID`) VALUES
(1, 'Melon d\'eau', 'Skin de base', 'images\\Skin1.png', 24, 15, 0),
(2, 'Flash', 'Skin de Luxe', 'images\\Skin2.png', 45, 3, 1),
(3, 'Multicolor', 'Skin premium', 'images\\Skin3.png', 5, 1, 1),
(4, 'Iron Man', 'Skin Premium', 'images\\Skin4.png', 89, 15, 1),
(5, 'Creeper-Noel', 'Skin de base', 'images\\Skin5.png', 6, 5, 1),
(6, 'Skin Paysage', 'Skin de base', 'images\\Skin6.png', 2, 7, 1),
(7, 'Skin Adventure Time', 'Skin de base', 'images\\Skin7.png', 5, 5, 1),
(8, 'Skin avec Style', 'Skin de base', 'images\\Skin8.png', 7, 1, 1),
(9, 'Skin Ours', 'Skin Premium', 'images\\Skin9.png', 5, 3, 1),
(10, 'Skin Bonhomme de Neige', 'Skin Premium', 'images\\Skin10.png', 58, 11, 1),
(11, 'Skin Link', 'Skin Premium', 'images\\Skin11.png', 8, 2, 1),
(12, 'Skin Winnie l\'Ourson', 'Skin de base', 'images\\Skin12.png', 99, 15, 1),
(13, 'Armor Style', '', 'images\\item1.jpg', 15, 6, 2),
(14, 'Skin de Plage', '', 'images\\item2.jpg', 6, 2, 2),
(15, 'Skin Pompier', '', 'images\\item3.jpg', 86, 15, 2),
(16, 'Hulk Style', '', 'images\\item4.jpg', 78, 35, 2),
(17, 'Skin BS', '', 'images\\item5.jpg', 3, 16, 2),
(18, 'Skin pas Sexy', '', 'images\\item6.jpg', 4, 9, 2),
(19, 'Skin Yeti', '', 'images\\item7.jpg', 5, 5, 2),
(20, 'Skin Casse Noisette', '', 'images\\item8.jpg', 48, 5, 2),
(21, 'Skin Fantassin', '', 'images\\item9.jpg', 5, 51, 2),
(22, 'Skin Brienne de thors', '', 'images\\item10.jpg', 6, 45, 2),
(23, 'Skin Gladiateur', '', 'images\\item11.jpg', 45, 32, 2),
(24, 'Skin Plage2', '', 'images\\item12.jpg', 45, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `User_LastName` varchar(50) NOT NULL,
  `User_FirstName` varchar(50) NOT NULL,
  `User_Email` varchar(50) NOT NULL,
  `User_Inscription` date NOT NULL,
  `User_Phone` varchar(14) NOT NULL,
  `User_Adresse` varchar(75) NOT NULL,
  `IsConfirm` tinyint(1) DEFAULT '0',
  `IsAdmin` tinyint(1) DEFAULT '0',
  `FK_Order_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`User_ID`, `Username`, `Password`, `User_LastName`, `User_FirstName`, `User_Email`, `User_Inscription`, `User_Phone`, `User_Adresse`, `IsConfirm`, `IsAdmin`, `FK_Order_ID`) VALUES
(1, 'Zoombo', 'Zoombo', 'Tremblay', 'Bob', 'bob@xd.ca', '2017-10-04', '418-376-5656', '444 chemin du xd', 0, 0, 1),
(2, 'Bob10101', 'allo123', 'Binette', 'Boby', 'bob@das.com', '2017-11-08', '418-420-6969', 'Chemin du lol', 0, 0, 1),
(3, 'Bob10101', 'allo123', 'Binette', 'Boby', 'bob@das.com', '2017-11-08', '418-420-6969', 'Chemin du lol', 0, 0, 1),
(4, 'Bob10101', 'allo123', 'Binette', 'Boby', 'bob@das.com', '2017-11-08', '418-420-6969', 'Chemin du lol', 0, 0, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
