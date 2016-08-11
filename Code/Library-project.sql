-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 04 月 30 日 21:36
-- 服务器版本: 5.5.29-ndb-7.2.10-cluster-gpl
-- PHP 版本: 5.3.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `Library-project`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `contact` char(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `password`, `name`, `contact`) VALUES
(1, '123456', 'miaow', '15267011111'),
(2, '234567', 'woof', '12382450');

-- --------------------------------------------------------

--
-- 表的结构 `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` char(15) CHARACTER SET latin1 NOT NULL,
  `category` varchar(20) CHARACTER SET latin1 NOT NULL,
  `title` varchar(40) CHARACTER SET latin1 NOT NULL,
  `publisher` varchar(30) CHARACTER SET latin1 NOT NULL,
  `year` year(4) NOT NULL,
  `author` varchar(20) CHARACTER SET latin1 NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `total` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `book_id` (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- 转存表中的数据 `book`
--

INSERT INTO `book` (`id`, `book_id`, `category`, `title`, `publisher`, `year`, `author`, `price`, `total`, `stock`) VALUES
(45, '24601', 'è˜‘è‡', '21å¤©ç²¾é€šè˜‘è‡ç§æ¤', 'è˜‘è‡å‡ºç‰ˆç¤¾', 2000, 'é¸¡è…¿è‡', '156.00', 16, 16),
(46, '24602', 'è˜‘è‡', 'è˜‘è‡å…»æŠ¤100è®²', 'è˜‘è‡å‡ºç‰ˆç¤¾', 1997, 'é‡‘é’ˆè‡', '33.00', 6, 6),
(48, '73022', 'è®¡ç®—æœº', 'Cç¨‹åºè®¾è®¡(ç¬¬4ç‰ˆ)', 'æ¸…åŽå¤§å­¦å‡ºç‰ˆç¤¾', 2010, 'è°­æµ©å¼º', '23.00', 3, 3),
(49, '97873', 'è®¡ç®—æœº', 'FORTRAN77ç¨‹åºè®¾è®¡', 'æ¹–å—äººæ°‘å‡ºç‰ˆç¤¾', 1990, 'è°­æµ©å¼º', '22.00', 1, 1),
(50, '12114', 'è®¡ç®—æœº', 'è¿åŠ¨ä¿å¥/å¤•é˜³çº¢ä¸›ä¹¦', 'ä¸­åŽŸå†œæ°‘å‡ºç‰ˆç¤¾', 1999, 'è°­æµ©å¼º', '8.50', 2, 2),
(51, '53307', 'è®¡ç®—æœº', 'å› ç‰¹ç½‘æ—¶å°š', 'ä¸­å›½é“é“å‡ºç‰ˆç¤¾', 2003, 'è°­æµ©å¼º', '20.00', 4, 4),
(52, '40149', 'è®¡ç®—æœº', 'å¤§å­¦æ–‡ç§‘è®¡ç®—æœºæ•™ç¨‹', 'æ¸…åŽå¤§å­¦å‡ºç‰ˆç¤¾', 2000, 'è°­æµ©å¼º', '11.00', 2, 2),
(53, '38476', 'åŠ±å¿—', 'å¾®ä¿¡å®å…¸', 'æµ™æ±Ÿå¤§å­¦å‡ºç‰ˆç¤¾', 2012, 'å»¶å‚æ³•å¸ˆ', '99.00', 10, 10),
(54, 'JS898', 'åŠ±å¿—', '21å¤©å…¬å¸ä¸Šå¸‚', 'æµ™æ±Ÿå¤§å­¦å‡ºç‰ˆç¤¾', 2012, 'å»¶å‚æ³•å¸ˆ', '62.40', 3, 2),
(55, '12', 'meow', 'meowmeow', 'meowpublisher', 1928, 'meow', '36.00', 24, 24),
(56, 'book_no_1', 'category7', 'book1', 'press2', 1950, 'author1', '156.00', 48, 48),
(66, 'book_no_2', 'category8', 'book2', 'press7', 1997, 'author4', '33.00', 12, 12),
(67, 'book_no_3', 'category6', 'book3', 'press3', 1947, 'author1', '199.00', 34, 34),
(68, 'book_no_4', 'category10', 'book4', 'press9', 1947, 'author9', '135.00', 12, 12),
(69, 'book_no_5', 'category8', 'book5', 'press4', 1990, 'author3', '32.00', 10, 10),
(70, 'book_no_6', 'category5', 'book6', 'press2', 1943, 'author6', '61.00', 40, 40),
(71, 'book_no_7', 'category7', 'book7', 'press4', 1973, 'author4', '131.00', 20, 20),
(72, 'book_no_8', 'category1', 'book8', 'press7', 1965, 'author9', '82.00', 32, 32),
(73, 'book_no_9', 'category4', 'book9', 'press2', 1983, 'author8', '100.00', 38, 38),
(74, 'book_no_10', 'category4', 'book10', 'press4', 1919, 'author6', '18.00', 4, 4);

-- --------------------------------------------------------

--
-- 表的结构 `borrow`
--

CREATE TABLE IF NOT EXISTS `borrow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `borrow_date` date DEFAULT NULL,
  `limit_date` date DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`),
  KEY `card_id` (`card_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `borrow`
--

INSERT INTO `borrow` (`id`, `book_id`, `card_id`, `borrow_date`, `limit_date`, `admin_id`) VALUES
(30, 54, 1, '2013-04-24', '2013-05-24', 1);

-- --------------------------------------------------------

--
-- 表的结构 `card`
--

CREATE TABLE IF NOT EXISTS `card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `department` varchar(40) NOT NULL,
  `type` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=902050113 ;

--
-- 转存表中的数据 `card`
--

INSERT INTO `card` (`id`, `name`, `department`, `type`) VALUES
(1, 'miaow', 'Computer Science', 'T'),
(2, 'Sal', 'Art', ''),
(3, 'cs', 'cs', ''),
(4, 'mmmm', 'mmmmmm', 'm'),
(5, 'miaow', 'miaow', 'm'),
(902050112, 'Aly-Shah Jamal', 'CS', 'C');

--
-- 限制导出的表
--

--
-- 限制表 `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`card_id`) REFERENCES `card` (`id`),
  ADD CONSTRAINT `borrow_ibfk_3` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
