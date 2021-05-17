-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 17 mai 2021 à 20:55
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wad01`
--

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--
--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `username`, `email`, `telephone`, `password`) VALUES
(1, 'Duhamel', 'huet.jeannine@tele2.fr', '0613854232', '1111'),
(2, 'Rousseau', 'michelle.delaunay@lesage.com', '+33 7 43 90 13 31', '1112'),
(3, 'Louis', 'vdescamps@labbe.com', '0809544231', '1113'),
(4, 'Monnier', 'camus.laetitia@chevallier.fr', '0695280563', '1114'),
(5, 'Leveque', 'julien.leroux@tele2.fr', '07 82 45 83 44', '1115'),
(6, 'Teixeira', 'victoire45@guibert.com', '02 15 24 17 99', '1116'),
(7, 'eloise', 'eloiseP@yahoo.fr', '334125487561', '$2y$13$CgGuDTGPAU1NQgI.B6fvwOJ/4grGjYVQOI933PYlrpWi0T30kHv16'),
(8, 'pandi', 'pandipanda@yahoo.fr', '0485697812', '$2y$13$87QsybBA3EHuPu9eFmDl9OUrndki3mhf3StIudOXX1B9sscjL0y.i'),
(9, 'kelly', 'kelly.b@yahoo.be', '048567891258', '$2y$13$9iQ7tOa7pihcgkK5YHNqUOZHEKwwPlf3KEt7TLQKZ5xLT3f4nzmce'),
(10, 'zoe', 'zoe@yahoo.fr', '+337456812546', '$2y$13$mj.UQMxxs991Mt0qbB67.u3iSti7cu5.k9G2HUvw8kLNVzSyt9Srm');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `membre`
--
-- ALTER TABLE `membre`
--   ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `membre`
--
-- ALTER TABLE `membre`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
