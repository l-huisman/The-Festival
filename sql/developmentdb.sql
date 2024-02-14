-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Gegenereerd op: 14 feb 2024 om 14:48
-- Serverversie: 11.2.2-MariaDB-1:11.2.2+maria~ubu2204
-- PHP-versie: 8.2.15

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Database: `developmentdb`
--
-- --------------------------------------------------------
--
-- Table structure for table `artist`
--
CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Tabelstructuur voor tabel `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `shoppingcart`
--

INSERT INTO `shoppingcart` (`id`, `userID`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tickets`
--

CREATE TABLE `tickets` (
  `ticketID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(5) NOT NULL,
  `shoppingcartID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tickets`
--

INSERT INTO `tickets` (`ticketID`, `userID`, `title`, `description`, `quantity`, `shoppingcartID`) VALUES
(1, 1, 'Concert Ticket', 'Admission to the live concert event', 6, 1),
(2, 1, 'Movie Ticket', 'Admission to the latest blockbuster movie', 2, 1),
(3, 1, 'Sports Ticket', 'Admission to the championship game', 2, 1),
(4, 1, 'Historical Tour', 'This is a Historical Tour around Haarlem', 2, 1),
(5, 1, 'Music event Reservation', 'This is a reservation for music event 1', 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

--
-- Table structure for table `song`
--
CREATE TABLE `song` (
  `id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Table structure for table `user`
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
  `gender` enum('male', 'female', 'other') DEFAULT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'user'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `user`
--
INSERT INTO
  `user` (
    `user_id`,
    `first_name`,
    `last_name`,
    `email`,
    `date_of_birth`,
    `address`,
    `phone_number`,
    `hashed_password`,
    `gender`,
    `role`
  )
VALUES
  (
    1,
    'Thijs',
    'Moerland',
    'Moerland8@gmail.com',
    '2024-02-06',
    'Söderblomstraat',
    '+31681340798',
    '$2y$10$g0Utg1sdjjKnHemh85vCAeb0l7CaydEbcxByRDvJ8b72bmbNcCoG2',
    'male',
    'admin'
  );

--
-- Indexes for dumped tables
--
--
-- Indexes for table `artist`
--
ALTER TABLE
  `artist`
ADD
  PRIMARY KEY (`id`);

--
-- Indexen voor tabel `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticketID`);

--
-- Indexes for table `song`
--
ALTER TABLE
  `song`
ADD
  PRIMARY KEY (`id`),
ADD
  KEY `FOREIGN` (`artist_id`);

--
-- Indexes for table `user`
--
ALTER TABLE
  `user`
ADD
  PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT voor een tabel `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `user`
--
--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE
  `artist`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE
  `song`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE
  `user`
MODIFY
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;

--
-- Constraints for dumped tables
--
--
-- Constraints for table `song`
--
ALTER TABLE
  `song`
ADD
  CONSTRAINT `FOREIGN` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;