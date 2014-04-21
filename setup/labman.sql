-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2014 alle 18:53
-- Versione del server: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `labman`
--
CREATE DATABASE IF NOT EXISTS `labman` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `labman`;

-- --------------------------------------------------------

--
-- Struttura della tabella `linfociti`
--

DROP TABLE IF EXISTS `linfociti`;
CREATE TABLE IF NOT EXISTS `linfociti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_campione` int(11) NOT NULL,
  `nome` varchar(99) NOT NULL,
  `cognome` varchar(99) NOT NULL,
  `data_test` date NOT NULL,
  `operatore` varchar(99) NOT NULL,
  `valore1` text NOT NULL,
  `valore2` text NOT NULL,
  `valore3` text NOT NULL,
  `valore4` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `log_prodotti`
--

DROP TABLE IF EXISTS `log_prodotti`;
CREATE TABLE IF NOT EXISTS `log_prodotti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lotto` int(11) NOT NULL,
  `quota` int(11) NOT NULL,
  `data` date NOT NULL,
  `valore` varchar(90) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `piastrine`
--

DROP TABLE IF EXISTS `piastrine`;
CREATE TABLE IF NOT EXISTS `piastrine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_campione` int(11) NOT NULL,
  `nome` varchar(99) NOT NULL,
  `cognome` varchar(99) NOT NULL,
  `diretto` varchar(11) NOT NULL,
  `indiretto` varchar(11) NOT NULL,
  `data_test` date NOT NULL,
  `operatore` varchar(98) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

DROP TABLE IF EXISTS `prodotti`;
CREATE TABLE IF NOT EXISTS `prodotti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_carico` date NOT NULL,
  `data_scarico` date NOT NULL DEFAULT '0000-00-00',
  `prodotto` text NOT NULL,
  `quota` int(11) NOT NULL,
  `codice` varchar(99) NOT NULL,
  `operatore_carico` text NOT NULL,
  `operatore_scarico` text NOT NULL,
  `lotto` text NOT NULL,
  `scadenza` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `schede`
--

DROP TABLE IF EXISTS `schede`;
CREATE TABLE IF NOT EXISTS `schede` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_d` varchar(99) NOT NULL DEFAULT 'nnn',
  `cognome_d` varchar(99) NOT NULL DEFAULT 'nnn',
  `domicilio` text NOT NULL,
  `comune` text NOT NULL,
  `nascita_d` date NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `cellulare` varchar(11) NOT NULL,
  `leucociti` text NOT NULL,
  `nome_r` varchar(99) NOT NULL,
  `cognome_r` varchar(99) NOT NULL,
  `nascita_r` date NOT NULL,
  `al1` varchar(11) NOT NULL,
  `al2` varchar(11) NOT NULL,
  `al3` varchar(11) NOT NULL,
  `al4` varchar(11) NOT NULL,
  `al5` varchar(11) NOT NULL,
  `al6` varchar(11) NOT NULL,
  `wbc-pre` varchar(11) NOT NULL,
  `wbc-post` varchar(11) NOT NULL,
  `scarto` varchar(11) NOT NULL,
  `finale` varchar(11) NOT NULL,
  `vol` varchar(11) NOT NULL,
  `procedura` varchar(99) NOT NULL,
  `deplasmazione` varchar(99) NOT NULL,
  `lotto_albumina` varchar(90) NOT NULL,
  `lotto_DMSO` varchar(90) NOT NULL,
  `lotto_siringhe` varchar(90) NOT NULL,
  `lotto_rubinetti` varchar(90) NOT NULL,
  `data_raccolta` date NOT NULL,
  `data_congelamento` date NOT NULL,
  `data_monitoraggio1` date NOT NULL,
  `data_monitoraggio2` date NOT NULL,
  `data_monitoraggio3` date NOT NULL,
  `data_monitoraggio4` date NOT NULL,
  `cd34_micro_monitoraggio4` int(11) NOT NULL,
  `cd34_micro_monitoraggio3` int(11) NOT NULL,
  `cd34_micro_monitoraggio2` int(11) NOT NULL,
  `cd34_micro_monitoraggio1` int(11) NOT NULL,
  `cd34_perc_monitoraggio4` int(11) NOT NULL,
  `cd34_perc_monitoraggio3` int(11) NOT NULL,
  `cd34_perc_monitoraggio2` int(11) NOT NULL,
  `cd34_perc_monitoraggio1` int(11) NOT NULL,
  `wbc_monitoraggio4` int(11) NOT NULL,
  `wbc_monitoraggio3` int(11) NOT NULL,
  `wbc_monitoraggio2` int(11) NOT NULL,
  `wbc_monitoraggio1` int(11) NOT NULL,
  `cd34-depl-micro` int(11) NOT NULL,
  `cd34-post-micro` int(11) NOT NULL,
  `cd34-racc-micro` int(11) NOT NULL,
  `cd34-pre-micro` int(11) NOT NULL,
  `cd34-depl-perc` int(11) NOT NULL,
  `cd34-post-perc` int(11) NOT NULL,
  `cd34-racc-perc` int(11) NOT NULL,
  `cd34-micro-perc` int(11) NOT NULL,
  `wbc-depl` int(11) NOT NULL,
  `wbc-racc` int(11) NOT NULL,
  `lotto_cd34` int(11) NOT NULL,
  `lotto_sacche` int(11) NOT NULL,
  `lotto_antigamma` int(11) NOT NULL,
  `donazione` varchar(90) NOT NULL,
  `peso` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(99) NOT NULL,
  `pass` text NOT NULL,
  `other` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
