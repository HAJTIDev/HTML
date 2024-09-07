-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Lut 2023, 14:37
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `kindergarten`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `child`
--

CREATE TABLE `child` (
  `id_child` int(10) NOT NULL,
  `name` varchar(23) NOT NULL,
  `surname` varchar(23) NOT NULL,
  `idgroup` int(10) NOT NULL,
  `birthday` date NOT NULL,
  `payment` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `child`
--

INSERT INTO `child` (`id_child`, `name`, `surname`, `idgroup`, `birthday`, `payment`) VALUES
(1, 'Sara', 'Turner', 1, '2019-06-12', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `child_in_classes`
--

CREATE TABLE `child_in_classes` (
  `idclasses` int(10) NOT NULL,
  `idchild` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `child_in_classes`
--

INSERT INTO `child_in_classes` (`idclasses`, `idchild`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `classes`
--

CREATE TABLE `classes` (
  `id_classes` int(10) NOT NULL,
  `type` varchar(23) NOT NULL,
  `idteacher` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `classes`
--

INSERT INTO `classes` (`id_classes`, `type`, `idteacher`) VALUES
(1, 'German', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `groups`
--

CREATE TABLE `groups` (
  `id_group` int(10) NOT NULL,
  `idteacher` int(10) NOT NULL,
  `symbol` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `groups`
--

INSERT INTO `groups` (`id_group`, `idteacher`, `symbol`) VALUES
(1, 1, 'Flowers');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teacher`
--

CREATE TABLE `teacher` (
  `id_teacher` int(10) NOT NULL,
  `name` varchar(23) NOT NULL,
  `surname` varchar(23) NOT NULL,
  `iduser` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `teacher`
--

INSERT INTO `teacher` (`id_teacher`, `name`, `surname`, `iduser`) VALUES
(1, 'Alisha', 'Francis', 1),
(2, 'Rhys', 'Marsh', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `permission` varchar(7) NOT NULL DEFAULT 'teacher',
  `email` varchar(63) NOT NULL,
  `password` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id_user`, `permission`, `email`, `password`) VALUES
(1, 'teacher', 'aalishafrancis@aa.bb', 'test1'),
(2, 'teacher', 'rhysmarsh94@bb.aa', 'testr');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`id_child`),
  ADD KEY `idgroup` (`idgroup`);

--
-- Indeksy dla tabeli `child_in_classes`
--
ALTER TABLE `child_in_classes`
  ADD KEY `idchild` (`idchild`),
  ADD KEY `idclasses` (`idclasses`);

--
-- Indeksy dla tabeli `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id_classes`),
  ADD KEY `idteacher` (`idteacher`);

--
-- Indeksy dla tabeli `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id_group`),
  ADD KEY `idteacher` (`idteacher`);

--
-- Indeksy dla tabeli `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id_teacher`),
  ADD KEY `iduser` (`iduser`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `child`
--
ALTER TABLE `child`
  MODIFY `id_child` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `classes`
--
ALTER TABLE `classes`
  MODIFY `id_classes` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `groups`
--
ALTER TABLE `groups`
  MODIFY `id_group` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id_teacher` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `child`
--
ALTER TABLE `child`
  ADD CONSTRAINT `child_ibfk_1` FOREIGN KEY (`idgroup`) REFERENCES `groups` (`id_group`);

--
-- Ograniczenia dla tabeli `child_in_classes`
--
ALTER TABLE `child_in_classes`
  ADD CONSTRAINT `child_in_classes_ibfk_1` FOREIGN KEY (`idchild`) REFERENCES `child` (`id_child`),
  ADD CONSTRAINT `child_in_classes_ibfk_2` FOREIGN KEY (`idclasses`) REFERENCES `classes` (`id_classes`);

--
-- Ograniczenia dla tabeli `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`idteacher`) REFERENCES `teacher` (`id_teacher`);

--
-- Ograniczenia dla tabeli `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`idteacher`) REFERENCES `teacher` (`id_teacher`);

--
-- Ograniczenia dla tabeli `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
