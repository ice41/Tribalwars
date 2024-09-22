-- phpMyAdmin SQL Dump
-- version 2.9.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jan 09, 2024 at 09:35 PM
-- Server version: 5.0.24
-- PHP Version: 4.4.4
-- 
-- Database: `index_tw`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `admin_memo`
-- 

CREATE TABLE `admin_memo` (
  `id` int(15) NOT NULL auto_increment,
  `date` varchar(500) character set latin1 collate latin1_general_ci NOT NULL,
  `tworca` varchar(50) character set latin1 collate latin1_general_ci NOT NULL,
  `nazwa` varchar(50) character set latin1 collate latin1_general_ci NOT NULL,
  `tekst` mediumtext character set latin1 collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `admin_memo`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `gracze`
-- 

CREATE TABLE `gracze` (
  `id` int(15) NOT NULL auto_increment,
  `haslo` varchar(150) collate latin1_general_ci NOT NULL,
  `nazwa` varchar(50) collate latin1_general_ci NOT NULL,
  `serwery_gry` varchar(500) collate latin1_general_ci NOT NULL,
  `premium_p` int(25) NOT NULL default '0',
  `email` varchar(100) collate latin1_general_ci NOT NULL,
  `kod` text collate latin1_general_ci NOT NULL,
  `aktywowano` set('1','0') collate latin1_general_ci NOT NULL default '0',
  `notka` longtext character set utf8 collate utf8_unicode_ci NOT NULL,
  `date_reg` varchar(500) character set latin1 NOT NULL,
  `ip_reg` varchar(50) character set latin1 NOT NULL,
  `admin` int(10) NOT NULL default '1',
  `session` varchar(5000) collate latin1_general_ci NOT NULL,
  `banned` enum('1','0') collate latin1_general_ci NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `gracze`
-- 

INSERT INTO `gracze` VALUES (7, '394961af481e4bdc0c598b4d259bca4d', 'ice41', ';1', 59950, 'edu_ice7%2540hotmail.com', 'HvdUuSo0l8dWG7FD7B', '1', '', '1388262343', '127.0.0.1', 1, 'E-n', '0');
INSERT INTO `gracze` VALUES (9, '394961af481e4bdc0c598b4d259bca4d', 'goku', ';1', 0, 'geral%2540ice41.pt', 'ARWbFJeKQJjcEoXCoA', '0', '', '1669594386', '188.37.14.231', 1, '2-1', '0');
INSERT INTO `gracze` VALUES (10, '394961af481e4bdc0c598b4d259bca4d', 'Vegeta', ';1', 0, 'geral%2540ice41.pt', 'p91ouKSvLERkw1941f', '0', '', '1669594586', '188.37.14.231', 1, 'y-T', '0');
INSERT INTO `gracze` VALUES (1, '47453649d92db5e3e9f3930c2f41dcc5', 'Bartekst221', '', 5000200, 'Bartekst221@wp.pl', 'JOULYB55J0yHoyMxyd', '1', '', '1669143723', '127.0.0.1', 1, 'i-g', '0');
INSERT INTO `gracze` VALUES (8, '394961af481e4bdc0c598b4d259bca4d', 'Bilis', ';1', 0, 'geral%2540ice41.pt', 'rxb7ZdpLI07WawUkw8', '0', '', '1669593226', '188.37.14.231', 1, 'D-f', '0');
INSERT INTO `gracze` VALUES (11, '394961af481e4bdc0c598b4d259bca4d', 'anibal', ';1', 0, 'geral%2540ice41.pt', '2q7iedsrbCp3jRHLRN', '0', '', '1669599929', '188.37.14.231', 1, 'T-M', '0');

-- --------------------------------------------------------

-- 
-- Table structure for table `kody`
-- 

CREATE TABLE `kody` (
  `id` int(25) NOT NULL auto_increment,
  `kod` varchar(12) NOT NULL,
  `wykorzystany` set('N','Y') NOT NULL default 'N',
  `wykorzystal` int(11) NOT NULL default '0',
  `wykorzystano` int(25) NOT NULL default '0',
  `typ` set('1','2','3') NOT NULL default '1',
  `po` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `kody`
-- 

INSERT INTO `kody` VALUES (1, 'Tribos', 'Y', 2, 1387832502, '3', 0);
INSERT INTO `kody` VALUES (2, 'ice41', 'Y', 1, 1669241518, '3', 0);
INSERT INTO `kody` VALUES (4, 'eduardo', 'Y', 1, 1669427369, '3', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `lista_zasad`
-- 

CREATE TABLE `lista_zasad` (
  `id` int(11) NOT NULL auto_increment,
  `kategoria` int(11) NOT NULL,
  `nazwa` varchar(25) NOT NULL,
  `text` longtext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `lista_zasad`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `mapa`
-- 

CREATE TABLE `mapa` (
  `id` int(250) NOT NULL auto_increment,
  `wym` text collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=13 ;

-- 
-- Dumping data for table `mapa`
-- 

INSERT INTO `mapa` VALUES (1, 'http://pl78.plemiona.pl/map.php?v=2&e=1387477060150&460_480=1&');
INSERT INTO `mapa` VALUES (2, 'http://pl78.plemiona.pl/map.php?');
INSERT INTO `mapa` VALUES (3, 'http://pl78.plemiona.pl/map.php?v=2&e=1387636807044&460_480=1&');
INSERT INTO `mapa` VALUES (4, 'http://pl78.plemiona.pl/map.php?v=2&e=1387636838768&460_460=1&');
INSERT INTO `mapa` VALUES (5, 'http://pl78.plemiona.pl/map.php?v=2&e=1387636848016&460_480=0&');
INSERT INTO `mapa` VALUES (6, 'http://pl78.plemiona.pl/map.php?v=2&e=1387636848144&440_480=1&');
INSERT INTO `mapa` VALUES (7, 'http://pl78.plemiona.pl/map.php?v=2&e=1387649132638&460_480=1&480_480=1&');
INSERT INTO `mapa` VALUES (8, 'http://pl78.plemiona.pl/map.php?v=2&e=1387649136040&460_460=1&');
INSERT INTO `mapa` VALUES (9, 'mt=2&page=topo_image&player_id=1&village_id=1&x=500&y=400&church=1&political=0&war=0&key=4182149762&cur=1&');
INSERT INTO `mapa` VALUES (10, 'mt=2&page=topo_image&player_id=1&village_id=1&x=550&y=400&church=1&political=0&war=0&key=4182149762&cur=1&');
INSERT INTO `mapa` VALUES (11, 'mt=2&page=topo_image&player_id=1&village_id=1&x=600&y=450&church=1&political=0&war=0&key=4182149762&cur=1&');
INSERT INTO `mapa` VALUES (12, 'mt=2&page=topo_image&player_id=1&village_id=1&x=600&y=400&church=1&political=0&war=0&key=4182149762&cur=1&');

-- --------------------------------------------------------

-- 
-- Table structure for table `ogloszenia`
-- 

CREATE TABLE `ogloszenia` (
  `id` int(11) NOT NULL auto_increment,
  `data` varchar(50) collate latin1_general_ci NOT NULL,
  `text` varchar(1500) collate latin1_general_ci NOT NULL,
  `typ` enum('1','0') collate latin1_general_ci NOT NULL,
  `nazwa` varchar(15) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `ogloszenia`
-- 

INSERT INTO `ogloszenia` VALUES (3, '1669417346', 'TraduÃ§Ã£o 90%\r\nTeste de funcionalidades concluÃ­do.\r\nFuncional 100%\r\nAjustes de refino em processo', '1', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `premium_logi`
-- 

CREATE TABLE `premium_logi` (
  `id` int(11) NOT NULL auto_increment,
  `gracz` int(11) NOT NULL,
  `tekst` varchar(5000) NOT NULL,
  `swiat` varchar(11) NOT NULL,
  `data` int(50) NOT NULL,
  `saldo` int(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `premium_logi`
-- 

INSERT INTO `premium_logi` VALUES (1, 6, 'Wykupiono bonus dla wioski Wioska OnlyHeadShot!', '1', 1387832533, 250);
INSERT INTO `premium_logi` VALUES (2, 1, 'Wykupiono bonus dla wioski ice41-1!', '2', 1669239568, 4999950);
INSERT INTO `premium_logi` VALUES (3, 1, 'Wykupiono bonus dla wioski ice41-2!', '2', 1669240999, 4999900);
INSERT INTO `premium_logi` VALUES (4, 7, 'Wykupiono bonus dla wioski 001!', '1', 1669650457, 59950);

-- --------------------------------------------------------

-- 
-- Table structure for table `team`
-- 

CREATE TABLE `team` (
  `id` int(15) NOT NULL auto_increment,
  `gracz` varchar(50) collate latin1_general_ci NOT NULL,
  `opis` varchar(500) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `team`
-- 

INSERT INTO `team` VALUES (1, 'ice41', '1');

-- --------------------------------------------------------

-- 
-- Table structure for table `zalogowani`
-- 

CREATE TABLE `zalogowani` (
  `id` int(11) NOT NULL auto_increment,
  `client_ip` varchar(50) collate latin1_general_ci NOT NULL,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=348 ;

-- 
-- Dumping data for table `zalogowani`
-- 

INSERT INTO `zalogowani` VALUES (34, '25.196.66.243', 6);
INSERT INTO `zalogowani` VALUES (40, '25.196.66.243', 6);
INSERT INTO `zalogowani` VALUES (51, '85.247.42.238', 7);
INSERT INTO `zalogowani` VALUES (52, '85.247.42.238', 7);
INSERT INTO `zalogowani` VALUES (53, '85.247.42.238', 7);
INSERT INTO `zalogowani` VALUES (54, '85.247.42.238', 7);
INSERT INTO `zalogowani` VALUES (55, '85.247.42.238', 7);
INSERT INTO `zalogowani` VALUES (56, '85.247.42.238', 7);
INSERT INTO `zalogowani` VALUES (57, '85.247.42.238', 7);
INSERT INTO `zalogowani` VALUES (347, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (346, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (345, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (344, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (343, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (342, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (341, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (340, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (339, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (338, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (337, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (336, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (335, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (334, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (333, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (332, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (331, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (330, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (329, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (328, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (327, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (326, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (325, '188.37.14.231', 8);
INSERT INTO `zalogowani` VALUES (324, '188.37.14.231', 8);
INSERT INTO `zalogowani` VALUES (323, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (322, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (321, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (320, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (319, '188.37.14.231', 11);
INSERT INTO `zalogowani` VALUES (318, '188.37.14.231', 11);
INSERT INTO `zalogowani` VALUES (317, '188.37.14.231', 11);
INSERT INTO `zalogowani` VALUES (316, '188.37.14.231', 11);
INSERT INTO `zalogowani` VALUES (315, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (314, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (313, '188.37.14.231', 10);
INSERT INTO `zalogowani` VALUES (312, '188.37.14.231', 10);
INSERT INTO `zalogowani` VALUES (311, '188.37.14.231', 9);
INSERT INTO `zalogowani` VALUES (310, '188.37.14.231', 9);
INSERT INTO `zalogowani` VALUES (309, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (308, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (307, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (306, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (305, '188.37.14.231', 8);
INSERT INTO `zalogowani` VALUES (304, '188.37.14.231', 8);
INSERT INTO `zalogowani` VALUES (303, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (302, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (301, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (300, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (299, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (298, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (297, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (296, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (295, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (294, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (293, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (292, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (291, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (290, '188.37.14.231', 7);
INSERT INTO `zalogowani` VALUES (289, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (288, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (287, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (286, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (285, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (284, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (283, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (282, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (281, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (280, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (279, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (278, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (277, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (276, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (275, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (274, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (273, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (272, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (271, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (270, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (269, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (268, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (267, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (266, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (265, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (264, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (263, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (262, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (261, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (260, '127.0.0.1', 7);
INSERT INTO `zalogowani` VALUES (259, '127.0.0.1', 7);

-- --------------------------------------------------------

-- 
-- Table structure for table `zasady`
-- 

CREATE TABLE `zasady` (
  `id` int(11) NOT NULL auto_increment,
  `typ` int(11) NOT NULL,
  `nazwa` varchar(250) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `zasady`
-- 

