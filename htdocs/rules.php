<?php
require ('include.ini.php');
require('lib/configs.php');
require('configs/config.php');
require('lib/functions.php');
require('lib/smarty/smarty.class.php');
require('configs/serwery.php');




if ($_COOKIE['admin_isset'] === 'H2KeYaaDmiinIS') {
	$admin = true;
	}



//pobierz listę kategorii z bazy danych:
	$query['big_arr'] = mysql_query("SELECT * FROM `zasady`");
	while ($tm_info = mysql_fetch_array($query['big_arr'])) {

		$zasady[$tm_info['id']]['id'] = urldecode($tm_info['id']);
		$zasady[$tm_info['id']]['typ'] = urldecode($tm_info['typ']);
        $zasady[$tm_info['id']]['nazwa'] = urldecode($tm_info['nazwa']);
	



		}

	if ($_GET['akcja'] == 'usun' and isset($_GET['id'])) {
		$_GET['id'] = (int)$_GET['id'];
		if ($_GET['id'] < 0) {
			$_GET['id'] = 0;
			}
		$_GET['id'] = floor($_GET['id']);
		$counts = sql("SELECT COUNT(id) FROM  `lista_zasad` WHERE `id` = '".$_GET['id']."'",'array');
		if ($counts > 0) {
			mysql_query("DELETE FROM `lista_zasad` WHERE `id` = '".$_GET['id']."'");
			}
		header('LOCATION: rules.php');
		exit;
		}
	if ($_GET['akcja'] == 'usun_kt' and isset($_GET['id'])) {
		$_GET['id'] = (int)$_GET['id'];
		if ($_GET['id'] < 0) {
			$_GET['id'] = 0;
			}
		$_GET['id'] = floor($_GET['id']);
		$counts = sql("SELECT COUNT(id) FROM  `zasady` WHERE `id` = '".$_GET['id']."'",'array');
		if ($counts > 0) {
			mysql_query("DELETE FROM `zasady` WHERE `id` = '".$_GET['id']."'");
			mysql_query("DELETE FROM `lista_zasad` WHERE `kategoria` = '".$_GET['typ']."'");			
			}
		header('LOCATION: rules.php');
		exit;
		}			


$tpl->assign('admin',$admin);
$tpl->assign('zasady',$zasady);
$tpl->assign('linki',$linki);

$tpl->display('rules.tpl');
?>