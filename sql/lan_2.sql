-- phpMyAdmin SQL Dump
-- version 2.9.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 23, 2016 at 08:02 PM
-- Server version: 5.0.24
-- PHP Version: 4.4.4
-- 
-- Database: `lan_2`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=215 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=257 ;

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

INSERT INTO `logins` VALUES (1, 'sir roland', 1327956170, '127.0.0.1', 1, '');
INSERT INTO `logins` VALUES (2, 'sir roland', 1327956280, '127.0.0.1', 1, '');
INSERT INTO `logins` VALUES (3, 'ice41', 1482522229, '127.0.0.1', 2, '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=64 ;

-- 
-- Dumping data for table `recruit`
-- 

INSERT INTO `recruit` VALUES (43, 'unit_archer', 3253, 0, -1, 1327959314, 1327959179, '0.041605430519480555', 'barracks', 22, 2);
INSERT INTO `recruit` VALUES (39, 'unit_archer', 260, 168, -1, 1327959120, 1327959110, '0.041605430519480555', 'barracks', 22, 2);
INSERT INTO `recruit` VALUES (40, 'unit_archer', 433, 0, -1, 1327959138, 1327959120, '0.041605430519480555', 'barracks', 22, 2);
INSERT INTO `recruit` VALUES (41, 'unit_archer', 347, 0, -1, 1327959152, 1327959138, '0.041605430519480555', 'barracks', 22, 2);
INSERT INTO `recruit` VALUES (42, 'unit_sword', 867, 0, -1, 1327959179, 1327959152, '0.031204072889610412', 'barracks', 22, 2);
INSERT INTO `recruit` VALUES (44, 'unit_sword', 1, 0, -1, 1327959314, 1327959314, '0.031204072889610416', 'barracks', 22, 2);
INSERT INTO `recruit` VALUES (45, 'unit_sword', 866, 0, -1, 1327959341, 1327959314, '0.031204072889610416', 'barracks', 22, 2);
INSERT INTO `recruit` VALUES (46, 'unit_sword', 867, 0, -1, 1327959368, 1327959341, '0.031204072889610412', 'barracks', 22, 2);
INSERT INTO `recruit` VALUES (47, 'unit_archer', 520, 0, -1, 1327959389, 1327959368, '0.041605430519480555', 'barracks', 22, 2);
INSERT INTO `recruit` VALUES (50, 'unit_heavy', 63, 8, -1, 1327959314, 1327959307, '0.11920738843667283', 'stable', 36, 1);
INSERT INTO `recruit` VALUES (51, 'unit_heavy', 41, 0, -1, 1327959318, 1327959314, '0.11920738843667283', 'stable', 36, 1);
INSERT INTO `recruit` VALUES (52, 'unit_heavy', 63, 0, -1, 1327959325, 1327959318, '0.11920738843667283', 'stable', 36, 1);
INSERT INTO `recruit` VALUES (53, 'unit_heavy', 63, 0, -1, 1327959332, 1327959325, '0.11920738843667283', 'stable', 36, 1);
INSERT INTO `recruit` VALUES (54, 'unit_heavy', 62, 0, -1, 1327959339, 1327959332, '0.11920738843667283', 'stable', 36, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=61 ;

-- 
-- Dumping data for table `reports`
-- 

INSERT INTO `reports` VALUES (1, 'Otrzymane odznaczenie: Król punktów (Drewno - Stopieñ 1)  ', '', 1327956172, 'get_award', '', '', '', '', NULL, '', '', '', '', '', 0, 0, 0, 0, 1, 1, 'other', NULL, NULL, '', '<h3>Król punktów (Drewno - Stopieñ 1)</h3><div class="award level1" style="float: left; margin-right: 10px;"><img src="graphic/awards/odznaczenie_punkty.png" alt=""></div><p>Zdoby³eœ ju¿ 100 punktów!</p><p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id=1">Zobacz swoje odznaczenia</a></p>', 1, 0, '', '', '', '', '', '', '', '', '', '', 0);
INSERT INTO `reports` VALUES (2, 'Otrzymane odznaczenie: Najlepszy zdobywca (Z³oto - Stopieñ 4)  ', '', 1327956172, 'get_award', '', '', '', '', NULL, '', '', '', '', '', 0, 0, 0, 0, 1, 1, 'other', NULL, NULL, '', '<h3>Najlepszy zdobywca (Z³oto - Stopieñ 4)</h3><div class="award level4" style="float: left; margin-right: 10px;"><img src="graphic/awards/odznaczenie_ranking.png" alt=""></div><p>Dosta³eœ siê do czo³owej 1 tego œwiata!</p><p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id=1">Zobacz swoje odznaczenia</a></p>', 1, 0, '', '', '', '', '', '', '', '', '', '', 0);
INSERT INTO `reports` VALUES (3, 'Otrzymane odznaczenie: Król punktów (Br¹z - Stopieñ 2)  ', '', 1327957015, 'get_award', '', '', '', '', NULL, '', '', '', '', '', 0, 0, 0, 0, 1, 0, 'other', NULL, NULL, '', '<h3>Król punktów (Br¹z - Stopieñ 2)</h3><div class="award level2" style="float: left; margin-right: 10px;"><img src="graphic/awards/odznaczenie_punkty.png" alt=""></div><p>Zdoby³eœ ju¿ 5<span class="grey">.</span>000 punktów!</p><p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id=1">Zobacz swoje odznaczenia</a></p>', 1, 0, '', '', '', '', '', '', '', '', '', '', 0);
INSERT INTO `reports` VALUES (4, 'sir roland (sir rolands wioska) atakuje Opuszczona wioska (505|497) K45', 'graphic/dots/yellow.png', 1327958197, 'attack', '0;0;333;0;0;0;0;0;0;0;0;1', '0;0;3;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '100;67', '12;12', '16;16;main', '', -1, 1, 68, 1, 1, 1, 'attack', '25', 100, 'att', '1100;1100;1100;3300;3300', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (5, 'sir roland (sir rolands wioska) atakuje Opuszczona wioska (505|497) K45', 'graphic/dots/yellow.png', 1327958198, 'attack', '0;0;333;0;0;0;0;0;0;0;0;1', '0;0;3;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '73;48', '12;12', '16;16;main', '', -1, 1, 68, 1, 1, 1, 'attack', '4', 100, 'att', '1100;1100;1100;3300;3300', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (6, 'sir roland (sir rolands wioska) atakuje Opuszczona wioska (505|497) K45', 'graphic/dots/yellow.png', 1327958199, 'attack', '0;0;333;0;0;0;0;0;0;0;0;1', '0;0;3;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '50;17', '12;12', '16;16;main', '', -1, 1, 68, 1, 1, 1, 'attack', '7', 100, 'att', '1100;1100;1100;3300;3300', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (7, 'sir roland (sir rolands wioska) podbija Opuszczona wioska (505|497) K45', 'graphic/dots/yellow.png', 1327958199, 'attack', '0;0;333;0;0;0;0;0;0;0;0;1', '0;0;3;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '17;-9', '12;12', '16;16;main', 'Napastnik przej¹ wioskê!', -1, 1, 68, 1, 1, 1, 'attack', '9', 100, 'att', '', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (8, 'Otrzymane odznaczenie: Rabuœ (Drewno - Stopieñ 1)  ', '', 1327958200, 'get_award', '', '', '', '', NULL, '', '', '', '', '', 0, 0, 0, 0, 1, 0, 'other', NULL, NULL, '', '<h3>Rabuœ (Drewno - Stopieñ 1)</h3><div class="award level1" style="float: left; margin-right: 10px;"><img src="graphic/awards/odznaczenie_lupy.png" alt=""></div><p>Zrabowa³eœ ju¿ 500 surowców!</p><p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id=1">Zobacz swoje odznaczenia</a></p>', 1, 0, '', '', '', '', '', '', '', '', '', '', 0);
INSERT INTO `reports` VALUES (9, 'sir roland (001) atakuje Opuszczona wioska (505|496) K45', 'graphic/dots/yellow.png', 1327958579, 'attack', '0;0;444;0;0;0;0;0;0;0;0;1', '0;0;4;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '100;72', '12;12', '16;16;main', '', -1, 1, 22, 1, 1, 0, 'attack', '-10', 100, 'att', '1467;1467;1467;4401;4400', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (10, 'sir roland (001) atakuje Opuszczona wioska (505|496) K45', 'graphic/dots/yellow.png', 1327958581, 'attack', '0;0;444;0;0;0;0;0;0;0;0;1', '0;0;4;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '80;55', '12;12', '16;16;main', '', -1, 1, 22, 1, 1, 0, 'attack', '-14', 100, 'att', '1467;1467;1467;4401;4400', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (11, 'sir roland (001) atakuje Opuszczona wioska (505|496) K45', 'graphic/dots/yellow.png', 1327958581, 'attack', '0;0;444;0;0;0;0;0;0;0;0;1', '0;0;5;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '55;28', '12;12', '16;16;main', '', -1, 1, 22, 1, 1, 0, 'attack', '-22', 100, 'att', '1464;1463;1463;4390;4390', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (12, 'sir roland (001) atakuje Opuszczona wioska (505|496) K45', 'graphic/dots/yellow.png', 1327958583, 'attack', '0;0;444;0;0;0;0;0;0;0;0;1', '0;0;5;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '34;9', '12;12', '16;16;main', '', -1, 1, 22, 1, 1, 0, 'attack', '-23', 100, 'att', '1464;1463;1463;4390;4390', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (13, 'Otrzymane odznaczenie: Rabuœ (Br¹z - Stopieñ 2)  ', '', 1327958584, 'get_award', '', '', '', '', NULL, '', '', '', '', '', 0, 0, 0, 0, 1, 1, 'other', NULL, NULL, '', '<h3>Rabuœ (Br¹z - Stopieñ 2)</h3><div class="award level2" style="float: left; margin-right: 10px;"><img src="graphic/awards/odznaczenie_lupy.png" alt=""></div><p>Zrabowa³eœ ju¿ 10<span class="grey">.</span>000 surowców!</p><p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id=1">Zobacz swoje odznaczenia</a></p>', 1, 0, '', '', '', '', '', '', '', '', '', '', 0);
INSERT INTO `reports` VALUES (14, 'sir roland (001) atakuje Opuszczona wioska (505|496) K45', 'graphic/dots/yellow.png', 1327958626, 'attack', '0;0;333;0;0;0;0;0;0;0;0;1', '0;0;4;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '100;71', '12;12', '16;16;main', '', -1, 1, 22, 1, 1, 1, 'attack', '-8', 100, 'att', '1097;1097;1097;3291;3290', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (15, 'sir roland (001) atakuje Opuszczona wioska (505|496) K45', 'graphic/dots/yellow.png', 1327958629, 'attack', '0;0;333;0;0;0;0;0;0;0;0;1', '0;0;4;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '82;55', '12;12', '16;16;main', '', -1, 1, 22, 1, 1, 1, 'attack', '-11', 100, 'att', '1097;1097;1097;3291;3290', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (16, 'sir roland (001) atakuje Opuszczona wioska (505|496) K45', 'graphic/dots/yellow.png', 1327958630, 'attack', '0;0;333;0;0;0;0;0;0;0;0;1', '0;0;3;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '55;30', '12;12', '16;16;main', '', -1, 1, 22, 1, 1, 1, 'attack', '12', 100, 'att', '1100;1100;1100;3300;3300', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (17, 'Otrzymane odznaczenie: Grabie¿ca (Drewno - Stopieñ 1)  ', '', 1327958631, 'get_award', '', '', '', '', NULL, '', '', '', '', '', 0, 0, 0, 0, 1, 1, 'other', NULL, NULL, '', '<h3>Grabie¿ca (Drewno - Stopieñ 1)</h3><div class="award level1" style="float: left; margin-right: 10px;"><img src="graphic/awards/odznaczenie_farmienie.png" alt=""></div><p>Liczba udanych pl¹drowañ: 10!</p><p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id=1">Zobacz swoje odznaczenia</a></p>', 1, 0, '', '', '', '', '', '', '', '', '', '', 0);
INSERT INTO `reports` VALUES (18, 'sir roland (001) atakuje Opuszczona wioska (505|496) K45', 'graphic/dots/yellow.png', 1327958631, 'attack', '0;0;333;0;0;0;0;0;0;0;0;1', '0;0;3;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '36;6', '12;12', '16;16;main', '', -1, 1, 22, 1, 1, 1, 'attack', '11', 100, 'att', '1100;1100;1100;3300;3300', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (19, 'sir roland (001) podbija Opuszczona wioska (505|496) K45', 'graphic/dots/yellow.png', 1327958632, 'attack', '0;0;333;0;0;0;0;0;0;0;0;1', '0;0;4;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '6;-29', '12;12', '16;16;main', 'Napastnik przej¹ wioskê!', -1, 1, 22, 1, 1, 1, 'attack', '1', 100, 'att', '', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (20, 'Twoja pomoc z 001 (505|498) K45 do gracza sir roland zosta³a zaatakowana', 'graphic/dots/red.png', 1327958633, 'supportAttack', '0;0;329;0;0;0;0;0;0;0;0;0', '0;0;329;0;0;0;0;0;0;0;0;0', '', '', NULL, '', '', '', '', '', 1, 1, 1, 22, 1, 1, 'defense', NULL, NULL, '', '', 1, 0, '', '', '', '', '', '', '', '', '', '', 0);
INSERT INTO `reports` VALUES (21, 'sir roland (001) atakuje Opuszczona wioska (505|496) K45', 'graphic/dots/yellow.png', 1327958633, 'attack', '0;0;333;0;0;0;0;0;0;0;0;1', '0;0;81;0;0;0;0;0;0;0;0;0', '0;0;329;0;0;0;0;0;0;0;0;0', '0;0;329;0;0;0;0;0;0;0;0;0', '', '', '28;3', '12;12', '16;16;main', '', 1, 1, 22, 1, 1, 0, 'attack', '6', 100, 'att', '840;840;840;2520;2520', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', 'Rycerz', '', 0);
INSERT INTO `reports` VALUES (22, 'sir roland (001) atakuje Opuszczona wioska (505|496) K45', 'graphic/dots/red.png', 1327958633, 'attack', '0;0;333;0;0;0;0;0;0;0;0;1', '0;0;81;0;0;0;0;0;0;0;0;0', '0;0;329;0;0;0;0;0;0;0;0;0', '0;0;329;0;0;0;0;0;0;0;0;0', '', '', '28;3', '12;12', '16;16;main', '', 1, 1, 22, 1, 1, 1, 'attack', '6', 100, 'att', '840;840;840;2520;2520', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', 'Rycerz', '', 0);
INSERT INTO `reports` VALUES (23, 'Otrzymane odznaczenie: Œmieræ bohatera (Drewno - Stopieñ 1)  ', '', 1327958634, 'get_award', '', '', '', '', NULL, '', '', '', '', '', 0, 0, 0, 0, 1, 1, 'other', NULL, NULL, '', '<h3>Œmieræ bohatera (Drewno - Stopieñ 1)</h3><div class="award level1" style="float: left; margin-right: 10px;"><img src="graphic/awards/odznaczenie_zabjed_wwsp.png" alt=""></div><p>Liczba twoich jednostek, które ponios³y honorow¹ œmieræ wspieraj¹c inne wioski: 100!</p><p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id=1">Zobacz swoje odznaczenia</a></p>', 1, 0, '', '', '', '', '', '', '', '', '', '', 0);
INSERT INTO `reports` VALUES (24, 'Otrzymane odznaczenie: Samobój (Br¹z - Stopieñ 2)  ', '', 1327958634, 'get_award', '', '', '', '', NULL, '', '', '', '', '', 0, 0, 0, 0, 1, 1, 'other', NULL, NULL, '', '<h3>Samobój (Br¹z - Stopieñ 2)</h3><div class="award level2" style="float: left; margin-right: 10px;"><img src="graphic/awards/odznaczenie_pok_wlasne_jed.png" alt=""></div><p>Zaatakowa³eœ samego siebie i straci³eœ w bitwie ponad 100 jednostek!</p><p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id=1">Zobacz swoje odznaczenia</a></p>', 1, 0, '', '', '', '', '', '', '', '', '', '', 0);
INSERT INTO `reports` VALUES (25, 'sir roland (001) atakuje Opuszczona wioska (506|497) K45', 'graphic/dots/yellow.png', 1327959000, 'attack', '0;0;333;0;0;0;0;0;0;0;0;1', '0;0;3;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '100;76', '12;12', '16;16;main', '', -1, 1, 36, 1, 1, 1, 'attack', '5', 100, 'att', '1100;1100;1100;3300;3300', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (26, 'sir roland (001) atakuje Opuszczona wioska (506|497) K45', 'graphic/dots/yellow.png', 1327959002, 'attack', '0;0;333;0;0;0;0;0;0;0;0;1', '0;0;3;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '79;50', '12;12', '16;16;main', '', -1, 1, 36, 1, 1, 1, 'attack', '12', 100, 'att', '1100;1100;1100;3300;3300', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (27, 'sir roland (001) atakuje Opuszczona wioska (506|497) K45', 'graphic/dots/yellow.png', 1327959003, 'attack', '0;0;333;0;0;0;0;0;0;0;0;1', '0;0;4;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '55;26', '12;12', '16;16;main', '', -1, 1, 36, 1, 1, 1, 'attack', '-9', 100, 'att', '1097;1097;1097;3291;3290', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (28, 'sir roland (001) atakuje Opuszczona wioska (506|497) K45', 'graphic/dots/yellow.png', 1327959004, 'attack', '0;0;333;0;0;0;0;0;0;0;0;1', '0;0;4;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '26;4', '12;12', '16;16;main', '', -1, 1, 36, 1, 1, 0, 'attack', '2', 100, 'att', '1097;1097;1097;3291;3290', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (29, 'sir roland (001) atakuje Opuszczona wioska (506|497) K45', 'graphic/dots/yellow.png', 1327959023, 'attack', '0;0;444;0;0;0;0;0;0;0;0;1', '0;0;2;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '60;39', '12;12', '16;16;main', '', -1, 1, 36, 1, 1, 1, 'attack', '18', 100, 'att', '1474;1473;1473;4420;4420', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (30, 'sir roland (001) atakuje Opuszczona wioska (506|497) K45', 'graphic/dots/yellow.png', 1327959024, 'attack', '0;0;444;0;0;0;0;0;0;0;0;1', '0;0;2;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '39;16', '12;12', '16;16;main', '', -1, 1, 36, 1, 1, 1, 'attack', '23', 100, 'att', '1474;1473;1473;4420;4420', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (31, 'sir roland (001) podbija Opuszczona wioska (506|497) K45', 'graphic/dots/yellow.png', 1327959025, 'attack', '0;0;444;0;0;0;0;0;0;0;0;1', '0;0;2;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '21;-10', '12;12', '16;16;main', 'Napastnik przej¹ wioskê!', -1, 1, 36, 1, 1, 0, 'attack', '22', 100, 'att', '', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (32, 'Twoja pomoc z 001 (505|498) K45 do gracza sir roland zosta³a zaatakowana', 'graphic/dots/red.png', 1327959026, 'supportAttack', '0;0;442;0;0;0;0;0;0;0;0;0', '0;0;442;0;0;0;0;0;0;0;0;0', '', '', NULL, '', '', '', '', '', 1, 1, 1, 36, 1, 1, 'defense', NULL, NULL, '', '', 1, 0, '', '', '', '', '', '', '', '', '', '', 0);
INSERT INTO `reports` VALUES (33, 'sir roland (001) atakuje Opuszczona wioska (506|497) K45', 'graphic/dots/yellow.png', 1327959026, 'attack', '0;0;444;0;0;0;0;0;0;0;0;1', '0;0;131;0;0;0;0;0;0;0;0;0', '0;0;442;0;0;0;0;0;0;0;0;0', '0;0;442;0;0;0;0;0;0;0;0;0', '', '', '28;1', '12;12', '16;16;main', '', 1, 1, 36, 1, 1, 1, 'attack', '-9', 100, 'att', '1044;1043;1043;3130;3130', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', 'Rycerz', '', 0);
INSERT INTO `reports` VALUES (34, 'sir roland (001) atakuje Opuszczona wioska (506|497) K45', 'graphic/dots/red.png', 1327959026, 'attack', '0;0;444;0;0;0;0;0;0;0;0;1', '0;0;131;0;0;0;0;0;0;0;0;0', '0;0;442;0;0;0;0;0;0;0;0;0', '0;0;442;0;0;0;0;0;0;0;0;0', '', '', '28;1', '12;12', '16;16;main', '', 1, 1, 36, 1, 1, 1, 'attack', '-9', 100, 'att', '1044;1043;1043;3130;3130', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', 'Rycerz', '', 0);
INSERT INTO `reports` VALUES (35, 'Otrzymane odznaczenie: Pechowiec (Drewno - Stopieñ 1)  ', '', 1327959028, 'get_award', '', '', '', '', NULL, '', '', '', '', '', 0, 0, 0, 0, 1, 0, 'other', NULL, NULL, '', '<h3>Pechowiec (Drewno - Stopieñ 1)</h3><div class="award level1" style="float: left; margin-right: 10px;"><img src="graphic/awards/odznaczenie_pech.png" alt=""></div><p>Poparcie wioski spad³o do +1 po jednym z Twoich ataków!</p><p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id=1">Zobacz swoje odznaczenia</a></p>', 1, 0, '', '', '', '', '', '', '', '', '', '', 0);
INSERT INTO `reports` VALUES (36, 'Twoja pomoc z 001 (505|498) K45 do gracza sir roland zosta³a zaatakowana', 'graphic/dots/green.png', 1327959107, 'supportAttack', '0;0;330;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', NULL, '', '', '', '', '', 1, 1, 1, 68, 1, 1, 'defense', NULL, NULL, '', '', 1, 0, '', '', '', '', '', '', '', '', '', '', 0);
INSERT INTO `reports` VALUES (37, 'sir roland (003) atakuje 002 (505|497) K45', 'graphic/dots/red.png', 1327959107, 'attack', '0;1;0;0;0;0;0;0;0;0;0;0', '0;1;0;0;0;0;0;0;0;0;0;0', '2566;2477;330;0;0;50;0;631;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '100;100', '17;17', '17;17;main', '', 1, 1, 68, 22, 1, 1, 'attack', '-18', 100, 'def', '', 0, 0, '', '', '', '', '', '0', '0', 'Rycerz', 'Rycerz', '', 0);
INSERT INTO `reports` VALUES (38, 'sir roland (003) atakuje 002 (505|497) K45', 'graphic/dots/green.png', 1327959107, 'attack', '0;1;0;0;0;0;0;0;0;0;0;0', '0;1;0;0;0;0;0;0;0;0;0;0', '2566;2477;330;0;0;50;0;631;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '100;100', '17;17', '17;17;main', '', 1, 1, 68, 22, 1, 0, 'attack', '-18', 100, 'def', '', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', 'Rycerz', '', 0);
INSERT INTO `reports` VALUES (39, 'Otrzymane odznaczenie dzienne: Rabuœ dnia', '', 1482521983, 'get_award', '', '', '', '', NULL, '', '', '', '', '', 0, 0, 0, 0, 1, 1, 'other', NULL, NULL, '', '<h3>Rabuœ dnia</h3><div class="award level4" style="float: left; margin-right: 10px;"><img src="graphic/awards/day_lupy.png" alt=""></div><p>Dnia 23-12-2016 zrabowa³eœ najwiêcej surowców na tym œwiecie (68<span class="grey">.</span>336 surowców)!</p><p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id=1">Zobacz swoje odznaczenia</a></p>', 1, 0, '', '', '', '', '', '', '', '', '', '', 0);
INSERT INTO `reports` VALUES (40, 'Otrzymane odznaczenie dzienne: Agresor dnia', '', 1482521983, 'get_award', '', '', '', '', NULL, '', '', '', '', '', 0, 0, 0, 0, 1, 1, 'other', NULL, NULL, '', '<h3>Agresor dnia</h3><div class="award level4" style="float: left; margin-right: 10px;"><img src="graphic/awards/day_att_kill.png" alt=""></div><p>Dnia 23-12-2016 pokona³eœ jako napastnik najwiêcej jednostek na tym œwiecie (771 jednostek)!</p><p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id=1">Zobacz swoje odznaczenia</a></p>', 1, 0, '', '', '', '', '', '', '', '', '', '', 0);
INSERT INTO `reports` VALUES (41, 'Otrzymane odznaczenie dzienne: Obroñca dnia', '', 1482521983, 'get_award', '', '', '', '', NULL, '', '', '', '', '', 0, 0, 0, 0, 1, 1, 'other', NULL, NULL, '', '<h3>Obroñca dnia</h3><div class="award level4" style="float: left; margin-right: 10px;"><img src="graphic/awards/day_def_kill.png" alt=""></div><p>Dnia 23-12-2016 pokona³eœ jako obroñca najwiêcej jednostek na tym œwiecie (213 jednostek)!</p><p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id=1">Zobacz swoje odznaczenia</a></p>', 1, 0, '', '', '', '', '', '', '', '', '', '', 0);
INSERT INTO `reports` VALUES (42, 'Otrzymane odznaczenie dzienne: Mocarstwo dnia', '', 1482521983, 'get_award', '', '', '', '', NULL, '', '', '', '', '', 0, 0, 0, 0, 1, 1, 'other', NULL, NULL, '', '<h3>Mocarstwo dnia</h3><div class="award level4" style="float: left; margin-right: 10px;"><img src="graphic/awards/day_snob_vills.png" alt=""></div><p>dnia 23-12-2016 przej¹³eœ najwiêcej wiosek na tym œwiecie (3 wiosek)!</p><p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id=1">Zobacz swoje odznaczenia</a></p>', 1, 0, '', '', '', '', '', '', '', '', '', '', 0);
INSERT INTO `reports` VALUES (43, 'Otrzymane odznaczenie dzienne: Grabie¿ca dnia', '', 1482521983, 'get_award', '', '', '', '', NULL, '', '', '', '', '', 0, 0, 0, 0, 1, 1, 'other', NULL, NULL, '', '<h3>Grabie¿ca dnia</h3><div class="award level4" style="float: left; margin-right: 10px;"><img src="graphic/awards/day_farmed_vills.png" alt=""></div><p>dnia 23-12-2016 spl¹drowa³eœ najwiêcej wiosek na tym œwiecie (19 wiosek)!</p><p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id=1">Zobacz swoje odznaczenia</a></p>', 1, 0, '', '', '', '', '', '', '', '', '', '', 0);
INSERT INTO `reports` VALUES (44, 'Otrzymane odznaczenie: Król punktów (Drewno - Stopieñ 1)  ', '', 1482522231, 'get_award', '', '', '', '', NULL, '', '', '', '', '', 0, 0, 0, 0, 2, 0, 'other', NULL, NULL, '', '<h3>Król punktów (Drewno - Stopieñ 1)</h3><div class="award level1" style="float: left; margin-right: 10px;"><img src="graphic/awards/odznaczenie_punkty.png" alt=""></div><p>Zdoby³eœ ju¿ 100 punktów!</p><p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id=2">Zobacz swoje odznaczenia</a></p>', 1, 0, '', '', '', '', '', '', '', '', '', '', 0);
INSERT INTO `reports` VALUES (45, 'Otrzymane odznaczenie: Najlepszy zdobywca (Srebro - Stopieñ 3)  ', '', 1482522231, 'get_award', '', '', '', '', NULL, '', '', '', '', '', 0, 0, 0, 0, 2, 0, 'other', NULL, NULL, '', '<h3>Najlepszy zdobywca (Srebro - Stopieñ 3)</h3><div class="award level3" style="float: left; margin-right: 10px;"><img src="graphic/awards/odznaczenie_ranking.png" alt=""></div><p>Dosta³eœ siê do czo³owej 20 tego œwiata!</p><p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id=2">Zobacz swoje odznaczenia</a></p>', 1, 0, '', '', '', '', '', '', '', '', '', '', 0);
INSERT INTO `reports` VALUES (46, 'ice41 (ice41s wioska) atakuje Opuszczona wioska (476|501) K54', 'graphic/dots/blue.png', 1482522442, 'attack', '0;0;0;0;50;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '0;0;0;0;0;0;0;0;0;0;0;0', '100;100', '12;12', '16;16;main', '', -1, 2, 341, 448, 2, 0, 'attack', '17', 100, 'def', '', 0, 0, '', '', '', '323837;323837;323837', '16;18;11;2;0;12;1;0;9;23;24;23;22;29;10;12', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (47, 'ice41 (ice41s wioska) atakuje Opuszczona wioska (476|501) K54', 'graphic/dots/yellow.png', 1482522476, 'attack', '0;0;1000;0;0;0;0;0;100;0;0;1', '0;0;1;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '100;75', '12;3', '16;16;main', '', -1, 2, 341, 448, 2, 0, 'attack', '-4', 100, 'att', '3330;3330;3330;9990;9990', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (51, 'ice41 (ice41s wioska) atakuje Opuszczona wioska (476|501) K54', 'graphic/dots/green.png', 1482522526, 'attack', '0;0;300;0;50;0;0;0;0;0;0;1', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '0;0;0;0;0;0;0;0;0;0;0;0', '100;73', '0;0', '16;16;main', '', -1, 2, 341, 448, 2, 0, 'attack', '3', 100, 'att', '1000;1000;1000;3000;3000', 1, 0, '', '', '', '322837;322837;322837', '16;18;11;2;0;12;1;0;9;23;24;23;22;29;10;0', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (49, 'ice41 (ice41s wioska) atakuje Opuszczona wioska (476|501) K54', 'graphic/dots/green.png', 1482522492, 'attack', '0;0;999;0;50;0;0;0;100;0;0;1', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '0;0;0;0;0;0;0;0;0;0;0;0', '100;78', '3;0', '16;16;main', '', -1, 2, 341, 448, 2, 0, 'attack', '-25', 100, 'att', '3330;3330;3330;9990;9990', 1, 0, '', '', '', '320507;320507;320507', '16;18;11;2;0;12;1;0;9;23;24;23;22;29;10;0', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (50, 'Otrzymane odznaczenie: Rabuœ (Br¹z - Stopieñ 2)  ', '', 1482522495, 'get_award', '', '', '', '', NULL, '', '', '', '', '', 0, 0, 0, 0, 2, 1, 'other', NULL, NULL, '', '<h3>Rabuœ (Br¹z - Stopieñ 2)</h3><div class="award level2" style="float: left; margin-right: 10px;"><img src="graphic/awards/odznaczenie_lupy.png" alt=""></div><p>Zrabowa³eœ ju¿ 10<span class="grey">.</span>000 surowców!</p><p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id=2">Zobacz swoje odznaczenia</a></p>', 1, 0, '', '', '', '', '', '', '', '', '', '', 0);
INSERT INTO `reports` VALUES (52, 'ice41 (ice41s wioska) atakuje Opuszczona wioska (476|501) K54', 'graphic/dots/green.png', 1482522543, 'attack', '0;0;999;0;50;0;0;0;0;0;0;1', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '0;0;0;0;0;0;0;0;0;0;0;0', '100;73', '0;0', '16;16;main', '', -1, 2, 341, 448, 2, 0, 'attack', '8', 100, 'att', '3330;3330;3330;9990;9990', 1, 0, '', '', '', '320507;320507;320507', '16;18;11;2;0;12;1;0;9;23;24;23;22;29;10;0', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (53, 'ice41 (ice41s wioska) atakuje Opuszczona wioska (476|501) K54', 'graphic/dots/green.png', 1482522558, 'attack', '0;171;0;0;0;0;0;0;0;0;0;1', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '100;65', '0;0', '16;16;main', '', -1, 2, 341, 448, 2, 0, 'attack', '3', 100, 'att', '855;855;855;2565;2565', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (54, 'ice41 (ice41s wioska) atakuje Opuszczona wioska (476|501) K54', 'graphic/dots/green.png', 1482522676, 'attack', '0;1000;0;0;0;0;0;0;0;0;0;1', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '100;67', '0;0', '16;16;main', '', -1, 2, 341, 448, 2, 0, 'attack', '23', 100, 'att', '5000;5000;5000;15000;15000', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (55, 'ice41 (ice41s wioska) atakuje Opuszczona wioska (476|501) K54', 'graphic/dots/green.png', 1482522692, 'attack', '0;1000;0;0;0;0;0;0;0;0;0;2', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '100;75', '0;0', '16;16;main', '', -1, 2, 341, 448, 2, 0, 'attack', '24', 100, 'att', '5000;5000;5000;15000;15000', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (56, 'ice41 (ice41s wioska) atakuje Opuszczona wioska (476|501) K54', 'graphic/dots/green.png', 1482523008, 'attack', '0;1000;0;0;0;0;0;0;0;0;0;1', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '100;68', '0;0', '16;16;main', '', -1, 2, 341, 448, 2, 0, 'attack', '18', 100, 'att', '5000;5000;5000;15000;15000', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (57, 'ice41 (ice41s wioska) atakuje Opuszczona wioska (476|501) K54', 'graphic/dots/green.png', 1482523021, 'attack', '0;1000;0;0;0;0;0;0;0;0;0;1', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '100;68', '0;0', '16;16;main', '', -1, 2, 341, 448, 2, 0, 'attack', '-23', 100, 'att', '5000;5000;5000;15000;15000', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (58, 'ice41 (ice41s wioska) atakuje Opuszczona wioska (476|501) K54', 'graphic/dots/green.png', 1482523067, 'attack', '0;0;999;0;0;0;0;0;0;0;0;1', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '100;66', '0;0', '16;16;main', '', -1, 2, 341, 448, 2, 0, 'attack', '-13', 100, 'att', '3330;3330;3330;9990;9990', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);
INSERT INTO `reports` VALUES (59, 'Otrzymane odznaczenie: Grabie¿ca (Drewno - Stopieñ 1)  ', '', 1482523068, 'get_award', '', '', '', '', NULL, '', '', '', '', '', 0, 0, 0, 0, 2, 1, 'other', NULL, NULL, '', '<h3>Grabie¿ca (Drewno - Stopieñ 1)</h3><div class="award level1" style="float: left; margin-right: 10px;"><img src="graphic/awards/odznaczenie_farmienie.png" alt=""></div><p>Liczba udanych pl¹drowañ: 10!</p><p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id=2">Zobacz swoje odznaczenia</a></p>', 1, 0, '', '', '', '', '', '', '', '', '', '', 0);
INSERT INTO `reports` VALUES (60, 'ice41 (ice41s wioska) atakuje Opuszczona wioska (476|501) K54', 'graphic/dots/green.png', 1482523087, 'attack', '0;0;999;0;0;0;0;0;0;0;0;1', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '0;0;0;0;0;0;0;0;0;0;0;0', '', '', '100;70', '0;0', '16;16;main', '', -1, 2, 341, 448, 2, 0, 'attack', '10', 100, 'att', '3330;3330;3330;9990;9990', 1, 0, '', '', '', '', '', '0', '0', 'Rycerz', '', '', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

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

INSERT INTO `sessions` VALUES (3, 2, '04f882700bfc64d7931d568a1527aee6', '2259', 0);

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

INSERT INTO `twozenie_osady` VALUES (22, 33, 450);

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

INSERT INTO `unit_place` VALUES (193, 0, 9170, 0, 0, 1294, 0, 0, 0, 0, 4, 1, 1, 1);
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
INSERT INTO `unit_place` VALUES (5632, 1733, 0, 168, 0, 0, 0, 0, 0, 0, 0, 0, 22, 22);
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
INSERT INTO `unit_place` VALUES (139, 232, 0, 342, 0, 0, 0, 445, 0, 0, 0, 0, 36, 36);
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
INSERT INTO `unit_place` VALUES (2566, 2477, 0, 0, 0, 50, 0, 631, 0, 0, 0, 0, 68, 68);
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
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 226, 226);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 227, 227);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 228, 228);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 229, 229);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 230, 230);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 231, 231);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 232, 232);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 233, 233);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 234, 234);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 235, 235);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 236, 236);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 237, 237);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 238, 238);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 239, 239);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 240, 240);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 241, 241);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 242, 242);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 243, 243);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 244, 244);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 245, 245);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 246, 246);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 247, 247);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 248, 248);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 249, 249);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 250, 250);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 251, 251);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 252, 252);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 253, 253);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 254, 254);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 255, 255);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 256, 256);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 257, 257);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 258, 258);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 259, 259);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 260, 260);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 261, 261);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 262, 262);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 263, 263);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 264, 264);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 265, 265);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 266, 266);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 267, 267);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 268, 268);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 269, 269);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 270, 270);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 271, 271);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 272, 272);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 273, 273);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 274, 274);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 275, 275);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 276, 276);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 277, 277);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 278, 278);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 279, 279);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 280, 280);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 281, 281);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 282, 282);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 283, 283);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 284, 284);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 285, 285);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 286, 286);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 287, 287);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 288, 288);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 289, 289);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 290, 290);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 291, 291);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 292, 292);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 293, 293);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 294, 294);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 295, 295);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 296, 296);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 297, 297);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 298, 298);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 299, 299);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 300, 300);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 301, 301);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 302, 302);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 303, 303);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 304, 304);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 305, 305);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 306, 306);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 307, 307);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 308, 308);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 309, 309);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 310, 310);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 311, 311);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 312, 312);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 313, 313);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 314, 314);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 315, 315);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 316, 316);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 317, 317);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 318, 318);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 319, 319);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 320, 320);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 321, 321);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 322, 322);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 323, 323);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 324, 324);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 325, 325);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 326, 326);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 327, 327);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 328, 328);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 329, 329);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 330, 330);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 331, 331);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 332, 332);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 333, 333);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 334, 334);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 335, 335);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 336, 336);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 337, 337);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 338, 338);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 339, 339);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 340, 340);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 341, 341);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 342, 342);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 343, 343);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 344, 344);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 345, 345);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 346, 346);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 347, 347);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 348, 348);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 349, 349);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 350, 350);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 351, 351);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 352, 352);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 353, 353);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 354, 354);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 355, 355);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 356, 356);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 357, 357);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 358, 358);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 359, 359);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 360, 360);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 361, 361);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 362, 362);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 363, 363);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 364, 364);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 365, 365);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 366, 366);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 367, 367);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 368, 368);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 369, 369);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 370, 370);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 371, 371);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 372, 372);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 373, 373);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 374, 374);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 375, 375);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 376, 376);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 377, 377);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 378, 378);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 379, 379);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 380, 380);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 381, 381);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 382, 382);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 383, 383);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 384, 384);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 385, 385);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 386, 386);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 387, 387);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 388, 388);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 389, 389);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 390, 390);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 391, 391);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 392, 392);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 393, 393);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 394, 394);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 395, 395);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 396, 396);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 397, 397);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 398, 398);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 399, 399);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 400, 400);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 401, 401);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 402, 402);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 403, 403);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 404, 404);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 405, 405);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 406, 406);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 407, 407);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 408, 408);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 409, 409);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 410, 410);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 411, 411);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 412, 412);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 413, 413);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 414, 414);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 415, 415);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 416, 416);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 417, 417);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 418, 418);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 419, 419);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 420, 420);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 421, 421);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 422, 422);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 423, 423);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 424, 424);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 425, 425);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 426, 426);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 427, 427);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 428, 428);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 429, 429);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 430, 430);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 431, 431);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 432, 432);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 433, 433);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 434, 434);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 435, 435);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 436, 436);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 437, 437);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 438, 438);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 439, 439);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 440, 440);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 441, 441);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 442, 442);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 443, 443);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 444, 444);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 445, 445);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 446, 446);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 447, 447);
INSERT INTO `unit_place` VALUES (0, 0, 330, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 68);
INSERT INTO `unit_place` VALUES (0, 1000, 999, 0, 50, 0, 0, 0, 100, 0, 2, 0, 448, 448);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 449, 449);
INSERT INTO `unit_place` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 450, 450);

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

