-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Gegenereerd op: 10 feb 2024 om 16:13
-- Serverversie: 11.2.2-MariaDB-1:11.2.2+maria~ubu2204
-- PHP-versie: 8.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developmentdb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `hashed_password` varchar(255) DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `date_of_birth`, `address`, `phone_number`, `hashed_password`, `gender`, `role`) VALUES
(1, 'Thijs', 'Moerland', 'Moerland8@gmail.com', '2024-02-06', 'Söderblomstraat', '+31681340798', '$2y$10$g0Utg1sdjjKnHemh85vCAeb0l7CaydEbcxByRDvJ8b72bmbNcCoG2', 'male', 'admin');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
