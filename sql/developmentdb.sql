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





--
-- Table structure for table `guide`
--

CREATE TABLE `guide` (
  `guide_id` int(20) NOT NULL,
  `tour_id` int(20) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `language` enum('Dutch','French','Chinese','English') NOT NULL
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

CREATE TABLE `tour` (
  `tour_id` int(20) NOT NULL,
  `start_location` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `price` float NOT NULL,
  `seats` int(20) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tour`
--

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

-- --------------------------------------------------------

--
-- Dumping data for table `wysiwyg`
--

INSERT INTO `wysiwyg` (`id`, `name`, `content`) VALUES
(1, 'Custom Page', '<div class=\"container d-flex flex-column align-items-center\">\n<h1>Welcome dsdsdsdsdto this custom made page!</h1>\n<h2>You can edit the content of this page by using the wysiwyg editor below.</h2>\n<p>That is if you are logged in as an administrator!</p>\n<p>&nbsp;</p>\n<p><strong>dsddfdfdfdfdfddfdfdf</strong></p>\n</div>'),
(2, 'Custom Page', '<div class=\"container d-flex flex-column align-items-center\"><h1>Welcome to this custom made page!</h1><h2>You can edit the content of this page by using the wysiwyg editor below.</h2><p>That is if you are logged in as an administrator!</p></div>'),
(3, 'Custom Page', '<div class=\"col-sm-12 col-md-4\"><img src=\"https://d22ngpx8edtvxq.cloudfront.net/webuploads/_blockImage/93584/Foodhal-borrel-Enschede-2021-Liggend-LR-2-klein.webp\" alt=\"1\">\r\n<h2 class=\"mt-3 mb-3\">Food4</h2>\r\n<p class=\"me-4\">Loremdsdsds ipsum dolor sit amet, consectetur adipiscing elit. Quisque nibh sem, ultricies sit amet tellus ut, iaculis interdum ante. Quisque at nibh ac diam faucibus congue.</p>\r\n<div class=\"custom-link\"><a class=\"buttons\" href=\"#\">Read more &gt;</a></div>\r\n</div>'),
(4, 'Yummie', '<div class=\"col-sm-12 col-md-4\">\r\n                    <img src=\"https://www.classicstogo.nl/files/2016/06/Top-10-Jazz-RH.jpg\" alt=\"1\">\r\n                    <h2 class=\"mt-3 mb-3\">Jazz</h2>\r\n                    <p class=\"me-4\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nibh sem, ultricies sit amet\r\n                        tellus ut, iaculis interdum ante. Quisque at nibh ac diam faucibus congue.\r\n                    </p>\r\n                    <div class=\"custom-link\">\r\n                        <a href=\"#\" class=\"buttons\">Read more ></a>\r\n                    </div>\r\n                </div>'),
(7, 'sds', '<div class=\"container d-flex flex-column align-items-center\"><h1>Welcome to this custom made page!</h1><h2>You can edit the content of this page by using the wysiwyg editor below.</h2><p>That is if you are logged in as an administrator!</p></div>'),
(8, 'df', '<div class=\"container d-flex flex-column align-items-center\"><h1>Welcome to this custom made page!</h1><h2>You can edit the content of this page by using the wysiwyg editor below.</h2><p>That is if you are logged in as an administrator!</p></div>');

--



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



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
