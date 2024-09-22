<?php
if ($village[$_GET['screen']] > 0) {
	// ATIVO TODO TECNOLOGIA
	if ($_GET['action'] === 'ulepsz_wszystkie_tech') {
		foreach ($cl_techs->dbname as $tech) {
			$tech_query .= ',unit_'.$tech.'_tec_level';
			}
			
		$village_info = sql("SELECT r_wood,r_stone,r_iron$tech_query FROM `villages` WHERE `id` = '".$village['id']."'",'assoc');
		
		foreach ($cl_techs->dbname as $tech) {
			$village_info[$tech] = $village_info['unit_'.$tech.'_tec_level'];
			}
			
		// Selecione o Conselho de Edifícios de Liquidação:
		foreach ($cl_builds->dbname as $build) {
			$village_builds[$build] = $village[$build];
			}
			
		// Determine o conselho de tecnologia que pode ser estudado:
		$cl_techs->create_research_arr_counts($village['id']);
		$research_array = $cl_techs->research_counts;
		
		foreach ($cl_techs->dbname as $tech) {
			$tech_full = $village_info[$tech] + $research_array[$tech];
			
			// imediatamente
			if (czy_spelniono_wymagania($cl_techs->get_needed($tech),$village_builds)) {
				// rejeitar tecnologias estudadas:
				if ($tech_full < $cl_techs->get_maxstage($tech)) {
					$selected_techs[] = $tech;
					}
				}
			}
			
		$queries = array();
			
		// Verifique se existem tecnologias para examinar:
		if (is_array($selected_techs)) {
			// Calcule os custos de todas as tecnologias:
			$koszty_drewno = 0;
			$koszty_kamienie = 0;
			$koszty_zelazo = 0;
			
			foreach ($selected_techs as $tech) {
				$maxstage = $cl_techs->get_maxstage($tech);
				$tech_full = $village_info[$tech] + $research_array[$tech];
				
				$rozn_level = $maxstage - $tech_full;
				$next_level = $tech_full + 1;
				
				for ($i = $next_level; $i <= $maxstage; $i++) {
					$koszty_drewno += $cl_techs->get_wood($tech,$i);
					$koszty_kamienie += $cl_techs->get_stone($tech,$i);
					$koszty_zelazo += $cl_techs->get_iron($tech,$i);
					$queries[] = $tech;
					}
				}
				
			if ($village_info['r_wood'] >= $koszty_drewno && $village_info['r_stone'] >= $koszty_kamienie && $village_info['r_iron'] >= $koszty_zelazo) {
				mysql_query("UPDATE `villages` SET `r_stone` = `r_stone` - '".$koszty_kamienie."' WHERE `id` = '".$village['id']."'");
				mysql_query("UPDATE `villages` SET `r_wood` = `r_wood` - '".$koszty_drewno."' WHERE `id` = '".$village['id']."'");
				mysql_query("UPDATE `villages` SET `r_iron` = `r_iron` - '".$koszty_zelazo."' WHERE `id` = '".$village['id']."'");
				
				$_err = false;
				
				foreach ($queries as $tech) {
					$cl_techs->research($tech,$village['id']);
					}
				} else {
				$_err = true;
				$error = 'Não tem recursos suficientes para examinar todas as tecnologias.';
				}
			} else {
			$_err = true;
			$error = 'Todas as tecnologias disponíveis já foram estudadas.';
			}
			
		if ($_err === false) {
			header ('location: game.php?village='.$village['id'].'&screen=smith');
			exit;
			}
		}
		
	$i = 0;
		
	//Utwurz tablic� badanych technologii w danej osadzie:
	$sql = mysql_query("SELECT id,research,end_time,trwanie FROM `research` WHERE `villageid` = '".$village['id']."' ORDER BY `id`");
	while ($arr = mysql_fetch_assoc($sql)) {
		if ($i == 0) {
			$v_res[$arr['id']]['lit'] = true;
			$v_res[$arr['id']]['countdown'] = $arr['end_time'] - date("U");
			} else {
			$v_res[$arr['id']]['lit'] = false;
			$v_res[$arr['id']]['countdown'] = $arr['trwanie'] ;
			}
			
		$v_res[$arr['id']]['end_time'] = $arr['end_time'];
		
		if (!isset($CDoRes[$arr['research']])) {
			$CDoRes[$arr['research']] = 0;
			}
		$v_res[$arr['id']]['research'] = $arr['research'];
		++$CDoRes[$arr['research']];
		$v_res[$arr['id']]['stage'] = $village['unit_' . $arr['research'] . '_tec_level'] + $CDoRes[$arr['research']];	
		++$i;
		}
		
	// Crie um grupo de tecnologia:
	$tech_grocusto = array_values(array_unique($cl_techs->group));
	
	// Determine a tabela principal:
	if (count($tech_grocusto) != 0) {
		$main_table_width = round(100 / count($tech_grocusto));
		} else {
		$main_table_width = 100;
		}
		
	// atribui tecnologias aos grupos:
	foreach ($cl_techs->dbname as $tech) {
		if (!is_array($techs_columns[$cl_techs->get_group($tech)])) {
			$techs_columns[$cl_techs->get_group($tech)] = array($tech);
			} else {
			$techs_columns[$cl_techs->get_group($tech)][] = $tech;
			}
			
		$v_techs[$tech] = $village['unit_' . $tech . '_tec_level'];
		$v_techs_res[$tech] = $v_techs[$tech] + $CDoRes[$tech];
		}
		
	if ($_GET['action'] === 'cancel' && isset($_GET['id'])) {
		if ($_GET['h'] == $session['hkey']) {
			$_GET['id'] = (int)$_GET['id'];
			$_GET['id'] = floor($_GET['id']);
			if ($_GET['id'] < 0) {
				$_GET['id'] = 0;
				}
				
			$counts = sql("SELECT COUNT(id) FROM `research` WHERE `villageid` = '".$village['id']."' AND `id` = '".$_GET['id']."'","array");
				
			if ($counts > 0) {
				// Dê as recursos:
				$techname = $v_res[$_GET['id']]['research'];
				$last_tech_counter = 0;
				
				foreach ($v_res as $id => $arr) {
					if ($arr['research'] === $techname && $id <= $_GET['id']) {
						$last_tech_counter += 1;
						}
					}
					
				$tech_wood_cost = $cl_techs->get_wood($techname,($last_tech_counter + $v_techs[$techname]));
				$tech_stone_cost = $cl_techs->get_stone($techname,($last_tech_counter + $v_techs[$techname]));
				$tech_iron_cost = $cl_techs->get_iron($techname,($last_tech_counter + $v_techs[$techname]));
				
				mysql_query("UPDATE `villages` SET `r_stone` = `r_stone` + '".$tech_stone_cost."' WHERE `id` = '".$village['id']."'");
				mysql_query("UPDATE `villages` SET `r_wood` = `r_wood` + '".$tech_wood_cost."' WHERE `id` = '".$village['id']."'");
				mysql_query("UPDATE `villages` SET `r_iron` = `r_iron` + '".$tech_iron_cost."' WHERE `id` = '".$village['id']."'");
				
				// Exclua os eventos:
				mysql_query("DELETE FROM `research` WHERE `id` = '".$_GET['id']."'");
				mysql_query("DELETE FROM `events` WHERE `event_id` = '".$_GET['id']."' AND `event_type` = 'research'");
				
				$CzasPoz = $v_res[$_GET['id']]['end_time'] - date("U");
				mysql_query("UPDATE `research` SET `end_time` = `end_time` - '".$CzasPoz."' WHERE `villageid` = '".$village['id']."' AND `id` > '".$_GET['id']."'");
				
				header ('location: game.php?village='.$village['id'].'&screen=smith');
				exit;
				} else {
				$error = 'Nie ma takiej technologii';
				}
			} else {
			$error = 'B��d wykonania akcji';
			}
		}
		
	if ($_GET['action'] === 'research' && isset($_GET['id'])) {
		if ($_GET['h'] == $session['hkey']) {
			$cl_techs->check_tech($_GET['id'],$village);
			$effect = $cl_techs->get_last_error();
			
			if ($effect === "no_error") {
				$cl_techs->research($_GET['id'],$village['id']);
				$tech_stage = $v_techs_res[$_GET['id']] + 1;
				
				mysql_query("UPDATE `villages` SET `r_stone` = `r_stone` - '".$cl_techs->get_stone($_GET['id'],$tech_stage)."' WHERE `id` = '".$village['id']."'");
				mysql_query("UPDATE `villages` SET `r_wood` = `r_wood` - '".$cl_techs->get_wood($_GET['id'],$tech_stage)."' WHERE `id` = '".$village['id']."'");
				mysql_query("UPDATE `villages` SET `r_iron` = `r_iron` - '".$cl_techs->get_iron($_GET['id'],$tech_stage)."' WHERE `id` = '".$village['id']."'");
				
				header ('location: game.php?village='.$village['id'].'&screen=smith');
				exit;
				} else {
				if ($effect === "tech_not_found") {
					$error = "Não existe essa tecnologia";
					}
				if ($effect === "not_enough_ress") {
					$error = "Você tem uma pequena matéria -prima";
					}
				if ($effect === "not_fulfilled") {
					$error = "Os requisitos de construção não são especializados";
					}
				if ($effect === "max_stage") {
					$error = "O nível máximo dessa tecnologia já foi alcançado";
					}
				if ($effect === "not_enough_storage") {
					$error = "Para uma pequena capacidade de armazém.";
					}
				}
			} else {
			$error = 'Será tratado.';
			}
		}
		
	$tpl->assign('vill_research',$v_res);	
	$tpl->assign('show_build',true);
	$tpl->assign('group_techs',$tech_grocusto);
	$tpl->assign('table_width',$main_table_width);
	$tpl->assign('techs_columns',$techs_columns);
	$tpl->assign('techs',$v_techs);
	$tpl->assign('techs_res',$v_techs_res);	
	} else {
	$tpl->assign('show_build',false);
	}

$tpl->assign('cl_techs',$cl_techs);	
$tpl->assign('error',$error);
?>