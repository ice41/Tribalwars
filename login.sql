

-- A despejar estrutura para tabela login.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(180) collate utf8_unicode_ci NOT NULL,
  `password` varchar(100) collate utf8_unicode_ci NOT NULL,
  `level` int(1) NOT NULL,
  `session` varchar(30) collate utf8_unicode_ci NOT NULL,
  `last_visit` int(11) NOT NULL,
  `last_activity` int(11) NOT NULL default '0',
  `last_ip` varchar(60) collate utf8_unicode_ci NOT NULL default '0.0.0.0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela login.admin: 1 rows
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `username`, `password`, `level`, `session`, `last_visit`, `last_activity`, `last_ip`) VALUES
	(3, 'ice41', '2ba111537f5f8a9487e3aa72d553ab53', 5, 'tKRtz5dIat3okzgYxOacQ9rLiey95C', 1703978206, 1703978235, '127.0.0.1');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- A despejar estrutura para tabela login.change_mail
CREATE TABLE IF NOT EXISTS `change_mail` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  `username` varchar(200) character set latin1 collate latin1_general_ci NOT NULL,
  `new_mail` varchar(600) character set latin1 collate latin1_general_ci NOT NULL,
  `second_mail` varchar(600) character set latin1 collate latin1_general_ci NOT NULL,
  `cod` varchar(100) character set latin1 collate latin1_general_ci NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela login.change_mail: 0 rows
/*!40000 ALTER TABLE `change_mail` DISABLE KEYS */;
/*!40000 ALTER TABLE `change_mail` ENABLE KEYS */;

-- A despejar estrutura para tabela login.logins
CREATE TABLE IF NOT EXISTS `logins` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(180) collate utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `ip` varchar(60) collate utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `world` varchar(30) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela login.logins: 20 rows
/*!40000 ALTER TABLE `logins` DISABLE KEYS */;
INSERT INTO `logins` (`id`, `username`, `time`, `ip`, `userid`, `world`) VALUES
	(1, 'testar', 1352891909, '127.0.0.1', 16, 'm1'),
	(2, 'testar', 1352892659, '127.0.0.1', 16, 'm1'),
	(3, 'kfeast', 1352892770, '127.0.0.1', 17, 'm1'),
	(4, 'testar', 1352893505, '127.0.0.1', 16, 'm1'),
	(5, 'kfeast', 1352895127, '127.0.0.1', 17, 'm1'),
	(6, 'kfeast', 1352895626, '127.0.0.1', 17, 'm1'),
	(7, 'ice41', 1482442396, '127.0.0.1', 19, 'm1'),
	(8, 'ice41', 1482443062, '127.0.0.1', 19, 'm1'),
	(9, 'ice41', 1482443094, '127.0.0.1', 19, 'm1'),
	(10, 'ice41', 1482444386, '127.0.0.1', 19, 'm1'),
	(11, 'ice41', 1535305748, '127.0.0.1', 19, 'm1'),
	(12, 'ice41', 1564836673, '127.0.0.1', 19, 'm1'),
	(13, 'ice41', 1564874912, '127.0.0.1', 19, 'm1'),
	(14, 'ice41', 1565194220, '127.0.0.1', 19, 'm1'),
	(15, 'RealDick', 1565194258, '178.166.127.56', 20, 'm1'),
	(16, 'ice41', 1669480257, '127.0.0.1', 19, 'm1'),
	(17, 'ice41', 1669480413, '127.0.0.1', 19, 'm1'),
	(18, 'ice41', 1703977342, '127.0.0.1', 19, 'm1'),
	(19, 'ice41', 1703977372, '127.0.0.1', 19, 'm1'),
	(20, 'ice41', 1703977418, '127.0.0.1', 19, 'm1');
/*!40000 ALTER TABLE `logins` ENABLE KEYS */;

