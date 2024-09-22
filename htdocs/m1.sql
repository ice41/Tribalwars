/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50024
Source Host           : localhost:3306
Source Database       : m1

Target Server Type    : MYSQL
Target Server Version : 50024
File Encoding         : 65001

Date: 2019-08-03 13:45:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ally`
-- ----------------------------
DROP TABLE IF EXISTS `ally`;
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
  `max_reservations` int(11) NOT NULL default '5',
  `end_reservations` int(11) NOT NULL default '3',
  PRIMARY KEY  (`id`),
  KEY `rank` (`rank`),
  KEY `name` (`name`),
  KEY `short` (`short`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ally
-- ----------------------------

-- ----------------------------
-- Table structure for `ally_contracts`
-- ----------------------------
DROP TABLE IF EXISTS `ally_contracts`;
CREATE TABLE `ally_contracts` (
  `from_ally` int(11) NOT NULL,
  `type` varchar(10) collate latin1_general_ci NOT NULL,
  `to_ally` int(11) NOT NULL,
  `short` varchar(100) collate latin1_general_ci NOT NULL,
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of ally_contracts
-- ----------------------------

-- ----------------------------
-- Table structure for `ally_events`
-- ----------------------------
DROP TABLE IF EXISTS `ally_events`;
CREATE TABLE `ally_events` (
  `id` int(11) NOT NULL auto_increment,
  `ally` int(11) NOT NULL,
  `time` varchar(200) character set latin1 collate latin1_german1_ci NOT NULL,
  `message` text character set latin1 collate latin1_german1_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `ally` (`ally`),
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ally_events
-- ----------------------------

-- ----------------------------
-- Table structure for `ally_invites`
-- ----------------------------
DROP TABLE IF EXISTS `ally_invites`;
CREATE TABLE `ally_invites` (
  `id` int(11) NOT NULL auto_increment,
  `from_ally` int(11) NOT NULL,
  `to_userid` int(11) NOT NULL,
  `to_username` varchar(200) character set latin1 collate latin1_german1_ci NOT NULL,
  `time` int(40) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ally_invites
-- ----------------------------

-- ----------------------------
-- Table structure for `ally_reservations`
-- ----------------------------
DROP TABLE IF EXISTS `ally_reservations`;
CREATE TABLE `ally_reservations` (
  `id` int(11) NOT NULL auto_increment,
  `x` int(11) NOT NULL default '0',
  `by` int(11) NOT NULL,
  `expire_time` int(11) NOT NULL default '0',
  `ally` int(11) NOT NULL,
  `y` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of ally_reservations
-- ----------------------------

-- ----------------------------
-- Table structure for `announcement`
-- ----------------------------
DROP TABLE IF EXISTS `announcement`;
CREATE TABLE `announcement` (
  `id` int(11) NOT NULL auto_increment,
  `text` text character set latin1 collate latin1_german1_ci NOT NULL,
  `link` varchar(320) character set latin1 collate latin1_german1_ci NOT NULL,
  `graphic` varchar(100) character set latin1 collate latin1_german1_ci NOT NULL,
  `time` int(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of announcement
-- ----------------------------

-- ----------------------------
-- Table structure for `build`
-- ----------------------------
DROP TABLE IF EXISTS `build`;
CREATE TABLE `build` (
  `id` int(11) NOT NULL auto_increment,
  `building` varchar(30) character set latin1 collate latin1_german1_ci NOT NULL,
  `villageid` int(11) default NULL,
  `end_time` int(25) NOT NULL,
  `build_time` int(25) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `villageid` (`villageid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of build
-- ----------------------------

-- ----------------------------
-- Table structure for `create_village`
-- ----------------------------
DROP TABLE IF EXISTS `create_village`;
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

-- ----------------------------
-- Records of create_village
-- ----------------------------
INSERT INTO `create_village` VALUES ('30', '28', '27', '23', '100', '101', '99', '100', '35', '32', '24', '83', '1');

