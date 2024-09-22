<?php
$ranking_modes = array(
	'Tribos' => 'ally',
	'Jogadores' => 'player',
	'Descobertas' => 'odk',	
	'Tribos do continente' => 'con_ally',
	'jogadores do continente' => 'con_player',
	'Oponentes derrotados (tribos)' => 'kill_ally',
	'oponentes derrotados' => 'kill_player'
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