<?php
//Akcja badaj wszystkie technologie
if ($_GET['action'] == 'ulepsz_wszystkie_tech') {
	foreach ($cl_techs->dbname as $tech) {
		$tech_query .= ',unit_'.$tech.'_tec_level';
		}
		
	$village_info = sql("SELECT r_wood,r_stone,r_iron$tech_query FROM `villages` WHERE `id` = '".$village['id']."'",'assoc');
	
	foreach ($cl_techs->dbname as $tech) {
	    $maxstage = $cl_techs->get_maxstage($tech);
		if ($village_info['unit_'.$tech.'_tec_level'] != $maxstage) {
		    $aktu_level = $village_info['unit_'.$tech.'_tec_level'];
			$rozn_level = $maxstage - $village_info['unit_'.$tech.'_tec_level'];
			$next_level = $aktu_level + 1;
			for ($i = $next_level; $i <= $maxstage; $i++) {
			    $koszty_drewno += $cl_techs->get_wood($tech,$i);
				$koszty_kamienie += $cl_techs->get_stone($tech,$i);
				$koszty_zelazo += $cl_techs->get_iron($tech,$i);
			    }
			$counter += 1;
			}
	    }
	
	if ($village_info['r_wood'] >= $koszty_drewno && $village_info['r_stone'] >= $koszty_kamienie && $village_info['r_iron'] >= $koszty_zelazo) {
	    if ($counter > 0) {
			$_err = false;
			foreach ($cl_techs->dbname as $tech) {
				$maxstage = $cl_techs->get_maxstage($tech);
				mysql_query("UPDATE `villages` SET `unit_".$tech."_tec_level` = '".$maxstage."' WHERE `id` = '".$village['id']."'");
				}
			mysql_query("UPDATE `villages` SET `r_stone` = `r_stone` - '".$koszty_kamienie."' WHERE `id` = '".$village['id']."'");
			mysql_query("UPDATE `villages` SET `r_wood` = `r_wood` - '".$koszty_drewno."' WHERE `id` = '".$village['id']."'");
			mysql_query("UPDATE `villages` SET `r_iron` = `r_iron` - '".$koszty_zelazo."' WHERE `id` = '".$village['id']."'");
			} else {
			$_err = true;
			$tpl->assign('errorr','Zbadano ju� wszystkie technologie.');
			}
	    } else {
		$_err = true;
		$tpl->assign('errorr','Nie posiadasz wystarczaj�cej liczby surowc�w, aby zbada� wszystkie technologie.');
		}
		
	if ($_err === false) {
	    header ('location: game.php?village='.$village['id'].'&screen=smith');
		exit;
	    }
	}
	
eaccelerator_load('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');
?>