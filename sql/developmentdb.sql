SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

DROP DATABASE IF EXISTS `developmentdb`;
CREATE DATABASE IF NOT EXISTS `developmentdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `developmentdb`;



DROP TABLE IF EXISTS `Restaurant`;

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


ALTER TABLE `Restaurant`
  ADD PRIMARY KEY (`restaurant_id`);

ALTER TABLE `Restaurant`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;


DROP TABLE IF EXISTS `Location`;

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

ALTER TABLE `Location`
  ADD PRIMARY KEY (`location_id`);

ALTER TABLE `Location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;


DROP TABLE IF EXISTS `Session`;

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

ALTER TABLE `Session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

ALTER TABLE `Session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

ALTER TABLE `Session`
  ADD CONSTRAINT `Session_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `Restaurant` (`restaurant_id`);


DROP TABLE IF EXISTS `artist`;


CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `banner` varchar(255) NOT NULL,
  `pictogram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `artist` (`id`, `name`, `description`, `banner`, `pictogram`) VALUES
(1, 'Hardwell', 'Hardwell is a Dutch DJ, record producer and remixer from Breda, North Brabant. He was voted the World\'s No. 1 DJ on DJ Mag in 2013, and again in 2014. He is also known for his sets at music festivals, including Ultra Music Festival, Sunburn and Tomorrowland.', '/img/artists/hardwell/banner.jpg', '/img/artists/hardwell/pictogram.jpg'),
(2, 'Martin Garrix', 'Martijn Gerard Garritsen, known professionally as Martin Garrix, is a Dutch DJ and record producer from Amstelveen. His most known singles are \"Animals\", \"In the Name of Love\", and \"Scared to be Lonely\". He was ranked number one on DJ Mag\'s Top 100 DJs list for three consecutive years (2016, 2017, and 2018).', '/img/artists/martingarrix/banner.jpg', '/img/artists/martingarrix/pictogram.jpg'),
(3, 'Tiesto', 'Tijs Michiel Verwest OON, known professionally as Tiësto, is a Dutch DJ and record producer from Breda. He was named \"the Greatest DJ of All Time\" by Mix magazine in a poll voted by the fans. In 2013, he was voted by DJ Mag readers as the \"best DJ of the last 20 years\".', '/img/artists/tiesto/banner.jpg', '/img/artists/tiesto/pictogram.jpg'),
(4, 'Armin van Buuren', 'Armin Jozef Jacobus Daniël van Buuren OON is a Dutch DJ, record producer and remixer from South Holland. Since 2001, he has hosted A State of Trance, a weekly radio show, which is broadcast to nearly 40 million listeners in 84 countries on over 100 FM radio stations.', '/img/artists/arminvanbuuren/banner.jpg', '/img/artists/arminvanbuuren/pictogram.jpg'),
(5, 'David Guetta', 'Pierre David Guetta is a French DJ, record producer and songwriter. He has sold over nine million albums and 30 million singles worldwide. In 2011, Guetta was voted as the number one DJ in the DJ Mag Top 100 DJs poll.', '/img/artists/davidguetta/banner.jpg', '/img/artists/davidguetta/pictogram.jpg');

CREATE TABLE `artist_event` (
  `artist_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `music_event` (
  `id` int(11) NOT NULL,
  `venue_id` int(11) NOT NULL,
  `available_tickets` int(11) NOT NULL,
  `price` float NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `shoppingcart` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `shoppingcart` (`id`, `userID`) VALUES
(1, 1);

CREATE TABLE `song` (
  `id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `song` text NOT NULL,
  `cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `tickets` (
  `ticketID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` float NOT NULL,
  `shoppingcartID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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


ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `artist_event`
  ADD PRIMARY KEY (`artist_id`,`event_id`),
  ADD KEY `event_id` (`event_id`);

ALTER TABLE `music_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_venue_id` (`venue_id`);

ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `song`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN` (`artist_id`);

ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticketID`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `venue`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `wysiwyg`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `music_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `shoppingcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE `tickets`
  MODIFY `ticketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `wysiwyg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `artist_event`
  ADD CONSTRAINT `artist_event_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`),
  ADD CONSTRAINT `artist_event_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `music_event` (`id`);

ALTER TABLE `music_event`
  ADD CONSTRAINT `fk_venue_id` FOREIGN KEY (`venue_id`) REFERENCES `venue` (`id`);

ALTER TABLE `song`
  ADD CONSTRAINT `FOREIGN` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
