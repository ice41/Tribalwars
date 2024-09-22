<?php
/*****************************************/
/*=======================================*/
/*     PLIK: uczestnictwo.php   		 */
/*     DATA: 16.12.2011r        		 */
/*     ROLA: Stworzenie konta dla gracza */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

//Za³adowaæ wszystkie biblioteki (config,smarty) i ustawienia g³ówne
require('../lib/configs.php');
require('../configs/config.php');
require 'lib/smarty/smarty.class.php';

$cl_cfg = $config;
unset($config);

function sql($sql,$typ) {
    switch($typ) {
	    case 'array':
		$query = mysql_query($sql);
     	$one = mysql_fetch_array($query);
	    return $one[0];
		case 'assoc':
		$query = mysql_query($sql);
	    $one = mysql_fetch_assoc($query);
	    return $one;
	    }
    }
	
function reloaduj_ranking_graczy_punkty() {
	$query = mysql_query("SELECT id FROM `users` ORDER BY points DESC");
	while($id = mysql_fetch_array($query)) {
		$rang += 1;
		mysql_query("UPDATE `users` SET `rang` = '$rang' WHERE `id` = '".$id[0]."'");
		}
	}
	
function GetClientIP() { 
	if ($_SERVER['HTTP_X_FORWARDED_FOR']) { 
		$clientip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
		} else { 
		$clientip = $_SERVER['REMOTE_ADDR']; 
		}
	return $clientip; 
	} 

if (!empty($_COOKIE['session']) && !empty($_COOKIE['ord_un']) && !empty($_COOKIE['ord_id']) && !empty($_COOKIE['ord_pa'])) {
	require ('include/config.php');
	
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
				mysql_query("INSERT INTO users(tw_id,username,password,do_action,last_activity,rang) VALUES('".$_COOKIE['ord_id']."','".$_COOKIE['ord_un']."','".$_COOKIE['ord_pa']."','$czas','$czas','1')");
			
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
				
				reloaduj_ranking_graczy_punkty();
		
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