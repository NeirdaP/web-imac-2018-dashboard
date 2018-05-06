-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 30 avr. 2018 à 09:53
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `movie_dashboard`
--

-- --------------------------------------------------------

--
-- Structure de la table `actor`
--

DROP TABLE IF EXISTS `actor`;
CREATE TABLE IF NOT EXISTS `actor` (
  `idCast` int(11) NOT NULL,
  `idMovie` int(11) NOT NULL,
  `role` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idCast`,`idMovie`),
  KEY `actorMovie` (`idMovie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `cast`
--

DROP TABLE IF EXISTS `cast`;
CREATE TABLE IF NOT EXISTS `cast` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(50) COLLATE utf8_bin NOT NULL,
  `sex` char(1) COLLATE utf8_bin NOT NULL,
  `nationality` char(3) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `castNationality` (`nationality`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `director`
--

DROP TABLE IF EXISTS `director`;
CREATE TABLE IF NOT EXISTS `director` (
  `idCast` int(11) NOT NULL,
  `idMovie` int(11) NOT NULL,
  PRIMARY KEY (`idCast`,`idMovie`),
  KEY `directorMovie` (`idMovie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `frequenting`
--

DROP TABLE IF EXISTS `frequenting`;
CREATE TABLE IF NOT EXISTS `frequenting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` date NOT NULL,
  `month` date NOT NULL,
  `numbersOfEntries` int(11) NOT NULL,
  `idTheater` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idTheater` (`idTheater`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `movie`
--

DROP TABLE IF EXISTS `movie`;
CREATE TABLE IF NOT EXISTS `movie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_bin NOT NULL,
  `blackAndWhite` tinyint(1) NOT NULL,
  `releaseDate` date NOT NULL,
  `imageLink` varchar(100) COLLATE utf8_bin NOT NULL,
  `nationality` char(3) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `movieNationality` (`nationality`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `moviegenre`
--

DROP TABLE IF EXISTS `moviegenre`;
CREATE TABLE IF NOT EXISTS `moviegenre` (
  `idMovie` int(11) NOT NULL,
  `idGenre` int(11) NOT NULL,
  PRIMARY KEY (`idMovie`,`idGenre`),
  KEY `MovieGenre_Genre` (`idGenre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `movietheater`
--

DROP TABLE IF EXISTS `movietheater`;
CREATE TABLE IF NOT EXISTS `movietheater` (
  `idMovie` int(11) NOT NULL,
  `idTheater` int(11) NOT NULL,
  PRIMARY KEY (`idMovie`,`idTheater`),
  KEY `MovieTheater_Theater` (`idTheater`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `nationality`
--

DROP TABLE IF EXISTS `nationality`;
CREATE TABLE IF NOT EXISTS `nationality` (
  `countryCode` char(3) COLLATE utf8_bin NOT NULL,
  `countryName` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`countryCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `theater`
--

DROP TABLE IF EXISTS `theater`;
CREATE TABLE IF NOT EXISTS `theater` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `address` varchar(100) COLLATE utf8_bin NOT NULL,
  `postalCode` int(5) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `numberOfSeat` int(11) NOT NULL,
  `numberOfRoom` int(11) NOT NULL,
  `artHouse` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `actor`
--
ALTER TABLE `actor`
  ADD CONSTRAINT `actorCast` FOREIGN KEY (`idCast`) REFERENCES `cast` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actorMovie` FOREIGN KEY (`idMovie`) REFERENCES `movie` (`id`);

--
-- Contraintes pour la table `cast`
--
ALTER TABLE `cast`
  ADD CONSTRAINT `castNationality` FOREIGN KEY (`nationality`) REFERENCES `nationality` (`countryCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `director`
--
ALTER TABLE `director`
  ADD CONSTRAINT `directorCast` FOREIGN KEY (`idCast`) REFERENCES `cast` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `directorMovie` FOREIGN KEY (`idMovie`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `frequenting`
--
ALTER TABLE `frequenting`
  ADD CONSTRAINT `idTheater` FOREIGN KEY (`idTheater`) REFERENCES `theater` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movieNationality` FOREIGN KEY (`nationality`) REFERENCES `nationality` (`countryCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `moviegenre`
--
ALTER TABLE `moviegenre`
  ADD CONSTRAINT `MovieGenre_Genre` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `MovieGenre_Movie` FOREIGN KEY (`idMovie`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `movietheater`
--
ALTER TABLE `movietheater`
  ADD CONSTRAINT `MovieTheater_Movie` FOREIGN KEY (`idMovie`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `MovieTheater_Theater` FOREIGN KEY (`idTheater`) REFERENCES `theater` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
