-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 10, 2022 alle 15:30
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
-- Database: voice_hunter
--

-- --------------------------------------------------------

--
-- Struttura della tabella album
--

CREATE TABLE album (
  ID int(11) NOT NULL,
  titolo varchar(20) NOT NULL,
  nbrani int(11) NOT NULL,
  Autore varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella autori
--

CREATE TABLE autori (
  nomedarte varchar(20) NOT NULL,
  genere varchar(30) NOT NULL,
  nalbum int(11) DEFAULT NULL,
  password varchar(40) NOT NULL,
  email varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella brani
--

CREATE TABLE brani (
  id int(11) NOT NULL,
  audio varchar(100) NOT NULL,
  genere varchar(30) DEFAULT NULL,
  titolo varchar(50) NOT NULL,
  video varchar(100) DEFAULT NULL,
  CODAlbum int(11) NOT NULL,
  Autore varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella utenti
--

CREATE TABLE utenti (
  username varchar(20) NOT NULL,
  nome varchar(50) NOT NULL,
  cognome varchar(50) NOT NULL,
  password varchar(40) NOT NULL,
  sesso enum(maschio,femmina) DEFAULT NULL,
  email varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella utentiautori
--

CREATE TABLE utentiautori (
  ID int(11) NOT NULL,
  Autore varchar(20) NOT NULL,
  Utente varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella utentibrani
--

CREATE TABLE utentibrani (
  ID int(11) NOT NULL,
  CODBrani int(11) NOT NULL,
  Utente varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle album
--
ALTER TABLE album
  ADD PRIMARY KEY (ID),
  ADD KEY CODAutore (Autore);

--
-- Indici per le tabelle autori
--
ALTER TABLE autori
  ADD PRIMARY KEY (nomedarte),
  ADD UNIQUE KEY email (email);

--
-- Indici per le tabelle brani
--
ALTER TABLE brani
  ADD PRIMARY KEY (ID),
  ADD KEY CODAutore (Autore),
  ADD KEY CODAlbum (CODAlbum);

--
-- Indici per le tabelle utenti
--
ALTER TABLE utenti
  ADD PRIMARY KEY (username),
  ADD UNIQUE KEY email (email);

--
-- Indici per le tabelle utentiautori
--
ALTER TABLE utentiautori
  ADD PRIMARY KEY (ID),
  ADD KEY CODAutore (Autore),
  ADD KEY CODUtente (Utente);

--
-- Indici per le tabelle utentibrani
--
ALTER TABLE utentibrani
  ADD PRIMARY KEY (ID),
  ADD KEY CODBrani (CODBrani),
  ADD KEY CODUtente (Utente);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella album
--
ALTER TABLE album
  MODIFY ID int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella brani
--
ALTER TABLE brani
  MODIFY ID int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella utentiautori
--
ALTER TABLE utentiautori
  MODIFY ID int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella utentibrani
--
ALTER TABLE utentibrani
  MODIFY ID int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella album
--
ALTER TABLE album
  ADD CONSTRAINT album_ibfk_1 FOREIGN KEY (Autore) REFERENCES autori (nomedarte);

--
-- Limiti per la tabella brani
--
ALTER TABLE brani
  ADD CONSTRAINT brani_ibfk_1 FOREIGN KEY (Autore) REFERENCES autori (nomedarte),
  ADD CONSTRAINT brani_ibfk_2 FOREIGN KEY (CODAlbum) REFERENCES album (ID);

--
-- Limiti per la tabella utentiautori
--
ALTER TABLE utentiautori
  ADD CONSTRAINT utentiautori_ibfk_1 FOREIGN KEY (Autore) REFERENCES autori (nomedarte),
  ADD CONSTRAINT utentiautori_ibfk_2 FOREIGN KEY (Utente) REFERENCES utenti (username);

--
-- Limiti per la tabella utentibrani
--
ALTER TABLE utentibrani
  ADD CONSTRAINT utentibrani_ibfk_1 FOREIGN KEY (CODBrani) REFERENCES brani (ID),
  ADD CONSTRAINT utentibrani_ibfk_2 FOREIGN KEY (Utente) REFERENCES utenti ( username);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
