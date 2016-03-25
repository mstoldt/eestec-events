-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 26. Mrz 2016 um 00:52
-- Server-Version: 10.1.10-MariaDB
-- PHP-Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `eestec_events`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `LCs`
--

CREATE TABLE `LCs` (
  `id` int(10) UNSIGNED NOT NULL,
  `city` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `LCs`
--

INSERT INTO `LCs` (`id`, `city`, `password`, `email`) VALUES
(1, 'Patras', '1234', 'patras@eestec.net'),
(2, 'Hamburg', '1234', 'hamburg@eestec.net'),
(3, 'Athens', '', ''),
(4, 'Krakow', '', '');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `LCs`
--
ALTER TABLE `LCs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `LCs`
--
ALTER TABLE `LCs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
