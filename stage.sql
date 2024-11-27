-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 06 mars 2024 à 10:32
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
-- Base de données : `stage`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `AdministrateurId` int(4) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`AdministrateurId`, `username`, `password`) VALUES
(1, 'admin1', 'adminadmin1'),
(2, 'admin2', 'adminadmin2'),
(3, 'admin3', 'adminadmin3'),
(4, 'admin4', 'adminadmin4'),
(5, 'admin5', 'adminadmin5'),
(6, 'admin5', 'adminadmin5');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `ClientId` int(4) NOT NULL,
  `Nom` varchar(40) NOT NULL,
  `Prenom` varchar(40) NOT NULL,
  `RaisonSociale` varchar(40) NOT NULL,
  `Telephone` varchar(40) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `ClientTypeId` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`ClientId`, `Nom`, `Prenom`, `RaisonSociale`, `Telephone`, `Adresse`, `ClientTypeId`) VALUES
(1, 'Miller', 'Francois', 'Entrepreneuriat', '+33102030', 'Paris', 4),
(2, 'Sfar', 'Mohamed Ali ', 'Entrepreneuriat', '+21654789624', 'Tunisie', 2);

-- --------------------------------------------------------

--
-- Structure de la table `clientprojet`
--

CREATE TABLE `clientprojet` (
  `ClientId` int(4) NOT NULL,
  `ProjetId` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clientprojet`
--

INSERT INTO `clientprojet` (`ClientId`, `ProjetId`) VALUES
(1, 2),
(2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `clienttype`
--

CREATE TABLE `clienttype` (
  `ClientTypeId` int(4) NOT NULL,
  `Libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clienttype`
--

INSERT INTO `clienttype` (`ClientTypeId`, `Libelle`) VALUES
(2, 'State'),
(3, 'Private'),
(4, 'Organization');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `CommentaireId` int(4) NOT NULL,
  `comment` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`CommentaireId`, `comment`) VALUES
(1, 'cant wait to see your futur projects');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `ContactId` int(4) NOT NULL,
  `Nom` varchar(40) NOT NULL,
  `Prenom` varchar(40) NOT NULL,
  `Telephone` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Message` varchar(10000) NOT NULL,
  `ProjetId` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`ContactId`, `Nom`, `Prenom`, `Telephone`, `Email`, `Message`, `ProjetId`) VALUES
(1, 'Jerbi', 'Tarek', '52859675', 'Tarek@gmail.com', 'I hope this message finds you well. I am reaching out to inquire about your project, GRP / B2B.\r\n\r\nAs someone who frequently organizes trade fairs, events, and B2B meetings, I understand the complexity and challenges involved in scheduling meetings between exhibitors. It is indeed one of the most crucial aspects of event organization, and any changes during the event can make it practically unmanageable.\r\n\r\nI am particularly interested in your project because it seems to address these challenges head-on. I am curious to learn more about the functionalities and features of your software, especially how it handles changes during the event and ensures smooth communication between exhibitors.\r\n\r\nCould you please provide me with more information about the GRP / B2B project? I would also appreciate it if you could share any case studies or success stories from organizations that have used your software.\r\n\r\nThank you for your time, and I look forward to hearing from you soon.', 4),
(3, 'sdfvbg', 'gvbh', '96', 'nomprenom6@gmail.com', 'drfgv', 3),
(4, 'dhouib', 'tesnim', '99990454', 'nomprenom5@gmail.com', 'salut...', 5);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `ProjetId` int(4) NOT NULL,
  `Titre` varchar(40) NOT NULL,
  `Duree` varchar(40) NOT NULL,
  `Date` date NOT NULL,
  `logo` varchar(40) NOT NULL,
  `pDescription` varchar(1000) NOT NULL,
  `Description` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`ProjetId`, `Titre`, `Duree`, `Date`, `logo`, `pDescription`, `Description`) VALUES
