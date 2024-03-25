-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 25, 2024 at 12:00 PM
-- Server version: 11.2.2-MariaDB-1:11.2.2+maria~ubu2204
-- PHP Version: 8.2.15

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
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `banner` varchar(255) NOT NULL,
  `pictogram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `name`, `description`, `banner`, `pictogram`) VALUES
(1, 'Hardwell', 'Hardwell is a Dutch DJ, record producer and remixer from Breda, North Brabant. He was voted the World\'s No. 1 DJ on DJ Mag in 2013, and again in 2014. He is also known for his sets at music festivals, including Ultra Music Festival, Sunburn and Tomorrowland.', '/img/artists/hardwell/banner.jpg', '/img/artists/hardwell/pictogram.jpg'),
(2, 'Martin Garrix', 'Martijn Gerard Garritsen, known professionally as Martin Garrix, is a Dutch DJ and record producer from Amstelveen. His most known singles are \"Animals\", \"In the Name of Love\", and \"Scared to be Lonely\". He was ranked number one on DJ Mag\'s Top 100 DJs list for three consecutive years (2016, 2017, and 2018).', '/img/artists/martingarrix/banner.jpg', '/img/artists/martingarrix/pictogram.jpg'),
(3, 'Tiesto', 'Tijs Michiel Verwest OON, known professionally as Tiësto, is a Dutch DJ and record producer from Breda. He was named \"the Greatest DJ of All Time\" by Mix magazine in a poll voted by the fans. In 2013, he was voted by DJ Mag readers as the \"best DJ of the last 20 years\".', '/img/artists/tiesto/banner.jpg', '/img/artists/tiesto/pictogram.jpg'),
(4, 'Armin van Buuren', 'Armin Jozef Jacobus Daniël van Buuren OON is a Dutch DJ, record producer and remixer from South Holland. Since 2001, he has hosted A State of Trance, a weekly radio show, which is broadcast to nearly 40 million listeners in 84 countries on over 100 FM radio stations.', '/img/artists/arminvanbuuren/banner.jpg', '/img/artists/arminvanbuuren/pictogram.jpg'),
(5, 'David Guetta', 'Pierre David Guetta is a French DJ, record producer and songwriter. He has sold over nine million albums and 30 million singles worldwide. In 2011, Guetta was voted as the number one DJ in the DJ Mag Top 100 DJs poll.', '/img/artists/davidguetta/banner.jpg', '/img/artists/davidguetta/pictogram.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artist_event`
--

