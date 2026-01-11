-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 11, 2026 at 01:41 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labonnetrouvaille`
--

-- --------------------------------------------------------

--
-- Table structure for table `annonce`
--

CREATE TABLE `annonce` (
  `id_annonce` int NOT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `description` text,
  `prix` decimal(15,2) DEFAULT NULL,
  `date_publication` date DEFAULT NULL,
  `id_utilisateur` int NOT NULL
) ;

--
-- Dumping data for table `annonce`
--

INSERT INTO `annonce` (`id_annonce`, `titre`, `description`, `prix`, `date_publication`, `id_utilisateur`) VALUES
(1, 'Vélo de ville homme – très bon état', 'Vends vélo de ville pour homme, taille M, utilisé occasionnellement. Freins et pneus en bon état, révision effectuée récemment. Idéal pour trajets quotidiens ou balades. À venir récupérer sur place.', 180.00, '2026-01-06', 1),
(2, 'Canapé 3 places convertible', 'Canapé convertible 3 places, tissu gris, très confortable. Fonction couchage utilisée rarement. Quelques légères traces d’usure mais reste en très bon état. À démonter et récupérer sur place.', 350.00, '2025-12-28', 2),
(3, 'iPhone 12 – 128 Go – débloqué', 'Phone 12 noir, 128 Go, débloqué tout opérateur. Très bon état général, toujours utilisé avec coque et verre trempé. Batterie à 86 %. Vendu avec câble de charge.', 420.00, '2026-01-05', 3),
(4, 'Table à manger en bois massif', 'PS4 Slim 500 Go en parfait état de fonctionnement. Vendue avec 2 manettes officielles et câbles d’origine. Possibilité de fournir quelques jeux en supplément. Test possible sur place.', 220.00, '2026-01-03', 4),
(11, 'Test 12', 'On va voir si ça va fonctionner cette fois inshallah.', 13.25, '2026-01-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id_photo` int NOT NULL,
  `chemin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_annonce` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id_photo`, `chemin`, `id_annonce`) VALUES
(1, 'Bureau-en-rotin.jpg', 1),
(2, 'canape3place.jpg', 2),
(3, 'iphone_12.png', 3),
(5, 'annonce_6962d4a5ec06d.jpg', 11);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `mot_de_passe` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `email`, `username`, `mot_de_passe`) VALUES
(1, 'luc.ture@example.com', 'LucTure', 'Luc76_'),
(2, 'anne.onyme@example.com', 'AnneOnyme', 'Mdp99'),
(3, 'sal.lemand@example.com', 'SalLemand', 'Sallemand33D'),
(4, 'chris.tal@example.com', 'ChrisTal', 'ClairNet321!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id_annonce`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id_photo`),
  ADD KEY `id_annonce` (`id_annonce`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id_annonce` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id_photo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Constraints for table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`id_annonce`) REFERENCES `annonce` (`id_annonce`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
