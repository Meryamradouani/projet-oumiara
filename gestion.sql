-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 02:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE `commentaire` (
  `UTILISATEUR_id_utilisateur` int(11) NOT NULL,
  `EVENEMENT_id_evenement` int(11) NOT NULL,
  `contenu` varchar(1000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `demande`
--

CREATE TABLE `demande` (
  `id_demande` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `lieu` varchar(100) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `photo` blob NOT NULL,
  `id_demandeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `demande`
--

INSERT INTO `demande` (`id_demande`, `date_debut`, `date_fin`, `lieu`, `titre`, `description`, `photo`, `id_demandeur`) VALUES
(22, '2023-02-03', '2034-02-05', 'kenitra', 'nioua oumayma', 'sdwcjn', 0x6e696f7561206f756d61796d612e706e67, 2),
(23, '2035-03-05', '2034-02-05', 'kenitra', 'AYOUB NIOUA', 'sdwcjn', 0x41594f5542204e494f55412e706e67, 2),
(24, '4444-12-31', '4444-03-31', 'kenitra', 'AYOUB NIOUA', 'sdwcjn', 0x41594f5542204e494f55412e706e67, 2),
(25, '0003-03-31', '3333-03-31', 'kenitra', 'AYOUB NIOUA', 'sdwcjn', 0x312e706e67, 2),
(26, '4444-02-04', '4444-03-31', 'kn', 'forum', 'djsdh', 0x666f72756d2e706e67, 9);

-- --------------------------------------------------------

--
-- Table structure for table `demandeur`
--

CREATE TABLE `demandeur` (
  `id_demandeur` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fonction` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `demandeur`
--

INSERT INTO `demandeur` (`id_demandeur`, `Nom`, `prenom`, `email`, `fonction`) VALUES
(1, 'umayma', 'n', '', 'etudiant'),
(2, 'NIOUA', 'OUMAYMA', 'oumaimanioua42@gmail.com', 'etudiant'),
(3, 'NIOUA', 'OUMAYMA', 'oumaimanioua42@gmail.com', 'etudiant'),
(4, 'NIOUA', 'OUMAYMA', 'oumaimanioua42@gmail.com', 'etudiant'),
(5, 'NIOUA', 'OUMAYMA', 'oumaimanioua42@gmail.com', 'etudiant'),
(6, 'NIOUA', 'AYOUB', 'yassire20006@gmail.com', 'etudiant'),
(7, '', '', '', ''),
(8, 'oum', 'oum', 'yassire20006@gmail.com', 'etudiant'),
(9, 'hiba', 'nioua', 'hiba@gmail.com', 'etudiant'),
(10, 'hiba', 'nioua', 'hiba@gmail.com', 'etudiant');

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

CREATE TABLE `evenement` (
  `id_evenement` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `lieu` varchar(100) NOT NULL,
  `date_fin` date NOT NULL,
  `description` varchar(1000) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `photo` varchar(1000) NOT NULL,
  `createur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `date_debut`, `lieu`, `date_fin`, `description`, `titre`, `photo`, `createur`) VALUES
(1, '2023-11-12', 'kenitra', '2024-02-04', 'hbwdjkuacgy', 'forum', 'photo/forum.jpg', 'oumayma'),
(2, '2024-02-12', 'kenitra', '2025-03-12', 'fvdbkshj', 'robotiquee', 'photo/robotiquee.jpg', 'oumi');

-- --------------------------------------------------------

--
-- Table structure for table `inscription`
--

CREATE TABLE `inscription` (
  `UTILISATEUR_id_utilisateur` int(11) NOT NULL,
  `EVENEMENT_id_evenement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inscription`
--

INSERT INTO `inscription` (`UTILISATEUR_id_utilisateur`, `EVENEMENT_id_evenement`) VALUES
(1, 1),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `fonctionalite` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `fonctionalite`, `nom`, `prenom`, `email`) VALUES
(1, 'etudiant', 'NIOUA', 'OUMAYMA', 'oumaimanioua42@gmail.com'),
(2, 'etudiant', 'NIOUA', 'AYOUB', 'yassire20006@gmail.com'),
(3, 'etudiant', 'NIOUA', 'mrt', 'oumayma.nioua@uit.ac.ma');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`UTILISATEUR_id_utilisateur`,`EVENEMENT_id_evenement`),
  ADD KEY `EVENEMENT_id_evenement` (`EVENEMENT_id_evenement`);

--
-- Indexes for table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`id_demande`),
  ADD KEY `id_demandeur` (`id_demandeur`);

--
-- Indexes for table `demandeur`
--
ALTER TABLE `demandeur`
  ADD PRIMARY KEY (`id_demandeur`);

--
-- Indexes for table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_evenement`);

--
-- Indexes for table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`UTILISATEUR_id_utilisateur`,`EVENEMENT_id_evenement`),
  ADD KEY `EVENEMENT_id_evenement` (`EVENEMENT_id_evenement`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `demande`
--
ALTER TABLE `demande`
  MODIFY `id_demande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `demandeur`
--
ALTER TABLE `demandeur`
  MODIFY `id_demandeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_evenement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`UTILISATEUR_id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`EVENEMENT_id_evenement`) REFERENCES `evenement` (`id_evenement`);

--
-- Constraints for table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `demande_ibfk_1` FOREIGN KEY (`id_demandeur`) REFERENCES `demandeur` (`id_demandeur`);

--
-- Constraints for table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`UTILISATEUR_id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`EVENEMENT_id_evenement`) REFERENCES `evenement` (`id_evenement`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
