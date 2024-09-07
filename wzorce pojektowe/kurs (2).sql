-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Maj 2023, 20:39
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `kurs`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `answer`
--

CREATE TABLE `answer` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUser` int(11) NOT NULL,
  `value` tinyint(3) UNSIGNED NOT NULL,
  `DT` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `type` tinyint(1) NOT NULL,
  `ans1` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `ans2` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `ans3` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `correct` char(1) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `questions`
--
  
INSERT INTO `questions` (`id`, `title`, `type`, `ans1`, `ans2`, `ans3`, `correct`) VALUES
(1, 'Czy wzorce projektowe są zbiorem sprawdzonych rozwiązań w programowaniu?', 0, NULL, NULL, NULL, 'T'),
(2, 'Wzorzec projektowy Singleton:', 1, ' Zapewnia, że istnieje tylko jedna instancja klasy', 'Umożliwia komunikację między obiektami bezpośrednio', 'Ułatwia tworzenie hierarchii obiektów', 'A'),
(3, 'Wzorzec projektowy Factory Method:', 1, 'Pozwala na tworzenie obiektów bez ujawniania ich konkretnych klas', ' Umożliwia tworzenie wielu obiektów na podstawie jednej fabryki', 'Ułatwia tworzenie klas dziedziczących', 'A'),
(4, 'Czy wzorce projektowe są stosowane jedynie w językach programowania obiektowego?', 0, NULL, NULL, NULL, 'T'),
(5, 'Wzorzec projektowy Observer:', 1, 'Umożliwia dynamiczne przypisywanie odpowiedzialności do obiektów', 'Ułatwia tworzenie niezależnych modułów', 'Zapewnia powiadomienie obiektów o zmianach stanu innego obiektu', 'C'),
(6, 'Wzorzec projektowy Builder:', 1, 'Umożliwia dodawanie nowych funkcjonalności do istniejących obiektów', 'Zapewnia elastyczność w tworzeniu obiektów', 'Służy do kontrolowania dostępu do obiektów', 'A'),
(7, 'Czy stosowanie wzorców projektowych może przyczynić się do zwiększenia czytelności kodu i ułatwienia jego utrzymania?', 0, NULL, NULL, NULL, 'T'),
(8, 'Wzorzec projektowy Factory Method:', 1, 'Pozwala na tworzenie obiektów bez ujawniania ich konkretnych klas', ' Umożliwia tworzenie wielu obiektów na podstawie jednej fabryki', 'Ułatwia tworzenie klas dziedziczących', 'A'),
(9, 'Czy wzorce projektowe mogą być używane zarówno przez początkujących, jak i doświadczonych programistów?', 0, NULL, NULL, NULL, 'T'),
(10, 'Wzorzec projektowy Strategy:', 1, ' Umożliwia dynamiczne przypisywanie odpowiedzialności do obiektów', 'Ułatwia tworzenie niezależnych modułów', 'Pozwala na zamianę algorytmów w czasie działania programu', 'C');


-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `email` varchar(63) NOT NULL,
  `password` varchar(31) NOT NULL,
  `permission` varchar(7) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `permission`) VALUES
(1, 'user@wp.pl', 'test', 'user'),
(2, 'admin@wp.pl', 'test', 'admin');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_userId` (`idUser`);

--
-- Indeksy dla tabeli `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
