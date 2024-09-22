<?php
/*****************************************/
/*=======================================*/
/*     PLIK: admin.php   		 		 */
/*     DATA: 15.12.2011r        		 */
/*     ROLA: administracja plemion		 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

require('lib/configs.php');
require('configs/config.php');
require('lib/functions.php');
require('lib/smarty/smarty.class.php');

$tpl = new smarty();

if ($_GET['action'] == 'zaloguj' and isset($_POST)) {
	if ($config->get_cfg('admin_pass') == $_POST['pass']) {
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
	
if ($_COOKIE['admin_isset'] == 'H2KeYaaDmiinIS') {
	$loging = false;
	
	//Milisekundy
	$msec = explode(" ",microtime());
	$msec = floor($msec[0] * 1000);
	
	//Screeny:
	if (!isset($_GET['screen'])) {
		$_GET['screen'] = 'index';
		}
		
	$all_screens = array('index','create_new_server');
	
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