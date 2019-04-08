-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 25 mars 2019 à 16:27
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
-- Base de données :  `ppe1719`
--

-- --------------------------------------------------------

--
-- Structure de la table `bornes`
--

DROP TABLE IF EXISTS `bornes`;
CREATE TABLE IF NOT EXISTS `bornes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantite` varchar(255) DEFAULT NULL,
  `prix` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bornes`
--

INSERT INTO `bornes` (`id`, `name`, `img_url`, `code`, `description`, `quantite`, `prix`) VALUES
(1, 'borne_1', 'a1.jpg', '458', 'une joli borne des ses grands morts ( mais on l\'aime bien quand même )', '3', '599'),
(2, 'borne_2', 'camera.png', '458', 'oui ça ressemble a une machine à café , mais on est pauvre , donc on fait avec ', '3', '199');

-- --------------------------------------------------------

--
-- Structure de la table `forfait`
--

DROP TABLE IF EXISTS `forfait`;
CREATE TABLE IF NOT EXISTS `forfait` (
  `id` int(11) NOT NULL,
  `Nb_photo_select` int(11) NOT NULL,
  `Nb_photo_left` int(11) NOT NULL,
  `Nb_photo_max` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `forfait`
--

INSERT INTO `forfait` (`id`, `Nb_photo_select`, `Nb_photo_left`, `Nb_photo_max`) VALUES
(1, 10, 10, 100);

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_prise` datetime DEFAULT NULL,
  `id_reservation` int(11) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `estAime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_reservation_idx` (`id_reservation`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `photos`
--

INSERT INTO `photos` (`id`, `date_prise`, `id_reservation`, `url`, `estAime`) VALUES
(4, '2019-03-03 00:00:00', 5, 'images/1.jpg', 0),
(5, '2019-03-03 00:00:05', 5, 'images/1.jpg', 0),
(6, '2019-03-03 00:00:15', 5, 'images/2.jpg', 0),
(7, '2019-03-04 00:00:15', 5, 'images/5.jpg', 0),
(8, '2019-03-03 00:00:00', 5, 'images/img03.png', 0),
(9, '2019-03-03 00:00:00', 5, 'images/img03.png', 0);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `id_forfait` int(11) NOT NULL,
  `id_borne` int(11) NOT NULL,
  `date_beg` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_bornes` (`id_borne`),
  KEY `id_users` (`id_users`),
  KEY `id_forfait` (`id_forfait`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `id_users`, `id_forfait`, `id_borne`, `date_beg`, `date_end`) VALUES
(5, 3, 1, 1, '2019-03-01 00:00:00', '2019-03-05 00:00:00'),
(6, 3, 1, 1, '2019-03-09 00:00:00', '2019-03-28 00:00:00'),
(7, 3, 1, 1, '2019-04-09 00:00:00', '2019-04-28 00:00:00'),
(8, 3, 1, 1, '2019-03-01 00:00:00', '2019-03-14 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `confirmation_token` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL,
  `reset_token` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `roles` enum('menber','Admin') COLLATE latin1_general_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `confirmation_token`, `confirmed_at`, `reset_token`, `reset_at`, `roles`, `role_id`) VALUES
(3, 'coucou', 'coucou@gmail.com', '721a9b52bfceacc503c056e3b9b93cfa', NULL, NULL, NULL, NULL, 'menber', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`id_reservation`) REFERENCES `reservations` (`id`);

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`id_borne`) REFERENCES `bornes` (`id`),
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`id_forfait`) REFERENCES `forfait` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
