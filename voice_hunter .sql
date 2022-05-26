-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 26, 2022 alle 16:36
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voice_hunter`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `album`
--

CREATE TABLE `album` (
  `ID` int(11) NOT NULL,
  `titolo` varchar(20) NOT NULL,
  `tipologia` varchar(100) NOT NULL,
  `Autore` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `album`
--

INSERT INTO `album` (`ID`, `titolo`, `tipologia`, `Autore`) VALUES
(1, 'casa', '', 'sfera'),
(2, 'casa', 'trap', 'sfera'),
(3, 'casa', 'trap', 'sfera'),
(4, 'casa', 'trap', 'sfera');

-- --------------------------------------------------------

--
-- Struttura della tabella `autori`
--

CREATE TABLE `autori` (
  `nomedarte` varchar(20) NOT NULL,
  `genere` varchar(30) NOT NULL,
  `nalbum` int(11) DEFAULT NULL,
  `password` varchar(150) NOT NULL COMMENT 'md5',
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `autori`
--

INSERT INTO `autori` (`nomedarte`, `genere`, `nalbum`, `password`, `email`) VALUES
('ghali', 'trap', 5, '2d08d56c51e49b53cc75f59078e44b1a', 'ghali@webconsult.it'),
('sfera', 'trap', 5, '81dc9bdb52d04dc20036dbd8313ed055', 'andrea@webconsult.it');

-- --------------------------------------------------------

--
-- Struttura della tabella `brani`
--

CREATE TABLE `brani` (
  `ID` int(11) NOT NULL,
  `canzone` varchar(5000) NOT NULL,
  `genere` varchar(30) DEFAULT NULL,
  `titolo` varchar(50) NOT NULL,
  `CODAlbum` int(11) DEFAULT NULL,
  `Autore` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `brani`
--

INSERT INTO `brani` (`ID`, `canzone`, `genere`, `titolo`, `CODAlbum`, `Autore`) VALUES
(4, 'https://www.youtube.com/watch?v=XE6lV6xseQ4', 'dasda', 'pippo', NULL, NULL),
(5, 'sdasdsa', 'dasdsa', 'pippo', NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `username` varchar(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL COMMENT 'md5',
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`username`, `nome`, `cognome`, `password`, `email`) VALUES
('cdddd', 'aaaaa', 'aaaaa', '827ccb0eea8a706c4c34a16891f84e7b', 'elena.barzaghi01@gmail.com'),
('rocco', 'Abretti', 'Andrea', '81dc9bdb52d04dc20036dbd8313ed055', 'luigi@webconsult.it'),
('root', 'root', 'root', '63a9f0ea7bb98050796b649e85481845', 'andre@gmail.it');

-- --------------------------------------------------------

--
-- Struttura della tabella `utentiautori`
--

CREATE TABLE `utentiautori` (
  `ID` int(11) NOT NULL,
  `Autore` varchar(20) NOT NULL,
  `Utente` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `utentibrani`
--

CREATE TABLE `utentibrani` (
  `ID` int(11) NOT NULL,
  `CODBrani` int(11) NOT NULL,
  `Utente` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CODAutore` (`Autore`);

--
-- Indici per le tabelle `autori`
--
ALTER TABLE `autori`
  ADD PRIMARY KEY (`nomedarte`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indici per le tabelle `brani`
--
ALTER TABLE `brani`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CODAutore` (`Autore`),
  ADD KEY `CODAlbum` (`CODAlbum`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indici per le tabelle `utentiautori`
--
ALTER TABLE `utentiautori`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CODAutore` (`Autore`),
  ADD KEY `CODUtente` (`Utente`);

--
-- Indici per le tabelle `utentibrani`
--
ALTER TABLE `utentibrani`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CODBrani` (`CODBrani`),
  ADD KEY `CODUtente` (`Utente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `album`
--
ALTER TABLE `album`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `brani`
--
ALTER TABLE `brani`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT per la tabella `utentiautori`
--
ALTER TABLE `utentiautori`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utentibrani`
--
ALTER TABLE `utentibrani`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`Autore`) REFERENCES `autori` (`nomedarte`);

--
-- Limiti per la tabella `brani`
--
ALTER TABLE `brani`
  ADD CONSTRAINT `brani_ibfk_1` FOREIGN KEY (`Autore`) REFERENCES `autori` (`nomedarte`),
  ADD CONSTRAINT `brani_ibfk_2` FOREIGN KEY (`CODAlbum`) REFERENCES `album` (`ID`);

--
-- Limiti per la tabella `utentiautori`
--
ALTER TABLE `utentiautori`
  ADD CONSTRAINT `utentiautori_ibfk_1` FOREIGN KEY (`Autore`) REFERENCES `autori` (`nomedarte`),
  ADD CONSTRAINT `utentiautori_ibfk_2` FOREIGN KEY (`Utente`) REFERENCES `utenti` (`username`);

--
-- Limiti per la tabella `utentibrani`
--
ALTER TABLE `utentibrani`
  ADD CONSTRAINT `utentibrani_ibfk_1` FOREIGN KEY (`CODBrani`) REFERENCES `brani` (`ID`),
  ADD CONSTRAINT `utentibrani_ibfk_2` FOREIGN KEY (`Utente`) REFERENCES `utenti` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
