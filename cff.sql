-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: ian. 21, 2021 la 11:05 AM
-- Versiune server: 10.4.14-MariaDB
-- Versiune PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `cff`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `actori`
--

CREATE TABLE `actori` (
  `ID_actor` int(10) NOT NULL,
  `Nume` varchar(20) NOT NULL,
  `Prenume` varchar(20) NOT NULL,
  `Data_nasterii` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `actori`
--

INSERT INTO `actori` (`ID_actor`, `Nume`, `Prenume`, `Data_nasterii`) VALUES
(1, 'Ziering', 'Ian', '1964-03-30'),
(2, 'Hanks', 'Tom', '1956-07-09'),
(3, 'Bloom', 'Orlando', '1977-01-13'),
(4, 'Robbins', 'Tim', '1958-10-16'),
(5, 'Hoel', 'Vegar', '1973-11-15');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `actori_filme`
--

CREATE TABLE `actori_filme` (
  `ID_film` int(10) NOT NULL,
  `ID_actor` int(10) NOT NULL,
  `Personaj_jucat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `actori_filme`
--

INSERT INTO `actori_filme` (`ID_film`, `ID_actor`, `Personaj_jucat`) VALUES
(1, 1, 'Fin Shepard'),
(2, 2, 'Forest Gump'),
(3, 3, 'Legolas'),
(4, 5, 'Martin'),
(5, 4, 'Andy Dufresne'),
(6, 2, 'Josh');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `filme`
--

CREATE TABLE `filme` (
  `ID_film` int(11) NOT NULL,
  `Nume` varchar(100) NOT NULL,
  `Descriere` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `filme`
--

INSERT INTO `filme` (`ID_film`, `Nume`, `Descriere`) VALUES
(1, 'Sharknado', 'When a freak hurricane swamps Los Angeles, nature\'s deadliest killer rules sea, land, and air as thousands of sharks terrorize the waterlogged populace.'),
(2, 'Forrest Gump', 'The presidencies of Kennedy and Johnson, the events of Vietnam, Watergate and other historical events unfold through the perspective of an Alabama man with an IQ of 75, whose only desire is to be reunited with his childhood sweetheart.'),
(3, 'The Lord of the Rings: The Two Towers', 'While Frodo and Sam edge closer to Mordor with the help of the shifty Gollum, the divided fellowship makes a stand against Sauron\'s new ally, Saruman, and his hordes of Isengard.'),
(4, 'Dead Snow', 'A ski vacation turns horrific for a group of medical students, as they find themselves confronted by an unimaginable menace: Nazi zombies.'),
(5, 'The ShawShank Redemption', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.'),
(6, 'Big', 'After wishing to be made big, a teenage boy wakes the next morning to find himself mysteriously in the body of an adult.');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `premii`
--

CREATE TABLE `premii` (
  `ID_film` int(11) NOT NULL,
  `Nume_premiu` varchar(100) NOT NULL,
  `An_decernare` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `premii`
--

INSERT INTO `premii` (`ID_film`, `Nume_premiu`, `An_decernare`) VALUES
(2, 'Bafta', 2007),
(2, 'Cannes', 2010),
(2, 'Oscar', 2011),
(3, 'Oscar', 2009),
(5, 'Cannes', 2015);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `recenzie`
--

CREATE TABLE `recenzie` (
  `ID_film` int(10) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `Nota` int(10) NOT NULL DEFAULT 5,
  `Comentariu` varchar(255) NOT NULL DEFAULT 'Nicio recenzie primita pana acum.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `recenzie`
--

INSERT INTO `recenzie` (`ID_film`, `Mail`, `Nota`, `Comentariu`) VALUES
(1, 'andrei.mihaila@gmail.com', 3, 'Un film slab de duzina'),
(1, 'robert.velea@gmail.com', 6, 'Decent'),
(1, 'tiberiu.gingu@upb.ro', 10, 'Super film multi rechini'),
(2, 'robert.velea@gmail.com', 9, 'O poveste de neuitat'),
(3, 'tiberiu.gingu@upb.ro', 9, 'Nu mi-a placut cand au aruncat inelul'),
(4, 'udrea.lorena@yahoo.com', 6, 'Slabut, ok de vazut in weekend'),
(5, 'tiberiu.gingu@upb.ro', 10, 'O adevarata alegorie a vietii'),
(5, 'udrea.lorena@yahoo.com', 9, 'Chimia personajelor m-a dat pe spate'),
(6, 'tiberiu.gingu@upb.ro', 8, 'Frumos');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `utilizatori`
--

CREATE TABLE `utilizatori` (
  `Mail` varchar(100) NOT NULL,
  `Parola` varchar(100) NOT NULL,
  `Nume` varchar(100) NOT NULL,
  `Prenume` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `utilizatori`
--

INSERT INTO `utilizatori` (`Mail`, `Parola`, `Nume`, `Prenume`) VALUES
('andrei.mihaila@gmail.com', 'parola1', 'Andrei', 'Mihaila'),
('prezentare.prezenta@test.com', 'parola', 'Test_nume', 'Test_prenume'),
('robert.velea@gmail.com', 'parola567', 'Velea', 'Robert'),
('test@tempmail.com', '12345', 'GoGo', 'Duck'),
('tiberiu.gingu@upb.ro', 'adwad', 'Tiberiu', 'Gingu'),
('udrea.lorena@yahoo.com', 'parola234', 'Udrea', 'Lorena');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `actori`
--
ALTER TABLE `actori`
  ADD PRIMARY KEY (`ID_actor`);

--
-- Indexuri pentru tabele `actori_filme`
--
ALTER TABLE `actori_filme`
  ADD PRIMARY KEY (`ID_film`,`ID_actor`),
  ADD KEY `ID_actor` (`ID_actor`);

--
-- Indexuri pentru tabele `filme`
--
ALTER TABLE `filme`
  ADD PRIMARY KEY (`ID_film`),
  ADD KEY `ID_film` (`ID_film`),
  ADD KEY `ID_film_2` (`ID_film`);

--
-- Indexuri pentru tabele `premii`
--
ALTER TABLE `premii`
  ADD PRIMARY KEY (`ID_film`,`Nume_premiu`);

--
-- Indexuri pentru tabele `recenzie`
--
ALTER TABLE `recenzie`
  ADD PRIMARY KEY (`ID_film`,`Mail`),
  ADD KEY `Mail` (`Mail`);

--
-- Indexuri pentru tabele `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`Mail`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `actori`
--
ALTER TABLE `actori`
  MODIFY `ID_actor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `filme`
--
ALTER TABLE `filme`
  MODIFY `ID_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `actori_filme`
--
ALTER TABLE `actori_filme`
  ADD CONSTRAINT `actori_filme_ibfk_1` FOREIGN KEY (`ID_actor`) REFERENCES `actori` (`ID_actor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actori_filme_ibfk_2` FOREIGN KEY (`ID_film`) REFERENCES `filme` (`ID_film`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `premii`
--
ALTER TABLE `premii`
  ADD CONSTRAINT `premii_ibfk_1` FOREIGN KEY (`ID_film`) REFERENCES `filme` (`ID_film`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `recenzie`
--
ALTER TABLE `recenzie`
  ADD CONSTRAINT `recenzie_ibfk_1` FOREIGN KEY (`ID_film`) REFERENCES `filme` (`ID_film`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recenzie_ibfk_2` FOREIGN KEY (`Mail`) REFERENCES `utilizatori` (`Mail`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
