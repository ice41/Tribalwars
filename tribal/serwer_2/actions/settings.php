<?php
$modes = array (
	'Profil' => 'profile',
	'Ustawienia' => 'settings',
	'Adres E-Mail' => 'email',
	'Zmie� has�o' => 'change_passwd',
	'Zacznij od nowa' => 'move',
	'Usu� konto' => 'delete',
	'Odznaczenia' => 'award',
	'Logowania' => 'logins',
	'Pasek skr�t�w' => 'toolbar',
	);
	
if ($config['awards']) {
	$modes['Odznaczenia'] = 'award';
	}
	
$tpl->assign('links',$modes);

if (!in_array($_GET['mode'],$modes)) {
	$_GET['mode'] = 'profile';
	}
	
require ('actions/settings_'.$_GET['mode'].'.php');
?>