-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 21 avr. 2024 à 12:04
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionapprenants`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Date_debut` datetime NOT NULL,
  `Date_fin` datetime NOT NULL,
  `Code` int NOT NULL,
  `Id_Promotion` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id_1` (`Id_Promotion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Date_debut` date NOT NULL,
  `Date_fin` date NOT NULL,
  `Places` int NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`Id`, `Nom`, `Date_debut`, `Date_fin`, `Places`) VALUES
(1, 'DWWM 3', '2024-01-01', '2024-12-01', 15),
(2, 'DWWM 2', '2024-01-01', '2024-12-01', 15),
(3, 'CDA', '2024-01-01', '2024-12-01', 12),
(4, 'CDA dist', '2024-01-01', '2024-12-01', 12),
(5, 'DTI 1', '2024-01-01', '2024-12-01', 12),
(6, 'DTI 2', '2024-01-01', '2024-12-01', 12),
(7, 'CDA PSH OPS', '2024-01-01', '2024-12-01', 10);

-- --------------------------------------------------------

--
-- Structure de la table `relation_utilisateur_cours`
--

DROP TABLE IF EXISTS `relation_utilisateur_cours`;
CREATE TABLE IF NOT EXISTS `relation_utilisateur_cours` (
  `Id_Utilisateur` int NOT NULL,
  `Id_Cours` int NOT NULL,
  `Present` tinyint(1) NOT NULL,
  `Retard` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id_Utilisateur`,`Id_Cours`),
  KEY `Id_1` (`Id_Cours`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `relation_utilisateur_promotion`
--

DROP TABLE IF EXISTS `relation_utilisateur_promotion`;
CREATE TABLE IF NOT EXISTS `relation_utilisateur_promotion` (
  `Id_Utilisateur` int NOT NULL,
  `Id_Promotion` int NOT NULL,
  PRIMARY KEY (`Id_Utilisateur`,`Id_Promotion`),
  KEY `Id_1` (`Id_Promotion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `relation_utilisateur_promotion`
--

INSERT INTO `relation_utilisateur_promotion` (`Id_Utilisateur`, `Id_Promotion`) VALUES
(1, 1),
(9, 1);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`Id`, `Nom`) VALUES
(0, 'Apprenant'),
(1, 'Formateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Mdp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Compte_active` tinyint(1) NOT NULL DEFAULT '0',
  `Id_Role` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Email` (`Email`),
  KEY `Id_1` (`Id_Role`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Id`, `Prenom`, `Nom`, `Mdp`, `Email`, `Compte_active`, `Id_Role`) VALUES
(1, 'Clément', 'Terme', '1234', 'clement73terme@gmail.com', 0, 1),
(3, 'Clément', 'Terme', '1234', 'clement73term@gmail.com', 1, 0),
(5, 'Clément', 'Terme', '1234', 'clement73ter@gmail.com', 2, 0),
(6, 'Clément', 'Terme', '1234', 'clement73t@gmail.com', 0, 0),
(7, 'Clément', 'Terme', '1234', 'clement73@gmail.com', 0, 0),
(8, 'John', 'Cena', '1234', 'johncena@gmail.com', 3, 1),
(9, 'Clément', 'Terme', '1234', 'clement73terme@gmail.co', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
