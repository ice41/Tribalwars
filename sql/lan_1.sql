-- phpMyAdmin SQL Dump
-- version 2.9.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 23, 2016 at 08:01 PM
-- Server version: 5.0.24
-- PHP Version: 4.4.4
-- 
-- Database: `lan_1`
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
  `rezerwacje_czas` int(11) NOT NULL default '3',
  `rezerwacje_max` int(11) NOT NULL default '5',
  PRIMARY KEY  (`id`),
  KEY `rank` (`rank`),
  KEY `name` (`name`),
  KEY `short` (`short`)
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `announcement`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `bot`
-- 

CREATE TABLE `bot` (
  `villageid` int(4) NOT NULL,
  `type` enum('deff','off','spy') collate latin1_general_ci NOT NULL,
  `finish_tec` enum('y','n') collate latin1_general_ci NOT NULL,
  `finish_build` enum('y','n') collate latin1_general_ci NOT NULL,
  `main` int(4) NOT NULL,
  `barracks` int(4) NOT NULL,
  `stable` int(4) NOT NULL,
  `garage` int(4) NOT NULL,
  `snob` int(4) NOT NULL,
  `smith` int(4) NOT NULL,
  `place` int(4) NOT NULL,
  `market` int(4) NOT NULL,
  `wood` int(4) NOT NULL,
  `stone` int(4) NOT NULL,
  `iron` int(4) NOT NULL,
  `storage` int(4) NOT NULL,
  `farm` int(4) NOT NULL,
  `hide` int(4) NOT NULL,
  `wall` int(4) NOT NULL,
  `tec_spear` enum('y','n') collate latin1_general_ci NOT NULL default 'y',
  `tec_sword` enum('y','n') collate latin1_general_ci NOT NULL default 'y',
  `tec_axe` enum('y','n') collate latin1_general_ci NOT NULL default 'y',
  `tec_spy` enum('y','n') collate latin1_general_ci NOT NULL default 'y',
  `tec_light` enum('y','n') collate latin1_general_ci NOT NULL default 'y',
  `tec_heavy` enum('y','n') collate latin1_general_ci NOT NULL default 'y',
  `tec_ram` enum('y','n') collate latin1_general_ci NOT NULL default 'y',
  `tec_catapult` enum('y','n') collate latin1_general_ci NOT NULL default 'y',
  `next_build` varchar(32) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`villageid`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `bot`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `build`
-- 


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
-- Table structure for table `dzielenie_rezerwacji`
-- 

CREATE TABLE `dzielenie_rezerwacji` (
  `id` int(11) NOT NULL auto_increment,
  `do_plemienia` int(11) NOT NULL default '0',
  `od_plemienia` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `dzielenie_rezerwacji`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `events`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `kontrakty`
-- 

CREATE TABLE `kontrakty` (
  `id` int(7) NOT NULL auto_increment,
  `od_plemienia` int(6) NOT NULL,
  `do_plemienia` int(6) NOT NULL,
  `typ` varchar(10) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `kontrakty`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `krzaki`
-- 

CREATE TABLE `krzaki` (
  `id` int(11) NOT NULL auto_increment,
  `x` int(4) NOT NULL,
  `y` int(4) NOT NULL,
  `typ` varchar(25) collate latin1_general_ci NOT NULL,
  `typ2` varchar(10) collate latin1_general_ci NOT NULL default 'krzak',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `krzaki`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `logins`
-- 

INSERT INTO `logins` VALUES (1, 'sir roland', 1327956114, '127.0.0.1', 1, '');
INSERT INTO `logins` VALUES (2, 'sir roland', 1327956239, '127.0.0.1', 1, '');
INSERT INTO `logins` VALUES (3, 'ice41', 1482522026, '127.0.0.1', 2, '');

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
-- Table structure for table `odznaczenia`
-- 

CREATE TABLE `odznaczenia` (
  `id` int(11) NOT NULL auto_increment,
  `od_gracza` int(11) NOT NULL,
  `do_gracza` int(11) NOT NULL,
  `kolor` varchar(15) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `odznaczenia`
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
  `userid` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `building` (`building`),
  KEY `villageid` (`villageid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

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
  `f_units` varchar(500) collate utf8_unicode_ci NOT NULL,
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
  `hives` varchar(600) character set latin1 collate latin1_german1_ci NOT NULL,
  `see_def_units` int(1) NOT NULL default '1',
  `ally` int(11) NOT NULL,
  `allyname` varchar(200) character set latin1 collate latin1_german1_ci NOT NULL,
  `from_username` varchar(200) collate utf8_unicode_ci NOT NULL,
  `to_username` varchar(200) collate utf8_unicode_ci NOT NULL,
  `sorowce_poz` varchar(100) collate utf8_unicode_ci NOT NULL,
  `budynki` varchar(300) collate utf8_unicode_ci NOT NULL,
  `att_pala_item` varchar(55) collate utf8_unicode_ci NOT NULL,
  `def_pala_item` varchar(55) collate utf8_unicode_ci NOT NULL,
  `att_pala_name` varchar(35) collate utf8_unicode_ci NOT NULL,
  `def_pala_name` varchar(35) collate utf8_unicode_ci NOT NULL,
  `pala_find_item` varchar(55) collate utf8_unicode_ci NOT NULL,
  `bonus_noc` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `receiver_userid` (`receiver_userid`),
  KEY `group` (`in_group`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `reports`
-- 

INSERT INTO `reports` VALUES (1, 'Otrzymane odznaczenie: Król punktów (Drewno - Stopieñ 1)  ', '', 1327956116, 'get_award', '', '', '', '', NULL, '', '', '', '', '', 0, 0, 0, 0, 1, 1, 'other', NULL, NULL, '', '<h3>Król punktów (Drewno - Stopieñ 1)</h3><div class="award level1" style="float: left; margin-right: 10px;"><img src="graphic/awards/odznaczenie_punkty.png" alt=""></div><p>Zdoby³eœ ju¿ 100 punktów!</p><p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id=1">Zobacz swoje odznaczenia</a></p>', 1, 0, '', '', '', '', '', '', '', '', '', '', 0);
INSERT INTO `reports` VALUES (2, 'Otrzymane odznaczenie: Najlepszy zdobywca (Z³oto - Stopieñ 4)  ', '', 1327956116, 'get_award', '', '', '', '', NULL, '', '', '', '', '', 0, 0, 0, 0, 1, 1, 'other', NULL, NULL, '', '<h3>Najlepszy zdobywca (Z³oto - Stopieñ 4)</h3><div class="award level4" style="float: left; margin-right: 10px;"><img src="graphic/awards/odznaczenie_ranking.png" alt=""></div><p>Dosta³eœ siê do czo³owej 1 tego œwiata!</p><p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id=1">Zobacz swoje odznaczenia</a></p>', 1, 0, '', '', '', '', '', '', '', '', '', '', 0);

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
-- Table structure for table `rezerwacje`
-- 

CREATE TABLE `rezerwacje` (
  `id` int(11) NOT NULL auto_increment,
  `do_wioski` int(11) NOT NULL,
  `od_gracza` int(11) NOT NULL,
  `od_plemienia` int(11) NOT NULL,
  `start` int(11) NOT NULL,
  `koniec` int(11) NOT NULL,
  `od_gname` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx1` (`od_gracza`),
  KEY `idx2` (`od_plemienia`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `rezerwacje`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `rezerwacje_log`
-- 

CREATE TABLE `rezerwacje_log` (
  `id` int(11) NOT NULL,
  `last_edit` int(11) NOT NULL,
  `czas_koniec` int(11) NOT NULL,
  `plemie` int(11) NOT NULL,
  `do_wioski` int(11) NOT NULL,
  `od_gracza` int(11) NOT NULL,
  `od_gname` varchar(75) collate latin1_general_ci NOT NULL,
  `proces` int(1) NOT NULL default '0',
  KEY `czas_koniec` (`czas_koniec`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `rezerwacje_log`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `sessions`
-- 

INSERT INTO `sessions` VALUES (2, 1, '9c8bdbeceadf73d084b3c30ccc92947c', '1493', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `twozenie_osady`
-- 

CREATE TABLE `twozenie_osady` (
  `okrag` int(4) NOT NULL default '1',
  `osad_na_okragu` int(5) NOT NULL default '0',
  `suma_wiosek` int(11) NOT NULL default '0',
  PRIMARY KEY  (`okrag`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `twozenie_osady`
-- 

INSERT INTO `twozenie_osady` VALUES (16, 9, 228);

-- --------------------------------------------------------

-- 
-- Table structure for table `unit_place`
-- 

CREATE TABLE `unit_place` (
  `unit_spear` int(11) default '0',
  `unit_sword` int(11) default '0',
  `unit_axe` int(11) default '0',
  `unit_archer` int(11) NOT NULL default '0',
  `unit_spy` int(11) default '0',
  `unit_light` int(11) default '0',
  `unit_cav_archer` int(11) NOT NULL default '0',
  `unit_heavy` int(11) default '0',
  `unit_ram` int(11) default '0',
  `unit_catapult` int(11) default '0',
  `unit_snob` int(5) default '0',
  `unit_paladin` int(11) NOT NULL default '0',
  `villages_from_id` int(11) NOT NULL default '0',
  `villages_to_id` int(11) NOT NULL default '0',
  KEY `villages_from_id` (`villages_from_id`),
  KEY `villages_to_id` (`villages_to_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `unit_place`
-- 

INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 6);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7, 7);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8, 8);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9, 9);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 10);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11, 11);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12, 12);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 13);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 14, 14);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 15, 15);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 16, 16);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 17, 17);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 18, 18);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 19, 19);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 20);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 21, 21);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 22, 22);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23, 23);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 24, 24);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 25, 25);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 26, 26);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 27, 27);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 28, 28);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 29, 29);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 30, 30);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 31, 31);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 32, 32);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 33, 33);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 34, 34);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 35, 35);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 36, 36);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 37, 37);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 38, 38);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 39, 39);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 40);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 41, 41);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 42, 42);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 43, 43);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44, 44);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 45, 45);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 46, 46);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 47, 47);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 48, 48);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 49, 49);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50, 50);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 51, 51);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 52, 52);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 53, 53);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 54, 54);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55, 55);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 56, 56);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 57, 57);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 58, 58);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 59, 59);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 60);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 61, 61);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 62, 62);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 63, 63);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 64, 64);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 65, 65);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 66, 66);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 67, 67);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 68, 68);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 69, 69);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 70, 70);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 71, 71);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 72, 72);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 73, 73);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 74, 74);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 75, 75);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 76, 76);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 77, 77);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 78, 78);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 79, 79);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 80, 80);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 81, 81);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 82, 82);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 83, 83);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 84, 84);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 85, 85);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, 86);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 87, 87);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 88, 88);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 89, 89);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 90, 90);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 91, 91);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 92, 92);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 93, 93);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 94, 94);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 95, 95);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 96, 96);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 97, 97);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 98, 98);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99, 99);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 100);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 101, 101);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 102, 102);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 103, 103);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 104, 104);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 105, 105);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 106, 106);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 107, 107);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 108, 108);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 109, 109);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 110, 110);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 111, 111);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 112, 112);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 113, 113);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 114, 114);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 115, 115);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 116, 116);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 117, 117);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 118, 118);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 119, 119);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 120, 120);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 121, 121);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 122, 122);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 123, 123);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 124, 124);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 125, 125);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 126, 126);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 127, 127);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 128, 128);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 129, 129);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 130, 130);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 131, 131);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 132, 132);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 133, 133);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 134, 134);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 135, 135);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 136, 136);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 137, 137);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 138, 138);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 139, 139);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 140, 140);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 141, 141);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 142, 142);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 143, 143);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 144, 144);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 145, 145);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 146, 146);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 147, 147);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 148, 148);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 149, 149);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 150);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 151, 151);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 152, 152);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 153, 153);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 154, 154);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 155, 155);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 156, 156);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 157, 157);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 158, 158);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 159, 159);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 160, 160);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 161, 161);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 162, 162);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 163, 163);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 164, 164);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 165, 165);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 166, 166);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 167, 167);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 168, 168);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 169, 169);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 170, 170);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 171, 171);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 172, 172);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 173, 173);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 174, 174);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 175, 175);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 176, 176);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 177, 177);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 178, 178);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 179, 179);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 180, 180);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 181, 181);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 182, 182);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 183, 183);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 184, 184);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 185, 185);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 186, 186);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 187, 187);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 188, 188);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 189, 189);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 190, 190);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 191, 191);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 192, 192);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 193, 193);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 194, 194);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 195, 195);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 196, 196);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 197, 197);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 198, 198);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 199, 199);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 200, 200);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 201, 201);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 202, 202);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 203, 203);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 204, 204);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 205, 205);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 206, 206);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 207, 207);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 208, 208);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 209, 209);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 210, 210);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 211, 211);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 212, 212);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 213, 213);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 214, 214);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 215, 215);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 216, 216);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 217, 217);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 218, 218);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 219, 219);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 220, 220);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 221, 221);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 222, 222);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 223, 223);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 224, 224);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 225, 225);
INSERT INTO `unit_place` VALUES (0, 101, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 226, 226);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 227, 227);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 228, 228);

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `tw_id` int(11) NOT NULL,
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
  `window_width` int(4) NOT NULL default '1000',
  `show_toolbar` int(1) NOT NULL default '1',
  `dyn_menu` int(1) NOT NULL default '1',
  `confirm_queue` int(1) NOT NULL default '1',
  `map_size` int(2) NOT NULL default '9',
  `memo` text collate utf8_unicode_ci NOT NULL,
  `map_reload` text collate utf8_unicode_ci NOT NULL,
  `graphical_overwiev` tinyint(1) NOT NULL default '1',
  `aktu_vpage` int(4) NOT NULL default '0',
  `o_labels` smallint(2) NOT NULL default '1',
  `o_style` smallint(2) NOT NULL default '1',
  `o_anims` smallint(2) NOT NULL default '0',
  `monety` bigint(25) NOT NULL default '0',
  `zlupione_sur` bigint(22) NOT NULL default '0',
  `sfarmione_wioski` int(11) NOT NULL default '0',
  `zniszczone_bud` int(11) NOT NULL default '0',
  `zniszczone_mury` int(11) NOT NULL default '0',
  `zab_szlachta` int(11) NOT NULL default '0',
  `attacked_players` int(11) NOT NULL default '0',
  `def_spy_attacks` int(11) NOT NULL default '0',
  `zniszczone_armie` int(11) NOT NULL default '0',
  `a_oferty` int(11) NOT NULL default '0',
  `dni_w_plemieniu` int(11) NOT NULL default '0',
  `awards_ally` int(11) NOT NULL default '0',
  `awards_lastarel` int(11) NOT NULL default '0',
  `podbicie_siebie` int(1) NOT NULL default '0',
  `pech_szlachta` int(1) NOT NULL default '0',
  `rycek_all_items` int(1) NOT NULL default '0',
  `pok_ownunits` bigint(15) NOT NULL default '0',
  `zab_jed_wwsp` bigint(15) NOT NULL default '0',
  `wspieranie_inngr` int(11) NOT NULL default '0',
  `zabite_jednostki` bigint(15) NOT NULL default '0',
  `udane_rezerwacje` int(11) NOT NULL default '0',
  `razy_rozp_nwg` int(3) NOT NULL default '0',
  `day_zlupione_sur` int(11) NOT NULL default '0',
  `day_sfarmione_wioski` int(11) NOT NULL default '0',
  `day_pok_att` int(11) NOT NULL default '0',
  `day_pok_def` int(11) NOT NULL default '0',
  `day_podbicia` int(11) NOT NULL default '0',
  `levele_odzanczen` longtext collate utf8_unicode_ci NOT NULL,
  `paladins` int(1) NOT NULL default '0',
  `pala_name` varchar(35) collate utf8_unicode_ci NOT NULL default 'Rycerz',
  `pala_train` int(1) NOT NULL default '0',
  `pala_items` varchar(500) collate utf8_unicode_ci NOT NULL,
  `pala_vill` int(11) NOT NULL,
  `pala_to_next_item` int(3) NOT NULL default '0',
  `pala_aktu_item` varchar(55) collate utf8_unicode_ci NOT NULL,
  `dzienne_odznaczenia` longtext collate utf8_unicode_ci NOT NULL,
  `rezerwacje_nstr` int(4) NOT NULL default '10',
  `awards_points` int(6) NOT NULL default '0',
  `day_aw_points` int(6) NOT NULL default '0',
  `awards_points_all` int(6) NOT NULL default '0',
  `szcz_szlachta` int(1) NOT NULL default '0',
  `award_rang` int(11) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `username` (`username`),
  KEY `rang` (`rang`),
  KEY `vacation_id` (`vacation_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (38, 1, 'sir roland', 'fa7f08233358e9b466effa1328168527', 'N', 1, 3245, '', -1, '', 0, 0, 0, 0, 0, 1, 'prod', 0, 1, 0, 'all', 'all', '3', 0, 1, 0, 1, 0, 1, '1327956142', 1327956239, '', -1, '', 0, 0, 0, 0, 'x', '', '', '', 1000, 1, 1, 1, 9, '', '', 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, 1327956239, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 'a:2:{s:18:"odznaczenie_punkty";a:3:{s:7:"stopien";i:1;s:5:"tekst";s:25:"Zdoby³eœ ju¿ 100 punktów!";s:5:"nazwa";s:12:"Król punktów";}s:19:"odznaczenie_ranking";a:3:{s:7:"stopien";i:4;s:5:"tekst";s:39:"Dosta³eœ siê do czo³owej 1 tego œwiata!";s:5:"nazwa";s:18:"Najlepszy zdobywca";}}', 0, 'Rycerz', 0, '', 0, 0, '', '', 10, 5, 0, 5, 0, 1);
INSERT INTO `users` VALUES (39, 2, 'ice41', '394961af481e4bdc0c598b4d259bca4d', 'N', 1, 3266, '', -1, '', 0, 0, 0, 0, 0, 2, 'prod', 0, 0, 0, 'all', 'all', '3', 0, 2, 0, 2, 0, 2, '1482522126', 1482522226, '', -1, '', 0, 0, 0, 0, 'x', '', '', '', 1000, 1, 1, 1, 9, '', '', 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, 1482522226, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 'a:2:{s:18:"odznaczenie_punkty";a:3:{s:7:"stopien";i:1;s:5:"tekst";s:25:"Zdoby³eœ ju¿ 100 punktów!";s:5:"nazwa";s:12:"Król punktów";}s:19:"odznaczenie_ranking";a:3:{s:7:"stopien";i:3;s:5:"tekst";s:40:"Dosta³eœ siê do czo³owej 20 tego œwiata!";s:5:"nazwa";s:18:"Najlepszy zdobywca";}}', 0, 'Rycerz', 0, '', 0, 0, '', '', 10, 4, 0, 4, 0, 2);

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
  `r_bh` int(15) default '1066',
  `last_prod_aktu` int(35) NOT NULL,
  `points` int(15) default '3209',
  `continent` int(6) NOT NULL,
  `main` int(5) default '16',
  `barracks` int(5) default '18',
  `stable` int(5) default '11',
  `garage` int(5) default '2',
  `snob` int(5) default '0',
  `smith` int(5) default '12',
  `place` int(5) default '1',
  `market` int(5) default '9',
  `wood` int(5) default '23',
  `stone` int(5) default '24',
  `iron` int(5) default '23',
  `storage` int(5) default '29',
  `farm` int(5) default '22',
  `hide` int(5) default '10',
  `wall` int(5) default '12',
  `unit_spear_tec_level` int(11) default '1',
  `unit_sword_tec_level` int(11) default '1',
  `unit_axe_tec_level` int(11) default '0',
  `unit_archer_tec_level` int(11) NOT NULL default '0',
  `unit_spy_tec_level` int(11) default '1',
  `unit_light_tec_level` int(11) default '0',
  `unit_cav_archer_tec_level` int(11) NOT NULL default '0',
  `unit_heavy_tec_level` int(11) default '0',
  `unit_ram_tec_level` int(11) default '0',
  `unit_catapult_tec_level` int(11) default '0',
  `unit_snob_tec_level` int(11) default '1',
  `trader_away` int(5) default '0',
  `main_build` varchar(200) collate utf8_unicode_ci NOT NULL,
  `all_unit_spear` int(6) NOT NULL default '0',
  `all_unit_sword` int(6) default '0',
  `all_unit_axe` int(6) default '0',
  `all_unit_archer` int(11) NOT NULL default '0',
  `all_unit_spy` int(6) default '0',
  `all_unit_light` int(6) default '0',
  `all_unit_cav_archer` int(11) NOT NULL default '0',
  `all_unit_heavy` int(6) default '0',
  `all_unit_ram` int(6) default '0',
  `all_unit_catapult` int(6) default '0',
  `all_unit_snob` int(6) default '0',
  `all_unit_paladin` int(11) NOT NULL default '0',
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
  `statue` int(5) default '0',
  `last_barbar_build` int(13) NOT NULL default '0',
  `bonus` int(2) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `x_2` (`x`,`y`),
  KEY `name` (`name`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=229 ;

-- 
-- Dumping data for table `villages`
-- 

INSERT INTO `villages` VALUES (1, 501, 505, 'sir rolands wioska', 1, '8017.2499999999673', '8366.25', '8398.2499999999673', 1072, 1327956239, 3245, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 13, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 'wall,1327956191', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956116, '', '', 1, 0, 0);
INSERT INTO `villages` VALUES (2, 506, 505, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956116, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956116, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (3, 493, 506, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956116, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956116, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (4, 492, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 4);
INSERT INTO `villages` VALUES (5, 502, 504, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (6, 494, 493, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (7, 498, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 2);
INSERT INTO `villages` VALUES (8, 503, 493, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 8);
INSERT INTO `villages` VALUES (9, 500, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (10, 505, 494, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (11, 503, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 4);
INSERT INTO `villages` VALUES (12, 494, 501, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (13, 500, 496, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (14, 499, 500, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (15, 496, 495, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (16, 506, 507, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (17, 506, 493, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (18, 496, 509, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (19, 494, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 2);
INSERT INTO `villages` VALUES (20, 508, 492, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (21, 509, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 4);
INSERT INTO `villages` VALUES (22, 501, 491, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 4);
INSERT INTO `villages` VALUES (23, 507, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (24, 491, 506, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (25, 501, 500, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (26, 502, 491, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (27, 506, 500, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (28, 505, 493, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (29, 498, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (30, 500, 501, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (31, 502, 489, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 7);
INSERT INTO `villages` VALUES (32, 502, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (33, 492, 493, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 5);
INSERT INTO `villages` VALUES (34, 501, 510, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 6);
INSERT INTO `villages` VALUES (35, 497, 493, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (36, 501, 490, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (37, 499, 501, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (38, 495, 509, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (39, 507, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (40, 498, 505, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (41, 493, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (42, 508, 489, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (43, 501, 504, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (44, 503, 488, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (45, 498, 507, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (46, 504, 494, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (47, 498, 490, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (48, 506, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (49, 508, 504, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (50, 505, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (51, 505, 506, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (52, 504, 510, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (53, 493, 497, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (54, 512, 495, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (55, 511, 487, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (56, 491, 495, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 1);
INSERT INTO `villages` VALUES (57, 506, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (58, 500, 486, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (59, 496, 500, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (60, 498, 514, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (61, 500, 507, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (62, 508, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (63, 507, 513, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (64, 509, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (65, 502, 494, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (66, 506, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (67, 509, 493, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (68, 509, 500, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (69, 492, 504, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 6);
INSERT INTO `villages` VALUES (70, 504, 491, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (71, 499, 497, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (72, 492, 494, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (73, 505, 510, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (74, 492, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (75, 500, 510, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 9);
INSERT INTO `villages` VALUES (76, 507, 495, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (77, 488, 496, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (78, 492, 501, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (79, 490, 494, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (80, 501, 506, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (81, 498, 511, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (82, 499, 494, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (83, 501, 513, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (84, 494, 490, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (85, 491, 500, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (86, 513, 491, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (87, 484, 497, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (88, 495, 511, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (89, 486, 493, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (90, 494, 514, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (91, 495, 505, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (92, 515, 492, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (93, 495, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (94, 505, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (95, 513, 502, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (96, 496, 502, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 6);
INSERT INTO `villages` VALUES (97, 486, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (98, 504, 506, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (99, 495, 502, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (100, 509, 487, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 7);
INSERT INTO `villages` VALUES (101, 514, 501, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (102, 501, 497, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (103, 492, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (104, 484, 501, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (105, 487, 504, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 8);
INSERT INTO `villages` VALUES (106, 485, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (107, 495, 486, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (108, 483, 493, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (109, 484, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (110, 504, 486, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (111, 500, 494, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (112, 500, 491, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 4);
INSERT INTO `villages` VALUES (113, 506, 485, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (114, 516, 506, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (115, 507, 502, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (116, 510, 497, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 3);
INSERT INTO `villages` VALUES (117, 511, 505, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (118, 516, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (119, 513, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (120, 497, 507, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (121, 511, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (122, 488, 509, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 7);
INSERT INTO `villages` VALUES (123, 493, 489, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (124, 518, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (125, 501, 515, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (126, 490, 493, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (127, 483, 500, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (128, 506, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (129, 489, 495, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (130, 486, 500, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (131, 516, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (132, 484, 504, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (133, 516, 505, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (134, 487, 491, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (135, 491, 492, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (136, 493, 501, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (137, 488, 497, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 2);
INSERT INTO `villages` VALUES (138, 486, 487, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (139, 508, 512, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (140, 499, 514, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (141, 512, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 3);
INSERT INTO `villages` VALUES (142, 509, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (143, 506, 511, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (144, 507, 493, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (145, 501, 493, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (146, 494, 512, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (147, 495, 510, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (148, 504, 518, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (149, 510, 510, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (150, 512, 489, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (151, 511, 507, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (152, 499, 515, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (153, 490, 497, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (154, 490, 505, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (155, 485, 489, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (156, 517, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (157, 491, 483, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (158, 512, 510, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (159, 512, 505, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (160, 510, 496, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 8);
INSERT INTO `villages` VALUES (161, 487, 507, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (162, 517, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 4);
INSERT INTO `villages` VALUES (163, 503, 510, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (164, 499, 512, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (165, 497, 519, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 9);
INSERT INTO `villages` VALUES (166, 505, 512, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (167, 497, 515, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 3);
INSERT INTO `villages` VALUES (168, 517, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (169, 494, 483, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (170, 513, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (171, 512, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (172, 490, 509, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (173, 517, 512, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (174, 494, 513, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (175, 506, 486, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (176, 519, 502, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 5);
INSERT INTO `villages` VALUES (177, 515, 510, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (178, 516, 500, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (179, 490, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (180, 518, 491, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (181, 487, 510, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (182, 490, 491, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (183, 502, 481, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (184, 484, 510, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (185, 510, 491, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (186, 500, 481, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (187, 487, 487, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (188, 501, 492, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (189, 514, 506, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (190, 499, 486, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 9);
INSERT INTO `villages` VALUES (191, 508, 514, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (192, 489, 488, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (193, 490, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (194, 518, 495, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (195, 492, 491, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (196, 481, 501, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (197, 517, 490, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (198, 479, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (199, 501, 520, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (200, 493, 491, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (201, 517, 514, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 4);
INSERT INTO `villages` VALUES (202, 489, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (203, 509, 512, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (204, 488, 495, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (205, 487, 490, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (206, 490, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 7);
INSERT INTO `villages` VALUES (207, 509, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 6);
INSERT INTO `villages` VALUES (208, 520, 488, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (209, 487, 482, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 1);
INSERT INTO `villages` VALUES (210, 488, 515, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (211, 494, 517, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 1);
INSERT INTO `villages` VALUES (212, 507, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (213, 492, 486, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (214, 506, 487, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (215, 510, 494, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (216, 495, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 2);
INSERT INTO `villages` VALUES (217, 507, 511, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (218, 482, 506, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 7);
INSERT INTO `villages` VALUES (219, 489, 509, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 7);
INSERT INTO `villages` VALUES (220, 496, 481, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (221, 499, 511, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (222, 489, 486, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (223, 491, 490, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (224, 517, 494, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (225, 479, 495, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956255, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956255, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (226, 487, 502, 'ice41s wioska', 2, '8386.9166666666679', '9687.25', '4870.916666666697', 1188, 1482522226, 3266, 54, 16, 18, 11, 4, 0, 12, 1, 10, 23, 24, 23, 29, 22, 10, 13, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 'wall,1482522134', 0, 101, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1482522027, '', '', 1, 0, 0);
INSERT INTO `villages` VALUES (227, 521, 501, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1482522028, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1482522028, '', '', 0, 0, 9);
INSERT INTO `villages` VALUES (228, 484, 493, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1482522028, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1482522028, '', '', 0, 0, 9);
