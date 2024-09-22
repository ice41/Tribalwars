<?php
/*****************************************/
/*=======================================*/
/*     PLIK: lost_pw.php   		 		 */
/*     DATA: 11.12.2011r        		 */
/*     ROLA: Odzyskanie has³a gracza	 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

require('lib/configs.php');
require('configs/config.php');
require('lib/functions.php');
require('lib/smarty/smarty.class.php');

//Po³¹czyæ z ogóln¹ baz¹ danych:
$connect = mysql_connect($config->get_cfg('db_host'),$config->get_cfg('db_user'),$config->get_cfg('db_pass'),'');
mysql_select_db($config->get_cfg('db_name'),$connect);

$tpl = new smarty();

if ($_GET['action'] == 'send' and isset($_POST)) {
	$error = change_pass($_POST['name'],$_POST['email'],$_POST['new_pass']);
	if ($error == 'Has³o zosta³o zmienione.') {
		$green = true;
		} else {
		$green = false;
		}
	$tpl->assign('error',$error);
	$tpl->assign('green',$green);
	}

mysql_close();
$tpl->display('lost_pw.tpl');
?>

