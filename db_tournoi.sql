-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 12 May 2021, 12:14:40
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `db_tournoi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `equipe`
--

CREATE TABLE `equipe` (
  `idEquipe` int(11) NOT NULL,
  `nom` varchar(75) NOT NULL,
  `niveau` int(75) NOT NULL,
  `tournoiContient` int(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `equipe`
--

INSERT INTO `equipe` (`idEquipe`, `nom`, `niveau`, `tournoiContient`) VALUES
(97, 'Liverpool', 1, 50),
(98, 'Bayern ', 1, 50),
(99, 'Marseille', 1, 50),
(100, 'PSG', 1, 50),
(101, 'Chelsea', 1, 50),
(102, 'Manchester City', 1, 50),
(103, 'Real Madrid', 1, 50),
(104, 'Sevilla', 1, 50);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `joueur`
--

CREATE TABLE `joueur` (
  `idJoueur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `_role` int(50) NOT NULL,
  `mail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `EquipeAppartient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `joueur`
--

INSERT INTO `joueur` (`idJoueur`, `nom`, `prenom`, `_role`, `mail`, `EquipeAppartient`) VALUES
(45, 'Kabak', 'Ozan ', 0, 'Cap@liverpool.com', 97),
(46, 'Muller', 'Thomas ', 0, 'Cap@bayern.com', 98),
(47, 'Payet', 'Dimitri', 0, 'Cap@Marseille.com', 99),
(48, 'Mbappé', 'Kylian', 0, 'Cap@Paris.com', 100),
(49, 'Giroud', 'Olivier', 0, 'Cap@Chelsea.com', 101),
(50, 'Jesus', 'Gabriel ', 0, 'Cap@ManCity.com', 102),
(51, 'Modrić', 'Luka', 0, 'Cap@Real.com', 103);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `matches`
--

CREATE TABLE `matches` (
  `idMatch` int(11) NOT NULL,
  `score1` int(11) NOT NULL,
  `score2` int(11) NOT NULL,
  `_date` date NOT NULL,
  `OrganisePar` int(11) NOT NULL,
  `equipe1` int(75) NOT NULL,
  `equipe2` int(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tournoi`
--

CREATE TABLE `tournoi` (
  `idTournoi` int(11) NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dateDebut` date NOT NULL,
  `lieu` varchar(150) DEFAULT NULL,
  `nombreEquipes` int(11) DEFAULT NULL,
  `niveau` int(11) NOT NULL,
  `QuiGere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `tournoi`
--

INSERT INTO `tournoi` (`idTournoi`, `nom`, `dateDebut`, `lieu`, `nombreEquipes`, `niveau`, `QuiGere`) VALUES
(50, 'League de Champions', '2021-08-07', 'Montpellier', 8, 0, 68);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `_role` int(50) NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `_password` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `_role`, `mail`, `_password`) VALUES
(68, 'zidane', 'zinedine', 1, 'gest@zidane.com', '1'),
(69, 'Kabak', 'Ozan ', 0, 'Cap@liverpool.com', '1'),
(70, 'Muller', 'Thomas ', 0, 'Cap@bayern.com', '1'),
(71, 'Payet', 'Dimitri', 0, 'Cap@Marseille.com', '1'),
(72, 'Mbappé', 'Kylian', 0, 'Cap@Paris.com', '1'),
(73, 'Giroud', 'Olivier', 0, 'Cap@Chelsea.com', '1'),
(74, 'Jesus', 'Gabriel ', 0, 'Cap@ManCity.com', '1'),
(75, 'Modrić', 'Luka', 0, 'Cap@Real.com', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`idEquipe`),
  ADD KEY `tournoiContient` (`tournoiContient`);

--
-- Tablo için indeksler `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`idJoueur`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD KEY `EquipeAppartient` (`EquipeAppartient`);

--
-- Tablo için indeksler `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`idMatch`),
  ADD KEY `Organise` (`OrganisePar`),
  ADD KEY `equipe1` (`equipe1`),
  ADD KEY `equipe2` (`equipe2`);

--
-- Tablo için indeksler `tournoi`
--
ALTER TABLE `tournoi`
  ADD PRIMARY KEY (`idTournoi`),
  ADD KEY `QuiGere` (`QuiGere`);

--
-- Tablo için indeksler `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `equipe`
--
ALTER TABLE `equipe`
  MODIFY `idEquipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- Tablo için AUTO_INCREMENT değeri `joueur`
--
ALTER TABLE `joueur`
  MODIFY `idJoueur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Tablo için AUTO_INCREMENT değeri `matches`
--
ALTER TABLE `matches`
  MODIFY `idMatch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Tablo için AUTO_INCREMENT değeri `tournoi`
--
ALTER TABLE `tournoi`
  MODIFY `idTournoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Tablo için AUTO_INCREMENT değeri `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `tournoiContient` FOREIGN KEY (`tournoiContient`) REFERENCES `tournoi` (`idTournoi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `EquipeAppartient` FOREIGN KEY (`EquipeAppartient`) REFERENCES `equipe` (`idEquipe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `Organise` FOREIGN KEY (`OrganisePar`) REFERENCES `tournoi` (`idTournoi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipe1` FOREIGN KEY (`equipe1`) REFERENCES `equipe` (`idEquipe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipe2` FOREIGN KEY (`equipe2`) REFERENCES `equipe` (`idEquipe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `tournoi`
--
ALTER TABLE `tournoi`
  ADD CONSTRAINT `QuiGere` FOREIGN KEY (`QuiGere`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
