<?php 
$modes = array('Construir' => 'build');
$disp_modes = false;

if ($village['main'] >= 15 && $config['destroy_mode_main'] === true) {
	$modes['Demolir'] = 'destroy';
	$disp_modes = true;
	}

if (!in_array($_GET['mode'],$modes)) {
	$_GET['mode'] = 'build';
	}

if ($_GET['mode'] === 'build') {
	$sql_build = mysql_query("SELECT `id`,`building`,`end_time`,`build_time` FROM `build` WHERE `villageid` = '".$village['id']."' ORDER BY `id`");

	$counts_build = 0;

	while ($arr_build = mysql_fetch_assoc($sql_build)) {
		$counts_do_build[$arr_build['building']]++;
	
		$do_build[$counts_build]['r_id'] = $arr_build['id'];
		$do_build[$counts_build]['build'] = $arr_build['building'];
		$do_build[$counts_build]['stage'] = $village[$arr_build['building']] + $counts_do_build[$arr_build['building']];
		if ($counts_build == 0) {
			$do_build[$counts_build]['dauer'] = $arr_build['end_time'] - date("U");
			} else {
			$do_build[$counts_build]['dauer'] = $arr_build['build_time'];
			}
		
		$do_build[$counts_build]['finished'] = $arr_build['end_time'];
	
		$counts_build++;
		}
		
	$sql_destory = mysql_query("SELECT id,build,end_time,trwanie FROM `destory` WHERE `villageid` = '".$village['id']."' ORDER BY `id`");

	$counts_destory = 0;

	while ($arr_destory = mysql_fetch_assoc($sql_destory)) {
		$counts_do_destory[$arr_destory['build']]++;
	
		$do_destory[$counts_destory]['r_id'] = $arr_destory['id'];
		$do_destory[$counts_destory]['build'] = $arr_destory['build'];
		if ($counts_destory == 0) {
			$do_destory[$counts_destory]['dauer'] = $arr_destory['end_time'] - date("U");
			} else {
			$do_destory[$counts_destory]['dauer'] = $arr_destory['trwanie'];
			}
		
		$do_destory[$counts_destory]['finished'] = $arr_destory['end_time'];
	
		$counts_destory++;
		}
	
	if ($_GET['action'] === 'cancel' && isset($_GET['id'])) {
		if ($_GET['h'] == $session['hkey']) {
			$_GET['id'] = (int)$_GET['id'];
			$counter = sql("SELECT COUNT(id) FROM `build` WHERE `id` = '".$_GET['id']."' AND `villageid` = '".$village['id']."' LIMIT 1",'array');
			if ($counter > 0) {
				$build_info = sql("SELECT building,build_time,end_time FROM `build` WHERE `id` = '".$_GET['id']."'","assoc");
				$last_do_build = sql("SELECT COUNT(id) FROM `build` WHERE `villageid` = '".$village['id']."' AND `building` = '".$build_info['building']."' AND `id` < '".$_GET['id']."'",'array');
			 
				$level_to_build = $last_do_build + $village[$build_info['building']] + 1;
			
				$do_zwrotu['wood'] = $cl_builds->get_wood($build_info['building'],$level_to_build);
				$do_zwrotu['stone'] = $cl_builds->get_stone($build_info['building'],$level_to_build);
				$do_zwrotu['iron'] = $cl_builds->get_iron($build_info['building'],$level_to_build);
				$do_zwrotu['bh'] = $cl_builds->get_bh($build_info['building'],$level_to_build);
			
				mysql_query("UPDATE `villages` SET `r_stone` = `r_stone` + '".$do_zwrotu['stone']."' WHERE `id` = '".$village['id']."'");
				mysql_query("UPDATE `villages` SET `r_wood` = `r_wood` + '".$do_zwrotu['wood']."' WHERE `id` = '".$village['id']."'");
				mysql_query("UPDATE `villages` SET `r_iron` = `r_iron` + '".$do_zwrotu['iron']."' WHERE `id` = '".$village['id']."'");
				mysql_query("UPDATE `villages` SET `r_bh` = `r_bh` - '".$do_zwrotu['bh']."' WHERE `id` = '".$village['id']."'");
			
				mysql_query("DELETE FROM `build` WHERE `id` = '".$_GET['id']."'");
				mysql_query("DELETE FROM `events` WHERE `event_id` = '".$_GET['id']."' AND `event_type` = 'build'");
			
				$CzasPoz = $build_info['end_time'] - date("U");
				mysql_query("UPDATE `build` SET `end_time` = `end_time` - '".$CzasPoz."' WHERE `villageid` = '".$village['id']."' AND `id` > '".$_GET['id']."'");
			
				header('location: game.php?village='.$village['id'].'&screen=main');
				exit;
				} else {
				$error = 'Não existe tal ordem';
				}
			} else {
			$error = 'Estará realizando ações.';
			}
		}
	
	foreach ($cl_builds->get_array("dbname") as $dbname) {
		$village_builds[$dbname] = $village[$dbname];
		}
		
	if ($_GET['action'] === 'cancel_dest' && isset($_GET['id'])) {
		if ($_GET['h'] == $session['hkey']) {
			$_GET['id'] = (int)$_GET['id'];
			$counter = sql("SELECT COUNT(id) FROM `destory` WHERE `id` = '".$_GET['id']."' AND `villageid` = '".$village['id']."' LIMIT 1",'array');
			if ($counter > 0) {
				$build_info = sql("SELECT build,trwanie,end_time FROM `destory` WHERE `id` = '".$_GET['id']."'","assoc");
				$last_do_build = sql("SELECT COUNT(id) FROM `destory` WHERE `villageid` = '".$village['id']."' AND `build` = '".$build_info['building']."' AND `id` < '".$_GET['id']."'",'array');
			
				mysql_query("DELETE FROM `destory` WHERE `id` = '".$_GET['id']."'");
				mysql_query("DELETE FROM `events` WHERE `event_id` = '".$_GET['id']."' AND `event_type` = 'destory'");
			
				$CzasPoz = $build_info['end_time'] - date("U");
				mysql_query("UPDATE `destory` SET `end_time` = `end_time` - '".$CzasPoz."' WHERE `villageid` = '".$village['id']."' AND `id` > '".$_GET['id']."'");
			
				header('location: game.php?village='.$village['id'].'&screen=main&mode=build');
				exit;
				} else {
				$error = 'Não existe tal ordem';
				}
			} else {
			$error = 'Estará realizando ações.';
			}
		}
		
	$sum_builds_village = 0;
	$sum_builds = array_sum($cl_builds->max_stage);
	
	foreach ($cl_builds->get_array("dbname") as $dbname) {
		if (czy_spelniono_wymagania($cl_builds->get_needed_by_dbname($dbname),$village_builds) || $village_builds[$dbname] > 0) {
			$fulfilled_builds[] = $dbname;
			$build_village[$dbname] = $village_builds[$dbname] + $counts_do_build[$dbname];
		
			$koszty_bud['wood'] = $cl_builds->get_wood($dbname,$build_village[$dbname] + 1);
			$koszty_bud['stone'] = $cl_builds->get_stone($dbname,$build_village[$dbname] + 1);
			$koszty_bud['iron'] = $cl_builds->get_iron($dbname,$build_village[$dbname] + 1);
		
			$koszty_bud['bh'] = $cl_builds->get_bh($dbname,$build_village[$dbname] + 1);
			
			$plus_points[$dbname] = $cl_builds->get_points_stage($dbname,$build_village[$dbname] + 1);
		
			if ($counts_build > 4) {
				$dodatkowe_koszty_budowy = ($cl_builds->get_buildsharpens_costs($counts_build) / 100) + 1;
				$koszty_all_bud['wood'] = $cl_builds->get_wood($dbname,$build_village[$dbname] + 1) * $dodatkowe_koszty_budowy;
				$koszty_all_bud['stone'] = $cl_builds->get_stone($dbname,$build_village[$dbname] + 1) * $dodatkowe_koszty_budowy;
				$koszty_all_bud['iron'] = $cl_builds->get_iron($dbname,$build_village[$dbname] + 1) * $dodatkowe_koszty_budowy;
				} else {
				$koszty_all_bud['wood'] = $cl_builds->get_wood($dbname,$build_village[$dbname] + 1);
				$koszty_all_bud['stone'] = $cl_builds->get_stone($dbname,$build_village[$dbname] + 1);
				$koszty_all_bud['iron'] = $cl_builds->get_iron($dbname,$build_village[$dbname] + 1);
				}
				
			if ($koszty_all_bud['wood'] > $maxmag || $koszty_all_bud['stone'] > $maxmag || $koszty_all_bud['iron'] > $maxmag) {
				$can_build[$dbname] = 'not_enough_storage';
				} else {
				if ($village['r_wood'] >= $koszty_bud['wood'] && $village['r_stone'] >= $koszty_bud['stone'] && $village['r_iron'] >= $koszty_bud['iron']) {
					if ($village['r_wood'] >= $koszty_all_bud['wood'] && $village['r_stone'] >= $koszty_all_bud['stone'] && $village['r_iron'] >= $koszty_all_bud['iron']) {
						if (czy_spelniono_wymagania($cl_builds->get_needed_by_dbname($dbname),$village_builds)) {
							if (($maxfarm - $village['r_bh']) >= $koszty_bud['bh']) {
								$can_build[$dbname] = '';
								} else {
								$can_build[$dbname] = 'not_enough_bh';
								}
							} else {
							$can_build[$dbname] = 'not_fulfilled';
							}
						} else {
						$can_build[$dbname] = 'not_enough_ress_plus';
						}
					} else {
					$can_build[$dbname] = 'not_enough_ress';
			
					$czekanie['drewno'] = (($koszty_bud['wood'] - $village['r_wood']) / $r_wood_comma) * 3600;
					$czekanie['cegly'] = (($koszty_bud['stone'] - $village['r_stone']) / $r_stone_comma) * 3600;
					$czekanie['zelezo'] = (($koszty_bud['iron'] - $village['r_iron']) / $r_iron_comma) * 3600;
			
					$res_timer[$dbname] = format_time(floor(max($czekanie)));
					}
				}
			}
				
		if (czy_spelniono_wymagania($cl_builds->get_needed_by_dbname($dbname),$village_builds)) {
			$fulfilled_builds_one[] = $dbname;
			}
			
		$sum_builds_village += $village[$dbname];
		}
		
	$village_build_process = floor(($sum_builds_village / $sum_builds) * 100);
		
	if ($_GET['action'] === 'build' && count($_POST) > 0) {
		if (in_array($_POST['id'],$cl_builds->get_array("dbname"))) {
			if (in_array($_POST['id'],$fulfilled_builds_one)) {
				$_NXT_BUILD_LEV = $build_village[$_POST['id']] + 1;
				if ($_NXT_BUILD_LEV > $cl_builds->get_maxstage($_POST['id'])) {
					$error = 'O nível máximo de expansão está à frente.';
					} else {
					$koszty_normal['wood'] = $cl_builds->get_wood($_POST['id'],$_NXT_BUILD_LEV);
					$koszty_normal['stone'] = $cl_builds->get_stone($_POST['id'],$_NXT_BUILD_LEV);
					$koszty_normal['iron'] = $cl_builds->get_iron($_POST['id'],$_NXT_BUILD_LEV);
					$koszty_normal['bh'] = $cl_builds->get_bh($_POST['id'],$_NXT_BUILD_LEV);
				
					if ($counts_build > 2) {
						$dodatkowe_koszty_budowy = ($cl_builds->get_buildsharpens_costs($counts_build) / 100) + 1;
						$koszty_all['wood'] = $cl_builds->get_wood($_POST['id'],$_NXT_BUILD_LEV) * $dodatkowe_koszty_budowy;
						$koszty_all['stone'] = $cl_builds->get_stone($_POST['id'],$_NXT_BUILD_LEV) * $dodatkowe_koszty_budowy;
						$koszty_all['iron'] = $cl_builds->get_iron($_POST['id'],$_NXT_BUILD_LEV) * $dodatkowe_koszty_budowy;
						} else {
						$koszty_all['wood'] = $cl_builds->get_wood($_POST['id'],$_NXT_BUILD_LEV);
						$koszty_all['stone'] = $cl_builds->get_stone($_POST['id'],$_NXT_BUILD_LEV);
						$koszty_all['iron'] = $cl_builds->get_iron($_POST['id'],$_NXT_BUILD_LEV);
						}
					
					$koszty_all['bh'] = $koszty_normal['bh'];
					
					if ($village['r_wood'] >= $koszty_normal['wood'] && $village['r_stone'] >= $koszty_normal['stone'] && $village['r_iron'] >= $koszty_normal['iron']) {
						if (($maxfarm - $village['r_bh']) >= $koszty_normal['bh']) {
							if ($village['r_wood'] >= $koszty_all['wood'] && $village['r_stone'] >= $koszty_all['stone'] && $village['r_iron'] >= $koszty_all['iron']) {
								$cl_units->odejmij_surowce($village['id'],$koszty_all['stone'],$koszty_all['wood'],$koszty_all['iron'],$koszty_all['bh']);
							
								$czas = $cl_builds->get_time($village['main'],$_POST['id'],$_NXT_BUILD_LEV);
							
								if ($counts_build > 0) {
									$last_build_end = sql("SELECT `end_time` FROM `build` WHERE `villageid` = '".$village['id']."' ORDER BY `end_time` DESC LIMIT 1",'array');
									$END_BUILD_T = $last_build_end + $czas;
									mysql_query("INSERT INTO build(building,end_time,build_time,villageid) VALUES ('".$_POST['id']."','$END_BUILD_T','$czas','".$village['id']."')");
									} else {
									$END_BUILD_T = date("U") + $czas;
									mysql_query("INSERT INTO build(building,end_time,build_time,villageid) VALUES ('".$_POST['id']."','$END_BUILD_T','$czas','".$village['id']."')");
									}
								
								$LAST_ID = sql("SELECT `id` FROM `build` WHERE `villageid` = '".$village['id']."' ORDER BY `id` DESC LIMIT 1",'array');
								mysql_query("INSERT INTO events(event_time,event_type,event_id,user_id,villageid) VALUES('$END_BUILD_T','build','$LAST_ID','".$user['id']."','".$village['id']."')");
							
								header('location: game.php?village='.$village['id'].'&screen=main&mode=build#budowanie');
								exit;
								} else {
								$error = 'Para uma pequena matéria -prima para adicionar à fila de construção.';
								}
							} else {
							$error = 'Você tem espaço no quintal.';
							}
						} else {
						$error = 'Você tem a quantidade de recursos para uma pequena quantidade de';
						}
					}
				} else {
				$error = 'Não era necessário exigir este edifício.';
				}
			} else {
			$error = 'Não existe tal edifício.';
			}
		}
	
	if ($_GET['action'] === 'change_name' && count($_POST) > 0) {
		if ($_GET['h'] == $session['hkey']) {
			$parsed_name = $_POST['name'];
		
			if (strlen($parsed_name) > 2) {
				if (strlen($parsed_name) > 40) {
					$error = 'Nazwa wioski mo�e sk�ada� si� z maksymalnie 40 znak�w.';
					} else {
					if (substr_count($parsed_name," ") == strlen($parsed_name)) {
						$error = 'Nazwa wioski nie mo�e sk�ada� si� z samych spacji.';
						} else {
						mysql_query("UPDATE `villages` SET `name` = '".parse($parsed_name)."' WHERE `id` = '". $village['id']."'");
				
						header('location: game.php?village='.$village['id'].'&screen=main&mode=build');
						exit;
						}
					}
				} else {
				$error = 'O nome da aldeia deve fazer pelo menos 3 marcações.';
				}
			} else {
			$error = 'Vai executar ação.';
			}
		}
	$tpl->assign('num_do_build',$counts_build);
	$tpl->assign('time',date("U"));
	$tpl->assign('do_build',$do_build);
	$tpl->assign('do_destory',$do_destory);
	$tpl->assign('num_do_destory',$counts_destory);
	$tpl->assign('fulfilled_builds',$fulfilled_builds);
	$tpl->assign('build_village',$build_village);
	$tpl->assign('error',$error);
	$tpl->assign('res_timer',$res_timer);
	$tpl->assign('can_build',$can_build);
	$tpl->assign('plus_points',$plus_points);
	$tpl->assign('village_build_process',$village_build_process);
	}
	
