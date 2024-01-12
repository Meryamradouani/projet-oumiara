-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 02:28 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `demandeur`
--
ALTER TABLE `demandeur`
  ADD PRIMARY KEY (`id_demandeur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `demandeur`
--
ALTER TABLE `demandeur`
  MODIFY `id_demandeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
