-- --------------------------------------------------------

--
-- Database: `yoteyote_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id`    varchar(40)           NOT NULL  DEFAULT '0',            -- The session id
  `ip_address`    varchar(45)           NOT NULL  DEFAULT '0',            -- The connection IP - IP4 or IP6
  `user_agent`    varchar(120)          NOT NULL,                         -- The browser user agent
  `last_activity` int(10)      unsigned NOT NULL  DEFAULT 0,              -- The session last activity
  `user_data`     text                  NOT NULL,                         -- The session user data serialized array
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id`               int(11)       unsigned NOT NULL  AUTO_INCREMENT,      -- The user record id
  `user_name`        varchar(32)            NOT NULL,                      -- The user name
  `user_email`       varchar(255)           NOT NULL,                      -- The user email address
  `user_password`    varchar(128)           NOT NULL,                      -- The user password
  `user_ip_address`  varbinary(16)          NOT NULL,                      -- The user IP address
  `user_token`       varchar(128)           NOT NULL,                      -- The user token for hashing
  `user_identifier`  varchar(128)           NOT NULL,                      -- The user identifier for hashing
  `user_recover`     varchar(128)           NOT NULL,                      -- The user password recover hash
  `user_remember_me` tinyint(1)    unsigned NOT NULL  DEFAULT 0,           -- The user remember me
  `user_confirmed`   tinyint(1)    unsigned NOT NULL  DEFAULT 0,           -- The user email confirmed
  `user_last_login`  datetime               NOT NULL  DEFAULT '0000-00-00 00:00:00',  -- The user last logged in date time
  `user_created_at`  datetime               NOT NULL  DEFAULT '0000-00-00 00:00:00',  -- The user created at date time
  `user_updated_at`  datetime               NOT NULL  DEFAULT '0000-00-00 00:00:00',  -- The user updated at date time
  `user_status`      enum('active','inactive','banned','deleted') NOT NULL DEFAULT 'active',  -- The user status
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_password`, `user_ip_address`, `user_token`, `user_identifier`, `user_recover`, `user_remember_me`, `user_confirmed`, `user_last_login`, `user_created_at`, `user_updated_at`, `user_status`) VALUES
(1, 'admin', 'youremail@your.com', 'd48a868eee1cf70395ecc59031779a9daf641a355ba19e33d0b1c4b80dbd2c270b909b2a487ecb9196ca107d3d83fea2021743251eef78fe4519966dbfbb3c5a', '127.0.0.1', 'C2)tPLwRgJzENiWOmY2N!Hd4kOBydjm9BGGuYnjiMHJf8uIZ2njfHSVJgXngY8N!ml9UKBnn8Xj(oSbgkVpMNL213fK)5m!x!S9Dw4Qf4K1xHvEq88CRh21Ir0n3y63w', '484d40dfbc5e513afa26368b2c71efdde1fe7083741700a58de85e742319dc5a8cf31335cebb0c902fb13fe418075593933a171bccec0806fb6b921f7e7b4d24', '', 0, 1, '2013-11-21 09:16:30', '2013-11-21 09:16:30', '2013-11-21 09:16:30', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id`                      int(11)      unsigned NOT NULL  AUTO_INCREMENT,  -- The profile record id
  `profile_user_id`         int(11)      unsigned NOT NULL,                  -- The profile users id
  `profile_first_name`      varchar(45)                     DEFAULT NULL,    -- The profile users first name
  `profile_last_name`       varchar(45)                     DEFAULT NULL,    -- The profile users last name
  `profile_dob`             date                            DEFAULT '0000-00-00',  -- The profile users date of birth
  `profile_gender`          varchar(6)                      DEFAULT NULL,    -- The profile users gender
  `profile_bio`             text,                                            -- The profile users bio
  `profile_mobile`          varchar(15)                     DEFAULT NULL,    -- The profile users mobile phone number
  `profile_bank`            int(11)      unsigned NOT NULL  DEFAULT '0',     -- The profile users bank
  `profile_pic`             varchar(255)                    DEFAULT NULL,    -- The profile users pic
  `profile_country`         varchar(255)                    DEFAULT NULL,    -- The profile users country
  `profile_city`            varchar(100)                    DEFAULT NULL,    -- The profile users city
  `profile_street`          varchar(100)                    DEFAULT NULL,    -- The profile users street address
  `profile_building_name`   varchar(255)                    DEFAULT NULL,    -- The profile users building name
  `profile_building_number` varchar(255)                    DEFAULT NULL,    -- The profile users building number
  `profile_nickname`        varchar(255)                    DEFAULT NULL,    -- The profile users nick name
  `profile_created_at`      datetime              NOT NULL  DEFAULT '0000-00-00 00:00:00',  -- The profile created at date time
  `profile_updated_at`      datetime              NOT NULL  DEFAULT '0000-00-00 00:00:00',  -- The profile updated at date time
  PRIMARY KEY (`id`),
  UNIQUE KEY `profile_nickname` (`profile_nickname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `profile_user_id`, `profile_first_name`, `profile_last_name`, `profile_dob`, `profile_gender`, `profile_bio`, `profile_mobile`, `profile_bank`, `profile_pic`, `profile_country`, `profile_city`, `profile_street`, `profile_building_name`, `profile_building_number`, `profile_nickname`, `profile_created_at`, `profile_updated_at`) VALUES
