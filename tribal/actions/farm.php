<?php
$i_conq = $village[$_GET['screen']] + 2;
if ($i_conq > $cl_builds->get_maxstage($_GET['screen'])) {
	$i_conq = $cl_builds->get_maxstage($_GET['screen']);
	}

for ($i = $village[$_GET['screen']]; $i <= $i_conq; $i++) {
	if ($i == $village[$_GET['screen']]) {
		$opis = 'Aktualna pojemnoœæ';
		} else {
		$opis = 'Pojemnoœæ na (Poziomie '.$i.')';
		}
	$farm_arr_max[$i]['produkcja'] = floor($arr_farm[$i]);
	if ($village['bonus'] == 9) {
		$farm_arr_max[$i]['produkcja'] *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
		}
	$farm_arr_max[$i]['produkcja'] = number_format($farm_arr_max[$i]['produkcja']);
	
	$farm_arr_max[$i]['opis'] = $opis;
	}
	
$tpl->assign('farm_arr',$farm_arr_max);
?>