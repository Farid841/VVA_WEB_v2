-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 29 avr. 2022 à 14:54
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `resa`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `USER` char(8) COLLATE utf8mb4_general_ci NOT NULL,
  `MDP` char(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `NOMCPTE` char(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PRENOMCPTE` char(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `DATEINSCRIP` date DEFAULT NULL,
  `DATEFERME` date DEFAULT NULL,
  `TYPECOMPTE` char(3) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ADRMAILCPTE` char(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `NOTELCPTE` char(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `NOPORTCPTE` char(15) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`USER`, `MDP`, `NOMCPTE`, `PRENOMCPTE`, `DATEINSCRIP`, `DATEFERME`, `TYPECOMPTE`, `ADRMAILCPTE`, `NOTELCPTE`, `NOPORTCPTE`) VALUES
('gest', 'gest', 'gestionnaire', 'gestionnaire', '2022-04-10', NULL, 'Ges', 'gestionnaire@vacances.fr', '0102030405', NULL),
('LOLA', 'admin', 'Patri', 'Lola', '2022-03-02', NULL, 'Adm', 'admin@vacances.fr', '0123456789', NULL),
('vac', 'vac', 'vacancier', 'vacancer', '2022-04-10', NULL, 'Vac', 'vacancier@vva.fr', '01020300405', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `etat_resa`
--

CREATE TABLE `etat_resa` (
  `CODEETATRESA` char(2) COLLATE utf8mb4_general_ci NOT NULL,
  `NOMETATRESA` char(15) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etat_resa`
--

INSERT INTO `etat_resa` (`CODEETATRESA`, `NOMETATRESA`) VALUES
('AN', 'Annulée'),
('AR', 'Arrhes versées'),
('BL', 'Bloquée'),
('CL', 'Clés retirés'),
('SO', 'Solde'),
('TE', 'Terminée');

-- --------------------------------------------------------

--
-- Structure de la table `hebergement`
--

CREATE TABLE `hebergement` (
  `NOHEB` int NOT NULL,
  `CODETYPEHEB` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `NOMHEB` char(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `NBPLACEHEB` int DEFAULT NULL,
  `SURFACEHEB` int DEFAULT NULL,
  `INTERNET` tinyint(1) DEFAULT NULL,
  `ANNEEHEB` int DEFAULT NULL,
  `SECTEURHEB` char(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ORIENTATIONHEB` char(5) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ETATHEB` char(32) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `DESCRIHEB` char(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PHOTOHEB` char(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `TARIFSEMHEB` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hebergement`
--

INSERT INTO `hebergement` (`NOHEB`, `CODETYPEHEB`, `NOMHEB`, `NBPLACEHEB`, `SURFACEHEB`, `INTERNET`, `ANNEEHEB`, `SECTEURHEB`, `ORIENTATIONHEB`, `ETATHEB`, `DESCRIHEB`, `PHOTOHEB`, `TARIFSEMHEB`) VALUES
(1, 'CH', 'chalet', 5, 60, 1, 2013, 'Plaine', 'sud', 'Neuf', 'ddes', '1.png', '555.00'),
(2, 'MH', 'MOBIL-HOME', 2, 25, 1, 2022, 'Plaine', 'nord', 'Bon', 'description', 'PHOTO', '200.00'),
(3, 'BU', 'COM', 9, 254, 0, 2015, 'Torrent', 'ouest', '', 'FRESDGOMP', 'JUHJ', '969.25');

-- --------------------------------------------------------

--
-- Structure de la table `resa`
--

CREATE TABLE `resa` (
  `NORESA` int NOT NULL,
  `USER` char(8) COLLATE utf8mb4_general_ci NOT NULL,
  `DATEDEBSEM` date NOT NULL,
  `NOHEB` int NOT NULL,
  `CODEETATRESA` char(2) COLLATE utf8mb4_general_ci NOT NULL,
  `DATERESA` date DEFAULT NULL,
  `DATEARRHES` date DEFAULT NULL,
  `MONTANTARRHES` decimal(7,2) DEFAULT NULL,
  `NBOCCUPANT` int DEFAULT NULL,
  `TARIFSEMRESA` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `resa`
--

INSERT INTO `resa` (`NORESA`, `USER`, `DATEDEBSEM`, `NOHEB`, `CODEETATRESA`, `DATERESA`, `DATEARRHES`, `MONTANTARRHES`, `NBOCCUPANT`, `TARIFSEMRESA`) VALUES
(3, 'LOLA', '2022-04-16', 2, 'AN', '2022-04-09', '2022-04-09', '40.00', 2, '200.00'),
(5, 'LOLA', '2022-04-23', 2, 'AN', '2022-04-09', '2022-04-09', '40.00', 2, '200.00'),
(6, 'LOLA', '2022-04-30', 2, 'AN', '2022-04-09', '2022-04-09', '40.00', 2, '200.00'),
(7, 'LOLA', '2022-05-07', 2, 'AN', '2022-04-09', '2022-04-09', '40.00', 1, '200.00'),
(8, 'LOLA', '2022-05-21', 2, 'AN', '2022-04-09', '2022-04-09', '40.00', 1, '200.00'),
(9, 'LOLA', '2022-05-28', 2, 'AN', '2022-04-09', '2022-04-09', '40.00', 2, '200.00'),
(10, 'gest', '2022-04-16', 1, 'BL', '2022-04-10', '2022-04-10', '111.00', 3, '555.00'),
(11, 'gest', '2022-04-23', 1, 'BL', '2022-04-10', '2022-04-10', '111.00', 3, '555.00'),
(12, 'gest', '2022-04-30', 1, 'BL', '2022-04-10', '2022-04-10', '111.00', 3, '555.00'),
(13, 'vac', '2022-05-07', 1, 'AN', '2022-04-29', '2022-04-29', '111.00', 2, '555.00'),
(14, 'vac', '2022-05-14', 1, 'CL', '2022-04-29', '2022-04-29', '111.00', 2, '555.00'),
(15, 'vac', '2022-05-21', 1, 'BL', '2022-04-29', '2022-04-29', '111.00', 2, '555.00');

-- --------------------------------------------------------

--
-- Structure de la table `semaine`
--

CREATE TABLE `semaine` (
  `DATEDEBSEM` date NOT NULL,
  `DATEFINSEM` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `semaine`
--

INSERT INTO `semaine` (`DATEDEBSEM`, `DATEFINSEM`) VALUES
('2022-04-09', '2022-04-16'),
('2022-04-16', '2022-04-23'),
('2022-04-23', '2022-04-30'),
('2022-04-30', '2022-05-07'),
('2022-05-07', '2022-05-14'),
('2022-05-14', '2022-05-21'),
('2022-05-21', '2022-05-28'),
('2022-05-28', '2022-06-04'),
('2022-06-04', '2022-06-11'),
('2022-06-11', '2022-06-18'),
('2022-06-18', '2022-06-25'),
('2022-06-25', '2022-07-02'),
('2022-07-02', '2022-07-09'),
('2022-07-09', '2022-07-16'),
('2022-07-16', '2022-07-23'),
('2022-07-23', '2022-07-30'),
('2022-07-30', '2022-08-06'),
('2022-08-06', '2022-08-13'),
('2022-08-13', '2022-08-20'),
('2022-08-20', '2022-08-27'),
('2022-08-27', '2022-09-03'),
('2022-09-03', '2022-09-10'),
('2022-09-10', '2022-09-17'),
('2022-09-17', '2022-09-24'),
('2022-09-24', '2022-10-01'),
('2022-10-01', '2022-10-08'),
('2022-10-08', '2022-10-15'),
('2022-10-15', '2022-10-22'),
('2022-10-22', '2022-10-29'),
('2022-10-29', '2022-11-05'),
('2022-11-05', '2022-11-12'),
('2022-11-12', '2022-11-19'),
('2022-11-19', '2022-11-26'),
('2022-11-26', '2022-12-03'),
('2022-12-03', '2022-12-10'),
('2022-12-10', '2022-12-17'),
('2022-12-17', '2022-12-24'),
('2022-12-24', '2022-12-31'),
('2022-12-31', '2023-01-07'),
('2023-01-07', '2023-01-14'),
('2023-01-14', '2023-01-21'),
('2023-01-21', '2023-01-28'),
('2023-01-28', '2023-02-04'),
('2023-02-04', '2023-02-11'),
('2023-02-11', '2023-02-18'),
('2023-02-18', '2023-02-25'),
('2023-02-25', '2023-03-04'),
('2023-03-04', '2023-03-11'),
('2023-03-11', '2023-03-18'),
('2023-03-18', '2023-03-25'),
('2023-03-25', '2023-04-01'),
('2023-04-01', '2023-04-08'),
('2023-04-08', '2023-04-15'),
('2023-04-15', '2023-04-22'),
('2023-04-22', '2023-04-29'),
('2023-04-29', '2023-05-06'),
('2023-05-06', '2023-05-13'),
('2023-05-13', '2023-05-20');

-- --------------------------------------------------------

--
-- Structure de la table `type_heb`
--

CREATE TABLE `type_heb` (
  `CODETYPEHEB` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `NOMTYPEHEB` char(30) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_heb`
--

INSERT INTO `type_heb` (`CODETYPEHEB`, `NOMTYPEHEB`) VALUES
('AP', 'Appartement'),
('BU', 'Bungalow'),
('CH', 'Chalet'),
('MH', 'Mobil-Home');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`USER`);

--
-- Index pour la table `etat_resa`
--
ALTER TABLE `etat_resa`
  ADD PRIMARY KEY (`CODEETATRESA`);

--
-- Index pour la table `hebergement`
--
ALTER TABLE `hebergement`
  ADD PRIMARY KEY (`NOHEB`),
  ADD KEY `I_FK_HEBERGEMENT_TYPE_HEB` (`CODETYPEHEB`);

--
-- Index pour la table `resa`
--
ALTER TABLE `resa`
  ADD PRIMARY KEY (`NORESA`),
  ADD KEY `I_FK_RESA_COMPTE` (`USER`),
  ADD KEY `I_FK_RESA_SEMAINE` (`DATEDEBSEM`),
  ADD KEY `I_FK_RESA_HEBERGEMENT` (`NOHEB`),
  ADD KEY `I_FK_RESA_ETAT_RESA` (`CODEETATRESA`);

--
-- Index pour la table `semaine`
--
ALTER TABLE `semaine`
  ADD PRIMARY KEY (`DATEDEBSEM`);

--
-- Index pour la table `type_heb`
--
ALTER TABLE `type_heb`
  ADD PRIMARY KEY (`CODETYPEHEB`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `hebergement`
--
ALTER TABLE `hebergement`
  MODIFY `NOHEB` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `resa`
--
ALTER TABLE `resa`
  MODIFY `NORESA` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `hebergement`
--
ALTER TABLE `hebergement`
  ADD CONSTRAINT `hebergement_ibfk_1` FOREIGN KEY (`CODETYPEHEB`) REFERENCES `type_heb` (`CODETYPEHEB`);

--
-- Contraintes pour la table `resa`
--
ALTER TABLE `resa`
  ADD CONSTRAINT `resa_ibfk_2` FOREIGN KEY (`DATEDEBSEM`) REFERENCES `semaine` (`DATEDEBSEM`),
  ADD CONSTRAINT `resa_ibfk_4` FOREIGN KEY (`CODEETATRESA`) REFERENCES `etat_resa` (`CODEETATRESA`),
  ADD CONSTRAINT `resa_ibfk_5` FOREIGN KEY (`NOHEB`) REFERENCES `hebergement` (`NOHEB`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `resa_ibfk_6` FOREIGN KEY (`USER`) REFERENCES `compte` (`USER`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
