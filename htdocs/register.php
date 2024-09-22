<?php
/*****************************************/
/*=======================================*/
/*     PLIK: register.php   		 	 */
/*     DATA: 11.12.2011r        		 */
/*     ROLA: Zarejestrowanie gracza		 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

require('lib/configs.php');
require('configs/config.php');
require('lib/functions.php');
require('lib/smarty/smarty.class.php');

$all_mods = array('rejestracja','powodzenie');

//Po³¹czyæ z ogóln¹ baz¹ danych:
$connect = mysql_connect($config->get_cfg('db_host'),$config->get_cfg('db_user'),$config->get_cfg('db_pass'),'');
mysql_select_db($config->get_cfg('db_name'),$connect);

if (!in_array($_GET['mode'],$all_mods)) {
	$mode = 'rejestracja';
	} else {
	$mode = $_GET['mode'];
	}

$tpl = new smarty();

if ($mode == 'rejestracja') {
	if ($_GET['action'] == 'create' && isset($_POST)) {
		$wynik = zakladaj_konto($_POST['name'],$_POST['password'],$_POST['password_confirm'],$_POST['email'],$_POST['agb']);
		if (is_numeric($wynik)) {
			header('LOCATION: register.php?mode=powodzenie&gracz='.$wynik);
			exit;
			} else {
			$error = $wynik;
			}
		}
	}
if ($mode == 'powodzenie') {
	if (empty($_GET['gracz'])) {
		$pokaz = false;
		} else {
		$username = sql("SELECT `nazwa` FROM `gracze` WHERE `id` = '".$_GET['gracz']."'",'array');
		$pokaz = true;
		}
	$tpl->assign('pokaz',$pokaz);
	$tpl->assign('username',$username);
	}
	
mysql_close();

$tpl->assign('error',$error);
$tpl->assign('mode',$mode);
$tpl->display('register.tpl');
?>