CREATE TABLE `artist_event` (
  `artist_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `music_event`
--

CREATE TABLE `music_event` (
  `id` int(11) NOT NULL,
  `venue_id` int(11) NOT NULL,
  `available_tickets` int(11) NOT NULL,
  `price` float NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderItems`
--

CREATE TABLE `orderItems` (
  `orderItemID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `ticketID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderItems`
--

INSERT INTO `orderItems` (`orderItemID`, `orderID`, `ticketID`, `quantity`, `price`) VALUES
(25, 4, 34, 2, 23.5),
(26, 4, 35, 3, 25),
(27, 4, 36, 1, 20),
(28, 4, 37, 2, 23.5),
(29, 4, 38, 2, 23.5),
(30, 4, 39, 3, 25),
(31, 4, 40, 1, 20),
(32, 4, 41, 2, 23.5),
(37, 6, 34, 2, 23.5),
(38, 6, 35, 3, 25),
(39, 6, 36, 1, 20),
(40, 6, 37, 2, 23.5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `orderDateTime` datetime NOT NULL,
  `TotalPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `userID`, `orderDateTime`, `TotalPrice`) VALUES
(4, 1, '2024-03-20 18:53:28', 378),
(6, 2, '2024-03-25 11:59:05', 189);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`id`, `userID`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `song` text NOT NULL,
  `cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`id`, `artist_id`, `song`, `cover`) VALUES
(1, 1, '/audio/spaceman.mp3', '/audio/spaceman.jpg'),
(2, 1, '/audio/apollo.mp3', '/audio/apollo.jpg'),
(3, 1, '/audio/animals.mp3', '/audio/animals.jpg'),
(4, 2, '/audio/inthenameoflove.mp3', '/audio/inthenameoflove.jpg'),
(5, 2, '/audio/scaredtobelonely.mp3', '/audio/scaredtobelonely.jpg'),
(6, 2, '/audio/summerdays.mp3', '/audio/summerdays.jpg'),
(7, 3, '/audio/boom.mp3', '/audio/boom.jpg'),
(8, 3, '/audio/secrets.mp3', '/audio/secrets.jpg'),
(9, 3, '/audio/shotme.mp3', '/audio/shotme.jpg'),
(10, 4, '/audio/blahblah.mp3', '/audio/blahblah.jpg'),
(11, 4, '/audio/thisiswhatitfeelslike.mp3', '/audio/thisiswhatitfeelslike.jpg'),
(12, 4, '/audio/nofun.mp3', '/audio/nofun.jpg'),
(13, 5, '/audio/hey.mp3', '/audio/hey.jpg'),
(14, 5, '/audio/lovers.mp3', '/audio/lovers.jpg'),
(15, 5, '/audio/whenlove.mp3', '/audio/whenlove.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticketID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` float NOT NULL,
  `shoppingcartID` int(11) DEFAULT NULL,
  `paid` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticketID`, `userID`, `title`, `datetime`, `location`, `description`, `quantity`, `price`, `shoppingcartID`, `paid`) VALUES
(28, 1, 'test', '2024-03-24 12:12:12', '', 'testDescr', 2, 23.5, 1, 0),
(29, 1, 'test1', '2024-03-24 10:12:12', '', 'testDescr2', 1, 25, 1, 0),
(30, 1, 'Concert Ticket ', '2024-03-19 16:18:01', '', ' Admission to the live concert event ', 2, 23.5, 1, 0),
(31, 1, 'Music Ticket ', '2024-03-20 16:18:11', '', ' Admission to the latest blockbuster movie ', 3, 25, 1, 0),
(32, 1, 'Yummy Reservation ', '2024-03-21 16:50:17', '', ' Admission to the championship game ', 1, 20, 1, 0),
(33, 1, 'Historical Tour ', '2024-03-18 16:18:24', '', ' This is a Historical Tour around Haarlem ', 2, 23.5, 1, 0),
(34, 2, 'Concert Ticket', '2024-03-19 16:18:00', ' ', 'Admission to the live concert event', 2, 23.5, NULL, 1),
(35, 2, 'Music Ticket', '2024-03-20 16:18:00', ' ', 'Admission to the latest blockbuster movie', 3, 25, NULL, 1),
(36, 2, 'Yummy Reservation', '2024-03-21 16:50:00', ' ', 'Admission to the championship game', 1, 20, NULL, 1),
(37, 2, 'Historical Tour', '2024-03-18 16:18:00', ' ', 'This is a Historical Tour around Haarlem', 2, 23.5, NULL, 1);

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
  `gender` varchar(255) DEFAULT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `date_of_birth`, `address`, `phone_number`, `hashed_password`, `gender`, `role`) VALUES
(1, ' Thijs', ' Moerland ', 'Moerland8@gmail.com', '2001-09-05', 'Söderblomstraat', '31681340798 ', '$2y$10$dDdt7stAhaCM2Kl2l738tOFL5yxpSfiqvIiHzYYKy7E3f01PkKL56', 'male', 'admin'),
(2, 'test', 'test', 'test@test.com', '2024-02-29', '123456712', '0681340798', '$2y$10$9zsk.zf9MNEtSVKEqPPP5.8GamKwHTfH8Q5Ypkcmi/h3zczfDGAY6', 'male', ' user ');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wysiwyg`
--

CREATE TABLE `wysiwyg` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artist_event`
--
ALTER TABLE `artist_event`
  ADD PRIMARY KEY (`artist_id`,`event_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `music_event`
--
ALTER TABLE `music_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_venue_id` (`venue_id`);

--
-- Indexes for table `orderItems`
--
ALTER TABLE `orderItems`
  ADD PRIMARY KEY (`orderItemID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN` (`artist_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticketID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wysiwyg`
--
ALTER TABLE `wysiwyg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `music_event`
--
ALTER TABLE `music_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderItems`
--
ALTER TABLE `orderItems`
  MODIFY `orderItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wysiwyg`
--
ALTER TABLE `wysiwyg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artist_event`
--
ALTER TABLE `artist_event`
  ADD CONSTRAINT `artist_event_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`),
  ADD CONSTRAINT `artist_event_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `music_event` (`id`);

--
-- Constraints for table `music_event`
--
ALTER TABLE `music_event`
  ADD CONSTRAINT `fk_venue_id` FOREIGN KEY (`venue_id`) REFERENCES `venue` (`id`);

--
-- Constraints for table `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `FOREIGN` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
