<?php

require ('include.inc.php');
require ('lib/config.php');

$tpl = new smarty();
        $tpl->assign('serwerid',$config['__SERVER__ID']);
	$query['big_arr'] = mysql_query("SELECT * FROM `users` ");
	while ($us_info = mysql_fetch_array($query['big_arr'])) {
		$users[$us_info['id']]['id'] = urldecode($us_info['id']);
	$users[$us_info['id']]['username'] = urldecode($us_info['username']);
	$users[$us_info['id']]['rang'] = urldecode($us_info['rang']);
	$users[$us_info['id']]['ally'] = urldecode($us_info['ally']);
		}
		
	$tpl->assign('users',$users);

	$query['big_arr'] = mysql_query("SELECT * FROM `ally` ");
	while ($al_info = mysql_fetch_array($query['big_arr'])) {
	$ally[$al_info['id']]['id'] = urldecode($al_info['id']);
	$ally[$al_info['id']]['name'] = urldecode($al_info['name']);
	$ally[$al_info['id']]['short'] = urldecode($al_info['short']);
	$ally[$al_info['id']]['rank'] = urldecode($al_info['rank']);
		}
		
	$tpl->assign('ally',$ally);


		$sql = mysql_query("SELECT `id` FROM `users` WHERE `ally` = '".$this->user_info['ally']."'");
		while ($id = mysql_fetch_array($sql)) {
			mysql_query("INSERT INTO czytanie(graczid,fid,tid) VALUES ('".$id[0]."','".$fid."','".$LAST_TID."')");
			}





require('../lib/configs.php');
require('../configs/config.php');
require('../configs/serwery.php');

$serwer = $serwery[(count($serwery) - 1)];

$tpl->assign('serwer',$serwer);
$tpl->assign('serwery',$serwery);
$tpl->assign('linki',$linki);
$tpl->display('hof.tpl');	
$tpl->display('guest.tpl');	




?>


