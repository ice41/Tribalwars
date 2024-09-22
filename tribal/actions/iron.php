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
	$production_arr[$i]['produkcja'] = floor($arr_production[$i] * $config['speed']);
	if ($village['bonus'] == 5) {
		$production_arr[$i]['produkcja'] *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
		}
	if ($village['bonus'] == 2) {
		$production_arr[$i]['produkcja'] *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
		}
	$production_arr[$i]['produkcja'] = number_format($production_arr[$i]['produkcja']);
	
	$production_arr[$i]['opis'] = $opis;
	}
	
$res_dtp = sql("SELECT `alli` FROM `villages` WHERE `id` = '".$village["id"]."'","array");

if ($_GET["action"] === "resetCounter" && $_GET["h"] == $session['hkey']) {
	mysql_query("UPDATE `villages` SET `alli` = '0' WHERE `id` = '".$village["id"]."'");
	header('location: game.php?village='.$village['id'].'&screen='.$_GET['screen']);
	exit;
	}

$tpl->assign('sur_dtp',format_number(floor($res_dtp)));
$tpl->assign('time_last_rel',$pl->format_date($village['create_time']));
$tpl->assign('day_last_rel',format_number(ceil((date("U") - $village['create_time']) / 86400)));
	
$tpl->assign('sur_name',$_GET['screen']);
$tpl->assign('production_arr',$production_arr);
?>