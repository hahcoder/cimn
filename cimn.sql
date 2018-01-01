-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `mid_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `customer` (`id`, `user_name`, `password`, `first_name`, `mid_name`, `last_name`, `type`, `email`) VALUES
(1,	'hah',	'a24d1d2836b0c5aab059e3148bf34ab4',	'Ha',	'',	'Hoang',	1,	'hahoang.coder@gmail.com');

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `keyword` text NOT NULL,
  `date_edit` datetime NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `date_create` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `posts` (`id`, `title`, `content`, `keyword`, `date_edit`, `user_name`, `image`, `date_create`) VALUES
(6,	'Quán ăn Mẹt Khói',	'<p><strong>Test CkEditor</strong></p>\r\n\r\n<p><em>Mẹ ơi đừng g&atilde; con xa</em></p>\r\n\r\n<p><em>G&atilde; con qua &Uacute;c, qua Nga được rồi</em></p>\r\n\r\n<p><strong>Hah</strong></p>\r\n',	'món ngon',	'2017-12-26 09:57:34',	'hah',	'https://scontent.fdad3-1.fna.fbcdn.net/v/t1.0-9/14225540_1757409201183882_5434072354305871087_n.jpg?oh=0bf19a38d3a5eba3ec290f221170f2d1&oe=5AF958D4',	'2017-12-21 09:06:20'),
(34,	'Quán ăn Mẹt Khói 1',	'<p>Nội dung post test</p>\r\n',	'',	'2017-12-28 10:17:17',	'hah',	'https://scontent.fdad3-1.fna.fbcdn.net/v/t1.0-9/14225540_1757409201183882_5434072354305871087_n.jpg?oh=0bf19a38d3a5eba3ec290f221170f2d1&oe=5AF958D4',	'2017-12-28 10:17:17'),
(35,	'Quán ăn Mẹt Khói 2',	'<p>Nội dung post test</p>\r\n',	'',	'2017-12-28 10:17:17',	'hah',	'https://scontent.fdad3-1.fna.fbcdn.net/v/t1.0-9/14225540_1757409201183882_5434072354305871087_n.jpg?oh=0bf19a38d3a5eba3ec290f221170f2d1&oe=5AF958D4',	'2017-12-28 10:17:17'),
(36,	'Quán ăn Mẹt Khói 3',	'<p>Nội dung post test</p>\r\n',	'',	'2017-12-28 10:17:17',	'hah',	'https://scontent.fdad3-1.fna.fbcdn.net/v/t1.0-9/14225540_1757409201183882_5434072354305871087_n.jpg?oh=0bf19a38d3a5eba3ec290f221170f2d1&oe=5AF958D4',	'2017-12-28 10:17:17'),
(37,	'Quán ăn Mẹt Khói 4',	'<p>Nội dung post test</p>\r\n',	'',	'2017-12-28 10:17:17',	'hah',	'https://scontent.fdad3-1.fna.fbcdn.net/v/t1.0-9/14225540_1757409201183882_5434072354305871087_n.jpg?oh=0bf19a38d3a5eba3ec290f221170f2d1&oe=5AF958D4',	'2017-12-28 10:17:17'),
(38,	'Quán ăn Mẹt Khói 5',	'<p>Nội dung post test</p>\r\n',	'',	'2017-12-28 10:17:17',	'hah',	'https://scontent.fdad3-1.fna.fbcdn.net/v/t1.0-9/14225540_1757409201183882_5434072354305871087_n.jpg?oh=0bf19a38d3a5eba3ec290f221170f2d1&oe=5AF958D4',	'2017-12-28 10:17:17'),
(39,	'Quán ăn Mẹt Khói 6',	'<p>Nội dung post test</p>\r\n',	'',	'2017-12-28 10:17:17',	'hah',	'https://scontent.fdad3-1.fna.fbcdn.net/v/t1.0-9/14225540_1757409201183882_5434072354305871087_n.jpg?oh=0bf19a38d3a5eba3ec290f221170f2d1&oe=5AF958D4',	'2017-12-28 10:17:17'),
(40,	'Quán ăn Mẹt Khói 7',	'<p>Nội dung post test</p>\r\n',	'',	'2017-12-28 10:17:17',	'hah',	'https://scontent.fdad3-1.fna.fbcdn.net/v/t1.0-9/14225540_1757409201183882_5434072354305871087_n.jpg?oh=0bf19a38d3a5eba3ec290f221170f2d1&oe=5AF958D4',	'2017-12-28 10:17:17'),
(41,	'Quán ăn Mẹt Khói 8',	'<p>Nội dung post test</p>\r\n',	'',	'2017-12-28 10:17:17',	'hah',	'https://scontent.fdad3-1.fna.fbcdn.net/v/t1.0-9/14225540_1757409201183882_5434072354305871087_n.jpg?oh=0bf19a38d3a5eba3ec290f221170f2d1&oe=5AF958D4',	'2017-12-28 10:17:17'),
(42,	'Quán ăn Mẹt Khói 9',	'<p>Nội dung post test</p>\r\n',	'',	'2017-12-28 10:17:17',	'hah',	'https://scontent.fdad3-1.fna.fbcdn.net/v/t1.0-9/14225540_1757409201183882_5434072354305871087_n.jpg?oh=0bf19a38d3a5eba3ec290f221170f2d1&oe=5AF958D4',	'2017-12-28 10:17:17'),
(43,	'Quán ăn Mẹt Khói 10',	'<p>Nội dung post test</p>\r\n',	'',	'2017-12-28 10:17:17',	'hah',	'https://scontent.fdad3-1.fna.fbcdn.net/v/t1.0-9/14225540_1757409201183882_5434072354305871087_n.jpg?oh=0bf19a38d3a5eba3ec290f221170f2d1&oe=5AF958D4',	'2017-12-28 10:17:17'),
(44,	'Quán ăn Mẹt Khói 11',	'<p>Nội dung post test</p>\r\n',	'',	'2017-12-28 10:17:17',	'hah',	'https://scontent.fdad3-1.fna.fbcdn.net/v/t1.0-9/14225540_1757409201183882_5434072354305871087_n.jpg?oh=0bf19a38d3a5eba3ec290f221170f2d1&oe=5AF958D4',	'2017-12-28 10:17:17'),
(45,	'Quán ăn Mẹt Khói 12',	'<p>Nội dung post test</p>\r\n',	'',	'2017-12-28 10:17:17',	'hah',	'https://scontent.fdad3-1.fna.fbcdn.net/v/t1.0-9/14225540_1757409201183882_5434072354305871087_n.jpg?oh=0bf19a38d3a5eba3ec290f221170f2d1&oe=5AF958D4',	'2017-12-28 10:17:17'),
(46,	'Quán ăn Mẹt Khói 13',	'<p>Nội dung post test</p>\r\n',	'',	'2017-12-28 10:17:17',	'hah',	'https://scontent.fdad3-1.fna.fbcdn.net/v/t1.0-9/14225540_1757409201183882_5434072354305871087_n.jpg?oh=0bf19a38d3a5eba3ec290f221170f2d1&oe=5AF958D4',	'2017-12-28 10:17:17'),
(47,	'Quán ăn Mẹt Khói 14',	'<p>Nội dung post test</p>\r\n',	'',	'2017-12-28 10:17:17',	'hah',	'https://scontent.fdad3-1.fna.fbcdn.net/v/t1.0-9/14225540_1757409201183882_5434072354305871087_n.jpg?oh=0bf19a38d3a5eba3ec290f221170f2d1&oe=5AF958D4',	'2017-12-28 10:17:17'),
(48,	'Quán ăn Mẹt Khói 15',	'<p>Nội dung post test</p>\r\n',	'',	'2017-12-28 10:17:17',	'hah',	'https://scontent.fdad3-1.fna.fbcdn.net/v/t1.0-9/14225540_1757409201183882_5434072354305871087_n.jpg?oh=0bf19a38d3a5eba3ec290f221170f2d1&oe=5AF958D4',	'2017-12-28 10:17:17'),
(49,	'Quán ăn Mẹt Khói 16',	'<p>Nội dung post test</p>\r\n',	'',	'2017-12-28 10:17:17',	'hah',	'https://scontent.fdad3-1.fna.fbcdn.net/v/t1.0-9/14225540_1757409201183882_5434072354305871087_n.jpg?oh=0bf19a38d3a5eba3ec290f221170f2d1&oe=5AF958D4',	'2017-12-28 10:17:17'),
(50,	'Quán ăn Mẹt Khói 17',	'<p>Nội dung post test</p>\r\n',	'',	'2017-12-28 10:17:17',	'hah',	'https://scontent.fdad3-1.fna.fbcdn.net/v/t1.0-9/14225540_1757409201183882_5434072354305871087_n.jpg?oh=0bf19a38d3a5eba3ec290f221170f2d1&oe=5AF958D4',	'2017-12-28 10:17:17'),
(51,	'Quán ăn Mẹt Khói 18',	'<p>Nội dung post test</p>\r\n',	'',	'2017-12-28 10:17:17',	'hah',	'https://scontent.fdad3-1.fna.fbcdn.net/v/t1.0-9/14225540_1757409201183882_5434072354305871087_n.jpg?oh=0bf19a38d3a5eba3ec290f221170f2d1&oe=5AF958D4',	'2017-12-28 10:17:17'),
(52,	'Quán ăn Mẹt Khói 19',	'<p>Nội dung post test</p>\r\n',	'',	'2017-12-28 10:17:17',	'hah',	'https://scontent.fdad3-1.fna.fbcdn.net/v/t1.0-9/14225540_1757409201183882_5434072354305871087_n.jpg?oh=0bf19a38d3a5eba3ec290f221170f2d1&oe=5AF958D4',	'2017-12-28 10:17:17'),
(53,	'Quán ăn Mẹt Khói 20',	'<p>Nội dung post test</p>\r\n',	'',	'2017-12-28 10:17:17',	'hah',	'https://scontent.fdad3-1.fna.fbcdn.net/v/t1.0-9/14225540_1757409201183882_5434072354305871087_n.jpg?oh=0bf19a38d3a5eba3ec290f221170f2d1&oe=5AF958D4',	'2017-12-28 10:17:17');

DROP TABLE IF EXISTS `posts_config`;
CREATE TABLE `posts_config` (
  `limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `posts_config` (`limit`) VALUES
(20);

DROP TABLE IF EXISTS `user_type`;
CREATE TABLE `user_type` (
  `type` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_type` (`type`, `name`) VALUES
(1,	'administrator'),
(2,	'poster');

-- 2018-01-01 10:41:55
