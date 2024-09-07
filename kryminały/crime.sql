-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Lis 2020, 21:19
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `crime`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klient`
--

CREATE TABLE `klient` (
  `Idklienta` int(11) NOT NULL,
  `Imie` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `login` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `haslo` mediumtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klient`
--

INSERT INTO `klient` (`Idklienta`, `Imie`, `Nazwisko`, `login`, `haslo`) VALUES
(1, 'Patryk', 'Kopka', 'pkopka99', 'kopka1'),
(2, 'Michał', 'Świątczak', 'mswiatczak99', 'swiatczak1'),
(3, 'Michał', 'Świderski', 'mswiderski99', 'swiderski1'),
(4, 'Konrad', 'Zasada', 'kzasada99', 'zasada1'),
(5, 'Michał', 'Plebański', 'mplebanski99', 'plebanski1'),
(6, 'Kamil', 'Kujat', 'kkujat99', 'kujat1'),
(7, 'Bartek', 'Grzelak', 'bgrzelak99', 'grzelak1'),
(8, 'Jakub', 'Nawrocki', 'jnawrocki99', 'nawrocki1'),
(9, 'Jakub', 'Janowski', 'jjanowski99', 'janowski1'),
(10, 'Adam', 'Góral', 'agoral99', 'goral1'),
(11, 'Patryk', 'Wójcik', 'pwojcik99', 'wojcik1'),
(12, 'Bartek', 'Dziedzic', 'bdziedzic99', 'dziedzic1'),
(13, 'Patryk', 'Gawroński', 'pgawronski99', 'gawronski1'),
(14, 'Agnieszka', 'Klekot', 'admin', 'qwerty');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazka`
--

CREATE TABLE `ksiazka` (
  `Idksiazki` int(11) NOT NULL,
  `Tytul` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `RokWydania` int(4) NOT NULL,
  `Opis` longtext CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Cena` float NOT NULL,
  `Ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `ksiazka`
--

INSERT INTO `ksiazka` (`Idksiazki`, `Tytul`, `RokWydania`, `Opis`, `Cena`, `Ilosc`) VALUES
(1, 'Kontratyp', 2018, 'Ósmy z kolei tom serii o prawniczce z kancelarii Żelazny & McVay.Nieustraszona prawniczka podejmuje się karkołomnej wyprawy i wyrusza na Annapurnę w poszukiwaniu prawdy i dowodów, które mogłaby wykorzystać na sali sądowej podczas obrony swojej nowej klientki.', 27.93, 14),
(2, 'Kasacja', 2015, 'Pierwsze spotkanie z mecenas Joanną Chyłką wciągnie Cię bez reszty w świat intryg, przestępstw i zawiłych przepisów polskiego prawa. Wszystko to zostało zamknięte w spójną, zajmującą fabułę stworzoną przez mistrza polskiego kryminału.', 24.43, 6),
(3, 'Rewizja', 2016, 'W drugim tomie kryminalnej serii autorstwa Remigiusza Mroza Joanna Chyłka została wyrzucona z kancelarii Żelazny & McVay, co odbiło się negatywnie na jej kondycji psychicznej. ', 25.83, 10),
(4, 'Immunitet', 2016, 'Po obronie Roma w trzecim tomie serii autorstwa Remigiusza Mroza Joanna Chyłka nie wraca do pracy zawodowej i nie jest w stanie uwolnić się od swoich demonów. Pogrąża się w chorobie alkoholowej, ale jednak z czasem podejmuje nowe wyzwanie.', 25.83, 8),
(5, 'Inwigilacja', 2017, 'W piątym z kolei tomie serii o prawniczce. Tym razem książka nosi tytuł „Inwigilacja” i opowiada historię chłopaka, który oskarżony jest przez polskie władze o planowanie ataku terrorystycznego. W tej opowieści nic jednak nie jest takie, jak może Ci się z pozoru wydawać.', 27.93, 9),
(6, 'Oskarżenie', 2017, 'Szósty tom serii o Joannie Chyłce dotyczy sprawy dawnego działacza Solidarności, który przed laty został skazany jako winny brutalnej serii morderstw. Nawet prawniczka wydaje się być przekonana o tym, że policja rzeczywiście ujęła sprawcę. Będzie musiała jednak zrewidować swoje poglądy po nowych dowodach.', 27.93, 7),
(7, 'Ekspozycja', 2015, 'Termin \"ekspozycja\" ma przynajmniej pięć znaczeń. Podobnie wieloznaczny jest każdy krok mordercy.', 22.37, 8),
(8, 'Przewiesienie', 2016, 'Podhalem wstrząsa seria wypadków w górach. Początkowo czarna passa wydaje się jedynie ciągiem pechowych zdarzeń, jednak śledczy ostatecznie odkrywają związek między ofiarami. Każe on sądzić, że ktoś morduje turystów na szlakach. Dochodzenie prowadzi komisarz Forst.', 25.83, 10),
(9, 'Trawers', 2016, 'Grupa uchodźców miała zostać w Kościelisku tylko przez trzy dni. Wójt zakwaterował ich w sali gimnastycznej, czekając, aż rząd znajdzie dla nich stałe miejsce pobytu.  Wszystko zmieniło się, gdy przypadkowy turysta został odnaleziony martwy na szlaku prowadzącym na Czerwone Wierchy.', 25.83, 9),
(10, 'Deniwelacja', 2017, 'Gdzie jest Wiktor Forst?  To pytanie zadają sobie zakopiańscy śledczy, gdy topniejący w Tatrach śnieg odsłania makabryczny widok na zboczach Giewontu. Odnalezione zostają zwłoki grupy kobiet, których za życia nic ze sobą nie łączyło.', 27.93, 3),
(11, 'Zerwa', 2018, 'Ostatnia część pentalogii z Wiktorem Forstem!  Zbocza gór znów spłynęły krwią. W środku sezonu turystycznego na Rysach odnalezione zostają zwłoki starszego mężczyzny, a sposób działania sprawcy prowadzi wyłącznie do jednego wniosku: wrócił ten, którego wszyscy się obawiali.', 27.93, 12);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zakupy`
--

