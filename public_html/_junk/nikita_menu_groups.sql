-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 29, 2010 at 08:22 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

--
-- Database: `cmstest`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu_groups`
--

DROP TABLE IF EXISTS `menu_groups`;
CREATE TABLE IF NOT EXISTS `menu_groups` (
  `id`               int(11)     unsigned NOT NULL  AUTO_INCREMENT,
  `menu_group_title` varchar(50)          NOT NULL,
  `menu_abbrev`      varchar(20)          NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Navigation groupings. Eg, header, sidebar, footer, etc' ;

--
-- Dumping data for table `menu_groups`
--

INSERT INTO `menu_groups` (`id`, `menu_group_title`, `menu_abbrev`) VALUES
(1, 'Topmenu', 'topmenu'),
(2, 'Header', 'header'),
(3, 'Sidebar', 'sidebar'),
(4, 'Sidebar2', 'sidebar2'),
(5, 'Footer', 'footer');