(1, 1, NULL, NULL, '0000-00-00', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id`                int(11)      unsigned NOT NULL  AUTO_INCREMENT,
  `group_name`        varchar(20)           NOT NULL,
  `group_description` varchar(100)          NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;


--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `group_description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'owner', 'Site Owner'),
(3, 'moderator', 'Site Moderator'),
(4, 'editor', 'Site Editor'),
(5, 'members', 'Site Member'),
(6, 'user', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id`       int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id`  int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id`               int(11)      unsigned NOT NULL  AUTO_INCREMENT,      -- The page record id
  `page_title`       varchar(128)          NOT NULL,                      -- The page title      - 'Home'
  `page_slug`        varchar(128)          NOT NULL,                      -- The page page slug  - 'home'
  `page_headline`    varchar(255)          NOT NULL,                      -- The page headline
  `page_keywords`    text,                                                -- The page meta keywords
  `page_description` text,                                                -- The page meta description
  `page_content`     longtext,                                            -- The page content text
  `page_author`      int(11)      unsigned NOT NULL  DEFAULT 1,         -- The page content author
  `page_location`    tinyint(1)   unsigned NOT NULL  DEFAULT 1,         -- The page location
  `page_type`        tinyint(1)   unsigned NOT NULL  DEFAULT 1,         -- The page type
  `page_created_at`  datetime              NOT NULL  DEFAULT '0000-00-00 00:00:00',  -- The page created at date time
  `page_updated_at`  datetime              NOT NULL  DEFAULT '0000-00-00 00:00:00',  -- The page updated at date time
  `page_status`      enum('published','draft') NOT NULL  DEFAULT 'published',        -- The page status
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Dumping data for Table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `page_slug`, `page_headline`, `page_keywords`, `page_description`, `page_content`, `page_author`, `page_location`, `page_type`, `page_created_at`, `page_updated_at`, `page_status`) VALUES
('1', 'Home', 'home', '', 'meta keywords', 'meta description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed libero consectetur arcu suscipit convallis. Sed accumsan dictum risus, sollicitudin eleifend velit mollis eget. Curabitur varius orci sagittis sapien elementum porta. Pellentesque interdum nulla quis purus luctus nec auctor sem venenatis. Vivamus ultrices odio sit amet metus faucibus suscipit. Morbi sed enim a sapien facilisis scelerisque. Duis facilisis leo quis sapien laoreet eget mollis ipsum condimentum. Etiam placerat accumsan leo, vel faucibus nunc ultrices vel. Aenean tristique mi vitae orci consequat id fermentum tortor accumsan. Donec adipiscing turpis sem. Mauris rhoncus tellus ac elit consequat consectetur. Maecenas elementum volutpat ligula at malesuada.', 2, 1, 1, NOW(), NOW(), 'published'),
('2', 'About', 'about', '', 'meta keywords', 'meta description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed libero consectetur arcu suscipit convallis. Sed accumsan dictum risus, sollicitudin eleifend velit mollis eget. Curabitur varius orci sagittis sapien elementum porta. Pellentesque interdum nulla quis purus luctus nec auctor sem venenatis. Vivamus ultrices odio sit amet metus faucibus suscipit. Morbi sed enim a sapien facilisis scelerisque. Duis facilisis leo quis sapien laoreet eget mollis ipsum condimentum. Etiam placerat accumsan leo, vel faucibus nunc ultrices vel. Aenean tristique mi vitae orci consequat id fermentum tortor accumsan. Donec adipiscing turpis sem. Mauris rhoncus tellus ac elit consequat consectetur. Maecenas elementum volutpat ligula at malesuada.', 2, 1, 1, NOW(), NOW(), 'published'),
('3', 'Contact', 'contact', '', 'meta keywords', 'meta description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed libero consectetur arcu suscipit convallis. Sed accumsan dictum risus, sollicitudin eleifend velit mollis eget. Curabitur varius orci sagittis sapien elementum porta. Pellentesque interdum nulla quis purus luctus nec auctor sem venenatis. Vivamus ultrices odio sit amet metus faucibus suscipit. Morbi sed enim a sapien facilisis scelerisque. Duis facilisis leo quis sapien laoreet eget mollis ipsum condimentum. Etiam placerat accumsan leo, vel faucibus nunc ultrices vel. Aenean tristique mi vitae orci consequat id fermentum tortor accumsan. Donec adipiscing turpis sem. Mauris rhoncus tellus ac elit consequat consectetur. Maecenas elementum volutpat ligula at malesuada.', 2, 1, 1, NOW(), NOW(), 'published');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id`                 int(11)      unsigned NOT NULL  AUTO_INCREMENT,    -- The comment record id
  `comment_user_name`  varchar(255)          NOT NULL,                    -- The comment users name
  `comment_email`      varchar(255)          NOT NULL,                    -- The comment users email address
  `comment_content`    varchar(255)          NOT NULL,                    -- The comment content text
  `comment_post_id`    int(11)      unsigned NOT NULL,                    -- The comment post id
  `comment_created_at` datetime              NOT NULL  DEFAULT '0000-00-00 00:00:00',  -- the comment created at date time
  `comment_updated_at` datetime              NOT NULL  DEFAULT '0000-00-00 00:00:00',  -- The comment updated at date time
  `comment_status`     enum('active','inactive') NOT NULL DEFAULT 'active',            -- The comment status
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
  `id`                  int(11)          unsigned NOT NULL  AUTO_INCREMENT,  -- The category record id
  `category_name`       varchar(255)              NOT NULL  DEFAULT '',      -- The category name
  `category_short_desc` varchar(255)              NOT NULL  DEFAULT '',      -- The category short description
  `category_long_desc`  text,                                                -- The category long description
  `category_sort_order` int(3)                    NOT NULL  DEFAULT '0',     -- The category sort order
  `category_parent_id`  int(11)          unsigned NOT NULL  DEFAULT '0',     -- The category parent id
  `category_created_at` datetime                  NOT NULL  DEFAULT '0000-00-00 00:00:00',  -- The category created at date time
  `category_updated_at` datetime                  NOT NULL  DEFAULT '0000-00-00 00:00:00',  -- the category updated at date time
  `category_status`     enum('active','inactive') NOT NULL  DEFAULT 'active',               -- The category status
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
  `id`             int(11)      unsigned NOT NULL  AUTO_INCREMENT,        -- The setting record id
  `setting_name`   varchar(255)          NOT NULL  DEFAULT '0',           -- The setting name
  `setting_value`  varchar(255)          NOT NULL  DEFAULT '0',           -- The setting value
  `setting_type`   enum('string','int','float','double','bool') NOT NULL DEFAULT 'string',  -- The setting type
  `setting_status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',           -- The setting status
  PRIMARY KEY (`id`, `setting_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id`          int(11)     unsigned NOT NULL  AUTO_INCREMENT,       -- The menu record id
  `menu_title`  varchar(50)          NOT NULL,                       -- The menu title - 'Topmenu'
  `menu_slug`   varchar(20)          NOT NULL,                       -- The menu slug  - 'topmenu'
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Navigation main menus. Eg, header, sidebar, footer, etc' ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu_title`, `menu_slug`) VALUES
(1, 'Topmenu', 'topmenu'),        -- Top main navigation menu
(2, 'Header', 'header'),          -- Any menu in a header
(3, 'Sidebar', 'sidebar'),        -- Sidebar menu left
(4, 'Sidebar2', 'sidebar2'),      -- Sidebar menu Right
(5, 'Slideout', 'slideout'),      -- Slideout menu Left
(6, 'Slideout2', 'slideout2'),    -- Slideout menu Right
(7, 'Footer', 'footer');          -- Bottom footer menu

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE IF NOT EXISTS `menu_items` (
  `id`               int(11)      unsigned NOT NULL  AUTO_INCREMENT,      -- The menuitem record id
  `menu_title`       varchar(100)          NOT NULL  DEFAULT '',          -- The menuitem title
  `menu_link_type`   varchar(20)           NOT NULL  DEFAULT 'uri',       -- The menuitem link type ( 'url' or 'uri' )
  `menu_page_id`     int(11)      unsigned NOT NULL  DEFAULT '0',         -- The menuitem page id
  `menu_module_name` varchar(50)           NOT NULL  DEFAULT '',          -- The menuitem module name
  `menu_url`         varchar(255)          NOT NULL  DEFAULT '',          -- The menuitem url - 'http://www.your.com/controller/method'
  `menu_uri`         varchar(255)          NOT NULL  DEFAULT '',          -- The menuitem uri - 'controller/method'
  `menu_id`          int(11)      unsigned NOT NULL  DEFAULT '0',         -- The menuitem main menu id
  `menu_position`    int(5)       unsigned NOT NULL  DEFAULT '0',         -- The menuitem postion
  `menu_target`      varchar(10)                     DEFAULT NULL,        -- The menuitem target ('_self / _blank' etc;)
  `menu_show`        int(1)       unsigned NOT NULL  DEFAULT '1',         -- The menuitem menu show
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Links for site menu' ;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_title`, `menu_link_type`, `menu_page_id`, `menu_module_name`, `menu_url`, `menu_uri`, `menu_id`, `menu_position`, `menu_target`, `menu_show`) VALUES
(1, 'Home', 'page', 1, '', '', '', 1, 1, NULL, 1),
(2, 'Home', 'page', 1, '', '', '', 2, 1, '_self', 1),
(4, 'About us', 'page', 3, '', '', '', 1, 2, '_self', 1),
(5, 'Forums', 'module', 0, 'forums', '', '', 1, 3, '_self', 1);


-- --------------------------------------------------------
-- Yoteyote Specfic Tables
-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Table structure for table `admin_bank`
--

DROP TABLE IF EXISTS `admin_bank`;
CREATE TABLE IF NOT EXISTS `admin_bank` (
  `id`         int(11)  unsigned NOT NULL  AUTO_INCREMENT,                -- The admin bank record id
  `admin_bank` int(100)                    DEFAULT NULL,                  -- The admin bank
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
  `id`             int(11)      unsigned NOT NULL  AUTO_INCREMENT,        -- The currency record id
  `currency_title` varchar(100)                    DEFAULT NULL,          -- The currency title
  `currency_rate`  decimal(10,0)                   DEFAULT '0',           -- The currency rate value
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
  `id`               int(11) unsigned NOT NULL  AUTO_INCREMENT,           -- The deduction record id
  `deduction_mobile` double                     DEFAULT '0',              -- The deduction mobile
  `deduction_transc` double                     DEFAULT '0',              -- The deduction transaction
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
  `id`                 int(11)  unsigned NOT NULL  AUTO_INCREMENT,        -- The listing record id
  `listing_post_id`    int(11)  unsigned           DEFAULT NULL,          -- The listing post id
  `listing_user_id`    int(11)  unsigned           DEFAULT NULL,          -- The listing user id
  `listing_bid`        int(11)                     DEFAULT NULL,          -- The listing bid
  `listing_created_at` datetime                    DEFAULT '0000-00-00 00:00:00',  -- The listing created at date time
  `listing_updated_at` datetime                    DEFAULT '0000-00-00 00:00:00',  -- The listing updated at date time
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
  `id`             int(11)  unsigned NOT NULL  AUTO_INCREMENT,            -- The log record id
  `log_user_bank`  double                      DEFAULT '0',               -- The log user bank
  `log_user_id`    int(11) unsigned            DEFAULT NULL,              -- The log user id
  `log_admin_bank` double                      DEFAULT '0',               -- The log admin bank
  `log_trans_date` datetime                    DEFAULT '0000-00-00 00:00:00',  -- The log traansaction date
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `log`
--

-- --------------------------------------------------------

--
-- Table structure for table `on_going`
--

DROP TABLE IF EXISTS `on_going`;
CREATE TABLE IF NOT EXISTS `on_going` (
  `id`              int(11) unsigned NOT NULL  AUTO_INCREMENT,            -- The on going record id
  `post_by_user_id` int(11) unsigned           DEFAULT NULL,              -- The on going post by user id
  `won_by_user_id`  int(11) unsigned           DEFAULT NULL,              -- The on going won by user id
  `won_amount`      int(11) unsigned           DEFAULT NULL,              -- The on going won amount
  `post_id`         int(11) unsigned           DEFAULT NULL,              -- The on going post id
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `on_going`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id`               int(11)      unsigned NOT NULL  AUTO_INCREMENT,      -- The post record id
  `post_user_id`     int(11)      unsigned NOT NULL,                      -- The post user id
  `post_title`       varchar(255)          NOT NULL,                      -- The post title - 'Home'
  `post_slug`        varchar(255)          NOT NULL,                      -- The post slug  - 'home'
  `post_description` text                  NOT NULL,                      -- The post description
  `post_type`        varchar(4)            NOT NULL,                      -- The post type
  `post_amount`      int(11)      unsigned NOT NULL,                      -- The post amount
  `post_currency`    varchar(20)           NOT NULL,                      -- The post currency
  `post_pic`         varchar(255)                    DEFAULT NULL,        -- The post picture
  `post_created_at`  datetime              NOT NULL  DEFAULT '0000-00-00 00:00:00',  -- The post created at date time
  `post_updated_at`  datetime              NOT NULL  DEFAULT '0000-00-00 00:00:00',  -- The post updated at date time
  `post_active`      enum('y','n')                   DEFAULT 'y',                    -- The post active status
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
  `id`            int(11) unsigned NOT NULL  AUTO_INCREMENT,              -- The trust record id
  `trust_user_id` int(11) unsigned           DEFAULT NULL,                -- The trust user id
  `trust_by_id`   int(11) unsigned           DEFAULT '0',                 -- The trust by id
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trust`
--
