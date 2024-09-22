<?php
$i_conq = $village[$_GET['screen']] + 2;
if ($i_conq > $cl_builds->get_maxstage($_GET['screen'])) {
	$i_conq = $cl_builds->get_maxstage($_GET['screen']);
	}

for ($i = $village[$_GET['screen']]; $i <= $i_conq; $i++) {
	if ($i == $village[$_GET['screen']]) {
		$opis = 'Atualmente derramando';
		} else {
		$opis = 'Capacidade em (nível '.$i.')';
		}
	$storage_arr[$i]['produkcja'] = floor($arr_maxstorage[$i]);
	if ($village['bonus'] == 1) {
		$storage_arr[$i]['produkcja'] *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
		}
	$storage_arr[$i]['produkcja'] = number_format($storage_arr[$i]['produkcja']);
	$storage_arr[$i]['opis'] = $opis;
	}
	
if ($village['bonus'] == 1) {
	$full_storage = $arr_maxstorage[$village[$_GET['screen']]] * $bonus->bonusy[$village['bonus']]['modifer'];
	} else {
	$full_storage = $arr_maxstorage[$village[$_GET['screen']]];
	}

if ($village['r_wood'] >= $full_storage) {
	$wood_is_full = true;
	} else {
	$wood_is_full = false;
	$spich['do'] = $full_storage - $village['r_wood'];
	$sur_per_hour = $arr_production[$village['wood']] * $config['speed'];
	if ($village['bonus'] == 3) {
		$sur_per_hour *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
		}
	if ($village['bonus'] == 2) {
		$sur_per_hour *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
		}
	$spich['time_wood'] = floor(($spich['do'] / $sur_per_hour) * 3600);
	$spich['end_wood'] = date("U") + $spich['time_wood'];
	}
	
if ($village['r_stone'] >= $full_storage) {
	$stone_is_full = true;
	} else {
	$stone_is_full = false;
	$spich['do'] = $full_storage - $village['r_stone'];
	$sur_per_hour = $arr_production[$village['stone']] * $config['speed'];
	if ($village['bonus'] == 4) {
		$sur_per_hour *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
		}
	if ($village['bonus'] == 2) {
		$sur_per_hour *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
		}
	$spich['time_stone'] = floor(($spich['do'] / $sur_per_hour) * 3600);
	$spich['end_stone'] = date("U") + $spich['time_stone'];
	}
	
if ($village['r_iron'] >= $full_storage) {
	$iron_is_full = true;
	} else {
	$iron_is_full = false;
	$spich['do'] = $full_storage - $village['r_iron'];
	$sur_per_hour = $arr_production[$village['iron']] * $config['speed'];
	if ($village['bonus'] == 5) {
		$sur_per_hour *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
		}
	if ($village['bonus'] == 2) {
		$sur_per_hour *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
		}
	$spich['time_iron'] = floor(($spich['do'] / $sur_per_hour) * 3600);
	$spich['end_iron'] = date("U") + $spich['time_iron'];
	}
	
$tpl->assign('wood_is_full',$wood_is_full);
$tpl->assign('stone_is_full',$stone_is_full);
$tpl->assign('iron_is_full',$iron_is_full);
$tpl->assign('time_wood',$spich['time_wood']);
$tpl->assign('end_wood',$spich['end_wood']);
$tpl->assign('time_stone',$spich['time_stone']);
$tpl->assign('end_stone',$spich['end_stone']);
$tpl->assign('time_iron',$spich['time_iron']);
$tpl->assign('end_iron',$spich['end_iron']);
$tpl->assign('storage_arr',$storage_arr);
?>