INSERT INTO `users` VALUES (38, 1, 'sir roland', 'fa7f08233358e9b466effa1328168527', 'N', 4, 28911, '', -1, '', 0, 0, 0, 0, 0, 1, 'prod', 0, 1, 0, 'all', 'all', '3', 771, 1, 213, 1, 984, 1, '1327959245', 1327959308, '', -1, '', 0, 0, 0, 0, 'x', '', '', '', 1000, 1, 1, 1, 9, '', '', 1, 0, 1, 1, 0, 34, 68336, 19, 0, 0, 0, 0, 0, 3, 0, 0, -1, 1327959308, 0, 1, 0, 984, 771, 3, 984, 0, 1, 0, 0, 0, 0, 0, 'a:7:{s:18:"odznaczenie_punkty";a:3:{s:7:"stopien";i:2;s:5:"tekst";s:53:"Zdoby³eœ ju¿ 5<span class="grey">.</span>000 punktów!";s:5:"nazwa";s:12:"Król punktów";}s:19:"odznaczenie_ranking";a:3:{s:7:"stopien";i:4;s:5:"tekst";s:39:"Dosta³eœ siê do czo³owej 1 tego œwiata!";s:5:"nazwa";s:18:"Najlepszy zdobywca";}s:16:"odznaczenie_lupy";a:3:{s:7:"stopien";i:2;s:5:"tekst";s:57:"Zrabowa³eœ ju¿ 10<span class="grey">.</span>000 surowców!";s:5:"nazwa";s:5:"Rabuœ";}s:21:"odznaczenie_farmienie";a:3:{s:7:"stopien";i:1;s:5:"tekst";s:29:"Liczba udanych pl¹drowañ: 10!";s:5:"nazwa";s:9:"Grabie¿ca";}s:23:"odznaczenie_zabjed_wwsp";a:3:{s:7:"stopien";i:1;s:5:"tekst";s:84:"Liczba twoich jednostek, które ponios³y honorow¹ œmieræ wspieraj¹c inne wioski: 100!";s:5:"nazwa";s:15:"Œmieræ bohatera";}s:26:"odznaczenie_pok_wlasne_jed";a:3:{s:7:"stopien";i:2;s:5:"tekst";s:68:"Zaatakowa³eœ samego siebie i straci³eœ w bitwie ponad 100 jednostek!";s:5:"nazwa";s:7:"Samobój";}s:16:"odznaczenie_pech";a:3:{s:7:"stopien";i:1;s:5:"tekst";s:55:"Poparcie wioski spad³o do +1 po jednym z Twoich ataków!";s:5:"nazwa";s:9:"Pechowiec";}}', 1, 'Rycerz', 0, '', 1, 0, '', 'a:5:{s:8:"day_lupy";a:4:{s:4:"razy";i:1;s:4:"data";s:10:"23-12-2016";s:5:"ilosc";s:5:"68336";s:5:"tekst";s:105:"Dnia 23-12-2016 zrabowa³eœ najwiêcej surowców na tym œwiecie (68<span class="grey">.</span>336 surowców)!";}s:12:"day_att_kill";a:4:{s:4:"razy";i:1;s:4:"data";s:10:"23-12-2016";s:5:"ilosc";s:3:"771";s:5:"tekst";s:92:"Dnia 23-12-2016 pokona³eœ jako napastnik najwiêcej jednostek na tym œwiecie (771 jednostek)!";}s:12:"day_def_kill";a:4:{s:4:"razy";i:1;s:4:"data";s:10:"23-12-2016";s:5:"ilosc";s:3:"213";s:5:"tekst";s:90:"Dnia 23-12-2016 pokona³eœ jako obroñca najwiêcej jednostek na tym œwiecie (213 jednostek)!";}s:14:"day_snob_vills";a:4:{s:4:"razy";i:1;s:4:"data";s:10:"23-12-2016";s:5:"ilosc";s:1:"3";s:5:"tekst";s:69:"dnia 23-12-2016 przej¹³eœ najwiêcej wiosek na tym œwiecie (3 wiosek)!";}s:16:"day_farmed_vills";a:4:{s:4:"razy";i:1;s:4:"data";s:10:"23-12-2016";s:5:"ilosc";s:2:"19";s:5:"tekst";s:73:"dnia 23-12-2016 spl¹drowa³eœ najwiêcej wiosek na tym œwiecie (19 wiosek)!";}}', 10, 12, 20, 32, 0, 1);
INSERT INTO `users` VALUES (39, 2, 'ice41', '394961af481e4bdc0c598b4d259bca4d', 'N', 1, 4583, '', -1, '', 0, 0, 0, 0, 0, 2, 'prod', 0, 0, 0, 'all', 'all', '3', 0, 2, 0, 2, 0, 2, '1482523087', 1482523102, '', -1, '', 0, 0, 0, 0, 'x', '', '', '', 1000, 1, 1, 1, 9, '', '', 1, 0, 1, 1, 1, 3, 115515, 11, 0, 12, 0, 0, 0, 0, 0, 0, -1, 1482523102, 0, 0, 0, 0, 0, 0, 0, 0, 1, 115515, 11, 0, 0, 0, 'a:4:{s:18:"odznaczenie_punkty";a:3:{s:7:"stopien";i:1;s:5:"tekst";s:25:"Zdoby³eœ ju¿ 100 punktów!";s:5:"nazwa";s:12:"Król punktów";}s:19:"odznaczenie_ranking";a:3:{s:7:"stopien";i:3;s:5:"tekst";s:40:"Dosta³eœ siê do czo³owej 20 tego œwiata!";s:5:"nazwa";s:18:"Najlepszy zdobywca";}s:16:"odznaczenie_lupy";a:3:{s:7:"stopien";i:2;s:5:"tekst";s:57:"Zrabowa³eœ ju¿ 10<span class="grey">.</span>000 surowców!";s:5:"nazwa";s:5:"Rabuœ";}s:21:"odznaczenie_farmienie";a:3:{s:7:"stopien";i:1;s:5:"tekst";s:29:"Liczba udanych pl¹drowañ: 10!";s:5:"nazwa";s:9:"Grabie¿ca";}}', 0, 'Rycerz', 0, '', 0, 0, '', '', 10, 7, 0, 7, 0, 2);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=451 ;

