<?php
$i_conq = $village[$_GET['screen']] + 2;
if ($i_conq > $cl_builds->get_maxstage($_GET['screen'])) {
	$i_conq = $cl_builds->get_maxstage($_GET['screen']);
	}

for ($i = $village[$_GET['screen']]; $i <= $i_conq; $i++) {
	if ($i == $village[$_GET['screen']]) {
		$opis = 'Nível atual';
		} else {
		$opis = 'Nível '.$i;
		}
		
	$wall_arr[$i]['opis'] = $opis;
	$wall_arr[$i]['bonus'] = floor($arr_wall_bonus[$i] * 100) . '%';
	$wall_arr[$i]['gruntowa'] = number_format(floor($arr_basic_defense[$i]));
	}
	
$tpl->assign('wall_arr',$wall_arr);
?>