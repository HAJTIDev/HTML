-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Cze 2022, 20:13
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Baza danych: `szkola`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klasa`
--

CREATE TABLE `klasa` (
  `id` int(11) NOT NULL DEFAULT 0,
  `nazwa` varchar(2) CHARACTER SET utf8 NOT NULL,
  `il_uczniow` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klasa`
--

INSERT INTO `klasa` (`id`, `nazwa`, `il_uczniow`) VALUES
(1, '1a', 28),
(2, '1b', 30),
(3, '2a', 25),
(4, '2b', 29);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uczen`
--

CREATE TABLE `uczen` (
  `id` int(2) NOT NULL DEFAULT 0,
  `nazwisko` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `imie` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `miejsce_urodzenia` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `id_klasy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uczen`
--

INSERT INTO `uczen` (`id`, `nazwisko`, `imie`, `miejsce_urodzenia`, `id_klasy`) VALUES
(1, 'Kluska', 'Zenon', 'Wrocław', 1),
(2, 'Zawada', 'Zbigniew', 'Oleśnica', 1),
(3, 'Cap', 'Antoni', 'Trzebnica', 2),
(4, 'Kowalski', 'Sebastian', 'Wrocław', 3),
(5, 'Dawid', 'Andrzej', 'Trzebnica', 2),
(6, 'Kaczmarek', 'Marta', 'Oleśnica', 4),
(7, 'Kowalski', 'Jan', 'Wrocław', 4),
(8, 'Polak', 'Maria', 'Trzebnica', 2),
(9, 'Michalak', 'Paweł', 'Oleśnica', 3),
(10, 'Góral', 'Łukasz', 'Trzebnica', 4),
(11, 'Nowak', 'Jan', 'Oleśnica', 4),
(12, 'Kowalski', 'Łukasz', 'Wrocław', 1),
(13, 'Markiewicz', 'Damian', 'Wrocław', 3),
(14, 'Baryła', 'Zenon', 'Oława', 2),
(15, 'Gota', 'Anna', 'Oleśnica', 4),
(16, 'Małek', 'Justyna', 'Wrocław', 1),
(17, 'Rysik', 'Magda', 'Oława', 3),
(18, 'Szary', 'Tomasz', 'Trzebnica', 1),
(19, 'Bury', 'Łukasz', 'Oława', 3),
(20, 'Rudy', 'Wojciech', 'Wrocław', 2),
(21, 'Kowalska', 'Janina', 'Oława', 2),
(22, 'Nowak', 'Jan', 'Wrocław', 1),
(23, 'Kowalik', 'Stanisława', 'Oława', 3),
(24, 'Nowakowski', 'Grzegorz', 'Oleśnica', 1),
(25, 'Kwiatkowska', 'Jolanta', 'Oława', 2),
(26, 'Konarski', 'Krzysztof', 'Oława', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wychowawca`
--

CREATE TABLE `wychowawca` (
  `id` int(11) NOT NULL DEFAULT 0,
  `imie` varchar(20) CHARACTER SET utf8 NOT NULL,
  `nazwisko` varchar(30) CHARACTER SET utf8 NOT NULL,
  `id_klasy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wychowawca`
--

INSERT INTO `wychowawca` (`id`, `imie`, `nazwisko`, `id_klasy`) VALUES
(1, 'Jan', 'Bogucki', 1),
(2, 'Michał', 'Więcek', 2),
(3, 'Bożena', 'Michalska', 3),
(4, 'Krystyna', 'Piętkiewicz', 4),
(5, 'Maciej', 'Stasiak', 5);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klasa`
--
ALTER TABLE `klasa`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uczen`
--
ALTER TABLE `uczen`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wychowawca`
--
ALTER TABLE `wychowawca`
  ADD PRIMARY KEY (`id`);
COMMIT;
