-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 25, 2024 at 12:21 PM
-- Server version: 11.2.2-MariaDB-1:11.2.2+maria~ubu2204
-- PHP Version: 8.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE DATABASE IF NOT EXISTS `developmentdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `developmentdb`;

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `banner` varchar(255) NOT NULL,
  `pictogram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

<<<<<<< Updated upstream
DROP TABLE IF EXISTS `restaurant_reservations`;

CREATE TABLE `restaurant_reservations` (
  `ticket_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `restaurant_reservations`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `restaurant_id` (`restaurant_id`),
  ADD KEY `session_id` (`session_id`);

=======
--
-- Dumping data for table `artist`
--
>>>>>>> Stashed changes

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

INSERT INTO `artist_event` (`artist_id`, `event_id`) VALUES
(3, 1),
(5, 1),
(1, 2);

CREATE TABLE `guide` (
  `guide_id` int(20) NOT NULL,
  `tour_id` int(20) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `language` enum('Dutch','French','Chinese','English') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `guide` (`guide_id`, `tour_id`, `name`, `language`) VALUES
(1, 1, 'Jan-Willem', 'Dutch'),
(2, 1, 'Frederic', 'English'),
(3, 2, 'Jan-Willem', 'Dutch'),
(4, 2, 'Frederic', 'English'),
(5, 3, 'Jan-Willem', 'Dutch'),
(6, 3, 'Frederic', 'English'),
(7, 4, 'Annet', 'Dutch'),
(8, 4, 'Williams', 'English'),
(9, 5, 'Annet', 'Dutch'),
(10, 5, 'Williams', 'English'),
(11, 5, 'Kim', 'Chinese');

CREATE TABLE `historicevent` (
  `historicevent_id` int(30) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `path` varchar(255) NOT NULL,
  `location` varchar(80) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `historicevent` (`historicevent_id`, `name`, `description`, `path`, `location`) VALUES
(1, 'St.Bavo Kerk\r\n', 'De Grote of St.-Bavokerk werd voor het laatst gerestaureerd in 1980-1985. Het is een laat-gotische kruisbasiliek met slanke kruistoren (gerestaureerd 1964-1969).\r\n\r\nMiddenbeuk en koor zijn gedekt door houten gewelven (16de eeuw).\r\n\r\n\r\n\r\n', '/img/historicevents/bavokerk.jpg', 'Grote Markt 22, 2021 RD Haarlem'),
(2, 'Grote Markt', 'De Hallen Haarlem toont regelmatig solopresentaties van internationaal spraakmakende kunstenaars die nog niet eerder in Nederland hebben geëxposeerd.\r\n', '/img/historicevents/grotemarkt.jpg', 'Grote Markt,\r\n2011 RD Haarlem\r\n'),
(3, 'De Hallen', 'Hal is een tentoonstellingscomplex van het Frans Hals Museum aan de Grote Markt van Haarlem waar moderne en hedendaagse kunst tentoongesteld wordt in wisselende presentaties.', '/img/historicevents/dehallen.jpeg', 'Grote Markt 16, 2011 RD Haarlem'),
(4, 'Proveniershof', 'Het Proveniershof is een hofje in Haarlem, gelegen aan de Grote Houtstraat 140, de drukste winkelstraat van Haarlem.', '/img/historicevents/proveniershof.jpg', 'Grote Houtstraat 142D, 2011 SV Haarlem'),
(5, 'Jopenkerk', 'Het verhaal achter Jopen begint in de veertiende eeuw als Haarlem uitgroeit tot een van de belangrijkste brouwerssteden van Nederland. Brouwerijen draaien op volle toeren en het gerstenat wordt in ‘Jopen’ (vaten van 112 liter) over het Spaarne vervoerd. ', '/img/historicevents/jopenkerk.jpg', 'Gedempte Voldersgracht 2, 2011 WD Haarlem');

CREATE TABLE `home` (
  `home_id` int(20) NOT NULL,
  `img_id` int(20) NOT NULL,
  `about` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `home` (`home_id`, `img_id`, `about`) VALUES
(1, 1, 'loreisan duasidb nasudiyseb t ruiaewy bfsudiba siudn asdusajnd uiasndausidn asuidn vasdasd');

CREATE TABLE `images` (
  `img_id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `images` (`img_id`, `name`, `path`) VALUES
(1, 'Bavokerk', '/img/historicevents/bavokerk.jpg');

CREATE TABLE `Location` (
  `location_id` int(11) NOT NULL,
  `detail_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `streetname` varchar(128) NOT NULL,
  `postalcode` varchar(6) NOT NULL,
  `city` varchar(64) NOT NULL,
  `housenumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Location` (`location_id`, `detail_id`, `type`, `streetname`, `postalcode`, `city`, `housenumber`) VALUES
(1, 1, 'Restaurant', 'Oude Groenmarkt', '2011HL', 'Haarlem', '10'),
(2, 2, 'Restaurant', 'Twijnderslaan', '2021BG', 'Haarlem', '7'),
(3, 3, 'Restaurant', 'Spekstraat', '2011HM', 'Haarlem', '4'),
(4, 4, 'Restaurant', 'Spaarne', '2011CL', 'Haarlem', '96'),
(5, 5, 'Restaurant', 'Lange Veerstraat', '2011DB', 'Haarlem', '4'),
(6, 6, 'Restaurant', 'Klokhuisplein', '2011HK', 'Haarlem', '9'),
(7, 7, 'Restaurant', 'Grote Markt', '2011RC', 'Haarlem', '13');

CREATE TABLE `music_event` (
  `id` int(11) NOT NULL,
  `venue_id` int(11) NOT NULL,
  `available_tickets` int(11) NOT NULL,
  `price` float NOT NULL,
  `time` datetime NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `music_event` (`id`, `venue_id`, `available_tickets`, `price`, `time`, `duration`) VALUES
(1, 4, 1500, 75, '2024-07-27 20:00:00', 360),
(2, 4, 300, 60, '2024-07-27 21:00:00', 120);

CREATE TABLE `orderItems` (
  `orderItemID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `ticketID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `orderDateTime` datetime NOT NULL,
  `TotalPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `orders` (`orderID`, `userID`, `orderDateTime`, `TotalPrice`) VALUES
(4, 1, '2024-03-20 18:53:28', 378),
(6, 2, '2024-03-25 11:59:05', 189);

CREATE TABLE `Restaurant` (
  `restaurant_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `price_kids` float NOT NULL,
  `star_rating` int(11) NOT NULL,
  `cuisine` varchar(128) NOT NULL,
  `website` varchar(320) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `total_seats` int(11) NOT NULL,
  `header_image` varchar(255) DEFAULT NULL,
  `restaurant_image` varchar(255) NOT NULL,
  `menu_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Restaurant` (`restaurant_id`, `name`, `description`, `price`, `price_kids`, `star_rating`, `cuisine`, `website`, `phonenumber`, `total_seats`, `header_image`, `restaurant_image`, `menu_image`) VALUES
(1, 'Urban Frenchy Bistro Toujours', 'For a cozy and beautiful dinner, Toujours is the place to be. It’s located is the center of Haarlem, right across from the Grote kerk. It’s a french restaurant with two open kitchens and a cozy styled interior. ', 35, 17.5, 4, 'French', 'https://restauranttoujours.nl/', '023 5321699', 48, '\\img\\restaurants\\toujours\\header_toujours.jpg', '\\img\\restaurants\\toujours\\restaurant_toujours.jpg', '\\img\\restaurants\\toujours\\menu_toujours.jpg'),
(2, 'Fris', 'Fris a modern french restaurant in the city center of Haarlem, by Rick May.  the restaurant has a relaxed atmosphere with high quality dishes, made with fresh seasonal products. Fris received in 2022 a Michelin star. ', 45, 22.5, 4, 'French', 'https://www.restaurantfris.nl/', '023 5310717', 45, '\\img\\restaurants\\fris\\header_fris.jpg', '\\img\\restaurants\\fris\\restaurant_fris.jpg', '\\img\\restaurants\\fris\\menu_fris.jpg'),
(3, 'Specktakel', 'Specktakel is a unique world restaurant centrally located in the heart of Haarlem. With a special covered courtyard and a terrace with a view of the historic Vleeshal and the centuries-old Bavo church.', 35, 17.5, 3, 'World', 'https://specktakel.nl/', '023-5323841', 36, '\\img\\restaurants\\specktakel\\header_specktakel.jpg', '\\img\\restaurants\\specktakel\\restaurant_specktakel.jpg', '\\img\\restaurants\\specktakel\\menu_specktakel.jpg'),
(4, 'Ratatouille', 'This restaurant is a star in Haarlem. It is one of the few restaurants in this city with a Michelin star. It provides a sophisticated theme with a traditional French decor. Here you can also taste some top of the line seafood with a rich and complex flavor.', 45, 22.5, 4, 'French, European', 'https://ratatouillefoodandwine.nl/', '023 542 7270', 52, '\\img\\restaurants\\ratatouille\\header_ratatouille.jpg', '\\img\\restaurants\\ratatouille\\restauarnt_ratatouille.jpg', '\\img\\restaurants\\ratatouille\\menu_ratatouille.jpg'),
(5, 'Mr. & Mrs.', 'Restaurant Mr. and Mrs. serves small luxury dishes, with the size of a starter, so you can try a lot of different combinations. You can choose between hot and cold dishes and they always have a matching glass of wine with your dish.', 45, 22.5, 4, 'European', 'https://www.restaurantmrandmrs.nl/', '023 531 5935', 40, '\\img\\restaurants\\MrAndMrs\\header_MrAndMrs.jpg', '\\img\\restaurants\\MrAndMrs\\restaurant_MrAndMRs.jpg', '\\img\\restaurants\\MrAndMrs\\menu_MrAndMrs.png'),
(6, 'ML', 'Restaurant ML is located in historical Hotel ML. It is a french restaurant with surprising flavor combinations in their dishes, but with the right combination between traditional and new products and flavors.', 45, 22.5, 4, 'International', 'https://www.mlinhaarlem.nl/', '023 5123910', 60, '\\img\\restaurants\\ml\\header_ML.jpg', '\\img\\restaurants\\ml\\restaurant_ML.jpg', '\\img\\restaurants\\ml\\menu_ML.jpg'),
(7, 'Grand Cafe Brinkmann', 'Grand Cafe Brinkmann has been known since 1879 in Haarlem and surroundings.  Located on the Grote Markt in the center of Haarlem. The various menu has for everyone something to offer, prepared with fresh ingredients. ', 35, 17.5, 4, 'Dutch', 'https://www.grandcafebrinkmann.nl/', '023 532 3111', 100, '\\img\\restaurants\\brinkmann\\header_brinkmann.jpg', '\\img\\restaurants\\brinkmann\\restaurant_brinkmann.jpg', '\\img\\restaurants\\brinkmann\\menu_brinkmann.jpg');

CREATE TABLE `restaurant_reservations` (
  `ticket_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `Session` (
  `session_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `start_datetime` datetime NOT NULL,
  `duration` time NOT NULL,
  `seats_reserved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Session` (`session_id`, `restaurant_id`, `start_datetime`, `duration`, `seats_reserved`) VALUES
(1, 1, '2023-07-27 17:30:00', '01:30:00', 47),
(2, 1, '2023-07-27 19:00:00', '01:30:00', 48),
(3, 1, '2023-07-27 20:30:00', '01:30:00', 48),
(4, 1, '2023-07-28 17:30:00', '01:30:00', 48),
(5, 1, '2023-07-28 19:00:00', '01:30:00', 48),
(6, 1, '2023-07-28 20:30:00', '01:30:00', 48),
(7, 1, '2023-07-29 17:30:00', '01:30:00', 48),
(8, 1, '2023-07-29 19:00:00', '01:30:00', 48),
(9, 1, '2023-07-29 20:30:00', '01:30:00', 0),
(10, 2, '2023-07-27 17:30:00', '01:30:00', 45),
(11, 2, '2023-07-27 19:00:00', '01:30:00', 45),
(12, 2, '2023-07-27 20:30:00', '01:30:00', 45),
(13, 2, '2023-07-28 17:30:00', '01:30:00', 45),
(14, 2, '2023-07-28 19:00:00', '01:30:00', 45),
(15, 2, '2023-07-28 20:30:00', '01:30:00', 45),
(16, 2, '2023-07-29 17:30:00', '01:30:00', 45),
(17, 2, '2023-07-29 19:00:00', '01:30:00', 45),
(18, 2, '2023-07-29 20:30:00', '01:30:00', 45),
(19, 3, '2023-07-27 17:00:00', '01:30:00', 36),
(20, 3, '2023-07-27 18:30:00', '01:30:00', 36),
(21, 3, '2023-07-27 20:00:00', '01:30:00', 36),
(22, 3, '2023-07-28 17:00:00', '01:30:00', 36),
(23, 3, '2023-07-28 18:30:00', '01:30:00', 36),
(24, 3, '2023-07-28 20:00:00', '01:30:00', 36),
(25, 3, '2023-07-29 17:00:00', '01:30:00', 36),
(26, 3, '2023-07-29 18:30:00', '01:30:00', 36),
(27, 3, '2023-07-29 20:00:00', '01:30:00', 36),
(31, 4, '2023-07-27 17:00:00', '02:00:00', 52),
(32, 4, '2023-07-27 19:00:00', '02:00:00', 52),
(33, 4, '2023-07-27 21:00:00', '02:00:00', 52),
(34, 4, '2023-07-28 17:00:00', '02:00:00', 52),
(35, 4, '2023-07-28 19:00:00', '02:00:00', 52),
(36, 4, '2023-07-28 21:00:00', '02:00:00', 52),
(37, 4, '2023-07-29 17:00:00', '02:00:00', 52),
(38, 4, '2023-07-29 19:00:00', '02:00:00', 52),
(39, 4, '2023-07-29 21:00:00', '02:00:00', 52),
(40, 5, '2023-07-27 18:00:00', '01:30:00', 40),
(41, 5, '2023-07-27 19:30:00', '01:30:00', 40),
(42, 5, '2023-07-27 21:00:00', '01:30:00', 40),
(43, 5, '2023-07-28 18:00:00', '01:30:00', 40),
(44, 5, '2023-07-28 19:30:00', '01:30:00', 40),
(45, 5, '2023-07-28 21:00:00', '01:30:00', 40),
(46, 5, '2023-07-29 18:00:00', '01:30:00', 40),
(47, 5, '2023-07-29 19:30:00', '01:30:00', 40),
(48, 5, '2023-07-29 21:00:00', '01:30:00', 40),
(49, 6, '2023-07-27 17:00:00', '02:00:00', 60),
(50, 6, '2023-07-27 19:00:00', '02:00:00', 60),
(51, 6, '2023-07-28 17:00:00', '02:00:00', 60),
(52, 6, '2023-07-28 19:00:00', '02:00:00', 60),
(53, 6, '2023-07-29 17:00:00', '02:00:00', 60),
(54, 6, '2023-07-29 19:00:00', '02:00:00', 60),
(55, 7, '2023-07-27 16:30:00', '01:30:00', 100),
(56, 7, '2023-07-27 18:00:00', '01:30:00', 100),
(57, 7, '2023-07-27 19:30:00', '01:30:00', 100),
(58, 7, '2023-07-28 16:30:00', '01:30:00', 100),
(59, 7, '2023-07-28 18:00:00', '01:30:00', 100),
(60, 7, '2023-07-28 19:30:00', '01:30:00', 100),
(61, 7, '2023-07-29 16:30:00', '01:30:00', 100),
(62, 7, '2023-07-29 18:00:00', '01:30:00', 100),
(63, 7, '2023-07-29 19:30:00', '01:30:00', 100);

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

<<<<<<< Updated upstream
--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticketID`, `userID`, `title`, `datetime`, `location`, `description`, `quantity`, `price`, `shoppingcartID`) VALUES
(1, 1, ' Concert Ticket ', '0000-00-00 00:00:00', '', ' Admission to the live concert event ', 1, 23.5, 1),
(2, 1, ' Movie Ticket ', '0000-00-00 00:00:00', '', ' Admission to the latest blockbuster movie ', 2, 25, 1),
(3, 1, ' Sports Ticket ', '0000-00-00 00:00:00', '', ' Admission to the championship game ', 1, 20, 1),
(4, 1, ' Historical Tour ', '0000-00-00 00:00:00', '', ' This is a Historical Tour around Haarlem ', 1, 23.5, 1);

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
  `role` varchar(30) NOT NULL DEFAULT ' user '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `date_of_birth`, `address`, `phone_number`, `hashed_password`, `gender`, `role`) VALUES
(1, ' Thijs', ' Moerland ', 'Moerland8@gmail.com', '2001-09-05', 'Söderblomstraat', '31681340798 ', '$2y$10$dDdt7stAhaCM2Kl2l738tOFL5yxpSfiqvIiHzYYKy7E3f01PkKL56', 'male', 'admin');

CREATE TABLE `venue` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `wysiwyg` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;





--
-- Table structure for table `guide`
--

CREATE TABLE `guide` (
  `guide_id` int(20) NOT NULL,
  `tour_id` int(20) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `language` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guide`
--

INSERT INTO `guide` (`guide_id`, `tour_id`, `name`, `language`) VALUES
(1, 1, 'Jan-Willem', 'Dutch'),
(2, 1, 'Frederic', 'English'),
(3, 2, 'Jan-Willem', 'Dutch'),
(4, 2, 'Frederic', 'English'),
(5, 3, 'Jan-Willem', 'Dutch'),
(6, 3, 'Frederic', 'English'),
(7, 4, 'Annet', 'Dutch'),
(8, 4, 'Williams', 'English'),
(9, 5, 'Annet', 'Dutch'),
(10, 5, 'Williams', 'English'),
(11, 5, 'Kim', 'Chinese');

-- --------------------------------------------------------

--
-- Table structure for table `historicevent`
--

CREATE TABLE `historicevent` (
  `historicevent_id` int(30) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `path` varchar(255) NOT NULL,
  `location` varchar(80) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `historicevent`
--

INSERT INTO `historicevent` (`historicevent_id`, `name`, `description`, `path`, `location`) VALUES
(1, 'St.Bavo Kerk\r\n', 'De Grote of St.-Bavokerk werd voor het laatst gerestaureerd in 1980-1985. Het is een laat-gotische kruisbasiliek met slanke kruistoren (gerestaureerd 1964-1969).\r\n\r\nMiddenbeuk en koor zijn gedekt door houten gewelven (16de eeuw).\r\n\r\n\r\n\r\n', '/img/historicevents/bavokerk.jpg', 'Grote Markt 22, 2021 RD Haarlem'),
(2, 'Grote Markt', 'De Hallen Haarlem toont regelmatig solopresentaties van internationaal spraakmakende kunstenaars die nog niet eerder in Nederland hebben geëxposeerd.\r\n', '/img/historicevents/grotemarkt.jpg', 'Grote Markt,\r\n2011 RD Haarlem\r\n'),
(3, 'De Hallen', 'Hal is een tentoonstellingscomplex van het Frans Hals Museum aan de Grote Markt van Haarlem waar moderne en hedendaagse kunst tentoongesteld wordt in wisselende presentaties.', '/img/historicevents/dehallen.jpeg', 'Grote Markt 16, 2011 RD Haarlem'),
(4, 'Proveniershof', 'Het Proveniershof is een hofje in Haarlem, gelegen aan de Grote Houtstraat 140, de drukste winkelstraat van Haarlem.', '/img/historicevents/proveniershof.jpg', 'Grote Houtstraat 142D, 2011 SV Haarlem'),
(5, 'Jopenkerk', 'Het verhaal achter Jopen begint in de veertiende eeuw als Haarlem uitgroeit tot een van de belangrijkste brouwerssteden van Nederland. Brouwerijen draaien op volle toeren en het gerstenat wordt in ‘Jopen’ (vaten van 112 liter) over het Spaarne vervoerd. ', '/img/historicevents/jopenkerk.jpg', 'Gedempte Voldersgracht 2, 2011 WD Haarlem');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `home_id` int(20) NOT NULL,
  `img_id` int(20) NOT NULL,
  `about` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`home_id`, `img_id`, `about`) VALUES
(1, 1, 'loreisan duasidb nasudiyseb t ruiaewy bfsudiba siudn asdusajnd uiasndausidn asuidn vasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `img_id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_id`, `name`, `path`) VALUES
(1, 'Bavokerk', '/img/historicevents/bavokerk.jpg');

--
-- Table structure for table `tour`
--
=======
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
>>>>>>> Stashed changes

CREATE TABLE `tour` (
  `tour_id` int(20) NOT NULL,
  `start_location` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `price` float NOT NULL,
  `seats` int(20) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tour` (`tour_id`, `start_location`, `price`, `seats`, `time`) VALUES
(1, 'Bavo Church', 17.5, 12, '2024-07-25 10:00:00'),
(2, 'Bavo Church', 17.5, 12, '2024-07-25 13:00:00'),
(3, 'Bavo Church', 17.5, 12, '2024-07-25 16:00:00'),
(4, 'Bavo Church', 17.5, 12, '2024-07-26 10:00:00'),
(5, 'Bavo Church', 17.5, 12, '2024-07-26 13:00:00'),
(6, 'Bavo Church', 17.5, 12, '2024-07-26 16:00:00'),
(7, 'Bavo Church', 17.5, 12, '2024-07-27 10:00:00'),
(8, 'Bavo Church', 17.5, 12, '2024-07-27 13:00:00'),
(9, 'Bavo Church', 17.5, 12, '2024-07-27 16:00:00'),
(10, 'Bavo Church', 17.5, 12, '2024-07-28 10:00:00'),
(11, 'Bavo Church', 17.5, 12, '2024-07-28 13:00:00'),
(12, 'Bavo Church', 17.5, 12, '2024-07-28 16:00:00');

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

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `date_of_birth`, `address`, `phone_number`, `hashed_password`, `gender`, `role`) VALUES
(1, 'Thijs', 'Moerland', 'Moerland8@gmail.com', '2001-09-05', 'Söderblomstraat', '31681340798 ', '$2y$10$dDdt7stAhaCM2Kl2l738tOFL5yxpSfiqvIiHzYYKy7E3f01PkKL56', 'male', 'admin'),
(2, 'Luke', 'Huisman', 'luke.huisman@yahoo.nl', '2003-04-06', 'Julianaweg 2a', '31637662718', '$2y$10$NI.bOubSIq1tDUVSw8wgMuxOMxgBSdznoaaoFLFZtlYxfqxA510MG', 'male', 'admin'),
(3, 'test', 'test', 'test@test.com', '2024-02-29', '123456712', '0681340798', '$2y$10$9zsk.zf9MNEtSVKEqPPP5.8GamKwHTfH8Q5Ypkcmi/h3zczfDGAY6', 'male', ' user ');

CREATE TABLE `venue` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `venue` (`id`, `name`, `address`) VALUES
(1, 'Club Stalker', 'Kromme Elleboogsteeg 20, 2011 TS Haarlem'),
(2, 'Caprera Openluchttheater ', 'Hoge Duin en Daalseweg 2, 2061 AG Bloemendaal'),
(3, 'Jopenkerk', 'Gedempte Voldersgracht 2, 2011 WD Haarlem'),
(4, 'Lichtfabriek', 'Minckelersweg 2, 2031 EM Haarlem'),
(5, 'Club Ruis', 'Smedestraat 31, 2011 RE Haarlem'),
(6, 'XO the Club', 'Grote Markt 8, 2011 RD Haarlem');

CREATE TABLE `wysiwyg` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `wysiwyg` (`id`, `name`, `content`) VALUES
(1, 'Custom Page', '<div class=\"container d-flex flex-column align-items-center\">\r\n<h1><img src=\"https://us.123rf.com/450wm/senk/senk1101/senk110100053/8551686-green-frog.jpg\" alt=\"\" width=\"450\" height=\"300\">Welcome dsdsdsdsdto this custom made page!</h1>\r\n<h2>You can edit the content of this page by using the wysiwyg editor below.</h2>\r\n<p>That is if you are logged in as an administrator!</p>\r\n<p>&nbsp;</p>\r\n<p><strong>dsddfdfdfdfdfddfdfdf</strong></p>\r\n</div>'),
(2, 'Custom Page', '<div class=\"container d-flex flex-column align-items-center\"><h1>Welcome to this custom made page!</h1><h2>You can edit the content of this page by using the wysiwyg editor below.</h2><p>That is if you are logged in as an administrator!</p></div>'),
(3, 'Custom Page', '<div class=\"col-sm-12 col-md-4\"><img src=\"https://d22ngpx8edtvxq.cloudfront.net/webuploads/_blockImage/93584/Foodhal-borrel-Enschede-2021-Liggend-LR-2-klein.webp\" alt=\"1\">\r\n<h2 class=\"mt-3 mb-3\">Food4</h2>\r\n<p class=\"me-4\">Ontdek de culinaire hoogstandjes van Haarlem op ons smaakvolle food event! Laat je zintuigen prikkelen door een overvloed aan heerlijke gerechten, verrukkelijke smaken en lokale lekkernijen. Kom en geniet van een onvergetelijke gastronomische ervaring die je smaakpapillen zal verwennen. Mis het niet!</p>\r\n<div class=\"custom-link\"><a class=\"buttons\" href=\"#\">Read more &gt;</a></div>\r\n</div>'),
(4, 'Custom Page', '<div class=\"col-sm-12 col-md-4\"><img src=\"https://www.classicstogo.nl/files/2016/06/Top-10-Jazz-RH.jpg\" alt=\"1\">\r\n<h2 class=\"mt-3 mb-3\">Jazz</h2>\r\n<p class=\"me-4\">Laat je betoveren door de onvergetelijke klanken van jazz op ons sprankelende evenement! Ontdek de magie van live optredens, swingende ritmes en de bruisende sfeer. Mis deze unieke gelegenheid niet en beleef een avond vol muzikale verrassingen in Haarlem!</p>\r\n<div class=\"custom-link\"><a class=\"buttons\" href=\"#\">Read more &gt;</a></div>\r\n</div>'),
(5, 'Custom Page', '<div class=\"col-sm-12 col-md-4\"><img src=\"https://www.euroschoolindia.com/wp-content/uploads/2023/07/importance-of-history-scaled-1.jpg\" alt=\"1\">\r\n<h2 class=\"mt-3 mb-3\">History</h2>\r\n<p class=\"me-4\">Stap binnen in de betoverende wereld van Haarlem\'s geschiedenis tijdens ons unieke historisch festival! Laat je meevoeren door fascinerende verhalen, ontdek verborgen schatten en geniet van levendige optredens. Een onvergetelijke ervaring wacht op jou - kom en ontdek het zelf!</p>\r\n<div class=\"custom-link\"><a class=\"buttons\" href=\"#\">Read more &gt;</a></div>\r\n</div>');

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

ALTER TABLE `home`
  ADD PRIMARY KEY (`home_id`);

ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

ALTER TABLE `Location`
  ADD PRIMARY KEY (`location_id`);

ALTER TABLE `music_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_venue_id` (`venue_id`);

ALTER TABLE `orderItems`
  ADD PRIMARY KEY (`orderItemID`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

ALTER TABLE `Restaurant`
  ADD PRIMARY KEY (`restaurant_id`);

ALTER TABLE `restaurant_reservations`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `restaurant_id` (`restaurant_id`),
  ADD KEY `session_id` (`session_id`);

ALTER TABLE `Session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

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

ALTER TABLE `home`
  MODIFY `home_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `images`
  MODIFY `img_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `Location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

ALTER TABLE `music_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `orderItems`
  MODIFY `orderItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `Restaurant`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

ALTER TABLE `Session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

ALTER TABLE `shoppingcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Restaurant`
--
ALTER TABLE `Restaurant`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `Session`
--
ALTER TABLE `Session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

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
  MODIFY `ticketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wysiwyg`
--
ALTER TABLE `wysiwyg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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

ALTER TABLE `Session`
  ADD CONSTRAINT `Session_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `Restaurant` (`restaurant_id`);

ALTER TABLE `song`
  ADD CONSTRAINT `FOREIGN` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
<<<<<<< Updated upstream
--

-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

  ALTER TABLE `home`
  MODIFY `home_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

  ALTER TABLE `guide`
  ADD PRIMARY KEY (`guide_id`);

  ALTER TABLE `historicevent`
  ADD PRIMARY KEY (`historicevent_id`);

  ALTER TABLE `tour`
  ADD PRIMARY KEY (`tour_id`);


ALTER TABLE `guide`
  MODIFY `guide_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `historicevent`
  MODIFY `historicevent_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `home`
  MODIFY `home_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `tour`
  MODIFY `tour_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
=======
>>>>>>> Stashed changes
