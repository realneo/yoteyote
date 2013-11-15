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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id`               int(11)       unsigned NOT NULL  AUTO_INCREMENT,     -- The users record id
  `user_name`        varchar(32)            NOT NULL,                     -- The users name
  `user_email`       varchar(255)           NOT NULL,                     -- The users email address
  `user_password`    varchar(128)           NOT NULL,                     -- The users password
  `user_ip_address`  varchar(45)            NOT NULL  DEFAULT '0',        -- The users ip address
  `user_token`       varchar(128)           NOT NULL,                     -- The users token used for secure hashing
  `user_identifier`  varchar(128)           NOT NULL,                     -- The users identifier used for secure hashing
  `user_recover`     varchar(128)           NOT NULL,                     -- The users recover for recovering lost passwords - secure hashed key
  `user_remember_me` tinyint(1)    unsigned NOT NULL  DEFAULT 0,          -- The users remember me for auto login
  `user_confirmed`   tinyint(1)    unsigned NOT NULL  DEFAULT 0,          -- The users confirmed for checking email conformation
  `user_last_login`  datetime,                                            -- The users last login date and time
  `user_created_at`  datetime,                                            -- The users created at the date time the record was created at
  `user_updated_at`  datetime,                                            -- The users updated at the date time the recored was updated at
  `user_status`      enum('active','banned') NOT NULL DEFAULT 'active',   -- The users status - active or banned
  PRIMARY KEY  (`id`),
  UNIQUE  KEY `user_name` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `groups` (`id`, `user_name`, `user_email`, `user_password`, `user_ip_address`, `user_token`, `user_identifier`, `user_recover`, `user_remember_me`, `user_confirmed`, `user_last_login`, `user_created_at`, `user_updated_at`, `user_status`) VALUES
(1, 'admin', 'youremail@your.com', '', '0', '', '', '', '0', '1', NOW(), NOW(), NOW(), 'active');

-- -------------------------------------------------
--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id`          int(11)      unsigned NOT NULL  AUTO_INCREMENT,           -- The group id
  `name`        varchar(20)           NOT NULL,                           -- The group name
  `description` varchar(100)          NOT NULL,                           -- The group description
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1,'admin','Administrator'),
(2,'owner','Site Owner'),
(3,'moderator','Site Moderator'),
(4,'editor','Site Editor'),
(5,'member','Site Member'),
(6,'user','General User');

