-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2016 at 07:48 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `arah`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `html` varchar(2000) NOT NULL,
  `points` int(4) NOT NULL,
  `difficulty` varchar(10) NOT NULL,
  `filename` varchar(13) NOT NULL,
  `title` varchar(400) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `html`, `points`, `difficulty`, `filename`, `title`) VALUES
(1, '<strong>Objective</strong>\n<p>\nIn this challenge, we review some basic concepts that will get you started with this series. You will need to use the same (or similar) syntax to read input and write output in challenges throughout HackerRank. Check out the Tutorial tab for learning materials and an instructional video!</p>\n<strong>Task </strong>\n<p>To complete this challenge, you must save a line of input from stdin to a variable, print Hello, World. on a single line, and finally print the value of your variable on a second line.</p>', 0, 'easy', '57bd1743d1bfc', 'Day 0: Hello, World.'),
(2, 'http://localhost/phpmyadmin/#PMAURL-19:tbl_change.php?db=arah&table=questions&server=1&target=&token=7732959bafc9ee7fc2fbce1fb5d58cb6', 20, 'difficult', 'void', 'Day 1: Data Types'),
(3, 'http://localhost/phpmyadmin/#PMAURL-19:tbl_change.php?db=arah&table=questions&server=1&target=&token=7732959bafc9ee7fc2fbce1fb5d58cb6', 50, 'Advanced', 'void', 'Day 3: Intro to Conditional Statements');

-- --------------------------------------------------------

--
-- Table structure for table `unfinished`
--

CREATE TABLE IF NOT EXISTS `unfinished` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `unfinished`
--

INSERT INTO `unfinished` (`id`, `filename`) VALUES
(17, '57bd1743d1bfc'),
(18, '57bd17adc6e75'),
(19, '57bd17e5a5ff6'),
(20, '57bd187d236a7'),
(21, '57bd189a172c7'),
(22, '57bd18cb90516'),
(23, '57bd194ad6626'),
(24, '57bd1978c56a5'),
(25, '57bd1a939dfe7'),
(26, '57bd1aae891be'),
(27, '57bd1b34686ad'),
(28, '57bd1ce30096b'),
(29, '57bd226be32a6'),
(30, '57bd2465a0d20'),
(31, '57bd277786632'),
(32, '57bd27985641e'),
(33, '57bd27b6a4451'),
(34, '57bd27dc349d6'),
(35, '57bd282442933'),
(36, '57bd2947bbd47'),
(37, '57bd295ea2f6c'),
(38, '57bd2b8eef0ab'),
(39, '57bd2bc590ea3'),
(40, '57bd2bde22126'),
(41, '57bd3072741fd'),
(42, '57bd30b626166'),
(43, '57bd30eae3e54'),
(44, '57bd3101975eb'),
(45, '57bd330f1ae73'),
(46, '57bd339e33b98'),
(47, '57bd33f429f8a'),
(48, '57bd349fb7f0a'),
(49, '57bd34cfeef93'),
(50, '57bd35193129a'),
(51, '57bd35a4b2bf4'),
(52, '57bd35ce2755e'),
(53, '57bd498f9f9d2'),
(54, '57bd69203a29c');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(20) NOT NULL,
  `u_pass` varchar(20) NOT NULL,
  `institute` varchar(60) NOT NULL,
  `year` varchar(20) NOT NULL,
  `branch` varchar(60) NOT NULL,
  PRIMARY KEY (`u_id`,`u_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_pass`, `institute`, `year`, `branch`) VALUES
(1, 'sangeet', 'pass', 'NIT Rourkela', 'Third', 'Computer Science and Engineering');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
