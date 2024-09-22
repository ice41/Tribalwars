-- phpMyAdmin SQL Dump
-- version 2.9.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 23, 2016 at 08:12 PM
-- Server version: 5.0.24
-- PHP Version: 4.4.4
-- 
-- Database: `ro2`
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
  KEY `short` (`short`),
  FULLTEXT KEY `intro_igm` (`intro_igm`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `ally`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `ally_events`
-- 


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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `announcement`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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

INSERT INTO `create_village` VALUES (1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 6);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `events`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `logins`
-- 


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `quickbar`
-- 


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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `reports`
-- 


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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `sessions`
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
  `unit_snob` int(5) default '0',
  `villages_from_id` int(11) NOT NULL default '0',
  `villages_to_id` int(11) NOT NULL default '0',
  KEY `villages_from_id` (`villages_from_id`),
  KEY `villages_to_id` (`villages_to_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `unit_place`
-- 


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
  PRIMARY KEY  (`id`),
  KEY `username` (`username`),
  KEY `rang` (`rang`),
  KEY `vacation_id` (`vacation_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `users`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `villages`
-- 

CREATE TABLE `villages` (
  `id` int(11) NOT NULL auto_increment,
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
  `main` int(5) default '1',
  `barracks` int(5) default '0',
  `stable` int(5) default '0',
  `garage` int(5) default '0',
  `snob` int(5) default '0',
  `smith` int(5) default '0',
  `place` int(5) default '1',
  `market` int(5) default '0',
  `wood` int(5) default '0',
  `stone` int(5) default '0',
  `iron` int(5) default '0',
  `storage` int(5) default '1',
  `farm` int(5) default '1',
  `hide` int(5) default '1',
  `wall` int(5) default '0',
  `unit_spear_tec_level` int(11) default '1',
  `unit_sword_tec_level` int(11) default '0',
  `unit_axe_tec_level` int(11) default '0',
  `unit_spy_tec_level` int(11) default '1',
  `unit_light_tec_level` int(11) default '0',
  `unit_heavy_tec_level` int(11) default '0',
  `unit_ram_tec_level` int(11) default '0',
  `unit_catapult_tec_level` int(11) default '0',
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
  PRIMARY KEY  (`id`),
  UNIQUE KEY `x_2` (`x`,`y`),
  KEY `name` (`name`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `villages`
-- 

