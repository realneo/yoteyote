-- --------------------------------------------------------
--
-- Database: `yoteyote_db`
--
-- --------------------------------------------------------

-- --------------------------------------------------------
--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS  `ci_sessions` (
  `session_id`    varchar(40)           NOT NULL  DEFAULT '0',
  `ip_address`    varchar(45)           NOT NULL  DEFAULT '0',
  `user_agent`    varchar(120)          NOT NULL,
  `last_activity` int(10)      unsigned NOT NULL  DEFAULT 0,
  `user_data`     text                  NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

--
-- Dumping data for table `ci_sessions`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id`       int(11)      unsigned NOT NULL  AUTO_INCREMENT,
  `username` varchar(100)                    DEFAULT NULL,
  `pword`    varchar(128)                    DEFAULT NULL,
  `email`    varchar(255)                    DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `pword`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'asimbsit@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `admin_bank`
--

DROP TABLE IF EXISTS `admin_bank`;
CREATE TABLE IF NOT EXISTS `admin_bank` (
  `id`    int(11) unsigned NOT NULL  AUTO_INCREMENT,
  `bank` int(100)                    DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_bank`
--

INSERT INTO `admin_bank` (`id`, `bank`) VALUES
(1, 3190);

-- --------------------------------------------------------

--
-- Table structure for table `currency_setting`
--

DROP TABLE IF EXISTS `currency_setting`;
CREATE TABLE IF NOT EXISTS `currency_setting` (
  `id`    int(11)       unsigned NOT NULL  AUTO_INCREMENT,
  `title` varchar(100)                     DEFAULT NULL,
  `rate`  decimal(10,0)                    DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currency_setting`
--

INSERT INTO `currency_setting` (`id`, `title`, `rate`) VALUES
(1, 'tshs per dollar', 1600);

-- --------------------------------------------------------

--
-- Table structure for table `deduction`
--

DROP TABLE IF EXISTS `deduction`;
CREATE TABLE IF NOT EXISTS `deduction` (
  `id`     int(11) unsigned NOT NULL  AUTO_INCREMENT,
  `mobile` double                     DEFAULT '0',
  `transc` double                     DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `deduction`
--

INSERT INTO `deduction` (`id`, `mobile`, `transc`) VALUES
(1, 500, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

DROP TABLE IF EXISTS `listings`;
CREATE TABLE IF NOT EXISTS `listings` (
  `list_id`   int(11)  unsigned NOT NULL  AUTO_INCREMENT,
  `post_id`   int(11)  unsigned           DEFAULT NULL,
  `user_id`   int(11)  unsigned           DEFAULT NULL,
  `list_date` datetime                    DEFAULT '0000-00-00 00:00:00',
  `bid` int(11)                           DEFAULT NULL,
  PRIMARY KEY (`list_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`list_id`, `post_id`, `user_id`, `list_date`, `bid`) VALUES
(31, 35, 22, '2013-05-11 20:58:36', 50),
(40, 35, 23, '2013-05-11 21:04:07', 90),
(42, 35, 24, '2013-05-13 01:36:38', 100),
(43, 35, 24, '2013-05-13 01:36:38', 100),
(46, 38, 27, '2013-05-19 15:09:48', 120000);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id`         int(11)  unsigned NOT NULL  AUTO_INCREMENT,
  `trans_date` datetime                    DEFAULT '0000-00-00 00:00:00',
  `user_bank`  double                      DEFAULT '0',
  `user_id`    int(11) unsigned            DEFAULT NULL,
  `admin_bank` double                      DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `trans_date`, `user_bank`, `user_id`, `admin_bank`) VALUES
(24, '2013-05-04 08:49:58', -199, 18, 200),
(25, '2013-05-04 09:32:07', 800, 18, 200),
(26, '2013-05-07 02:48:30', 9800, 2, 200),
(27, '2013-05-07 02:53:32', 19800, 2, 200),
(29, '2013-05-13 02:40:36', 9800, 24, 200),
(30, '2013-05-13 07:25:10', 9800, 24, 200),
(31, '2013-05-13 08:58:59', 9800, 24, 200),
(32, '2013-05-13 08:59:28', 9800, 24, 200),
(33, '2013-05-16 12:57:45', 9500, 24, 500),
(34, '2013-06-29 21:30:26', 9500, 24, 500);

-- --------------------------------------------------------

--
-- Table structure for table `ongoing`
--

DROP TABLE IF EXISTS `ongoing`;
CREATE TABLE IF NOT EXISTS `ongoing` (
  `on_id`           int(11) unsigned NOT NULL  AUTO_INCREMENT,
  `post_by_user_id` int(11) unsigned           DEFAULT NULL,
  `won_by_user_id`  int(11) unsigned           DEFAULT NULL,
  `on_amount`       int(11) unsigned           DEFAULT NULL,
  `post_id`         int(11) unsigned           DEFAULT NULL,
  PRIMARY KEY (`on_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id`          int(11)      unsigned NOT NULL  AUTO_INCREMENT,
  `post`        varchar(255)          NOT NULL,
  `description` text                  NOT NULL,
  `post_type`   varchar(4)            NOT NULL,
  `post_date`   datetime              NOT NULL  DEFAULT '0000-00-00 00:00:00',
  `amount`      int(11)      unsigned NOT NULL,
  `currency`    varchar(20)           NOT NULL,
  `user_id`     int(11)      unsigned NOT NULL,
  `pic` varchar(255)                            DEFAULT NULL,
  `post_active` enum('y','n') COLLATE utf8_unicode_ci DEFAULT 'y',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post`, `description`, `post_type`, `post_date`, `amount`, `currency`, `user_id`, `post_active`, `pic`) VALUES
