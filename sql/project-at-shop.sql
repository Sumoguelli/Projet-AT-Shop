-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 30 jan. 2026 à 11:17
-- Version du serveur : 8.4.7
-- Version de PHP : 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_at_shop`
--
CREATE DATABASE IF NOT EXISTS `projet_at_shop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `projet_at_shop`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Armes', 'Armes de combat'),
(2, 'Grades', 'Grades VIP'),
(3, 'Armures', 'Équipements de protection');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int DEFAULT '0',
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_category` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `stock`, `type`, `category_id`, `created_at`) VALUES
(1, 'Épée en diamant', 'Très puissante', 9.99, NULL, 10, 'Weapon', 1, '2026-01-29 19:51:45'),
(2, 'Grade VIP', 'Accès premium', 19.99, NULL, 5, 'Grade', 2, '2026-01-29 19:51:45'),
(3, 'pioche en pierre', 'Outil', 14.99, NULL, 67, '', 3, '2026-01-30 11:23:30'),
(4, 'pioche en fer', 'Outil', 18.99, NULL, 14, '', 3, '2026-01-30 11:24:36'),
(5, 'Épée en bois', 'Arme basique Minecraft', 3.99, NULL, 80, 'Weapon', 1, '2026-01-30 12:13:09'),
(6, 'Épée en pierre', 'Arme standard', 6.99, NULL, 60, 'Weapon', 1, '2026-01-30 12:13:09'),
(7, 'Épée en fer', 'Arme solide', 12.99, NULL, 40, 'Weapon', 1, '2026-01-30 12:13:09'),
(8, 'Épée en diamant', 'Arme très puissante', 24.99, NULL, 15, 'Weapon', 1, '2026-01-30 12:13:09'),
(9, 'Arc', 'Arme à distance', 14.99, NULL, 30, 'Weapon', 1, '2026-01-30 12:13:09'),
(10, 'Arbalète', 'Arme lourde', 19.99, NULL, 20, 'Weapon', 1, '2026-01-30 12:13:09'),
(11, 'Casque en cuir', 'Protection légère', 4.99, NULL, 70, 'Armor', 3, '2026-01-30 12:13:09'),
(12, 'Plastron en fer', 'Bonne protection', 18.99, NULL, 35, 'Armor', 3, '2026-01-30 12:13:09'),
(13, 'Jambières en fer', 'Protège les jambes', 15.99, NULL, 35, 'Armor', 3, '2026-01-30 12:13:09'),
(14, 'Bottes en fer', 'Protège les pieds', 10.99, NULL, 40, 'Armor', 3, '2026-01-30 12:13:09'),
(15, 'Armure en diamant', 'Protection ultime', 49.99, NULL, 10, 'Armor', 3, '2026-01-30 12:13:09'),
(16, 'Grade VIP', 'Accès premium au serveur', 9.99, NULL, 100, 'Grade', 2, '2026-01-30 12:13:09'),
(17, 'Grade VIP+', 'Avantages supplémentaires', 19.99, NULL, 50, 'Grade', 2, '2026-01-30 12:13:09'),
(18, 'Grade MVP', 'Accès exclusif', 29.99, NULL, 30, 'Grade', 2, '2026-01-30 12:13:09'),
(19, 'Grade MVP+', 'Tous les avantages', 49.99, NULL, 15, 'Grade', 2, '2026-01-30 12:13:09');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('ROLE_USER','ROLE_ADMIN') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ROLE_USER',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'admin', 'admin@site.fr', '$2y$12$uzi2T/up3C/DqyjV9evRUefkkGhsyRGF0s7YpkineSH1EIDd2pGMW', 'ROLE_ADMIN', '2026-01-29 19:51:45'),
(2, 'user', 'user@site.fr', '$2y$12$ywjRDE7F7l6AbvtTWp5ikuloXu.P2d2j3XgDiR10z51ufEtxaFRhy', 'ROLE_USER', '2026-01-29 19:51:45'),
(5, 'test', 'test.test@test.fr', '$2y$10$DrnWGW7FH6wbwObyaoKGrexIlaIcHrCJhM4lX98S11MzTk1rHxNKG', 'ROLE_USER', '2026-01-30 10:41:06'),
(6, 'test', 'tetsuo@sfr.fr', '$2y$10$1PIroBrW0KvMK8Lq/4lybOurwSYd0VvRbl7m0de6Lr3dDbuoKFS9a', 'ROLE_USER', '2026-01-30 10:55:05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
