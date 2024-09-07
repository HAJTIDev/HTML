-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 28, 2024 at 11:27 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportowcy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dyscyplina`
--

CREATE TABLE `dyscyplina` (
  `id` int(11) NOT NULL,
  `nazwa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dyscyplina`
--

INSERT INTO `dyscyplina` (`id`, `nazwa`) VALUES
(1, 'bieg na 100 m'),
(2, 'skok w dal'),
(3, 'rzut oszczepem'),
(4, 'bieg na 200 m');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sportowiec`
--

CREATE TABLE `sportowiec` (
  `id` int(10) UNSIGNED NOT NULL,
  `imie` text DEFAULT NULL,
  `nazwisko` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sportowiec`
--

INSERT INTO `sportowiec` (`id`, `imie`, `nazwisko`) VALUES
(1, 'Anna', 'Kowalska'),
(2, 'Monika', 'Nowak'),
(3, 'Ewelina', 'Nowakowska'),
(4, 'Janina', 'Przybylska'),
(5, 'Maria', 'Kowal'),
(6, 'Ewa', 'Nowacka'),
(7, 'Jan', 'Nowak'),
(8, 'Grzegorz', 'Kowalski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wyniki`
--

CREATE TABLE `wyniki` (
  `id` int(10) UNSIGNED NOT NULL,
  `dyscyplina_id` int(10) UNSIGNED NOT NULL,
  `sportowiec_id` int(10) UNSIGNED NOT NULL,
  `wynik` decimal(5,2) DEFAULT NULL,
  `dataUstanowienia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wyniki`
--

INSERT INTO `wyniki` (`id`, `dyscyplina_id`, `sportowiec_id`, `wynik`, `dataUstanowienia`) VALUES
(1, 1, 1, 12.40, '2015-10-14'),
(2, 1, 1, 12.00, '2015-10-06'),
(3, 1, 2, 11.80, '2015-10-14'),
(4, 1, 2, 11.90, '2015-10-06'),
(5, 1, 3, 11.54, '2015-10-14'),
(6, 1, 3, 11.75, '2015-10-06'),
(7, 1, 4, 11.70, '2015-10-14'),
(8, 1, 4, 11.67, '2015-10-06'),
(9, 1, 5, 11.30, '2015-10-14'),
(10, 1, 5, 11.52, '2015-10-06'),
(11, 1, 6, 12.10, '2015-10-14'),
(12, 1, 6, 12.00, '2015-10-06'),
(13, 3, 1, 63.00, '2015-11-11'),
(14, 3, 1, 63.60, '2015-10-13'),
(15, 3, 2, 64.00, '2015-11-11'),
(16, 3, 2, 63.60, '2015-10-13'),
(17, 3, 3, 60.00, '2015-11-11'),
(18, 3, 3, 61.60, '2015-10-13'),
(19, 3, 4, 63.50, '2015-11-11'),
(20, 3, 4, 63.60, '2015-10-13'),
(21, 3, 5, 70.00, '2015-10-07'),
(22, 3, 6, 68.00, '2015-10-07');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dyscyplina`
--
ALTER TABLE `dyscyplina`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `sportowiec`
--
ALTER TABLE `sportowiec`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wyniki`
--
ALTER TABLE `wyniki`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sportowiec`
--
ALTER TABLE `sportowiec`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wyniki`
--
ALTER TABLE `wyniki`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
