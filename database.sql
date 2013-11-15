-- --------------------------------------------------------
--
-- Database: `yoteyote_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id`       int(11)      unsigned NOT NULL  AUTO_INCREMENT,
  `username` varchar(100)                    DEFAULT NULL,
  `pword`    varchar(128)                    DEFAULT NULL,                -- FIXED password is a MySQL reserved word
  `email`    varchar(255)                    DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_bank`
--

DROP TABLE IF EXISTS `admin_bank`;
CREATE TABLE IF NOT EXISTS `admin_bank` (
  `id`   int(11)  unsigned NOT NULL  AUTO_INCREMENT,
  `bank` int(100)                    DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

DROP TABLE IF EXISTS `listings`;
CREATE TABLE IF NOT EXISTS `listings` (
  `list_id` int(10)    unsigned NOT NULL  AUTO_INCREMENT,
  `post_id` int(10)    unsigned           DEFAULT NULL,
  `user_id` int(10)    unsigned           DEFAULT NULL,
  `list_date` datetime                    DEFAULT '0000-00-00 00:00:00',
  `bid` int(10) DEFAULT NULL,
  PRIMARY KEY (`list_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id`         int(11) unsigned NOT NULL  AUTO_INCREMENT,
  `trans_date` datetime                   DEFAULT '0000-00-00 00:00:00',
  `user_bank`  double                     DEFAULT '0',
  `user_id`    int(11) unsigned           DEFAULT NULL,
  `admin_bank` double                     DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `post_type`   varchar(4)            NOT NULL,                                         -- type is a MySQL Reserved Word
  `post_date`   datetime              NOT NULL  DEFAULT '0000-00-00 00:00:00',          -- date is a MySQL Reserved Word
  `amount`      int(11)      unsigned NOT NULL,
  `currency`    varchar(20)           NOT NULL,
  `user_id`     int(11)      unsigned NOT NULL,
  `post_active` enum('y','n')                   DEFAULT 'y',              -- active is a MySQL Reserved Word
  `pic`         varchar(255)                    DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id`         int(11)      unsigned NOT NULL  AUTO_INCREMENT,
  `user_date`       datetime              NOT NULL  DEFAULT '0000-00-00 00:00:00',  -- date is a MySQL Reserved Word
  `pword`           varchar(128)          NOT NULL,                                 -- password is a MySQL Reserved Word
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

