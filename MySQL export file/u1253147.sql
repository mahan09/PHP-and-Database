-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2013 at 09:34 PM
-- Server version: 5.5.34
-- PHP Version: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u1253147`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `car_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `car_make` varchar(40) NOT NULL,
  `car_model` varchar(40) NOT NULL,
  `car_fuel` varchar(30) NOT NULL,
  `car_transmission` varchar(30) NOT NULL,
  `car_colour` varchar(30) NOT NULL,
  `car_image` varchar(500) NOT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_id`, `car_make`, `car_model`, `car_fuel`, `car_transmission`, `car_colour`, `car_image`) VALUES
(1, 'BMW', 'M5', 'Petrol', 'Automatic', 'Black', 'https://selene.hud.ac.uk/u1253147/blacked-out-bmw-m5-hd-wo7mxrqr.jpg'),
(2, 'Merecedes Benz', 'CLS 350', 'Petrol', 'Automatic', 'White', 'https://selene.hud.ac.uk/u1253147/large_13674009161474070585.jpg'),
(3, 'Buggati', 'Veyron', 'Petrol', 'Multi-tronic', 'Blue', 'https://selene.hud.ac.uk/u1253147/images (1).jpg'),
(4, 'Ferrari', 'F500', 'Petrol', 'Multi-tronic', 'Red', 'https://selene.hud.ac.uk/u1253147/ferrari_enzo.jpg'),
(5, 'Lambourghini', 'Aventador', 'Petrol', 'Multi-Tronic', 'Yellow', 'https://selene.hud.ac.uk/u1253147/tumblr_lkmwm6Xp661qjg0yqo1_r1_500.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `driver_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `driver_first_name` varchar(40) NOT NULL,
  `driver_last_name` varchar(40) NOT NULL,
  `driver_gender` varchar(40) NOT NULL,
  `driver_date_of_birth` date NOT NULL,
  `health_condition` varchar(40) NOT NULL,
  `car_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`driver_id`),
  KEY `fk_dri_car` (`car_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `driver_first_name`, `driver_last_name`, `driver_gender`, `driver_date_of_birth`, `health_condition`, `car_id`) VALUES
(1, 'Mahan', 'Zeraat', 'Male', '2013-11-06', 'Good', 1),
(2, 'Bilal', 'Younas', 'Male', '2013-11-15', 'Very Good', 2),
(3, 'Shaj', 'Shah', 'Male', '2003-03-13', 'Not good', 3),
(4, 'Shirjeel', 'Shah', 'Male', '2008-07-14', 'Normal', 4),
(5, 'Sam', 'Johson', 'Male', '2008-11-06', 'Good', 5);

-- --------------------------------------------------------

--
-- Table structure for table `gym`
--

