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

DROP TABLE IF EXISTS `user_type`;
CREATE TABLE `user_type` (
  `type` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_type` (`type`, `name`) VALUES
(1,	'administrator'),
(2,	'poster');

-- 2017-11-29 03:30:03
