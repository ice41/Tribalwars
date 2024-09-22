<?php
$ranking_modes = array(
	'Plemiona' => 'ally',
	'Gracz' => 'player',
	'Plemiona na kontynencie' => 'con_ally',
	'Gracze na kontynencie' => 'con_player',
	'Pokonani przeciwnicy (plemiona)' => 'kill_ally',
	'Pokonani przeciwnicy' => 'kill_player'
	);
	
if ($config['awards']) {
	$ranking_modes['Odznaczenia'] = 'awards';
	}
	
if (!in_array($_GET['mode'],$ranking_modes)) {
	$_GET['mode'] = 'player';
	}
	
require ('actions/ranking_'.$_GET['mode'].'.php');
	
$tpl->assign('ranking_modes',$ranking_modes);
?>