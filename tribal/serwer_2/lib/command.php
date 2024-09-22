<?php
/*****************************************/
/*=======================================*/
/*     PLIK: command.php   		 		 */
/*     DATA: 18.03.2012r        		 */
/*     ROLA: funkcje place_command.php	 */
/*     ROLA: funkcje market_send.php	 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/
function compare_send_mov($x,$y,$units,$type,$aktu_vid,$aktu_user,$catapult_target = '',$is_confirm = false) {
	global $cl_units,$pl,$cl_builds,$config;
	
	//Walidacja jednostek:
	foreach ($units as $key => $value) {
		$value = (int)$value;
		$value = floor($value);
		if ($value < 0) {
			$value = 0;
			}
			
		$units_arr[$key] = $value;
		}
		
	if ($type === 'attack' || $type === 'support') {
		$x = (int)$x;
		$y = (int)$y;
		$x = floor($x);
		$y = floor($y);
		if ($x < 0 || $y < 0 || $x > 999 || $y > 999) {
			$error = 'Podaj poprawne koordynaty celu.';
			} else {
			$target_vinfo = sql("SELECT id,userid FROM `villages` WHERE `x` = '$x' AND `y` = '$y'","assoc");
			if (empty($target_vinfo) || !is_array($target_vinfo)) {
				$error = 'Wioska o podanych koordynatach nie istnieje.';
				} else {
				if ($target_vinfo['id'] == $aktu_vid) {
					$error = 'Nie mo¿na wys³aæ komendy na aktualn¹ wioskê.';
					} else {
					$v_units = $cl_units->read_units($aktu_vid,$aktu_vid);
					$sum_send_units = array_sum($units_arr);
					
					if ($sum_send_units > 0) {
						$c_error = 0;
						
						foreach ($units_arr as $key => $value) {
							if ($value > $v_units[$key]) {
								$c_error++;
								}
							}
							
						if ($c_error > 0) {
							$error = 'Posiadasz za ma³o jednostek.';
							} else {
							if ($units_arr['unit_catapult'] > 0 && $is_confirm && $type === 'attack') {
								$cbuildc = false;
								$cbuildt = true;
								foreach ($cl_builds->get_array("dbname") as $dbname) {
									if ($catapult_target === $dbname) {
										$cbuildc = true;
									
										if (!in_array("catapult_protection", $cl_builds->get_specials($dbname))) {
											$cbuildt = false;
											} else {
											$cbuildt = true;
											}
										}
									}
								} else {
								$cbuildc = true;
								$cbuildt = false;
								}
								
							if ($cbuildc && !$cbuildt) {
								$avi = sql("SELECT x,y FROM `villages` WHERE `id` = '$aktu_vid'","assoc");
								$odleglosc = oblicz_odleglosc($avi["x"],$avi["y"],$x,$y);
								if ($odleglosc > $config['snob_range'] && $type === 'attack' && $units_arr["unit_snob"] > 0) {
									$error = "Szlachcic maksymalnie mo¿e poruszaæ siê " . $config['snob_range'] . " pól.";			
									} else {
									if ($target_vinfo['userid'] == '-1') {
										$error = array($x,$y,$units_arr,$type,$catapult_target);
										} else {
										$user_info = sql("SELECT `start_gaming` FROM `users` WHERE `id` = '".$target_vinfo['userid']."'","assoc");
										$time_as_start = date("U") - $user_info['start_gaming'];
										
										if ($config['noob_protection'] == '-1') {
											$noob = false;
											} else {
											$config['noob_protection_seconds'] = $config['noob_protection'] * 60;
											if ($time_as_start > $config['noob_protection_seconds']) {
												$noob = false;
												} else {
												$noob = true;
												}
											}
										
										if ($noob) {
											$noob_end = $pl->format_date($user_info['start_gaming'] + $config['noob_protection_seconds']);
											$error = 'Cel ma jeszcze aktywn¹ ochronê pocz¹tkow¹, mo¿na atakowaæ dopiero '.$noob_end;
											} else {
											$error = array($x,$y,$units_arr,$type,$catapult_target);
											}
										}
									}
								} else {
								$error = 'Cel katapult nie zosta³ wybrany.';
								}
							}
						} else {
						$error = 'Musisz wys³aæ co najmniej jedn¹ jednostkê.';
						}
					}
				}
			} 
		} else {
		$error = 'Niezdefiniowany typ komendy.';
		}
		
	return $error;
	}
	
function send_mov($type,$from_village,$to_village,$units,$end_time,$building,$minus = true) {
	if ($minus) {
		foreach ($units as $unit_name => $count) {
			$q_array[] = "`$unit_name` = `$unit_name` - '$count'";
			}
		
		$q_query = @implode(' , ',$q_array);
		unset($q_array);
	
		mysql_query("UPDATE `unit_place` SET $q_query WHERE `villages_from_id` = '$from_village' AND `villages_to_id` = '$from_village'");
		}
		
	$units = implode(';',$units);
	
	$from_userid = sql("SELECT `userid` FROM `villages` WHERE `id` = '$from_village'",'array');
	$to_userid = sql("SELECT `userid` FROM `villages` WHERE `id` = '$to_village'",'array');
	if (empty($from_userid)) {
		$from_userid = '-1';
		}
	if (empty($to_userid)) {
		$to_userid = '-1';
		}
		
	$start_time = date("U");
	
	mysql_query("INSERT INTO movements(
		from_village,to_village,units,type,start_time,
		end_time,building,from_userid,to_userid,send_from_village,
		send_from_user,send_to_user,send_to_village
		) VALUES (
		'$from_village','$to_village','$units','$type','$start_time',
		'$end_time','$building','$from_userid','$to_userid','$from_village',
		'$from_userid','$to_userid','$to_village'
		)");
		
	if ($to_userid != "-1") {
		mysql_query("UPDATE `users` SET `attacks` = `attacks` + '1' WHERE `id` = '$to_userid'");
		}
	mysql_query("UPDATE `villages` SET `attacks` = `attacks` + '1' WHERE `id` = '$to_village'");
		
	$LAST_ID = sql("SELECT `id` FROM `movements` WHERE `from_village` = '$from_village' ORDER BY `id` DESC LIMIT 1",'array');
	
	mysql_query("INSERT INTO events(event_time,event_type,event_id,user_id,villageid) VALUES('$end_time','movement','$LAST_ID','$from_userid','$from_village')");
		
	return true;
	}
	
function create_units_arrays($post) {
	global $cl_units;
	
	$post['x'] = (int)$post['x'];
	$post['x'] = floor($post['x']);
	$post['y'] = (int)$post['y'];
	$post['y'] = floor($post['y']);
	foreach ($cl_units->get_array("dbname") as $dbname) {
		$value = (int)$post[$dbname];
		$value = floor($value);
		$out_arr[$dbname] = $value;
		}
		
	return array('x' => $post['x'],'y' => $post['y'],'units' => $out_arr);
	}
	
function oblicz_odleglosc($xa,$ya,$xc,$yc) {
	$roznmaacx = $xc - $xa;
	$roznmaacy = $yc - $ya;
	$cal = (pow($roznmaacx,2)) + (pow($roznmaacy,2));
	$odlwp = sqrt($cal);
	return $odlwp;
	}
	
function get_movs_times($units,$xa,$ya,$xc,$yc) {
	global $cl_units,$config;
	
	foreach ($units as $dbname => $value) {
		if ($value > 0) $out_arr[$dbname] = $cl_units->get_speed($dbname);
		}
		
	if ($units['unit_paladin'] > 0) {
		$max_speed = $cl_units->get_speed('unit_paladin');
		} else {
		$max_speed = max($out_arr);
		}
		
	$odl_village = oblicz_odleglosc($xa,$ya,$xc,$yc);
	$time = round(($config['movement_speed'] / $config['speed']) * $odl_village * $max_speed);
	$time_end = date("U") + $time;
	return array($time,$time_end);
	}
	
function add_history($add_village,$userid) {
	$count_history = sql("SELECT COUNT(id) FROM `history` WHERE `graczid` = '$userid'",'array');
	if ($count_history > 50) {
		mysql_query("DELETE FROM `history` WHERE `graczid` = '$userid' LIMIT 1");
		}
	mysql_query("INSERT INTO history(graczid,wioska) VALUES ('$userid','$add_village')");
	return true;
	}
	
function compare_send_dealer($x,$y,$res,$aktu_vid) {
	global $bonus,$arr_dealers;
	
	//Zabespieczyæ zmienne:
	$x = floor((int)$x);
	$y = floor((int)$y);
	
	if (!is_array($res)) {
		$res = array(
			'stone' => '0',
			'wood' => '0',
			'iron' => '0'
			);
		}
		
	$res['stone'] = floor((int)$res['stone']);
	$res['wood'] = floor((int)$res['wood']);
	$res['iron'] = floor((int)$res['iron']);
	
	if ($x < 0 || $y < 0 || $x > 999 || $y > 999) {
		$error = 'Podaj poprawne koordynaty celu.';
		} else {
		$target_vinfo = sql("SELECT id,userid,market FROM `villages` WHERE `x` = '$x' AND `y` = '$y'","assoc");
		$aktu_vid_info = sql("SELECT r_wood,r_stone,r_iron,market,bonus,dealers_outside FROM `villages` WHERE `id` = '$aktu_vid'","assoc");
		if (empty($target_vinfo) || !is_array($target_vinfo)) {
			$error = 'Wioska o podanych koordynatach nie istnieje.';
			} else {
			if ($target_vinfo['id'] == $aktu_vid) {
				$error = 'Nie mo¿na wys³aæ komendy na aktualn¹ wioskê.';
				} else {
				if ($target_vinfo['market'] > 0) {
					$ResSum = $res['stone'] + $res['wood'] + $res['iron'];
					$require_dealers = ceil(($ResSum) / 1000);
					
					//Ustawiæ maksymaln¹ iloœæ kupców:
					$max_dealers = $arr_dealers[$aktu_vid_info['market']];
	
					if ($aktu_vid_info['bonus'] == 1) {
						$max_dealers *= $bonus->bonusy[$aktu_vid_info['bonus']]['modifer'] + 1;
						}
		
					$max_dealers = floor($max_dealers);
		
					//Ustawiæ liczbê kupców dostêpnych:
					$inside_dealers = $max_dealers - $aktu_vid_info['dealers_outside'];
					
					if ($require_dealers > $inside_dealers) {
						$error = 'Posiadasz za ma³o kupców, aby zatwierdziæ ten transport';
						} else {
						if ($ResSum > 500) {
							if ($res['stone'] > $aktu_vid_info['r_stone'] || $res['wood'] > $aktu_vid_info['r_wood'] || $res['iron'] > $aktu_vid_info['r_iron']) {
								$error = 'Posiadasz za ma³o surowców, aby zatwierdziæ ten transport';
								} else {
								return array($x,$y,$res);
								}
							} else {
							$error = 'Musisz wys³aæ minimalnie 500 surowców';
							}
						}
					} else {
					$error = 'Wioska docelowa nie posiada rynku';
					}
				}
			}
		}
		
	return $error;
	}
	
function get_dealer_time($xa,$ya,$xc,$yc) {
	global $config;	
	$odl_village = oblicz_odleglosc($xa,$ya,$xc,$yc);
	$time = round(($odl_village * $config['dealer_time'] * 60) / $config['speed']);
	return $time;
	}
	
function wyslij_kupcow($to_village,$from_village,$res_arr,$minus = true) {
	$to_vinfo = sql("SELECT x,y,userid FROM `villages` WHERE `id` = '$to_village'","assoc");
	$from_vinfo = sql("SELECT x,y,userid FROM `villages` WHERE `id` = '$from_village'","assoc");
	
	//Obliczyæ czas drogi i dojœcia na miejsce:
	$duration_time = get_dealer_time($from_vinfo['x'],$from_vinfo['y'],$to_vinfo['x'],$to_vinfo['y']);
	$start_time = date("U");
	$end_time = $start_time + $duration_time;
	
	//Obliczyæ liczbê wymaganych kupców:
	$required_dealers = ceil(($res_arr['stone'] + $res_arr['wood'] + $res_arr['iron']) / 1000);
	
	mysql_query("INSERT INTO dealers(
		from_userid,to_userid,from_village,to_village,wood,
		stone,iron,start_time,end_time,dealers,type
		) VALUES (
		'".$from_vinfo['userid']."','".$to_vinfo['userid']."','".$from_village."','".$to_village."','".$res_arr["wood"]."',
		'".$res_arr["stone"]."','".$res_arr["iron"]."','$start_time','$end_time','$required_dealers','to'
		)");
		
	if ($minus) {
		mysql_query("UPDATE `villages` SET 
			`r_wood` = `r_wood` - '".$res_arr["wood"]."' ,
			`r_stone` = `r_stone` - '".$res_arr["stone"]."' ,
			`r_iron` = `r_iron` - '".$res_arr["iron"]."' ,
			`dealers_outside` = `dealers_outside` + '$required_dealers'
			WHERE `id` = '$from_village'
			");
		}
		
	$LAST_ID = sql("SELECT `id` FROM `dealers` WHERE `from_village` = '$from_village' ORDER BY `id` DESC LIMIT 1",'array');
	
	mysql_query("INSERT INTO events(event_time,event_type,event_id,user_id,villageid) VALUES('$end_time','dealers','$LAST_ID','".$from_vinfo['userid']."','".$from_village."')");
		
	}
?>