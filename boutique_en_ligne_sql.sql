-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 14, 2022 at 11:51 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boutique_en_ligne.sql`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `name`, `image`, `description`, `prix`) VALUES
(4, 'firearm', 'img/NFT1.jpg', 'ce produit est un test ', 33),
(5, 'hachet', './img/NFT2.JPG', 'hache', 66),
(6, 'revolver', './img/revolver.JPG', 'marche stp', 55),
(7, 'Molotov c', './img/nft4.JPG', 'molotov', 88),
(8, 'axe', './img/nft5.JPG', 'axe', 33),
(9, 'M4', './img/m4.JPG', 'M4', 77),
(10, 'scout', './img/scout.JPG', 'scout', 33),
(11, 'Galil', './img/galil.JPG', 'galil', 678),
(12, 'Pick', './img/pick.JPG', 'un pick', 22),
(13, 'Mac-10', './img/mac10.JPG', 'mac 10', 55);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(3, 'Fusils à pompe'),
(4, 'Mitraillettes'),
(5, 'armes de poing'),
(6, 'fusils d\'assaut');

-- --------------------------------------------------------

--
-- Table structure for table `droits`
--

CREATE TABLE `droits` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `walet`, `lastname`, `firstname`, `email`, `password`, `id_droit`) VALUES
(4, 'Xbd5d69dauh7', 'admin', 'admin', 'admin@laplateforme.io', '$2y$12$1Vh1WSlHla5TA4nSl0o/U.68FEEZcmbcjEir2Jjhoxdlv3UB3rXna', 1),
(5, 'Xrp69khelaf667', 'test', 'test', 'test@laplateforme.io', '$2y$12$JyvZS0IKqgPV7XkMDxX7buxaMlG6POctavQDV7w3kkz.v7AFtd1Gy', 1),
(6, 'Xrazdca42dw', 'test3', 'test3', 'test3@laplateforme.io', '$2y$12$WRhIdS.G0PvzanYLvW867eVnVdK/MTAT7aOO6AiXbiplWx1yYZfeq', 1),
(7, 'Xrdzmdp3da', 'test4', 'test4', 'test4@laplateforme.io', '$2y$12$vsn35In3eC0/LjqkUf25x.lypG9akJqb/pcOFS8kZGBBvJ9dDC/X6', 1),
(8, 'Xrda56zda', 'test5', 'test5', 'test5@laplateforme.io', '$2y$12$izM8c1Bl6Sfamu4V7lIDlu15FuHAkAO.hp89lIDd7iuj6qhmnZWze', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `droits`
--
ALTER TABLE `droits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `droits`
--
ALTER TABLE `droits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
