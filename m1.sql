
-- A despejar estrutura para tabela m1.ally
CREATE TABLE IF NOT EXISTS `ally` (
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
  `max_reservations` int(11) NOT NULL default '5',
  `end_reservations` int(11) NOT NULL default '3',
  PRIMARY KEY  (`id`),
  KEY `rank` (`rank`),
  KEY `name` (`name`),
  KEY `short` (`short`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela m1.ally: 0 rows
/*!40000 ALTER TABLE `ally` DISABLE KEYS */;
/*!40000 ALTER TABLE `ally` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.ally_contracts
CREATE TABLE IF NOT EXISTS `ally_contracts` (
  `from_ally` int(11) NOT NULL,
  `type` varchar(10) collate latin1_general_ci NOT NULL,
  `to_ally` int(11) NOT NULL,
  `short` varchar(100) collate latin1_general_ci NOT NULL,
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- A despejar dados para tabela m1.ally_contracts: 0 rows
/*!40000 ALTER TABLE `ally_contracts` DISABLE KEYS */;
/*!40000 ALTER TABLE `ally_contracts` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.ally_events
CREATE TABLE IF NOT EXISTS `ally_events` (
  `id` int(11) NOT NULL auto_increment,
  `ally` int(11) NOT NULL,
  `time` varchar(200) character set latin1 collate latin1_german1_ci NOT NULL,
  `message` text character set latin1 collate latin1_german1_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `ally` (`ally`),
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela m1.ally_events: 0 rows
/*!40000 ALTER TABLE `ally_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `ally_events` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.ally_invites
CREATE TABLE IF NOT EXISTS `ally_invites` (
  `id` int(11) NOT NULL auto_increment,
  `from_ally` int(11) NOT NULL,
  `to_userid` int(11) NOT NULL,
  `to_username` varchar(200) character set latin1 collate latin1_german1_ci NOT NULL,
  `time` int(40) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela m1.ally_invites: 0 rows
/*!40000 ALTER TABLE `ally_invites` DISABLE KEYS */;
/*!40000 ALTER TABLE `ally_invites` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.ally_reservations
CREATE TABLE IF NOT EXISTS `ally_reservations` (
  `id` int(11) NOT NULL auto_increment,
  `x` int(11) NOT NULL default '0',
  `by` int(11) NOT NULL,
  `expire_time` int(11) NOT NULL default '0',
  `ally` int(11) NOT NULL,
  `y` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- A despejar dados para tabela m1.ally_reservations: 0 rows
/*!40000 ALTER TABLE `ally_reservations` DISABLE KEYS */;
/*!40000 ALTER TABLE `ally_reservations` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.announcement
CREATE TABLE IF NOT EXISTS `announcement` (
  `id` int(11) NOT NULL auto_increment,
  `text` text character set latin1 collate latin1_german1_ci NOT NULL,
  `link` varchar(320) character set latin1 collate latin1_german1_ci NOT NULL,
  `graphic` varchar(100) character set latin1 collate latin1_german1_ci NOT NULL,
  `time` int(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela m1.announcement: 0 rows
/*!40000 ALTER TABLE `announcement` DISABLE KEYS */;
/*!40000 ALTER TABLE `announcement` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.build
CREATE TABLE IF NOT EXISTS `build` (
  `id` int(11) NOT NULL auto_increment,
  `building` varchar(30) character set latin1 collate latin1_german1_ci NOT NULL,
  `villageid` int(11) default NULL,
  `end_time` int(25) NOT NULL,
  `build_time` int(25) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `villageid` (`villageid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela m1.build: 0 rows
/*!40000 ALTER TABLE `build` DISABLE KEYS */;
/*!40000 ALTER TABLE `build` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.create_village
CREATE TABLE IF NOT EXISTS `create_village` (
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

-- A despejar dados para tabela m1.create_village: 1 rows
/*!40000 ALTER TABLE `create_village` DISABLE KEYS */;
INSERT INTO `create_village` (`nw_c`, `no_c`, `so_c`, `sw_c`, `nw`, `no`, `so`, `sw`, `no_alpha`, `nw_alpha`, `so_alpha`, `sw_alpha`, `next_left`) VALUES
	(1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1);
/*!40000 ALTER TABLE `create_village` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.dealers
CREATE TABLE IF NOT EXISTS `dealers` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela m1.dealers: 0 rows
/*!40000 ALTER TABLE `dealers` DISABLE KEYS */;
/*!40000 ALTER TABLE `dealers` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.destroy
CREATE TABLE IF NOT EXISTS `destroy` (
  `destroy_time` int(11) NOT NULL,
  `villageid` int(11) NOT NULL,
  `build` int(11) NOT NULL,
  `stage` int(11) NOT NULL,
  `start_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- A despejar dados para tabela m1.destroy: 0 rows
/*!40000 ALTER TABLE `destroy` DISABLE KEYS */;
/*!40000 ALTER TABLE `destroy` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.events
CREATE TABLE IF NOT EXISTS `events` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela m1.events: 0 rows
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.forum
CREATE TABLE IF NOT EXISTS `forum` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(500) character set utf8 collate utf8_unicode_ci NOT NULL,
  `ally` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- A despejar dados para tabela m1.forum: 1 rows
/*!40000 ALTER TABLE `forum` DISABLE KEYS */;
INSERT INTO `forum` (`id`, `name`, `ally`) VALUES
	(1, 'General', 1);
/*!40000 ALTER TABLE `forum` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.forum_f_read
CREATE TABLE IF NOT EXISTS `forum_f_read` (
  `id` int(11) NOT NULL auto_increment,
  `forum_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- A despejar dados para tabela m1.forum_f_read: 0 rows
/*!40000 ALTER TABLE `forum_f_read` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_f_read` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.forum_post
CREATE TABLE IF NOT EXISTS `forum_post` (
  `id` int(11) NOT NULL auto_increment,
  `thread_id` int(11) NOT NULL,
  `message` varchar(4000) character set utf8 collate utf8_unicode_ci NOT NULL,
  `posted_by` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- A despejar dados para tabela m1.forum_post: 0 rows
/*!40000 ALTER TABLE `forum_post` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_post` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.forum_read
CREATE TABLE IF NOT EXISTS `forum_read` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- A despejar dados para tabela m1.forum_read: 1 rows
/*!40000 ALTER TABLE `forum_read` DISABLE KEYS */;
INSERT INTO `forum_read` (`id`, `user_id`, `thread_id`) VALUES
	(1, 16, 1);
/*!40000 ALTER TABLE `forum_read` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.forum_thread
CREATE TABLE IF NOT EXISTS `forum_thread` (
  `id` int(11) NOT NULL auto_increment,
  `category_id` int(11) NOT NULL,
  `title` varchar(200) character set utf8 collate utf8_unicode_ci NOT NULL,
  `message` varchar(5000) character set utf8 collate utf8_unicode_ci NOT NULL,
  `author` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `important` int(11) NOT NULL default '0',
  `closed` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- A despejar dados para tabela m1.forum_thread: 1 rows
/*!40000 ALTER TABLE `forum_thread` DISABLE KEYS */;
INSERT INTO `forum_thread` (`id`, `category_id`, `title`, `message`, `author`, `time`, `important`, `closed`) VALUES
	(1, 1, 'blabla', 'aD%3AASD+%3AD', 'testar', 1352894001, 0, 0);
/*!40000 ALTER TABLE `forum_thread` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.friends
CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(20) NOT NULL auto_increment,
  `type` enum('activ','pending') collate latin1_general_ci NOT NULL default 'pending',
  `id_from` int(20) NOT NULL default '-1',
  `id_to` int(20) NOT NULL default '-1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- A despejar dados para tabela m1.friends: 0 rows
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
/*!40000 ALTER TABLE `friends` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.login
CREATE TABLE IF NOT EXISTS `login` (
  `login_locked` enum('yes','no') character set latin1 collate latin1_german1_ci NOT NULL default 'no',
  `start` varchar(50) character set latin1 collate latin1_german1_ci NOT NULL,
  `first_visit` tinyint(1) NOT NULL default '0',
  `extern_auth` varchar(32) collate utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela m1.login: 0 rows
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.logins
CREATE TABLE IF NOT EXISTS `logins` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(250) character set latin1 collate latin1_german1_ci NOT NULL,
  `time` int(33) NOT NULL,
  `ip` varchar(30) character set latin1 collate latin1_german1_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `uv` varchar(250) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela m1.logins: 0 rows
/*!40000 ALTER TABLE `logins` DISABLE KEYS */;
/*!40000 ALTER TABLE `logins` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.logs
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL auto_increment,
  `user` varchar(320) character set latin1 collate latin1_german1_ci NOT NULL,
  `village` varchar(320) character set latin1 collate latin1_german1_ci NOT NULL,
  `time` int(40) NOT NULL,
  `log` text character set latin1 collate latin1_german1_ci NOT NULL,
  `event_id` int(11) NOT NULL,
  `event_type` varchar(25) character set latin1 collate latin1_german1_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela m1.logs: 0 rows
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.mail
CREATE TABLE IF NOT EXISTS `mail` (
  `id` int(11) NOT NULL auto_increment,
  `subject` varchar(200) collate utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `message` text collate utf8_unicode_ci NOT NULL,
  `from_username` varchar(200) collate utf8_unicode_ci NOT NULL,
  `from_userid` int(11) NOT NULL,
  `from_read` int(11) NOT NULL default '1',
  `from_delete` int(11) NOT NULL default '0',
  `to_username` varchar(200) collate utf8_unicode_ci NOT NULL,
  `to_userid` int(11) NOT NULL,
  `to_read` int(11) NOT NULL default '1',
  `to_delete` int(11) NOT NULL default '0',
  `world` varchar(60) character set latin1 NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela m1.mail: 0 rows
/*!40000 ALTER TABLE `mail` DISABLE KEYS */;
/*!40000 ALTER TABLE `mail` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.mail_archiv
CREATE TABLE IF NOT EXISTS `mail_archiv` (
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- A despejar dados para tabela m1.mail_archiv: 0 rows
/*!40000 ALTER TABLE `mail_archiv` DISABLE KEYS */;
/*!40000 ALTER TABLE `mail_archiv` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.mail_block
CREATE TABLE IF NOT EXISTS `mail_block` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  `blocked_id` int(11) NOT NULL,
  `blocked_name` varchar(150) character set latin1 collate latin1_german1_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `blocked_id` (`blocked_id`),
  KEY `blocked_name` (`blocked_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela m1.mail_block: 0 rows
/*!40000 ALTER TABLE `mail_block` DISABLE KEYS */;
/*!40000 ALTER TABLE `mail_block` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.mail_in
CREATE TABLE IF NOT EXISTS `mail_in` (
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- A despejar dados para tabela m1.mail_in: 0 rows
/*!40000 ALTER TABLE `mail_in` DISABLE KEYS */;
/*!40000 ALTER TABLE `mail_in` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.mail_mass
CREATE TABLE IF NOT EXISTS `mail_mass` (
  `id` int(20) NOT NULL auto_increment,
  `subject` varchar(100) collate latin1_general_ci NOT NULL,
  `time` int(20) NOT NULL,
  `text` text collate latin1_general_ci NOT NULL,
  `array_subjects_id` varchar(1000) collate latin1_general_ci NOT NULL,
  `from_id` int(20) NOT NULL,
  `from_username` varchar(100) collate latin1_general_ci NOT NULL,
  `belongs_to` int(12) NOT NULL default '0',
  `delete` enum('y','n') collate latin1_general_ci NOT NULL default 'n',
  `id_display` int(15) NOT NULL default '-1',
  `username_display` varchar(300) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `from_id` (`from_id`),
  KEY `belongs_to` (`belongs_to`),
  KEY `delete` (`delete`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- A despejar dados para tabela m1.mail_mass: 0 rows
/*!40000 ALTER TABLE `mail_mass` DISABLE KEYS */;
/*!40000 ALTER TABLE `mail_mass` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.mail_out
CREATE TABLE IF NOT EXISTS `mail_out` (
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- A despejar dados para tabela m1.mail_out: 0 rows
/*!40000 ALTER TABLE `mail_out` DISABLE KEYS */;
/*!40000 ALTER TABLE `mail_out` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.mail_post
CREATE TABLE IF NOT EXISTS `mail_post` (
  `id` int(20) NOT NULL auto_increment,
  `subject_id` int(20) NOT NULL,
  `text` text collate latin1_general_ci NOT NULL,
  `time` int(20) NOT NULL,
  `from_id` int(20) NOT NULL,
  `to_id` int(11) NOT NULL,
  `from_username` varchar(150) collate latin1_general_ci NOT NULL,
  `to_username` varchar(900) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `subject_id` (`subject_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- A despejar dados para tabela m1.mail_post: 0 rows
/*!40000 ALTER TABLE `mail_post` DISABLE KEYS */;
/*!40000 ALTER TABLE `mail_post` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.mail_send
CREATE TABLE IF NOT EXISTS `mail_send` (
  `id` int(11) NOT NULL auto_increment,
  `mail` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `message` text collate utf8_unicode_ci NOT NULL,
  `from_userid` int(11) NOT NULL,
  `from_username` varchar(200) collate utf8_unicode_ci NOT NULL,
  `to_userid` int(11) NOT NULL,
  `to_username` varchar(200) collate utf8_unicode_ci NOT NULL,
  `world` varchar(60) character set latin1 NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela m1.mail_send: 0 rows
/*!40000 ALTER TABLE `mail_send` DISABLE KEYS */;
/*!40000 ALTER TABLE `mail_send` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.mail_subject
CREATE TABLE IF NOT EXISTS `mail_subject` (
  `id` int(20) NOT NULL auto_increment,
  `subject` varchar(50) collate latin1_general_ci NOT NULL,
  `last_post` int(20) NOT NULL,
  `from_id` int(20) NOT NULL default '-1',
  `to_id` int(20) NOT NULL default '-1',
  `from_username` varchar(150) collate latin1_general_ci NOT NULL,
  `to_username` varchar(150) collate latin1_general_ci NOT NULL,
  `post_num` int(20) NOT NULL,
  `status_from` enum('read','new','answered') collate latin1_general_ci NOT NULL,
  `status_to` enum('read','new','answered') collate latin1_general_ci NOT NULL,
  `delete_from` enum('y','n') collate latin1_general_ci NOT NULL default 'n',
  `delete_to` enum('y','n') collate latin1_general_ci NOT NULL default 'n',
  `read_unique` enum('y','n') collate latin1_general_ci NOT NULL default 'n',
  PRIMARY KEY  (`id`),
  KEY `delete_from` (`delete_from`),
  KEY `delete_to` (`delete_to`),
  KEY `from_id` (`from_id`),
  KEY `to_id` (`to_id`),
  KEY `subject` (`subject`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- A despejar dados para tabela m1.mail_subject: 0 rows
/*!40000 ALTER TABLE `mail_subject` DISABLE KEYS */;
/*!40000 ALTER TABLE `mail_subject` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.map_info
CREATE TABLE IF NOT EXISTS `map_info` (
  `userid` int(11) NOT NULL,
  `vill_info` int(11) NOT NULL default '0',
  `attktime` int(11) NOT NULL default '0',
  `troops` int(11) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- A despejar dados para tabela m1.map_info: 0 rows
/*!40000 ALTER TABLE `map_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `map_info` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.movements
CREATE TABLE IF NOT EXISTS `movements` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela m1.movements: 0 rows
/*!40000 ALTER TABLE `movements` DISABLE KEYS */;
/*!40000 ALTER TABLE `movements` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.offers
CREATE TABLE IF NOT EXISTS `offers` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela m1.offers: 0 rows
/*!40000 ALTER TABLE `offers` DISABLE KEYS */;
/*!40000 ALTER TABLE `offers` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.offers_multi
CREATE TABLE IF NOT EXISTS `offers_multi` (
  `id` int(11) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela m1.offers_multi: 0 rows
/*!40000 ALTER TABLE `offers_multi` DISABLE KEYS */;
/*!40000 ALTER TABLE `offers_multi` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.quickbar
CREATE TABLE IF NOT EXISTS `quickbar` (
  `id` int(11) NOT NULL auto_increment,
  `name` text collate latin1_general_ci NOT NULL,
  `img` text collate latin1_general_ci NOT NULL,
  `href` text collate latin1_general_ci NOT NULL,
  `target` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- A despejar dados para tabela m1.quickbar: 0 rows
/*!40000 ALTER TABLE `quickbar` DISABLE KEYS */;
/*!40000 ALTER TABLE `quickbar` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.recruit
CREATE TABLE IF NOT EXISTS `recruit` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela m1.recruit: 0 rows
/*!40000 ALTER TABLE `recruit` DISABLE KEYS */;
/*!40000 ALTER TABLE `recruit` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.reports
CREATE TABLE IF NOT EXISTS `reports` (
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
  `s_buildings` varchar(100) collate utf8_unicode_ci NOT NULL,
  `s_res` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `receiver_userid` (`receiver_userid`),
  KEY `group` (`in_group`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela m1.reports: 0 rows
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.research
CREATE TABLE IF NOT EXISTS `research` (
  `id` int(11) NOT NULL auto_increment,
  `research` varchar(30) character set latin1 collate latin1_german1_ci NOT NULL,
  `villageid` int(11) NOT NULL,
  `end_time` int(25) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `villageid` (`villageid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela m1.research: 0 rows
/*!40000 ALTER TABLE `research` DISABLE KEYS */;
/*!40000 ALTER TABLE `research` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.run_events
CREATE TABLE IF NOT EXISTS `run_events` (
  `id` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- A despejar dados para tabela m1.run_events: 0 rows
/*!40000 ALTER TABLE `run_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `run_events` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.save_players
CREATE TABLE IF NOT EXISTS `save_players` (
  `id` int(11) NOT NULL auto_increment,
  `round_id` int(11) NOT NULL default '0',
  `username` varchar(200) character set latin1 collate latin1_german1_ci NOT NULL default '',
  `rank` int(20) NOT NULL default '0',
  `ally` varchar(20) character set latin1 collate latin1_german1_ci NOT NULL default '',
  `points` int(20) NOT NULL default '0',
  `villages` int(20) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela m1.save_players: 0 rows
/*!40000 ALTER TABLE `save_players` DISABLE KEYS */;
/*!40000 ALTER TABLE `save_players` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.save_rounds
CREATE TABLE IF NOT EXISTS `save_rounds` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela m1.save_rounds: 0 rows
/*!40000 ALTER TABLE `save_rounds` DISABLE KEYS */;
/*!40000 ALTER TABLE `save_rounds` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  `username` varchar(180) collate utf8_unicode_ci NOT NULL,
  `sid` varchar(32) character set latin1 collate latin1_german1_ci NOT NULL,
  `hkey` varchar(4) character set latin1 collate latin1_german1_ci NOT NULL,
  `is_vacation` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `sid` (`sid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela m1.sessions: 0 rows
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.share
CREATE TABLE IF NOT EXISTS `share` (
  `id` int(11) NOT NULL auto_increment,
  `id_from` int(20) NOT NULL,
  `id_to` int(20) NOT NULL,
  `time` int(11) NOT NULL,
  `username_to` varchar(320) character set utf8 collate utf8_unicode_ci NOT NULL,
  `delete_time` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- A despejar dados para tabela m1.share: 0 rows
/*!40000 ALTER TABLE `share` DISABLE KEYS */;
/*!40000 ALTER TABLE `share` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.unit_place
CREATE TABLE IF NOT EXISTS `unit_place` (
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

-- A despejar dados para tabela m1.unit_place: 0 rows
/*!40000 ALTER TABLE `unit_place` DISABLE KEYS */;
/*!40000 ALTER TABLE `unit_place` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(150) collate utf8_unicode_ci default NULL,
  `password` varchar(32) collate utf8_unicode_ci NOT NULL default '',
  `banned` enum('Y','N') collate utf8_unicode_ci NOT NULL default 'N',
  `ban_start` int(11) NOT NULL default '0',
  `ban_end` int(11) NOT NULL default '0',
  `ban_por` varchar(180) collate utf8_unicode_ci NOT NULL,
  `ban_motivo` text collate utf8_unicode_ci NOT NULL,
  `villages` int(10) NOT NULL,
  `points` int(20) NOT NULL,
  `ennobled_by` varchar(90) collate utf8_unicode_ci NOT NULL,
  `ally` int(11) NOT NULL default '-1',
  `ally_titel` varchar(200) collate utf8_unicode_ci NOT NULL,
  `ally_view_titel` int(1) NOT NULL default '0',
  `ally_found` int(1) NOT NULL default '0',
  `ally_lead` int(1) NOT NULL default '0',
  `ally_invite` int(1) NOT NULL default '0',
  `ally_diplomacy` int(1) NOT NULL default '0',
  `ally_mass_mail` int(1) NOT NULL default '0',
  `ally_forum_mod` int(1) NOT NULL default '0',
  `ally_internal_forum` int(1) NOT NULL default '0',
  `ally_trusted_member` int(1) NOT NULL default '0',
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
  `hives_total` int(11) NOT NULL default '0',
  `hives_rank` int(11) NOT NULL,
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
  `window_width` int(4) NOT NULL default '950',
  `show_toolbar` int(1) NOT NULL default '1',
  `dyn_menu` int(1) NOT NULL default '1',
  `confirm_queue` int(1) NOT NULL default '1',
  `map_size` int(2) NOT NULL default '9',
  `minimap_size` int(2) NOT NULL default '275',
  `info_acc_show` int(1) NOT NULL default '1',
  `show_announcements` int(1) NOT NULL default '1',
  `memo` text collate utf8_unicode_ci NOT NULL,
  `map_reload` text collate utf8_unicode_ci NOT NULL,
  `graphical_overwiev` tinyint(1) NOT NULL default '1',
  `overview` varchar(5) collate utf8_unicode_ci NOT NULL default 'new',
  `stufen` varchar(5) collate utf8_unicode_ci NOT NULL default 'yes',
  `winter` varchar(30) collate utf8_unicode_ci NOT NULL,
  `noob_protection` int(11) NOT NULL default '0',
  `delete_acc` int(11) NOT NULL default '0',
  `new_begin_time` int(11) NOT NULL default '0',
  `sleep` enum('0','1') collate utf8_unicode_ci NOT NULL default '0',
  `sleep_time` int(11) NOT NULL default '0',
  `sleep_start` int(11) NOT NULL default '0',
  `sleep_end` int(11) NOT NULL default '0',
  `sleep_used` enum('0','1') collate utf8_unicode_ci NOT NULL default '0',
  `sleep_last_activate` int(11) NOT NULL default '0',
  `last_attack` int(11) NOT NULL default '0',
  `coins` int(11) NOT NULL default '0',
  `coins_n` int(11) NOT NULL default '0',
  `nextsnob` int(11) NOT NULL default '0',
  `filter` varchar(60) collate utf8_unicode_ci NOT NULL,
  `chatban` varchar(100) collate utf8_unicode_ci NOT NULL,
  `destroy_time` int(11) NOT NULL default '0',
  `destroy_num` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `username` (`username`),
  KEY `rang` (`rang`),
  KEY `vacation_id` (`vacation_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AVG_ROW_LENGTH=166;

-- A despejar dados para tabela m1.users: 0 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- A despejar estrutura para tabela m1.villages
CREATE TABLE IF NOT EXISTS `villages` (
  `id` int(11) NOT NULL auto_increment,
  `bonus` int(11) NOT NULL default '0',
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `name` varchar(100) collate utf8_unicode_ci default NULL,
  `userid` int(11) NOT NULL,
  `r_wood` varchar(230) collate utf8_unicode_ci default '5000',
  `r_stone` varchar(230) collate utf8_unicode_ci default '5000',
  `r_iron` varchar(230) collate utf8_unicode_ci default '4000',
  `r_bh` int(15) NOT NULL default '0',
  `last_prod_aktu` int(35) NOT NULL,
  `points` int(11) NOT NULL,
  `continent` int(6) NOT NULL,
  `main` int(5) default '30',
  `barracks` int(5) default '25',
  `stable` int(5) default '20',
  `garage` int(5) default '15',
  `snob` int(5) default '1',
  `smith` int(5) default '20',
  `place` int(5) default '1',
  `market` int(5) default '25',
  `wood` int(5) default '30',
  `stone` int(5) default '30',
  `iron` int(5) default '30',
  `storage` int(5) default '30',
  `farm` int(5) default '30',
  `hide` int(5) default '10',
  `wall` int(5) default '20',
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
  `snob_recruit` int(11) NOT NULL default '0',
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela m1.villages: 0 rows
/*!40000 ALTER TABLE `villages` DISABLE KEYS */;
/*!40000 ALTER TABLE `villages` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
