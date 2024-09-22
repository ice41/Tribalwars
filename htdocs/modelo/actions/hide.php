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
	$hide_arr[$i]['produkcja'] = number_format(floor($arr_maxhide[$i]));
	$hide_arr[$i]['opis'] = $opis;
	}
	
$full_hide = $arr_maxhide[$village[$_GET['screen']]];

$p_wood = $village['r_wood'] - $full_hide;
$p_stone = $village['r_stone'] - $full_hide;
$p_iron = $village['r_iron'] - $full_hide;
if ($p_wood < 0) {
	$p_wood = 0;
	}
if ($p_stone < 0) {
	$p_stone = 0;
	}
if ($p_iron < 0) {
	$p_iron = 0;
	}

$tpl->assign('p_wood',$p_wood);
$tpl->assign('p_stone',$p_stone);
$tpl->assign('p_iron',$p_iron);
$tpl->assign('hide_arr',$hide_arr);
?>