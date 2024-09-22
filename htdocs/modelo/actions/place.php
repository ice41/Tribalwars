<?php 
$place_lvl = $village[$_GET['screen']];
if ($place_lvl >  0) {
	$show_build = true;
	} else {
	$show_build = false;
	}

if ($show_build) {
	$modes = array (
		'Ordem' => 'command',
		'Tropas' => 'units',
		'Simulador' => 'sim',
		'Descobertas' => 'odk',			
		);
		
	if (!in_array($_GET['mode'],$modes)) {
		$_GET['mode'] = 'command';
		}
		
	require ('actions/place_'.$_GET['mode'].'.php');
		
	$tpl->assign('mode',$_GET['mode']);
	$tpl->assign('links',$modes);
	$tpl->assign('allow_mods',$modes);
	}

$tpl->assign('show_build',$show_build);
?>