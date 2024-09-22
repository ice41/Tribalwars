<?php

/*****************************************/
/*=======================================*/
/*     PLIK: uczestnictwo.php   	 */
/*     DATA: 16.12.2011r        	 */
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

//Za³adowaæ wszystkie biblioteki (config,smarty) i ustawienia g³ówne


require('lib/config.php');
require('../configs/config.php');

require 'lib/smarty/smarty.class.php';
require 'lib/functions.php';



$cl_cfg = $config;
unset($config);

if (!empty($_COOKIE['session']) && !empty($_COOKIE['ord_un']) && !empty($_COOKIE['ord_id']) && !empty($_COOKIE['ord_pa'])) {
	
require ('lib/config.php');
	
	$tpl = new smarty();
	
	if ($config['create_users_and_villages'] === true) {
		if ($_GET['action'] == 'accept_uczestnictwo' ) {
			$db_server_lan_cnnct_var = mysql_connect($config['db_host'],$config['db_user'],$config['db_pw'],'');
			mysql_select_db($config['db_name'],$db_server_lan_cnnct_var);
		
			//Utworzyæ takiego gracza:
                //Wykonaæ obliczenie dla nastêpnego zadania
                $ilosc_1 = mysql_query("SELECT * FROM users");
                $ilosc_2 = mysql_num_rows($ilosc_1);
                $ilosc_new = $ilosc_2 + 1;				
				//Dodaæ nowego u¿ytkownika dla statystyk œwiata
				mysql_query("INSERT INTO gracze(ilosc,time) VALUES('$ilosc_new','".date("U")."')");			
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

	            
				//Reload rankingów
				reload_all_rangs();

				
				//Zamkn¹æ mysql:
				mysql_close();
			
				//Dodaæ do g³ównej bazy danej ¿e gracz zacz¹ grê na tym serwerze:
				//Po³¹czyæ z ogóln¹ baz¹ danych:
				require('../configs/config.php');
				$connect = mysql_connect($conf['db_host'],$conf['db_user'],$conf['db_pass'],'');
	            mysql_select_db($conf['db_name'],$connect);
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
		        //Dodaj nowe COOKIE`S dla wiodomoœci powitalnej:
				setcookie('gracz_id',$userid);
				setcookie('gracz_username',$username);				

                header ("LOCATION: game.php");
				exit;
				}
			}
		$tpl->assign('rejestracja_nowych_graczy',true);
		
		$tpl->assign('speed',$config['speed']);
		$tpl->assign('serwer',$config['__SERVER__ID']);
		$tpl->assign('wioski_start',$config['wioski_na_start']);				
		$tpl->assign('monety',false);
if ($config['noc'] == true) {
		$tpl->assign('noc',true);
} else {
		$tpl->assign('noc',false);
}
		$tpl->assign('noc1',$config['noc_poczatek']);
		$tpl->assign('noc2',$config['noc_koniec']);	
		$tpl->assign('monety',false);		
		$tpl->assign('poziom_palacu',false);
		if ($config['kosciol_i_mnisi'] == true) {
			$tpl->assign('kosciol',true);
			} else {
			$tpl->assign('kosciol',false);
			}	
			if ($config['ag_style'] == 1) {
			$tpl->assign('monety',true);
			} else {
			$tpl->assign('poziom_palacu',true);
			}
		
		} else {
		$tpl->assign('speed',$config['speed']);
		$tpl->assign('serwer',$config['__SERVER__ID']);
		$tpl->assign('monety',false);
		$tpl->assign('poziom_palacu',false);
		if ($config['ag_style'] == 1) {
			$tpl->assign('monety',true);
			} else {
			$tpl->assign('poziom_palacu',true);
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