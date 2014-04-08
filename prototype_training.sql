-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Tid vid skapande: 07 apr 2014 kl 21:50
-- Serverversion: 5.6.12-log
-- PHP-version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `prototype_training`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `exercises`
--

CREATE TABLE IF NOT EXISTS `exercises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(30) NOT NULL,
  `position` int(3) NOT NULL,
  `color` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumpning av Data i tabell `exercises`
--

INSERT INTO `exercises` (`id`, `menu_name`, `position`, `color`) VALUES
(1, 'Arms', 1, 0),
(2, 'Back', 1, 1),
(3, 'Chest', 1, 0),
(4, 'Shoulders', 2, 1),
(5, 'Legs', 2, 0),
(6, 'Abdominals', 2, 1),
(7, 'Cardio', 3, 0),
(8, 'Stretching', 3, 1),
(9, 'All Exercises', 3, 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `ex_page`
--

CREATE TABLE IF NOT EXISTS `ex_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ex_id` int(11) NOT NULL,
  `menu_name` varchar(30) NOT NULL,
  `position` int(3) NOT NULL,
  `img` int(11) NOT NULL,
  `img2` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumpning av Data i tabell `ex_page`
--

INSERT INTO `ex_page` (`id`, `ex_id`, `menu_name`, `position`, `img`, `img2`, `content`) VALUES
(1, 1, 'Dumbell Biceps Curl', 1, 1, 2, 'Vivamus dignissim tempus porttitor. Donec volutpat nisi purus, vulputate tempus odio scelerisque tempus. Donec lobortis libero vitae leo faucibus pellentesque. '),
(2, 1, 'Dumbell Biceps Hammer Curl', 2, 3, 4, 'Vivamus dignissim tempus porttitor. Donec volutpat nisi purus, vulputate tempus odio scelerisque tempus. Donec lobortis libero vitae leo faucibus pellentesque. '),
(3, 1, 'Triceps Extension', 3, 5, 6, 'Vivamus dignissim tempus porttitor. Donec volutpat nisi purus, vulputate tempus odio scelerisque tempus. Donec lobortis libero vitae leo faucibus pellentesque. '),
(4, 1, 'Triceps Pushdown', 4, 7, 8, 'Vivamus dignissim tempus porttitor. Donec volutpat nisi purus, vulputate tempus odio scelerisque tempus. Donec lobortis libero vitae leo faucibus pellentesque. '),
(5, 2, 'Barbell Bent-Over Row', 1, 9, 10, 'Vivamus dignissim tempus porttitor. Donec volutpat nisi purus, vulputate tempus odio scelerisque tempus. Donec lobortis libero vitae leo faucibus pellentesque. '),
(6, 2, 'Lat Pulldown', 2, 11, 12, 'Vivamus dignissim tempus porttitor. Donec volutpat nisi purus, vulputate tempus odio scelerisque tempus. Donec lobortis libero vitae leo faucibus pellentesque. '),
(7, 3, 'Bench Press', 1, 13, 14, 'Vivamus dignissim tempus porttitor. Donec volutpat nisi purus, vulputate tempus odio scelerisque tempus. Donec lobortis libero vitae leo faucibus pellentesque. '),
(8, 3, 'Bumbell Flyes', 2, 15, 16, 'Vivamus dignissim tempus porttitor. Donec volutpat nisi purus, vulputate tempus odio scelerisque tempus. Donec lobortis libero vitae leo faucibus pellentesque. '),
(9, 3, 'Push Ups', 3, 17, 18, 'Vivamus dignissim tempus porttitor. Donec volutpat nisi purus, vulputate tempus odio scelerisque tempus. Donec lobortis libero vitae leo faucibus pellentesque. '),
(10, 4, 'Dumbell Shoulder Pess', 1, 19, 20, 'Vivamus dignissim tempus porttitor. Donec volutpat nisi purus, vulputate tempus odio scelerisque tempus. Donec lobortis libero vitae leo faucibus pellentesque. '),
(11, 4, 'Side Lateral Press', 2, 21, 22, 'Vivamus dignissim tempus porttitor. Donec volutpat nisi purus, vulputate tempus odio scelerisque tempus. Donec lobortis libero vitae leo faucibus pellentesque. '),
(12, 5, 'Squats', 1, 23, 24, 'Vivamus dignissim tempus porttitor. Donec volutpat nisi purus, vulputate tempus odio scelerisque tempus. Donec lobortis libero vitae leo faucibus pellentesque. '),
(13, 5, 'Leg Press', 2, 25, 26, 'Vivamus dignissim tempus porttitor. Donec volutpat nisi purus, vulputate tempus odio scelerisque tempus. Donec lobortis libero vitae leo faucibus pellentesque. '),
(14, 6, 'Crhunches', 1, 27, 28, 'Vivamus dignissim tempus porttitor. Donec volutpat nisi purus, vulputate tempus odio scelerisque tempus. Donec lobortis libero vitae leo faucibus pellentesque. ');

-- --------------------------------------------------------

--
-- Tabellstruktur `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `work_id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `mounth` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `workout`
--

CREATE TABLE IF NOT EXISTS `workout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumpning av Data i tabell `workout`
--

INSERT INTO `workout` (`id`, `menu_name`) VALUES
(6, 'test'),
(12, 'bajs'),
(13, 'testWorkout'),
(16, 'Monday');

-- --------------------------------------------------------

--
-- Tabellstruktur `workout_ex`
--

CREATE TABLE IF NOT EXISTS `workout_ex` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `work_id` int(11) NOT NULL,
  `ex_id` int(11) NOT NULL,
  `set_rep` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `work_log`
--

CREATE TABLE IF NOT EXISTS `work_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ex_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `rep` int(11) NOT NULL,
  `set_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `work_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumpning av Data i tabell `work_log`
--

INSERT INTO `work_log` (`id`, `ex_id`, `date`, `month`, `year`, `rep`, `set_id`, `weight`, `work_id`) VALUES
(24, 5, 5, 4, 2014, 12, 5, 50, 6),
(30, 5, 2, 4, 2014, 2, 3, 80, 6);

-- --------------------------------------------------------

--
-- Tabellstruktur `work_page`
--

CREATE TABLE IF NOT EXISTS `work_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `work_id` int(11) NOT NULL,
  `menu_name` varchar(30) NOT NULL,
  `exercise_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumpning av Data i tabell `work_page`
--

INSERT INTO `work_page` (`id`, `work_id`, `menu_name`, `exercise_id`) VALUES
(4, 6, '', 5),
(5, 13, '', 7),
(6, 6, '', 14),
(7, 13, '', 8),
(9, 6, '', 5),
(10, 6, '', 1),
(11, 6, '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
