-- --------------------------------------------------------

--
-- Database: `freshcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id`    varchar(40)           NOT NULL  DEFAULT '0',
  `ip_address`    varchar(45)           NOT NULL  DEFAULT '0',
  `user_agent`    varchar(120)          NOT NULL,
  `last_activity` int(10)      unsigned NOT NULL  DEFAULT 0,
  `user_data`     text                  NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id`               bigint(20)   unsigned NOT NULL  AUTO_INCREMENT,
  `user_name`        varchar(32)           NOT NULL,
  `user_email`       varchar(255)          NOT NULL,
  `user_password`    varchar(128)          NOT NULL,
  `user_group_id`    int(11)      unsigned NOT NULL  DEFAULT '100',
  `user_token`       varchar(128)          NOT NULL,
  `user_identifier`  varchar(128)          NOT NULL,
  `user_recover`     varchar(128)          NOT NULL,
  `user_remember_me` tinyint(1)   unsigned NOT NULL  DEFAULT 0,
  `user_confirmed`   tinyint(1)   unsigned NOT NULL  DEFAULT 0,
  `user_created_at`  datetime              NOT NULL  DEFAULT '0000-00-00 00:00:00',
  `user_updated_at`  datetime              NOT NULL  DEFAULT '0000-00-00 00:00:00',
  `user_status`      enum('active','inactive','banned','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id`                      int(11)      unsigned NOT NULL  AUTO_INCREMENT,
  `profile_date`            datetime              NOT NULL  DEFAULT '0000-00-00 00:00:00',
  `profile_first_name`      varchar(45)           NOT NULL,
  `profile_last_name`       varchar(45)           NOT NULL,
  `profile_dob`             date                            DEFAULT '0000-00-00',
  `profile_gender`          varchar(6)                      DEFAULT NULL,
  `profile_bio`             text,
  `profile_mobile`          varchar(15)           NOT NULL,
  `profile_bank`            int(11)      unsigned NOT NULL  DEFAULT '0',
  `profile_pic`             varchar(255)                    DEFAULT NULL,
  `profile_country`         varchar(255)                    DEFAULT NULL,
  `profile_city`            varchar(100)                    DEFAULT NULL,
  `profile_street`          varchar(100)                    DEFAULT NULL,
  `profile_building_name`   varchar(255)                    DEFAULT NULL,
  `profile_building_number` varchar(255)                    DEFAULT NULL,
  `profile_nickname`        varchar(255)                    DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_profiles`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE IF NOT EXISTS `user_groups` (
  `id`                int(11)      unsigned NOT NULL,
  `group_title`       varchar(32)           NOT NULL  DEFAULT '',
  `group_description` varchar(100)          NOT NULL  DEFAULT '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Dumping data for Table `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_title`, `group_description`) VALUES
('1', 'owner', 'Site Owner'),
('2', 'admin', 'Main Admin'),
('25', 'moderator', 'Site Moderator'),
('50', 'editor', 'Site Editors'),
('100', 'user', 'General User'),
('900', 'guest', 'Stie Guest');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id`               int(11)      unsigned NOT NULL  AUTO_INCREMENT,
  `page_title`       varchar(128)          NOT NULL,
  `page_slug`        varchar(128)          NOT NULL,
  `page_keywords`    text,
  `page_description` text,
  `page_content`     longtext,
  `page_author`      bigint(20)   unsigned NOT NULL  DEFAULT '1',
  `page_location`    tinyint(1)   unsigned NOT NULL  DEFAULT '1',
  `page_type`        tinyint(1)   unsigned NOT NULL  DEFAULT '1',
  `page_created_at`  datetime              NOT NULL  DEFAULT '0000-00-00 00:00:00',
  `page_updated_at`  datetime              NOT NULL  DEFAULT '0000-00-00 00:00:00',
  `page_status`      enum('published','draft') NOT NULL  DEFAULT 'published',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Dumping data for Table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `page_slug`, `page_keywords`, `page_description`, `page_created_at`, `page_updated_at`, `page_status`, `page_content`) VALUES
