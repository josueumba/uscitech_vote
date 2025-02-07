-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 07 fév. 2025 à 14:23
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
-- Base de données : `votes_uscitech`
--
CREATE DATABASE IF NOT EXISTS `votes_uscitech` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `votes_uscitech`;

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

DROP TABLE IF EXISTS `candidat`;
CREATE TABLE `candidat` (
  `id` int(11) NOT NULL,
  `etudiant` int(11) NOT NULL,
  `poste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `candidat`
--

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
(20, 9, 4),
(21, 6, 5),
(22, 7, 5),
(23, 8, 5),
(24, 9, 5),
(26, 7, 6),
(27, 8, 6),
(28, 6, 6);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `sexe`, `email`, `promotion`, `options`, `telephone`, `password`) VALUES
(1, 'BLANC', 'VOTE', 'F', 'voteblancb3gl@gmail.com', 'BAC3', 'GENIE LOGICIEL', NULL, '1111'),
(2, 'BLANC', 'VOTE', 'F', 'voteblancb3rt@gmail.com', 'BAC3', 'RESEAU TELECOMMUNICATION', NULL, '1111'),
(3, 'BLANC', 'VOTE', 'F', 'voteblancb3ge@gmail.com', 'BAC3', 'GENIE ELECTRIQUE', NULL, '1111'),
(4, 'BLANC', 'VOTE', 'F', 'voteblancb2e@gmail.com', 'BAC2', 'ECONOMIE', NULL, '1111'),
(5, 'BLANC', 'VOTE', 'F', 'voteblancb2si@gmail.com', 'BAC2', 'SCIENCES INFORMATIQUES', NULL, '1111'),
(6, 'BLANC', 'VOTE', 'F', 'voteblancb1si@gmail.com', 'BAC1', 'SCIENCES INFORMATIQUES', NULL, '1111'),
(7, 'BLANC', 'VOTE', 'F', 'voteblancb1e@gmail.com', 'BAC1', 'ECONOMIE', NULL, '1111'),
(8, 'BLANC', 'VOTE', 'F', 'voteblancb1i@gmail.com', 'BAC1', 'INGENIERIE', NULL, '1111'),
(9, 'BLANC', 'VOTE', 'F', 'voteblancb1se@gmail.com', 'BAC1', 'SCIENCE EDUCATION', NULL, '1111'),
(10, 'Akozini', 'Christina', 'f', 'christina.akozini@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(11, 'Alume', 'Davina', 'f', 'davina.alume@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(12, 'Babadi', 'Kendra', 'f', 'kendra.babadi@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(13, 'Badibanga', 'Priscille', 'f', 'priscille.badibanga@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(14, 'Badjoko', 'Reane', 'f', 'reane.badjoko@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(15, 'Baindu', 'Emmanuel', 'm', 'emmanuel.baindu@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(16, 'Balanda', 'Kiara', 'f', 'kiara.balanda@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(17, 'Banga-Banga', 'Annaelle', 'f', 'anaelle.banga-banga@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(18, 'Basana', 'Olive', 'f', 'olive.basana@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(19, 'Basilua', 'Reconnaissance', 'f', 'reconnaissance.basilua@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(20, 'Bazonga', 'Mary', 'f', 'mary.bazonga@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(21, 'Bopila', 'Schiphra', 'f', 'schiphra.bopila@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(22, 'Dibemba', 'Esther', 'f', 'esther.dibemba@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(23, 'Eluhu', 'Adolphe', 'm', 'adolphe.eluhu@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(24, 'Isatta', 'Asael', 'f', 'asael.isatta@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(25, 'Ithe', 'Antoinette', 'f', 'antoinette.ithe@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(26, 'Iyolo', 'Gaethan', 'm', 'gaethan.iyolo@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(27, 'Joseph', 'Cabrel', 'm', 'cabrel.joseph@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(28, 'Kabanga', 'Aurelie', 'f', 'aurelie.kabanga@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(29, 'Kabedi', 'Marlene', 'f', 'marlene.kabedi@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(30, 'Kabondo', 'Grace', 'f', 'grace.kabondo@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(31, 'Kabulay', 'Soraya', 'f', 'soraya.kabulay@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(32, 'Kalombo', 'David', 'm', 'david.kalombo@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(33, 'Kamuanya', 'Cornelly', 'f', 'cornelly.kamuanya@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(34, 'Kialungila', 'Maria-Paola', 'f', 'maria-paola.kialungila@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(35, 'Kipulu', 'Jane-Alicia', 'f', 'jane-alicia.kipulu@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(36, 'Kisimba', 'Jordan', 'm', 'jordan.kisimba@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(37, 'Kita', 'La Gr?ce', 'f', 'lagrace.kita@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(38, 'Kitoko', 'Jiscard', 'm', 'jiscard.kitoko@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(39, 'Kuka', 'Gabriella', 'f', 'gabriella.kuka@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(40, 'Kuyikana', 'Clemence', 'f', 'clemence.kuyikana@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(41, 'Lejo', 'Believe', 'f', 'believe.lejo@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(42, 'Limbaya', 'Benedicte', 'f', 'benedict.limbaya@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(43, 'Longo', 'Cherubin', 'm', 'cherubin.longo@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(44, 'Lukomba', 'Jospin', 'm', 'jospin.lukomba@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(45, 'Lwamba', 'Elie', 'm', 'elie.lwamba@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(46, 'Mabeta', 'Marianne', 'f', 'marianne.mabeta@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(47, 'Mafuta', 'Merdi', 'm', 'merdi.mafuta@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(48, 'Mafuta', 'Fortunat', 'm', 'fortunat.mafuta@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(49, 'Mamana', 'Maria', 'f', 'maria.mamana@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(50, 'Manzenze', 'Dieumerci', 'm', 'dieumerci.manzenze@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(51, 'Maravilha', 'The Glory', 'f', 'theglory.maravilha@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(52, 'Mashukane', 'Amelie', 'f', 'amelie.mashukane@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(53, 'Mavinga', 'Felicite', 'f', 'felicite.mavinga@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(54, 'Mavungu', 'Caleb', 'm', 'caleb.mavungu@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(55, 'Mayoyo', 'Nestor', 'm', 'nestor.mayoyo@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(56, 'Mbelu', 'Stephie', 'f', 'stephie.mbelu@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(57, 'Mbiya', 'D?tach', 'm', 'detach.mbiya@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(58, 'Minuku', 'Eben', 'm', 'eben.minuku@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(59, 'Moembo', 'Jenovic', 'm', 'jenovic.moembo@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(60, 'Mpanya', 'Lionel', 'm', 'lionel.mpanya@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(61, 'Mpoyi', 'Plamedi', 'f', 'plamedi.mpoyi@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(62, 'Mubibya', 'Clemy', 'm', 'clemy.mubibya@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(63, 'Mumoni', 'Richenold', 'm', 'richenold.mumoni@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(64, 'Musikelo', 'Peter', 'm', 'peter.musikelo@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(65, 'Musungu', 'Serge', 'm', 'serge.musungu@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(66, 'Mutombo', 'Anaelle', 'f', 'anaelle.mutombo@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(67, 'Nzunga', 'Idou', 'm', 'idou.nzunga@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(68, 'Odia', 'Divine', 'f', 'divine.odia@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(69, 'Onasambi', 'Joseph', 'm', 'joseph.onasambi@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(70, 'Sa?dy', 'Othniel', 'm', 'othniel.saidy@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(71, 'Shalukoma', 'Melissa', 'f', 'melissa.shalukoma@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(72, 'Shalukoma', 'Ariane', 'f', 'ariane.shalukoma@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(73, 'Thoto', 'Cedrick', 'm', 'cedrick.thoto@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(74, 'Tshibola', 'Ten', 'f', 'ten.tshibola@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(75, 'Tshionyi', 'Jabessrock', 'm', 'jabessrock.tshionyi@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(76, 'Tshituka', 'Emmnuella', 'f', 'emmanuella.tshituka@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(77, 'Tutoma', 'Philo', 'f', 'philo.tutoma@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(78, 'Wanny', 'Divine', 'f', 'divine.wanny@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(79, 'Yawe', 'Israel', 'm', 'israel.yawe@uscitech.ac.cd', 'BAC1', 'ECONOMIE', '', '1111'),
(80, 'Ayubi', 'Josephat', 'f', 'josephat.ayubi@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(81, 'Baamba', 'Christevie', 'f', 'christevie.baamba@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(82, 'Baleta', 'Joyce', 'f', 'joyce.baleta@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(83, 'Dianzenza', 'Olivia', 'f', 'olivia.dianzenza@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(84, 'Kibisamu', 'Astrid', 'f', 'astrid.kibisamu@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(85, 'Kinzumbi', 'Loyce', 'f', 'loyce.kinzumbi@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(86, 'Kubangusu', 'Hemorianne', 'f', 'hemorianne.kubangusu@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(87, 'Kubangusu', 'Grace', 'f', 'grace.kubangusu@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(88, 'Kutukidi', 'Tressy', 'm', 'tressy.kutukidi@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(89, 'Lompumpu', 'Michael', 'm', 'michael.lompumpu@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(90, 'Makinu', 'C?drick', 'm', 'cedrick.makinu@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(91, 'Matondo', 'Grace', 'f', 'grace.matondo@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(92, 'Mbulayi', 'Dorcas', 'f', 'dorcas.mbulayi@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(93, 'Mbutabuba', 'Emmanuel', 'm', 'emmanuel.mbutabuba@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(94, 'Memunsi', 'Mervedie', 'f', 'mervedie.memunsi@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(95, 'Moranca', 'Elizabeth', 'f', 'elizabeth.moranca@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(96, 'Moukassa', 'Naomie', 'f', 'naomie.moukassa@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(97, 'Mujinga', 'Menorah', 'f', 'menorah.mujinga@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(98, 'Mupepe', 'Socrate', 'm', 'socrate.mupepe@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(99, 'Ngoyi', 'Hope', 'f', 'hope.ngoyi@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(100, 'Ngyamba', 'Yann', 'm', 'yann.ngyamba@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(101, 'Nsimba', 'Hadassa', 'f', 'hadassa.nsimba@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(102, 'Saidi', 'Sabrina', 'f', 'sabrina.saidi@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(103, 'Silu', 'Mervedie', 'm', 'mervedie.silu@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(104, 'Sinai', 'Shekinah', 'f', 'shekinah.sinai@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(105, 'Wanintembe', 'Emmanuel', 'm', 'emmanuel.wanintembe@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(106, 'Wazolawo', 'Mersein', 'm', 'mersein.wazolawo@uscitech.ac.cd', 'BAC1', 'SCIENCE EDUCATION', '', '1111'),
(110, 'Bakwanamaha', 'Cleo', 'm', 'cleo.bakwanamaha@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(111, 'Balanda', 'Andreanne', 'f', 'andreanne.balanda@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(112, 'Bonsange', 'Prunelle', 'f', 'prunelle.bonsange@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(113, 'Diabasenga', 'Joseph', 'm', 'joseph.diabasenga@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(114, 'Djoko', 'Gemima', 'f', 'gemima.djoko@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(115, 'Donnel', 'Consolate', 'f', 'consolate.donnel@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(116, 'Elanga', 'Predi', 'm', 'predi.elanga@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(117, 'Farahani', 'Kevin', 'm', 'kevin.farahani@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(118, 'Gamonimangu', 'Daniella', 'f', 'daniella.gamonimangu@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(119, 'Ikiekunu', 'Mervedie', 'f', 'mervedie.ikiekunu@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(120, 'Ingolo', 'Merdi', 'm', 'merdi.ingolo@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(121, 'Kabamba', 'Rose-Marjorie', 'f', 'rose.kabamba@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(122, 'Kadima', 'Mervedy', 'm', 'mervedy.kadima@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(123, 'Kahindo', 'Zoe', 'f', 'zoe.kahindo@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(124, 'Kahusu', 'Heureuse', 'f', 'heureuse.kahusu@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(125, 'Kalema', 'Albertinie', 'f', 'albertinie.kalema@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(126, 'Kalombo', 'Percy', 'm', 'percy.kalombo@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(127, 'Kanika', 'Daniella', 'f', 'daniella.kanika@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(128, 'Kapamba', 'Enouchrel', 'f', 'enouchrel.kapamba@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(129, 'Kayenga', 'Nathanael', 'm', 'nathanael.kayenga@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(130, 'Kibala', 'Doxa-Deo', 'f', 'doxa-deo.kibala@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(131, 'Kiza', 'Stella', 'f', 'stella.kiza@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(132, 'Kongolo', 'Billy', 'm', 'billy.kongolo@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(133, 'Kwete', 'Ad le', 'f', 'ad le.kwete@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(134, 'Kwete', 'Thecya', 'f', 'thecya.kwete@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(135, 'Landu', 'Asaph', 'f', 'asaph.landu@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(136, 'Lukoki', 'Eliel', 'm', 'eliel.lukoki@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(137, 'Lusamba', 'Therese', 'f', 'therese.lusamba@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(138, 'Malimpa', 'Maindie', 'f', 'maindie.malimpa@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(139, 'Masaka', 'Ephraim', 'm', 'ephraim.masaka@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(140, 'Masamba', 'Daniella', 'f', 'daniella.masamba@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(141, 'Matanda', 'Ketsia', 'f', 'ketsia.matanda@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(142, 'Matebe', 'Merite', 'f', 'merite.matebe@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(143, 'Matondo', 'Eden', 'f', 'eden.matondo@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(144, 'Mayoyo', 'Franck', 'm', 'franck.mayoyo@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(145, 'Mbaya', 'Sharon-Rose', 'f', 'sharon-rose.mbaya@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(146, 'Mbiya', 'Ephraim', 'm', 'ephraim.mbiya@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(147, 'Mboko', 'Merdie', 'f', 'merdie.mboko@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(149, 'Mbowa', 'Thanks', 'm', 'thanks.mbowa@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(150, 'Mbwibwa', 'Samira', 'f', 'samira.mbwibwa@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(151, 'Misenga', 'Merveille', 'f', 'merveille.misenga@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(152, 'Monzia', 'Bibiche', 'f', 'bibiche.monzia@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(154, 'Mputu', 'Laetitia-Eunice', 'f', 'laetitia-eunice.mputu@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(155, 'Musendo', 'Emmanuel', 'm', 'emmanuel.musendo@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(156, 'Muyumbu', 'Raphael', 'm', 'raphael.muyumbu@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(157, 'Mwasengi', 'Benedicte', 'f', 'benedicte.mwasengi@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(158, 'Ngabu', 'Mervedie', 'f', 'mervedie.ngabu@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(159, 'Ngayo', 'Chanty', 'f', 'chanty.ngayo@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(160, 'Ngoma', 'Daniel', 'm', 'daniel.ngoma@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(161, 'Nkanga', 'Magnificence', '', 'magnificence.nkanga@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(162, 'Nkenko', 'Miradi', '', 'miradi.nkenko@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(163, 'Ntoto', 'Siloe', 'm', 'siloe.ntoto@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(164, 'Nyunga', 'Gemima', 'f', 'gemima.nyunga@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(165, 'Osembe', 'Rebecca', 'f', 'rebecca.osembe@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(166, 'Phuba', 'Martinie', 'f', 'martinie.phuba@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(167, 'Pukakwey', 'Darvina', 'f', 'martinie.pukakwey@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(168, 'Shasha', 'Octavie', 'f', 'octavie.shasha@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(169, 'Tona', 'Prisla', 'f', 'prisla.tona@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(170, 'Tshimini', 'Daydo', 'f', 'daydo.tshimini@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(171, 'Tshinguta', 'Gloria', 'f', 'gloria.tshinguta@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(172, 'Tshitundu', 'Charles', 'm', 'charles.tshitundu@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(173, 'Tumba', 'Lumi re', '', 'lumi re.tumba@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(174, 'Wobin', 'Sevina', 'f', 'sevina.wobin@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(175, 'Yenge', 'Immacul e', 'f', 'immacul e.yenge@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(176, 'Zikudiamoyo', 'Gloire', 'f', 'gloire.zikudiamoyo@uscitech.ac.cd', 'BAC1', 'INGENIERIE', '', '1111'),
(247, 'Awini', 'Israel', 'm', 'beni.awini@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(248, 'Barack', 'David', 'm', 'david.barack@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(249, 'Bazika', 'Leonce', 'm', 'leonce.bazika@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(250, 'Bolingoli', 'Grace', 'f', 'grace.bolingoli@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(251, 'Bopele', 'Sarkozy', '', 'sarkozy.bopele@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(252, 'Botowamungu', 'Mamie', 'f', 'mamie.botowamungu@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(253, 'Bunkete', 'Yan', 'm', 'yan.bunkete@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(254, 'Cuma', 'Michel', 'm', 'michel.cuma@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(255, 'Delo', 'Winner', 'f', 'lavidie.delo@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(256, 'Diawela', 'Merdie', 'f', 'merdie.diawela@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(257, 'Dingana', 'Jean-Baptiste', 'm', 'jean-baptiste.dingana@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(258, 'Djamba', 'Agate', 'f', 'agate.djamba@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(259, 'Elonga', 'Sephora', 'f', 'sephora.elonga@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(260, 'Fimpadio', 'Mardoch�e', 'm', 'mardochee.fimpadio@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(261, 'Fingila', 'Joseph', 'm', 'joseph.fingila@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(262, 'Gaziala', 'Marvel-Hethane', 'm', 'marvel-hethane.gaziala@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(263, 'Husu', 'Erick', 'm', 'erick.husu@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(264, 'Ifasso', 'Sephora', 'f', 'sephora.ifasso@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(265, 'Kalala', 'Onassis', 'm', 'onassis.kalala@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(266, 'Kalala', 'Roland', 'm', 'roland.kalala@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(267, 'Kalala', 'Precieux', 'm', 'precieux.kalala@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(268, 'Kambamba', 'Ariel', 'm', 'ariel.kambamba@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(269, 'Kankwenda', 'Michael', 'm', 'michael.kankwenda@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(270, 'Kanza', 'Jean-Samuel', 'm', 'jean-samuel.kanza@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(271, 'Kapinga', 'Naice', 'f', 'naice.kapinga@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(272, 'Katanda', 'Onesfor', 'm', 'onesfor.katanda@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(273, 'Katende', 'Toni', 'm', 'toni.katende@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(274, 'Kavula', 'Gedeon', 'm', 'gedeon.kavula@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(275, 'Keya', 'Jaebets', 'm', 'jaebets.keya@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(276, 'Kiala', 'Roland-Chrysostome', 'm', 'roland-chrysostome.kiala@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(277, 'Lele', 'Keren', 'f', 'keren.lele@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(278, 'Luanny', 'Divine', 'f', 'divine.luanny@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(279, 'Makolo', 'Boniface', 'm', 'boniface.makolo@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(280, 'Makuntima', 'Caleb', 'm', 'caleb.makuntima@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(281, 'Mambo', 'Junior', 'm', 'junior.mambo@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(282, 'Masayidi', 'Believe-Emmanuel', 'm', 'believe-emmanuel.masayidi@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(283, 'Matende', 'Pascaline-Benie', 'f', 'pascaline-benie.matende@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(284, 'Matondo', 'Jeremy', 'm', 'jeremy.matondo@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(285, 'Mayambala', 'Jeancy', '', 'jeancy.mayambala@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(286, 'Mbiya', 'Ruth', 'f', 'ruth.mbiya@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(287, 'Mboko', 'Duchesse-Monica', 'f', 'duchesse-monica.mboko@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(288, 'Mbongi', 'Joel', 'm', 'joel.mbongi@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(289, 'Mbulu', 'Fernandine', 'f', 'fernandine.mbulu@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(290, 'Monkango', 'Marlyne', 'f', 'marlyne.monkango@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(291, 'Mpalaba', 'Evodie', 'f', 'evodie.mpalaba@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(292, 'Mpang', 'Alexandre-Olivier', 'm', 'alexandre-olivier.mpang@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(294, 'Mujinga', 'Jaelle', 'f', 'jaelle.mujinga@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(295, 'Munganga', 'Dieumerci', 'm', 'dieumerci.munganga@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(296, 'Munkwa', 'Lydie', 'f', 'lydie.munkwa@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(297, 'Mushindikayi', 'Neville', 'm', 'neville.mushindikayi@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(298, 'Mutambay', 'Phinees', 'f', 'phinees.mutambay@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(299, 'Mutombo', 'Flory', 'f', 'flory.mutombo@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(300, 'Mutombo', 'Grace', 'm', 'grace.mutombo@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(301, 'Muyuku', 'Blessing', 'f', 'blessing.muyuku@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(302, 'Mvunzi', 'Joyce', 'm', 'joyce.mvunzi@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(303, 'Ndondoboni', 'Maurice', 'm', 'maurice.ndondoboni@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(304, 'Nemeza', 'Lordi', 'f', 'lordi.nemeza@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(305, 'Ngolo', 'Ovincy', 'm', 'ovincy.ngolo@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(306, 'Nkani', 'Christenvie', 'm', 'christenvie.nkani@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(307, 'Nlandu', 'Esdie', 'f', 'esaie.nlandu@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(309, 'Nsingi', 'Obed', 'm', 'obed.nsingi@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(310, 'Nzanzu', 'Ange-Maria', 'f', 'ange-maria.nzanzu@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(311, 'Shalukoma', 'Jethro-Michel', 'm', 'jethro-michel.shalukoma@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(312, 'Tsasa', 'Henoc', 'm', 'henoc.tsasa@uscitech.ac.cd', 'BAC1', 'SCIENCES INFORMATIQUES', '', '1111'),
(314, 'WANET', 'LUGGER', 'M', 'lugger.wanet@uscitech.ac.cd', 'GOLD', 'RESEAU TELECOMMUNICATION', NULL, '1205'),
(315, 'BANGALINE', 'MICHAEL', 'F', 'michael.bangaline@uscitech.ac.cd', 'BAC2', 'ECONOMIE', '', '1111'),
(316, 'BISHOGO', 'OLAME', 'M', 'olame.bishogo@uscitech.ac.cd', 'BAC2', 'ECONOMIE', '', '1111'),
(317, 'ILUNGA', 'CLAUDIA', 'F', 'claudia.ilunga@uscitech.ac.cd', 'BAC2', 'ECONOMIE', '', '1111'),
(318, 'KABONGO', 'EMMANUELLE', 'M', 'emmanuelle.kabongo@uscitech.ac.cd', 'BAC2', 'ECONOMIE', '', '1111'),
(319, 'KADIMA', 'ABBA', 'M', 'abba.kadima@uscitech.ac.cd', 'BAC2', 'ECONOMIE', '', '1111'),
(320, 'KISOLEKELE', 'MARIE-ANGE', 'F', 'marie-ange.kisolekele@uscitech.ac.cd', 'BAC2', 'ECONOMIE', '', '1111'),
(321, 'MAFUTA', 'QUEEN', 'F', 'queen.mafuta@uscitech.ac.cd', 'BAC2', 'ECONOMIE', '', '1111'),
(322, 'MASIKA', 'ESTHER', 'F', 'esther.masika@uscitech.ac.cd', 'BAC2', 'ECONOMIE', '', '1111'),
(323, 'MUBIKAYI', 'JOSHUA', 'M', 'joshua.mubikayi@uscitech.ac.cd', 'BAC2', 'ECONOMIE', '', '1111'),
(324, 'MUJINGA', 'ELOGE', 'F', 'eloge.mujinga@uscitech.ac.cd', 'BAC2', 'ECONOMIE', '', '1111'),
(325, 'MUTEBA', 'MONT-HOREB', 'F', 'mont-horeb.muteba@uscitech.ac.cd', 'BAC2', 'ECONOMIE', '', '1111'),
(335, 'AKINJA', 'JUNIOR', 'M', 'junior.akinja@uscitech.ac.cd', 'BAC2', 'SCIENCES INFORMATIQUES', '', '1111'),
(336, 'BIREMBANO', 'JEMIMA', 'F', 'jemima.birembano@uscitech.ac.cd', 'BAC2', 'SCIENCES INFORMATIQUES', '', '1111'),
(337, 'KISIMBA', 'LILIAN-DANIEL', 'M', 'lilian-daniel.kisimba@uscitech.ac.cd', 'BAC2', 'SCIENCES INFORMATIQUES', '', '1111'),
(338, 'KISOLOKELE', 'JEAN-DENIS', 'M', 'jean-denis.kisolokele@uscitech.ac.cd', 'BAC2', 'SCIENCES INFORMATIQUES', '', '1111'),
(339, 'MOTA', 'PASCAL', 'M', 'pascal.mota@uscitech.ac.cd', 'BAC2', 'SCIENCES INFORMATIQUES', '', '1111'),
(340, 'NGALULA', 'LEA', 'F', 'lea.ngalula@uscitech.ac.cd', 'BAC2', 'SCIENCES INFORMATIQUES', '', '1111'),
(341, 'SHIMATU', 'RALDY', 'M', 'raldy.shimatu@uscitech.ac.cd', 'BAC2', 'SCIENCES INFORMATIQUES', '', '1111'),
(342, 'SHIMUNA', 'OLGA', 'F', 'olga.shimuna@uscitech.ac.cd', 'BAC2', 'SCIENCES INFORMATIQUES', '', '1111'),
(343, 'KIAMBEMBO', 'ASHLYNE', 'F', 'ashlyne.kiambembo@uscitech.ac.cd', 'BAC2', 'SCIENCES INFORMATIQUES', '', '1111'),
(344, 'N\'KE', 'ELIEL', 'M', 'eliel.n\'ke@uscitech.ac.cd', 'BAC2', 'SCIENCES INFORMATIQUES', '', '1111'),
(345, 'KANFUNI', 'MARIELLA', 'F', 'mariella.kanfuni@uscitech.ac.cd', 'BAC2', 'SCIENCES INFORMATIQUES', '', '1111'),
(346, 'KIANGEBENI', 'JORDAN', 'M', 'jordan.kiangebeni@uscitech.ac.cd', 'BAC3', 'GENIE ELECTRIQUE', '', '1111'),
(347, 'MUKANYA', 'PROSPER', 'M', 'prosper.mukanya@uscitech.ac.cd', 'BAC3', 'GENIE ELECTRIQUE', '', '1111'),
(348, 'NGOIE', 'ELSIE', 'F', 'elsie.ngoie@uscitech.ac.cd', 'BAC3', 'GENIE ELECTRIQUE', '', '1111'),
(349, 'KILIMA', 'SALEM', 'M', 'salem.kilima@uscitech.ac.cd', 'BAC3', 'RESEAU TELECOMMUNICATION', '', '1111'),
(350, 'MAKAL', 'ARIEL', 'M', 'ariel.makal@uscitech.ac.cd', 'BAC3', 'RESEAU TELECOMMUNICATION', '', '1111'),
(351, 'MATETU', 'CHRISTIAN', 'M', 'christian.matetu@uscitech.ac.cd', 'BAC3', 'RESEAU TELECOMMUNICATION', '', '1111'),
(352, 'KISUBI', 'LEON', 'M', 'leon.kisubi@uscitech.ac.cd', 'BAC3', 'GENIE LOGICIEL', '', '1111'),
(353, 'MBEMBE', 'EGIDE', 'M', 'egide.mbembe@uscitech.ac.cd', 'BAC3', 'GENIE LOGICIEL', '', '1111'),
(354, 'POUSSY', 'DENZEL', 'M', 'denzel.poussy@uscitech.ac.cd', 'BAC3', 'GENIE LOGICIEL', '', '1111'),
(355, 'UMBA', 'JOSUE', 'M', 'josue.umba@uscitech.ac.cd', 'BAC3', 'GENIE LOGICIEL', '', '1111');

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

DROP TABLE IF EXISTS `poste`;
CREATE TABLE `poste` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `poste`
--

INSERT INTO `poste` (`id`, `titre`) VALUES
(1, 'PRESIDENT'),
(2, 'VICE PRESIDENT'),
(3, 'CP'),
(4, 'CPA'),
(5, 'DELEGUE'),
(6, 'DELEGUE ADJOINT');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `etudiant` int(11) NOT NULL,
  `candidat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vote_2`
--

DROP TABLE IF EXISTS `vote_2`;
CREATE TABLE `vote_2` (
  `id` int(11) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `voix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;

--
-- AUTO_INCREMENT pour la table `poste`
--
ALTER TABLE `poste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vote_2`
--
ALTER TABLE `vote_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
