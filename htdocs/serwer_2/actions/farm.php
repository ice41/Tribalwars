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
	$farm_arr_max[$i]['produkcja'] = number_format(floor($arr_farm[$i]));
	$farm_arr_max[$i]['opis'] = $opis;
	}
	
$tpl->assign('farm_arr',$farm_arr_max);
?>