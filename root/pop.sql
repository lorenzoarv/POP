-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 27 okt 2016 om 09:31
-- Serverversie: 5.6.13
-- PHP-versie: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `pop`
--
CREATE DATABASE IF NOT EXISTS `pop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pop`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE IF NOT EXISTS `gebruikers` (
  `gebruiker_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(50) NOT NULL,
  `tussenvoegsel` varchar(20) DEFAULT NULL,
  `achternaam` varchar(80) NOT NULL,
  `geboortedatum` date DEFAULT NULL,
  `gebruiker` varchar(10) NOT NULL COMMENT 'afkorting (bij een mentor) / leerlingnr (van leerling)',
  `wachtwoord` varchar(100) NOT NULL,
  `isMentor` int(1) unsigned DEFAULT NULL COMMENT '1 = mentor / NULL = geen mentor',
  `isLeerling` int(1) unsigned DEFAULT NULL COMMENT '1 = leerling / NULL = geen leerling',
  `isAdmin` int(1) unsigned DEFAULT NULL COMMENT '1 = admin / NULL = geen admin',
  `actief` int(1) unsigned DEFAULT '1' COMMENT '1 = actief en kan inloggen / NULL = inactief kan niet inloggen',
  `mentor` int(11) unsigned DEFAULT NULL COMMENT 'Verwijzing naar een gebruiker_id (die mentor is)',
  PRIMARY KEY (`gebruiker_id`),
  UNIQUE KEY `gebruiker` (`gebruiker`),
  KEY `mentor_van` (`mentor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='In deze tabel staan leerlingen, mentoren en administrators' AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`gebruiker_id`, `voornaam`, `tussenvoegsel`, `achternaam`, `geboortedatum`, `gebruiker`, `wachtwoord`, `isMentor`, `isLeerling`, `isAdmin`, `actief`, `mentor`) VALUES
(1, 'admin', NULL, 'admin', NULL, 'admin', 'admin', NULL, NULL, 1, 1, NULL),
(2, 'Piet', NULL, 'Puk', '2000-10-25', '34567', 'klaas31', NULL, 1, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `invoer`
--

CREATE TABLE IF NOT EXISTS `invoer` (
  `invoer_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gebruiker_id` int(11) unsigned NOT NULL,
  `pop_id` int(11) unsigned NOT NULL,
  `datum` date NOT NULL COMMENT 'Datum invoer vragenlijst',
  PRIMARY KEY (`invoer_id`),
  KEY `FK_invoer_gebruikers` (`gebruiker_id`),
  KEY `FK_invoer_pop` (`pop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pop`
--

CREATE TABLE IF NOT EXISTS `pop` (
  `pop_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hobbys` varchar(255) DEFAULT NULL,
  `hobbys_tijdsduur` int(2) unsigned DEFAULT NULL COMMENT 'Tijdsduur in uren (gehele uren)',
  `werk` varchar(255) DEFAULT NULL,
  `werk_tijdsduur` int(2) unsigned DEFAULT NULL COMMENT 'Tijdsduur in uren (gehele uren)',
  `vrienden` varchar(255) DEFAULT NULL,
  `huiswerktijd` int(2) unsigned DEFAULT NULL COMMENT 'Tijdsduur huiswerk per week',
  `vorig_schooljaar` varchar(255) DEFAULT NULL COMMENT 'Beschrijf in drie zinnen hoe vorig schooljaar is verlopen',
  `notities` text COMMENT 'Notitie van de mentor bij een vragenlijst',
  PRIMARY KEY (`pop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vakken`
--

CREATE TABLE IF NOT EXISTS `vakken` (
  `vak_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `vak` varchar(50) NOT NULL COMMENT 'Volledige naam van het vak',
  `afkorting` varchar(4) NOT NULL COMMENT 'Afkorting van het vak',
  PRIMARY KEY (`vak_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Gegevens worden uitgevoerd voor tabel `vakken`
--

INSERT INTO `vakken` (`vak_id`, `vak`, `afkorting`) VALUES
(1, 'Nederlands', 'ne'),
(2, 'Engels', 'en'),
(3, 'Duits', 'du'),
(4, 'Frans', 'fa'),
(5, 'Wiskunde', 'wi'),
(6, 'Natuurkunde', 'na'),
(7, 'Scheikunde', 'sk'),
(8, 'Biologie', 'bi'),
(9, 'Maatschappijleer', 'ma'),
(10, 'Aarderijkskunde', 'ak'),
(11, 'Geschiedenis', 'gs'),
(12, 'Tekenen', 'te'),
(13, 'BSM', 'bsm'),
(14, 'Informatica', 'in');

--
-- Beperkingen voor gedumpte tabellen
--

--
-- Beperkingen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD CONSTRAINT `mentor_van` FOREIGN KEY (`mentor`) REFERENCES `gebruikers` (`gebruiker_id`);

--
-- Beperkingen voor tabel `invoer`
--
ALTER TABLE `invoer`
  ADD CONSTRAINT `FK_invoer_gebruikers` FOREIGN KEY (`gebruiker_id`) REFERENCES `gebruikers` (`gebruiker_id`),
  ADD CONSTRAINT `FK_invoer_pop` FOREIGN KEY (`pop_id`) REFERENCES `pop` (`pop_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
