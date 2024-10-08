<?php	
if ($_GET['mode'] === 'mass') {
	require ('actions/groups_bar.php');
	require ('actions/villages_per_page.php');
	
	$query_string = '';

	foreach ($cl_units->get_array('dbname') as $key => $unit) {
		if (!in_array('no_investigate',$cl_units->get_specials($unit))) {
			$query_string .= ','.$unit.'_tec_level';
			}
		
		if (!in_array('no_investigate',$cl_units->get_specials($unit))) {
			$jednostki[$unit]['nazwa'] = $key;
			$jednostki[$unit]['koszt_bh'] = $cl_units->get_bhprice($unit);
			$jednostki[$unit]['koszt_wood'] = $cl_units->get_woodprice($unit);
			$jednostki[$unit]['koszt_stone'] = $cl_units->get_stoneprice($unit);
			$jednostki[$unit]['koszt_iron'] = $cl_units->get_ironprice($unit);
			$jednostki[$unit]['rekrutuj_w'] = $cl_units->recruit_in[$unit];
			$jednostki[$unit]['koszt_bh'] = $cl_units->get_bhprice($unit);
			}
		}
	
	$impl_units = implode(',',$cl_units->get_array('dbname'));
	$villages_massrek_query .= "bonus,r_wood,r_stone,r_iron,r_bh,barracks,smith,stable,garage,farm,storage$query_string";
	$units_massrek_query = "villages_from_id,$impl_units";
	
	foreach ($wioski_usera as $wioska) {
		reload_vdata($wioska['id'],date("U"));
		$wioska_info = sql("SELECT $villages_massrek_query FROM `villages` WHERE `id` = '".$wioska['id']."'",'assoc');
		$wioska_info_army = sql("SELECT $units_massrek_query FROM `unit_place` WHERE `villages_from_id` = '".$wioska['id']."' AND `villages_to_id` = '".$wioska['id']."'",'assoc');
		
		if ($wioska_info['bonus'] == 9) {
			$masowa_rek_wioski[$wioska['id']]['wolni_osadnicy'] = floor(($arr_farm[$wioska_info['farm']] * ($bonus->bonusy[$wioska_info['bonus']]['modifer'] + 1)) - $wioska_info['r_bh']);
			} else {
			$masowa_rek_wioski[$wioska['id']]['wolni_osadnicy'] = $arr_farm[$wioska_info['farm']] - $wioska_info['r_bh'];
			}
		$masowa_rek_wioski[$wioska['id']]['r_wood'] = floor($wioska_info['r_wood']);
		$masowa_rek_wioski[$wioska['id']]['r_stone'] = floor($wioska_info['r_stone']);
		$masowa_rek_wioski[$wioska['id']]['r_iron'] = floor($wioska_info['r_iron']);
		$masowa_rek_wioski[$wioska['id']]['id'] = $wioska['id'];
		$masowa_rek_wioski[$wioska['id']]['x'] = $wioska['x'];
		$masowa_rek_wioski[$wioska['id']]['y'] = $wioska['y'];
		$masowa_rek_wioski[$wioska['id']]['name'] = $wioska['name'];
		$masowa_rek_wioski[$wioska['id']]['continent'] = $wioska['continent'];
		$masowa_rek_wioski[$wioska['id']]['bonus'] = $wioska_info['bonus'];
		$masowa_rek_wioski[$wioska['id']]['budynki'] = array('barracks' => $wioska_info['barracks'],'smith' => $wioska_info['smith'],'stable' => $wioska_info['stable'],'garage' => $wioska_info['garage']);
		foreach ($jednostki as $key => $info) {
			$masowa_rek_wioski[$wioska['id']]['tech_'.$key] = $wioska_info[$key.'_tec_level'];
			$masowa_rek_wioski[$wioska['id']][$key] = $wioska_info_army[$key];
			}
		}
		
	$tpl->assign('is_train_mass_succes',false);
		
	if ($_GET['action'] === 'train_mass' && count($_POST) > 0) { 
		foreach($masowa_rek_wioski as $pv) {
			foreach($jednostki AS $key => $jednostka) {
				$post_value = (int)$_POST['units'][$pv['id']][$key];
				if ($post_value < 0) {
					$post_value = 0;
					}
				$post_value = floor($post_value);
			
				//// Cálculo de todos os custos de unidades selecionadas para recrutamento ////////
			
				$koszt[$jednostka['nazwa_php']]['kamienie'] = $jednostka['koszt_stone'] * $post_value;
				$koszt[$jednostka['nazwa_php']]['drewno'] = $jednostka['koszt_wood'] * $post_value;
				$koszt[$jednostka['nazwa_php']]['ruda'] = $jednostka['koszt_iron'] * $post_value;
				$koszt[$jednostka['nazwa_php']]['bh'] = $jednostka['koszt_bh'] * $post_value;
		
				$koszty_razem[$pv['id']]['kamienie'] += $koszt[$jednostka['nazwa_php']]['kamienie'];
				$koszty_razem[$pv['id']]['drewno'] += $koszt[$jednostka['nazwa_php']]['drewno'];
				$koszty_razem[$pv['id']]['ruda'] += $koszt[$jednostka['nazwa_php']]['ruda'];
				$koszty_razem[$pv['id']]['bh'] += $koszt[$jednostka['nazwa_php']]['bh'];
				}
			
			if($koszty_razem[$pv['id']]['kamienie'] >  $pv['r_stone'] || $koszty_razem[$pv['id']]['drewno'] > $pv['r_wood'] || $koszty_razem[$pv['id']]['ruda'] > $pv['r_iron'] || $koszty_razem[$pv['id']]['bh'] > $pv['wolni_osadnicy']) {
				} else {
				foreach ($jednostki AS $key => $jednostka) {
					$post_value = (int)$_POST['units'][$pv['id']][$key];
					if ($post_value < 0) {
						$post_value = 0;
						}
					$post_value = floor($post_value);
					$rec_succes[$pv['id']][$key] = $post_value;
				
					if ($post_value > 0) {	
						////////// pegue as recursos do assentamento e inicie a unidade de treinamento /////
						$budynek_stage = $pv['budynki'][$jednostka['rekrutuj_w']];
						$cl_units->recruit_units($key,$post_value,$jednostka['rekrutuj_w'],$budynek_stage,$pv['id']);	
						}					
					}
				$cl_units->odejmij_surowce($pv['id'],$koszty_razem[$pv['id']]['kamienie'],$koszty_razem[$pv['id']]['drewno'],$koszty_razem[$pv['id']]['ruda'],$koszty_razem[$pv['id']]['bh']);
				}			
			}

		$tpl->assign('rec_succes',$rec_succes);
		$tpl->assign('is_train_mass_succes',true);
		}
		
	$tpl->assign('cl_units',$cl_units);
	$tpl->assign('units',$jednostki);
	$tpl->assign('masowa_rek_wioski',$masowa_rek_wioski);
	} else {
	$recruits_in_builds = array('barracks','stable','garage');
	
	foreach ($recruits_in_builds as $build_name) {
		$jednostki_w_budynku = $cl_units->get_recruit_in_units($build_name);
		foreach ($jednostki_w_budynku as $dbname => $jname) {
			$builds_units[$build_name][$jname] = $dbname;
			$units_in_village[$dbname] = sql("SELECT `$dbname` FROM `unit_place` WHERE `villages_to_id` = '".$village['id']."' AND `villages_from_id` = '".$village['id']."'",'array');
			$units_all[$dbname] = $village['all_'.$dbname];
			$counter_unit++;
			}
		}
		
	if ($_GET['action'] === 'train' && isset($_POST['sub'])) {
		if ($_GET['h'] == $session['hkey']) {
			
			foreach ($recruits_in_builds as $build_name) {
				foreach ($builds_units[$build_name] as $jname => $dbname) {
					$_POST[$dbname] = (int)$_POST[$dbname];
					if ($_POST[$dbname] < 0) {
						$_POST[$dbname] = 0;
						}
					
					$_POST[$dbname] = floor($_POST[$dbname]);
				
					$costs['wood'] += $cl_units->get_woodprice($dbname) * $_POST[$dbname];
					$costs['stone'] += $cl_units->get_stoneprice($dbname) * $_POST[$dbname];
					$costs['iron'] += $cl_units->get_ironprice($dbname) * $_POST[$dbname];
					$costs['bh'] += $cl_units->get_bhprice($dbname) * $_POST[$dbname];
					}
				}
			
			if ($costs['bh'] > ($maxfarm - $village['r_bh'])) {
				$error = 'Para um lugar no quintal para treinar unidades.';
				} else {
				if ($costs['wood'] > $village['r_wood'] || $costs['stone'] > $village['r_stone'] || $costs['iron'] > $village['r_iron']) {
					$error = 'Você tem a quantidade de recursos para uma pequena quantidade de.';
					} else {
					foreach ($recruits_in_builds as $build_name) {
						foreach ($builds_units[$build_name] as $jname => $dbname) {
							if ($_POST[$dbname] > 0) {
								$cl_units->recruit_units($dbname,$_POST[$dbname],$build_name,$village[$build_name],$village['id']);
								}
							}
						}
					$cl_units->odejmij_surowce($village['id'],$costs['stone'],$costs['wood'],$costs['iron'],$costs['bh']);
					
					header('location: game.php?village='.$village['id'].'&screen=train&mode=train');
					exit;
					}
				}
			} else {
			$error = 'Vai executar ação.';
			}
		}
		
	if ($_GET['action'] === 'cancel') {
		if ($_GET['h'] == $session['hkey']) {
			$_GET['id'] = (int)$_GET['id'];
			$counter = sql("SELECT COUNT(id) FROM `recruit` WHERE `id` = '".$_GET['id']."' AND `villageid` = '".$village['id']."' LIMIT 1",'array');
			if ($counter > 0) {
				$info_trenowaniu = sql("SELECT num_unit,num_finished,building,unit,time_finished,time_start FROM `recruit` WHERE `id` = '".$_GET['id']."'",'assoc');
				$jednostki_poz = $info_trenowaniu['num_unit'] - floor($info_trenowaniu['num_finished']);
				$do_oddania['wood'] = floor($jednostki_poz * $cl_units->get_woodprice($info_trenowaniu['unit']) * 0.9);
				$do_oddania['stone'] = floor($jednostki_poz * $cl_units->get_stoneprice($info_trenowaniu['unit']) * 0.9);
				$do_oddania['iron'] = floor($jednostki_poz * $cl_units->get_ironprice($info_trenowaniu['unit']) * 0.9);
				$do_oddania['bh'] = $jednostki_poz * $cl_units->get_bhprice($info_trenowaniu['unit']);
				mysql_query("UPDATE `villages` SET `r_stone` = `r_stone` + '".$do_oddania['stone']."' WHERE `id` = '".$village['id']."'");
				mysql_query("UPDATE `villages` SET `r_wood` = `r_wood` + '".$do_oddania['wood']."' WHERE `id` = '".$village['id']."'");
				mysql_query("UPDATE `villages` SET `r_iron` = `r_iron` + '".$do_oddania['iron']."' WHERE `id` = '".$village['id']."'");
				mysql_query("UPDATE `villages` SET `r_bh` = `r_bh` - '".$do_oddania['bh']."' WHERE `id` = '".$village['id']."'");
				mysql_query("DELETE FROM `recruit` WHERE `id` = '".$_GET['id']."'");
				$cts = $info_trenowaniu['time_finished'] - date("U");
				mysql_query("UPDATE `recruit` SET `time_finished` = `time_finished` - '".$cts."' , `time_start` = `time_start` - '".$cts."' WHERE `villageid` = '".$village['id']."' AND `id` > '".$_GET['id']."' AND `building` = '".$info_trenowaniu['building']."'");
				header('location: game.php?village='.$village['id'].'&screen=train&mode=train');
				exit;
				} else {
				$error = 'Não existe tal ordem';
				}
			} else {
			$error = 'Estará realizando ações.';
			}
		}
		
	foreach ($recruits_in_builds as $build_name) {
		$counter = 0;
		$trening_query = mysql_query("SELECT time_finished,unit,num_finished,time_per_unit,id,num_unit,time_start FROM `recruit` WHERE `villageid` = '".$village['id']."' AND `building` = '".$build_name."' ORDER BY time_finished");
		while($trenowanie = mysql_fetch_assoc($trening_query)) {
			if ($counter == 0) {
				$trenowanie_jed[$build_name][$trenowanie['id']]['lit'] = true;
				if ($trenowanie['time_per_unit'] > 10) {
					$first_unit[$build_name]['is'] = true;
					$first_unit[$build_name]['unitname'] = $cl_units->get_name($trenowanie['unit']);
					$first_unit[$build_name]['time_to_train'] = floor((date("U") - $trenowanie['time_start']) - ($trenowanie['time_per_unit'] * ($trenowanie['num_finished'] + 1))) * -1;
					if ($first_unit[$build_name]['time_to_train'] < 0) {
						$first_unit[$build_name]['is'] = false;
						}
					} else {
					$first_unit[$build_name]['is'] = false;
					}
				} else {
				$trenowanie_jed[$build_name][$trenowanie['id']]['lit'] = false;
				}
			$trenowanie_jed[$build_name][$trenowanie['id']]['num_unit'] = $trenowanie['num_unit'] - floor($trenowanie['num_finished']);
			$trenowanie_jed[$build_name][$trenowanie['id']]['unit'] = $trenowanie['unit'];
			$trenowanie_jed[$build_name][$trenowanie['id']]['time_finished'] = $trenowanie['time_finished'];
			if ($counter == 0) {
				$trenowanie_jed[$build_name][$trenowanie['id']]['countdown'] = $trenowanie['time_finished'] - date("U");
				} else {
				$trenowanie_jed[$build_name][$trenowanie['id']]['countdown'] = $trenowanie['time_finished'] - $trenowanie['time_start'];
				}
			$counter += 1;
			}
		}
		
	$tpl->assign('cl_units',$cl_units);
	$tpl->assign('buildings',$recruits_in_builds);
	$tpl->assign('build_units',$builds_units);
	$tpl->assign('units_in_village',$units_in_village);
	$tpl->assign('units_all',$units_all);
	$tpl->assign('error',$error);
	$tpl->assign('counter_unit',$counter_unit);
	$tpl->assign('recruiting',$trenowanie_jed);
	$tpl->assign('first_unit',$first_unit);
	}
	
$tpl->assign('user_mode',$_GET['mode']);
?>