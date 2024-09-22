<?php
$dispaly_footer = true;

// Comando de edição de ação:
if ($_GET['try'] === 'confirm' && count($_POST) > 0 && isset($_POST['x']) && isset($_POST['y'])) {
	$_effect = create_units_arrays($_POST);
	
	if (isset($_POST['attack'])) {
		$mov_type = 'attack';
		}
	if (isset($_POST['support'])) {
		$mov_type = 'support';
		}
	
	$effect = compare_send_mov($_effect['x'],$_effect['y'],$_effect['units'],$mov_type,$village['id'],$user['id']);
	
	if (!is_array($effect)) {
		$error = $effect;
		$dispaly_footer = true;
		} else {
		$dispaly_footer = false;
		$_GET['screen'] = 'place_confirm';
		
		$tpl->assign('type',$mov_type);
		$tpl->assign('values',array('x' => $effect[0],'y' => $effect[1]));
		
		$info_village = sql("SELECT id,name,continent,userid FROM `villages` WHERE `x` = '".$effect[0]."' AND `y` = '".$effect[1]."'","assoc");
		$info_village['name'] = entparse($info_village['name']);
		
		$info_user['username'] = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$info_village['userid']."'","array"));
		
		$times = get_movs_times($effect[2],$village['x'],$village['y'],$effect[0],$effect[1]);
		
		if ($info_village['userid'] != "-1") {
			$user_points = sql("SELECT `points` FROM `users` WHERE `id` = '".$info_village['userid']."'","array");
			$morals = kalkuluj_morale($user_points,$user["points"]);
			$tpl->assign('morals',$morals);
			
			if ($config['noc']) {
				$noc = pora_dnia($times[1]);
				} else {
				$noc = false;
				}
			$tpl->assign('noc',$noc);
			}
			
		foreach ($effect[2] as $unit => $count) {
			$booty += $cl_units->get_booty($unit) * $count;
			}
		
		
		$tpl->assign('info_user',$info_user);
		$tpl->assign('info_village',$info_village);
		$tpl->assign('unit_runtime',$times[0]);
		$tpl->assign('arrival',$times[1]);
		$tpl->assign('send_units',$effect[2]);
		$tpl->assign('cl_units',$cl_units);
		$tpl->assign('cl_builds',$cl_builds);
		$tpl->assign('max_booty',$booty);
		}
	}

// Comando de ação confirmado:
if ($_GET['action'] === 'command' && isset($_POST['x']) && isset($_POST['y'])) {
	if ($_GET['h'] == $session['hkey']) {
		$_effect = create_units_arrays($_POST);
		
		if ($_POST['attack'] === 'true') {
			$mov_type = 'attack';
			}
		if ($_POST['support'] === 'true') {
			$mov_type = 'support';
			}
			
		$effect = compare_send_mov($_effect['x'],$_effect['y'],$_effect['units'],$mov_type,$village['id'],$user['id'],$_POST['building'],true);
		
		if (!is_array($effect)) {
			$error = $effect;
			} else {
			$target_vid = sql("SELECT id FROM `villages` WHERE `x` = '".$effect[0]."' AND `y` = '".$effect[1]."'","array");
			$times = get_movs_times($effect[2],$village['x'],$village['y'],$effect[0],$effect[1]);
		
			send_mov($mov_type,$village['id'],$target_vid,$effect[2],$times[1],$effect[4]);
			
			mysql_query("UPDATE `users` SET `last_command` = '".$effect[0].';'.$effect[1]."' WHERE `id` = '".$user['id']."'");
			add_history($target_vid,$user['id']);
			
			header('location: game.php?village='.$village['id'].'&screen=place&mode=command');
			exit;
			}
		} else {
		$error = 'Vai executar ação.';
		}
	}

