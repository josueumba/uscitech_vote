-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 15 nov. 2024 à 19:25
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `uscitech_vote`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

CREATE TABLE `candidat` (
  `id` int(11) NOT NULL,
  `etudiant` int(11) NOT NULL,
  `poste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`id`, `etudiant`, `poste`) VALUES
(1, 2, 1),
(2, 2, 3),
(3, 13, 4),
(4, 14, 1),
(5, 13, 2),
(6, 15, 3),
(7, 1, 4),
(8, 3, 3),
(9, 3, 4),
(10, 3, 1),
(11, 3, 2),
(12, 4, 3),
(13, 4, 4),
(14, 5, 3),
(15, 5, 4),
(16, 6, 3),
(17, 6, 4),
(18, 7, 3),
(19, 7, 4),
(20, 8, 3),
(21, 8, 4),
(22, 9, 3),
(23, 9, 4),
(24, 10, 3),
(25, 10, 4),
(26, 11, 3),
(27, 11, 4);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `email` varchar(256) NOT NULL,
  `promotion` varchar(10) NOT NULL,
  `options` varchar(256) NOT NULL,
  `telephone` varchar(16) DEFAULT NULL,
  `password` varchar(16) NOT NULL DEFAULT '1111'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `sexe`, `email`, `promotion`, `options`, `telephone`, `password`) VALUES
(1, 'UMBA', 'JOSUE', 'M', 'josueumba@gmail.com', 'BAC3', 'GENIE LOGICIEL', '+243 899999999', '1111'),
(2, 'KILIMA', 'SALEM', 'M', 'salemkilima@gmail.com', 'BAC3', 'RESEAU TELECOMMUNICATION', '+243 991234800', '1111'),
(3, 'BLANC', 'VOTE', 'F', 'voteblancb3gl@gmail.com', 'BAC3', 'GENIE LOGICIEL', NULL, '1111'),
(4, 'BLANC', 'VOTE', 'F', 'voteblancb3rt@gmail.com', 'BAC3', 'RESEAU TELECOMMUNICATION', NULL, '1111'),
(5, 'BLANC', 'VOTE', 'F', 'voteblancb3ge@gmail.com', 'BAC3', 'GENIE ELECTRIQUE', NULL, '1111'),
(6, 'BLANC', 'VOTE', 'F', 'voteblancb2e@gmail.com', 'BAC2', 'ECONOMIE', NULL, '1111'),
(7, 'BLANC', 'VOTE', 'F', 'voteblancb2si@gmail.com', 'BAC2', 'SCIENCES INFORMATIQUES', NULL, '1111'),
(8, 'BLANC', 'VOTE', 'F', 'voteblancb1si@gmail.com', 'BAC1', 'SCIENCES INFORMATIQUES', NULL, '1111'),
(9, 'BLANC', 'VOTE', 'F', 'voteblancb1se@gmail.com', 'BAC1', 'SCIENCE EDUCATION', NULL, '1111'),
(10, 'BLANC', 'VOTE', 'F', 'voteblancb1i@gmail.com', 'BAC1', 'INGENIERIE', NULL, '1111'),
(11, 'BLANC', 'VOTE', 'F', 'voteblancb1e@gmail.com', 'BAC1', 'ECONOMIE', NULL, '1111'),
(13, 'KIANGEBENI', 'JORDAN', 'M', 'jordankiangebeni@gmail.com', 'BAC3', 'GENIE ELECTRIQUE', '+243 901200085', '1111'),
(14, 'JEHOVAH', 'TEMOIN', 'M', 'temoinjehovah@gmail.com', 'BAC2', 'ECONOMIE', '+243 900098765', '1111'),
(15, 'MBEMBE', 'EGIDE', 'M', 'egidembembe@gmail.com', 'BAC3', 'GENIE LOGICIEL', '+243 991234000', '1111'),
(16, 'POUSSY', 'DENZEL', 'M', 'denzelpoussy@gmail.com', 'BAC3', 'GENIE LOGICIEL', '+243 891356730', '1111'),
(17, 'KENDAL', 'ESTHER', 'F', 'estherkendal@gmail.com', 'BAC1', 'ECONOMIE', '+243 991349800', '1111'),
(18, 'WANET', 'LUGGER', 'M', 'luggerwanet@gmail.com', 'GOLD', 'RESEAU TELECOMMUNICATION', NULL, '1111'),
(19, 'KAMARA', 'LIAM', 'F', 'liamkamara@gmail.com', 'BAC1', 'INGENIERIE', '+243 910009678', '1111'),
(20, 'MABIALA', 'JULES', 'M', 'julesmabiala@gmail.com', 'BAC1', 'SCIENCE EDUCATION', '+243 808790015', '1111'),
(21, 'KISUBI', 'LEON', 'M', 'leonkisubi@gmail.com', 'BAC3', 'GENIE LOGICIEL', '+243 817860081', '1111'),
(22, 'MATETU', 'ELBERT', 'M', 'elbertmatetu@gmail.com', 'BAC3', 'RESEAU TELECOMMUNICATION', '+243 991675002', '1111'),
(23, 'JOHN', 'DOE', 'M', 'johndoe@gmail.com', 'BAC2', 'ECONOMIE', '+243 804378900', '1111'),
(24, 'LION', 'CHANEL', 'M', 'chanellion@gmail.com', 'BAC2', 'SCIENCES INFORMATIQUES', '+243 980007761', '1111');

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

CREATE TABLE `poste` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `poste`
--

INSERT INTO `poste` (`id`, `titre`) VALUES
(1, 'PRESIDENT'),
(2, 'VICE PRESIDENT'),
(3, 'CP'),
(4, 'CPA');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `etudiant` int(11) NOT NULL,
  `candidat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vote`
--

INSERT INTO `vote` (`id`, `etudiant`, `candidat`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 5),
(5, 15, 1),
(6, 15, 5),
(7, 15, 6),
(8, 15, 7),
(9, 16, 10),
(10, 16, 11),
(11, 16, 8),
(12, 16, 9),
(13, 17, 4),
(14, 17, 5),
(15, 17, 26),
(16, 17, 27),
(17, 19, 4),
(18, 19, 11),
(19, 19, 24),
(20, 19, 25),
(21, 20, 4),
(22, 20, 5),
(23, 20, 22),
(24, 20, 23),
(25, 21, 1),
(26, 21, 5),
(27, 21, 6),
(28, 21, 9),
(29, 22, 4),
(30, 22, 5),
(31, 22, 12),
(32, 22, 13),
(33, 24, 1),
(34, 24, 5),
(35, 24, 18),
(36, 24, 19),
(37, 23, 1),
(38, 23, 11),
(39, 23, 16),
(40, 23, 17);

-- --------------------------------------------------------

--
-- Structure de la table `vote_2`
--

CREATE TABLE `vote_2` (
  `id` int(11) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `voix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vote_2`
--

INSERT INTO `vote_2` (`id`, `nom`, `voix`) VALUES
(1, 'KILIMA SALEM', 5),
(2, 'JEHOVAH TEMOIN', 4),
(3, 'BLANC VOTE', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etudiant` (`etudiant`),
  ADD KEY `poste` (`poste`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `poste`
--
ALTER TABLE `poste`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etudiant` (`etudiant`),
  ADD KEY `candidat` (`candidat`);

--
-- Index pour la table `vote_2`
--
ALTER TABLE `vote_2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidat`
--
ALTER TABLE `candidat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `poste`
--
ALTER TABLE `poste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `vote_2`
--
ALTER TABLE `vote_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD CONSTRAINT `candidat_ibfk_1` FOREIGN KEY (`etudiant`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `candidat_ibfk_2` FOREIGN KEY (`poste`) REFERENCES `poste` (`id`);

--
-- Contraintes pour la table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`etudiant`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`candidat`) REFERENCES `candidat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
