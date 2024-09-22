<?php
/*****************************************/
/*=======================================*/
/*     PLIK: admin_create_new_server.php  */
/*     DATA: 23.12.2011r        		 */
/*     ROLA: akcja - admin				 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

@set_time_limit('300');
if (!empty($cfg['MemoryLimit'])) {
    @ini_set('memory_limit','512M');
	}
	
$sql_queries = array(
	'CREATE TABLE `ally` (
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
		`rezerwacje_czas` int(11) NOT NULL default 3,
		`rezerwacje_max` int(11) NOT NULL default 5,
		PRIMARY KEY  (`id`),
		KEY `rank` (`rank`),
		KEY `name` (`name`),
		KEY `short` (`short`)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;',
	'CREATE TABLE ally_events (
		id int(11) NOT NULL auto_increment,
		ally int(11) NOT NULL,
		`time` varchar(200) character set latin1 collate latin1_german1_ci NOT NULL,
		message text character set latin1 collate latin1_german1_ci NOT NULL,
		PRIMARY KEY  (id),
		KEY ally (ally),
		KEY `time` (`time`)
		) 
	ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;',
	'CREATE TABLE ally_invites (
		id int(11) NOT NULL auto_increment,
		from_ally int(11) NOT NULL,
		to_userid int(11) NOT NULL,
		to_username varchar(200) character set latin1 collate latin1_german1_ci NOT NULL,
		`time` int(40) NOT NULL,
		PRIMARY KEY  (id)
		) 
	ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;',
	'CREATE TABLE announcement (
		id int(11) NOT NULL auto_increment,
		`text` text character set latin1 collate latin1_german1_ci NOT NULL,
		link varchar(320) character set latin1 collate latin1_german1_ci NOT NULL,
		graphic varchar(100) character set latin1 collate latin1_german1_ci NOT NULL,
		`time` int(15) NOT NULL,
		PRIMARY KEY  (id)
		) 
	ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;',
	"CREATE TABLE bot (
		villageid int(4) NOT NULL,
		`type` enum('deff','off','spy') collate latin1_general_ci NOT NULL,
		finish_tec enum('y','n') collate latin1_general_ci NOT NULL,
		finish_build enum('y','n') collate latin1_general_ci NOT NULL,
		main int(4) NOT NULL,
		barracks int(4) NOT NULL,
		stable int(4) NOT NULL,
		garage int(4) NOT NULL,
		snob int(4) NOT NULL,
		smith int(4) NOT NULL,
		place int(4) NOT NULL,
		market int(4) NOT NULL,
		wood int(4) NOT NULL,
		stone int(4) NOT NULL,
		iron int(4) NOT NULL,
		`storage` int(4) NOT NULL,
		farm int(4) NOT NULL,
		hide int(4) NOT NULL,
		wall int(4) NOT NULL,
		tec_spear enum('y','n') collate latin1_general_ci NOT NULL default 'y',
		tec_sword enum('y','n') collate latin1_general_ci NOT NULL default 'y',
		tec_axe enum('y','n') collate latin1_general_ci NOT NULL default 'y',
		tec_spy enum('y','n') collate latin1_general_ci NOT NULL default 'y',
		tec_light enum('y','n') collate latin1_general_ci NOT NULL default 'y',
		tec_heavy enum('y','n') collate latin1_general_ci NOT NULL default 'y',
		tec_ram enum('y','n') collate latin1_general_ci NOT NULL default 'y',
		tec_catapult enum('y','n') collate latin1_general_ci NOT NULL default 'y',
		next_build varchar(32) collate latin1_general_ci NOT NULL,
		PRIMARY KEY  (villageid),
		KEY `type` (`type`)
		) 
	ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;",
	'CREATE TABLE build (
		id int(11) NOT NULL auto_increment,
		building varchar(30) character set latin1 collate latin1_german1_ci NOT NULL,
		villageid int(11) default NULL,
		end_time int(25) NOT NULL,
		build_time int(25) NOT NULL,
		PRIMARY KEY  (id),
		KEY villageid (villageid)
		) 
	ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;',
	"CREATE TABLE dealers (
		id int(11) NOT NULL auto_increment,
		from_userid int(11) NOT NULL,
		to_userid int(11) NOT NULL,
		from_village int(11) NOT NULL,
		to_village int(11) NOT NULL,
		wood int(11) NOT NULL,
		stone int(11) NOT NULL,
		iron int(11) NOT NULL,
		start_time int(11) NOT NULL,
		end_time int(11) NOT NULL,
		is_offer int(1) NOT NULL default '0',
		dealers int(6) NOT NULL default '0',
		`type` varchar(4) character set latin1 collate latin1_german1_ci NOT NULL,
		PRIMARY KEY  (id),
		KEY from_village (from_village),
		KEY to_village (to_village)
		) 
	ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;",
	"CREATE TABLE `dzielenie_rezerwacji` (
		`id` int(11) NOT NULL auto_increment,
		`do_plemienia` int(11) NOT NULL default '0',
		`od_plemienia` int(11) NOT NULL default '0',
		PRIMARY KEY  (`id`)
	) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;",
	"CREATE TABLE `events` (
		id int(11) NOT NULL auto_increment,
		event_time int(11) default '0',
		event_type varchar(15) character set latin1 collate latin1_german1_ci default NULL,
		event_id int(11) NOT NULL,
		user_id int(11) NOT NULL,
		villageid int(15) default NULL,
		knot_event int(15) NOT NULL,
		cid varchar(32) character set latin1 collate latin1_german1_ci default '0',
		can_knot int(1) NOT NULL default '0',
		is_locked int(1) NOT NULL,
		PRIMARY KEY  (id),
		KEY event_type (event_type),
		KEY event_id (event_id),
		KEY event_time (event_time),
		KEY user_id (user_id),
		KEY villageid (villageid)
		) 
	ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;",
	'CREATE TABLE kontrakty (
		id int(7) NOT NULL auto_increment,
		od_plemienia int(6) NOT NULL,
		do_plemienia int(6) NOT NULL,
		typ varchar(10) collate latin1_general_ci NOT NULL,
		PRIMARY KEY  (id)
		) 
	ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;',
	"CREATE TABLE krzaki (
		id int(11) NOT NULL auto_increment,
		x int(4) NOT NULL,
		y int(4) NOT NULL,
		typ varchar(25) collate latin1_general_ci NOT NULL,
		typ2 varchar(10) collate latin1_general_ci NOT NULL default 'krzak',
		PRIMARY KEY  (id)
		) 
	ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;",
	"CREATE TABLE login (
		login_locked enum('yes','no') character set latin1 collate latin1_german1_ci NOT NULL default 'no',
		`start` varchar(50) character set latin1 collate latin1_german1_ci NOT NULL,
		first_visit tinyint(1) NOT NULL default '0',
		extern_auth varchar(32) collate utf8_unicode_ci NOT NULL
		) 
	ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;",
	'CREATE TABLE logins (
		id int(11) NOT NULL auto_increment,
		username varchar(250) character set latin1 collate latin1_german1_ci NOT NULL,
		`time` int(33) NOT NULL,
		ip varchar(30) character set latin1 collate latin1_german1_ci NOT NULL,
		userid int(11) NOT NULL,
		uv varchar(250) collate utf8_unicode_ci NOT NULL,
		PRIMARY KEY  (id)
		)
	ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;',
	"CREATE TABLE `logs` (
		id int(11) NOT NULL auto_increment,
		`user` varchar(320) character set latin1 collate latin1_german1_ci NOT NULL,
		village varchar(320) character set latin1 collate latin1_german1_ci NOT NULL,
		`time` int(40) NOT NULL,
		log text character set latin1 collate latin1_german1_ci NOT NULL,
		event_id int(11) NOT NULL,
		event_type varchar(25) character set latin1 collate latin1_german1_ci NOT NULL,
		PRIMARY KEY  (id)
		)
	ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;",
	"CREATE TABLE mail_archiv (
		id int(11) NOT NULL auto_increment,
		from_id int(11) NOT NULL default '0',
		from_username varchar(100) character set latin1 NOT NULL default '',
		to_id int(11) NOT NULL default '0',
		to_username varchar(100) character set latin1 NOT NULL default '',
		`subject` varchar(150) character set latin1 NOT NULL default '',
		`text` text character set latin1 NOT NULL,
		`time` int(35) NOT NULL default '0',
		owner int(11) NOT NULL,
		`type` varchar(3) character set latin1 NOT NULL,
		PRIMARY KEY  (id),
		KEY to_id (to_id)
		) 
	ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;",
	'CREATE TABLE mail_block (
		id int(11) NOT NULL auto_increment,
		userid int(11) NOT NULL,
		blocked_id int(11) NOT NULL,
		blocked_name varchar(150) character set latin1 collate latin1_german1_ci NOT NULL,
		PRIMARY KEY  (id),
		KEY blocked_id (blocked_id),
		KEY blocked_name (blocked_name)
		) 
	ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;',
	"CREATE TABLE mail_in (
		id int(11) NOT NULL auto_increment,
		from_id int(11) NOT NULL default '0',
		from_username varchar(100) character set latin1 NOT NULL default '',
		to_id int(11) NOT NULL default '0',
		to_username varchar(100) character set latin1 NOT NULL default '',
		`subject` varchar(150) character set latin1 NOT NULL default '',
		`text` text character set latin1 NOT NULL,
		is_read int(1) NOT NULL default '0',
		is_answered int(1) NOT NULL default '0',
		output_id int(11) NOT NULL default '0',
		`time` int(35) NOT NULL default '0',
		PRIMARY KEY  (id),
		KEY to_id (to_id)
		)
	ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;",
	"CREATE TABLE mail_out (
		id int(11) NOT NULL auto_increment,
		from_id int(11) NOT NULL default '0',
		from_username varchar(100) character set latin1 NOT NULL default '',
		to_id int(11) NOT NULL default '0',
		to_username varchar(100) character set latin1 NOT NULL default '',
		`subject` varchar(150) character set latin1 NOT NULL default '',
		`text` text character set latin1 NOT NULL,
		is_read int(1) NOT NULL default '0',
		`time` int(35) NOT NULL default '0',
		PRIMARY KEY  (id),
		KEY from_id (from_id)
		) 
	ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;",
	"CREATE TABLE movements (
		id int(11) NOT NULL auto_increment,
		from_village int(11) default NULL,
		to_village int(11) default NULL,
		units varchar(350) character set latin1 collate latin1_german1_ci NOT NULL,
		`type` varchar(15) character set latin1 collate latin1_german1_ci NOT NULL,
		start_time int(25) NOT NULL,
		end_time int(25) NOT NULL,
		building varchar(60) character set latin1 collate latin1_german1_ci default NULL,
		from_userid int(11) NOT NULL,
		to_userid int(11) NOT NULL,
		to_hidden int(1) default '0',
		wood int(12) NOT NULL default '0',
		stone int(12) NOT NULL default '0',
		iron int(12) NOT NULL default '0',
		send_from_village int(12) NOT NULL,
		send_from_user int(12) NOT NULL,
		send_to_user int(15) NOT NULL,
		send_to_village int(15) NOT NULL,
		die int(1) NOT NULL default '0',
		PRIMARY KEY  (id),
		KEY end_time (end_time),
		KEY send_from_village (send_from_village),
		KEY send_from_user (send_from_user),
		KEY send_to_user (send_to_user),
		KEY send_to_village (send_to_village),
		KEY from_hidden (to_hidden),
		KEY `type` (`type`)
		)
	ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;",
	"CREATE TABLE odznaczenia (
		id int(11) NOT NULL auto_increment,
		od_gracza int(11) NOT NULL,
		do_gracza int(11) NOT NULL,
		kolor varchar(15) collate latin1_general_ci NOT NULL,
		PRIMARY KEY  (id)
		)
	ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;",
	"CREATE TABLE offers (
		id int(11) NOT NULL auto_increment,
		sell int(11) NOT NULL,
		buy int(11) NOT NULL,
		sell_ress varchar(5) character set latin1 collate latin1_german1_ci NOT NULL,
		buy_ress varchar(5) character set latin1 collate latin1_german1_ci NOT NULL,
		multi int(11) NOT NULL,
		from_village int(11) NOT NULL,
		`time` int(40) NOT NULL,
		do_action varchar(10) character set latin1 collate latin1_german1_ci NOT NULL,
		ratio_max double NOT NULL,
		userid int(11) NOT NULL,
		x int(11) NOT NULL,
		y int(11) NOT NULL,
		PRIMARY KEY  (id)
		)
	ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;",
	"CREATE TABLE offers_multi (
		id int(11) NOT NULL,
		KEY id (id)
		)
	ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;",
	"CREATE TABLE recruit (
		id int(11) NOT NULL auto_increment,
		unit varchar(40) character set latin1 collate latin1_german1_ci NOT NULL,
		num_unit int(15) default '0',
		num_finished int(15) default '0',
		last_reload int(15) default '-1',
		time_finished int(15) NOT NULL,
		time_start int(15) NOT NULL,
		time_per_unit varchar(30) character set latin1 collate latin1_german1_ci default NULL,
		building varchar(35) character set latin1 collate latin1_german1_ci NOT NULL,
		villageid int(11) NOT NULL,
		userid int(11) NOT NULL,
		PRIMARY KEY  (id),
		KEY building (building),
		KEY villageid (villageid)
		)
	ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;",
	"CREATE TABLE `reports` (
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
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;",
	"CREATE TABLE research (
		id int(11) NOT NULL auto_increment,
		research varchar(30) character set latin1 collate latin1_german1_ci NOT NULL,
		villageid int(11) NOT NULL,
		end_time int(25) NOT NULL,
		PRIMARY KEY  (id),
		KEY villageid (villageid)
		)
	ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;",
	"CREATE TABLE `rezerwacje` (
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
	) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;",
	"CREATE TABLE `rezerwacje_log` (
		`id` int(11) NOT NULL,
		`last_edit` int(11) NOT NULL,
		`czas_koniec` int(11) NOT NULL,
		`plemie` int(11) NOT NULL,
		`do_wioski` int(11) NOT NULL,
		`od_gracza` int(11) NOT NULL,
		`od_gname` varchar(75) collate latin1_general_ci NOT NULL,
		`proces` int(1) NOT NULL default '0',
		KEY `czas_koniec` (`czas_koniec`)
	) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;",
	"CREATE TABLE run_events (
		id int(11) NOT NULL,
		UNIQUE KEY id (id)
		)
	ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;",
	"CREATE TABLE save_players (
		id int(11) NOT NULL auto_increment,
		round_id int(11) NOT NULL default '0',
		username varchar(200) character set latin1 collate latin1_german1_ci NOT NULL default '',
		rank int(20) NOT NULL default '0',
		ally varchar(20) character set latin1 collate latin1_german1_ci NOT NULL default '',
		points int(20) NOT NULL default '0',
		villages int(20) NOT NULL default '0',
		PRIMARY KEY  (id)
		)
	ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;",
	"CREATE TABLE save_rounds (
		id int(11) NOT NULL auto_increment,
		`start` varchar(80) character set latin1 collate latin1_german1_ci NOT NULL default '',
		`end` varchar(80) character set latin1 collate latin1_german1_ci NOT NULL default '',
		description text character set latin1 collate latin1_german1_ci NOT NULL,
		speed_units varchar(10) character set latin1 collate latin1_german1_ci NOT NULL default '',
		moral int(1) NOT NULL default '0',
		speed int(20) NOT NULL default '0',
		`name` varchar(200) character set latin1 collate latin1_german1_ci NOT NULL default '',
		map int(1) NOT NULL default '0',
		PRIMARY KEY  (id)
		)
	ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;",
	"CREATE TABLE sessions (
		id int(11) NOT NULL auto_increment,
		userid int(11) NOT NULL,
		sid varchar(32) character set latin1 collate latin1_german1_ci NOT NULL,
		hkey varchar(4) character set latin1 collate latin1_german1_ci NOT NULL,
		is_vacation int(1) NOT NULL default '0',
		PRIMARY KEY  (id),
		KEY sid (sid),
		KEY userid (userid)
		)
	ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;",
	"CREATE TABLE twozenie_osady (
		okrag int(4) NOT NULL default '1',
		osad_na_okragu int(5) NOT NULL default '0',
		suma_wiosek int(11) NOT NULL default '0',
		PRIMARY KEY  (okrag)
		)
	ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;",
	"INSERT INTO `twozenie_osady` VALUES (1,0,0);",
	"CREATE TABLE unit_place (
		unit_spear int(11) default '0',
		unit_sword int(11) default '0',
		unit_axe int(11) default '0',
		unit_archer int(11) NOT NULL default '0',
		unit_spy int(11) default '0',
		unit_light int(11) default '0',
		unit_cav_archer int(11) NOT NULL default '0',
		unit_heavy int(11) default '0',
		unit_ram int(11) default '0',
		unit_catapult int(11) default '0',
		unit_snob int(5) default '0',
		unit_paladin int(11) NOT NULL default '0',
		villages_from_id int(11) NOT NULL default '0',
		villages_to_id int(11) NOT NULL default '0',
		KEY villages_from_id (villages_from_id),
		KEY villages_to_id (villages_to_id)
		)
	ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;",
	"CREATE TABLE `users` (
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
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;",
	"CREATE TABLE villages (
		id int(11) NOT NULL auto_increment,
		x int(11) NOT NULL,
		y int(11) NOT NULL,
		`name` varchar(100) collate utf8_unicode_ci default NULL,
		userid int(11) NOT NULL,
		r_wood varchar(230) collate utf8_unicode_ci default '500',
		r_stone varchar(230) collate utf8_unicode_ci default '500',
		r_iron varchar(230) collate utf8_unicode_ci default '400',
		r_bh int(15) default '1066',
		last_prod_aktu int(35) NOT NULL,
		points int(15) default '3209',
		continent int(6) NOT NULL,
		main int(5) default '16',
		barracks int(5) default '18',
		stable int(5) default '11',
		garage int(5) default '2',
		snob int(5) default '0',
		smith int(5) default '12',
		place int(5) default '1',
		market int(5) default '9',
		wood int(5) default '23',
		stone int(5) default '24',
		iron int(5) default '23',
		`storage` int(5) default '29',
		farm int(5) default '22',
		hide int(5) default '10',
		wall int(5) default '12',
		unit_spear_tec_level int(11) default '1',
		unit_sword_tec_level int(11) default '1',
		unit_axe_tec_level int(11) default '0',
		unit_archer_tec_level int(11) NOT NULL default '0',
		unit_spy_tec_level int(11) default '1',
		unit_light_tec_level int(11) default '0',
		unit_cav_archer_tec_level int(11) NOT NULL default '0',
		unit_heavy_tec_level int(11) default '0',
		unit_ram_tec_level int(11) default '0',
		unit_catapult_tec_level int(11) default '0',
		unit_snob_tec_level int(11) default '1',
		trader_away int(5) default '0',
		main_build varchar(200) collate utf8_unicode_ci NOT NULL,
		all_unit_spear int(6) NOT NULL default '0',
		all_unit_sword int(6) default '0',
		all_unit_axe int(6) default '0',
		all_unit_archer int(11) NOT NULL default '0',
		all_unit_spy int(6) default '0',
		all_unit_light int(6) default '0',
		all_unit_cav_archer int(11) NOT NULL default '0',
		all_unit_heavy int(6) default '0',
		all_unit_ram int(6) default '0',
		all_unit_catapult int(6) default '0',
		all_unit_snob int(6) default '0',
		all_unit_paladin int(11) NOT NULL default '0',
		recruited_snobs int(5) default '0',
		control_villages int(5) default '0',
		attacks int(5) default '0',
		agreement varchar(200) collate utf8_unicode_ci default '100',
		agreement_aktu int(35) NOT NULL,
		snobed_by int(11) default '-1',
		dealers_outside int(6) NOT NULL default '0',
		create_time int(40) NOT NULL,
		smith_tec varchar(200) collate utf8_unicode_ci NOT NULL,
		conmap_con varchar(10) collate utf8_unicode_ci NOT NULL,
		statue int(5) default '0',
		last_barbar_build int(13) NOT NULL default '0',
		bonus int(2) NOT NULL default '0',
		PRIMARY KEY  (id),
		UNIQUE KEY x_2 (x,y),
		KEY `name` (`name`),
		KEY userid (userid)
		)
	ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;",
	);

if ($config->get_cfg('admin_key') == 'actions_massiv_keyaaassd') {
	if ($_GET['akcja'] == 'add_new_server' && isset($_POST)) {
		require('configs/serwery.php');
		
		$max = $serwery[(count($serwery) - 1)];
		
		$new_serwer = $max + 1;
		
		$serwery[] = $new_serwer;
		
		$cont = implode(',',$serwery);
		
		$out_cont .= "<?php\n";
		$out_cont .= "//Dodawanie serwerów znajduje siê na adresie:'http://localhost/admin.php?screen=create_new_server'\n";
		$out_cont .= '$serwery = array('.$cont.");\n";
		$out_cont .= '?>';
		
		$p = fopen('configs/serwery.php','w');
		fputs($p,$out_cont);
		fclose($p);
		
		mysql_query('CREATE DATABASE `lan_'.$new_serwer.'`');
		mysql_select_db('lan_'.$new_serwer,$connect);
		
		foreach ($sql_queries as $query) {
			mysql_query($query);
			}
		
		mysql_select_db($config->get_cfg('db_name'),$connect);
		
		kopiuj('serwer_szablon','serwer_'.$new_serwer);
		
		unlink('serwer_'.$new_serwer.'/.htaccess');
		
		$_POST['speed'] = (int)$_POST['speed'];
		if ($_POST['speed'] < 0.1) {
			$_POST['speed'] = 0.1;
			}
		if ($_POST['speed'] > 10000000) {
			$_POST['speed'] > 10000000;
			}
		$_POST['movement_speed'] = (int)$_POST['movement_speed'];
		if ($_POST['movement_speed'] < 0.1) {
			$_POST['movement_speed'] = 0.1;
			}
		if ($_POST['movement_speed'] > 10000000) {
			$_POST['movement_speed'] > 10000000;
			}
		$_POST['agreement_per_hour'] = (int)$_POST['agreement_per_hour'];
		if ($_POST['agreement_per_hour'] < 1) {
			$_POST['agreement_per_hour'] = 1;
			}
		if ($_POST['agreement_per_hour'] > 10000) {
			$_POST['agreement_per_hour'] > 10000;
			}
		$_POST['agreement_per_hour'] = floor($_POST['agreement_per_hour']);
		$_POST['dealer_time'] = (int)$_POST['dealer_time'];
		if ($_POST['dealer_time'] < 0.001) {
			$_POST['dealer_time'] = 0.001;
			}
		if ($_POST['dealer_time'] > 10000) {
			$_POST['dealer_time'] > 10000;
			}
			
		$contents_cfg_file = file_get_contents('serwer_'.$new_serwer.'/include/config.php');
		
		$contents_cfg_file = str_replace('&&@_NwSerWerID',$new_serwer,$contents_cfg_file);
		$contents_cfg_file = str_replace('&&@_NwSerWerSPEED',$_POST['speed'],$contents_cfg_file);
		$contents_cfg_file = str_replace('&&@_NwSerWerMOVSPEED',$_POST['movement_speed'],$contents_cfg_file);
		$contents_cfg_file = str_replace('&&@_NwSerWerPOPARCIE',$_POST['agreement_per_hour'],$contents_cfg_file);
		$contents_cfg_file = str_replace('&&@_NwSerWerSZYBKOSC_KOPCOW',$_POST['dealer_time'],$contents_cfg_file);
		
		$cfg_file_server = fopen('serwer_'.$new_serwer.'/include/config.php','w');
		fputs($cfg_file_server,$contents_cfg_file);
		fclose($cfg_file_server);
			
		header('LOCATION: admin.php?screen=create_new_server&suk=Dodano nowy serwer ('.$new_serwer.')');
		exit;
		}
	$tpl->assign('sukces',$_GET['suk']);
	}
?>