CREATE TABLE IF NOT EXISTS `gym` (
  `gym_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gym_name` varchar(40) NOT NULL,
  `gym_town` varchar(40) NOT NULL,
  `gym_city` varchar(40) NOT NULL,
  `gym_postcode` varchar(15) NOT NULL,
  `personal_id` int(10) unsigned NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `gym_found_year` year(4) NOT NULL,
  `county` varchar(40) NOT NULL,
  PRIMARY KEY (`gym_id`),
  KEY `fk_per_personaltrainer` (`personal_id`),
  KEY `fk_mem_member` (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `gym`
--

INSERT INTO `gym` (`gym_id`, `gym_name`, `gym_town`, `gym_city`, `gym_postcode`, `personal_id`, `member_id`, `gym_found_year`, `county`) VALUES
(3, 'Click fitness', 'Rochdale', 'Manchester', 'M7HN7D', 3, 3, 2010, 'Lancashire'),
(4, 'You Fitness', 'Whitefield', 'Derby', 'D5KL8F', 4, 4, 2009, 'West Midland'),
(11, 'BBW Fitness', 'Salford', 'Leeds', 'LD7HN8', 5, 5, 2008, 'Lancashire'),
(14, 'Active Fitness', 'Prestwich', 'Lancaster', 'lan7hn', 6, 6, 2012, 'West Midland'),
(53, 'Live Fitness', 'Bury', 'Manchester', 'M458HN', 4, 4, 2013, 'Lancashire');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_first_name` varchar(40) NOT NULL,
  `member_last_name` varchar(40) NOT NULL,
  `member_date_of_birth` date NOT NULL,
  `member_city` varchar(30) NOT NULL,
  `member_postcode` varchar(15) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_first_name`, `member_last_name`, `member_date_of_birth`, `member_city`, `member_postcode`) VALUES
(3, 'Bilal', 'Younas', '2013-11-13', 'Blackburn', 'BL5HN7'),
(4, 'Shirjeel', 'Nass', '2013-11-15', 'Glasgow', 'GL7HN8'),
(5, 'Sam', 'Johnson', '2004-02-17', 'Huddersfield', 'HD46HN'),
(6, 'Daniel', 'Alexas', '2003-03-12', 'Birmingham', 'BM78HN'),
(7, 'Carl', 'Johnson', '2003-12-10', 'Wales', 'WD6 6HN');

-- --------------------------------------------------------

--
-- Table structure for table `personaltrainer`
--

CREATE TABLE IF NOT EXISTS `personaltrainer` (
  `personal_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `personal_date_of_birth` date NOT NULL,
  `personal_city` varchar(30) NOT NULL,
  `personal_postcode` varchar(9) NOT NULL,
  `personal_gender` varchar(40) NOT NULL,
  `personal_images` varchar(300) NOT NULL,
  PRIMARY KEY (`personal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `personaltrainer`
--

INSERT INTO `personaltrainer` (`personal_id`, `first_name`, `last_name`, `personal_date_of_birth`, `personal_city`, `personal_postcode`, `personal_gender`, `personal_images`) VALUES
(3, 'riley', 'Harney', '2013-11-13', 'london', 'LD45HN', 'Male', 'https://selene.hud.ac.uk/u1253147/Bodybank (15)(1).jpg'),
(4, 'Steven', 'Nikle', '2013-11-11', 'Bolton', 'DOL67N', 'Male', 'https://selene.hud.ac.uk/u1253147/fapt1.jpg'),
(5, 'David', 'Matty', '2003-04-15', 'Bradford', 'BD58HN', 'Male', 'https://selene.hud.ac.uk/u1253147/personal_trainer_courses_qualifications_container.jpg'),
(6, 'Shaj', 'Shah', '2006-11-15', 'Leeds', 'LD57HN', 'Male', 'https://selene.hud.ac.uk/u1253147/tim-jordan-personal-trainer-edinburgh2.jpg'),
(7, 'John', 'Macky', '2013-12-10', 'Bradford', 'DB5 6HN', 'Male', 'https://selene.hud.ac.uk/u1253147/01749.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `shop_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(40) NOT NULL,
  `city` varchar(30) NOT NULL,
  `postcode` varchar(9) NOT NULL,
  PRIMARY KEY (`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Song`
--

CREATE TABLE IF NOT EXISTS `Song` (
  `Song_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `artist` varchar(70) NOT NULL,
  `duration` time NOT NULL,
  `genre` varchar(30) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  PRIMARY KEY (`Song_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `Song`
--

INSERT INTO `Song` (`Song_id`, `title`, `artist`, `duration`, `genre`, `rating`) VALUES
(1, 'Here Comes The Sun', 'The Beatles', '00:03:05', 'Rock', 7),
(2, 'Jumpin'' Jack Flash', 'The Rolling Stones', '00:03:42', 'Rock', 8),
(3, 'Come In Out Of The Rain', 'Parliament', '00:02:43', 'Funk and Soul', 9),
(4, 'It Was A Good Day', 'Ice Cube ', '00:04:20', 'Rap', 8),
(5, 'Chelsea Hotel #2', 'Leonard Cohen', '00:03:06', 'Folk Rock', 8),
(6, 'Underground', 'Curtis Mayfield', '00:03:11', 'Funk and Soul', 6),
(7, 'Boyfriend', 'Justin Beiber', '00:02:52', 'Pop', 1),
(8, 'Dirty Epic', 'Underworld', '00:09:59', 'Electronica', 6),
(9, 'Illegal Business', 'Boogie Down Productions', '00:05:21', 'Rap', 7),
(10, 'Blackbird', 'The Beatles', '00:02:18', 'Rock', 7),
(11, 'The Bottle', 'Gil Scott-Heron', '00:05:14', 'Funk and Soul', 8),
(12, 'Shallow Days', 'Blackalicious', '00:04:20', 'Rap', 7),
(13, 'My Iron Lung', 'Radiohead', '00:04:36', 'Alternative Rock', 7),
(14, 'Tangled Up In Blue', 'Bob Dylan', '00:05:41', 'Folk Rock', 5),
(15, 'Arise', 'Sepultura', '00:05:41', 'Metal', 7),
(16, 'Donkey Rhubarb', 'Aphex Twin', '00:05:59', 'Electronica', 4),
(17, 'Maggot Brain ', 'Funkadelic', '00:10:20', 'Funk and Soul', 7),
(18, 'Jumpin'' Jack Flash', 'The Rolling Stones', '00:03:42', 'Rock', 8),
(19, 'Come In Out Of The Rain', 'Parliament', '00:02:43', 'Funk and Soul', 9),
(20, 'It Was A Good Day', 'Ice Cube ', '00:04:20', 'Rap', 8),
(21, 'Chelsea Hotel #2', 'Leonard Cohen', '00:03:06', 'Folk Rock', 8),
(22, 'Underground', 'Curtis Mayfield', '00:03:11', 'Funk and Soul', 6),
(23, 'Boyfriend', 'Justin Beiber', '00:02:52', 'Pop', 1),
(24, 'Dirty Epic', 'Underworld', '00:09:59', 'Electronica', 6),
(25, 'Illegal Business', 'Boogie Down Productions', '00:05:21', 'Rap', 7),
(26, 'Blackbird', 'The Beatles', '00:02:18', 'Rock', 7),
(27, 'The Bottle', 'Gil Scott-Heron', '00:05:14', 'Funk and Soul', 8),
(28, 'Shallow Days', 'Blackalicious', '00:04:20', 'Rap', 7),
(29, 'My Iron Lung', 'Radiohead', '00:04:36', 'Alternative Rock', 7),
(30, 'Tangled Up In Blue', 'Bob Dylan', '00:05:41', 'Folk Rock', 5),
(31, 'Arise', 'Sepultura', '00:05:41', 'Metal', 7),
(32, 'Donkey Rhubarb', 'Aphex Twin', '00:05:59', 'Electronica', 4),
(33, 'Maggot Brain ', 'Funkadelic', '00:10:20', 'Funk and Soul', 7);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `fk_dri_car` FOREIGN KEY (`car_id`) REFERENCES `car` (`car_id`);

--
-- Constraints for table `gym`
--
ALTER TABLE `gym`
  ADD CONSTRAINT `fk_mem_member` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `fk_per_personaltrainer` FOREIGN KEY (`personal_id`) REFERENCES `personaltrainer` (`personal_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
