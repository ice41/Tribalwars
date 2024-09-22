<?php 
$market_lvl = $village[$_GET['screen']];
if ($market_lvl >  0) {
	$show_build = true;
	} else {
	$show_build = false;
	}

if ($show_build) {
	$modes = array (
		'Wyœlij surowce' => 'send',
		'W³asne oferty' => 'own_offer',
		'Obce oferty' => 'other_offer',
		);
		
	if (!in_array($_GET['mode'],$modes)) {
		$_GET['mode'] = 'send';
		}
		
	//Ustawiæ maksymaln¹ iloœæ kupców:
	$max_dealers = $arr_dealers[$village['market']];
	
	if ($village['bonus'] == 1) {
		$max_dealers *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
		}
		
	$max_dealers = floor($max_dealers);
		
	//Ustawiæ liczbê kupców dostêpnych:
	$inside_dealers = $max_dealers - $village['dealers_outside'];
	
	
		
	require ('actions/market_'.$_GET['mode'].'.php');
		
	$tpl->assign('mode',$_GET['mode']);
	$tpl->assign('max_dealers',$max_dealers);
	$tpl->assign('inside_dealers',$inside_dealers);
	$tpl->assign('links',$modes);
	$tpl->assign('allow_mods',$modes);
	}

$tpl->assign('show_build',$show_build);
?>