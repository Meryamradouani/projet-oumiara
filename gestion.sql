-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 13 jan. 2024 à 12:24
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `UTILISATEUR_id_utilisateur` int(11) NOT NULL,
  `EVENEMENT_id_evenement` int(11) NOT NULL,
  `contenu` varchar(1000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `id_demande` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `lieu` varchar(100) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `photo` varchar(1000) NOT NULL,
  `id_demandeur` int(11) NOT NULL,
  `createur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`id_demande`, `date_debut`, `date_fin`, `lieu`, `titre`, `description`, `photo`, `id_demandeur`, `createur`) VALUES
(60, '2024-02-10', '2024-02-11', 'ENSAK - Amphi rouge', 'Ensak got talent ', 'Decouvrez les talents de nos futurs ingenieurs ! Soyez nombreux.', 'Ensak got talent .png', 56, 'Ensak Art'),
(61, '2024-01-28', '2024-01-14', 'Complexe sportif ', 'Tournoi football', 'Notre club organise un tournoi de football. Les tickets sont limite ! ', 'Tournoi football.jpg', 57, 'bds'),
(62, '2024-01-28', '2024-01-28', 'ENSAK - Batiment b', 'Solution challenge', 'Participez a cette competition innovante et gagnez un prix exclusive.', 'Solution challenge.jpg', 59, 'club google');

-- --------------------------------------------------------

--
-- Structure de la table `demandeur`
--

CREATE TABLE `demandeur` (
  `id_demandeur` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fonction` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demandeur`
--

INSERT INTO `demandeur` (`id_demandeur`, `Nom`, `prenom`, `email`, `fonction`) VALUES
(56, 'kenza', 'mouktabil', 'kenzamouktabil@gmail.com', 'etudiante'),
(57, 'Rafik', 'Salma', 'salmarafik@gmail.com', 'etudiant'),
(59, 'radouani', 'meryem', 'radouani@gmail.com', 'professeur');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
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
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `date_debut`, `lieu`, `date_fin`, `description`, `titre`, `photo`, `createur`) VALUES
(25, '2024-01-20', 'ENSAK - Batiment b', '2024-01-21', 'Rejoignez notre competition ce weekend ! Stay tuned.', 'Chess tournament ', 'photo/Chess tournament .jpg', 'Ensak chess'),
(26, '2024-01-27', 'Douar al bacha', '2024-01-28', 'Together we create hope!Rejoignez notre cause et faites un don.', 'Caravane humanitaire 6', 'photo/Caravane humanitaire Al amal 6.jpg', 'Club associatif Anaruz'),
(30, '2024-01-27', 'Taroudant', '2024-01-28', 'Ensemble tendons la main a celles qui ont perdu leur moitie.', 'Lamsat khayr ', 'photo/Lamsat khayr .jpg', 'Club afaak'),
(31, '2024-05-10', 'ENSA Kenitra ', '2024-05-10', 'Journee sous le theme:La digitalisation et ia quel futur pour le maroc?', 'Les systemes embarques', 'photo/Journee Natuonale des systemes embarques.jpg', 'Club creer');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `UTILISATEUR_id_utilisateur` int(11) NOT NULL,
  `EVENEMENT_id_evenement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`UTILISATEUR_id_utilisateur`, `EVENEMENT_id_evenement`) VALUES
(9, 25),
(10, 31),
(11, 30);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `fonctionalite` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `fonctionalite`, `nom`, `prenom`, `email`) VALUES
(9, 'etudiant', 'mouktabil', 'soukaina', 'souka@gmail.com'),
(10, 'professeur', 'oumaira', 'ilham', 'ilham@gmail.com'),
(11, 'etudiant', 'nioua', 'oumaima', 'nioua@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`UTILISATEUR_id_utilisateur`,`EVENEMENT_id_evenement`),
  ADD KEY `EVENEMENT_id_evenement` (`EVENEMENT_id_evenement`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`id_demande`),
  ADD KEY `id_demandeur` (`id_demandeur`);

--
-- Index pour la table `demandeur`
--
ALTER TABLE `demandeur`
  ADD PRIMARY KEY (`id_demandeur`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_evenement`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`UTILISATEUR_id_utilisateur`,`EVENEMENT_id_evenement`),
  ADD KEY `EVENEMENT_id_evenement` (`EVENEMENT_id_evenement`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `id_demande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `demandeur`
--
ALTER TABLE `demandeur`
  MODIFY `id_demandeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_evenement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`UTILISATEUR_id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`EVENEMENT_id_evenement`) REFERENCES `evenement` (`id_evenement`);

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `demande_ibfk_1` FOREIGN KEY (`id_demandeur`) REFERENCES `demandeur` (`id_demandeur`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`UTILISATEUR_id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`EVENEMENT_id_evenement`) REFERENCES `evenement` (`id_evenement`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
