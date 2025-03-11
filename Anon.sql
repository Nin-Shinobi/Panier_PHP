-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Version du serveur : 5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `panier`
--

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(1000) NOT NULL,
  `img2` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
INSERT INTO `products` (`id`, `img`, `img2`, `price`, `name`) VALUES
(1, 'jacket-3.jpg', 'jacket-4.jpg', 12000, 'Mens Winter'),
(2, 'shirt-1.jpg', 'shirt-2.jpg', 7500, 'Pure Garment'),
(3, 'jacket-5.jpg', 'jacket-6.jpg', 15000, 'Men Yarn'),
(4, 'clothes-3.jpg', 'clothes-4.jpg', 5000, 'Black Floral'),
(5, 'jacket-1.jpg', 'jacket-2.jpg', 16000, 'Mens Blander'),
(6, 'shoe-1.jpg', 'shoe-2.jpg', 8000, 'Black Buzz'),
(7, 'shoe-4.jpg', 'shoe-5.jpg', 9500, 'Nin Shizz'),
(8, 'watch-1.jpg', 'watch-2.jpg', 65000, 'Apple'),
(9, 'watch-3.jpg', 'watch-4.jpg', 25000, 'Tamporal');

-- Committing the transaction
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
