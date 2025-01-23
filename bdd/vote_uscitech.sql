-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 23, 2025 at 09:32 PM
-- Server version: 8.0.35
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: `vote_uscitech`
--

-- --------------------------------------------------------

-- Supprimer les tables si elles existent déjà
DROP TABLE IF EXISTS `vote`;
DROP TABLE IF EXISTS `candidat`;
DROP TABLE IF EXISTS `etudiant`;
DROP TABLE IF EXISTS `poste`;
DROP TABLE IF EXISTS `vote_2`;

-- Table structure for table `candidat`
CREATE TABLE `candidat` (
  `id` int NOT NULL,
  `etudiant` int NOT NULL,
  `poste` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table `candidat`
INSERT INTO `candidat` (`id`, `etudiant`, `poste`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 4),
(4, 2, 2),
(5, 2, 3),
(6, 2, 4),
(7, 3, 3),
(8, 3, 4),
(9, 4, 3),
(10, 4, 4),
(11, 5, 3),
(12, 5, 4),
(13, 6, 3),
(14, 6, 4),
(15, 7, 3),
(16, 7, 4),
(17, 8, 3),
(18, 8, 4),
(19, 9, 3),
(20, 9, 4);

-- Table structure for table `etudiant`
CREATE TABLE `etudiant` (
  `id` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `email` varchar(256) NOT NULL,
  `promotion` varchar(10) NOT NULL,
  `options` varchar(256) NOT NULL,
  `telephone` varchar(16) DEFAULT NULL,
  `password` varchar(16) NOT NULL DEFAULT '1111'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table `etudiant`
INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `sexe`, `email`, `promotion`, `options`, `telephone`, `password`) VALUES
(1, 'BLANC', 'VOTE', 'F', 'voteblancb3gl@gmail.com', 'BAC3', 'GENIE LOGICIEL', NULL, '1111'),
(2, 'BLANC', 'VOTE', 'F', 'voteblancb3rt@gmail.com', 'BAC3', 'RESEAU TELECOMMUNICATION', NULL, '1111'),
(3, 'BLANC', 'VOTE', 'F', 'voteblancb3ge@gmail.com', 'BAC3', 'GENIE ELECTRIQUE', NULL, '1111'),
(4, 'BLANC', 'VOTE', 'F', 'voteblancb2e@gmail.com', 'BAC2', 'ECONOMIE', NULL, '1111'),
(5, 'BLANC', 'VOTE', 'F', 'voteblancb2si@gmail.com', 'BAC2', 'SCIENCES INFORMATIQUES', NULL, '1111'),
(6, 'BLANC', 'VOTE', 'F', 'voteblancb1si@gmail.com', 'BAC1', 'SCIENCES INFORMATIQUES', NULL, '1111'),
(7, 'BLANC', 'VOTE', 'F', 'voteblancb1e@gmail.com', 'BAC1', 'ECONOMIE', NULL, '1111'),
(8, 'BLANC', 'VOTE', 'F', 'voteblancb1i@gmail.com', 'BAC1', 'INGENIERIE', NULL, '1111'),
(9, 'BLANC', 'VOTE', 'F', 'voteblancb1se@gmail.com', 'BAC1', 'SCIENCE EDUCATION', NULL, '1111');

-- Table structure for table `poste`
CREATE TABLE `poste` (
  `id` int NOT NULL,
  `titre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table `poste`
INSERT INTO `poste` (`id`, `titre`) VALUES
(1, 'PRESIDENT'),
(2, 'VICE PRESIDENT'),
(3, 'CP'),
(4, 'CPA');

-- Table structure for table `vote`
CREATE TABLE `vote` (
  `id` int NOT NULL,
  `etudiant` int NOT NULL,
  `candidat` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Table structure for table `vote_2`
CREATE TABLE `vote_2` (
  `id` int NOT NULL,
  `nom` varchar(256) NOT NULL,
  `voix` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Indexes for dumped tables
ALTER TABLE `candidat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etudiant` (`etudiant`),
  ADD KEY `poste` (`poste`);

ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `poste`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etudiant` (`etudiant`),
  ADD KEY `candidat` (`candidat`);

ALTER TABLE `vote_2`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT for dumped tables
ALTER TABLE `candidat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE `etudiant`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `poste`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `vote`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `vote_2`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

-- Constraints for dumped tables
ALTER TABLE `candidat`
  ADD CONSTRAINT `candidat_ibfk_1` FOREIGN KEY (`etudiant`) REFERENCES `etudiant` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `candidat_ibfk_2` FOREIGN KEY (`poste`) REFERENCES `poste` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`etudiant`) REFERENCES `etudiant` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`candidat`) REFERENCES `candidat` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;