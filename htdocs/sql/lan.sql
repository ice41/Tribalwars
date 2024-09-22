-- phpMyAdmin SQL Dump
-- version 2.9.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 23, 2016 at 08:11 PM
-- Server version: 5.0.24
-- PHP Version: 4.4.4
-- 
-- Database: `lan`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `ally`
-- 

CREATE TABLE `ally` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(200) character set latin1 collate latin1_german1_ci NOT NULL,
  `short` varchar(100) character set latin1 collate latin1_german1_ci NOT NULL,
  `points` int(20) NOT NULL,
  `rank` int(11) NOT NULL,
  `best_points` int(20) NOT NULL,
  `members` int(11) NOT NULL,
  `villages` int(11) NOT NULL,
  `intern_text` text character set latin1 collate latin1_german1_ci NOT NULL,
  `description` text character set latin1 collate latin1_german1_ci NOT NULL,
  `homepage` varchar(640) collate utf8_unicode_ci NOT NULL,
  `irc` varchar(640) collate utf8_unicode_ci NOT NULL,
  `image` varchar(20) collate utf8_unicode_ci NOT NULL,
  `intro_igm` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `rank` (`rank`),
  KEY `name` (`name`),
  KEY `short` (`short`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `ally`
-- 

INSERT INTO `ally` VALUES (1, 'trib', 'trib', 5809, 1, 5809, 1, 1, 'Wendet+euch+bei+Fragen+an+admin%0A%0ADieser+Text+kann+von+der+Stammesf%FChrung+ge%E4ndert+werden.', 'trib+wurde+von+admin+gegr%FCndet%0AWendet+euch+bei+Fragen+an+admin%0A%0ADieser+Text+kann+von+den+Diplomaten+des+Stammes+ge%E4ndert+werden.', '', '', '', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `ally_contracts`
-- 

CREATE TABLE `ally_contracts` (
  `from_ally` int(11) NOT NULL,
  `type` varchar(10) collate latin1_general_ci NOT NULL,
  `to_ally` int(11) NOT NULL,
  `short` varchar(6) collate latin1_general_ci NOT NULL,
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `ally_contracts`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `ally_events`
-- 

CREATE TABLE `ally_events` (
  `id` int(11) NOT NULL auto_increment,
  `ally` int(11) NOT NULL,
  `time` varchar(200) character set latin1 collate latin1_german1_ci NOT NULL,
  `message` text character set latin1 collate latin1_german1_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `ally` (`ally`),
  KEY `time` (`time`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `ally_events`
-- 

INSERT INTO `ally_events` VALUES (1, 1, '1308291233', 'Der+Stamm+wurde+von+%3Ca+href%3D%22game.php%3Fvillage%3D%3B%26screen%3Dinfo_player%26id%3D16%22%3Eadmin%3C%2Fa%3E+gegr%FCndet.');

-- --------------------------------------------------------

-- 
-- Table structure for table `ally_invites`
-- 

CREATE TABLE `ally_invites` (
  `id` int(11) NOT NULL auto_increment,
  `from_ally` int(11) NOT NULL,
  `to_userid` int(11) NOT NULL,
  `to_username` varchar(200) character set latin1 collate latin1_german1_ci NOT NULL,
  `time` int(40) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `ally_invites`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `announcement`
-- 

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL auto_increment,
  `text` text character set latin1 collate latin1_german1_ci NOT NULL,
  `link` varchar(320) character set latin1 collate latin1_german1_ci NOT NULL,
  `graphic` varchar(100) character set latin1 collate latin1_german1_ci NOT NULL,
  `time` int(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `announcement`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `awards`
-- 

CREATE TABLE `awards` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) NOT NULL,
  `last_rep_id` int(10) NOT NULL,
  `min_vill` int(12) NOT NULL,
  `max_points` varchar(15) collate latin1_general_ci NOT NULL,
  `best_rank` int(2) NOT NULL,
  `robber` varchar(22) collate latin1_general_ci NOT NULL,
  `plunderer` varchar(12) collate latin1_general_ci NOT NULL,
  `leader` varchar(12) collate latin1_general_ci NOT NULL,
  `conquest` int(10) NOT NULL,
  `jinx` int(2) NOT NULL,
  `lucky` int(2) NOT NULL,
  `dealer` varchar(12) collate latin1_general_ci NOT NULL,
  `krsus` int(8) NOT NULL,
  `demolisher` int(10) NOT NULL,
  `scout_hunter` int(10) NOT NULL,
  `steps` varchar(25) collate latin1_general_ci NOT NULL,
  `steps_all` int(3) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `awards`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `build`
-- 

CREATE TABLE `build` (
  `id` int(11) NOT NULL auto_increment,
  `building` varchar(30) character set latin1 collate latin1_german1_ci NOT NULL,
  `villageid` int(11) default NULL,
  `end_time` int(25) NOT NULL,
  `build_time` int(25) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `villageid` (`villageid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

-- 
-- Dumping data for table `build`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `create_village`
-- 

CREATE TABLE `create_village` (
  `nw_c` int(10) NOT NULL default '1',
  `no_c` int(10) NOT NULL default '1',
  `so_c` int(10) NOT NULL default '1',
  `sw_c` int(10) NOT NULL default '1',
  `nw` int(10) NOT NULL default '0',
  `no` int(10) NOT NULL default '0',
  `so` int(10) NOT NULL default '0',
  `sw` int(10) NOT NULL default '0',
  `no_alpha` int(10) NOT NULL default '0',
  `nw_alpha` int(10) NOT NULL default '0',
  `so_alpha` int(10) NOT NULL default '0',
  `sw_alpha` int(10) NOT NULL default '0',
  `next_left` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `create_village`
-- 

INSERT INTO `create_village` VALUES (3, 4, 2, 4, 2, 2, 2, 1, 51, 71, 83, 0, 6);

-- --------------------------------------------------------

-- 
-- Table structure for table `dealers`
-- 

CREATE TABLE `dealers` (
  `id` int(11) NOT NULL auto_increment,
  `from_userid` int(11) NOT NULL,
  `to_userid` int(11) NOT NULL,
  `from_village` int(11) NOT NULL,
  `to_village` int(11) NOT NULL,
  `wood` int(11) NOT NULL,
  `stone` int(11) NOT NULL,
  `iron` int(11) NOT NULL,
  `start_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `is_offer` int(1) NOT NULL default '0',
  `dealers` int(6) NOT NULL default '0',
  `type` varchar(4) character set latin1 collate latin1_german1_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `from_village` (`from_village`),
  KEY `to_village` (`to_village`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `dealers`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `events`
-- 

CREATE TABLE `events` (
  `id` int(11) NOT NULL auto_increment,
  `event_time` int(11) default '0',
  `event_type` varchar(15) character set latin1 collate latin1_german1_ci default NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `villageid` int(15) default NULL,
  `knot_event` int(15) NOT NULL,
  `cid` varchar(32) character set latin1 collate latin1_german1_ci default '0',
  `can_knot` int(1) NOT NULL default '0',
  `is_locked` int(1) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `event_type` (`event_type`),
  KEY `event_id` (`event_id`),
  KEY `event_time` (`event_time`),
  KEY `user_id` (`user_id`),
  KEY `villageid` (`villageid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

-- 
-- Dumping data for table `events`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `forum_message`
-- 

CREATE TABLE `forum_message` (
  `message_id` int(11) NOT NULL auto_increment,
  `thread_id` int(11) NOT NULL,
  `ally_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(10000) character set latin1 collate latin1_german1_ci NOT NULL,
  `time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  KEY `message_id` (`message_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `forum_message`
-- 

INSERT INTO `forum_message` VALUES (1, 1, 1, 16, '34123', '2010-12-11 11:01:18');
INSERT INTO `forum_message` VALUES (2, 2, 4, 19, 'asfda', '2010-12-13 13:43:09');
INSERT INTO `forum_message` VALUES (3, 2, 4, 19, '[url]www.dslan.hi2.ro[/url] [b]asa da[/b]', '2010-12-13 13:43:53');
INSERT INTO `forum_message` VALUES (6, 4, 1, 17, '[b]gdsds[/b]', '2010-12-31 13:09:48');
INSERT INTO `forum_message` VALUES (7, 5, 3, 17, 'Buna cmf mai?', '2011-01-03 15:57:46');
INSERT INTO `forum_message` VALUES (8, 6, 1, 17, '[b]gdfgdfgd[/b]', '2011-01-15 10:29:36');
INSERT INTO `forum_message` VALUES (9, 7, 2, 58, 'testtt', '2011-06-16 17:24:09');

-- --------------------------------------------------------

-- 
-- Table structure for table `forum_structure`
-- 

CREATE TABLE `forum_structure` (
  `ally_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL auto_increment,
  `name` varchar(20) character set latin1 collate latin1_german1_ci NOT NULL,
  `order_id` int(11) NOT NULL,
  KEY `area_id` (`area_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `forum_structure`
-- 

INSERT INTO `forum_structure` VALUES (5, 3, 'dfbgd', 0);
INSERT INTO `forum_structure` VALUES (6, 4, 'dgfs', 0);
INSERT INTO `forum_structure` VALUES (3, 5, 'DsLan', 0);
INSERT INTO `forum_structure` VALUES (1, 7, 'fvsdfds', 1);
INSERT INTO `forum_structure` VALUES (4, 8, 'dada', 1);
INSERT INTO `forum_structure` VALUES (2, 9, 'test', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `forum_thread`
-- 

CREATE TABLE `forum_thread` (
  `subject` varchar(50) collate latin1_general_ci NOT NULL,
  `thread_id` int(11) NOT NULL auto_increment,
  `area_id` int(11) NOT NULL,
  `ally_id` int(11) NOT NULL,
  `flagman_id` int(11) NOT NULL,
  `flagman_ts` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `last_post_id` int(11) NOT NULL,
  `last_post_ts` timestamp NULL default NULL,
  `answer` int(11) default '0',
  `status` int(1) default '0',
  KEY `thread_id` (`thread_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `forum_thread`
-- 

INSERT INTO `forum_thread` VALUES ('213', 1, 1, 1, 16, '2010-12-11 11:01:18', 16, '2010-12-11 11:01:18', 0, 0);
INSERT INTO `forum_thread` VALUES ('sdfdsfg', 4, 1, 1, 17, '2010-12-31 13:09:48', 17, '2010-12-31 13:09:48', 0, 0);
INSERT INTO `forum_thread` VALUES ('Salut', 5, 5, 3, 17, '2011-01-03 15:57:46', 17, '2011-01-03 15:57:46', 0, 0);
INSERT INTO `forum_thread` VALUES ('gdfgdf', 6, 7, 1, 17, '2011-01-15 10:29:36', 17, '2011-01-15 10:29:36', 0, 0);
INSERT INTO `forum_thread` VALUES ('tema', 7, 9, 2, 58, '2011-06-16 17:24:09', 58, '2011-06-16 17:24:09', 0, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `friends`
-- 

CREATE TABLE `friends` (
  `id` int(20) NOT NULL auto_increment,
  `type` enum('activ','pending') collate latin1_general_ci NOT NULL default 'pending',
  `id_from` int(20) NOT NULL default '-1',
  `id_to` int(20) NOT NULL default '-1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `friends`
-- 

INSERT INTO `friends` VALUES (1, 'activ', 24, 33);
INSERT INTO `friends` VALUES (2, 'pending', 33, 25);
INSERT INTO `friends` VALUES (3, 'activ', 28, 33);

-- --------------------------------------------------------

-- 
-- Table structure for table `groups`
-- 

CREATE TABLE `groups` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  `name` varchar(255) collate latin1_general_ci NOT NULL,
  `aktu_page` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `groups`
-- 

INSERT INTO `groups` VALUES (1, 1, 'Attack', 0);
INSERT INTO `groups` VALUES (2, 16, 'Atac', 0);
INSERT INTO `groups` VALUES (3, 46, 'Atack', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `hinweise`
-- 

CREATE TABLE `hinweise` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `date` varchar(100) collate latin1_general_ci NOT NULL,
  `betreff` varchar(100) collate latin1_general_ci NOT NULL,
  `hinweis` text collate latin1_general_ci NOT NULL,
  `owner` varchar(50) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `hinweise`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `login`
-- 

CREATE TABLE `login` (
  `login_locked` enum('yes','no') character set latin1 collate latin1_german1_ci NOT NULL default 'no',
  `start` varchar(50) character set latin1 collate latin1_german1_ci NOT NULL,
  `first_visit` tinyint(1) NOT NULL default '0',
  `extern_auth` varchar(32) collate utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `login`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `logins`
-- 

CREATE TABLE `logins` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(250) character set latin1 collate latin1_german1_ci NOT NULL,
  `time` int(33) NOT NULL,
  `ip` varchar(30) character set latin1 collate latin1_german1_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `uv` varchar(250) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

-- 
-- Dumping data for table `logins`
-- 

INSERT INTO `logins` VALUES (1, 'bot7', 1308290355, '127.0.0.1', 7, '');
INSERT INTO `logins` VALUES (2, 'test', 1308290508, '127.0.0.1', 8, '');
INSERT INTO `logins` VALUES (3, 'test', 1308290645, '127.0.0.1', 8, '');
INSERT INTO `logins` VALUES (4, 'admin', 1308290757, '127.0.0.1', 16, '');
INSERT INTO `logins` VALUES (5, 'admin', 1308290937, '127.0.0.1', 16, '');
INSERT INTO `logins` VALUES (6, 'admin', 1308292333, '127.0.0.1', 16, '');
INSERT INTO `logins` VALUES (7, 'admin', 1308301067, '127.0.0.1', 16, '');
INSERT INTO `logins` VALUES (8, 'admin', 1308382227, '127.0.0.1', 16, '');
INSERT INTO `logins` VALUES (9, 'GeorgeXD', 1335629179, '127.0.0.1', 17, '');
INSERT INTO `logins` VALUES (10, 'GeorgeXD', 1335631377, '127.0.0.1', 17, '');
INSERT INTO `logins` VALUES (11, 'GeorgeXD', 1335634578, '127.0.0.1', 17, '');
INSERT INTO `logins` VALUES (12, 'GeorgeXD', 1335682033, '127.0.0.1', 17, '');
INSERT INTO `logins` VALUES (13, 'GeorgeXD', 1335682460, '127.0.0.1', 17, '');
INSERT INTO `logins` VALUES (14, 'GeorgeXD', 1335682834, '127.0.0.1', 17, '');
INSERT INTO `logins` VALUES (15, 'GeorgeXD', 1335683588, '127.0.0.1', 17, '');
INSERT INTO `logins` VALUES (16, 'GeorgeXD', 1335683694, '127.0.0.1', 17, '');
INSERT INTO `logins` VALUES (17, 'ice41', 1482523411, '127.0.0.1', 18, '');
INSERT INTO `logins` VALUES (18, 'ice41', 1482523766, '127.0.0.1', 18, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `logs`
-- 

CREATE TABLE `logs` (
  `id` int(11) NOT NULL auto_increment,
  `user` varchar(320) character set latin1 collate latin1_german1_ci NOT NULL,
  `village` varchar(320) character set latin1 collate latin1_german1_ci NOT NULL,
  `time` int(40) NOT NULL,
  `log` text character set latin1 collate latin1_german1_ci NOT NULL,
  `event_id` int(11) NOT NULL,
  `event_type` varchar(25) character set latin1 collate latin1_german1_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `logs`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mail_archiv`
-- 

CREATE TABLE `mail_archiv` (
  `id` int(11) NOT NULL auto_increment,
  `from_id` int(11) NOT NULL default '0',
  `from_username` varchar(100) character set latin1 NOT NULL default '',
  `to_id` int(11) NOT NULL default '0',
  `to_username` varchar(100) character set latin1 NOT NULL default '',
  `subject` varchar(150) character set latin1 NOT NULL default '',
  `text` text character set latin1 NOT NULL,
  `time` int(35) NOT NULL default '0',
  `owner` int(11) NOT NULL,
  `type` varchar(3) character set latin1 NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `to_id` (`to_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mail_archiv`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mail_block`
-- 

CREATE TABLE `mail_block` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  `blocked_id` int(11) NOT NULL,
  `blocked_name` varchar(150) character set latin1 collate latin1_german1_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `blocked_id` (`blocked_id`),
  KEY `blocked_name` (`blocked_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mail_block`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mail_in`
-- 

CREATE TABLE `mail_in` (
  `id` int(11) NOT NULL auto_increment,
  `from_id` int(11) NOT NULL default '0',
  `from_username` varchar(100) character set latin1 NOT NULL default '',
  `to_id` int(11) NOT NULL default '0',
  `to_username` varchar(100) character set latin1 NOT NULL default '',
  `subject` varchar(150) character set latin1 NOT NULL default '',
  `text` text character set latin1 NOT NULL,
  `is_read` int(1) NOT NULL default '0',
  `is_answered` int(1) NOT NULL default '0',
  `output_id` int(11) NOT NULL default '0',
  `time` int(35) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `to_id` (`to_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mail_in`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mail_out`
-- 

CREATE TABLE `mail_out` (
  `id` int(11) NOT NULL auto_increment,
  `from_id` int(11) NOT NULL default '0',
  `from_username` varchar(100) character set latin1 NOT NULL default '',
  `to_id` int(11) NOT NULL default '0',
  `to_username` varchar(100) character set latin1 NOT NULL default '',
  `subject` varchar(150) character set latin1 NOT NULL default '',
  `text` text character set latin1 NOT NULL,
  `is_read` int(1) NOT NULL default '0',
  `time` int(35) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `from_id` (`from_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mail_out`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `movements`
-- 

CREATE TABLE `movements` (
  `id` int(11) NOT NULL auto_increment,
  `from_village` int(11) default NULL,
  `to_village` int(11) default NULL,
  `units` varchar(350) character set latin1 collate latin1_german1_ci NOT NULL,
  `type` varchar(15) character set latin1 collate latin1_german1_ci NOT NULL,
  `start_time` int(25) NOT NULL,
  `end_time` int(25) NOT NULL,
  `building` varchar(60) character set latin1 collate latin1_german1_ci default NULL,
  `from_userid` int(11) NOT NULL,
  `to_userid` int(11) NOT NULL,
  `to_hidden` int(1) default '0',
  `wood` int(12) NOT NULL default '0',
  `stone` int(12) NOT NULL default '0',
  `iron` int(12) NOT NULL default '0',
  `send_from_village` int(12) NOT NULL,
  `send_from_user` int(12) NOT NULL,
  `send_to_user` int(15) NOT NULL,
  `send_to_village` int(15) NOT NULL,
  `die` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `end_time` (`end_time`),
  KEY `send_from_village` (`send_from_village`),
  KEY `send_from_user` (`send_from_user`),
  KEY `send_to_user` (`send_to_user`),
  KEY `send_to_village` (`send_to_village`),
  KEY `from_hidden` (`to_hidden`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `movements`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_adminlog`
-- 

CREATE TABLE `mybb_adminlog` (
  `uid` int(10) unsigned NOT NULL default '0',
  `ipaddress` varchar(50) NOT NULL default '',
  `dateline` bigint(30) NOT NULL default '0',
  `module` varchar(50) NOT NULL default '',
  `action` varchar(50) NOT NULL default '',
  `data` text NOT NULL,
  KEY `module` (`module`,`action`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `mybb_adminlog`
-- 

INSERT INTO `mybb_adminlog` VALUES (1, '127.0.0.1', 1292185073, 'style/themes', 'edit_stylesheet', 'a:2:{i:0;s:7:"Default";i:1;s:10:"global.css";}');

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_adminoptions`
-- 

CREATE TABLE `mybb_adminoptions` (
  `uid` int(10) NOT NULL default '0',
  `cpstyle` varchar(50) NOT NULL default '',
  `codepress` int(1) NOT NULL default '1',
  `notes` text NOT NULL,
  `permissions` text NOT NULL,
  `defaultviews` text NOT NULL,
  PRIMARY KEY  (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `mybb_adminoptions`
-- 

INSERT INTO `mybb_adminoptions` VALUES (0, '', 1, '', 'a:5:{s:6:"config";a:16:{s:3:"tab";s:1:"0";s:8:"settings";s:1:"0";s:7:"banning";s:1:"0";s:14:"profile_fields";s:1:"0";s:7:"smilies";s:1:"0";s:8:"badwords";s:1:"0";s:6:"mycode";s:1:"0";s:9:"languages";s:1:"0";s:10:"post_icons";s:1:"0";s:14:"help_documents";s:1:"0";s:7:"plugins";s:1:"0";s:16:"attachment_types";s:1:"0";s:9:"mod_tools";s:1:"0";s:7:"spiders";s:1:"0";s:9:"calendars";s:1:"0";s:7:"warning";s:1:"0";}s:5:"forum";a:5:{s:3:"tab";s:1:"0";s:10:"management";s:1:"0";s:13:"announcements";s:1:"0";s:16:"moderation_queue";s:1:"0";s:11:"attachments";s:1:"0";}s:5:"style";a:3:{s:3:"tab";s:1:"0";s:6:"themes";s:1:"0";s:9:"templates";s:1:"0";}s:5:"tools";a:13:{s:3:"tab";s:1:"0";s:13:"system_health";s:1:"0";s:5:"cache";s:1:"0";s:5:"tasks";s:1:"0";s:8:"backupdb";s:1:"0";s:10:"optimizedb";s:1:"0";s:8:"adminlog";s:1:"0";s:6:"modlog";s:1:"0";s:15:"recount_rebuild";s:1:"0";s:8:"php_info";s:1:"1";s:8:"maillogs";s:1:"0";s:10:"mailerrors";s:1:"0";s:10:"warninglog";s:1:"0";}s:4:"user";a:8:{s:3:"tab";s:1:"0";s:5:"users";s:1:"0";s:6:"groups";s:1:"0";s:6:"titles";s:1:"0";s:7:"banning";s:1:"0";s:17:"admin_permissions";s:1:"0";s:9:"mass_mail";s:1:"0";s:16:"group_promotions";s:1:"0";}}', 'a:1:{s:4:"user";s:1:"1";}');
INSERT INTO `mybb_adminoptions` VALUES (-4, '', 1, '', 'a:5:{s:6:"config";a:16:{s:3:"tab";s:1:"1";s:8:"settings";s:1:"1";s:7:"banning";s:1:"1";s:14:"profile_fields";s:1:"1";s:7:"smilies";s:1:"1";s:8:"badwords";s:1:"1";s:6:"mycode";s:1:"1";s:9:"languages";s:1:"1";s:10:"post_icons";s:1:"1";s:14:"help_documents";s:1:"1";s:7:"plugins";s:1:"1";s:16:"attachment_types";s:1:"1";s:9:"mod_tools";s:1:"1";s:7:"spiders";s:1:"1";s:9:"calendars";s:1:"1";s:7:"warning";s:1:"1";}s:5:"forum";a:5:{s:3:"tab";s:1:"1";s:10:"management";s:1:"1";s:13:"announcements";s:1:"1";s:16:"moderation_queue";s:1:"1";s:11:"attachments";s:1:"1";}s:5:"style";a:3:{s:3:"tab";s:1:"1";s:6:"themes";s:1:"1";s:9:"templates";s:1:"1";}s:5:"tools";a:13:{s:3:"tab";s:1:"1";s:13:"system_health";s:1:"1";s:5:"cache";s:1:"1";s:5:"tasks";s:1:"1";s:8:"backupdb";s:1:"1";s:10:"optimizedb";s:1:"1";s:8:"adminlog";s:1:"1";s:6:"modlog";s:1:"1";s:15:"recount_rebuild";s:1:"1";s:8:"php_info";s:1:"1";s:8:"maillogs";s:1:"1";s:10:"mailerrors";s:1:"1";s:10:"warninglog";s:1:"1";}s:4:"user";a:8:{s:3:"tab";s:1:"1";s:5:"users";s:1:"1";s:6:"groups";s:1:"1";s:6:"titles";s:1:"1";s:7:"banning";s:1:"1";s:17:"admin_permissions";s:1:"1";s:9:"mass_mail";s:1:"1";s:16:"group_promotions";s:1:"1";}}', 'a:1:{s:4:"user";s:1:"1";}');
INSERT INTO `mybb_adminoptions` VALUES (1, '', 1, '', 'a:5:{s:6:"config";a:16:{s:3:"tab";s:1:"1";s:8:"settings";s:1:"1";s:7:"banning";s:1:"1";s:14:"profile_fields";s:1:"1";s:7:"smilies";s:1:"1";s:8:"badwords";s:1:"1";s:6:"mycode";s:1:"1";s:9:"languages";s:1:"1";s:10:"post_icons";s:1:"1";s:14:"help_documents";s:1:"1";s:7:"plugins";s:1:"1";s:16:"attachment_types";s:1:"1";s:9:"mod_tools";s:1:"1";s:7:"spiders";s:1:"1";s:9:"calendars";s:1:"1";s:7:"warning";s:1:"1";}s:5:"forum";a:5:{s:3:"tab";s:1:"1";s:10:"management";s:1:"1";s:13:"announcements";s:1:"1";s:16:"moderation_queue";s:1:"1";s:11:"attachments";s:1:"1";}s:5:"style";a:3:{s:3:"tab";s:1:"1";s:6:"themes";s:1:"1";s:9:"templates";s:1:"1";}s:5:"tools";a:13:{s:3:"tab";s:1:"1";s:13:"system_health";s:1:"1";s:5:"cache";s:1:"1";s:5:"tasks";s:1:"1";s:8:"backupdb";s:1:"1";s:10:"optimizedb";s:1:"1";s:15:"recount_rebuild";s:1:"1";s:8:"php_info";s:1:"1";s:8:"adminlog";s:1:"1";s:6:"modlog";s:1:"1";s:8:"maillogs";s:1:"1";s:10:"mailerrors";s:1:"1";s:10:"warninglog";s:1:"1";}s:4:"user";a:8:{s:3:"tab";s:1:"1";s:5:"users";s:1:"1";s:6:"groups";s:1:"1";s:6:"titles";s:1:"1";s:7:"banning";s:1:"1";s:17:"admin_permissions";s:1:"1";s:9:"mass_mail";s:1:"1";s:16:"group_promotions";s:1:"1";}}', 'a:1:{s:4:"user";s:1:"1";}');

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_adminsessions`
-- 

CREATE TABLE `mybb_adminsessions` (
  `sid` varchar(32) NOT NULL default '',
  `uid` int(10) unsigned NOT NULL default '0',
  `loginkey` varchar(50) NOT NULL default '',
  `ip` varchar(40) NOT NULL default '',
  `dateline` bigint(30) NOT NULL default '0',
  `lastactive` bigint(30) NOT NULL default '0',
  `data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `mybb_adminsessions`
-- 

INSERT INTO `mybb_adminsessions` VALUES ('8f244501305f28cc19b977d0419345fd', 1, 'D1v5Ll8RigykMRak1EbeSm3apeyNVa242M5hnn4s4u5nRiS6Ha', '127.0.0.1', 1292184937, 1292185073, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_adminviews`
-- 

CREATE TABLE `mybb_adminviews` (
  `vid` int(10) unsigned NOT NULL auto_increment,
  `uid` int(10) unsigned NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `type` varchar(6) NOT NULL default '',
  `visibility` int(1) NOT NULL default '0',
  `fields` text NOT NULL,
  `conditions` text NOT NULL,
  `sortby` varchar(20) NOT NULL default '',
  `sortorder` varchar(4) NOT NULL default '',
  `perpage` int(4) NOT NULL default '0',
  `view_type` varchar(6) NOT NULL default '',
  PRIMARY KEY  (`vid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `mybb_adminviews`
-- 

INSERT INTO `mybb_adminviews` VALUES (1, 0, 'All Users', 'user', 2, 'a:7:{i:0;s:6:"avatar";i:1;s:8:"username";i:2;s:5:"email";i:3;s:7:"regdate";i:4;s:10:"lastactive";i:5;s:7:"postnum";i:6;s:8:"controls";}', 'a:0:{}', 'username', 'asc', 20, 'card');

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_announcements`
-- 

CREATE TABLE `mybb_announcements` (
  `aid` int(10) unsigned NOT NULL auto_increment,
  `fid` int(10) NOT NULL default '0',
  `uid` int(10) unsigned NOT NULL default '0',
  `subject` varchar(120) NOT NULL default '',
  `message` text NOT NULL,
  `startdate` bigint(30) NOT NULL default '0',
  `enddate` bigint(30) NOT NULL default '0',
  `allowhtml` int(1) NOT NULL default '0',
  `allowmycode` int(1) NOT NULL default '0',
  `allowsmilies` int(1) NOT NULL default '0',
  PRIMARY KEY  (`aid`),
  KEY `fid` (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_announcements`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_attachments`
-- 

CREATE TABLE `mybb_attachments` (
  `aid` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) NOT NULL default '0',
  `posthash` varchar(50) NOT NULL default '',
  `uid` int(10) unsigned NOT NULL default '0',
  `filename` varchar(120) NOT NULL default '',
  `filetype` varchar(120) NOT NULL default '',
  `filesize` int(10) NOT NULL default '0',
  `attachname` varchar(120) NOT NULL default '',
  `downloads` int(10) unsigned NOT NULL default '0',
  `dateuploaded` bigint(30) NOT NULL default '0',
  `visible` int(1) NOT NULL default '0',
  `thumbnail` varchar(120) NOT NULL default '',
  PRIMARY KEY  (`aid`),
  KEY `posthash` (`posthash`),
  KEY `pid` (`pid`,`visible`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_attachments`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_attachtypes`
-- 

CREATE TABLE `mybb_attachtypes` (
  `atid` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(120) NOT NULL default '',
  `mimetype` varchar(120) NOT NULL default '',
  `extension` varchar(10) NOT NULL default '',
  `maxsize` int(15) NOT NULL default '0',
  `icon` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`atid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

-- 
-- Dumping data for table `mybb_attachtypes`
-- 

INSERT INTO `mybb_attachtypes` VALUES (1, 'ZIP File', 'application/zip', 'zip', 1024, 'images/attachtypes/zip.gif');
INSERT INTO `mybb_attachtypes` VALUES (2, 'JPG Image', 'image/jpeg', 'jpg', 500, 'images/attachtypes/image.gif');
INSERT INTO `mybb_attachtypes` VALUES (3, 'Text Document', 'text/plain', 'txt', 200, 'images/attachtypes/txt.gif');
INSERT INTO `mybb_attachtypes` VALUES (4, 'GIF Image', 'image/gif', 'gif', 500, 'images/attachtypes/image.gif');
INSERT INTO `mybb_attachtypes` VALUES (6, 'PHP File', 'application/octet-stream', 'php', 500, 'images/attachtypes/php.gif');
INSERT INTO `mybb_attachtypes` VALUES (7, 'PNG Image', 'image/png', 'png', 500, 'images/attachtypes/image.gif');
INSERT INTO `mybb_attachtypes` VALUES (8, 'Microsoft Word Document', 'application/msword', 'doc', 1024, 'images/attachtypes/doc.gif');
INSERT INTO `mybb_attachtypes` VALUES (9, 'HTM File', 'application/octet-stream', 'htm', 100, 'images/attachtypes/html.gif');
INSERT INTO `mybb_attachtypes` VALUES (10, 'HTML File', 'application/octet-stream', 'html', 100, 'images/attachtypes/html.gif');
INSERT INTO `mybb_attachtypes` VALUES (11, 'JPEG Image', 'image/jpeg', 'jpeg', 500, 'images/attachtypes/image.gif');
INSERT INTO `mybb_attachtypes` VALUES (12, 'GZIP Compressed File', 'application/x-gzip', 'gz', 1024, 'images/attachtypes/tar.gif');
INSERT INTO `mybb_attachtypes` VALUES (13, 'TAR Compressed File', 'application/x-tar', 'tar', 1024, 'images/attachtypes/tar.gif');
INSERT INTO `mybb_attachtypes` VALUES (14, 'CSS Stylesheet', 'text/css', 'css', 100, 'images/attachtypes/css.gif');
INSERT INTO `mybb_attachtypes` VALUES (15, 'Adobe Acrobat PDF', 'application/pdf', 'pdf', 2048, 'images/attachtypes/pdf.gif');
INSERT INTO `mybb_attachtypes` VALUES (16, 'Bitmap Image', 'image/bmp', 'bmp', 500, 'images/attachtypes/image.gif');
INSERT INTO `mybb_attachtypes` VALUES (17, 'Microsoft Word 2007 Document', 'application/msword', 'docx', 1024, 'images/attachtypes/doc.gif');
INSERT INTO `mybb_attachtypes` VALUES (18, 'Microsoft Excel Document', 'application/msexcel', 'xls', 1024, 'images/attachtypes/xls.gif');
INSERT INTO `mybb_attachtypes` VALUES (19, 'Microsoft Excel 2007 Document', 'application/msword', 'xlsx', 1024, 'images/attachtypes/xls.gif');
INSERT INTO `mybb_attachtypes` VALUES (20, 'Microsoft PowerPoint Document', 'application/mspowerpoint', 'ppt', 1024, 'images/attachtypes/ppt.gif');
INSERT INTO `mybb_attachtypes` VALUES (21, 'Microsoft PowerPoint 2007 Document', 'application/mspowerpoint', 'pptx', 1024, 'images/attachtypes/ppt.gif');

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_awaitingactivation`
-- 

CREATE TABLE `mybb_awaitingactivation` (
  `aid` int(10) unsigned NOT NULL auto_increment,
  `uid` int(10) unsigned NOT NULL default '0',
  `dateline` bigint(30) NOT NULL default '0',
  `code` varchar(100) NOT NULL default '',
  `type` char(1) NOT NULL default '',
  `oldgroup` bigint(30) NOT NULL default '0',
  `misc` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_awaitingactivation`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_badwords`
-- 

CREATE TABLE `mybb_badwords` (
  `bid` int(10) unsigned NOT NULL auto_increment,
  `badword` varchar(100) NOT NULL default '',
  `replacement` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`bid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_badwords`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_banfilters`
-- 

CREATE TABLE `mybb_banfilters` (
  `fid` int(10) unsigned NOT NULL auto_increment,
  `filter` varchar(200) NOT NULL default '',
  `type` int(1) NOT NULL default '0',
  `lastuse` bigint(30) NOT NULL default '0',
  `dateline` bigint(30) NOT NULL default '0',
  PRIMARY KEY  (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_banfilters`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_banned`
-- 

CREATE TABLE `mybb_banned` (
  `uid` int(10) unsigned NOT NULL default '0',
  `gid` int(10) unsigned NOT NULL default '0',
  `oldgroup` int(10) unsigned NOT NULL default '0',
  `oldadditionalgroups` text NOT NULL,
  `olddisplaygroup` int(11) NOT NULL default '0',
  `admin` int(10) unsigned NOT NULL default '0',
  `dateline` bigint(30) NOT NULL default '0',
  `bantime` varchar(50) NOT NULL default '',
  `lifted` bigint(30) NOT NULL default '0',
  `reason` varchar(255) NOT NULL default '',
  KEY `uid` (`uid`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `mybb_banned`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_calendarpermissions`
-- 

CREATE TABLE `mybb_calendarpermissions` (
  `cid` int(10) unsigned NOT NULL default '0',
  `gid` int(10) unsigned NOT NULL default '0',
  `canviewcalendar` int(1) NOT NULL default '0',
  `canaddevents` int(1) NOT NULL default '0',
  `canbypasseventmod` int(1) NOT NULL default '0',
  `canmoderateevents` int(1) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `mybb_calendarpermissions`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_calendars`
-- 

CREATE TABLE `mybb_calendars` (
  `cid` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `disporder` int(10) unsigned NOT NULL default '0',
  `startofweek` int(1) NOT NULL default '0',
  `showbirthdays` int(1) NOT NULL default '0',
  `eventlimit` int(3) NOT NULL default '0',
  `moderation` int(1) NOT NULL default '0',
  `allowhtml` int(1) NOT NULL default '0',
  `allowmycode` int(1) NOT NULL default '0',
  `allowimgcode` int(1) NOT NULL default '0',
  `allowsmilies` int(1) NOT NULL default '0',
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `mybb_calendars`
-- 

INSERT INTO `mybb_calendars` VALUES (1, 'Default Calendar', 1, 0, 1, 4, 0, 0, 1, 1, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_captcha`
-- 

CREATE TABLE `mybb_captcha` (
  `imagehash` varchar(32) NOT NULL default '',
  `imagestring` varchar(8) NOT NULL default '',
  `dateline` bigint(30) NOT NULL default '0',
  KEY `imagehash` (`imagehash`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `mybb_captcha`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_datacache`
-- 

CREATE TABLE `mybb_datacache` (
  `title` varchar(50) NOT NULL default '',
  `cache` mediumtext NOT NULL,
  PRIMARY KEY  (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `mybb_datacache`
-- 

INSERT INTO `mybb_datacache` VALUES ('version', 'a:2:{s:7:"version";s:5:"1.4.6";s:12:"version_code";i:1406;}');
INSERT INTO `mybb_datacache` VALUES ('attachtypes', 'a:20:{s:3:"zip";a:6:{s:4:"atid";s:1:"1";s:4:"name";s:8:"ZIP File";s:8:"mimetype";s:15:"application/zip";s:9:"extension";s:3:"zip";s:7:"maxsize";s:4:"1024";s:4:"icon";s:26:"images/attachtypes/zip.gif";}s:3:"jpg";a:6:{s:4:"atid";s:1:"2";s:4:"name";s:9:"JPG Image";s:8:"mimetype";s:10:"image/jpeg";s:9:"extension";s:3:"jpg";s:7:"maxsize";s:3:"500";s:4:"icon";s:28:"images/attachtypes/image.gif";}s:3:"txt";a:6:{s:4:"atid";s:1:"3";s:4:"name";s:13:"Text Document";s:8:"mimetype";s:10:"text/plain";s:9:"extension";s:3:"txt";s:7:"maxsize";s:3:"200";s:4:"icon";s:26:"images/attachtypes/txt.gif";}s:3:"gif";a:6:{s:4:"atid";s:1:"4";s:4:"name";s:9:"GIF Image";s:8:"mimetype";s:9:"image/gif";s:9:"extension";s:3:"gif";s:7:"maxsize";s:3:"500";s:4:"icon";s:28:"images/attachtypes/image.gif";}s:3:"php";a:6:{s:4:"atid";s:1:"6";s:4:"name";s:8:"PHP File";s:8:"mimetype";s:24:"application/octet-stream";s:9:"extension";s:3:"php";s:7:"maxsize";s:3:"500";s:4:"icon";s:26:"images/attachtypes/php.gif";}s:3:"png";a:6:{s:4:"atid";s:1:"7";s:4:"name";s:9:"PNG Image";s:8:"mimetype";s:9:"image/png";s:9:"extension";s:3:"png";s:7:"maxsize";s:3:"500";s:4:"icon";s:28:"images/attachtypes/image.gif";}s:3:"doc";a:6:{s:4:"atid";s:1:"8";s:4:"name";s:23:"Microsoft Word Document";s:8:"mimetype";s:18:"application/msword";s:9:"extension";s:3:"doc";s:7:"maxsize";s:4:"1024";s:4:"icon";s:26:"images/attachtypes/doc.gif";}s:3:"htm";a:6:{s:4:"atid";s:1:"9";s:4:"name";s:8:"HTM File";s:8:"mimetype";s:24:"application/octet-stream";s:9:"extension";s:3:"htm";s:7:"maxsize";s:3:"100";s:4:"icon";s:27:"images/attachtypes/html.gif";}s:4:"html";a:6:{s:4:"atid";s:2:"10";s:4:"name";s:9:"HTML File";s:8:"mimetype";s:24:"application/octet-stream";s:9:"extension";s:4:"html";s:7:"maxsize";s:3:"100";s:4:"icon";s:27:"images/attachtypes/html.gif";}s:4:"jpeg";a:6:{s:4:"atid";s:2:"11";s:4:"name";s:10:"JPEG Image";s:8:"mimetype";s:10:"image/jpeg";s:9:"extension";s:4:"jpeg";s:7:"maxsize";s:3:"500";s:4:"icon";s:28:"images/attachtypes/image.gif";}s:2:"gz";a:6:{s:4:"atid";s:2:"12";s:4:"name";s:20:"GZIP Compressed File";s:8:"mimetype";s:18:"application/x-gzip";s:9:"extension";s:2:"gz";s:7:"maxsize";s:4:"1024";s:4:"icon";s:26:"images/attachtypes/tar.gif";}s:3:"tar";a:6:{s:4:"atid";s:2:"13";s:4:"name";s:19:"TAR Compressed File";s:8:"mimetype";s:17:"application/x-tar";s:9:"extension";s:3:"tar";s:7:"maxsize";s:4:"1024";s:4:"icon";s:26:"images/attachtypes/tar.gif";}s:3:"css";a:6:{s:4:"atid";s:2:"14";s:4:"name";s:14:"CSS Stylesheet";s:8:"mimetype";s:8:"text/css";s:9:"extension";s:3:"css";s:7:"maxsize";s:3:"100";s:4:"icon";s:26:"images/attachtypes/css.gif";}s:3:"pdf";a:6:{s:4:"atid";s:2:"15";s:4:"name";s:17:"Adobe Acrobat PDF";s:8:"mimetype";s:15:"application/pdf";s:9:"extension";s:3:"pdf";s:7:"maxsize";s:4:"2048";s:4:"icon";s:26:"images/attachtypes/pdf.gif";}s:3:"bmp";a:6:{s:4:"atid";s:2:"16";s:4:"name";s:12:"Bitmap Image";s:8:"mimetype";s:9:"image/bmp";s:9:"extension";s:3:"bmp";s:7:"maxsize";s:3:"500";s:4:"icon";s:28:"images/attachtypes/image.gif";}s:4:"docx";a:6:{s:4:"atid";s:2:"17";s:4:"name";s:28:"Microsoft Word 2007 Document";s:8:"mimetype";s:18:"application/msword";s:9:"extension";s:4:"docx";s:7:"maxsize";s:4:"1024";s:4:"icon";s:26:"images/attachtypes/doc.gif";}s:3:"xls";a:6:{s:4:"atid";s:2:"18";s:4:"name";s:24:"Microsoft Excel Document";s:8:"mimetype";s:19:"application/msexcel";s:9:"extension";s:3:"xls";s:7:"maxsize";s:4:"1024";s:4:"icon";s:26:"images/attachtypes/xls.gif";}s:4:"xlsx";a:6:{s:4:"atid";s:2:"19";s:4:"name";s:29:"Microsoft Excel 2007 Document";s:8:"mimetype";s:18:"application/msword";s:9:"extension";s:4:"xlsx";s:7:"maxsize";s:4:"1024";s:4:"icon";s:26:"images/attachtypes/xls.gif";}s:3:"ppt";a:6:{s:4:"atid";s:2:"20";s:4:"name";s:29:"Microsoft PowerPoint Document";s:8:"mimetype";s:24:"application/mspowerpoint";s:9:"extension";s:3:"ppt";s:7:"maxsize";s:4:"1024";s:4:"icon";s:26:"images/attachtypes/ppt.gif";}s:4:"pptx";a:6:{s:4:"atid";s:2:"21";s:4:"name";s:34:"Microsoft PowerPoint 2007 Document";s:8:"mimetype";s:24:"application/mspowerpoint";s:9:"extension";s:4:"pptx";s:7:"maxsize";s:4:"1024";s:4:"icon";s:26:"images/attachtypes/ppt.gif";}}');
INSERT INTO `mybb_datacache` VALUES ('smilies', 'a:20:{i:10;a:6:{s:3:"sid";s:2:"10";s:4:"name";s:5:"Angel";s:4:"find";s:7:":angel:";s:5:"image";s:24:"images/smilies/angel.gif";s:9:"disporder";s:1:"0";s:13:"showclickable";s:1:"1";}i:11;a:6:{s:3:"sid";s:2:"11";s:4:"name";s:5:"Angry";s:4:"find";s:2:":@";s:5:"image";s:24:"images/smilies/angry.gif";s:9:"disporder";s:1:"0";s:13:"showclickable";s:1:"1";}i:12;a:6:{s:3:"sid";s:2:"12";s:4:"name";s:5:"Blush";s:4:"find";s:7:":blush:";s:5:"image";s:24:"images/smilies/blush.gif";s:9:"disporder";s:1:"0";s:13:"showclickable";s:1:"1";}i:13;a:6:{s:3:"sid";s:2:"13";s:4:"name";s:8:"Confused";s:4:"find";s:2:":s";s:5:"image";s:27:"images/smilies/confused.gif";s:9:"disporder";s:1:"0";s:13:"showclickable";s:1:"1";}i:14;a:6:{s:3:"sid";s:2:"14";s:4:"name";s:5:"Dodgy";s:4:"find";s:7:":dodgy:";s:5:"image";s:24:"images/smilies/dodgy.gif";s:9:"disporder";s:1:"0";s:13:"showclickable";s:1:"1";}i:15;a:6:{s:3:"sid";s:2:"15";s:4:"name";s:11:"Exclamation";s:4:"find";s:13:":exclamation:";s:5:"image";s:30:"images/smilies/exclamation.gif";s:9:"disporder";s:1:"0";s:13:"showclickable";s:1:"1";}i:16;a:6:{s:3:"sid";s:2:"16";s:4:"name";s:5:"Heart";s:4:"find";s:7:":heart:";s:5:"image";s:24:"images/smilies/heart.gif";s:9:"disporder";s:1:"0";s:13:"showclickable";s:1:"1";}i:17;a:6:{s:3:"sid";s:2:"17";s:4:"name";s:3:"Huh";s:4:"find";s:5:":huh:";s:5:"image";s:22:"images/smilies/huh.gif";s:9:"disporder";s:1:"0";s:13:"showclickable";s:1:"1";}i:18;a:6:{s:3:"sid";s:2:"18";s:4:"name";s:4:"Idea";s:4:"find";s:6:":idea:";s:5:"image";s:28:"images/smilies/lightbulb.gif";s:9:"disporder";s:1:"0";s:13:"showclickable";s:1:"1";}i:19;a:6:{s:3:"sid";s:2:"19";s:4:"name";s:6:"Sleepy";s:4:"find";s:8:":sleepy:";s:5:"image";s:25:"images/smilies/sleepy.gif";s:9:"disporder";s:1:"0";s:13:"showclickable";s:1:"1";}i:20;a:6:{s:3:"sid";s:2:"20";s:4:"name";s:9:"Undecided";s:4:"find";s:3:":-/";s:5:"image";s:28:"images/smilies/undecided.gif";s:9:"disporder";s:1:"0";s:13:"showclickable";s:1:"1";}i:1;a:6:{s:3:"sid";s:1:"1";s:4:"name";s:5:"Smile";s:4:"find";s:2:":)";s:5:"image";s:24:"images/smilies/smile.gif";s:9:"disporder";s:1:"1";s:13:"showclickable";s:1:"1";}i:2;a:6:{s:3:"sid";s:1:"2";s:4:"name";s:4:"Wink";s:4:"find";s:2:";)";s:5:"image";s:23:"images/smilies/wink.gif";s:9:"disporder";s:1:"2";s:13:"showclickable";s:1:"1";}i:3;a:6:{s:3:"sid";s:1:"3";s:4:"name";s:4:"Cool";s:4:"find";s:6:":cool:";s:5:"image";s:23:"images/smilies/cool.gif";s:9:"disporder";s:1:"3";s:13:"showclickable";s:1:"1";}i:4;a:6:{s:3:"sid";s:1:"4";s:4:"name";s:8:"Big Grin";s:4:"find";s:2:":D";s:5:"image";s:26:"images/smilies/biggrin.gif";s:9:"disporder";s:1:"4";s:13:"showclickable";s:1:"1";}i:5;a:6:{s:3:"sid";s:1:"5";s:4:"name";s:6:"Tongue";s:4:"find";s:2:":P";s:5:"image";s:25:"images/smilies/tongue.gif";s:9:"disporder";s:1:"5";s:13:"showclickable";s:1:"1";}i:6;a:6:{s:3:"sid";s:1:"6";s:4:"name";s:8:"Rolleyes";s:4:"find";s:10:":rolleyes:";s:5:"image";s:27:"images/smilies/rolleyes.gif";s:9:"disporder";s:1:"6";s:13:"showclickable";s:1:"1";}i:7;a:6:{s:3:"sid";s:1:"7";s:4:"name";s:3:"Shy";s:4:"find";s:5:":shy:";s:5:"image";s:22:"images/smilies/shy.gif";s:9:"disporder";s:1:"7";s:13:"showclickable";s:1:"1";}i:8;a:6:{s:3:"sid";s:1:"8";s:4:"name";s:3:"Sad";s:4:"find";s:2:":(";s:5:"image";s:22:"images/smilies/sad.gif";s:9:"disporder";s:1:"8";s:13:"showclickable";s:1:"1";}i:9;a:6:{s:3:"sid";s:1:"9";s:4:"name";s:2:"At";s:4:"find";s:4:":at:";s:5:"image";s:21:"images/smilies/at.gif";s:9:"disporder";s:1:"9";s:13:"showclickable";s:1:"0";}}');
INSERT INTO `mybb_datacache` VALUES ('badwords', 'a:0:{}');
INSERT INTO `mybb_datacache` VALUES ('usergroups', 'a:7:{i:1;a:60:{s:3:"gid";s:1:"1";s:4:"type";s:1:"1";s:5:"title";s:6:"Guests";s:11:"description";s:77:"The default group that all visitors are assigned to unless they''re logged in.";s:9:"namestyle";s:10:"{username}";s:9:"usertitle";s:12:"Unregistered";s:5:"stars";s:1:"0";s:9:"starimage";s:0:"";s:5:"image";s:0:"";s:9:"disporder";s:1:"0";s:13:"isbannedgroup";s:1:"0";s:7:"canview";s:1:"1";s:14:"canviewthreads";s:1:"1";s:15:"canviewprofiles";s:1:"1";s:16:"candlattachments";s:1:"0";s:14:"canpostthreads";s:1:"0";s:13:"canpostreplys";s:1:"0";s:18:"canpostattachments";s:1:"0";s:14:"canratethreads";s:1:"0";s:12:"caneditposts";s:1:"1";s:14:"candeleteposts";s:1:"1";s:16:"candeletethreads";s:1:"1";s:18:"caneditattachments";s:1:"1";s:12:"canpostpolls";s:1:"0";s:12:"canvotepolls";s:1:"0";s:9:"canusepms";s:1:"0";s:10:"cansendpms";s:1:"0";s:11:"cantrackpms";s:1:"0";s:17:"candenypmreceipts";s:1:"0";s:7:"pmquota";s:1:"0";s:15:"maxpmrecipients";s:1:"5";s:12:"cansendemail";s:1:"0";s:9:"maxemails";s:1:"5";s:17:"canviewmemberlist";s:1:"1";s:15:"canviewcalendar";s:1:"1";s:12:"canaddevents";s:1:"0";s:17:"canbypasseventmod";s:1:"0";s:17:"canmoderateevents";s:1:"0";s:13:"canviewonline";s:1:"1";s:15:"canviewwolinvis";s:1:"0";s:16:"canviewonlineips";s:1:"0";s:5:"cancp";s:1:"0";s:10:"issupermod";s:1:"0";s:9:"cansearch";s:1:"1";s:9:"canusercp";s:1:"0";s:16:"canuploadavatars";s:1:"0";s:14:"canratemembers";s:1:"0";s:13:"canchangename";s:1:"0";s:13:"showforumteam";s:1:"0";s:19:"usereputationsystem";s:1:"0";s:18:"cangivereputations";s:1:"0";s:15:"reputationpower";s:1:"0";s:17:"maxreputationsday";s:1:"0";s:15:"candisplaygroup";s:1:"1";s:11:"attachquota";s:1:"0";s:14:"cancustomtitle";s:1:"0";s:12:"canwarnusers";s:1:"0";s:18:"canreceivewarnings";s:1:"0";s:14:"maxwarningsday";s:1:"0";s:8:"canmodcp";s:1:"0";}i:2;a:60:{s:3:"gid";s:1:"2";s:4:"type";s:1:"1";s:5:"title";s:10:"Registered";s:11:"description";s:66:"After registration, all users are placed in this group by default.";s:9:"namestyle";s:10:"{username}";s:9:"usertitle";s:0:"";s:5:"stars";s:1:"0";s:9:"starimage";s:15:"images/star.gif";s:5:"image";s:0:"";s:9:"disporder";s:1:"0";s:13:"isbannedgroup";s:1:"0";s:7:"canview";s:1:"1";s:14:"canviewthreads";s:1:"1";s:15:"canviewprofiles";s:1:"1";s:16:"candlattachments";s:1:"1";s:14:"canpostthreads";s:1:"1";s:13:"canpostreplys";s:1:"1";s:18:"canpostattachments";s:1:"1";s:14:"canratethreads";s:1:"1";s:12:"caneditposts";s:1:"1";s:14:"candeleteposts";s:1:"1";s:16:"candeletethreads";s:1:"1";s:18:"caneditattachments";s:1:"1";s:12:"canpostpolls";s:1:"1";s:12:"canvotepolls";s:1:"1";s:9:"canusepms";s:1:"1";s:10:"cansendpms";s:1:"1";s:11:"cantrackpms";s:1:"1";s:17:"candenypmreceipts";s:1:"1";s:7:"pmquota";s:3:"200";s:15:"maxpmrecipients";s:1:"5";s:12:"cansendemail";s:1:"1";s:9:"maxemails";s:1:"5";s:17:"canviewmemberlist";s:1:"1";s:15:"canviewcalendar";s:1:"1";s:12:"canaddevents";s:1:"1";s:17:"canbypasseventmod";s:1:"0";s:17:"canmoderateevents";s:1:"0";s:13:"canviewonline";s:1:"1";s:15:"canviewwolinvis";s:1:"0";s:16:"canviewonlineips";s:1:"0";s:5:"cancp";s:1:"0";s:10:"issupermod";s:1:"0";s:9:"cansearch";s:1:"1";s:9:"canusercp";s:1:"1";s:16:"canuploadavatars";s:1:"1";s:14:"canratemembers";s:1:"1";s:13:"canchangename";s:1:"0";s:13:"showforumteam";s:1:"0";s:19:"usereputationsystem";s:1:"1";s:18:"cangivereputations";s:1:"1";s:15:"reputationpower";s:1:"1";s:17:"maxreputationsday";s:1:"5";s:15:"candisplaygroup";s:1:"1";s:11:"attachquota";s:1:"0";s:14:"cancustomtitle";s:1:"1";s:12:"canwarnusers";s:1:"0";s:18:"canreceivewarnings";s:1:"1";s:14:"maxwarningsday";s:1:"0";s:8:"canmodcp";s:1:"0";}i:3;a:60:{s:3:"gid";s:1:"3";s:4:"type";s:1:"1";s:5:"title";s:16:"Super Moderators";s:11:"description";s:35:"These users can moderate any forum.";s:9:"namestyle";s:64:"<span style="color: #CC00CC;"><strong>{username}</strong></span>";s:9:"usertitle";s:15:"Super Moderator";s:5:"stars";s:1:"6";s:9:"starimage";s:15:"images/star.gif";s:5:"image";s:0:"";s:9:"disporder";s:1:"0";s:13:"isbannedgroup";s:1:"0";s:7:"canview";s:1:"1";s:14:"canviewthreads";s:1:"1";s:15:"canviewprofiles";s:1:"1";s:16:"candlattachments";s:1:"1";s:14:"canpostthreads";s:1:"1";s:13:"canpostreplys";s:1:"1";s:18:"canpostattachments";s:1:"1";s:14:"canratethreads";s:1:"1";s:12:"caneditposts";s:1:"1";s:14:"candeleteposts";s:1:"1";s:16:"candeletethreads";s:1:"1";s:18:"caneditattachments";s:1:"1";s:12:"canpostpolls";s:1:"1";s:12:"canvotepolls";s:1:"1";s:9:"canusepms";s:1:"1";s:10:"cansendpms";s:1:"1";s:11:"cantrackpms";s:1:"1";s:17:"candenypmreceipts";s:1:"1";s:7:"pmquota";s:3:"250";s:15:"maxpmrecipients";s:1:"5";s:12:"cansendemail";s:1:"1";s:9:"maxemails";s:2:"10";s:17:"canviewmemberlist";s:1:"1";s:15:"canviewcalendar";s:1:"1";s:12:"canaddevents";s:1:"1";s:17:"canbypasseventmod";s:1:"1";s:17:"canmoderateevents";s:1:"1";s:13:"canviewonline";s:1:"1";s:15:"canviewwolinvis";s:1:"1";s:16:"canviewonlineips";s:1:"1";s:5:"cancp";s:1:"0";s:10:"issupermod";s:1:"1";s:9:"cansearch";s:1:"1";s:9:"canusercp";s:1:"1";s:16:"canuploadavatars";s:1:"1";s:14:"canratemembers";s:1:"1";s:13:"canchangename";s:1:"1";s:13:"showforumteam";s:1:"1";s:19:"usereputationsystem";s:1:"1";s:18:"cangivereputations";s:1:"1";s:15:"reputationpower";s:1:"1";s:17:"maxreputationsday";s:2:"10";s:15:"candisplaygroup";s:1:"1";s:11:"attachquota";s:1:"0";s:14:"cancustomtitle";s:1:"1";s:12:"canwarnusers";s:1:"1";s:18:"canreceivewarnings";s:1:"1";s:14:"maxwarningsday";s:1:"3";s:8:"canmodcp";s:1:"1";}i:4;a:60:{s:3:"gid";s:1:"4";s:4:"type";s:1:"1";s:5:"title";s:14:"Administrators";s:11:"description";s:39:"The group all administrators belong to.";s:9:"namestyle";s:71:"<span style="color: green;"><strong><em>{username}</em></strong></span>";s:9:"usertitle";s:13:"Administrator";s:5:"stars";s:1:"7";s:9:"starimage";s:15:"images/star.gif";s:5:"image";s:0:"";s:9:"disporder";s:1:"0";s:13:"isbannedgroup";s:1:"0";s:7:"canview";s:1:"1";s:14:"canviewthreads";s:1:"1";s:15:"canviewprofiles";s:1:"1";s:16:"candlattachments";s:1:"1";s:14:"canpostthreads";s:1:"1";s:13:"canpostreplys";s:1:"1";s:18:"canpostattachments";s:1:"1";s:14:"canratethreads";s:1:"1";s:12:"caneditposts";s:1:"1";s:14:"candeleteposts";s:1:"1";s:16:"candeletethreads";s:1:"1";s:18:"caneditattachments";s:1:"1";s:12:"canpostpolls";s:1:"1";s:12:"canvotepolls";s:1:"1";s:9:"canusepms";s:1:"1";s:10:"cansendpms";s:1:"1";s:11:"cantrackpms";s:1:"1";s:17:"candenypmreceipts";s:1:"1";s:7:"pmquota";s:1:"0";s:15:"maxpmrecipients";s:1:"0";s:12:"cansendemail";s:1:"1";s:9:"maxemails";s:1:"0";s:17:"canviewmemberlist";s:1:"1";s:15:"canviewcalendar";s:1:"1";s:12:"canaddevents";s:1:"1";s:17:"canbypasseventmod";s:1:"1";s:17:"canmoderateevents";s:1:"1";s:13:"canviewonline";s:1:"1";s:15:"canviewwolinvis";s:1:"1";s:16:"canviewonlineips";s:1:"1";s:5:"cancp";s:1:"1";s:10:"issupermod";s:1:"1";s:9:"cansearch";s:1:"1";s:9:"canusercp";s:1:"1";s:16:"canuploadavatars";s:1:"1";s:14:"canratemembers";s:1:"1";s:13:"canchangename";s:1:"1";s:13:"showforumteam";s:1:"1";s:19:"usereputationsystem";s:1:"1";s:18:"cangivereputations";s:1:"1";s:15:"reputationpower";s:1:"2";s:17:"maxreputationsday";s:1:"0";s:15:"candisplaygroup";s:1:"1";s:11:"attachquota";s:1:"0";s:14:"cancustomtitle";s:1:"1";s:12:"canwarnusers";s:1:"1";s:18:"canreceivewarnings";s:1:"1";s:14:"maxwarningsday";s:1:"0";s:8:"canmodcp";s:1:"1";}i:5;a:60:{s:3:"gid";s:1:"5";s:4:"type";s:1:"1";s:5:"title";s:19:"Awaiting Activation";s:11:"description";s:84:"Users that have not activated their account by email or manually been activated yet.";s:9:"namestyle";s:10:"{username}";s:9:"usertitle";s:21:"Account not Activated";s:5:"stars";s:1:"0";s:9:"starimage";s:15:"images/star.gif";s:5:"image";s:0:"";s:9:"disporder";s:1:"0";s:13:"isbannedgroup";s:1:"0";s:7:"canview";s:1:"1";s:14:"canviewthreads";s:1:"1";s:15:"canviewprofiles";s:1:"1";s:16:"candlattachments";s:1:"0";s:14:"canpostthreads";s:1:"0";s:13:"canpostreplys";s:1:"0";s:18:"canpostattachments";s:1:"0";s:14:"canratethreads";s:1:"0";s:12:"caneditposts";s:1:"0";s:14:"candeleteposts";s:1:"0";s:16:"candeletethreads";s:1:"0";s:18:"caneditattachments";s:1:"0";s:12:"canpostpolls";s:1:"0";s:12:"canvotepolls";s:1:"0";s:9:"canusepms";s:1:"0";s:10:"cansendpms";s:1:"0";s:11:"cantrackpms";s:1:"0";s:17:"candenypmreceipts";s:1:"0";s:7:"pmquota";s:2:"20";s:15:"maxpmrecipients";s:1:"5";s:12:"cansendemail";s:1:"0";s:9:"maxemails";s:1:"5";s:17:"canviewmemberlist";s:1:"1";s:15:"canviewcalendar";s:1:"1";s:12:"canaddevents";s:1:"0";s:17:"canbypasseventmod";s:1:"0";s:17:"canmoderateevents";s:1:"0";s:13:"canviewonline";s:1:"1";s:15:"canviewwolinvis";s:1:"0";s:16:"canviewonlineips";s:1:"0";s:5:"cancp";s:1:"0";s:10:"issupermod";s:1:"0";s:9:"cansearch";s:1:"1";s:9:"canusercp";s:1:"1";s:16:"canuploadavatars";s:1:"0";s:14:"canratemembers";s:1:"0";s:13:"canchangename";s:1:"0";s:13:"showforumteam";s:1:"0";s:19:"usereputationsystem";s:1:"0";s:18:"cangivereputations";s:1:"0";s:15:"reputationpower";s:1:"0";s:17:"maxreputationsday";s:1:"0";s:15:"candisplaygroup";s:1:"1";s:11:"attachquota";s:1:"0";s:14:"cancustomtitle";s:1:"0";s:12:"canwarnusers";s:1:"0";s:18:"canreceivewarnings";s:1:"0";s:14:"maxwarningsday";s:1:"0";s:8:"canmodcp";s:1:"0";}i:6;a:60:{s:3:"gid";s:1:"6";s:4:"type";s:1:"1";s:5:"title";s:10:"Moderators";s:11:"description";s:37:"These users moderate specific forums.";s:9:"namestyle";s:64:"<span style="color: #CC00CC;"><strong>{username}</strong></span>";s:9:"usertitle";s:9:"Moderator";s:5:"stars";s:1:"5";s:9:"starimage";s:15:"images/star.gif";s:5:"image";s:0:"";s:9:"disporder";s:1:"0";s:13:"isbannedgroup";s:1:"0";s:7:"canview";s:1:"1";s:14:"canviewthreads";s:1:"1";s:15:"canviewprofiles";s:1:"1";s:16:"candlattachments";s:1:"1";s:14:"canpostthreads";s:1:"1";s:13:"canpostreplys";s:1:"1";s:18:"canpostattachments";s:1:"1";s:14:"canratethreads";s:1:"1";s:12:"caneditposts";s:1:"1";s:14:"candeleteposts";s:1:"1";s:16:"candeletethreads";s:1:"1";s:18:"caneditattachments";s:1:"1";s:12:"canpostpolls";s:1:"1";s:12:"canvotepolls";s:1:"1";s:9:"canusepms";s:1:"1";s:10:"cansendpms";s:1:"1";s:11:"cantrackpms";s:1:"1";s:17:"candenypmreceipts";s:1:"1";s:7:"pmquota";s:3:"250";s:15:"maxpmrecipients";s:1:"5";s:12:"cansendemail";s:1:"1";s:9:"maxemails";s:1:"5";s:17:"canviewmemberlist";s:1:"1";s:15:"canviewcalendar";s:1:"1";s:12:"canaddevents";s:1:"0";s:17:"canbypasseventmod";s:1:"0";s:17:"canmoderateevents";s:1:"0";s:13:"canviewonline";s:1:"1";s:15:"canviewwolinvis";s:1:"0";s:16:"canviewonlineips";s:1:"0";s:5:"cancp";s:1:"0";s:10:"issupermod";s:1:"0";s:9:"cansearch";s:1:"1";s:9:"canusercp";s:1:"1";s:16:"canuploadavatars";s:1:"1";s:14:"canratemembers";s:1:"1";s:13:"canchangename";s:1:"1";s:13:"showforumteam";s:1:"1";s:19:"usereputationsystem";s:1:"1";s:18:"cangivereputations";s:1:"1";s:15:"reputationpower";s:1:"1";s:17:"maxreputationsday";s:2:"10";s:15:"candisplaygroup";s:1:"1";s:11:"attachquota";s:1:"0";s:14:"cancustomtitle";s:1:"1";s:12:"canwarnusers";s:1:"1";s:18:"canreceivewarnings";s:1:"1";s:14:"maxwarningsday";s:1:"3";s:8:"canmodcp";s:1:"1";}i:7;a:60:{s:3:"gid";s:1:"7";s:4:"type";s:1:"1";s:5:"title";s:6:"Banned";s:11:"description";s:69:"The default user group to which members that are banned are moved to.";s:9:"namestyle";s:17:"<s>{username}</s>";s:9:"usertitle";s:6:"Banned";s:5:"stars";s:1:"0";s:9:"starimage";s:15:"images/star.gif";s:5:"image";s:0:"";s:9:"disporder";s:1:"0";s:13:"isbannedgroup";s:1:"1";s:7:"canview";s:1:"0";s:14:"canviewthreads";s:1:"0";s:15:"canviewprofiles";s:1:"0";s:16:"candlattachments";s:1:"0";s:14:"canpostthreads";s:1:"0";s:13:"canpostreplys";s:1:"0";s:18:"canpostattachments";s:1:"0";s:14:"canratethreads";s:1:"0";s:12:"caneditposts";s:1:"0";s:14:"candeleteposts";s:1:"0";s:16:"candeletethreads";s:1:"0";s:18:"caneditattachments";s:1:"0";s:12:"canpostpolls";s:1:"0";s:12:"canvotepolls";s:1:"0";s:9:"canusepms";s:1:"1";s:10:"cansendpms";s:1:"0";s:11:"cantrackpms";s:1:"0";s:17:"candenypmreceipts";s:1:"0";s:7:"pmquota";s:1:"0";s:15:"maxpmrecipients";s:1:"0";s:12:"cansendemail";s:1:"0";s:9:"maxemails";s:1:"5";s:17:"canviewmemberlist";s:1:"0";s:15:"canviewcalendar";s:1:"0";s:12:"canaddevents";s:1:"0";s:17:"canbypasseventmod";s:1:"0";s:17:"canmoderateevents";s:1:"0";s:13:"canviewonline";s:1:"0";s:15:"canviewwolinvis";s:1:"0";s:16:"canviewonlineips";s:1:"0";s:5:"cancp";s:1:"0";s:10:"issupermod";s:1:"0";s:9:"cansearch";s:1:"0";s:9:"canusercp";s:1:"0";s:16:"canuploadavatars";s:1:"0";s:14:"canratemembers";s:1:"0";s:13:"canchangename";s:1:"0";s:13:"showforumteam";s:1:"0";s:19:"usereputationsystem";s:1:"0";s:18:"cangivereputations";s:1:"0";s:15:"reputationpower";s:1:"0";s:17:"maxreputationsday";s:1:"0";s:15:"candisplaygroup";s:1:"1";s:11:"attachquota";s:1:"0";s:14:"cancustomtitle";s:1:"0";s:12:"canwarnusers";s:1:"0";s:18:"canreceivewarnings";s:1:"0";s:14:"maxwarningsday";s:1:"0";s:8:"canmodcp";s:1:"0";}}');
INSERT INTO `mybb_datacache` VALUES ('stats', 'a:7:{s:10:"numthreads";i:0;s:20:"numunapprovedthreads";i:0;s:8:"numposts";i:0;s:18:"numunapprovedposts";i:0;s:8:"numusers";s:1:"1";s:7:"lastuid";s:1:"1";s:12:"lastusername";s:6:"IceMan";}');
INSERT INTO `mybb_datacache` VALUES ('forums', 'a:2:{i:1;a:34:{s:3:"fid";s:1:"1";s:4:"name";s:11:"My Category";s:11:"description";s:0:"";s:6:"linkto";s:0:"";s:4:"type";s:1:"c";s:3:"pid";s:1:"0";s:10:"parentlist";s:1:"1";s:9:"disporder";s:1:"1";s:6:"active";s:1:"1";s:4:"open";s:1:"1";s:13:"lastposteruid";s:1:"0";s:15:"lastpostsubject";s:0:"";s:9:"allowhtml";s:1:"0";s:11:"allowmycode";s:1:"1";s:12:"allowsmilies";s:1:"1";s:12:"allowimgcode";s:1:"1";s:11:"allowpicons";s:1:"1";s:13:"allowtratings";s:1:"1";s:6:"status";s:1:"1";s:13:"usepostcounts";s:1:"1";s:8:"password";s:0:"";s:10:"showinjump";s:1:"1";s:8:"modposts";s:1:"0";s:10:"modthreads";s:1:"0";s:14:"mod_edit_posts";s:1:"0";s:14:"modattachments";s:1:"0";s:5:"style";s:1:"0";s:13:"overridestyle";s:1:"0";s:9:"rulestype";s:1:"0";s:10:"rulestitle";s:0:"";s:5:"rules";s:0:"";s:14:"defaultdatecut";s:1:"0";s:13:"defaultsortby";s:0:"";s:16:"defaultsortorder";s:0:"";}i:2;a:34:{s:3:"fid";s:1:"2";s:4:"name";s:8:"My Forum";s:11:"description";s:0:"";s:6:"linkto";s:0:"";s:4:"type";s:1:"f";s:3:"pid";s:1:"1";s:10:"parentlist";s:3:"1,2";s:9:"disporder";s:1:"1";s:6:"active";s:1:"1";s:4:"open";s:1:"1";s:13:"lastposteruid";s:1:"0";s:15:"lastpostsubject";s:0:"";s:9:"allowhtml";s:1:"0";s:11:"allowmycode";s:1:"1";s:12:"allowsmilies";s:1:"1";s:12:"allowimgcode";s:1:"1";s:11:"allowpicons";s:1:"1";s:13:"allowtratings";s:1:"1";s:6:"status";s:1:"1";s:13:"usepostcounts";s:1:"1";s:8:"password";s:0:"";s:10:"showinjump";s:1:"1";s:8:"modposts";s:1:"0";s:10:"modthreads";s:1:"0";s:14:"mod_edit_posts";s:1:"0";s:14:"modattachments";s:1:"0";s:5:"style";s:1:"0";s:13:"overridestyle";s:1:"0";s:9:"rulestype";s:1:"0";s:10:"rulestitle";s:0:"";s:5:"rules";s:0:"";s:14:"defaultdatecut";s:1:"0";s:13:"defaultsortby";s:0:"";s:16:"defaultsortorder";s:0:"";}}');
INSERT INTO `mybb_datacache` VALUES ('moderators', 'a:3:{i:0;i:0;i:1;s:0:"";i:2;s:0:"";}');
INSERT INTO `mybb_datacache` VALUES ('usertitles', 'a:5:{i:0;a:5:{s:4:"utid";s:1:"5";s:5:"posts";s:3:"750";s:5:"title";s:13:"Posting Freak";s:5:"stars";s:1:"5";s:9:"starimage";s:0:"";}i:1;a:5:{s:4:"utid";s:1:"4";s:5:"posts";s:3:"250";s:5:"title";s:13:"Senior Member";s:5:"stars";s:1:"4";s:9:"starimage";s:0:"";}i:2;a:5:{s:4:"utid";s:1:"3";s:5:"posts";s:2:"50";s:5:"title";s:6:"Member";s:5:"stars";s:1:"3";s:9:"starimage";s:0:"";}i:3;a:5:{s:4:"utid";s:1:"2";s:5:"posts";s:1:"1";s:5:"title";s:13:"Junior Member";s:5:"stars";s:1:"2";s:9:"starimage";s:0:"";}i:4;a:5:{s:4:"utid";s:1:"1";s:5:"posts";s:1:"0";s:5:"title";s:6:"Newbie";s:5:"stars";s:1:"1";s:9:"starimage";s:0:"";}}');
INSERT INTO `mybb_datacache` VALUES ('reportedposts', 'a:3:{s:6:"unread";s:1:"0";s:5:"total";s:1:"0";s:12:"lastdateline";N;}');
INSERT INTO `mybb_datacache` VALUES ('mycode', 'a:0:{}');
INSERT INTO `mybb_datacache` VALUES ('posticons', 'a:20:{i:1;a:3:{s:3:"iid";s:1:"1";s:4:"name";s:3:"Bug";s:4:"path";s:20:"images/icons/bug.gif";}i:2;a:3:{s:3:"iid";s:1:"2";s:4:"name";s:11:"Exclamation";s:4:"path";s:28:"images/icons/exclamation.gif";}i:3;a:3:{s:3:"iid";s:1:"3";s:4:"name";s:8:"Question";s:4:"path";s:25:"images/icons/question.gif";}i:4;a:3:{s:3:"iid";s:1:"4";s:4:"name";s:5:"Smile";s:4:"path";s:22:"images/icons/smile.gif";}i:5;a:3:{s:3:"iid";s:1:"5";s:4:"name";s:3:"Sad";s:4:"path";s:20:"images/icons/sad.gif";}i:6;a:3:{s:3:"iid";s:1:"6";s:4:"name";s:4:"Wink";s:4:"path";s:21:"images/icons/wink.gif";}i:7;a:3:{s:3:"iid";s:1:"7";s:4:"name";s:8:"Big Grin";s:4:"path";s:24:"images/icons/biggrin.gif";}i:8;a:3:{s:3:"iid";s:1:"8";s:4:"name";s:6:"Tongue";s:4:"path";s:23:"images/icons/tongue.gif";}i:9;a:3:{s:3:"iid";s:1:"9";s:4:"name";s:5:"Brick";s:4:"path";s:22:"images/icons/brick.gif";}i:10;a:3:{s:3:"iid";s:2:"10";s:4:"name";s:5:"Heart";s:4:"path";s:22:"images/icons/heart.gif";}i:11;a:3:{s:3:"iid";s:2:"11";s:4:"name";s:11:"Information";s:4:"path";s:28:"images/icons/information.gif";}i:12;a:3:{s:3:"iid";s:2:"12";s:4:"name";s:9:"Lightbulb";s:4:"path";s:26:"images/icons/lightbulb.gif";}i:13;a:3:{s:3:"iid";s:2:"13";s:4:"name";s:5:"Music";s:4:"path";s:22:"images/icons/music.gif";}i:14;a:3:{s:3:"iid";s:2:"14";s:4:"name";s:5:"Photo";s:4:"path";s:22:"images/icons/photo.gif";}i:15;a:3:{s:3:"iid";s:2:"15";s:4:"name";s:7:"Rainbow";s:4:"path";s:24:"images/icons/rainbow.gif";}i:16;a:3:{s:3:"iid";s:2:"16";s:4:"name";s:7:"Shocked";s:4:"path";s:24:"images/icons/shocked.gif";}i:17;a:3:{s:3:"iid";s:2:"17";s:4:"name";s:4:"Star";s:4:"path";s:21:"images/icons/star.gif";}i:18;a:3:{s:3:"iid";s:2:"18";s:4:"name";s:11:"Thumbs Down";s:4:"path";s:27:"images/icons/thumbsdown.gif";}i:19;a:3:{s:3:"iid";s:2:"19";s:4:"name";s:9:"Thumbs Up";s:4:"path";s:25:"images/icons/thumbsup.gif";}i:20;a:3:{s:3:"iid";s:2:"20";s:4:"name";s:5:"Video";s:4:"path";s:22:"images/icons/video.gif";}}');
INSERT INTO `mybb_datacache` VALUES ('update_check', 'a:1:{s:8:"dateline";i:1292184764;}');
INSERT INTO `mybb_datacache` VALUES ('tasks', 'a:1:{s:7:"nextrun";s:10:"1292227200";}');
INSERT INTO `mybb_datacache` VALUES ('spiders', 'a:10:{i:4;a:4:{s:3:"sid";s:1:"4";s:4:"name";s:7:"Hot Bot";s:9:"useragent";s:13:"slurp@inktomi";s:9:"usergroup";s:1:"0";}i:10;a:4:{s:3:"sid";s:2:"10";s:4:"name";s:6:"Yahoo!";s:9:"useragent";s:12:"yahoo! slurp";s:9:"usergroup";s:1:"0";}i:8;a:4:{s:3:"sid";s:1:"8";s:4:"name";s:5:"Alexa";s:9:"useragent";s:11:"ia_archiver";s:9:"usergroup";s:1:"0";}i:6;a:4:{s:3:"sid";s:1:"6";s:4:"name";s:11:"Archive.org";s:9:"useragent";s:11:"is_archiver";s:9:"usergroup";s:1:"0";}i:3;a:4:{s:3:"sid";s:1:"3";s:4:"name";s:10:"Ask Jeeves";s:9:"useragent";s:10:"ask jeeves";s:9:"usergroup";s:1:"0";}i:5;a:4:{s:3:"sid";s:1:"5";s:4:"name";s:13:"What You Seek";s:9:"useragent";s:9:"whatuseek";s:9:"usergroup";s:1:"0";}i:7;a:4:{s:3:"sid";s:1:"7";s:4:"name";s:9:"Altavista";s:9:"useragent";s:7:"scooter";s:9:"usergroup";s:1:"0";}i:9;a:4:{s:3:"sid";s:1:"9";s:4:"name";s:10:"MSN Search";s:9:"useragent";s:6:"msnbot";s:9:"usergroup";s:1:"0";}i:1;a:4:{s:3:"sid";s:1:"1";s:4:"name";s:9:"GoogleBot";s:9:"useragent";s:6:"google";s:9:"usergroup";s:1:"0";}i:2;a:4:{s:3:"sid";s:1:"2";s:4:"name";s:5:"Lycos";s:9:"useragent";s:5:"lycos";s:9:"usergroup";s:1:"0";}}');
INSERT INTO `mybb_datacache` VALUES ('bannedips', 'a:0:{}');
INSERT INTO `mybb_datacache` VALUES ('banned', 'a:0:{}');
INSERT INTO `mybb_datacache` VALUES ('birthdays', 'a:0:{}');
INSERT INTO `mybb_datacache` VALUES ('plugins', 'a:0:{}');
INSERT INTO `mybb_datacache` VALUES ('internal_settings', 'a:1:{s:14:"encryption_key";s:32:"KidV6QYmj8ohgu7NajIId7Kl2wJVKXx6";}');
INSERT INTO `mybb_datacache` VALUES ('mostonline', 'a:2:{s:8:"numusers";i:2;s:4:"time";i:1295129696;}');

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_events`
-- 

CREATE TABLE `mybb_events` (
  `eid` int(10) unsigned NOT NULL auto_increment,
  `cid` int(10) unsigned NOT NULL default '0',
  `uid` int(10) unsigned NOT NULL default '0',
  `name` varchar(120) NOT NULL default '',
  `description` text NOT NULL,
  `visible` int(1) NOT NULL default '0',
  `private` int(1) NOT NULL default '0',
  `dateline` int(10) unsigned NOT NULL default '0',
  `starttime` int(10) unsigned NOT NULL default '0',
  `endtime` int(10) unsigned NOT NULL default '0',
  `timezone` varchar(4) NOT NULL default '0',
  `ignoretimezone` int(1) NOT NULL default '0',
  `usingtime` int(1) NOT NULL default '0',
  `repeats` text NOT NULL,
  PRIMARY KEY  (`eid`),
  KEY `daterange` (`starttime`,`endtime`),
  KEY `private` (`private`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_events`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_forumpermissions`
-- 

CREATE TABLE `mybb_forumpermissions` (
  `pid` int(10) unsigned NOT NULL auto_increment,
  `fid` int(10) unsigned NOT NULL default '0',
  `gid` int(10) unsigned NOT NULL default '0',
  `canview` int(1) NOT NULL default '0',
  `canviewthreads` int(1) NOT NULL default '0',
  `candlattachments` int(1) NOT NULL default '0',
  `canpostthreads` int(1) NOT NULL default '0',
  `canpostreplys` int(1) NOT NULL default '0',
  `canpostattachments` int(1) NOT NULL default '0',
  `canratethreads` int(1) NOT NULL default '0',
  `caneditposts` int(1) NOT NULL default '0',
  `candeleteposts` int(1) NOT NULL default '0',
  `candeletethreads` int(1) NOT NULL default '0',
  `caneditattachments` int(1) NOT NULL default '0',
  `canpostpolls` int(1) NOT NULL default '0',
  `canvotepolls` int(1) NOT NULL default '0',
  `cansearch` int(1) NOT NULL default '0',
  PRIMARY KEY  (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_forumpermissions`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_forums`
-- 

CREATE TABLE `mybb_forums` (
  `fid` smallint(5) unsigned NOT NULL auto_increment,
  `name` varchar(120) NOT NULL default '',
  `description` text NOT NULL,
  `linkto` varchar(180) NOT NULL default '',
  `type` char(1) NOT NULL default '',
  `pid` smallint(5) unsigned NOT NULL default '0',
  `parentlist` text NOT NULL,
  `disporder` smallint(5) unsigned NOT NULL default '0',
  `active` int(1) NOT NULL default '0',
  `open` int(1) NOT NULL default '0',
  `threads` int(10) unsigned NOT NULL default '0',
  `posts` int(10) unsigned NOT NULL default '0',
  `lastpost` int(10) unsigned NOT NULL default '0',
  `lastposter` varchar(120) NOT NULL default '',
  `lastposteruid` int(10) unsigned NOT NULL default '0',
  `lastposttid` int(10) NOT NULL default '0',
  `lastpostsubject` varchar(120) NOT NULL default '',
  `allowhtml` int(1) NOT NULL default '0',
  `allowmycode` int(1) NOT NULL default '0',
  `allowsmilies` int(1) NOT NULL default '0',
  `allowimgcode` int(1) NOT NULL default '0',
  `allowpicons` int(1) NOT NULL default '0',
  `allowtratings` int(1) NOT NULL default '0',
  `status` int(4) NOT NULL default '1',
  `usepostcounts` int(1) NOT NULL default '0',
  `password` varchar(50) NOT NULL default '',
  `showinjump` int(1) NOT NULL default '0',
  `modposts` int(1) NOT NULL default '0',
  `modthreads` int(1) NOT NULL default '0',
  `mod_edit_posts` int(1) NOT NULL default '0',
  `modattachments` int(1) NOT NULL default '0',
  `style` smallint(5) unsigned NOT NULL default '0',
  `overridestyle` int(1) NOT NULL default '0',
  `rulestype` smallint(1) NOT NULL default '0',
  `rulestitle` varchar(200) NOT NULL default '',
  `rules` text NOT NULL,
  `unapprovedthreads` int(10) unsigned NOT NULL default '0',
  `unapprovedposts` int(10) unsigned NOT NULL default '0',
  `defaultdatecut` smallint(4) unsigned NOT NULL default '0',
  `defaultsortby` varchar(10) NOT NULL default '',
  `defaultsortorder` varchar(4) NOT NULL default '',
  PRIMARY KEY  (`fid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `mybb_forums`
-- 

INSERT INTO `mybb_forums` VALUES (1, 'My Category', '', '', 'c', 0, '1', 1, 1, 1, 0, 0, 0, '0', 0, 0, '', 0, 1, 1, 1, 1, 1, 1, 1, '', 1, 0, 0, 0, 0, 0, 0, 0, '', '', 0, 0, 0, '', '');
INSERT INTO `mybb_forums` VALUES (2, 'My Forum', '', '', 'f', 1, '1,2', 1, 1, 1, 0, 0, 0, '0', 0, 0, '', 0, 1, 1, 1, 1, 1, 1, 1, '', 1, 0, 0, 0, 0, 0, 0, 0, '', '', 0, 0, 0, '', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_forumsread`
-- 

CREATE TABLE `mybb_forumsread` (
  `fid` int(10) unsigned NOT NULL default '0',
  `uid` int(10) unsigned NOT NULL default '0',
  `dateline` int(10) NOT NULL default '0',
  UNIQUE KEY `fid` (`fid`,`uid`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `mybb_forumsread`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_forumsubscriptions`
-- 

CREATE TABLE `mybb_forumsubscriptions` (
  `fsid` int(10) unsigned NOT NULL auto_increment,
  `fid` smallint(5) unsigned NOT NULL default '0',
  `uid` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`fsid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_forumsubscriptions`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_groupleaders`
-- 

CREATE TABLE `mybb_groupleaders` (
  `lid` smallint(5) unsigned NOT NULL auto_increment,
  `gid` smallint(5) unsigned NOT NULL default '0',
  `uid` int(10) unsigned NOT NULL default '0',
  `canmanagemembers` int(1) NOT NULL default '0',
  `canmanagerequests` int(1) NOT NULL default '0',
  PRIMARY KEY  (`lid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_groupleaders`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_helpdocs`
-- 

CREATE TABLE `mybb_helpdocs` (
  `hid` smallint(5) unsigned NOT NULL auto_increment,
  `sid` smallint(5) unsigned NOT NULL default '0',
  `name` varchar(120) NOT NULL default '',
  `description` text NOT NULL,
  `document` text NOT NULL,
  `usetranslation` int(1) NOT NULL default '0',
  `enabled` int(1) NOT NULL default '0',
  `disporder` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`hid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `mybb_helpdocs`
-- 

INSERT INTO `mybb_helpdocs` VALUES (1, 1, 'User Registration', 'Perks and privileges to user registration.', 'Some parts of this forum may require you to be logged in and registered. Registration is free and takes a few minutes to complete.<br />\r\n<br />\r\nYou are encouraged to register; once you register you will be able to post messages, set your own preferences, and maintain a profile.<br />\r\n<br />\r\nSome of the features that generally require registration are subscriptions, changing of styles, accessing of your Personal Pad (simple notepad) and emailing forum members.', 1, 1, 1);
INSERT INTO `mybb_helpdocs` VALUES (2, 1, 'Updating Profile', 'Changing your data currently on record.', 'At some point during your stay, you may decide you need to update some information such as your instant messenger information, your password, or perhaps you need to change your email address. You may change any of this information from your user control panel. To access this control panel, simply click on the link in the upper right hand corner of most any page entitled "user cp". From there, simply choose "Edit Profile" and change or update any desired items, then proceed to click the submit button located at the bottom of the page for changes to take effect.', 1, 1, 2);
INSERT INTO `mybb_helpdocs` VALUES (3, 1, 'Use of Cookies on myBB', 'myBB uses cookies to store certain information about your registration.', 'myBulletinBoard makes use of cookies to store your login information if you are registered, and your last visit if you are not.<br />\r\n<br />\r\nCookies are small text documents stored on your computer; the cookies set by this forum can only be used on this website and pose no security risk.<br />\r\n<br />\r\nCookies on this forum also track the specific topics you have read and when you last read them.<br />\r\n<br />\r\nTo clear all cookies set by this forum, you can click <a href="misc.php?action=clearcookies&amp;key={1}">here</a>.', 1, 1, 3);
INSERT INTO `mybb_helpdocs` VALUES (4, 1, 'Logging In and Out', 'How to login and log out.', 'When you login, you set a cookie on your machine so that you can browse the forums without having to enter in your username and password each time. Logging out clears that cookie to ensure nobody else can browse the forum as you.<br />\r\n<br />\r\nTo login, simply click the login link at the top right hand corner of the forum. To log out, click the log out link in the same place. In the event you cannot log out, clearing cookies on your machine will take the same effect.', 1, 1, 4);
INSERT INTO `mybb_helpdocs` VALUES (5, 2, 'Posting a New Topic', 'Starting a new thread in a forum.', 'When you go to a forum you are interested in and you wish to create a new topic (or thread), simply choose the button at the top and bottom of the forums entitled "New topic". Please take note that you may not have permission to post a new topic in every forum as your administrator may have restricted posting in that forum to staff or archived the forum entirely.', 1, 1, 1);
INSERT INTO `mybb_helpdocs` VALUES (6, 2, 'Posting a Reply', 'Replying to a topic within a forum.', 'During the course of your visit, you may encounter a thread to which you would like to make a reply. To do so, simply click the "Post reply" button at the bottom or top of the thread. Please take note that your administrator may have restricted posting to certain individuals in that particular forum.<br />\r\n<br />\r\nAdditionally, a moderator of a forum may have closed a thread meaning that users cannot reply to it. There is no way for a user to open such a thread without the help of a moderator or administrator.', 1, 1, 2);
INSERT INTO `mybb_helpdocs` VALUES (7, 2, 'MyCode', 'Learn how to use MyCode to enhance your posts.', 'You can use MyCode, a simplified version of HTML, in your posts to create certain effects.\r\n<p><br />\r\n[b]This text is bold[/b]<br />\r\n&nbsp;&nbsp;&nbsp;<b>This text is bold</b>\r\n<p>\r\n[i]This text is italicized[/i]<br />\r\n&nbsp;&nbsp;&nbsp;<i>This text is italicized</i>\r\n<p>\r\n[u]This text is underlined[/u]<br />\r\n&nbsp;&nbsp;&nbsp;<u>This text is underlined</u>\r\n<p><br />\r\n[url]http://www.example.com/[/url]<br />\r\n&nbsp;&nbsp;&nbsp;<a href="http://www.example.com/">http://www.example.com/</a>\r\n<p>\r\n[url=http://www.example.com/]Example.com[/url]<br />\r\n&nbsp;&nbsp;&nbsp;<a href="http://www.example.com/">Example.com</a>\r\n<p>\r\n[email]example@example.com[/email]<br />\r\n&nbsp;&nbsp;&nbsp;<a href="mailto:example@example.com">example@example.com</a>\r\n<p>\r\n[email=example@example.com]E-mail Me![/email]<br />\r\n&nbsp;&nbsp;&nbsp;<a href="mailto:example@example.com">E-mail Me!</a>\r\n<p>\r\n[email=example@example.com?subject=spam]E-mail with subject[/email]<br />\r\n&nbsp;&nbsp;&nbsp;<a href="mailto:example@example.com?subject=spam">E-mail with subject</a>\r\n<p><br />\r\n[quote]Quoted text will be here[/quote]<br />\r\n&nbsp;&nbsp;&nbsp;<quote>Quoted text will be here</quote>\r\n<p>\r\n[code]Text with preserved formatting[/code]<br />\r\n&nbsp;&nbsp;&nbsp;<code>Text with preserved formatting</code>\r\n<p><br />\r\n[img]http://www.php.net/images/php.gif[/img]<br />\r\n&nbsp;&nbsp;&nbsp;<img src="http://www.php.net/images/php.gif">\r\n<p>\r\n[img=50x50]http://www.php.net/images/php.gif[/img]<br />\r\n&nbsp;&nbsp;&nbsp;<img src="http://www.php.net/images/php.gif" width="50" height="50">\r\n<p><br />\r\n[color=red]This text is red[/color]<br />\r\n&nbsp;&nbsp;&nbsp;<font color="red">This text is red</font>\r\n<p>\r\n[size=3]This text is size 3[/size]<br />\r\n&nbsp;&nbsp;&nbsp;<font size="3">This text is size 3</font>\r\n<p>\r\n[font=Tahoma]This font is Tahoma[/font]<br />\r\n&nbsp;&nbsp;&nbsp;<font face="Tahoma">This font is Tahoma</font>\r\n<p><br />\r\n[align=center]This is centered[/align]<div align="center">This is centered</div>\r\n<p>\r\n[align=right]This is right-aligned[/align]<div align="right">This is right-aligned</div>\r\n<p><br />\r\n[list]<br />\r\n[*]List Item #1<br />\r\n[*]List Item #2<br />\r\n[*]List Item #3<br />\r\n[/list]<br />\r\n<ul>\r\n<li>List item #1</li>\r\n<li>List item #2</li>\r\n<li>List Item #3</li>\r\n</ul><p><font size=1>You can make an ordered list by using [list=1] for a numbered, and [list=a] for an alphabetical list.</size>', 1, 1, 3);

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_helpsections`
-- 

CREATE TABLE `mybb_helpsections` (
  `sid` smallint(5) unsigned NOT NULL auto_increment,
  `name` varchar(120) NOT NULL default '',
  `description` text NOT NULL,
  `usetranslation` int(1) NOT NULL default '0',
  `enabled` int(1) NOT NULL default '0',
  `disporder` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `mybb_helpsections`
-- 

INSERT INTO `mybb_helpsections` VALUES (1, 'User Maintenance', 'Basic instructions for maintaining a forum account.', 1, 1, 1);
INSERT INTO `mybb_helpsections` VALUES (2, 'Posting', 'Posting, replying, and basic usage of forum.', 1, 1, 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_icons`
-- 

CREATE TABLE `mybb_icons` (
  `iid` smallint(5) unsigned NOT NULL auto_increment,
  `name` varchar(120) NOT NULL default '',
  `path` varchar(220) NOT NULL default '',
  PRIMARY KEY  (`iid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- 
-- Dumping data for table `mybb_icons`
-- 

INSERT INTO `mybb_icons` VALUES (1, 'Bug', 'images/icons/bug.gif');
INSERT INTO `mybb_icons` VALUES (2, 'Exclamation', 'images/icons/exclamation.gif');
INSERT INTO `mybb_icons` VALUES (3, 'Question', 'images/icons/question.gif');
INSERT INTO `mybb_icons` VALUES (4, 'Smile', 'images/icons/smile.gif');
INSERT INTO `mybb_icons` VALUES (5, 'Sad', 'images/icons/sad.gif');
INSERT INTO `mybb_icons` VALUES (6, 'Wink', 'images/icons/wink.gif');
INSERT INTO `mybb_icons` VALUES (7, 'Big Grin', 'images/icons/biggrin.gif');
INSERT INTO `mybb_icons` VALUES (8, 'Tongue', 'images/icons/tongue.gif');
INSERT INTO `mybb_icons` VALUES (9, 'Brick', 'images/icons/brick.gif');
INSERT INTO `mybb_icons` VALUES (10, 'Heart', 'images/icons/heart.gif');
INSERT INTO `mybb_icons` VALUES (11, 'Information', 'images/icons/information.gif');
INSERT INTO `mybb_icons` VALUES (12, 'Lightbulb', 'images/icons/lightbulb.gif');
INSERT INTO `mybb_icons` VALUES (13, 'Music', 'images/icons/music.gif');
INSERT INTO `mybb_icons` VALUES (14, 'Photo', 'images/icons/photo.gif');
INSERT INTO `mybb_icons` VALUES (15, 'Rainbow', 'images/icons/rainbow.gif');
INSERT INTO `mybb_icons` VALUES (16, 'Shocked', 'images/icons/shocked.gif');
INSERT INTO `mybb_icons` VALUES (17, 'Star', 'images/icons/star.gif');
INSERT INTO `mybb_icons` VALUES (18, 'Thumbs Down', 'images/icons/thumbsdown.gif');
INSERT INTO `mybb_icons` VALUES (19, 'Thumbs Up', 'images/icons/thumbsup.gif');
INSERT INTO `mybb_icons` VALUES (20, 'Video', 'images/icons/video.gif');

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_joinrequests`
-- 

CREATE TABLE `mybb_joinrequests` (
  `rid` int(10) unsigned NOT NULL auto_increment,
  `uid` int(10) unsigned NOT NULL default '0',
  `gid` smallint(5) unsigned NOT NULL default '0',
  `reason` varchar(250) NOT NULL default '',
  `dateline` bigint(30) NOT NULL default '0',
  PRIMARY KEY  (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_joinrequests`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_mailerrors`
-- 

CREATE TABLE `mybb_mailerrors` (
  `eid` int(10) unsigned NOT NULL auto_increment,
  `subject` varchar(200) NOT NULL default '',
  `message` text NOT NULL,
  `toaddress` varchar(150) NOT NULL default '',
  `fromaddress` varchar(150) NOT NULL default '',
  `dateline` bigint(30) NOT NULL default '0',
  `error` text NOT NULL,
  `smtperror` varchar(200) NOT NULL default '',
  `smtpcode` int(5) NOT NULL default '0',
  PRIMARY KEY  (`eid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_mailerrors`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_maillogs`
-- 

CREATE TABLE `mybb_maillogs` (
  `mid` int(10) unsigned NOT NULL auto_increment,
  `subject` varchar(200) NOT NULL default '',
  `message` text NOT NULL,
  `dateline` bigint(30) NOT NULL default '0',
  `fromuid` int(10) unsigned NOT NULL default '0',
  `fromemail` varchar(200) NOT NULL default '',
  `touid` bigint(30) NOT NULL default '0',
  `toemail` varchar(200) NOT NULL default '',
  `tid` int(10) unsigned NOT NULL default '0',
  `ipaddress` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_maillogs`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_mailqueue`
-- 

CREATE TABLE `mybb_mailqueue` (
  `mid` int(10) unsigned NOT NULL auto_increment,
  `mailto` varchar(200) NOT NULL,
  `mailfrom` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `headers` text NOT NULL,
  PRIMARY KEY  (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_mailqueue`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_massemails`
-- 

CREATE TABLE `mybb_massemails` (
  `mid` int(10) unsigned NOT NULL auto_increment,
  `uid` int(10) unsigned NOT NULL default '0',
  `subject` varchar(200) NOT NULL default '',
  `message` text NOT NULL,
  `htmlmessage` text NOT NULL,
  `type` tinyint(1) NOT NULL default '0',
  `format` tinyint(1) NOT NULL default '0',
  `dateline` bigint(30) NOT NULL default '0',
  `senddate` bigint(30) NOT NULL default '0',
  `status` tinyint(1) NOT NULL default '0',
  `sentcount` int(10) unsigned NOT NULL default '0',
  `totalcount` int(10) unsigned NOT NULL default '0',
  `conditions` text NOT NULL,
  `perpage` smallint(4) NOT NULL default '50',
  PRIMARY KEY  (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_massemails`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_moderatorlog`
-- 

CREATE TABLE `mybb_moderatorlog` (
  `uid` int(10) unsigned NOT NULL default '0',
  `dateline` bigint(30) NOT NULL default '0',
  `fid` smallint(5) unsigned NOT NULL default '0',
  `tid` int(10) unsigned NOT NULL default '0',
  `pid` int(10) unsigned NOT NULL default '0',
  `action` text NOT NULL,
  `data` text NOT NULL,
  `ipaddress` varchar(50) NOT NULL default '',
  KEY `tid` (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `mybb_moderatorlog`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_moderators`
-- 

CREATE TABLE `mybb_moderators` (
  `mid` smallint(5) unsigned NOT NULL auto_increment,
  `fid` smallint(5) unsigned NOT NULL default '0',
  `uid` int(10) unsigned NOT NULL default '0',
  `caneditposts` int(1) NOT NULL default '0',
  `candeleteposts` int(1) NOT NULL default '0',
  `canviewips` int(1) NOT NULL default '0',
  `canopenclosethreads` int(1) NOT NULL default '0',
  `canmanagethreads` int(1) NOT NULL default '0',
  `canmovetononmodforum` int(1) NOT NULL default '0',
  PRIMARY KEY  (`mid`),
  KEY `uid` (`uid`,`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_moderators`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_modtools`
-- 

CREATE TABLE `mybb_modtools` (
  `tid` smallint(5) unsigned NOT NULL auto_increment,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `forums` text NOT NULL,
  `type` char(1) NOT NULL default '',
  `postoptions` text NOT NULL,
  `threadoptions` text NOT NULL,
  PRIMARY KEY  (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_modtools`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_mycode`
-- 

CREATE TABLE `mybb_mycode` (
  `cid` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(100) NOT NULL default '',
  `description` text NOT NULL,
  `regex` text NOT NULL,
  `replacement` text NOT NULL,
  `active` int(1) NOT NULL default '0',
  `parseorder` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_mycode`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_polls`
-- 

CREATE TABLE `mybb_polls` (
  `pid` int(10) unsigned NOT NULL auto_increment,
  `tid` int(10) unsigned NOT NULL default '0',
  `question` varchar(200) NOT NULL default '',
  `dateline` bigint(30) NOT NULL default '0',
  `options` text NOT NULL,
  `votes` text NOT NULL,
  `numoptions` smallint(5) unsigned NOT NULL default '0',
  `numvotes` smallint(5) unsigned NOT NULL default '0',
  `timeout` bigint(30) NOT NULL default '0',
  `closed` int(1) NOT NULL default '0',
  `multiple` int(1) NOT NULL default '0',
  `public` int(1) NOT NULL default '0',
  PRIMARY KEY  (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_polls`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_pollvotes`
-- 

CREATE TABLE `mybb_pollvotes` (
  `vid` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `uid` int(10) unsigned NOT NULL default '0',
  `voteoption` smallint(5) unsigned NOT NULL default '0',
  `dateline` bigint(30) NOT NULL default '0',
  PRIMARY KEY  (`vid`),
  KEY `pid` (`pid`,`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_pollvotes`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_posts`
-- 

CREATE TABLE `mybb_posts` (
  `pid` int(10) unsigned NOT NULL auto_increment,
  `tid` int(10) unsigned NOT NULL default '0',
  `replyto` int(10) unsigned NOT NULL default '0',
  `fid` smallint(5) unsigned NOT NULL default '0',
  `subject` varchar(120) NOT NULL default '',
  `icon` smallint(5) unsigned NOT NULL default '0',
  `uid` int(10) unsigned NOT NULL default '0',
  `username` varchar(80) NOT NULL default '',
  `dateline` bigint(30) NOT NULL default '0',
  `message` text NOT NULL,
  `ipaddress` varchar(30) NOT NULL default '',
  `longipaddress` int(11) NOT NULL default '0',
  `includesig` int(1) NOT NULL default '0',
  `smilieoff` int(1) NOT NULL default '0',
  `edituid` int(10) unsigned NOT NULL default '0',
  `edittime` int(10) NOT NULL default '0',
  `visible` int(1) NOT NULL default '0',
  `posthash` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`pid`),
  KEY `tid` (`tid`,`uid`),
  KEY `uid` (`uid`),
  KEY `visible` (`visible`),
  KEY `dateline` (`dateline`),
  KEY `longipaddress` (`longipaddress`),
  FULLTEXT KEY `message` (`message`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_posts`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_privatemessages`
-- 

CREATE TABLE `mybb_privatemessages` (
  `pmid` int(10) unsigned NOT NULL auto_increment,
  `uid` int(10) unsigned NOT NULL default '0',
  `toid` int(10) unsigned NOT NULL default '0',
  `fromid` int(10) unsigned NOT NULL default '0',
  `recipients` text NOT NULL,
  `folder` smallint(5) unsigned NOT NULL default '1',
  `subject` varchar(120) NOT NULL default '',
  `icon` smallint(5) unsigned NOT NULL default '0',
  `message` text NOT NULL,
  `dateline` bigint(30) NOT NULL default '0',
  `deletetime` bigint(30) NOT NULL default '0',
  `status` int(1) NOT NULL default '0',
  `statustime` bigint(30) NOT NULL default '0',
  `includesig` int(1) NOT NULL default '0',
  `smilieoff` int(1) NOT NULL default '0',
  `receipt` int(1) NOT NULL default '0',
  `readtime` bigint(30) NOT NULL default '0',
  PRIMARY KEY  (`pmid`),
  KEY `uid` (`uid`,`folder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_privatemessages`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_profilefields`
-- 

CREATE TABLE `mybb_profilefields` (
  `fid` smallint(5) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `description` text NOT NULL,
  `disporder` smallint(5) unsigned NOT NULL default '0',
  `type` text NOT NULL,
  `length` smallint(5) unsigned NOT NULL default '0',
  `maxlength` smallint(5) unsigned NOT NULL default '0',
  `required` int(1) NOT NULL default '0',
  `editable` int(1) NOT NULL default '0',
  `hidden` int(1) NOT NULL default '0',
  PRIMARY KEY  (`fid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `mybb_profilefields`
-- 

INSERT INTO `mybb_profilefields` VALUES (1, 'Location', 'Where in the world do you live?', 1, 'text', 0, 255, 0, 1, 0);
INSERT INTO `mybb_profilefields` VALUES (2, 'Bio', 'Enter a few short details about yourself, your life story etc.', 2, 'textarea', 0, 0, 0, 1, 0);
INSERT INTO `mybb_profilefields` VALUES (3, 'Sex', 'Please select your sex from the list below.', 0, 'select\nUndisclosed\nMale\nFemale\nOther', 0, 0, 0, 1, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_promotionlogs`
-- 

CREATE TABLE `mybb_promotionlogs` (
  `plid` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `uid` int(10) unsigned NOT NULL default '0',
  `oldusergroup` varchar(200) NOT NULL default '0',
  `newusergroup` smallint(6) NOT NULL default '0',
  `dateline` bigint(30) NOT NULL default '0',
  `type` varchar(9) NOT NULL default 'primary',
  PRIMARY KEY  (`plid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_promotionlogs`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_promotions`
-- 

CREATE TABLE `mybb_promotions` (
  `pid` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(120) NOT NULL default '',
  `description` text NOT NULL,
  `enabled` tinyint(1) NOT NULL default '1',
  `logging` tinyint(1) NOT NULL default '0',
  `posts` int(11) NOT NULL default '0',
  `posttype` char(2) NOT NULL default '',
  `registered` int(11) NOT NULL default '0',
  `registeredtype` varchar(20) NOT NULL default '',
  `reputations` int(11) NOT NULL default '0',
  `reputationtype` char(2) NOT NULL default '',
  `requirements` varchar(200) NOT NULL default '',
  `originalusergroup` varchar(120) NOT NULL default '0',
  `newusergroup` smallint(5) unsigned NOT NULL default '0',
  `usergrouptype` varchar(120) NOT NULL default '0',
  PRIMARY KEY  (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_promotions`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_reportedposts`
-- 

CREATE TABLE `mybb_reportedposts` (
  `rid` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `tid` int(10) unsigned NOT NULL default '0',
  `fid` int(10) unsigned NOT NULL default '0',
  `uid` int(10) unsigned NOT NULL default '0',
  `reportstatus` int(1) NOT NULL default '0',
  `reason` varchar(250) NOT NULL default '',
  `dateline` bigint(30) NOT NULL default '0',
  PRIMARY KEY  (`rid`),
  KEY `fid` (`fid`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_reportedposts`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_reputation`
-- 

CREATE TABLE `mybb_reputation` (
  `rid` int(10) unsigned NOT NULL auto_increment,
  `uid` int(10) unsigned NOT NULL default '0',
  `adduid` int(10) unsigned NOT NULL default '0',
  `reputation` bigint(30) NOT NULL default '0',
  `dateline` bigint(30) NOT NULL default '0',
  `comments` text NOT NULL,
  PRIMARY KEY  (`rid`),
  KEY `uid` (`uid`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_reputation`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_searchlog`
-- 

CREATE TABLE `mybb_searchlog` (
  `sid` varchar(32) NOT NULL default '',
  `uid` int(10) unsigned NOT NULL default '0',
  `dateline` bigint(30) NOT NULL default '0',
  `ipaddress` varchar(120) NOT NULL default '',
  `threads` text NOT NULL,
  `posts` text NOT NULL,
  `resulttype` varchar(10) NOT NULL default '',
  `querycache` text NOT NULL,
  `keywords` text NOT NULL,
  PRIMARY KEY  (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `mybb_searchlog`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_sessions`
-- 

CREATE TABLE `mybb_sessions` (
  `sid` varchar(32) NOT NULL default '',
  `uid` int(10) unsigned NOT NULL default '0',
  `ip` varchar(40) NOT NULL default '',
  `time` bigint(30) NOT NULL default '0',
  `location` varchar(150) NOT NULL default '',
  `useragent` varchar(100) NOT NULL default '',
  `anonymous` int(1) NOT NULL default '0',
  `nopermission` int(1) NOT NULL default '0',
  `location1` int(10) NOT NULL default '0',
  `location2` int(10) NOT NULL default '0',
  PRIMARY KEY  (`sid`),
  KEY `location1` (`location1`),
  KEY `location2` (`location2`),
  KEY `time` (`time`),
  KEY `uid` (`uid`),
  KEY `ip` (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `mybb_sessions`
-- 

INSERT INTO `mybb_sessions` VALUES ('7f003b689506f067597b84b591a475d0', 0, '127.0.0.1', 1295129696, '/forum/index.php?', 'Opera/9.80 (Windows NT 5.1; U; en) Presto/2.7.62 Version/11.00', 0, 0, 0, 0);
INSERT INTO `mybb_sessions` VALUES ('f77c70862260f107271c5e3892279380', 0, '79.115.163.109', 1294253590, '/forum/index.php?', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; ro; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13', 0, 0, 0, 0);
INSERT INTO `mybb_sessions` VALUES ('d43d83a0eb0599c5dc39b4293323a34e', 0, '188.26.246.169', 1295129641, '/forum/index.php?', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; ro; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13', 0, 0, 0, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_settinggroups`
-- 

CREATE TABLE `mybb_settinggroups` (
  `gid` smallint(5) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `title` varchar(220) NOT NULL default '',
  `description` text NOT NULL,
  `disporder` smallint(5) unsigned NOT NULL default '0',
  `isdefault` int(1) NOT NULL default '0',
  PRIMARY KEY  (`gid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- 
-- Dumping data for table `mybb_settinggroups`
-- 

INSERT INTO `mybb_settinggroups` VALUES (1, 'calendar', 'Calendar', 'The board calendar allows the public and private listing of events and members'' birthdays. This section allows you to control and manage the settings for the Calendar.', 14, 1);
INSERT INTO `mybb_settinggroups` VALUES (2, 'clickablecode', 'Clickable Smilies and BB Code', 'This section allows you to change how the clickable smilies inserter appears.', 20, 1);
INSERT INTO `mybb_settinggroups` VALUES (3, 'cpprefs', 'Control Panel Preferences (Global)', 'This section allows you to set the global preferences for the Admin Control Panel.', 21, 1);
INSERT INTO `mybb_settinggroups` VALUES (4, 'datetime', 'Date and Time Formats', 'Here you can specify the different date and time formats used to display dates and times on the forums.', 4, 1);
INSERT INTO `mybb_settinggroups` VALUES (5, 'forumdisplay', 'Forum Display Options', 'This section allows you to manage the various settings used on the forum display (forumdisplay.php) of your boards such as enabling and disabling different features.', 6, 1);
INSERT INTO `mybb_settinggroups` VALUES (6, 'forumhome', 'Forum Home Options', 'This section allows you to manage the various settings used on the forum home (index.php) of your boards such as enabling and disabling different features.', 5, 1);
INSERT INTO `mybb_settinggroups` VALUES (7, 'general', 'General Configuration', 'This section contains various settings such as your board name and url, as well as your website name and url.', 2, 1);
INSERT INTO `mybb_settinggroups` VALUES (8, 'mailsettings', 'Mail Settings', 'This section allows you to control various aspects of the MyBB mail system, such as sending with PHP mail or with a off server SMTP server.', 22, 1);
INSERT INTO `mybb_settinggroups` VALUES (9, 'member', 'User Registration and Profile Options', 'Here you can control various settings with relation to user account registration and account management.', 8, 1);
INSERT INTO `mybb_settinggroups` VALUES (10, 'memberlist', 'Member List', 'This section allows you to control various aspects of the board member listing (memberlist.php), such as how many members to show per page, and which features to enable or disable.', 10, 1);
INSERT INTO `mybb_settinggroups` VALUES (11, 'onlineoffline', 'Board Online / Offline', 'These settings allow you to globally turn your forums online or offline, and allow you to specify a reason for turning them off.', 1, 1);
INSERT INTO `mybb_settinggroups` VALUES (12, 'portal', 'Portal Settings', 'The portal page compiles several different pieces of information about your forum, including latest posts, who''s online, forum stats, announcements, and more. This section has settings to control the aspects of the portal page (portal.php).', 17, 1);
INSERT INTO `mybb_settinggroups` VALUES (13, 'posting', 'Posting', 'These options control the various elements in relation to posting messages on the forums.', 9, 1);
INSERT INTO `mybb_settinggroups` VALUES (14, 'privatemessaging', 'Private Messaging', 'Various options with relation to the MyBB Private Messaging system (private.php) can be managed and set here.', 13, 1);
INSERT INTO `mybb_settinggroups` VALUES (15, 'reputation', 'Reputation', 'The reputation system allows your users to rate others and leave a comment on the user. This section has settings to disable and change other aspects of the reputation page (reputation.php).', 10, 1);
INSERT INTO `mybb_settinggroups` VALUES (16, 'search', 'Search System', 'The various settings in this group allow you to make changes to the built in search mechanism for threads and posts in MyBB,', 18, 1);
INSERT INTO `mybb_settinggroups` VALUES (17, 'server', 'Server and Optimization Options', 'These options allow you to set various server and optimization preferences allowing you to reduce the load on your server, and gain better performance on your board.', 3, 1);
INSERT INTO `mybb_settinggroups` VALUES (18, 'showthread', 'Show Thread Options', 'This section allows you to manage the various settings used on the thread display page (showthread.php) of your boards such as enabling and disabling different features.', 7, 1);
INSERT INTO `mybb_settinggroups` VALUES (19, 'warning', 'Warning System Settings', 'The warning system allows forum staff to warn users for rule violations. Here you can manage the settings that control the warning system.', 11, 1);
INSERT INTO `mybb_settinggroups` VALUES (20, 'whosonline', 'Who''s Online', 'Various settings regarding the Who is Online functionality.', 15, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_settings`
-- 

CREATE TABLE `mybb_settings` (
  `sid` smallint(5) unsigned NOT NULL auto_increment,
  `name` varchar(120) NOT NULL default '',
  `title` varchar(120) NOT NULL default '',
  `description` text NOT NULL,
  `optionscode` text NOT NULL,
  `value` text NOT NULL,
  `disporder` smallint(5) unsigned NOT NULL default '0',
  `gid` smallint(5) unsigned NOT NULL default '0',
  `isdefault` int(1) NOT NULL default '0',
  PRIMARY KEY  (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=172 ;

-- 
-- Dumping data for table `mybb_settings`
-- 

INSERT INTO `mybb_settings` VALUES (1, 'enablecalendar', 'Enable Calendar Functionality', 'If you wish to disable the calendar on your board, set this option to no.', 'yesno', '1', 1, 1, 0);
INSERT INTO `mybb_settings` VALUES (2, 'bbcodeinserter', 'Clickable MyCode Editor', 'Set this option to On to show the clickable code buttons editor on posting pages.', 'onoff', '1', 1, 2, 0);
INSERT INTO `mybb_settings` VALUES (3, 'smilieinserter', 'Clickable Smilies Inserter', 'Clickable smilies will appear on the posting pages if this option is set to ''on''.', 'onoff', '1', 1, 2, 0);
INSERT INTO `mybb_settings` VALUES (4, 'smilieinsertertot', 'No. of Smilies to show', 'Enter the total number of smilies to show on the clickable smilie inserter.', 'text', '20', 2, 2, 0);
INSERT INTO `mybb_settings` VALUES (5, 'smilieinsertercols', 'No. of Smilie Cols to Show', 'Enter the number of columns you wish to show on the clickable smilie inserter.', 'text', '4', 3, 2, 0);
INSERT INTO `mybb_settings` VALUES (6, 'cplanguage', 'Control Panel Language', 'The language of the control panel.', 'adminlanguage', 'english', 1, 3, 0);
INSERT INTO `mybb_settings` VALUES (7, 'cpstyle', 'Control Panel Style', 'The Default style that the control panel will use. Styles are inside the styles folder. A folder name inside that folder becomes the style title and style.css inside the style title folder is the css style file.', 'cpstyle', '', 2, 3, 0);
INSERT INTO `mybb_settings` VALUES (8, 'dateformat', 'Date Format', 'The format of the dates used on the forum. This format uses the PHP date() function. We recommend not changing this unless you know what you''re doing.', 'text', 'm-d-Y', 1, 4, 0);
INSERT INTO `mybb_settings` VALUES (9, 'timeformat', 'Time Format', 'The format of the times used on the forum. This format uses PHP''s date() function. We recommend not changing this unless you know what you''re doing.', 'text', 'h:i A', 2, 4, 0);
INSERT INTO `mybb_settings` VALUES (10, 'regdateformat', 'Registered Date Format', 'The format used on showthread where it shows when the user registered.', 'text', 'M Y', 3, 4, 0);
INSERT INTO `mybb_settings` VALUES (11, 'timezoneoffset', 'Default Timezone Offset', 'Here you can set the default timezone offset for guests and members using the default offset.', 'php\n<select name=\\"upsetting[{$setting[''name'']}]\\">\n<option value=\\"-12\\" ".($setting[''value''] == -12?"selected=\\"selected\\"":"").">GMT -12:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, -12).")</option>\n<option value=\\"-11\\" ".($setting[''value''] == -11?"selected=\\"selected\\"":"").">GMT -11:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, -11).")</option>\n<option value=\\"-10\\" ".($setting[''value''] == -10?"selected=\\"selected\\"":"").">GMT -10:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, -10).")</option>\n<option value=\\"-9\\" ".($setting[''value''] == -9?"selected=\\"selected\\"":"").">GMT -9:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, -9).")</option>\n<option value=\\"-8\\" ".($setting[''value''] == -8?"selected=\\"selected\\"":"").">GMT -8:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, -8).")</option>\n<option value=\\"-7\\" ".($setting[''value''] == -7?"selected=\\"selected\\"":"").">GMT -7:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, -7).")</option>\n<option value=\\"-6\\" ".($setting[''value''] == -6?"selected=\\"selected\\"":"").">GMT -6:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, -6).")</option>\n<option value=\\"-5\\" ".($setting[''value''] == -5?"selected=\\"selected\\"":"").">GMT -5:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, -5).")</option>\n<option value=\\"-4\\" ".($setting[''value''] == -4?"selected=\\"selected\\"":"").">GMT -4:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, -4).")</option>\n<option value=\\"-3.5\\" ".($setting[''value''] == -3.5?"selected=\\"selected\\"":"").">GMT -3:30 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, -3.5).")</option>\n<option value=\\"-3\\" ".($setting[''value''] == -3?"selected=\\"selected\\"":"").">GMT -3:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, -3).")</option>\n<option value=\\"-2\\" ".($setting[''value''] == -2?"selected=\\"selected\\"":"").">GMT -2:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, -2).")</option>\n<option value=\\"-1\\" ".($setting[''value''] == -1?"selected=\\"selected\\"":"").">GMT -1:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, -1).")</option>\n<option value=\\"0\\" ".($setting[''value''] == 0?"selected=\\"selected\\"":"").">GMT (".my_date($mybb->settings[''timeformat''], TIME_NOW, 0).")</option>\n<option value=\\"+1\\" ".($setting[''value''] == 1?"selected=\\"selected\\"":"").">GMT +1:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, 1).")</option>\n<option value=\\"+2\\" ".($setting[''value''] == 2?"selected=\\"selected\\"":"").">GMT +2:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, 2).")</option>\n<option value=\\"+3\\" ".($setting[''value''] == 3?"selected=\\"selected\\"":"").">GMT +3:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, 3).")</option>\n<option value=\\"+3.5\\" ".($setting[''value''] == 3.5?"selected=\\"selected\\"":"").">GMT +3:30 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, 3.5).")</option>\n<option value=\\"+4\\" ".($setting[''value''] == 4?"selected=\\"selected\\"":"").">GMT +4:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, 4).")</option>\n<option value=\\"+4.5\\" ".($setting[''value''] == 4.5?"selected=\\"selected\\"":"").">GMT +4:30 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, 4.5).")</option>\n<option value=\\"+5\\" ".($setting[''value''] == 5?"selected=\\"selected\\"":"").">GMT +5:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, 5).")</option>\n<option value=\\"+5.5\\" ".($setting[''value''] == 5.5?"selected=\\"selected\\"":"").">GMT +5:30 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, 5.5).")</option>\n<option value=\\"+5.75\\" ".($setting[''value''] == 5.75?"selected=\\"selected\\"":"").">GMT +5:45 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, 5.75).")</option>\n<option value=\\"+6\\" ".($setting[''value''] == 9?"selected=\\"selected\\"":"").">GMT +6:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, 6).")</option>\n<option value=\\"+7\\" ".($setting[''value''] == 7?"selected=\\"selected\\"":"").">GMT +7:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, 7).")</option>\n<option value=\\"+8\\" ".($setting[''value''] == 8?"selected=\\"selected\\"":"").">GMT +8:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, 8).")</option>\n<option value=\\"+9\\" ".($setting[''value''] == 9?"selected=\\"selected\\"":"").">GMT +9:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, 9).")</option>\n<option value=\\"+9.5\\" ".($setting[''value''] == 9.5?"selected=\\"selected\\"":"").">GMT +9:30 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, 9.5).")</option>\n<option value=\\"+10\\" ".($setting[''value''] == 10?"selected=\\"selected\\"":"").">GMT +10:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, 10).")</option>\n<option value=\\"+10.5\\" ".($setting[''value''] == 10.5?"selected=\\"selected\\"":"").">GMT +10:30 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, 10.5).")</option>\n<option value=\\"+11\\" ".($setting[''value''] == 11?"selected=\\"selected\\"":"").">GMT +11:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, 11).")</option>\n<option value=\\"+12\\" ".($setting[''value''] == 12?"selected=\\"selected\\"":"").">GMT +12:00 Hours (".my_date($mybb->settings[''timeformat''], TIME_NOW, 12).")</option>\n</select>', '+10', 4, 4, 0);
INSERT INTO `mybb_settings` VALUES (12, 'dstcorrection', 'Day Light Savings Time', 'If times are an hour out above and your timezone is selected correctly, enable day light savings time correction.', 'yesno', '0', 5, 4, 0);
INSERT INTO `mybb_settings` VALUES (13, 'threadsperpage', 'Threads Per Page', 'The number of threads to display per page on the forum display', 'text', '20', 1, 5, 0);
INSERT INTO `mybb_settings` VALUES (14, 'hottopic', 'Replies For Hot Topic', 'The number of replies that is needed for a topic to be considered ''hot''.', 'text', '20', 2, 5, 0);
INSERT INTO `mybb_settings` VALUES (15, 'hottopicviews', 'Views For Hot Topic', 'The number of views a thread can have before it is considered ''hot''.', 'text', '150', 3, 5, 0);
INSERT INTO `mybb_settings` VALUES (16, 'usertppoptions', 'User Selectable Threads Per Page', 'If you would like to allow users to select how many threads per page are shown in a forum, enter the options they should be able to select separated with commas. If this is left blank they will not be able to choose how many threads are shown per page.', 'text', '10,20,25,30,40,50', 4, 5, 0);
INSERT INTO `mybb_settings` VALUES (17, 'dotfolders', 'Use ''dot'' Icons', 'Do you want to show dots on the thread indicators of threads users have participated in.', 'yesno', '1', 5, 5, 0);
INSERT INTO `mybb_settings` VALUES (18, 'browsingthisforum', 'Users Browsing this Forum', 'Here you can turn off the ''users browsing this forum'' feature.', 'onoff', '1', 6, 5, 0);
INSERT INTO `mybb_settings` VALUES (19, 'announcementlimit', 'Announcements Limit', 'The number of forum announcements to  show in the thread listing on the forum display pages. Set to 0 to disable announcements altogether.', 'text', '2', 7, 5, 0);
INSERT INTO `mybb_settings` VALUES (20, 'showdescriptions', 'Show Forum Descriptions?', 'This option will allow you to turn off showing the descriptions for forums.', 'yesno', '1', 1, 6, 0);
INSERT INTO `mybb_settings` VALUES (21, 'subforumsindex', 'Subforums to show on Index listing', 'The number of subforums that you wish to show inside forums on the index and forumdisplay pages. Set to 0 to not show the subforum list', 'text', '2', 2, 6, 0);
INSERT INTO `mybb_settings` VALUES (22, 'subforumsstatusicons', 'Show Subforum Status Icons?', 'Show icons indicating whether or not a subforum contains new posts or not?  This won''t have any effect unless you enabled subforums display on the index.', 'yesno', '1', 3, 6, 0);
INSERT INTO `mybb_settings` VALUES (23, 'hideprivateforums', 'Hide Private Forums?', 'You can hide private forums by turning this option on. This option also hides forums on the forum jump and all subforums.', 'yesno', '1', 4, 6, 0);
INSERT INTO `mybb_settings` VALUES (24, 'modlist', 'Forums'' Moderator Listing', 'Here you can turn on or off the listing of moderators for each forum on index.php and forumdisplay.php', 'onoff', '1', 5, 6, 0);
INSERT INTO `mybb_settings` VALUES (25, 'showbirthdays', 'Show Today''s Birthdays?', 'Do you want to show today''s birthdays on the forum homepage?', 'yesno', '1', 6, 6, 0);
INSERT INTO `mybb_settings` VALUES (26, 'showwol', 'Show Who''s Online?', 'Display the currently active users on the forum home page.', 'yesno', '1', 7, 6, 0);
INSERT INTO `mybb_settings` VALUES (27, 'showindexstats', 'Show Small Stats Section', 'Do you want to show the total number of threads, posts, members, and the last member on the forum home?', 'yesno', '1', 8, 6, 0);
INSERT INTO `mybb_settings` VALUES (28, 'showforumviewing', 'Show x viewing forum', 'Displays the currently active users viewing each forum.', 'yesno', '0', 9, 6, 0);
INSERT INTO `mybb_settings` VALUES (29, 'bbname', 'Board Name', 'The name of your message boards. We recommend that it is not over 75 characters.', 'text', 'Triburile - Forum', 1, 7, 0);
INSERT INTO `mybb_settings` VALUES (30, 'bburl', 'Board URL', 'The url to your forums.<br />Include the http://. Do NOT include a trailing slash.', 'text', 'http://triburile-lan.idle.ro/forum', 2, 7, 0);
INSERT INTO `mybb_settings` VALUES (31, 'homename', 'Homepage Name', 'The name of your homepage. This will appear in the footer with a link to it.', 'text', 'Img-Upload', 3, 7, 0);
INSERT INTO `mybb_settings` VALUES (32, 'homeurl', 'Homepage URL', 'The full URL of your homepage. This will be linked to in the footer along with its name.', 'text', 'http://img-upload.hi2.ro', 4, 7, 0);
INSERT INTO `mybb_settings` VALUES (33, 'adminemail', 'Admin Email', 'The administrator''s email address. This will be used for outgoing emails sent via the forums.', 'text', 'admin@localhost', 5, 7, 0);
INSERT INTO `mybb_settings` VALUES (34, 'returnemail', 'Return Email', 'The email address for incoming replies to outgoing emails sent via the forums and is useful for no-reply accounts. Leave blank to use the admin email address instead.', 'text', '', 6, 7, 0);
INSERT INTO `mybb_settings` VALUES (35, 'contactlink', 'Contact Us Link', 'This will be used for the Contact Us link on the bottom of all the forum pages. Can either be an email address (using mailto:email@website.com) or a hyperlink.', 'text', 'mailto:admin@localhost', 7, 7, 0);
INSERT INTO `mybb_settings` VALUES (36, 'bblanguage', 'Default Language', 'The default language that MyBB should use for guests and for users without a selected language in their user control panel.', 'language', 'english', 8, 7, 0);
INSERT INTO `mybb_settings` VALUES (37, 'cookiedomain', 'Cookie Domain', 'The domain which cookies should be set to. This can remain blank. It should also start with a . so it covers all subdomains.', 'text', '.triburile-lan.idle.ro', 9, 7, 0);
INSERT INTO `mybb_settings` VALUES (38, 'cookiepath', 'Cookie Path', 'The path which cookies are set to, we recommend setting this to the full directory path to your forums with a trailing slash.', 'text', '/forum/', 10, 7, 0);
INSERT INTO `mybb_settings` VALUES (39, 'cookieprefix', 'Cookie Prefix', 'A prefix to append to all cookies set by MyBB. This is useful if you wish to install multiple copies of MyBB on the one domain or have other software installed which conflicts with the names of the cookies in MyBB. If not specified, no prefix will be used.', 'text', '', 10, 7, 0);
INSERT INTO `mybb_settings` VALUES (40, 'showvernum', 'Show Version Numbers', 'Allows you to turn off the public display of version numbers in MyBB.', 'onoff', '0', 11, 7, 0);
INSERT INTO `mybb_settings` VALUES (41, 'captchaimage', 'CAPTCHA Images for Registration & Posting', 'If yes, and GD is installed, an image will be shown during registration and posting where users are required to enter the text contained within the image to continue. This helps prevent automated registrations and postings.', 'onoff', '1', 12, 7, 0);
INSERT INTO `mybb_settings` VALUES (42, 'reportmethod', 'Reported Posts Medium', 'Please select from the list how you want reported posts to be dealt with. Storing them in the database is probably the better of the options listed.', 'radio\ndb=Stored in the Database\npms=Sent as Private Messages\nemail=Sent via Email', 'db', 13, 7, 0);
INSERT INTO `mybb_settings` VALUES (43, 'statslimit', 'Stats Limit', 'The number of threads to show on the stats page for most replies and most views.', 'text', '15', 14, 7, 0);
INSERT INTO `mybb_settings` VALUES (44, 'decpoint', 'Decimal Point', 'The decimal point you use in your region.', 'text', '.', 15, 7, 0);
INSERT INTO `mybb_settings` VALUES (45, 'thousandssep', 'Thousands Numeric Separator', 'The punctuation you want to use .  (for example, the setting '','' with the number 1200 will give you a number such as 1,200)', 'text', ',', 16, 7, 0);
INSERT INTO `mybb_settings` VALUES (46, 'showlanguageselect', 'Show Language Selector in Footer', 'Set to no if you do not want to show the language selection area in the footer of all pages in the board.', 'yesno', '1', 17, 7, 0);
INSERT INTO `mybb_settings` VALUES (47, 'maxmultipagelinks', 'Maximum Page Links in Pagination', 'Here you can set the number of next and previous page links to show in the pagination for threads or forums with more than one page of results.', 'text', '5', 18, 7, 0);
INSERT INTO `mybb_settings` VALUES (48, 'mailingaddress', 'Mailing Address', 'If you have a mailing address, enter it here. This is shown on the COPPA compliance form.', 'textarea', '', 19, 7, 0);
INSERT INTO `mybb_settings` VALUES (49, 'faxno', 'Contact Fax No', 'If you have a fax number, enter it here. This is shown on the COPPA compliance form.', 'text', '', 20, 7, 0);
INSERT INTO `mybb_settings` VALUES (50, 'mail_handler', 'Mail handler', 'The medium through which MyBB will send outgoing emails.', 'select\nmail=PHP mail\nsmtp=SMTP mail', 'mail', 1, 8, 0);
INSERT INTO `mybb_settings` VALUES (51, 'smtp_host', 'SMTP hostname', 'The hostname of the SMTP server through which mail should be sent.<br />Only required if SMTP Mail is selected as the Mail Handler.', 'text', '', 2, 8, 0);
INSERT INTO `mybb_settings` VALUES (52, 'smtp_port', 'SMTP port', 'The port number of the SMTP server through which mail should be sent.<br />Only required if SMTP Mail is selected as the Mail Handler.', 'text', '', 3, 8, 0);
INSERT INTO `mybb_settings` VALUES (53, 'smtp_user', 'SMTP username', 'The username used to authenticate with the SMTP server.<br />Only required if SMTP Mail is selected as the Mail Handler, and the SMTP server requires authentication.', 'text', '', 4, 8, 0);
INSERT INTO `mybb_settings` VALUES (54, 'smtp_pass', 'SMTP password', 'The corresponding password used to authenticate with the SMTP server.<br />Only required if SMTP Mail is selected as the Mail Handler, and the SMTP server requires authentication.', 'passwordbox', '', 5, 8, 0);
INSERT INTO `mybb_settings` VALUES (55, 'secure_smtp', 'SMTP Encryption Mode', 'Select the encryption required to communicate with the SMTP server.<br />Only required if SMTP Mail is selected as the Mail Handler.', 'select\n0=No encryption\n1=SSL encryption\n2=TLS encryption', '0', 6, 8, 0);
INSERT INTO `mybb_settings` VALUES (56, 'mail_parameters', 'Additional Parameters for PHP''s mail()', 'This setting allows you to set additional parameters for the PHP mail() function. Only used when ''PHP mail'' is selected as Mail Handler. <a href="http://php.net/function.mail" target="_blank">More information</a>', 'text', '', 7, 8, 0);
INSERT INTO `mybb_settings` VALUES (57, 'mail_logging', 'Mail Logging', 'This setting allows you to set how to log outgoing emails sent via the ''Send Thread to a Friend'' feature. In some countries it is illegal to log all content.', 'select\n0=Disable email logging\n1=Log emails without content\n2=Log everything', '2', 8, 8, 0);
INSERT INTO `mybb_settings` VALUES (58, 'disableregs', 'Disable Registrations', 'Allows you to turn off the capability for users to register with one click.', 'yesno', '0', 1, 9, 0);
INSERT INTO `mybb_settings` VALUES (59, 'regtype', 'Registration Method', 'Please select the method of registration to use when users register.', 'select\ninstant=Instant Activation\nverify=Send Email Verification\nrandompass=Send Random Password\nadmin=Administrator Activation', 'verify', 2, 9, 0);
INSERT INTO `mybb_settings` VALUES (60, 'minnamelength', 'Minimum Username Length', 'The minimum number of characters a username can be when a user registers.', 'text', '3', 3, 9, 0);
INSERT INTO `mybb_settings` VALUES (61, 'maxnamelength', 'Maximum Username Length', 'The maximum number of characters a username can be when a user registers.', 'text', '30', 4, 9, 0);
INSERT INTO `mybb_settings` VALUES (62, 'minpasswordlength', 'Minimum Password Length', 'The minimum number of characters a password should contain.', 'text', '6', 5, 9, 0);
INSERT INTO `mybb_settings` VALUES (63, 'maxpasswordlength', 'Maximum Password Length', 'The maximum number of characters a password should contain.', 'text', '30', 6, 9, 0);
INSERT INTO `mybb_settings` VALUES (64, 'customtitlemaxlength', 'Custom User Title Maximum Length', 'Maximum length a user can enter for the custom user title.', 'text', '40', 7, 9, 0);
INSERT INTO `mybb_settings` VALUES (65, 'betweenregstime', 'Time Between Registrations', 'The amount of time (in hours) to disallow registrations for users who have already registered an account under the same ip address.', 'text', '24', 8, 9, 0);
INSERT INTO `mybb_settings` VALUES (66, 'allowmultipleemails', 'Allow emails to be registered multiple times?', 'Select yes if you wish to allow users to sign up with the same email more than once otherwise select no.', 'yesno', '0', 9, 9, 0);
INSERT INTO `mybb_settings` VALUES (67, 'maxregsbetweentime', 'Maximum Registrations Per IP Address', 'This option allows you to set the maximum amount of times a certain user can register within the timeframe specified above.', 'text', '2', 10, 9, 0);
INSERT INTO `mybb_settings` VALUES (68, 'failedlogincount', 'Number of times to allow failed logins', 'The number of times to allow someone to attempt to login. 0 to disable', 'text', '3', 11, 9, 0);
INSERT INTO `mybb_settings` VALUES (69, 'failedlogintime', 'Time between failed logins', 'The amount of time (in minutes) before someone can try to login again, after they have failed to login the first time. Used if value above is not 0.', 'text', '15', 12, 9, 0);
INSERT INTO `mybb_settings` VALUES (70, 'failedlogintext', 'Display number of failed logins', 'Do you wish to display a line of text telling the user how many more login attempts they have?', 'yesno', '1', 13, 9, 0);
INSERT INTO `mybb_settings` VALUES (71, 'usereferrals', 'Use Referrals System', 'Do you want to use the user referrals system on these forums?', 'yesno', '1', 14, 9, 0);
INSERT INTO `mybb_settings` VALUES (72, 'sigmycode', 'Allow MyCode in Signatures', 'Do you want to allow MyCode to be used in users'' signatures?', 'yesno', '1', 15, 9, 0);
INSERT INTO `mybb_settings` VALUES (73, 'maxsigimages', 'Maximum Number of Images per Signature', 'Enter the maximum number of images (including smilies) a user can put in their signature. Set to 0 to disable images in signatures altogether.', 'text', '2', 16, 9, 0);
INSERT INTO `mybb_settings` VALUES (74, 'sigsmilies', 'Allow Smilies in Signatures', 'Do you want to allow smilies to be used in users'' signatures?', 'yesno', '1', 17, 9, 0);
INSERT INTO `mybb_settings` VALUES (75, 'sightml', 'Allow HTML in Signatures', 'Do you want to allow HTML to be used in users'' signatures?', 'yesno', '0', 18, 9, 0);
INSERT INTO `mybb_settings` VALUES (76, 'sigimgcode', 'Allow [img] Code in Signatures', 'Do you want to allow [img] code to be used in users'' signatures?', 'yesno', '1', 19, 9, 0);
INSERT INTO `mybb_settings` VALUES (77, 'siglength', 'Length limit in Signatures', 'The maximum number of characters a user can place in a signature.', 'text', '255', 20, 9, 0);
INSERT INTO `mybb_settings` VALUES (78, 'sigcountmycode', 'MyCode affects signature length', 'Do you want MyCode to be counted as part of the limit when users use MyCode in their signature?', 'yesno', '1', 21, 9, 0);
INSERT INTO `mybb_settings` VALUES (79, 'maxavatardims', 'Maximum Avatar Dimensions', 'The maximum dimensions that an avatar can be, in the format of width<b>x</b>height. If this is left blank then there will be no dimension restriction.', 'text', '100x100', 22, 9, 0);
INSERT INTO `mybb_settings` VALUES (80, 'avatarsize', 'Max Uploaded Avatar Size', 'Maximum file size (in kilobytes) of uploaded avatars.', 'text', '10', 23, 9, 0);
INSERT INTO `mybb_settings` VALUES (81, 'avatarresizing', 'Avatar Resizing Mode', 'If you wish to automatically resize all large avatars, provide users the option of resizing their avatar, or not resize avatars at all you can change this setting.', 'select\nauto=Automatically resize large avatars\nuser=Give users the choice of resizing large avatars\ndisabled=Disable this feature', 'auto', 24, 9, 0);
INSERT INTO `mybb_settings` VALUES (82, 'avatardir', 'Avatar Directory', 'The directory where your avatars are stored. These are used in the avatar list in the User CP.', 'text', 'images/avatars', 25, 9, 0);
INSERT INTO `mybb_settings` VALUES (83, 'avataruploadpath', 'Avatar Upload Path', 'This is the path where custom avatars will be uploaded to. This directory <b>must be chmod 777</b> (writable) for uploads to work.', 'text', './uploads/avatars', 26, 9, 0);
INSERT INTO `mybb_settings` VALUES (84, 'emailkeep', 'Users Keep Email', 'If a current user has an email already registered in your banned list, should he be allowed to keep it.', 'yesno', '0', 27, 9, 0);
INSERT INTO `mybb_settings` VALUES (85, 'coppa', 'COPPA Compliance', 'If you wish to enable <a href="http://www.coppa.org/comply.htm">COPPA</a> support on your forums, please select the registration allowance below.', 'select\nenabled=Enabled\ndeny=Deny users under the age of 13\ndisabled=Disable this feature', 'disabled', 28, 9, 0);
INSERT INTO `mybb_settings` VALUES (86, 'allowaway', 'Allow Away Statuses?', 'Should users be allowed to set their status to ''Away'' with a custom reason & return date?', 'yesno', '1', 29, 9, 0);
INSERT INTO `mybb_settings` VALUES (87, 'enablememberlist', 'Enable Member List Functionality', 'If you wish to disable the member list on your board, set this option to no.', 'yesno', '1', 1, 10, 0);
INSERT INTO `mybb_settings` VALUES (88, 'membersperpage', 'Members Per Page', 'The number of members to show per page on the member list.', 'text', '20', 2, 10, 0);
INSERT INTO `mybb_settings` VALUES (89, 'default_memberlist_sortby', 'Default Sort Field', 'Select the field that you want members to be sorted by default.', 'select\nregdate=Registration Date\npostnum=Post Count\nusername=Username\nlastvisit=Last Visit', 'regdate', 3, 10, 0);
INSERT INTO `mybb_settings` VALUES (90, 'default_memberlist_order', 'Default Sort Order', 'Select the order that you want members to be sorted by default.<br />Ascending: A-Z / beginning-end<br />Descending: Z-A / end-beginning', 'select\nASC=Ascending\nDESC=Descending', 'ASC', 4, 10, 0);
INSERT INTO `mybb_settings` VALUES (91, 'memberlistmaxavatarsize', 'Maximum Display Avatar Dimensions', 'The maximum dimensions for avatars when being displayed in the member list. If an avatar is too large, it will automatically be scaled down.', 'text', '70x70', 5, 10, 0);
INSERT INTO `mybb_settings` VALUES (92, 'boardclosed', 'Board Closed', 'If you need to close your forums to make some changes or perform an upgrade, this is the global switch. Viewers will not be able to view your forums, however, they will see a message with the reason you specify below.<br />\n<br />\n<b>Administrators will still be able to view the forums.</b>', 'yesno', '0', 1, 11, 0);
INSERT INTO `mybb_settings` VALUES (93, 'boardclosed_reason', 'Board Closed Reason', 'If your forum is closed, you can set a message here that your visitors will be able to see when they visit your forums.', 'textarea', 'These forums are currently closed for maintenance. Please check back later.', 2, 11, 0);
INSERT INTO `mybb_settings` VALUES (94, 'portal_announcementsfid', 'Forum ID to pull announcements from', 'Please enter the forum ids (fid) of the forum(s) you wish to pull the announcements from.  Separate them with a comma (,).', 'text', '2', 1, 12, 0);
INSERT INTO `mybb_settings` VALUES (95, 'portal_numannouncements', 'Number of announcements to show', 'Please enter the number of announcements to show on the main page.', 'text', '10', 2, 12, 0);
INSERT INTO `mybb_settings` VALUES (96, 'portal_showwelcome', 'Show the Welcome box', 'Do you want to show the welcome box to visitors / users.', 'yesno', '1', 3, 12, 0);
INSERT INTO `mybb_settings` VALUES (97, 'portal_showpms', 'Show the number of PMs to users', 'Do you want to show the number of private messages the current user has in their pm system.', 'yesno', '1', 4, 12, 0);
INSERT INTO `mybb_settings` VALUES (98, 'portal_showstats', 'Show forum statistics', 'Do you want to show the total number of posts, threads, members and the last registered member on the portal page?', 'yesno', '1', 5, 12, 0);
INSERT INTO `mybb_settings` VALUES (99, 'portal_showwol', 'Show Who''s Online', 'Do you want to show the ''Who''s online'' information to users when they visit the portal page?', 'yesno', '1', 6, 12, 0);
INSERT INTO `mybb_settings` VALUES (100, 'portal_showsearch', 'Show Search Box', 'Do you want to show the search box, allowing users to quickly search the forums on the portal?', 'yesno', '1', 7, 12, 0);
INSERT INTO `mybb_settings` VALUES (101, 'portal_showdiscussions', 'Show Latest Discussions', 'Do you wish to show the current forum discussions on the portal page?', 'yesno', '1', 8, 12, 0);
INSERT INTO `mybb_settings` VALUES (102, 'portal_showdiscussionsnum', 'Number of latest discussions to show', 'Please enter the number of current forum discussions to show on the portal page.', 'text', '10', 9, 12, 0);
INSERT INTO `mybb_settings` VALUES (103, 'minmessagelength', 'Minimum Message Length', 'The minimum number of characters to post.', 'text', '5', 1, 13, 0);
INSERT INTO `mybb_settings` VALUES (104, 'maxmessagelength', 'Maximum Message Length', 'The maximum number of characters to allow in a message. A setting of 0 allows an unlimited length.', 'text', '0', 2, 13, 0);
INSERT INTO `mybb_settings` VALUES (105, 'maxposts', 'Maximum Posts Per Day', 'This is the total number of posts allowed per user per day.  0 for unlimited.', 'text', '0', 3, 13, 0);
INSERT INTO `mybb_settings` VALUES (106, 'postfloodcheck', 'Post Flood Checking', 'Set to on if you want to enable flood checking for posts. Specify the time between posts below.', 'onoff', '1', 4, 13, 0);
INSERT INTO `mybb_settings` VALUES (107, 'postfloodsecs', 'Post Flood Time', 'Set the time (in seconds) users have to wait between posting, to be in effect; the option above must be on.', 'text', '60', 5, 13, 0);
INSERT INTO `mybb_settings` VALUES (108, 'postmergemins', 'Post Merge Time', 'With this enabled, posts posted within x minutes by the same author right after each other, will be merged. Set the time limit (in minutes) to merge posts. Set to 0 or leave blank to disable this feature. Default: 60', 'text', '60', 6, 13, 0);
INSERT INTO `mybb_settings` VALUES (109, 'postmergefignore', 'Merge Forums to Ignore', 'Forums, separated by a comma, to exclude from the auto merge feature. Leave blank to disable.', 'text', '', 7, 13, 0);
INSERT INTO `mybb_settings` VALUES (110, 'postmergeuignore', 'Merge User Groups to Ignore', 'Usergroups, separated by a comma, to exclude from the merge feature. Default: 4 (Administrator). Leave blank to disable.', 'text', '4', 8, 13, 0);
INSERT INTO `mybb_settings` VALUES (111, 'postmergesep', 'Merge Separator', 'The Separator to be used when merging two message Default: ''[hr]''', 'text', '[hr]', 9, 13, 0);
INSERT INTO `mybb_settings` VALUES (112, 'logip', 'Log Posting IP Addresses', 'Do you wish to log ip addresses of users who post, and who you want to show ip addresses to.', 'radio\nno=Do not log IP\nhide=Show to Admins & Mods\nshow=Show to all Users', 'hide', 10, 13, 0);
INSERT INTO `mybb_settings` VALUES (113, 'showeditedby', 'Show ''edited by'' Messages', 'Once a post is edited by a regular user, do you want to show the edited by message?', 'yesno', '1', 11, 13, 0);
INSERT INTO `mybb_settings` VALUES (114, 'showeditedbyadmin', 'Show ''edited by'' Message for Forum Staff', 'Do you want to show edited by messages for forum staff when they edit their posts?', 'yesno', '1', 12, 13, 0);
INSERT INTO `mybb_settings` VALUES (115, 'maxpostimages', 'Maximum Images per Post', 'Enter the maximum number of images (including smilies) a user can put in their post. Set to 0 to disable this.', 'text', '10', 13, 13, 0);
INSERT INTO `mybb_settings` VALUES (116, 'subscribeexcerpt', 'Amount of Characters for Subscription Previews', 'How many characters of the post do you want to send with the email notification of a new reply.', 'text', '100', 14, 13, 0);
INSERT INTO `mybb_settings` VALUES (117, 'maxattachments', 'Maximum Attachments Per Post', 'The maximum number of attachments a user is allowed to upload per post.', 'text', '5', 15, 13, 0);
INSERT INTO `mybb_settings` VALUES (118, 'attachthumbnails', 'Show Attached Thumbnails in Posts', 'How do you want images to be shown in posts?', 'radio\nyes=Thumbnail\nno=Full Size Image\ndownload=As Download Link', 'yes', 16, 13, 0);
INSERT INTO `mybb_settings` VALUES (119, 'attachthumbh', 'Attached Thumbnail Maximum Height', 'Enter the height that attached thumbnails should be generated at.', 'text', '96', 17, 13, 0);
INSERT INTO `mybb_settings` VALUES (120, 'attachthumbw', 'Attached Thumbnail Maximum Width', 'Enter the width that attached thumbnails should be generated at.', 'text', '96', 18, 13, 0);
INSERT INTO `mybb_settings` VALUES (121, 'edittimelimit', 'Edit Time Limit', 'The number of minutes until regular users cannot edit their own posts (if they have the permission). Enter 0 (zero) for no limit.', 'text', '0', 19, 13, 0);
INSERT INTO `mybb_settings` VALUES (122, 'wordwrap', 'Number of Characters before Word Wrapping Occurs', 'The maximum number of characters that can be present in a word before a space is automatically inserted. (helps preservation of the forum layout). Set to 0 to disable.', 'text', '80', 20, 13, 0);
INSERT INTO `mybb_settings` VALUES (123, 'polloptionlimit', 'Maximum Poll Option Length', 'The maximum length that each poll option can be. (Set to 0 to disable).', 'text', '250', 21, 13, 0);
INSERT INTO `mybb_settings` VALUES (124, 'maxpolloptions', 'Maximum Number of Poll Options', 'The maximum number of options for polls that users can post.', 'text', '10', 22, 13, 0);
INSERT INTO `mybb_settings` VALUES (125, 'threadreview', 'Show Thread Review', 'Show recent posts when creating a new reply?', 'yesno', '1', 22, 13, 0);
INSERT INTO `mybb_settings` VALUES (126, 'enablepms', 'Enable Private Messaging Functionality', 'If you wish to disable the private messaging system on your board, set this option to no.', 'yesno', '1', 1, 14, 0);
INSERT INTO `mybb_settings` VALUES (127, 'pmsallowhtml', 'Allow HTML', 'Selecting yes will allow HTML to be used in private messages.', 'yesno', '0', 2, 14, 0);
INSERT INTO `mybb_settings` VALUES (128, 'pmsallowmycode', 'Allow MyCode', 'Selecting yes will allow MyCode to be used in private messages.', 'yesno', '1', 3, 14, 0);
INSERT INTO `mybb_settings` VALUES (129, 'pmsallowsmilies', 'Allow Smilies', 'Selecting yes will allow Smilies to be used in private messages.', 'yesno', '1', 4, 14, 0);
INSERT INTO `mybb_settings` VALUES (130, 'pmsallowimgcode', 'Allow [img] Code', 'Selecting yes will allow [img] Code to be used in private messages.', 'yesno', '1', 5, 14, 0);
INSERT INTO `mybb_settings` VALUES (131, 'enablereputation', 'Enable Reputation Functionality', 'If you wish to disable the reputation system on your board, set this option to no.', 'yesno', '1', 1, 15, 0);
INSERT INTO `mybb_settings` VALUES (132, 'repsperpage', 'Reputation Comments Per Page', 'Here you can enter the number of reputation comments to show per page on the reputation system', 'text', '15', 2, 15, 0);
INSERT INTO `mybb_settings` VALUES (133, 'searchtype', 'Search Type', 'Please select the type of search system you wish to use. You can either chose between "Standard", or "Full Text" (depending on your database). Fulltext searching is more powerful than the standard MyBB searching and quicker too.', 'php\n<select name=\\"upsetting[{$setting[''name'']}]\\"><option value=\\"standard\\">".($lang->setting_searchtype_standard?$lang->setting_searchtype_standard:"Standard")."</option>".($db->supports_fulltext("threads") && $db->supports_fulltext_boolean("posts")?"<option value=\\"fulltext\\"".($setting[''value'']=="fulltext"?" selected=\\"selected\\"":"").">".($lang->setting_searchtype_fulltext?$lang->setting_searchtype_fulltext:"Full Text")."</option>":"")."</select>', 'standard', 1, 16, 0);
INSERT INTO `mybb_settings` VALUES (134, 'searchfloodtime', 'Search Flood Time (seconds)', 'Enter the time in seconds for the minimum allowed interval for searching. This prevents users from overloading your server by constantly performing searches. Set to 0 to disable.', 'text', '30', 2, 16, 0);
INSERT INTO `mybb_settings` VALUES (135, 'minsearchword', 'Minimum Search Word Length', 'Enter the minimum number of characters an individual word in a search query can be. Set to 0 to disable (and accept the hard limit default of 3 for standard searching and 4 for MySQL fulltext searching). If you use MySQL fulltext searching and set this lower than the MySQL setting - MySQL will override it.', 'text', '0', 3, 16, 0);
INSERT INTO `mybb_settings` VALUES (136, 'searchhardlimit', 'Hard Limit for Maximum Search Results', 'Enter the maximum amount of results to be processed. Set to 0 to disable. On larger boards (more than 1 million posts) this should be set to no more than 1000.', 'text', '0', 4, 16, 0);
INSERT INTO `mybb_settings` VALUES (137, 'seourls', 'Enable search engine friendly URLs?', 'Search engine friendly URLs change the MyBB links to shorter URLs which search engines prefer and are easier to type. showthread.php?tid=1 becomes thread-1.html. <strong>Once this setting is enabled you need to make sure you have the MyBB .htaccess in your MyBB root directory (or the equivilent for your web server). Automatic detection may not work on all servers.</strong> Please see <a href="http://wiki.mybboard.net/index.php/SEF_URLS">The MyBB wiki</a> for assistance.', 'select\nauto=Automatic Detection\nyes=Enabled\nno=Disabled', 'auto', 1, 17, 0);
INSERT INTO `mybb_settings` VALUES (138, 'gzipoutput', 'Use GZip Page Compression?', 'Do you want to compress pages in GZip format when they are sent to the browser? This means quicker downloads for your visitors, and less traffic usage for you.', 'yesno', '0', 2, 17, 0);
INSERT INTO `mybb_settings` VALUES (139, 'gziplevel', 'GZip Page Compression Level', 'Set the level for GZip Page Compression from 0-9.  (0=no compression, 9=maximum compression).  This will only take effect if GZip Page Compression is enabled above and if your PHP version is newer than 4.2.  If you use an older version of PHP, the default compression level of the zlib library will be used instead.', 'text', '4', 3, 17, 0);
INSERT INTO `mybb_settings` VALUES (140, 'standardheaders', 'Send Standard Headers', 'With some web servers, this option can cause problems; with others, it is needed. ', 'yesno', '0', 4, 17, 0);
INSERT INTO `mybb_settings` VALUES (141, 'nocacheheaders', 'Send No Cache Headers', 'With this option you can prevent caching of the page by the browser.', 'yesno', '0', 5, 17, 0);
INSERT INTO `mybb_settings` VALUES (142, 'redirects', 'Friendly Redirection Pages', 'This will enable friendly redirection pages instead of bumping the user directly to the page.', 'onoff', '1', 6, 17, 0);
INSERT INTO `mybb_settings` VALUES (143, 'load', '*NIX Load Limiting', 'Limit the maximum server load before MyBB rejects people.  0 for none.  Recommended limit is 5.0.', 'text', '0', 7, 17, 0);
INSERT INTO `mybb_settings` VALUES (144, 'tplhtmlcomments', 'Output template start/end comments?', 'This will enable or disable the output of template start/end comments in the HTML.', 'yesno', '1', 8, 17, 0);
INSERT INTO `mybb_settings` VALUES (145, 'use_xmlhttprequest', 'Enable XMLHttp request features?', 'This will enable or disable the XMLHttp request features.', 'yesno', '1', 9, 17, 0);
INSERT INTO `mybb_settings` VALUES (146, 'useshutdownfunc', 'Use PHP''s Shutdown Functionality', 'This setting for the most part is best left at the default which is detected upon installation. If thread indicators are not updating as well as other meta information, set this setting to ''No''', 'yesno', '0', 10, 17, 0);
INSERT INTO `mybb_settings` VALUES (147, 'extraadmininfo', 'Advanced Stats / Debug information', 'Shows Server load, parse time, generation time, Gzip compression, etc on the bottom of all pages in the root folder. Please note that only administrators see this information.', 'yesno', '1', 12, 17, 0);
INSERT INTO `mybb_settings` VALUES (148, 'uploadspath', 'Uploads Path', 'The path used for all board uploads. It <b>must be chmod 777</b> (on Unix servers).', 'text', './uploads', 13, 17, 0);
INSERT INTO `mybb_settings` VALUES (149, 'useerrorhandling', 'Use Error Handling', 'If you do not wish to use the integrated error handling for MyBB, you may turn this option off. However, it is reccommended that it stay on', 'onoff', '1', 14, 17, 0);
INSERT INTO `mybb_settings` VALUES (150, 'errorlogmedium', 'Error Logging Medium', 'The type of the error handling to use.', 'select\nnone=Neither\nlog=Log errors\nemail=Email errors\nboth=Log and email errors\n', 'none', 15, 17, 0);
INSERT INTO `mybb_settings` VALUES (151, 'errortypemedium', 'Error Type Medium', 'The type of errors to show.', 'select\nwarning=Warnings\nerror=Errors\nboth=Warnings and Errors\n', 'both', 16, 17, 0);
INSERT INTO `mybb_settings` VALUES (152, 'errorloglocation', 'Error Logging Location', 'The location of the log to send errors to, if specified.', 'text', './error.log', 17, 17, 0);
INSERT INTO `mybb_settings` VALUES (153, 'enableforumjump', 'Enable Forum Jump Menu?', 'The forum jump menu is shown on the forum and thread view pages. It can add significant load to your forums if you have a large amount of forums. Set to ''No'' to disable it.', 'yesno', '1', 18, 17, 0);
INSERT INTO `mybb_settings` VALUES (154, 'postlayout', 'Post Layout', 'Allows you to switch between the classic and new horizontal layout modes. Classic mode shows the author information to the left of the post, horizontal shows the author information above the post.', 'radio\nhorizontal=Display posts using the horizontal post layout\nclassic=Display posts using the classic layout', 'horizontal', 1, 18, 0);
INSERT INTO `mybb_settings` VALUES (155, 'postsperpage', 'Posts Per Page:', 'The number of posts to display per page. We recommend its not higher than 20 for people with slower connections.', 'text', '10', 2, 18, 0);
INSERT INTO `mybb_settings` VALUES (156, 'userpppoptions', 'User Selectable Posts Per Page', 'If you would like to allow users to select how many posts are shown per page in a thread, enter the options they should be able to select separated with commas. If this is left blank they will not be able to choose how many posts are shown per page.', 'text', '5,10,20,25,30,40,50', 3, 18, 0);
INSERT INTO `mybb_settings` VALUES (157, 'postmaxavatarsize', 'Maximum Avatar Dimensions in Posts', 'The maximum dimensions for avatars when being displayed in a post. If an avatar is too large, it will automatically be scaled down.', 'text', '70x70', 4, 18, 0);
INSERT INTO `mybb_settings` VALUES (158, 'threadreadcut', 'Read Threads in Database (Days)', 'The number of days that you wish to keep thread read information in the database. For large boards, we do not recommend a high number as the board will become slower. Set to 0 to disable.', 'text', '7', 5, 18, 0);
INSERT INTO `mybb_settings` VALUES (159, 'threadusenetstyle', 'Usenet Style Thread View', 'Selecting yes will cause posts to look similar to how posts look in USENET. No will cause posts to look the modern way.', 'yesno', '0', 6, 18, 0);
INSERT INTO `mybb_settings` VALUES (160, 'quickreply', 'Show Quick Reply Form', 'Allows you to set whether or not the quick reply form will be shown at the bottom of threads.', 'onoff', '1', 7, 18, 0);
INSERT INTO `mybb_settings` VALUES (161, 'multiquote', 'Show Multi-quote Buttons', 'The multi-quote button allows users to select a series of posts then click Reply and have those posts quoted in their message.', 'onoff', '1', 8, 18, 0);
INSERT INTO `mybb_settings` VALUES (162, 'showsimilarthreads', 'Show ''Similar Threads'' Table', 'The Similar Threads table shows threads that are relevant to the thread being read. You can set the relevancy below.', 'yesno', '0', 9, 18, 0);
INSERT INTO `mybb_settings` VALUES (163, 'similarityrating', 'Similar Threads Relevancy Rating', 'This allows you to limit similar threads to ones more relevant (0 being not relevant). This number should not be over 10 and should not be set low (<5) for large forums.', 'text', '1', 10, 18, 0);
INSERT INTO `mybb_settings` VALUES (164, 'similarlimit', 'Similar Threads Limit', 'Here you can change the total amount of similar threads to be shown in the similar threads table. It is recommended that it is not over 15 for 56k users.', 'text', '10', 11, 18, 0);
INSERT INTO `mybb_settings` VALUES (165, 'delayedthreadviews', 'Delayed Thread View Updates', 'If this setting is enabled, the number of thread views for threads will be updated in the background by the task schedule system. If not enabled, thread view counters are incremented instantly.', 'onoff', '0', 12, 18, 0);
INSERT INTO `mybb_settings` VALUES (166, 'enablewarningsystem', 'Enable Warning System?', 'Set to no to completely disable the warning system.', 'yesno', '1', 1, 19, 0);
INSERT INTO `mybb_settings` VALUES (167, 'allowcustomwarnings', 'Allow Custom Warning Types?', 'Allow a custom reason and amount of points to be specified by those with permissions to warn users.', 'yesno', '1', 2, 19, 0);
INSERT INTO `mybb_settings` VALUES (168, 'canviewownwarning', 'Can Users View Own Warnings?', 'Set to yes to allow users to view recent warnings in their User CP and show their warning level to them in their profile.', 'yesno', '1', 3, 19, 0);
INSERT INTO `mybb_settings` VALUES (169, 'maxwarningpoints', 'Maximum Warning Points', 'The maximum warning points that can be given to a user before it is considered a warning level of 100%.', 'text', '10', 4, 19, 0);
INSERT INTO `mybb_settings` VALUES (170, 'wolcutoffmins', 'Cut-off Time (mins)', 'The number of minutes before a user is marked offline. Recommended: 15.', 'text', '15', 1, 20, 0);
INSERT INTO `mybb_settings` VALUES (171, 'refreshwol', 'Refresh Who''s online page Time (mins)', 'The number of minutes before the "Who''s online" page refreshes. 0 is disabled.', 'text', '1', 16, 20, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_smilies`
-- 

CREATE TABLE `mybb_smilies` (
  `sid` smallint(5) unsigned NOT NULL auto_increment,
  `name` varchar(120) NOT NULL default '',
  `find` varchar(120) NOT NULL default '',
  `image` varchar(220) NOT NULL default '',
  `disporder` smallint(5) unsigned NOT NULL default '0',
  `showclickable` int(1) NOT NULL default '0',
  PRIMARY KEY  (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- 
-- Dumping data for table `mybb_smilies`
-- 

INSERT INTO `mybb_smilies` VALUES (1, 'Smile', ':)', 'images/smilies/smile.gif', 1, 1);
INSERT INTO `mybb_smilies` VALUES (2, 'Wink', ';)', 'images/smilies/wink.gif', 2, 1);
INSERT INTO `mybb_smilies` VALUES (3, 'Cool', ':cool:', 'images/smilies/cool.gif', 3, 1);
INSERT INTO `mybb_smilies` VALUES (4, 'Big Grin', ':D', 'images/smilies/biggrin.gif', 4, 1);
INSERT INTO `mybb_smilies` VALUES (5, 'Tongue', ':P', 'images/smilies/tongue.gif', 5, 1);
INSERT INTO `mybb_smilies` VALUES (6, 'Rolleyes', ':rolleyes:', 'images/smilies/rolleyes.gif', 6, 1);
INSERT INTO `mybb_smilies` VALUES (7, 'Shy', ':shy:', 'images/smilies/shy.gif', 7, 1);
INSERT INTO `mybb_smilies` VALUES (8, 'Sad', ':(', 'images/smilies/sad.gif', 8, 1);
INSERT INTO `mybb_smilies` VALUES (9, 'At', ':at:', 'images/smilies/at.gif', 9, 0);
INSERT INTO `mybb_smilies` VALUES (10, 'Angel', ':angel:', 'images/smilies/angel.gif', 0, 1);
INSERT INTO `mybb_smilies` VALUES (11, 'Angry', ':@', 'images/smilies/angry.gif', 0, 1);
INSERT INTO `mybb_smilies` VALUES (12, 'Blush', ':blush:', 'images/smilies/blush.gif', 0, 1);
INSERT INTO `mybb_smilies` VALUES (13, 'Confused', ':s', 'images/smilies/confused.gif', 0, 1);
INSERT INTO `mybb_smilies` VALUES (14, 'Dodgy', ':dodgy:', 'images/smilies/dodgy.gif', 0, 1);
INSERT INTO `mybb_smilies` VALUES (15, 'Exclamation', ':exclamation:', 'images/smilies/exclamation.gif', 0, 1);
INSERT INTO `mybb_smilies` VALUES (16, 'Heart', ':heart:', 'images/smilies/heart.gif', 0, 1);
INSERT INTO `mybb_smilies` VALUES (17, 'Huh', ':huh:', 'images/smilies/huh.gif', 0, 1);
INSERT INTO `mybb_smilies` VALUES (18, 'Idea', ':idea:', 'images/smilies/lightbulb.gif', 0, 1);
INSERT INTO `mybb_smilies` VALUES (19, 'Sleepy', ':sleepy:', 'images/smilies/sleepy.gif', 0, 1);
INSERT INTO `mybb_smilies` VALUES (20, 'Undecided', ':-/', 'images/smilies/undecided.gif', 0, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_spiders`
-- 

CREATE TABLE `mybb_spiders` (
  `sid` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `theme` int(10) unsigned NOT NULL default '0',
  `language` varchar(20) NOT NULL default '',
  `usergroup` int(10) unsigned NOT NULL default '0',
  `useragent` varchar(200) NOT NULL default '',
  `lastvisit` bigint(30) NOT NULL default '0',
  PRIMARY KEY  (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `mybb_spiders`
-- 

INSERT INTO `mybb_spiders` VALUES (1, 'GoogleBot', 0, '', 0, 'google', 0);
INSERT INTO `mybb_spiders` VALUES (2, 'Lycos', 0, '', 0, 'lycos', 0);
INSERT INTO `mybb_spiders` VALUES (3, 'Ask Jeeves', 0, '', 0, 'ask jeeves', 0);
INSERT INTO `mybb_spiders` VALUES (4, 'Hot Bot', 0, '', 0, 'slurp@inktomi', 0);
INSERT INTO `mybb_spiders` VALUES (5, 'What You Seek', 0, '', 0, 'whatuseek', 0);
INSERT INTO `mybb_spiders` VALUES (6, 'Archive.org', 0, '', 0, 'is_archiver', 0);
INSERT INTO `mybb_spiders` VALUES (7, 'Altavista', 0, '', 0, 'scooter', 0);
INSERT INTO `mybb_spiders` VALUES (8, 'Alexa', 0, '', 0, 'ia_archiver', 0);
INSERT INTO `mybb_spiders` VALUES (9, 'MSN Search', 0, '', 0, 'msnbot', 0);
INSERT INTO `mybb_spiders` VALUES (10, 'Yahoo!', 0, '', 0, 'yahoo! slurp', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_stats`
-- 

CREATE TABLE `mybb_stats` (
  `dateline` bigint(30) NOT NULL default '0',
  `numusers` int(10) unsigned NOT NULL default '0',
  `numthreads` int(10) unsigned NOT NULL default '0',
  `numposts` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `mybb_stats`
-- 

INSERT INTO `mybb_stats` VALUES (1292140800, 1, 0, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_tasklog`
-- 

CREATE TABLE `mybb_tasklog` (
  `lid` int(10) unsigned NOT NULL auto_increment,
  `tid` int(10) unsigned NOT NULL default '0',
  `dateline` bigint(30) NOT NULL default '0',
  `data` text NOT NULL,
  PRIMARY KEY  (`lid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `mybb_tasklog`
-- 

INSERT INTO `mybb_tasklog` VALUES (1, 5, 1292188639, 'The promotions task successfully ran.');
INSERT INTO `mybb_tasklog` VALUES (2, 9, 1292424100, 'The mass mail task successfully ran.');
INSERT INTO `mybb_tasklog` VALUES (3, 3, 1292609848, 'The user cleanup task successfully ran.');
INSERT INTO `mybb_tasklog` VALUES (4, 3, 1292609849, 'The user cleanup task successfully ran.');
INSERT INTO `mybb_tasklog` VALUES (5, 1, 1292612364, 'The hourly cleanup task successfully ran.');
INSERT INTO `mybb_tasklog` VALUES (6, 5, 1295129698, 'The promotions task successfully ran.');

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_tasks`
-- 

CREATE TABLE `mybb_tasks` (
  `tid` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(120) NOT NULL default '',
  `description` text NOT NULL,
  `file` varchar(30) NOT NULL default '',
  `minute` varchar(200) NOT NULL default '',
  `hour` varchar(200) NOT NULL default '',
  `day` varchar(100) NOT NULL default '',
  `month` varchar(30) NOT NULL default '',
  `weekday` varchar(15) NOT NULL default '',
  `nextrun` bigint(30) NOT NULL default '0',
  `lastrun` bigint(30) NOT NULL default '0',
  `enabled` int(1) NOT NULL default '1',
  `logging` int(1) NOT NULL default '0',
  `locked` bigint(30) NOT NULL default '0',
  PRIMARY KEY  (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `mybb_tasks`
-- 

INSERT INTO `mybb_tasks` VALUES (1, 'Hourly Cleanup', 'Cleans out old searches, captcha images and expires redirects', 'hourlycleanup', '0', '*', '*', '*', '*', 1292612400, 1292612364, 1, 1, 0);
INSERT INTO `mybb_tasks` VALUES (2, 'Daily Cleanup', 'Cleans out old sessions and read threads', 'dailycleanup', '0', '0', '*', '*', '*', 1292227200, 0, 1, 1, 0);
INSERT INTO `mybb_tasks` VALUES (3, 'Half-hourly User Cleanup', 'Automatically expires bans, warnings and posting suspension and moderation times for users', 'usercleanup', '30,59', '*', '*', '*', '*', 1292610600, 1292609848, 1, 1, 0);
INSERT INTO `mybb_tasks` VALUES (4, 'Weekly Backup', 'Automatically backups your MyBB tables to your backups directory.', 'backupdb', '0', '0', '*', '*', '0', 1292745600, 0, 0, 1, 0);
INSERT INTO `mybb_tasks` VALUES (5, 'Promotion System', 'Automatically runs the promotion system every 20 minutes.', 'promotions', '5,25,45', '*', '*', '*', '*', 1295130300, 1295129698, 1, 1, 0);
INSERT INTO `mybb_tasks` VALUES (6, 'Thread Views', 'Automatically updates thread views every 15 minutes. This task will automatically be enabled or disabled when changing the ''Delayed Thread Views'' setting.', 'threadviews', '10,25,40,55', '*', '*', '*', '*', 1292185500, 0, 0, 1, 0);
INSERT INTO `mybb_tasks` VALUES (7, 'Tables Check', 'Automatically runs a table check and attempts to repair any crashed tables.', 'checktables', '0', '*', '*', '*', '*', 1292187600, 0, 0, 1, 0);
INSERT INTO `mybb_tasks` VALUES (8, 'Log Pruning', 'Automatically cleans up old MyBB log files (administrator, moderator, task, promotion, and mail logs)', 'logcleanup', '21', '5', '*', '*', '*', 1292246460, 0, 1, 1, 0);
INSERT INTO `mybb_tasks` VALUES (9, 'Mass Mail', 'Automatically sends any queued mass mailings every 15 minutes. ', 'massmail', '10,25,40,55', '*', '*', '*', '*', 1292424900, 1292424100, 1, 1, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_templategroups`
-- 

CREATE TABLE `mybb_templategroups` (
  `gid` int(10) unsigned NOT NULL auto_increment,
  `prefix` varchar(50) NOT NULL default '',
  `title` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`gid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

-- 
-- Dumping data for table `mybb_templategroups`
-- 

INSERT INTO `mybb_templategroups` VALUES (1, 'calendar', '<lang:group_calendar>');
INSERT INTO `mybb_templategroups` VALUES (2, 'editpost', '<lang:group_editpost>');
INSERT INTO `mybb_templategroups` VALUES (3, 'forumbit', '<lang:group_forumbit>');
INSERT INTO `mybb_templategroups` VALUES (4, 'forumjump', '<lang:group_forumjump>');
INSERT INTO `mybb_templategroups` VALUES (5, 'forumdisplay', '<lang:group_forumdisplay>');
INSERT INTO `mybb_templategroups` VALUES (6, 'index', '<lang:group_index>');
INSERT INTO `mybb_templategroups` VALUES (7, 'error', '<lang:group_error>');
INSERT INTO `mybb_templategroups` VALUES (8, 'memberlist', '<lang:group_memberlist>');
INSERT INTO `mybb_templategroups` VALUES (9, 'multipage', '<lang:group_multipage>');
INSERT INTO `mybb_templategroups` VALUES (10, 'private', '<lang:group_private>');
INSERT INTO `mybb_templategroups` VALUES (11, 'portal', '<lang:group_portal>');
INSERT INTO `mybb_templategroups` VALUES (12, 'postbit', '<lang:group_postbit>');
INSERT INTO `mybb_templategroups` VALUES (13, 'redirect', '<lang:group_redirect>');
INSERT INTO `mybb_templategroups` VALUES (14, 'showthread', '<lang:group_showthread>');
INSERT INTO `mybb_templategroups` VALUES (15, 'usercp', '<lang:group_usercp>');
INSERT INTO `mybb_templategroups` VALUES (16, 'online', '<lang:group_online>');
INSERT INTO `mybb_templategroups` VALUES (17, 'moderation', '<lang:group_moderation>');
INSERT INTO `mybb_templategroups` VALUES (18, 'nav', '<lang:group_nav>');
INSERT INTO `mybb_templategroups` VALUES (19, 'search', '<lang:group_search>');
INSERT INTO `mybb_templategroups` VALUES (20, 'showteam', '<lang:group_showteam>');
INSERT INTO `mybb_templategroups` VALUES (21, 'reputation', '<lang:group_reputation>');
INSERT INTO `mybb_templategroups` VALUES (22, 'newthread', '<lang:group_newthread>');
INSERT INTO `mybb_templategroups` VALUES (23, 'newreply', '<lang:group_newreply>');
INSERT INTO `mybb_templategroups` VALUES (24, 'member', '<lang:group_member>');
INSERT INTO `mybb_templategroups` VALUES (25, 'warnings', '<lang:group_warning>');
INSERT INTO `mybb_templategroups` VALUES (26, 'global', '<lang:group_global>');
INSERT INTO `mybb_templategroups` VALUES (27, 'header', '<lang:group_header>');
INSERT INTO `mybb_templategroups` VALUES (28, 'managegroup', '<lang:group_managegroup>');
INSERT INTO `mybb_templategroups` VALUES (29, 'misc', '<lang:group_misc>');
INSERT INTO `mybb_templategroups` VALUES (30, 'modcp', '<lang:group_modcp>');
INSERT INTO `mybb_templategroups` VALUES (31, 'php', '<lang:group_php>');
INSERT INTO `mybb_templategroups` VALUES (32, 'polls', '<lang:group_polls>');
INSERT INTO `mybb_templategroups` VALUES (33, 'post', '<lang:group_post>');
INSERT INTO `mybb_templategroups` VALUES (34, 'printthread', '<lang:group_printthread>');
INSERT INTO `mybb_templategroups` VALUES (35, 'report', '<lang:group_report>');
INSERT INTO `mybb_templategroups` VALUES (36, 'smilieinsert', '<lang:group_smilieinsert>');
INSERT INTO `mybb_templategroups` VALUES (37, 'stats', '<lang:group_stats>');
INSERT INTO `mybb_templategroups` VALUES (38, 'xmlhttp', '<lang:group_xmlhttp>');
INSERT INTO `mybb_templategroups` VALUES (39, 'footer', '<lang:group_footer>');

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_templates`
-- 

CREATE TABLE `mybb_templates` (
  `tid` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(120) NOT NULL default '',
  `template` text NOT NULL,
  `sid` int(10) NOT NULL default '0',
  `version` varchar(20) NOT NULL default '0',
  `status` varchar(10) NOT NULL default '',
  `dateline` int(10) NOT NULL default '0',
  PRIMARY KEY  (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=541 ;

-- 
-- Dumping data for table `mybb_templates`
-- 

INSERT INTO `mybb_templates` VALUES (1, 'forumdisplay_threadlist', '<div class="float_left">\n	{$multipage}\n</div>\n<div class="float_right">\n	{$newthread}\n</div>\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder" style="clear: both;">\n	<tr>\n		<td class="thead" colspan="{$colspan}">\n			<div style="float: right;">\n				<span class="smalltext"><strong><a href="misc.php?action=markread&amp;fid={$fid}">{$lang->markforum_read}</a> | <a href="usercp2.php?action={$add_remove_subscription}subscription&amp;type=forum&amp;fid={$fid}">{$add_remove_subscription_text}</a>{$clearstoredpass}</strong></span>\n			</div>\n			<div>\n				<strong>{$foruminfo[''name'']}</strong>\n			</div>\n		</td>\n	</tr>\n	<tr>\n		<td class="tcat" colspan="3" width="66%"><span class="smalltext"><strong><a href="{$sorturl}&amp;sortby=subject&amp;order=asc">{$lang->thread}</a> {$orderarrow[''subject'']} / <a href="{$sorturl}&amp;sortby=starter&amp;order=asc">{$lang->author}</a> {$orderarrow[''starter'']}</strong></span></td>\n		<td class="tcat" align="center" width="7%"><span class="smalltext"><strong><a href="{$sorturl}&amp;sortby=replies&amp;order=desc">{$lang->replies}</a> {$orderarrow[''replies'']}</strong></span></td>\n		<td class="tcat" align="center" width="7%"><span class="smalltext"><strong><a href="{$sorturl}&amp;sortby=views&amp;order=desc">{$lang->views}</a> {$orderarrow[''views'']}</strong></span></td>\n		{$ratingcol}\n		<td class="tcat" align="right" width="20%"><span class="smalltext"><strong><a href="{$sorturl}&amp;sortby=lastpost&amp;order=desc">{$lang->lastpost}</a> {$orderarrow[''lastpost'']}</strong></span></td>\n		{$inlinemodcol}\n	</tr>\n	{$announcementlist}\n	{$threads}\n	<tr>\n		<td class="tfoot" align="right" colspan="{$colspan}">\n			<form action="forumdisplay.php" method="get">\n				<input type="hidden" name="fid" value="{$fid}" />\n				<select name="sortby">\n					<option value="subject" {$sortsel[''subject'']}>{$lang->sort_by_subject}</option>\n					<option value="lastpost" {$sortsel[''lastpost'']}>{$lang->sort_by_lastpost}</option>\n					<option value="starter" {$sortsel[''starter'']}>{$lang->sort_by_starter}</option>\n					<option value="started" {$sortsel[''started'']}>{$lang->sort_by_started}</option>\n					{$ratingsort}\n					<option value="replies" {$sortsel[''replies'']}>{$lang->sort_by_replies}</option>\n					<option value="views" {$sortsel[''views'']}>{$lang->sort_by_views}</option>\n				</select>\n				<select name="order">\n					<option value="asc" {$ordersel[''asc'']}>{$lang->sort_order_asc}</option>\n					<option value="desc" {$ordersel[''desc'']}>{$lang->sort_order_desc}</option>\n				</select>\n				<select name="datecut">\n					<option value="1" {$datecutsel[''1'']}>{$lang->datelimit_1day}</option>\n					<option value="5" {$datecutsel[''5'']}>{$lang->datelimit_5days}</option>\n					<option value="10" {$datecutsel[''10'']}>{$lang->datelimit_10days}</option>\n					<option value="20" {$datecutsel[''20'']}>{$lang->datelimit_20days}</option>\n					<option value="50" {$datecutsel[''50'']}>{$lang->datelimit_50days}</option>\n					<option value="75" {$datecutsel[''75'']}>{$lang->datelimit_75days}</option>\n					<option value="100" {$datecutsel[''100'']}>{$lang->datelimit_100days}</option>\n					<option value="365" {$datecutsel[''365'']}>{$lang->datelimit_lastyear}</option>\n					<option value="9999" {$datecutsel[''9999'']}>{$lang->datelimit_beginning}</option>\n				</select>\n				{$gobutton}\n			</form>\n		</td>\n	</tr>\n</table>\n<div class="float_left">\n	{$multipage}\n</div>\n<div class="float_right" style="margin-top: 4px;">\n	{$newthread}\n</div>\n<br style="clear: both;" />\n<br />\n<div class="float_left">\n	<div class="float_left">\n		<dl class="thread_legend smalltext">\n			<dd><img src="{$theme[''imgdir'']}/newfolder.gif" alt="{$lang->new_thread}" title="{$lang->new_thread}" /> {$lang->new_thread}</dd>\n			<dd><img src="{$theme[''imgdir'']}/newhotfolder.gif" alt="{$lang->new_hot_thread}" title="{$lang->new_hot_thread}" /> {$lang->new_hot_thread}</dd>\n			<dd><img src="{$theme[''imgdir'']}/hotfolder.gif" alt="{$lang->hot_thread}" title="{$lang->hot_thread}" /> {$lang->hot_thread}</dd>\n		</dl>\n	</div>\n\n	<div class="float_left">\n		<dl class="thread_legend smalltext">\n			<dd><img src="{$theme[''imgdir'']}/folder.gif" alt="{$lang->no_new_thread}" title="{$lang->no_new_thread}" /> {$lang->no_new_thread}</dd>\n			<dd><img src="{$theme[''imgdir'']}/dot_folder.gif" alt="{$lang->posts_by_you}" title="{$lang->posts_by_you}" /> {$lang->posts_by_you}</dd>\n			<dd><img src="{$theme[''imgdir'']}/lockfolder.gif" alt="{$lang->locked_thread}" title="{$lang->locked_thread}" /> {$lang->locked_thread}</dd>\n		</dl>\n	</div>\n	<br style="clear: both" />\n</div>\n\n<div class="float_right" style="text-align: right;">\n	{$inlinemod}\n	{$searchforum}\n	{$forumjump}\n</div>\n<br style="clear: both" />\n{$inline_edit_js}', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (2, 'forumdisplay_threadlist_sortrating', '<option value="rating" {$sortsel[''rating'']}>{$lang->sort_by_rating}</option>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (3, 'global_boardclosed_warning', '<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="trow1" align="center"><strong><span style="color:#FF0000;">{$lang->bbclosed_warning}</span></strong></td>\n</tr>\n</table>\n<br />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (4, 'global_pm_alert', '<div class="pm_alert" id="pm_notice">\n	<div class="float_right"><a href="private.php?action=dismiss_notice&amp;my_post_key={$mybb->post_code}" title="{$lang->dismis_notice}" onclick="return MyBB.dismissPMNotice()"><img src="{$theme[''imgdir'']}/dismiss_notice.gif" alt="{$lang->dismis_notice}" title="[x]" /></a></div>\n	<div>{$privatemessage_text}</div>\n</div><br />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (5, 'post_savedraftbutton', '&nbsp;<input type="submit" class="button" name="savedraft" value="{$lang->save_draft}" />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (6, 'index', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']}</title>\n{$headerinclude}\n<script type="text/javascript">\n<!--\n	lang.no_new_posts = "{$lang->no_new_posts}";\n	lang.click_mark_read = "{$lang->click_mark_read}";\n// -->\n</script>\n</head>\n<body>\n{$header}\n{$forums}\n{$boardstats}\n\n<dl class="forum_legend smalltext">\n	<dt><img src="{$theme[''imgdir'']}/on.gif" alt="{$lang->new_posts}" title="{$lang->new_posts}" style="vertical-align: middle; padding-bottom: 4px;" /></dt>\n	<dd>{$lang->new_posts}</dd>\n\n	<dt><img src="{$theme[''imgdir'']}/off.gif" alt="{$lang->no_new_posts}" title="{$lang->no_new_posts}" style="vertical-align: middle; padding-bottom: 4px;" /></dt>\n	<dd>{$lang->no_new_posts}</dd>\n\n	<dt><img src="{$theme[''imgdir'']}/offlock.gif" alt="{$lang->forum_locked}" title="{$lang->forum_locked}" style="vertical-align: middle;" /></dt>\n	<dd>{$lang->forum_locked}</dd>\n</dl>\n<br style="clear: both" />\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (7, 'modcp_reports_allreports', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->all_reported_posts}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<table width="100%" border="0" align="center">\n<tr>\n{$modcp_nav}\n<td valign="top">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" align="center" colspan="6"><strong>{$lang->all_reported_posts_note}</strong></td>\n</tr>\n<tr>\n<td class="tcat" align="center" width="10%"><span class="smalltext"><strong>{$lang->post_id}</strong></span></td>\n<td class="tcat" align="center" width="15%"><span class="smalltext"><strong>{$lang->poster}</strong></span></td>\n<td class="tcat" align="center" width="25%"><span class="smalltext"><strong>{$lang->thread}</strong></span></td>\n<td class="tcat" align="center" width="15%"><span class="smalltext"><strong>{$lang->reporter}</strong></span></td>\n<td class="tcat" align="center" width="25%"><span class="smalltext"><strong>{$lang->report_reason}</strong></span></td>\n<td class="tcat" align="center" width="10%"><span class="smalltext"><strong>{$lang->report_time}</strong></span></td>\n</tr>\n{$allreports}\n{$allreportspages}\n</table>\n</td>\n</tr>\n</table>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (8, 'modcp_modlogs', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->modlogs}</title>\n{$headerinclude}\n</head>\n<body>\n	{$header}\n	<form action="modcp.php?action=modlogs" method="post">\n		<table width="100%" border="0" align="center">\n			<tr>\n				{$modcp_nav}\n				<td valign="top">\n					<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n						<tr>\n							<td class="thead" align="center" colspan="5"><strong>{$lang->modlogs}</strong></td>\n						</tr>\n						<tr>\n							<td class="tcat"><span class="smalltext"><strong>{$lang->username}</strong></span></td>\n							<td class="tcat" align="center"><span class="smalltext"><strong>{$lang->date}</strong></span></td>\n							<td class="tcat" align="center"><span class="smalltext"><strong>{$lang->action}</strong></span></td>\n							<td class="tcat" align="center"><span class="smalltext"><strong>{$lang->information}</strong></span></td>\n							<td class="tcat" align="center"><span class="smalltext"><strong>{$lang->ip}</strong></span></td>\n						</tr>\n						{$results}\n						{$resultspages}\n					</table>\n					<br />\n					<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n						<tr>\n							<td class="thead" colspan="2"><strong>{$lang->filter_modlogs}</strong></td>\n						</tr>\n						<tr>\n							<td class="trow1" width="25%"><strong>{$lang->forum}</strong></td>\n							<td class="trow1" width="75%">\n								{$forum_select}\n							</td>\n						</tr>\n						<tr>\n							<td class="trow1" width="25%"><strong>{$lang->from_moderator}</strong></td>\n							<td class="trow1" width="75%">\n								<select name="uid">\n									<option value="">{$lang->all_moderators}</option>\n									<option value="">----------</option>\n									{$user_options}\n								</select>\n							</td>\n						</tr>\n						<tr>\n							<td class="trow1" width="25%"><strong>{$lang->sort_by}</strong></td>\n							<td class="trow1" width="75%">\n								<select name="sortby">\n									<option value="dateline"{$sortbysel[''dateline'']}>{$lang->date}</option>\n									<option value="username"{$sortbysel[''username'']}>{$lang->username}</option>\n									<option value="forum"{$sortbysel[''forum'']}>{$lang->forum_name}</option>\n									<option value="thread"{$sortbysel[''thread'']}>{$lang->thread_subject}</option>\n								</select>\n								{$lang->in}\n								<select name="order">\n									<option value="asc"{$ordersel[''asc'']}>{$lang->asc}</option>\n									<option value="desc"{$ordersel[''desc'']}>{$lang->desc}</option>\n								</select>\n								{$lang->order}\n							</td>\n						</tr>\n						<tr>\n							<td class="trow1" width="25%"><strong>{$lang->per_page}</strong></td>\n							<td class="trow1" width="75%"><input type="text" name="perpage" value="{$perpage}" size="4" /></td>\n						</tr>\n					</table>\n					<br />\n					<div align="center">\n						<input type="submit" class="button" value="{$lang->filter_logs}" />\n					</div>\n				</td>\n			</tr>\n		</table>\n	</form>\n{$footer}\n</body>\n</html>', -2, '1405', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (9, 'modcp_nav', '<td width="{$lang->nav_width}" valign="top">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n	<tr>\n		<td class="thead"><strong>{$lang->nav_menu}</strong></td>\n	</tr>\n	<tr><td class="trow1 smalltext"><a href="modcp.php" class="modcp_nav_item modcp_nav_home">{$lang->mcp_nav_home}</a></td></tr>\n	<tr>\n		<td class="tcat">\n			<div class="float_right"><img src="{$theme[''imgdir'']}/collapse{$collapsedimg[''modcpforums'']}.gif" id="modcpforums_img" class="expander" alt="[-]" title="[-]" /></div>\n			<div><span class="smalltext"><strong>{$lang->mcp_nav_forums}</strong></span></div>\n		</td>\n	</tr>\n	<tbody style="{$collapsed[''modcpforums_e'']}" id="modcpforums_e">\n		<tr><td class="trow1 smalltext"><a href="modcp.php?action=announcements" class="modcp_nav_item modcp_nav_announcements">{$lang->mcp_nav_announcements}</a></td></tr>\n		<tr><td class="trow1 smalltext"><a href="modcp.php?action=modqueue" class="modcp_nav_item modcp_nav_modqueue">{$lang->mcp_nav_modqueue}</a></td></tr>\n		<tr><td class="trow1 smalltext"><a href="modcp.php?action=reports" class="modcp_nav_item modcp_nav_reports">{$lang->mcp_nav_reported_posts}</a></td></tr>\n		<tr><td class="trow1 smalltext"><a href="modcp.php?action=modlogs" class="modcp_nav_item modcp_nav_modlogs">{$lang->mcp_nav_modlogs}</a></td></tr>\n	</tbody>\n	<tr>\n		<td class="tcat">\n			<div class="float_right"><img src="{$theme[''imgdir'']}/collapse{$collapsedimg[''modcpusers'']}.gif" id="modcpusers_img" class="expander" alt="[-]" title="[-]" /></div>\n			<div><span class="smalltext"><strong>{$lang->mcp_nav_users}</strong></span></div>\n		</td>\n	</tr>\n	<tbody style="{$collapsed[''modcpusers_e'']}" id="modcpusers_e">\n		<tr><td class="trow1 smalltext"><a href="modcp.php?action=finduser" class="modcp_nav_item modcp_nav_editprofile">{$lang->mcp_nav_editprofile}</a></td></tr>\n		<tr><td class="trow1 smalltext"><a href="modcp.php?action=banning" class="modcp_nav_item modcp_nav_banning">{$lang->mcp_nav_banning}</a></td></tr>\n		<tr><td class="trow1 smalltext"><a href="modcp.php?action=warninglogs" class="modcp_nav_item modcp_nav_warninglogs">{$lang->mcp_nav_warninglogs}</a></td></tr>\n		<tr><td class="trow1 smalltext"><a href="modcp.php?action=ipsearch" class="modcp_nav_item modcp_nav_ipsearch">{$lang->mcp_nav_ipsearch}</a></td></tr>\n	</tbody>\n</table>\n</td>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (10, 'modcp', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->modcp}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<table width="100%" border="0" align="center">\n<tr>\n{$modcp_nav}\n<td valign="top">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" align="center" colspan="3"><strong>{$lang->awaiting_moderation}</strong></td>\n</tr>\n<tr>\n<td class="tcat" width="23%"><span class="smalltext"><strong>{$lang->type}</strong></span></td>\n<td class="tcat" align="center" width="33%"><span class="smalltext"><strong>{$lang->number_awaiting}</strong></span></td>\n<td class="tcat" align="center" width="44%"><span class="smalltext"><strong>{$lang->latest}</strong></span></td>\n</tr>\n<tr>\n<td class="trow1"><span class="smalltext"><strong>{$lang->threads}</strong></span></td>\n<td class="trow1" align="center"><span class="smalltext">{$unapproved_threads}</span></td>\n<td class="trow1" align="center"><span class="smalltext">{$latest_thread}</span></td>\n</tr>\n<tr>\n<td class="trow2"><span class="smalltext"><strong>{$lang->posts}</strong></span></td>\n<td class="trow2" align="center"><span class="smalltext">{$unapproved_posts}</span></td>\n<td class="trow2" align="center"><span class="smalltext">{$latest_post}</span></td>\n</tr>\n<tr>\n<td class="trow1"><span class="smalltext"><strong>{$lang->attachments}</strong></span></td>\n<td class="trow1" align="center"><span class="smalltext">{$unapproved_attachments}</span></td>\n<td class="trow1" align="center"><span class="smalltext">{$latest_attachment}</span></td>\n</tr>\n</table>\n<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n	<td class="thead" align="center" colspan="5"><strong>{$lang->latest_5_modactions}</strong></td>\n</tr>\n<tr>\n<td class="tcat"><span class="smalltext"><strong>{$lang->username}</strong></span></td>\n<td class="tcat" align="center"><span class="smalltext"><strong>{$lang->date}</strong></span></td>\n<td class="tcat" align="center"><span class="smalltext"><strong>{$lang->action}</strong></span></td>\n<td class="tcat" align="center"><span class="smalltext"><strong>{$lang->information}</strong></span></td>\n<td class="tcat" align="center"><span class="smalltext"><strong>{$lang->ip}</strong></span></td>\n</tr>\n{$modlogresults}\n</table>\n<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" align="center" colspan="4"><strong>{$lang->bans_ending_soon}</strong></td>\n</tr>\n<tr>\n<td class="tcat" width="25%"><span class="smalltext"><strong>{$lang->username}</strong></span></td>\n<td class="tcat" align="center" width="30%"><span class="smalltext"><strong>{$lang->reason}</strong></span></td>\n<td class="tcat" align="center" width="25%"><span class="smalltext"><strong>{$lang->ban_length}</strong></span></td>\n<td class="tcat" align="center" width="20%"><span class="smalltext"><strong>{$lang->ban_bannedby}</strong></span></td>\n</tr>\n{$bannedusers}\n</table>\n<br />\n<form action="modcp.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<input type="hidden" name="action" value="do_modnotes" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" align="center" colspan="1"><strong>{$lang->moderator_notes}</strong></td>\n</tr>\n<tr>\n<td class="tcat"><span class="smalltext"><strong>{$lang->notes_public_all}</strong></span>\n</td>\n<tr>\n<td class="trow1"><textarea name="modnotes" style="width: 99%; height: 200px;" rows="5" cols="45">{$modnotes}</textarea></td>\n</tr>\n</table>\n<br />\n<div align="center"><input type="submit" class="button" name="notessubmit" value="{$lang->save_notes}" /></div>\n</form>\n</td>\n</tr>\n</table>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (11, 'modcp_reports', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->reported_posts}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="modcp.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table width="100%" border="0" align="center">\n<tr>\n{$modcp_nav}\n<td valign="top">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" align="center" colspan="6"><strong>{$lang->reported_posts_note}</strong></td>\n</tr>\n<tr>\n<td class="tcat" align="center" width="10%"><span class="smalltext"><strong>{$lang->post_id}</strong></span></td>\n<td class="tcat" align="center" width="15%"><span class="smalltext"><strong>{$lang->poster}</strong></span></td>\n<td class="tcat" align="center" width="25%"><span class="smalltext"><strong>{$lang->thread}</strong></span></td>\n<td class="tcat" align="center" width="15%"><span class="smalltext"><strong>{$lang->reporter}</strong></span></td>\n<td class="tcat" align="center" width="25%"><span class="smalltext"><strong>{$lang->report_reason}</strong></span></td>\n<td class="tcat" align="center" width="10%"><span class="smalltext"><strong>{$lang->report_time}</strong></span></td>\n</tr>\n{$reports}\n{$reportspages}\n<tr>\n<td class="tfoot" colspan="6" align="right"><span class="smalltext"><strong><a href="modcp.php?action=allreports">{$lang->view_all_reported_posts}</a></strong></span></td>\n</tr>\n</table>\n<br />\n<div align="center"><input type="hidden" name="action" value="do_reports" /><input type="submit" class="button" name="reportsubmit" value="{$lang->mark_read}" /></div>\n</td>\n</tr>\n</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (12, 'modcp_modlogs_result', '<tr>\n<td class="{$trow}" valign="top">{$logitem[''profilelink'']}</td>\n<td class="{$trow}" align="center" valign="top">{$log_date}, {$log_time}</td>\n<td class="{$trow}" align="center" valign="top">{$logitem[''action'']}</td>\n<td class="{$trow}" align="center" valign="top">{$information}</td>\n<td class="{$trow}" align="center" valign="top">{$logitem[''ipaddress'']}</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (13, 'modcp_modlogs_noresults', '<tr>\n	<td class="trow1" align="center" colspan="5">{$lang->error_no_results}</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (14, 'modcp_modlogs_multipage', '<tr>\n<td class="tcat" colspan="6"><span class="smalltext"> {$multipage}</span></td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (15, 'modcp_ipsearch', '\n		<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->ipsearch}</title>\n{$headerinclude}\n</head>\n<body>\n	{$header}\n	<form action="modcp.php?action=ipsearch" method="post">\n		<table width="100%" border="0" align="center">\n			<tr>\n				{$modcp_nav}\n				<td valign="top">\n					{$ipsearch_results}\n					<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n						<tr>\n							<td class="thead" colspan="2"><strong>{$lang->ipaddress_search}</strong></td>\n						</tr>\n						<tr>\n							<td class="trow1" width="25%"><strong>{$lang->ip_address}</strong></td>\n							<td class="trow1" width="75%"><input type="text" class="textbox" name="ipaddress" value="{$ipaddressvalue}" size="30" /></td>\n						</tr>\n						<tr>\n							<td class="trow1" width="25%" valign="top"><strong>{$lang->options}</strong></td>\n							<td class="trow1" width="75%">\n								<label><input type="checkbox" class="checkbox" name="search_users" value="1" {$usersearchselect} />{$lang->search_users}</label><br />\n								<label><input type="checkbox" class="checkbox" name="search_posts" value="1" {$postsearchselect} />{$lang->search_posts}</label>\n							</td>\n						</tr>\n					</table>\n					<br />\n					<div align="center">\n						<input type="submit" class="button" value="{$lang->find}" />\n					</div>\n				</td>\n			</tr>\n		</table>\n	</form>\n{$footer}\n</body>\n</html>', -2, '1405', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (16, 'modcp_ipsearch_results', '					<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n						<tr>\n							<td class="thead" align="center" colspan="2"><strong>{$lang->ipsearch_results}</strong></td>\n						</tr>\n						<tr>\n							<td class="tcat" width="15%" align="center"><span class="smalltext"><strong>{$lang->ipaddress}</strong></span></td>\n							<td class="tcat"><span class="smalltext"><strong>{$lang->result}</strong></span></td>\n						</tr>\n						{$results}\n					</table>\n					{$multipage}\n					<br />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (17, 'modcp_ipsearch_result', '<tr>\n<td class="{$trow}" align="center">{$ip}</td>\n<td class="{$trow}">{$subject}</td>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (18, 'modcp_ipsearch_noresults', '<tr>\n	<td class="trow1" align="center" colspan="2">{$lang->error_no_results}</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (19, 'header_welcomeblock_member', '	<span style="float:right;">{$lang->welcome_current_time}</span>\n		{$lang->welcome_back} (<a href="{$mybb->settings[''bburl'']}/usercp.php"><strong>{$lang->welcome_usercp}</strong></a>{$modcplink}{$admincplink} &mdash; <a href="{$mybb->settings[''bburl'']}/member.php?action=logout&amp;logoutkey={$mybb->user[''logoutkey'']}">{$lang->welcome_logout}</a>)<br />\n				<span class="links">\n					<a href="#" onclick="MyBB.popupWindow(''{$mybb->settings[''bburl'']}/misc.php?action=buddypopup'', ''buddyList'', 350, 350);">{$lang->welcome_open_buddy_list}</a>\n				</span>\n				<a href="{$mybb->settings[''bburl'']}/search.php?action=getnew">{$lang->welcome_newposts}</a> | <a href="{$mybb->settings[''bburl'']}/search.php?action=getdaily">{$lang->welcome_todaysposts}</a> | <a href="{$mybb->settings[''bburl'']}/private.php">{$lang->welcome_pms}</a> {$lang->welcome_pms_usage}', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (20, 'header_welcomeblock_member_moderator', ' &mdash; <a href="{$mybb->settings[''bburl'']}/modcp.php">{$lang->welcome_modcp}</a>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (21, 'postbit_online', '<a href="online.php" title="{$lang->postbit_status_online}"><img src="{$theme[''imgdir'']}/buddy_online.gif" border="0" alt="{$lang->postbit_status_online}" /></a>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (22, 'showthread_moderationoptions', '{$inlinemod}\n<form action="moderation.php" method="post" style="margin-top: 0; margin-bottom: 0;" id="moderator_options">\n	<input type="hidden" name="modtype" value="thread" />\n	<input type="hidden" name="tid" value="{$tid}" />\n	<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n	<span class="smalltext">\n	<strong>{$lang->moderation_options}</strong></span>\n	<select name="action" onchange="$(''moderator_options'').submit();">\n		<optgroup label="{$lang->standard_mod_tools}">\n			<option value="threadnotes">{$lang->thread_notes}</option>\n			<option value="openclosethread">{$lang->open_close_thread}</option>\n			<option value="deletethread">{$lang->delete_thread}</option>\n			{$adminpolloptions}\n			<option value="deleteposts">{$lang->delete_posts}</option>\n			<option value="move">{$lang->move_thread}</option>\n			<option value="stick">{$lang->stick_unstick_thread}</option>\n			<option value="split">{$lang->split_thread}</option>\n			<option value="merge">{$lang->merge_threads}</option>\n			<option value="mergeposts">{$lang->merge_posts}</option>\n			<option value="removeredirects">{$lang->remove_redirects}</option>\n			<option value="removesubscriptions">{$lang->remove_subscriptions}</option>\n			{$approveunapprovethread}\n		</optgroup>\n		{$customthreadtools}\n	</select>\n	{$gobutton}\n</form>\n<br />', -2, '1404', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (23, 'showthread_moderationoptions_custom', '<optgroup label="{$lang->custom_mod_tools}">{$customthreadtools}</optgroup>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (24, 'showthread_moderationoptions_custom_tool', '<option value="{$tool[''tid'']}">{$tool[''name'']}</option>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (25, 'showthread_inlinemoderation_custom', '<optgroup label="{$lang->custom_mod_tools}">{$customposttools}</optgroup>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (26, 'showthread_inlinemoderation_custom_tool', '<option value="{$tool[''tid'']}">{$tool[''name'']}</option>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (27, 'showthread_inlinemoderation', '<script type="text/javascript" src="jscripts/inline_moderation.js?ver=1400"></script>\n<form action="moderation.php" method="post" style="margin-top: 0; margin-bottom: 0;">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<input type="hidden" name="tid" value="{$tid}" />\n<input type="hidden" name="modtype" value="inlinepost" />\n<span class="smalltext"><strong>{$lang->inline_post_moderation}</strong></span>\n<select name="action">\n<optgroup label="{$lang->standard_mod_tools}">\n	<option value="multideleteposts">{$lang->inline_delete_posts}</option>\n	<option value="multimergeposts">{$lang->inline_merge_posts}</option>\n	<option value="multisplitposts">{$lang->inline_split_posts}</option>\n	<option value="multiapproveposts">{$lang->inline_approve_posts}</option>\n	<option value="multiunapproveposts">{$lang->inline_unapprove_posts}</option>\n</optgroup>\n{$customposttools}\n</select>\n<input type="submit" class="button" name="go" value="{$lang->go} ({$inlinecount})" id="inline_go" />&nbsp;\n<input type="button" class="button" onclick="javascript:inlineModeration.clearChecked();" value="{$lang->clear}" />\n</form>\n<script type="text/javascript">\n<!--\n	var go_text = "{$lang->inline_go}";\n	var inlineType = "thread";\n	var inlineId = {$tid};\n// -->\n</script><br />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (28, 'showthread_classic_header', '<tr>\n			<td class="tcat" width="15%"><span class="smalltext"><strong>{$lang->author}</strong></span></td>\n			<td class="tcat"><span class="smalltext"><strong>{$lang->message}</strong></span></td>\n		</tr>\n		', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (29, 'showthread', '<html>\n<head>\n<title>{$thread[''subject'']}</title>\n{$headerinclude}\n<script type="text/javascript">\n<!--\n	var quickdelete_confirm = "{$lang->quickdelete_confirm}";\n// -->\n</script>\n<script type="text/javascript" src="jscripts/thread.js?ver=1400"></script>\n</head>\n<body>\n	{$header}\n	{$pollbox}\n	<div class="float_left">\n		{$multipage}\n	</div>\n	<div class="float_right">\n		{$newreply}\n	</div>\n	{$ratethread}\n	<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder" style="clear: both; border-bottom-width: 0;">\n		<tr>\n			<td class="thead" colspan="2">\n				<div style="float: right;">\n					<span class="smalltext"><strong><a href="showthread.php?mode=threaded&amp;tid={$tid}&amp;pid={$pid}#pid{$pid}">{$lang->threaded}</a> | <a href="showthread.php?mode=linear&amp;tid={$tid}&amp;pid={$pid}#pid{$pid}">{$lang->linear}</a></strong></span>\n				</div>\n				<div>\n					<strong>{$thread[''subject'']}</strong>\n				</div>\n			</td>\n		</tr>\n		{$classic_header}\n	</table>\n	<div id="posts">\n		{$posts}\n	</div>\n	<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder" style="border-top-width: 0;">\n		<tr>\n			<td colspan="2" class="tfoot">\n				{$search_thread}\n				<div>\n					<strong>&laquo; <a href="{$next_oldest_link}">{$lang->next_oldest}</a> | <a href="{$next_newest_link}">{$lang->next_newest}</a> &raquo;</strong>\n				</div>\n			</td>\n		</tr>\n	</table>\n	<div class="float_left">\n		{$multipage}\n	</div>\n	<div style="padding-top: 4px;" class="float_right">\n		{$newreply}\n	</div>\n	<br style="clear: both;" />\n	{$quickreply}\n	{$threadexbox}\n	{$similarthreads}\n	<br />\n	<div class="float_left">\n		<ul class="thread_tools">\n			<li class="printable"><a href="printthread.php?tid={$tid}">{$lang->view_printable}</a></li>\n			<li class="sendthread"><a href="sendthread.php?tid={$tid}">{$lang->send_thread}</a></li>\n			<li class="subscription_{$add_remove_subscription}"><a href="usercp2.php?action={$add_remove_subscription}subscription&amp;tid={$tid}">{$add_remove_subscription_text}</a></li>\n		</ul>\n	</div>\n\n	<div class="float_right" style="text-align: right;">\n		{$moderationoptions}\n		{$forumjump}\n	</div>\n	<br style="clear: both;" />\n	{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (30, 'showthread_ratethread', '<div style="margin-top: 6px; padding-right: 10px;" class="float_right">\n		<script type="text/javascript" src="jscripts/rating.js?ver=1400"></script>\n		<div id="success_rating_{$thread[''tid'']}" style="float: left; padding-top: 2px; padding-right: 10px;">&nbsp;</div>\n		<strong style="float: left; padding-right: 10px;">{$lang->thread_rating}</strong>\n		<div class="inline_rating">\n			<ul class="star_rating{$not_rated}" id="rating_thread_{$thread[''tid'']}">\n				<li style="width: {$thread[''width'']}%" class="current_rating" id="current_rating_{$thread[''tid'']}">{$ratingvotesav}</li>\n				<li><a class="one_star" title="{$lang->one_star}" href="./ratethread.php?tid={$thread[''tid'']}&amp;rating=1&amp;my_post_key={$mybb->post_code}">1</a></li>\n				<li><a class="two_stars" title="{$lang->two_stars}" href="./ratethread.php?tid={$thread[''tid'']}&amp;rating=2&amp;my_post_key={$mybb->post_code}">2</a></li>\n				<li><a class="three_stars" title="{$lang->three_stars}" href="./ratethread.php?tid={$thread[''tid'']}&amp;rating=3&amp;my_post_key={$mybb->post_code}">3</a></li>\n				<li><a class="four_stars" title="{$lang->four_stars}" href="./ratethread.php?tid={$thread[''tid'']}&amp;rating=4&amp;my_post_key={$mybb->post_code}">4</a></li>\n				<li><a class="five_stars" title="{$lang->five_stars}" href="./ratethread.php?tid={$thread[''tid'']}&amp;rating=5&amp;my_post_key={$mybb->post_code}">5</a></li>\n			</ul>\n		</div>\n</div>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (31, 'forumjump_advanced', '<form action="forumdisplay.php" method="get">\n<span class="smalltext"><strong>{$lang->forumjump}</strong></span>\n<select name="{$name}" onchange="window.location=(''forumdisplay.php?fid=''+this.options[this.selectedIndex].value)">\n<option value="-1" {$jumpsel[''default'']}>{$lang->forumjump_select}</option>\n<option value="-1">--------------------</option>\n<option value="-4">{$lang->forumjump_pms}</option>\n<option value="-3">{$lang->forumjump_usercp}</option>\n<option value="-5">{$lang->forumjump_wol}</option>\n<option value="-2">{$lang->forumjump_search}</option>\n<option value="-1">{$lang->forumjump_home}</option>\n{$forumjumpbits}\n</select>\n{$gobutton}\n</form>\n', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (32, 'forumdisplay_searchforum', '<form action="search.php" method="post">\n	<span class="smalltext"><strong>{$lang->search_forum}</strong></span>\n	<input type="text" class="textbox" name="keywords" /> {$gobutton}\n	<input type="hidden" name="action" value="do_search" />\n	<input type="hidden" name="forums" value="{$fid}" />\n	<input type="hidden" name="postthread" value="1" />\n	</form><br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (33, 'editpost', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->edit_post}</title>\n{$headerinclude}\n<script type="text/javascript" src="jscripts/post.js?ver=1400"></script>\n</head>\n<body>\n{$header}\n{$preview}\n{$post_errors}\n{$attacherror}\n<form action="editpost.php" method="post" name="editpost">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="3"><strong>{$lang->delete_post}</strong></td>\n</tr>\n<tr>\n<td class="trow1" style="white-space: nowrap"><input type="checkbox" class="checkbox" name="delete" value="1" tabindex="9" /> <strong>{$lang->delete_q}</strong></td>\n<td class="trow1" width="100%">{$lang->delete_1}<br /><span class="smalltext">{$lang->delete_2}</span></td>\n<td class="trow1"><input type="submit" class="button" name="submit" value="{$lang->delete_now}" tabindex="10" /></td>\n</tr>\n</table>\n<input type="hidden" name="action" value="deletepost" />\n<input type="hidden" name="pid" value="{$pid}" />\n</form>\n<br />\n<form action="editpost.php?pid={$pid}&amp;processed=1" method="post" enctype="multipart/form-data" name="input">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->edit_post}</strong></td>\n</tr>\n{$loginbox}\n<tr>\n<td class="trow2"><strong>{$lang->subject}</strong></td>\n<td class="trow2"><input type="text" class="textbox" name="subject" size="40" maxlength="85" value="{$subject}" tabindex="1" /></td>\n</tr>\n{$posticons}\n<tr>\n<td class="trow2" valign="top"><strong>{$lang->your_message}:</strong><br /><div style="text-align: center;">{$smilieinserter}</div></td>\n<td class="trow2">\n<textarea name="message" id="message" rows="20" cols="70" tabindex="3">{$message}</textarea>\n{$codebuttons}\n</td>\n</tr>\n<tr>\n<td class="trow1" valign="top"><strong>{$lang->post_options}</strong></td>\n<td class="trow1"><span class="smalltext">\n<label><input type="checkbox" class="checkbox" name="postoptions[signature]" value="1" tabindex="6"{$postoptionschecked[''signature'']} /> {$lang->options_sig}</label>\n{$disablesmilies}</span>\n</td>\n</tr>\n{$subscriptionmethod}\n{$pollbox}\n</table>\n{$attachbox}\n<br />\n<div align="center"><input type="submit" class="button" name="submit" value="{$lang->update_post}" tabindex="3" />  <input type="submit" class="button" name="previewpost" value="{$lang->preview_post}" tabindex="4" /></div>\n<input type="hidden" name="action" value="do_editpost" />\n<input type="hidden" name="posthash" value="{$posthash}" />\n<input type="hidden" name="attachmentaid" value="" />\n<input type="hidden" name="attachmentact" value="" />\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (34, 'editpost_disablesmilies', '<br />\n<label><input type="checkbox" class="checkbox" name="postoptions[disablesmilies]" value="1" tabindex="8"{$postoptionschecked[''disablesmilies'']} /> {$lang->options_disablesmilies}</label>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (35, 'newreply', '<html>\n<head>\n<title>{$lang->post_reply_to}</title>\n{$headerinclude}\n<script type="text/javascript" src="jscripts/post.js?ver=1400"></script>\n</head>\n<body>\n{$header}\n{$preview}\n{$maximageserror}\n{$attacherror}\n{$reply_errors}\n<form action="newreply.php?tid={$tid}&amp;processed=1" method="post" enctype="multipart/form-data" name="input">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->post_new_reply}</strong></td>\n</tr>\n<tr>\n<td class="tcat" colspan="2"><span class="smalltext"><strong>{$lang->reply_to}</strong></span></td>\n</tr>\n{$loginbox}\n<tr>\n<td class="trow2" width="20%"><strong>{$lang->post_subject}</strong></td>\n<td class="trow2"><input type="text" class="textbox" name="subject" size="40" maxlength="85" value="{$subject}" tabindex="1" /></td>\n</tr>\n{$posticons}\n<tr>\n<td class="trow2" valign="top"><strong>{$lang->your_message}</strong><br />{$smilieinserter}</td>\n<td class="trow2">\n<textarea id="message" name="message" rows="20" cols="70" tabindex="2" >{$message}</textarea>\n{$codebuttons}\n{$multiquote_external}\n</td>\n</tr>\n<tr>\n<td class="trow1" valign="top"><strong>{$lang->post_options}</strong></td>\n<td class="trow1"><span class="smalltext">\n<label><input type="checkbox" class="checkbox" name="postoptions[signature]" value="1" tabindex="6"{$postoptionschecked[''signature'']} /> {$lang->options_sig}</label>\n{$disablesmilies}\n</span></td>\n</tr>\n{$modoptions}\n{$subscriptionmethod}\n{$captcha}\n</table>\n{$attachbox}\n<br />\n<div align="center"><input type="submit" class="button" name="submit" value="{$lang->post_reply}" tabindex="3" accesskey="s" />  <input type="submit" class="button" name="previewpost" value="{$lang->preview_post}" tabindex="4" />{$savedraftbutton}</div>\n<input type="hidden" name="action" value="do_newreply" />\n<input type="hidden" name="replyto" value="{$replyto}" />\n<input type="hidden" name="posthash" value="{$posthash}" />\n<input type="hidden" name="attachmentaid" value="" />\n<input type="hidden" name="attachmentact" value="" />\n<input type="hidden" name="quoted_ids" value="{$quoted_ids}" />\n<input type="hidden" name="tid" value="{$tid}" />\n{$editdraftpid}\n</form>\n{$forumrules}\n{$threadreview}\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (36, 'newreply_disablesmilies', '<br />\n<label><input type="checkbox" class="checkbox" name="postoptions[disablesmilies]" value="1" tabindex="9"{$postoptionschecked[''disablesmilies'']} /> {$lang->options_disablesmilies}</label>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (37, 'usercp_drafts', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->drafts}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="usercp.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="4"><strong>{$lang->drafts}</strong></td>\n</tr>\n<tr>\n<td class="tcat" align="center"><span class="smalltext"><strong>{$lang->draft_title}</strong></span></td>\n<td class="tcat" align="center" width="20%"><span class="smalltext"><strong>{$lang->draft_saved}</strong></span></td>\n<td class="tcat" align="center" width="20%"><span class="smalltext"><strong>{$lang->draft_options}</strong></span></td>\n<td class="tcat" align="center" width="1"><input type="checkbox" class="checkbox checkall" /></td>\n</tr>\n{$drafts}\n</table>\n<br />\n<div align="center">\n<input type="hidden" name="action" value="do_drafts" />\n<input type="submit" class="button" name="draftman" value="{$lang->delete_drafts}" />\n</div>\n</td>\n</tr>\n</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (38, 'usercp_drafts_draft', '<tr>\n<td class="{$trow}"><strong>{$draft[''subject'']}</strong><br /><span class="smalltext">{$detail}</span></td>\n<td class="{$trow}" align="center">{$savedate}, {$savetime}</td>\n<td class="{$trow}" align="center"><a href="{$editurl}">{$lang->edit_draft}</a></td>\n<td class="{$trow}" align="center"><input type="checkbox" class="checkbox" name="deletedraft[{$id}]" value="{$type}" /></td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (39, 'newthread', '<html>\n<head>\n<title>{$lang->newthread_in}</title>\n{$headerinclude}\n<script type="text/javascript" src="jscripts/post.js?ver=1400"></script>\n</head>\n<body>\n{$header}\n{$preview}\n{$thread_errors}\n{$attacherror}\n<form action="newthread.php?fid={$fid}&amp;processed=1" method="post" enctype="multipart/form-data" name="input">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->post_new_thread}</strong></td>\n</tr>\n{$loginbox}\n<tr>\n<td class="trow2" width="20%"><strong>{$lang->thread_subject}</strong></td>\n<td class="trow2"><input type="text" class="textbox" name="subject" size="40" maxlength="85" value="{$subject}" tabindex="1" /></td>\n</tr>\n{$posticons}\n<tr>\n<td class="trow2" valign="top"><strong>{$lang->your_message}</strong>{$smilieinserter}</td>\n<td class="trow2">\n<textarea name="message" id="message" rows="20" cols="70" tabindex="2">{$message}</textarea>\n{$codebuttons}\n{$multiquote_external}\n</td>\n</tr>\n<tr>\n<td class="trow1" valign="top"><strong>{$lang->post_options}</strong></td>\n<td class="trow1"><span class="smalltext">\n<label><input type="checkbox" class="checkbox" name="postoptions[signature]" value="1" tabindex="7"{$postoptionschecked[''signature'']} /> {$lang->options_sig}</label>\n{$disablesmilies}</span></td>\n</tr>\n{$modoptions}\n{$subscriptionmethod}\n{$pollbox}\n{$captcha}\n</table>\n{$attachbox}\n<br />\n<div style="text-align:center"><input type="submit" class="button" name="submit" value="{$lang->post_thread}" tabindex="4" accesskey="s" />  <input type="submit" class="button" name="previewpost" value="{$lang->preview_post}" tabindex="5" />{$savedraftbutton}</div>\n<input type="hidden" name="action" value="do_newthread" />\n<input type="hidden" name="posthash" value="{$posthash}" />\n<input type="hidden" name="attachmentaid" value="" />\n<input type="hidden" name="attachmentact" value="" />\n<input type="hidden" name="quoted_ids" value="{$quoted_ids}" />\n<input type="hidden" name="tid" value="{$tid}" />\n{$editdraftpid}\n</form>\n{$forumrules}\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (40, 'newthread_disablesmilies', '<br />\n<label><input type="checkbox" class="checkbox" name="postoptions[disablesmilies]" value="1" tabindex="9"{$postoptionschecked[''disablesmilies'']} /> {$lang->options_disablesmilies}</label>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (41, 'usercp_nav', '<td width="{$lang->ucp_nav_width}" valign="top">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n	<tr>\n		<td class="thead"><strong>{$lang->ucp_nav_menu}</strong></td>\n	</tr>\n	<tr>\n		<td class="trow1 smalltext"><a href="usercp.php" class="usercp_nav_item usercp_nav_home">{$lang->ucp_nav_home}</a></td>\n	</tr>\n{$usercpmenu}\n</table>\n</td>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (42, 'usercp_nav_messenger', '<tr>\n	<td class="tcat">\n		<div class="float_right"><img src="{$theme[''imgdir'']}/collapse{$collapsedimg[''usercppms'']}.gif" id="usercppms_img" class="expander" alt="[-]"/></div>\n		<div><span class="smalltext"><strong>{$lang->ucp_nav_messenger}</strong></span></div>\n	</td>\n</tr>\n<tbody style="{$collapsed[''usercppms_e'']}" id="usercppms_e">\n	<tr><td class="trow1 smalltext"><a href="private.php?action=send" class="usercp_nav_item usercp_nav_composepm">{$lang->ucp_nav_compose}</a></td></tr>\n	<tr>\n		<td class="trow1 smalltext">\n			{$folderlinks}\n		</td>\n	</tr>\n	<tr><td class="trow1 smalltext"><a href="private.php?action=tracking" class="usercp_nav_item usercp_nav_pmtracking">{$lang->ucp_nav_tracking}</a></td></tr>\n	<tr><td class="trow1 smalltext"><a href="private.php?action=folders" class="usercp_nav_item usercp_nav_pmfolders">{$lang->ucp_nav_edit_folders}</a></td></tr>\n</tbody>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (43, 'usercp_nav_profile', '<tr>\n	<td class="tcat">\n		<div class="expcolimage"><img src="{$theme[''imgdir'']}/collapse{$collapsedimg[''usercpprofile'']}.gif" id="usercpprofile_img" class="expander" alt="[-]" title="[-]" /></div>\n		<div><span class="smalltext"><strong>{$lang->ucp_nav_profile}</strong></span></div>\n	</td>\n</tr>\n<tbody style="{$collapsed[''usercpprofile_e'']}" id="usercpprofile_e">\n	<tr><td class="trow1 smalltext">\n		<div><a href="usercp.php?action=profile" class="usercp_nav_item usercp_nav_profile">{$lang->ucp_nav_edit_profile}</a></div>\n		{$changenameop}\n		<div><a href="usercp.php?action=password" class="usercp_nav_item usercp_nav_password">{$lang->ucp_nav_change_pass}</a></div>\n		<div><a href="usercp.php?action=email" class="usercp_nav_item usercp_nav_email">{$lang->ucp_nav_change_email}</a></div>\n		<div><a href="usercp.php?action=avatar" class="usercp_nav_item usercp_nav_avatar">{$lang->ucp_nav_change_avatar}</a></div>\n		<div><a href="usercp.php?action=editsig" class="usercp_nav_item usercp_nav_editsig">{$lang->ucp_nav_edit_sig}</a></div>\n	</td></tr>\n	<tr><td class="trow1 smalltext"><a href="usercp.php?action=options" class="usercp_nav_item usercp_nav_options">{$lang->ucp_nav_edit_options}</a></td></tr>\n</tbody>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (44, 'usercp_nav_misc', '<tr>\n	<td class="tcat">\n		<div class="expcolimage"><img src="{$theme[''imgdir'']}/collapse{$collapsedimg[''usercpmisc'']}.gif" id="usercpmisc_img" class="expander" alt="[-]" title="[-]" /></div>\n		<div><span class="smalltext"><strong>{$lang->ucp_nav_misc}</strong></span></div>\n	</td>\n</tr>\n<tbody style="{$collapsed[''usercpmisc_e'']}" id="usercpmisc_e">\n	<tr><td class="trow1 smalltext"><a href="usercp.php?action=usergroups" class="usercp_nav_item usercp_nav_usergroups">{$lang->ucp_nav_usergroups}</a></td></tr>\n	<tr><td class="trow1 smalltext"><a href="usercp.php?action=editlists" class="usercp_nav_item usercp_nav_editlists">{$lang->ucp_nav_editlists}</a></td></tr>\n	<tr><td class="trow1 smalltext"><a href="usercp.php?action=attachments" class="usercp_nav_item usercp_nav_attachments">{$lang->ucp_nav_attachments}</a></td></tr>\n	<tr><td class="trow1 smalltext">{$draftstart}<a href="usercp.php?action=drafts" class="usercp_nav_item usercp_nav_drafts">{$lang->ucp_nav_drafts} {$draftcount}</a>{$draftend}</td></tr>\n	<tr><td class="trow1 smalltext"><a href="usercp.php?action=subscriptions" class="usercp_nav_item usercp_nav_subscriptions">{$lang->ucp_nav_subscribed_threads}</a></td></tr>\n	<tr><td class="trow1 smalltext"><a href="usercp.php?action=forumsubscriptions" class="usercp_nav_item usercp_nav_fsubscriptions">{$lang->ucp_nav_forum_subscriptions}</a></td></tr>\n	<tr><td class="trow1 smalltext"><a href="usercp.php?action=notepad" class="usercp_nav_item usercp_nav_notepad">{$lang->ucp_nav_notepad}</a></td></tr>\n	<tr><td class="trow1 smalltext"><a href="{$profile_link}" class="usercp_nav_item usercp_nav_viewprofile">{$lang->ucp_nav_view_profile}</a></td></tr>\n</tbody>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (45, 'usercp_profile_away', '<br />\n<fieldset class="trow2">\n<legend><strong>{$lang->away_information}</strong></legend>\n<table cellspacing="0" cellpadding="{$theme[''tablespace'']}">\n<tr>\n<td colspan="2"><span class="smalltext">{$lang->away_status}</span></td>\n</tr>\n<tr>\n<td><span class="smalltext"><input type="radio" class="radio" name="away" value="1" {$awaycheck[''1'']} /> {$lang->im_away}</span></td>\n<td><span class="smalltext"><input type="radio" class="radio" name="away" value="0" {$awaycheck[''0'']} /> {$lang->im_here}</span></td>\n</tr>\n<tr>\n<td colspan="2"><span class="smalltext">{$lang->away_reason}</span></td>\n</tr>\n<tr>\n<td colspan="2"><input type="text" class="textbox" name="awayreason" value="{$user[''awayreason'']}" size="25" /></td>\n</tr>\n</table>\n<table cellspacing="0" cellpadding="{$theme[''tablespace'']}">\n<tr>\n<td colspan="3"><span class="smalltext">{$lang->return_date}</span></td>\n</tr>\n<tr>\n<td>\n<select name="awayday">\n<option value="">&nbsp;</option>\n{$returndatesel}\n</select>\n</td>\n<td>\n<select name="awaymonth">\n<option value="">&nbsp;</option>\n<option value="1" {$returndatemonthsel[''1'']}>{$lang->month_1}</option>\n<option value="2" {$returndatemonthsel[''2'']}>{$lang->month_2}</option>\n<option value="3" {$returndatemonthsel[''3'']}>{$lang->month_3}</option>\n<option value="4" {$returndatemonthsel[''4'']}>{$lang->month_4}</option>\n<option value="5" {$returndatemonthsel[''5'']}>{$lang->month_5}</option>\n<option value="6" {$returndatemonthsel[''6'']}>{$lang->month_6}</option>\n<option value="7" {$returndatemonthsel[''7'']}>{$lang->month_7}</option>\n<option value="8" {$returndatemonthsel[''8'']}>{$lang->month_8}</option>\n<option value="9" {$returndatemonthsel[''9'']}>{$lang->month_9}</option>\n<option value="10" {$returndatemonthsel[''10'']}>{$lang->month_10}</option>\n<option value="11" {$returndatemonthsel[''11'']}>{$lang->month_11}</option>\n<option value="12" {$returndatemonthsel[''12'']}>{$lang->month_12}</option>\n</select>\n</td>\n<td>\n<input type="text" class="textbox" size="4" maxlength="4" name="awayyear" value="{$returndate[''2'']}" />\n</td>\n</tr>\n</table>\n</fieldset>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (46, 'usercp_options', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->edit_options}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="usercp.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n{$errors}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->edit_options}</strong></td>\n</tr>\n<tr>\n<td width="50%" class="trow1" valign="top">\n<fieldset class="trow2">\n<legend><strong>{$lang->login_cookies_privacy}</strong></legend>\n<table cellspacing="0" cellpadding="2">\n<tr>\n<td valign="top" width="1"><input type="checkbox" class="checkbox" name="invisible" id="invisible" value="1" {$invisiblecheck} /></td>\n<td><span class="smalltext"><label for="invisible">{$lang->invisible_mode}</label></span></td>\n</tr>\n<tr>\n<td valign="top" width="1"><input type="checkbox" class="checkbox" name="remember" id="remember" value="1" {$remembercheck} /></td>\n<td><span class="smalltext"><label for="remember">{$lang->remember_me}</label></span></td>\n</tr>\n</table>\n</fieldset>\n<br />\n<fieldset class="trow2">\n<legend><strong>{$lang->messaging_notification}</strong></legend>\n<table cellspacing="0" cellpadding="2">\n<tr>\n<td valign="top" width="1"><input type="checkbox" class="checkbox" name="allownotices" id="allownotices" value="1" {$allownoticescheck} /></td>\n<td><span class="smalltext"><label for="allownotices">{$lang->allow_notices}</label></span></td>\n</tr>\n<tr>\n<td valign="top" width="1"><input type="checkbox" class="checkbox" name="hideemail" id="hideemail" value="1" {$hideemailcheck} /></td>\n<td><span class="smalltext"><label for="hideemail">{$lang->allow_emails}</label></span></td>\n</tr>\n<tr>\n<td valign="top" width="1"><input type="checkbox" class="checkbox" name="receivepms" id="receivepms" value="1" {$receivepmscheck} /></td>\n<td><span class="smalltext"><label for="receivepms">{$lang->receive_pms}</label></span></td>\n</tr>\n<tr>\n<td valign="top" width="1"><input type="checkbox" class="checkbox" name="pmnotice" id="pmnotice" value="1"{$pmnoticecheck} /></td>\n<td><span class="smalltext"><label for="pmnotice">{$lang->pm_notice}</label></span></td>\n</tr>\n<tr>\n<td valign="top" width="1"><input type="checkbox" class="checkbox" name="pmnotify" id="pmnotify" value="1" {$pmnotifycheck} /></td>\n<td><span class="smalltext"><label for="pmnotify">{$lang->pm_notify}</label></span></td>\n</tr>\n<tr>\n<td colspan="2"><span class="smalltext"><label for="subscriptionmethod">{$lang->subscription_method}</label></span></td>\n</tr>\n<tr>\n<td colspan="2">\n	<select name="subscriptionmethod" id="subscriptionmethod">\n		<option value="0" {$no_subscribe_selected}>{$lang->no_auto_subscribe}</option>\n		<option value="1" {$no_email_subscribe_selected}>{$lang->no_email_subscribe}</option>\n		<option value="2" {$instant_email_subscribe_selected}>{$lang->instant_email_subscribe}</option>\n	</select>\n</td>\n</tr>\n\n</table>\n</fieldset>\n<br />\n<fieldset class="trow2">\n<legend><strong>{$lang->date_time_options}</strong></legend>\n<table cellspacing="0" cellpadding="2">\n<tr>\n<td><span class="smalltext">{$lang->date_format}</span></td>\n</tr>\n<tr>\n<td>\n<select name="dateformat">\n{$date_format_options}\n</select>\n</td>\n</tr>\n<tr>\n<td><span class="smalltext">{$lang->time_format}</span></td>\n</tr>\n<tr>\n<td>\n<select name="timeformat">\n{$time_format_options}\n</select>\n</td>\n</tr>\n<tr>\n<td><span class="smalltext">{$lang->time_offset_desc}</span></td>\n</tr>\n<tr>\n<td>{$tzselect}</td>\n</tr>\n<tr>\n<td><span class="smalltext">{$lang->dst_correction}</span></td>\n</tr>\n<tr>\n<td>\n	<select name="dstcorrection">\n		<option value="2" {$dst_auto_selected}>{$lang->dst_correction_auto}</option>\n		<option value="1" {$dst_enabled_selected}>{$lang->dst_correction_enabled}</option>\n		<option value="0" {$dst_disabled_selected}>{$lang->dst_correction_disabled}</option>\n	</select>\n</td>\n</tr>\n</table>\n</fieldset>\n</td>\n<td width="50%" class="trow1" valign="top">\n<fieldset class="trow2">\n<legend><strong>{$lang->forum_display_options}</strong></legend>\n<table cellspacing="0" cellpadding="2">\n{$tppselect}\n<tr>\n<td><span class="smalltext">{$lang->thread_view}</span></td>\n</tr>\n<tr>\n<td>\n<select name="daysprune">\n<option value="">{$lang->use_default}</option>\n<option value="1" {$daysprunesel[''1'']}>{$lang->thread_view_lastday}</option>\n<option value="5" {$daysprunesel[''5'']}>{$lang->thread_view_5days}</option>\n<option value="10" {$daysprunesel[''10'']}>{$lang->thread_view_10days}</option>\n<option value="20" {$daysprunesel[''20'']}>{$lang->thread_view_20days}</option>\n<option value="50" {$daysprunesel[''50'']}>{$lang->thread_view_50days}</option>\n<option value="75" {$daysprunesel[''75'']}>{$lang->thread_view_75days}</option>\n<option value="100" {$daysprunesel[''100'']}>{$lang->thread_view_100days}</option>\n<option value="365" {$daysprunesel[''365'']}>{$lang->thread_view_year}</option>\n<option value="9999" {$daysprunesel[''9999'']}>{$lang->thread_view_all}</option>\n</select>\n</td>\n</tr>\n</table>\n</fieldset>\n<br />\n<fieldset class="trow2">\n<legend><strong>{$lang->thread_view_options}</strong></legend>\n<table cellspacing="0" cellpadding="2">\n	<tr>\n	<td valign="top" width="1"><input type="checkbox" class="checkbox" name="classicpostbit" id="classicpostbit" value="1" {$classicpostbitcheck} /></td>\n	<td><span class="smalltext"><label for="classicpostbit">{$lang->show_classic_postbit}</label></span></td>\n	</tr>\n<tr>\n<td valign="top" width="1"><input type="checkbox" class="checkbox" name="showsigs" id="showsigs" value="1" {$showsigscheck} /></td>\n<td><span class="smalltext"><label for="showsigs">{$lang->show_sigs}</label></span></td>\n</tr>\n<tr>\n<td valign="top" width="1"><input type="checkbox" class="checkbox" name="showavatars" id="showavatars" value="1" {$showavatarscheck} /></td>\n<td><span class="smalltext"><label for="showavatars">{$lang->show_avatars}</label></span></td>\n</tr>\n<tr>\n<td valign="top" width="1"><input type="checkbox" class="checkbox" name="showquickreply" id="showquickreply" value="1" {$showquickreplycheck} /></td>\n<td><span class="smalltext"><label for="showquickreply">{$lang->show_quick_reply}</label></span></td>\n</tr>\n{$pppselect}\n<tr>\n<td colspan="2"><span class="smalltext">{$lang->thread_mode}</span></td>\n</tr>\n<tr>\n<td colspan="2"><select name="threadmode"><option value="">{$lang->use_default}</option><option value="linear" {$threadview[''linear'']}>{$lang->linear}</option><option value="threaded" {$threadview[''threaded'']}>{$lang->threaded}</option></select></td>\n</tr>\n</table>\n</fieldset>\n<br />\n<fieldset class="trow2">\n<legend><strong>{$lang->other_options}</strong></legend>\n<table cellspacing="0" cellpadding="2">\n<tr>\n<td valign="top" width="1"><input type="checkbox" class="checkbox" name="showredirect" id="showredirect" value="1" {$showredirectcheck} /></td>\n<td><span class="smalltext"><label for="showredirect">{$lang->show_redirect}</label></span></td>\n</tr>\n<tr>\n<td valign="top" width="1"><input type="checkbox" class="checkbox" name="showcodebuttons" id="showcodebuttons" value="1" {$showcodebuttonscheck} /></td>\n<td><span class="smalltext"><label for="showcodebuttons">{$lang->show_codebuttons}</label></span></td>\n</tr>\n<tr>\n<td colspan="2"><span class="smalltext">{$lang->style}</span></td>\n</tr>\n<tr>\n<td colspan="2">{$stylelist}</td>\n</tr>\n<tr>\n<td colspan="2"><span class="smalltext">{$lang->board_language}</span></td>\n</tr>\n<tr>\n<td colspan="2"><select name="language"><option value="">{$lang->use_default}</option><option value="0">-----------</option>{$langoptions}</select></td>\n</tr>\n</table>\n</fieldset>\n</td>\n</tr>\n</table>\n<br />\n<div align="center">\n<input type="hidden" name="action" value="do_options" />\n<input type="submit" class="button" name="regsubmit" value="{$lang->update_options}" />\n</div>\n</td>\n</tr>\n</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (47, 'usercp_subscriptions_none', '<tr>\n<td class="trow1" colspan="7">{$lang->no_thread_subscriptions}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (48, 'usercp_drafts_none', '<tr>\n<td class="trow1" colspan="7">{$lang->no_drafts}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (49, 'usercp_subscriptions_thread', '<tr>\n	<td align="center" class="{$bgcolor}" width="2%"><img src="{$theme[''imgdir'']}/{$folder}.gif" alt="{$folder_label}" title="{$folder_label}" /></td>\n	<td align="center" class="{$bgcolor}" width="2%">{$icon}</td>\n	<td class="{$bgcolor}">{$gotounread}<a href="{$thread[''threadlink'']}" class="{$new_class}">{$thread[''subject'']}</a><br /><span class="smalltext">{$lang->notification_method} {$notification_type}</span></td>\n	<td align="center" class="{$bgcolor}"><a href="javascript:MyBB.whoPosted({$thread[''tid'']});">{$thread[''replies'']}</a></td>\n	<td align="center" class="{$bgcolor}">{$thread[''views'']}</td>\n	<td class="{$bgcolor}" style="white-space: nowrap">\n		<span class="smalltext">{$lastpostdate} {$lastposttime}<br />\n		<a href="{$thread[''lastpostlink'']}">{$lang->lastpost}</a>: {$lastposterlink}</span>\n	</td>\n	<td class="{$bgcolor}" align="center"><input type="checkbox" class="checkbox" name="check[{$thread[''tid'']}]" value="{$thread[''tid'']}" /></td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (50, 'header_welcomeblock_member_admin', ' &mdash; <a href="{$mybb->settings[''bburl'']}/{$config[''admin_dir'']}/index.php">{$lang->welcome_admin}</a>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (51, 'forumdisplay_newthread', '<a href="newthread.php?fid={$fid}"><img src="{$theme[''imglangdir'']}/newthread.gif" alt="{$lang->post_thread}" title="{$lang->post_thread}" /></a>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (52, 'showthread_threaded_bitactive', '<div style="margin-left: {$indentsize}px;"><strong>{$post[''subject'']}</strong> <span class="smalltext">- {$lang->by} {$post[''profilelink'']} - {$postdate} {$posttime}</span></div>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (53, 'showthread_threaded_bit', '<div style="margin-left: {$indentsize}px;"><a href="showthread.php?tid={$tid}&amp;pid={$post[''pid'']}&amp;mode=threaded">{$post[''subject'']}</a> <span class="smalltext">- {$lang->by} {$post[''profilelink'']} - {$postdate}, {$posttime}</span></div>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (54, 'showthread_poll', '<form action="polls.php" method="get">\n<input type="hidden" name="action" value="vote" />\n<input type="hidden" name="pid" value="{$poll[''pid'']}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td colspan="4" class="thead" align="center"><strong>{$lang->poll} {$poll[''question'']}</strong></td>\n</tr>\n{$polloptions}\n</table>\n<table width="100%" align="center">\n<tr>\n<td><input type="submit" class="button" value="{$lang->vote}" /></td>\n<td valign="top" align="right"><span class="smalltext">[<a href="polls.php?action=showresults&amp;pid={$poll[''pid'']}">{$lang->show_results}</a>{$edit_poll}]</span></td>\n</tr>\n<tr>\n<td colspan="2"><span class="smalltext">{$publicnote}</span></td>\n</tr>\n</table>\n</form>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (55, 'forumdisplay_inlinemoderation_custom', '<optgroup label="{$lang->custom_mod_tools}">{$customthreadtools}</optgroup>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (56, 'forumdisplay_inlinemoderation_custom_tool', '<option value="{$tool[''tid'']}">{$tool[''name'']}</option>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (57, 'forumdisplay_inlinemoderation', '<script type="text/javascript" src="jscripts/inline_moderation.js?ver=1400"></script>\n		<form action="moderation.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<input type="hidden" name="fid" value="{$fid}" />\n<input type="hidden" name="modtype" value="inlinethread" />\n<span class="smalltext"><strong>{$lang->inline_thread_moderation}</strong></span>\n<select name="action">\n	<optgroup label="{$lang->standard_mod_tools}">\n		<option value="multiclosethreads">{$lang->close_threads}</option>\n		<option value="multiopenthreads">{$lang->open_threads}</option>\n		<option value="multistickthreads">{$lang->stick_threads}</option>\n		<option value="multiunstickthreads">{$lang->unstick_threads}</option>\n		<option value="multideletethreads">{$lang->delete_threads}</option>\n		<option value="multimovethreads">{$lang->move_threads}</option>\n		<option value="multiapprovethreads">{$lang->approve_threads}</option>\n		<option value="multiunapprovethreads">{$lang->unapprove_threads}</option>\n	</optgroup>\n	{$customthreadtools}\n</select>\n<input type="submit" class="button" name="go" value="{$lang->inline_go} ({$inlinecount})" id="inline_go" />&nbsp;\n<input type="button" onclick="javascript:inlineModeration.clearChecked();" value="{$lang->clear}" class="button" />\n</form>\n<script type="text/javascript">\n<!--\n	var go_text = "{$lang->inline_go}";\n	var inlineType = "forum";\n	var inlineId = {$fid};\n// -->\n</script>\n<br />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (58, 'report_thanks', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->report_post}</title>\n{$headerinclude}\n</head>\n<body>\n<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="trow1" align="center">\n<br />\n<br />\n<strong>{$lang->thank_you}</strong>\n<blockquote>{$lang->post_reported}</blockquote>\n<br /><br />\n<div style="text-align: center;">\n	<script type="text/javascript">\n	<!--\n		document.write(''[<a href="javascript:window.close();">{$lang->close_window}</a>]'');\n	// -->\n	</script>\n</div>\n</td>\n</tr>\n</table>\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (59, 'report', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->report_post}</title>\n{$headerinclude}\n</head>\n<body>\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="trow1" align="center">\n<br />\n<br />\n<strong>{$lang->report_to_mod}</strong>\n<form action="report.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<input type="hidden" name="action" value="do_report" />\n<input type="hidden" name="pid" value="{$pid}" />\n<blockquote>{$lang->only_report}</blockquote>\n<br />\n<br />\n<span class="smalltext">{$lang->report_reason}</span>\n<br />\n<input type="text" class="textbox" name="reason" size="40" maxlength="250" />\n<br />\n<br />\n<div align="center"><input type="submit" class="button" value="{$lang->report_post}" /></div>\n</form>\n</td>\n</tr>\n</table>\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (60, 'report_error', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->report_post}</title>\n{$headerinclude}\n</head>\n<body>\n<br />\n<table border="0" cellspacing="1" cellpadding="4" class="tborder">\n<tr>\n<td class="thead"><span class="smalltext"><strong>{$mybb->settings[''bbname'']}</strong></span></td>\n\n</tr>\n<tr>\n<td class="trow1">{$error}</td>\n</tr>\n</table>\n</body>\n</html>', -2, '123', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (61, 'redirect', '<html>\n<head>\n<title>{$title}</title>\n<meta http-equiv="refresh" content="2;URL={$url}" />\n{$headerinclude}\n</head>\n<body>\n<br />\n<br />\n<br />\n<br />\n<div style="margin: auto auto; width: {$lang->redirect_width}" align="center">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead"><strong>{$title}</strong></td>\n</tr>\n<tr>\n<td class="trow1" align="center"><p>{$message}</p></td>\n</tr>\n<tr>\n<td class="trow2" align="right"><a href="{$url}"><span class="smalltext">{$lang->click_no_wait}</span></a></td>\n</tr>\n</table>\n</div>\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (62, 'gobutton', '<input type="submit" class="button" value="{$lang->go}" />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (63, 'postbit_away', '<a href="{$post[''profilelink_plain'']}" title="{$lang->postbit_status_away}"><img src="{$theme[''imgdir'']}/buddy_away.gif" border="0" alt="{$lang->postbit_status_away}" /></a>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (64, 'misc_imcenter_icq', '<html>\n<head>\n<title>{$lang->icq_message_center}</title>\n{$headerinclude}\n</head>\n<body style="margin: 0; top: 0; left: 0;" class="trow2">\n<table width="100%" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" border="0" align="center" class="tborder">\n<tr>\n<td class="thead" align="center"><strong>{$user[''username'']} - {$lang->icq_message_center}</strong></td>\n</tr>\n<tr>\n<td class="tcat" align="center"><span class="smalltext"><strong>{$navigationbar}</strong></span></td>\n</tr>\n<tr>\n<td class="trow1" align="center" colspan="2"><strong>{$user[''icq'']}</strong></td>\n</tr>\n<tr>\n<td class="trow1" align="center" colspan="2"><strong><img src="http://status.icq.com/online.gif?icq={$user[''icq'']}&img=2" /></strong></td>\n</tr>\n<tr>\n<td class="trow1" align="center" colspan="2"><span class="smalltext"><a href="http://www.icq.com/people/webmsg.php?to={$user[''icq'']}&amp;from={$mybb->user[''username'']}&amp;fromemail={$mybb->user[''email'']}">{$lang->send_icq_message}</a></span></td>\n</tr>\n</table>\n</body>\n</html>', -2, '1213', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (65, 'forumdisplay_thread_rating', '<td align="center" class="{$bgcolor}" id="rating_table_{$thread[''tid'']}">\n		<ul class="star_rating{$not_rated}" id="rating_thread_{$thread[''tid'']}">\n			<li style="width: {$thread[''width'']}%" class="current_rating" id="current_rating_{$thread[''tid'']}">{$ratingvotesav}</li>\n		</ul>\n		<script type="text/javascript">\n		<!--\n			Rating.build_forumdisplay({$thread[''tid'']}, { width: ''{$thread[''width'']}'', extra_class: ''{$not_rated}'', current_average: ''{$ratingvotesav}'' });\n		// -->\n		</script>\n	</td>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (66, 'forumdisplay_announcement_rating', '	<td class="{$bgcolor}" align="center"><img src="{$theme[''imgdir'']}/pixel.gif" alt="" /></td>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (67, 'forumdisplay_password', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->password_required} </title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="{$_SERVER[''REQUEST_URI'']}" method="post">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" align="center" colspan="2"><strong>{$lang->password_required}</strong></td>\n</tr>\n<tr>\n<td class="trow2" colspan="2">{$lang->forum_password_note}</td>\n</tr>\n<tr>\n<td class="tcat" colspan="2"><strong>{$lang->enter_password_below}</strong></td>\n</tr>\n{$pwnote}\n<tr>\n<td class="trow1" align="center" colspan="2"><input type="password" class="textbox" name="pwverify" size="50" value="" /></td>\n</tr>\n</table>\n<br />\n<div align="center"><input type="submit" class="button" name="submit" value="{$lang->verify_forum_password}" /></div>\n</form>\n{$footer}\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (68, 'error_maxsigimages', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead"><strong>{$lang->too_many_images}</strong></td>\n</tr>\n<tr>\n<td class="trow1">{$lang->too_many_sig_images}<br /><span class="smalltext">{$lang->too_many_sig_images2}</span>\n</td>\n</tr>\n</table>\n<br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (69, 'forumbit_depth2_forum', '<tr>\n<td class="{$bgcolor}" align="center" valign="top" width="1"><img src="{$theme[''imgdir'']}/{$lightbulb[''folder'']}.gif" alt="{$lightbulb[''altonoff'']}" title="{$lightbulb[''altonoff'']}" class="ajax_mark_read" id="mark_read_{$forum[''fid'']}" /></td>\n<td class="{$bgcolor}" valign="top">\n<strong><a href="{$forum_url}">{$forum[''name'']}</a></strong>{$forum_viewers_text}<div class="smalltext">{$forum[''description'']}{$modlist}{$subforums}</div>\n</td>\n<td class="{$bgcolor}" valign="top" align="center" style="white-space: nowrap">{$threads}{$unapproved[''unapproved_threads'']}</td>\n<td class="{$bgcolor}" valign="top" align="center" style="white-space: nowrap">{$posts}{$unapproved[''unapproved_posts'']}</td>\n<td class="{$bgcolor}" valign="top" align="right" style="white-space: nowrap">{$lastpost}</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (70, 'forumbit_depth3', '{$comma}{$statusicon}<a href="{$forum_url}" title="{$forum_viewers_text_plain}">{$forum[''name'']}</a>', -2, '1404', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (71, 'forumbit_depth3_statusicon', '<img src="{$theme[''imgdir'']}/{$lightbulb[''folder'']}.gif" alt="{$lightbulb[''altonoff'']}" title="{$lightbulb[''altonoff'']}" class="subforumicon ajax_mark_read" id="mark_read_{$forum[''fid'']}" />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (72, 'forumbit_subforums', '<br />{$lang->subforums} {$sub_forums}', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (73, 'private_empty', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->empty_folders}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="private.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="3"><strong>{$lang->empty_folders}</strong></td>\n</tr>\n<tr>\n<td class="trow1" colspan="3"><span class="smalltext">{$lang->empty_note}</span></td>\n</tr>\n<tr>\n<td class="tcat" align="center"><strong>{$lang->export_folder}</strong></td>\n<td class="tcat" align="center"><strong>{$lang->num_messages}</strong></td>\n<td class="tcat" align="center"><strong>{$lang->empty_q}</strong></td>\n</tr>\n{$folderlist}\n<tr>\n<td class="trow2" align="center" colspan="3"><input type="checkbox" class="checkbox" name="keepunread" value="1" checked="checked" /><strong>{$lang->keep_unread}</strong></td>\n</tr>\n</table>\n<br />\n<div align="center">\n<input type="hidden" name="action" value="do_empty" />\n<input type="submit" class="button" name="submit" value="{$lang->delete}" />\n</div>\n</td>\n</tr>\n</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (74, 'usercp', '<html>\n<head>\n<title>{$lang->user_cp}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="{$colspan}"><strong>{$lang->brief_summary}</strong></td>\n</tr>\n<tr>\n{$avatar}\n<td class="trow1" width="50%"><strong>{$lang->username}</strong></td>\n<td class="trow1" width="50%">{$username}</td>\n</tr>\n<tr>\n<td class="trow2" width="50%"><strong>{$lang->primary_usergroup}</strong></td>\n<td class="trow2" width="50%">{$usergroup}</td>\n</tr>\n<tr>\n<td class="trow1" width="50%"><strong>{$lang->registration_date}</strong></td>\n<td class="trow1" width="50%">{$regdate}</td>\n</tr>\n<tr>\n<td class="trow2" width="50%"><strong>{$lang->postnum}</strong></td>\n<td class="trow2" width="50%"><a href="search.php?action=finduser&amp;uid={$mybb->user[''uid'']}">{$mybb->user[''postnum'']}</a> {$lang->posts_day}</td>\n</tr>\n<tr>\n<td class="trow1" width="50%"><strong>{$lang->email}</strong></td>\n<td class="trow1" width="50%">{$mybb->user[''email'']}</td>\n</tr>\n{$reputation}\n</table>\n{$latest_warnings}\n</td>\n</tr>\n</table>\n{$footer}\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (75, 'usercp_reputation', '<tr>\n<td class="trow2" width="50%"><strong>{$lang->reputation}</strong></td>\n<td class="trow2" width="50%">{$reputation_link} [<a href="reputation.php?uid={$mybb->user[''uid'']}">{$lang->details}</a>]</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (76, 'usercp_currentavatar', '<td class="trow1" rowspan="6" valign="middle" align="center" width="1"><img src="{$mybb->user[''avatar'']}" alt="{$mybb->user[''username'']}" title="{$mybb->user[''username'']}" {$avatar_width_height} /></td>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (77, 'footer', '			<br />\n			<div class="bottommenu">\n				<div class="float_right">{$lang_select}</div>\n				<div>\n					<span class="smalltext"><a href="{$mybb->settings[''contactlink'']}">{$lang->bottomlinks_contactus}</a> | <a href="{$mybb->settings[''homeurl'']}">{$mybb->settings[''homename'']}</a> | <a href="#top">{$lang->bottomlinks_returntop}</a> | <a href="#content">{$lang->bottomlinks_returncontent}</a> | <a href="<archive_url>">{$lang->bottomlinks_litemode}</a> | <a href="{$mybb->settings[''bburl'']}/misc.php?action=syndication">{$lang->bottomlinks_syndication}</a></span>\n				</div>\n			</div>\n			</div>\n		<hr class="hidden" />\n			<div id="copyright">\n				<div id="debug"><debugstuff></div>\n				<!-- MyBB is free software developed and maintained by a volunteer community. \n					 It would be much appreciated by the MyBB Group if you left the full copyright and "powered by" notice intact, \n					 to show your support for MyBB.  If you choose to remove or modify the copyright below, \n					 you may be refused support on the MyBB Community Forums.\n					 \n					 This is free software, support us and we''ll support you. -->\n{$lang->powered_by} <a href="http://www.mybboard.net" target="_blank">MyBB{$mybbversion}</a>, &copy; 2002-{$copy_year} <a href="http://www.mybboard.net" target="_blank">MyBB Group</a>.<br />\n				<!-- End powered by -->\n				<br />\n<br class="clear" />\n<!-- The following piece of code allows MyBB to run scheduled tasks. DO NOT REMOVE -->{$task_image}<!-- End task image code -->\n{$auto_dst_detection}\n		</div>\n		</div>', -2, '1405', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (78, 'private_archive_csv', '{$lang->export_date_sent},{$lang->export_folder},{$lang->export_subject},{$lang->export_to},{$lang->export_from},{$lang->export_message}\n{$pmsdownload}', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (79, 'usercp_profile_customtitle', '<fieldset class="trow2">\n<legend><strong>{$lang->custom_usertitle}</strong></legend>\n<table cellspacing="0" cellpadding="{$theme[''tablespace'']}">\n<tr>\n<td><span class="smalltext">{$lang->custom_usertitle_note}</span></td>\n</tr>\n<tr>\n<td><span class="smalltext">{$lang->default_usertitle}</span></td>\n</tr>\n<tr>\n<td><span class="smalltext"><strong>{$defaulttitle}</strong></span></td>\n</tr>\n<tr>\n<td><span class="smalltext">{$lang->current_custom_usertitle}</span></td>\n</tr>\n<tr>\n<td><span class="smalltext"><strong>{$user[''usertitle'']}</strong></span></td>\n</tr>\n<tr>\n<td><span class="smalltext">{$lang->new_custom_usertitle}</span></td>\n</tr>\n<tr>\n<td><input type="text" class="textbox" name="usertitle" size="25" maxlength="{$mybb->settings[''customtitlemaxlength'']}" value="{$newtitle}" /></td>\n</tr>\n<tr>\n<td><span class="smalltext"><input type="checkbox" name="reverttitle" id="reverttitle" class="checkbox" /> {$lang->revert_usertitle}</span></td>\n</tr>\n</table>\n</fieldset>\n<br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (80, 'usercp_attachments_none', '<tr>\n<td class="trow1" align="center" colspan="5">{$lang->no_attachments}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (81, 'usercp_nav_changename', '<div><a href="usercp.php?action=changename" class="usercp_nav_item usercp_nav_username">{$lang->ucp_nav_change_username}</a></div>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (82, 'usercp_profile', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->edit_profile}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="usercp.php" method="post" name="input">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n{$errors}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->edit_profile}</strong></td>\n</tr>\n<tr>\n<td width="50%" class="trow1" valign="top">\n<fieldset class="trow2">\n<legend><strong>{$lang->profile_required}</strong></legend>\n<table cellspacing="0" cellpadding="{$theme[''tablespace'']}">\n<tr>\n<td colspan="2"><span class="smalltext"><strong>{$lang->change_email_notice}</strong></span></td>\n</tr>\n{$requiredfields}\n</table>\n</fieldset>\n<br />\n<fieldset class="trow2">\n<legend><strong>{$lang->profile_optional}</strong></legend>\n<table cellspacing="0" cellpadding="{$theme[''tablespace'']}">\n<tr>\n<td colspan="3"><span class="smalltext">{$lang->birthday}</span></td>\n</tr>\n<tr>\n<td>\n<select name="bday1">\n<option value="">&nbsp;</option>\n{$bdaydaysel}\n</select>\n</td>\n<td>\n<select name="bday2">\n<option value="">&nbsp;</option>\n<option value="1" {$bdaymonthsel[''1'']}>{$lang->month_1}</option>\n<option value="2" {$bdaymonthsel[''2'']}>{$lang->month_2}</option>\n<option value="3" {$bdaymonthsel[''3'']}>{$lang->month_3}</option>\n<option value="4" {$bdaymonthsel[''4'']}>{$lang->month_4}</option>\n<option value="5" {$bdaymonthsel[''5'']}>{$lang->month_5}</option>\n<option value="6" {$bdaymonthsel[''6'']}>{$lang->month_6}</option>\n<option value="7" {$bdaymonthsel[''7'']}>{$lang->month_7}</option>\n<option value="8" {$bdaymonthsel[''8'']}>{$lang->month_8}</option>\n<option value="9" {$bdaymonthsel[''9'']}>{$lang->month_9}</option>\n<option value="10" {$bdaymonthsel[''10'']}>{$lang->month_10}</option>\n<option value="11" {$bdaymonthsel[''11'']}>{$lang->month_11}</option>\n<option value="12" {$bdaymonthsel[''12'']}>{$lang->month_12}</option>\n</select>\n</td>\n<td>\n<input type="text" class="textbox" size="4" maxlength="4" name="bday3" value="{$bday[''2'']}" />\n</td>\n</tr>\n<tr>\n<td colspan="3">\n<span class="smalltext">{$lang->birthdayprivacy}</span>\n</td>\n</tr>\n<tr>\n<td colspan="3">\n<select name="birthdayprivacy">\n{$bdayprivacysel}\n</select>\n</td>\n</tr>\n<tr>\n<td colspan="3"><span class="smalltext">{$lang->website_url}</span></td>\n</tr>\n<tr>\n<td colspan="3"><input type="text" class="textbox" name="website" size="25" maxlength="75" value="{$user[''website'']}" /></td>\n</tr>\n</table>\n</fieldset>\n{$customfields}\n</td>\n<td width="50%" class="trow1" valign="top">\n{$customtitle}\n<fieldset class="trow2">\n<legend><strong>{$lang->additional_contact_details}</strong></legend>\n<table cellspacing="0" cellpadding="{$theme[''tablespace'']}">\n<tr>\n<td><span class="smalltext">{$lang->icq_number}</span></td>\n</tr>\n<tr>\n<td><input type="text" class="textbox" name="icq" size="25" value="{$user[''icq'']}" /></td>\n</tr>\n<tr>\n<td><span class="smalltext">{$lang->aim_screenname}</span></td>\n</tr>\n<tr>\n<td><input type="text" class="textbox" name="aim" size="25" value="{$user[''aim'']}" /></td>\n</tr>\n<tr>\n<td><span class="smalltext">{$lang->msn}</span></td>\n</tr>\n<tr>\n<td><input type="text" class="textbox" name="msn" size="25" value="{$user[''msn'']}" /></td>\n</tr>\n<tr>\n<td><span class="smalltext">{$lang->yahoo_id}</span></td>\n</tr>\n<tr>\n<td><input type="text" class="textbox" name="yahoo" size="25" value="{$user[''yahoo'']}" /></td>\n</tr>\n</table>\n</fieldset>\n{$awaysection}\n</td>\n</tr>\n</table>\n<br />\n<div align="center">\n<input type="hidden" name="action" value="do_profile" />\n<input type="submit" class="button" name="regsubmit" value="{$lang->update_profile}" />\n</div>\n</td>\n</tr>\n</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (83, 'post_attachments', '<br />\n			<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n	<td class="thead" colspan="3"><strong>{$lang->attachments}</strong></td>\n</tr>\n<tr>\n	<td class="tcat smalltext" colspan="3">{$lang->attach_quota} <a href="usercp.php?action=attachments">{$lang->view_attachments}</a></td>\n</tr>\n{$newattach}\n{$attachments}\n</table>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (84, 'usercp_attachments', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->attachments_manager}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="usercp.php" method="post" name="attachmentsmanager">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="5"><strong>{$lang->attachments_manager} {$usagenote}</strong></td>\n</tr>\n<tr>\n<td class="tcat" colspan="2" width="40%"><span class="smalltext"><strong>{$lang->attachments_attachment}</strong></span></td>\n<td class="tcat" width="40%"><span class="smalltext"><strong>{$lang->attachments_post}</strong></span></td>\n<td class="tcat" align="center" width="20%"><span class="smalltext"><strong>{$lang->date_uploaded}</strong></span></td>\n<td class="tcat" width="1"><input type="checkbox" class="checkbox checkall" /></td>\n</tr>\n{$attachments}\n</table>\n{$multipage}\n<br />\n<div align="center">\n<input type="hidden" name="action" value="do_attachments" />\n<input type="submit" class="button" value="{$lang->delete_attachments}" />\n</div>\n<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->attachments_stats}</strong></td>\n</tr>\n<tr>\n<td class="trow1" width="40%"><strong>{$lang->attachstats_attachs}</strong></td>\n<td class="trow1" width="60%">{$totalattachments}</td>\n</tr>\n<tr>\n<td class="trow2" width="40%"><strong>{$lang->attachstats_spaceused}</strong></td>\n<td class="trow2" width="60%">{$friendlyusage} ({$percent})</td>\n</tr>\n<tr>\n<td class="trow1" width="40%"><strong>{$lang->attachstats_quota}</strong></td>\n<td class="trow1" width="60%">{$attachquota}</td>\n</tr>\n<tr>\n<td class="trow2" width="40%"><strong>{$lang->attachstats_totaldl}</strong></td>\n<td class="trow2" width="60%">{$totaldownloads}</td>\n</tr>\n<tr>\n<td class="trow1" width="40%"><strong>{$lang->attachstats_bandwidth}</strong></td>\n<td class="trow1" width="60%">{$bandwidth}</td>\n</tr>\n</table>\n</td>\n</tr>\n</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (85, 'usercp_attachments_attachment', '<tr>\n<td class="{$altbg}" width="1">{$icon}</td>\n<td class="{$altbg}" width="40%"><a href="attachment.php?aid={$attachment[''aid'']}" target="_blank">{$attachment[''filename'']}</a><br /><span class="smalltext">{$sizedownloads}</span></td>\n<td class="{$altbg}"><a href="{$attachment[''postlink'']}#pid{$attachment[''pid'']}">{$attachment[''subject'']}</a><br /><span class="smalltext">{$lang->attachment_thread} <a href="{$attachment[''threadlink'']}">{$attachment[''threadsubject'']}</a></span></td>\n<td class="{$altbg}" align="center">{$attachdate}, {$attachtime}</td>\n<td class="{$altbg}" width="1"><input type="checkbox" class="checkbox" name="attachments[{$attachment[''aid'']}]" value="{$attachment[''aid'']}" /></td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (86, 'misc_rules_forum', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$forum[''rulestitle'']}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="{$colspan}"><strong>{$forum[''rulestitle'']}</strong></td>\n</tr>\n<tr>\n<td class="trow1">{$forum[''rules'']}</td>\n</tr>\n</table>\n{$footer}\n</body>\n</html>', -2, '1210', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (87, 'forumdisplay_rules', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead"><strong>{$foruminfo[''rulestitle'']}</strong></td>\n</tr>\n<tr>\n<td class="trow1"><span class="smalltext">{$foruminfo[''rules'']}</span></td>\n</tr>\n</table>\n<br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (88, 'forumdisplay_rules_link', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="trow1"><strong><a href="misc.php?action=rules&amp;fid={$fid}">{$foruminfo[''rulestitle'']}</a></strong></td>\n</tr>\n</table>\n<br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (89, 'forumdisplay', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$foruminfo[''name'']} </title>\n{$headerinclude}\n{$rssdiscovery}\n<script type="text/javascript">\n<!--\n	lang.no_new_posts = "{$lang->no_new_posts}";\n	lang.click_mark_read = "{$lang->click_mark_read}";\n// -->\n</script>\n</head>\n<body>\n{$header}\n{$moderatedby}\n{$usersbrowsing}\n{$rules}\n{$subforums}\n{$threadslist}\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (90, 'member_register_referrer', '<br />\n<fieldset class="trow2">\n<legend><strong>{$lang->referrer}</strong></legend>\n<table cellspacing="0" cellpadding="{$theme[''tablespace'']}">\n<tr>\n<td><span class="smalltext"><label for="referrer">{$lang->referrer_desc}</label></span></td>\n</tr>\n<tr>\n<td>\n<input type="text" class="textbox" name="referrername" id="referrer" value="{$referrername}" style="width: 100%;" />\n</td>\n</tr></table>\n</fieldset>\n<script type="text/javascript" src="jscripts/autocomplete.js?ver=1400"></script>\n<script type="text/javascript">\n<!--\n	if(use_xmlhttprequest == "1")\n	{\n		new autoComplete("referrer", "xmlhttp.php?action=get_users", {valueSpan: "username"});\n	}\n// -->\n</script>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (91, 'usercp_usergroups_joingroup', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->request_join_usergroup}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="usercp.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->request_join_usergroup}</strong></td>\n</tr>\n<tr>\n<td class="trow1" align="center" colspan="2">{$lang->join_group_moderate_note}</td>\n</tr>\n<tr>\n<td class="trow2"><strong>{$lang->user_group}</strong></td>\n<td class="trow2">{$usergroup[''title'']}</td>\n</tr>\n<tr>\n<td class="trow1"><strong>{$lang->join_reason}</strong></td>\n<td class="trow1"><input type="text" class="textbox" name="reason" value="" size="50" /></td>\n</tr>\n</table>\n<br />\n<div align="center">\n<input type="hidden" name="action" value="usergroups" />\n<input type="hidden" name="joingroup" value="{$joingroup}" />\n<input type="hidden" name="do" value="joingroup" />\n<input type="submit" class="button" value="{$lang->send_join_request}" />\n</div>\n</td>\n</tr>\n</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (92, 'usercp_avatar', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->change_avatar}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n{$avatar_error}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->change_avatar}</strong></td>\n</tr>\n<tr>\n<td class="trow1" colspan="2">\n<table cellspacing="0" cellpadding="0" width="100%"><tr>\n<td>{$lang->avatar_note}{$avatarmsg}\n</td>\n{$currentavatar}\n</tr></table>\n</td>\n</tr>\n<tr>\n<td class="tcat" colspan="2"><strong>{$lang->local_galleries}</strong></td>\n</tr>\n<tr>\n<td class="trow2"><strong>{$lang->gallery}</strong></td>\n<td class="trow2">\n<form method="post" action="usercp.php">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<input type="hidden" name="action" value="avatar" />\n<select name="gallery">\n{$galleries}\n</select>\n&nbsp;{$gobutton}\n</form>\n</td>\n</tr>\n<tr>\n<td class="tcat" colspan="2"><strong>{$lang->custom_avatar}</strong></td>\n</tr>\n<tr>\n<td class="trow1" width="40%"><strong>{$lang->avatar_upload}</strong></td>\n<td class="trow1" width="60%">\n<form enctype="multipart/form-data" action="usercp.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<input type="file" name="avatarupload" size="25" class="fileupload" />\n{$auto_resize}\n</td>\n</tr>\n<tr>\n<td class="trow2" width="40%"><strong>{$lang->avatar_url}</strong></td>\n<td class="trow2" width="60%"><input type="text" class="textbox" name="avatarurl" size="45" value="{$avatarurl}" /></td>\n</tr>\n</table>\n<br />\n<div align="center">\n<input type="hidden" name="action" value="do_avatar" />\n<input type="submit" class="button" name="submit" value="{$lang->change_avatar}" />\n<input type="submit" class="button" name="remove" value="{$lang->remove_avatar}" />\n</div>\n</td>\n</tr>\n</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (93, 'usercp_avatar_gallery', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->change_avatar}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n{$avatar_error}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead"><strong>{$lang->change_avatar}</strong></td>\n</tr>\n<tr>\n<td class="tcat"><strong>{$lang->local_galleries}</strong></td>\n</tr>\n<tr>\n<td class="trow1" align="center">\n<form method="post" action="usercp.php">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<input type="hidden" name="action" value="avatar" />\n<select name="gallery">\n{$galleries}\n</select>\n&nbsp;{$gobutton}\n</form>\n</td>\n</tr>\n<tr>\n<td class="tcat"><strong>{$lang->avatars_in_gallery}</strong></td>\n</tr>\n<tr>\n<td class="trow2">\n<form method="post" action="usercp.php">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<input type="hidden" name="action" value="do_avatar" />\n<input type="hidden" name="gallery" value="{$gallery}" />\n<table width="100%" cellpadding="4">\n{$avatarlist}\n</table>\n</td>\n</tr>\n</table>\n<br />\n<div align="center">\n<input type="hidden" name="action" value="do_avatar" />\n<input type="submit" class="button" name="submit" value="{$lang->change_avatar}" />\n</div>\n</td>\n</tr>\n</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (94, 'usercp_avatar_gallery_avatar', '<td width="20%" align="center"><label for="avatar-{$avatar}"><img src="{$avatarpath}" alt="{$avatar}" title="{$avatar}" /><br /><input type="radio" class="radio" name="avatar" value="{$avatar}" id="avatar-{$avatar}" /><strong>{$avatarname}</strong></td>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (95, 'usercp_avatar_current', '<td class="trow1" width="150" align="right"><img src="{$urltoavatar}" alt="{$lang->avatar}" title="{$lang->avatar}" {$avatar_width_height} /></td>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (96, 'headerinclude', '<link rel="alternate" type="application/rss+xml" title="{$lang->latest_threads} (RSS 2.0)" href="{$mybb->settings[''bburl'']}/syndication.php" />\n<link rel="alternate" type="application/atom+xml" title="{$lang->latest_threads} (Atom 1.0)" href="{$mybb->settings[''bburl'']}/syndication.php?type=atom1.0" />\n<meta http-equiv="Content-Type" content="text/html; charset={$charset}" />\n<meta http-equiv="Content-Script-Type" content="text/javascript" />\n<script type="text/javascript" src="{$mybb->settings[''bburl'']}/jscripts/prototype.js?ver=1400"></script>\n<script type="text/javascript" src="{$mybb->settings[''bburl'']}/jscripts/general.js?ver=1400"></script>\n<script type="text/javascript" src="{$mybb->settings[''bburl'']}/jscripts/popup_menu.js?ver=1400"></script>\n{$stylesheets}\n<script type="text/javascript">\n<!--\n	var cookieDomain = "{$mybb->settings[''cookiedomain'']}";\n	var cookiePath = "{$mybb->settings[''cookiepath'']}";\n	var cookiePrefix = "{$mybb->settings[''cookieprefix'']}";\n	var deleteevent_confirm = "{$lang->deleteevent_confirm}";\n	var removeattach_confirm = "{$lang->removeattach_confirm}";\n	var loading_text = ''{$lang->ajax_loading}'';\n	var saving_changes = ''{$lang->saving_changes}'';\n	var use_xmlhttprequest = "{$mybb->settings[''use_xmlhttprequest'']}";\n	var my_post_key = "{$mybb->post_code}";\n	var imagepath = "{$theme[''imgdir'']}";\n// -->\n</script>\n{$newpmmsg}', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (97, 'showthread_similarthreads', '<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" align="center" colspan="6"><strong>{$lang->similar_threads}</strong></td>\n</tr>\n<tr>\n<td class="tcat" align="center" colspan="2"><span class="smalltext"><strong>{$lang->thread}</strong></span></td>\n<td class="tcat" align="center"><span class="smalltext"><strong>{$lang->author}</strong></span></td>\n<td class="tcat" align="center"><span class="smalltext"><strong>{$lang->replies}</strong></span></td>\n<td class="tcat" align="center"><span class="smalltext"><strong>{$lang->views}</strong></span></td>\n<td class="tcat" align="center"><span class="smalltext"><strong>{$lang->lastpost}</strong></span></td>\n</tr>\n{$similarthreadbits}\n</table>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (98, 'nav_sep', ' / ', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (99, 'post_attachments_new', '<tr>\n<td class="trow1" width="1"><img src="{$theme[''imgdir'']}/paperclip.gif" alt="" /></td>\n<td class="trow1" style="white-space: nowrap"><strong>{$lang->new_attachment}</strong> <input type="file" name="attachment" size="30" class="fileupload" /></td><td class="trow1" align="center"><input type="submit" class="button" name="newattachment" value="{$lang->add_attachment}"  tabindex="12" />\n</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (100, 'nav_sep_active', ' / ', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (101, 'member_profile_online', '<a href="online.php"><span class="online" style="font-weight: bold;">{$lang->postbit_status_online}</span></a> ({$location} @ {$location_time})', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (102, 'member_profile_offline', '<span class="offline" style="font-weight: bold;">{$lang->postbit_status_offline}</span>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (103, 'member_profile', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->profile}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="trow1">\n<table width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td class="trow1" width="75%">\n<span class="largetext"><strong>{$formattedname}</strong></span><br />\n<span class="smalltext">\n({$usertitle})<br />\n{$groupimage}\n{$userstars}<br />\n<br />\n<strong>{$lang->registration_date}</strong> {$memregdate}<br />\n<strong>{$lang->date_of_birth}</strong> {$membday} {$membdayage}<br />\n<strong>{$lang->local_time}</strong> {$localtime}<br />\n<strong>{$lang->postbit_status}</strong> {$online_status}\n</span>\n</td><td width="25%" align="right" valign="middle">{$avatar}</td></tr></table>\n</td>\n</tr>\n{$awaybit}\n</table>\n<br />\n<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">\n<tr>\n<td width="50%" valign="top">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td colspan="2" class="thead"><strong>{$lang->users_forum_info}</strong></td>\n</tr>\n<tr>\n<td class="trow1"><strong>{$lang->joined}</strong></td>\n<td class="trow1">{$memregdate}</td>\n</tr>\n<tr>\n<td class="trow2"><strong>{$lang->lastvisit}</strong></td>\n<td class="trow2">{$memlastvisitdate} {$memlastvisittime}</td>\n</tr>\n<tr>\n<td class="trow1"><strong>{$lang->total_posts}</strong></td>\n<td class="trow1">{$memprofile[''postnum'']} ({$lang->ppd_percent_total})<br /><span class="smalltext">(<a href="search.php?action=finduserthreads&amp;uid={$uid}">{$lang->find_threads}</a> &mdash; <a href="search.php?action=finduser&amp;uid={$uid}">{$lang->find_posts}</a>)</span></td>\n</tr>\n<tr>\n<td class="trow2"><strong>{$lang->timeonline}</strong></td>\n<td class="trow2">{$timeonline}</td>\n</tr>\n{$reputation}\n{$warning_level}\n</table>\n<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td colspan="2" class="thead"><strong>{$lang->users_contact_details}</strong></td>\n</tr>\n<tr>\n<td class="trow1"><strong>{$lang->homepage}</strong></td>\n<td class="trow1">{$website}</td>\n</tr>\n{$sendemail}\n<tr>\n<td class="trow2"><strong>{$lang->pm}</strong></td>\n<td class="trow2"><a href="private.php?action=send&amp;uid={$memprofile[''uid'']}">{$lang->send_pm}</a></td>\n</tr>\n<tr>\n<td class="trow1"><strong>{$lang->icq_number}</strong></td>\n<td class="trow1"><a href="javascript:;" onclick="MyBB.popupWindow(''misc.php?action=imcenter&amp;imtype=icq&amp;uid={$uid}'', ''imcenter'', 450, 300);">{$memprofile[''icq'']}</a></td>\n</tr>\n<tr>\n<td class="trow2"><strong>{$lang->aim_screenname}</strong></td>\n<td class="trow2"><a href="javascript:;" onclick="MyBB.popupWindow(''misc.php?action=imcenter&amp;imtype=aim&amp;uid={$uid}'', ''imcenter'', 450, 300);">{$memprofile[''aim'']}</a></td>\n</tr>\n<tr>\n<td class="trow1"><strong>{$lang->yahoo_id}</strong></td>\n<td class="trow1"><a href="javascript:;" onclick="MyBB.popupWindow(''misc.php?action=imcenter&amp;imtype=yahoo&amp;uid={$uid}'', ''imcenter'', 450, 300);">{$memprofile[''yahoo'']}</a></td>\n</tr>\n<tr>\n<td class="trow2"><strong>{$lang->msn}</strong></td>\n<td class="trow2"><a href="javascript:;" onclick="MyBB.popupWindow(''misc.php?action=imcenter&amp;imtype=msn&amp;uid={$uid}'', ''imcenter'', 450, 300);">{$memprofile[''msn'']}</a></td>\n</tr>\n</table>\n</td>\n<td><img src="{$theme[''imgdir'']}/pixel.gif" height="1" width="8" alt=""/></td>\n<td width="50%" valign="top">\n{$profilefields}\n{$signature}\n{$modoptions}\n</td>\n</tr>\n</table>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (104, 'member_profile_modoptions', '\n<br /><table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" width="100%" class="tborder">\n<tr>\n<td colspan="2" class="thead"><strong>{$lang->mod_options}</strong></td>\n</tr>\n<tr>\n<td class="trow1">\n<ul>\n<li><a href="{$mybb->settings[''bburl'']}/modcp.php?action=editprofile&amp;uid={$uid}">{$lang->edit_in_mcp}</a></li>\n<li><a href="{$mybb->settings[''bburl'']}/modcp.php?action=banuser&amp;uid={$uid}">{$lang->ban_in_mcp}</a></li>\n</ul>\n</td>\n</tr>\n</table>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (105, 'header_welcomeblock_guest', '<script type="text/javascript">\n<!--\n	lang.username = "{$lang->login_username}";\n	lang.password = "{$lang->login_password}";\n	lang.login = "{$lang->login}";\n	lang.lost_password = " &mdash; <a href=\\"{$mybb->settings[''bburl'']}/member.php?action=lostpw\\">{$lang->lost_password}<\\/a>";\n	lang.register_url = " &mdash; <a href=\\"{$mybb->settings[''bburl'']}/member.php?action=register\\">{$lang->welcome_register}<\\/a>";\n// -->\n</script>\n<span style="float: right;">{$lang->welcome_current_time}</span>\n		<span id="quick_login">{$lang->welcome_guest} (<a href="{$mybb->settings[''bburl'']}/member.php?action=login" onclick="MyBB.quickLogin(); return false;">{$lang->welcome_login}</a> &mdash; <a href="{$mybb->settings[''bburl'']}/member.php?action=register">{$lang->welcome_register}</a>)</span>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (106, 'header', '	<div id="container">\n		<a name="top" id="top"></a>\n		<div id="header">\n			<div class="logo"><a href="{$mybb->settings[''bburl'']}/index.php"><img src="{$theme[''logo'']}" alt="{$mybb->settings[''bbname'']}" title="{$mybb->settings[''bbname'']}" /></a></div>\n			<div class="menu">\n				<ul>\n					<li><a href="{$mybb->settings[''bburl'']}/search.php"><img src="{$mybb->settings[''bburl'']}/{$theme[''imgdir'']}/toplinks/search.gif" alt="" title="" />{$lang->toplinks_search}</a></li>\n					<li><a href="{$mybb->settings[''bburl'']}/memberlist.php"><img src="{$mybb->settings[''bburl'']}/{$theme[''imgdir'']}/toplinks/memberlist.gif" alt="" title="" />{$lang->toplinks_memberlist}</a></li>\n					<li><a href="{$mybb->settings[''bburl'']}/calendar.php"><img src="{$mybb->settings[''bburl'']}/{$theme[''imgdir'']}/toplinks/calendar.gif" alt="" title="" />{$lang->toplinks_calendar}</a></li>\n					<li><a href="{$mybb->settings[''bburl'']}/misc.php?action=help"><img src="{$mybb->settings[''bburl'']}/{$theme[''imgdir'']}/toplinks/help.gif" alt="" title="" />{$lang->toplinks_help}</a></li>\n				</ul>\n			</div>\n			<hr class="hidden" />\n			<div id="panel">\n				{$welcomeblock}\n			</div>\n		</div>\n		<hr class="hidden" />\n		<br class="clear" />\n		<div id="content">\n			{$pm_notice}\n			{$bannedwarning}\n			{$bbclosedwarning}\n			{$unreadreports}\n			<navigation>\n			<br />\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (107, 'usercp_usergroups_leader_usergroup', '<tr>\n<td class="{$trow}"><strong>{$usergroup[''title'']}</strong></td>\n<td class="{$trow}" align="center">{$usergroup[''users'']} {$memberlistlink}</td>\n<td class="{$trow}" align="center">{$usergroup[''joinrequests'']} {$moderaterequestslink}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (108, 'usercp_usergroups_leader', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="3"><strong>{$lang->usergroups_leader}</strong></td>\n</tr>\n<tr>\n<td class="tcat" width="36%"><strong><span class="smalltext">{$lang->usergroup}</span></strong></td>\n<td class="tcat" align="center" width="32%"><strong><span class="smalltext">{$lang->usergroup_members}</span></strong></td>\n<td class="tcat" align="center" width="32%"><strong><span class="smalltext">{$lang->join_requests}</span></strong></td>\n</tr>\n{$groupsledlist}\n</table>\n<br />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (109, 'usercp_usergroups_joinable', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="3"><strong>{$lang->usergroups_joinable}</strong></td>\n</tr>\n<tr>\n<td class="tcat" width="36%"><strong><span class="smalltext">{$lang->usergroup}</span></strong></td>\n<td class="tcat" align="center" width="32%"><strong><span class="smalltext">{$lang->join_conditions}</span></strong></td>\n<td class="tcat" align="center" width="32%"><strong><span class="smalltext">{$lang->join_group}</span></strong></td>\n</tr>\n{$joinablegrouplist}\n</table>\n<br />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (110, 'usercp_usergroups_joinable_usergroup', '<tr>\n<td class="{$trow}"><strong>{$usergroup[''title'']}</strong>{$description}</td>\n<td class="{$trow}"><span class="smalltext">{$conditions}</span><br /><span class="smalltext">{$usergroupleaders}</span></td>\n<td class="{$trow}" align="center">{$joinlink}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (111, 'usercp_usergroups_memberof_usergroup', '<tr>\n<td class="{$trow}"><strong>{$usergroup[''title'']}</strong> {$displaycode}{$description}</td>\n<td class="{$trow}" align="center">{$usergroup[''usertitle'']}</td>\n<td class="{$trow}">{$leavelink}</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (112, 'usercp_usergroups', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->group_memberships}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n{$leadinggroups}\n{$joinablegroups}\n{$membergroups}\n</td>\n</tr>\n</table>\n{$footer}\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (113, 'usercp_usergroups_memberof', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="3"><strong>{$lang->usergroups_memberof}</strong></td>\n</tr>\n<tr>\n<td class="tcat" width="35%"><strong><span class="smalltext">{$lang->usergroup}</span></strong></td>\n<td class="tcat" align="center" width="32%"><strong><span class="smalltext">{$lang->usertitle}</span></strong></td>\n<td class="tcat" align="center" width="32%"><strong><span class="smalltext">{$lang->usergroup_leave}</span></strong></td>\n</tr>\n{$memberoflist}\n</table>\n<br />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (114, 'managegroup', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->members_of}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n{$joinrequests}\n<p>{$usergrouptype}</p>\n<form method="post" action="managegroup.php">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<input type="hidden" name="action" value="do_manageusers" />\n<input type="hidden" name="gid" value="{$gid}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="6"><strong>{$lang->members_of}</strong></td>\n</tr>\n<tr>\n<td class="tcat" width="40%"><span class="smalltext"><strong>{$lang->user_name}</strong></span></td>\n<td class="tcat" colspan="2" align="center"><span class="smalltext"><strong>{$lang->contact}</strong></span></td>\n<td class="tcat" align="center" width="15%"><span class="smalltext"><strong>{$lang->reg_date}</strong></span></td>\n<td class="tcat" align="center" width="15%"><span class="smalltext"><strong>{$lang->post_count}</strong></span></td>\n<td class="tcat" width="1">&nbsp;</td>\n</tr>\n{$users}\n</table>\n<br />\n<div align="center">{$remove_users}</div>\n</form>\n{$add_user}\n\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (115, 'managegroup_removeusers', '<input type="submit" class="button" value="{$lang->remove_selected}" />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (116, 'managegroup_adduser', '<br />\n<form method="post" action="managegroup.php">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<input type="hidden" name="action" value="do_add" />\n<input type="hidden" name="gid" value="{$gid}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="6"><strong>{$lang->add_member}</strong></td>\n</tr>\n<tr>\n<td class="trow1">{$lang->username}</td>\n<td class="trow1"><input type="text" class="textbox" name="username" size="40" maxlength="{$mybb->settings[''maxnamelength'']}" /></td>\n</tr>\n</table>\n<br />\n<div align="center"><input type="submit" class="button" value="{$lang->add_member_submit}" /></div>\n</form>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (117, 'managegroup_user', '<tr>\n<td class="{$altbg}">{$user[''profilelink'']} {$leader}</td>\n<td class="{$altbg}" align="center" width="100">{$email}</td>\n<td class="{$altbg}" align="center" width="100">{$sendpm}</td>\n<td class="{$altbg}" align="center">{$regdate}</td>\n<td class="{$altbg}" align="center">{$user[''postnum'']}</td>\n<td class="{$altbg}" align="center">{$checkbox}</td>\n</tr>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (118, 'managegroup_user_checkbox', '<input type="checkbox" class="checkbox" name="removeuser[{$user[''uid'']}]" value="{$user[''uid'']}" />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (119, 'managegroup_requestnote', '<p>\n<strong><a href="managegroup.php?action=joinrequests&amp;gid={$gid}">{$lang->pending_requests}</a></strong><br />\n{$lang->num_requests_pending}\n</p>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (120, 'managegroup_joinrequests', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->join_requests}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n{$joinrequests}\n<form method="post" action="managegroup.php">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<input type="hidden" name="action" value="do_joinrequests" />\n<input type="hidden" name="gid" value="{$gid}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="6"><strong>{$lang->join_requests}</strong></td>\n</tr>\n<tr>\n<td class="tcat" width="30%"><strong>{$lang->user_name}</strong></td>\n<td class="tcat" align="center" width="40%"><strong>{$lang->reason}</strong></td>\n<td class="tcat" align="center" width="10%"><strong>{$lang->accept}</strong></td>\n<td class="tcat" align="center" width="10%"><strong>{$lang->ignore}</strong></td>\n<td class="tcat" align="center" width="10%"><strong>{$lang->decline}</strong></td>\n</tr>\n{$users}\n</table>\n<br />\n<div align="center"><input type="submit" class="button" value="{$lang->action_requests}" /></div>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (121, 'managegroup_joinrequests_request', '<tr>\n<td class="{$altbg}">{$user[''profilelink'']}</td>\n<td class="{$altbg}" align="center">{$user[''reason'']}</td>\n<td class="{$altbg}" align="center"><input type="radio" class="radio" name="request[{$user[''uid'']}]" value="accept" /></td>\n<td class="{$altbg}" align="center"><input type="radio" class="radio" name="request[{$user[''uid'']}]" value="ignore" checked="checked" /></td>\n<td class="{$altbg}" align="center"><input type="radio" class="radio" name="request[{$user[''uid'']}]" value="decline" /></td>\n</tr>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (122, 'private_send', '<html>\n<head>\n<title>{$lang->compose_pm}</title>\n{$headerinclude}\n<script type="text/javascript" src="jscripts/usercp.js?ver=1400"></script>\n</head>\n<body>\n{$header}\n<form action="private.php" method="post" name="input">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n{$preview}\n{$send_errors}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->compose_pm}</strong></td>\n</tr>\n<tr>\n<td class="trow1" valign="top" width="200"><strong>{$lang->compose_to}</strong>\n	<script type="text/javascript">\n	<!--\n		document.write(''(<a href="#" onclick="showBcc(); return false;" title="{$lang->compose_bcc_show_title}">{$lang->compose_bcc_show}<\\/a>)'');\n	// -->\n	</script>\n	<br /><span class="smalltext">{$lang->separate_names}{$buddy_select_to}</span></td>\n<td class="trow1" valign="top"><textarea name="to" id="to" rows="2" cols="38" tabindex="1">{$to}</textarea>{$max_recipients}</td>\n</tr>\n<tr id="bcc_area">\n<td class="trow2" valign="top"><strong>{$lang->compose_bcc}</strong>{$buddy_select_bcc}</td>\n<td class="trow2"><textarea name="bcc" id="bcc" rows="2" cols="38" tabindex="1">{$bcc}</textarea></td>\n</tr>\n<tr>\n<td class="trow1"><strong>{$lang->compose_subject}</strong></td>\n<td class="trow1"><input type="text" class="textbox" name="subject" size="40" maxlength="85" value="{$subject}" tabindex="3" /></td>\n</tr>\n{$posticons}\n<tr>\n<td class="trow2" valign="top"><strong>{$lang->compose_message}</strong>{$smilieinserter}</td>\n<td class="trow2">\n<textarea name="message" id="message" rows="20" cols="70" tabindex="4">{$message}</textarea>\n{$codebuttons}\n</td>\n</tr>\n<tr>\n<td class="trow1" valign="top"><strong>{$lang->compose_options}</strong></td>\n<td class="trow1"><span class="smalltext">\n<label><input type="checkbox" class="checkbox" name="options[signature]" value="1" tabindex="5" {$optionschecked[''signature'']} />{$lang->options_sig}</label><br />\n<label><input type="checkbox" class="checkbox" name="options[disablesmilies]" value="1" tabindex="6" {$optionschecked[''disablesmilies'']} />{$lang->options_disable_smilies}</label><br />\n<label><input type="checkbox" class="checkbox" name="options[savecopy]" value="1" tabindex="7" {$optionschecked[''savecopy'']} />{$lang->options_save_copy}</label><br />\n<label><input type="checkbox" class="checkbox" name="options[readreceipt]" value="1" tabindex="8" {$optionschecked[''readreceipt'']} />{$lang->options_read_receipt}</label><br />\n</span></td>\n</tr>\n</table>\n<br />\n<input type="hidden" name="action" value="do_send" />\n<input type="hidden" name="pmid" value="{$pmid}" />\n<input type="hidden" name="do" value="{$do}" />\n<div style="text-align: center;">\n<input type="submit" class="button" name="submit" value="{$lang->send_message}" tabindex="9" accesskey="s" />\n<input type="submit" class="button" name="saveasdraft" value="{$lang->save_draft}" tabindex="10" />\n<input type="submit" class="button" name="preview" value="{$lang->preview}" tabindex="11" />\n</div>\n</td>\n</tr>\n</table>\n</form>\n{$footer}\n<script type="text/javascript">\n<!--\n	if($(''bcc_area'') && $(''bcc'').value == "")\n	{\n		$(''bcc_area'').style.display = ''none'';\n	}\n\n	function showBcc()\n	{\n		if($(''bcc_area'').style.display == ''none'')\n		{\n			$(''bcc_area'').style.display = '''';\n		}\n		else\n		{\n			$(''bcc_area'').style.display = ''none'';\n		}\n	}\n// -->\n</script>\n{$autocompletejs}\n</body>\n</html>', -2, '1402', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (123, 'showthread_newreply_closed', '<a href="newreply.php?tid={$tid}"><img src="{$theme[''imglangdir'']}/closed.gif" alt="{$lang->thread_closed}" title="{$lang->thread_closed}" /></a>&nbsp;', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (124, 'polls_editpoll', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->edit_poll}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n{$preview}\n<form action="moderation.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="3"><strong>{$lang->delete_poll}</strong></td>\n</tr>\n<tr>\n<td class="trow1" style="white-space: nowrap"><input type="checkbox" class="checkbox" name="delete" value="1" tabindex="9" /><strong>{$lang->delete_q}</strong></td>\n<td class="trow1" width="100%">{$lang->delete_note}<br /><span class="smalltext">{$lang->delete_note2}</span></td>\n<td class="trow1" style="white-space: nowrap"><input type="submit" class="button" name="submit" value="{$lang->delete_poll}" tabindex="10" /></td>\n</table>\n<input type="hidden" name="action" value="do_deletepoll" />\n<input type="hidden" name="tid" value="{$tid}" />\n</form>\n<br />\n<form action="polls.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->edit_poll}</strong></td>\n</tr>\n{$loginbox}\n<tr>\n<td class="trow2"><strong>{$lang->question}</strong></td>\n<td class="trow2"><input type="text" class="textbox" name="question" size="40" maxlength="240" value="{$question}" /></td>\n</tr>\n<tr>\n<td class="trow1" valign="top"><strong>{$lang->num_options}</strong><br /><span class="smalltext">{$lang->max_options} {$mybb->settings[''maxpolloptions'']}</span></td>\n<td class="trow1"><input type="text" class="textbox" name="numoptions" size="10" value="{$numoptions}" />&nbsp;&nbsp;<input type="submit" class="button" name="updateoptions" value="{$lang->update_options}" /></td>\n</tr>\n<tr>\n<td class="trow2" valign="top"><strong>{$lang->poll_options}</strong></td>\n<td class="trow2"><span class="smalltext">{$lang->poll_options_note}</span>\n<table border="0" cellspacing="0" cellpadding="0">\n{$optionbits}\n</table>\n</td>\n</tr>\n<tr>\n<td class="trow1" valign="top"><strong>{$lang->options}</strong></td>\n<td class="trow1"><span class="smalltext">\n<label><input type="checkbox" class="checkbox" name="postoptions[multiple]" value="1" {$postoptionschecked[''multiple'']} />&nbsp;{$lang->option_multiple}</label><br />\n<label><input type="checkbox" class="checkbox" name="postoptions[public]" value="1" {$postoptionschecked[''public'']} />&nbsp;{$lang->option_public}</label><br />\n<label><input type="checkbox" class="checkbox" name="postoptions[closed]" value="1" {$postoptionschecked[''closed'']} />&nbsp;{$lang->option_closed}</label>\n</span>\n</td>\n</tr>\n<tr>\n<td class="trow2" valign="top"><strong>{$lang->poll_timeout}</strong><br /><span class="smalltext">{$lang->timeout_note}</span></td>\n<td class="trow2"><input type="text" class="textbox" name="timeout" value="{$timeout}" /> {$lang->days_after} {$polldate}</td>\n</tr>\n</table>\n<br />\n<div align="center">\n<input type="submit" class="button" name="submit" value="{$lang->update_poll}" />\n</div>\n<input type="hidden" name="action" value="do_editpoll" />\n<input type="hidden" name="pid" value="{$pid}" />\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (125, 'forumbit_depth1_cat', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<thead>\n<tr>\n<td class="thead" colspan="5">\n<div class="expcolimage"><img src="{$theme[''imgdir'']}/{$expcolimage}" id="cat_{$forum[''fid'']}_img" class="expander" alt="{$expaltext}" title="{$expaltext}" /></div>\n<div><strong><a href="{$forum_url}">{$forum[''name'']}</a></strong><br /><div class="smalltext">{$forum[''description'']}</div></div>\n</td>\n</tr>\n</thead>\n<tbody style="{$expdisplay}" id="cat_{$forum[''fid'']}_e">\n<tr>\n<td class="tcat" colspan="2"><span class="smalltext"><strong>{$lang->forumbit_forum}</strong></span></td>\n<td class="tcat" width="85" align="center" style="white-space: nowrap"><span class="smalltext"><strong>{$lang->forumbit_threads}</strong></span></td>\n<td class="tcat" width="85" align="center" style="white-space: nowrap"><span class="smalltext"><strong>{$lang->forumbit_posts}</strong></span></td>\n<td class="tcat" width="200" align="center"><span class="smalltext"><strong>{$lang->forumbit_lastpost}</strong></span></td>\n</tr>\n{$sub_forums}\n</tbody>\n</table>\n<br />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (126, 'postbit_edit', '<a href="editpost.php?pid={$post[''pid'']}" id="edit_post_{$post[''pid'']}"><img src="{$theme[''imglangdir'']}/postbit_edit.gif" alt="{$lang->postbit_edit}" title="{$lang->postbit_edit}" /></a>\n<div id="edit_post_{$post[''pid'']}_popup" class="popup_menu" style="display: none;"><div class="popup_item_container"><a href="javascript:;" onclick="Thread.quickEdit({$post[''pid'']});" class="popup_item">{$lang->postbit_quick_edit}</a></div><div class="popup_item_container"><a href="editpost.php?pid={$post[''pid'']}" class="popup_item">{$lang->postbit_full_edit}</a></div></div>\n<script type="text/javascript">\n// <!--\n	if(use_xmlhttprequest == "1")\n	{\n		new PopupMenu("edit_post_{$post[''pid'']}");\n	}\n// -->\n</script>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (127, 'postbit_email', '<a href="member.php?action=emailuser&amp;uid={$post[''uid'']}"><img src="{$theme[''imglangdir'']}/postbit_email.gif" alt="{$lang->postbit_email}" title="{$lang->postbit_email}" /></a>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (128, 'postbit_find', '<a href="search.php?action=finduser&amp;uid={$post[''uid'']}"><img src="{$theme[''imglangdir'']}/postbit_find.gif" alt="{$lang->postbit_find}" title="{$lang->postbit_find}" /></a>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (129, 'postbit_pm', '<a href="private.php?action=send&amp;uid={$post[''uid'']}"><img src="{$theme[''imglangdir'']}/postbit_pm.gif" alt="{$lang->postbit_pm}" title="{$lang->postbit_pm}" /></a>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (130, 'postbit_quickdelete', '<a href="editpost.php?pid={$post[''pid'']}" onclick="Thread.deletePost({$post[''pid'']}); return false;" style="display: none;" id="quick_delete_{$post[''pid'']}"><img src="{$theme[''imglangdir'']}/postbit_delete.gif" alt="{$lang->postbit_qdelete}" title="{$lang->postbit_qdelete}" /></a>\n<script type="text/javascript">\n// <!--\n	$(''quick_delete_{$post[''pid'']}'').style.display = '''';\n// -->\n</script>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (131, 'postbit_quote', '<a href="newreply.php?tid={$tid}&amp;pid={$post[''pid'']}"><img src="{$theme[''imglangdir'']}/postbit_quote.gif" alt="{$lang->postbit_quote}" title="{$lang->postbit_quote}" /></a>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (132, 'postbit_report', '<a href="javascript:Thread.reportPost({$post[''pid'']});"><img src="{$theme[''imglangdir'']}/postbit_report.gif" alt="{$lang->postbit_report}" title="{$lang->postbit_report}" /></a>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (133, 'postbit_www', '<a href="{$post[''website'']}" target="_blank"><img src="{$theme[''imglangdir'']}/postbit_www.gif" alt="{$lang->postbit_website}" title="{$lang->postbit_website}" /></a>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (134, 'polls_showresults_resultbit', '<tr>\n<td class="{$optionbg}" align="right">{$option}{$votestar}</td>\n<td class="{$optionbg}" width="{$imagerowwidth}"><img src="{$theme[''imgdir'']}/pollbar-s.gif" alt="" /><img src="{$theme[''imgdir'']}/pollbar.gif" width="{$imagewidth}" height="10" alt="{$percent}%" title="{$percent}%" /><img src="{$theme[''imgdir'']}/pollbar-e.gif" alt="" /><br />{$userlist}</td>\n<td class="{$optionbg}" width="67" align="center">{$votes}</td>\n<td class="{$optionbg}" width="67" align="center">{$percent}%</td>\n</tr>\n', -2, '1402', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (135, 'showthread_poll_resultbit', '<tr>\n<td class="{$optionbg}" align="right">{$option}{$votestar}</td>\n<td class="{$optionbg}"><img src="{$theme[''imgdir'']}/pollbar-s.gif" alt="" /><img src="{$theme[''imgdir'']}/pollbar.gif" width="{$imagewidth}" height="10" alt="{$percent}%" title="{$percent}%" /><img src="{$theme[''imgdir'']}/pollbar-e.gif" alt="" /></td>\n<td class="{$optionbg}" width="67" align="center">{$votes}</td>\n<td class="{$optionbg}" width="67" align="center">{$percent}%</td>\n</tr>\n', -2, '1402', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (136, 'showteam_usergroup', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="3"><strong>{$usergroup[''title'']}</strong></td>\n</tr>\n<tr>\n<td class="tcat"><span class="smalltext"><strong>{$lang->uname}</strong></span></td>\n<td class="tcat"><span class="smalltext"><strong>{$lang->email}</strong></span></td>\n<td class="tcat"><span class="smalltext"><strong>{$lang->pm}</strong></span></td>\n</tr>\n{$usergrouprows}\n</table>\n<br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (137, 'showteam_moderators', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="4"><strong>{$lang->moderators}</strong></td>\n</tr>\n<tr>\n<td class="tcat"><span class="smalltext"><strong>{$lang->mod_username}</strong></span></td>\n<td class="tcat"><span class="smalltext"><strong>{$lang->mod_forums}</strong></span></td>\n<td class="tcat"><span class="smalltext"><strong>{$lang->mod_email}</strong></span></td>\n<td class="tcat"><span class="smalltext"><strong>{$lang->mod_pm}</strong></span></td>\n</tr>\n{$modrows}\n</table>\n<br/>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (138, 'showteam_moderators_mod', '<tr>\n<td width="50%" class="trow1"><a href="{$user[''profilelink'']}"><strong>{$user[''username'']}</strong></a></td>\n<td width="30%" class="trow2"><span class="smalltext">{$forumslist}</span></td>\n<td width="10%" class="trow2">{$emailcode}</td>\n<td width="10%" class="trow1">{$pmcode}</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (139, 'report_noreason', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->report_post}</title>\n{$headerinclude}\n</head>\n<body>\n<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="trow1" align="center">\n<br />\n<br />\n<strong>{$lang->report_error}</strong>\n<blockquote>{$lang->no_reason}</blockquote>\n<br /><br />\n<div>\n	<script type="text/javascript">\n	<!--\n		document.write(''[<a href="javascript:history.go(-1);">{$lang->go_back}</a>]'');\n		document.write(''[<a href="javascript:window.close();">{$lang->close_window}</a>]'');\n	// -->\n	</script>\n</div>\n</td>\n</tr>\n</table>\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (140, 'reputation', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->reputation_report}</title>\n{$headerinclude}\n<script type="text/javascript">\n<!--\n	var delete_reputation_confirm = "{$lang->delete_reputation_confirm}";\n// -->\n</script>\n</head>\n<body>\n{$header}\n{$add_reputation}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder" style="clear: both;">\n<tr>\n	<td class="thead"><strong>{$lang->reputation_report}</strong></td>\n</tr>\n<tr>\n	<td class="tcat"><strong>{$lang->summary}</strong></td>\n</tr>\n<tr>\n	<td class="trow1">\n	<table width="100%" cellspacing="0" cellpadding="0" border="0">\n		<tr>\n			<td>\n				<span class="largetext"><strong>{$username}</strong></span><br />\n				<span class="smalltext">\n					({$usertitle})<br />\n					<br />\n					<strong>{$lang->total_reputation}:</strong> {$user[''reputation'']}<br />\n					<strong class="reputation_positive">{$lang->positive_count}:</strong> {$positive_count}<br />\n					<strong class="reputation_neutral">{$lang->neutral_count}:</strong> {$neutral_count}<br />\n					<strong class="reputation_negative">{$lang->negative_count}:</strong> {$negative_count}\n				</span>\n			</td>\n			<td align="right" style="width: 300px;">\n					<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder trow2">\n						<tr>\n							<td>&nbsp;</td>\n							<td><span class="smalltext reputation_positive">{$lang->positive_count}</span></td>\n							<td><span class="smalltext reputation_neutral">{$lang->neutral_count}</span></td>\n							<td><span class="smalltext reputation_negative">{$lang->negative_count}</span></td>\n						</tr>\n						<tr>\n							<td style="text-align: right;"><span class="smalltext">{$lang->last_week}</span></td>\n							<td style="text-align: center;"><span class="smalltext">{$positive_week}</span></td>\n							<td style="text-align: center;"><span class="smalltext">{$neutral_week}</span></td>\n							<td style="text-align: center;"><span class="smalltext">{$negative_week}</span></td>\n						</tr>\n						<tr>\n							<td style="text-align: right;"><span class="smalltext">{$lang->last_month}</span></td>\n							<td style="text-align: center;"><span class="smalltext">{$positive_month}</span></td>\n							<td style="text-align: center;"><span class="smalltext">{$neutral_month}</span></td>\n							<td style="text-align: center;"><span class="smalltext">{$negative_month}</span></td>\n						</tr>\n						<tr>\n							<td style="text-align: right;"><span class="smalltext">{$lang->last_6months}</span></td>\n							<td style="text-align: center;"><span class="smalltext">{$positive_6months}</span></td>\n							<td style="text-align: center;"><span class="smalltext">{$neutral_6months}</span></td>\n							<td style="text-align: center;"><span class="smalltext">{$negative_6months}</span></td>\n						</tr>\n					</table>\n			</td>\n		</tr>\n	</table>\n	</td>\n</tr>\n<tr>\n	<td class="tcat"><strong>{$lang->comments}</strong></td>\n</tr>\n{$reputation_votes}\n<tr>\n	<td class="tfoot" align="right">\n	<form action="reputation.php" method="get">\n		<input type="hidden" name="uid" value="{$user[''uid'']}" />\n		<select name="show">\n			<option value="all" {$show_selected[''all'']}>{$lang->show_all}</option>\n			<option value="positive" {$show_selected[''positive'']}>{$lang->show_positive}</option>\n			<option value="neutral" {$show_selected[''neutral'']}>{$lang->show_neutral}</option>\n			<option value="negative" {$show_selected[''negative'']}>{$lang->show_negative}</option>\n		</select>\n		<select name="sort">\n			<option value="dateline" {$sort_selected[''last_updated'']}>{$lang->sort_updated}</option>\n			<option value="username" {$sort_selected[''username'']}>{$lang->sort_username}</option>\n		</select>\n		{$gobutton}\n	</form>\n	</td>\n</tr>\n</table>\n{$multipage}\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (141, 'misc_buddypopup', '<html>\n<head>\n<title>{$lang->buddy_list}</title>\n<meta http-equiv="refresh" content="60; URL=misc.php?action=buddypopup" />\n{$headerinclude}\n<style type="text/css">\nbody {\n	text-align: left;\n}\n\n.buddy_avatar {\n	height: 50px;\n	width: 50px;\n	background: #fff;\n	border: 1px solid #ccc;\n	float: left;\n	clear: left;\n	margin-right: 5px;\n	text-align: center;\n}\n\n.buddy_details img {\n	vertical-align: middle;\n}\n\n.buddy_action {\n	margin-left: 80px;\n}\n</style>\n</head>\n<body style="margin:0; padding: 4px; top: 0; left: 0;">\n	<table width="100%" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" border="0" align="center" class="tborder">\n	<tr>\n		<td class="thead">\n			<div class="float_right" style="margin-top: 3px;"><span class="smalltext"><a href="#" onclick="window.close();">{$lang->close}</a></span></div>\n			<div><strong>{$lang->buddy_list}</strong></div>\n		</td>\n	</tr>\n	<tr>\n		<td class="trow2">\n			<div style="overflow: auto; height: 300px;">\n				<table width="100%" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" border="0" align="center" class="tborder" style="border: 0;">\n					{$buddys[''online'']}\n					{$buddys[''offline'']}\n				</table>\n			</div>\n		</td>\n	</tr>\n	</table>\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (142, 'misc_buddypopup_user_offline', '					<tr>\n						<td class="trow1">\n						<div class="buddy_avatar"><img src="{$buddy[''avatar'']}" alt="" width="{$scaled_dimensions[''width'']}" height="{$scaled_dimensions[''height'']}" style="margin-top: {$margin_top}px;" /></div>\n						<div class="buddy_details">\n							<img src="{$theme[''imgdir'']}/buddy_offline.gif" alt="{$lang->offline}" title="{$lang->offline}" /> {$profile_link}\n							<div class="buddy_action">\n								<span class="smalltext">{$last_active}<br />{$send_pm}</span>\n							</div>\n						</div>\n						</td>\n					</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (143, 'misc_buddypopup_user_online', '					<tr>\n						<td class="trow1">\n						<div class="buddy_avatar"><img src="{$buddy[''avatar'']}" alt="" width="{$scaled_dimensions[''width'']}" height="{$scaled_dimensions[''height'']}" style="margin-top: {$margin_top}px;" /></div>\n						<div class="buddy_details">\n							<img src="{$theme[''imgdir'']}/buddy_online.gif" alt="{$lang->online}" title="{$lang->online}" /> {$profile_link}\n							<div class="buddy_action">\n								<span class="smalltext">{$last_active}<br />{$send_pm}</span>\n							</div>\n						</div>\n						</td>\n					</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (144, 'private_archive_txt', '{$lang->private_messages_for}\n({$lang->exported_date})\n\n{$pmsdownload}', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (145, 'postbit_avatar', '<a href="{$post[''profilelink_plain'']}"><img src="{$post[''avatar'']}" alt="" {$avatar_width_height} /></a>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (146, 'usercp_profile_customfield', '<tr>\n<td><span class="smalltext">\n<a title="{$profilefield[''description'']}" style="text-decoration: none;">{$profilefield[''name'']}</a>:</span></td>\n</tr>\n<tr>\n<td>{$code}</td>\n</tr>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (147, 'usercp_profile_profilefields', '<br />\n<fieldset class="trow2">\n<legend><strong>{$lang->additional_information}</strong></legend>\n<table cellspacing="0" cellpadding="{$theme[''tablespace'']}" width="100%">\n{$customfields}\n</table>\n</fieldset>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (148, 'private_archive', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->archive_messages}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="private.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->archive_messages}</strong></td>\n</tr>\n<tr>\n<td class="tcat" colspan="2"><span class="smalltext">{$lang->archive_note}</span></td>\n</tr>\n<tr>\n<td class="trow1" valign="top" width="30%"><strong>{$lang->folders}</strong></td>\n<td class="trow1">{$folderlist}</td>\n</tr>\n<tr>\n<td class="trow2" valign="top" width="30%"><strong>{$lang->date_limit}</strong></td>\n<td class="trow2"><select name="dayway"><option value="older">{$lang->date_limit_older}</option><option value="newer">{$lang->date_limit_newer}</option><option value="disregard">{$lang->date_limit_disregard}</option></select> <input type="text" class="textbox" name="daycut" value="30" size="3" maxlength="4" /> {$lang->date_limit_days}</td>\n</tr>\n<tr>\n<td class="trow1" valign="top" width="30%"><strong>{$lang->export_unread}</strong></td>\n<td class="trow1"><input type="radio" class="radio" name="exportunread" value="1" /> {$lang->yes} <input type="radio" class="radio" name="exportunread" value="0" checked="checked" /> {$lang->no} </td>\n</tr>\n<tr>\n<td class="trow2" valign="top" width="30%"><strong>{$lang->delete_archived}</strong><br /><span class="smalltext">{$lang->delete_archived_note}</span></td>\n<td class="trow2"><input type="radio" class="radio" name="deletepms" value="1" /> {$lang->yes} <input type="radio" class="radio" name="deletepms" value="0" checked="checked" /> {$lang->no} </td>\n</tr>\n<tr>\n<td class="trow1" valign="top" width="30%"><strong>{$lang->export_format}</strong><br /><span class="smalltext">{$lang->export_format_note}</span></td>\n<td class="trow1"><input type="radio" class="radio" name="exporttype" value="html" checked="checked" /> {$lang->export_html}<br /><input type="radio" class="radio" name="exporttype" value="txt" /> {$lang->export_txt}<br /><input type="radio" class="radio" name="exporttype" value="csv" /> {$lang->export_csv}</td>\n</tr>\n</table>\n<br />\n<div align="center">\n<input type="hidden" name="action" value="do_export" />\n<input type="submit" class="button" name="submit" value="{$lang->archive_messages}" />\n</div>\n</td>\n</tr>\n</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (149, 'private_folders_folder', '<tr>\n<td class="trow1"><input type="text" class="textbox" name="folder[{$fid}]" size="25" value="{$foldername}" maxlength="30" /></td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (150, 'private_folders_folder_unremovable', '<tr>\n<td class="trow1"><input type="text" class="textbox" name="folder[{$fid}]" size="25" value="{$foldername}" maxlength="30" /> <span class="smalltext">({$foldername2} - {$lang->cannot_be_removed})</span>\n</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (151, 'showteam_usergroup_user', '<tr>\n<td width="80%" class="{$bgcolor}"><a href="{$user[''profilelink'']}"><strong>{$user[''username'']}</strong></a></td>\n<td width="10%" class="{$bgcolor}">{$emailcode}</td>\n<td width="10%" class="{$bgcolor}">{$pmcode}</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (152, 'showteam_moderators_forum', '<a href="{$forum_url}">{$forum[''name'']}</a><br/>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (153, 'moderation_inline_deleteposts', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->delete_posts}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="moderation.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->delete_posts}</strong></td>\n</tr>\n<tr>\n<td class="trow1" colspan="2" align="center">{$lang->confirm_delete_posts}\n{$loginbox}\n</table>\n<br />\n<div align="center"><input type="submit" class="button" name="submit" value="{$lang->delete_posts}" /></div>\n<input type="hidden" name="action" value="do_multideleteposts" />\n<input type="hidden" name="tid" value="{$tid}" />\n<input type="hidden" name="posts" value="{$inlineids}" />\n<input type="hidden" name="url" value="{$return_url}" />\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (154, 'online_today', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->online_today}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" align="center" width="50%"><span class="smalltext"><strong>{$lang->on_username}</strong></span></td>\n<td class="thead" align="center" width="50%"><span class="smalltext"><strong>{$lang->time}</strong></span></td>\n</tr>\n{$todayrows}\n<tr>\n<td align="center" colspan="2" class="trow1" style="white-space: nowrap">{$onlinetoday}</td>\n</tr>\n</table>\n{$footer}\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (155, 'forumdisplay_thread_modbit', '<td class="{$bgcolor}" align="center" style="white-space: nowrap"><input type="checkbox" class="checkbox" name="inlinemod_{$multitid}" id="inlinemod_{$multitid}" value="1" {$inlinecheck}  /></td>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (156, 'forumdisplay_thread_gotounread', '<a href="{$thread[''newpostlink'']}"><img src="{$theme[''imgdir'']}/jump.gif" alt="{$lang->goto_first_unread}" title="{$lang->goto_first_unread}" /></a> ', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (157, 'private_tracking', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->pm_tracking}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n<form action="private.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<input type="hidden" name="action" value="do_tracking" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" align="center" colspan="5"><strong>{$lang->read_messages}</strong></td>\n</tr>\n<tr>\n<td class="tcat" colspan="2"><span class="smalltext"><strong>{$lang->message_title}</strong></span></td>\n<td class="tcat" align="center" width="30%"><span class="smalltext"><strong>{$lang->sentto}</strong></span></td>\n<td class="tcat" align="right" width="20%"><span class="smalltext"><strong>{$lang->dateread}</strong></span></td>\n<td class="tcat" align="center" width="1%"><span class="smalltext"><input type="checkbox" class="checkbox checkall" /></span></td>\n</tr>\n{$readmessages}\n<tr>\n<td class="tfoot" align="right" colspan="5"><strong><input type="submit" class="button" name="stoptracking" value="{$lang->stop_tracking}" /> {$lang->selected_messages}</strong></td>\n</tr>\n</table>\n</form>\n<br />\n<form action="private.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<input type="hidden" name="action" value="do_tracking" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" align="center" colspan="5"><strong>{$lang->unread_messages}</strong></td>\n</tr>\n<tr>\n<td class="tcat" colspan="2"><span class="smalltext"><strong>{$lang->message_title}</strong></span></td>\n<td class="tcat" align="center" style="white-space: nowrap" width="30%"><span class="smalltext"><strong>{$lang->sentto}</strong></span></td>\n<td class="tcat" align="right" style="white-space: nowrap" width="20%"><span class="smalltext"><strong>{$lang->datesent}</strong></span></td>\n<td class="tcat" align="center" width="1%" style="white-space: nowrap"><span class="smalltext"><input type="checkbox" class="checkbox checkall" /></span></td>\n</tr>\n{$unreadmessages}\n<tr>\n<td class="tfoot" align="right" colspan="5"><strong><input type="submit" class="button" name="stoptrackingunread" value="{$lang->stop_tracking}" /> / <input type="submit" class="button" name="cancel" value="{$lang->cancel}" /> {$lang->selected_messages}</strong></td>\n</tr>\n</table>\n</form>\n</td></tr></table>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (158, 'moderation_threadnotes', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->thread_notes_editor}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="moderation.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->thread_notes_editor}</strong></td>\n</tr>\n{$loginbox}\n<tr>\n<td class="trow2" colspan="2">{$lang->below_notes}</td>\n</tr>\n<td class="trow1" align="center" colspan="2"><textarea name="threadnotes" cols="80" rows="10" tabindex="1">{$thread[''notes'']}</textarea></td>\n</tr>\n</table>\n<br />\n<div align="center"><input type="submit" class="button" name="submit" value="{$lang->update_notes}" tabindex="2" /></div>\n<input type="hidden" name="action" value="do_threadnotes" />\n<input type="hidden" name="tid" value="{$tid}" />\n<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="4"><strong>{$lang->mod_logs}</strong></td>\n</tr>\n<tr>\n<td class="tcat" align="center"><strong>{$lang->mod_username}</strong></td>\n<td class="tcat" align="center"><strong>{$lang->mod_date}</strong></td>\n<td class="tcat" align="center"><strong>{$lang->mod_actions}</strong></td>\n<td class="tcat" align="center"><strong>{$lang->mod_information}</strong></td>\n</tr>\n{$modactions}\n</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (159, 'error_maxpostimages', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead"><strong>{$lang->error_too_many_images}</strong></td>\n</tr>\n<tr>\n<td class="trow1">{$lang->error_too_many_images2}<br /><span class="smalltext">{$lang->error_too_many_images3} {$mybb->settings[''maxpostimages'']}.</span>\n</td>\n</tr>\n</table>\n<br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (160, 'private_archive_html', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->private_messages_for}</title>\n<style type="text/css">{$css}\n* {text-align: left}</style>\n</head>\n<body>\n<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="1"><span class="largetext"><strong>{$lang->private_messages_for}</strong></span></td>\n</tr>\n{$pmsdownload}\n</table>\n<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="trow1" colspan="1">{$lang->exported_date}<br /><a href="{$mybb->settings[''bburl'']}">{$mybb->settings[''bbname'']}</a></td>\n</tr>\n</table>\n</body>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (161, 'private_messagebit', '<tr>\n<td align="center" class="trow1" width="1%"><img src="{$theme[''imgdir'']}/{$msgfolder}" alt="{$msgalt}" title="{$msgalt}" /></td>\n<td align="center" class="trow2" width="1%">{$icon}</td>\n<td class="trow1" width="35%">{$msgprefix}<a href="private.php?action=read&amp;pmid={$message[''pmid'']}">{$message[''subject'']}</a>{$msgsuffix}{$denyreceipt}</td>\n<td align="center" class="trow2">{$tofromusername}</td>\n<td class="trow1" align="right" style="white-space: nowrap"><span class="smalltext">{$senddate} {$sendtime}</span></td>\n<td class="trow2" align="center"><input type="checkbox" class="checkbox" name="check[{$message[''pmid'']}]" value="1" /></td>\n</tr>', -2, '128', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (162, 'private_multiple_recipients', '<a href="private.php?action=read&amp;pmid={$message[''pmid'']}" id="private_message_{$message[''pmid'']}">{$lang->multiple_recipients}</a>\n		<div id="private_message_{$message[''pmid'']}_popup" class="popup_menu" style="display: none;"><div class="tcat"><strong>{$lang->to}</strong></div>{$to_users}{$bcc_users}</div>\n<script type="text/javascript">\n<!--\n	new PopupMenu("private_message_{$message[''pmid'']}");\n// -->\n</script>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (163, 'private_multiple_recipients_user', '<div class="popup_item_container"><a href="{$profilelink}" class="popup_item">{$username}</a></div>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (164, 'private_multiple_recipients_bcc', '<div class="tcat"><strong>{$lang->bcc}</strong></div>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (165, 'private_nomessages', '<tr>\n<td colspan="6" class="trow1">{$lang->nomessages}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (166, 'codebuttons', '<script type="text/javascript" src="jscripts/editor.js?ver=1400"></script>\n<script type="text/javascript">\n<!--\n	{$editor_language}\n	var clickableEditor = new messageEditor("{$bind}", {lang: editor_language, rtl: {$lang->settings[''rtl'']}, theme: "{$theme[''editortheme'']}"});\n	if(clickableEditor)\n	{\n		clickableEditor.bindSmilieInserter("clickable_smilies");\n	}\n// -->\n</script>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (167, 'showthread_quickreply', '<br />\n<form method="post" action="newreply.php?tid={$tid}&amp;processed=1" name="quick_reply_form" id="quick_reply_form">\n	<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n	<input type="hidden" name="subject" value="RE: {$thread[''subject'']}" />\n	<input type="hidden" name="action" value="do_newreply" />\n	<input type="hidden" name="posthash" value="{$posthash}" id="posthash" />\n	<input type="hidden" name="quoted_ids" value="" id="quoted_ids" />\n	<input type="hidden" name="lastpid" id="lastpid" value="{$last_pid}" />\n	<input type="hidden" name="from_page" value="{$page}" />\n	<input type="hidden" name="tid" value="{$tid}" />\n	<input type="hidden" name="method" value="quickreply" />\n\n	<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n		<thead>\n			<tr>\n				<td class="thead" colspan="2">\n					<div class="expcolimage"><img src="{$theme[''imgdir'']}/collapse{$collapsedimg[''quickreply'']}.gif" id="quickreply_img" class="expander" alt="[-]" title="[-]" /></div>\n					<div><strong>{$lang->quick_reply}</strong></div>\n				</td>\n			</tr>\n		</thead>\n		<tbody style="{$collapsed[''quickreply_e'']}" id="quickreply_e">\n			<tr>\n				<td class="trow1" valign="top" width="22%">\n					<strong>{$lang->message}</strong><br />\n					<span class="smalltext">{$lang->message_note}<br /><br />\n					<label><input type="checkbox" class="checkbox" name="postoptions[signature]" value="1" {$postoptionschecked[''signature'']} />&nbsp;<strong>{$lang->signature}</strong></label><br />\n					<label><input type="checkbox" class="checkbox" name="postoptions[disablesmilies]" value="1" />&nbsp;<strong>{$lang->disable_smilies}</strong></label>{$closeoption}</span>\n				</td>\n				<td class="trow1">\n					<div style="width: 95%">\n						<textarea style="width: 100%; padding: 4px; margin: 0;" rows="8" cols="80" name="message" id="message" tabindex="1"></textarea>\n					</div>\n					<div class="editor_control_bar" style="width: 95%; padding: 4px; margin-top: 3px; display: none;" id="quickreply_multiquote">\n						<span class="smalltext">\n							{$lang->quickreply_multiquote_selected} <a href="./newreply.php?tid={$tid}&amp;load_all_quotes=1" onclick="return Thread.loadMultiQuoted();">{$lang->quickreply_multiquote_now}</a> {$lang->or} <a href="javascript:Thread.clearMultiQuoted();">{$lang->quickreply_multiquote_deselect}</a>.\n						</span>\n					</div>\n				</td>\n			</tr>\n			{$captcha}\n			<tr>\n				<td colspan="2" align="center" class="tfoot"><input type="submit" class="button" value="{$lang->post_reply}" tabindex="2" accesskey="s" id="quick_reply_submit" /> <input type="submit" class="button" name="previewpost" value="{$lang->preview_post}" tabindex="3" /></td>\n			</tr>\n		</tbody>\n	</table>\n</form>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (168, 'memberlist', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->member_list}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n{$multipage}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="5"><strong>{$lang->member_list}</strong></td>\n</tr>\n<tr>\n<td class="tcat" width="1%"><span class="smalltext"><strong>{$lang->avatar}</strong></span></td>\n<td class="tcat"><span class="smalltext"><strong>{$lang->username}</strong></span></td>\n<td class="tcat" width="15%" align="center"><span class="smalltext"><strong>{$lang->joined}</strong></span></td>\n<td class="tcat" width="15%" align="center"><span class="smalltext"><strong>{$lang->lastvisit}</strong></span></td>\n<td class="tcat" width="10%" align="center"><span class="smalltext"><strong>{$lang->posts}</strong></span></td>\n</tr>\n{$users}\n</table>\n<div class="float_right" style="padding-top: 4px;">\n	<a href="showteam.php"><strong>{$lang->forumteam}</strong></a>\n</div>\n{$multipage}\n<br style="clear: both;" />\n<br />\n<form method="post" action="memberlist.php">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="3">\n	<div class="float_right">\n		<strong><a href="memberlist.php?action=search">{$lang->advanced_search}</a></strong>\n	</div>\n	<div><strong>{$lang->search_members}</strong></div>\n</td>\n</tr>\n<tr>\n	<td class="tcat"><strong><label for="username">{$lang->username}</label></strong></td>\n	<td class="tcat"><strong><label for="website">{$lang->website}</label></strong></td>\n	<td class="tcat"><strong><label for="sort">{$lang->sort_by}</label></strong></td>\n</tr>\n<tr>\n	<td class="trow1" width="33%" style="vertical-align: top;">\n		{$lang->contains}<br />\n		<input type="text" class="textbox" name="username" id="username" style="width: 99%; margin-top: 4px;" value="{$search_username}" />\n	</td>\n	<td class="trow1" width="33%" style="vertical-align: top;">\n		{$lang->contains}<br />\n		<input type="text" class="textbox" name="website" id="website" style="width: 99%; margin-top: 4px;" value="{$search_website}" />\n	</td>\n	<td class="trow1" width="33%">\n		<select name="sort" id="sort" style="width: 99%;">\n			<option value="username"{$sort_selected[''username'']}>{$lang->sort_by_username}</option>\n			<option value="regdate"{$sort_selected[''regdate'']}>{$lang->sort_by_regdate}</option>\n			<option value="lastvisit"{$sort_selected[''lastvisit'']}>{$lang->sort_by_lastvisit}</option>\n			<option value="postnum"{$sort_selected[''postnum'']}>{$lang->sort_by_posts}</option>\n		</select><br />\n		<span class="smalltext">\n		<input type="radio" class="radio" name="order" id="order_asc" value="asc"{$order_check[''asc'']} /> <label for="order_asc">{$lang->order_asc}</label><br />\n		<input type="radio" class="radio" name="order" id="order_desc" value="desc"{$order_check[''desc'']} /> <label for="order_desc">{$lang->order_desc}</label>\n		</span>\n	</td>\n</tr>\n</table>\n<div align="center"><br /><input type="submit" class="button" name="submit" value="{$lang->search}" /></div>\n</form>\n{$footer}\n<script type="text/javascript" src="jscripts/autocomplete.js?ver=1400"></script>\n<script type="text/javascript">\n<!--\n	if(use_xmlhttprequest == "1")\n	{\n		new autoComplete("username", "xmlhttp.php?action=get_users", {valueSpan: "username"});\n	}\n// -->\n</script>\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (169, 'memberlist_search', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->search_member_list}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form method="post" action="memberlist.php">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->search_member_list}</strong></td>\n</tr>\n<tr>\n	<td class="tcat" colspan="2"><strong>{$lang->search_criteria}</strong></td>\n</tr>\n<tr>\n	<td class="trow1" style="vertical-align: top;" width="20%"><strong><label for="username">{$lang->username}</label></strong></td>\n	<td class="trow1">\n		<select name="username_match">\n			<option value="begins">{$lang->begins_with}</option>\n			<option value="contains">{$lang->username_contains}</option>\n		</select>\n		&nbsp;\n		<input type="text" class="textbox" name="username" id="username" />\n	</td>\n</tr>\n<tr>\n	<td class="trow2" width="20%"><strong><label for="website">{$lang->search_website}</label></strong></td>\n	<td class="trow2">\n		<input type="text" class="textbox" name="website" id="website" />\n	</td>\n</tr>\n<tr>\n	<td class="trow1" width="20%"><strong><label for="aim">{$lang->search_aim}</label></strong></td>\n	<td class="trow1">\n		<input type="text" class="textbox" name="aim" id="aim" />\n	</td>\n</tr>\n<tr>\n	<td class="trow1" width="20%"><strong><label for="msn">{$lang->search_msn}</label></strong></td>\n	<td class="trow1">\n		<input type="text" class="textbox" name="msn" id="msn" />\n	</td>\n</tr>\n<tr>\n	<td class="trow1" width="20%"><strong><label for="yahoo">{$lang->search_yahoo}</label></strong></td>\n	<td class="trow1">\n		<input type="text" class="textbox" name="yahoo" id="yahoo" />\n	</td>\n</tr>\n<tr>\n	<td class="trow1" width="20%"><strong><label for="icq">{$lang->search_icq}</label></strong></td>\n	<td class="trow1">\n		<input type="text" class="textbox" name="icq" id="icq" />\n	</td>\n</tr>\n<tr>\n	<td class="tcat" colspan="2"><strong>{$lang->search_options}</strong></td>\n</tr>\n<tr>\n	<td class="trow1" width="20%"><strong><label for="sort">{$lang->sort_by}</label></strong></td>\n	<td class="trow1">\n		<select name="sort" id="sort">\n			<option value="username">{$lang->sort_by_username}</option>\n			<option value="regdate">{$lang->sort_by_regdate}</option>\n			<option value="lastvisit">{$lang->sort_by_lastvisit}</option>\n			<option value="postnum">{$lang->sort_by_posts}</option>\n		</select><br />\n		<span class="smalltext">\n		<input type="radio" class="radio" name="order" id="order_asc" value="asc" /> <label for="order_asc">{$lang->order_asc}</label><br />\n		<input type="radio" class="radio" name="order" id="order_desc" value="desc" /> <label for="order_desc">{$lang->order_desc}</label>\n		</span>\n	</td>\n</tr>\n<tr>\n	<td class="trow1" width="20%"><strong><label for="perpage">{$lang->per_page}</label></strong></td>\n	<td class="trow1">\n		<input type="text" class="textbox" size="4" name="perpage" id="perpage" value="15" />\n	</td>\n</tr>\n</table>\n<div align="center"><br /><input type="submit" class="button" name="submit" value="{$lang->search}" /></div>\n</form>\n{$footer}\n<script type="text/javascript" src="jscripts/autocomplete.js?ver=1400"></script>\n<script type="text/javascript">\n<!--\n	if(use_xmlhttprequest == "1")\n	{\n		new autoComplete("username", "xmlhttp.php?action=get_users", {valueSpan: "username"});\n	}\n// -->\n</script>\n</body>\n</html>', -2, '1405', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (170, 'private', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->private_messaging}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="private.php" method="post" name="pmForm">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="trow1">\n<table border="0" cellspacing="0" cellpadding="0" width="100%">\n<tr>\n<td class="trow1">{$pmspacebar}<span class="smalltext"><a href="private.php">{$lang->inbox}</a> | <a href="private.php?action=send">{$lang->compose_message2}</a> | <a  href="private.php?action=folders">{$lang->manage_folders}</a> | <a  href="private.php?action=empty">{$lang->empty_folders2}</a> | <a href="private.php?action=export">{$lang->export_messages2}</a></span></td>\n</tr>\n</table>\n</td>\n</tr>\n</table>\n<br />\n{$limitwarning}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" align="center" colspan="6"><strong>{$lang->pms_in_folder}</strong></td>\n</tr>\n<tr>\n<td class="tcat" align="center" colspan="3"><span class="smalltext"><strong>{$lang->message_title}</strong></span></td>\n<td class="tcat" align="center" width="30%" style="white-space: nowrap"><span class="smalltext"><strong>{$sender}</strong></span></td>\n<td class="tcat" align="right"  width="20%" style="white-space: nowrap"><span class="smalltext"><strong>{$lang->date_sent}</strong></span></td>\n<td class="tcat" align="center" width="1%" style="white-space: nowrap"><span class="smalltext"><input name="allbox" title="Select All" type="checkbox" class="checkbox checkall" value="Check All" /></span></td>\n</tr>\n{$messagelist}\n<tr>\n<td class="tfoot" align="right" colspan="6">\n<input type="submit" class="button" name="moveto" value="{$lang->move_to}" /> {$folderoplist} {$lang->or}\n<input type="submit" class="button" name="delete" value="{$lang->delete}" /> {$lang->selected_messages}\n</td>\n</tr>\n</table>\n<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="trow1">\n<table border="0" cellspacing="0" cellpadding="0" width="100%">\n<tr>\n<td class="trow1">{$multipage}</td>\n<td class="trow1" align="right">\n<span class="smalltext">\n<strong>{$lang->jump_folder} {$folderjump}\n<input type="submit" class="button" name="hop" value="{$lang->go}" />\n</strong>\n</span>\n</td>\n</tr>\n</table>\n</td>\n</tr>\n</table>\n</td>\n</tr>\n</table>\n<input type="hidden" name="action" value="do_stuff" />\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (171, 'private_pmspace', '<span style="float:right"><table cellspacing="0" cellpadding="0" width="230" style="border: solid 1px #000000;">\n	<tr>\n		<td width="{$spaceused}" bgcolor="red" align="center"><span class="smalltext"><strong>{$overhalf}</strong></span></td>\n		<td width="{$spaceused2}" bgcolor="green" align="center"><span class="smalltext"><strong>{$belowhalf}</strong></span></td>\n		<td width="130" align="center"><span class="smalltext"><strong>{$lang->pmspaceused}</strong></span></td>\n	</tr>\n</table></span>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (172, 'forumdisplay_announcements_announcement', '<tr>\n<td align="center" class="{$bgcolor}"><img src="{$theme[''imgdir'']}/{$folder}.gif" alt=""/></td>\n<td align="center" class="{$bgcolor}">&nbsp;</td>\n<td class="{$bgcolor}">\n	<a href="{$announcement[''announcementlink'']}"{$new_class}>{$announcement[''subject'']}</a>\n	<div class="author smalltext">{$announcement[''profilelink'']}</div>\n</td>\n<td align="center" class="{$bgcolor}">-</td>\n<td align="center" class="{$bgcolor}">-</td>\n{$rating}\n<td class="{$bgcolor}" style="white-space: nowrap; text-align: right"><span class="smalltext">{$postdate} {$posttime}</span></td>\n{$modann}\n</tr>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (173, 'forumdisplay_announcements', '<tr>\n<td class="trow_sep" colspan="{$colspan}">{$lang->forum_announcements}</td>\n</tr>\n{$announcements}', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (174, 'forumdisplay_sticky_sep', '<tr>\n<td class="trow_sep" colspan="{$colspan}">{$lang->sticky_threads}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (175, 'forumdisplay_threads_sep', '<tr>\n<td class="trow_sep" colspan="{$colspan}">{$lang->normal_threads}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (176, 'postbit', '{$ignore_bit}\n<a name="pid{$post[''pid'']}" id="pid{$post[''pid'']}"></a>\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder" style="{$post_extra_style} {$post_visibility}" id="post_{$post[''pid'']}">\n	<tbody>\n		<tr>\n			<td class="tcat">\n				<div class="float_left smalltext">\n					{$post[''postdate'']}, {$post[''posttime'']} <span id="edited_by_{$post[''pid'']}">{$post[''editedmsg'']}</span>\n				</div>\n				{$post[''posturl'']}\n			</td>\n		</tr>\n\n		<tr>\n			<td class="trow1 {$unapproved_shade}">\n				<table cellspacing="0" cellpadding="0" border="0" style="width: 100%;">\n					<tr>\n						<td class="post_avatar" width="1" style="{$post[''avatar_padding'']}">\n							{$post[''useravatar'']}\n						</td>\n						<td class="post_author">\n							<strong><span class="largetext">{$post[''profilelink'']}</span></strong> {$post[''onlinestatus'']}<br />\n							<span class="smalltext">\n								{$post[''usertitle'']}<br />\n								{$post[''userstars'']}\n								{$post[''groupimage'']}\n							</span>\n						</td>\n						<td class="smalltext post_author_info" width="165">\n							{$post[''user_details'']}\n						</td>\n					</tr>\n				</table>\n			</td>\n		</tr>\n\n		<tr>\n			<td class="trow2 post_content {$unapproved_shade}">\n				<span class="smalltext"><strong>{$post[''icon'']}{$post[''subject'']} {$post[''subject_extra'']}</strong></span>\n\n				<div class="post_body" id="pid_{$post[''pid'']}">\n					{$post[''message'']}\n				</div>\n				{$post[''attachments'']}\n				{$post[''signature'']}\n\n				<div class="post_meta" id="post_meta_{$post[''pid'']}">\n				{$post[''iplogged'']}\n				</div>\n			</td>\n		</tr>\n\n		<tr>\n			<td class="trow1 post_buttons {$unapproved_shade}">\n				<div class="author_buttons float_left">\n					{$post[''button_email'']}{$post[''button_pm'']}{$post[''button_www'']}{$post[''button_find'']}\n				</div>\n				<div class="post_management_buttons float_right">{$post[''button_edit'']}{$post[''button_quickdelete'']}{$post[''button_quote'']}{$post[''button_multiquote'']}{$post[''button_report'']}{$post[''button_warn'']}{$post[''button_reply_pm'']}{$post[''button_replyall_pm'']}{$post[''button_forward_pm'']}{$post[''button_delete_pm'']}\n				</div>\n			</td>\n		</tr>\n	</tbody>\n</table>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (177, 'postbit_classic', '{$ignore_bit}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder" style="{$post_extra_style} {$post_visibility}" id="post_{$post[''pid'']}">\n	<tr>\n		<td class="{$altbg}" width="15%" valign="top" style="white-space: nowrap; text-align: center;"><a name="pid{$post[''pid'']}" id="pid{$post[''pid'']}"></a>\n		<strong><span class="largetext">{$post[''profilelink'']}</span></strong> {$post[''onlinestatus'']}<br />\n		<span class="smalltext">\n			{$post[''usertitle'']}<br />\n			{$post[''userstars'']}\n			{$post[''groupimage'']}\n			{$post[''useravatar'']}<br />\n			{$post[''user_details'']}\n		</span>\n	</td>\n	<td class="{$altbg}" valign="top">\n		<table width="100%">\n			<tr><td>{$post[''posturl'']}<span class="smalltext"><strong>{$post[''icon'']}{$post[''subject'']} {$post[''subject_extra'']}</strong></span>\n			<br />\n			<div id="pid_{$post[''pid'']}" style="padding: 5px 0 5px 0;">\n				{$post[''message'']}\n			</div>\n			{$post[''attachments'']}\n			{$post[''signature'']}\n			<div style="text-align: right; vertical-align: bottom;" id="post_meta_{$post[''pid'']}">\n				<div id="edited_by_{$post[''pid'']}">{$post[''editedmsg'']}</div>\n				{$post[''iplogged'']}\n			</div>\n		</td></tr>\n	</table>\n</td>\n</tr>\n<tr>\n	<td class="{$altbg}" style="white-space: nowrap; text-align: center; vertical-align: middle;"><span class="smalltext">{$post[''postdate'']} {$post[''posttime'']}</span></td>\n	<td class="{$altbg}" style="vertical-align: middle;">\n		<table width="100%" border="0" cellpadding="0" cellspacing="0">\n			<tr valign="bottom">\n				<td align="left" ><span class="smalltext">{$post[''button_email'']}{$post[''button_pm'']}{$post[''button_www'']}{$post[''button_find'']}</span></td>\n				<td align="right">{$post[''button_edit'']}{$post[''button_quickdelete'']}{$post[''button_quote'']}{$post[''button_multiquote'']}{$post[''button_report'']}{$post[''button_warn'']}{$post[''button_reply_pm'']}{$post[''button_replyall_pm'']}{$post[''button_forward_pm'']}{$post[''button_delete_pm'']}</td>\n			</tr>\n		</table>\n	</td>\n</tr>\n</table>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (178, 'postbit_gotopost', '<a href="{$url}" class="quick_jump">&nbsp;</a>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (179, 'postbit_seperator', '<tr>\n<td class="trow_sep" colspan="2"><img src="{$theme[''imgdir'']}/pixel.gif" height="1" width="1" alt="" /></td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (180, 'forumdisplay_threadlist_clearpass', ' | <a href="misc.php?action=clearpass&amp;fid={$fid}">{$lang->clear_stored_password}</a>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (181, 'portal_welcome_guesttext', '<span class="smalltext">{$lang->guest_welcome_registration}</span><br />\n<br />\n<form method="post" action="{$portal_url}"><input type="hidden" name="action" value="do_login" />\n{$lang->username}<br />&nbsp;&nbsp;<input type="text" class="textbox" name="username" value="" /><br /><br />\n{$lang->password}<br />&nbsp;&nbsp;<input type="password" class="textbox" name="password" value="" /><br />\n<br /><input type="submit" class="button" name="loginsubmit" value="{$lang->login}" /></form>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (182, 'portal_latestthreads_thread', '<tr>\n<td class="{$altbg}">\n<strong><a href="{$mybb->settings[''bburl'']}/{$thread[''threadlink'']}">{$thread[''subject'']}</a></strong>\n<span class="smalltext"><br />\n<em>{$lang->latest_threads_lastpost}</em> {$lastposterlink}<br />\n{$lastpostdate} {$lastposttime}<br />\n<strong>&raquo; </strong>{$lang->latest_threads_replies} {$thread[''replies'']}<br />\n<strong>&raquo; </strong>{$lang->latest_threads_views} {$thread[''views'']}\n</span>\n</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (183, 'search', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->search}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form method="post" action="search.php">\n<input type="hidden" name="action" value="do_search" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td colspan="2" class="thead"><strong>{$mybb->settings[''bbname'']} - {$lang->search}</strong></td>\n</tr>\n<tr>\n<td class="tcat" width="50%"><strong>{$lang->search_keyword}</strong></td>\n<td class="tcat" width="50%"><strong>{$lang->search_username}</strong></td>\n</tr>\n<tr>\n<td class="trow1">\n<table><tr>\n<td valign="top"><input type="text" class="textbox" name="keywords" size="35" maxlength="250" /></td>\n</tr>\n<tr>\n<td>\n<span class="smalltext"><input type="radio" class="radio" name="postthread" value="1" checked="checked" />{$lang->search_entire_post}<br /><input type="radio" class="radio" name="postthread" value="2" />{$lang->search_titles_only}</span></td>\n</tr></table>\n</td>\n<td class="trow1">\n<table><tr>\n<td class="trow1"><input type="text" class="textbox" id="author" name="author" size="35" maxlength="{$mybb->settings[''maxnamelength'']}" /><br /><span class="smalltext"><input type="checkbox" class="checkbox" name="matchusername" value="1" checked="checked" />&nbsp; {$lang->match_username}</span></td>\n<td class="trow1">&nbsp;</td>\n</tr></table>\n</td>\n</tr>\n<tr>\n<td class="tcat"><strong>{$lang->search_forums}</strong></td>\n<td class="tcat"><strong>{$lang->search_options}</strong></td>\n</tr>\n<tr>\n<td class="trow1" rowspan="5">{$srchlist}</td>\n<td class="trow1">\n<select name="findthreadst">\n<option value="1">{$lang->threads_at_least}</option>\n<option value="2">{$lang->threads_at_most}</option>\n</select> <input type="text" class="textbox" name="numreplies" size="2" maxlength="4" />&nbsp;{$lang->replies2}<br />\n<br />\n<select name="postdate">\n<option value="0">{$lang->find_anydate}</option>\n<option value="1">{$lang->find_yesterday}</option>\n<option value="7">{$lang->find_lastweek}</option>\n<option value="14">{$lang->find_2weeks}</option>\n<option value="30">{$lang->find_month}</option>\n<option value="90">{$lang->find_3months}</option>\n<option value="180">{$lang->find_6months}</option>\n<option value="365">{$lang->find_year}</option>\n</select>&nbsp;&nbsp; <input type="radio" class="radio" name="pddir" value="1" checked="checked" />{$lang->and_newer}  <input type="radio" class="radio" name="pddir" value="0" />{$lang->and_older}\n</td>\n</tr>\n<tr>\n<td class="tcat"><strong>{$lang->sorting_options}</strong></td>\n</tr>\n<tr>\n<td class="trow1">\n<select name="sortby">\n<option value="lastpost">{$lang->sort_lastpost}</option>\n<option value="starter">{$lang->sort_author}</option>\n<option value="forum">{$lang->sort_forum}</option>\n</select> {$lang->sort_in} <input type="radio" class="radio" name="sortordr" value="asc" />{$lang->sort_asc} <input type="radio" class="radio" name="sortordr" value="desc" checked="checked" />{$lang->sort_desc} {$lang->sort_order}\n</td>\n</tr>\n<tr>\n<td class="tcat"><strong>{$lang->display_options}</strong></td>\n</tr>\n<tr>\n<td class="trow1">{$lang->show_results_as} <input type="radio" class="radio" name="showresults" value="threads" checked="checked" />{$lang->show_results_threads} <input type="radio" class="radio" name="showresults" value="posts" />{$lang->show_results_posts}</td>\n</tr>\n</table>\n<div align="center"><br /><input type="submit" class="button" name="submit" value="{$lang->search}" /></div>\n</form>\n{$footer}\n<script type="text/javascript" src="jscripts/autocomplete.js?ver=1400"></script>\n<script type="text/javascript">\n<!--\n	if(use_xmlhttprequest == "1")\n	{\n		new autoComplete("author", "xmlhttp.php?action=get_users", {valueSpan: "username"});\n	}\n// -->\n</script>\n</body>\n</html>\n', -2, '1402', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (184, 'postbit_groupimage', '<img src="{$usergroup[''image'']}" alt="{$usergroup[''title'']}" title="{$usergroup[''title'']}" />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (185, 'showthread_newreply', '<a href="newreply.php?tid={$tid}"><img src="{$theme[''imglangdir'']}/newreply.gif" alt="{$lang->post_reply_img}" title="{$lang->post_reply_img}" /></a>&nbsp;', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (186, 'showthread_newthread', '<a href="newthread.php?fid={$fid}"><img src="{$theme[''imglangdir'']}/newthread.gif" alt="{$lang->post_thread}" title="{$lang->post_thread}" /></a>&nbsp;', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (187, 'member_profile_groupimage', '<img src="{$displaygroup[''image'']}" alt="{$usertitle}" title="{$usertitle}" /><br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (188, 'misc_help_section', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder" style="clear: both;">\n<thead>\n<tr>\n<td class="thead"><div class="expcolimage"><img src="{$theme[''imgdir'']}/{$expcolimage}" id="sid_{$section[''sid'']}_img" class="expander" alt="[-]" title="[-]" /></div><div><strong>{$section[''name'']}</strong></div></td>\n</tr>\n</thead>\n<tbody style="{$expdisplay}" id="sid_{$section[''sid'']}_e">\n<tr>\n<td class="tcat"><span class="smalltext"><strong>{$section[''description'']}</strong></span></td>\n</tr>\n{$helpbits}\n</tbody>\n</table>\n<br />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (189, 'announcement', '<html>\n<head>\n<title>{$lang->announcements}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder" style="clear: both; border-bottom-width: 0;">\n<tr>\n<td class="thead" colspan="3"><strong>{$lang->forum_announcement}</strong></td>\n</tr>\n</table>\n{$announcement}\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (190, 'member_emailuser', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->email_user}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n{$errors}\n<form action="member.php" method="post" name="input">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td colspan="2" width="100%" class="thead"><strong>{$lang->email_user}</strong></td>\n</tr>\n<tr>\n<td width="40%" class="trow2"><strong>{$lang->email_subject}</strong></td>\n<td width="60%" class="trow2"><input type="text" class="textbox" size="50" name="subject" value="{$subject}" /></td>\n</tr>\n<tr>\n<td valign="top" width="40%" class="trow1"><strong>{$lang->email_message}</strong></td>\n<td width="60%" class="trow1"><textarea cols="50" rows="10" name="message">{$message}</textarea></td>\n</tr>\n</table>\n<br />\n<input type="hidden" name="action" value="do_emailuser" />\n<input type="hidden" name="uid" value="{$to_user[''uid'']}" />\n<div align="center"><input type="submit" class="button" value="{$lang->send_email}" /></div>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (191, 'changeuserbox', '<tr>\n<td class="trow1" width="20%"><strong>{$lang->username}</strong></td>\n<td class="trow1">{$mybb->user[''username'']} <span class="smalltext">[<strong><a href="member.php?action=logout&amp;logoutkey={$mybb->user[''logoutkey'']}">{$lang->change_user}</a></strong>]</span></td>\n</tr>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (192, 'showthread_poll_results', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="4" align="center"><strong>{$lang->poll} {$poll[''question'']}</strong><br /><span class="smalltext">{$pollstatus}</span></td>\n</tr>\n{$polloptions}\n<tr>\n<td class="tfoot" align="right" colspan="2"><strong>{$lang->total}</strong></td>\n<td class="tfoot" align="center"><strong>{$lang->total_votes}</strong></td>\n<td class="tfoot" align="center"><strong>{$totpercent}</strong></td>\n</tr>\n</table>\n<table cellspacing="0" cellpadding="2" border="0" width="100%" align="center">\n<tr>\n<td align="left"><span class="smalltext">{$lang->you_voted}</span></td>\n<td align="right"><span class="smalltext">[<a href="polls.php?action=showresults&amp;pid={$poll[''pid'']}">{$lang->show_results}</a>{$edit_poll}]</span></td>\n</tr>\n</table>\n<br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (193, 'polls_showresults', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->poll_results}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="4" align="center"><strong>{$poll[''question'']}</strong></td>\n</tr>\n{$polloptions}\n<tr>\n<td class="tfoot" align="right" colspan="2"><strong>{$lang->poll_total}</strong></td>\n<td class="tfoot" align="center"><strong>{$poll[''numvotes'']} {$lang->poll_votes}</strong></td>\n<td class="tfoot" align="center"><strong>{$totpercent}</strong></td>\n</tr>\n</table>\n{$footer}\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (194, 'member_register_password', '<tr>\n<td><span class="smalltext">{$lang->password}</span></td>\n<td><span class="smalltext">{$lang->confirm_password}</span></td>\n</tr>\n<tr>\n<td><input type="password" class="textbox" name="password" id="password" style="width: 100%" /></td>\n<td><input type="password" class="textbox" name="password2" id="password2" style="width: 100%" /></td>\n</tr>\n<tr>\n	<td colspan="2" style="display: none;" id="password_status">&nbsp;</td>\n</tr>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (195, 'usercp_forumsubscriptions_forum', '<tr>\n<td class="trow1" align="center" valign="top"><img src="{$theme[''imgdir'']}/{$folder}.gif" valign="top" /></td>\n<td class="trow1" valign="top">\n<strong><a href="{$forum_url}">{$forum[''name'']}</a></strong><br /><span class="smalltext"><a href="usercp2.php?action=removesubscription&amp;type=forum&amp;fid={$forum[''fid'']}">{$lang->unsubscribe}</a> | <a href="newthread.php?fid={$forum[''fid'']}">{$lang->new_thread}</a></span></td>\n<td class="trow2" valign="top" style="white-space: nowrap; text-align: center;">{$posts}</td>\n<td class="trow1" valign="top" style="white-space: nowrap; text-align: center;">{$threads}</td>\n<td class="trow2" valign="top" style="white-space: nowrap">{$lastpost}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (196, 'newthread_postpoll', '<tr>\n<td class="{$bgcolor2}" valign="top">\n<strong>{$lang->poll}</strong><br /><span class="smalltext">{$lang->poll_desc}</span>\n</td>\n<td class="{$bgcolor2}" valign="top">\n<span class="smalltext"><label><input type="checkbox" class="checkbox" name="postpoll" value="1" {$postpollchecked} /><strong>{$lang->poll_check}</strong></label><br />\n{$lang->num_options} <input type="text" class="textbox" name="numpolloptions" value="{$numpolloptions}" size="10" /> {$lang->max_options}</span>\n</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (197, 'modcp_reports_report', '<tr>\n<td class="{$trow}" align="center"><label for="reports_{$report[''rid'']}"><input type="checkbox" class="checkbox" name="reports[]" id="reports_{$report[''rid'']}" value="{$report[''rid'']}" />&nbsp;<a href="{$report[''postlink'']}#pid{$report[''pid'']}" target="_blank">{$report[''pid'']}</a></label></td>\n<td class="{$trow}" align="center"><a href="{$report[''posterlink'']}" target="_blank">{$report[''postusername'']}</a></td>\n<td class="{$trow}"><a href="{$report[''threadlink'']}" target="_blank">{$report[''threadsubject'']}</a></td>\n<td class="{$trow}" align="center"><a href="{$report[''reporterlink'']}" target="_blank">{$report[''username'']}</a></td>\n<td class="{$trow}">{$report[''reason'']}</td>\n<td class="{$trow}" align="center" style="white-space: nowrap"><span class="smalltext">{$reportdate}<br />{$reporttime}</small></td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (198, 'modcp_reports_multipage', '<tr>\n<td class="tcat" colspan="6"><span class="smalltext"> {$multipage}</span></td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (199, 'modcp_allreports', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->all_reported_posts}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<table width="100%" border="0" align="center">\n<tr>\n{$modcp_nav}\n<td valign="top">\n<p>{$lang->unread_reports_key}</p>\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" align="center" colspan="6"><strong>{$lang->all_reported_posts}</strong></td>\n</tr>\n<tr>\n<td class="tcat" align="center" width="10%"><span class="smalltext"><strong>{$lang->post_id}</strong></span></td>\n<td class="tcat" align="center" width="15%"><span class="smalltext"><strong>{$lang->poster}</strong></span></td>\n<td class="tcat" align="center" width="25%"><span class="smalltext"><strong>{$lang->thread}</strong></span></td>\n<td class="tcat" align="center" width="15%"><span class="smalltext"><strong>{$lang->reporter}</strong></span></td>\n<td class="tcat" align="center" width="25%"><span class="smalltext"><strong>{$lang->report_reason}</strong></span></td>\n<td class="tcat" align="center" width="10%"><span class="smalltext"><strong>{$lang->report_time}</strong></span></td>\n</tr>\n{$allreports}\n{$allreportspages}\n</table>\n</td>\n</tr>\n</table>\n{$footer}\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (200, 'modcp_reports_allreport', '<tr>\n<td class="{$trow}" align="center"><a href="{$report[''postlink'']}#pid{$report[''pid'']}" target="_blank">{$report[''pid'']}</a></td>\n<td class="{$trow}" align="center">{$report[''postusername'']}</td>\n<td class="{$trow}">{$report[''threadsubject'']}</td>\n<td class="{$trow}" align="center"><a href="{$report[''reporterlink'']}" target="_blank">{$report[''username'']}</a></td>\n<td class="{$trow}">{$report[''reason'']}</td>\n<td class="{$trow}" align="center" style="white-space: nowrap"><span class="smalltext">{$reportdate}<br />{$reporttime}</span></td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (201, 'modcp_reports_allnoreports', '<tr>\n<td class="trow1" align="center" colspan="6">{$lang->no_reports}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (202, 'modcp_reports_noreports', '<tr>\n<td class="trow1" align="center" colspan="6">{$lang->no_reports}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (203, 'global_unreadreports', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="trow1" align="right"><span class="smalltext"><a href="modcp.php?action=reports">{$lang->unread_reports}</a></span></td>\n</tr>\n</table>\n<br />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (204, 'member_loggedin_notice', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="trow1" align="right"><span class="smalltext">{$lang->already_logged_in}</a></span></td>\n</tr>\n</table>\n<br />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (205, 'member_login', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->login}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<br />\n{$inline_errors}\n{$member_loggedin_notice}\n<form action="member.php" method="post">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->login}</strong></td>\n</tr>\n<tr>\n<td class="trow1"><strong>{$lang->username}</strong></td>\n<td class="trow1"><input type="text" class="textbox" name="username" size="25" maxlength="{$mybb->settings[''maxnamelength'']}" style="width: 200px;" value="{$username}" /></td>\n</tr>\n<tr>\n<td class="trow2"><strong>{$lang->password}</strong><br /><span class="smalltext">{$lang->pw_note}</span></td>\n<td class="trow2"><input type="password" class="textbox" name="password" size="25" style="width: 200px;" value="{$password}" /> (<a href="member.php?action=lostpw">{$lang->lostpw_note}</a>)</td>\n</tr>\n{$captcha}\n</table>\n<br />\n<div align="center"><input type="submit" class="button" name="submit" value="{$lang->login}" /></div>\n<input type="hidden" name="action" value="do_login" />\n<input type="hidden" name="url" value="{$redirect_url}" />\n</form>\n{$footer}\n</body>\n</html>', -2, '1404', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (206, 'misc_imcenter_aim', '<html>\n<head>\n<title>{$lang->aim_center}</title>\n{$headerinclude}\n</head>\n<body style="margin:0;left:0;top:0" class="trow2">\n<table width="100%" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" border="0" align="center" class="tborder">\n<tr>\n<td class="thead" align="center" colspan="2"><strong>{$user[''username'']} - {$lang->aim_center}</strong></td>\n</tr>\n<tr>\n<td class="tcat" align="center" colspan="2"><span class="smalltext"><strong>{$navigationbar}</strong></span></td>\n</tr>\n<tr>\n<td class="trow2">\n<!-- Begin AIM Remote -->\n<table align="center" cellspacing="0" cellpadding="0" border="0">\n<tr>\n<td align="center" style="white-space: nowrap"><a href="http://www.aol.co.uk/aim/index.html"><img src="http://www.aol.co.uk/aim/remote/gr/aimver_man.gif" width="44" height="55" alt="($lang->download_aim}" title="($lang->download_aim}" /></a><img src="http://www.aol.co.uk/aim/remote/gr/aimver_topsm.gif" width="73" height="55" alt="{$lang->aim_remote}" title="{$lang->aim_remote}" /></td>\n</tr>\n<tr>\n<td align="center" style="white-space: nowrap"><a href="aim:goim?screenname={$user[''aim'']}&amp;message=Hi.+Are+you+there?"><img src="http://www.aol.co.uk/aim/remote/gr/aimver_im.gif" width="117" height="39" alt="{$lang->send_me_instant}" title="{$lang->send_me_instant}" /></a></td>\n</tr>\n<tr>\n<td align="center" style="white-space: nowrap"><a href="aim:addbuddy?screenname={$user[''aim'']}"><img src="http://www.aol.co.uk/aim/remote/gr/aimver_bud.gif" width="117" height="39" alt="{$lang->add_me_buddy_list}" title="{$lang->add_me_buddy_list}" /></a></td>\n</tr>\n<tr>\n<td align="center" style="white-space: nowrap"><a href="http://www.aol.co.uk/aim/remote.html"><img src="http://www.aol.co.uk/aim/remote/gr/aimver_botadd.gif" width="117" height="23" alt="($lang->add_remote_to_page}" title="($lang->add_remote_to_page}" /></a></td>\n</tr>\n<td align="center" style="white-space: nowrap"><a href="http://www.aol.co.uk/aim/index.html"><img src="http://www.aol.co.uk/aim/remote/gr/aimver_botdow.gif" width="117" height="29" alt="{$lang->download_aol_im}" title="{$lang->download_aol_im}" /></a></td>\n</tr>\n</table>\n<!-- End AIM Remote -->\n</td>\n</tr>\n</table>\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (207, 'misc_syndication', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->syndication}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n{$feedurl}\n<table border="0" cellspacing="0" cellpadding="{$theme[''tablespace'']}" width="100%">\n<tr><td>{$lang->syndication_note}</td></tr>\n</table>\n<br />\n<form method="post" action="misc.php?action=syndication">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->syndication}</strong></td>\n</tr>\n<tr>\n<td class="trow1" width="40%" valign="top"><strong>{$lang->syndication_forum}</strong><br /><span class="smalltext">{$lang->syndication_forum_desc}</span></td>\n<td class="trow1" width="60%">{$forumselect}</td>\n</tr>\n<tr>\n<td class="trow2" width="40%" valign="top"><strong>{$lang->syndication_version}</strong><br /><span class="smalltext">{$lang->syndication_version_desc}</span></td>\n<td class="trow2" width="60%"><input type="radio" class="radio" name="version" value="rss2.0" {$rss2check} />&nbsp;{$lang->syndication_version_rss2}<br /><input type="radio" class="radio" name="version" value="atom1.0" {$atom1check} />&nbsp;{$lang->syndication_version_atom1}</td>\n</tr>\n<tr>\n<td class="trow1" width="40%" valign="top"><strong>{$lang->syndication_limit}</strong><br /><span class="smalltext">{$lang->syndication_limit_desc}</span></td>\n<td class="trow1" width="60%"><input type="text" class="textbox" name="limit" value="{$limit}" size="3" /> {$lang->syndication_threads_time}</td>\n</tr></table>\n<br />\n<div align="center"><input type="submit" class="button" name="make" value="{$lang->syndication_generate}" /></div>\n</form>\n{$footer}\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (208, 'misc_syndication_feedurl', '<table border="0" cellspacing="0" cellpadding="{$theme[''tablespace'']}" width="100%">\n<tr><td>\n<strong>{$lang->syndication_generated_url}</strong><blockquote>\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder"><tr><td class="trow1">\n{$url}\n</td></tr></table>\n</blockquote>\n</td></tr>\n</table>\n<br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (209, 'memberlist_user', '<tr>\n	<td class="{$alt_bg}" align="center">{$user[''avatar'']}</td>\n	<td class="{$alt_bg}">{$user[''profilelink'']}<br />\n<span class="smalltext">\n	{$user[''usertitle'']}<br />\n	{$usergroup[''groupimage'']}\n	{$user[''userstars'']}\n</span></td>\n	<td class="{$alt_bg}" align="center">{$user[''regdate'']}</td>\n	<td class="{$alt_bg}" align="center">{$user[''lastvisit'']}</td>\n	<td class="{$alt_bg}" align="center">{$user[''postnum'']}</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (210, 'memberlist_user_avatar', '<img src="{$user[''avatar'']}" alt="" {$avatar_width_height} />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (211, 'memberlist_user_groupimage', '<img src="{$usergroup[''image'']}" alt="{$usergroup[''title'']}" title="{$usergroup[''title'']}" />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (212, 'index_loginform', '<br /><br />\n<form action="member.php" method="post">\n	<input type="hidden" name="action" value="do_login" />\n	<span class="smalltext"><strong>{$lang->quick_login}</strong></span>\n	<input type="text" class="textbox" name="username" title="{$lang->login_username}" value="{$lang->login_username}" onfocus="if(this.value == ''{$lang->login_username}'') { this.value=''''; }" onblur="if(this.value=='''') { this.value=''{$lang->login_username}''; }" />\n	<input type="password" class="textbox" name="password" title="{$lang->login_password}" value="{$lang->login_password}" onfocus="if(this.value == ''{$lang->login_password}'') { this.value=''''; }" onblur="if(this.value=='''') { this.value=''{$lang->login_password}''; }" />\n	{$gobutton}\n</form>', -2, '123', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (213, 'multipage', '<div class="pagination">\n<span class="pages">{$lang->multipage_pages}</span>\n{$prevpage}{$start}{$mppage}{$end}{$nextpage}\n</div>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (214, 'multipage_end', '... <a href="{$page_url}" class="pagination_last">{$pages}</a>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (215, 'multipage_nextpage', '<a href="{$page_url}" class="pagination_next">{$lang->next} &raquo;</a>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (216, 'multipage_page', '<a href="{$page_url}" class="pagination_page">{$i}</a>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (217, 'multipage_page_current', ' <span class="pagination_current">{$i}</span>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (218, 'multipage_prevpage', '<a href="{$page_url}" class="pagination_previous">&laquo; {$lang->previous}</a>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (219, 'multipage_start', '<a href="{$page_url}" class="pagination_first">1</a> ...', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (220, 'usercp_forumsubscriptions_none', '<tr>\n<td class="trow1" colspan="5">{$lang->no_forum_subscriptions}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (221, 'index_whosonline', '<tr>\n<td class="tcat"><span class="smalltext"><strong>{$lang->whos_online}</strong> [<a href="online.php">{$lang->complete_list}</a>]</span></td>\n</tr>\n<tr>\n<td class="trow1"><span class="smalltext">{$lang->online_note}<br />{$onlinemembers}</span></td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (222, 'index_stats', '<tr><td class="tcat"><span class="smalltext"><strong>{$lang->boardstats}</strong></span></td></tr>\n<tr>\n<td class="trow1"><span class="smalltext">\n{$lang->stats_posts_threads}<br />\n{$lang->stats_numusers}<br />\n{$lang->stats_newestuser}<br />\n{$lang->stats_mostonline}\n</span>\n</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (223, 'moderation_deletethread', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->delete_thread}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="moderation.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$thread[''subject'']} - {$lang->delete_thread}</strong></td>\n</tr>\n<tr>\n<td class="trow1" colspan="2" align="center">{$lang->confirm_delete_threads}</td>\n</tr>\n{$loginbox}\n</table>\n<br />\n<div align="center"><input type="submit" class="button" name="submit" value="{$lang->delete_thread}" /></div>\n<input type="hidden" name="action" value="do_deletethread" />\n<input type="hidden" name="tid" value="{$tid}" />\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (224, 'postbit_attachments_thumbnails', '<span class="smalltext"><strong>{$lang->postbit_attachments_thumbnails}</strong></span><br />\n{$post[''thumblist'']}\n<br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (225, 'forumdisplay_subforums', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="5" align="center"><strong>{$lang->sub_forums_in}</strong></td>\n</tr>\n<tr>\n<td class="tcat" width="2%">&nbsp;</td>\n<td class="tcat" width="59%"><span class="smalltext"><strong>{$lang->forumbit_forum}</strong></span></td>\n<td class="tcat" width="7%" align="center" style="white-space: nowrap"><span class="smalltext"><strong>{$lang->forumbit_threads}</strong></span></td>\n<td class="tcat" width="7%" align="center" style="white-space: nowrap"><span class="smalltext"><strong>{$lang->forumbit_posts}</strong></span></td>\n<td class="tcat" width="15%" align="center"><span class="smalltext"><strong>{$lang->forumbit_lastpost}</strong></span></td>\n</tr>\n{$forums}\n</table>\n<br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (226, 'forumdisplay_threadlist_rating', '	<td class="tcat" align="center" width="80">\n		<span class="smalltext"><strong><a href="{$sorturl}&amp;sortby=rating&amp;order=desc">{$lang->rating}</a> {$orderarrow[''rating'']}</strong></span>\n		<script type="text/javascript" src="jscripts/rating.js?ver=1400"></script>\n		<script type="text/javascript">\n		<!--\n			lang.stars = new Array();\n			lang.stars[1] = "{$lang->one_star}";\n			lang.stars[2] = "{$lang->two_stars}";\n			lang.stars[3] = "{$lang->three_stars}";\n			lang.stars[4] = "{$lang->four_stars}";\n			lang.stars[5] = "{$lang->five_stars}";\n		// -->\n		</script>\n	</td>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (227, 'forumdisplay_thread', '<tr>\n	<td align="center" class="{$bgcolor}" width="2%"><img src="{$theme[''imgdir'']}/{$folder}.gif" alt="{$folder_label}" title="{$folder_label}" /></td>\n	<td align="center" class="{$bgcolor}" width="2%">{$icon}</td>\n	<td class="{$bgcolor}">\n		{$attachment_count}\n		<div>\n			<span>{$prefix} {$gotounread}<a href="{$thread[''threadlink'']}" class="{$inline_edit_class} {$new_class}" id="tid_{$inline_edit_tid}">{$thread[''subject'']}</a>{$thread[''multipage'']}</span>\n			<div class="author smalltext">{$thread[''profilelink'']}</div>\n		</div>\n	</td>\n	<td align="center" class="{$bgcolor}"><a href="javascript:MyBB.whoPosted({$thread[''tid'']});">{$thread[''replies'']}</a>{$unapproved_posts}</td>\n	<td align="center" class="{$bgcolor}">{$thread[''views'']}</td>\n	{$rating}\n	<td class="{$bgcolor}" style="white-space: nowrap; text-align: right;">\n		<span class="lastpost smalltext">{$lastpostdate} {$lastposttime}<br />\n		<a href="{$thread[''lastpostlink'']}">{$lang->lastpost}</a>: {$lastposterlink}</span>\n	</td>\n{$modbit}\n</tr>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (228, 'forumdisplay_orderarrow', '<span class="smalltext">[<a href="{$sorturl}&amp;sortby={$sortby}&amp;order={$oppsortnext}">{$oppsort}</a>]</span>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (229, 'postbit_posturl', '<div style="float: right; width: auto; vertical-align: top"><span class="smalltext"><strong>{$lang->postbit_post} <a href="{$post[''postlink'']}#pid{$post[''pid'']}">#{$postcounter}</a></strong>{$post[''inlinecheck'']}</span></div>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (230, 'postbit_attachments_thumbnails_thumbnail', '<a href="attachment.php?aid={$attachment[''aid'']}" target="_blank"><img src="attachment.php?thumbnail={$attachment[''aid'']}" class="attachment" alt="" /></a>&nbsp;&nbsp;&nbsp;', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (231, 'postbit_attachments_images_image', '<img src="attachment.php?aid={$attachment[''aid'']}" class="attachment" alt="" />&nbsp;&nbsp;&nbsp;', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (232, 'postbit_signature', '<hr size="1" width="25%"  align="left" />\n{$post[''signature'']}', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (233, 'post_attachments_attachment', '<tr>\n<td class="trow2" width="1" align="center">{$attachment[''icon'']}</td>\n<td class="trow2" width="100%" style="white-space: nowrap">{$attachment[''filename'']} ({$attachment[''size'']})</td>\n<td class="trow2" style="white-space: nowrap; text-align: center;">{$attach_mod_options} <input type="submit" class="button" name="rem" value="{$lang->remove_attachment}" onclick="return Post.removeAttachment({$attachment[''aid'']});" /> {$postinsert}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (234, 'post_attachments_attachment_unapproved', '<tr>\n<td class="trow_shaded" width="1" align="center">{$attachment[''icon'']}</td>\n<td class="trow_shaded" style="white-space: nowrap"><em><a href="attachment.php?aid={$attachment[''aid'']}" target="_blank">{$attachment[''filename'']}</a> ({$attachment[''size'']})</em></td>\n<td class="trow_shaded" style="white-space: nowrap; text-align: center;">{$attach_mod_options} <input type="submit" class="button" name="rem" value="{$lang->remove_attachment}" onclick="return Post.removeAttachment({$attachment[''aid'']});" /> {$postinsert}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (235, 'post_attachments_attachment_mod_approve', '<input type="submit" class="button" name="approveattach" value="{$lang->approve_attachment}" onclick="return Post.attachmentAction({$attachment[''aid'']},''approve'');" />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (236, 'post_attachments_attachment_mod_unapprove', '<input type="submit" class="button" name="unapproveattach" value="{$lang->unapprove_attachment}" onclick="return Post.attachmentAction({$attachment[''aid'']},''unapprove'');" />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (237, 'error_attacherror', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder"><tr>\n<td class="thead"><strong>{$lang->error_attach_file}</strong></td>\n</tr>\n<tr>\n<td class="trow1">{$attachedfile[''error'']}</td>\n</tr>\n</table>\n<br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (238, 'postbit_attachments', '<br />\n<br />\n<fieldset>\n<legend><strong>{$lang->postbit_attachments}</strong></legend>\n{$post[''attachedthumbs'']}\n{$post[''attachedimages'']}\n{$post[''attachmentlist'']}\n</fieldset>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (239, 'postbit_attachments_attachment', '<br />{$attachment[''icon'']}&nbsp;&nbsp;<a href="attachment.php?aid={$attachment[''aid'']}" target="_blank">{$attachment[''filename'']}</a> ({$lang->postbit_attachment_size} {$attachment[''filesize'']} / {$lang->postbit_attachment_downloads} {$attachment[''downloads'']})', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (240, 'postbit_attachments_attachment_unapproved', '<br /><strong>{$postbit_unapproved_attachments}</strong>', -2, '1402', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (241, 'postbit_attachments_images', '<span class="smalltext"><strong>{$lang->postbit_attachments_images}</strong></span><br />\n{$post[''imagelist'']}\n<br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (242, 'post_attachments_attachment_postinsert', '<input type="button" class="button" name="insert" value="{$lang->insert_attachment_post}" onclick="clickableEditor.insertAttachment({$attachment[''aid'']});" />', -2, '1405', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (243, 'moderation_mergeposts', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->merge_posts}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="moderation.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder"><tr>\n<td class="thead" colspan="2"><strong>{$lang->merge_posts}</strong></td>\n</tr>\n<tr>\n<td class="trow1" colspan="2">{$lang->merge_posts_note}</td>\n</tr>\n<tr>\n<td class="tcat" colspan="2"><strong>{$lang->post_separator}</strong></td>\n</tr>\n<tr>\n<td class="trow2" colspan="2"><label><input type="radio" class="radio" name="sep" value="hr" checked="checked" /> {$lang->horizontal_rule}</label><br /><label><input type="radio" class="radio" name="sep" value="new_line" /> {$lang->new_line}</label></td>\n</tr>\n{$posts}\n</table>\n<br />\n<div align="center"><input type="submit" class="button" name="submit" value="{$lang->merge_posts}" /></div>\n<input type="hidden" name="action" value="do_mergeposts" />\n<input type="hidden" name="tid" value="{$tid}" />\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (244, 'moderation_mergeposts_post', '<tr>\n<td class="tcat" colspan="2"><span class="smalltext"><strong>{$lang->posted_by} {$post[''username'']} - {$postdate} {$posttime}</strong></span></td>\n</tr>\n<tr>\n<td class="{$altbg}" valign="top" align="center" width="1"><input type="checkbox" class="checkbox" name="mergepost[{$post[''pid'']}]" value="1" /></td>\n<td class="{$altbg}">{$message}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (245, 'stats', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->board_stats}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->board_stats}</strong></td>\n</tr>\n<tr>\n<td class="tcat" width="50%"><strong>{$lang->totals}</strong></td>\n<td class="tcat" width="50%"><strong>{$lang->averages}</strong></td>\n</tr>\n<tr>\n<td class="trow1" valign="top">\n{$lang->posts} <strong>{$stats[''numposts'']}</strong><br />\n{$lang->threads} <strong>{$stats[''numthreads'']}</strong><br />\n{$lang->members} <strong>{$stats[''numusers'']}</strong>\n</td>\n<td class="trow1" rowspan="3" valign="top">\n{$lang->ppd} <strong>{$postsperday}</strong><br />\n{$lang->tpd} <strong>{$threadsperday}</strong><br />\n{$lang->mpd} <strong>{$membersperday}</strong><br />\n{$lang->ppm} <strong>{$postspermember}</strong><br />\n{$lang->rpt} <strong>{$repliesperthread}</strong>\n</td>\n</tr>\n<tr>\n<td class="tcat" valign="top"><strong>{$lang->general}</strong></td>\n</tr>\n<tr>\n<td class="trow1">\n{$lang->newest_member} {$stats[''newest_user'']}<br />\n{$lang->members_posted} <strong>{$havepostedpercent}</strong><br />\n{$lang->todays_top_poster}<br />\n{$lang->popular_forum}\n</td>\n</tr>\n</table>\n\n\n<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->most_popular}</strong></td>\n</tr>\n<tr>\n<td class="tcat" width="50%"><strong>{$lang->most_replied_threads}</strong></td>\n<td class="tcat" width="50%"><strong>{$lang->most_viewed_threads}</strong></td>\n</tr>\n<tr>\n<td class="trow1" valign="top">{$mostreplies}</td>\n<td class="trow1" valign="top">{$mostviews}</td>\n</tr>\n</table>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (246, 'polls_newpoll', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->post_new_poll}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n{$preview}\n<form action="polls.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->post_new_poll}</strong></td>\n</tr>\n{$loginbox}\n<tr>\n<td class="trow2"><strong>{$lang->question}</strong></td>\n<td class="trow2"><input type="text" class="textbox" name="question" size="40" maxlength="240" value="{$question}" /></td>\n</tr>\n<tr>\n<td class="trow1" valign="top"><strong>{$lang->num_options}</strong><br /><span class="smalltext">{$lang->max_options} {$mybb->settings[''maxpolloptions'']}</span></td>\n<td class="trow1"><input type="text" class="textbox" name="polloptions" size="10" value="{$polloptions}" />&nbsp;<input type="submit" class="button" name="updateoptions" value="{$lang->update_options}" /></td>\n</tr>\n<tr>\n<td class="trow2" valign="top"><strong>{$lang->poll_options}</strong></td>\n<td class="trow2"><span class="smalltext">{$lang->poll_options_note}</span>\n<table border="0" cellspacing="0" cellpadding="0">\n{$optionbits}\n</table>\n</td>\n</tr>\n<tr>\n<td class="trow1" valign="top"><strong>{$lang->options}</strong></td>\n<td class="trow1"><span class="smalltext">\n<label><input type="checkbox" class="checkbox" name="postoptions[multiple]" value="1" {$postoptionschecked[''multiple'']} />&nbsp;{$lang->option_multiple}</label><br />\n<label><input type="checkbox" class="checkbox" name="postoptions[public]" value="1" {$postoptionschecked[''public'']} />&nbsp;{$lang->option_public}</label>\n</span>\n</td>\n</tr>\n<tr>\n<td class="trow2" valign="top"><strong>{$lang->poll_timeout}</strong><br /><span class="smalltext">{$lang->timeout_note}</span></td>\n<td class="trow2"><input type="text" class="textbox" name="timeout" value="{$timeout}" /> {$lang->days}</td>\n</tr>\n</table>\n<br />\n<div align="center"><input type="submit" class="button" name="submit" value="{$lang->post_new_poll}" /></div>\n<input type="hidden" name="action" value="do_newpoll" />\n<input type="hidden" name="tid" value="{$tid}" />\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (247, 'member_register_agreement', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->agreement}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<br />\n<form action="member.php" method="post">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead"><strong>{$mybb->settings[''bbname'']} - {$lang->agreement}</strong></td>\n</tr>\n{$coppa_agreement}\n<tr>\n<td class="trow1">\n<p>{$lang->agreement_1}</p>\n<p>{$lang->agreement_2}</p>\n<p>{$lang->agreement_3}</p>\n<p>{$lang->agreement_4}</p>\n<p><strong>{$lang->agreement_5}</strong></p>\n</td>\n</tr>\n</table>\n\n<br />\n<div align="center">\n<input type="hidden" name="step" value="agreement" />\n<input type="hidden" name="action" value="register" />\n<input type="submit" class="button" name="agree" value="{$lang->i_agree}" />\n</div>\n</form>\n{$footer}\n</body>\n</html>', -2, '123', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (248, 'stats_thread', '<a href="{$thread[''threadlink'']}"><strong>{$thread[''subject'']}</strong></a> ({$numberbit} {$numbertype})<br />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (249, 'online', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->users_online}</title>\n{$headerinclude}\n{$refresh}\n</head>\n<body>\n	{$header}\n	{$multipage}\n	<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n		<tr>\n			<td class="thead" colspan="3"><strong>{$lang->users_online}</strong></td>\n		</tr>\n		<tr>\n			<td class="tcat" align="center"><a href="online.php?sortby=username"><span class="smalltext"><strong>{$lang->on_username}</strong></span></a></td>\n			<td class="tcat" align="center"><a href="online.php?sortby=time"><span class="smalltext"><strong>{$lang->time}</strong></span></a></td>\n			<td class="tcat" width="50%"><a href="online.php?sortby=location"><span class="smalltext"><strong>{$lang->location}</strong></span></a></td>\n		</tr>\n		{$online_rows}\n		<tr>\n			<td class="tfoot" colspan="3" align="right"><span class="smalltext"><strong><a href="online.php?action=today">{$lang->online_today}</a> | <a href="online.php">{$lang->refresh_page}</a></strong></span></td>\n		</tr>\n	</table>\n	<br />\n	{$multipage}\n	{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (250, 'portal_welcome_membertext', '<span class="smalltext"><em>{$lang->member_welcome_lastvisit}</em> {$lastvisit}<br />\n{$lang->since_then}<br />\n<strong>&raquo;</strong> {$lang->new_announcements}<br />\n<strong>&raquo;</strong> {$lang->new_threads}<br />\n<strong>&raquo;</strong> {$lang->new_posts}<br /><br />\n<a href="{$mybb->settings[''bburl'']}/search.php?action=getnew">{$lang->view_new}</a><br /><a href="{$mybb->settings[''bburl'']}/search.php?action=getdaily">{$lang->view_todays}</a>\n</span>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (251, 'portal', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<table width="100%" cellspacing="0" cellpadding="{$theme[''tablespace'']}" border="0" align="center">\n<tr><td valign="top" width="200">\n{$welcome}\n{$pms}\n{$search}\n{$stats}\n{$whosonline}\n{$latestthreads}\n</td>\n<td>&nbsp;</td>\n<td valign="top">\n{$announcements}\n</td>\n</tr>\n</table>\n{$footer}\n</body>\n</html>', -2, '127', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (252, 'portal_pms', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead"><strong><a href="{$mybb->settings[''bburl'']}/private.php">{$lang->private_messages}</a></strong></td>\n</tr>\n<tr>\n<td class="trow1">\n<span class="smalltext">{$lang->pms_received_new}<br /><br />\n<strong>&raquo; </strong> <strong>{$messages[''pms_unread'']}</strong> {$lang->pms_unread}<br />\n<strong>&raquo; </strong> <strong>{$messages[''pms_total'']}</strong> {$lang->pms_total}</span>\n</td>\n</tr>\n</table>\n<br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (253, 'portal_stats', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead"><strong>{$lang->forum_stats}</strong></td>\n</tr>\n<tr>\n<td class="trow1">\n<span class="smalltext">\n<strong>&raquo; </strong>{$lang->num_members} {$stats[''numusers'']}<br />\n<strong>&raquo; </strong>{$lang->latest_member} {$newestmember}<br />\n<strong>&raquo; </strong>{$lang->num_threads} {$stats[''numthreads'']}<br />\n<strong>&raquo; </strong>{$lang->num_posts} {$stats[''numposts'']}\n<br /><br /><a href="{$mybb->settings[''bburl'']}/stats.php">{$lang->full_stats}</a>\n</span>\n</td>\n</tr>\n</table>\n<br />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (254, 'portal_welcome', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead"><strong>{$lang->welcome}</strong></td>\n</tr>\n<tr>\n<td class="trow1">\n{$welcometext}\n</td>\n</tr>\n</table><br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (255, 'portal_whosonline', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead"><strong>{$lang->online}</strong></td>\n</tr>\n<tr>\n<td class="trow1">\n<span class="smalltext">\n{$lang->online_users}<br /><strong>&raquo;</strong> {$lang->online_counts}<br />{$onlinemembers}\n</span>\n</td>\n</tr>\n</table>\n<br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (256, 'portal_announcement_numcomments', '- <a href="{$mybb->settings[''bburl'']}/{$announcement[''threadlink'']}">{$lang->replies}</a> ({$announcement[''replies'']})', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (257, 'portal_announcement', '<table cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead"><strong>{$icon} <a href="{$mybb->settings[''bburl'']}/{$announcement[''threadlink'']}">{$announcement[''subject'']}</a></strong></td>\n</tr>\n<tr>\n<td class="trow2" align="right">\n<span class="smalltext">{$lang->posted_by} {$profilelink}  - {$anndate} {$anntime} {$numcomments}</span>\n</td>\n</tr>\n<tr>\n<td class="trow1">\n<table border="0" cellpadding="{$theme[''tablespace'']}" width="100%">\n	<tr>\n		{$avatar}\n		<td class="trow1">\n			<p>\n				{$message}\n			</p>\n			{$post[''attachments'']}\n		</td>\n	</tr>\n	<tr>\n		<td align="right" colspan="2" valign="bottom">\n			<span class="smalltext">\n				<a href="{$mybb->settings[''bburl'']}/printthread.php?tid={$announcement[''tid'']}"><img src="{$mybb->settings[''bburl'']}/{$theme[''imgdir'']}/printable.gif" alt="{$lang->print_this_item}" title="{$lang->print_this_item}" /></a>&nbsp;<a href="{$mybb->settings[''bburl'']}/sendthread.php?tid={$announcement[''tid'']}"><img src="{$mybb->settings[''bburl'']}/{$theme[''imgdir'']}/send.gif" alt="{$lang->send_to_friend}" title="{$lang->send_to_friend}" /></a>\n			</span>\n		</td>\n	</tr>\n</table>\n</td>\n</tr>\n</table>\n<br />', -2, '1405', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (258, 'portal_announcement_numcomments_no', '- {$lang->no_replies}', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (259, 'portal_search', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead"><strong>{$lang->search_forums}</strong></td>\n</tr>\n<tr>\n<td class="trow1" align="center">\n<form method="post" action="{$mybb->settings[''bburl'']}/search.php">\n<input type="hidden" name="action" value="do_search" />\n<input type="hidden" name="postthread" value="1" />\n<input type="hidden" name="forums" value="all" />\n<input type="hidden" name="showresults" value="threads" />\n<input type="text" class="textbox" name="keywords" value="" />\n{$gobutton}\n</form><br />\n<span class="smalltext">\n(<a href="{$mybb->settings[''bburl'']}/search.php">{$lang->advanced_search}</a>)\n</span>\n</td>\n</tr>\n</table>\n<br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (260, 'portal_latestthreads', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead"><strong>{$lang->latest_threads}</strong></td>\n</tr>\n{$threadlist}\n</table>\n<br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (261, 'portal_whosonline_memberbit', '{$comma}<a href="{$mybb->settings[''bburl'']}/{$user[''profilelink'']}">{$user[''username'']}</a>{$invisiblemark}', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (262, 'printthread', '<html>\n<head>\n<title>{$thread[''subject'']} - {$lang->printable_version}</title>\n<meta http-equiv="Content-Type" content="text/html; charset={$charset}" />\n<style type="text/css">\nbody { font-family: Verdana, Arial, sans-serif; font-size: 13px; }\n.largetext { font-family: Verdana, Arial, sans-serif; font-size: medium; font-weight: bold; }\n</style>\n</head>\n<body>\n<table width="98%" align="center">\n<tr>\n<td valign="top"><a href="index.php"><img src="{$theme[''logo'']}" alt="{$mybb->settings[''bbname'']}" title="{$mybb->settings[''bbname'']}" border="0" /></a></td>\n</tr>\n<tr>\n<td>\n<span class="largetext"><a href="{$thread[''threadlink'']}">{$thread[''subject'']}</a> - {$lang->printable_version}</span><br />\n<br />\n+- {$mybb->settings[''bbname'']} (<em>{$mybb->settings[''bburl'']}</em>)<br />\n{$breadcrumb}\n+{$tdepth} {$lang->thread} {$thread[''subject'']} (<em>/{$thread[''threadlink'']}</em>)</td>\n</tr>\n<tr>\n<td><br /><hr size="1" />{$postrows}</td>\n</tr>\n</table>\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (263, 'forumdisplay_nothreads', '<tr>\n<td colspan="{$colspan}" class="trow1">{$lang->nothreads}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (264, 'usercp_password', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->change_password}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="usercp.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n{$errors}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->change_password}</strong></td>\n</tr>\n<tr>\n<td class="tcat" colspan="2"><strong>{$lang->current_password}</strong></td>\n</tr>\n<tr>\n<td class="trow1" colspan="2" align="center"><input type="password" class="textbox" name="oldpassword" size="25" /></td>\n</tr>\n<tr>\n<td class="tcat" colspan="2"><strong>{$lang->please_enter_confirm_new_password}</strong></td>\n</tr>\n<tr>\n<td class="trow2" width="40%"><strong>{$lang->new_password}</strong></td>\n<td class="trow2" width="60%"><input type="password" class="textbox" name="password" size="25" /></td>\n</tr>\n<tr>\n<td class="trow1" width="40%"><strong>{$lang->confirm_password}</strong></td>\n<td class="trow1" width="60%"><input type="password" class="textbox" name="password2" size="25" /></td>\n</tr>\n</table>\n<br />\n<div align="center">\n<input type="hidden" name="action" value="do_password" />\n<input type="submit" class="button" name="submit" value="{$lang->update_password}" />\n</div>\n</td>\n</tr>\n</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (265, 'usercp_email', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->change_email}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="usercp.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n{$errors}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->change_email}</strong></td>\n</tr>\n<tr>\n<td class="tcat" colspan="2"><strong>{$lang->enter_password}</strong></td>\n</tr>\n<tr>\n<td class="trow1" colspan="2" align="center"><input type="password" class="textbox" name="password" size="25" /></td>\n</tr>\n<tr>\n<td class="tcat" colspan="2"><strong>{$lang->please_enter_confirm_new_email}</strong></td>\n</tr>\n<tr>\n<td class="trow2" width="40%"><strong>{$lang->new_email}</strong></td>\n<td class="trow2" width="60%"><input type="text" class="textbox" name="email" size="25" maxlength="150" value="{$email}" /></td>\n</tr>\n<tr>\n<td class="trow1" width="40%"><strong>{$lang->confirm_email}</strong></td>\n<td class="trow1" width="60%"><input type="text" class="textbox" name="email2" size="25" maxlength="150" value="{$email2}" /></td>\n</tr>\n</table>\n<br />\n<div align="center">\n<input type="hidden" name="action" value="do_email" />\n<input type="submit" class="button" name="submit" value="{$lang->update_email}" />\n</div>\n</td>\n</tr>\n</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (266, 'private_archive_txt_folderhead', '#######################################################################\n{$lang->folder} {$foldername}\n#######################################################################\n', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (267, 'private_archive_txt_message', '{$lang->subject} {$message[''subject'']}\n{$tofrom} {$tofromusername}\n{$lang->sent} {$senddate}\n------------------------------------------------------------------------\n{$message[''message'']}\n------------------------------------------------------------------------\n\n', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (268, 'private_archive_html_folderhead', '</table>\n<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="tcat" colspan="2"><strong>{$lang->folder} {$foldername}</strong></td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (269, 'private_archive_html_message', '<tr>\n<td class="trow1"><strong>{$lang->subject} {$message[''subject'']}</strong><br /><em>{$lang->to} {$message[''tousername'']}<br />{$lang->from} {$message[''fromusername'']}<br />{$lang->sent} {$senddate}</em></td>\n</tr>\n<tr>\n<td class="trow2">{$message[''message'']}</td>\n</tr>\n<tr>\n<td class="tcat" height="3"><img src="pixel.gif" height="3" width="1" alt="" /></td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (270, 'private_archive_csv_message', '{$senddate},"{$foldername}","{$message[''subject'']}","{$message[''tousername'']}","{$message[''fromusername'']}","{$message[''message'']}"\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (271, 'search_results_threads_thread', '<tr>\n	<td align="center" class="{$bgcolor}" width="2%"><img src="{$theme[''imgdir'']}/{$folder}.gif"  alt="{$folder_label}" title="{$folder_label}" /></td>\n	<td align="center" class="{$bgcolor}" width="2%">{$icon}</td>\n	<td class="{$bgcolor}">\n		{$attachment_count}\n		<div>\n			<span>{$prefix} {$gotounread}<a href="{$thread_link}{$highlight}" class="{$inline_edit_class} {$new_class}" id="tid_{$inline_edit_tid}">{$thread[''subject'']}</a>{$thread[''multipage'']}</span>\n			<div class="author smalltext">{$thread[''profilelink'']}</div>\n		</div>\n	</td>\n	<td class="{$bgcolor}">{$thread[''forumlink'']}</td>\n	<td align="center" class="{$bgcolor}"><a href="javascript:MyBB.whoPosted({$thread[''tid'']});">{$thread[''replies'']}</a></td>\n	<td align="center" class="{$bgcolor}">{$thread[''views'']}</td>\n	<td class="{$bgcolor}" style="white-space: nowrap">\n		<span class="smalltext">\n			{$lastpostdate} {$lastposttime}<br />\n			<a href="{$thread[''lastpostlink'']}">{$lang->lastpost}</a>: {$lastposterlink}\n		</span>\n	</td>\n	{$inline_mod_checkbox}\n</tr>', -2, '1401', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (272, 'search_results_threads', '<html>\n		<head>\n		<title>{$mybb->settings[''bbname'']} - {$lang->search_results}</title>\n		{$headerinclude}\n		</head>\n		<body>\n		{$header}\n		<table width="100%" align="center" border="0">\n			<tr>\n				<td align="right" valign="top">{$multipage}</td>\n			</tr>\n		</table>\n		<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n			<tr>\n				<td colspan="8" class="thead">\n					<strong>{$lang->search_results}</strong>\n				</td>\n			</tr>\n			<tr>\n				<td class="tcat" align="center" colspan="3" width="56%"><span class="smalltext"><strong><a href="{$sorturl}&amp;sortby=subject&amp;order=asc">{$lang->thread}</a> {$orderarrow[''subject'']}</strong> / <strong><a href="{$sorturl}&amp;sortby=starter&amp;order=asc">{$lang->author}</a> {$orderarrow[''starter'']}</strong></span></td>\n				<td class="tcat" align="center" width="14%"><span class="smalltext"><strong><a href="{$sorturl}&amp;sortby=forum&amp;order=asc">{$lang->forum}</a> {$orderarrow[''forum'']}</strong></span></td>\n				<td class="tcat" align="center"><span class="smalltext"><strong><a href="{$sorturl}&amp;sortby=replies&amp;order=desc">{$lang->replies}</a> {$orderarrow[''replies'']}</strong></span></td>\n				<td class="tcat" align="center"><span class="smalltext"><strong><a href="{$sorturl}&amp;sortby=views&amp;order=desc">{$lang->views}</a> {$orderarrow[''views'']}</strong></span></td>\n				<td class="tcat" align="center" width="200"><span class="smalltext"><strong><a href="{$sorturl}&amp;sortby=lastpost&amp;order=desc">{$lang->lastpost}</a> {$orderarrow[''lastpost'']}</strong></span></td>\n				{$inlinemodcol}\n			</tr>\n			{$results}\n		</table>\n		{$inline_edit_js}\n		<table width="100%" align="center" border="0">\n			<tr>\n				<td align="left" valign="top">{$multipage}</td>\n				<td align="right" valign="top">{$inlinemod}</td>\n			</tr>\n		</table>\n		{$footer}\n		</body>\n		</html>', -2, '1405', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (273, 'search_results_posts_post', '<tr>\n	<td align="center" class="{$bgcolor}" width="2%"><img src="{$theme[''imgdir'']}/{$folder}.gif" alt=""/></td>\n	<td align="center" class="{$bgcolor}" width="2%">{$icon}</td>\n	<td class="{$bgcolor}">\n		<span class="smalltext">\n			{$lang->post_thread} <a href="{$thread_url}{$highlight}">{$post[''thread_subject'']}</a><br />\n			{$lang->post_subject} <a href="{$post_url}{$highlight}#pid{$post[''pid'']}">{$post[''subject'']}</a>\n		</span><br />\n		<table width="100%"><tr><td><span class="smalltext"><em>{$prev}</em></span></td></tr></table>\n	</td>\n	<td align="center" class="{$bgcolor}">{$post[''profilelink'']}</td>\n	<td class="{$bgcolor}" >{$post[''forumlink'']}</td>\n	<td align="center" class="{$bgcolor}"><a href="javascript:MyBB.whoPosted({$post[''tid'']});">{$post[''thread_replies'']}</a></td>\n	<td align="center" class="{$bgcolor}">{$post[''thread_views'']}</td>\n	<td class="{$bgcolor}" style="white-space: nowrap; text-align: center;"><span class="smalltext">{$posted}</span></td>\n	{$inline_mod_checkbox}\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (274, 'reputation_add', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->reputation}</title>\n{$headerinclude}\n</head>\n<body>\n<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n	<tr>\n		<td class="trow1" style="padding: 20px">\n			<strong>{$vote_title}</strong><br /><br />\n			<form action="reputation.php" method="post">\n				<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n				<input type="hidden" name="action" value="do_add" />\n				<input type="hidden" name="uid" value="{$user[''uid'']}" />\n				<select name="reputation" id="reputation">\n					{$positive_power}\n					<option value="0" class="reputation_neutral" onclick="$(''reputation'').className=''reputation_neutral''"{$vote_check[0]}>{$lang->power_neutral}</option>\n					{$negative_power}\n				</select>\n				<br /><br />\n				<span class="smalltext">{$lang->user_comments}</span>\n				<br />\n				<input type="text" class="textbox" name="comments" size="35" maxlength="250" value="{$comments}" style="width: 95%" />\n				<br /><br />\n				<div style="text-align: center;">\n					<input type="submit" class="button" value="{$vote_button}" />\n					{$delete_button}\n				</div>\n			</form>\n		</td>\n	</tr>\n</table>\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (275, 'postbit_reputation', '<br />{$lang->postbit_reputation} {$post[''userreputation'']}', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (276, 'moderation_threadnotes_modaction', '<tr>\n<td class="{$trow}" align="center">{$modaction[''profilelink'']}</td>\n<td class="{$trow}" align="center">{$modaction[''dateline'']}</td>\n<td class="{$trow}" align="center">{$modaction[''action'']}</td>\n<td class="{$trow}">{$info}</td>\n</tr>\n', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (277, 'misc_smilies', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->smilies_listing}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="3"><strong>{$lang->smilies_listing}</strong></td>\n</tr>\n<tr>\n<td class="tcat" colspan="2" align="center"><span class="smalltext"><strong>{$lang->name}</strong></span></td>\n<td class="tcat"><span class="smalltext"><strong>{$lang->abbreviation}</strong></span></td>\n</tr>\n{$smilies}\n</table>\n{$footer}\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (278, 'search_results_posts', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->search_results}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<table width="100%" align="center" border="0">\n	<tr>\n		<td align="right" valign="top">{$multipage}</td>\n	</tr>\n</table>\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n	<tr>\n		<td colspan="9" class="thead">\n			<strong>{$lang->search_results}</strong>\n		</td>\n	</tr>\n	<tr>\n		<td class="tcat" align="center" colspan="3"><span class="smalltext"><strong><a href="{$sorturl}&amp;sortby=subject&amp;order=asc">{$lang->post}</a> {$orderarrow[''subject'']}</strong></span></td>\n		<td class="tcat" align="center"><span class="smalltext"><strong><a href="{$sorturl}&amp;sortby=starter&amp;order=asc">{$lang->author}</a> {$orderarrow[''starter'']}</strong></span></td>\n		<td class="tcat" align="center"><span class="smalltext"><strong><a href="{$sorturl}&amp;sortby=forum&amp;order=asc">{$lang->forum}</a> {$orderarrow[''forum'']}</strong></span></td>\n		<td class="tcat" align="center"><span class="smalltext"><strong><a href="{$sorturl}&amp;sortby=replies&amp;order=desc">{$lang->replies}</a> {$orderarrow[''replies'']}</strong></span></td>\n		<td class="tcat" align="center"><span class="smalltext"><strong><a href="{$sorturl}&amp;sortby=views&amp;order=desc">{$lang->views}</a></strong> {$orderarrow[''views'']}</span></td>\n		<td class="tcat" align="center"><span class="smalltext"><strong><a href="{$sorturl}&amp;sortby=dateline&amp;order=desc">{$lang->posted}</a> {$orderarrow[''dateline'']}</strong></span></td>\n		{$inlinemodcol}\n	</tr>\n	{$results}\n</table>\n<table width="100%" align="center" border="0">\n	<tr>\n		<td align="left" valign="top">{$multipage}</td>\n		<td align="right" valign="top">{$inlinemod}</td>\n	</tr>\n</table>\n{$footer}\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (279, 'private_limitwarning', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="trow1" align="center"><span class="smalltext"><strong><span style="color:#FF0000;">{$lang->reached_warning}</span></strong><br />{$lang->reached_warning2}</span></td>\n</tr>\n</table>\n<br />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (280, 'misc_smilies_smilie', '<tr>\n<td class="{$class}" align="center"><img src="{$smilie[''image'']}" /></td>\n<td class="{$class}">{$smilie[''name'']}</td>\n<td class="{$class}">{$smilie[''find'']}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (281, 'member_emailuser_guest', '<tr>\n<td width="40%" class="trow2"><strong>{$lang->your_name}</strong><br /><span class="smalltext">{$lang->name_note}</span></td>\n<td width="60%" class="trow2"><input type="text" class="textbox" size="50" name="fromname" /></td>\n</tr>\n<tr>\n<td width="40%" class="trow1"><strong>{$lang->your_email}</strong><br /><span class="smalltext">{$lang->email_note}</span></td>\n<td width="60%" class="trow1"><input type="text" class="textbox" size="50" name="fromemail" /></td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (282, 'usercp_subscriptions', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->subscriptions}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="usercp.php" method="post" name="input">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<input type="hidden" name="action" value="do_subscriptions" />\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n{$multipage}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n	<tr>\n		<td class="thead" colspan="7"><strong>{$lang->subscriptions} ({$threadcount})</strong></td>\n	</tr>\n	<tr>\n		<td class="tcat" align="center" colspan="2">&nbsp;</td>\n		<td class="tcat" align="center"><span class="smalltext"><strong>{$lang->thread}</strong></span></td>\n		<td class="tcat" align="center" width="7%"><span class="smalltext"><strong>{$lang->replies}</strong></span></td>\n		<td class="tcat" align="center" width="7%"><span class="smalltext"><strong>{$lang->views}</strong></span></td>\n		<td class="tcat" align="center" width="200"><span class="smalltext"><strong>{$lang->lastpost}</strong></span></td>\n		<td class="tcat" align="center" width="1"><input name="allbox" title="Select All" type="checkbox" class="checkbox checkall" value="1" /></td>\n	</tr>\n	{$threads}\n	<tr>\n		<td class="tfoot" colspan="7">\n			<div class="float_right"><strong>{$lang->with_selected}</strong>\n				<select name="do">\n					<option value="delete">{$lang->delete_subscriptions}</option>\n					<option value="no_notification">{$lang->update_no_notification}</option>\n					<option value="instant_notification">{$lang->instant_notification}</option>\n				</select>\n				{$gobutton}\n			</div>\n			<div>\n				<strong><a href="usercp2.php?action=removesubscriptions&amp;my_post_key={$mybb->post_code}">{$lang->remove_all_subscriptions}</a></strong>\n			</div>\n		</td>\n	</tr>\n</table>\n{$multipage}\n</td>\n</tr>\n</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '1401', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (283, 'online_today_row', '<tr>\n<td align="center" class="trow1" width="50%">{$online[''profilelink'']}{$invisiblemark}</td>\n<td align="center" class="trow2" width="50%">{$onlinetime}</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (284, 'member_profile_email', '<tr>\n<td class="trow2"><strong>{$lang->email}</strong></td>\n<td class="trow2"><a href="member.php?action=emailuser&amp;uid={$memprofile[''uid'']}">{$lang->send_user_email}</a></td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (285, 'loginbox', '<tr>\n<td class="trow2"><strong>{$lang->username}</strong></td>\n<td class="trow2"><input type="text" class="textbox" name="username" size="30" value="{$username}" /></td>\n</tr>\n<tr>\n<td class="trow1"><strong>{$lang->password}</strong></td>\n<td class="trow1"><input type="password" class="textbox" name="password" size="30" value="{$password}" /></td>\n</tr>\n\n', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (286, 'misc_help_section_bit', '<tr>\n<td width="100%" class="{$altbg}"><strong><a href="misc.php?action=help&amp;hid={$helpdoc[''hid'']}">{$helpdoc[''name'']}</a></strong><br /><span class="smalltext">{$helpdoc[''description'']}</span></td>\n</tr>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (287, 'index_birthdays_birthday', '{$comma}{$bdayuser[''profilelink'']}{$age}', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (288, 'private_tracking_readmessage', '<tr>\n<td align="center" class="trow1" width="1%"><img src="{$theme[''imgdir'']}/old_pm.gif" alt="" /></td>\n<td class="trow2">{$readmessage[''subject'']}</td>\n<td class="trow1" align="center">{$readmessage[''profilelink'']}</td>\n<td class="trow2" align="right"><span class="smalltext">{$readdate}<br />{$readtime}</span></td>\n<td class="trow1"><input type="checkbox" class="checkbox" name="readcheck[{$readmessage[''pmid'']}]" value="1" /></td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (289, 'private_tracking_unreadmessage', '<tr>\n<td align="center" class="trow1" width="1%"><img src="{$theme[''imgdir'']}/new_pm.gif" alt="" /></td>\n<td class="trow2">{$unreadmessage[''subject'']}</td>\n<td class="trow1" align="center">{$unreadmessage[''profilelink'']}</td>\n<td class="trow2" align="right"><span class="smalltext">{$senddate}<br />{$sendtime}</span></td>\n<td class="trow1"><input type="checkbox" class="checkbox" name="unreadcheck[{$unreadmessage[''pmid'']}]" value="1" /></td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (290, 'private_tracking_nomessage', '<tr>\n<td align="center" class="trow1" colspan="5">{$lang->no_readmessages}</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (291, 'usercp_editlists_user', '<li style="width: 33%; float: left; list-style: none; margin-bottom: 4px;" id="{$type}_{$user[''uid'']}">\n	<a href="usercp.php?action=do_editlists&amp;my_post_key={$mybb->post_code}&amp;manage={$type}&amp;delete={$user[''uid'']}" onclick="return UserCP.removeBuddy(''{$type}'', {$user[''uid'']});" title="{$lang->remove_from_list}"><img src="{$theme[''imgdir'']}/buddy_delete.gif" title="[{$lang->delete}]"  alt="{$lang->remove_from_list}" style="vertical-align: middle;" /></a>\n	<img src="{$theme[''imgdir'']}/buddy_{$status}.gif" title="{$lang->$status}" alt="" style="vertical-align: middle;" />\n	{$profile_link}\n</li>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (292, 'showthread_threadedbox', '<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead"><span class="smalltext"><strong>{$lang->messages_in_thread}</strong></span></td>\n</tr>\n<tr>\n<td class="trow1">{$threadedbits}</td>\n</tr>\n</table>\n', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (293, 'showthread_multipage', '<tr>\n<td class="tcat" colspan="2"> {$multipage}</td>\n</tr>', -2, '126', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (294, 'forumbit_moderators', '<br />{$lang->forumbit_moderated_by} {$moderators}', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (295, 'moderation_deletepoll', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->delete_poll}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="moderation.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->delete_poll}</strong></td>\n</tr>\n{$loginbox}\n</table>\n<br />\n<div align="center"><input type="submit" class="button" name="submit" value="{$lang->delete_poll}" /></div>\n<input type="hidden" name="action" value="do_deletepoll" />\n<input type="hidden" name="tid" value="{$tid}" />\n<input type="hidden" name="delete" value="1" />\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (296, 'member_profile_signature', '<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead"><strong>{$lang->users_signature}</strong></td>\n</tr>\n<tr>\n<td class="trow1">{$memprofile[''signature'']}</td>\n</tr>\n</table>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (297, 'newreply_modoptions', '<tr>\n<td class="trow2" valign="top"><strong>{$lang->mod_options}</strong></td>\n<td class="trow2"><span class="smalltext">\n<label><input type="checkbox" class="checkbox" name="modoptions[closethread]" value="1"{$closecheck} />&nbsp;{$lang->close_thread}</label><br />\n<label><input type="checkbox" class="checkbox" name="modoptions[stickthread]" value="1"{$stickycheck} />&nbsp;{$lang->stick_thread}</label>\n</span></td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (298, 'smilieinsert_getmore', '<tr>\n<td class="trow2" align="center"><span class="smalltext"><strong>[<a href="javascript:clickableEditor.openGetMoreSmilies(''clickableEditor'');">{$lang->smilieinsert_getmore}</a>]</strong></span></td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (299, 'misc_smilies_popup', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->smilies_listing}</title>\n{$headerinclude}\n<script type="text/javascript">\n<!--\n	var editor = eval(''opener.'' + ''{$editor}'');\n	function insertSmilie(code)\n	{\n		if(editor)\n		{\n			editor.performInsert(code, "", true, false);\n		}\n	}\n// -->\n</script>\n\n</head>\n<body>\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="4"><strong>{$lang->smilies_listing}</strong></td>\n</tr>\n<tr>\n<td class="tcat" colspan="4"><span class="smalltext">{$lang->click_to_add}</span></td>\n</tr>\n{$smilies}\n<tr>\n<td class="thead" colspan="4" align="center"><span class="smalltext">[<a href="javascript:window.close();">{$lang->close_window}</a>]</span></td>\n</tr>\n</table>\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (300, 'misc_smilies_popup_smilie', '<td class="{$class}" align="center"><img src="{$smilie[''image'']}" alt="{$smilie[''find'']}" title="{$smilie[''find'']}" onclick="insertSmilie(''{$smilie[''insert'']}'');" /></a></td>\n<td class="{$class}">{$smilie[''find'']}</td>', -2, '123', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (301, 'showteam', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->forum_team}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n{$grouplist}\n{$footer}\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (302, 'index_birthdays', '<tr><td class="tcat"><span class="smalltext"><strong>{$lang->todays_birthdays}</strong></span></td></tr>\n<tr>\n<td class="trow1"><span class="smalltext">{$bdays}</span></td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (303, 'moderation_getip', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->get_post_ip}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->get_post_ip}</strong></td>\n</tr>\n{$loginbox}\n<tr>\n<td class="trow2"><strong>{$lang->ip_address}</strong></td>\n<td class="trow2">{$post[''ipaddress'']}</td>\n</tr>\n<tr>\n<td class="trow1"><strong>{$lang->hostname}<br /><span class="smalltext">{$lang->if_resolvable}</span></strong></td>\n<td class="trow2">{$hostname}</td>\n</tr>\n{$modoptions}\n</table>\n{$footer}\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (304, 'moderation_getip_modoptions', '<tr>\n<td class="trow2"><strong>{$lang->mod_options}</strong></td>\n<td class="trow2">\n	<a href="modcp.php?action=ipsearch&amp;ipaddress={$post[''ipaddress'']}&amp;search_users=1">{$lang->search_ip_users}</a><br />\n	<a href="modcp.php?action=ipsearch&amp;ipaddress={$post[''ipaddress'']}&amp;search_posts=1">{$lang->search_ip_posts}</a>\n</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (305, 'postbit_iplogged_hiden', '<p class="smalltext">{$lang->postbit_ipaddress} <a href="moderation.php?action=getip&amp;pid={$post[''pid'']}">{$lang->postbit_ipaddress_logged}</a></p>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (306, 'usercp_options_tppselect', '<tr>\n<td colspan="2"><span class="smalltext">{$lang->tpp}</span></td>\n</tr>\n<tr>\n<td colspan="2">\n<select name="tpp">\n<option value="">{$lang->use_default}</option>\n{$tppoptions}\n</select>\n</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (307, 'index_logoutlink', '<a href="member.php?action=logout&amp;logoutkey={$mybb->user[''logoutkey'']}">{$lang->index_logout}</a> | ', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (308, 'postbit_iplogged_show', '<p class="smalltext">{$lang->postbit_ipaddress} {$post[''ipaddress'']}</p>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (309, 'usercp_changeavatar', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->change_avatar}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form enctype="multipart/form-data" action="usercp.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="3"><strong>{$lang->change_avatar}</strong></td>\n</tr>\n<tr>\n<td align="center" class="trow1" width="1%"><input type="radio" class="radio" name="avatar" value="url"{$checked[''url'']} /></td>\n<td class="trow1" width="40%"><strong>{$lang->avatar_url}</strong><br /><span class="smalltext">{$lang->avatar_url_note}</span></td>\n<td class="trow1" width="55%"><input type="text" class="textbox" name="avatarurl" size="25" maxlength="100" value="{$avatarurl}" /></td>\n</tr>\n<tr>\n<td align="center" class="trow2" width="1%"><input type="radio" class="radio" name="avatar" value="upload"{$checked[''upload'']} /></td>\n<td class="trow2" width="40%"><strong>{$lang->avatar_upload}</strong><br /><span class="smalltext">{$lang->avatar_upload_note}</span></td>\n<td class="trow2" width="55%"><input type="file" name="avatarupload" size="25" value="" class="fileupload" />{$uploadedmsg}</td>\n</tr>\n<tr>\n<td align="center" class="trow1" width="1%"><input type="radio" class="radio" name="avatar" value="list"{$checked[''list'']} /></td>\n<td class="trow1" width="40%"><strong>{$lang->avatar_list}</strong><br /><span class="smalltext">{$lang->avatar_list_note}</span></td>\n<td class="trow1" width="55%">\n<table border="0" cellspacing="0" cellpadding="0" width="100%">\n<tr>\n<td valign="middle">\n<select name="avatarlist" size="5" onChange="document.images.avatarpic.src=''{$mybb->settings[''avatardir'']}/''+this[this.selectedIndex].value;">\n{$listoptions}\n</select>\n</td>\n<td valign="middle">\n<img src="{$avatarpic}" name="avatarpic" width="80" height="80" />\n</td>\n</tr>\n</table>\n</td>\n</tr>\n<tr>\n<td align="center" class="trow2" width="1%"><input type="radio" class="radio" name="avatar" value="none"{$checked[''none'']} /></td>\n<td colspan="2" class="trow2" width="95%"><strong>{$lang->no_avatar}</strong><br /><span class="smalltext">{$lang->no_avatar_note}</span></td>\n</tr>\n</table>\n<br />\n<div align="center">\n<input type="hidden" name="action" value="do_avatar" />\n<input type="submit" class="button" name="submit" value="{$lang->change_avatar}" />\n</div>\n</td>\n</tr>\n</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (310, 'usercp_notepad', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->personal_notepad}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="usercp.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->personal_notepad}</strong></td>\n</tr>\n<tr>\n<td align="center" class="trow1" width="100%">\n<textarea name="notepad" cols="80" rows="15">{$mybb->user[''notepad'']}</textarea>\n</td>\n</tr>\n</table>\n<br />\n<div align="center">\n<input type="hidden" name="action" value="do_notepad" />\n<input type="submit" class="button" name="submit" value="{$lang->update_notepad}" />\n</div>\n</td>\n</tr>\n</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (311, 'private_messagebit_sep', '<tr>\n<td class="tcat" align="center" colspan="6" height="1"><img src="{$theme[''imgdir'']}/pixel.gif" height="1" width="1" alt=""/></td>\n</tr>\n    ', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (312, 'polls_editpoll_option', '<tr>\n<td>{$lang->option} {$counter}:&nbsp;</td>\n<td><input type="text" class="textbox" name="options[{$counter}]" value="{$option}" /></td>\n<td>{$lang->votes}&nbsp;</td>\n<td><input type="text" class="textbox" name="votes[{$counter}]" value="{$optionvotes}" /></td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (313, 'member_resetpassword', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->reset_password}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<br />\n<form action="member.php" method="post">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->reset_password}</strong></td>\n</tr>\n<tr>\n<td class="trow1" width="30%"><strong>{$lang->username}</strong></td>\n<td class="trow1"><input type="text" class="textbox" name="username" value="{$user[''username'']}" /></td>\n</tr>\n<tr>\n<td class="trow1" width="30%"><strong>{$lang->activation_code}</strong></td>\n<td class="trow1"><input type="text" class="textbox" name="code" value="{$code}" /></td>\n</tr>\n</table>\n<br />\n<div align="center"><input type="hidden" name="action" value="resetpassword" /><input type="submit" class="button" name="regsubmit" value="{$lang->send_password}" /></div>\n</form>\n{$footer}\n</body>\n</html>', -2, '127', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (314, 'forumdisplay_thread_multipage', ' <span class="smalltext">({$lang->pages} {$threadpages}{$morelink})</span>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (315, 'forumdisplay_thread_multipage_page', '<a href="{$page_link}">{$i}</a> ', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (316, 'forumdisplay_thread_multipage_more', '... <a href="{$page_link}">{$lang->pages_last}</a>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (317, 'member_profile_customfields', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td colspan="2" class="thead"><strong>{$lang->users_additional_info}</strong></td>\n</tr>\n{$customfields}\n</table>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (318, 'member_profile_customfields_field', '<tr>\n<td class="{$bgcolor}" width="40%"><strong>{$customfield[''name'']}:</strong></td>\n<td class="{$bgcolor}" width="60%">{$customfieldval}</td>\n</tr>\n', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (319, 'forumdisplay_usersbrowsing_user', '{$comma}{$user[''profilelink'']}{$invisiblemark}', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (320, 'forumdisplay_usersbrowsing', '<span class="smalltext">{$lang->users_browsing_forum} {$onlinemembers}{$onlinesep}{$invisonline}{$onlinesep2}{$guestsonline}</span><br />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (321, 'member_lostpw', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->lost_pw}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="member.php" method="post">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->lost_pw_form}</strong></td>\n</tr>\n<tr>\n<td class="trow1" width="40%"><strong>{$lang->email_address}</strong></td>\n<td class="trow1" width="60%"><input type="text" class="textbox" name="email" /></td>\n</tr>\n</table>\n<br />\n<div align="center"><input type="submit" class="button" value="{$lang->request_user_pass}" /></div>\n<input type="hidden" name="action" value="do_lostpw" />\n</form>\n{$footer}\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (322, 'usercp_changename', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->change_username}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="usercp.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n{$errors}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->change_username}</strong></td>\n</tr>\n<tr>\n<td class="tcat" colspan="2"><strong>{$lang->current_password}</strong></td>\n</tr>\n<tr>\n<td class="trow1" colspan="2" align="center"><input type="password" class="textbox" name="password" size="25" /></td>\n</tr>\n<tr>\n<td class="tcat" colspan="2"><strong>{$lang->change_username}</strong></td>\n</tr>\n<tr>\n<td class="trow2" width="40%"><strong>{$lang->new_username}</strong></td>\n<td class="trow2" width="60%"><input type="text" class="textbox" name="username" size="25" maxlength="{$mybb->settings[''maxnamelength'']}" /></td>\n</tr>\n</table>\n<br />\n<div align="center">\n<input type="hidden" name="action" value="do_changename" />\n<input type="submit" class="button" name="submit" value="{$lang->update_username}" />\n</div>\n</td>\n</tr>\n</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (323, 'moderation_split_post', '<tr>\n<td class="tcat" colspan="2"><span class="smalltext"><strong>{$lang->posted_by} {$post[''username'']} - {$postdate} {$posttime}</strong></span></td>\n</tr>\n<tr>\n<td class="{$altbg}" valign="top" align="center" width="1%"><input type="checkbox" class="checkbox" name="splitpost[{$post[''pid'']}]" value="1" /></td>\n<td class="{$altbg}">{$message}</td>\n</tr>', -2, '127', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (324, 'newreply_threadreview_more', '<tr>\n<td class="thead" align="center"><span class="smalltext"><strong>{$lang->thread_review_more}</strong></span></td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (325, 'misc_whoposted', '<html>\n<head>\n<title>{$lang->who_posted}</title>\n{$headerinclude}\n</head>\n<body style="margin:0px;top:0px;left:0px" class="trow2">\n<table width="100%" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" border="0" align="center" class="tborder">\n<tr>\n<td colspan="2" class="thead"><strong>{$lang->total_posts} {$numposts}</strong></td>\n</tr>\n<tr>\n<td class="tcat"><span class="smalltext"><strong><a href="misc.php?action=whoposted&amp;tid={$tid}&amp;sort=username">{$lang->user}</a></strong></span></td>\n<td class="tcat"><span class="smalltext"><strong><a href="misc.php?action=whoposted&amp;tid={$tid}&amp;sort=numposts">{$lang->num_posts}</a></strong></span></td>\n</tr>\n{$whoposted}\n<tr>\n<td colspan="2" class="thead" align="center"><span class="smalltext">[<a href="javascript:self.close();">{$lang->close_window}</a>]</span></td>\n</tr>\n</table>\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (326, 'misc_whoposted_poster', '<tr>\n<td class="{$altbg}">{$profile_link}</a></td>\n<td class="{$altbg}">{$poster[''posts'']}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (327, 'moderation_deleteposts_post', '<tr>\n<td class="tcat" colspan="2"><span class="smalltext"><strong>{$lang->posted_by} {$post[''username'']} - {$postdate} {$posttime}</strong></span></td>\n</tr>\n<tr>\n<td class="{$altbg}" valign="top" align="center" style="width:5%"><input type="checkbox" class="checkbox" name="deletepost[{$post[''pid'']}]" value="1" /></td>\n<td class="{$altbg}">{$message}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (328, 'moderation_deleteposts', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->delete_posts}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="moderation.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->delete_posts}</strong></td>\n</tr>\n{$posts}\n</table>\n<br />\n<div align="center"><input type="submit" class="button" name="submit" value="{$lang->delete_selected_posts}" /></div>\n<input type="hidden" name="action" value="do_deleteposts" />\n<input type="hidden" name="tid" value="{$tid}" />\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (329, 'moderation_split', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->split_thread}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="moderation.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->split_thread}</strong></td>\n</tr>\n<tr>\n<td class="tcat" colspan="2"><span class="smalltext"><strong>{$lang->new_thread_info}</strong></span></td>\n</tr>\n{$loginbox}\n<tr>\n<td class="trow2"><strong>{$lang->new_subject}</strong></td>\n<td class="trow2"><input type="text" class="textbox" name="newsubject" value="[split] {$thread[''subject'']}" size="50" /></td>\n</tr>\n<tr>\n<td class="trow1"><strong>{$lang->new_forum}</strong></td>\n<td class="trow1">{$forumselect}</td>\n</tr>\n</table>\n<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->posts_to_split}</strong></td>\n</tr>\n{$posts}\n</table>\n<br />\n<div align="center"><input type="submit" class="button" name="submit" value="{$lang->split_thread}" /></div>\n<input type="hidden" name="action" value="do_split" />\n<input type="hidden" name="tid" value="{$tid}" />\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (330, 'newreply_threadreview_post', '<tr>\n<td class="tcat"><span class="smalltext"><strong>{$lang->posted_by} {$post[''username'']} - {$reviewpostdate} {$reviewposttime}</strong></span></td>\n</tr>\n<tr>\n<td class="{$altbg}">\n{$reviewmessage}\n</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (331, 'newreply_threadreview', '<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" align="center"><strong>{$lang->thread_review}</strong></td>\n</tr>\n{$reviewbits}\n{$reviewmore}\n</table>\n', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (332, 'sendthread', '<html>\n<head>\n<title>{$thread[''subject'']} - {$lang->send_thread}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n{$errors}\n<form action="sendthread.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td colspan="2" width="100%" class="thead"><strong>{$lang->send_thread}</strong></td>\n</tr>\n<tr>\n<td width="40%" class="trow1"><strong>{$lang->recipient}</strong><br /><span class="smalltext">{$lang->recipient_note}</span></td>\n<td width="60%" class="trow1"><input type="text" class="textbox" size="50" name="email" value="{$email}" /></td>\n</tr>\n{$guestfields}\n<tr>\n<td width="40%" class="trow2"><strong>{$lang->subject}</strong></td>\n<td width="60%" class="trow2"><input type="text" class="textbox" size="50" name="subject" value="{$subject}" /></td>\n</tr>\n<tr>\n<td valign="top" width="40%" class="trow1"><strong>{$lang->message}</strong></td>\n<td width="60%" class="trow1"><textarea cols="50" rows="10" name="message">{$message}</textarea></td>\n</tr>\n</table>\n<br />\n<input type="hidden" name="action" value="do_sendtofriend" />\n<input type="hidden" name="tid" value="{$tid}" />\n<div align="center"><input type="submit" class="button" value="{$lang->send_thread}" /></div>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (333, 'usercp_editsig', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->edit_sig}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="usercp.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n{$error}\n{$signature}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->edit_sig}</strong></td>\n</tr>\n<tr>\n<td class="trow1" valign="top" width="20%"><span class="smalltext">{$lang->edit_sig_note}</span>\n{$smilieinserter}</td>\n<td class="trow1" width="80%">\n<textarea rows="15" cols="70" id="signature" name="signature">{$sig}</textarea>\n{$codebuttons}\n</td>\n</tr>\n<tr>\n<td class="trow2">\n<span class="smalltext">{$lang->edit_sig_note2}</span>\n</td>\n<td class="trow2">\n<span class="smalltext">\n<label><input type="radio" class="radio" name="updateposts" value="enable" />&nbsp;{$lang->enable_sig_posts}</label><br />\n<label><input type="radio" class="radio" name="updateposts" value="disable" />&nbsp;{$lang->disable_sig_posts}</label><br />\n<label><input type="radio" class="radio" name="updateposts" value="0" checked="checked" />&nbsp;{$lang->leave_sig_settings}</label></span>\n</td>\n</tr>\n</table>\n<br />\n<div align="center">\n<input type="hidden" name="action" value="do_editsig" />\n<input type="submit" class="button" name="submit" value="{$lang->update_sig}" />\n<input type="submit" class="button" name="preview" value="{$lang->preview}" />\n</div>\n</td>\n</tr>\n</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (334, 'private_messagebit_denyreceipt', ' <span class="smalltext"><a href="private.php?action=read&amp;pmid={$message[''pmid'']}&amp;denyreceipt=1">{$lang->deny_receipt}</a></span>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (335, 'private_read_to', '<br />\n{$lang->to} {$to_recipients}\n{$bcc}', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (336, 'private_read_bcc', '<br />{$lang->bcc} {$bcc_recipients}', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (337, 'private_read_action', '<tr>\n	<td class="tcat" align="center"><strong>{$actioned_on}</strong></td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (338, 'private_read', '<html>\n<head>\n<title>{$lang->viewing_pm} {$pm[''subject'']}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder" style="clear: both; border-bottom-width: 0;">\n<tr>\n<td class="thead">\n<strong>{$pm[''subject'']}</strong>\n</td>\n</tr>\n{$action_time}\n{$message}\n</table>\n</td>\n</tr>\n</table>\n{$footer}\n</body>\n</html>', -2, '1405', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (339, 'forumdisplay_inlinemoderation_col', '<td class="tcat" align="center" width="1"><input type="checkbox" name="allbox" onclick="inlineModeration.checkAll(this)" /></td>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (340, 'printthread_post', '<strong>{$postrow[''subject'']}</strong> - {$postrow[''profilelink'']} -  <strong>{$postrow[''date'']}</strong> <strong>{$postrow[''time'']}</strong>\n<br />\n<br />\n{$postrow[''message'']}\n<br />\n<br />\n<hr size="1" />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (341, 'error_nopermission', '{$lang->error_nopermission_guest_1}\n<ol>\n<li>{$lang->error_nopermission_guest_2}</li>\n<li>{$lang->error_nopermission_guest_3}\n</li>\n<li>{$lang->error_nopermission_guest_4}</li>\n</ol>\n<form action="member.php" method="post">\n<input type="hidden" name="action" value="do_login" />\n<input type="hidden" name="url" value="{$url}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><span class="smalltext"><strong>{$lang->login}</strong></span></td>\n</tr>\n<tr>\n<td class="trow1"><strong>{$lang->username}</strong></td>\n<td class="trow1"><input type="text" class="textbox" name="username" tabindex="1" /></td>\n</tr>\n<tr>\n<td class="trow2"><strong>{$lang->password}</strong></td>\n<td class="trow2"><input type="password" class="textbox" name="password" tabindex="2" /></td>\n</tr>\n<tr>\n<td class="trow2" colspan="2"><span class="smalltext" style="float:right; padding-top:3px;"><a href="member.php?action=register">{$lang->need_reg}</a> | <a href="member.php?action=lostpw">{$lang->forgot_password}</a>&nbsp;</span>&nbsp;<input type="submit" class="button" value="{$lang->login}" tabindex="3" /></td>\n</tr>\n</table>\n</form>\n<br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (342, 'error_nopermission_loggedin', '{$lang->error_nopermission_user_1}\n<ol>\n	<li>{$lang->error_nopermission_user_2}</li>\n	<li>{$lang->error_nopermission_user_3}</li>\n	<li>{$lang->error_nopermission_user_4} (<a href="member.php?action=resendactivation">{$lang->error_nopermission_user_resendactivation}</a>)</li>\n</ol>\n<br />\n{$lang->error_nopermission_user_5}', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (343, 'private_folders', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->pm_folders}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="private.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead"><strong>{$lang->existing_folders}</strong></td>\n</tr>\n<tr>\n<td class="trow1"><span class="smalltext">{$lang->edit_folder_note}</span></td>\n</tr>\n{$folderlist}\n<tr>\n<td class="thead"><strong>{$lang->new_folders}</strong></td>\n</tr>\n<tr>\n<td class="trow1"><span class="smalltext">{$lang->add_folders_note}</span></td>\n</tr>\n{$newfolders}\n</table>\n<br />\n<div align="center">\n<input type="hidden" name="action" value="do_folders" />\n<input type="submit" class="button" name="submit" value="{$lang->update_folders}" />\n</div>\n</td>\n</tr>\n</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (344, 'forumjump_bit', '<option value="{$forum[''fid'']}" {$optionselected}>{$depth} {$forum[''name'']}</option>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (345, 'forumjump_special', '<select name="{$name}">\n<option value="index" {$jumpsel[''default'']}>{$lang->forumjump_select}</option>\n<option value="index">--------------------</option>\n{$forumjumpbits}\n</select>\n', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (346, 'moderation_move', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->move_copy_thread}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="moderation.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->move_copy_thread}</strong></td>\n</tr>\n{$loginbox}\n<tr>\n<td class="trow1"><strong>{$lang->new_forum}</strong></td>\n<td class="trow2">{$forumselect}</td>\n</tr>\n<tr>\n<td class="trow1" valign="top"><strong>{$lang->method}</strong></td>\n<td class="trow2">\n<label><input type="radio" class="radio" name="method" value="move" />{$lang->method_move}</label><br />\n<label><input type="radio" class="radio" name="method" value="redirect" checked="checked" />{$lang->method_move_redirect}</label> <input type="text" class="textbox" name="redirect_expire" size="3" /> {$lang->redirect_expire_note}<br />\n<label><input type="radio" class="radio" name="method" value="copy" />{$lang->method_copy}</label><br />\n</td>\n</tr>\n</table>\n<br />\n<div align="center"><input type="submit" class="button" name="submit" value="{$lang->move_copy_thread}" /></div>\n<input type="hidden" name="action" value="do_move" />\n<input type="hidden" name="tid" value="{$tid}" />\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (347, 'moderation_merge', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->merge_threads}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="moderation.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->merge_threads}</strong></td>\n</tr>\n{$loginbox}\n<tr>\n<td class="trow2"><strong>{$lang->new_subject}</strong></td>\n<td class="trow2"><input type="text" class="textbox" name="subject" value="{$thread[''subject'']}" size="40" /></td>\n</tr>\n<tr>\n<td class="trow1"><strong>{$lang->thread_to_merge_with}</strong><br /><span class="smalltext">{$lang->merge_with_note}</span></td>\n<td class="trow1" width="60%"><input type="text" class="textbox" name="threadurl" size="40" />\n</td>\n</tr>\n</table>\n<br />\n<div align="center"><input type="submit" class="button" name="submit" value="{$lang->merge_threads}" /></div>\n<input type="hidden" name="action" value="do_merge" />\n<input type="hidden" name="tid" value="{$tid}" />\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (348, 'showthread_similarthreads_bit', '<tr>\n	<td align="center" class="{$trow}" width="2%">{$icon}</td>\n	<td class="{$trow}"><a href="{$similar_thread[''threadlink'']}">{$similar_thread[''subject'']}</a></td>\n	<td align="center" class="{$trow}">{$similar_thread[''profilelink'']}</td>\n	<td align="center" class="{$trow}"><a href="javascript:MyBB.whoPosted({$similar_thread[''tid'']});">{$similar_thread[''replies'']}</a></td>\n	<td align="center" class="{$trow}">{$similar_thread[''views'']}</td>\n	<td class="{$trow}" style="white-space: nowrap">\n		<span class="smalltext">{$lastpostdate} {$lastposttime}<br />\n		<a href="{$similar_thread[''lastpostlink'']}">{$lang->lastpost}</a>: {$lastposterlink}</span>\n	</td>\n	</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (349, 'polls_newpoll_option', '<tr>\n<td>{$lang->option} {$i}:&nbsp;</td>\n<td><input type="text" class="textbox" name="options[{$i}]" value="{$option}" size="25" /></td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (350, 'showthread_poll_option_multiple', '<tr>\n<td class="trow1" width="1%"><input type="checkbox" class="checkbox" name="option[{$number}]" id="option[{$number}]" value="1" /></td>\n<td class="trow2" colspan="3">{$option}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (351, 'showthread_poll_option', '<tr>\n<td class="trow1" width="1%"><input type="radio" class="radio" name="option" id="option" value="{$number}" /></td>\n<td class="trow1" colspan="3">{$option}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (352, 'member_activate', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->account_activation}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<br />\n<form action="member.php" method="post">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->activate_account}</strong></td>\n</tr>\n<tr>\n<td class="trow1" width="30%"><strong>{$lang->username}</strong></td>\n<td class="trow1"><input type="text" class="textbox" name="username" value="{$user[''username'']}" /></td>\n</tr>\n<tr>\n<td class="trow1" width="30%"><strong>{$lang->activation_code}</strong></td>\n<td class="trow1"><input type="text" class="textbox" name="code" value="{$code}" /></td>\n</tr>\n</table>\n<br />\n<div align="center"><input type="hidden" name="action" value="activate" /><input type="submit" class="button" name="regsubmit" value="{$lang->activate_account}" /></div>\n</form>\n{$footer}\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (353, 'smilieinsert', '\n<div style="margin:auto; width: 170px; margin-top: 20px;">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder" width="150">\n<tr>\n<td class="thead"><span class="smalltext"><strong>{$lang->smilieinsert}</strong></span></td>\n</tr>\n<tr>\n<td class="trow1">\n<table width="100%" align="center" border="0" cellspacing="0" cellpadding="2" id="clickable_smilies">\n{$smilies}\n</table>\n</td>\n</tr>\n{$getmore}\n</table>\n</div>\n', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (354, 'misc_buddypopup_user_sendpm', '<a href="private.php?action=send&amp;uid={$buddy[''uid'']}" target="_blank" onclick="window.opener.location.href=this.href; return false;">{$lang->pm_buddy}</a>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (355, 'usercp_editlists', '<html>\n<head>\n	<title>{$mybb->settings[''bbname'']} - {$lang->edit_lists}</title>\n	{$headerinclude}\n	<script type="text/javascript" src="jscripts/usercp.js"></script>\n	<script type="text/javascript">\n		lang.remove_buddy = ''{$lang->confirm_remove_buddy}'';\n		lang.remove_ignored = ''{$lang->confirm_remove_ignored}'';\n		lang.adding_buddy = ''{$lang->adding_buddy}'';\n		lang.adding_ignored = ''{$lang->adding_ignored}'';\n	</script>\n</head>\n<body>\n	{$header}\n	<table width="100%" border="0" align="center">\n	<tr>\n		{$usercpnav}\n		<td valign="top">\n\n		<form action="usercp.php" method="post" id="buddy" onsubmit="return UserCP.addBuddy(''buddy'');">\n			<input type="hidden" name="action" value="do_editlists" />\n			<input type="hidden" name="manage" value="buddy" />\n			<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n			<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n				<tr>\n					<td class="thead" align="center"><strong>{$lang->edit_buddy_list}</strong></td>\n				</tr>\n				<tr>\n					<td class="trow1">\n						<fieldset>\n							<legend><strong>{$lang->add_buddies}</strong></legend>\n							<span class="smalltext">{$lang->add_buddies_desc}</span><br />\n							<div style="width: 120px; float: left; text-align: right;"><strong>{$lang->username_or_usernames}</strong></div>\n							<div style="margin-left: 130px;"><input type="text" name="add_username" id="buddy_add_username" style="width: 60%;" class="textbox" /> <input type="submit" value="{$lang->add_to_buddies}" id="buddy_submit" class="button" /></div>\n							<script type="text/javascript" src="jscripts/autocomplete.js?ver=1400"></script>\n							<script type="text/javascript">\n							<!--\n								if(use_xmlhttprequest == "1")\n								{\n									new autoComplete("buddy_add_username", "xmlhttp.php?action=get_users", {valueSpan: "username", delimChar: ","});\n								}\n							// -->\n							</script>\n						</fieldset>\n						<fieldset id="buddy_container">\n							<legend><strong>{$lang->current_buddies}</strong></legend>\n							<ul id="buddy_list" style="list-style: none;">\n								{$buddy_list}\n							</ul>\n						</fieldset>\n					</td>\n				</tr>\n			</table>\n		</form>\n		<br />\n		<form action="usercp.php" method="post" id="ignored" onsubmit="return UserCP.addBuddy(''ignored'');">\n			<input type="hidden" name="action" value="do_editlists" />\n			<input type="hidden" name="manage" value="ignored" />\n			<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n			<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n				<tr>\n					<td class="thead" align="center"><strong>{$lang->edit_ignore_list}</strong></td>\n				</tr>\n				<tr>\n					<td class="trow1">\n						<fieldset>\n							<legend><strong>{$lang->add_ignored_users}</strong></legend>\n							<span class="smalltext">{$lang->add_ignored_users_desc}</span><br />\n							<div style="width: 120px; float: left; text-align: right;"><strong>{$lang->username_or_usernames}</strong></div>\n							<div style="margin-left: 130px;"><input type="text" name="add_username" id="ignored_add_username" style="width: 60%;" class="textbox" /> <input type="submit" value="{$lang->ignore_users}" id="ignored_submit" class="button" /></div>\n							<script type="text/javascript">\n							<!--\n								if(use_xmlhttprequest == "1")\n								{\n									new autoComplete("ignored_add_username", "xmlhttp.php?action=get_users", {valueSpan: "username", delimChar: ","});\n								}\n							// -->\n							</script>\n						</fieldset>\n						<fieldset id="ignored_container">\n							<legend><strong>{$lang->current_ignored_users}</strong></legend>\n							<ul id="ignore_list" style="list-style: none;">\n								{$ignore_list}\n							</ul>\n						</fieldset>\n					</td>\n				</tr>\n			</table>\n		</form>\n		</td>\n	</tr>\n	</table>\n	{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (356, 'online_row', '<tr>\n<td class="trow1">{$online_name}{$user_ip}</td>\n<td align="center" class="trow2">{$online_time}</td>\n<td class="trow1" width="50%">{$location}</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (357, 'online_row_ip', '<br /><span class="smalltext">{$lang->ip} {$user[''ip'']} <a href="modcp.php?action=ipsearch&amp;ipaddress={$user[''ip'']}&amp;search_users=1">{$lang->lookup}</a></span>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (358, 'postbit_offline', '<img src="{$theme[''imgdir'']}/buddy_offline.gif" title="{$lang->postbit_status_offline}" alt="{$lang->postbit_status_offline}" />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (359, 'postbit_editedby', '<span class="smalltext">({$post[''editnote'']} {$post[''editedprofilelink'']}.)</span>\n\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (360, 'member_register_requiredfields', '<br />\n<fieldset class="trow2">\n<legend><strong>{$lang->additional_info}</strong></legend>\n<table cellspacing="0" cellpadding="{$theme[''tablespace'']}">\n{$requiredfields}\n</table>\n</fieldset>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (361, 'member_register_customfield', '<tr>\n<td><span class="smalltext">{$profilefield[''name'']}</span></td>\n<tr>\n<td>{$code}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (362, 'error', '<html>\n<head>\n<title>{$title}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead"><span class="smalltext"><strong>{$title}</strong></span></td>\n</tr>\n<tr>\n<td class="trow1">{$error}</td>\n</tr>\n</table>\n{$footer}\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (363, 'index_whosonline_memberbit', '{$comma}{$user[''profilelink'']}{$invisiblemark}', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (364, 'member_profile_away', '<tr>\n<td class="trow1" align="center">\n<strong>{$lang->away_note}</strong><br />\n<span class="smalltext"><em>{$lang->away_reason} {$awayreason}</em></span><br />\n{$lang->away_since} {$awaydate} &nbsp;&nbsp;&nbsp; {$lang->away_returns} {$returndate}\n</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (365, 'forumdisplay_moderatedby_moderator', '{$modcomma}{$moderator[''profilelink'']}', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (366, 'forumdisplay_moderatedby', '<span class="smalltext">{$lang->moderated_by} <strong>{$modlist}</strong></span><br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (367, 'forumbit_depth2_cat', '<tr>\n<td class="{$bgcolor}" align="center" valign="top" width="1"><img src="{$theme[''imgdir'']}/{$lightbulb[''folder'']}.gif" alt="{$lightbulb[''altonoff'']}" title="{$lightbulb[''altonoff'']}" class="ajax_mark_read" id="mark_read_{$forum[''fid'']}" /></td>\n<td class="{$bgcolor}" valign="top">\n<strong><a href="{$forum_url}">{$forum[''name'']}</a></strong>{$forum_viewers_text}<div class="smalltext">{$forum[''description'']}{$subforums}</div>\n</td>\n<td class="{$bgcolor}" valign="top" align="center" style="white-space: nowrap">{$threads}{$unapproved[''unapproved_threads'']}</td>\n<td class="{$bgcolor}" valign="top" align="center" style="white-space: nowrap">{$posts}{$unapproved[''unapproved_posts'']}</td>\n<td class="{$bgcolor}" valign="top" align="right" style="white-space: nowrap">{$lastpost}</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (368, 'forumbit_depth1_cat_subforum', '<tr>\n<td class="tcat" colspan="6"><strong>&raquo;&nbsp;&nbsp;<a href="{$forum_url}">{$forum[''name'']}</a></strong><br /><span class="smalltext">{$forum[''description'']}</span></td></tr>{$sub_forums}', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (369, 'misc_help', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->help_docs}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n{$sections}\n{$footer}\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (370, 'posticons', '<tr>\n<td class="trow1" style="vertical-align: top"><strong>{$lang->post_icon}</strong><br /><span class="smalltext"><input type="radio" class="radio" name="icon" value="-1"{$no_icons_checked} />{$lang->no_post_icon}</span></td>\n<td class="trow1" valign="top">{$iconlist}</td>\n</tr>\n', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (371, 'previewpost', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder" style="clear: both; border-bottom-width: 0;">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->post_preview}</strong></td>\n</tr>\n</table>\n{$postbit}\n<br />\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (372, 'misc_help_helpdoc', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->help_docs}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead"><strong>{$helpdoc[''name'']}</strong></td>\n</tr>\n<tr>\n<td width="100%" class="trow1">{$helpdoc[''document'']}</td>\n</tr>\n</table>\n{$footer}\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (373, 'usercp_options_pppselect', '<tr>\n<td colspan="2"><span class="smalltext">{$lang->ppp}</span></td>\n</tr>\n<tr>\n<td colspan="2">\n<select name="ppp">\n<option value="">{$lang->use_default}</option>\n{$pppoptions}\n</select>\n</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (374, 'usercp_forumsubscriptions', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->forum_subscriptions}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" width="1"> </td>\n<td class="thead" valign="bottom"><span class="smalltext"><strong>{$lang->forum}</strong></span></td>\n<td class="thead" valign="bottom" style="white-space: nowrap; text-align: center;"><span class="smalltext"><strong>{$lang->posts}</strong></span></td>\n<td class="thead" valign="bottom" style="white-space: nowrap; text-align: center;"><span class="smalltext"><strong>{$lang->threads}</strong></span></td>\n<td class="thead" valign="bottom" align="center"><span class="smalltext"><strong>{$lang->lastpost}</strong></span></td>\n</tr>\n{$forums}\n</table>\n</td>\n</tr>\n</table>\n{$footer}\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (375, 'member_register_stylebit', '<option value="{$style[''sid'']}">{$style[''name'']}</option>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (376, 'usercp_options_stylebit', '<option value="{$style[''sid'']}" {$selected}>{$style[''name'']}</option>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (377, 'forumdisplay_password_wrongpass', '<tr>\n<td class="trow1" align="center" colspan="2"><strong>{$lang->wrong_forum_password}</strong></td>\n</tr>\n', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (378, 'private_empty_folder', '<tr>\n<td class="trow1"><strong>{$foldername}</strong></td>\n<td class="trow1" align="center">{$foldercount}</td>\n<td class="trow1" align="center"><input type="checkbox" class="checkbox" name="empty[{$fid}]" value="1" /></td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (379, 'misc_imcenter_msn', '<html>\n<head>\n<title>{$lang->msn_messenger_center}</title>\n{$headerinclude}\n</head>\n<body style="margin:0;left:0;top:0" class="trow2">\n<table width="100%" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" border="0" align="center" class="tborder">\n<tr>\n<td class="thead" align="center"><strong>{$user[''username'']} - {$lang->msn_messenger_center}</strong></td>\n</tr>\n<tr>\n<td class="tcat" align="center"><span class="smalltext"><strong>{$navigationbar}</strong></span></td>\n</tr>\n<tr>\n<td class="trow1" align="center">{$lang->msn_address_is}<br />{$user[''msn'']}</td>\n</tr>\n</table>\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (380, 'misc_imcenter_yahoo', '<html>\n<head>\n<title>{$lang->yahoo_center}</title>\n{$headerinclude}\n</head>\n<body style="margin:0;left:0;top:0" class="trow2">\n<table width="100%" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" border="0" align="center" class="tborder">\n<tr>\n<td class="thead" align="center"><strong>{$user[''username'']} - {$lang->yahoo_center}</strong></td>\n</tr>\n<tr>\n<td class="tcat" align="center"><span class="smalltext"><strong>{$navigationbar}</strong></span></td>\n</tr>\n<tr>\n<td class="trow1" align="center" colspan="2"><strong>{$user[''yahoo'']}</strong></td>\n</tr>\n<tr>\n<td class="trow1" align="center" colspan="2"><strong><img src="http://opi.yahoo.com/online?u={$user[''yahoo'']}&amp;m=g&amp;t=2" /></strong></td>\n</tr>\n<tr>\n<td class="trow1" align="center" colspan="2"><span class="smalltext"><a href="http://edit.yahoo.com/config/send_webmesg?.target={$user[''yahoo'']}&amp;.src=pg">{$lang->send_y_message}</a></span></td>\n</tr><tr>\n<td class="trow1" align="center" colspan="2"><span class="smalltext"><a href="http://members.yahoo.com/interests?.oc=t&amp;.kw={$user[''yahoo'']}&amp;.sb=1">{$lang->view_y_profile}</a></td>\n</tr>\n</table>\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (381, 'usercp_editsig_current', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead"><strong>{$lang->current_sig}</strong></td>\n</tr>\n<tr>\n<td class="trow1">{$sigpreview}</td>\n</tr>\n</table>\n<br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (382, 'usercp_editsig_preview', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead"><strong>{$lang->sig_preview}</strong></td>\n</tr>\n<tr>\n<td class="trow1">{$sigpreview}</td>\n</tr>\n</table>\n<br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (383, 'member_resendactivation', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->resend_activation}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="member.php" method="post">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->resend_activation}</strong></td>\n</tr>\n<tr>\n<td class="trow1" width="40%"><strong>{$lang->email_address}</strong></td>\n<td class="trow1" width="60%"><input type="text" class="textbox" name="email" /></td>\n</tr>\n</table>\n<br />\n<div align="center"><input type="submit" class="button" value="{$lang->request_activation}" /></div>\n<input type="hidden" name="action" value="do_resendactivation" />\n</form>\n{$footer}\n</body>\n</html>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (384, 'nav', '\n<div class="navigation">\n{$nav}{$activesep}{$activebit}\n</div>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (385, 'nav_bit', '<a href="{$navbit[''url'']}">{$navbit[''name'']}</a>{$sep}', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (386, 'nav_bit_active', '<span class="active">{$navbit[''name'']}</span>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (387, 'moderation_inline_deletethreads', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->delete_threads}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="moderation.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->delete_threads}</strong></td>\n</tr>\n<tr>\n<td class="trow1" colspan="2" align="center">{$lang->confirm_delete_threads}\n{$loginbox}\n</table>\n<br />\n<div align="center"><input type="submit" class="button" name="submit" value="{$lang->delete_threads}" /></div>\n<input type="hidden" name="action" value="do_multideletethreads" />\n<input type="hidden" name="fid" value="{$fid}" />\n<input type="hidden" name="threads" value="{$inlineids}" />\n<input type="hidden" name="url" value="{$return_url}" />\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (388, 'postbit_inlinecheck', '| <input type="checkbox" class="checkbox" name="inlinemod_{$post[''pid'']}" id="inlinemod_{$post[''pid'']}" value="1" style="vertical-align: middle;" {$inlinecheck}  />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (389, 'moderation_inline_movethreads', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->move_threads}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="moderation.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->move_threads}</strong></td>\n</tr>\n{$loginbox}\n<tr>\n<td class="trow1"><strong>{$lang->new_forum}</strong></td>\n<td class="trow2">{$forumselect}</td>\n</tr>\n</table>\n<br />\n<div align="center"><input type="submit" class="button" name="submit" value="{$lang->move_threads}" /></div>\n<input type="hidden" name="action" value="do_multimovethreads" />\n<input type="hidden" name="fid" value="{$fid}" />\n<input type="hidden" name="threads" value="{$inlineids}" />\n<input type="hidden" name="url" value="{$return_url}" />\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (390, 'moderation_inline_mergeposts', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->merge_posts}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="moderation.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->merge_posts}</strong></td>\n</tr>\n<tr>\n{$loginbox}\n<tr>\n<td class="trow2"><strong>{$lang->post_separator}</strong></td>\n<td class="trow2"><label><input type="radio" class="radio" name="sep" value="hr" checked="checked" />&nbsp;{$lang->horizontal_rule}</label><br /><label><input type="radio" class="radio" name="sep" value="new_line" />&nbsp;{$lang->new_line}</label></td>\n</tr>\n</table>\n<br />\n<div align="center"><input type="submit" class="button" name="submit" value="{$lang->merge_posts}" /></div>\n<input type="hidden" name="action" value="do_multimergeposts" />\n<input type="hidden" name="tid" value="{$tid}" />\n<input type="hidden" name="posts" value="{$inlineids}" />\n<input type="hidden" name="url" value="{$return_url}" />\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (391, 'moderation_inline_splitposts', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->split_thread}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="moderation.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->split_thread}</strong></td>\n</tr>\n<tr>\n<td class="tcat" colspan="2"><span class="smalltext"><strong>{$lang->new_thread_info}</strong></span></td>\n</tr>\n{$loginbox}\n<tr>\n<td class="trow2"><strong>{$lang->new_subject}</strong></td>\n<td class="trow2"><input type="text" class="textbox" name="newsubject" value="[split] {$thread[''subject'']}" size="50" /></td>\n</tr>\n<tr>\n<td class="trow1"><strong>{$lang->new_forum}</strong></td>\n<td class="trow1">{$forumselect}</td>\n</tr>\n</table>\n<br />\n<div align="center"><input type="submit" class="button" name="submit" value="{$lang->split_thread}" /></div>\n<input type="hidden" name="action" value="do_multisplitposts" />\n<input type="hidden" name="tid" value="{$tid}" />\n<input type="hidden" name="posts" value="{$inlineids}" />\n<input type="hidden" name="url" value="{$return_url}" />\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (392, 'member_register_regimage', '<br />\n<fieldset class="trow2">\n<script type="text/javascript" src="jscripts/captcha.js?ver=1400"></script>\n<legend><strong>{$lang->image_verification}</strong></legend>\n<table cellspacing="0" cellpadding="{$theme[''tablespace'']}">\n<tr>\n<td><span class="smalltext">{$lang->verification_note}</span></td>\n<td rowspan="2" align="center"><img src="captcha.php?action=regimage&amp;imagehash={$imagehash}" alt="{$lang->image_verification}" title="{$lang->image_verification}" id="captcha_img" /><br /><span style="color: red;" class="smalltext">{$lang->verification_subnote}</span>\n<script type="text/javascript">\n<!--\n	if(use_xmlhttprequest == "1")\n	{\n		document.write(''<br \\/><br \\/><input type="button" class="button" tabindex="10000" name="refresh" value="{$lang->refresh}" onclick="return captcha.refresh();" \\/>'');\n	}\n// -->\n</script>\n</td>\n</tr>\n<tr>\n<td><input type="text" class="textbox" name="imagestring" value="" id="imagestring" style="width: 100%;" /><input type="hidden" name="imagehash" value="{$imagehash}" id="imagehash" /></td>\n</tr>\n<tr>\n	<td id="imagestring_status"  style="display: none;" colspan="2">&nbsp;</td>\n</tr>\n</table>\n</fieldset>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (393, 'error_inline', '<div class="error">\n	<p><em>{$title}</em></p>\n	<ul>\n		{$errorlist}\n	</ul>\n</div>\n<br />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (394, 'member_register', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->registration}</title>\n{$headerinclude}\n<script type="text/javascript" src="jscripts/validator.js"></script>\n</head>\n<body>\n{$header}\n<br />\n<form action="member.php" method="post" id="registration_form"><input type="text" style="visibility: hidden;" value="" name="regcheck1" /><input type="text" style="visibility: hidden;" value="true" name="regcheck2" />\n{$regerrors}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->registration}</strong></td>\n</tr>\n<tr>\n<td width="50%" class="trow1" valign="top">\n<fieldset class="trow2">\n<legend><strong>{$lang->account_details}</strong></legend>\n<table cellspacing="0" cellpadding="{$theme[''tablespace'']}" width="100%">\n<tr>\n<td colspan="2"><span class="smalltext"><label for="username">{$lang->username}</label></span></td>\n</tr>\n<tr>\n<td colspan="2"><input type="text" class="textbox" name="username" id="username" style="width: 100%" value="{$username}" /></td>\n</tr>\n{$passboxes}\n<tr>\n<td><span class="smalltext"><label for="email">{$lang->email}</label></span></td>\n<td><span class="smalltext"><label for="email2">{$lang->confirm_email}</label></span></td>\n</tr>\n<tr>\n<td><input type="text" class="textbox" name="email" id="email" style="width: 100%" maxlength="50" value="{$email}" /></td>\n<td><input type="text" class="textbox" name="email2" id="email2" style="width: 100%" maxlength="50" value="{$email2}" /></td>\n</tr>\n<tr>\n	<td colspan="2" style="display: none;" id="email_status">&nbsp;</td>\n</tr>\n</table>\n</fieldset>\n{$requiredfields}\n{$referrer}\n{$regimage}\n</td>\n<td width="50%" class="trow1" valign="top">\n<fieldset class="trow2">\n<legend><strong>{$lang->account_prefs}</strong></legend>\n<table cellspacing="0" cellpadding="{$theme[''tablespace'']}" width="100%">\n<tr>\n<td valign="top" width="1"><input type="checkbox" class="checkbox" name="allownotices" id="allownotices" value="1" {$allownoticescheck} /></td>\n<td valign="top"><span class="smalltext"><label for="allownotices">{$lang->allow_notices}</label></span></td>\n</tr>\n<tr>\n<td valign="top" width="1"><input type="checkbox" class="checkbox" name="hideemail" id="hideemail" value="1" {$hideemailcheck} /></td>\n<td valign="top"><span class="smalltext"><label for="hideemail">{$lang->hide_email}</label></span></td>\n</tr>\n<tr>\n<td valign="top" width="1"><input type="checkbox" class="checkbox" name="receivepms" id="receivepms" value="1" {$receivepmscheck} /></td>\n<td valign="top"><span class="smalltext"><label for="receivepms">{$lang->receive_pms}</label></span></td>\n</tr>\n<tr>\n<td valign="top" width="1"><input type="checkbox" class="checkbox" name="pmnotice" id="pmnotice" value="1"{$pmnoticecheck} /></td>\n<td valign="top"><span class="smalltext"><label for="pmnotice">{$lang->pm_notice}</label></span></td>\n</tr>\n<tr>\n<td valign="top" width="1"><input type="checkbox" class="checkbox" name="emailpmnotify" id="emailpmnotify" value="1" {$emailpmnotifycheck} /></td>\n<td valign="top"><span class="smalltext"><label for="emailpmnotify">{$lang->email_notify_newpm}</label></span></td>\n</tr>\n<tr>\n<td valign="top" width="1"><input type="checkbox" class="checkbox" name="invisible" id="invisible" value="1" {$invisiblecheck} /></td>\n<td valign="top"><span class="smalltext"><label for="invisible">{$lang->invisible_mode}</label></span></td>\n</tr>\n<tr>\n<td colspan="2"><span class="smalltext"><label for="subscriptionmethod">{$lang->subscription_method}</label></span></td>\n</tr>\n<tr>\n<td colspan="2">\n	<select name="subscriptionmethod" id="subscriptionmethod">\n		<option value="0" {$no_subscribe_selected}>{$lang->no_auto_subscribe}</option>\n		<option value="1" {$no_email_subscribe_selected}>{$lang->no_email_subscribe}</option>\n		<option value="2" {$instant_email_subscribe_selected}>{$lang->instant_email_subscribe}</option>\n	</select>\n</td>\n</tr>\n\n</table>\n</fieldset>\n<br />\n<fieldset class="trow2">\n<legend><strong><label for="timezone">{$lang->time_offset}</label></strong></legend>\n<table cellspacing="0" cellpadding="{$theme[''tablespace'']}" width="100%">\n<tr>\n<td><span class="smalltext">{$lang->time_offset_desc}</span></td>\n</tr>\n<tr>\n<td>{$tzselect}</td>\n</tr>\n<tr>\n<td><span class="smalltext">{$lang->dst_correction}</span></td>\n</tr>\n<tr>\n<td>\n	<select name="dstcorrection">\n		<option value="2" {$dst_auto_selected}>{$lang->dst_correction_auto}</option>\n		<option value="1" {$dst_enabled_selected}>{$lang->dst_correction_enabled}</option>\n		<option value="0" {$dst_disabled_selected}>{$lang->dst_correction_disabled}</option>\n	</select>\n</td>\n</tr>\n</table>\n</fieldset>\n<br />\n<fieldset class="trow2">\n<legend><strong><label for="language">{$lang->lang_select}</label></strong></legend>\n<table cellspacing="0" cellpadding="{$theme[''tablespace'']}" width="100%">\n<tr>\n<td colspan="2"><span class="smalltext">{$lang->lang_select_desc}</span></td>\n</tr>\n<tr>\n<td><select name="language" id="language"><option value="">{$lang->lang_select_default}</option><option value="">-----------</option>{$langoptions}</select></td>\n</tr>\n</table>\n</fieldset>\n</td>\n</tr>\n</table>\n<br />\n<div align="center">\n<input type="hidden" name="step" value="registration" />\n<input type="hidden" name="action" value="do_register" />\n<input type="submit" class="button" name="regsubmit" value="{$lang->submit_registration}" />\n</div>\n</form>\n<script type="text/javascript">\n<!--\n	regValidator = new FormValidator(''registration_form'');\n	regValidator.register(''username'', ''notEmpty'', {failure_message:''{$lang->js_validator_no_username}''});\n    regValidator.register(''email'', ''regexp'', {match_field:''email2'', regexp:''^([a-zA-Z0-9_\\\\.\\\\+\\\\-])+\\\\@(([a-zA-Z0-9\\\\-])+\\\\.)+([a-zA-Z0-9]{2,4})+$'', failure_message:''{$lang->js_validator_invalid_email}''});\n	regValidator.register(''email2'', ''matches'', {match_field:''email'', status_field:''email_status'', failure_message:''{$lang->js_validator_email_match}''});\n{$validator_extra}\n	regValidator.register(''username'', ''ajax'', {url:''xmlhttp.php?action=username_availability'', loading_message:''{$lang->js_validator_checking_username}''}); // needs to be last\n// -->\n</script>\n{$footer}\n</body>\n</html>', -2, '1405', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (395, 'global_bannedwarning', '<div class="red_alert">\n<strong>{$lang->banned_warning}</strong>\n{$lang->banned_warning2}: {$reason}<br />\n{$lang->banned_warning3}: {$banlift}<br />\n</div>\n<br />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (396, 'htmldoctype', '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (397, 'postbit_multiquote', '<a href="javascript:Thread.multiQuote({$post[''pid'']});" style="display: none;" id="multiquote_link_{$post[''pid'']}"><img src="{$theme[''imglangdir'']}/postbit_multiquote.gif" alt="{$lang->postbit_multiquote}" title="{$lang->postbit_multiquote}" id="multiquote_{$post[''pid'']}" /></a>\n<script type="text/javascript">\n//<!--\n	$(''multiquote_link_{$post[''pid'']}'').style.display = '''';\n// -->\n</script>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (398, 'private_send_autocomplete', '<script type="text/javascript" src="jscripts/autocomplete.js?ver=1400"></script>\n<script type="text/javascript">\n<!--\n	if(use_xmlhttprequest == "1")\n	{\n		new autoComplete("to", "xmlhttp.php?action=get_users", {valueSpan: "username", delimChar: ","});\n		if($(''bcc''))\n		{\n			new autoComplete("bcc", "xmlhttp.php?action=get_users", {valueSpan: "username", delimChar: ","});\n		}\n	}\n// -->\n</script>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (399, 'forumdisplay_threadlist_inlineedit_js', '<script type="text/javascript" src="jscripts/inline_edit.js?ver=1400"></script>\n<script type="text/javascript">\n<!--\n	if(use_xmlhttprequest == "1")\n	{\n		new inlineEditor("xmlhttp.php?action=edit_subject&my_post_key="+my_post_key, {className: "subject_editable", spinnerImage: "{$theme[''imgdir'']}/spinner.gif", lang_click_edit: "{$lang->click_hold_edit}"});\n	}\n// -->\n</script>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (400, 'xmlhttp_inline_post_editor', '<br />\n		<div style="clear: both;">\n			<div>\n				<textarea style="width: 99%; padding: 4px; margin: 0;" rows="12" cols="80" id="quickedit_{$post[''pid'']}" tabindex="999">{$post[''message'']}</textarea>\n			</div>\n			<div class="editor_control_bar" style="width: 99%; padding: 4px; margin-top: 3px; text-align: right;">\n				<input type="button" class="button" onclick="Thread.quickEditSave({$post[''pid'']});" value="{$lang->save_changes}" tabindex="1000" />\n				<input type="button" class="button" onclick="Thread.quickEditCancel({$post[''pid'']});" value="{$lang->cancel_edit}" tabindex="1001" />\n			</div>\n			<br style="clear: both;" />\n		</div>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (401, 'reputation_vote', '<tr>\n	<td class="trow1 {$status_class}">\n		{$reputation_vote[''username'']}{$reputation_vote[''user_reputation'']} - {$last_updated} {$delete_link}<br /><br /></span>\n		<strong class="{$vote_type_class}">{$vote_type} {$vote_reputation}:</strong> {$reputation_vote[''comments'']}\n	</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (402, 'reputation_addlink', '<div class="float_right" style="padding-bottom: 4px;"><a href="javascript:MyBB.reputation({$user[''uid'']});"><img src="{$theme[''imglangdir'']}/rateuser.gif" alt="{$lang->rate_user}" title="{$lang->rate_user}" /></a></div>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (403, 'member_profile_reputation', '<tr>\n	<td class="trow1"><strong>{$lang->reputation}</strong></td>\n	<td class="trow1">{$reputation} [<a href="reputation.php?uid={$memprofile[''uid'']}">{$lang->reputation_details}</a>] {$vote_link}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (404, 'reputation_no_votes', '<tr>\n	<td class="trow1" style="text-align: center;">{$lang->no_reputation_votes}</td>\n</tr>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (405, 'reputation_add_error', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->reputation}</title>\n{$headerinclude}\n</head>\n<body>\n<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n	<tr>\n		<td class="trow1" style="padding: 20px">\n			<strong>{$lang->error}</strong><br /><br />\n			   <blockquote>{$message}</blockquote>\n				<br /><br />\n				<div style="text-align: center;">\n					<script type="text/javascript">\n					<!--\n						var showBack = {$show_back};\n						if(showBack == 1)\n						{\n							document.write(''[<a href="javascript:history.go(-1);">{$lang->go_back}</a>]'');\n						}\n						document.write(''[<a href="javascript:window.close();">{$lang->close_window}</a>]'');\n					// -->\n					</script>\n				</div>\n		</td>\n	</tr>\n</table>\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (406, 'reputation_added', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->reputation}</title>\n{$headerinclude}\n</head>\n<body onunload="window.opener.location.reload();">\n<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n	<tr>\n		<td class="trow1" style="padding: 20px">\n			<strong>{$lang->vote_added}</strong><br /><br />\n			   <blockquote>{$lang->vote_added_message}</blockquote>\n				<br /><br />\n				<div style="text-align: center;">\n					<script type="text/javascript">\n					<!--\n						document.write(''[<a href="javascript:window.close();">{$lang->close_window}</a>]'');\n					// -->\n					</script>\n				</div>\n		</td>\n	</tr>\n</table>\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (407, 'reputation_deleted', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->reputation}</title>\n{$headerinclude}\n</head>\n<body onunload="window.opener.location.reload();">\n<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n	<tr>\n		<td class="trow1" style="padding: 20px">\n			<strong>{$lang->vote_deleted}</strong><br /><br />\n			   <blockquote>{$lang->vote_deleted_message}</blockquote>\n				<br /><br />\n				<div style="text-align: center;">\n					<script type="text/javascript">\n					<!--\n						document.write(''[<a href="javascript:window.close();">{$lang->close_window}</a>]'');\n					// -->\n					</script>\n				</div>\n		</td>\n	</tr>\n</table>\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (408, 'forumdisplay_thread_attachment_count', '<div style="float: right;"><img src="{$theme[''imgdir'']}/paperclip.gif" alt="" title="{$attachment_count}" /></div>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (409, 'forumdisplay_rssdiscovery', '<link rel="alternate" type="application/rss+xml" title="{$lang->rss_discovery_forum} (RSS 2.0)" href="{$mybb->settings[''bburl'']}/syndication.php?fid={$fid}" />\n<link rel="alternate" type="application/atom+xml" title="{$lang->rss_discovery_forum} (Atom 1.0)" href="{$mybb->settings[''bburl'']}/syndication.php?type=atom1.0&amp;fid={$fid}" />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (410, 'post_captcha', '<tr id="captcha_trow">\n<td class="trow1" valign="top"><strong>{$lang->image_verification}</strong></td>\n<td class="trow1">\n<script type="text/javascript" src="jscripts/captcha.js?ver=1400"></script>\n<table style="width: 300px; padding: 4px;">\n	<tr>\n		<td rowspan="2" style="vertical-align: middle;"><img src="captcha.php?imagehash={$imagehash}" alt="{$lang->image_verification}" title="{$lang->image_verification}" id="captcha_img" /><br /><span style="color: red;" class="smalltext">{$lang->verification_subnote}</span>\n		<script type="text/javascript">\n		<!--\n			if(use_xmlhttprequest == "1")\n			{\n				document.write(''<br \\/><br \\/><input type="button" class="button" name="refresh" value="{$lang->refresh}" onclick="return captcha.refresh();" \\/>'');\n			}\n		// -->\n		</script>\n		</td>\n		<td><span class="smalltext">{$lang->verification_note}</span></td>\n	</tr>\n	<tr>\n		<td><input type="text" class="textbox" name="imagestring" value="" id="imagestring" /><input type="hidden" name="imagehash" value="{$imagehash}" id="imagehash" /></td>\n	</tr>\n</table>\n</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (411, 'post_captcha_hidden', '<input type="hidden" name="imagehash" value="{$imagehash}" />\n	<input type="hidden" name="imagestring" value="{$imagestring}" />', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (412, 'newreply_multiquote_external', '<div id="multiquote_unloaded"><span class="smalltext">{$multiquote_text} <a href="./newreply.php?tid={$tid}" onclick="return Post.loadMultiQuoted();">{$multiquote_quote}</a>, <a href="javascript:Post.clearMultiQuoted();">{$multiquote_deselect}</a></span></div>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (413, 'newthread_multiquote_external', '<div id="multiquote_unloaded"><span class="smalltext">{$multiquote_text} <a href="./newthread.php?fid={$fid}&amp;load_all_quotes=1" onclick="return Post.loadMultiQuotedAll();">{$multiquote_quote}</a>, <a href="javascript:Post.clearMultiQuoted();">{$multiquote_deselect}</a></span></div>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (414, 'postbit_author_user', '\n	{$lang->postbit_posts} {$post[''postnum'']}<br />\n	{$lang->postbit_joined} {$post[''userregdate'']}\n	{$post[''replink'']}{$post[''warninglevel'']}', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (415, 'postbit_author_guest', '&nbsp;', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (416, 'php_warnings', '<table border="0" cellspacing="1" cellpadding="4" align="center" class="tborder">\n<tr>\n<td class="tcat">\n<strong>{$lang->warnings}</strong>\n</td>\n</tr>\n<tr>\n<td class="trow1"><span class="smalltext">{$this->warnings}</span><br /></td>\n</tr>\n</table><br /><br />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (417, 'postbit_delete_pm', '<a href="private.php?action=delete&amp;pmid={$id}&amp;my_post_key={$mybb->post_code}"><img src="{$theme[''imglangdir'']}/pm_delete.gif" alt="{$lang->delete}" title="{$lang->delete_title}" /></a>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (418, 'postbit_forward_pm', '<a href="private.php?action=send&amp;pmid={$id}&amp;do=forward"><img src="{$theme[''imglangdir'']}/pm_forward.gif" alt="{$lang->forward}" title="{$lang->forward_title}" /></a>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (419, 'postbit_reply_pm', '<a href="private.php?action=send&amp;pmid={$id}&amp;do=reply"><img src="{$theme[''imglangdir'']}/pm_reply.gif" alt="{$lang->reply}" title="{$lang->reply_title}" /></a>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (420, 'postbit_replyall_pm', '<a href="private.php?action=send&amp;pmid={$id}&amp;do=replyall"><img src="{$theme[''imglangdir'']}/postbit_replyall.gif" alt="{$lang->reply_to_all}" title="{$lang->reply_title}" /></a>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (421, 'showthread_search', '	<div class="float_right">\n		<form action="search.php" method="post">\n			<input type="hidden" name="action" value="thread" />\n			<input type="hidden" name="tid" value="{$thread[''tid'']}" />\n			<input type="text" name="keywords" value="{$lang->enter_keywords}" onfocus="if(this.value == ''{$lang->enter_keywords}'') { this.value = ''''; }" onblur="if(this.value=='''') { this.value=''{$lang->enter_keywords}''; }" class="textbox" size="25" />\n			<input type="submit" class="button" value="{$lang->search_thread}" />\n		</form>\n	</div>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (422, 'postbit_ignored', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder" style="{$post_extra_style}" id="ignored_post_{$post[''pid'']}">\n<tr>\n	<td class="{$altbg}" width="15%" valign="top" style="white-space: nowrap; text-align: center;">\n		<strong><span class="largetext">{$post[''profilelink'']}</span></strong>\n	</td>\n	<td class="{$altbg}" width="85%" style="vertical-align: middle;">\n		<div style="float: right; width: auto; vertical-align: top; display: none;" id="show_ignored_link_{$post[''pid'']}"><span class="smalltext"><a href="#" onclick="Thread.showIgnoredPost({$post[''pid'']}); return false;">{$lang->postbit_show_ignored_post}</a></span></div>\n<script type="text/javascript">\n<!--\n	$(''show_ignored_link_{$post[''pid'']}'').show();\n// -->\n</script>\n		<span class="smalltext">{$lang->postbit_currently_ignoring_user}</span>\n	</td>\n</tr>\n</table>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (423, 'footer_languageselect', '<form method="{$lang_redirect_url[''form_method'']}" action="{$lang_redirect_url[''location'']}" id="lang_select">\n		{$lang_redirect_url[''form_html'']}\n		<select name="language" onchange="MyBB.changeLanguage();">\n			<optgroup label="{$lang->select_language}">\n				{$lang_options}\n			</optgroup>\n		</select>\n		{$gobutton}\n	</form>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (424, 'usercp_addsubscription_thread', '<html>\n<head>\n<title>{$lang->subscribe_to_thread}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="usercp2.php" method="post" name="input">\n<input type="hidden" name="action" value="do_addsubscription" />\n<input type="hidden" name="tid" value="{$thread[''tid'']}" />\n<table width="100%" border="0" align="center">\n<tr>\n{$usercpnav}\n<td valign="top">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead" colspan="2"><strong>{$lang->subscribe_to_thread}</strong></td>\n</tr>\n<tr>\n<td class="trow1" valign="top" width="200"><strong>{$lang->notification_method}</strong>\n<td class="trow1" valign="top">\n	<table width="100%" border="0" align="center">\n		<tr>\n			<td width="1"><input type="radio" name="notification" id="notification_none" value="0" {$notification_none_checked} /></td>\n			<td><strong><label for="notification_none">{$lang->no_notification}</label></strong><br /><span class="smalltext">{$lang->no_notification_desc}</span></td>\n		</tr>\n		<tr>\n			<td width="1"><input type="radio" name="notification" id="notification_instant" value="1" {$notification_instant_checked} /></td>\n			<td><strong><label for="notification_instant">{$lang->instant_notification}</label></strong><br /><span class="smalltext">{$lang->instant_notification_desc}</span></td>\n		</tr>\n	</table>\n</td>\n</tr>\n</table>\n<br />\n<div style="text-align: center;">\n	<input type="submit" class="button" name="submit" value="{$lang->do_subscribe}" tabindex="3" accesskey="s" />\n</div>\n</td>\n</tr>\n</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (425, 'post_subscription_method', '<tr>\n<td class="{$bgcolor}" valign="top">{$lang->thread_subscription_method}</td>\n<td class="{$bgcolor} smalltext">\n	<label><input type="radio" name="postoptions[subscriptionmethod]" {$postoptions_subscriptionmethod_dont} value="" style="vertical-align: middle;" /> {$lang->no_subscribe}</label><br />\n	<label><input type="radio" name="postoptions[subscriptionmethod]" {$postoptions_subscriptionmethod_none} value="none" style="vertical-align: middle;" /> {$lang->no_email_subscribe}</label><br />\n	<label><input type="radio" name="postoptions[subscriptionmethod]" {$postoptions_subscriptionmethod_instant} value="instant" style="vertical-align: middle;" /> {$lang->instant_email_subscribe}</label><br />\n</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (426, 'index_boardstats', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<thead>\n<tr>\n<td class="thead">\n<div class="expcolimage"><img src="{$theme[''imgdir'']}/collapse{$collapsedimg[''boardstats'']}.gif" id="boardstats_img" class="expander" alt="[-]" title="[-]" /></div>\n<div><strong>{$lang->boardstats}</strong></div>\n</td>\n</tr>\n</thead>\n<tbody style="{$collapsed[''boardstats_e'']}" id="boardstats_e">\n{$whosonline}\n{$birthdays}\n{$forumstats}\n<tr>\n	<td class="tfoot" style="text-align: right">\n		<span class="smalltext">\n			{$logoutlink}\n			<a href="misc.php?action=markread">{$lang->markread}</a> |\n			<a href="showteam.php">{$lang->forumteam}</a> |\n			<a href="stats.php">{$lang->forumstats}</a>\n		</span>\n	</td>\n</tr>\n</tbody>\n</table>\n<br />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (427, 'calendar', '<html>\n<head>\n	<title>{$mybb->settings[''bbname'']} - {$lang->calendar}</title>\n	{$headerinclude}\n</head>\n<body>\n	{$header}\n	<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n		<thead>\n			<tr>\n				<td class="thead" colspan="8">\n					<div class="float_right">\n						<a href="{$prev_link}">&laquo; {$monthnames[$prev_month[''month'']]} {$prev_month[''year'']}</a> | <a href="{$next_link}">{$monthnames[$next_month[''month'']]} {$next_month[''year'']} &raquo;</a>\n					</div>\n					<div><strong>{$monthnames[$month]} {$year}</strong></div>\n				</td>\n			</tr>\n			<tr>\n				<td class="tcat">&nbsp;</td>\n			{$weekday_headers}\n			</tr>\n		</thead>\n		<tbody>\n		{$calendar_rows}\n		</tbody>\n	</table>\n<br />\n<form action="calendar.php" method="post">\n	<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n		<tr>\n			<td class="trow1">\n				<table width="100%" cellspacing="0" cellpadding="0" border="0">\n					<tr>\n						<td class="trow1" valign="top">{$addevent}</td>\n						<td class="trow1" align="right">\n						<span class="smalltext"><strong>{$lang->jump_month}</strong></span>\n						<select name="month">\n							<option value="{$month}">{$monthnames[$month]}</option>\n							<option value="{$month}">----------</option>\n							<option value="1">{$lang->alt_month_1}</option>\n							<option value="2">{$lang->alt_month_2}</option>\n							<option value="3">{$lang->alt_month_3}</option>\n							<option value="4">{$lang->alt_month_4}</option>\n							<option value="5">{$lang->alt_month_5}</option>\n							<option value="6">{$lang->alt_month_6}</option>\n							<option value="7">{$lang->alt_month_7}</option>\n							<option value="8">{$lang->alt_month_8}</option>\n							<option value="9">{$lang->alt_month_9}</option>\n							<option value="10">{$lang->alt_month_10}</option>\n							<option value="11">{$lang->alt_month_11}</option>\n							<option value="12">{$lang->alt_month_12}</option>\n						</select>\n						<select name="year">\n							<option value="{$year}">{$year}</option>\n							<option value="{$year}">----------</option>\n							{$yearsel}\n						</select>\n						{$gobutton}\n						<br /><br />\n						<span class="smalltext"><strong>{$lang->jump_to_calendar}</strong></span>\n						{$calendar_jump}\n						{$gobutton}\n						</td>\n					</tr>\n				</table>\n			</td>\n		</tr>\n		</table>\n	</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (428, 'calendar_weekdayheader', '				<td class="tcat" align="center" width="14%"><strong>{$weekday_name}</strong></td>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (429, 'calendar_weekrow', '			<tr>\n				<td class="tcat" align="center" width="1"><a href="{$week_link}">&raquo;</a></td>\n				{$day_bits}\n			</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (430, 'calendar_weekrow_day_today', '				<td class="calendar_daybit_today">\n					<div class="float_right smalltext"><a href="{$day_link}">{$day}</a></div>\n					<div>\n					{$day_events}\n					{$day_birthdays}\n					</div>\n				</td>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (431, 'calendar_weekrow_day', '				<td class="{$day_class}" height="100" valign="top">\n					<div class="float_right smalltext"><a href="{$day_link}">{$day}</a></div>\n					<div style="clear: both;">\n					{$day_birthdays}\n					{$day_events}\n					</div>\n				</td>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (432, 'calendar_weekrow_day_external', '				<td class="calendar_daybit_external">\n					<div class="float_right smalltext"><a href="{$day_link}">{$day}</a></div>\n					<div>\n					{$day_events}\n					{$day_birthdays}\n					</div>\n				</td>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (433, 'calendar_addevent', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->calendar} - {$lang->add_event}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n{$event_errors}\n<form action="calendar.php" method="post" name="input">\n	<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n	<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder" style="clear: both;">\n		<tr>\n			<td colspan="2" width="100%" class="thead"><strong>{$lang->add_event}</strong></td>\n		</tr>\n		<tr>\n			<td width="20%" class="trow1"><strong>{$lang->event_name}</strong></td>\n			<td class="trow1"><input type="text" class="textbox" size="50" name="name" maxlength="120" value="{$name}"/></td>\n		</tr>\n		<tr>\n			<td width="20%" class="trow1"><strong>{$lang->select_calendar}</strong></td>\n			<td class="trow1">\n				<select name="calendar">\n					{$calendar_select}\n				</select>\n			</td>\n		</tr>\n		<tr>\n			<td class="trow2" style="vertical-align: top;"><strong>{$lang->event_date}</strong></td>\n			<td class="trow1">\n				<script type="text/javascript">\n				<!--\n					function toggleType()\n					{\n						if($(''type_single'').checked == true)\n						{\n							Element.hide(''ranged_selects'');\n							Element.show(''single_selects'');\n						}\n						else\n						{\n							Element.hide(''single_selects'');\n							Element.show(''ranged_selects'');\n							toggleRepeats();\n						}\n					}\n\n					function toggleRepeats()\n					{\n						var repeats = $(''repeats'').options[$(''repeats'').selectedIndex].value;\n						$$(''.repeats_type'').each(function(e)\n						{\n							Element.hide(e);\n						});\n						if($(''repeats_type_''+repeats))\n						{\n							Element.show(''repeats_type_''+repeats);\n						}\n					}\n				// -->\n				</script>\n				<dl style="margin-top: 0; margin-bottom: 0; width: 100%;">\n					<dt><input type="radio" name="type" value="single" {$type_single} id="type_single" onclick="toggleType();" /> <label for="type_single"><strong>{$lang->type_single}</strong></label></dt>\n					<dd style="margin-top: 4px;" id="single_selects">\n						<select name="single_day">\n							{$single_days}\n						</select>\n						&nbsp;\n						<select name="single_month">\n							<option value="1"{$single_month[''1'']}>{$lang->month_1}</option>\n							<option value="2"{$single_month[''2'']}>{$lang->month_2}</option>\n							<option value="3"{$single_month[''3'']}>{$lang->month_3}</option>\n							<option value="4"{$single_month[''4'']}>{$lang->month_4}</option>\n							<option value="5"{$single_month[''5'']}>{$lang->month_5}</option>\n							<option value="6"{$single_month[''6'']}>{$lang->month_6}</option>\n							<option value="7"{$single_month[''7'']}>{$lang->month_7}</option>\n							<option value="8"{$single_month[''8'']}>{$lang->month_8}</option>\n							<option value="9"{$single_month[''9'']}>{$lang->month_9}</option>\n							<option value="10"{$single_month[''10'']}>{$lang->month_10}</option>\n							<option value="11"{$single_month[''11'']}>{$lang->month_11}</option>\n							<option value="12"{$single_month[''12'']}>{$lang->month_12}</option>\n						</select>\n						&nbsp;\n						<select name="single_year">\n							{$single_years}\n						</select>\n					</dd>\n					<dt><input type="radio" name="type" value="ranged" {$type_ranged} id="type_ranged" onclick="toggleType();" /> <label for="type_ranged"><strong>{$lang->type_ranged}</strong></label></dt>\n					<dd style="margin-top: 4px; width: 100%;" id="ranged_selects">\n						<table width="100%">\n							<tr>\n								<td class="smalltext" style="padding: 4px; text-align: right;">{$lang->start_time}</td>\n								<td style="padding: 4px;">\n									<select name="start_day">\n										{$start_days}\n									</select>\n									<select name="start_month">\n										<option value="1"{$start_month[''1'']}>{$lang->month_1}</option>\n										<option value="2"{$start_month[''2'']}>{$lang->month_2}</option>\n										<option value="3"{$start_month[''3'']}>{$lang->month_3}</option>\n										<option value="4"{$start_month[''4'']}>{$lang->month_4}</option>\n										<option value="5"{$start_month[''5'']}>{$lang->month_5}</option>\n										<option value="6"{$start_month[''6'']}>{$lang->month_6}</option>\n										<option value="7"{$start_month[''7'']}>{$lang->month_7}</option>\n										<option value="8"{$start_month[''8'']}>{$lang->month_8}</option>\n										<option value="9"{$start_month[''9'']}>{$lang->month_9}</option>\n										<option value="10"{$start_month[''10'']}>{$lang->month_10}</option>\n										<option value="11"{$start_month[''11'']}>{$lang->month_11}</option>\n										<option value="12"{$start_month[''12'']}>{$lang->month_12}</option>\n									</select>\n									<select name="start_year">\n										{$start_years}\n									</select>\n									<span class="smalltext">&nbsp;&nbsp;&nbsp;{$lang->enter_time}</span>\n									<input type="text" class="textbox" name="start_time" value="{$start_time}" size="7" />\n								</td>\n							</tr>\n							<tr>\n								<td class="smalltext" style="padding: 4px; text-align: right;">{$lang->end_time}</td>\n								<td style="padding: 4px;">\n									<select name="end_day">\n										{$end_days}\n									</select>\n									<select name="end_month">\n										<option value="1"{$end_month[''1'']}>{$lang->month_1}</option>\n										<option value="2"{$end_month[''2'']}>{$lang->month_2}</option>\n										<option value="3"{$end_month[''3'']}>{$lang->month_3}</option>\n										<option value="4"{$end_month[''4'']}>{$lang->month_4}</option>\n										<option value="5"{$end_month[''5'']}>{$lang->month_5}</option>\n										<option value="6"{$end_month[''6'']}>{$lang->month_6}</option>\n										<option value="7"{$end_month[''7'']}>{$lang->month_7}</option>\n										<option value="8"{$end_month[''8'']}>{$lang->month_8}</option>\n										<option value="9"{$end_month[''9'']}>{$lang->month_9}</option>\n										<option value="10"{$end_month[''10'']}>{$lang->month_10}</option>\n										<option value="11"{$end_month[''11'']}>{$lang->month_11}</option>\n										<option value="12"{$end_month[''12'']}>{$lang->month_12}</option>\n									</select>\n									<select name="end_year">\n										{$end_years}\n									</select>\n									<span class="smalltext">&nbsp;&nbsp;&nbsp;{$lang->enter_time}</span>\n									<input type="text" class="textbox" name="end_time" value="{$end_time}" size="7" />\n								</td>\n							</tr>\n							<tr>\n								<td class="smalltext" style="padding: 4px; text-align: right; vertical-align: top;">{$lang->time_zone}</td>\n								<td style="padding: 4px;">\n									{$timezones}<br />\n									<label class="smalltext" style="display: block; padding-top: 4px;"><input type="checkbox" name="ignoretimezone" value="1" {$ignore_timezone} style="vertical-align: middle;" /> {$lang->ignore_timezone} </label>\n								</td>\n							</tr>\n							<tr>\n								<td class="smalltext" style="padding: 4px; text-align: right; vertical-align:top;">{$lang->repeats}</td>\n								<td class="smalltext" style="padding: 4px;">\n									<select name="repeats" id="repeats" onchange="toggleRepeats();">\n										<option value="0">{$lang->does_not_repeat}</option>\n										<option value="1"{$repeats_sel[1]}>{$lang->repeats_daily}</option>\n										<option value="2"{$repeats_sel[2]}>{$lang->repeats_weekdays}</option>\n										<option value="3"{$repeats_sel[3]}>{$lang->repeats_weekly}</option>\n										<option value="4"{$repeats_sel[4]}>{$lang->repeats_monthly}</option>\n										<option value="5"{$repeats_sel[5]}>{$lang->repeats_yearly}</option>\n									</select>\n									<div class="repeats_type" id="repeats_type_1" style="padding: 4px;">\n										{$lang->repeats_every}\n										<input type="text" class="textbox" name="repeats_1_days" value="{$repeats_1_days}" size="2" /> {$lang->day_or_days}\n									</div>\n									<div class="repeats_type" id="repeats_type_3" style="padding: 4px;">\n										{$lang->repeats_every}\n										<input type="text" class="textbox" name="repeats_3_weeks" value="{$repeats_3_weeks}" size="2" /> {$lang->week_or_weeks_on}\n										<br />\n										<table style="padding: 4px;">\n											<tr>\n												<td style="padding: 2px;" class="smalltext"><label><input type="checkbox" name="repeats_3_days[0]" value="1" {$repeats_3_days[0]} style="vertical-align: middle;" /> {$lang->sunday}</label></td>\n												<td style="padding: 2px;" class="smalltext"><label><input type="checkbox" name="repeats_3_days[1]" value="1" {$repeats_3_days[1]} style="vertical-align: middle;" /> {$lang->monday}</label></td>\n												<td style="padding: 2px;" class="smalltext"><label><input type="checkbox" name="repeats_3_days[2]" value="1" {$repeats_3_days[2]} style="vertical-align: middle;" /> {$lang->tuesday}</label></td>\n												<td style="padding: 2px;" class="smalltext"><label><input type="checkbox" name="repeats_3_days[3]" value="1" {$repeats_3_days[3]} style="vertical-align: middle;" /> {$lang->wednesday}</label></td>\n											</tr>\n											<tr>\n												<td style="padding: 2px;" class="smalltext"><label><input type="checkbox" name="repeats_3_days[4]" value="1" {$repeats_3_days[4]} style="vertical-align: middle;" /> {$lang->thursday}</label></td>\n												<td style="padding: 2px;" class="smalltext"><label><input type="checkbox" name="repeats_3_days[5]" value="1" {$repeats_3_days[5]} style="vertical-align: middle;" /> {$lang->friday}</label></td>\n												<td style="padding: 2px;" class="smalltext" colspan="2"><label><input type="checkbox" name="repeats_3_days[6]" value="1" {$repeats_3_days[6]} style="vertical-align: middle;" /> {$lang->saturday}</label></td>\n											</tr>\n										</table>\n									</div>\n									<div class="repeats_type" id="repeats_type_4" style="padding: 4px;">\n										<div class="smalltext"><label>\n											<input type="radio" name="repeats_4_type" id="repeats_4_type_1" value="1" style="vertical-align: middle;" {$repeats_4_type[1]} />\n											{$lang->repeats_on_day}</label>\n											<input type="text" class="textbox" name="repeats_4_day" value="{$repeats_4_day}" onfocus="$(''repeats_4_type_1'').checked=true;" size="2" /> {$lang->of_every} <input type="text" class="textbox" name="repeats_4_months" value="{$repeats_4_months}" size="2" onfocus="$(''repeats_4_type_1'').checked=true;" /> {$lang->month_or_months}\n										</div>\n										<div class="smalltext" style="margin-top: 5px;"><label>\n											<input type="radio" name="repeats_4_type" id="repeats_4_type_2" value="2" style="vertical-align: middle;" {$repeats_4_type[2]} />\n											{$lang->repeats_on_the}</label>\n											<select name="repeats_4_occurance" onfocus="$(''repeats_4_type_2'').checked=true;">\n												<option value="1"{$repeats_4_occurance[1]}>{$lang->first}</option>\n												<option value="2"{$repeats_4_occurance[2]}>{$lang->second}</option>\n												<option value="3"{$repeats_4_occurance[3]}>{$lang->third}</option>\n												<option value="4"{$repeats_4_occurance[4]}>{$lang->fourth}</option>\n												<option value="last"{$repeats_4_occurance[''last'']}>{$lang->last}</option>\n											</select>\n											<select name="repeats_4_weekday" onfocus="$(''repeats_4_type_2'').checked=true;">\n												<option value="0"{$repeats_4_weekday[0]}>{$lang->sunday}</option>\n												<option value="1"{$repeats_4_weekday[1]}>{$lang->monday}</option>\n												<option value="2"{$repeats_4_weekday[2]}>{$lang->tuesday}</option>\n												<option value="3"{$repeats_4_weekday[3]}>{$lang->wednesday}</option>\n												<option value="4"{$repeats_4_weekday[4]}>{$lang->thursday}</option>\n												<option value="5"{$repeats_4_weekday[5]}>{$lang->friday}</option>\n												<option value="6"{$repeats_4_weekday[6]}>{$lang->saturday}</option>\n											</select>\n											{$lang->of_every}\n											<input type="text" class="textbox" name="repeats_4_months2" value="{$repeats_4_months2}" size="2" onfocus="$(''repeats_4_type_2'').checked=true;" /> {$lang->month_or_months}\n										</div>\n									</div>\n									<div class="repeats_type" id="repeats_type_5" style="padding: 4px;">\n										<div class="smalltext"><label>\n											<input type="radio" name="repeats_5_type" value="1" id="repeats_5_type_1" style="vertical-align: middle;" {$repeats_5_type[1]} />\n											{$lang->repeats_on}</label>\n											<input type="text" class="textbox" name="repeats_5_day" onfocus="$(''repeats_5_type_1'').checked=true;" value="{$repeats_5_day}" size="2" />\n											<select name="repeats_5_month" onfocus="$(''repeats_5_type_1'').checked=true;" >\n												<option value="1"{$repeats_5_month[''1'']}>{$lang->month_1}</option>\n												<option value="2"{$repeats_5_month[''2'']}>{$lang->month_2}</option>\n												<option value="3"{$repeats_5_month[''3'']}>{$lang->month_3}</option>\n												<option value="4"{$repeats_5_month[''4'']}>{$lang->month_4}</option>\n												<option value="5"{$repeats_5_month[''5'']}>{$lang->month_5}</option>\n												<option value="6"{$repeats_5_month[''6'']}>{$lang->month_6}</option>\n												<option value="7"{$repeats_5_month[''7'']}>{$lang->month_7}</option>\n												<option value="8"{$repeats_5_month[''8'']}>{$lang->month_8}</option>\n												<option value="9"{$repeats_5_month[''9'']}>{$lang->month_9}</option>\n												<option value="10"{$repeats_5_month[''10'']}>{$lang->month_10}</option>\n												<option value="11"{$repeats_5_month[''11'']}>{$lang->month_11}</option>\n												<option value="12"{$repeats_5_month[''12'']}>{$lang->month_12}</option>\n											</select>\n											{$lang->every}\n											<input type="text" class="textbox" name="repeats_5_years" value="{$repeats_5_years}" onfocus="$(''repeats_5_type_1'').checked=true;" size="2" /> {$lang->year_or_years}\n										</div>\n										<div class="smalltext" style="margin-top: 5px;"><label>\n											<input type="radio" name="repeats_5_type" value="2" id="repeats_5_type_2" style="vertical-align: middle;" {$repeats_5_type[2]} />\n											{$lang->repeats_on_the}</label>\n											<select name="repeats_5_occurance" onfocus="$(''repeats_5_type_2'').checked=true;" >\n												<option value="1"{$repeats_5_occurance[1]}>{$lang->first}</option>\n												<option value="2"{$repeats_5_occurance[2]}>{$lang->second}</option>\n												<option value="3"{$repeats_5_occurance[3]}>{$lang->third}</option>\n												<option value="4"{$repeats_5_occurance[4]}>{$lang->fourth}</option>\n												<option value="last"{$repeats_4_occurance[''last'']}>{$lang->last}</option>\n											</select>\n											<select name="repeats_5_weekday" onfocus="$(''repeats_5_type_2'').checked=true;" >\n												<option value="0"{$repeats_5_weekday[0]}>{$lang->sunday}</option>\n												<option value="1"{$repeats_5_weekday[1]}>{$lang->monday}</option>\n												<option value="2"{$repeats_5_weekday[2]}>{$lang->tuesday}</option>\n												<option value="3"{$repeats_5_weekday[3]}>{$lang->wednesday}</option>\n												<option value="4"{$repeats_5_weekday[4]}>{$lang->thursday}</option>\n												<option value="5"{$repeats_5_weekday[5]}>{$lang->friday}</option>\n												<option value="6"{$repeats_5_weekday[6]}>{$lang->saturday}</option>\n											</select>\n											{$lang->of}\n											<select name="repeats_5_month2" onfocus="$(''repeats_5_type_2'').checked=true;" >\n												<option value="1"{$repeats_5_month2[''1'']}>{$lang->month_1}</option>\n												<option value="2"{$repeats_5_month2[''2'']}>{$lang->month_2}</option>\n												<option value="3"{$repeats_5_month2[''3'']}>{$lang->month_3}</option>\n												<option value="4"{$repeats_5_month2[''4'']}>{$lang->month_4}</option>\n												<option value="5"{$repeats_5_month2[''5'']}>{$lang->month_5}</option>\n												<option value="6"{$repeats_5_month2[''6'']}>{$lang->month_6}</option>\n												<option value="7"{$repeats_5_month2[''7'']}>{$lang->month_7}</option>\n												<option value="8"{$repeats_5_month2[''8'']}>{$lang->month_8}</option>\n												<option value="9"{$repeats_5_month2[''9'']}>{$lang->month_9}</option>\n												<option value="10"{$repeats_5_month2[''10'']}>{$lang->month_10}</option>\n												<option value="11"{$repeats_5_month2[''11'']}>{$lang->month_11}</option>\n												<option value="12"{$repeats_5_month2[''12'']}>{$lang->month_12}</option>\n											</select>\n											{$lang->every}\n											<input type="text" class="textbox" name="repeats_5_years2" value="{$repeats_5_years}" size="2" onfocus="$(''repeats_5_type_2'').checked=true;" /> {$lang->year_or_years}\n										</div>\n									</div>\n								</td>\n							</tr>\n						</table>\n					</dd>\n				</dl>\n				<script type="text/javascript">\n				<!--\n					toggleType();\n					toggleRepeats();\n				// -->\n				</script>\n			</td>\n		</tr>\n		<tr>\n			<td valign="top" width="20%" class="trow1"><strong>{$lang->event_details}</strong>{$smilieinserter}</td>\n			<td class="trow1"><textarea name="description" id="message" rows="20" cols="70">{$description}</textarea>\n			{$codebuttons}</td>\n		</tr>\n		<tr>\n			<td width="20%" class="trow2"><strong>{$lang->event_options}</strong></td>\n			<td class="trow2">\n				<input type="checkbox" class="checkbox" name="private" value="1"{$privatecheck} /><span class="smalltext">{$lang->private_option}</span><br />\n			</td>\n		</tr>\n	</table>\n	<br />\n	<input type="hidden" name="action" value="do_addevent" />\n	<div align="center"><input type="submit" class="button" value="{$lang->post_event}" /></div>\n</form>\n{$footer}\n</body>\n</html>', -2, '1402', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (434, 'calendar_addprivateevent', '<a href="calendar.php?action=addevent&amp;calendar={$calendar[''cid'']}&amp;private=1">{$lang->add_private_event}</a>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (435, 'calendar_addpublicevent', '<a href="calendar.php?action=addevent&amp;calendar={$calendar[''cid'']}">{$lang->add_public_event}</a>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (436, 'calendar_eventbit_private', '<div style="margin-bottom: 4px;" class="smalltext eventbit_private"><a href="{$event[''eventlink'']}" title="{$event[''fullname'']}">{$event[''name'']}</a></div>', -2, '1402', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (437, 'calendar_eventbit', '<div style="margin-bottom: 4px;" class="smalltext {$event_class}"><a href="{$event[''eventlink'']}" title="{$event[''fullname'']}">{$event[''name'']}</a></div>', -2, '1402', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (438, 'calendar_weekview', '<html>\n<head>\n	<title>{$mybb->settings[''bbname'']} - {$lang->calendar}</title>\n	{$headerinclude}\n</head>\n<body>\n	{$header}\n<table border="0" cellspacing="0" cellpadding="0">\n<tr>\n<td width="100%">\n	<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n		<thead>\n			<tr>\n				<td class="thead" colspan="2">\n					<div class="float_right">\n						<a href="{$prev_link}">&laquo; {$lang->previous_week}</a> | <a href="{$next_link}">{$lang->next_week} &raquo;</a>\n					</div>\n					<div><strong>{$lang->weekly_overview} {$friendly_week_from} - {$friendly_week_to}</strong></div>\n				</td>\n			</tr>\n		</thead>\n		<tbody>\n			{$weekday_bits}\n		</tbody>\n	</table>\n</td>\n<td style="padding-left: 10px; vertical-align: top;">{$mini_calendars}</td>\n</tr>\n</table>\n	<br />\n	<form action="calendar.php" method="post">\n		<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n			<tr>\n				<td class="trow1">\n					<table width="100%" cellspacing="0" cellpadding="0" border="0">\n						<tr>\n						<td class="trow1" valign="top">{$addevent}</td>\n							<td class="trow1" align="right">\n							<span class="smalltext"><strong>{$lang->jump_month}</strong></span>\n							<select name="month">\n								<option value="{$week_from[1]}">{$monthnames[$week_from[1]]}</option>\n								<option value="{$week_from[1]}">----------</option>\n								<option value="1">{$lang->alt_month_1}</option>\n								<option value="2">{$lang->alt_month_2}</option>\n								<option value="3">{$lang->alt_month_3}</option>\n								<option value="4">{$lang->alt_month_4}</option>\n								<option value="5">{$lang->alt_month_5}</option>\n								<option value="6">{$lang->alt_month_6}</option>\n								<option value="7">{$lang->alt_month_7}</option>\n								<option value="8">{$lang->alt_month_8}</option>\n								<option value="9">{$lang->alt_month_9}</option>\n								<option value="10">{$lang->alt_month_10}</option>\n								<option value="11">{$lang->alt_month_11}</option>\n								<option value="12">{$lang->alt_month_12}</option>\n							</select>\n							<select name="year">\n								<option value="{$week_from[2]}">{$week_from[2]}</option>\n								<option value="{$week_from[2]}">----------</option>\n								{$yearsel}\n							</select>\n							{$gobutton}\n							<br /><br />\n							<span class="smalltext"><strong>{$lang->jump_to_calendar}</strong></span>\n							{$calendar_jump}\n							{$gobutton}\n							</td>\n						</tr>\n					</table>\n				</td>\n			</tr>\n		</table>\n	</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (439, 'calendar_weekview_month', '			<tr>\n				<td class="tcat" colspan="2"><strong>{$weekday_month} {$weekday_year}</strong></td>\n			</tr>\n			{$days}', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (440, 'calendar_weekview_day', '			<tr>\n				<td class="trow_sep" colspan="2">{$weekday_name}</td>\n			</tr>\n			<tr>\n				<td class="trow2{$day_shaded}" style="text-align: center; padding: 8px;"><span class="largetext">{$weekday_day}</span></td>\n				<td class="trow1" width="100%">{$day_birthdays}{$day_events}</td>\n			</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (441, 'calendar_weekview_day_event', '<a href="{$event[''eventlink'']}" class="{$event_class}" title="{$event[''fullname'']}">{$event[''fullname'']}</a>{$event_time}<br />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (442, 'calendar_mini', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder" style="width: 180px;">\n	<thead>\n		<tr>\n			<td class="thead" colspan="8">\n				<strong><a href="{$month_link}">{$monthnames[$month]} {$year}</a></strong>\n			</td>\n		</tr>\n		<tr>\n			<td class="tcat">&nbsp;</td>\n		{$weekday_headers}\n		</tr>\n	</thead>\n	<tbody>\n	{$calendar_rows}\n	</tbody>\n</table>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (443, 'calendar_mini_weekdayheader', '				<td class="tcat" align="center" width="14%"><strong>{$weekday_name}</strong></td>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (444, 'calendar_mini_weekrow', '			<tr>\n				<td class="tcat" align="center" width="1"><a href="{$week_link}">&raquo;</a></td>\n				{$day_bits}\n			</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (445, 'calendar_mini_weekrow_day', '				<td class="{$day_class}" valign="middle" align="center">\n					{$day_link}\n				</td>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (446, 'calendar_addeventlink', '<a href="calendar.php?action=addevent&amp;calendar={$calendar[''cid'']}">{$lang->add_public_event}</a> | <a href="calendar.php?action=addevent&amp;calendar={$calendar[''cid'']}&amp;private=1">{$lang->add_private_event}</a>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (447, 'calendar_editevent', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->calendar} - {$lang->edit_event}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n{$event_errors}\n<form action="calendar.php" method="post">\n	<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n	<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n		<tr>\n			<td class="thead" colspan="3"><strong>{$lang->delete_event}</strong></td>\n		</tr>\n		<tr>\n			<td class="trow1" style="white-space: nowrap"><input type="checkbox" class="checkbox" name="delete" value="1" tabindex="9" /> <strong>{$lang->delete_q}</strong></td>\n			<td class="trow1" width="100%">{$lang->delete_1}<br /><span class="smalltext">{$lang->delete_2}</span></td>\n			<td class="trow1"><input type="submit" class="button" name="submit" value="{$lang->delete_now}" tabindex="10" /></td>\n		</tr>\n	</table>\n	<input type="hidden" name="action" value="do_editevent" />\n	<input type="hidden" name="eid" value="{$event[''eid'']}" />\n</form>\n<br />\n<form action="calendar.php" method="post" name="input">\n	<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n	<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder" style="clear: both;">\n		<tr>\n			<td colspan="2" width="100%" class="thead"><strong>{$lang->edit_event}</strong></td>\n		</tr>\n		<tr>\n			<td width="20%" class="trow1"><strong>{$lang->event_name}</strong></td>\n			<td class="trow1"><input type="text" class="textbox" size="50" name="name" maxlength="120" value="{$name}"/></td>\n		</tr>\n		<tr>\n			<td class="trow2" style="vertical-align: top;"><strong>{$lang->event_date}</strong></td>\n			<td class="trow1">\n				<script type="text/javascript">\n				<!--\n					function toggleType()\n					{\n						if($(''type_single'').checked == true)\n						{\n							Element.hide(''ranged_selects'');\n							Element.show(''single_selects'');\n						}\n						else\n						{\n							Element.hide(''single_selects'');\n							Element.show(''ranged_selects'');\n							toggleRepeats();\n						}\n					}\n\n					function toggleRepeats()\n					{\n						var repeats = $(''repeats'').options[$(''repeats'').selectedIndex].value;\n						$$(''.repeats_type'').each(function(e)\n						{\n							Element.hide(e);\n						});\n						if($(''repeats_type_''+repeats))\n						{\n							Element.show(''repeats_type_''+repeats);\n						}\n					}\n				// -->\n				</script>\n				<dl style="margin-top: 0; margin-bottom: 0; width: 100%;">\n					<dt><input type="radio" name="type" value="single" {$type_single} id="type_single" onclick="toggleType();" /> <label for="type_single"><strong>{$lang->type_single}</strong></label></dt>\n					<dd style="margin-top: 4px;" id="single_selects">\n						<select name="single_day">\n							{$single_days}\n						</select>\n						&nbsp;\n						<select name="single_month">\n							<option value="1"{$single_month[''1'']}>{$lang->month_1}</option>\n							<option value="2"{$single_month[''2'']}>{$lang->month_2}</option>\n							<option value="3"{$single_month[''3'']}>{$lang->month_3}</option>\n							<option value="4"{$single_month[''4'']}>{$lang->month_4}</option>\n							<option value="5"{$single_month[''5'']}>{$lang->month_5}</option>\n							<option value="6"{$single_month[''6'']}>{$lang->month_6}</option>\n							<option value="7"{$single_month[''7'']}>{$lang->month_7}</option>\n							<option value="8"{$single_month[''8'']}>{$lang->month_8}</option>\n							<option value="9"{$single_month[''9'']}>{$lang->month_9}</option>\n							<option value="10"{$single_month[''10'']}>{$lang->month_10}</option>\n							<option value="11"{$single_month[''11'']}>{$lang->month_11}</option>\n							<option value="12"{$single_month[''12'']}>{$lang->month_12}</option>\n						</select>\n						&nbsp;\n						<select name="single_year">\n							{$single_years}\n						</select>\n					</dd>\n					<dt><input type="radio" name="type" value="ranged" {$type_ranged} id="type_ranged" onclick="toggleType();" /> <label for="type_ranged"><strong>{$lang->type_ranged}</strong></label></dt>\n					<dd style="margin-top: 4px; width: 100%;" id="ranged_selects">\n						<table width="100%">\n							<tr>\n								<td class="smalltext" style="padding: 4px; text-align: right;">{$lang->start_time}</td>\n								<td style="padding: 4px;">\n									<select name="start_day">\n										{$start_days}\n									</select>\n									<select name="start_month">\n										<option value="1"{$start_month[''1'']}>{$lang->month_1}</option>\n										<option value="2"{$start_month[''2'']}>{$lang->month_2}</option>\n										<option value="3"{$start_month[''3'']}>{$lang->month_3}</option>\n										<option value="4"{$start_month[''4'']}>{$lang->month_4}</option>\n										<option value="5"{$start_month[''5'']}>{$lang->month_5}</option>\n										<option value="6"{$start_month[''6'']}>{$lang->month_6}</option>\n										<option value="7"{$start_month[''7'']}>{$lang->month_7}</option>\n										<option value="8"{$start_month[''8'']}>{$lang->month_8}</option>\n										<option value="9"{$start_month[''9'']}>{$lang->month_9}</option>\n										<option value="10"{$start_month[''10'']}>{$lang->month_10}</option>\n										<option value="11"{$start_month[''11'']}>{$lang->month_11}</option>\n										<option value="12"{$start_month[''12'']}>{$lang->month_12}</option>\n									</select>\n									<select name="start_year">\n										{$start_years}\n									</select>\n									<span class="smalltext">&nbsp;&nbsp;&nbsp;{$lang->enter_time}</span>\n									<input type="text" class="textbox" name="start_time" value="{$start_time}" size="7" />\n								</td>\n							</tr>\n							<tr>\n								<td class="smalltext" style="padding: 4px; text-align: right;">{$lang->end_time}</td>\n								<td style="padding: 4px;">\n									<select name="end_day">\n										{$end_days}\n									</select>\n									<select name="end_month">\n										<option value="1"{$end_month[''1'']}>{$lang->month_1}</option>\n										<option value="2"{$end_month[''2'']}>{$lang->month_2}</option>\n										<option value="3"{$end_month[''3'']}>{$lang->month_3}</option>\n										<option value="4"{$end_month[''4'']}>{$lang->month_4}</option>\n										<option value="5"{$end_month[''5'']}>{$lang->month_5}</option>\n										<option value="6"{$end_month[''6'']}>{$lang->month_6}</option>\n										<option value="7"{$end_month[''7'']}>{$lang->month_7}</option>\n										<option value="8"{$end_month[''8'']}>{$lang->month_8}</option>\n										<option value="9"{$end_month[''9'']}>{$lang->month_9}</option>\n										<option value="10"{$end_month[''10'']}>{$lang->month_10}</option>\n										<option value="11"{$end_month[''11'']}>{$lang->month_11}</option>\n										<option value="12"{$end_month[''12'']}>{$lang->month_12}</option>\n									</select>\n									<select name="end_year">\n										{$end_years}\n									</select>\n									<span class="smalltext">&nbsp;&nbsp;&nbsp;{$lang->enter_time}</span>\n									<input type="text" class="textbox" name="end_time" value="{$end_time}" size="7" />\n								</td>\n							</tr>\n							<tr>\n								<td class="smalltext" style="padding: 4px; text-align: right; vertical-align: top;">{$lang->time_zone}</td>\n								<td style="padding: 4px;">\n									{$timezones}<br />\n									<label class="smalltext" style="display: block; padding-top: 4px;"><input type="checkbox" name="ignoretimezone" value="1" {$ignore_timezone} style="vertical-align: middle;" /> {$lang->ignore_timezone}</label>\n								</td>\n							</tr>\n							<tr>\n								<td class="smalltext" style="padding: 4px; text-align: right; vertical-align:top;">{$lang->repeats}</td>\n								<td class="smalltext" style="padding: 4px;">\n									<select name="repeats" id="repeats" onchange="toggleRepeats();">\n										<option value="0">{$lang->does_not_repeat}</option>\n										<option value="1"{$repeats_sel[1]}>{$lang->repeats_daily}</option>\n										<option value="2"{$repeats_sel[2]}>{$lang->repeats_weekdays}</option>\n										<option value="3"{$repeats_sel[3]}>{$lang->repeats_weekly}</option>\n										<option value="4"{$repeats_sel[4]}>{$lang->repeats_monthly}</option>\n										<option value="5"{$repeats_sel[5]}>{$lang->repeats_yearly}</option>\n									</select>\n									<div class="repeats_type" id="repeats_type_1" style="padding: 4px;">\n										{$lang->repeats_every}\n										<input type="text" class="textbox" name="repeats_1_days" value="{$repeats_1_days}" size="2" /> {$lang->day_or_days}\n									</div>\n									<div class="repeats_type" id="repeats_type_3" style="padding: 4px;">\n										{$lang->repeats_every}\n										<input type="text" class="textbox" name="repeats_3_weeks" value="{$repeats_3_weeks}" size="2" /> {$lang->week_or_weeks_on}\n										<br />\n										<table style="padding: 4px;">\n											<tr>\n												<td style="padding: 2px;" class="smalltext"><label><input type="checkbox" name="repeats_3_days[0]" value="1" {$repeats_3_days[0]} style="vertical-align: middle;" /> {$lang->sunday}</label></td>\n												<td style="padding: 2px;" class="smalltext"><label><input type="checkbox" name="repeats_3_days[1]" value="1" {$repeats_3_days[1]} style="vertical-align: middle;" /> {$lang->monday}</label></td>\n												<td style="padding: 2px;" class="smalltext"><label><input type="checkbox" name="repeats_3_days[2]" value="1" {$repeats_3_days[2]} style="vertical-align: middle;" /> {$lang->tuesday}</label></td>\n												<td style="padding: 2px;" class="smalltext"><label><input type="checkbox" name="repeats_3_days[3]" value="1" {$repeats_3_days[3]} style="vertical-align: middle;" /> {$lang->wednesday}</label></td>\n											</tr>\n											<tr>\n												<td style="padding: 2px;" class="smalltext"><label><input type="checkbox" name="repeats_3_days[4]" value="1" {$repeats_3_days[4]} style="vertical-align: middle;" /> {$lang->thursday}</label></td>\n												<td style="padding: 2px;" class="smalltext"><label><input type="checkbox" name="repeats_3_days[5]" value="1" {$repeats_3_days[5]} style="vertical-align: middle;" /> {$lang->friday}</label></td>\n												<td style="padding: 2px;" class="smalltext" colspan="2"><label><input type="checkbox" name="repeats_3_days[6]" value="1" {$repeats_3_days[6]} style="vertical-align: middle;" /> {$lang->saturday}</label></td>\n											</tr>\n										</table>\n									</div>\n									<div class="repeats_type" id="repeats_type_4" style="padding: 4px;">\n										<div class="smalltext"><label>\n											<input type="radio" name="repeats_4_type" id="repeats_4_type_1" value="1" style="vertical-align: middle;" {$repeats_4_type[1]} />\n											{$lang->repeats_on_day}</label>\n											<input type="text" class="textbox" name="repeats_4_day" value="{$repeats_4_day}" onfocus="$(''repeats_4_type_1'').checked=true;" size="2" /> {$lang->of_every} <input type="text" class="textbox" name="repeats_4_months" value="{$repeats_4_months}" size="2" onfocus="$(''repeats_4_type_1'').checked=true;" /> {$lang->month_or_months}\n										</div>\n										<div class="smalltext" style="margin-top: 5px;"><label>\n											<input type="radio" name="repeats_4_type" id="repeats_4_type_2" value="2" style="vertical-align: middle;" {$repeats_4_type[2]} />\n											{$lang->repeats_on_the}</label>\n											<select name="repeats_4_occurance" onfocus="$(''repeats_4_type_2'').checked=true;">\n												<option value="1"{$repeats_4_occurance[1]}>{$lang->first}</option>\n												<option value="2"{$repeats_4_occurance[2]}>{$lang->second}</option>\n												<option value="3"{$repeats_4_occurance[3]}>{$lang->third}</option>\n												<option value="4"{$repeats_4_occurance[4]}>{$lang->fourth}</option>\n												<option value="last"{$repeats_4_occurance[''last'']}>{$lang->last}</option>\n											</select>\n											<select name="repeats_4_weekday" onfocus="$(''repeats_4_type_2'').checked=true;">\n												<option value="0"{$repeats_4_weekday[0]}>{$lang->sunday}</option>\n												<option value="1"{$repeats_4_weekday[1]}>{$lang->monday}</option>\n												<option value="2"{$repeats_4_weekday[2]}>{$lang->tuesday}</option>\n												<option value="3"{$repeats_4_weekday[3]}>{$lang->wednesday}</option>\n												<option value="4"{$repeats_4_weekday[4]}>{$lang->thursday}</option>\n												<option value="5"{$repeats_4_weekday[5]}>{$lang->friday}</option>\n												<option value="6"{$repeats_4_weekday[6]}>{$lang->saturday}</option>\n											</select>\n											{$lang->of_every}\n											<input type="text" class="textbox" name="repeats_4_months2" value="{$repeats_4_months2}" size="2" onfocus="$(''repeats_4_type_2'').checked=true;" /> {$lang->month_or_months}\n										</div>\n									</div>\n									<div class="repeats_type" id="repeats_type_5" style="padding: 4px;">\n										<div class="smalltext"><label>\n											<input type="radio" name="repeats_5_type" value="1" id="repeats_5_type_1" style="vertical-align: middle;" {$repeats_5_type[1]} />\n											{$lang->repeats_on}</label>\n											<input type="text" class="textbox" name="repeats_5_day" onfocus="$(''repeats_5_type_1'').checked=true;" value="{$repeats_5_day}" size="2" />\n											<select name="repeats_5_month" onfocus="$(''repeats_5_type_1'').checked=true;" >\n												<option value="1"{$repeats_5_month[''1'']}>{$lang->month_1}</option>\n												<option value="2"{$repeats_5_month[''2'']}>{$lang->month_2}</option>\n												<option value="3"{$repeats_5_month[''3'']}>{$lang->month_3}</option>\n												<option value="4"{$repeats_5_month[''4'']}>{$lang->month_4}</option>\n												<option value="5"{$repeats_5_month[''5'']}>{$lang->month_5}</option>\n												<option value="6"{$repeats_5_month[''6'']}>{$lang->month_6}</option>\n												<option value="7"{$repeats_5_month[''7'']}>{$lang->month_7}</option>\n												<option value="8"{$repeats_5_month[''8'']}>{$lang->month_8}</option>\n												<option value="9"{$repeats_5_month[''9'']}>{$lang->month_9}</option>\n												<option value="10"{$repeats_5_month[''10'']}>{$lang->month_10}</option>\n												<option value="11"{$repeats_5_month[''11'']}>{$lang->month_11}</option>\n												<option value="12"{$repeats_5_month[''12'']}>{$lang->month_12}</option>\n											</select>\n											{$lang->every}\n											<input type="text" class="textbox" name="repeats_5_years" value="{$repeats_5_years}" onfocus="$(''repeats_5_type_1'').checked=true;" size="2" /> {$lang->year_or_years}\n										</div>\n										<div class="smalltext" style="margin-top: 5px;"><label>\n											<input type="radio" name="repeats_5_type" value="2" id="repeats_5_type_2" style="vertical-align: middle;" {$repeats_5_type[2]} />\n											{$lang->repeats_on_the}</label>\n											<select name="repeats_5_occurance" onfocus="$(''repeats_5_type_2'').checked=true;" >\n												<option value="1"{$repeats_5_occurance[1]}>{$lang->first}</option>\n												<option value="2"{$repeats_5_occurance[2]}>{$lang->second}</option>\n												<option value="3"{$repeats_5_occurance[3]}>{$lang->third}</option>\n												<option value="4"{$repeats_5_occurance[4]}>{$lang->fourth}</option>\n												<option value="last"{$repeats_4_occurance[''last'']}>{$lang->last}</option>\n											</select>\n											<select name="repeats_5_weekday" onfocus="$(''repeats_5_type_2'').checked=true;" >\n												<option value="0"{$repeats_5_weekday[0]}>{$lang->sunday}</option>\n												<option value="1"{$repeats_5_weekday[1]}>{$lang->monday}</option>\n												<option value="2"{$repeats_5_weekday[2]}>{$lang->tuesday}</option>\n												<option value="3"{$repeats_5_weekday[3]}>{$lang->wednesday}</option>\n												<option value="4"{$repeats_5_weekday[4]}>{$lang->thursday}</option>\n												<option value="5"{$repeats_5_weekday[5]}>{$lang->friday}</option>\n												<option value="6"{$repeats_5_weekday[6]}>{$lang->saturday}</option>\n											</select>\n											{$lang->of}\n											<select name="repeats_5_month2" onfocus="$(''repeats_5_type_2'').checked=true;" >\n												<option value="1"{$repeats_5_month2[''1'']}>{$lang->month_1}</option>\n												<option value="2"{$repeats_5_month2[''2'']}>{$lang->month_2}</option>\n												<option value="3"{$repeats_5_month2[''3'']}>{$lang->month_3}</option>\n												<option value="4"{$repeats_5_month2[''4'']}>{$lang->month_4}</option>\n												<option value="5"{$repeats_5_month2[''5'']}>{$lang->month_5}</option>\n												<option value="6"{$repeats_5_month2[''6'']}>{$lang->month_6}</option>\n												<option value="7"{$repeats_5_month2[''7'']}>{$lang->month_7}</option>\n												<option value="8"{$repeats_5_month2[''8'']}>{$lang->month_8}</option>\n												<option value="9"{$repeats_5_month2[''9'']}>{$lang->month_9}</option>\n												<option value="10"{$repeats_5_month2[''10'']}>{$lang->month_10}</option>\n												<option value="11"{$repeats_5_month2[''11'']}>{$lang->month_11}</option>\n												<option value="12"{$repeats_5_month2[''12'']}>{$lang->month_12}</option>\n											</select>\n											{$lang->every}\n											<input type="text" class="textbox" name="repeats_5_years2" value="{$repeats_5_years}" size="2" onfocus="$(''repeats_5_type_2'').checked=true;" /> {$lang->year_or_years}\n										</div>\n									</div>\n								</td>\n							</tr>\n						</table>\n					</dd>\n				</dl>\n				<script type="text/javascript">\n				<!--\n					toggleType();\n					toggleRepeats();\n				// -->\n				</script>\n			</td>\n		</tr>\n		<tr>\n			<td valign="top" width="20%" class="trow1"><strong>{$lang->event_details}</strong>{$smilieinserter}</td>\n			<td class="trow1"><textarea name="description" id="message" rows="20" cols="70">{$description}</textarea>\n			{$codebuttons}</td>\n		</tr>\n		<tr>\n			<td width="20%" class="trow2"><strong>{$lang->event_options}</strong></td>\n			<td class="trow2">\n				<input type="checkbox" class="checkbox" name="private" value="1"{$privatecheck} /><span class="smalltext">{$lang->private_option}</span><br />\n			</td>\n		</tr>\n	</table>\n	<br />\n	<input type="hidden" name="action" value="do_editevent" />\n	<input type="hidden" name="eid" value="{$event[''eid'']}" />\n	<div align="center"><input type="submit" class="button" value="{$lang->edit_event}" /></div>\n</form>\n{$footer}\n</body>\n</html>', -2, '1402', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (448, 'calendar_move', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->calendar} - {$lang->move_event}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="calendar.php" method="post" name="input">\n	<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n	<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder" style="clear: both;">\n		<tr>\n			<td colspan="2" width="100%" class="thead"><strong>{$lang->move_event}: {$event[''name'']}</strong></td>\n		</tr>\n		<tr>\n			<td width="20%" class="trow1"><strong>{$lang->move_to_calendar}:</strong></td>\n			<td class="trow1">\n				<select name="new_calendar">\n					{$calendar_select}\n				</select>\n			</td>\n		</tr>\n	</table>\n	<br />\n	<input type="hidden" name="action" value="do_move" />\n	<input type="hidden" name="eid" value="{$event[''eid'']}" />\n	<div align="center"><input type="submit" class="button" value="{$lang->move_event}" /></div>\n</form>\n{$footer}\n</body>\n</html>', -2, '1402', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (449, 'calendar_event', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->calendar} - {$event[''name'']}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n	<tr>\n		<td class="thead"><strong>{$event[''name'']}</strong></td>\n	</tr>\n	<tr>\n		<td class="tcat"><strong>{$time_period}</strong></td>\n	</tr>\n	<tr>\n		<td class="trow1{$event_class}">\n			<div style="float: left;">\n				<strong><span class="largetext">{$event[''profilelink'']}</span></strong><br />\n				<span class="smalltext">\n					{$event[''usertitle'']}<br />\n					{$event[''userstars'']}\n				</span>\n			</div>\n			<div style="float: right; text-align: right;">\n				{$moderator_options}\n				{$repeats}\n			</div>\n			<br style="clear: both;" />\n		</td>\n	</tr>\n	<tr>\n		<td class="trow2{$event_class}">\n			<p>{$event[''description'']}</p>\n			{$edit_event}\n		</td>\n	</tr>\n</table>\n<br />\n<form action="calendar.php" method="post">\n	<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n		<tr>\n			<td class="trow1">\n				<table width="100%" cellspacing="0" cellpadding="0" border="0">\n					<tr>\n					<td class="trow1" valign="top">{$addevent}</td>\n						<td class="trow1" align="right">\n						<span class="smalltext"><strong>{$lang->jump_month}</strong></span>\n						<select name="month">\n							<option value="{$month}">{$monthnames[$month]}</option>\n							<option value="{$week_from[1]}">----------</option>\n							<option value="1">{$lang->alt_month_1}</option>\n							<option value="2">{$lang->alt_month_2}</option>\n							<option value="3">{$lang->alt_month_3}</option>\n							<option value="4">{$lang->alt_month_4}</option>\n							<option value="5">{$lang->alt_month_5}</option>\n							<option value="6">{$lang->alt_month_6}</option>\n							<option value="7">{$lang->alt_month_7}</option>\n							<option value="8">{$lang->alt_month_8}</option>\n							<option value="9">{$lang->alt_month_9}</option>\n							<option value="10">{$lang->alt_month_10}</option>\n							<option value="11">{$lang->alt_month_11}</option>\n							<option value="12">{$lang->alt_month_12}</option>\n						</select>\n						<select name="year">\n							{$yearsel}\n						</select>\n						{$gobutton}\n						<br /><br />\n						<span class="smalltext"><strong>{$lang->jump_to_calendar}</strong></span>\n						{$calendar_jump}\n						{$gobutton}\n						</td>\n					</tr>\n				</table>\n			</td>\n		</tr>\n	</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (450, 'calendar_event_modoptions', '				<form method="post" action="calendar.php">\n					<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n					<input type="hidden" name="eid" value="{$event[''eid'']}">\n					<select name="action" onchange="if(this.options[this.selectedIndex].value != '''') { window.location=(''calendar.php?action=''+this.options[this.selectedIndex].value+''&amp;eid={$event[''eid'']}&my_post_key={$mybb->post_code}'') }">\n						<option value="" style="font-weight: bold;">{$lang->moderator_options}</option>\n						<option value="{$approve_value}">{$approve}</option>\n						<option value="move">{$lang->move_event}</option>\n					</select>\n					{$gobutton}\n				</form>\n				<br />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (451, 'calendar_dayview', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->calendar}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n{$birthdays}\n{$events}\n<br />\n<form action="calendar.php" method="post">\n	<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n		<tr>\n			<td class="trow1">\n				<table width="100%" cellspacing="0" cellpadding="0" border="0">\n					<tr>\n					<td class="trow1" valign="top">{$addevent}</td>\n						<td class="trow1" align="right">\n						<span class="smalltext"><strong>{$lang->jump_month}</strong></span>\n						<select name="month">\n							<option value="{$month}">{$monthnames[$month]}</option>\n							<option value="{$month}">----------</option>\n							<option value="1">{$lang->alt_month_1}</option>\n							<option value="2">{$lang->alt_month_2}</option>\n							<option value="3">{$lang->alt_month_3}</option>\n							<option value="4">{$lang->alt_month_4}</option>\n							<option value="5">{$lang->alt_month_5}</option>\n							<option value="6">{$lang->alt_month_6}</option>\n							<option value="7">{$lang->alt_month_7}</option>\n							<option value="8">{$lang->alt_month_8}</option>\n							<option value="9">{$lang->alt_month_9}</option>\n							<option value="10">{$lang->alt_month_10}</option>\n							<option value="11">{$lang->alt_month_11}</option>\n							<option value="12">{$lang->alt_month_12}</option>\n						</select>\n						<select name="year">\n							<option value="{$year}">{$year}</option>\n							<option value="{$year}">----------</option>\n							{$yearsel}\n						</select>\n						{$gobutton}\n						<br /><br />\n						<span class="smalltext"><strong>{$lang->jump_to_calendar}</strong></span>\n						{$calendar_jump}\n						{$gobutton}\n						</td>\n					</tr>\n				</table>\n			</td>\n		</tr>\n	</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '1405', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (452, 'calendar_dayview_event', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n	<tr>\n		<td class="thead"><strong>{$event[''name'']}</strong></td>\n	</tr>\n	<tr>\n		<td class="tcat"><strong>{$time_period}</strong></td>\n	</tr>\n	<tr>\n		<td class="trow1{$event_class}">\n			<div style="float: left;">\n				<strong><span class="largetext">{$event[''profilelink'']}</span></strong><br />\n				<span class="smalltext">\n					{$event[''usertitle'']}<br />\n					{$event[''userstars'']}\n				</span>\n			</div>\n			<div style="float: right; text-align: right;">\n				{$moderator_options}\n				{$repeats}\n			</div>\n			<br style="clear: both;" />\n		</td>\n	</tr>\n	<tr>\n		<td class="trow2{$event_class}">\n			<p>{$event[''description'']}</p>\n			{$edit_event}\n		</td>\n	</tr>\n</table>\n<br />\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (453, 'calendar_event_editbutton', '<div style="text-align: right; vertical-align: bottom;">\n	<a href="calendar.php?action=editevent&amp;eid={$event[''eid'']}"><img src="{$theme[''imglangdir'']}/postbit_edit.gif" border="0" alt="{$lang->alt_edit}" title="{$lang->alt_edit}" /></a>\n	<a href="javascript:MyBB.deleteEvent({$event[''eid'']});"><img src="{$theme[''imglangdir'']}/postbit_delete.gif" border="0" alt="{$lang->alt_delete}" title="{$lang->alt_delete}" /></a>\n</div>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (454, 'calendar_dayview_birthdays', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead"><strong>{$lang->birthdays_on_day}</strong></td>\n</tr>\n<tr>\n<td class="trow1"><span class="smalltext">{$birthday_list}</span></td>\n</tr>\n</table>\n<br />\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (455, 'calendar_dayview_birthdays_bday', '{$comma}{$birthday[''profilelink'']}{$age}', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (456, 'warnings', '<html>\n<head>\n	<title>{$mybb->settings[''bbname'']} - {$lang->warning_log}</title>\n	{$headerinclude}\n</head>\n<body>\n	{$header}\n\n	{$multipage}\n	<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n		<thead>\n			<tr>\n				<td class="thead" colspan="5">\n					<div class="float_right">{$lang->current_warning_level}</div>\n					<div><strong>{$lang->warning_log}</strong></div>\n				</td>\n			</tr>\n			<tr>\n				<td class="tcat"><span class="smalltext"><strong>{$lang->warning}</strong></span></td>\n				<td class="tcat" width="20%" align="center"><span class="smalltext"><strong>{$lang->date_issued}</strong></span></td>\n				<td class="tcat" width="20%" align="center"><span class="smalltext"><strong>{$lang->expiry_date}</strong></span></td>\n				<td class="tcat" width="20%" align="center"><span class="smalltext"><strong>{$lang->issued_by}</strong></span></td>\n				<td class="tcat" width="1" align="center"><span class="smalltext"><strong>{$lang->details}</strong></span></td>\n			</tr>\n		</thead>\n		<tbody>\n		{$warnings}\n		</tbody>\n	</table>\n	{$multipage}\n\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (457, 'warnings_warning', '			<tr>\n				<td class="{$alt_bg}">{$warning_type} {$points}{$post_link}</td>\n				<td class="{$alt_bg}" align="center">{$date_issued}</td>\n				<td class="{$alt_bg}" align="center">{$expires}</td>\n				<td class="{$alt_bg}" align="center">{$issuedby}</td>\n				<td class="{$alt_bg}" align="center"><a href="warnings.php?action=view&amp;wid={$warning[''wid'']}">{$lang->view}</a></td>\n			</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (458, 'warnings_active_header', '			<tr>\n				<td class="trow_sep" colspan="5">{$lang->active_warnings}</td>\n			</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (459, 'warnings_expired_header', '			<tr>\n				<td class="trow_sep" colspan="5">{$lang->expired_warnings}</td>\n			</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (460, 'warnings_no_warnings', '			<tr>\n				<td class="trow1" colspan="5" align="center">{$lang->no_warnings}</td>\n			</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (461, 'warnings_warn_existing', '	<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n		<thead>\n			<tr>\n				<td class="thead" colspan="5">\n					<div><strong>{$lang->existing_post_warnings}</strong></div>\n				</td>\n			</tr>\n			<tr>\n				<td class="tcat"><span class="smalltext"><strong>{$lang->warning}</strong></span></td>\n				<td class="tcat" width="20%" align="center"><span class="smalltext"><strong>{$lang->date_issued}</strong></span></td>\n				<td class="tcat" width="20%" align="center"><span class="smalltext"><strong>{$lang->expiry_date}</strong></span></td>\n				<td class="tcat" width="20%" align="center"><span class="smalltext"><strong>{$lang->issued_by}</strong></span></td>\n				<td class="tcat" width="1" align="center"><span class="smalltext"><strong>{$lang->details}</strong></span></td>\n			</tr>\n		</thead>\n		<tbody>\n		{$warnings}\n		</tbody>\n	</table><br />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (462, 'warnings_warn', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->warn_user}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n{$existing_warnings}\n{$warn_errors}\n<form action="warnings.php" method="post" name="input">\n	<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n	<input type="hidden" name="action" value="do_warn" />\n	<input type="hidden" name="uid" value="{$user[''uid'']}" />\n\n	<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder" style="clear: both;">\n		<tr>\n			<td colspan="2" width="100%" class="thead"><strong>{$lang->warn_user}</strong></td>\n		</tr>\n		<tr>\n			<td class="tcat" colspan="2"><span class="smalltext"><strong>{$lang->warn_user_desc}</strong></span></td>\n		</tr>\n		<tr>\n			<td width="20%" class="trow1"><strong>{$lang->username}</strong></td>\n			<td class="trow1">{$user_link}</td>\n		</tr>\n{$post}\n		<tr>\n			<td width="20%" class="trow1" valign="top"><strong>{$lang->warning_note}</strong></td>\n			<td class="trow1"><textarea name="notes" cols="60" rows="4">{$notes}</textarea></td>\n		</tr>\n		<tr>\n			<td width="20%" class="trow2" valign="top"><strong>{$lang->warning_type}</strong></td>\n			<td class="trow2">\n				<script type="text/javascript">\n				// <!--\n					function checkType()\n					{\n						var checked = '''';\n						$$(''.types_check'').each(function(e)\n						{\n							if(e.checked == true)\n							{\n								checked = e.value;\n							}\n						});\n						$$(''.types'').each(function(e)\n						{\n							Element.hide(e);\n						});\n						if($(''type_''+checked))\n						{\n							Element.show(''type_''+checked);\n						}\n					}\n				// -->\n				</script>\n				<dl style="margin-top: 0; margin-bottom: 0; width: 100%;">\n					{$types}\n					{$custom_warning}\n				</dl>\n				<script type="text/javascript">\n				// <!--\n					checkType();\n				// -->\n				</script>\n			</td>\n		</tr>\n		{$pm_notify}\n	</table>\n	<br />\n	<div align="center"><input type="submit" class="button" value="{$lang->warn_user}" /></div>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (463, 'warnings_warn_type', '					<dt><label style="display: block;"><input type="radio" name="type" value="{$type[''tid'']}" {$type_checked[$type[''tid'']]} class="types_check" onclick="checkType();" style="vertical-align: middle;" /> <strong>{$type[''title'']}</strong> $points</label></dt>\n					<dd style="margin-top: 4px;" id="type_{$type[''tid'']}" class="types">\n						<div class="smalltext">{$lang->new_warning_level}</div>\n						<div class="tborder" style="width: 150px; float: left; margin: 0; padding: 1px;">\n							<div class="trow1" style="width: {$current_level}%; float: left; ">&nbsp;</div>\n							<div class="trow2" style="width: {$level_diff}%; float: left;">&nbsp;</div>\n						</div>\n						<div style="padding-left: 10px; font-weight: bold; float: left;">{$new_warning_level}%</div><br style="clear: left;" />\n						{$result}\n					</dd>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (464, 'warnings_warn_custom', '					<dt><label style="display: block;"><input type="radio" name="type" value="custom" {$type_checked[''custom'']} class="types_check" onclick="checkType();" style="vertical-align: middle;" /> <strong>{$lang->custom}</strong></label></dt>\n					<dd style="margin-top: 4px;" id="type_custom" class="types">\n						<table>\n						<tr>\n							<td class="smalltext">{$lang->reason}</td>\n							<td class="smalltext">{$lang->points}</td>\n						</tr>\n						<tr>\n							<td><input type="text" class="textbox" name="custom_reason" size="50" maxlength="120" value="{$custom_reason}" /></td>\n							<td><input type="text" class="textbox" name="custom_points" size="2" value="{$custom_points}" /></td>\n						</tr>\n						<tr>\n							<td class="smalltext" colspan="2" style="padding-top: 4px;">{$lang->expires}</td>\n						</tr>\n						<tr>\n							<td colspan="2">\n								<input type="text" class="textbox" name="expires" size="2" value="{$expires}" />\n								<select name="expires_period">\n									<option value="hours" {$expires_period[''hours'']}>{$lang->hour_or_hours}</option>\n									<option value="days" {$expires_period[''days'']}>{$lang->day_or_days}</option>\n									<option value="weeks" {$expires_period[''weeks'']}>{$lang->week_or_weeks}</option>\n									<option value="months" {$expires_period[''months'']}>{$lang->month_or_months}</option>\n									<option value="never" {$expires_period[''never'']}>{$lang->never}</option>\n								</select>\n							</td>\n						</tr>\n						</table>\n					</dd>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (465, 'warnings_warn_pm', '		<tr>\n			<td width="20%" class="trow1" valign="top">\n				<strong>{$lang->send_pm}</strong>\n				<div style="margin:auto" id="pm_smilie_insert">{$smilieinserter}</div>\n			</td>\n			<td class="trow1">\n				<script type="text/javascript">\n				// <!--\n					var mybb_editor_disabled = true;\n					var clickableEditor = '''';\n					function togglePM()\n					{\n						if($(''send_pm'').checked == true)\n						{\n							$(''pm_input'').show();\n							$(''pm_smilie_insert'').show();\n							if(mybb_editor_disabled == true && editor_language)\n							{\n								mybb_editor_disabled = false;\n								clickableEditor = new messageEditor("message", {lang: editor_language, rtl: {$lang->settings[''rtl'']}, theme: "{$theme[''editortheme'']}"});\n								if(clickableEditor)\n								{\n									clickableEditor.bindSmilieInserter("clickable_smilies");\n								}\n							}\n						}\n						else\n						{\n							$(''pm_input'').hide();\n							$(''pm_smilie_insert'').hide();\n						}\n					}\n				// -->\n				</script>\n				<label style="display: block;"><input type="checkbox" class="checkbox" value="1" name="send_pm" id="send_pm" onclick="togglePM();" style="vertical-align: middle;" {$send_pm_checked} /> {$lang->send_user_warning_pm}</label>\n				<table id="pm_input" cellpadding="{$theme[''tablespace'']}">\n					<tr>\n						<td><strong>{$lang->send_pm_subject}</strong></td>\n						<td><input type="text" class="textbox" name="pm_subject" size="40" maxlength="85" value="{$pm_subject}" /></td>\n					</tr>\n					<tr>\n						<td valign="top"><strong>{$lang->send_pm_message}</strong></td>\n						<td><textarea name="pm_message" id="message" rows="20" cols="70">{$message}</textarea>\n						{$codebuttons}</td>\n					</tr>\n				</table>\n				<script type="text/javascript">\n				<!--\n					togglePM();\n				// -->\n				</script>\n			</td>\n		</tr>', -2, '1402', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (466, 'warnings_warn_post', '		<tr>\n			<td width="20%" class="trow2"><strong>{$lang->post}</strong></td>\n			<td class="trow2"><input type="hidden" name="pid" value="{$post[''pid'']}" /><a href="{$post_link}">{$post[''subject'']}</a></td>\n		</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (467, 'usercp_warnings', '	<br />\n	<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n		<thead>\n			<tr>\n				<td class="thead" colspan="4">\n					<div class="float_right">{$lang->current_warning_level}</div>\n					<div><strong>{$lang->latest_warnings}</strong></div>\n				</td>\n			</tr>\n			<tr>\n				<td class="tcat"><span class="smalltext"><strong>{$lang->warning}</strong></span></td>\n				<td class="tcat" width="20%" align="center"><span class="smalltext"><strong>{$lang->date_issued}</strong></span></td>\n				<td class="tcat" width="20%" align="center"><span class="smalltext"><strong>{$lang->expiry_date}</strong></span></td>\n				<td class="tcat" width="20%" align="center"><span class="smalltext"><strong>{$lang->issued_by}</strong></span></td>\n			</tr>\n		</thead>\n		<tbody>\n		{$warnings}\n		</tbody>\n	</table>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (468, 'usercp_warnings_warning', '			<tr>\n				<td class="{$alt_bg}">{$warning_type} {$points}{$post_link}</td>\n				<td class="{$alt_bg}" align="center">{$date_issued}</td>\n				<td class="{$alt_bg}" align="center">{$expires}</td>\n				<td class="{$alt_bg}" align="center">{$issuedby}</td>\n	</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (469, 'postbit_warninglevel', '<br />{$lang->postbit_warning_level} <a href="{$warning_link}">{$warning_level}</a>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (470, 'postbit_warn', '<a href="warnings.php?action=warn&amp;uid={$post[''uid'']}&amp;pid={$post[''pid'']}"><img src="{$theme[''imglangdir'']}/postbit_warn.gif" alt="{$lang->postbit_warn}" title="{$lang->postbit_warn}" /></a>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (471, 'member_profile_warninglevel', '<tr>\n	<td class="trow2"><strong>{$lang->warning_level}</strong></td>\n	<td class="trow2"><a href="{$warning_link}">{$warning_level}</a> {$warn_user}</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (472, 'member_profile_warn', '[<a href="warnings.php?action=warn&amp;uid={$memprofile[''uid'']}">{$lang->warn}</a>]', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (473, 'warnings_view', '<html>\n<head>\n	<title>{$mybb->settings[''bbname'']} - {$lang->warning_log}</title>\n	{$headerinclude}\n</head>\n<body>\n	{$header}\n\n	<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n		<tr>\n			<td class="thead" colspan="2">\n				<div class="float_right">{$status}</div>\n				<div><strong>{$lang->warning_details}</strong></div>\n			</td>\n		</tr>\n		{$warning_info}\n		<tr>\n			<td class="tcat" width="50%"><span class="smalltext"><strong>{$lang->warning}</strong></span></td>\n			<td class="tcat" width="50%"><span class="smalltext"><strong>{$lang->date_issued}<strong></span></td>\n		</tr>\n		<tr>\n			<td class="trow2">{$warning_type} {$points}</td>\n			<td class="trow2">{$date_issued}</td>\n		</tr>\n		<tr>\n			<td class="tcat" width="50%"><span class="smalltext"><strong>{$lang->issued_by}</strong></span></td>\n			<td class="tcat" width="50%"><span class="smalltext"><strong>{$lang->expiry_date}<strong></span></td>\n		</tr>\n		<tr>\n			<td class="trow1">{$issuedby}</td>\n			<td class="trow1">{$expires} {$revoked_date}</td>\n		</tr>\n		<tr>\n			<td class="tcat" colspan="2"><span class="smalltext"><strong>{$lang->warning_note}</strong></span></td>\n		</tr>\n		<tr>\n			<td class="trow2" colspan="2">{$notes}</td>\n		</tr>\n	</table>\n\n	{$revoke}\n\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (474, 'warnings_view_post', '		<tr>\n			<td class="tcat" width="50%"><span class="smalltext"><strong>{$lang->username}</strong></span></td>\n			<td class="tcat" width="50%"><span class="smalltext"><strong>{$lang->post}<strong></span></td>\n		</tr>\n		<tr>\n			<td class="trow1">{$user_link}</td>\n			<td class="trow1"><a href="{$post_link}">{$warning[''post_subject'']}</a></td>\n		</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (475, 'warnings_view_user', '		<tr>\n			<td class="tcat" colspan="2"><span class="smalltext"><strong>{$lang->username}</strong></span></td>\n		</tr>\n		<tr>\n			<td class="trow1" colspan="2">{$user_link}</td>\n		</tr>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (476, 'warnings_view_revoke', '<br />\n{$warn_errors}\n<form action="warnings.php" method="post" name="input">\n	<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n	<input type="hidden" name="action" value="do_revoke" />\n	<input type="hidden" name="wid" value="{$warning[''wid'']}" />\n\n	<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder" style="clear: both;">\n		<tr>\n			<td colspan="2" class="thead"><strong>{$lang->revoke_warning}</strong></td>\n		</tr>\n		<tr>\n			<td class="tcat" colspan="2"><span class="smalltext"><strong>{$lang->revoke_warning_desc}</strong></span></td>\n		</tr>\n		<tr>\n			<td class="trow1" width="20%" valign="top"><strong>{$lang->reason}</strong></td>\n			<td class="trow1"><textarea name="reason" cols="60" rows="4"></textarea></td>\n		</tr>\n	</table>\n	<br />\n	<div align="center"><input type="submit" class="button" value="{$lang->revoke_warning}" /></div>\n</form>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (477, 'warnings_view_revoked', '<br />\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder" style="clear: both;">\n	<tr>\n		<td class="thead" colspan="2"><strong>{$lang->warning_is_revoked}</strong></td>\n	</tr>\n	<tr>\n		<td class="tcat" width="50%"><span class="smalltext"><strong>{$lang->revoked_by}</strong></span></td>\n		<td class="tcat" width="50%"><span class="smalltext"><strong>{$lang->date_revoked}</strong></span></td>\n	</tr>\n	<tr>\n		<td class="trow1">{$revoked_by}</td>\n		<td class="trow1">{$date_revoked}</td>\n	</tr>\n	<tr>\n		<td class="tcat" colspan="2"><span class="smalltext"><strong>{$lang->reason}</strong></span></td>\n	</tr>\n	<tr>\n		<td class="trow2" colspan="2">{$revoke_reason}</td>\n	</tr>\n</table>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (478, 'xmlhttp_buddyselect', '<table border="0" cellspacing="1" cellpadding="4" class="tborder" style="width: 300px;">\n	<thead>\n		<tr>\n			<td class="thead">\n				<div class="float_right" style="margin-top: 3px;"><span class="smalltext"><a href="#" onclick="UserCP.closeBuddySelect(true); return false;">{$lang->close}</a></span></div>\n				<div><strong>{$lang->select_buddies}</strong></div>\n			</td>\n		</tr>\n	</thead>\n	<tbody>\n		<tr>\n			<td class="trow1 smalltext">{$lang->select_buddies_desc}</td>\n		</tr>\n		<tr>\n			<td class="trow2">\n				<div style="height: 200px; overflow: auto;" >\n				<table border="0" cellspacing="1" cellpadding="4" class="tborder" style="border: 0; width: 270px;" align="right">\n				{$online}\n				{$offline}\n				</table>\n				</div>\n			</td>\n		</tr>\n		<tr>\n			<td class="trow1">\n				<div class="smalltext"><strong>{$lang->selected_recipients}</strong></div>\n				<div id="buddyselect_buddies" class="smalltext" style="padding-left: 10px; height: 50px; overflow: auto;"></div>\n				<div style="text-align: right;"><input type="button" class="button" value="{$lang->ok}" onclick="UserCP.closeBuddySelect();" /> <input type="button" class="button" value="{$lang->cancel}" onclick="UserCP.closeBuddySelect(true);" /></div>\n			</td>\n		</tr>\n	</tbody>\n</table>', -2, '1405', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (479, 'xmlhttp_buddyselect_online', '					<tr>\n						<td class="trow1" onmouseover="this.className=''trow2'';" onmouseout="this.className=''trow1'';"><label><input type="checkbox" style="vertical-align: middle;" id="checkbox_{$buddy[''uid'']}" onclick="UserCP.selectBuddy(''{$buddy[''uid'']}'', ''{$buddy[''username'']}'');" /> <img src="{$theme[''imgdir'']}/buddy_online.gif" alt="({$lang->online})" title="{$lang->online}" style="vertical-align: middle;" /> {$buddy_name}</label></td>\n					</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (480, 'xmlhttp_buddyselect_offline', '					<tr>\n						<td class="trow1" onmouseover="this.className=''trow2'';" onmouseout="this.className=''trow1'';"><label><input type="checkbox" style="vertical-align: middle;" id="checkbox_{$buddy[''uid'']}" onclick="UserCP.selectBuddy(''{$buddy[''uid'']}'', ''{$buddy[''username'']}'');" /> <img src="{$theme[''imgdir'']}/buddy_offline.gif" alt="({$lang->offline})" title="{$lang->offline}" style="vertical-align: middle;" /> {$buddy_name}</label></td>\n					</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (481, 'private_send_buddyselect', '<script type="text/javascript"><!--\ndocument.write(''<br /><span class="smalltext"><a href="#" onclick="UserCP.openBuddySelect(\\''{$buddy_select}\\'');"><img src="{$theme[''imgdir'']}/buddies.gif" alt="" style="vertical-align: middle;" alt="" title="{$lang->select_from_buddies}" /> {$lang->select_from_buddies}</a></span>'');\n// --></script>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (482, 'forumdisplay_announcements_announcement_modbit', '<td align="center" class="{$bgcolor}">-</td>', -2, '128', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (483, 'calendar_dayview_noevents', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="trow1">{$lang->no_events}</td>\n</tr>\n</table>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (484, 'forumbit_depth2_forum_lastpost', '<span class="smalltext">\n<a href="{$lastpost_link}" title="{$full_lastpost_subject}"><strong>{$lastpost_subject}</strong></a>\n<br />{$lastpost_date} {$lastpost_time}<br />{$lang->by} {$lastpost_profilelink}</span>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (485, 'forumbit_depth1_forum_lastpost', '<span class="smalltext">\n<a href="{$lastpost_link}" title="{$full_lastpost_subject}"><strong>{$lastpost_subject}</strong></a>\n<br />{$lastpost_date} {$lastpost_time}<br />{$lang->by} {$lastpost_profilelink}</span>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (486, 'member_register_coppa', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->coppa_compliance}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<br />\n<form action="member.php" method="post">\n<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n<tr>\n<td class="thead"><strong>{$mybb->settings[''bbname'']} - {$lang->coppa_compliance}</strong></td>\n</tr>\n<tr>\n<td class="trow1">\n{$lang->coppa_desc}\n<div style="width: 400px; margin: auto; margin-bottom: 15px;">\n	<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n		<tr>\n			<td colspan="1" class="thead"><strong>{$lang->date_of_birth}</strong></td>\n		</tr>\n		<tr>\n			<td class="trow1">\n				<table cellpadding="4" border="0" align="center">\n					<tr>\n						<td class="smalltext"><label for="day">{$lang->day}:</label></td>\n						<td class="smalltext"><label for="month">{$lang->month}:</label></td>\n						<td class="smalltext"><label for="year">{$lang->year}:</label></td>\n					</tr>\n					<tr>\n						<td>\n							<select name="bday1" id="day">\n								<option value="">&nbsp;</option>\n								{$bdaysel}\n							</select>\n						</td>\n						<td>\n							<select name="bday2" id="month">\n								<option value="">&nbsp;</option>\n								<option value="1" {$bdaymonthsel[''1'']}>{$lang->month_1}</option>\n								<option value="2" {$bdaymonthsel[''2'']}>{$lang->month_2}</option>\n								<option value="3" {$bdaymonthsel[''3'']}>{$lang->month_3}</option>\n								<option value="4" {$bdaymonthsel[''4'']}>{$lang->month_4}</option>\n								<option value="5" {$bdaymonthsel[''5'']}>{$lang->month_5}</option>\n								<option value="6" {$bdaymonthsel[''6'']}>{$lang->month_6}</option>\n								<option value="7" {$bdaymonthsel[''7'']}>{$lang->month_7}</option>\n								<option value="8" {$bdaymonthsel[''8'']}>{$lang->month_8}</option>\n								<option value="9" {$bdaymonthsel[''9'']}>{$lang->month_9}</option>\n								<option value="10" {$bdaymonthsel[''10'']}>{$lang->month_10}</option>\n								<option value="11" {$bdaymonthsel[''11'']}>{$lang->month_11}</option>\n								<option value="12" {$bdaymonthsel[''12'']}>{$lang->month_12}</option>\n							</select>\n						</td>\n						<td>\n							<input type="text" class="textbox" size="4" maxlength="4" name="bday3" id="year" value="{$mybb->input[''bday3'']}" />\n						</td>\n					</tr>\n				</table>\n				<div class="smalltext" style="text-align: center;">{$lang->hide_dob}</div>\n			</td>\n		</tr>\n	</table>\n</div>\n</td>\n</tr>\n</table>\n<br />\n<div align="center">\n<input type="hidden" name="action" value="register" />\n<input type="submit" class="button" name="agree" value="{$lang->continue_registration}" />\n</div>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (487, 'member_coppa_form', '<html>\n<head>\n	<title>{$mybb->settings[''bbname'']} - {$lang->coppa_compliance}</title>\n	<style type="text/css">\n		body { font-family: Verdana, Arial, sans-serif; font-size: 13px; }\n		.largetext, h1 { font-family: Verdana, Arial, sans-serif; font-size: medium; font-weight: bold; margin: 0; }\n		.grey { color: #ccc; }\n		dl { margin-left: 40px; }\n		dt { width: 150px; float: left; clear: left; font-weight: bold; }\n		dd { margin-bottom: 20px; margin-left: 150px; }\n		dd.single { margin-left: 0; }\n		input.textbox { border: 0; border-bottom: 1px solid #000; font-size: 16px; width: 350px; }\n		input.date { width: 80px; }\n	</style>\n</head>\n<body>\n	<div style="float: right; text-align: center; padding-bottom: 10px;" class="largetext">\n		{$mybb->settings[''bbname'']}<br /><span class="grey">{$lang->coppa_registration}</span>\n	</div>\n	<div style="padding-bottom: 10px;"><a href="index.php"><img src="{$theme[''logo'']}" alt="{$mybb->settings[''bbname'']}" border="0" /></a></div>\n	<hr size="1" style="clear: both;" />\n\n	<p>{$lang->coppa_form_instructions}</p>\n\n	<dl>\n		<dt>{$lang->fax_number}</dt>\n		<dd>{$mybb->settings[''faxno'']}</dd>\n\n		<dt>{$lang->mailing_address}</dt>\n		<dd>{$mybb->settings[''mailingaddress'']}</dd>\n	</dl>\n\n	<h1 style="clear: both;" />{$lang->account_information}</h1>\n	<dl>\n		<dt><label for="username">{$lang->username}</label></dt>\n		<dd><input type="text" class="textbox" id="username" /></dd>\n\n		<dt><label for="email">{$lang->email}</label></dt>\n		<dd><input type="text" class="textbox" id="email" /></dd>\n	</dl>\n	<h1 style="clear: both;" />{$lang->parent_details}</h1>\n	<dl>\n		<dt><label for="name">{$lang->full_name}</label></dt>\n		<dd><input type="text" class="textbox" id="name" /></dd>\n\n			<dt><label for="relation">{$lang->relation}</label></dt>\n		<dd><input type="text" class="textbox" id="relation" /></dd>\n\n		<dt><label for="phone">{$lang->phone_no}</label></dt>\n		<dd><input type="text" class="textbox" id="phone" /></dd>\n\n		<dt><label for="parent_email">{$lang->email}</label></dt>\n		<dd><input type="text" class="textbox" id="parent_email" /></dd>\n\n		<dd class="single">{$lang->coppa_parent_agreement}</dd>\n\n		<dt><label for="signature">{$lang->signature}</label></dt>\n		<dd><input type="text" class="textbox" id="signature" /> Date: <input type="text" class="textbox date" id="date" /></dd>\n	</dl>\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (488, 'member_register_agreement_coppa', '<tr>\n	<td class="tcat"><strong>{$lang->coppa_compliance}</strong></td>\n</tr>\n<tr>\n	<td class="trow1">\n		<p>{$lang->coppa_agreement_1}</p>\n		<p>{$lang->coppa_agreement_2}</p>\n		<p>{$lang->coppa_agreement_3}</p>\n	</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (489, 'modcp_modqueue_noresults', '<tr>\n	<td class="trow1" align="center" colspan="{$colspan}">{$lang->error_no_results}</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (490, 'modcp_modqueue_threads', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->threads_awaiting_moderation}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="modcp.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<input type="hidden" name="action" value="do_modqueue" />\n<table width="100%" border="0" align="center">\n<tr>\n{$modcp_nav}\n<td valign="top">\n	<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n		<tr>\n			<td class="thead" colspan="3">\n				<div class="float_right">\n					<strong>{$lang->threads}</strong> |\n					<a href="modcp.php?action=modqueue&amp;type=posts">{$lang->posts}</a> |\n					<a href="modcp.php?action=modqueue&amp;type=attachments">{$lang->attachments}</a>\n				</div>\n				<strong>{$lang->threads_awaiting_moderation}</strong>\n			</td>\n		</tr>\n		<tr>\n			<td class="tcat" width="50%"><span class="smalltext"><strong>{$lang->subject}</strong></span></td>\n			<td class="tcat" align="center" width="25%"><span class="smalltext"><strong>{$lang->author}</strong></span></td>\n			<td class="tcat" align="center" width="25%"><span class="smalltext"><strong>{$lang->date}</strong></span></td>\n		</tr>\n		{$threads}\n		</table>\n{$multipage}\n{$mass_controls}\n<br />\n<div align="center"><input type="submit" class="button" name="reportsubmit" value="{$lang->perform_actions}" /></div>\n</td>\n</tr>\n</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (491, 'modcp_modqueue_threads_thread', '			<tr>\n				<td class="{$altbg}"><a href="{$thread[''threadlink'']}">{$thread[''subject'']}</a></td>\n				<td class="{$altbg}" align="center">{$profile_link}</td>\n				<td align="center" class="{$altbg}">{$threaddate}, {$threadtime}</td>\n			</tr>\n			<tr>\n				<td class="{$altbg}" colspan="3">\n					<div class="modqueue_message">\n						<div class="float_right modqueue_controls">\n							<label class="label_radio_ignore"><input type="radio" class="radio radio_ignore" name="threads[{$thread[''tid'']}]" value="ignore" checked="checked" /> {$lang->ignore}</label>\n							<label class="label_radio_delete"><input type="radio" class="radio radio_delete" name="threads[{$thread[''tid'']}]" value="delete" /> {$lang->delete}</label>\n							<label class="label_radio_approve"><input type="radio" class="radio radio_approve" name="threads[{$thread[''tid'']}]" value="approve" /> {$lang->approve}</label>\n						</div>\n						<div class="modqueue_meta">\n							{$forum}\n						</div>\n						{$thread[''postmessage'']}\n					</div>\n				</td>\n			</tr>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (492, 'modcp_modqueue_posts', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->posts_awaiting_moderation}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="modcp.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<input type="hidden" name="action" value="do_modqueue" />\n<table width="100%" border="0" align="center">\n<tr>\n{$modcp_nav}\n<td valign="top">\n	<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n		<tr>\n			<td class="thead" colspan="3">\n				<div class="float_right">\n					<a href="modcp.php?action=modqueue&amp;type=threads">{$lang->threads}</a> |\n					<strong>{$lang->posts}</strong> |\n					<a href="modcp.php?action=modqueue&amp;type=attachments">{$lang->attachments}</a>\n				</div>\n				<strong>{$lang->posts_awaiting_moderation}</strong>\n			</td>\n		</tr>\n		<tr>\n			<td class="tcat" width="50%"><span class="smalltext"><strong>{$lang->subject}</strong></span></td>\n			<td class="tcat" align="center" width="25%"><span class="smalltext"><strong>{$lang->author}</strong></span></td>\n			<td class="tcat" align="center" width="25%"><span class="smalltext"><strong>{$lang->date}</strong></span></td>\n		</tr>\n		{$posts}\n		</table>\n{$multipage}\n{$mass_controls}\n<br />\n<div align="center"><input type="submit" class="button" name="reportsubmit" value="{$lang->perform_actions}" /></div>\n</td>\n</tr>\n</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (493, 'modcp_modqueue_posts_post', '			<tr>\n				<td class="{$altbg}"><a href="{$post[''postlink'']}#pid{$post[''pid'']}">{$post[''subject'']}</a></td>\n				<td class="{$altbg}" align="center">{$profile_link}</td>\n				<td align="center" class="{$altbg}">{$postdate}, {$posttime}</td>\n			</tr>\n			<tr>\n				<td class="{$altbg}" colspan="3">\n					<div class="modqueue_message">\n						<div class="float_right modqueue_controls">\n							<label class="label_radio_ignore"><input type="radio" class="radio radio_ignore" name="posts[{$post[''pid'']}]" value="ignore" checked="checked" /> {$lang->ignore}</label>\n							<label class="label_radio_delete"><input type="radio" class="radio radio_delete" name="posts[{$post[''pid'']}]" value="delete" /> {$lang->delete}</label>\n							<label class="label_radio_approve"><input type="radio" class="radio radio_approve" name="posts[{$post[''pid'']}]" value="approve" /> {$lang->approve}</label>\n						</div>\n						<div class="modqueue_meta">\n							{$forum}{$thread}\n						</div>\n						{$post[''message'']}\n					</div>\n				</td>\n			</tr>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (494, 'modcp_modqueue_attachments', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->attachments_awaiting_moderation}</title>\n{$headerinclude}\n</head>\n<body>\n{$header}\n<form action="modcp.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<input type="hidden" name="action" value="do_modqueue" />\n<table width="100%" border="0" align="center">\n<tr>\n{$modcp_nav}\n<td valign="top">\n	<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n		<tr>\n			<td class="thead" colspan="6">\n				<div class="float_right">\n					<a href="modcp.php?action=modqueue&amp;type=threads">{$lang->threads}</a> |\n					<a href="modcp.php?action=modqueue&amp;type=posts">{$lang->posts}</a> |\n					<strong>{$lang->attachments}</strong>\n				</div>\n				<strong>{$lang->attachments_awaiting_moderation}</strong>\n			</td>\n		</tr>\n		<tr>\n			<td class="tcat"><span class="smalltext"><strong>{$lang->filename}</strong></span></td>\n			<td class="tcat" align="center" width="20%"><span class="smalltext"><strong>{$lang->author}</strong></span></td>\n			<td class="tcat" align="center" width="20%"><span class="smalltext"><strong>{$lang->date}</strong></span></td>\n			<td class="tcat" align="center" colspan="3"><span class="smalltext"><strong>{$lang->controls}</strong></span></td>\n		</tr>\n		{$attachments}\n		</table>\n{$multipage}\n{$mass_controls}\n<br />\n<div align="center"><input type="submit" class="button" name="reportsubmit" value="{$lang->perform_actions}" /></div>\n</td>\n</tr>\n</table>\n</form>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (495, 'modcp_modqueue_attachments_attachment', '			<tr>\n				<td class="{$altbg}"><a href="attachment.php?aid={$attachment[''aid'']}" target="_blank">{$attachment[''filename'']}</a> ({$attachment[''filesize'']})<br /><small class="modqueue_meta">Post: <a href="{$link}">{$attachment[''postsubject'']}</a></small></td>\n				<td class="{$altbg}" align="center">{$profile_link}</td>\n				<td align="center" class="{$altbg}">{$attachdate}, {$attachtime}</td>\n				<td class="{$altbg}" align="center"><label class="label_radio_ignore"><input type="radio" class="radio radio_ignore" name="attachments[{$attachment[''aid'']}]" value="ignore" checked="checked" /> {$lang->ignore}</label></td>\n				<td class="{$altbg}" align="center"><label class="label_radio_delete"><input type="radio" class="radio radio_delete" name="attachments[{$attachment[''aid'']}]" value="delete" /> {$lang->delete}</label></td>\n				<td class="{$altbg}" align="center"><label class="label_radio_approve"><input type="radio" class="radio radio_approve" name="attachments[{$attachment[''aid'']}]" value="approve" /> {$lang->approve}</label></td>\n			</tr>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (496, 'modcp_editprofile', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->edit_profile}</title>\n{$headerinclude}\n</head>\n<body>\n	{$header}\n	<form action="modcp.php" method="post">\n		<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n		<table width="100%" border="0" align="center">\n			<tr>\n				{$modcp_nav}\n				<td valign="top">\n					{$errors}\n					<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n						<tr>\n							<td class="thead" colspan="2"><strong>{$lang->edit_profile}</strong></td>\n						</tr>\n						<tr>\n							<td width="50%" class="trow1" valign="top">\n								<fieldset class="trow2">\n									<legend><strong>{$lang->profile_required}</strong></legend>\n									<table cellspacing="0" cellpadding="{$theme[''tablespace'']}">\n										<tr>\n											<td><span class="smalltext">{$lang->current_username}</span></td>\n										</tr>\n										<tr>\n											<td><strong>{$profile_link}</strong></td>\n										</tr>\n										{$requiredfields}\n									</table>\n								</fieldset>\n								<br />\n								<fieldset class="trow2">\n									<legend><strong>{$lang->profile_optional}</strong></legend>\n									<table cellspacing="0" cellpadding="{$theme[''tablespace'']}">\n										<tr>\n											<td colspan="3"><span class="smalltext"><label><input type="checkbox" class="checkbox" name="remove_avatar" value="1" /> {$lang->remove_avatar}</label></span></td>\n										</tr>\n\n										<tr>\n											<td colspan="3"><span class="smalltext">{$lang->birthday}</span></td>\n										</tr>\n										<tr>\n											<td>\n												<select name="birthday_day">\n													<option value="">&nbsp;</option>\n													{$bdaydaysel}\n												</select>\n											</td>\n											<td>\n												<select name="birthday_month">\n													<option value="">&nbsp;</option>\n													<option value="1" {$bdaymonthsel[''1'']}>{$lang->month_1}</option>\n													<option value="2" {$bdaymonthsel[''2'']}>{$lang->month_2}</option>\n													<option value="3" {$bdaymonthsel[''3'']}>{$lang->month_3}</option>\n													<option value="4" {$bdaymonthsel[''4'']}>{$lang->month_4}</option>\n													<option value="5" {$bdaymonthsel[''5'']}>{$lang->month_5}</option>\n													<option value="6" {$bdaymonthsel[''6'']}>{$lang->month_6}</option>\n													<option value="7" {$bdaymonthsel[''7'']}>{$lang->month_7}</option>\n													<option value="8" {$bdaymonthsel[''8'']}>{$lang->month_8}</option>\n													<option value="9" {$bdaymonthsel[''9'']}>{$lang->month_9}</option>\n													<option value="10" {$bdaymonthsel[''10'']}>{$lang->month_10}</option>\n													<option value="11" {$bdaymonthsel[''11'']}>{$lang->month_11}</option>\n													<option value="12" {$bdaymonthsel[''12'']}>{$lang->month_12}</option>\n												</select>\n											</td>\n											<td>\n												<input type="text" class="textbox" size="4" maxlength="4" name="birthday_year" value="{$mybb->input[''birthday_year'']}" />\n											</td>\n										</tr>\n										<tr>\n											<td colspan="3"><span class="smalltext">{$lang->website_url}</span></td>\n										</tr>\n										<tr>\n											<td colspan="3"><input type="text" class="textbox" name="website" size="25" maxlength="75" value="{$mybb->input[''website'']}" /></td>\n										</tr>\n									</table>\n								</fieldset>\n								{$customfields}\n							</td>\n							<td width="50%" class="trow1" valign="top">\n								<fieldset class="trow2">\n									<legend><strong>{$lang->custom_usertitle}</strong></legend>\n									<table cellspacing="0" cellpadding="{$theme[''tablespace'']}">\n										<tr>\n											<td><span class="smalltext">{$lang->custom_usertitle_note}</span></td>\n										</tr>\n										<tr>\n											<td><span class="smalltext">{$lang->default_usertitle}</span></td>\n										</tr>\n										<tr>\n											<td><span class="smalltext"><strong>{$defaulttitle}</strong></span></td>\n										</tr>\n										<tr>\n											<td><span class="smalltext">{$lang->current_custom_usertitle}</span></td>\n										</tr>\n										<tr>\n											<td><span class="smalltext"><strong>{$user[''usertitle'']}</strong></span></td>\n										</tr>\n										<tr>\n											<td><span class="smalltext">{$lang->new_custom_usertitle}</span></td>\n										</tr>\n										<tr>\n											<td><input type="text" class="textbox" name="usertitle" size="25" maxlength="{$mybb->settings[''customtitlemaxlength'']}" value="{$newtitle}" /></td>\n										</tr>\n										<tr>\n											<td><span class="smalltext"><input type="checkbox" name="reverttitle" id="reverttitle" class="checkbox" /> {$lang->revert_usertitle}</span></td>\n										</tr>\n									</table>\n								</fieldset>\n								<br />\n								<fieldset class="trow2">\n									<legend><strong>{$lang->additional_contact_details}</strong></legend>\n									<table cellspacing="0" cellpadding="{$theme[''tablespace'']}">\n										<tr>\n											<td><span class="smalltext">{$lang->icq_number}</span></td>\n										</tr>\n										<tr>\n											<td><input type="text" class="textbox" name="icq" size="25" value="{$mybb->input[''icq'']}" /></td>\n										</tr>\n										<tr>\n											<td><span class="smalltext">{$lang->aim_screenname}</span></td>\n										</tr>\n										<tr>\n											<td><input type="text" class="textbox" name="aim" size="25" value="{$mybb->input[''aim'']}" /></td>\n										</tr>\n										<tr>\n											<td><span class="smalltext">{$lang->msn}</span></td>\n										</tr>\n										<tr>\n											<td><input type="text" class="textbox" name="msn" size="25" value="{$mybb->input[''msn'']}" /></td>\n										</tr>\n										<tr>\n											<td><span class="smalltext">{$lang->yahoo_id}</span></td>\n										</tr>\n										<tr>\n											<td><input type="text" class="textbox" name="yahoo" size="25" value="{$mybb->input[''yahoo'']}" /></td>\n										</tr>\n									</table>\n								</fieldset>\n							</td>\n						</tr>\n<tr>\n							<td colspan="2" class="trow1" valign="top">\n								<fieldset class="trow1">\n									<legend><strong>{$lang->signature}</strong></legend>\n									<table cellspacing="0" cellpadding="{$theme[''tablespace'']}">\n<tr>\n<td class="trow1" width="80%">\n<textarea rows="15" cols="70" id="signature" name="signature">{$user[''signature'']}</textarea>\n{$codebuttons}\n</td>\n</tr>\n									</table>\n								</fieldset>\n												</td>\n			</tr>\n					</table>\n					<br />\n					<div align="center">\n						<input type="hidden" name="action" value="do_editprofile" />\n						<input type="hidden" name="uid" value="{$user[''uid'']}" />\n						<input type="submit" class="button" value="{$lang->update_profile}" />\n					</div>\n				</td>\n			</tr>\n		</table>\n	</form>\n	{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (497, 'modcp_finduser', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->find_users}</title>\n{$headerinclude}\n</head>\n<body>\n	{$header}\n	<form action="modcp.php?action=finduser" method="post">\n		<table width="100%" border="0" align="center">\n			<tr>\n				{$modcp_nav}\n				<td valign="top">\n					<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n						<tr>\n							<td class="thead" colspan="5"><strong>{$lang->users}</strong></td>\n						</tr>\n						<tr>\n							<td class="tcat" width="30%"><span class="smalltext"><strong>{$lang->username}</strong></span></td>\n							<td class="tcat" align="center" width="15%"><span class="smalltext"><strong>{$lang->usergroup}</strong></span></td>\n							<td class="tcat" align="center" width="15%"><span class="smalltext"><strong>{$lang->regdate}</strong></span></td>\n							<td class="tcat" align="center" width="15%"><span class="smalltext"><strong>{$lang->lastvisit}</strong></span></td>\n							<td class="tcat" align="right" width="10%"><span class="smalltext"><strong>{$lang->postnum}</strong></span></td>\n						</tr>\n						{$users}\n					</table>\n					{$multipage}\n					<br />\n					<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n						<tr>\n							<td class="thead" colspan="2"><strong>{$lang->find_users}</strong></td>\n						</tr>\n						<tr>\n							<td class="trow1" width="25%"><strong>{$lang->username_contains}</strong></td>\n							<td class="trow1" width="75%"><input type="text" name="username" id="username" value="{$mybb->input[''username'']}" class="textbox" /></td>\n						</tr>\n						<tr>\n							<td class="trow1" width="25%"><strong>{$lang->sort_by}</strong></td>\n							<td class="trow1" width="75%">\n								<select name="sortby">\n									<option value="username"{$sortbysel[''username'']}>{$lang->username}</option>\n									<option value="regdate"{$sortbysel[''regdate'']}>{$lang->regdate}</option>\n									<option value="lastvisit"{$sortbysel[''lastvisit'']}>{$lang->lastvisit}</option>\n									<option value="postnum"{$sortbysel[''postnum'']}>{$lang->postnum}</option>\n								</select>\n								{$lang->in}\n								<select name="order">\n									<option value="asc"{$ordersel[''asc'']}>{$lang->asc}</option>\n									<option value="desc"{$ordersel[''desc'']}>{$lang->desc}</option>\n								</select>\n								{$lang->order}\n							</td>\n						</tr>\n					</table>\n					<br />\n					<div align="center">\n						<input type="submit" class="button" value="{$lang->find_users}" />\n					</div>\n				</td>\n			</tr>\n		</table>\n	</form>\n{$footer}\n<script type="text/javascript" src="jscripts/autocomplete.js?ver=1400"></script>\n<script type="text/javascript">\n<!--\n	if(use_xmlhttprequest == "1")\n	{\n		new autoComplete("username", "xmlhttp.php?action=get_users", {valueSpan: "username"});\n	}\n// -->\n</script>\n</body>\n</html>', -2, '1405', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (498, 'modcp_finduser_user', '						<tr>\n							<td class="{$alt_row}"><a href="modcp.php?action=editprofile&amp;uid={$user[''uid'']}">{$user[''username'']}</a></td>\n							<td class="{$alt_row}" align="center">{$usergroup}</td>\n							<td class="{$alt_row}" align="center">{$regdate}, {$regtime}</td>\n							<td class="{$alt_row}" align="center">{$lastdate}, {$lasttime}</td>\n							<td class="{$alt_row}" align="center">{$user[''postnum'']}</td>\n						</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (499, 'modcp_finduser_noresults', '						<tr>\n							<td class="trow1" align="center" colspan="5">{$lang->no_user_results}</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (500, 'modcp_banning', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->ban_banned}</title>\n{$headerinclude}\n</head>\n<body>\n	{$header}\n	<table width="100%" border="0" align="center">\n		<tr>\n			{$modcp_nav}\n			<td valign="top">\n				<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n					<tr>\n						<td class="thead" colspan="4">\n							<div class="float_right"><a href="modcp.php?action=banuser">{$lang->ban_user}</a></div>\n						<strong>{$lang->ban_banned}</strong></td>\n					</tr>\n					<tr>\n						<td class="tcat" width="25%"><span class="smalltext"><strong>{$lang->username}</strong></span></td>\n						<td class="tcat" align="center" width="30%"><span class="smalltext"><strong>{$lang->reason}</strong></span></td>\n						<td class="tcat" align="center" width="25%"><span class="smalltext"><strong>{$lang->ban_length}</strong></span></td>\n						<td class="tcat" align="center" width="20%"><span class="smalltext"><strong>{$lang->ban_bannedby}</strong></span></td>\n					</tr>\n					{$bannedusers}\n				</table>\n				{$multipage}\n			</td>\n		</tr>\n	</table>\n	{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (501, 'modcp_banuser', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->ban_user}</title>\n{$headerinclude}\n</head>\n<body>\n	{$header}\n	<table width="100%" border="0" align="center">\n		<tr>\n			{$modcp_nav}\n			<td valign="top">\n				{$errors}\n				<form action="modcp.php" method="post">\n					<input type="hidden" name="action" value="do_banuser" />\n					<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n					<input type="hidden" name="uid" value="{$uid}" />\n						<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n							<tr>\n								<td class="thead" colspan="2">\n									{$lift_link}\n									<strong>{$lang->ban_user}</strong>\n								</td>\n							</tr>\n							{$banuser_username}\n							<tr>\n								<td class="trow2" width="25%"><strong>{$lang->ban_reason}</strong></td>\n								<td class="trow2" width="75%"><input type="text" class="textbox" name="banreason" value="{$banreason}" size="25" /></td>\n							</tr>\n							<tr>\n								<td class="trow1" width="25%"><strong>{$lang->ban_movegroup}</strong></td>\n								<td class="trow1" width="75%"><select name="usergroup">{$bangroups}</select>\n							</td>\n							</tr>\n							<tr>\n								<td class="trow2" width="25%"><strong>{$lang->ban_liftafter}</strong></td>\n								<td class="trow2" width="75%"><select name="liftafter">{$liftlist}</select></td>\n							</tr>\n						</table>\n					<br />\n					<div align="center">\n						<input type="submit" class="button" name="updateban" value="{$lang->ban}" />\n					</div>\n				</form>\n			</td>\n		</tr>\n	</table>\n	{$footer}\n<script type="text/javascript" src="jscripts/autocomplete.js?ver=1400"></script>\n<script type="text/javascript">\n<!--\n	if(use_xmlhttprequest == "1")\n	{\n		new autoComplete("username", "xmlhttp.php?action=get_users", {valueSpan: "username"});\n	}\n// -->\n</script>\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (502, 'modcp_banuser_addusername', '<tr>\n	<td class="trow1" width="25%"><strong>{$lang->ban_username}</strong></td>\n	<td class="trow1" width="75%"><input type="text" class="textbox" name="username" id="username" value="{$username}" size="25" /></td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (503, 'modcp_banuser_editusername', '<tr>\n	<td class="trow1" width="25%"><strong>{$lang->ban_username}</strong></td>\n	<td class="trow1" width="75%">{$username}</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (504, 'modcp_banning_ban', '<tr>\n	<td class="{$trow}">{$profile_link}{$edit_link}</td>\n	<td class="{$trow}" align="center">{$banned[''reason'']}</td>\n	<td class="{$trow}" align="center">{$banlength}<br /><span class="smalltext">{$timeremaining}</span></td>\n	<td class="{$trow}" align="center">{$admin_profile}</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (505, 'modcp_banning_nobanned', '<tr>\n	<td class="trow1" align="center" colspan="4">{$lang->no_banned}</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (506, 'modcp_modqueue_empty', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->mod_queue}</title>\n{$headerinclude}\n</head>\n<body>\n	{$header}\n	<table width="100%" border="0" align="center">\n		<tr>\n			{$modcp_nav}\n			<td valign="top">\n				<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n					<tr>\n						<td class="thead"><strong>{$lang->mod_queue}</strong></td>\n					</tr>\n					<tr>\n						<td class="trow1" align="center">{$lang->mod_queue_empty}</td>\n					</tr>\n				</table>\n			</td>\n		</tr>\n	</table>\n{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (507, 'modcp_modqueue_masscontrols', '<ul class="modqueue_mass">\n	<li><a href="#" class="mass_ignore" onclick="$$(''input.radio_ignore'').each(function(e) { e.checked = true; }); return false;">{$lang->mark_all_ignored}</a></li>\n	<li><a href="#" class="mass_delete" onclick="$$(''input.radio_delete'').each(function(e) { e.checked = true; }); return false;">{$lang->mark_all_deletion}</a></li>\n	<li><a href="#" class="mass_approve" onclick="$$(''input.radio_approve'').each(function(e) { e.checked = true; }); return false;">{$lang->mark_all_approved}</a></li>\n</ul>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (508, 'modcp_modqueue_threads_empty', '<tr>\n		<td class="trow1" align="center" colspan="3">{$lang->mod_queue_threads_empty}</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (509, 'modcp_modqueue_posts_empty', '<tr>\n		<td class="trow1" align="center" colspan="3">{$lang->mod_queue_posts_empty}</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (510, 'modcp_modqueue_attachments_empty', '<tr>\n		<td class="trow1" align="center" colspan="6">{$lang->mod_queue_attachments_empty}</td>\n</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (511, 'modcp_lastattachment', '<span class="smalltext">\n<a href="{$attachment[''link'']}#pid{$attachment[''pid'']}"><strong>{$attachment[''filename'']}</strong></a>\n<br />{$attachment[''date'']} {$attachment[''time'']}<br />{$lang->by} {$attachment[''profilelink'']}</span>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (512, 'modcp_lastthread', '<span class="smalltext">\n<a href="{$thread[''link'']}" title="{$thread[''fullsubject'']}"><strong>{$thread[''subject'']}</strong></a>\n<br />{$thread[''date'']} {$thread[''time'']}<br />{$lang->by} {$thread[''profilelink'']}</span>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (513, 'modcp_lastpost', '<span class="smalltext">\n<a href="{$post[''link'']}#pid{$post[''pid'']}" title="{$post[''fullsubject'']}"><strong>{$post[''subject'']}</strong></a>\n<br />{$post[''date'']} {$post[''time'']}<br />{$lang->by} {$post[''profilelink'']}</span>\n', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (514, 'modcp_warninglogs', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->warning_logs}</title>\n{$headerinclude}\n</head>\n<body>\n	{$header}\n	<table width="100%" border="0" align="center">\n		<tr>\n			{$modcp_nav}\n			<td valign="top">\n				<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n					<tr>\n						<td class="thead" colspan="6"><strong>{$lang->warning_logs}</strong></td>\n					</tr>\n					<tr>\n						<td class="tcat" width="15%"><strong>{$lang->warned_user}</strong></td>\n						<td class="tcat" width="25%"><strong>{$lang->warning}</strong></td>\n						<td class="tcat" width="20%" align="center"><strong>{$lang->date_issued}</strong></td>\n						<td class="tcat" width="20%" align="center"><strong>{$lang->expires}</strong></td>\n						<td class="tcat" width="15%"><strong>{$lang->issued_by}</strong></td>\n						<td class="tcat" width="1%" align="center"><strong>{$lang->details}</strong></td>\n					</tr>\n					{$warning_list}\n				</table>\n				{$multipage}\n				<br />\n				<form action="modcp.php" method="get">\n					<input type="hidden" name="action" value="warninglogs" />\n					<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n						<tr>\n							<td class="thead" colspan="2"><strong>{$lang->filter_warning_logs}</strong></td>\n						</tr>\n						<tr>\n							<td class="trow1" width="25%"><strong>{$lang->filter_warned_user}</strong></td>\n							<td class="trow1" width="75%"><input type="text" name="filter[username]" id="username" value="{$mybb->input[''filter''][''username'']}" class="textbox" /></td>\n						</tr>\n						<tr>\n							<td class="trow2" width="25%"><strong>{$lang->filter_issued_by}</strong></td>\n							<td class="trow2" width="75%"><input type="text" name="filter[mod_username]" value="{$mybb->input[''filter''][''mod_username'']}" class="textbox" /></td>\n						</tr>\n						<tr>\n							<td class="trow1" width="25%"><strong>{$lang->filter_reason}</strong></td>\n							<td class="trow1" width="75%"><input type="text" name="filter[reason]" value="{$mybb->input[''filter''][''reason'']}" class="textbox" /></td>\n						</tr>\n						<tr>\n							<td class="trow2" width="25%"><strong>{$lang->sort_by}</strong></td>\n							<td class="trow2" width="75%">\n								<select name="filter[sortby]">\n									<option value="username"{$sortbysel[''username'']}>{$lang->username}</option>\n									<option value="issuedby"{$sortbysel[''issuedby'']}>{$lang->issued_by}</option>\n									<option value="dateline"{$sortbysel[''dateline'']}>{$lang->issued_date}</option>\n									<option value="expires"{$sortbysel[''expires'']}>{$lang->expiry_date}</option>\n								</select>\n								{$lang->in}\n								<select name="filter[order]">\n									<option value="asc"{$ordersel[''asc'']}>{$lang->asc}</option>\n									<option value="desc"{$ordersel[''desc'']}>{$lang->desc}</option>\n								</select>\n								{$lang->order}\n							</td>\n						</tr>\n						<tr>\n							<td class="trow1" width="25%"><strong>{$lang->per_page}</strong></td>\n							<td class="trow1" width="75%"><input type="text" name="filter[per_page]" value="{$per_page}" class="textbox" /></td>\n						</tr>\n					</table>\n					<br />\n					<div align="center">\n						<input type="submit" class="button" value="{$lang->filter_warning_logs}" />\n					</div>\n				</form>\n			</td>\n		</tr>\n	</table>\n	{$footer}\n<script type="text/javascript" src="jscripts/autocomplete.js?ver=1400"></script>\n<script type="text/javascript">\n<!--\n	if(use_xmlhttprequest == "1")\n	{\n		new autoComplete("username", "xmlhttp.php?action=get_users", {valueSpan: "username"});\n	}\n// -->\n</script>\n</body>\n</html>', -2, '1405', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (515, 'modcp_warninglogs_nologs', '					<tr>\n						<td class="trow1" colspan="6">{$lang->no_warning_logs}</td>\n					</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (516, 'modcp_warninglogs_warning', '					<tr>\n						<td class="{$trow}">{$username_link}</td>\n						<td class="{$trow}">{$title} ({$points})</td>\n						<td class="{$trow}" align="center">{$issued_date}</td>\n						<td class="{$trow}" align="center">{$expire_date}{$revoked_text}</td>\n						<td class="{$trow}">{$mod_username_link}</td>\n						<td class="{$trow}" align="center"><a href="warnings.php?action=view&amp;wid={$row[''wid'']}">{$lang->view}</a></td>\n					</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (517, 'modcp_warninglogs_warning_revoked', '<br /><span class="smalltext"><strong>{$lang->revoked}</strong> {$revoked_date}</span>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (518, 'modcp_announcements_forum', '					<tr>\n						<td class="{$trow}"><div style="padding-left: {$padding}px;"><strong>{$forum[''name'']}</strong></div></td>\n						<td class="{$trow}" colspan="2" align="center"><a href="modcp.php?action=new_announcement&amp;fid={$forum[''fid'']}">{$lang->add_announcement}</a></td>\n					</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (519, 'modcp_announcements_forum_nomod', '					<tr>\n						<td class="{$trow}"><div style="padding-left: {$padding}px;"><strong>{$forum[''name'']}</strong></div></td>\n						<td class="{$trow}" colspan="2" align="center">&nbsp;</td>\n					</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (520, 'modcp_announcements_announcement', '					<tr>\n						<td class="{$trow}"><div style="padding-left: {$padding}px;">{$icon}<a href="modcp.php?action=edit_announcement&amp;aid={$aid}">{$subject}</a></div></td>\n						<td class="{$trow}" align="center"><a href="modcp.php?action=edit_announcement&amp;aid={$aid}">{$lang->edit}</a></td>\n						<td class="{$trow}" align="center"><a href="modcp.php?action=delete_announcement&amp;aid={$aid}">{$lang->delete}</a></td>\n					</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (521, 'modcp_no_announcements_forum', '					<tr>\n						<td class="trow1" colspan="3">{$lang->no_forum_announcements}</td>\n					</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (522, 'modcp_no_announcements_global', '					<tr>\n						<td class="trow1" colspan="3">{$lang->no_global_announcements}</td>\n					</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (523, 'modcp_announcements_announcement_global', '					<tr>\n						<td class="{$trow}">{$icon}<a href="modcp.php?action=edit_announcement&amp;aid={$aid}">{$subject}</a></td>\n						<td class="{$trow}" align="center"><a href="modcp.php?action=edit_announcement&amp;aid={$aid}">{$lang->edit}</a></td>\n						<td class="{$trow}" align="center"><a href="modcp.php?action=delete_announcement&amp;aid={$aid}">{$lang->delete}</a></td>\n					</tr>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (524, 'modcp_announcements_global', '<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n					<tr>\n						<td class="thead" colspan="3"><div class="float_right"><a href="modcp.php?action=new_announcement&amp;fid=-1">{$lang->add_global_announcement}</a></div><strong>{$lang->global_announcements}</strong></td>\n					</tr>\n					<tr>\n						<td class="tcat"><strong>{$lang->announcement}</strong></td>\n						<td class="tcat" width="200" colspan="2" align="center"><strong>{$lang->controls}</strong></td>\n					</tr>\n					{$announcements_global}\n				</table>\n				<br />', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (525, 'modcp_announcements', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->manage_announcement}</title>\n{$headerinclude}\n</head>\n<body>\n	{$header}\n	<table width="100%" border="0" align="center">\n		<tr>\n			{$modcp_nav}\n			<td valign="top">\n				{$announcements_global}\n				<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n					<tr>\n						<td class="thead" colspan="3"><strong>{$lang->forum_announcements}</strong></td>\n					</tr>\n					<tr>\n						<td class="tcat"><strong>{$lang->announcement}</strong></td>\n						<td class="tcat" width="200" colspan="2" align="center"><strong>{$lang->controls}</strong></td>\n					</tr>\n					{$announcements_forum}\n				</table>\n			</td>\n		</tr>\n	</table>\n	{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (526, 'modcp_announcements_new', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->manage_announcement}</title>\n{$headerinclude}\n</head>\n<body>\n	{$header}\n	<form action="modcp.php" method="post" enctype="multipart/form-data">\n	<input type="hidden" name="action" value="do_new_announcement" />\n	<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n	<input type="hidden" name="fid" value="{$announcement_fid}" />\n		<table width="100%" border="0" align="center">\n			<tr>\n				{$modcp_nav}\n				<td valign="top">\n					{$errors}\n					<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n						<tr>\n							<td class="thead" colspan="6"><strong>{$lang->add_announcement}</strong></td>\n						</tr>\n						<tr>\n							<td class="trow1" valign="top" width="25%"><strong>{$lang->title}</strong></td>\n							<td class="trow1" valign="top" width="75%"><input type="text" class="textbox" name="title" size="40" value="{$title}" /></td>\n						</tr>\n						<tr>\n							<td class="trow1" colspan="1" valign="top" width="25%"><strong>{$lang->start_date}</strong></td>\n							<td class="trow1" valign="top"  width="75%">\n								<select name="starttime_day">\n								{$startdateday}\n								</select>\n								&nbsp;\n								<select name="starttime_month">\n								{$startdatemonth}\n								</select>\n								&nbsp;\n								<input type="text" name="starttime_year" value="{$startdateyear}" size="4" maxlength="4"/>\n								 - {$lang->time} <input type="text" name="starttime_time" value="{$starttime_time}" size="10" />\n							</td>\n						</tr>\n						<tr>\n							<td class="trow1" colspan="1" valign="top" width="25%"><strong>{$lang->end_date}</strong></td>\n							<td class="trow1" valign="top"  width="75%">\n								<input type="radio" name="endtime_type" value="1"{$end_type_sel[''finite'']} />\n								<select name="endtime_day">\n								{$enddateday}\n								</select>\n								&nbsp;\n								<select name="endtime_month">\n								{$enddatemonth}\n								</select>\n								&nbsp;\n								<input type="text" name="endtime_year" value="{$enddateyear}" size="4" maxlength="4"/>\n								 - {$lang->time} <input type="text" name="endtime_time" value="{$endtime_time}" size="10" />\n								<br /><input type="radio" name="endtime_type" value="2"{$end_type_sel[''infinite'']} /> {$lang->never}\n							</td>\n						</tr>\n						<tr>\n							<td class="trow1" valign="top" width="25%"><strong>{$lang->announcement}</strong><br />{$smilieinserter}</td>\n							<td class="trow1" valign="top" width="75%"><textarea id="message" name="message" rows="20" cols="70">{$message}</textarea>{$codebuttons}</td>\n						</tr>\n						<tr>\n							<td class="trow1" valign="top" width="25%"><strong>{$lang->allow_html}</strong></td>\n							<td class="trow1" valign="top" width="75%"><label><input type="radio" name="allowhtml" value="1"{$html_sel[''yes'']} />&nbsp;{$lang->yes}</label> &nbsp;&nbsp;<label><input type="radio" name="allowhtml" value="0"{$html_sel[''no'']} />&nbsp;{$lang->no}</label></td>\n						</tr>\n						<tr>\n							<td class="trow1" valign="top" width="25%"><strong>{$lang->allow_mycode}</strong></td>\n							<td class="trow1" valign="top" width="75%"><label><input type="radio" name="allowmycode" value="1"{$mycode_sel[''yes'']} />&nbsp;{$lang->yes}</label> &nbsp;&nbsp;<label><input type="radio" name="allowmycode" value="0"{$mycode_sel[''no'']} />&nbsp;{$lang->no}</label></td>\n						</tr>\n						<tr>\n							<td class="trow1" valign="top" width="25%"><strong>{$lang->allow_smilies}</strong></td>\n							<td class="trow1" valign="top" width="75%"><label><input type="radio" name="allowsmilies" value="1"{$smilies_sel[''yes'']} />&nbsp;{$lang->yes}</label> &nbsp;&nbsp;<label><input type="radio" name="allowsmilies" value="0"{$smilies_sel[''no'']} />&nbsp;{$lang->no}</label></td>\n						</tr>\n					</table>\n					<br />\n					<div align="center">\n						<input type="submit" class="button" name="Add Announcement" value="{$lang->add_announcement}" />&nbsp;&nbsp;\n						<input type="reset" class="button" name="Reset" value="{$lang->reset}" />\n					</div>\n				</td>\n			</tr>\n		</table>\n	</form>\n	{$footer}\n</body>\n</html>', -2, '1405', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (527, 'modcp_announcements_edit', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->manage_announcement}</title>\n{$headerinclude}\n</head>\n<body>\n	{$header}\n	<form action="modcp.php" method="post" enctype="multipart/form-data">\n	<input type="hidden" name="action" value="do_edit_announcement" />\n	<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n	<input type="hidden" name="fid" value="{$announcement[''fid'']}" />\n	<input type="hidden" name="aid" value="{$aid}" />\n		<table width="100%" border="0" align="center">\n			<tr>\n				{$modcp_nav}\n				<td valign="top">\n					{$errors}\n					<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n						<tr>\n							<td class="thead" colspan="6"><strong>{$lang->edit_announcement}</strong></td>\n						</tr>\n						<tr>\n							<td class="trow1" valign="top" width="25%"><strong>{$lang->title}</strong></td>\n							<td class="trow1" valign="top" width="75%"><input type="text" class="textbox" name="title" size="40" value="{$title}" /></td>\n						</tr>\n						<tr>\n							<td class="trow1" colspan="1" valign="top" width="25%"><strong>{$lang->start_date}</strong></td>\n							<td class="trow1" valign="top"  width="75%">\n								<select name="starttime_day">\n								{$startdateday}\n								</select>\n								&nbsp;\n								<select name="starttime_month">\n								{$startdatemonth}\n								</select>\n								&nbsp;\n								<input type="text" name="starttime_year" value="{$startdateyear}" size="4" maxlength="4"/>\n								 - {$lang->time} <input type="text" name="starttime_time" value="{$starttime_time}" size="10" />\n							</td>\n						</tr>\n						<tr>\n							<td class="trow1" colspan="1" valign="top" width="25%"><strong>{$lang->end_date}</strong></td>\n							<td class="trow1" valign="top"  width="75%">\n								<input type="radio" name="endtime_type" value="1"{$end_type_sel[''finite'']} />\n								<select name="endtime_day">\n								{$enddateday}\n								</select>\n								&nbsp;\n								<select name="endtime_month">\n								{$enddatemonth}\n								</select>\n								&nbsp;\n								<input type="text" name="endtime_year" value="{$enddateyear}" size="4" maxlength="4"/>\n								 - {$lang->time} <input type="text" name="endtime_time" value="{$endtime_time}" size="10" />\n								<br /><input type="radio" name="endtime_type" value="2"{$end_type_sel[''infinite'']} /> {$lang->never}\n							</td>\n						</tr>\n						<tr>\n							<td class="trow1" valign="top" width="25%"><strong>{$lang->announcement}</strong><br />{$smilieinserter}</td>\n							<td class="trow1" valign="top" width="75%"><textarea id="message" name="message" rows="20" cols="70">{$message}</textarea>{$codebuttons}</td>\n						</tr>\n						<tr>\n							<td class="trow1" valign="top" width="25%"><strong>{$lang->allow_html}</strong></td>\n							<td class="trow1" valign="top" width="75%"><label><input type="radio" name="allowhtml" value="1"{$html_sel[''yes'']} />&nbsp;{$lang->yes}</label> &nbsp;&nbsp;<label><input type="radio" name="allowhtml" value="0"{$html_sel[''no'']} />&nbsp;{$lang->no}</label></td>\n						</tr>\n						<tr>\n							<td class="trow1" valign="top" width="25%"><strong>{$lang->allow_mycode}</strong></td>\n							<td class="trow1" valign="top" width="75%"><label><input type="radio" name="allowmycode" value="1"{$mycode_sel[''yes'']} />&nbsp;{$lang->yes}</label> &nbsp;&nbsp;<label><input type="radio" name="allowmycode" value="0"{$mycode_sel[''no'']} />&nbsp;{$lang->no}</label></td>\n						</tr>\n						<tr>\n							<td class="trow1" valign="top" width="25%"><strong>{$lang->allow_smilies}</strong></td>\n							<td class="trow1" valign="top" width="75%"><label><input type="radio" name="allowsmilies" value="1"{$smilies_sel[''yes'']} />&nbsp;{$lang->yes}</label> &nbsp;&nbsp;<label><input type="radio" name="allowsmilies" value="0"{$smilies_sel[''no'']} />&nbsp;{$lang->no}</label></td>\n						</tr>\n					</table>\n					<br />\n					<div align="center">\n						<input type="submit" class="button" name="Edit Announcement" value="{$lang->edit_announcement}" />&nbsp;&nbsp;\n						<input type="reset" class="button" name="Reset" value="{$lang->reset}" />\n					</div>\n				</td>\n			</tr>\n		</table>\n	</form>\n	{$footer}\n</body>\n</html>', -2, '1405', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (528, 'modcp_announcements_delete', '<html>\n<head>\n<title>{$mybb->settings[''bbname'']} - {$lang->delete_announcement}</title>\n{$headerinclude}\n</head>\n<body>\n	{$header}\n	<form action="modcp.php" method="post" enctype="multipart/form-data">\n	<input type="hidden" name="action" value="do_delete_announcement" />\n	<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n	<input type="hidden" name="fid" value="{$announcement_fid}" />\n		<table width="100%" border="0" align="center">\n			<tr>\n				{$modcp_nav}\n				<td valign="top">\n					<table border="0" cellspacing="{$theme[''borderwidth'']}" cellpadding="{$theme[''tablespace'']}" class="tborder">\n					<tr>\n					<td class="thead" colspan="2"><strong>{$announcement[''subject'']} - {$lang->delete_announcement}</strong></td>\n					</tr>\n					<tr>\n					<td class="trow1" colspan="2" align="center">{$lang->confirm_delete_announcement}</td>\n					</tr>\n					</table>\n					<br />\n					<div align="center"><input type="submit" class="button" name="submit" value="{$lang->delete_announcement}" /></div>\n					<input type="hidden" name="aid" value="{$aid}" />\n					</form>\n				</td>\n			</tr>\n		</table>\n	</form>\n	{$footer}\n</body>\n</html>', -2, '1400', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (529, 'search_orderarrow', '<span class="smalltext">[<a href="{$sorturl}&amp;sortby={$sortby}&amp;order={$oppsortnext}">{$oppsort}</a>]</span>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (530, 'search_results_posts_inlinecheck', '<td class="{$bgcolor}" align="center" style="white-space: nowrap"><input type="checkbox" class="checkbox" name="inlinemod_{$post[''pid'']}" id="inlinemod_{$post[''pid'']}" value="1" style="vertical-align: middle;" {$inlinecheck}  /></td>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (531, 'search_results_posts_nocheck', '<td class="{$bgcolor}" align="center" style="white-space: nowrap">&nbsp;</td>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (532, 'search_results_threads_inlinecheck', '<td class="{$bgcolor}" align="center" style="white-space: nowrap"><input type="checkbox" class="checkbox" name="inlinemod_{$thread[''tid'']}" id="inlinemod_{$thread[''tid'']}" value="1" style="vertical-align: middle;" {$inlinecheck}  /></td>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (533, 'search_results_threads_nocheck', '<td class="{$bgcolor}" align="center" style="white-space: nowrap">&nbsp;</td>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (534, 'search_results_inlinemodcol', '<td class="tcat" align="center">&nbsp;</td>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (535, 'search_results_posts_inlinemoderation_custom', '<optgroup label="{$lang->custom_mod_tools}">{$customposttools}</optgroup>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (536, 'search_results_posts_inlinemoderation_custom_tool', '<option value="{$tool[''tid'']}">{$tool[''name'']}</option>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (537, 'search_results_posts_inlinemoderation', '<script type="text/javascript" src="jscripts/inline_moderation.js?ver=1400"></script>\n<form action="moderation.php" method="post" style="margin-top: 0; margin-bottom: 0;">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<input type="hidden" name="tid" value="0" />\n<input type="hidden" name="searchid" value="{$sid}" />\n<input type="hidden" name="modtype" value="inlinepost" />\n<span class="smalltext"><strong>{$lang->inline_post_moderation}</strong></span>\n<select name="action">\n<optgroup label="{$lang->standard_mod_tools}">\n	<option value="multideleteposts">{$lang->inline_delete_posts}</option>\n	<option value="multiapproveposts">{$lang->inline_approve_posts}</option>\n	<option value="multiunapproveposts">{$lang->inline_unapprove_posts}</option>\n</optgroup>\n{$customposttools}\n</select>\n<input type="submit" class="button" name="go" value="{$lang->go} ({$inlinecount})" id="inline_go" />&nbsp;\n<input type="button" class="button" onclick="javascript:inlineModeration.clearChecked();" value="{$lang->clear}" />\n<input type="hidden" name="url" value="{$return_url}" />\n<input type="hidden" name="inlinetype" value="search" />\n</form>\n<script type="text/javascript">\n<!--\n	var go_text = "{$lang->inline_go}";\n	var inlineType = "search";\n	var inlineId = "{$sid}";\n// -->\n</script><br />', -2, '1405', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (538, 'search_results_threads_inlinemoderation_custom', '<optgroup label="{$lang->custom_mod_tools}">{$customthreadtools}</optgroup>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (539, 'search_results_threads_inlinemoderation_custom_tool', '<option value="{$tool[''tid'']}">{$tool[''name'']}</option>', -2, '120', '', 1292184690);
INSERT INTO `mybb_templates` VALUES (540, 'search_results_threads_inlinemoderation', '<script type="text/javascript" src="jscripts/inline_moderation.js?ver=1400"></script>\n		<form action="moderation.php" method="post">\n<input type="hidden" name="my_post_key" value="{$mybb->post_code}" />\n<input type="hidden" name="fid" value="0" />\n<input type="hidden" name="searchid" value="{$sid}" />\n<input type="hidden" name="modtype" value="inlinethread" />\n<span class="smalltext"><strong>{$lang->inline_thread_moderation}</strong></span>\n<select name="action">\n	<optgroup label="{$lang->standard_mod_tools}">\n		<option value="multiclosethreads">{$lang->close_threads}</option>\n		<option value="multiopenthreads">{$lang->open_threads}</option>\n		<option value="multistickthreads">{$lang->stick_threads}</option>\n		<option value="multiunstickthreads">{$lang->unstick_threads}</option>\n		<option value="multideletethreads">{$lang->delete_threads}</option>\n		<option value="multimovethreads">{$lang->move_threads}</option>\n		<option value="multiapprovethreads">{$lang->approve_threads}</option>\n		<option value="multiunapprovethreads">{$lang->unapprove_threads}</option>\n	</optgroup>\n	{$customthreadtools}\n</select>\n<input type="submit" class="button" name="go" value="{$lang->inline_go} ({$inlinecount})" id="inline_go" />&nbsp;\n<input type="button" onclick="javascript:inlineModeration.clearChecked();" value="{$lang->clear}" class="button" />\n<input type="hidden" name="url" value="{$return_url}" />\n<input type="hidden" name="inlinetype" value="search" />\n</form>\n<script type="text/javascript">\n<!--\n	var go_text = "{$lang->inline_go}";\n	var inlineType = "search";\n	var inlineId = ''{$sid}'';\n// -->\n</script>\n<br />', -2, '1400', '', 1292184690);

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_templatesets`
-- 

CREATE TABLE `mybb_templatesets` (
  `sid` smallint(5) unsigned NOT NULL auto_increment,
  `title` varchar(120) NOT NULL default '',
  PRIMARY KEY  (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `mybb_templatesets`
-- 

INSERT INTO `mybb_templatesets` VALUES (1, 'Default Templates');

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_themes`
-- 

CREATE TABLE `mybb_themes` (
  `tid` smallint(5) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `pid` smallint(5) unsigned NOT NULL default '0',
  `def` smallint(1) NOT NULL default '0',
  `properties` text NOT NULL,
  `stylesheets` text NOT NULL,
  `allowedgroups` text NOT NULL,
  PRIMARY KEY  (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `mybb_themes`
-- 

INSERT INTO `mybb_themes` VALUES (1, 'MyBB Master Style', 0, 0, 'a:6:{s:11:"templateset";i:-2;s:6:"imgdir";s:6:"images";s:4:"logo";s:15:"images/logo.gif";s:10:"tablespace";s:1:"4";s:11:"borderwidth";s:1:"1";s:11:"editortheme";s:7:"default";}', 'a:7:{s:6:"global";a:1:{s:6:"global";a:1:{i:0;s:30:"cache/themes/theme1/global.css";}}s:10:"usercp.php";a:1:{s:6:"global";a:1:{i:0;s:30:"cache/themes/theme1/usercp.css";}}s:11:"usercp2.php";a:1:{s:6:"global";a:1:{i:0;s:30:"cache/themes/theme1/usercp.css";}}s:11:"private.php";a:1:{s:6:"global";a:1:{i:0;s:30:"cache/themes/theme1/usercp.css";}}s:9:"modcp.php";a:1:{s:6:"global";a:1:{i:0;s:29:"cache/themes/theme1/modcp.css";}}s:16:"forumdisplay.php";a:1:{s:6:"global";a:1:{i:0;s:36:"cache/themes/theme1/star_ratings.css";}}s:14:"showthread.php";a:1:{s:6:"global";a:2:{i:0;s:36:"cache/themes/theme1/star_ratings.css";i:1;s:34:"cache/themes/theme1/showthread.css";}}}', '');
INSERT INTO `mybb_themes` VALUES (2, 'Default', 1, 1, 'a:7:{s:11:"templateset";i:1;s:9:"inherited";a:5:{s:6:"imgdir";i:1;s:4:"logo";i:1;s:10:"tablespace";i:1;s:11:"borderwidth";i:1;s:11:"editortheme";i:1;}s:6:"imgdir";s:6:"images";s:4:"logo";s:15:"images/logo.gif";s:10:"tablespace";s:1:"4";s:11:"borderwidth";s:1:"1";s:11:"editortheme";s:7:"default";}', 'a:8:{s:6:"global";a:1:{s:6:"global";a:1:{i:0;s:30:"cache/themes/theme2/global.css";}}s:10:"usercp.php";a:1:{s:6:"global";a:1:{i:0;s:20:"css.php?stylesheet=2";}}s:9:"inherited";a:6:{s:17:"usercp.php_global";a:1:{s:20:"css.php?stylesheet=2";s:1:"1";}s:18:"usercp2.php_global";a:1:{s:20:"css.php?stylesheet=2";s:1:"1";}s:18:"private.php_global";a:1:{s:20:"css.php?stylesheet=2";s:1:"1";}s:16:"modcp.php_global";a:1:{s:20:"css.php?stylesheet=3";s:1:"1";}s:23:"forumdisplay.php_global";a:1:{s:20:"css.php?stylesheet=4";s:1:"1";}s:21:"showthread.php_global";a:2:{s:20:"css.php?stylesheet=4";s:1:"1";s:20:"css.php?stylesheet=5";s:1:"1";}}s:11:"usercp2.php";a:1:{s:6:"global";a:1:{i:0;s:20:"css.php?stylesheet=2";}}s:11:"private.php";a:1:{s:6:"global";a:1:{i:0;s:20:"css.php?stylesheet=2";}}s:9:"modcp.php";a:1:{s:6:"global";a:1:{i:0;s:20:"css.php?stylesheet=3";}}s:16:"forumdisplay.php";a:1:{s:6:"global";a:1:{i:0;s:20:"css.php?stylesheet=4";}}s:14:"showthread.php";a:1:{s:6:"global";a:2:{i:0;s:20:"css.php?stylesheet=4";i:1;s:20:"css.php?stylesheet=5";}}}', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_themestylesheets`
-- 

CREATE TABLE `mybb_themestylesheets` (
  `sid` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(30) NOT NULL default '',
  `tid` int(10) unsigned NOT NULL default '0',
  `attachedto` text NOT NULL,
  `stylesheet` text NOT NULL,
  `cachefile` varchar(100) NOT NULL default '',
  `lastmodified` bigint(30) NOT NULL default '0',
  PRIMARY KEY  (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `mybb_themestylesheets`
-- 

INSERT INTO `mybb_themestylesheets` VALUES (1, 'global.css', 1, '', 'body {\n	background: #efefef;\n	color: #000;\n	font-family: Verdana, Arial, Sans-Serif;\n	font-size: 13px;\n	text-align: center; /* IE 5 fix */\n	line-height: 1.4;\n}\n\na:link {\n	color: #026CB1;\n	text-decoration: none;\n}\n\na:visited {\n	color: #026CB1;\n	text-decoration: none;\n}\n\na:hover, a:active {\n	color: #000;\n	text-decoration: underline;\n}\n\n#container {\n	width: 95%;\n	background: #fff;\n	border: 1px solid #e4e4e4;\n	color: #000000;\n	margin: auto auto;\n	padding: 20px;\n	text-align: left; /* IE 5 fix */\n}\n\n#content {\n	/* FIX: Make internet explorer wrap correctly */\n	width: auto !important;\n\n}\n\n.menu ul {\n	color: #000000;\n	font-weight: bold;\n	text-align: right;\n	padding: 4px;\n}\n\n.menu ul a:link {\n	color: #000000;\n	text-decoration: none;\n}\n\n.menu ul a:visited {\n	color: #000000;\n	text-decoration: none;\n}\n\n.menu ul a:hover, .menu ul a:active {\n	color: #4874a3;\n	text-decoration: none;\n}\n\n#panel {\n	background: #efefef;\n	color: #000000;\n	font-size: 11px;\n	border: 1px solid #D4D4D4;\n	padding: 8px;\n}\n\ntable {\n	color: #000000;\n	font-family: Verdana, Arial, Sans-Serif;\n	font-size: 13px;\n}\n\n.tborder {\n	background: #81A2C4;\n	width: 100%;\n	margin: auto auto;\n	border: 1px solid #0F5C8E;\n}\n\n.thead {\n	background: #026CB1 url(images/thead_bg.gif) top left repeat-x;\n	color: #ffffff;\n}\n\n.thead a:link {\n	color: #ffffff;\n	text-decoration: none;\n}\n\n.thead a:visited {\n	color: #ffffff;\n	text-decoration: none;\n}\n\n.thead a:hover, .thead a:active {\n	color: #ffffff;\n	text-decoration: underline;\n}\n\n.tcat {\n	background: #ADCBE7;\n	color: #000000;\n	font-size: 12px;\n}\n\n.tcat a:link {\n	color: #000000;\n}\n\n.tcat a:visited {\n	color: #000000;\n}\n\n.tcat a:hover, .tcat a:active {\n	color: #000000;\n}\n\n.trow1 {\n	background: #f5f5f5;\n}\n\n.trow2 {\n	background: #EFEFEF;\n}\n\n.trow_shaded {\n	background: #ffdde0;\n}\n\n.trow_selected td {\n	background: #FFFBD9;\n}\n\n.trow_sep {\n	background: #e5e5e5;\n	color: #000;\n	font-size: 12px;\n	font-weight: bold;\n}\n\n.tfoot {\n	background: #026CB1 url(images/thead_bg.gif) top left repeat-x;\n	color: #ffffff;\n}\n\n.tfoot a:link {\n	color: #ffffff;\n	text-decoration: none;\n}\n\n.tfoot a:visited {\n	color: #ffffff;\n	text-decoration: none;\n}\n\n.tfoot a:hover, .tfoot a:active {\n	color: #ffffff;\n	text-decoration: underline;\n}\n\n.bottommenu {\n	background: #efefef;\n	color: #000000;\n	border: 1px solid #4874a3;\n	padding: 10px;\n}\n\n.navigation {\n	color: #000000;\n	font-size: 13px;\n	font-weight: bold;\n}\n\n.navigation a:link {\n	text-decoration: none;\n}\n\n.navigation a:visited {\n	text-decoration: none;\n}\n\n.navigation a:hover, .navigation a:active {\n	text-decoration: none;\n}\n\n.navigation .active {\n	color: #000000;\n	font-size: small;\n	font-weight: bold;\n}\n\n.smalltext {\n	font-size: 11px;\n}\n\n.largetext {\n	font-size: 16px;\n	font-weight: bold;\n}\n\ninput.textbox {\n	background: #ffffff;\n	color: #000000;\n	border: 1px solid #0f5c8e;\n	padding: 1px;\n}\n\ntextarea {\n	background: #ffffff;\n	color: #000000;\n	border: 1px solid #0f5c8e;\n	padding: 2px;\n	font-family: Verdana, Arial, Sans-Serif;\n	line-height: 1.4;\n	font-size: 13px;\n}\n\nselect {\n	background: #ffffff;\n	border: 1px solid #0f5c8e;\n}\n\n.editor {\n	background: #f1f1f1;\n	border: 1px solid #ccc;\n}\n\n.editor_control_bar {\n	background: #fff;\n	border: 1px solid #0f5c8e;\n}\n\n.autocomplete {\n	background: #fff;\n	border: 1px solid #000;\n	color: black;\n}\n\n.autocomplete_selected {\n	background: #adcee7;\n	color: #000;\n}\n\n.popup_menu {\n	background: #ccc;\n	border: 1px solid #000;\n}\n\n.popup_menu .popup_item {\n	background: #fff;\n	color: #000;\n}\n\n.popup_menu .popup_item:hover {\n	background: #C7DBEE;\n	color: #000;\n}\n\n.trow_reputation_positive {\n	background: #ccffcc;\n}\n\n.trow_reputation_negative {\n	background: #ffcccc;\n}\n\n.reputation_positive {\n	color: green;\n}\n\n.reputation_neutral {\n	color: #444;\n}\n\n.reputation_negative {\n	color: red;\n}\n\n.invalid_field {\n	border: 1px solid #f30;\n	color: #f30;\n}\n\n.valid_field {\n	border: 1px solid #0c0;\n}\n\n.validation_error {\n	background: url(images/invalid.gif) no-repeat center left;\n	color: #f30;\n	margin: 5px 0;\n	padding: 5px;\n	font-weight: bold;\n	font-size: 11px;\n	padding-left: 22px;\n}\n\n.validation_success {\n	background: url(images/valid.gif) no-repeat center left;\n	color: #00b200;\n	margin: 5px 0;\n	padding: 5px;\n	font-weight: bold;\n	font-size: 11px;\n	padding-left: 22px;\n}\n\n.validation_loading {\n	background: url(images/spinner.gif) no-repeat center left;\n	color: #555;\n	margin: 5px 0;\n	padding: 5px;\n	font-weight: bold;\n	font-size: 11px;\n	padding-left: 22px;\n}\n\n/* Additional CSS (Master) */\nimg {\n	border: none;\n}\n\n.clear {\n	clear: both;\n}\n\n.hidden {\n	display: none;\n	float: none;\n	width: 1%;\n}\n\n.float_left {\n	float: left;\n}\n\n.float_right {\n	float: right;\n}\n\n.menu ul {\n	list-style: none;\n	margin: 0;\n}\n\n.menu li {\n	display: inline;\n	padding-left: 5px;\n}\n\n.menu img {\n	padding-right: 5px;\n	vertical-align: top;\n}\n\n#panel .links {\n	margin: 0;\n	float: right;\n}\n\n.expcolimage {\n	float: right;\n	width: auto;\n	vertical-align: middle;\n	margin-top: 3px;\n}\n\nimg.attachment {\n	border: 1px solid #E9E5D7;\n	padding: 2px;\n}\n\nhr {\n	background-color: #000000;\n	color: #000000;\n	height: 1px;\n	border: 0px;\n}\n\n#copyright {\n	font: 11px Verdana, Arial, Sans-Serif;\n	margin: 0;\n	padding: 10px 0 0 0;\n}\n\n#debug {\n	float: right;\n	text-align: right;\n	margin-top: 0;\n}\n\nblockquote {\n	border: 1px solid #ccc;\n	margin: 0;\n	background: #fff;\n	padding: 4px;\n}\n\nblockquote cite {\n	font-weight: bold;\n	border-bottom: 1px solid #ccc;\n	font-style: normal;\n	display: block;\n	margin: 4px 0;\n}\n\nblockquote cite span {\n	float: right;\n	font-weight: normal;\n}\n\n\nblockquote cite span.highlight {\n	float: none;\n	font-weight: bold;\n	padding-bottom: 0;\n}\n\n.codeblock {\n	background: #fff;\n	border: 1px solid #ccc;\n	padding: 4px;\n}\n\n.codeblock .title {\n	border-bottom: 1px solid #ccc;\n	font-weight: bold;\n	margin: 4px 0;\n}\n\n.codeblock code {\n	overflow: auto;\n	height: auto;\n	max-height: 200px;\n	display: block;\n	font-family: Monaco, Consolas, Courier, monospace;\n	font-size: 13px;\n}\n\n.subforumicon {\n	border: 0;\n	vertical-align: middle;\n}\n\n.separator {\n	margin: 5px;\n	padding: 0;\n	height: 0px;\n	font-size: 1px;\n	list-style-type: none;\n}\n\nform {\n	margin: 0;\n	padding: 0;\n}\n\n.popup_menu .popup_item_container {\n	margin: 1px;\n	text-align: left;\n}\n\n.popup_menu .popup_item {\n	display: block;\n	padding: 3px;\n	text-decoration: none;\n	white-space: nowrap;\n}\n\n.popup_menu a.popup_item:hover {\n	text-decoration: none;\n}\n\n.autocomplete {\n	text-align: left;\n}\n\n.subject_new {\n	font-weight: bold;\n}\n\n.highlight {\n	background: #FFFFCC;\n	padding: 3px;\n}\n\n.pm_alert {\n	background: #FFF6BF;\n	border: 1px solid #FFD324;\n	text-align: center;\n	padding: 5px 20px;\n	font-size: 11px;\n}\n\n.red_alert {\n	background: #FBE3E4;\n	border: 1px solid #A5161A;\n	color: #A5161A;\n	text-align: center;\n	padding: 5px 20px;\n	font-size: 11px;\n}\n\n.high_warning {\n	color: #CC0000;\n}\n\n.moderate_warning {\n	color: #F3611B;\n}\n\n.low_warning {\n	color: #AE5700;\n}\n\ndiv.error {\n	padding: 5px 10px;\n	border-top: 2px solid #FFD324;\n	border-bottom: 2px solid #FFD324;\n	background: #FFF6BF;\n	font-size: 12px;\n}\n\ndiv.error p {\n	margin: 0;\n	color: #000;\n	font-weight: normal;\n}\n\ndiv.error p em {\n	font-style: normal;\n	font-weight: bold;\n	padding-left: 24px;\n	display: block;\n	color: #C00;\n	background: url(''images/error.gif'') no-repeat 0;\n}\n\ndiv.error.ul {\n	margin-left: 24px;\n}\n\n.online {\n	color: #15A018;\n}\n\n.offline {\n	color: #C7C7C7;\n}\n\n.pagination {\n	font-size: 11px;\n	padding-top: 10px;\n	margin-bottom: 5px;\n}\n\n.tfoot .pagination, .tcat .pagination {\n	padding-top: 0;\n}\n.pagination .pages {\n	font-weight: bold;\n}\n\n.pagination .pagination_current, .pagination a {\n	padding: 2px 6px;\n	margin-bottom: 3px;\n}\n\n.pagination a {\n	border: 1px solid #81A2C4;\n}\n\n.pagination .pagination_current {\n	background: #F5F5F5;\n	border: 1px solid #81A2C4;\n	font-weight: bold;\n}\n\n.pagination a:hover {\n	background: #F5F5F5;\n	text-decoration: none;\n}\n\n.thread_legend, .thread_legend dd {\n	margin: 0;\n	padding: 0;\n}\n\n.thread_legend dd {\n	padding-bottom: 4px;\n	margin-right: 15px;\n}\n\n.thread_legend img {\n	margin-right: 4px;\n	vertical-align: bottom;\n}\n\n.forum_legend, .forum_legend dt, .forum_legend dd {\n	margin: 0;\n	padding: 0;\n}\n\n.forum_legend dd {\n	float: left;\n	margin-right: 10px;\n}\n\n.forum_legend dt {\n	margin-right: 10px;\n	float: left;\n}\n\n.success_message {\n	color: #00b200;\n	font-weight: bold;\n	font-size: 10px;\n	margin-bottom: 10px;\n}\n\n.error_message {\n	color: #C00;\n	font-weight: bold;\n	font-size: 10px;\n	margin-bottom: 10px;\n}\n\n.post_body {\n	padding: 5px;\n}\n\n.post_content {\n	padding: 5px 10px;\n}\n\n.quick_jump {\n	background: url(''images/jump.gif'') no-repeat 0;\n	width: 13px;\n	height: 13px;\n	padding-left: 13px; /* amount of padding needed for image to fully show */\n	vertical-align: middle;\n	border: none;\n}\n\n		', 'global.css', 1292184690);
INSERT INTO `mybb_themestylesheets` VALUES (2, 'usercp.css', 1, 'usercp.php|usercp2.php|private.php', '.usercp_nav_item {\n	display: block;\n	padding: 1px 0 1px 23px;\n}\n.usercp_nav_composepm {\n	background: url(images/usercp/composepm.gif) no-repeat left center;\n}\n\n.usercp_nav_pmfolder {\n	background: url(images/usercp/pmfolder.gif) no-repeat left center;\n}\n\n.usercp_nav_sub_pmfolder {\n	padding-left: 40px;\n	background: url(images/usercp/sub_pmfolder.gif) no-repeat left center;\n}\n\n.usercp_nav_trash_pmfolder {\n	padding-left: 40px;\n	background: url(images/usercp/trash_pmfolder.gif) no-repeat left center;\n}\n\n.usercp_nav_pmtracking {\n	background: url(images/usercp/pmtracking.gif) no-repeat left center;\n}\n\n.usercp_nav_pmfolders {\n	background: url(images/usercp/editfolders.gif) no-repeat left center;\n}\n\n.usercp_nav_profile {\n	background: url(images/usercp/profile.gif) no-repeat left center;\n}\n\n.usercp_nav_email {\n	padding-left: 40px;\n	background: url(images/usercp/email.gif) no-repeat left center;\n}\n\n.usercp_nav_password {\n	padding-left: 40px;\n	background: url(images/usercp/password.gif) no-repeat left center;\n}\n\n.usercp_nav_username {\n	padding-left: 40px;\n	background: url(images/usercp/username.gif) no-repeat left center;\n}\n\n.usercp_nav_editsig {\n	padding-left: 40px;\n	background: url(images/usercp/editsig.gif) no-repeat left center;\n}\n\n.usercp_nav_avatar {\n	padding-left: 40px;\n	background: url(images/usercp/avatar.gif) no-repeat left center;\n}\n\n.usercp_nav_options {\n	background: url(images/usercp/options.gif) no-repeat left center;\n}\n\n.usercp_nav_usergroups {\n	background: url(images/usercp/usergroups.gif) no-repeat left center;\n}\n\n.usercp_nav_editlists {\n	background: url(images/usercp/editlists.gif) no-repeat left center;\n}\n\n.usercp_nav_attachments {\n	background: url(images/usercp/attachments.gif) no-repeat left center;\n}\n\n.usercp_nav_drafts {\n	background: url(images/usercp/drafts.gif) no-repeat left center;\n}\n\n.usercp_nav_subscriptions {\n	background: url(images/usercp/subscriptions.gif) no-repeat left center;\n}\n\n.usercp_nav_fsubscriptions {\n	background: url(images/usercp/fsubscriptions.gif) no-repeat left center;\n}\n\n.usercp_nav_notepad {\n	background: url(images/usercp/notepad.gif) no-repeat left center;\n}\n\n.usercp_nav_viewprofile {\n	background: url(images/usercp/viewprofile.gif) no-repeat left center;\n}\n\n.usercp_nav_home {\n	background: url(images/usercp/home.gif) no-repeat left center;\n}', 'usercp.css', 1292184967);
INSERT INTO `mybb_themestylesheets` VALUES (6, 'global.css', 2, '', '\nbody {\n	background: #efefef;\n	color: #000;\n	font-family: Verdana, Arial, Sans-Serif;\n	font-size: 13px;\n	text-align: center; /* IE 5 fix */\n	line-height: 1.4;\n}\n\na:link {\n	color: #026CB1;\n	text-decoration: none;\n}\n\na:visited {\n	color: #026CB1;\n	text-decoration: none;\n}\n\na:hover, a:active {\n	color: #000;\n	text-decoration: underline;\n}\n\n#container {\n	background: #00000;\n	width: 95%;\n	color: #000000;\n	border: 1px solid #e4e4e4;\n	margin: auto auto;\n	padding: 20px;\n	text-align: left;\n}\n\n#content {\n	/* FIX: Make internet explorer wrap correctly */\n	width: auto !important;\n}\n\n.menu ul {\n	color: #000000;\n	font-weight: bold;\n	text-align: right;\n	padding: 4px;\n}\n\n.menu ul a:link {\n	color: #000000;\n	text-decoration: none;\n}\n\n.menu ul a:visited {\n	color: #000000;\n	text-decoration: none;\n}\n\n.menu ul a:hover, .menu ul a:active {\n	color: #4874a3;\n	text-decoration: none;\n}\n\n#panel {\n	background: #efefef;\n	color: #000000;\n	font-size: 11px;\n	border: 1px solid #D4D4D4;\n	padding: 8px;\n}\n\ntable {\n	color: #000000;\n	font-family: Verdana, Arial, Sans-Serif;\n	font-size: 13px;\n}\n\n.tborder {\n	background: #81A2C4;\n	width: 100%;\n	margin: auto auto;\n	border: 1px solid #0F5C8E;\n}\n\n.thead {\n	background: #026CB1 url(images/thead_bg.gif) top left repeat-x;\n	color: #ffffff;\n}\n\n.thead a:link {\n	color: #ffffff;\n	text-decoration: none;\n}\n\n.thead a:visited {\n	color: #ffffff;\n	text-decoration: none;\n}\n\n.thead a:hover, .thead a:active {\n	color: #ffffff;\n	text-decoration: underline;\n}\n\n.tcat {\n	background: #ADCBE7;\n	color: #000000;\n	font-size: 12px;\n}\n\n.tcat a:link {\n	color: #000000;\n}\n\n.tcat a:visited {\n	color: #000000;\n}\n\n.tcat a:hover, .tcat a:active {\n	color: #000000;\n}\n\n.trow1 {\n	background: #f5f5f5;\n}\n\n.trow2 {\n	background: #EFEFEF;\n}\n\n.trow_shaded {\n	background: #ffdde0;\n}\n\n.trow_selected td {\n	background: #FFFBD9;\n}\n\n.trow_sep {\n	background: #e5e5e5;\n	color: #000;\n	font-size: 12px;\n	font-weight: bold;\n}\n\n.tfoot {\n	background: #026CB1 url(images/thead_bg.gif) top left repeat-x;\n	color: #ffffff;\n}\n\n.tfoot a:link {\n	color: #ffffff;\n	text-decoration: none;\n}\n\n.tfoot a:visited {\n	color: #ffffff;\n	text-decoration: none;\n}\n\n.tfoot a:hover, .tfoot a:active {\n	color: #ffffff;\n	text-decoration: underline;\n}\n\n.bottommenu {\n	background: #efefef;\n	color: #000000;\n	border: 1px solid #4874a3;\n	padding: 10px;\n}\n\n.navigation {\n	color: #000000;\n	font-size: 13px;\n	font-weight: bold;\n}\n\n.navigation a:link {\n	text-decoration: none;\n}\n\n.navigation a:visited {\n	text-decoration: none;\n}\n\n.navigation a:hover, .navigation a:active {\n	text-decoration: none;\n}\n\n.navigation .active {\n	color: #000000;\n	font-size: small;\n	font-weight: bold;\n}\n\n.smalltext {\n	font-size: 11px;\n}\n\n.largetext {\n	font-size: 16px;\n	font-weight: bold;\n}\n\ninput.textbox {\n	background: #ffffff;\n	color: #000000;\n	border: 1px solid #0f5c8e;\n	padding: 1px;\n}\n\ntextarea {\n	background: #ffffff;\n	color: #000000;\n	border: 1px solid #0f5c8e;\n	padding: 2px;\n	font-family: Verdana, Arial, Sans-Serif;\n	line-height: 1.4;\n	font-size: 13px;\n}\n\nselect {\n	background: #ffffff;\n	border: 1px solid #0f5c8e;\n}\n\n.editor {\n	background: #f1f1f1;\n	border: 1px solid #ccc;\n}\n\n.editor_control_bar {\n	background: #fff;\n	border: 1px solid #0f5c8e;\n}\n\n.autocomplete {\n	background: #fff;\n	border: 1px solid #000;\n	color: black;\n}\n\n.autocomplete_selected {\n	background: #adcee7;\n	color: #000;\n}\n\n.popup_menu {\n	background: #ccc;\n	border: 1px solid #000;\n}\n\n.popup_menu .popup_item {\n	background: #fff;\n	color: #000;\n}\n\n.popup_menu .popup_item:hover {\n	background: #C7DBEE;\n	color: #000;\n}\n\n.trow_reputation_positive {\n	background: #ccffcc;\n}\n\n.trow_reputation_negative {\n	background: #ffcccc;\n}\n\n.reputation_positive {\n	color: green;\n}\n\n.reputation_neutral {\n	color: #444;\n}\n\n.reputation_negative {\n	color: red;\n}\n\n.invalid_field {\n	border: 1px solid #f30;\n	color: #f30;\n}\n\n.valid_field {\n	border: 1px solid #0c0;\n}\n\n.validation_error {\n	background: url(images/invalid.gif) no-repeat center left;\n	color: #f30;\n	margin: 5px 0;\n	padding: 5px;\n	font-weight: bold;\n	font-size: 11px;\n	padding-left: 22px;\n}\n\n.validation_success {\n	background: url(images/valid.gif) no-repeat center left;\n	color: #00b200;\n	margin: 5px 0;\n	padding: 5px;\n	font-weight: bold;\n	font-size: 11px;\n	padding-left: 22px;\n}\n\n.validation_loading {\n	background: url(images/spinner.gif) no-repeat center left;\n	color: #555;\n	margin: 5px 0;\n	padding: 5px;\n	font-weight: bold;\n	font-size: 11px;\n	padding-left: 22px;\n}\n\n/* Additional CSS (Master) */\nimg {\n	border: none;\n}\n\n.clear {\n	clear: both;\n}\n\n.hidden {\n	display: none;\n	float: none;\n	width: 1%;\n}\n\n.float_left {\n	float: left;\n}\n\n.float_right {\n	float: right;\n}\n\n.menu ul {\n	list-style: none;\n	margin: 0;\n}\n\n.menu li {\n	display: inline;\n	padding-left: 5px;\n}\n\n.menu img {\n	padding-right: 5px;\n	vertical-align: top;\n}\n\n#panel .links {\n	margin: 0;\n	float: right;\n}\n\n.expcolimage {\n	float: right;\n	width: auto;\n	vertical-align: middle;\n	margin-top: 3px;\n}\n\nimg.attachment {\n	border: 1px solid #E9E5D7;\n	padding: 2px;\n}\n\nhr {\n	background-color: #000000;\n	color: #000000;\n	height: 1px;\n	border: 0px;\n}\n\n#copyright {\n	font: 11px Verdana, Arial, Sans-Serif;\n	margin: 0;\n	padding: 10px 0 0 0;\n}\n\n#debug {\n	float: right;\n	text-align: right;\n	margin-top: 0;\n}\n\nblockquote {\n	border: 1px solid #ccc;\n	margin: 0;\n	background: #fff;\n	padding: 4px;\n}\n\nblockquote cite {\n	font-weight: bold;\n	border-bottom: 1px solid #ccc;\n	font-style: normal;\n	display: block;\n	margin: 4px 0;\n}\n\nblockquote cite span {\n	float: right;\n	font-weight: normal;\n}\n\nblockquote cite span.highlight {\n	float: none;\n	font-weight: bold;\n	padding-bottom: 0;\n}\n\n.codeblock {\n	background: #fff;\n	border: 1px solid #ccc;\n	padding: 4px;\n}\n\n.codeblock .title {\n	border-bottom: 1px solid #ccc;\n	font-weight: bold;\n	margin: 4px 0;\n}\n\n.codeblock code {\n	overflow: auto;\n	height: auto;\n	max-height: 200px;\n	display: block;\n	font-family: Monaco, Consolas, Courier, monospace;\n	font-size: 13px;\n}\n\n.subforumicon {\n	border: 0;\n	vertical-align: middle;\n}\n\n.separator {\n	margin: 5px;\n	padding: 0;\n	height: 0px;\n	font-size: 1px;\n	list-style-type: none;\n}\n\nform {\n	margin: 0;\n	padding: 0;\n}\n\n.popup_menu .popup_item_container {\n	margin: 1px;\n	text-align: left;\n}\n\n.popup_menu .popup_item {\n	display: block;\n	padding: 3px;\n	text-decoration: none;\n	white-space: nowrap;\n}\n\n.popup_menu a.popup_item:hover {\n	text-decoration: none;\n}\n\n.autocomplete {\n	text-align: left;\n}\n\n.subject_new {\n	font-weight: bold;\n}\n\n.highlight {\n	background: #FFFFCC;\n	padding: 3px;\n}\n\n.pm_alert {\n	background: #FFF6BF;\n	border: 1px solid #FFD324;\n	text-align: center;\n	padding: 5px 20px;\n	font-size: 11px;\n}\n\n.red_alert {\n	background: #FBE3E4;\n	border: 1px solid #A5161A;\n	color: #A5161A;\n	text-align: center;\n	padding: 5px 20px;\n	font-size: 11px;\n}\n\n.high_warning {\n	color: #CC0000;\n}\n\n.moderate_warning {\n	color: #F3611B;\n}\n\n.low_warning {\n	color: #AE5700;\n}\n\ndiv.error {\n	padding: 5px 10px;\n	border-top: 2px solid #FFD324;\n	border-bottom: 2px solid #FFD324;\n	background: #FFF6BF;\n	font-size: 12px;\n}\n\ndiv.error p {\n	margin: 0;\n	color: #000;\n	font-weight: normal;\n}\n\ndiv.error p em {\n	font-style: normal;\n	font-weight: bold;\n	padding-left: 24px;\n	display: block;\n	color: #C00;\n	background: url(''images/error.gif'') no-repeat 0;\n}\n\ndiv.error.ul {\n	margin-left: 24px;\n}\n\n.online {\n	color: #15A018;\n}\n\n.offline {\n	color: #C7C7C7;\n}\n\n.pagination {\n	font-size: 11px;\n	padding-top: 10px;\n	margin-bottom: 5px;\n}\n\n.tfoot .pagination, .tcat .pagination {\n	padding-top: 0;\n}\n\n.pagination .pages {\n	font-weight: bold;\n}\n\n.pagination .pagination_current, .pagination a {\n	padding: 2px 6px;\n	margin-bottom: 3px;\n}\n\n.pagination a {\n	border: 1px solid #81A2C4;\n}\n\n.pagination .pagination_current {\n	background: #F5F5F5;\n	border: 1px solid #81A2C4;\n	font-weight: bold;\n}\n\n.pagination a:hover {\n	background: #F5F5F5;\n	text-decoration: none;\n}\n\n.thread_legend, .thread_legend dd {\n	margin: 0;\n	padding: 0;\n}\n\n.thread_legend dd {\n	padding-bottom: 4px;\n	margin-right: 15px;\n}\n\n.thread_legend img {\n	margin-right: 4px;\n	vertical-align: bottom;\n}\n\n.forum_legend, .forum_legend dt, .forum_legend dd {\n	margin: 0;\n	padding: 0;\n}\n\n.forum_legend dd {\n	float: left;\n	margin-right: 10px;\n}\n\n.forum_legend dt {\n	margin-right: 10px;\n	float: left;\n}\n\n.success_message {\n	color: #00b200;\n	font-weight: bold;\n	font-size: 10px;\n	margin-bottom: 10px;\n}\n\n.error_message {\n	color: #C00;\n	font-weight: bold;\n	font-size: 10px;\n	margin-bottom: 10px;\n}\n\n.post_body {\n	padding: 5px;\n}\n\n.post_content {\n	padding: 5px 10px;\n}\n\n.quick_jump {\n	background: url(''images/jump.gif'') no-repeat 0;\n	width: 13px;\n	height: 13px;\n	padding-left: 13px; /* amount of padding needed for image to fully show */\n	vertical-align: middle;\n	border: none;\n}\n\n', 'global.css', 1292185073);
INSERT INTO `mybb_themestylesheets` VALUES (3, 'modcp.css', 1, 'modcp.php', '.modcp_nav_item {\n	display: block;\n	padding: 1px 0 1px 23px;\n}\n\n.modcp_nav_home {\n	background: url(images/modcp/home.gif) no-repeat left center;\n}\n\n.modcp_nav_announcements {\n	background: url(images/modcp/announcements.gif) no-repeat left center;\n}\n\n.modcp_nav_reports {\n	background: url(images/modcp/reports.gif) no-repeat left center;\n}\n\n.modcp_nav_modqueue {\n	background: url(images/modcp/modqueue.gif) no-repeat left center;\n}\n\n.modcp_nav_modlogs {\n	background: url(images/modcp/modlogs.gif) no-repeat left center;\n}\n\n.modcp_nav_editprofile {\n	background: url(images/modcp/editprofile.gif) no-repeat left center;\n}\n\n.modcp_nav_banning {\n	background: url(images/modcp/banning.gif) no-repeat left center;\n}\n\n.modcp_nav_warninglogs {\n	background: url(images/modcp/warninglogs.gif) no-repeat left center;\n}\n\n.modcp_nav_ipsearch {\n	background: url(images/modcp/ipsearch.gif) no-repeat left center;\n}\n\n.modqueue_message {\n	overflow: auto;\n	max-height: 250px;\n}\n\n.modqueue_controls {\n	width: 270px;\n	float: right;\n	text-align: center;\n	border: 1px solid #ccc;\n	background: #fff;\n	padding: 6px;\n	font-weight: bold;\n}\n\n.modqueue_controls label {\n	margin-right: 8px;\n}\n\n.label_radio_ignore, .label_radio_delete, .label_radio_approve {\n	font-weight: bold;\n}\n\n.modqueue_meta {\n	color: #444;\n	font-size: 95%;\n	margin-bottom: 8px;\n}\n\n.modqueue_mass {\n	list-style: none;\n	margin: 0;\n	width: 150px;\n	padding: 0;\n}\n\n.modqueue_mass li {\n	margin-bottom: 4px;\n	padding: 0;\n}\n\n.modqueue_mass li a {\n	display: block;\n	padding: 4px;\n	border: 1px solid transparent;\n}\n\n.modqueue_mass li a:hover {\n	background: #efefef;\n	border: 1px solid #ccc;\n	text-decoration: none;\n}', 'modcp.css', 1292184967);
INSERT INTO `mybb_themestylesheets` VALUES (4, 'star_ratings.css', 1, 'forumdisplay.php|showthread.php', '.star_rating,\n.star_rating li a:hover,\n.star_rating .current_rating {\n	background: url(images/star_rating.gif) left -1000px repeat-x;\n	vertical-align: middle;\n}\n\n.star_rating {\n	position: relative;\n	width:80px;\n	height:16px;\n	overflow: hidden;\n	list-style: none;\n	margin: 0;\n	padding: 0;\n	background-position: left top;\n}\n\ntd .star_rating {\n	margin: auto;\n}\n\n.star_rating li {\n	display: inline;\n}\n\n.star_rating li a,\n.star_rating .current_rating {\n	position: absolute;\n	text-indent: -1000px;\n	height: 16px;\n	line-height: 16px;\n	outline: none;\n	overflow: hidden;\n	border: none;\n	top:0;\n	left:0;\n}\n\n.star_rating_notrated li a:hover {\n	background-position: left bottom;\n}\n\n.star_rating li a.one_star {\n	width:20%;\n	z-index:6;\n}\n\n.star_rating li a.two_stars {\n	width:40%;\n	z-index:5;\n}\n\n.star_rating li a.three_stars {\n	width:60%;\n	z-index:4;\n}\n\n.star_rating li a.four_stars {\n	width:80%;\n	z-index:3;\n}\n\n.star_rating li a.five_stars {\n	width:100%;\n	z-index:2;\n}\n\n.star_rating .current_rating {\n	z-index:1;\n	background-position: left center;\n}\n\n.star_rating_success, .success_message {\n	color: #00b200;\n	font-weight: bold;\n	font-size: 10px;\n	margin-bottom: 10px;\n}\n\n.inline_rating {\n	float: left;\n	vertical-align: middle;\n	padding-right: 5px;\n}', 'star_ratings.css', 1292184967);
INSERT INTO `mybb_themestylesheets` VALUES (5, 'showthread.css', 1, 'showthread.php', 'ul.thread_tools, ul.thread_tools li {\n	list-style: none;\n	padding: 0;\n	margin: 0;\n}\n\nul.thread_tools li {\n	padding-left: 26px;\n	padding-bottom: 4px;\n	margin-bottom: 3px;\n	font-size: 11px;\n}\n\nul.thread_tools li.printable {\n	background: url(images/printable.gif) no-repeat 0px 0px;\n}\n\nul.thread_tools li.sendthread {\n	background: url(images/send.gif) no-repeat 0px 0px;\n}\n\nul.thread_tools li.subscription_add {\n	background: url(images/subscribe.gif) no-repeat 0px 0px;\n}\n\nul.thread_tools li.subscription_remove {\n	background: url(images/unsubscribe.gif) no-repeat 0px 0px;\n}', 'showthread.css', 1292184967);

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_threadratings`
-- 

CREATE TABLE `mybb_threadratings` (
  `rid` int(10) unsigned NOT NULL auto_increment,
  `tid` int(10) unsigned NOT NULL default '0',
  `uid` int(10) unsigned NOT NULL default '0',
  `rating` smallint(5) unsigned NOT NULL default '0',
  `ipaddress` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`rid`),
  KEY `tid` (`tid`,`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_threadratings`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_threads`
-- 

CREATE TABLE `mybb_threads` (
  `tid` int(10) unsigned NOT NULL auto_increment,
  `fid` smallint(5) unsigned NOT NULL default '0',
  `subject` varchar(120) NOT NULL default '',
  `icon` smallint(5) unsigned NOT NULL default '0',
  `poll` int(10) unsigned NOT NULL default '0',
  `uid` int(10) unsigned NOT NULL default '0',
  `username` varchar(80) NOT NULL default '',
  `dateline` bigint(30) NOT NULL default '0',
  `firstpost` int(10) unsigned NOT NULL default '0',
  `lastpost` bigint(30) NOT NULL default '0',
  `lastposter` varchar(120) NOT NULL default '',
  `lastposteruid` int(10) unsigned NOT NULL default '0',
  `views` int(100) NOT NULL default '0',
  `replies` int(100) NOT NULL default '0',
  `closed` varchar(30) NOT NULL default '',
  `sticky` int(1) NOT NULL default '0',
  `numratings` smallint(5) unsigned NOT NULL default '0',
  `totalratings` smallint(5) unsigned NOT NULL default '0',
  `notes` text NOT NULL,
  `visible` int(1) NOT NULL default '0',
  `unapprovedposts` int(10) unsigned NOT NULL default '0',
  `attachmentcount` int(10) unsigned NOT NULL default '0',
  `deletetime` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`tid`),
  KEY `fid` (`fid`,`visible`,`sticky`),
  KEY `dateline` (`dateline`),
  KEY `lastpost` (`lastpost`,`fid`),
  KEY `firstpost` (`firstpost`),
  KEY `uid` (`uid`),
  FULLTEXT KEY `subject` (`subject`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_threads`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_threadsread`
-- 

CREATE TABLE `mybb_threadsread` (
  `tid` int(10) unsigned NOT NULL default '0',
  `uid` int(10) unsigned NOT NULL default '0',
  `dateline` int(10) NOT NULL default '0',
  UNIQUE KEY `tid` (`tid`,`uid`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `mybb_threadsread`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_threadsubscriptions`
-- 

CREATE TABLE `mybb_threadsubscriptions` (
  `sid` int(10) unsigned NOT NULL auto_increment,
  `uid` int(10) unsigned NOT NULL default '0',
  `tid` int(10) unsigned NOT NULL default '0',
  `notification` int(1) NOT NULL default '0',
  `dateline` bigint(30) NOT NULL default '0',
  `subscriptionkey` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`sid`),
  KEY `uid` (`uid`),
  KEY `tid` (`tid`,`notification`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_threadsubscriptions`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_threadviews`
-- 

CREATE TABLE `mybb_threadviews` (
  `tid` int(10) unsigned NOT NULL default '0',
  KEY `tid` (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `mybb_threadviews`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_userfields`
-- 

CREATE TABLE `mybb_userfields` (
  `ufid` int(10) unsigned NOT NULL default '0',
  `fid1` text NOT NULL,
  `fid2` text NOT NULL,
  `fid3` text NOT NULL,
  PRIMARY KEY  (`ufid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `mybb_userfields`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_usergroups`
-- 

CREATE TABLE `mybb_usergroups` (
  `gid` smallint(5) unsigned NOT NULL auto_increment,
  `type` smallint(2) NOT NULL default '2',
  `title` varchar(120) NOT NULL default '',
  `description` text NOT NULL,
  `namestyle` varchar(200) NOT NULL default '{username}',
  `usertitle` varchar(120) NOT NULL default '',
  `stars` smallint(4) NOT NULL default '0',
  `starimage` varchar(120) NOT NULL default '',
  `image` varchar(120) NOT NULL default '',
  `disporder` smallint(6) unsigned NOT NULL,
  `isbannedgroup` int(1) NOT NULL default '0',
  `canview` int(1) NOT NULL default '0',
  `canviewthreads` int(1) NOT NULL default '0',
  `canviewprofiles` int(1) NOT NULL default '0',
  `candlattachments` int(1) NOT NULL default '0',
  `canpostthreads` int(1) NOT NULL default '0',
  `canpostreplys` int(1) NOT NULL default '0',
  `canpostattachments` int(1) NOT NULL default '0',
  `canratethreads` int(1) NOT NULL default '0',
  `caneditposts` int(1) NOT NULL default '0',
  `candeleteposts` int(1) NOT NULL default '0',
  `candeletethreads` int(1) NOT NULL default '0',
  `caneditattachments` int(1) NOT NULL default '0',
  `canpostpolls` int(1) NOT NULL default '0',
  `canvotepolls` int(1) NOT NULL default '0',
  `canusepms` int(1) NOT NULL default '0',
  `cansendpms` int(1) NOT NULL default '0',
  `cantrackpms` int(1) NOT NULL default '0',
  `candenypmreceipts` int(1) NOT NULL default '0',
  `pmquota` int(3) NOT NULL default '0',
  `maxpmrecipients` int(4) NOT NULL default '5',
  `cansendemail` int(1) NOT NULL default '0',
  `maxemails` int(3) NOT NULL default '5',
  `canviewmemberlist` int(1) NOT NULL default '0',
  `canviewcalendar` int(1) NOT NULL default '0',
  `canaddevents` int(1) NOT NULL default '0',
  `canbypasseventmod` int(1) NOT NULL default '0',
  `canmoderateevents` int(1) NOT NULL default '0',
  `canviewonline` int(1) NOT NULL default '0',
  `canviewwolinvis` int(1) NOT NULL default '0',
  `canviewonlineips` int(1) NOT NULL default '0',
  `cancp` int(1) NOT NULL default '0',
  `issupermod` int(1) NOT NULL default '0',
  `cansearch` int(1) NOT NULL default '0',
  `canusercp` int(1) NOT NULL default '0',
  `canuploadavatars` int(1) NOT NULL default '0',
  `canratemembers` int(1) NOT NULL default '0',
  `canchangename` int(1) NOT NULL default '0',
  `showforumteam` int(1) NOT NULL default '0',
  `usereputationsystem` int(1) NOT NULL default '0',
  `cangivereputations` int(1) NOT NULL default '0',
  `reputationpower` bigint(30) NOT NULL default '0',
  `maxreputationsday` bigint(30) NOT NULL default '0',
  `candisplaygroup` int(1) NOT NULL default '0',
  `attachquota` bigint(30) NOT NULL default '0',
  `cancustomtitle` int(1) NOT NULL default '0',
  `canwarnusers` int(1) NOT NULL default '0',
  `canreceivewarnings` int(1) NOT NULL default '0',
  `maxwarningsday` int(3) NOT NULL default '3',
  `canmodcp` int(1) NOT NULL default '0',
  PRIMARY KEY  (`gid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `mybb_usergroups`
-- 

INSERT INTO `mybb_usergroups` VALUES (1, 1, 'Guests', 'The default group that all visitors are assigned to unless they''re logged in.', '{username}', 'Unregistered', 0, '', '', 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 5, 0, 5, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0);
INSERT INTO `mybb_usergroups` VALUES (2, 1, 'Registered', 'After registration, all users are placed in this group by default.', '{username}', '', 0, 'images/star.gif', '', 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 200, 5, 1, 5, 1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 1, 1, 1, 5, 1, 0, 1, 0, 1, 0, 0);
INSERT INTO `mybb_usergroups` VALUES (3, 1, 'Super Moderators', 'These users can moderate any forum.', '<span style="color: #CC00CC;"><strong>{username}</strong></span>', 'Super Moderator', 6, 'images/star.gif', '', 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 250, 5, 1, 10, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 10, 1, 0, 1, 1, 1, 3, 1);
INSERT INTO `mybb_usergroups` VALUES (4, 1, 'Administrators', 'The group all administrators belong to.', '<span style="color: green;"><strong><em>{username}</em></strong></span>', 'Administrator', 7, 'images/star.gif', '', 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 0, 1, 0, 1, 1, 1, 0, 1);
INSERT INTO `mybb_usergroups` VALUES (5, 1, 'Awaiting Activation', 'Users that have not activated their account by email or manually been activated yet.', '{username}', 'Account not Activated', 0, 'images/star.gif', '', 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 5, 0, 5, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0);
INSERT INTO `mybb_usergroups` VALUES (6, 1, 'Moderators', 'These users moderate specific forums.', '<span style="color: #CC00CC;"><strong>{username}</strong></span>', 'Moderator', 5, 'images/star.gif', '', 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 250, 5, 1, 5, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 10, 1, 0, 1, 1, 1, 3, 1);
INSERT INTO `mybb_usergroups` VALUES (7, 1, 'Banned', 'The default user group to which members that are banned are moved to.', '<s>{username}</s>', 'Banned', 0, 'images/star.gif', '', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_users`
-- 

CREATE TABLE `mybb_users` (
  `uid` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(120) NOT NULL default '',
  `password` varchar(120) NOT NULL default '',
  `salt` varchar(10) NOT NULL default '',
  `loginkey` varchar(50) NOT NULL default '',
  `email` varchar(220) NOT NULL default '',
  `postnum` int(10) NOT NULL default '0',
  `avatar` varchar(200) NOT NULL default '',
  `avatardimensions` varchar(10) NOT NULL default '',
  `avatartype` varchar(10) NOT NULL default '0',
  `usergroup` smallint(5) unsigned NOT NULL default '0',
  `additionalgroups` varchar(200) NOT NULL default '',
  `displaygroup` smallint(5) unsigned NOT NULL default '0',
  `usertitle` varchar(250) NOT NULL default '',
  `regdate` bigint(30) NOT NULL default '0',
  `lastactive` bigint(30) NOT NULL default '0',
  `lastvisit` bigint(30) NOT NULL default '0',
  `lastpost` bigint(30) NOT NULL default '0',
  `website` varchar(200) NOT NULL default '',
  `icq` varchar(10) NOT NULL default '',
  `aim` varchar(50) NOT NULL default '',
  `yahoo` varchar(50) NOT NULL default '',
  `msn` varchar(75) NOT NULL default '',
  `birthday` varchar(15) NOT NULL default '',
  `birthdayprivacy` varchar(4) NOT NULL default 'all',
  `signature` text NOT NULL,
  `allownotices` int(1) NOT NULL default '0',
  `hideemail` int(1) NOT NULL default '0',
  `subscriptionmethod` int(1) NOT NULL default '0',
  `invisible` int(1) NOT NULL default '0',
  `receivepms` int(1) NOT NULL default '0',
  `pmnotice` int(1) NOT NULL default '0',
  `pmnotify` int(1) NOT NULL default '0',
  `remember` int(1) NOT NULL default '0',
  `threadmode` varchar(8) NOT NULL default '',
  `showsigs` int(1) NOT NULL default '0',
  `showavatars` int(1) NOT NULL default '0',
  `showquickreply` int(1) NOT NULL default '0',
  `showredirect` int(1) NOT NULL default '0',
  `ppp` smallint(6) NOT NULL default '0',
  `tpp` smallint(6) NOT NULL default '0',
  `daysprune` smallint(6) NOT NULL default '0',
  `dateformat` varchar(4) NOT NULL default '',
  `timeformat` varchar(4) NOT NULL default '',
  `timezone` varchar(4) NOT NULL default '',
  `dst` int(1) NOT NULL default '0',
  `dstcorrection` int(1) NOT NULL default '0',
  `buddylist` text NOT NULL,
  `ignorelist` text NOT NULL,
  `style` smallint(5) unsigned NOT NULL default '0',
  `away` int(1) NOT NULL default '0',
  `awaydate` int(10) unsigned NOT NULL default '0',
  `returndate` varchar(15) NOT NULL default '',
  `awayreason` varchar(200) NOT NULL default '',
  `pmfolders` text NOT NULL,
  `notepad` text NOT NULL,
  `referrer` int(10) unsigned NOT NULL default '0',
  `reputation` bigint(30) NOT NULL default '0',
  `regip` varchar(50) NOT NULL default '',
  `lastip` varchar(50) NOT NULL default '',
  `longregip` int(11) NOT NULL default '0',
  `longlastip` int(11) NOT NULL default '0',
  `language` varchar(50) NOT NULL default '',
  `timeonline` bigint(30) NOT NULL default '0',
  `showcodebuttons` int(1) NOT NULL default '1',
  `totalpms` int(10) NOT NULL default '0',
  `unreadpms` int(10) NOT NULL default '0',
  `warningpoints` int(3) NOT NULL default '0',
  `moderateposts` int(1) NOT NULL default '0',
  `moderationtime` bigint(30) NOT NULL default '0',
  `suspendposting` int(1) NOT NULL default '0',
  `suspensiontime` bigint(30) NOT NULL default '0',
  `coppauser` int(1) NOT NULL default '0',
  `classicpostbit` int(1) NOT NULL default '0',
  `loginattempts` tinyint(2) NOT NULL default '1',
  `failedlogin` bigint(30) NOT NULL default '0',
  PRIMARY KEY  (`uid`),
  UNIQUE KEY `username` (`username`),
  KEY `usergroup` (`usergroup`),
  KEY `birthday` (`birthday`),
  KEY `longregip` (`longregip`),
  KEY `longlastip` (`longlastip`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `mybb_users`
-- 

INSERT INTO `mybb_users` VALUES (1, 'IceMan', '4bc470668b8397c3ab072e7a74930fc5', 'dasgjgPy', 'D1v5Ll8RigykMRak1EbeSm3apeyNVa242M5hnn4s4u5nRiS6Ha', 'bogdi.steaua@yahoo.com', 0, '', '', '0', 4, '', 0, '', 1292184764, 1292609840, 1292188631, 0, '', '', '', '', '', '', 'all', '', 1, 0, 0, 0, 1, 1, 1, 1, '', 1, 1, 1, 1, 0, 0, 0, '', '', '0', 0, 0, '', '', 0, 0, 0, '', '', '', '', 0, 0, '127.0.0.1', '127.0.0.1', 2130706433, 2130706433, '', 322, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_usertitles`
-- 

CREATE TABLE `mybb_usertitles` (
  `utid` smallint(5) unsigned NOT NULL auto_increment,
  `posts` int(10) unsigned NOT NULL default '0',
  `title` varchar(250) NOT NULL default '',
  `stars` smallint(4) NOT NULL default '0',
  `starimage` varchar(120) NOT NULL default '',
  PRIMARY KEY  (`utid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `mybb_usertitles`
-- 

INSERT INTO `mybb_usertitles` VALUES (1, 0, 'Newbie', 1, '');
INSERT INTO `mybb_usertitles` VALUES (2, 1, 'Junior Member', 2, '');
INSERT INTO `mybb_usertitles` VALUES (3, 50, 'Member', 3, '');
INSERT INTO `mybb_usertitles` VALUES (4, 250, 'Senior Member', 4, '');
INSERT INTO `mybb_usertitles` VALUES (5, 750, 'Posting Freak', 5, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_warninglevels`
-- 

CREATE TABLE `mybb_warninglevels` (
  `lid` int(10) unsigned NOT NULL auto_increment,
  `percentage` int(3) NOT NULL default '0',
  `action` text NOT NULL,
  PRIMARY KEY  (`lid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_warninglevels`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_warnings`
-- 

CREATE TABLE `mybb_warnings` (
  `wid` int(10) unsigned NOT NULL auto_increment,
  `uid` int(10) unsigned NOT NULL default '0',
  `tid` int(10) unsigned NOT NULL default '0',
  `pid` int(10) unsigned NOT NULL default '0',
  `title` varchar(120) NOT NULL default '',
  `points` int(10) unsigned NOT NULL default '0',
  `dateline` bigint(30) NOT NULL default '0',
  `issuedby` int(10) unsigned NOT NULL default '0',
  `expires` bigint(30) NOT NULL default '0',
  `expired` int(1) NOT NULL default '0',
  `daterevoked` bigint(30) NOT NULL default '0',
  `revokedby` int(10) unsigned NOT NULL default '0',
  `revokereason` text NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY  (`wid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_warnings`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mybb_warningtypes`
-- 

CREATE TABLE `mybb_warningtypes` (
  `tid` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(120) NOT NULL default '',
  `points` int(10) unsigned NOT NULL default '0',
  `expirationtime` bigint(30) NOT NULL default '0',
  PRIMARY KEY  (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `mybb_warningtypes`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `offers`
-- 

CREATE TABLE `offers` (
  `id` int(11) NOT NULL auto_increment,
  `sell` int(11) NOT NULL,
  `buy` int(11) NOT NULL,
  `sell_ress` varchar(5) character set latin1 collate latin1_german1_ci NOT NULL,
  `buy_ress` varchar(5) character set latin1 collate latin1_german1_ci NOT NULL,
  `multi` int(11) NOT NULL,
  `from_village` int(11) NOT NULL,
  `time` int(40) NOT NULL,
  `do_action` varchar(10) character set latin1 collate latin1_german1_ci NOT NULL,
  `ratio_max` double NOT NULL,
  `userid` int(11) NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `offers`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `offers_multi`
-- 

CREATE TABLE `offers_multi` (
  `id` int(11) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `offers_multi`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `quickbar`
-- 

CREATE TABLE `quickbar` (
  `id` int(11) NOT NULL auto_increment,
  `name` text collate latin1_general_ci NOT NULL,
  `img` text collate latin1_general_ci NOT NULL,
  `href` text collate latin1_general_ci NOT NULL,
  `target` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=82 ;

-- 
-- Dumping data for table `quickbar`
-- 

INSERT INTO `quickbar` VALUES (1, 'Hauptgebäude', 'graphic/buildings/main.png', 'game.php?screen=main', 0, 1);
INSERT INTO `quickbar` VALUES (2, 'Kaserne', 'graphic/buildings/barracks.png', 'game.php?screen=barracks', 0, 1);
INSERT INTO `quickbar` VALUES (3, 'Stall', 'graphic/buildings/stable.png', 'game.php?screen=stable', 0, 1);
INSERT INTO `quickbar` VALUES (4, 'Werkstatt', 'graphic/buildings/garage.png', 'game.php?screen=garage', 0, 1);
INSERT INTO `quickbar` VALUES (5, 'Adelshof', 'graphic/buildings/snob.png', 'game.php?screen=snob', 0, 1);
INSERT INTO `quickbar` VALUES (6, 'Schmiede', 'graphic/buildings/smith.png', 'game.php?screen=smith', 0, 1);
INSERT INTO `quickbar` VALUES (7, 'Platz', 'graphic/buildings/place.png', 'game.php?screen=place', 0, 1);
INSERT INTO `quickbar` VALUES (8, 'Markt', 'graphic/buildings/market.png', 'game.php?screen=market', 0, 1);
INSERT INTO `quickbar` VALUES (9, 'Hauptgebäude', 'graphic/buildings/main.png', 'game.php?screen=main', 0, 16);
INSERT INTO `quickbar` VALUES (10, 'Kaserne', 'graphic/buildings/barracks.png', 'game.php?screen=barracks', 0, 16);
INSERT INTO `quickbar` VALUES (11, 'Stall', 'graphic/buildings/stable.png', 'game.php?screen=stable', 0, 16);
INSERT INTO `quickbar` VALUES (12, 'Werkstatt', 'graphic/buildings/garage.png', 'game.php?screen=garage', 0, 16);
INSERT INTO `quickbar` VALUES (13, 'Adelshof', 'graphic/buildings/snob.png', 'game.php?screen=snob', 0, 16);
INSERT INTO `quickbar` VALUES (14, 'Schmiede', 'graphic/buildings/smith.png', 'game.php?screen=smith', 0, 16);
INSERT INTO `quickbar` VALUES (15, 'Platz', 'graphic/buildings/place.png', 'game.php?screen=place', 0, 16);
INSERT INTO `quickbar` VALUES (16, 'Markt', 'graphic/buildings/market.png', 'game.php?screen=market', 0, 16);
INSERT INTO `quickbar` VALUES (40, 'Platz', 'graphic/buildings/place.png', 'game.php?screen=place', 0, 19);
INSERT INTO `quickbar` VALUES (39, 'Schmiede', 'graphic/buildings/smith.png', 'game.php?screen=smith', 0, 19);
INSERT INTO `quickbar` VALUES (38, 'Adelshof', 'graphic/buildings/snob.png', 'game.php?screen=snob', 0, 19);
INSERT INTO `quickbar` VALUES (37, 'Werkstatt', 'graphic/buildings/garage.png', 'game.php?screen=garage', 0, 19);
INSERT INTO `quickbar` VALUES (36, 'Stall', 'graphic/buildings/stable.png', 'game.php?screen=stable', 0, 19);
INSERT INTO `quickbar` VALUES (35, 'Kaserne', 'graphic/buildings/barracks.png', 'game.php?screen=barracks', 0, 19);
INSERT INTO `quickbar` VALUES (34, 'Hauptgebäude', 'graphic/buildings/main.png', 'game.php?screen=main', 0, 19);
INSERT INTO `quickbar` VALUES (41, 'Markt', 'graphic/buildings/market.png', 'game.php?screen=market', 0, 19);
INSERT INTO `quickbar` VALUES (56, 'Platz', 'graphic/buildings/place.png', 'game.php?screen=place', 0, 17);
INSERT INTO `quickbar` VALUES (55, 'Schmiede', 'graphic/buildings/smith.png', 'game.php?screen=smith', 0, 17);
INSERT INTO `quickbar` VALUES (54, 'Adelshof', 'graphic/buildings/snob.png', 'game.php?screen=snob', 0, 17);
INSERT INTO `quickbar` VALUES (53, 'Werkstatt', 'graphic/buildings/garage.png', 'game.php?screen=garage', 0, 17);
INSERT INTO `quickbar` VALUES (52, 'Stall', 'graphic/buildings/stable.png', 'game.php?screen=stable', 0, 17);
INSERT INTO `quickbar` VALUES (51, 'Kaserne', 'graphic/buildings/barracks.png', 'game.php?screen=barracks', 0, 17);
INSERT INTO `quickbar` VALUES (50, 'Hauptgebäude', 'graphic/buildings/main.png', 'game.php?screen=main', 0, 17);
INSERT INTO `quickbar` VALUES (57, 'Markt', 'graphic/buildings/market.png', 'game.php?screen=market', 0, 17);
INSERT INTO `quickbar` VALUES (80, 'Platz', 'graphic/buildings/place.png', 'game.php?screen=place', 0, 58);
INSERT INTO `quickbar` VALUES (79, 'Schmiede', 'graphic/buildings/smith.png', 'game.php?screen=smith', 0, 58);
INSERT INTO `quickbar` VALUES (78, 'Adelshof', 'graphic/buildings/snob.png', 'game.php?screen=snob', 0, 58);
INSERT INTO `quickbar` VALUES (77, 'Werkstatt', 'graphic/buildings/garage.png', 'game.php?screen=garage', 0, 58);
INSERT INTO `quickbar` VALUES (76, 'Stall', 'graphic/buildings/stable.png', 'game.php?screen=stable', 0, 58);
INSERT INTO `quickbar` VALUES (75, 'Kaserne', 'graphic/buildings/barracks.png', 'game.php?screen=barracks', 0, 58);
INSERT INTO `quickbar` VALUES (74, 'Hauptgebäude', 'graphic/buildings/main.png', 'game.php?screen=main', 0, 58);
INSERT INTO `quickbar` VALUES (81, 'Markt', 'graphic/buildings/market.png', 'game.php?screen=market', 0, 58);

-- --------------------------------------------------------

-- 
-- Table structure for table `recruit`
-- 

CREATE TABLE `recruit` (
  `id` int(11) NOT NULL auto_increment,
  `unit` varchar(40) character set latin1 collate latin1_german1_ci NOT NULL,
  `num_unit` int(15) default '0',
  `num_finished` int(15) default '0',
  `last_reload` int(15) default '-1',
  `time_finished` int(15) NOT NULL,
  `time_start` int(15) NOT NULL,
  `time_per_unit` varchar(30) character set latin1 collate latin1_german1_ci default NULL,
  `building` varchar(35) character set latin1 collate latin1_german1_ci NOT NULL,
  `villageid` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `building` (`building`),
  KEY `villageid` (`villageid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `recruit`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `reports`
-- 

CREATE TABLE `reports` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(230) character set latin1 collate latin1_german1_ci NOT NULL,
  `title_image` varchar(200) character set latin1 collate latin1_german1_ci NOT NULL,
  `time` int(25) NOT NULL,
  `type` varchar(40) character set latin1 collate latin1_german1_ci NOT NULL,
  `a_units` varchar(350) character set latin1 collate latin1_german1_ci NOT NULL,
  `b_units` varchar(350) character set latin1 collate latin1_german1_ci NOT NULL,
  `c_units` varchar(350) character set latin1 collate latin1_german1_ci NOT NULL,
  `d_units` varchar(350) character set latin1 collate latin1_german1_ci NOT NULL,
  `e_units` varchar(350) character set latin1 collate latin1_german1_ci default NULL,
  `agreement` varchar(20) character set latin1 collate latin1_german1_ci NOT NULL,
  `ram` varchar(15) character set latin1 collate latin1_german1_ci NOT NULL,
  `catapult` varchar(40) character set latin1 collate latin1_german1_ci NOT NULL,
  `message` text character set latin1 collate latin1_german1_ci NOT NULL,
  `to_user` int(11) NOT NULL,
  `from_user` int(11) NOT NULL,
  `to_village` int(11) NOT NULL,
  `from_village` int(11) NOT NULL,
  `receiver_userid` int(11) NOT NULL,
  `is_new` int(1) NOT NULL default '1',
  `in_group` varchar(40) character set latin1 collate latin1_german1_ci default NULL,
  `luck` varchar(6) character set latin1 collate latin1_german1_ci default NULL,
  `moral` int(6) default NULL,
  `wins` varchar(15) character set latin1 collate latin1_german1_ci NOT NULL,
  `hives` varchar(100) character set latin1 collate latin1_german1_ci NOT NULL,
  `see_def_units` int(1) NOT NULL default '1',
  `ally` int(11) NOT NULL,
  `allyname` varchar(200) character set latin1 collate latin1_german1_ci NOT NULL,
  `from_username` varchar(200) collate utf8_unicode_ci NOT NULL,
  `to_username` varchar(200) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `receiver_userid` (`receiver_userid`),
  KEY `group` (`in_group`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `reports`
-- 

INSERT INTO `reports` VALUES (1, 'GeorgeXD has deleted himself from your friends list', '', 1335632122, 'delete_friend', '', '', '', '', NULL, '', '', '', '', 41, 17, 0, 0, 41, 1, 'other', NULL, NULL, '', '', 1, 0, '', 'GeorgeXD', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `research`
-- 

CREATE TABLE `research` (
  `id` int(11) NOT NULL auto_increment,
  `research` varchar(30) character set latin1 collate latin1_german1_ci NOT NULL,
  `villageid` int(11) NOT NULL,
  `end_time` int(25) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `villageid` (`villageid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `research`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `run_events`
-- 

CREATE TABLE `run_events` (
  `id` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `run_events`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `save_players`
-- 

CREATE TABLE `save_players` (
  `id` int(11) NOT NULL auto_increment,
  `round_id` int(11) NOT NULL default '0',
  `username` varchar(200) character set latin1 collate latin1_german1_ci NOT NULL default '',
  `rank` int(20) NOT NULL default '0',
  `ally` varchar(20) character set latin1 collate latin1_german1_ci NOT NULL default '',
  `points` int(20) NOT NULL default '0',
  `villages` int(20) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `save_players`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `save_rounds`
-- 

CREATE TABLE `save_rounds` (
  `id` int(11) NOT NULL auto_increment,
  `start` varchar(80) character set latin1 collate latin1_german1_ci NOT NULL default '',
  `end` varchar(80) character set latin1 collate latin1_german1_ci NOT NULL default '',
  `description` text character set latin1 collate latin1_german1_ci NOT NULL,
  `speed_units` varchar(10) character set latin1 collate latin1_german1_ci NOT NULL default '',
  `moral` int(1) NOT NULL default '0',
  `speed` int(20) NOT NULL default '0',
  `name` varchar(200) character set latin1 collate latin1_german1_ci NOT NULL default '',
  `map` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `save_rounds`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `sessions`
-- 

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  `sid` varchar(32) character set latin1 collate latin1_german1_ci NOT NULL,
  `hkey` varchar(4) character set latin1 collate latin1_german1_ci NOT NULL,
  `is_vacation` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `sid` (`sid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

-- 
-- Dumping data for table `sessions`
-- 

INSERT INTO `sessions` VALUES (1, 7, 'a6jRNndkN96IM9jwOCIHwfDIZgVyOoUE', '4Rs0', 0);
INSERT INTO `sessions` VALUES (3, 8, '4kH6eDqfB0spLb81Nmi4jhi2n9ZRCGG2', '76fw', 0);
INSERT INTO `sessions` VALUES (8, 16, 'MOrwP7E7GewaomSFBd44m1VkiuOWtRzR', 'vPxz', 0);
INSERT INTO `sessions` VALUES (16, 17, 'sz30Ecw6sJqYmhXslqRUPgk9Pn5yNTmW', 'HmSF', 0);
INSERT INTO `sessions` VALUES (18, 18, 'Z0ZMzPAHdoJafbuowau6oNOwG31mJogP', 'pN5F', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `support`
-- 

CREATE TABLE `support` (
  `id` int(11) NOT NULL auto_increment,
  `subject` text collate latin1_general_ci NOT NULL,
  `uid` int(11) NOT NULL,
  `date` varchar(120) character set utf8 collate utf8_unicode_ci NOT NULL,
  `username` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL,
  `new` int(11) NOT NULL default '0',
  `message` text collate latin1_general_ci NOT NULL,
  `display` int(11) NOT NULL default '0',
  `reply` text character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=108 ;

-- 
-- Dumping data for table `support`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `unit_place`
-- 

CREATE TABLE `unit_place` (
  `unit_spear` int(11) default '0',
  `unit_sword` int(11) default '0',
  `unit_axe` int(11) default '0',
  `unit_spy` int(11) default '0',
  `unit_light` int(11) default '0',
  `unit_heavy` int(11) default '0',
  `unit_ram` int(11) default '0',
  `unit_catapult` int(11) default '0',
  `unit_marcher` int(11) default '0',
  `unit_archer` int(11) default '0',
  `unit_snob` int(5) default '0',
  `villages_from_id` int(11) NOT NULL default '0',
  `villages_to_id` int(11) NOT NULL default '0',
  `unit_Arcas` int(11) default '0',
  KEY `villages_from_id` (`villages_from_id`),
  KEY `villages_to_id` (`villages_to_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `unit_place`
-- 

INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2, 0);
INSERT INTO `unit_place` VALUES (2101, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 0);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 0);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 6, 0);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7, 7, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(150) collate utf8_unicode_ci default NULL,
  `password` varchar(32) collate utf8_unicode_ci NOT NULL default '',
  `banned` enum('Y','N') collate utf8_unicode_ci NOT NULL default 'N',
  `villages` int(10) NOT NULL,
  `points` int(20) NOT NULL,
  `ennobled_by` varchar(90) collate utf8_unicode_ci NOT NULL,
  `aktu_group` int(11) NOT NULL default '0',
  `aktu_page` int(11) NOT NULL default '0',
  `villages_per_page` int(11) NOT NULL default '25',
  `ally` int(11) NOT NULL default '-1',
  `ally_titel` varchar(200) collate utf8_unicode_ci NOT NULL,
  `ally_found` int(1) NOT NULL default '0',
  `ally_lead` int(1) NOT NULL default '0',
  `ally_invite` int(1) NOT NULL default '0',
  `ally_diplomacy` int(1) NOT NULL default '0',
  `ally_mass_mail` int(1) NOT NULL default '0',
  `rang` int(11) NOT NULL,
  `villages_mode` varchar(25) collate utf8_unicode_ci NOT NULL default 'prod',
  `attacks` int(5) default '0',
  `new_report` int(1) NOT NULL default '0',
  `new_mail` int(1) default '0',
  `market_sell` varchar(10) collate utf8_unicode_ci NOT NULL default 'all',
  `market_buy` varchar(10) collate utf8_unicode_ci NOT NULL default 'all',
  `market_ratio_max` varchar(5) collate utf8_unicode_ci NOT NULL default '3',
  `killed_units_att` int(25) NOT NULL,
  `killed_units_att_rank` int(11) NOT NULL,
  `killed_units_def` int(25) NOT NULL,
  `killed_units_def_rank` int(25) NOT NULL,
  `killed_units_altogether` int(25) NOT NULL,
  `killed_units_altogether_rank` int(11) NOT NULL,
  `do_action` varchar(32) collate utf8_unicode_ci NOT NULL,
  `last_activity` int(35) NOT NULL,
  `birthday` varchar(10) collate utf8_unicode_ci NOT NULL,
  `vacation_id` int(11) NOT NULL default '-1',
  `vacation_name` varchar(150) collate utf8_unicode_ci NOT NULL,
  `vacation_accept` int(1) NOT NULL default '0',
  `b_day` int(2) NOT NULL,
  `b_month` int(2) NOT NULL,
  `b_year` int(4) NOT NULL,
  `sex` enum('f','m','x') collate utf8_unicode_ci NOT NULL default 'x',
  `home` varchar(150) collate utf8_unicode_ci NOT NULL,
  `image` varchar(20) collate utf8_unicode_ci NOT NULL,
  `personal_text` text collate utf8_unicode_ci NOT NULL,
  `window_width` int(4) NOT NULL default '840',
  `show_toolbar` int(1) NOT NULL default '1',
  `dyn_menu` int(1) NOT NULL default '1',
  `confirm_queue` int(1) NOT NULL default '1',
  `map_size` int(2) NOT NULL default '9',
  `memo` text collate utf8_unicode_ci NOT NULL,
  `map_reload` text collate utf8_unicode_ci NOT NULL,
  `graphical_overwiev` tinyint(1) NOT NULL default '1',
  `overview` varchar(5) collate utf8_unicode_ci NOT NULL default 'new',
  `stufen` varchar(5) collate utf8_unicode_ci NOT NULL default 'yes',
  `winter` varchar(30) collate utf8_unicode_ci NOT NULL,
  `graphical_overview` int(1) NOT NULL default '1',
  `labels` int(1) NOT NULL default '1',
  `group` int(1) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `username` (`username`),
  KEY `rang` (`rang`),
  KEY `vacation_id` (`vacation_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (1, 'bot1', '639ca6172daf2f1acf5ed7a363fd232b', 'N', 0, 0, '', 0, 0, 25, -1, '', 0, 0, 0, 0, 0, 18, 'prod', 0, 0, 0, 'all', 'all', '3', 0, 0, 0, 0, 0, 0, '', 0, '', -1, '', 0, 0, 0, 0, 'x', '', '', '', 840, 1, 1, 1, 9, '', '', 1, 'new', 'yes', '', 1, 1, 1);
INSERT INTO `users` VALUES (2, 'bot2', '9e57f94970f6c4caa792c90959f5668c', 'N', 0, 0, '', 0, 0, 25, -1, '', 0, 0, 0, 0, 0, 17, 'prod', 0, 0, 0, 'all', 'all', '3', 0, 0, 0, 0, 0, 0, '', 0, '', -1, '', 0, 0, 0, 0, 'x', '', '', '', 840, 1, 1, 1, 9, '', '', 1, 'new', 'yes', '', 1, 1, 1);
INSERT INTO `users` VALUES (3, 'bot3', '7d6ef201026cfb50dd0d2023a8b6e277', 'N', 0, 0, '', 0, 0, 25, -1, '', 0, 0, 0, 0, 0, 16, 'prod', 0, 0, 0, 'all', 'all', '3', 0, 0, 0, 0, 0, 0, '', 0, '', -1, '', 0, 0, 0, 0, 'x', '', '', '', 840, 1, 1, 1, 9, '', '', 1, 'new', 'yes', '', 1, 1, 1);
INSERT INTO `users` VALUES (4, 'bot4', '98558e78d4d4ee4629ae30dd5b8889ef', 'N', 0, 0, '', 0, 0, 25, -1, '', 0, 0, 0, 0, 0, 15, 'prod', 0, 0, 0, 'all', 'all', '3', 0, 0, 0, 0, 0, 0, '', 0, '', -1, '', 0, 0, 0, 0, 'x', '', '', '', 840, 1, 1, 1, 9, '', '', 1, 'new', 'yes', '', 1, 1, 1);
INSERT INTO `users` VALUES (5, 'bot5', '962012d09b8170d912f0669f6d7d9d07', 'N', 0, 0, '', 0, 0, 25, -1, '', 0, 0, 0, 0, 0, 14, 'prod', 0, 0, 0, 'all', 'all', '3', 0, 0, 0, 0, 0, 0, '', 0, '', -1, '', 0, 0, 0, 0, 'x', '', '', '', 840, 1, 1, 1, 9, '', '', 1, 'new', 'yes', '', 1, 1, 1);
INSERT INTO `users` VALUES (6, 'bot6', '962012d09b8170d912f0669f6d7d9d07', 'N', 0, 0, '', 0, 0, 25, -1, '', 0, 0, 0, 0, 0, 13, 'prod', 0, 0, 0, 'all', 'all', '3', 0, 0, 0, 0, 0, 0, '', 0, '', -1, '', 0, 0, 0, 0, 'x', '', '', '', 840, 1, 1, 1, 9, '', '', 1, 'new', 'yes', '', 1, 1, 1);
INSERT INTO `users` VALUES (7, 'bot7', '962012d09b8170d912f0669f6d7d9d07', 'N', 0, 0, '', 0, 0, 25, -1, '', 0, 0, 0, 0, 0, 5, 'prod', 0, 0, 0, 'all', 'all', '3', 0, 0, 0, 0, 0, 0, '', 1308290384, '', -1, '', 0, 0, 0, 0, 'x', '', '', '', 840, 1, 1, 1, 9, '', '', 1, 'new', 'yes', '', 1, 1, 1);
INSERT INTO `users` VALUES (8, 'test', '098f6bcd4621d373cade4e832627b4f6', 'N', 0, 0, '', 0, 0, 25, -1, '', 0, 0, 0, 0, 0, 4, 'prod', 0, 0, 0, 'all', 'all', '3', 0, 0, 0, 0, 0, 0, '', 1308290646, '', -1, '', 0, 0, 0, 0, 'x', '', '', '', 840, 1, 1, 1, 9, '', '', 1, 'new', 'yes', '', 1, 1, 1);
INSERT INTO `users` VALUES (9, '5555', '6074c6aa3488f3c2dddff2a7ca821aab', 'N', 0, 0, '', 0, 0, 25, -1, '', 0, 0, 0, 0, 0, 12, 'prod', 0, 0, 0, 'all', 'all', '3', 0, 0, 0, 0, 0, 0, '', 0, '', -1, '', 0, 0, 0, 0, 'x', '', '', '', 840, 1, 1, 1, 9, '', '', 1, 'new', 'yes', '', 1, 1, 1);
INSERT INTO `users` VALUES (10, '6666', 'e9510081ac30ffa83f10b68cde1cac07', 'N', 0, 0, '', 0, 0, 25, -1, '', 0, 0, 0, 0, 0, 11, 'prod', 0, 0, 0, 'all', 'all', '3', 0, 0, 0, 0, 0, 0, '', 0, '', -1, '', 0, 0, 0, 0, 'x', '', '', '', 840, 1, 1, 1, 9, '', '', 1, 'new', 'yes', '', 1, 1, 1);
INSERT INTO `users` VALUES (11, '7777', 'd79c8788088c2193f0244d8f1f36d2db', 'N', 0, 0, '', 0, 0, 25, -1, '', 0, 0, 0, 0, 0, 10, 'prod', 0, 0, 0, 'all', 'all', '3', 0, 0, 0, 0, 0, 0, '', 0, '', -1, '', 0, 0, 0, 0, 'x', '', '', '', 840, 1, 1, 1, 9, '', '', 1, 'new', 'yes', '', 1, 1, 1);
INSERT INTO `users` VALUES (12, '8888', 'cf79ae6addba60ad018347359bd144d2', 'N', 0, 0, '', 0, 0, 25, -1, '', 0, 0, 0, 0, 0, 6, 'prod', 0, 0, 0, 'all', 'all', '3', 0, 0, 0, 0, 0, 0, '', 0, '', -1, '', 0, 0, 0, 0, 'x', '', '', '', 840, 1, 1, 1, 9, '', '', 1, 'new', 'yes', '', 1, 1, 1);
INSERT INTO `users` VALUES (13, '9999', 'fa246d0262c3925617b0c72bb20eeb1d', 'N', 0, 0, '', 0, 0, 25, -1, '', 0, 0, 0, 0, 0, 7, 'prod', 0, 0, 0, 'all', 'all', '3', 0, 0, 0, 0, 0, 0, '', 0, '', -1, '', 0, 0, 0, 0, 'x', '', '', '', 840, 1, 1, 1, 9, '', '', 1, 'new', 'yes', '', 1, 1, 1);
INSERT INTO `users` VALUES (14, '1111', 'b59c67bf196a4758191e42f76670ceba', 'N', 0, 0, '', 0, 0, 25, -1, '', 0, 0, 0, 0, 0, 8, 'prod', 0, 0, 0, 'all', 'all', '3', 0, 0, 0, 0, 0, 0, '', 0, '', -1, '', 0, 0, 0, 0, 'x', '', '', '', 840, 1, 1, 1, 9, '', '', 1, 'new', 'yes', '', 1, 1, 1);
INSERT INTO `users` VALUES (15, '2222', '934b535800b1cba8f96a5d72f72f1611', 'N', 0, 0, '', 0, 0, 25, -1, '', 0, 0, 0, 0, 0, 9, 'prod', 0, 0, 0, 'all', 'all', '3', 0, 0, 0, 0, 0, 0, '', 0, '', -1, '', 0, 0, 0, 0, 'x', '', '', '', 840, 1, 1, 1, 9, '', '', 1, 'new', 'yes', '', 1, 1, 1);
INSERT INTO `users` VALUES (16, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'N', 0, 0, '', 0, 0, 25, 1, '', 1, 1, 1, 1, 1, 1, 'prod', 0, 0, 0, 'all', 'all', '3', 0, 0, 0, 0, 0, 0, '', 1308382691, '', -1, '', 0, 0, 0, 0, 'x', '', '', '', 840, 1, 1, 1, 9, '', '', 1, 'new', 'yes', '', 1, 1, 1);
INSERT INTO `users` VALUES (17, 'GeorgeXD', 'a8867c89e103c5ea83c22c47864a0187', 'N', 0, 0, '', 0, 0, 25, -1, '', 0, 0, 0, 0, 0, 2, 'prod', 0, 0, 0, 'all', 'all', '3', 0, 0, 0, 0, 0, 0, '', 1335683728, '', -1, '', 0, 0, 0, 0, 'x', '', '', '', 840, 1, 1, 1, 9, '', '', 1, 'new', 'yes', '', 1, 1, 1);
INSERT INTO `users` VALUES (18, 'ice41', '394961af481e4bdc0c598b4d259bca4d', 'N', 1, 5480, '', 0, 0, 25, -1, '', 0, 0, 0, 0, 0, 3, 'prod', 0, 0, 0, 'all', 'all', '3', 0, 0, 0, 0, 0, 0, '', 1482523796, '', -1, '', 0, 0, 0, 0, 'x', '', '', '', 840, 1, 1, 1, 9, '', '', 1, 'new', 'yes', '', 1, 1, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `villages`
-- 

CREATE TABLE `villages` (
  `id` int(11) NOT NULL auto_increment,
  `bonus` int(11) NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `name` varchar(100) collate utf8_unicode_ci default NULL,
  `userid` int(11) NOT NULL,
  `r_wood` varchar(230) collate utf8_unicode_ci default '500',
  `r_stone` varchar(230) collate utf8_unicode_ci default '500',
  `r_iron` varchar(230) collate utf8_unicode_ci default '400',
  `r_bh` int(15) NOT NULL default '0',
  `last_prod_aktu` int(35) NOT NULL,
  `points` int(11) NOT NULL,
  `continent` int(6) NOT NULL,
  `main` int(5) default '20',
  `barracks` int(5) default '15',
  `stable` int(5) default '15',
  `garage` int(5) default '10',
  `snob` int(5) default '3',
  `smith` int(5) default '20',
  `place` int(5) default '1',
  `market` int(5) default '10',
  `wood` int(5) default '25',
  `stone` int(5) default '25',
  `iron` int(5) default '25',
  `storage` int(5) default '25',
  `farm` int(5) default '30',
  `hide` int(5) default '10',
  `wall` int(5) default '20',
  `groups` varchar(1000) collate utf8_unicode_ci NOT NULL,
  `unit_spear_tec_level` int(11) default '1',
  `unit_sword_tec_level` int(11) default '0',
  `unit_axe_tec_level` int(11) default '0',
  `unit_spy_tec_level` int(11) default '1',
  `unit_light_tec_level` int(11) default '0',
  `unit_heavy_tec_level` int(11) default '0',
  `unit_ram_tec_level` int(11) default '0',
  `unit_catapult_tec_level` int(11) default '0',
  `unit_marcher_tec_level` int(11) default '1',
  `unit_archer_tec_level` int(11) default '1',
  `unit_snob_tec_level` int(11) default '1',
  `trader_away` int(5) default '0',
  `main_build` varchar(200) collate utf8_unicode_ci NOT NULL,
  `all_unit_spear` int(6) NOT NULL default '0',
  `all_unit_sword` int(6) default '0',
  `all_unit_axe` int(6) default '0',
  `all_unit_spy` int(6) default '0',
  `all_unit_light` int(6) default '0',
  `all_unit_heavy` int(6) default '0',
  `all_unit_ram` int(6) default '0',
  `all_unit_catapult` int(6) default '0',
  `all_unit_marcher` int(6) default '0',
  `all_unit_archer` int(6) default '0',
  `all_unit_snob` int(6) default '0',
  `recruited_snobs` int(5) default '0',
  `control_villages` int(5) default '0',
  `attacks` int(5) default '0',
  `agreement` varchar(200) collate utf8_unicode_ci default '100',
  `agreement_aktu` int(35) NOT NULL,
  `snobed_by` int(11) default '-1',
  `dealers_outside` int(6) NOT NULL default '0',
  `create_time` int(40) NOT NULL,
  `smith_tec` varchar(200) collate utf8_unicode_ci NOT NULL,
  `conmap_con` varchar(10) collate utf8_unicode_ci NOT NULL,
  `unit_Arcas_tec_level` int(11) default '0',
  `all_unit_Arcas` int(6) default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `x_2` (`x`,`y`),
  KEY `name` (`name`),
  KEY `userid` (`userid`),
  FULLTEXT KEY `name_2` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `villages`
-- 

INSERT INTO `villages` VALUES (1, 0, 525, 526, 'bot7s+Dorf', 0, '4726.25', '4726.25', '4626.25', 2014, 1308290384, 5480, 55, 20, 15, 15, 10, 3, 20, 1, 10, 25, 25, 25, 25, 30, 10, 20, '', 1, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1308290357, '', '55-0-0', 0, 0);
INSERT INTO `villages` VALUES (2, 0, 524, 527, 'tests+Dorf', 0, '21944.3055556', '21944.3055556', '21844.3055556', 2014, 1308290646, 5480, 55, 20, 15, 15, 10, 3, 20, 1, 10, 25, 25, 25, 25, 30, 10, 20, '', 1, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1308290509, '', '55-0-0', 0, 0);
INSERT INTO `villages` VALUES (3, 0, 526, 523, 'Satul lui admin', 0, '142373', '142373', '142373', 4207, 1308382691, 5809, 55, 22, 16, 16, 10, 3, 20, 1, 10, 25, 26, 25, 25, 30, 10, 20, '', 1, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 0, '', 2101, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1308290760, '', '55-0-0', 0, 0);
INSERT INTO `villages` VALUES (4, 0, 525, 524, 'Satul lui GeorgeXD', 0, '114525.250001', '109524.250001', '126862.250001', 2086, 1335683728, 5773, 55, 21, 17, 17, 11, 3, 20, 1, 10, 25, 25, 25, 25, 30, 10, 20, '', 1, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1335629181, '', '55-0-0', 0, 0);
INSERT INTO `villages` VALUES (5, 0, 528, 528, 'Satul lui ice41', 0, '10842.4722223', '10352.4722223', '14265.4722223', 2025, 1482523519, 5522, 55, 20, 16, 15, 10, 3, 20, 1, 10, 25, 25, 25, 25, 30, 10, 20, '', 1, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1482523412, '', '55-0-0', 0, 0);
INSERT INTO `villages` VALUES (6, 0, 522, 526, 'Satul lui ice41', 18, '4726.25', '4726.25', '4626.25', 2014, 1482523796, 5480, 55, 20, 15, 15, 10, 3, 20, 1, 10, 25, 25, 25, 25, 30, 10, 20, '', 1, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1482523769, '', '55-0-0', 0, 0);
INSERT INTO `villages` VALUES (7, 0, 528, 525, 'Sat+de+Barbari', -1, '500', '500', '400', 2014, 1482523769, 5480, 55, 20, 15, 15, 10, 3, 20, 1, 10, 25, 25, 25, 25, 30, 10, 20, '', 1, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1482523769, '', '55-0-0', 0, 0);
