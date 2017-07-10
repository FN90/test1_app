-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 10 Juillet 2017 à 18:13
-- Version du serveur :  5.6.24
-- Version de PHP :  5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `test1_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `boat`
--

CREATE TABLE IF NOT EXISTS `boat` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `color` enum('BLUE','NAVY_BLUE','GREEN','RED','PURPLE','WHITE','BLACK','YELLOW') NOT NULL DEFAULT 'BLUE',
  `last_student_change` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `boat`
--

INSERT INTO `boat` (`id`, `name`, `price`, `color`, `last_student_change`) VALUES
(1, 'Boat1', 34.6, 'BLUE', '2017-07-10 04:27:35'),
(2, 'BoatX2', 44.8, 'PURPLE', '2017-07-10 04:28:05');

-- --------------------------------------------------------

--
-- Structure de la table `boat_has_book`
--

CREATE TABLE IF NOT EXISTS `boat_has_book` (
  `id` int(11) unsigned NOT NULL,
  `id_boat` int(11) DEFAULT NULL,
  `id_book` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `boat_has_book`
--

INSERT INTO `boat_has_book` (`id`, `id_boat`, `id_book`) VALUES
(5, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `boat_has_skipair`
--

CREATE TABLE IF NOT EXISTS `boat_has_skipair` (
  `id` int(11) unsigned NOT NULL,
  `id_boat` int(11) DEFAULT NULL,
  `id_student_skipair1` int(11) DEFAULT NULL,
  `id_student_skipair2` int(11) DEFAULT NULL,
  `id_student_skipair3` int(11) DEFAULT NULL,
  `id_student_skipair4` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `boat_has_student`
--

CREATE TABLE IF NOT EXISTS `boat_has_student` (
  `id` int(11) unsigned NOT NULL,
  `id_boat` int(11) DEFAULT NULL,
  `id_student` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `boat_has_student`
--

INSERT INTO `boat_has_student` (`id`, `id_boat`, `id_student`) VALUES
(14, 1, 6),
(4, 1, 7),
(5, 1, 5),
(15, 2, 11),
(8, 1, 12),
(10, 1, 13),
(11, 1, 4),
(19, 2, 10),
(18, 1, 14);

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `url_on_amazon` varchar(255) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `book`
--

INSERT INTO `book` (`id`, `name`, `url_on_amazon`) VALUES
(2, 'Deep learning', 'www.amazon.ca/book/1233'),
(3, 'Artificial Intelligence', 'https://www.amazon.com/Heart-Machine-Artificial-Emotional-Intelligence-ebook');

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) unsigned NOT NULL,
  `first_name` varchar(70) DEFAULT NULL,
  `last_name` varchar(70) DEFAULT NULL,
  `has_skipair` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `student`
--

INSERT INTO `student` (`id`, `first_name`, `last_name`, `has_skipair`) VALUES
(4, 'John', 'Takeda', 0),
(3, 'STD1', 'NAME', 0),
(5, 'Jeanne', 'Wan', 0),
(6, 'Apolosi', 'Kalomira', 1),
(7, 'Hugo', 'Palermo', 1),
(10, 'Jasmin', 'Charle', 1),
(11, 'Jack', 'Duppin', 1),
(12, 'Maria', 'Melle', 1),
(13, 'Hajash', 'Ajinbi', 0),
(14, 'Soliman', 'Guirat', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Fahmi', 'Ncibi', 'ncibi.fehmi@gmail.com', 'demo');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `boat`
--
ALTER TABLE `boat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `boat_has_book`
--
ALTER TABLE `boat_has_book`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `boat_has_skipair`
--
ALTER TABLE `boat_has_skipair`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `boat_has_student`
--
ALTER TABLE `boat_has_student`
  ADD PRIMARY KEY (`id`), ADD KEY `id_student` (`id_student`), ADD KEY `id_boat` (`id_boat`);

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `boat`
--
ALTER TABLE `boat`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `boat_has_book`
--
ALTER TABLE `boat_has_book`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `boat_has_skipair`
--
ALTER TABLE `boat_has_skipair`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `boat_has_student`
--
ALTER TABLE `boat_has_student`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
