-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 20 nov. 2020 à 14:58
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `conciergerie`
--

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

DROP TABLE IF EXISTS `intervention`;
CREATE TABLE IF NOT EXISTS `intervention` (
  `ID_intervention` int(20) NOT NULL AUTO_INCREMENT,
  `type_intervention` varchar(255) NOT NULL,
  `date_intervention` date NOT NULL,
  `etage_intervention` bigint(255) NOT NULL,
  PRIMARY KEY (`ID_intervention`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `intervention`
--

INSERT INTO `intervention` (`ID_intervention`, `type_intervention`, `date_intervention`, `etage_intervention`) VALUES
(1, 'changement serrure', '2020-11-12', 2),
(2, 'Changement serrure', '2020-11-18', 3),
(3, 'remplacement serrure', '2020-11-19', 1),
(4, 'remplacement carrelage', '2020-11-23', 2),
(5, 'remplacement serrure', '2020-11-18', 3),
(6, 'remplacement serrure', '2020-11-18', 3),
(7, 'remplacement lampe', '2020-11-14', 2),
(8, 'remplacement carrelage', '2020-11-19', 1),
(9, 'reparation vitre ', '2020-11-19', 1),
(10, 'remplacement ampoule', '2020-11-11', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