if ($dispaly_footer) {
// Ação Stop Command:
	$config['cancel_movement_seconds'] = $config['cancel_movement'] * 60;

	if ($_GET['action'] === 'cancel') {
		if ($_GET['h'] == $session['hkey']) {
		// Validação Get'�W
			$_GET['id'] = (int)$_GET['id'];
			$_GET['id'] = floor($_GET['id']);
			if ($_GET['id'] < 0) {
				$_GET['id'] = 0;
				}
			$command_info = sql("SELECT type,start_time,end_time,send_from_village,send_from_user,from_village,to_village,send_to_user,send_to_village FROM `movements` WHERE `id` = '".$_GET['id']."'",'assoc');
			if (empty($command_info) && !is_array($command_info)) {
				$error = 'Não existe tal ordem.';
				} else {
				if ($command_info['send_from_village'] == $village['id'] && $command_info['send_from_user'] == $user['id']) {
					if ($command_info['type'] === 'attack' || $command_info['type'] === 'support') {
						$mov_time_as_start = date("U") - $command_info['start_time'];
						if ($mov_time_as_start > $config['cancel_movement_seconds']) {
							$error = 'Nie mo�na przerwa� tej komendy.';
							} else {
							$aktutime = date("U");
							$endtime = $aktutime + $mov_time_as_start;
							$from_vid = $command_info['to_village'];
							$to_vid = $command_info['from_village'];
							
							mysql_query("UPDATE `movements` SET
								`start_time` = '$aktutime',
								`end_time` = '$endtime',
								`type` = 'cancel',
								`from_village` = '$from_vid ',
								`to_village` = '$to_vid'
								WHERE `id` = '".$_GET['id']."'");
								
							if ($command_info['send_to_user'] != "-1") {
								mysql_query("UPDATE `users` SET `attacks` = `attacks` - '1' WHERE `id` = '".$command_info['send_to_user']."'");
								}
							mysql_query("UPDATE `villages` SET `attacks` = `attacks` - '1' WHERE `id` = '".$command_info['send_to_village']."'");
								
							mysql_query("UPDATE `events` SET `event_time` = '$endtime' WHERE `event_type` = 'movement' AND `event_id` = '".$_GET['id']."'");
		
							header('location: game.php?village='.$village['id'].'&screen=place&mode=command');
							exit;
							}
						} else {
						$error = 'B��.';
						}
					} else {
					$error = 'Não existe tal ordem.';
					}
				}
			} else {
			$error = 'Vai executar ação.';
			}
		}

	$village_units = $cl_units->read_units($village['id'],$village['id']);
	foreach ($cl_units->get_array("dbname") as $unit) {
		if (!is_array($units_columns[$cl_units->get_col($unit)])) {
			$units_columns[$cl_units->get_col($unit)] = array($unit);
			} else {
			$units_columns[$cl_units->get_col($unit)][] = $unit;
			}
		}
		
	//Walidacja get'�w
	$_GET['target'] = (int)$_GET['target'];
	$_GET['target'] = floor($_GET['target']);
	if ($_GET['target'] < 0) {
		$_GET['target'] = 0;
		}
	if ($_GET['target'] > 10000000) {
		$_GET['target'] = 10000000;
		}
		
	$values = sql("SELECT x,y FROM `villages` WHERE `id` = '".$_GET['target']."' LIMIT 1",'assoc');

	//Wybierz rozkazy wychodz�ce z aktualnej wioski:
	$commands_pl = array(
		'attack' => 'Ataque a',
		'back' => 'Retirado de',
		'cancel' => 'Comando cancelado em',
		'other_back' => 'Retirado de',
		'return' => 'De volta de',
		'support' => 'Apoio a',
		);
			
	$sql = mysql_query("SELECT id,type,send_to_village,end_time,start_time FROM `movements` WHERE `send_from_village` = '".$village['id']."' ORDER BY `end_time`");

	while ($array = mysql_fetch_assoc($sql)) {
		$vcinfo = sql("SELECT name,x,y,continent FROM `villages` WHERE `id` = '".$array['send_to_village']."'",'assoc');
		$my_movements[$array['id']]['id'] = $array['id'];
		$my_movements[$array['id']]['type'] = $array['type'];
		$my_movements[$array['id']]['end_time'] = $pl->format_date($array['end_time']);
		$my_movements[$array['id']]['arrival_in'] = $array['end_time'] - date("U");
		$my_movements[$array['id']]['message'] = $commands_pl[$array['type']] . ' ' . entparse($vcinfo['name']) . ' ('
			. $vcinfo['x'] . '|' . $vcinfo['y'] . ') K' . $vcinfo['continent'];
		if ($array['type'] === 'attack' || $array['type'] === 'support') {
			$mov_time_as_start = date("U") - $array['start_time'];
			if ($mov_time_as_start > $config['cancel_movement_seconds']) {
				$my_movements[$array['id']]['can_cancel'] = false;
				} else {
				$my_movements[$array['id']]['can_cancel'] = true;
				}
			} else {
			$my_movements[$array['id']]['can_cancel'] = false;
			}
		}
		
	//Wybierz rozkazy przychodz�ce do aktualnej wioski:
	$commands_pl = array(
		'attack' => 'Ataque de',
		'support' => 'Apoio de',
		);
			
	$sql = mysql_query("SELECT id,type,send_from_village,end_time,start_time FROM `movements` WHERE `send_to_village` = '".$village['id']."' AND (`type` = 'attack' OR `type` = 'support') ORDER BY `end_time`");
	while ($array = mysql_fetch_assoc($sql)) {
		$vpinfo = sql("SELECT name,x,y,continent FROM `villages` WHERE `id` = '".$array['send_from_village']."'",'assoc');
		$other_movements[$array['id']]['id'] = $array['id'];
		$other_movements[$array['id']]['type'] = $array['type'];
		$other_movements[$array['id']]['end_time'] = $pl->format_date($array['end_time']);
		$other_movements[$array['id']]['arrival_in'] = $array['end_time'] - date("U");
		$other_movements[$array['id']]['message'] = $commands_pl[$array['type']] . ' ' . entparse($vpinfo['name']) . ' ('
			. $vpinfo['x'] . '|' . $vpinfo['y'] . ') K' . $vpinfo['continent'];
		}
		
	$last_command = sql("SELECT `last_command` FROM `users` WHERE `id` = '".$user['id']."'",'array');
	$last_command = explode(';',$last_command);
	$last_command = array('x' => $last_command[0],'y' => $last_command[1]);
	
	$tpl->assign('my_movements',$my_movements);
	$tpl->assign('other_movements',$other_movements);
	$tpl->assign('cl_units',$cl_units);
	$tpl->assign('group_units',$units_columns);
	$tpl->assign('units',$village_units);
	$tpl->assign('values',$values);
	$tpl->assign('error',$error);
	$tpl->assign('last_command',$last_command);
	}
?>