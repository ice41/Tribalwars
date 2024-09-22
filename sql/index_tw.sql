-- phpMyAdmin SQL Dump
-- version 2.9.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 23, 2016 at 08:00 PM
-- Server version: 5.0.24
-- PHP Version: 4.4.4
-- 
-- Database: `index_tw`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `gracze`
-- 

CREATE TABLE `gracze` (
  `id` int(11) NOT NULL auto_increment,
  `haslo` varchar(150) collate latin1_general_ci NOT NULL,
  `nazwa` varchar(50) collate latin1_general_ci NOT NULL,
  `serwery_gry` varchar(500) collate latin1_general_ci NOT NULL,
  `email` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=40 ;

-- 
-- Dumping data for table `gracze`
-- 

INSERT INTO `gracze` VALUES (38, 'fa7f08233358e9b466effa1328168527', 'sir+roland', ';1;2', 'sir+roland');
INSERT INTO `gracze` VALUES (39, '394961af481e4bdc0c598b4d259bca4d', 'ice41', ';1;2', 'edu.ice7%40gmail.com');

-- --------------------------------------------------------

-- 
-- Table structure for table `ogloszenia`
-- 

CREATE TABLE `ogloszenia` (
  `id` int(11) NOT NULL auto_increment,
  `data` varchar(50) collate latin1_general_ci NOT NULL,
  `text` varchar(1500) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=25 ;

-- 
-- Dumping data for table `ogloszenia`
-- 

INSERT INTO `ogloszenia` VALUES (24, '1327959996', 'Autor silnika - Sir roland');

-- --------------------------------------------------------

-- 
-- Table structure for table `zalogowani`
-- 

CREATE TABLE `zalogowani` (
  `id` int(11) NOT NULL auto_increment,
  `client_ip` varchar(50) collate latin1_general_ci NOT NULL,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=446 ;

-- 
-- Dumping data for table `zalogowani`
-- 

INSERT INTO `zalogowani` VALUES (445, '127.0.0.1', 39);
