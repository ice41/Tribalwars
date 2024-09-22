<?php 
if ($_GET['try'] === 'back' && isset($_GET['unit_id'])) {
	$_GET['screen'] = 'place_units_try_back';
	
	$_GET['unit_id'] = (int)$_GET['unit_id'];
	$_GET['unit_id'] = floor($_GET['unit_id']);
	if ($_GET['unit_id'] < 0) {
		$_GET['unit_id'] = 0;
		}
		
	$wsparcie = sql("SELECT * FROM `unit_place` WHERE `villages_from_id` = '".$village['id']."' AND `villages_to_id` = '".$_GET['unit_id']."'","assoc");
	if (is_array($wsparcie) && $wsparcie['villages_to_id'] != $wsparcie['villages_from_id']) {
		foreach ($cl_units->get_array("dbname") as $unit) {
			$arr_units[$unit] = $wsparcie[$unit];
			}
		} else {
		$error = 'B³¹d wykonania akcji.';
		}
	
	foreach ($cl_units->get_array("dbname") as $unit) {
		if (!is_array($units_columns[$cl_units->get_col($unit)])) {
			$units_columns[$cl_units->get_col($unit)] = array($unit);
			} else {
			$units_columns[$cl_units->get_col($unit)][] = $unit;
			}
		}
		
	$tpl->assign('group_units',$units_columns);
	$tpl->assign('cl_units',$cl_units);
	$tpl->assign('arr_units',$arr_units);
	$tpl->assign('unit_id',$_GET['unit_id']);
	$tpl->assign('error',$error);
	} else {
	if ($_GET['action'] === 'back' && isset($_GET['unit_id']) && count($_POST) > 0) {
		if ($_GET['h'] == $session['hkey']) {
			$_GET['unit_id'] = (int)$_GET['unit_id'];
			$_GET['unit_id'] = floor($_GET['unit_id']);
			if ($_GET['unit_id'] < 0) {
				$_GET['unit_id'] = 0;
				}
			$wsparcie = sql("SELECT * FROM `unit_place` WHERE `villages_from_id` = '".$village['id']."' AND `villages_to_id` = '".$_GET['unit_id']."'","assoc");
			if (is_array($wsparcie) && $wsparcie['villages_to_id'] != $wsparcie['villages_from_id']) {
				//Walidacja post'ów
				foreach ($cl_units->get_array("dbname") as $dbname) {
					$s_units[$dbname] = floor((int)$_POST[$dbname]);
					if ($s_units[$dbname] < 0) {
						$s_units[$dbname] = 0;
						}
					$sum_units_place += $wsparcie[$dbname];
					}
					
				//SprawdŸ, czy podano poprawne dane:
				$errors = 0;
				$sum_units = 0;
				foreach ($cl_units->get_array("dbname") as $dbname) {
					if ($s_units[$dbname] > $wsparcie[$dbname]) {
						$errors++;
						}
					$sum_units += $s_units[$dbname];
					}
					
				if ($errors > 0) {
					$error = 'Podano b³êdn¹ iloœæ jednostek.';
					} else {
					if ($sum_units > 0) {
						if ($sum_units == $sum_units_place) {
							mysql_query("DELETE FROM `unit_place`  WHERE `villages_from_id` = '".$village['id']."' AND `villages_to_id` = '".$_GET['unit_id']."'");
							} else {
							foreach ($cl_units->get_array("dbname") as $dbname) {
								if ($s_units[$dbname] > 0) {
									$array_query[] = "`$dbname` = `$dbname` - '".$s_units[$dbname]."'";
									}
								}
								
							$units_query_back = "UPDATE `unit_place` SET ".implode(' , ',$array_query)." WHERE `villages_from_id` = '".$village['id']."' AND `villages_to_id` = '".$_GET['unit_id']."'";
						
							mysql_query($units_query_back);
							}
						$from_village_coords = sql("SELECT x,y,name,continent FROM `villages` WHERE `id` = '".$_GET['unit_id']."'","assoc");
						
						$times = get_movs_times($s_units,$village['x'],$village['y'],$from_village_coords['x'],$from_village_coords['y']);
						
						send_mov('back',$village['id'],$_GET['unit_id'],$s_units,$times[1],'',false);
						
						$user_toid = sql("SELECT `userid` FROM `villages` WHERE `id` = '".$_GET['unit_id']."'",'array');
						
						if ($user_toid != '-1') {
							$r_title = $user['username'] . ' wycofuje swoje wsparcie z ' . $from_village_coords['name'] .
								' (' . $from_village_coords['x'] . '|' . $from_village_coords['y'] . ') K' . $from_village_coords['continent'];
						
							mysql_query("INSERT INTO reports(
								title,time,type,a_units,to_village,from_village,receiver_userid,in_group
								) VALUES (
								'".$r_title."','".date("U")."','support_back','".implode(';',$s_units)."','".$_GET['unit_id']."','".$village['id']."','".$user_toid."','support'
								)");
							
							mysql_query("UPDATE `users` SET `new_report` = '1' WHERE `id` = '$user_toid'");
							}
						
						header('location: game.php?village='.$village['id'].'&screen=place&mode=units');
						exit;
						} else {
						$error = 'Musisz wys³aæ co najmniej jedn¹ jednostkê.';
						}
					}
				} else {
				$error = 'B³¹d wykonania akcji.';
				}
			} else {
			$error = 'B³¹d wykonywania akcji.';
			}
		}
		
	if ($_GET['action'] === 'all_back' && isset($_GET['unit_id'])) {
		if ($_GET['h'] == $session['hkey']) {
			$_GET['unit_id'] = (int)$_GET['unit_id'];
			$_GET['unit_id'] = floor($_GET['unit_id']);
			if ($_GET['unit_id'] < 0) {
				$_GET['unit_id'] = 0;
				}
			$wsparcie = sql("SELECT * FROM `unit_place` WHERE `villages_from_id` = '".$village['id']."' AND `villages_to_id` = '".$_GET['unit_id']."'","assoc");
			if (is_array($wsparcie) && $wsparcie['villages_to_id'] != $wsparcie['villages_from_id']) {
				foreach ($cl_units->get_array("dbname") as $dbname) {
					$s_units[$dbname] = $wsparcie[$dbname];
					}
					
				mysql_query("DELETE FROM `unit_place`  WHERE `villages_from_id` = '".$village['id']."' AND `villages_to_id` = '".$_GET['unit_id']."'");
				$from_village_coords = sql("SELECT x,y,name,continent FROM `villages` WHERE `id` = '".$_GET['unit_id']."'","assoc");
						
				$times = get_movs_times($s_units,$village['x'],$village['y'],$from_village_coords['x'],$from_village_coords['y']);
						
				send_mov('back',$village['id'],$_GET['unit_id'],$s_units,$times[1],'',false);
						
				$user_toid = sql("SELECT `userid` FROM `villages` WHERE `id` = '".$_GET['unit_id']."'",'array');
						
				if ($user_toid != '-1') {
					$r_title = $user['username'] . ' wycofuje swoje wsparcie z ' . $from_village_coords['name'] .
					' (' . $from_village_coords['x'] . '|' . $from_village_coords['y'] . ') K' . $from_village_coords['continent'];
						
					mysql_query("INSERT INTO reports(
						title,time,type,a_units,to_village,from_village,receiver_userid,in_group
						) VALUES (
						'".$r_title."','".date("U")."','support_back','".implode(';',$s_units)."','".$_GET['unit_id']."','".$village['id']."','".$user_toid."','support'
						)");
							
					mysql_query("UPDATE `users` SET `new_report` = '1' WHERE `id` = '$user_toid'");
					}
						
				header('location: game.php?village='.$village['id'].'&screen=place&mode=units');
				exit;

				} else {
				$error = 'B³¹d wykonania akcji.';
				}
			} else {
			$error = 'B³¹d wykonywania akcji.';
			}
		}
		
	//Wybierz jednostki, które pochodz¹ z aktualnej wioski:
	$this_units = $cl_units->read_units($village['id'],$village['id']);

	//Utwurz tablicê z jednostkami, które stacjonuj¹ w aktualnej wiosce:
	$sql = mysql_query("SELECT * FROM `unit_place` WHERE `villages_to_id` = '".$village['id']."' AND `villages_from_id` != '".$village['id']."'");
	while ($array = mysql_fetch_assoc($sql)) {
		$vcinfo = sql("SELECT name,x,y,continent FROM `villages` WHERE `id` = '".$array['villages_from_id']."'",'assoc');
		$mvunit[$array['villages_from_id']]['x'] = $vcinfo['x'];
		$mvunit[$array['villages_from_id']]['y'] = $vcinfo['y'];
		$mvunit[$array['villages_from_id']]['continent'] = $vcinfo['continent'];
		$mvunit[$array['villages_from_id']]['villagename'] = entparse($vcinfo['name']);
		foreach ($cl_units->get_array("dbname") as $dbname) {
			$mvunit[$array['villages_from_id']][$dbname] = $array[$dbname];
			$all_units[$dbname] += $array[$dbname];
			}
		}
		
	if ($_GET['action'] === 'command_other' && count($_POST) > 0) {
		if ($_GET['h'] == $session['hkey']) {
			foreach ($mvunit as $vid => $values) {
				if (isset($_POST['id_'.$vid])) {
					foreach ($cl_units->get_array("dbname") as $dbname) {
						$s_units[$dbname] = $values[$dbname];
						}
					
					mysql_query("DELETE FROM `unit_place`  WHERE `villages_from_id` = '".$vid."' AND `villages_to_id` = '".$village['id']."'");
					$from_village_coords = sql("SELECT x,y,name,continent FROM `villages` WHERE `id` = '".$vid."'","assoc");
						
					$times = get_movs_times($s_units,$village['x'],$village['y'],$from_village_coords['x'],$from_village_coords['y']);
						
					send_mov('back',$vid,$village['id'],$s_units,$times[1],'',false);
						
					$user_toid = sql("SELECT `userid` FROM `villages` WHERE `id` = '".$vid."'",'array');
						
					if ($user_toid != '-1') {
						$r_title = $user['username'] . ' wycofuje wsparcie z ' . $from_village_coords['name'] .
						' (' . $from_village_coords['x'] . '|' . $from_village_coords['y'] . ') K' . $from_village_coords['continent'];
						
						mysql_query("INSERT INTO reports(
							title,time,type,a_units,to_village,from_village,receiver_userid,in_group
							) VALUES (
							'".$r_title."','".date("U")."','support_back','".implode(';',$s_units)."','".$village['id']."','".$vid."','".$user_toid."','support'
							)");
							
						mysql_query("UPDATE `users` SET `new_report` = '1' WHERE `id` = '$user_toid'");
						}
					}
				}
			header('location: game.php?village='.$village['id'].'&screen=place&mode=units');
			exit;
			} else {
			$error = 'B³¹d wykonywania akcji.';
			}
		}
		
	foreach ($cl_units->get_array("dbname") as $dbname) {
		$all_units[$dbname] += $this_units[$dbname];
		}
		
	//Utwurz tablicê z jednostkami z aktualnej wioski, które stacjonuj¹ w innych wioskach:
	$sql = mysql_query("SELECT * FROM `unit_place` WHERE `villages_from_id` = '".$village['id']."' AND `villages_to_id` != '".$village['id']."'");
	while ($array = mysql_fetch_assoc($sql)) {
		$vcinfo = sql("SELECT name,x,y,continent FROM `villages` WHERE `id` = '".$array['villages_to_id']."'",'assoc');
		$mounit[$array['villages_to_id']]['x'] = $vcinfo['x'];
		$mounit[$array['villages_to_id']]['y'] = $vcinfo['y'];
		$mounit[$array['villages_to_id']]['continent'] = $vcinfo['continent'];
		$mounit[$array['villages_to_id']]['villagename'] = entparse($vcinfo['name']);
		foreach ($cl_units->get_array("dbname") as $dbname) {
			$mounit[$array['villages_to_id']][$dbname] = $array[$dbname];
			}
		}
		
	$tpl->assign('in_my_village_units',$mvunit);
	$tpl->assign('outside_village_units',$mounit);
	$tpl->assign('all_units',$all_units);
	$tpl->assign('own_units',$this_units);
	$tpl->assign('error',$error);
	$tpl->assign('cl_units',$cl_units);
	}
?>