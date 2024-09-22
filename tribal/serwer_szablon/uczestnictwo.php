<?php
/*****************************************/
/*=======================================*/
/*     PLIK: uczestnictwo.php   		 */
/*     DATA: 16.12.2011r        		 */
/*     ROLA: Stworzenie konta dla gracza */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

/*MA£E ZABESPIECZENIE PLEMION PRZED HAKERAMI :)*/

class GLOBALS {
	var $defined_globals = array();
	
	function define_global($globalname) {
		if (is_array($globalname)) {
			foreach ($globalname as $globalne) {
				$this->defined_globals[$globalne] = TRUE;
				}
			} else {
			$this->defined_globals[$globalname] = TRUE;
			}
		}
		
	function unregister_undefined_globals() {		
		$HTTP_GETS = $_GET;
		
		foreach ($HTTP_GETS as $HTTP_KEY => $HTTP_VAL) {
			unset($GLOBALS[$HTTP_KEY]);
			}
		}
	}
	
/*ZDEFINIUJ ZMIENNE POCHODZ¥CE OD USERA, KTÓRE MOG¥ BYÆ AKCEPTOWANE*/
$DS_USER_GLOBALS = new GLOBALS;
$DS_USER_GLOBALS->define_global('village');
$DS_USER_GLOBALS->define_global('id');
$DS_USER_GLOBALS->define_global('x');
$DS_USER_GLOBALS->define_global('y');
$DS_USER_GLOBALS->define_global('screen');
$DS_USER_GLOBALS->define_global('mode');
$DS_USER_GLOBALS->define_global('type');
$DS_USER_GLOBALS->define_global('target');
$DS_USER_GLOBALS->define_global('action');
$DS_USER_GLOBALS->define_global('h');
$DS_USER_GLOBALS->define_global('strona');
$DS_USER_GLOBALS->define_global('page');
$DS_USER_GLOBALS->define_global('rlog');
$DS_USER_GLOBALS->define_global('sort');
$DS_USER_GLOBALS->define_global('order');
$DS_USER_GLOBALS->define_global('filter');
$DS_USER_GLOBALS->define_global('akcja');
$DS_USER_GLOBALS->define_global('group');
$DS_USER_GLOBALS->define_global('try');
$DS_USER_GLOBALS->define_global('view');
$DS_USER_GLOBALS->define_global('item_name');
$DS_USER_GLOBALS->define_global('unit');
$DS_USER_GLOBALS->unregister_undefined_globals();

//Za³adowaæ wszystkie biblioteki (config,smarty) i ustawienia g³ówne
require('../lib/configs.php');
require('../configs/config.php');
require 'lib/smarty/smarty.class.php';
require 'lib/functions.php';

$cl_cfg = $config;
unset($config);

if (!empty($_COOKIE['session']) && !empty($_COOKIE['ord_un']) && !empty($_COOKIE['ord_id']) && !empty($_COOKIE['ord_pa'])) {
	require ('lib/config.php');
	
	$tpl = new smarty();
	
	if ($config['create_users_and_villages'] === true) {
		if ($_GET['action'] == 'accept_uczestnictwo' and isset($_POST)) {
			$db_server_lan_cnnct_var = mysql_connect($config['db_host'],$config['db_user'],$config['db_pw'],'');
			mysql_select_db($config['db_name'],$db_server_lan_cnnct_var);
		
			//Utworzyæ takiego gracza:
			$czas = date("U");
			$counter = sql("SELECT COUNT(id) FROM `users` WHERE `tw_id` = '".$_COOKIE['ord_id']."'",'array');
			$counter += sql("SELECT COUNT(id) FROM `users` WHERE `username` = '".$_COOKIE['ord_un']."'",'array');
			if ($counter > 0) {
				header('LOCATION: uczestnictwo.php');
				exit;
				} else {
				mysql_query("INSERT INTO users(tw_id,username,password,do_action,last_activity,rang,start_gaming) VALUES('".$_COOKIE['ord_id']."','".$_COOKIE['ord_un']."','".$_COOKIE['ord_pa']."','$czas','$czas','1','$czas')");
			
				$userid = sql("SELECT `id` FROM `users` WHERE `tw_id` = '".$_COOKIE['ord_id']."'",'array');
				$username = sql("SELECT `username` FROM `users` WHERE `tw_id` = '".$_COOKIE['ord_id']."'",'array');
				
				//Usun¹æ wszystkie sesje:
				mysql_query("DELETE FROM `sessions` WHERE `sid` = '".$_COOKIE['session']."'");
			
				//Dodaæ sesjê:
				$hkey = mt_rand(1000,9999);
				mysql_query("INSERT INTO sessions(userid,sid,hkey) VALUES('".$userid."','".$_COOKIE['session']."','".$hkey."')");
				setcookie('hkey',$hkey);
				
				//Dodaæ zalogowanie
				mysql_query("INSERT INTO logins(userid,username,time,ip) VALUES('".$userid."','".$username."','".date("U")."','".GetClientIP()."')");
				
				reload_all_rangs();
		
				//Zamkn¹æ mysql:
				mysql_close();
			
				//Dodaæ do g³ównej bazy danej ¿e gracz zacz¹ grê na tym serwerze:
				//Po³¹czyæ z ogóln¹ baz¹ danych:
				$connect = mysql_connect($cl_cfg->get_cfg('db_host'),$cl_cfg->get_cfg('db_user'),$cl_cfg->get_cfg('db_pass'),'');
				mysql_select_db($cl_cfg->get_cfg('db_name'),$connect);
				$serwery_aktu_gr = sql("SELECT `serwery_gry` FROM `gracze` WHERE `id` = '".$_COOKIE['ord_id']."'",'array');
				$serwery_aktu_gr = explode(';',$serwery_aktu_gr);
				$serwery_aktu_gr[] = $config['__SERVER__ID'];
				$serwery_aktu_gr = implode(';',$serwery_aktu_gr);
				mysql_query("UPDATE `gracze` SET `serwery_gry` = '$serwery_aktu_gr' WHERE `id` = '".$_COOKIE['ord_id']."'");
			
				//Zamkn¹æ mysql:
				mysql_close();
			
				//Wyczyœæ COOKIE'S:
				setcookie('ord_un','');
				setcookie('ord_id','');
				setcookie('ord_pa','');
		
				header('LOCATION: create_village.php');
				exit;
				}
			}
		$tpl->assign('rejestracja_nowych_graczy',true);
		
		$tpl->assign('speed',$config['speed']);
		$tpl->assign('serwer',$config['__SERVER__ID']);
		$tpl->assign('monety',false);
		$tpl->assign('poziom_pa³acu',false);
		if ($config['ag_style'] == 1) {
			$tpl->assign('monety',true);
			} else {
			$tpl->assign('poziom_pa³acu',true);
			}
		} else {
		$tpl->assign('speed',$config['speed']);
		$tpl->assign('serwer',$config['__SERVER__ID']);
		$tpl->assign('monety',false);
		$tpl->assign('poziom_pa³acu',false);
		if ($config['ag_style'] == 1) {
			$tpl->assign('monety',true);
			} else {
			$tpl->assign('poziom_pa³acu',true);
			}
		$tpl->assign('rejestracja_nowych_graczy',false);
		$tpl->assign('err','Rejestracja nowych graczy na tym œwiecie zosta³a tymczasowo wstrzymana, prosimy czekaæ...');
		}
	
	$tpl->display('uczestnictwo.tpl');
	} else {
	header('LOCATION: sid_wrong.php');
	exit;
	}
?>