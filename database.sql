-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 11, 2013 at 07:56 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `yoteyote_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_bank`
--

CREATE TABLE `admin_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `currency_setting`
--

CREATE TABLE `currency_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `rate` decimal(10,0) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `deduction`
--

CREATE TABLE `deduction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` double DEFAULT '0',
  `transc` double DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `list_id` int(10) NOT NULL AUTO_INCREMENT,
  `post_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `list_date` datetime DEFAULT NULL,
  `bid` int(10) DEFAULT NULL,
  PRIMARY KEY (`list_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_date` datetime DEFAULT NULL,
  `user_bank` double DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `admin_bank` double DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

-- --------------------------------------------------------

--
-- Table structure for table `ongoing`
--

CREATE TABLE `ongoing` (
  `on_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_by_user_id` int(11) DEFAULT NULL,
  `won_by_user_id` int(11) DEFAULT NULL,
  `on_amount` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`on_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(255) COLLATE latin2_bin NOT NULL,
  `description` text COLLATE latin2_bin NOT NULL,
  `type` varchar(4) COLLATE latin2_bin NOT NULL,
  `date` datetime NOT NULL,
  `amount` int(11) NOT NULL,
  `currency` varchar(20) COLLATE latin2_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `active` enum('y','n') COLLATE latin2_bin DEFAULT 'y',
  `pic` varchar(255) COLLATE latin2_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 COLLATE=latin2_bin AUTO_INCREMENT=154 ;

-- --------------------------------------------------------

--
-- Table structure for table `trust`
--

CREATE TABLE `trust` (
  `trust_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `trusted_by_id` int(11) DEFAULT '0',
  PRIMARY KEY (`trust_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 COLLATE=latin2_bin AUTO_INCREMENT=37 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `password` varchar(255) COLLATE latin2_bin NOT NULL,
  `first_name` varchar(45) COLLATE latin2_bin NOT NULL,
  `last_name` varchar(45) COLLATE latin2_bin NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(6) COLLATE latin2_bin DEFAULT NULL,
  `bio` text COLLATE latin2_bin,
  `email` varchar(120) COLLATE latin2_bin NOT NULL,
  `mobile` varchar(15) COLLATE latin2_bin NOT NULL,
  `bank` int(11) NOT NULL DEFAULT '0',
  `pic` varchar(255) COLLATE latin2_bin DEFAULT NULL,
  `country` varchar(255) COLLATE latin2_bin DEFAULT NULL,
  `city` varchar(100) COLLATE latin2_bin DEFAULT NULL,
  `street` varchar(100) COLLATE latin2_bin DEFAULT NULL,
  `building_name` varchar(255) COLLATE latin2_bin DEFAULT NULL,
  `building_number` varchar(255) COLLATE latin2_bin DEFAULT NULL,
  `nickname` varchar(255) COLLATE latin2_bin DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 COLLATE=latin2_bin AUTO_INCREMENT=68 ;