-- 
-- Dumping data for table `villages`
-- 

INSERT INTO `villages` VALUES (1, 505, 498, '001', 1, '400000', '400000', '400000', 19537, 1327959057, 9709, 45, 23, 25, 20, 6, 1, 20, 1, 18, 30, 30, 29, 30, 30, 10, 20, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 0, 'farm,1327958538', 193, 0, 9500, 0, 0, 1294, 0, 0, 0, 0, 4, 1, 0, 0, 0, '100', 0, -1, 0, 1327956172, '', '', 1, 0, 0);
INSERT INTO `villages` VALUES (2, 501, 504, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956172, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956172, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (3, 501, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956172, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956172, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (4, 496, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (5, 503, 501, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (6, 500, 495, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (7, 495, 493, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (8, 508, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (9, 506, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (10, 496, 502, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (11, 499, 502, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (12, 505, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (13, 493, 497, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (14, 503, 494, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (15, 502, 494, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (16, 505, 493, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (17, 496, 500, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (18, 509, 505, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (19, 498, 504, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (20, 496, 497, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (21, 507, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (22, 505, 496, '003', 1, '251350.33333333299', '325337', '325337', 17043, 1327959117, 6492, 45, 17, 20, 13, 2, 0, 13, 1, 12, 30, 30, 30, 29, 28, 10, 12, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 'farm,1327958928', 5632, 1733, 0, 168, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 1, 0, 2);
INSERT INTO `villages` VALUES (23, 496, 489, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 3);
INSERT INTO `villages` VALUES (24, 505, 500, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (25, 505, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (26, 498, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (27, 491, 492, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (28, 499, 495, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 7);
INSERT INTO `villages` VALUES (29, 509, 504, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (30, 504, 501, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (31, 495, 497, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (32, 498, 488, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (33, 496, 496, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (34, 493, 494, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (35, 497, 491, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (36, 506, 497, '004', 1, '64799.500000021028', '97684.722222229349', '76161.50000003133', 6526, 1327959308, 5150, 45, 16, 25, 12, 2, 0, 15, 1, 9, 23, 25, 23, 30, 29, 10, 12, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 'farm,1327959253', 139, 232, 0, 342, 0, 0, 0, 445, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 1, 0, 1);
INSERT INTO `villages` VALUES (37, 500, 506, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (38, 500, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (39, 495, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (40, 499, 504, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (41, 502, 512, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (42, 510, 500, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 6);
INSERT INTO `villages` VALUES (43, 501, 492, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 1);
INSERT INTO `villages` VALUES (44, 499, 500, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 8);
INSERT INTO `villages` VALUES (45, 489, 495, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (46, 500, 490, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (47, 503, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (48, 502, 505, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (49, 511, 501, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (50, 494, 500, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (51, 496, 511, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (52, 499, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (53, 506, 507, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (54, 500, 496, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (55, 512, 502, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (56, 495, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (57, 506, 502, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (58, 488, 500, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (59, 489, 494, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (60, 501, 513, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (61, 493, 512, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (62, 488, 501, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (63, 490, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 6);
INSERT INTO `villages` VALUES (64, 507, 492, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (65, 505, 504, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 4);
INSERT INTO `villages` VALUES (66, 490, 489, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 1);
INSERT INTO `villages` VALUES (67, 488, 496, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (68, 505, 497, '002', 1, '400000', '400000', '400000', 11671, 1327959107, 7560, 45, 17, 25, 18, 6, 0, 20, 1, 13, 30, 30, 26, 30, 27, 10, 17, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 'wood,1327958804', 2566, 2477, 0, 0, 0, 50, 0, 631, 0, 0, 0, 0, 0, 0, 1, '100', 0, -1, 0, 1327956268, '', '', 1, 0, 6);
INSERT INTO `villages` VALUES (69, 505, 511, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (70, 494, 495, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (71, 496, 509, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 6);
INSERT INTO `villages` VALUES (72, 486, 501, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (73, 491, 502, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (74, 505, 488, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (75, 512, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 2);
INSERT INTO `villages` VALUES (76, 502, 502, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (77, 515, 500, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (78, 514, 489, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (79, 511, 502, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (80, 507, 497, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (81, 499, 485, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 4);
INSERT INTO `villages` VALUES (82, 506, 512, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (83, 495, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (84, 497, 490, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (85, 499, 511, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 3);
INSERT INTO `villages` VALUES (86, 499, 516, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 1);
INSERT INTO `villages` VALUES (87, 486, 495, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 9);
INSERT INTO `villages` VALUES (88, 495, 502, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (89, 493, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 2);
INSERT INTO `villages` VALUES (90, 510, 497, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (91, 515, 502, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 4);
INSERT INTO `villages` VALUES (92, 493, 501, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (93, 508, 500, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (94, 501, 489, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (95, 513, 496, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (96, 503, 491, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (97, 506, 509, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (98, 491, 511, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (99, 500, 488, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 6);
INSERT INTO `villages` VALUES (100, 495, 496, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (101, 491, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (102, 497, 484, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (103, 493, 506, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (104, 499, 510, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (105, 486, 509, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 9);
INSERT INTO `villages` VALUES (106, 485, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (107, 512, 504, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (108, 513, 500, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (109, 508, 511, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (110, 498, 493, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 6);
INSERT INTO `villages` VALUES (111, 494, 487, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (112, 492, 502, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (113, 513, 513, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (114, 500, 486, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 2);
INSERT INTO `villages` VALUES (115, 492, 504, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 2);
INSERT INTO `villages` VALUES (116, 496, 513, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 3);
INSERT INTO `villages` VALUES (117, 494, 484, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (118, 501, 490, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (119, 509, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (120, 504, 505, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (121, 487, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (122, 499, 490, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (123, 495, 494, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (124, 515, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 5);
INSERT INTO `villages` VALUES (125, 512, 497, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 9);
INSERT INTO `villages` VALUES (126, 499, 488, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 2);
INSERT INTO `villages` VALUES (127, 514, 504, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (128, 509, 515, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 9);
INSERT INTO `villages` VALUES (129, 485, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (130, 497, 515, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 5);
INSERT INTO `villages` VALUES (131, 513, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (132, 493, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (133, 489, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (134, 513, 504, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (135, 508, 488, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (136, 514, 486, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (137, 487, 502, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (138, 507, 507, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (139, 509, 495, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (140, 497, 492, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (141, 500, 511, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 4);
INSERT INTO `villages` VALUES (142, 509, 501, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (143, 510, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (144, 497, 489, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (145, 512, 489, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (146, 497, 485, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (147, 494, 509, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (148, 491, 505, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 8);
INSERT INTO `villages` VALUES (149, 505, 482, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (150, 518, 492, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (151, 507, 496, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (152, 504, 516, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (153, 484, 497, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (154, 515, 496, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (155, 498, 509, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 6);
INSERT INTO `villages` VALUES (156, 517, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 8);
INSERT INTO `villages` VALUES (157, 491, 507, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 4);
INSERT INTO `villages` VALUES (158, 483, 495, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 7);
INSERT INTO `villages` VALUES (159, 510, 496, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 3);
INSERT INTO `villages` VALUES (160, 486, 491, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (161, 488, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (162, 490, 504, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 6);
INSERT INTO `villages` VALUES (163, 493, 493, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (164, 488, 505, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (165, 493, 502, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (166, 516, 506, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (167, 506, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (168, 498, 507, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (169, 485, 496, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (170, 503, 519, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (171, 487, 488, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (172, 490, 506, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (173, 500, 517, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (174, 519, 493, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (175, 498, 513, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 5);
INSERT INTO `villages` VALUES (176, 501, 482, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (177, 504, 483, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 9);
INSERT INTO `villages` VALUES (178, 515, 489, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (179, 504, 492, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (180, 501, 517, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (181, 486, 505, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (182, 518, 505, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (183, 487, 484, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 3);
INSERT INTO `villages` VALUES (184, 490, 500, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (185, 503, 489, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (186, 512, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 3);
INSERT INTO `villages` VALUES (187, 494, 520, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (188, 482, 506, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (189, 513, 509, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (190, 518, 500, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (191, 506, 506, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (192, 482, 494, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (193, 515, 514, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 8);
INSERT INTO `villages` VALUES (194, 520, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (195, 505, 514, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (196, 491, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (197, 502, 518, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (198, 501, 516, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 3);
INSERT INTO `villages` VALUES (199, 494, 490, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (200, 511, 512, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (201, 511, 500, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (202, 496, 479, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (203, 513, 510, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (204, 485, 484, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (205, 516, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (206, 493, 484, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (207, 487, 511, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (208, 501, 488, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (209, 516, 511, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (210, 483, 507, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 8);
INSERT INTO `villages` VALUES (211, 503, 518, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (212, 487, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 2);
INSERT INTO `villages` VALUES (213, 487, 491, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (214, 492, 492, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (215, 494, 512, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (216, 483, 512, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (217, 487, 486, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (218, 486, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (219, 514, 513, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (220, 515, 490, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 5);
INSERT INTO `villages` VALUES (221, 509, 483, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (222, 479, 501, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (223, 514, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (224, 508, 487, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (225, 509, 484, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (226, 503, 482, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (227, 518, 494, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (228, 510, 506, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (229, 501, 481, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (230, 519, 509, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (231, 511, 510, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (232, 487, 504, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (233, 508, 518, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (234, 498, 487, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (235, 494, 516, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (236, 519, 490, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (237, 509, 510, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 4);
INSERT INTO `villages` VALUES (238, 505, 509, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (239, 521, 506, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (240, 498, 485, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (241, 503, 478, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (242, 488, 516, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (243, 499, 514, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (244, 480, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 7);
INSERT INTO `villages` VALUES (245, 506, 517, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (246, 506, 516, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (247, 483, 505, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (248, 496, 490, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (249, 479, 491, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (250, 486, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (251, 519, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 2);
INSERT INTO `villages` VALUES (252, 480, 495, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (253, 490, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (254, 478, 489, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (255, 523, 510, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (256, 518, 496, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (257, 495, 515, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (258, 514, 515, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (259, 507, 512, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 5);
INSERT INTO `villages` VALUES (260, 517, 514, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (261, 495, 483, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (262, 508, 507, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (263, 485, 500, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (264, 514, 521, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (265, 491, 515, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (266, 504, 478, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (267, 513, 505, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (268, 503, 486, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (269, 502, 516, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (270, 495, 512, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (271, 505, 522, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (272, 517, 497, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 3);
INSERT INTO `villages` VALUES (273, 518, 497, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (274, 520, 505, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (275, 482, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 4);
INSERT INTO `villages` VALUES (276, 504, 522, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (277, 489, 489, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (278, 488, 492, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (279, 509, 486, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (280, 486, 485, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (281, 518, 491, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (282, 487, 481, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (283, 518, 513, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (284, 523, 502, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (285, 521, 487, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (286, 511, 506, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (287, 518, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (288, 498, 519, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (289, 487, 493, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 9);
INSERT INTO `villages` VALUES (290, 489, 488, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (291, 507, 516, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (292, 494, 519, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (293, 479, 488, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (294, 520, 487, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (295, 510, 495, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (296, 506, 492, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (297, 506, 518, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (298, 506, 482, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (299, 512, 515, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (300, 489, 483, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (301, 481, 513, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (302, 478, 502, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (303, 508, 479, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (304, 504, 476, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (305, 484, 514, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (306, 485, 488, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (307, 506, 488, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (308, 522, 490, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (309, 488, 513, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (310, 499, 478, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (311, 484, 505, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (312, 504, 518, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (313, 479, 509, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (314, 490, 515, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (315, 493, 513, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (316, 496, 484, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (317, 518, 493, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 5);
INSERT INTO `villages` VALUES (318, 491, 520, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (319, 511, 486, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (320, 516, 491, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (321, 505, 519, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (322, 521, 507, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (323, 521, 491, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (324, 495, 522, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 6);
INSERT INTO `villages` VALUES (325, 484, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 3);
INSERT INTO `villages` VALUES (326, 510, 519, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (327, 514, 494, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (328, 516, 513, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (329, 510, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 8);
INSERT INTO `villages` VALUES (330, 479, 502, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (331, 478, 504, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 9);
INSERT INTO `villages` VALUES (332, 491, 518, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 9);
INSERT INTO `villages` VALUES (333, 477, 494, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (334, 484, 521, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (335, 486, 502, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (336, 482, 495, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (337, 485, 518, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 2);
INSERT INTO `villages` VALUES (338, 498, 475, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (339, 511, 490, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (340, 518, 512, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (341, 476, 501, 'Opuszczona wioska', -1, '322007', '322007', '322007', 1040, 1482523087, 3150, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 0, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '70', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (342, 491, 487, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (343, 515, 486, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (344, 482, 509, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 1);
INSERT INTO `villages` VALUES (345, 477, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (346, 498, 479, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (347, 514, 487, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (348, 514, 512, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (349, 516, 481, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (350, 476, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (351, 487, 507, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (352, 489, 519, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (353, 498, 478, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (354, 496, 485, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (355, 494, 481, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (356, 519, 517, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (357, 482, 511, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (358, 515, 506, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (359, 499, 482, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (360, 517, 516, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (361, 482, 490, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (362, 482, 484, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (363, 513, 515, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (364, 489, 485, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 4);
INSERT INTO `villages` VALUES (365, 495, 481, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (366, 500, 523, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (367, 500, 477, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 9);
INSERT INTO `villages` VALUES (368, 497, 481, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (369, 503, 516, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (370, 505, 477, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (371, 516, 494, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (372, 483, 506, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 8);
INSERT INTO `villages` VALUES (373, 485, 524, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (374, 518, 510, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (375, 490, 481, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (376, 524, 493, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (377, 514, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 3);
INSERT INTO `villages` VALUES (378, 479, 495, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (379, 490, 485, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (380, 485, 510, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (381, 486, 480, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (382, 527, 496, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (383, 478, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (384, 494, 476, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (385, 500, 480, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (386, 519, 494, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (387, 484, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 5);
INSERT INTO `villages` VALUES (388, 484, 494, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (389, 522, 499, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (390, 481, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (391, 487, 509, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (392, 490, 514, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 2);
INSERT INTO `villages` VALUES (393, 517, 517, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 4);
INSERT INTO `villages` VALUES (394, 493, 481, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (395, 506, 515, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 5);
INSERT INTO `villages` VALUES (396, 483, 486, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (397, 523, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (398, 519, 520, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (399, 481, 491, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (400, 508, 478, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (401, 520, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (402, 484, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (403, 483, 509, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 8);
INSERT INTO `villages` VALUES (404, 524, 490, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (405, 508, 484, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (406, 515, 483, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (407, 486, 523, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (408, 519, 495, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (409, 487, 510, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (410, 500, 518, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 8);
INSERT INTO `villages` VALUES (411, 526, 500, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (412, 481, 497, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (413, 485, 515, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (414, 486, 486, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (415, 494, 480, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (416, 517, 504, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 8);
INSERT INTO `villages` VALUES (417, 496, 476, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (418, 524, 503, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (419, 489, 520, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (420, 492, 520, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (421, 488, 512, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (422, 502, 528, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 4);
INSERT INTO `villages` VALUES (423, 497, 523, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (424, 519, 482, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (425, 482, 504, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (426, 472, 498, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (427, 475, 496, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (428, 494, 524, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (429, 513, 482, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (430, 513, 486, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (431, 525, 494, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (432, 487, 514, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (433, 495, 520, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (434, 504, 477, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (435, 510, 518, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (436, 517, 484, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 45, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 7);
INSERT INTO `villages` VALUES (437, 503, 523, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 3);
INSERT INTO `villages` VALUES (438, 477, 516, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (439, 477, 484, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (440, 479, 505, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 8);
INSERT INTO `villages` VALUES (441, 518, 517, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (442, 482, 486, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (443, 488, 519, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (444, 488, 478, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (445, 475, 489, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 44, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (446, 520, 508, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (447, 518, 522, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1327956268, 3209, 55, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1327956268, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (448, 476, 502, 'ice41s wioska', 2, '400000', '400000', '400000', 4499, 1482523102, 4583, 54, 20, 18, 11, 2, 1, 20, 1, 10, 23, 24, 23, 30, 22, 10, 12, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 'snob,1482522405', 0, 1000, 999, 0, 50, 0, 0, 0, 100, 0, 2, 0, 0, 0, 0, '100', 0, -1, 0, 1482522231, '', '', 1, 0, 0);
INSERT INTO `villages` VALUES (449, 499, 523, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1482522231, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1482522231, '', '', 0, 0, 0);
INSERT INTO `villages` VALUES (450, 498, 518, 'Opuszczona wioska', -1, '500', '500', '400', 1066, 1482522231, 3209, 54, 16, 18, 11, 2, 0, 12, 1, 9, 23, 24, 23, 29, 22, 10, 12, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '100', 0, -1, 0, 1482522231, '', '', 0, 0, 4);
