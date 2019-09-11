-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 07 jan. 2019 à 09:40
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `isiweb_tp5bis`
--

-- --------------------------------------------------------

--
-- Structure de la table `creneau`
--

CREATE TABLE `creneau` (
  `id` int(11) NOT NULL,
  `debut` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `duree` int(2) NOT NULL,
  `exclu` tinyint(1) NOT NULL,
  `publi` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idProf` int(11) NOT NULL,
  `indicateur` varchar(10) NOT NULL,
  `note` float DEFAULT NULL,
  `commentaireAvant` text,
  `commentaireApres` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `creneau`
--

INSERT INTO `creneau` (`id`, `debut`, `duree`, `exclu`, `publi`, `idProf`, `indicateur`, `note`, `commentaireAvant`, `commentaireApres`) VALUES
(1, '0000-00-00 00:00:00', 5, 1, '0000-00-00 00:00:00', 12, 'Libre', 20, 'com', 'com'),
(2, '0000-00-00 00:00:00', 9, 0, '0000-00-00 00:00:00', 10, 'Soutenu', 19, 'test', 'tets');

-- --------------------------------------------------------

--
-- Structure de la table `utilis`
--

CREATE TABLE `utilis` (
  `id` int(11) NOT NULL,
  `Nom` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prenom` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Login` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Password` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Role` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilis`
--

INSERT INTO `utilis` (`id`, `Nom`, `Prenom`, `Login`, `Password`, `Description`, `Role`, `enabled`) VALUES
(1, 'Fremaux', 'Valery', 'vf', 'xxxxxx', 'Administrateur', 'ADMIN', 1),
(2, 'de Milleville', 'Hervé', 'hdm', 'yyyyyy', 'Responsable du département', 'MEMBER', 1),
(3, 'Chelouah', 'Rachid', 'rc', 'zzzzzz', 'Enseignant', 'MEMBER', 1),
(4, 'Glonneau', 'Bernard', 'bg', 'wwwwww', 'Enseignant', 'MEMBER', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