('1', 'Home', 'home', 'meta keywords', 'meta description', '', '', 'published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed libero consectetur arcu suscipit convallis. Sed accumsan dictum risus, sollicitudin eleifend velit mollis eget. Curabitur varius orci sagittis sapien elementum porta. Pellentesque interdum nulla quis purus luctus nec auctor sem venenatis. Vivamus ultrices odio sit amet metus faucibus suscipit. Morbi sed enim a sapien facilisis scelerisque. Duis facilisis leo quis sapien laoreet eget mollis ipsum condimentum. Etiam placerat accumsan leo, vel faucibus nunc ultrices vel. Aenean tristique mi vitae orci consequat id fermentum tortor accumsan. Donec adipiscing turpis sem. Mauris rhoncus tellus ac elit consequat consectetur. Maecenas elementum volutpat ligula at malesuada.'),
('2', 'About', 'about', 'meta keywords', 'meta description', '', '', 'published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed libero consectetur arcu suscipit convallis. Sed accumsan dictum risus, sollicitudin eleifend velit mollis eget. Curabitur varius orci sagittis sapien elementum porta. Pellentesque interdum nulla quis purus luctus nec auctor sem venenatis. Vivamus ultrices odio sit amet metus faucibus suscipit. Morbi sed enim a sapien facilisis scelerisque. Duis facilisis leo quis sapien laoreet eget mollis ipsum condimentum. Etiam placerat accumsan leo, vel faucibus nunc ultrices vel. Aenean tristique mi vitae orci consequat id fermentum tortor accumsan. Donec adipiscing turpis sem. Mauris rhoncus tellus ac elit consequat consectetur. Maecenas elementum volutpat ligula at malesuada.'),
('3', 'Contact', 'contact', 'meta keywords', 'meta description', '', '', 'published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed libero consectetur arcu suscipit convallis. Sed accumsan dictum risus, sollicitudin eleifend velit mollis eget. Curabitur varius orci sagittis sapien elementum porta. Pellentesque interdum nulla quis purus luctus nec auctor sem venenatis. Vivamus ultrices odio sit amet metus faucibus suscipit. Morbi sed enim a sapien facilisis scelerisque. Duis facilisis leo quis sapien laoreet eget mollis ipsum condimentum. Etiam placerat accumsan leo, vel faucibus nunc ultrices vel. Aenean tristique mi vitae orci consequat id fermentum tortor accumsan. Donec adipiscing turpis sem. Mauris rhoncus tellus ac elit consequat consectetur. Maecenas elementum volutpat ligula at malesuada.');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id`                 bigint(20)   unsigned NOT NULL  AUTO_INCREMENT,
  `comment_name`       varchar(255)          NOT NULL,
  `comment_email`      varchar(255)          NOT NULL,
  `comment_content`    varchar(255)          NOT NULL,
  `comment_post_id`    int(11)      unsigned NOT NULL,
  `comment_created_at` datetime              NOT NULL  DEFAULT '0000-00-00 00:00:00',
  `comment_updated_at` datetime              NOT NULL  DEFAULT '0000-00-00 00:00:00',
  `comment_status`     enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

--
-- Dumping data for table `comments`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id`                  int(11)          unsigned NOT NULL  AUTO_INCREMENT,
  `category_name`       varchar(255)              NOT NULL  DEFAULT '',
  `category_short_desc` varchar(255)              NOT NULL  DEFAULT '',
  `category_long_desc`  text,
  `category_sort_order` int(3)                    NOT NULL  DEFAULT '0',
  `category_parent_id`  int(11)          unsigned NOT NULL  DEFAULT '0',
  `category_created_at` datetime                  NOT NULL  DEFAULT '0000-00-00 00:00:00',
  `category_updated_at` datetime                  NOT NULL  DEFAULT '0000-00-00 00:00:00',
  `category_status`     enum('active','inactive') NOT NULL  DEFAULT 'active',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

