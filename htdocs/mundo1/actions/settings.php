<?php
$modes = array (
	'Perfil' => 'Perfile',
	'Definições' => 'settings',
	'E-mail' => 'email',
	'Alterar senha' => 'change_passwd',
	'Recomeçar' => 'move',
	'Apagar conta' => 'delete',
	'Medalhas' => 'award',
	'Logins' => 'logins',
	'Barra de atalhos' => 'toolbar',
	);
	
if ($config['awards']) {
	$modes['Medalhas'] = 'award';
	}
	
$tpl->assign('links',$modes);

if (!in_array($_GET['mode'],$modes)) {
	$_GET['mode'] = 'Perfile';
	}
	
require ('actions/settings_'.$_GET['mode'].'.php');
?>