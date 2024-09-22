<?php 

$budynek = $_GET['screen'];
if ($village[$budynek] > 0) {
	$show_build = true;
	
	$jednostki_w_budynku = $cl_units->get_recruit_in_units($budynek);
	
	//Akcja trening jednostek:
	
	if ($_GET['action'] == 'train' && count($_POST) > 0) {
		if ($_GET['h'] == $session['hkey']) {
			
			foreach ($jednostki_w_budynku as $dbname => $name) {
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
			
			if ($costs['bh'] > ($maxfarm - $village['r_bh'])) {
				$error = 'Não há espaço suficiente na fazenda para treinar unidades.';
				} else {
				if ($costs['wood'] > $village['r_wood'] || $costs['stone'] > $village['r_stone'] || $costs['iron'] > $village['r_iron']) {
					$error = 'Sem recursos disponíveis.';
					} else {
					foreach ($jednostki_w_budynku as $dbname => $name) {
						if ($_POST[$dbname] > 0) {
							$cl_units->recruit_units($dbname,$_POST[$dbname],$budynek,$village[$budynek],$village['id']);
							}
						}
					$cl_units->odejmij_surowce($village['id'],$costs['stone'],$costs['wood'],$costs['iron'],$costs['bh']);
					
					header('location: game.php?village='.$village['id'].'&screen='.$budynek);
					exit;
					}
				}
			} else {
			$error = 'Erro de execução da ação.';
			}
		}
	
	//Mo�liwo�� przerwania treningu jednostek:
	
	if ($_GET['action'] == 'cancel') {
		if ($_GET['h'] == $session['hkey']) {
			$_GET['id'] = (int)$_GET['id'];
			$counter = sql("SELECT COUNT(id) FROM `recruit` WHERE `id` = '".$_GET['id']."' AND `villageid` = '".$village['id']."' AND `building` = '$budynek' LIMIT 1",'array');
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
				mysql_query("UPDATE `recruit` SET `time_finished` = `time_finished` - '".$cts."' , `time_start` = `time_start` - '".$cts."' WHERE `villageid` = '".$village['id']."' AND `id` > '".$_GET['id']."' AND `building` = '".$budynek."'");
				header('location: game.php?village='.$village['id'].'&screen='.$budynek);
				exit;
				} else {
				$error = 'Não existe tal ordem';
				}
			} else {
			$error = 'Erro de execução da ação.';
			}
		}
	
	//Pobierz kszta�c�ce si� jednostki z bazy danych:
	$counter = 0;
	$trening_query = mysql_query("SELECT time_finished,unit,num_finished,time_per_unit,id,num_unit,time_start FROM `recruit` WHERE `villageid` = '".$village['id']."' AND `building` = '".$budynek."' ORDER BY time_finished");
	while($trenowanie = mysql_fetch_assoc($trening_query)) {
		if ($counter == 0) {
			$trenowanie_w_palacu[$trenowanie['id']]['lit'] = true;
			
			if ($trenowanie['time_per_unit'] > 10) {
				$first_unit['is'] = true;
				$first_unit['unitname'] = $cl_units->get_name($trenowanie['unit']);
				$first_unit['time_to_train'] = floor((date("U") - $trenowanie['time_start']) - ($trenowanie['time_per_unit'] * ($trenowanie['num_finished'] + 1))) * -1;
				if ($first_unit['time_to_train'] < 0) {
					$first_unit['is'] = false;
					}
				} else {
				$first_unit['is'] = false;
				}
			} else {
			$trenowanie_w_palacu[$trenowanie['id']]['lit'] = false;
			}
		$trenowanie_w_palacu[$trenowanie['id']]['num_unit'] = $trenowanie['num_unit'] - floor($trenowanie['num_finished']);
		$trenowanie_w_palacu[$trenowanie['id']]['unit'] = $trenowanie['unit'];
		$trenowanie_w_palacu[$trenowanie['id']]['time_finished'] = $trenowanie['time_finished'];
		if ($counter == 0) {
			$trenowanie_w_palacu[$trenowanie['id']]['countdown'] = $trenowanie['time_finished'] - date("U");
			} else {
			$trenowanie_w_palacu[$trenowanie['id']]['countdown'] = $trenowanie['time_finished'] - $trenowanie['time_start'];
			}
		$counter += 1;
		}
	
	foreach ($jednostki_w_budynku as $dbname => $name) {
		$units_in_village[$dbname] = sql("SELECT `$dbname` FROM `unit_place` WHERE `villages_to_id` = '".$village['id']."' AND `villages_from_id` = '".$village['id']."'",'array');
		$units_all[$dbname] = $village['all_'.$dbname];
		}
		
	$tpl->assign('dbname',$budynek);
	$tpl->assign('cl_units',$cl_units);
	$tpl->assign('first_unit',$first_unit);
	$tpl->assign('recruit_units',$trenowanie_w_palacu);
	$tpl->assign('units',$jednostki_w_budynku);
	$tpl->assign('units_in_village',$units_in_village);
	$tpl->assign('units_all',$units_all);
	$tpl->assign('error',$error);
	} else {
	$show_build = false;
	}
	
$tpl->assign('show_build',$show_build);
?>