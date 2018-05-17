-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Lun 30 Avril 2018 à 13:41
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `Dashboard`
--

-- --------------------------------------------------------

--
-- Structure de la table `actors`
--

CREATE TABLE `actors` (
  `cast_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `role` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `actors`
--

INSERT INTO `actors` (`cast_id`, `movie_id`, `role`) VALUES
(1, 4, 'Iron Man'),
(1, 7, 'Star Lord'),
(1, 14, 'Captain America'),
(2, 6, 'Thanos'),
(2, 10, 'Thor'),
(2, 12, 'Veuve noire'),
(3, 5, 'Docteur Strange'),
(4, 3, 'Sorcière Noire'),
(4, 7, 'Gamora'),
(4, 8, 'Spider Man'),
(5, 8, 'Nébula'),
(6, 9, 'Oeil de faucon'),
(7, 10, 'Bruce Banner'),
(8, 11, 'Groot'),
(9, 12, 'Drax'),
(9, 13, 'Vision'),
(9, 14, 'Wong');

-- --------------------------------------------------------

--
-- Structure de la table `casts`
--

CREATE TABLE `casts` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(50) COLLATE utf8_bin NOT NULL,
  `sex` char(1) COLLATE utf8_bin NOT NULL,
  `nationalities` char(3) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `casts`
--

INSERT INTO `casts` (`id`, `firstname`, `lastname`, `sex`, `nationalities`) VALUES
(1, 'Holland', 'Roden', 'F', 'GBA'),
(2, 'Daniel', 'Radcliff', 'M', 'GBA'),
(3, 'Julien', 'Doré', 'M', 'FRA'),
(4, 'Emma', 'Watson', 'F', 'GBA'),
(5, 'Scarlett', 'Johansonn', 'F', 'USA'),
(6, 'Robert', 'Downey Jr', 'J', 'USA'),
(7, 'Robert', 'Downey Sr', 'M', 'USA'),
(8, 'Christian', 'Bale', 'M', 'USA'),
(9, 'Keira', 'Knightley', 'F', 'GBA'),
(10, 'Martin', 'Scorsese', 'M', 'USA'),
(11, 'Quentin', 'Tarantino', 'M', 'USA'),
(12, 'Anthony', 'Russo', 'M', 'USA');

-- --------------------------------------------------------

--
-- Structure de la table `directors`
--

CREATE TABLE `directors` (
  `cast_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `directors`
--

INSERT INTO `directors` (`cast_id`, `movie_id`) VALUES
(12, 0),
(11, 4),
(12, 5),
(12, 6),
(10, 7),
(11, 8),
(11, 9),
(11, 10),
(11, 11),
(12, 12),
(10, 13);

-- --------------------------------------------------------

--
-- Structure de la table `frequentings`
--

CREATE TABLE `frequentings` (
  `id` int(11) NOT NULL,
  `year` date NOT NULL,
  `month` date NOT NULL,
  `numbersOfEntries` int(11) NOT NULL,
  `idTheater` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `frequentings`
--

INSERT INTO `frequentings` (`id`, `year`, `month`, `numbersOfEntries`, `idTheater`) VALUES
(1, '2016-01-01', '2016-01-01', 1000, 1),
(2, '2016-01-01', '2016-02-01', 1212, 1),
(3, '2016-01-01', '2016-03-01', 1300, 1),
(4, '2016-01-01', '2016-04-01', 929, 1),
(5, '2016-01-01', '2016-05-01', 934, 1),
(6, '2016-01-01', '2016-06-01', 1100, 1),
(7, '2016-01-01', '2016-07-01', 1293, 1),
(8, '2016-01-01', '2016-08-01', 1212, 1),
(9, '2016-01-01', '2016-09-01', 987, 1),
(10, '2016-01-01', '2016-10-01', 1390, 1),
(11, '2016-01-01', '2016-11-01', 1000, 1),
(12, '2016-01-01', '2016-12-01', 1212, 1),
(13, '2016-01-01', '2016-01-01', 1000, 2),
(14, '2016-01-01', '2016-02-01', 1212, 2),
(15, '2016-01-01', '2016-03-01', 1300, 2),
(16, '2016-01-01', '2016-04-01', 929, 2),
(17, '2016-01-01', '2016-05-01', 934, 2),
(18, '2016-01-01', '2016-06-01', 1100, 2),
(19, '2016-01-01', '2016-07-01', 1293, 2),
(20, '2016-01-01', '2016-08-01', 1212, 2),
(21, '2016-01-01', '2016-09-01', 987, 2),
(22, '2016-01-01', '2016-10-01', 1390, 2),
(23, '2016-01-01', '2016-11-01', 1000, 2),
(24, '2016-01-01', '2016-12-01', 1212, 2),
(25, '2016-01-01', '2016-01-01', 1000, 3),
(26, '2016-01-01', '2016-02-01', 1212, 3),
(27, '2016-01-01', '2016-03-01', 1300, 3),
(28, '2016-01-01', '2016-04-01', 929, 3),
(29, '2016-01-01', '2016-05-01', 934, 3),
(30, '2016-01-01', '2016-06-01', 1100, 3),
(31, '2016-01-01', '2016-07-01', 1293, 3),
(32, '2016-01-01', '2016-08-01', 1212, 3),
(33, '2016-01-01', '2016-09-01', 987, 3),
(34, '2016-01-01', '2016-10-01', 1390, 3),
(35, '2016-01-01', '2016-11-01', 1000, 3),
(36, '2016-01-01', '2016-12-01', 1212, 3),
(37, '2016-01-01', '2016-01-01', 1000, 4),
(38, '2016-01-01', '2016-02-01', 1212, 4),
(39, '2016-01-01', '2016-03-01', 1300, 4),
(40, '2016-01-01', '2016-04-01', 929, 4),
(41, '2016-01-01', '2016-05-01', 934, 4),
(42, '2016-01-01', '2016-06-01', 1100, 4),
(43, '2016-01-01', '2016-07-01', 1293, 4),
(44, '2016-01-01', '2016-08-01', 1212, 4),
(45, '2016-01-01', '2016-09-01', 987, 4),
(46, '2016-01-01', '2016-10-01', 1390, 4),
(47, '2016-01-01', '2016-11-01', 1000, 4),
(48, '2016-01-01', '2016-12-01', 1212, 4),
(49, '2016-01-01', '2016-01-01', 1000, 5),
(50, '2016-01-01', '2016-02-01', 1212, 5),
(51, '2016-01-01', '2016-03-01', 1300, 5),
(52, '2016-01-01', '2016-04-01', 929, 5),
(53, '2016-01-01', '2016-05-01', 934, 5),
(54, '2016-01-01', '2016-06-01', 1100, 5),
(55, '2016-01-01', '2016-07-01', 1293, 5),
(56, '2016-01-01', '2016-08-01', 1212, 5),
(57, '2016-01-01', '2016-09-01', 987, 5),
(58, '2016-01-01', '2016-10-01', 1390, 5),
(59, '2016-01-01', '2016-11-01', 1000, 5),
(60, '2016-01-01', '2016-12-01', 1212, 5),
(61, '2016-01-01', '2016-01-01', 1000, 6),
(62, '2016-01-01', '2016-02-01', 1212, 6),
(63, '2016-01-01', '2016-03-01', 1300, 6),
(64, '2016-01-01', '2016-04-01', 929, 6),
(65, '2016-01-01', '2016-05-01', 934, 6),
(66, '2016-01-01', '2016-06-01', 1100, 6),
(67, '2016-01-01', '2016-08-01', 1293, 6),
(68, '2016-01-01', '2016-08-01', 1212, 6),
(69, '2016-01-01', '2016-09-01', 987, 6),
(70, '2016-01-01', '2016-10-01', 1390, 6),
(71, '2016-01-01', '2016-11-01', 1000, 6),
(72, '2016-01-01', '2016-12-01', 1212, 6),
(73, '2016-01-01', '2016-01-01', 1000, 7),
(74, '2016-01-01', '2016-02-01', 1212, 7),
(75, '2016-01-01', '2016-03-01', 1300, 7),
(76, '2016-01-01', '2016-04-01', 929, 7),
(77, '2016-01-01', '2016-05-01', 934, 7),
(78, '2016-01-01', '2016-06-01', 1100, 7),
(79, '2016-01-01', '2016-07-01', 1293, 7),
(80, '2016-01-01', '2016-08-01', 1212, 7),
(81, '2016-01-01', '2016-09-01', 987, 7),
(82, '2016-01-01', '2016-10-01', 1390, 7),
(83, '2016-01-01', '2016-11-01', 1000, 7),
(84, '2016-01-01', '2016-12-01', 1212, 7),
(85, '2016-01-01', '2016-01-01', 1000, 8),
(86, '2016-01-01', '2016-02-01', 1212, 8),
(87, '2016-01-01', '2016-03-01', 1300, 8),
(88, '2016-01-01', '2016-04-01', 929, 8),
(89, '2016-01-01', '2016-05-01', 934, 8),
(90, '2016-01-01', '2016-06-01', 1100, 8),
(91, '2016-01-01', '2016-07-01', 1293, 8),
(92, '2016-01-01', '2016-08-01', 1212, 8),
(93, '2016-01-01', '2016-09-01', 987, 8),
(94, '2016-01-01', '2016-10-01', 1390, 8),
(95, '2016-01-01', '2016-11-01', 1000, 8),
(96, '2016-01-01', '2016-12-01', 1212, 8),
(97, '2016-01-01', '2016-01-01', 1000, 9),
(98, '2016-01-01', '2016-02-01', 1212, 9),
(99, '2016-01-01', '2016-03-01', 1300, 9),
(100, '2016-01-01', '2016-04-01', 929, 9),
(101, '2016-01-01', '2016-05-01', 934, 9),
(102, '2016-01-01', '2016-06-01', 1100, 9),
(103, '2016-01-01', '2016-07-01', 1293, 9),
(104, '2016-01-01', '2016-08-01', 1212, 9),
(105, '2016-01-01', '2016-09-01', 987, 9),
(106, '2016-01-01', '2016-10-01', 1390, 9),
(107, '2016-01-01', '2016-11-01', 1000, 9),
(108, '2016-01-01', '2016-12-01', 1212, 9),
(109, '2016-01-01', '2016-01-01', 1000, 10),
(110, '2016-01-01', '2016-02-01', 1212, 10),
(111, '2016-01-01', '2016-03-01', 1300, 10),
(112, '2016-01-01', '2016-04-01', 929, 10),
(113, '2016-01-01', '2016-05-01', 934, 10),
(114, '2016-01-01', '2016-06-01', 1100, 10),
(115, '2016-01-01', '2016-07-01', 1293, 10),
(116, '2016-01-01', '2016-08-01', 1212, 10),
(117, '2016-01-01', '2016-09-01', 987, 10),
(118, '2016-01-01', '2016-10-01', 1390, 10),
(119, '2016-01-01', '2016-11-01', 1000, 10),
(120, '2016-01-01', '2016-12-01', 1212, 10),
(121, '2016-01-01', '2016-01-01', 1000, 11),
(122, '2016-01-01', '2016-02-01', 1212, 11),
(123, '2016-01-01', '2016-03-01', 1300, 11),
(124, '2016-01-01', '2016-04-01', 929, 11),
(125, '2016-01-01', '2016-05-01', 934, 11),
(126, '2016-01-01', '2016-06-01', 1100, 11),
(127, '2016-01-01', '2016-07-01', 1293, 11),
(128, '2016-01-01', '2016-08-01', 1212, 11),
(129, '2016-01-01', '2016-09-01', 987, 11),
(130, '2016-01-01', '2016-10-01', 1390, 11),
(131, '2016-01-01', '2016-11-01', 1000, 11),
(132, '2016-01-01', '2016-12-01', 1212, 11),
(133, '2016-01-01', '2016-01-01', 1000, 11),
(134, '2016-01-01', '2016-02-01', 1212, 11),
(135, '2016-01-01', '2016-03-01', 1300, 11),
(136, '2016-01-01', '2016-04-01', 929, 11),
(137, '2016-01-01', '2016-05-01', 934, 11),
(138, '2016-01-01', '2016-06-01', 1100, 11),
(139, '2016-01-01', '2016-07-01', 1293, 11),
(140, '2016-01-01', '2016-08-01', 1212, 11),
(141, '2016-01-01', '2016-09-01', 987, 11),
(142, '2016-01-01', '2016-10-01', 1390, 11),
(143, '2016-01-01', '2016-11-01', 1000, 11),
(144, '2016-01-01', '2016-12-01', 1212, 11);

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Thriller'),
(3, 'Comédie'),
(4, 'Romance'),
(5, 'Biopic'),
(6, 'Science-fiction'),
(7, 'Aventure'),
(8, 'Drame');

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_bin NOT NULL,
  `blackAndWhite` tinyint(1) NOT NULL,
  `releaseDate` date NOT NULL,
  `imageLink` varchar(100) COLLATE utf8_bin NOT NULL,
  `nationalities` char(3) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `movies`
--

INSERT INTO `movies` (`id`, `title`, `blackAndWhite`, `releaseDate`, `imageLink`, `nationalities`) VALUES
(4, 'Zootopie', 0, '0000-00-00', 'lorempicsum.com/nemo/255/200/1', 'USA'),
(5, 'Tuche 2 : Le rêve Américain', 0, '0000-00-00', 'lorempicsum.com/nemo/255/200/1', 'FRA'),
(6, 'Vaiana, La légende du bout du monde', 0, '0000-00-00', 'lorempicsum.com/nemo/255/200/1', 'USA'),
(7, 'Rogue One : A Star Wars Story', 0, '0000-00-00', 'lorempicsum.com/nemo/255/200/1', 'USA'),
(8, 'The Revenant', 0, '0000-00-00', 'lorempicsum.com/nemo/255/200/1', 'USA'),
(9, 'Les Animaux Fantastiques', 0, '0000-00-00', 'lorempicsum.com/nemo/255/200/1', 'GBA'),
(10, 'Deadpool', 0, '0000-00-00', 'lorempicsum.com/nemo/255/200/1', 'USA'),
(11, 'Comme des bêtes', 0, '0000-00-00', 'lorempicsum.com/nemo/255/200/1', 'USA'),
(12, 'Le livre de la Jungle', 0, '0000-00-00', 'lorempicsum.com/nemo/255/200/1', 'USA'),
(13, 'Age de Glace : Les lois de l''univers', 0, '0000-00-00', 'lorempicsum.com/nemo/255/200/1', 'USA'),
(14, 'Le monde de Dory', 0, '0000-00-00', 'lorempicsum.com/nemo/255/200/1', 'USA'),
(15, 'Camping 3', 0, '0000-00-00', 'lorempicsum.com/nemo/255/200/1', 'FRA'),
(16, 'Star Wars : Episode 7, Le réveil de la force', 0, '0000-00-00', 'lorempicsum.com/nemo/255/200/1', 'USA');

-- --------------------------------------------------------

--
-- Structure de la table `genre_movie`
--

CREATE TABLE `genre_movie` (
  `movie_id` int(11) NOT NULL,
  `idGenre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `genre_movie`
--

INSERT INTO `genre_movie` (`movie_id`, `idGenre`) VALUES
(9, 1),
(14, 1),
(8, 2),
(10, 2),
(7, 3),
(15, 3),
(12, 4),
(13, 4),
(13, 5),
(16, 5),
(14, 6),
(16, 6),
(11, 7),
(15, 8),
(16, 8);

-- --------------------------------------------------------

--
-- Structure de la table `movie_theater`
--

CREATE TABLE `movie_theater` (
  `movie_id` int(11) NOT NULL,
  `idTheater` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `movie_theater`
--

INSERT INTO `movie_theater` (`movie_id`, `idTheater`) VALUES
(4, 1),
(9, 1),
(15, 1),
(5, 2),
(8, 2),
(14, 2),
(6, 3),
(7, 3),
(13, 3),
(16, 3),
(6, 4),
(7, 4),
(10, 4),
(12, 4),
(5, 5),
(8, 5),
(11, 5),
(4, 6),
(9, 6),
(10, 6),
(16, 6),
(9, 7),
(10, 7),
(8, 8),
(11, 8),
(12, 8),
(7, 9),
(11, 9),
(12, 9),
(6, 10),
(13, 10),
(14, 10),
(15, 10),
(5, 11),
(13, 11),
(14, 11),
(4, 12),
(15, 12),
(16, 12);

-- --------------------------------------------------------

--
-- Structure de la table `nationalities`
--

CREATE TABLE `nationalities` (
  `countryCode` char(3) COLLATE utf8_bin NOT NULL,
  `countryName` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `nationalities`
--

INSERT INTO `nationalities` (`countryCode`, `countryName`) VALUES
('FRA', 'France'),
('GBA', 'Grande Bretagne'),
('USA', 'États-Unis');

-- --------------------------------------------------------

--
-- Structure de la table `theaters`
--

CREATE TABLE `theaters` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `address` varchar(100) COLLATE utf8_bin NOT NULL,
  `postalCode` int(5) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `numberOfSeat` int(11) NOT NULL,
  `numberOfRoom` int(11) NOT NULL,
  `artHouse` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `theaters`
--

INSERT INTO `theaters` (`id`, `name`, `address`, `postalCode`, `latitude`, `longitude`, `numberOfSeat`, `numberOfRoom`, `artHouse`) VALUES
(1, 'Espace Saint Michel 1', '7 place Saint Michel', 75005, 48.8531, 2.34423, 210, 2, 1),
(2, 'Espace Saint Michel 1', '7 place Saint Michel', 75005, 48.8531, 2.34423, 210, 2, 1),
(3, 'Le Desperao 1', '23 rue des écoles', 75005, 48.8484, 2.34897, 200, 2, 1),
(4, 'Mistral 2', '70 avenue du Général Leclerc', 75014, 48.8295, 2.32801, 870, 5, 0),
(5, 'MK2 Gambetta 1', '6 rue Belgrand', 75020, 48.8648, 2.39955, 1238, 6, 0),
(6, 'Publicis Cinema 2', '133 Avenue des Champs Élysées', 75008, 48.8728, 2.29698, 609, 2, 0),
(7, 'Beverley', '14 Rue Ville Neuve', 75002, 48.8701, 2.34872, 100, 1, 0),
(8, 'Gaumont Convention 2', '27, 31 Rue Alain Chartier', 75015, 48.838, 2.29583, 1078, 6, 0),
(9, 'Gaumont Opéra Français 8', '38 Boulevard des Italiens', 75009, 48.871, 2.33439, 994, 5, 0),
(10, 'L''arlequin Panorama', '76 Rue de Rennes', 75006, 48.8513, 2.33065, 595, 3, 1),
(11, 'MK2 Grand Palais', 'Grand Palais Champs Élysées', 75008, 48.8708, 2.30432, 92, 1, 0),
(12, 'Nouvel Odéan', '6 rue de l''école de médecine', 75006, 48.8508, 2.34175, 119, 1, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`cast_id`,`movie_id`),
  ADD KEY `actorMovie` (`movie_id`);

--
-- Index pour la table `casts`
--
ALTER TABLE `casts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `castNationality` (`nationalities`);

--
-- Index pour la table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`cast_id`,`movie_id`),
  ADD KEY `directorMovie` (`movie_id`);

--
-- Index pour la table `frequentings`
--
ALTER TABLE `frequentings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTheater` (`idTheater`);

--
-- Index pour la table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movieNationality` (`nationalities`);

--
-- Index pour la table `genre_movie`
--
ALTER TABLE `genre_movie`
  ADD PRIMARY KEY (`movie_id`,`idGenre`),
  ADD KEY `MovieGenre_Genre` (`idGenre`);

--
-- Index pour la table `movie_theater`
--
ALTER TABLE `movie_theater`
  ADD PRIMARY KEY (`movie_id`,`idTheater`),
  ADD KEY `MovieTheater_Theater` (`idTheater`);

--
-- Index pour la table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`countryCode`);

--
-- Index pour la table `theaters`
--
ALTER TABLE `theaters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `casts`
--
ALTER TABLE `casts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `frequentings`
--
ALTER TABLE `frequentings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT pour la table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `theaters`
--
ALTER TABLE `theaters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `casts`
--
ALTER TABLE `casts`
  ADD CONSTRAINT `castNationality` FOREIGN KEY (`nationalities`) REFERENCES `nationalities` (`countryCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `frequentings`
--
ALTER TABLE `frequentings`
  ADD CONSTRAINT `idTheater` FOREIGN KEY (`idTheater`) REFERENCES `theaters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movieNationality` FOREIGN KEY (`nationalities`) REFERENCES `nationalities` (`countryCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `genre_movie`
--
ALTER TABLE `genre_movie`
  ADD CONSTRAINT `MovieGenre_Genre` FOREIGN KEY (`idGenre`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `MovieGenre_Movie` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `movie_theater`
--
ALTER TABLE `movie_theater`
  ADD CONSTRAINT `MovieTheater_Movie` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `MovieTheater_Theater` FOREIGN KEY (`idTheater`) REFERENCES `theaters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;