CREATE TABLE `zakupy` (
  `Idzakupu` int(11) NOT NULL,
  `Datazakupu` date NOT NULL,
  `Idklienta` int(11) NOT NULL,
  `Idksiazki` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `zakupy`
--

INSERT INTO `zakupy` (`Idzakupu`, `Datazakupu`, `Idklienta`, `Idksiazki`) VALUES
(1, '2019-01-12', 1, 5),
(2, '2019-01-23', 2, 3),
(3, '2019-01-05', 9, 3),
(4, '2019-01-23', 8, 4),
(5, '2019-01-07', 3, 6),
(6, '2019-01-06', 4, 8),
(7, '2019-01-20', 5, 9),
(8, '2019-01-03', 6, 8),
(9, '2019-01-04', 7, 14),
(10, '2019-01-14', 10, 7),
(11, '2019-01-12', 11, 5),
(12, '2019-01-15', 12, 9),
(13, '2019-01-21', 13, 3);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`Idklienta`);

--
-- Indeksy dla tabeli `ksiazka`
--
ALTER TABLE `ksiazka`
  ADD PRIMARY KEY (`Idksiazki`);

--
-- Indeksy dla tabeli `zakupy`
--
ALTER TABLE `zakupy`
  ADD PRIMARY KEY (`Idzakupu`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `klient`
--
ALTER TABLE `klient`
  MODIFY `Idklienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `ksiazka`
--
ALTER TABLE `ksiazka`
  MODIFY `Idksiazki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `zakupy`
--
ALTER TABLE `zakupy`
  MODIFY `Idzakupu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