if ($_GET['mode'] === 'destroy') {
	$sql_destory = mysql_query("SELECT id,build,end_time,trwanie FROM `destory` WHERE `villageid` = '".$village['id']."' ORDER BY `id`");

	$counts_destory = 0;

	while ($arr_destory = mysql_fetch_assoc($sql_destory)) {
		$counts_do_destory[$arr_destory['build']]++;
	
		$do_destory[$counts_destory]['r_id'] = $arr_destory['id'];
		$do_destory[$counts_destory]['build'] = $arr_destory['build'];
		if ($counts_destory == 0) {
			$do_destory[$counts_destory]['dauer'] = $arr_destory['end_time'] - date("U");
			} else {
			$do_destory[$counts_destory]['dauer'] = $arr_destory['trwanie'];
			}
		
		$do_destory[$counts_destory]['finished'] = $arr_destory['end_time'];
	
		$counts_destory++;
		}
		
	$counts_build = 0;
	
	$sql_build = mysql_query("SELECT `id`,`building`,`end_time`,`build_time` FROM `build` WHERE `villageid` = '".$village['id']."' ORDER BY `id`");

	while ($arr_build = mysql_fetch_assoc($sql_build)) {
		$counts_do_build[$arr_build['building']]++;
	
		$do_build[$counts_build]['r_id'] = $arr_build['id'];
		$do_build[$counts_build]['build'] = $arr_build['building'];
		$do_build[$counts_build]['stage'] = $village[$arr_build['building']] + $counts_do_build[$arr_build['building']];
		if ($counts_build == 0) {
			$do_build[$counts_build]['dauer'] = $arr_build['end_time'] - date("U");
			} else {
			$do_build[$counts_build]['dauer'] = $arr_build['build_time'];
			}
		
		$do_build[$counts_build]['finished'] = $arr_build['end_time'];
	
		$counts_build++;
		}
		
	if ($_GET['action'] === 'cancel' && isset($_GET['id'])) {
		if ($_GET['h'] == $session['hkey']) {
			$_GET['id'] = (int)$_GET['id'];
			$counter = sql("SELECT COUNT(id) FROM `build` WHERE `id` = '".$_GET['id']."' AND `villageid` = '".$village['id']."' LIMIT 1",'array');
			if ($counter > 0) {
				$build_info = sql("SELECT building,build_time,end_time FROM `build` WHERE `id` = '".$_GET['id']."'","assoc");
				$last_do_build = sql("SELECT COUNT(id) FROM `build` WHERE `villageid` = '".$village['id']."' AND `building` = '".$build_info['building']."' AND `id` < '".$_GET['id']."'",'array');
			 
				$level_to_build = $last_do_build + $village[$build_info['building']] + 1;
			
				$do_zwrotu['wood'] = $cl_builds->get_wood($build_info['building'],$level_to_build);
				$do_zwrotu['stone'] = $cl_builds->get_stone($build_info['building'],$level_to_build);
				$do_zwrotu['iron'] = $cl_builds->get_iron($build_info['building'],$level_to_build);
				$do_zwrotu['bh'] = $cl_builds->get_bh($build_info['building'],$level_to_build);
			
				mysql_query("UPDATE `villages` SET `r_stone` = `r_stone` + '".$do_zwrotu['stone']."' WHERE `id` = '".$village['id']."'");
				mysql_query("UPDATE `villages` SET `r_wood` = `r_wood` + '".$do_zwrotu['wood']."' WHERE `id` = '".$village['id']."'");
				mysql_query("UPDATE `villages` SET `r_iron` = `r_iron` + '".$do_zwrotu['iron']."' WHERE `id` = '".$village['id']."'");
				mysql_query("UPDATE `villages` SET `r_bh` = `r_bh` - '".$do_zwrotu['bh']."' WHERE `id` = '".$village['id']."'");
			
				mysql_query("DELETE FROM `build` WHERE `id` = '".$_GET['id']."'");
				mysql_query("DELETE FROM `events` WHERE `event_id` = '".$_GET['id']."' AND `event_type` = 'build'");
			
				$CzasPoz = $build_info['end_time'] - date("U");
				mysql_query("UPDATE `build` SET `end_time` = `end_time` - '".$CzasPoz."' WHERE `villageid` = '".$village['id']."' AND `id` > '".$_GET['id']."'");
			
				header('location: game.php?village='.$village['id'].'&screen=main&mode=destroy');
				exit;
				} else {
				$error = 'Não existe tal ordem';
				}
			} else {
			$error = 'Vai executar ação.';
			}
		}
		
	$sum_builds_village = 0;
	$sum_builds = array_sum($cl_builds->max_stage);
		
	foreach ($cl_builds->get_array("dbname") as $dbname) {
		if ($village[$dbname] > 0) {
			$village_builds[$dbname] = $village[$dbname];
			$village_builds_do_destory[$dbname] = $village[$dbname] - $counts_do_destory[$dbname];
			$fulfilled_builds[] = $dbname;
			}
		$sum_builds_village += $village[$dbname];
		}
		
	$village_build_process = floor(($sum_builds_village / $sum_builds) * 100);
		
	if ($_GET['action'] === 'cancel_dest' && isset($_GET['id'])) {
		if ($_GET['h'] == $session['hkey']) {
			$_GET['id'] = (int)$_GET['id'];
			$counter = sql("SELECT COUNT(id) FROM `destory` WHERE `id` = '".$_GET['id']."' AND `villageid` = '".$village['id']."' LIMIT 1",'array');
			if ($counter > 0) {
				$build_info = sql("SELECT build,trwanie,end_time FROM `destory` WHERE `id` = '".$_GET['id']."'","assoc");
				$last_do_build = sql("SELECT COUNT(id) FROM `destory` WHERE `villageid` = '".$village['id']."' AND `build` = '".$build_info['building']."' AND `id` < '".$_GET['id']."'",'array');
			
				mysql_query("DELETE FROM `destory` WHERE `id` = '".$_GET['id']."'");
				mysql_query("DELETE FROM `events` WHERE `event_id` = '".$_GET['id']."' AND `event_type` = 'destory'");
			
				$CzasPoz = $build_info['end_time'] - date("U");
				mysql_query("UPDATE `destory` SET `end_time` = `end_time` - '".$CzasPoz."' WHERE `villageid` = '".$village['id']."' AND `id` > '".$_GET['id']."'");
			
				header('location: game.php?village='.$village['id'].'&screen=main&mode=destroy');
				exit;
				} else {
				$error = 'Não existe tal ordem';
				}
			} else {
			$error = 'Estará realizando ações.';
			}
		}
		
	if ($_GET['action'] === 'destroy' && count($_POST) > 0) {
		if ($_GET['h'] == $session['hkey']) {
			if (in_array($_POST['id'],$cl_builds->get_array("dbname"))) {
				if (in_array($_POST['id'],$fulfilled_builds)) {
					$_PREV_BUILD_LEV = $village_builds[$_POST['id']] - $counts_do_destory[$_POST['id']];
					if ($_PREV_BUILD_LEV <= 0) {
						$error = 'Não pode destruir este edifício.';
						} else {
						if (in_array($_POST['id'],$arr_builds_starts_by_one) && $_PREV_BUILD_LEV <= 1) {
							$error = 'Este edifício não pode ser destruído.';
							} else {
							if ($counts_do_build[$_POST['id']] > 0) {
								$error = 'O edifício já está sendo expandido.';
								} else {
								$czas = $cl_builds->get_time($village['main'],$_POST['id'],$_PREV_BUILD_LEV);
								
								if ($counts_destory > 0) {
									$last_build_end = sql("SELECT `end_time` FROM `destory` WHERE `villageid` = '".$village['id']."' ORDER BY `end_time` DESC LIMIT 1",'array');
									$END_BUILD_T = $last_build_end + $czas;
									mysql_query("INSERT INTO destory(build,end_time,trwanie,villageid) VALUES ('".$_POST['id']."','$END_BUILD_T','$czas','".$village['id']."')");
									} else {
									$END_BUILD_T = date("U") + $czas;
									mysql_query("INSERT INTO destory(build,end_time,trwanie,villageid) VALUES ('".$_POST['id']."','$END_BUILD_T','$czas','".$village['id']."')");
									}
									
								$LAST_ID = sql("SELECT `id` FROM `destory` WHERE `villageid` = '".$village['id']."' ORDER BY `id` DESC LIMIT 1",'array');
								mysql_query("INSERT INTO events(event_time,event_type,event_id,user_id,villageid) VALUES('$END_BUILD_T','destory','$LAST_ID','".$user['id']."','".$village['id']."')");
								
								header('location: game.php?village='.$village['id'].'&screen=main&mode=destroy');
								exit; 
								}
							}
						}
					} else {
					$error = 'Não era necessário exigir este edifício.';
					}
				} else {
				$error = 'Não existe esse edifício.';
				}
			} else {
			$error = 'Estará realizando ações.';
			}
		}
		
	if ($_GET['action'] === 'change_name' && count($_POST) > 0) {
		if ($_GET['h'] == $session['hkey']) {
			$_POST['name'] = cmp_str($_POST['name'],3,40);
			
			if ($_POST['name'] === 'SHORT') {
			$error = 'O nome da aldeia deve fazer pelo menos 3 marcações.';
				}
			elseif ($_POST['name'] === 'LONG') {
				$error = 'O nome da aldeia pode consistir em um máximo de 40 sinais.';
				}
			elseif ($_POST['name'] === 'SPACES') {
				$error = 'O nome da aldeia não pode consistir nos próprios espaços.';
				} else {
				$_POST['name'] = parse($_POST['name']);
				
				mysql_query("UPDATE `villages` SET `name` = '".$_POST['name']."' WHERE `id` = '". $village['id']."'");
				
				header('location: game.php?village='.$village['id'].'&screen=main&mode=destroy');
				exit;
				}
			} else {
			$error = 'Estará realizando ações.';
			}
		}
		
	$tpl->assign('do_destory',$do_destory);
	$tpl->assign('do_build',$do_build);
	$tpl->assign('num_do_destory',$counts_destory);
	$tpl->assign('num_do_build',$counts_build);
	$tpl->assign('fulfilled_builds',$fulfilled_builds);
	$tpl->assign('village_builds_do_destory',$village_builds_do_destory);
	$tpl->assign('village_builds',$village_builds);
	$tpl->assign('error',$error);
	$tpl->assign('counts_do_build',$counts_do_build);
	$tpl->assign('arr_builds_starts_by_one',$arr_builds_starts_by_one);
	$tpl->assign('village_build_process',$village_build_process);
	}
	
$tpl->assign('mode',$_GET['mode']);
$tpl->assign('modes',$modes);
$tpl->assign('display_modes',$disp_modes);
?>