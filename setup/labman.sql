-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Ago 07, 2018 alle 14:59
-- Versione del server: 10.1.34-MariaDB
-- Versione PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hlab`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `criotank`
--

CREATE TABLE `criotank` (
  `id` int(11) NOT NULL,
  `modello` varchar(89) NOT NULL,
  `stato` varchar(89) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `criotank_sacche`
--

CREATE TABLE `criotank_sacche` (
  `id_sacca` int(11) NOT NULL,
  `id_tank` int(11) NOT NULL,
  `aliquota` int(11) NOT NULL,
  `mL` int(11) NOT NULL,
  `id_pz` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `esami`
--

CREATE TABLE `esami` (
  `id` int(11) NOT NULL,
  `id_campione` varchar(11) NOT NULL,
  `nome` varchar(99) NOT NULL,
  `cognome` varchar(99) NOT NULL,
  `data_test` date NOT NULL,
  `operatore` varchar(98) NOT NULL,
  `locus_a` varchar(20) NOT NULL,
  `locus_b` varchar(20) NOT NULL,
  `locus_c` varchar(20) NOT NULL,
  `locus_dr` varchar(20) NOT NULL,
  `locus_dqa` varchar(20) NOT NULL,
  `locus_dqb` varchar(20) NOT NULL,
  `locus_dp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `esami`
--

INSERT INTO `esami` (`id`, `id_campione`, `nome`, `cognome`, `data_test`, `operatore`, `locus_a`, `locus_b`, `locus_c`, `locus_dr`, `locus_dqa`, `locus_dqb`, `locus_dp`) VALUES
(5, 'DEP310prob', '', '', '2018-08-07', 'Thorwald', '1', '1', '', '1', '1', '51', '5'),
(6, 'DEP310M', '', '', '2018-08-07', 'Thorwald', '1:02', '2:02', '', '01:02', '01:02', '01:02', '01:02');

-- --------------------------------------------------------

--
-- Struttura della tabella `famiglie`
--

CREATE TABLE `famiglie` (
  `id` int(11) NOT NULL,
  `nome` varchar(99) NOT NULL,
  `cognome` varchar(99) NOT NULL,
  `nascita` date NOT NULL,
  `id_famiglia` varchar(99) NOT NULL,
  `grado` varchar(99) NOT NULL,
  `prelievo` varchar(99) NOT NULL,
  `arrivo` date NOT NULL,
  `barcode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `famiglie`
--

INSERT INTO `famiglie` (`id`, `nome`, `cognome`, `nascita`, `id_famiglia`, `grado`, `prelievo`, `arrivo`, `barcode`) VALUES
(2, 'pinca', 'pruasa', '0000-00-00', 'DEP310', 'madre', 'SIT', '2018-08-02', 'DEP310M');

-- --------------------------------------------------------

--
-- Struttura della tabella `linfociti`
--

CREATE TABLE `linfociti` (
  `id` int(11) NOT NULL,
  `id_campione` int(11) NOT NULL,
  `nome` varchar(99) NOT NULL,
  `cognome` varchar(99) NOT NULL,
  `data_test` date NOT NULL,
  `operatore` varchar(99) NOT NULL,
  `valore1` text NOT NULL,
  `valore2` text NOT NULL,
  `valore3` text NOT NULL,
  `valore4` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `log_prodotti`
--

CREATE TABLE `log_prodotti` (
  `id` int(11) NOT NULL,
  `lotto` int(11) NOT NULL,
  `quota` int(11) NOT NULL,
  `data` date NOT NULL,
  `valore` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

CREATE TABLE `prodotti` (
  `id` int(11) NOT NULL,
  `data_carico` date NOT NULL,
  `data_scarico` date NOT NULL DEFAULT '0000-00-00',
  `prodotto` text NOT NULL,
  `quota` int(11) NOT NULL,
  `codice` varchar(99) NOT NULL,
  `operatore_carico` text NOT NULL,
  `operatore_scarico` text NOT NULL,
  `lotto` text NOT NULL,
  `scadenza` date NOT NULL DEFAULT '0000-00-00',
  `view` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `schede`
--

CREATE TABLE `schede` (
  `id` int(11) NOT NULL,
  `nome_d` varchar(99) NOT NULL DEFAULT 'nnn',
  `cognome_d` varchar(99) NOT NULL DEFAULT 'nnn',
  `nascita_d` date NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `id_famiglia` varchar(99) NOT NULL,
  `patologia` varchar(99) NOT NULL,
  `barcode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `schede`
--

INSERT INTO `schede` (`id`, `nome_d`, `cognome_d`, `nascita_d`, `telefono`, `id_famiglia`, `patologia`, `barcode`) VALUES
(21, 'Prova', 'oriva', '2018-08-08', '333 33 33 3', 'DEP310', 'TINU', 'DEP310prob');

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` varchar(99) NOT NULL,
  `pass` text NOT NULL,
  `other` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`id`, `user`, `pass`, `other`) VALUES
(4, 'Thorwald', 'c4n4r1n0', 'admin');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `criotank`
--
ALTER TABLE `criotank`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `criotank_sacche`
--
ALTER TABLE `criotank_sacche`
  ADD PRIMARY KEY (`id_sacca`);

--
-- Indici per le tabelle `esami`
--
ALTER TABLE `esami`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `famiglie`
--
ALTER TABLE `famiglie`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `linfociti`
--
ALTER TABLE `linfociti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `log_prodotti`
--
ALTER TABLE `log_prodotti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `schede`
--
ALTER TABLE `schede`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `criotank`
--
ALTER TABLE `criotank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `criotank_sacche`
--
ALTER TABLE `criotank_sacche`
  MODIFY `id_sacca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la tabella `esami`
--
ALTER TABLE `esami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `famiglie`
--
ALTER TABLE `famiglie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `linfociti`
--
ALTER TABLE `linfociti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `log_prodotti`
--
ALTER TABLE `log_prodotti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT per la tabella `schede`
--
ALTER TABLE `schede`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
