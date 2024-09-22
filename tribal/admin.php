<?php
/*****************************************/
/*=======================================*/
/*     PLIK: admin.php   		 		 */
/*     DATA: 15.12.2011r        		 */
/*     ROLA: administracja plemion		 */
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

$tpl = new smarty();

if ($_GET['action'] === 'zaloguj' and count($_POST) > 0) {
	if ($config->get_cfg('admin_pass') === $_POST['pass']) {
		setcookie('admin_isset','H2KeYaaDmiinIS');
		header ('LOCATION: admin.php');
		exit;
		} else {
		$error = 'B³êdne has³o';
		}
	}
	
if ($_GET['action'] == 'wyloguj') {
	setcookie('admin_isset','');
	header ('LOCATION: admin.php');
	exit;
	}
	
if ($_COOKIE['admin_isset'] === 'H2KeYaaDmiinIS') {
	$loging = false;
	
	//Milisekundy
	$msec = explode(" ",microtime());
	$msec = floor($msec[0] * 1000);
	
	//Screeny:
	if (!isset($_GET['screen'])) {
		$_GET['screen'] = 'index';
		}
		
	$all_screens = array('index','create_new_server','edit_serwer');
	
	if (!in_array($_GET['screen'],$all_screens)) {
		$_GET['screen'] = 'index';
		}
		
	//Po³¹czyæ z ogóln¹ baz¹ danych:
	$connect = mysql_connect($config->get_cfg('db_host'),$config->get_cfg('db_user'),$config->get_cfg('db_pass'),'');
	mysql_select_db($config->get_cfg('db_name'),$connect);
		
	require ('admin_actions/admin_'.$_GET['screen'].'.php');
	
	$tpl->assign('load_msec',$msec);
	
	if ($config->get_cfg('admin_key') == 'actions_massiv_keyaaassd') {
		$tpl->assign('screen',$_GET['screen']);
		$tpl->assign('allow_screens',$all_screens);
		} else {
		$error = 'Nie prawid³owy kod do akcji!';
		}
		
	mysql_close();
		
	} else {
	$loging = true;
	}
	
$tpl->assign('loging',$loging);
$tpl->assign('date',formatuj_date(date("U")));
$tpl->assign('error',$error);
$tpl->display('admin.tpl');
?>