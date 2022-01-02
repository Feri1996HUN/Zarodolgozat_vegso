-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2022 at 04:53 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--
CREATE DATABASE IF NOT EXISTS `webshop` DEFAULT CHARACTER SET utf16 COLLATE utf16_hungarian_ci;
USE `webshop`;

-- --------------------------------------------------------

--
-- Table structure for table `kategoriak`
--

CREATE TABLE `kategoriak` (
  `ID_kategoria` int(11) NOT NULL,
  `kategoria` varchar(15) COLLATE utf16_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_hungarian_ci;

--
-- Dumping data for table `kategoriak`
--

INSERT INTO `kategoriak` (`ID_kategoria`, `kategoria`) VALUES
(2, 'Minőségi italok'),
(1, 'Sörök'),
(3, 'Üditők');

-- --------------------------------------------------------

--
-- Table structure for table `mennyisegiegyseg`
--

CREATE TABLE `mennyisegiegyseg` (
  `ID_Me` int(11) NOT NULL,
  `Nev` varchar(10) COLLATE utf16_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_hungarian_ci;

--
-- Dumping data for table `mennyisegiegyseg`
--

INSERT INTO `mennyisegiegyseg` (`ID_Me`, `Nev`) VALUES
(2, 'DB'),
(1, 'Liter');

-- --------------------------------------------------------

--
-- Table structure for table `rendeles`
--

CREATE TABLE `rendeles` (
  `ID_rendeles` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_termek` int(11) NOT NULL,
  `Mennyiseg` int(11) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_hungarian_ci;

--
-- Dumping data for table `rendeles`
--

INSERT INTO `rendeles` (`ID_rendeles`, `ID_user`, `ID_termek`, `Mennyiseg`, `datum`) VALUES
(4, 3, 40, 52, '2021-12-16 18:18:28'),
(6, 3, 47, 2, '2021-12-16 18:18:28'),
(7, 3, 48, 3, '2021-12-16 18:18:28'),
(8, 4, 37, 24, '2021-12-16 18:18:28'),
(9, 4, 38, 12, '2021-12-16 18:18:28'),
(10, 5, 45, 2, '2021-12-16 18:18:28'),
(11, 5, 42, 4, '2021-12-16 18:18:28'),
(12, 5, 40, 1, '2021-12-16 18:18:28'),
(13, 5, 41, 1, '2021-12-16 18:18:28'),
(14, 1, 36, 48, '2021-12-16 18:18:28'),
(15, 3, 51, 40, '2021-12-16 18:18:28'),
(22, 1, 39, 12, '2021-12-16 18:18:28'),
(23, 3, 38, 48, '2021-12-16 18:18:28'),
(24, 1, 35, 12, '2021-12-16 18:18:28'),
(41, 1, 40, 2, '2021-12-16 18:18:28'),
(42, 3, 50, 40, '2021-12-16 18:18:28'),
(47, 1, 39, 10, '2021-12-16 18:27:53'),
(49, 6, 36, 18, '2021-12-16 18:43:33'),
(50, 6, 37, 14, '2021-12-16 18:43:33'),
(53, 6, 50, 7, '2021-12-16 18:43:33'),
(55, 3, 51, 9, '2021-12-16 18:47:24'),
(56, 3, 37, 19, '2021-12-16 18:47:49'),
(57, 3, 38, 8, '2021-12-16 18:47:49'),
(58, 6, 35, 10, '2021-12-16 18:59:26'),
(59, 6, 42, 2, '2021-12-16 19:01:48'),
(60, 6, 43, 1, '2021-12-16 19:01:48'),
(61, 6, 38, 5, '2021-12-16 19:01:48'),
(62, 6, 39, 2, '2021-12-16 19:01:48'),
(63, 1, 42, 4, '2021-12-21 17:00:20'),
(64, 6, 35, 1, '2021-12-21 18:05:04'),
(65, 6, 39, 2, '2021-12-21 18:05:04'),
(66, 7, 37, 2, '2021-12-21 18:25:31'),
(67, 7, 44, 3, '2021-12-21 18:31:16'),
(68, 7, 46, 1, '2021-12-21 18:31:16'),
(69, 7, 35, 5, '2021-12-21 18:31:16'),
(70, 1, 37, 6, '2022-01-02 15:41:48'),
(71, 1, 50, 2, '2022-01-02 15:41:48'),
(72, 1, 39, 2, '2022-01-02 15:52:02');

-- --------------------------------------------------------

--
-- Table structure for table `termekek`
--

CREATE TABLE `termekek` (
  `ID_termek` int(11) NOT NULL,
  `Nev` varchar(30) COLLATE utf16_hungarian_ci NOT NULL,
  `Mennyiseg` float NOT NULL,
  `ID_Me` int(11) NOT NULL,
  `Eladar` int(10) NOT NULL,
  `Kep` varchar(100) COLLATE utf16_hungarian_ci NOT NULL,
  `ID_kategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_hungarian_ci;

--
-- Dumping data for table `termekek`
--

INSERT INTO `termekek` (`ID_termek`, `Nev`, `Mennyiseg`, `ID_Me`, `Eladar`, `Kep`, `ID_kategoria`) VALUES
(35, 'Coca Cola', 0, 2, 150, 'kepek/cocacolameretezve.jpg', 3),
(36, 'Dobozos Borsodi sör', 0, 2, 288, 'kepek/dobborsmeretezve.jpg', 1),
(37, 'Dobozos Kőbányai sör', 0, 2, 215, 'kepek/dobkobmeretezve.jpg', 1),
(38, 'Dobozos Soproni sör', 0, 2, 230, 'kepek/dobsopmeretezve.jpg', 1),
(39, 'Fanta', 0, 2, 211, 'kepek/fantameretezve.jpg', 3),
(40, 'Finlandia vodka', 0, 1, 2550, 'kepek/finlandiameretezve.jpg', 2),
(41, 'Grants whiskey', 0, 1, 3890, 'kepek/grantsmeretezve.jpg', 2),
(42, 'Jack Daniels whiskey 0,5', 0, 1, 3650, 'kepek/jack05meretezve.jpg', 2),
(43, 'Jack Daniels whiskey 0,7', 0, 1, 4200, 'kepek/jack07meretezve.jpg', 2),
(44, 'Jameson whiskey', 0, 1, 3100, 'kepek/jamesonmeretezve.jpg', 2),
(45, 'Jim Beam whiskey 1,0', 1, 1, 5235, 'kepek/jim1meretezve.jpg', 2),
(46, 'Jim Beam whiskey 0,7', 0, 1, 4750, 'kepek/jim07meretezve.jpg', 2),
(47, 'Kaiser vodka', 1, 1, 3989, 'kepek/kaisermeretezve.jpg', 2),
(48, 'Royal vodka', 0, 1, 2365, 'kepek/royalvodkameretezve.jpg', 2),
(49, 'Borsodi sör üveg', 0, 2, 185, 'kepek/uvegborsmretezve.jpg', 1),
(50, 'Kőbányai sör üveg', 0, 2, 180, 'kepek/uvegkobmeretezve.jpg', 1),
(51, 'Soproni sör üveg', 0, 2, 190, 'kepek/uvegsopmeretezve.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID_user` int(11) NOT NULL,
  `Nev` varchar(50) COLLATE utf16_hungarian_ci NOT NULL,
  `Jelszo` varchar(20) COLLATE utf16_hungarian_ci NOT NULL,
  `Iranyitoszam` varchar(4) COLLATE utf16_hungarian_ci NOT NULL,
  `Utca` varchar(30) COLLATE utf16_hungarian_ci NOT NULL,
  `Hazszam` varchar(10) COLLATE utf16_hungarian_ci NOT NULL,
  `Emelet` varchar(2) COLLATE utf16_hungarian_ci NOT NULL,
  `Ajto` varchar(2) COLLATE utf16_hungarian_ci NOT NULL,
  `Email` varchar(30) COLLATE utf16_hungarian_ci NOT NULL,
  `Telefon` varchar(15) COLLATE utf16_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_hungarian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID_user`, `Nev`, `Jelszo`, `Iranyitoszam`, `Utca`, `Hazszam`, `Emelet`, `Ajto`, `Email`, `Telefon`) VALUES
(1, 'Kiss Károly', '123456', '4029', 'Karcagi utca', '65', '', '', 'karcsi154@valami.hu', '+3698751122'),
(2, 'Nagy Péter', '123456', '4050', 'Tölgyfa utca', '21', '', '', '123nagyp@googlemail.com', '+3620817788'),
(3, 'Harc András', '123456', '4011', 'Petőfi utca', '4', '2', '28', 'harcos@harc.com', '+3611112222'),
(4, 'Kiss Zsófi', '123456', '4027', 'Fa utca', '77', '8', '1', 'email@nincsmail.com', '+3699887766'),
(5, 'Pap József', '123456', '4011', 'Tető utca', '56', '4', '4', 'papp@papok.com', '+3666554411'),
(6, 'Második Géza', '123456', '4058', 'Sip', '23', '', '', 'nem@letezo@gmail.com', '+3690254145'),
(7, 'kukucska géza', 'afrancba', '4050', 'Piros', '7', '', '', 'nem@letezo@gmail.com', '48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategoriak`
--
ALTER TABLE `kategoriak`
  ADD PRIMARY KEY (`ID_kategoria`),
  ADD UNIQUE KEY `idx_kategoria` (`kategoria`);

--
-- Indexes for table `mennyisegiegyseg`
--
ALTER TABLE `mennyisegiegyseg`
  ADD PRIMARY KEY (`ID_Me`),
  ADD UNIQUE KEY `idx_nev` (`Nev`);

--
-- Indexes for table `rendeles`
--
ALTER TABLE `rendeles`
  ADD PRIMARY KEY (`ID_rendeles`),
  ADD KEY `idx_user` (`ID_user`),
  ADD KEY `idx_termek` (`ID_termek`);

--
-- Indexes for table `termekek`
--
ALTER TABLE `termekek`
  ADD PRIMARY KEY (`ID_termek`),
  ADD UNIQUE KEY `idx_termeknev` (`Nev`),
  ADD KEY `idx_Me` (`ID_Me`),
  ADD KEY `idx_Kep` (`Kep`),
  ADD KEY `idx_kat` (`ID_kategoria`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_user`),
  ADD UNIQUE KEY `idx_nev` (`Nev`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategoriak`
--
ALTER TABLE `kategoriak`
  MODIFY `ID_kategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mennyisegiegyseg`
--
ALTER TABLE `mennyisegiegyseg`
  MODIFY `ID_Me` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rendeles`
--
ALTER TABLE `rendeles`
  MODIFY `ID_rendeles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `termekek`
--
ALTER TABLE `termekek`
  MODIFY `ID_termek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rendeles`
--
ALTER TABLE `rendeles`
  ADD CONSTRAINT `rendeles_ibfk_1` FOREIGN KEY (`ID_termek`) REFERENCES `termekek` (`ID_termek`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rendeles_ibfk_2` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `termekek`
--
ALTER TABLE `termekek`
  ADD CONSTRAINT `termekek_ibfk_1` FOREIGN KEY (`ID_Me`) REFERENCES `mennyisegiegyseg` (`ID_Me`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `termekek_ibfk_2` FOREIGN KEY (`ID_kategoria`) REFERENCES `kategoriak` (`ID_kategoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