-- -------------------------------------------------
--
-- Table structure for table `user_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id`       int(11) unsigned NOT NULL  AUTO_INCREMENT,                   -- The user_groups id
  `user_id`  int(11) unsigned NOT NULL,                                   -- The user_groups user id
  `group_id` int(11) unsigned NOT NULL,                                   -- The user_groups group id
  PRIMARY KEY (`id`),
  KEY `fk_users_groups_users_idx`  (`user_id`),
  KEY `fk_users_groups_groups_idx` (`group_id`),
  CONSTRAINT `uc_users_groups` UNIQUE (`user_id`, `group_id`),
  CONSTRAINT `fk_users_groups_users`  FOREIGN KEY (`user_id`)  REFERENCES `users` (`id`)  ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_groups` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------------
--
-- Dumping data for table `user_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1,1,1),
(2,1,2);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id`                int(11)      unsigned NOT NULL  AUTO_INCREMENT,     -- The page id
  `page_title`        varchar(128)          NOT NULL,                     -- The page title
  `page_headline`     varchar(255)          NOT NULL,                     -- The page headline
  `page_url`          varchar(128)          NOT NULL,                     -- The page url
  `page_keywords`     text,                                               -- The page meta keywords
  `page_description`  text,                                               -- The page meta description
  `page_content`      longtext,                                           -- The page main content
  `page_author`       int(11)      unsigned NOT NULL  DEFAULT '1',        -- The page author - the users id that created or updated the page
  `page_location`     tinyint(1)   unsigned NOT NULL  DEFAULT '1',        -- The page location - front page, admin page etc;
  `page_type`         tinyint(1)   unsigned NOT NULL  DEFAULT '1',        -- The page type -
  `page_allow_delete` tinyint(1)   unsigned NOT NULL  DEFAULT '1',        -- The page allow delete - for protecting pages that should not be deleted
  `page_show_in_menu` tinyint(1)   unsigned NOT NULL  DEFAULT '1',        -- The page show in menu
  `page_rights`       text,                                               -- The page group restrictions - json encoded array
  `page_created_at`   datetime,                                           -- The page created at date time
  `page_updated_at`   datetime,                                           -- The page updated at date time
  `page_status`       enum('published','draft') NOT NULL  DEFAULT 'published',  -- The page status - published or draft
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for Table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `page_headline`, `page_url`, `page_keywords`, `page_description`, `page_content`, `page_author`, `page_location`, `page_type`, `page_allow_delete`, `page_show_in_menu`, `page_rights`, `page_created_at`, `page_updated_at`, `page_status`) VALUES
('1', 'Home', '', 'home', 'meta keywords', 'meta description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed libero consectetur arcu suscipit convallis. Sed accumsan dictum risus, sollicitudin eleifend velit mollis eget. Curabitur varius orci sagittis sapien elementum porta. Pellentesque interdum nulla quis purus luctus nec auctor sem venenatis. Vivamus ultrices odio sit amet metus faucibus suscipit. Morbi sed enim a sapien facilisis scelerisque. Duis facilisis leo quis sapien laoreet eget mollis ipsum condimentum. Etiam placerat accumsan leo, vel faucibus nunc ultrices vel. Aenean tristique mi vitae orci consequat id fermentum tortor accumsan. Donec adipiscing turpis sem. Mauris rhoncus tellus ac elit consequat consectetur. Maecenas elementum volutpat ligula at malesuada.', '1', '1', '1', '1', '1', '', NOW(), NOW(), 'published'),
('2', 'About', '', 'about', 'meta keywords', 'meta description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed libero consectetur arcu suscipit convallis. Sed accumsan dictum risus, sollicitudin eleifend velit mollis eget. Curabitur varius orci sagittis sapien elementum porta. Pellentesque interdum nulla quis purus luctus nec auctor sem venenatis. Vivamus ultrices odio sit amet metus faucibus suscipit. Morbi sed enim a sapien facilisis scelerisque. Duis facilisis leo quis sapien laoreet eget mollis ipsum condimentum. Etiam placerat accumsan leo, vel faucibus nunc ultrices vel. Aenean tristique mi vitae orci consequat id fermentum tortor accumsan. Donec adipiscing turpis sem. Mauris rhoncus tellus ac elit consequat consectetur. Maecenas elementum volutpat ligula at malesuada.', '1', '1', '1', '1', '1', '', NOW(), NOW(), 'published'),
('3', 'Contact Us', '', 'contact_us', 'meta keywords', 'meta description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed libero consectetur arcu suscipit convallis. Sed accumsan dictum risus, sollicitudin eleifend velit mollis eget. Curabitur varius orci sagittis sapien elementum porta. Pellentesque interdum nulla quis purus luctus nec auctor sem venenatis. Vivamus ultrices odio sit amet metus faucibus suscipit. Morbi sed enim a sapien facilisis scelerisque. Duis facilisis leo quis sapien laoreet eget mollis ipsum condimentum. Etiam placerat accumsan leo, vel faucibus nunc ultrices vel. Aenean tristique mi vitae orci consequat id fermentum tortor accumsan. Donec adipiscing turpis sem. Mauris rhoncus tellus ac elit consequat consectetur. Maecenas elementum volutpat ligula at malesuada.', '1', '1', '1', '1', '1', '', NOW(), NOW(), 'published');

-- --------------------------------------------------------

--
-- Table structure for table `special_urls`
--

DROP TABLE IF EXISTS `special_urls`;
CREATE TABLE IF NOT EXISTS `special_urls` (
  `id`          int(11)  unsigned NOT NULL  AUTO_INCREMENT,               -- The special_urls id
  `special_url` medtext,                                                  -- will store a json encoded array - key value pairs.
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for Table `special_urls`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id`             int(11)      unsigned NOT NULL  AUTO_INCREMENT,        -- The comment id
  `com_author`     varchar(255)          NOT NULL,                        -- The comment author's name
  `com_email`      varchar(255)          NOT NULL,                        -- The comment author's email address
  `com_content`    text,                                                  -- The comment main content
  `com_post_id`    int(11)      unsigned NOT NULL,                        -- The comment post, page or webpage id
  `com_created_at` datetime,                                              -- The comment created at date time
  `com_updated_at` datetime,                                              -- The comment updated at date time
  `com_status`     enum('active','inactive') NOT NULL  default 'active',  -- The comment status - active or inactive
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `com_name`, `com_email`, `com_content`, `com_post_id`, `com_created_at`, `com_updated_at`, `com_status`) VALUES
(1, 'Admin', 'someone@example.com', 'This is a test comment.', 1, NOW(), NOW(), 'active');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id`             int(11)      unsigned NOT NULL  AUTO_INCREMENT,        -- The category id
  `cat_name`       varchar(255)          NOT NULL  DEFAULT '',            -- The category name
  `cat_short_desc` varchar(255)          NOT NULL  DEFAULT '',            -- The category short description
  `cat_long_desc`  text,                                                  -- The category long description
  `cat_sort_order` int(3)                NOT NULL  DEFAULT '0',           -- The category sort order
  `cat_parent_id`  int(11)      unsigned NOT NULL  DEFAULT '0',           -- The category parent id
  `cat_created_at` datetime,                                              -- The category created at date time
  `cat_updated_at` datetime,                                              -- The category updated at date time
  `cat_status`     enum('active','inactive') NOT NULL  DEFAULT 'active',  -- The category status - active inactive
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `cat_short_desc`, `cat_long_desc`, `cat_sort_order`, `cat_parent_id`, `cat_created_at`, `cat_updated_at`, `cat_status`) VALUES
(1, 'News', 'Latest News', 'This is the latest News for this Blog.', 0, 0, NOW(), NOW(), 'active'),
(2, 'Rants', 'Latest Rants', 'This is the latest Rants for this Blog.', 0, 0, NOW(), NOW(), 'active'),
(3, 'Fun', 'Latest Fun', 'This is the latest Fun for this Blog.', 0, 0, NOW(), NOW(), 'active');


