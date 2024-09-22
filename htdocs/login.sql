/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50024
Source Host           : localhost:3306
Source Database       : login

Target Server Type    : MYSQL
Target Server Version : 50024
File Encoding         : 65001

Date: 2019-08-03 13:45:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(180) collate utf8_unicode_ci NOT NULL,
  `password` varchar(100) collate utf8_unicode_ci NOT NULL,
  `level` int(1) NOT NULL,
  `session` varchar(30) collate utf8_unicode_ci NOT NULL,
  `last_visit` int(11) NOT NULL,
  `last_activity` int(11) NOT NULL default '0',
  `last_ip` varchar(60) collate utf8_unicode_ci NOT NULL default '0.0.0.0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'ice41', '5ce02053d067b2e9666da9d336961eec', '5', '1LgIQab1v9rhUwfOahT3odFu0rQTcW', '1352894548', '1352894990', '127.0.0.1');
INSERT INTO `admin` VALUES ('2', 'LanServers.tk', '5ce02053d067b2e9666da9d336961eec', '5', 'Q3T1IY8lzQ5p1QkTgpQuf1UcpFBkEk', '1352895023', '1352895108', '127.0.0.1');

-- ----------------------------
-- Table structure for `change_mail`
-- ----------------------------
DROP TABLE IF EXISTS `change_mail`;
CREATE TABLE `change_mail` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  `username` varchar(200) character set latin1 collate latin1_general_ci NOT NULL,
  `new_mail` varchar(600) character set latin1 collate latin1_general_ci NOT NULL,
  `second_mail` varchar(600) character set latin1 collate latin1_general_ci NOT NULL,
  `cod` varchar(100) character set latin1 collate latin1_general_ci NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of change_mail
-- ----------------------------

-- ----------------------------
-- Table structure for `logins`
-- ----------------------------
DROP TABLE IF EXISTS `logins`;
CREATE TABLE `logins` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(180) collate utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `ip` varchar(60) collate utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `world` varchar(30) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of logins
-- ----------------------------
INSERT INTO `logins` VALUES ('1', 'ice41', '1535305748', '127.0.0.1', '16', 'm1');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL auto_increment,
  `text` text collate utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `author` varchar(180) character set latin1 collate latin1_general_ci NOT NULL,
  `type` varchar(30) collate utf8_unicode_ci NOT NULL,
  `stats` enum('0','1') collate utf8_unicode_ci NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of news
-- ----------------------------

-- ----------------------------
-- Table structure for `permissions_ranks`
-- ----------------------------
DROP TABLE IF EXISTS `permissions_ranks`;
CREATE TABLE `permissions_ranks` (
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

-- ----------------------------
-- Records of permissions_ranks
-- ----------------------------
INSERT INTO `permissions_ranks` VALUES ('3', '3', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');

-- ----------------------------
-- Table structure for `premium_pgtos`
-- ----------------------------
DROP TABLE IF EXISTS `premium_pgtos`;
CREATE TABLE `premium_pgtos` (
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

-- ----------------------------
-- Records of premium_pgtos
-- ----------------------------

-- ----------------------------
-- Table structure for `ranks`
-- ----------------------------
DROP TABLE IF EXISTS `ranks`;
CREATE TABLE `ranks` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(120) NOT NULL COMMENT 'Insira aqui o nome do cargo.',
  `namecolor` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL COMMENT 'Insira neste campo uma pequena resenha sobre a função do cargo.',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ranks
-- ----------------------------
INSERT INTO `ranks` VALUES ('1', 'Moderador', '', '');
INSERT INTO `ranks` VALUES ('2', 'Administrador', '', '');
INSERT INTO `ranks` VALUES ('3', 'Fundador', '#FF0000', '');

-- ----------------------------
-- Table structure for `support`
-- ----------------------------
DROP TABLE IF EXISTS `support`;
CREATE TABLE `support` (
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

-- ----------------------------
-- Records of support
-- ----------------------------

-- ----------------------------
-- Table structure for `support_post`
-- ----------------------------
DROP TABLE IF EXISTS `support_post`;
CREATE TABLE `support_post` (
  `id` int(11) NOT NULL auto_increment,
  `ticket` int(11) NOT NULL,
  `userid` int(11) NOT NULL default '-1',
  `username` varchar(150) character set latin1 NOT NULL,
  `time` int(11) NOT NULL,
  `text` text character set latin1 NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of support_post
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'ice41', '2ba111537f5f8a9487e3aa72d553ab53', 'N', '0', 'edu.ice7@gmail.com', 'u2763fXEX4iSSmKO3vwEaE91pllgJIZ1huhgMsFOueTwdGWf40hsa4MooC9WbhPEY2ycrp6dUPZqC9UE', '0', '1535305740', '0', '70', '1482442385');

-- ----------------------------
-- Table structure for `users_hall`
-- ----------------------------
DROP TABLE IF EXISTS `users_hall`;
CREATE TABLE `users_hall` (
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users_hall
-- ----------------------------

-- ----------------------------
-- Table structure for `users_ranking`
-- ----------------------------
DROP TABLE IF EXISTS `users_ranking`;
CREATE TABLE `users_ranking` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) unsigned NOT NULL,
  `exp` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users_ranking
-- ----------------------------
INSERT INTO `users_ranking` VALUES ('1', '16', '162');
INSERT INTO `users_ranking` VALUES ('2', '17', '162');

-- ----------------------------
-- Table structure for `users_titles`
-- ----------------------------
DROP TABLE IF EXISTS `users_titles`;
CREATE TABLE `users_titles` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) default NULL,
  `exp_min` int(11) default NULL,
  `exp_max` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users_titles
-- ----------------------------
INSERT INTO `users_titles` VALUES ('1', 'Deus da Guerra', '8750001', '2147483647');
INSERT INTO `users_titles` VALUES ('2', 'Semi-Deus', '5700001', '8750000');
INSERT INTO `users_titles` VALUES ('3', 'Imperador', '4250001', '5700000');
INSERT INTO `users_titles` VALUES ('4', 'Supremo Sacerdote', '2750001', '4250000');
INSERT INTO `users_titles` VALUES ('5', 'Primeiro Monarca', '2000001', '2750000');
INSERT INTO `users_titles` VALUES ('6', 'Guarda Real', '1500001', '2000000');
INSERT INTO `users_titles` VALUES ('7', 'Dark lord', '1000001', '1500000');
INSERT INTO `users_titles` VALUES ('8', 'Senhor feudau', '794001', '1000000');
INSERT INTO `users_titles` VALUES ('9', 'Cavaleiro de elite', '670001', '794000');
INSERT INTO `users_titles` VALUES ('10', 'Paladino', '557001', '670000');
INSERT INTO `users_titles` VALUES ('11', 'Escudeiro', '426501', '557000');
INSERT INTO `users_titles` VALUES ('12', 'Lanceiro', '309001', '426500');
INSERT INTO `users_titles` VALUES ('13', 'Armeiro', '185001', '309000');
INSERT INTO `users_titles` VALUES ('14', 'Aprendiz', '78001', '185000');
INSERT INTO `users_titles` VALUES ('15', 'Plebeu - Noob', '0', '78000');

-- ----------------------------
-- Table structure for `worlds`
-- ----------------------------
DROP TABLE IF EXISTS `worlds`;
CREATE TABLE `worlds` (
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

-- ----------------------------
-- Records of worlds
-- ----------------------------
INSERT INTO `worlds` VALUES ('1', 'Mundo+1', 'm1', '1', 'm1', '1352895108', '1353845508', '12', '0', '100');