--
-- Dumping data for table `categories`
--

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id`             int(11)      unsigned NOT NULL  AUTO_INCREMENT,
  `setting_name`   varchar(255)          NOT NULL  DEFAULT '0',
  `setting_value`  varchar(255)          NOT NULL  DEFAULT '0',
  `setting_type`   enum('string','int','float','double','bool') NOT NULL  DEFAULT 'string',
  `setting_status` enum('active','inactive','deleted') NOT NULL  DEFAULT 'active',
  PRIMARY KEY (`id`, `setting_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `menu_group_id`    int(11)      unsigned NOT NULL  DEFAULT '0',
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


-- --------------------------------------------------------
-- Yoteyote Specfic Tables
-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Table structure for table `admin_bank`
--

DROP TABLE IF EXISTS `admin_bank`;
CREATE TABLE IF NOT EXISTS `admin_bank` (
  `id`         int(11)  unsigned NOT NULL  AUTO_INCREMENT,
  `admin_bank` int(100)                    DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `currency_setting`
--

DROP TABLE IF EXISTS `currency_setting`;
CREATE TABLE IF NOT EXISTS `currency_setting` (
  `id`             int(11)      unsigned NOT NULL  AUTO_INCREMENT,
  `currency_title` varchar(100)                    DEFAULT NULL,
  `currency_rate`  decimal(10,0)                   DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currency_setting`
--

-- --------------------------------------------------------

--
-- Table structure for table `deduction`
--

DROP TABLE IF EXISTS `deduction`;
CREATE TABLE IF NOT EXISTS `deduction` (
  `id`               int(11) unsigned NOT NULL  AUTO_INCREMENT,
  `deduction_mobile` double                     DEFAULT '0',
  `deduction_transc` double                     DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `deduction`
--

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

DROP TABLE IF EXISTS `listings`;
CREATE TABLE IF NOT EXISTS `listings` (
  `id`              int(11)  unsigned NOT NULL  AUTO_INCREMENT,
  `listing_post_id` int(11)  unsigned           DEFAULT NULL,
  `listing_user_id` int(11)  unsigned           DEFAULT NULL,
  `listing__date`   datetime                    DEFAULT '0000-00-00 00:00:00',
  `listing_bid`     int(11)                     DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `listings`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id`             int(11)  unsigned NOT NULL  AUTO_INCREMENT,
  `log_trans_date` datetime                    DEFAULT '0000-00-00 00:00:00',
  `log_user_bank`  double                      DEFAULT '0',
  `log_user_id`    int(11) unsigned            DEFAULT NULL,
  `log_admin_bank` double                      DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `log`
--

-- --------------------------------------------------------

--
-- Table structure for table `ongoing`
--

DROP TABLE IF EXISTS `ongoing`;
CREATE TABLE IF NOT EXISTS `ongoing` (
  `id`              int(11) unsigned NOT NULL  AUTO_INCREMENT,
  `post_by_user_id` int(11) unsigned           DEFAULT NULL,
  `won_by_user_id`  int(11) unsigned           DEFAULT NULL,
  `on_amount`       int(11) unsigned           DEFAULT NULL,
  `post_id`         int(11) unsigned           DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id`               int(11)      unsigned NOT NULL  AUTO_INCREMENT,
  `post_title`       varchar(255)          NOT NULL,
  `post_description` text                  NOT NULL,
  `post_type`        varchar(4)            NOT NULL,
  `post_date`        datetime              NOT NULL  DEFAULT '0000-00-00 00:00:00',
  `post_amount`      int(11)      unsigned NOT NULL,
  `post_currency`    varchar(20)           NOT NULL,
  `post_user_id`     int(11)      unsigned NOT NULL,
  `post_pic`         varchar(255)                    DEFAULT NULL,
  `post_active`      enum('y','n')                   DEFAULT 'y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

-- --------------------------------------------------------

--
-- Table structure for table `trust`
--

DROP TABLE IF EXISTS `trust`;
CREATE TABLE IF NOT EXISTS `trust` (
  `id`            int(11) unsigned NOT NULL  AUTO_INCREMENT,
  `trust_user_id` int(11) unsigned           DEFAULT NULL,
  `trust_by_id`   int(11) unsigned           DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trust`
--

