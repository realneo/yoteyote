-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2013 at 07:53 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nikita`
--
CREATE DATABASE IF NOT EXISTS `nikita` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `nikita`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `category_short_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `category_long_desc` text COLLATE utf8_unicode_ci,
  `category_sort_order` int(3) NOT NULL DEFAULT '0',
  `category_parent_id` int(11) unsigned NOT NULL DEFAULT '0',
  `category_created_at` datetime DEFAULT NULL,
  `category_updated_at` datetime DEFAULT NULL,
  `category_status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_short_desc`, `category_long_desc`, `category_sort_order`, `category_parent_id`, `category_created_at`, `category_updated_at`, `category_status`) VALUES
(1, 'News', 'Latest News', 'This is the latest News for this Blog.', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(2, 'Rants', 'Latest Rants', 'This is the latest Rants for this Blog.', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(3, 'Fun', 'Latest Fun', 'This is the latest Fun for this Blog.', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('25bd359ab19eb2ed3efa16b712f27018', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.101 Safari/537.36', 1382899384, 'a:4:{s:9:"user_name";s:5:"admin";s:7:"user_id";s:0:"";s:11:"user_groups";s:25:"{"1":"admin","2":"owner"}";s:9:"logged_in";b:1;}'),
('d3bc6dfa23028e9d4ff9b0b9bbd9b505', '127.0.0.1', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; WOW64; Trident/5.0; SLCC2; .NET CLR 2.0.50727; Media Center PC 6.0; .', 1382900052, ''),
('d6747f309e91ac2776813d9da5ca1d5d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.101 Safari/537.36', 1382900057, '');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_post_id` int(11) unsigned NOT NULL,
  `comment_created_at` datetime DEFAULT NULL,
  `comment_updated_at` datetime DEFAULT NULL,
  `comment_status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment_name`, `comment_email`, `comment_content`, `comment_post_id`, `comment_created_at`, `comment_updated_at`, `comment_status`) VALUES
(1, 'Admin', 'someone@example.com', 'This is a test comment.', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'owner', 'Site Owner'),
(3, 'moderator', 'Site Moderator'),
(4, 'editor', 'Site Editor'),
(5, 'members', 'Site Member'),
(6, 'user', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `page_title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `page_headline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_url` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `page_keywords` text COLLATE utf8_unicode_ci,
  `page_description` text COLLATE utf8_unicode_ci,
  `page_content` longtext COLLATE utf8_unicode_ci,
  `page_author` bigint(20) unsigned NOT NULL DEFAULT '1',
  `page_location` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `page_type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `page_created_at` datetime DEFAULT NULL,
  `page_updated_at` datetime DEFAULT NULL,
  `page_status` enum('published','draft') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'published',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `page_headline`, `page_url`, `page_keywords`, `page_description`, `page_content`, `page_author`, `page_location`, `page_type`, `page_created_at`, `page_updated_at`, `page_status`) VALUES
(1, 'Home', '', 'home', 'meta keywords', 'meta description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed libero consectetur arcu suscipit convallis. Sed accumsan dictum risus, sollicitudin eleifend velit mollis eget. Curabitur varius orci sagittis sapien elementum porta. Pellentesque interdum nulla quis purus luctus nec auctor sem venenatis. Vivamus ultrices odio sit amet metus faucibus suscipit. Morbi sed enim a sapien facilisis scelerisque. Duis facilisis leo quis sapien laoreet eget mollis ipsum condimentum. Etiam placerat accumsan leo, vel faucibus nunc ultrices vel. Aenean tristique mi vitae orci consequat id fermentum tortor accumsan. Donec adipiscing turpis sem. Mauris rhoncus tellus ac elit consequat consectetur. Maecenas elementum volutpat ligula at malesuada.', 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'published'),
(2, 'About', '', 'about', 'meta keywords', 'meta description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed libero consectetur arcu suscipit convallis. Sed accumsan dictum risus, sollicitudin eleifend velit mollis eget. Curabitur varius orci sagittis sapien elementum porta. Pellentesque interdum nulla quis purus luctus nec auctor sem venenatis. Vivamus ultrices odio sit amet metus faucibus suscipit. Morbi sed enim a sapien facilisis scelerisque. Duis facilisis leo quis sapien laoreet eget mollis ipsum condimentum. Etiam placerat accumsan leo, vel faucibus nunc ultrices vel. Aenean tristique mi vitae orci consequat id fermentum tortor accumsan. Donec adipiscing turpis sem. Mauris rhoncus tellus ac elit consequat consectetur. Maecenas elementum volutpat ligula at malesuada.', 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'published'),
(3, 'Contact', '', 'contact', 'meta keywords', 'meta description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed libero consectetur arcu suscipit convallis. Sed accumsan dictum risus, sollicitudin eleifend velit mollis eget. Curabitur varius orci sagittis sapien elementum porta. Pellentesque interdum nulla quis purus luctus nec auctor sem venenatis. Vivamus ultrices odio sit amet metus faucibus suscipit. Morbi sed enim a sapien facilisis scelerisque. Duis facilisis leo quis sapien laoreet eget mollis ipsum condimentum. Etiam placerat accumsan leo, vel faucibus nunc ultrices vel. Aenean tristique mi vitae orci consequat id fermentum tortor accumsan. Donec adipiscing turpis sem. Mauris rhoncus tellus ac elit consequat consectetur. Maecenas elementum volutpat ligula at malesuada.', 1, 1, 1, '0000-00-00 00:00:00', '2013-10-23 15:39:03', 'published'),
(5, 'test2', '', 'test2', 'meta keywords 2', 'meta description 2', 'Test 2', 1, 1, 1, '2013-10-23 15:44:17', '2013-10-23 15:44:17', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `user_ip_address` varbinary(16) NOT NULL,
  `user_token` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `user_identifier` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `user_recover` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `user_remember_me` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `user_confirmed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `user_last_login` datetime DEFAULT NULL,
  `user_created_at` datetime DEFAULT NULL,
  `user_updated_at` datetime DEFAULT NULL,
  `user_status` enum('active','banned') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_password`, `user_ip_address`, `user_token`, `user_identifier`, `user_recover`, `user_remember_me`, `user_confirmed`, `user_last_login`, `user_created_at`, `user_updated_at`, `user_status`) VALUES
(1, 'admin', 'king.r.l@comcast.net', 'ad65f6e5bb78d4fd6d345909ccb8546c9768def13cd8b82540d6edadb11454dad986ae00755a660103a7346cb8d56f10a469be49f84f7c9119438799021f43c8', '', '4ZtI7iQzbb)E3OFLkDZKjrhf(YZf8Z4yGe7QaFvipBh6lLzAJS4u7xr)q3!g6vtnGcV81DWy3tYHhfpfazPGMOQ(gxaZsRekSuwtqR0PH7cawiT1Se5atzF2gdGeGEni', '37d89ecdf25dd612c3f806646675fe01fbb28cd1cd7b9472fc1f08c038fee01346899c7f053b94f8e8d389e746fd4c30a5677ae4399ba7b7aefc2eeaad7a2ee5', '', 0, 0, NULL, '2013-10-24 15:07:15', '2013-10-24 15:07:15', 'active'),
(2, 'InsiteFX', 'insitefx@comcast.net', 'ad65f6e5bb78d4fd6d345909ccb8546c9768def13cd8b82540d6edadb11454dad986ae00755a660103a7346cb8d56f10a469be49f84f7c9119438799021f43c8', '', '80(id(riMoFhcEDNxO86JIIabam)3!jv721YKEgQoxZOoYKXr5!We9vQVAlOYpOGY2KcpkCY82bTNM)UMk!hQiNwYPrf0uyf1c0OQZdRvqRi4M)qG0aoOkBVe(!yQbI2', 'fb5770d109409455b7a0e72ba349d457f6f470e570c883a3ed461d381123626a4bcbf89bd4f5ac7b31ed3ece75fee1a1a29ccb07c88d4538e0f78203b58af363', '', 0, 0, NULL, '2013-10-25 09:34:07', '2013-10-25 09:34:07', 'active'),
(3, 'test3', 'test33@test.com', 'ad65f6e5bb78d4fd6d345909ccb8546c9768def13cd8b82540d6edadb11454dad986ae00755a660103a7346cb8d56f10a469be49f84f7c9119438799021f43c8', '', '65AzGmf10E12XQUagWw7MQfv6UVWziA(yZuRZO9MMAWNNgmUF1oUxEZa2MJVc013m86KHpIdUGdCGfEdND8q7!r(T9w2Fi6WVE11GKz9EKxIcAF69P3yD2vT)GHLag3z', '08acb63c9ed58f6f2ce90d73735c248adde407c2abd66f3aa7b3bc4a76ef0acddc1dfefe38e8b09dcf141aa544101097370618dd11f264978e00cd06635a1e11', '', 0, 0, NULL, '2013-10-25 10:29:30', '2013-10-25 10:29:30', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users_idx` (`user_id`),
  KEY `fk_users_groups_groups_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- RELATIONS FOR TABLE `users_groups`:
--   `group_id`
--       `groups` -> `id`
--   `user_id`
--       `users` -> `id`
--

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 6),
(4, 3, 6);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
