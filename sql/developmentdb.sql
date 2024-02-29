SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `developmentdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `developmentdb`;

DROP TABLE IF EXISTS `artist`;

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `banner` varchar(255) NOT NULL,
  `pictogram` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

INSERT INTO
  `artist` (
    `id`,
    `name`,
    `description`,
    `banner`,
    `pictogram`
  )
VALUES
  (
    1,
    'Hardwell',
    'Hardwell is a Dutch DJ, record producer and remixer from Breda, North Brabant. He was voted the World''s No. 1 DJ on DJ Mag in 2013, and again in 2014. He is also known for his sets at music festivals, including Ultra Music Festival, Sunburn and Tomorrowland.',
    '/img/artists/hardwell/banner.jpg',
    '/img/artists/hardwell/pictogram.jpg'
  ),
  (
    2,
    'Martin Garrix',
    'Martijn Gerard Garritsen, known professionally as Martin Garrix, is a Dutch DJ and record producer from Amstelveen. His most known singles are "Animals", "In the Name of Love", and "Scared to be Lonely". He was ranked number one on DJ Mag''s Top 100 DJs list for three consecutive years (2016, 2017, and 2018).',
    '/img/artists/martingarrix/banner.jpg',
    '/img/artists/martingarrix/pictogram.jpg'
  ),
  (
    3,
    'Tiesto',
    'Tijs Michiel Verwest OON, known professionally as Tiësto, is a Dutch DJ and record producer from Breda. He was named "the Greatest DJ of All Time" by Mix magazine in a poll voted by the fans. In 2013, he was voted by DJ Mag readers as the "best DJ of the last 20 years".',
    '/img/artists/tiesto/banner.jpg',
    '/img/artists/tiesto/pictogram.jpg'
  ),
  (
    4,
    'Armin van Buuren',
    'Armin Jozef Jacobus Daniël van Buuren OON is a Dutch DJ, record producer and remixer from South Holland. Since 2001, he has hosted A State of Trance, a weekly radio show, which is broadcast to nearly 40 million listeners in 84 countries on over 100 FM radio stations.',
    '/img/artists/arminvanbuuren/banner.jpg',
    '/img/artists/arminvanbuuren/pictogram.jpg'
  ),
  (
    5,
    'David Guetta',
    'Pierre David Guetta is a French DJ, record producer and songwriter. He has sold over nine million albums and 30 million singles worldwide. In 2011, Guetta was voted as the number one DJ in the DJ Mag Top 100 DJs poll.',
    '/img/artists/davidguetta/banner.jpg',
    '/img/artists/davidguetta/pictogram.jpg'
  );

DROP TABLE IF EXISTS `shoppingcart`;

CREATE TABLE `shoppingcart` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

INSERT INTO
  `shoppingcart` (`id`, `userID`)
VALUES
  (1, 1);

DROP TABLE IF EXISTS `song`;

CREATE TABLE `song` (
  `id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `song` text NOT NULL,
  `cover` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

INSERT INTO
  `song` (`id`, `artist_id`, `song`, `cover`)
VALUES
  (
    1,
    1,
    '/audio/spaceman.mp3',
    '/audio/spaceman.jpg'
  ),
  (
    2,
    1,
    '/audio/apollo.mp3',
    '/audio/apollo.jpg'
  ),
  (
    3,
    1,
    '/audio/animals.mp3',
    '/audio/animals.jpg'
  ),
  (
    4,
    2,
    '/audio/inthenameoflove.mp3',
    '/audio/inthenameoflove.jpg'
  ),
  (
    5,
    2,
    '/audio/scaredtobelonely.mp3',
    '/audio/scaredtobelonely.jpg'
  ),
  (
    6,
    2,
    '/audio/summerdays.mp3',
    '/audio/summerdays.jpg'
  ),
  (
    7,
    3,
    '/audio/boom.mp3',
    '/audio/boom.jpg'
  ),
  (
    8,
    3,
    '/audio/secrets.mp3',
    '/audio/secrets.jpg'
  ),
  (
    9,
    3,
    '/audio/shotme.mp3',
    '/audio/shotme.jpg'
  ),
  (
    10,
    4,
    '/audio/blahblah.mp3',
    '/audio/blahblah.jpg'
  ),
  (
    11,
    4,
    '/audio/thisiswhatitfeelslike.mp3',
    '/audio/thisiswhatitfeelslike.jpg'
  ),
  (
    12,
    4,
    '/audio/nofun.mp3',
    '/audio/nofun.jpg'
  ),
  (
    13,
    5,
    '/audio/hey.mp3',
    '/audio/hey.jpg'
  ),
  (
    14,
    5,
    '/audio/lovers.mp3',
    '/audio/lovers.jpg'
  ),
  (
    15,
    5,
    '/audio/whenlove.mp3',
    '/audio/whenlove.jpg'
  );

DROP TABLE IF EXISTS `tickets`;

CREATE TABLE `tickets` (
  `ticketID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(5) NOT NULL,
  `shoppingcartID` int(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

INSERT INTO
  `tickets` (
    `ticketID`,
    `userID`,
    `title`,
    `description`,
    `quantity`,
    `shoppingcartID`
  )
VALUES
  (
    1,
    1,
    ' Concert Ticket ',
    ' Admission to the live concert event ',
    6,
    1
  ),
  (
    2,
    1,
    ' Movie Ticket ',
    ' Admission to the latest blockbuster movie ',
    2,
    1
  ),
  (
    3,
    1,
    ' Sports Ticket ',
    ' Admission to the championship game ',
    2,
    1
  ),
  (
    4,
    1,
    ' Historical Tour ',
    ' This is a Historical Tour around Haarlem ',
    2,
    1
  ),
  (
    5,
    1,
    ' Music event Reservation ',
    ' This is a reservation for music event 1 ',
    1,
    1
  );

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `hashed_password` varchar(255) DEFAULT NULL,
  `gender` enum(' male ', ' female ', ' other ') DEFAULT NULL,
  `role` varchar(30) NOT NULL DEFAULT ' user '
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

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
    ' Thijs ',
    ' Moerland ',
    ' Moerland8 @gmail.com ',
    ' 2024 -02 -06 ',
    ' Söderblomstraat ',
    ' + 31681340798 ',
    ' $ 2y $ 10 $ g0Utg1sdjjKnHemh85vCAeb0l7CaydEbcxByRDvJ8b72bmbNcCoG2 ',
    ' male ',
    ' admin '
  );

ALTER TABLE
  `artist`
ADD
  PRIMARY KEY (`id`);

ALTER TABLE
  `shoppingcart`
ADD
  PRIMARY KEY (`id`);

ALTER TABLE
  `song`
ADD
  PRIMARY KEY (`id`),
ADD
  KEY `FOREIGN` (`artist_id`);

ALTER TABLE
  `tickets`
ADD
  PRIMARY KEY (`ticketID`);

ALTER TABLE
  `user`
ADD
  PRIMARY KEY (`user_id`);

ALTER TABLE
  `artist`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE
  `shoppingcart`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;

ALTER TABLE
  `song`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE
  `tickets`
MODIFY
  `ticketID` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 7;

ALTER TABLE
  `user`
MODIFY
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;

ALTER TABLE
  `song`
ADD
  CONSTRAINT `FOREIGN` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;