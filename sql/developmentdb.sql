SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
DROP DATABASE IF EXISTS `developmentdb`;
CREATE DATABASE IF NOT EXISTS `developmentdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `developmentdb`;

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
  `time` datetime NOT NULL,
  `duration` int(11) NOT NULL
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

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `date_of_birth`, `address`, `phone_number`, `hashed_password`, `gender`, `role`) VALUES
(1, 'Thijs', 'Moerland', 'Moerland8@gmail.com', '2001-09-05', 'Söderblomstraat', '31681340798 ', '$2y$10$dDdt7stAhaCM2Kl2l738tOFL5yxpSfiqvIiHzYYKy7E3f01PkKL56', 'male', 'admin'),
(2, 'Luke', 'Huisman', 'luke.huisman@yahoo.nl', '2003-04-06', 'Julianaweg 2a', '31637662718', '$2y$10$NI.bOubSIq1tDUVSw8wgMuxOMxgBSdznoaaoFLFZtlYxfqxA510MG', 'male', 'admin');

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
