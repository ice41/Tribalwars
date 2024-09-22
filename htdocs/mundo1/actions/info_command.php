<?php
//Na pocz�tek sprawd� czy istnieje komenda:
$_GET["id"] = (int)$_GET["id"];
$uid = $user["id"];

$counts = sql("SELECT COUNT(id) FROM `movements` WHERE `id` = '".$_GET["id"]."'  AND (`send_from_user` = '$uid' OR `send_to_user` = '$uid')","array");
if ($counts > 0) {
	$command_exists = true;
	
	//Wybra� info komendy z bazy:
	$command = sql("SELECT send_from_village,send_to_village,units,type,start_time,end_time,from_userid,send_to_user,send_from_user,id,wood,stone,iron FROM `movements` WHERE `id` = '".$_GET["id"]."'","assoc");
	
	if ($command["send_from_user"] == $uid) {
		$command_type = "own";
		} else {
		$command_type = "other";
		}
		
	$tpl->assign("type",$command_type);
	
	if ($command_type == "own") {
		$commands_pl = array(
			'attack' => 'Ataque em',
			'back' => 'Retirado de',
			'cancel' => 'Comando cancelado em',
			'other_back' => 'Retirado de',
			'return' => 'De volta de',
			'support' => 'Apoio a',
		);
		
		$to_vinfo = sql("SELECT x,y,continent,name,userid FROM `villages` WHERE `id` = '".$command["send_to_village"]."'","assoc");
		
		$mov_message = $commands_pl[$command['type']] . ' ' . entparse($to_vinfo['name']) . ' ('
			. $to_vinfo['x'] . '|' . $to_vinfo['y'] . ') K' . $to_vinfo['continent'];
			
		$movement["message"] = $mov_message;
		$movement["to_village"] = $command["send_to_village"];
		$movement["to_villagename"] = entparse($to_vinfo['name']);
		$movement["to_x"] = $to_vinfo['x'];
		$movement["to_y"] = $to_vinfo['y'];
		$movement["to_userid"] = $to_vinfo['userid'];
		if ($to_vinfo['userid'] != "-1") {
			$movement["to_username"] = sql("SELECT `username` FROM `users` WHERE `id` = '".$to_vinfo['userid']."'","array");
			}
		$movement["duration"] = $command["end_time"] - $command["start_time"];
		$movement["arrival"] = $command["end_time"];
		$movement["arrival_in"] = $command["end_time"] - date("U");
		
		$from_vinfo = sql("SELECT x,y,continent,name FROM `villages` WHERE `id` = '".$command["send_from_village"]."'","assoc");
		
		$movement["from_village"] = $command["send_from_village"];
		$movement["from_villagename"] = entparse($from_vinfo['name']);
		$movement["from_x"] = $from_vinfo['x'];
		$movement["from_y"] = $from_vinfo['y'];
		$movement["id"] = $command["id"];
		
		//�upy:
		$movement["wood"] = $command["wood"];
		$movement["stone"] = $command["stone"];
		$movement["iron"] = $command["iron"];
		
		if ($command['type'] === 'attack' || $command['type'] === 'support') {
			$config['cancel_movement_seconds'] = $config['cancel_movement'] * 60;
			$mov_time_as_start = date("U") - $command['start_time'];
			if ($mov_time_as_start > $config['cancel_movement_seconds']) {
				$movement['cancel'] = false;
				} else {
				$movement['cancel'] = true;
				}
			} else {
			$movement['cancel'] = false;
			}
			
		$movement["units"] = explode(";",$command['units']);
		}
	if ($command_type == "other") {
		$commands_pl = array(
			'attack' => 'Ataque de',
			'support' => 'Apoio com',
		);
		
		$from_vinfo = sql("SELECT x,y,continent,name,userid FROM `villages` WHERE `id` = '".$command["send_from_village"]."'","assoc");
		
		$mov_message = $commands_pl[$command['type']] . ' ' . entparse($from_vinfo['name']) . ' ('
			. $from_vinfo['x'] . '|' . $from_vinfo['y'] . ') K' . $from_vinfo['continent'];
			
		$movement["message"] = $mov_message;
		
		$movement["from_village"] = $command["send_from_village"];
		$movement["from_villagename"] = entparse($from_vinfo['name']);
		$movement["from_x"] = $from_vinfo['x'];
		$movement["from_y"] = $from_vinfo['y'];$movement["from_y"] = $from_vinfo['y'];
		
		if ($from_vinfo['userid'] != "-1") {
			$movement["from_username"] = sql("SELECT `username` FROM `users` WHERE `id` = '".$from_vinfo['userid']."'","array");
			}
			
		$movement["from_userid"] = $from_vinfo['userid'];
		
		$to_vinfo = sql("SELECT x,y,continent,name,userid FROM `villages` WHERE `id` = '".$command["send_to_village"]."'","assoc");
		
		$movement["to_village"] = $command["send_to_village"];
		$movement["to_villagename"] = entparse($to_vinfo['name']);
		$movement["to_x"] = $to_vinfo['x'];
		$movement["to_y"] = $to_vinfo['y'];
		$movement["arrival"] = $command["end_time"];
		$movement["arrival_in"] = $command["end_time"] - date("U");
		}
		
	if ($command_type == "other") {
		if ($command["type"] == "attack" || $command["type"] == "support") {
			$command_exists = true;
			} else {
			$command_exists = false;
			}
		}
		
	$tpl->assign("type",$command_type);
	$tpl->assign("mov",$movement);
	} else {
	$command_exists = false;
	}
	
$tpl->assign("command_exists",$command_exists);
$tpl->assign("cl_units",$cl_units);
?>