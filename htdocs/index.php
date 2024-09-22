<?php
/*****************************************/
/*=======================================*/
/*     PLIK: index.php   		 		 */
/*     DATA: 10.12.2011r        		 */
/*     ROLA: Mo¿liwoœæ zalogownia siê	 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

ob_start();

require('lib/configs.php');
require('configs/config.php');
require('configs/serwery.php');
require('lib/functions.php');
require('lib/smarty/smarty.class.php');

$tpl = new smarty();

//Po³¹czyæ z ogóln¹ baz¹ danych:
$connect = mysql_connect($config->get_cfg('db_host'),$config->get_cfg('db_user'),$config->get_cfg('db_pass'),'');
mysql_select_db($config->get_cfg('db_name'),$connect);

if ($_GET['action'] == 'login' and isset($_POST)) {
	$efekt = zaloguj($_POST['user'],$_POST['password'],$_POST['cookie']);
	if (is_array($efekt)) {
		if ($efekt[2] == 1) {
			$speedlogin = true;
			} else {
			$speedlogin = false;
			}
		} else {
		$error = $efekt;
		}
	}
	
if ($_GET['action'] == 'zaloguj' and $_POST['speedlogin'] == '1') {
	$speedlogin = true;
	$efekt[0] = $_POST['user'];
	}

$counts_loged_players = sql("SELECT COUNT(id) FROM `zalogowani` WHERE `client_ip` = '".GetClientIP()."'",'array');
if ($counts_loged_players > 0 || $speedlogin == true) {
	$loging = false;
	if ($speedlogin == true) {
		$userid = $efekt[0];
		$wybiez_swiat = true;
		} else {
		$userid = sql("SELECT `client_id` FROM `zalogowani` WHERE `client_ip` = '".GetClientIP()."' LIMIT 1",'array');
		$wybiez_swiat = false;
		}
	$user_info = sql("SELECT id,nazwa,serwery_gry,haslo FROM `gracze` WHERE `id` = '".$userid."'",'assoc');
	$user_info['serwery_gry'] = explode(';',$user_info['serwery_gry']);
	$user_info['nazwa'] = entparse($user_info['nazwa']);
	if ($_GET['action'] == 'wyloguj') {
		wyloguj();
		}
	if ($_GET['action'] == 'wybierz_swiat' and isset($_POST)) {
		$wybiez_swiat = true;
		}
	if ($_GET['action'] == 'zaloguj' and isset($_POST)) {
		zaloguj_na_serwer($user_info,$_POST['password'],$_POST['user'],$_POST['serwer']);
		}
	$tpl->assign('user_info',$user_info);
	$tpl->assign('wybierz_swiat',$wybiez_swiat);
	} else {
	$loging = true;
	$tpl->assign('l_val',$_GET['log']);
	}
	
//Pobraæ og³oszenia z bazy danych:
$query['big_arr'] = mysql_query("SELECT * FROM `ogloszenia` ORDER BY data DESC LIMIT 30");
while ($og_info = mysql_fetch_array($query['big_arr'])) {
	$_ocounter += 1;
	$ogloszenia[$og_info['id']]['text'] = urldecode($og_info['text']);
	$ogloszenia[$og_info['id']]['data'] = formatuj_date($og_info['data']);
	$ogloszenia[$og_info['id']]['counter'] = $_ocounter;
	}
		
$tpl->assign('ogloszenia',$ogloszenia);
$tpl->assign('speedlogin',$speedlogin);
if ($speedlogin == true) {
	$tpl->assign('user_arr',$efekt);
	}
$tpl->assign('can_log',$loging);
$tpl->assign('error',$error);
$tpl->assign('serwery',$serwery);

ob_end_flush();

$tpl->display('index.tpl');
?>