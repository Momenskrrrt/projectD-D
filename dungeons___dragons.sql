-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 15, 2025 alle 07:30
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dungeons & dragons`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `incantesimi`
--

CREATE TABLE `incantesimi` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `id_scheda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `incantesimi`
--

INSERT INTO `incantesimi` (`id`, `nome`, `id_scheda`) VALUES
(3, '[value-2]', 14),
(4, 'acid-splash', 14),
(5, 'aid', 14),
(6, 'alarm', 14);

-- --------------------------------------------------------

--
-- Struttura della tabella `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `quantita` int(11) DEFAULT 1,
  `id_scheda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `inventario`
--

INSERT INTO `inventario` (`id`, `nome`, `quantita`, `id_scheda`) VALUES
(33, 'acid-vial', 45, 5),
(34, 'cart', 1, 5),
(35, 'acid-vial', 1, 5),
(36, 'alms-box', 1, 5),
(37, 'alms-box', 1, 5),
(38, 'barding-studded-leather', 1, 5),
(39, 'book', 1, 5),
(40, 'calligraphers-supplies', 1, 5),
(57, 'abacus', 1, 14),
(58, 'acid-vial', 1, 14),
(59, 'alchemists-fire-flask', 1, 14),
(60, 'alchemists-supplies', 1, 14),
(61, 'alms-box', 1, 14),
(62, 'amulet', 1, 14),
(63, 'animal-feed-1-day', 1, 14),
(64, 'antitoxin-vial', 1, 14);

-- --------------------------------------------------------

--
-- Struttura della tabella `scheda`
--

CREATE TABLE `scheda` (
  `id` int(11) NOT NULL,
  `Strength` int(11) NOT NULL,
  `Dexterity` int(11) NOT NULL,
  `Constitution` int(11) NOT NULL,
  `Intelligence` int(11) NOT NULL,
  `Wisdom` int(11) NOT NULL,
  `Charisma` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL,
  `livello` int(11) DEFAULT NULL,
  `nomePersonaggio` varchar(255) DEFAULT NULL,
  `alignment` varchar(255) DEFAULT NULL,
  `classe` varchar(255) DEFAULT NULL,
  `lingua` varchar(255) DEFAULT NULL,
  `razza` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `scheda`
--

INSERT INTO `scheda` (`id`, `Strength`, `Dexterity`, `Constitution`, `Intelligence`, `Wisdom`, `Charisma`, `id_utente`, `livello`, `nomePersonaggio`, `alignment`, `classe`, `lingua`, `razza`) VALUES
(5, 1, 1, 1, 1, 1, 1, 1, 1, 'urcoloco', 'chaotic-good', 'barbarian', 'abyssal', 'dragonborn'),
(14, 1, 1, 1, 1, 1, 1, 1, 1, 'urcoloco', 'chaotic-good', 'barbarian', 'abyssal', 'dragonborn');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `username`, `password`) VALUES
(1, 'Franco', '900150983cd24fb0d6963f7d28e17f72');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `incantesimi`
--
ALTER TABLE `incantesimi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_scheda` (`id_scheda`);

--
-- Indici per le tabelle `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_scheda` (`id_scheda`);

--
-- Indici per le tabelle `scheda`
--
ALTER TABLE `scheda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utente` (`id_utente`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `incantesimi`
--
ALTER TABLE `incantesimi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT per la tabella `scheda`
--
ALTER TABLE `scheda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `incantesimi`
--
ALTER TABLE `incantesimi`
  ADD CONSTRAINT `incantesimi_ibfk_1` FOREIGN KEY (`id_scheda`) REFERENCES `scheda` (`id`);

--
-- Limiti per la tabella `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`id_scheda`) REFERENCES `scheda` (`id`);

--
-- Limiti per la tabella `scheda`
--
ALTER TABLE `scheda`
  ADD CONSTRAINT `scheda_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utenti` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