-- A despejar estrutura para tabela login.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL auto_increment,
  `text` text collate utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `author` varchar(180) character set latin1 collate latin1_general_ci NOT NULL,
  `type` varchar(30) collate utf8_unicode_ci NOT NULL,
  `stats` enum('0','1') collate utf8_unicode_ci NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela login.news: 0 rows
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- A despejar estrutura para tabela login.permissions_ranks
CREATE TABLE IF NOT EXISTS `permissions_ranks` (
  `id` int(11) NOT NULL auto_increment,
  `rank` int(11) NOT NULL COMMENT 'ID do rank na tabela ''ranks''.',
  `adm_login` enum('0','1') NOT NULL default '0',
  `adm_home` enum('0','1') NOT NULL default '0',
  `adm_support` enum('0','1') NOT NULL default '0',
  `adm_settings` enum('0','1') NOT NULL default '0',
  `adm_settings_news` enum('0','1') NOT NULL default '0',
  `adm_settings_users` enum('0','1') NOT NULL default '0',
  `adm_settings_villages` enum('0','1') NOT NULL default '0',
  `adm_settings_worlds` enum('0','1') NOT NULL default '0',
  `adm_settings_worlds_reset` enum('0','1') character set utf8 collate utf8_unicode_ci NOT NULL default '0',
  `adm_ranks` enum('0','1') NOT NULL default '0',
  `adm_memo` enum('0','1') NOT NULL default '0',
  `adm_mail` enum('0','1') NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- A despejar dados para tabela login.permissions_ranks: 3 rows
/*!40000 ALTER TABLE `permissions_ranks` DISABLE KEYS */;
INSERT INTO `permissions_ranks` (`id`, `rank`, `adm_login`, `adm_home`, `adm_support`, `adm_settings`, `adm_settings_news`, `adm_settings_users`, `adm_settings_villages`, `adm_settings_worlds`, `adm_settings_worlds_reset`, `adm_ranks`, `adm_memo`, `adm_mail`) VALUES
	(1, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
	(2, 2, '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0'),
	(3, 3, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
/*!40000 ALTER TABLE `permissions_ranks` ENABLE KEYS */;

-- A despejar estrutura para tabela login.premium_pgtos
CREATE TABLE IF NOT EXISTS `premium_pgtos` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  `pacote` int(5) NOT NULL default '0',
  `codigo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `data` int(11) NOT NULL,
  `portal` varchar(10) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY  (`id`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- A despejar dados para tabela login.premium_pgtos: 0 rows
/*!40000 ALTER TABLE `premium_pgtos` DISABLE KEYS */;
/*!40000 ALTER TABLE `premium_pgtos` ENABLE KEYS */;

-- A despejar estrutura para tabela login.ranks
CREATE TABLE IF NOT EXISTS `ranks` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(120) NOT NULL COMMENT 'Insira aqui o nome do cargo.',
  `namecolor` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL COMMENT 'Insira neste campo uma pequena resenha sobre a funÃ§Ã£o do cargo.',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- A despejar dados para tabela login.ranks: 3 rows
/*!40000 ALTER TABLE `ranks` DISABLE KEYS */;
INSERT INTO `ranks` (`id`, `name`, `namecolor`, `description`) VALUES
	(1, 'Moderador', '', ''),
	(2, 'Administrador', '', ''),
	(3, 'Fundador', '#FF0000', '');
/*!40000 ALTER TABLE `ranks` ENABLE KEYS */;

-- A despejar estrutura para tabela login.support
CREATE TABLE IF NOT EXISTS `support` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  `username` varchar(180) character set latin1 collate latin1_general_ci NOT NULL,
  `time` int(11) NOT NULL,
  `subject` varchar(60) character set latin1 collate latin1_general_ci NOT NULL,
  `text` text character set latin1 collate latin1_general_ci NOT NULL,
  `type` varchar(60) character set latin1 collate latin1_general_ci NOT NULL,
  `new` enum('1','0') character set latin1 collate latin1_general_ci NOT NULL default '0',
  `stat` enum('0','1','2') character set latin1 collate latin1_general_ci NOT NULL default '0',
  `newadm` enum('1','0') character set latin1 collate latin1_general_ci NOT NULL default '0',
  `u_resp` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela login.support: 0 rows
/*!40000 ALTER TABLE `support` DISABLE KEYS */;
/*!40000 ALTER TABLE `support` ENABLE KEYS */;

-- A despejar estrutura para tabela login.support_post
CREATE TABLE IF NOT EXISTS `support_post` (
  `id` int(11) NOT NULL auto_increment,
  `ticket` int(11) NOT NULL,
  `userid` int(11) NOT NULL default '-1',
  `username` varchar(150) character set latin1 NOT NULL,
  `time` int(11) NOT NULL,
  `text` text character set latin1 NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela login.support_post: 0 rows
/*!40000 ALTER TABLE `support_post` DISABLE KEYS */;
/*!40000 ALTER TABLE `support_post` ENABLE KEYS */;

-- A despejar estrutura para tabela login.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(180) collate utf8_unicode_ci NOT NULL,
  `password` varchar(100) collate utf8_unicode_ci NOT NULL,
  `banned` enum('Y','N') collate utf8_unicode_ci NOT NULL default 'N',
  `ban_count` int(11) NOT NULL default '0',
  `mail` varchar(120) character set utf8 NOT NULL,
  `session` varchar(100) collate utf8_unicode_ci NOT NULL,
  `rank` int(1) NOT NULL default '0',
  `last_activity` int(11) NOT NULL,
  `wins` int(11) NOT NULL default '0',
  `gc` int(11) NOT NULL default '70',
  `create_time` varchar(60) character set latin1 collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela login.users: 2 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `banned`, `ban_count`, `mail`, `session`, `rank`, `last_activity`, `wins`, `gc`, `create_time`) VALUES
	(1, 'ice41', '2ba111537f5f8a9487e3aa72d553ab53', 'N', 0, 'edu.ice7@gmail.com', 'xEyfyycCJZajzrSEfN5PlGvQtJXkNqyeJl4arp1lahC54qZ8r6JnpEYYnBHZnnX31qvBCm3dHRGunez0', 3, 1703978595, 0, 70, '1482442385'),
	(2, 'RealDick', 'a4e621f827fab7831cbcff7e8c26b75e', 'N', 0, 'kelelawar1@gmail.com', 'nekKyfU6xIrKBLge5TPQbWCyCf9XO9cPj1qhAWEjXbt6lXz8lRtJmpA13bXBKu5P1kysBmXFYgYoT3Xi', 0, 1565194549, 0, 70, '1565194247');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- A despejar estrutura para tabela login.users_hall
CREATE TABLE IF NOT EXISTS `users_hall` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(180) collate utf8_unicode_ci NOT NULL,
  `ally` varchar(200) collate utf8_unicode_ci NOT NULL,
  `ally_short` varchar(100) collate utf8_unicode_ci NOT NULL,
  `round` int(11) NOT NULL,
  `world` varchar(60) collate utf8_unicode_ci NOT NULL,
  `points` int(11) NOT NULL default '0',
  `villages` int(11) NOT NULL default '0',
  `od` int(11) NOT NULL default '0',
  `hives` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela login.users_hall: 0 rows
/*!40000 ALTER TABLE `users_hall` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_hall` ENABLE KEYS */;

-- A despejar estrutura para tabela login.users_ranking
CREATE TABLE IF NOT EXISTS `users_ranking` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) unsigned NOT NULL,
  `exp` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- A despejar dados para tabela login.users_ranking: 0 rows
/*!40000 ALTER TABLE `users_ranking` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_ranking` ENABLE KEYS */;

-- A despejar estrutura para tabela login.users_titles
CREATE TABLE IF NOT EXISTS `users_titles` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) default NULL,
  `exp_min` int(11) default NULL,
  `exp_max` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- A despejar dados para tabela login.users_titles: 15 rows
/*!40000 ALTER TABLE `users_titles` DISABLE KEYS */;
INSERT INTO `users_titles` (`id`, `title`, `exp_min`, `exp_max`) VALUES
	(1, 'Deus da Guerra', 8750001, 2147483647),
	(2, 'Semi-Deus', 5700001, 8750000),
	(3, 'Imperador', 4250001, 5700000),
	(4, 'Supremo Sacerdote', 2750001, 4250000),
	(5, 'Primeiro Monarca', 2000001, 2750000),
	(6, 'Guarda Real', 1500001, 2000000),
	(7, 'Dark lord', 1000001, 1500000),
	(8, 'Senhor feudau', 794001, 1000000),
	(9, 'Cavaleiro de elite', 670001, 794000),
	(10, 'Paladino', 557001, 670000),
	(11, 'Escudeiro', 426501, 557000),
	(12, 'Lanceiro', 309001, 426500),
	(13, 'Armeiro', 185001, 309000),
	(14, 'Aprendiz', 78001, 185000),
	(15, 'Plebeu - Noob', 0, 78000);
/*!40000 ALTER TABLE `users_titles` ENABLE KEYS */;

-- A despejar estrutura para tabela login.worlds
CREATE TABLE IF NOT EXISTS `worlds` (
  `id` int(11) NOT NULL auto_increment,
  `world_name` varchar(180) collate utf8_unicode_ci NOT NULL,
  `world_link` varchar(120) collate utf8_unicode_ci NOT NULL,
  `world_active` enum('0','1') collate utf8_unicode_ci NOT NULL default '0',
  `world_db` varchar(120) collate utf8_unicode_ci NOT NULL,
  `world_start` int(11) NOT NULL default '0',
  `world_end` int(11) NOT NULL default '0',
  `world_round` int(11) NOT NULL default '0',
  `world_bonus` int(11) NOT NULL default '0',
  `world_peso` int(11) NOT NULL default '50',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AVG_ROW_LENGTH=28;

-- A despejar dados para tabela login.worlds: 1 rows
/*!40000 ALTER TABLE `worlds` DISABLE KEYS */;
INSERT INTO `worlds` (`id`, `world_name`, `world_link`, `world_active`, `world_db`, `world_start`, `world_end`, `world_round`, `world_bonus`, `world_peso`) VALUES
	(1, 'Mundo+1', 'm1', '1', 'm1', 1703978235, 1735168635, 13, 10, 50);
/*!40000 ALTER TABLE `worlds` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
