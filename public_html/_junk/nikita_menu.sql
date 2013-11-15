-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 29, 2010 at 08:21 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

--
-- Database: `cmstest`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id`               int(11)      unsigned NOT NULL  AUTO_INCREMENT,
  `menu_title`       varchar(100)          NOT NULL  DEFAULT '',
  `menu_link_type`   varchar(20)           NOT NULL  DEFAULT 'uri',
  `menu_page_id`     int(11)      unsigned NOT NULL  DEFAULT '0',
  `menu_module_name` varchar(50)           NOT NULL  DEFAULT '',
  `menu_url`         varchar(255)          NOT NULL  DEFAULT '',
  `menu_uri`         varchar(255)          NOT NULL  DEFAULT '',
  `menu_group_id`    int(5)       unsigned NOT NULL  DEFAULT '0',
  `menu_position`    int(5)       unsigned NOT NULL  DEFAULT '0',
  `menu_target`      varchar(10)                     DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_group_id - normal` (`menu_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Links for site menu' ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu_title`, `menu_link_type`, `menu_page_id`, `menu_module_name`, `menu_url`, `menu_uri`, `menu_group_id`, `menu_position`, `menu_target`) VALUES
(1, 'Home', 'page', 1, '', '', '', 1, 1, NULL),
(2, 'Home', 'page', 1, '', '', '', 2, 1, '_self'),
(4, 'About us', 'page', 3, '', '', '', 1, 2, '_self'),
(5, 'Forums', 'module', 0, 'forums', '', '', 1, 3, '_self');
