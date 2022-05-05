-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 22 avr. 2022 à 06:49
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boutique_en_ligne`
--

-- --------------------------------------------------------

--
-- Structure de la table `achats`
--

CREATE TABLE `achats` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `achats`
--

INSERT INTO `achats` (`id`, `id_article`, `id_users`, `date`) VALUES
(3, 6, 4, '2022-04-21 18:58:06');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `name`, `image`, `description`, `prix`) VALUES
(4, 'firearm', 'img/NFT1.jpg', 'ce produit est un test ', 33),
(7, 'Molotov c', './img/nft4.JPG', 'molotov', 88),
(8, 'axe', './img/nft5.JPG', 'axe', 33),
(9, 'M4', './img/m4.JPG', 'M4', 77),
(10, 'scout', './img/scout.JPG', 'scout', 33),
(11, 'Galil', './img/galil.JPG', 'galil', 678),
(13, 'Mac-10', './img/mac10.JPG', 'mac 10', 55);

-- --------------------------------------------------------

--
-- Structure de la table `articles_acheter`
--

CREATE TABLE `articles_acheter` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL,
  `owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles_acheter`
--

INSERT INTO `articles_acheter` (`id`, `name`, `image`, `description`, `prix`, `owner`) VALUES
(6, 'revolver', './img/revolver.JPG', 'marche stp', 55, 4);

-- --------------------------------------------------------

--
-- Structure de la table `cartes`
--

CREATE TABLE `cartes` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `CVV` varchar(255) NOT NULL,
  `date_exp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cartes`
--

INSERT INTO `cartes` (`id`, `id_user`, `card_number`, `name`, `CVV`, `date_exp`) VALUES
(1, 4, '$2y$12$Kr1ox4yyqq6QpZ8JgoVZteEZs7B9f6xUIrVzv0vh.gfz81F6Axq16', '$2y$12$zHlKoH3lFIqtEI4XDPpN8eTvgbKdsV9j1If3SkI/JdmDGZovRezz2', '$2y$12$IY9W1.ND0jiWwzKoWhrO5ezbAR1cMVPt1Cg9O/7VdOlLMLbo99w72', '2025-01-16');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(3, 'Fusils à pompe'),
(4, 'Mitraillettes'),
(5, 'armes de poing'),
(6, 'fusils d\'assaut');

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

CREATE TABLE `droits` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `walet` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_droit` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `walet`, `lastname`, `firstname`, `email`, `password`, `id_droit`) VALUES
(4, 'Xbd5d69dauh7', 'admin', 'admin', 'admin@laplateforme.io', '$2y$12$1Vh1WSlHla5TA4nSl0o/U.68FEEZcmbcjEir2Jjhoxdlv3UB3rXna', 1),
(5, 'Xrp69khelaf667', 'test', 'test', 'test@laplateforme.io', '$2y$12$JyvZS0IKqgPV7XkMDxX7buxaMlG6POctavQDV7w3kkz.v7AFtd1Gy', 1),
(6, 'Xrazdca42dw', 'test3', 'test3', 'test3@laplateforme.io', '$2y$12$WRhIdS.G0PvzanYLvW867eVnVdK/MTAT7aOO6AiXbiplWx1yYZfeq', 1),
(7, 'Xrdzmdp3da', 'test4', 'test4', 'test4@laplateforme.io', '$2y$12$vsn35In3eC0/LjqkUf25x.lypG9akJqb/pcOFS8kZGBBvJ9dDC/X6', 1),
(8, 'Xrda56zda', 'test5', 'test5', 'test5@laplateforme.io', '$2y$12$izM8c1Bl6Sfamu4V7lIDlu15FuHAkAO.hp89lIDd7iuj6qhmnZWze', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achats`
--
ALTER TABLE `achats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `articles_acheter`
--
ALTER TABLE `articles_acheter`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cartes`
--
ALTER TABLE `cartes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `droits`
--
ALTER TABLE `droits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `achats`
--
ALTER TABLE `achats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `articles_acheter`
--
ALTER TABLE `articles_acheter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `cartes`
--
ALTER TABLE `cartes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `droits`
--
ALTER TABLE `droits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
