-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2016 at 05:50 PM
-- Server version: 5.6.29
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yoteyote_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pword` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_bank`
--

CREATE TABLE IF NOT EXISTS `admin_bank` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bank` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `currency_setting`
--

CREATE TABLE IF NOT EXISTS `currency_setting` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate` decimal(10,0) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `deduction`
--

CREATE TABLE IF NOT EXISTS `deduction` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mobile` double DEFAULT '0',
  `transc` double DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE IF NOT EXISTS `listings` (
  `list_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `list_date` datetime DEFAULT '0000-00-00 00:00:00',
  `bid` int(10) DEFAULT NULL,
  PRIMARY KEY (`list_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `headline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `ongoing`
--

CREATE TABLE IF NOT EXISTS `ongoing` (
  `on_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `post_by_user_id` int(11) unsigned DEFAULT NULL,
  `won_by_user_id` int(11) unsigned DEFAULT NULL,
  `on_amount` int(11) unsigned DEFAULT NULL,
  `post_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`on_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `post_user_id` int(11) unsigned NOT NULL,
  `post_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_content` text COLLATE utf8_unicode_ci NOT NULL,
  `post_type` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_amount` int(11) unsigned NOT NULL,
  `post_currency` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `post_pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_views` int(11) DEFAULT '0',
  `post_active` enum('yes','no') COLLATE utf8_unicode_ci DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_user_id`, `post_title`, `post_slug`, `post_content`, `post_type`, `post_category_id`, `post_amount`, `post_currency`, `post_pic`, `post_created_at`, `post_updated_at`, `post_views`, `post_active`) VALUES
(14, 31, 'design a logo in 2 hours', '', 'With the experience and expertise, I can design you a logo that is professional and unique within 2 hours', 'will', 0, 30000, 'Tshs', NULL, '2015-11-26 16:01:31', '0000-00-00 00:00:00', 0, 'yes'),
(15, 31, 'Tomb Raider PS4 Game', '', 'Am looking for the latest Tomb Raider PS4 Game.', 'want', 0, 80000, 'Tshs', NULL, '2015-11-26 16:03:22', '0000-00-00 00:00:00', 0, 'yes'),
(16, 32, 'sell you my Samsung 40'' TV', '', 'It is a little used but still new with remote and its Series 5', 'will', 0, 700000, 'Tshs', NULL, '2015-11-26 23:27:37', '0000-00-00 00:00:00', 0, 'yes'),
(17, 33, 'ps4 gaming', '', 'i need playstation game,  PS4', 'want', 0, 400000, 'Tshs', NULL, '2015-12-11 15:32:15', '0000-00-00 00:00:00', 0, 'yes'),
(18, 33, 'sell u my samsung laptop. new samsung series 7 for gamming.', '', 'i sell u  all part samsung series 7.', 'will', 0, 1000000, 'Tshs', NULL, '2015-12-11 15:34:33', '0000-00-00 00:00:00', 0, 'yes'),
(19, 34, 'vectorize your logo', '', 'so you have you cannot print your logo ? or you can not put on display pic in whatsapp .. let me re-draw your  logo in highres vectors\r\n.... will do this in 1 whooole day :)', 'will', 0, 90000, 'Tshs', NULL, '2015-12-16 10:25:58', '0000-00-00 00:00:00', 0, 'yes'),
(20, 34, 'a fluent french speaker', '', 'to narrate my script for a Wheat flour TVC ... also to translate from english', 'want', 0, 30000, 'Tshs', NULL, '2015-12-16 10:28:09', '0000-00-00 00:00:00', 0, 'yes'),
(21, 35, 'Edit your 1 hour Video in 4 days', '', 'if you have recorded footages and need to edit them i will proffesionaly do it ..', 'will', 0, 800000, 'Tshs', NULL, '2015-12-25 06:44:58', '0000-00-00 00:00:00', 0, 'yes'),
(22, 35, 'Take professional wedding photos', '', 'if youi have a wedding and you dont have a camera person at this point .. i will take photos for you for 1 day event\r\nTHEN PRINT THEM FOR YOU', 'will', 0, 400000, 'Tshs', NULL, '2015-12-25 06:47:07', '0000-00-00 00:00:00', 0, 'yes'),
(23, 35, 'BLACK MAGIC CAMERA', '', 'Production Cinema camera even used ...', 'want', 0, 3000000, 'Tshs', NULL, '2015-12-25 06:49:03', '0000-00-00 00:00:00', 0, 'yes'),
(24, 38, 'h', '', 'h', 'will', 0, 0, 'USD', NULL, '2016-03-03 02:59:35', '0000-00-00 00:00:00', 0, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE IF NOT EXISTS `post_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE IF NOT EXISTS `post_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `post_views`
--

CREATE TABLE IF NOT EXISTS `post_views` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=73 ;

-- --------------------------------------------------------

--
-- Table structure for table `trust`
--

CREATE TABLE IF NOT EXISTS `trust` (
  `trust_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `trusted_by_id` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`trust_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_ip_address` varbinary(16) NOT NULL,
  `user_token` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `user_identifier` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `user_recover` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `user_remember_me` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `user_confirmed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `user_last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_created_at` datetime DEFAULT '0000-00-00 00:00:00',
  `user_updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_status` enum('active','inactive','banned','deleted') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_email`, `user_mobile`, `user_password`, `first_name`, `middle_name`, `last_name`, `user_ip_address`, `user_token`, `user_identifier`, `user_recover`, `user_remember_me`, `user_confirmed`, `user_last_login`, `user_created_at`, `user_updated_at`, `user_status`) VALUES
(31, 'neo@yoteyote.com', '0787487333', 'M42d9h&!.8614b988344512dad8fd99fb5f3b65e150e4c7e5', 'Nadhir', '', 'Bahayan', '41.222.28.44', 'a1a6942fe0605b535dec2bf7c2fe19f9f38f4f4f', '', '', 0, 0, '0000-00-00 00:00:00', '2015-11-26 16:00:01', '0000-00-00 00:00:00', 'active'),
(32, 'abdulrahimtz@yahoo.com', '0713487333', 'M42d9h&!.709d996f4dbbfadbb3b8bac7a0e219b2ca2dd1fd', 'Abdulrahim', '', 'Barahiyan', '41.222.28.44', 'ae154038e5711fed965627b9677a5356c2527fd6', '', '', 0, 0, '0000-00-00 00:00:00', '2015-11-26 23:26:17', '0000-00-00 00:00:00', 'active'),
(33, 'rhamisi43@yahoo.com', '+255655272092', 'M42d9h&!.9b3318de8b4e49b79e647d0e69148051a671ef40', 'ramadhani', '', 'khamisi', '41.222.181.160', '4609e3900c6379918159aeb032beeedcac8a2f55', '', '', 0, 0, '0000-00-00 00:00:00', '2015-12-11 15:25:45', '0000-00-00 00:00:00', 'active'),
(34, 'feisal@yoteyote.com', '0713192925', 'M42d9h&!.e0a64b0d7c7c4fd188c13b3faa7b32242a52927f', 'Feisal', '', 'Kassim', '154.73.170.197', '86b5e43763908206390d46e7b816e13ccccdf12e', '', '', 0, 0, '0000-00-00 00:00:00', '2015-12-16 10:23:10', '0000-00-00 00:00:00', 'active'),
(35, 'razack.tz@gmail.com', '0715371234', 'M42d9h&!.6dc3961d21c53cfce3c9743d07d36e0f17f5f5d2', 'Razack', '', 'Ford', '154.73.170.197', '527a4f608560e8f7a1173e1b57840319282bc788', '', '', 0, 0, '0000-00-00 00:00:00', '2015-12-25 06:43:30', '0000-00-00 00:00:00', 'active'),
(36, 'richard_meru@yahoo.com', '+255653484939', 'M42d9h&!.3545bb7667973948dc7b3748076e3c29c05520d3', 'Richard', '', 'Meru', '41.222.179.130', '783500cc57d55b176abaa871404d0abef0b4f4ee', '', '', 0, 0, '0000-00-00 00:00:00', '2016-01-03 03:54:28', '0000-00-00 00:00:00', 'active'),
(37, 'dicksonmaxcastillo@gmail.com', '0714240939', 'M42d9h&!.385a062bdb96389220f9979f84bd6a53f7a58514', 'dickson', '', 'maxcastillo', '197.186.161.163', 'b9ca8aa5a7731c516e70911b48dec115002d61dc', '', '', 0, 0, '0000-00-00 00:00:00', '2016-01-14 17:04:42', '0000-00-00 00:00:00', 'active'),
(38, 'h', 'h', 'M42d9h&!.324983b5a659ea317767a21eaf30a04dd87ec35a', 'h', '', 'h', '41.76.90.142', '529c7672db3d41d4f6d275d570c6f48c7b95cc68', '', '', 0, 0, '0000-00-00 00:00:00', '2016-03-03 02:59:04', '0000-00-00 00:00:00', 'active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
