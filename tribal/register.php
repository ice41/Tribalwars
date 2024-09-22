<?php
/*****************************************/
/*=======================================*/
/*     PLIK: register.php   		 	 */
/*     DATA: 11.12.2011r        		 */
/*     ROLA: Zarejestrowanie gracza		 */
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

require('lib/configs.php');
require('configs/config.php');
require('lib/functions.php');
require('lib/smarty/smarty.class.php');
require('configs/serwery.php');

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
		$_GET['gracz'] = cmp_str($_GET['gracz'],0,100);
		$username = entparse(sql("SELECT `nazwa` FROM `gracze` WHERE `id` = '".$_GET['gracz']."'",'array'));
		$pokaz = true;
		}
	$tpl->assign('pokaz',$pokaz);
	$tpl->assign('username',$username);
	}

if(empty($_GET['server'])) {
$serwer = $serwery[(count($serwery) - 1)];
} else {
$serwer = $_GET['server'];
$serwer = str_replace('pl','',$serwer);
}
	
mysql_close();

$tpl->assign('serwer',$serwer);
$tpl->assign('error',$error);
$tpl->assign('mode',$mode);
$tpl->assign('linki',$config->get_cfg("top_menu_links"));
$tpl->display('register.tpl');
?>