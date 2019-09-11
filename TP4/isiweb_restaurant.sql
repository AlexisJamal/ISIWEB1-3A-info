-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 13 déc. 2018 à 16:04
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
-- Base de données :  `isiweb_restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `codeCat` varchar(1) NOT NULL,
  `libelleCat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`codeCat`, `libelleCat`) VALUES
('A', 'Entrée'),
('B', 'Plat principal'),
('C', 'Dessert');

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `refPlat` varchar(4) NOT NULL,
  `nomPlat` varchar(50) NOT NULL,
  `prix` decimal(5,2) NOT NULL,
  `nomImg` varchar(50) NOT NULL,
  `hitParade` int(1) DEFAULT NULL,
  `codeCat` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`refPlat`, `nomPlat`, `prix`, `nomImg`, `hitParade`, `codeCat`) VALUES
('d1', 'Ile flottante', '6.00', 'ile_flottante.jpg', NULL, 'C'),
('d2', 'Fondant au chocolat', '5.00', 'fondant.jpg', 2, 'C'),
('d3', 'Cafe gourmand', '7.00', 'cafe.jpg', 1, 'C'),
('e1', 'Cake aux olives', '13.00', 'cake.jpg', 4, 'A'),
('e2', 'Velouté de carottes', '9.50', 'veloute.jpg', 1, 'A'),
('e3', 'Verrine fraîcheur', '8.00', 'verrine.jpg', NULL, 'A'),
('p1', 'Poulet au curry avec du riz', '21.00', 'poulet.jpg', 3, 'B'),
('p2', 'Magret de canard avec polenta', '25.00', 'magret.jpg', 1, 'B'),
('p3', 'Entrecote avec patates sautées', '29.00', 'entrecote.jpg', 4, 'B');

-- --------------------------------------------------------

--
-- Structure de la table `utilis`
--

CREATE TABLE `utilis` (
  `NumUtil` int(11) NOT NULL,
  `NomUtil` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PrenomUtil` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LoginUtil` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PassUtil` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilis`
--

INSERT INTO `utilis` (`NumUtil`, `NomUtil`, `PrenomUtil`, `LoginUtil`, `PassUtil`) VALUES
(1, 'VIAL', 'Christian', 'cvial', 'secret'),
(2, 'ARSANE', 'Alain', 'aarsane', 'mdp'),
(3, 'DURON', 'David', 'dduron', 'mdp'),
(4, 'CHEMIN', 'Pascal', 'pchemin', 'mdp');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`codeCat`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`refPlat`),
  ADD KEY `fk_codeCat` (`codeCat`);

--
-- Index pour la table `utilis`
--
ALTER TABLE `utilis`
  ADD PRIMARY KEY (`NumUtil`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilis`
--
ALTER TABLE `utilis`
  MODIFY `NumUtil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `fk_code_categorie` FOREIGN KEY (`codeCat`) REFERENCES `categorie` (`codeCat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