(35, 'gardner for my lawn', 'gardener for my lawn', 'want', '2013-05-11 15:58:12', 100, 'Tshs', 21, NULL, 'y'),
(34, 'Design a website', 'Design a website', 'will', '2013-05-11 15:57:22', 300, 'Tshs', 21, NULL, 'y'),
(36, 'desing your website for 100,000', 'test', 'will', '2013-05-12 05:07:53', 10000, 'Tshs', 24, NULL, 'y'),
(37, 'a cleaner for my house for 30,000', 'aldjfalsdfj', 'want', '2013-05-16 12:47:22', 20000, 'Tshs', 24, NULL, 'y'),
(38, 'desing your website for 100,000', 'adsfasdf', 'will', '2013-05-16 12:50:26', 100000, 'Tshs', 24, NULL, 'y'),
(39, '', '', '', '2013-06-28 12:48:23', 0, '', 0, NULL, 'y'),
(40, '', '', '', '2013-06-28 14:07:38', 0, '', 0, NULL, 'y'),
(41, '', '', '', '2013-06-28 14:08:45', 0, '', 0, NULL, 'y'),
(42, '', '', '', '2013-06-28 14:08:59', 0, '', 0, NULL, 'y'),
(43, '', '', '', '2013-06-28 14:22:57', 0, '', 0, NULL, 'y'),
(44, '', '', '', '2013-06-28 14:27:00', 0, '', 0, NULL, 'y'),
(45, '', '', '', '2013-06-28 14:27:29', 0, '', 0, NULL, 'y'),
(46, '', '', '', '2013-06-28 14:29:59', 0, '', 0, NULL, 'y'),
(47, '', '', '', '2013-06-28 14:30:35', 0, '', 0, NULL, 'y'),
(48, '', '', '', '2013-06-28 22:17:09', 0, '', 0, NULL, 'y'),
(49, '', '', '', '2013-06-28 22:33:34', 0, 'TSHS', 0, NULL, 'y'),
(50, '', '', '', '2013-06-28 22:33:42', 0, 'TSHS', 0, NULL, 'y'),
(51, '', '', '', '2013-06-28 22:36:22', 0, 'TSHS', 0, NULL, 'y'),
(52, '', '', '', '2013-07-02 13:16:03', 0, '', 0, NULL, 'y'),
(53, '', '', '', '2013-07-02 13:16:11', 0, '', 0, NULL, 'y'),
(54, '', '', '', '2013-07-02 13:16:17', 0, '', 0, NULL, 'y'),
(55, '', '', '', '2013-07-02 13:17:38', 0, '', 0, NULL, 'y'),
(56, '', '', '', '2013-07-02 13:18:00', 0, '', 0, NULL, 'y'),
(57, '', '', '', '2013-07-02 13:18:09', 0, '', 0, NULL, 'y'),
(58, '', '', '', '2013-07-02 13:18:53', 0, '', 0, NULL, 'y'),
(59, '', '', '', '2013-07-02 13:20:30', 0, '', 0, NULL, 'y'),
(60, '', '', '', '2013-07-02 13:20:38', 0, '', 0, NULL, 'y'),
(61, '', 'df', '', '2013-09-28 08:18:24', 222, '', 0, NULL, 'y'),
(62, '', 'Despicable me', '', '2013-10-26 22:35:46', 10000, '', 24, NULL, 'y'),
(63, '', 'Despicable me', '', '2013-10-26 22:36:03', 10000, '', 24, NULL, 'y'),
(64, '', 'dfasdf', '', '2013-10-26 22:39:59', 13121, '', 24, NULL, 'y'),
(65, '', 'dfasdf', '', '2013-10-26 22:41:15', 13121, '', 24, NULL, 'y'),
(66, '', 'dfasdf', '', '2013-10-26 22:43:30', 13121, '', 24, NULL, 'y'),
(67, '', 'dfasdf', '', '2013-10-26 22:48:51', 13121, '', 24, NULL, 'y'),
(68, '', 'fdsfs', '', '2013-10-26 22:49:07', 1212, '', 24, NULL, 'y'),
(69, '', 'fdsfs', '', '2013-10-26 22:50:48', 1212, '', 24, NULL, 'y'),
(70, '', 'adslfjasdlf', '', '2013-10-26 22:51:02', 2323, '', 24, NULL, 'y'),
(71, '', '', '', '2013-10-26 22:54:47', 0, '', 0, NULL, 'y'),
(72, '', 'dsfgsdfg', '', '2013-10-26 22:56:01', 1212, '', 24, NULL, 'y'),
(73, '', 'adfasdf', '', '2013-10-26 22:56:12', 1212, '', 24, NULL, 'y'),
(74, '', 'asdfasdf', '', '2013-10-26 22:56:58', 1212, '', 0, NULL, 'y'),
(75, '', 'Matrix', '', '2013-10-26 22:58:39', 100, '', 24, NULL, 'y'),
(76, '', 'adsfasdf', '', '2013-10-26 22:59:48', 111, '', 24, NULL, 'y'),
(77, '', 'ada', '', '2013-10-26 23:01:53', 200, '', 24, NULL. 'y'),
(78, '', 'adsfas', '', '2013-10-26 23:05:28', 121, '', 24, NULL, 'y'),
(79, '', 'adsfas', '', '2013-10-26 23:07:58', 121, '', 24, NULL, 'y'),
(80, '', 'adsfasdf', '', '2013-10-26 23:08:40', 1212, '', 24, NULL, 'y'),
(81, '', 'asdfasdf', '', '2013-10-26 23:12:42', 111, '', 24, NULL, 'y'),
(82, '', 'adsfasdf', '', '2013-10-26 23:14:33', 1212, '', 24, NULL, 'y'),
(83, '', 'asdfasdf', '', '2013-10-26 23:15:39', 12121, '', 24, NULL, 'y'),
(84, 'adfasdf', 'asdfasdf', 'will', '2013-10-26 23:18:20', 1212, 'Tshs', 24, NULL, 'y'),
(85, 'desing your website for 100,000', 'adsfasdf', 'will', '2013-10-26 23:20:03', 1212, 'Tshs', 24, NULL, 'y'),
(86, 'fadsfasdf', '32esdfas', 'will', '2013-10-26 23:23:04', 11, 'Tshs', 24, NULL, 'y'),
(87, 'adfadf', 'adfasdf', 'will', '2013-10-26 23:25:03', 1212, 'Tshs', 24, NULL, 'y'),
(88, 'aasdf', 'asdfasdf', 'will', '2013-10-26 23:26:03', 1212, 'Tshs', 24, NULL, 'y'),
(89, 'adfasdf', 'asdfasdf', 'will', '2013-10-26 23:26:47', 21323, 'Tshs', 24, NULL, 'y'),
(90, 'adfadsf', 'adsfasdf', 'will', '2013-10-26 23:27:46', 121, 'Tshs', 24, NULL, 'y'),
(91, 'sdfasdf', 'asdfasdf', 'will', '2013-10-26 23:30:27', 1212, 'Tshs', 24, NULL, 'y'),
(92, 'dasfasdf', 'asdfasdf', 'will', '2013-10-26 23:32:13', 1212, 'Tshs', 24, NULL, 'y'),
(93, 'adfasdf', 'asdfasdf', 'will', '2013-10-26 23:32:59', 12121, 'Tshs', 24, NULL, 'y'),
(94, 'asdfasdf', 'asdfasdf', 'will', '2013-10-26 23:35:39', 1212, 'Tshs', 24, NULL, 'y'),
(95, 'adfadsf', 'asdfasdf', 'will', '2013-10-26 23:36:05', 232323, 'Tshs', 24, NULL, 'y'),
(96, 'desing your website for 100,000', 'Amazing', 'will', '2013-10-26 23:39:36', 12444, 'Tshs', 24, NULL, 'y'),
(97, 'adsfasdf', 'asdfasdf', 'will', '2013-10-26 23:40:53', 1212, 'Tshs', 24, NULL, 'y'),
(98, 'asdfasdf', 'asdfasdf', 'will', '2013-10-26 23:42:59', 121212, 'Tshs', 24, NULL, 'y'),
(99, 'adsfasdf', 'asdfasdf', 'will', '2013-10-26 23:43:33', 32323, 'Tshs', 24, NULL, 'y'),
(100, 'adsfadsf', 'asdfasdf', 'will', '2013-10-26 23:47:55', 2323, 'Tshs', 24, NULL, 'y'),
(101, 'asdfasdf', 'asdfasdf', 'will', '2013-10-26 23:48:27', 2323, 'Tshs', 24, NULL, 'y'),
(102, 'asdfasdf', 'asdfasdf', 'will', '2013-10-26 23:48:48', 2323, 'Tshs', 24, NULL, 'y'),
(103, 'asdfasdf', 'asdfasdf', 'will', '2013-10-26 23:50:03', 0, 'Tshs', 24, NULL, 'y'),
(104, 'adfasdf', 'asdfasdf', 'will', '2013-10-26 23:50:18', 12313, 'Tshs', 24, NULL, 'y'),
(105, 'adsfasdf', 'asdfasdf', 'will', '2013-10-26 23:51:04', 2323, 'Tshs', 24, NULL, 'y'),
(106, 'asdfasdf', 'asdfasdf', 'will', '2013-10-26 23:52:49', 4242, 'Tshs', 24, NULL, 'y'),
(107, '', 'adsfasdf', 'want', '2013-10-27 00:06:27', 121212, 'Tshs', 24, NULL, 'y'),
(108, 'asdfasdf', 'asdfasdf', 'want', '2013-10-27 00:07:43', 1212, 'Tshs', 24, NULL, 'y'),
(109, 'asdfasdf', 'asdfasdf', 'want', '2013-10-27 00:08:10', 121212, 'Tshs', 24, NULL, 'y'),
(110, 'asdfasdf', 'adsfasdf', 'will', '2013-10-27 00:08:58', 1212, 'Tshs', 24, NULL, 'y'),
(111, 'Testing', 'This is the Testing of the Posts ...\nI wish I can make them look more good than now\n\nThanks', 'will', '2013-10-27 00:50:48', 200000, 'Tshs', 24, NULL, 'y'),
(112, 'jj', 'jhkj', 'want', '2013-10-27 18:55:14', 6565, 'Tshs', 24, NULL, 'y'),
(113, 'asdfadf', 'asdfasdf', 'want', '2013-10-27 20:30:22', 12323, 'Tshs', 24, NULL, 'y'),
(114, 'asdfasdf', 'asdfasdf', 'want', '2013-10-27 20:32:29', 121212, 'Tshs', 24, NULL, 'y'),
(115, 'asdfasdfasdf', 'asdfasdfasdf', 'want', '2013-10-27 20:34:52', 121212, 'Tshs', 24, NULL, 'y'),
(116, 'adsfasdf', 'adsfasdf', 'want', '2013-10-28 08:03:40', 1212, 'Tshs', 24, NULL, 'y'),
(117, 'test', 'test', 'want', '2013-10-28 08:04:39', 1212121, 'Tshs', 24, NULL, 'y'),
(127, 'Nyongeza', 'Nyonyo', 'will', '2013-10-28 12:50:08', 20000, 'Tshs', 24, '138296100424.jpg', 'y'),
(128, 'Noah', 'Model : 2002', 'will', '2013-10-28 12:52:16', 6000000, 'Tshs', 24, '138296113424.jpg', 'y'),
(126, 'Mama', 'Mimi ', 'want', '2013-10-28 12:49:03', 200, 'Tshs', 24, '138296093824.jpg', 'y'),
(125, 'asdfasdf', 'asdfasdfasd', 'will', '2013-10-28 10:53:02', 1212, 'Tshs', 24, '138295398124.jpg', 'y'),
(122, '12323', 'dfadfasdf', 'want', '2013-10-28 08:27:55', 3333, 'Tshs', 24, '138294525524.jpg', 'y'),
(123, 'asdfasdf', 'sadfasdfsf', 'want', '2013-10-28 08:40:06', 323, 'Tshs', 24, '138294600324.jpg', 'y'),
(124, 'Keko', 'asdfasdf', 'want', '2013-10-28 09:07:28', 232323, 'Tshs', 24, '138294764724.jpg', 'y'),
(129, 'cgsdfg', 'sdfgsdfg', 'will', '2013-10-28 13:11:23', 300000, 'Tshs', 24, '138296228124.jpg', 'y'),
(130, 'draw Henna for you', 'full hand, full legs ....werwerlwj;lajd;lfjkasdf', 'will', '2013-10-29 17:05:16', 30000, 'Tshs', 24, '138306271024.jpg', 'y'),
(131, 'gsdfgsdg', 'dsfgsdfg', 'will', '2013-10-29 17:51:38', 212121, 'Tshs', 24, '138306271024.jpg', 'y'),
(132, 'asdfasdf', 'asdfadsfasdf', 'will', '2013-10-29 17:52:03', 19000, 'Tshs', 24, '138306271024.jpg', 'y'),
(133, 'asdfasdf', 'asdfasdfasdf', 'will', '2013-10-29 17:52:32', 343434, 'Tshs', 24, '138306271024.jpg', 'y'),
(134, '121232', 'adfasdfasdf', 'want', '2013-10-29 17:53:10', 121212, 'Tshs', 24, '138306271024.jpg', 'y'),
(135, '1rgdgdg', 'shsdfsdfg', 'will', '2013-10-29 17:55:44', 121212, 'Tshs', 24, '138306271024.jpg', 'y'),
(136, 'ghjjlhg', 'jbk.jb.kb', 'will', '2013-10-29 18:00:04', 4999, 'Tshs', 24, '138306271024.jpg', 'y'),
(137, 'asdfasdf', 'asdfasdf', 'will', '2013-11-02 09:42:57', 12121, 'Tshs', 24, '', 'y'),
(138, 'asdfasdf', 'asdfasdf', 'will', '2013-11-02 09:43:07', 12121, 'Tshs', 24, '', 'y'),
(139, 'asdfasd', 'asdfasdf', 'will', '2013-11-02 09:44:25', 121212, 'Tshs', 24, '', 'y'),
(140, 'asdfasd', 'asdfasdf', 'will', '2013-11-02 09:44:34', 121212, 'Tshs', 24, '138338187224.jpg', 'y'),
(141, 'adsfasdf', 'asdfasdf', 'will', '2013-11-02 09:47:40', 121212, 'Tshs', 24, '138338187224.jpg', 'y'),
(142, 'asdfasdf', 'asdfasdf', 'will', '2013-11-02 10:59:48', 12121, 'Tshs', 24, '', 'y'),
(143, 'asdfasdf', 'asdfasdf', 'will', '2013-11-02 10:59:56', 12121, 'Tshs', 24, '', 'y'),
(144, 'adfasd', 'asdfasdf', 'will', '2013-11-02 11:01:02', 2323, 'Tshs', 24, '', 'y'),
(145, 'adfasdf', 'asdfasdf', 'will', '2013-11-02 11:07:25', 121212, 'Tshs', 24, '', 'y'),
(146, 'asd', 'ad', 'will', '2013-11-02 11:08:04', 200, 'Tshs', 24, '', 'y'),
(147, 'asd', 'ad', 'will', '2013-11-02 11:08:11', 200, 'Tshs', 24, '', 'y'),
(148, 'asd', 'ad', 'will', '2013-11-02 11:08:28', 200, 'Tshs', 24, '', 'y'),
(149, 'add', 'add', 'will', '2013-11-02 11:10:27', 200, 'Tshs', 24, '', 'y'),
(150, 'adf', 'adsf', 'will', '2013-11-02 11:11:30', 1212, 'Tshs', 24, '', 'y'),
(151, 'adsfasdf', 'asdfasdf', 'want', '2013-11-02 11:11:55', 444, 'Tshs', 24, '138338711324.jpg', 'y'),
(152, 'hey', 'asdlfjalsdj', 'will', '2013-11-09 10:40:43', 111, 'Tshs', 24, '138399004024.jpg', 'y'),
(153, 'adsfasdf', 'asdfasdf', 'want', '2013-11-09 10:41:38', 121212, 'Tshs', 24, '138399004024.jpg', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `trust`
--

DROP TABLE IF EXISTS `trust`;
CREATE TABLE IF NOT EXISTS `trust` (
  `trust_id`      int(11) unsigned NOT NULL  AUTO_INCREMENT,
  `user_id`       int(11) unsigned           DEFAULT NULL,
  `trusted_by_id` int(11) unsigned           DEFAULT '0',
  PRIMARY KEY (`trust_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trust`
--

INSERT INTO `trust` (`trust_id`, `user_id`, `trusted_by_id`) VALUES
(34, 22, 21),
(35, 21, 24),
(36, 25, 24);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id`         int(11)      unsigned NOT NULL  AUTO_INCREMENT,
  `user_date`       datetime              NOT NULL  DEFAULT '0000-00-00 00:00:00',
  `pword`           varchar(128)          NOT NULL,
  `first_name`      varchar(45)           NOT NULL,
  `last_name`       varchar(45)           NOT NULL,
  `dob`             date                            DEFAULT '0000-00-00',
  `gender`          varchar(6)                      DEFAULT NULL,
  `bio`             text,
  `email`           varchar(255)          NOT NULL,
  `mobile`          varchar(15)           NOT NULL,
  `bank`            int(11)      unsigned NOT NULL  DEFAULT '0',
  `pic`             varchar(255)                    DEFAULT NULL,
  `country`         varchar(255)                    DEFAULT NULL,
  `city`            varchar(100)                    DEFAULT NULL,
  `street`          varchar(100)                    DEFAULT NULL,
  `building_name`   varchar(255)                    DEFAULT NULL,
  `building_number` varchar(255)                    DEFAULT NULL,
  `nickname`        varchar(255)                    DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_date`, `pword`, `first_name`, `last_name`, `dob`, `gender`, `bio`, `email`, `mobile`, `bank`, `pic`, `country`, `city`, `street`, `building_name`, `building_number`, `nickname`) VALUES
(24, '2013-05-11 17:50:57', 'bf2f749e80c970f50552e9d5f3e8434e78b88d35', 'Nadhir', 'Bahayan', '1989-05-01', 'Male', 'This is a testing Bio Text that has no meaning at all. I need to add more biography text just to make sure that all of this is working without fail. Hey', 'nadhir2@hotmail.com', '+255787487333', 47950, '138408930824.jpg', 'Tanzania', 'Dar es salaam', 'Tandamti Street', 'Kimata House', '209', 'Neo'),
(65, '2013-10-31 20:38:47', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Mama', 'Baba', '0000-00-00', NULL, NULL, 'mama@baba.com', '+255655487123', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, '2013-11-02 01:29:39', '17ba0791499db908433b80f37c5fbc89b870084b', 'Asdfasd', 'Asdfasdfj', '0000-00-00', NULL, NULL, 'asdf', '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, '2013-11-02 01:30:53', '356a192b7913b04c54574d18c28d46e6395428ab', 'Sdf', 'Ads', '0000-00-00', NULL, NULL, '1', '11', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, '2013-11-12 12:19:21', '26f9ed80ddc2aca0a40e6b7ac9179cb52e58a9b7', 'Raymond', 'King', '0000-00-00', NULL, NULL, 'insitefx@comcast.net', '8609408339', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