(2, 'MAGISTIN', '60', '2024-05-01', 'Magistin.png', 'Rolling Fleet Management', 'MAGISTIN was designed to promote the optimization of working methods and the improvement of quality in the management of the Rolling Fleet. Whether it is a simple passenger vehicle, a utility vehicle or even a heavy machine, this vehicle allows you to better manage costs and above all to make budgetary and financial projections based on reality.'),
(3, 'PostArion', '70', '2024-05-01', 'postarion.png', 'Order Office Management and Mail', 'Post’Arion allows the management of mail arrivals and departures. Not only does it allow the administration of information on the letters themselves, but it also allows their electronic management by storing a scanned copy for later use.'),
(4, 'GRP / B2B', '80', '2024-05-15', '', 'Management of professional meetings', 'Scheduling meetings between exhibitors at a trade fair, event or B2B meeting constitutes one of the most complex aspects in the organization and management of this type of event. Not only is it complex to organize, but it becomes practically unmanageable in the event of changes during the event.'),
(5, 'xGED', '70', '2024-06-01', 'logo_xGED.png', 'Electronic Management of Documents and A', 'xGED or (XTEGED) is the solution developed by Xtensus for the electronic management of all your documents. xGED is a fully web solution called from any internet browser and requiring no client-side installation.');

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE `visiteur` (
  `idVisiteur` int(11) NOT NULL,
  `ipAdress` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `visiteur`
--

INSERT INTO `visiteur` (`idVisiteur`, `ipAdress`) VALUES
(190, '::1'),
(191, '::1'),
(192, '::1'),
(193, '::1'),
(194, '::1'),
(195, '::1'),
(196, '::1'),
(197, '::1'),
(198, '::1'),
(199, '::1'),
(200, '::1'),
(201, '::1'),
(202, '::1'),
(203, '::1'),
(204, '::1'),
(205, '::1'),
(206, '::1'),
(207, '::1'),
(208, '::1'),
(209, '::1'),
(210, '::1'),
(211, '::1'),
(212, '::1'),
(213, '::1'),
(214, '::1'),
(215, '::1'),
(216, '::1'),
(217, '::1'),
(218, '::1'),
(219, '::1'),
(220, '::1'),
(221, '::1'),
(222, '::1'),
(223, '::1'),
(224, '::1'),
(225, '::1'),
(226, '::1'),
(227, '::1'),
(228, '::1'),
(229, '::1'),
(230, '::1'),
(231, '::1'),
(232, '::1'),
(233, '::1'),
(234, '::1'),
(235, '::1'),
(236, '::1'),
(237, '::1'),
(238, '::1'),
(239, '::1'),
(240, '::1'),
(241, '::1'),
(242, '::1'),
(243, '::1'),
(244, '::1'),
(245, '::1'),
(246, '::1'),
(247, '::1'),
(248, '::1'),
(249, '::1'),
(250, '::1'),
(251, '::1'),
(252, '::1'),
(253, '::1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`AdministrateurId`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ClientId`),
  ADD KEY `ClientTtypeId` (`ClientTypeId`);

--
-- Index pour la table `clientprojet`
--
ALTER TABLE `clientprojet`
  ADD PRIMARY KEY (`ClientId`,`ProjetId`),
  ADD KEY `ProjetId` (`ProjetId`);

--
-- Index pour la table `clienttype`
--
ALTER TABLE `clienttype`
  ADD PRIMARY KEY (`ClientTypeId`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`CommentaireId`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ContactId`),
  ADD KEY `ProjetId` (`ProjetId`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`ProjetId`);

--
-- Index pour la table `visiteur`
--
ALTER TABLE `visiteur`
  ADD PRIMARY KEY (`idVisiteur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `visiteur`
--
ALTER TABLE `visiteur`
  MODIFY `idVisiteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`ClientTypeId`) REFERENCES `clienttype` (`ClientTypeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `clientprojet`
--
ALTER TABLE `clientprojet`
  ADD CONSTRAINT `clientprojet_ibfk_2` FOREIGN KEY (`ProjetId`) REFERENCES `projet` (`ProjetId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clientprojet_ibfk_3` FOREIGN KEY (`ClientId`) REFERENCES `client` (`ClientId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`ProjetId`) REFERENCES `projet` (`ProjetId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
