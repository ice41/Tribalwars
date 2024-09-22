<?php
require('../../lib/configs.php');
require('../../configs/config.php');

$cl_cfg = $config;
unset($config);

require ('../include/config.php');

$suk = false;
if ($_GET['action'] == 'reset') {
	mysql_query('TRUNCATE table `ally`');
	mysql_query('TRUNCATE table `ally_events`');
	mysql_query('TRUNCATE table `ally_invites`');
	mysql_query('TRUNCATE table `announcement`');
	mysql_query('TRUNCATE table `bot`');
	mysql_query('TRUNCATE table `build`');
	mysql_query('TRUNCATE table `dealers`');
	mysql_query('TRUNCATE table `events`');
	mysql_query('TRUNCATE table `kontrakty`');
	mysql_query('TRUNCATE table `krzaki`');
	
	mysql_query('TRUNCATE table `login`');
	mysql_query('TRUNCATE table `logins`');
	mysql_query('TRUNCATE table `logs`');
	mysql_query('TRUNCATE table `mail_archiv`');
	mysql_query('TRUNCATE table `mail_block`');
	mysql_query('TRUNCATE table `mail_in`');
	mysql_query('TRUNCATE table `mail_out`');
	mysql_query('TRUNCATE table `movements`');
	mysql_query('TRUNCATE table `odznaczenia`');
	mysql_query('TRUNCATE table `offers`');
	
	mysql_query('TRUNCATE table `offers_multi`');
	mysql_query('TRUNCATE table `recruit`');
	mysql_query('TRUNCATE table `reports`');
	mysql_query('TRUNCATE table `research`');
	mysql_query('TRUNCATE table `run_events`');
	mysql_query('TRUNCATE table `save_players`');
	mysql_query('TRUNCATE table `save_rounds`');
	mysql_query('TRUNCATE table `sessions`');
	mysql_query('TRUNCATE table `twozenie_osady`');
	mysql_query('TRUNCATE table `unit_place`');
	
	mysql_query('TRUNCATE table `users`');
	mysql_query('TRUNCATE table `villages`');
	mysql_query('TRUNCATE table `dzielenie_rezerwacji`');
	mysql_query('TRUNCATE table `rezerwacje`');
	mysql_query('TRUNCATE table `rezerwacje_log`');
	
	
	mysql_query("INSERT INTO twozenie_osady(okrag,osad_na_okragu,suma_wiosek) VALUE('1','0','0')");
	
	mysql_close();
	
	$connect = mysql_connect($cl_cfg->get_cfg('db_host'),$cl_cfg->get_cfg('db_user'),$cl_cfg->get_cfg('db_pass'),'');
	mysql_select_db($cl_cfg->get_cfg('db_name'),$connect);
	
	$serwery_aktu_gr = mysql_query("SELECT serwery_gry,id FROM `gracze`");
	while($_uinfo = mysql_fetch_assoc($serwery_aktu_gr)) {
		$arr = explode(';',$_uinfo['serwery_gry']);
		$new_arr = array();
		foreach ($arr as $val) {
			if	($val != $config['__SERVER__ID'] && !empty($val)) {
				$new_arr[] = $val;
				}
			}
		$str = implode(';',$new_arr);
		
		mysql_query("UPDATE `gracze` SET `serwery_gry` = '$str' WHERE `id` = '".$_uinfo['id']."'");
		
		unset($new_arr);
		}
	
	mysql_close();
	
	$db->connect($config['db_host'],$config['db_user'],$config['db_pw'],$config['db_name']);
	
	$suk = true;
	}
	
$tpl->assign('suk',$suk);
?>