-- ----------------------------
-- Table structure for `dealers`
-- ----------------------------
DROP TABLE IF EXISTS `dealers`;
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of dealers
-- ----------------------------

-- ----------------------------
-- Table structure for `destroy`
-- ----------------------------
DROP TABLE IF EXISTS `destroy`;
CREATE TABLE `destroy` (
  `destroy_time` int(11) NOT NULL,
  `villageid` int(11) NOT NULL,
  `build` int(11) NOT NULL,
  `stage` int(11) NOT NULL,
  `start_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of destroy
-- ----------------------------

-- ----------------------------
-- Table structure for `events`
-- ----------------------------
DROP TABLE IF EXISTS `events`;
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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of events
-- ----------------------------

-- ----------------------------
-- Table structure for `forum`
-- ----------------------------
DROP TABLE IF EXISTS `forum`;
CREATE TABLE `forum` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(500) character set utf8 collate utf8_unicode_ci NOT NULL,
  `ally` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of forum
-- ----------------------------
INSERT INTO `forum` VALUES ('1', 'General', '1');

-- ----------------------------
-- Table structure for `forum_f_read`
-- ----------------------------
DROP TABLE IF EXISTS `forum_f_read`;
CREATE TABLE `forum_f_read` (
  `id` int(11) NOT NULL auto_increment,
  `forum_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of forum_f_read
-- ----------------------------

-- ----------------------------
-- Table structure for `forum_post`
-- ----------------------------
DROP TABLE IF EXISTS `forum_post`;
CREATE TABLE `forum_post` (
  `id` int(11) NOT NULL auto_increment,
  `thread_id` int(11) NOT NULL,
  `message` varchar(4000) character set utf8 collate utf8_unicode_ci NOT NULL,
  `posted_by` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of forum_post
-- ----------------------------

-- ----------------------------
-- Table structure for `forum_read`
-- ----------------------------
DROP TABLE IF EXISTS `forum_read`;
CREATE TABLE `forum_read` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of forum_read
-- ----------------------------
INSERT INTO `forum_read` VALUES ('1', '16', '1');

-- ----------------------------
-- Table structure for `forum_thread`
-- ----------------------------
DROP TABLE IF EXISTS `forum_thread`;
CREATE TABLE `forum_thread` (
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

-- ----------------------------
-- Records of forum_thread
-- ----------------------------

-- ----------------------------
-- Table structure for `friends`
-- ----------------------------
DROP TABLE IF EXISTS `friends`;
CREATE TABLE `friends` (
  `id` int(20) NOT NULL auto_increment,
  `type` enum('activ','pending') collate latin1_general_ci NOT NULL default 'pending',
  `id_from` int(20) NOT NULL default '-1',
  `id_to` int(20) NOT NULL default '-1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of friends
-- ----------------------------

-- ----------------------------
-- Table structure for `login`
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `login_locked` enum('yes','no') character set latin1 collate latin1_german1_ci NOT NULL default 'no',
  `start` varchar(50) character set latin1 collate latin1_german1_ci NOT NULL,
  `first_visit` tinyint(1) NOT NULL default '0',
  `extern_auth` varchar(32) collate utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of login
-- ----------------------------

-- ----------------------------
-- Table structure for `logins`
-- ----------------------------
DROP TABLE IF EXISTS `logins`;
CREATE TABLE `logins` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(250) character set latin1 collate latin1_german1_ci NOT NULL,
  `time` int(33) NOT NULL,
  `ip` varchar(30) character set latin1 collate latin1_german1_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `uv` varchar(250) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of logins
-- ----------------------------
INSERT INTO `logins` VALUES ('1', 'ice41', '1535305748', '127.0.0.1', '19', '');

-- ----------------------------
-- Table structure for `logs`
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL auto_increment,
  `user` varchar(320) character set latin1 collate latin1_german1_ci NOT NULL,
  `village` varchar(320) character set latin1 collate latin1_german1_ci NOT NULL,
  `time` int(40) NOT NULL,
  `log` text character set latin1 collate latin1_german1_ci NOT NULL,
  `event_id` int(11) NOT NULL,
  `event_type` varchar(25) character set latin1 collate latin1_german1_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of logs
-- ----------------------------

-- ----------------------------
-- Table structure for `mail`
-- ----------------------------
DROP TABLE IF EXISTS `mail`;
CREATE TABLE `mail` (
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

-- ----------------------------
-- Records of mail
-- ----------------------------

-- ----------------------------
-- Table structure for `mail_archiv`
-- ----------------------------
DROP TABLE IF EXISTS `mail_archiv`;
CREATE TABLE `mail_archiv` (
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mail_archiv
-- ----------------------------

-- ----------------------------
-- Table structure for `mail_block`
-- ----------------------------
DROP TABLE IF EXISTS `mail_block`;
CREATE TABLE `mail_block` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  `blocked_id` int(11) NOT NULL,
  `blocked_name` varchar(150) character set latin1 collate latin1_german1_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `blocked_id` (`blocked_id`),
  KEY `blocked_name` (`blocked_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mail_block
-- ----------------------------

-- ----------------------------
-- Table structure for `mail_in`
-- ----------------------------
DROP TABLE IF EXISTS `mail_in`;
CREATE TABLE `mail_in` (
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mail_in
-- ----------------------------

-- ----------------------------
-- Table structure for `mail_mass`
-- ----------------------------
DROP TABLE IF EXISTS `mail_mass`;
CREATE TABLE `mail_mass` (
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

-- ----------------------------
-- Records of mail_mass
-- ----------------------------

-- ----------------------------
-- Table structure for `mail_out`
-- ----------------------------
DROP TABLE IF EXISTS `mail_out`;
CREATE TABLE `mail_out` (
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mail_out
-- ----------------------------

-- ----------------------------
-- Table structure for `mail_post`
-- ----------------------------
DROP TABLE IF EXISTS `mail_post`;
CREATE TABLE `mail_post` (
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

-- ----------------------------
-- Records of mail_post
-- ----------------------------

-- ----------------------------
-- Table structure for `mail_send`
-- ----------------------------
DROP TABLE IF EXISTS `mail_send`;
CREATE TABLE `mail_send` (
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

-- ----------------------------
-- Records of mail_send
-- ----------------------------

-- ----------------------------
-- Table structure for `mail_subject`
-- ----------------------------
DROP TABLE IF EXISTS `mail_subject`;
CREATE TABLE `mail_subject` (
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

-- ----------------------------
-- Records of mail_subject
-- ----------------------------

-- ----------------------------
-- Table structure for `map_info`
-- ----------------------------
DROP TABLE IF EXISTS `map_info`;
CREATE TABLE `map_info` (
  `userid` int(11) NOT NULL,
  `vill_info` int(11) NOT NULL default '0',
  `attktime` int(11) NOT NULL default '0',
  `troops` int(11) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of map_info
-- ----------------------------

-- ----------------------------
-- Table structure for `movements`
-- ----------------------------
DROP TABLE IF EXISTS `movements`;
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of movements
-- ----------------------------

-- ----------------------------
-- Table structure for `offers`
-- ----------------------------
DROP TABLE IF EXISTS `offers`;
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of offers
-- ----------------------------

-- ----------------------------
-- Table structure for `offers_multi`
-- ----------------------------
DROP TABLE IF EXISTS `offers_multi`;
CREATE TABLE `offers_multi` (
  `id` int(11) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of offers_multi
-- ----------------------------

-- ----------------------------
-- Table structure for `quickbar`
-- ----------------------------
DROP TABLE IF EXISTS `quickbar`;
CREATE TABLE `quickbar` (
  `id` int(11) NOT NULL auto_increment,
  `name` text collate latin1_general_ci NOT NULL,
  `img` text collate latin1_general_ci NOT NULL,
  `href` text collate latin1_general_ci NOT NULL,
  `target` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of quickbar
-- ----------------------------

-- ----------------------------
-- Table structure for `recruit`
-- ----------------------------
DROP TABLE IF EXISTS `recruit`;
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of recruit
-- ----------------------------

-- ----------------------------
-- Table structure for `reports`
-- ----------------------------
DROP TABLE IF EXISTS `reports`;
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
  `s_buildings` varchar(100) collate utf8_unicode_ci NOT NULL,
  `s_res` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `receiver_userid` (`receiver_userid`),
  KEY `group` (`in_group`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of reports
-- ----------------------------
-- ----------------------------
-- Table structure for `research`
-- ----------------------------
DROP TABLE IF EXISTS `research`;
CREATE TABLE `research` (
  `id` int(11) NOT NULL auto_increment,
  `research` varchar(30) character set latin1 collate latin1_german1_ci NOT NULL,
  `villageid` int(11) NOT NULL,
  `end_time` int(25) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `villageid` (`villageid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of research
-- ----------------------------

-- ----------------------------
-- Table structure for `run_events`
-- ----------------------------
DROP TABLE IF EXISTS `run_events`;
CREATE TABLE `run_events` (
  `id` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of run_events
-- ----------------------------

-- ----------------------------
-- Table structure for `save_players`
-- ----------------------------
DROP TABLE IF EXISTS `save_players`;
CREATE TABLE `save_players` (
  `id` int(11) NOT NULL auto_increment,
  `round_id` int(11) NOT NULL default '0',
  `username` varchar(200) character set latin1 collate latin1_german1_ci NOT NULL default '',
  `rank` int(20) NOT NULL default '0',
  `ally` varchar(20) character set latin1 collate latin1_german1_ci NOT NULL default '',
  `points` int(20) NOT NULL default '0',
  `villages` int(20) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of save_players
-- ----------------------------

-- ----------------------------
-- Table structure for `save_rounds`
-- ----------------------------
DROP TABLE IF EXISTS `save_rounds`;
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of save_rounds
-- ----------------------------

-- ----------------------------
-- Table structure for `sessions`
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  `username` varchar(180) collate utf8_unicode_ci NOT NULL,
  `sid` varchar(32) character set latin1 collate latin1_german1_ci NOT NULL,
  `hkey` varchar(4) character set latin1 collate latin1_german1_ci NOT NULL,
  `is_vacation` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `sid` (`sid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('4', '19', 'ice41', 'SOO2pwXmlFHEiQDNhfujXv2kB84ckAx3', 'epQI', '0');

-- ----------------------------
-- Table structure for `share`
-- ----------------------------
DROP TABLE IF EXISTS `share`;
CREATE TABLE `share` (
  `id` int(11) NOT NULL auto_increment,
  `id_from` int(20) NOT NULL,
  `id_to` int(20) NOT NULL,
  `time` int(11) NOT NULL,
  `username_to` varchar(320) character set utf8 collate utf8_unicode_ci NOT NULL,
  `delete_time` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of share
-- ----------------------------

-- ----------------------------
-- Table structure for `unit_place`
-- ----------------------------
DROP TABLE IF EXISTS `unit_place`;
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

-- ----------------------------
-- Records of unit_place
-- ----------------------------


-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AVG_ROW_LENGTH=166;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'ice41', '', 'N', '0', '0', '', '', '101', '1225130', '', '-1', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'prod', '0', '0', '0', 'all', 'all', '3', '0', '2', '0', '2', '0', '2', '0', '0', '1482443290', '1535305753', '', '-1', '', '0', '0', '0', '0', 'x', '', '', '', '950', '1', '1', '1', '9', '275', '0', '1', '', '', '1', 'new', 'yes', '', '1482445999', '0', '0', '0', '0', '0', '0', '0', '0', '0', '92', '0', '14', '', '', '0', '0');

-- ----------------------------
-- Table structure for `villages`
-- ----------------------------
DROP TABLE IF EXISTS `villages`;
CREATE TABLE `villages` (
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
) ENGINE=MyISAM AUTO_INCREMENT=401 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of villages
-- ----------------------------