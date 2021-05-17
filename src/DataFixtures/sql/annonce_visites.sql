-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 17 mai 2021 à 15:36
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
-- Structure de la table `annonce_visites`
--
--
-- Déchargement des données de la table `annonce_visites`
--

INSERT INTO `annonce_visites` (`id`, `membre_id`, `ville_id`, `nom_lieu`, `description`, `region`, `langue`, `email`, `telephone`, `rue`, `numero`, `code_postal`) VALUES
(1, 1, 1, 'Lieux numéro 1', 'Autem explicabo sint molestiae. Consequatur alias illo totam veniam. Quis architecto nisi quo.\n\nRerum optio fugiat suscipit doloribus. Laudantium id itaque corporis reprehenderit consectetur nesciunt. Reprehenderit at eaque deserunt libero officiis consectetur.', 'Guyane', 'Francais', 'techer.jean@free.fr', '07 80 77 35 02', '46, place Bourgeois', '14', '42596'),
(2, 2, 1, 'Lieux numéro 2', 'Rerum praesentium voluptas eveniet dolorem. Ducimus iusto nisi assumenda ipsam nesciunt. Quis facilis ipsam quas necessitatibus sit. Sunt aperiam dicta magnam sit.\n\nQuis aut aliquid eum molestiae quibusdam aspernatur. Voluptas debitis dolores reprehenderit soluta pariatur.', 'Wallis-et-Futuna', 'Francais', 'jean.richard@dijoux.com', '+33 (0)7 66 61 21 24', '381, chemin Brigitte Alexandre', '99', '39 979'),
(3, 3, 1, 'Lieux numéro 3', 'Eligendi non sint ut repellat. Quia voluptas molestiae et minima. Cum veritatis voluptatem consequatur qui. Ab tempore debitis laboriosam esse non voluptatibus porro laudantium. Magnam eos et et quis.\n\nDolorum ipsum dolores error iure. Quisquam ipsam in eos aliquam assumenda quas. Deleniti id quam aut. Veniam recusandae facere est dolorum itaque velit neque ratione.', 'Bretagne', 'Francais', 'rodrigues.emile@dbmail.com', '+33 (0)7 94 49 86 32', '9, rue de Cousin', '69', '50221'),
(4, 4, 1, 'Lieux numéro 4', 'Ipsum eos doloremque praesentium itaque. Tempora quas occaecati dolores reprehenderit omnis aperiam voluptatibus. Iure voluptas labore et placeat sint consequatur ea. Veritatis nemo sed facere corrupti pariatur sunt. Dignissimos magni occaecati corrupti ut tempore officia.\n\nMolestiae voluptas harum accusantium incidunt ratione quia repudiandae. Sed et autem qui sunt ex.', 'Franche-Comté', 'Francais', 'louis.martel@delorme.org', '+33 (0)7 43 76 38 43', '752, rue Louis Royer', '13', '50246'),
(5, 5, 1, 'Lieux numéro 5', 'Earum aut aut est rerum unde. Et aliquam fugit qui numquam sit voluptate in. Non assumenda maiores deserunt et eum.\n\nDoloribus est quod nemo rerum. Consequatur eum animi et sequi. Quae voluptate fugit possimus modi. Veritatis reprehenderit laudantium voluptatum et.', 'Nouvelle-Calédonie', 'Francais', 'daniel.guillot@sfr.fr', '05 31 64 88 30', '980, avenue de Bodin', '65', '23836'),
(6, 6, 1, 'Lieux numéro 6', 'Explicabo illum sapiente quos ad. Reiciendis et eos doloribus est voluptatem et eveniet. Aut reprehenderit et qui iste iusto vero ea.\n\nTempora tempora voluptatem quaerat quod libero sint similique. Eligendi doloremque illo at consequuntur eius ullam. Et ut ab quo qui accusamus adipisci.', 'Poitou-Charentes', 'Francais', 'loiseau.danielle@tele2.fr', '+33 3 80 09 21 28', '702, boulevard Hamon', '66', '12672'),
(7, 8, 5, 'Lieux 1', 'Lieux qui contient 4 plaines qui contient les différents résidents .', 'wallone', 'Francais', 'lieux1@yahoo.be', '048567132587', 'boileau', '15', '14785'),
(8, 9, 4, 'alpaga Land', 'ferme d\'alpaga', 'Lande', 'Francais', 'alpagaland@yahoo.fr', '367845891254', 'mirée', '3', '7468');


