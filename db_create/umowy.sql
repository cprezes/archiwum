-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas generowania: 18 Maj 2017, 10:01
-- Wersja serwera: 10.1.14-MariaDB
-- Wersja PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `umowy`
--
CREATE DATABASE IF NOT EXISTS `umowy` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `umowy`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adnotacje`
--

DROP TABLE IF EXISTS `adnotacje`;
CREATE TABLE IF NOT EXISTS `adnotacje` (
  `id` int(11) unsigned NOT NULL,
  `id_umowy` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `adnotacje` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `uzytkownik_id` int(11) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rejestr_umow`
--

DROP TABLE IF EXISTS `rejestr_umow`;
CREATE TABLE IF NOT EXISTS `rejestr_umow` (
  `id` int(11) unsigned NOT NULL,
  `numer_kolejny_zapisu` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `data_rejestracji_zapisu` date DEFAULT NULL,
  `nazwa_nadawcy_adresata` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `numer_dokumentu_otrzymania` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `nazwa_dokumentu_lub_czego_dotyczy` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `uzytkownik_id` int(11) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `skan` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rejestr_wydanych`
--

DROP TABLE IF EXISTS `rejestr_wydanych`;
CREATE TABLE IF NOT EXISTS `rejestr_wydanych` (
  `id` int(11) unsigned NOT NULL,
  `id_umowy` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `komu_wydany_stanowisko` varchar(200) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `komu_wydany_data` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `komu_wydany_imie_i_nazwisko` varchar(200) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `zwrocony` varchar(3) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `uzytkownik_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rejestr_zwrotow`
--

DROP TABLE IF EXISTS `rejestr_zwrotow`;
CREATE TABLE IF NOT EXISTS `rejestr_zwrotow` (
  `id` int(11) unsigned NOT NULL,
  `id_wydania` int(11) DEFAULT NULL,
  `zwrot_data` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uzytkownik_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uwagi`
--

DROP TABLE IF EXISTS `uwagi`;
CREATE TABLE IF NOT EXISTS `uwagi` (
  `id` int(11) unsigned NOT NULL,
  `id_umowy` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `uwagi` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `uzytkownik_id` int(11) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

DROP TABLE IF EXISTS `uzytkownicy`;
CREATE TABLE IF NOT EXISTS `uzytkownicy` (
  `id` int(11) unsigned NOT NULL,
  `nazwa` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `uzytkownik` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `haslo` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `zapis` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `adnotacje`
--
ALTER TABLE `adnotacje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_uwagi` (`id_umowy`),
  ADD KEY `id_umowy` (`id_umowy`),
  ADD FULLTEXT KEY `adnotacje` (`adnotacje`);
ALTER TABLE `adnotacje`
  ADD FULLTEXT KEY `adnotacje_2` (`adnotacje`);

--
-- Indexes for table `rejestr_umow`
--
ALTER TABLE `rejestr_umow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `numer_kolejny_zapisu` (`numer_kolejny_zapisu`),
  ADD FULLTEXT KEY `numer_dokumentu_otrzymania` (`numer_dokumentu_otrzymania`);
ALTER TABLE `rejestr_umow`
  ADD FULLTEXT KEY `nazwa_dokumentu_lub_czego_dotyczy` (`nazwa_dokumentu_lub_czego_dotyczy`);
ALTER TABLE `rejestr_umow`
  ADD FULLTEXT KEY `nazwa_nadawcy_adresata` (`nazwa_nadawcy_adresata`);
ALTER TABLE `rejestr_umow`
  ADD FULLTEXT KEY `nazwa_nadawcy_adresata_2` (`nazwa_nadawcy_adresata`);
ALTER TABLE `rejestr_umow`
  ADD FULLTEXT KEY `numer_dokumentu_otrzymania_2` (`numer_dokumentu_otrzymania`);
ALTER TABLE `rejestr_umow`
  ADD FULLTEXT KEY `nazwa_dokumentu_lub_czego_doty_2` (`nazwa_dokumentu_lub_czego_dotyczy`);

--
-- Indexes for table `rejestr_wydanych`
--
ALTER TABLE `rejestr_wydanych`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejestr_zwrotow`
--
ALTER TABLE `rejestr_zwrotow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uwagi`
--
ALTER TABLE `uwagi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_umowy` (`id_umowy`),
  ADD FULLTEXT KEY `uwagi` (`uwagi`);
ALTER TABLE `uwagi`
  ADD FULLTEXT KEY `uwagi_2` (`uwagi`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `adnotacje`
--
ALTER TABLE `adnotacje`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `rejestr_umow`
--
ALTER TABLE `rejestr_umow`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `rejestr_zwrotow`
--
ALTER TABLE `rejestr_zwrotow`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `uwagi`
--
ALTER TABLE `uwagi`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
