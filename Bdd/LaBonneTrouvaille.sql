
-- Database: `labonnetrouvaille`

-- Table structure for table `annonce`

CREATE TABLE `annonce` (
  `id_annonce` int NOT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `description` text,
  `prix` decimal(15,2) DEFAULT NULL,
  `date_publication` date DEFAULT NULL,
  `id_utilisateur` int NOT NULL
) ;



--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id_photo` int NOT NULL,
  `id_annonce` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(12, 'hache@test.fr', 'testHache', '$2y$10$iElx3S7OlOSt1DkgnmZTRegtCRwzKoMgay0/XGxPzeBblyLsUUqAi'),
(16, 'admin@lbt.fr', 'adminLBT', '$2y$10$YC1Ls00k/7.hbHqBPlxVvOg3alZDkWH0OX0i6ASi9sfnH0X4F7MEy'),
(21, 'test@gmail.fr', 'TestUser', '$2y$10$unJA7IG9CSWQZ2/pZ8kLY.OlKlGPDZdNEtfN9jhhQJOJLkyBwrAR.');

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
  MODIFY `id_photo` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
