<?php
$i_conq = $village[$_GET['screen']] + 2;
if ($i_conq > $cl_builds->get_maxstage($_GET['screen'])) {
	$i_conq = $cl_builds->get_maxstage($_GET['screen']);
	}

for ($i = $village[$_GET['screen']]; $i <= $i_conq; $i++) {
	if ($i == $village[$_GET['screen']]) {
		$opis = 'Aktualna produkcja';
		} else {
		$opis = 'Produkcja na (Poziomie '.$i.')';
		}
	$production_arr[$i]['produkcja'] = number_format(floor($arr_production[$i] * $config['speed']));
	$production_arr[$i]['opis'] = $opis;
	}
	
$tpl->assign('sur_name',$_GET['screen']);
$tpl->assign('production_arr',$production_arr);
?>